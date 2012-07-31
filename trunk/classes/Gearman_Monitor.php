<?php
class Gearman_Monitor{

    /**
     * Хост сервера Gearman
     * @var string
     */
    protected $host = 'localhost';

    /**
     * Порт, 4730 - по умолчанию
     * @var int
     */
    protected $port = 4730;

    /**
     * таймаут соединения в сек.
     * @var int
     */
    protected $timeout = 30;

    /**
     * Идентификатор соединения
     * @var bool|\resource
     */
    protected $connection_handler = false;

    /**
     * @throws Exception
     * При созднии объекта сразу открываем сокет на сервер,
     * неудача - генерируем исключение
     * Исключение должно обрабатываться при каждом создании объекта
     * 
     * Самая частая ситуация генерации этого исключения - не запущен сервер
     * или нет с ним связи
     */
    public function __construct(){
        $this->connection_handler = @fsockopen($this->host, $this->port, $errno, $errstr, $this->timeout);
        if(!$this->connection_handler){
            throw new Exception("Error! Msg: " . $errstr . " ; Code: ". $errno);
        }
    }

    /**
     * Отправляем команду серверу Gearman
     * Нас в этом проекте интересуют только команды:
     * 'status' - список ф-й с их текущим состоянием
     * 'workers' - список активных воркеров
     * @param  $cmd
     * @return void
     */
    protected function send_cmd($cmd){
        fwrite($this->connection_handler, $cmd."\r\n");
    }

    /**
     * Прием данных с сервера Gearman в ответ на посланную команду
     * @return string
     */
    protected function receive_cmd_data(){
        $full_response = '';
        while (true) {
            $data = fgets($this->connection_handler , 4096);
            if ($data == ".\n") {
                break;
            }
            $full_response .= $data;
        }

        return $full_response;
    }

    /**
     * Закрываем сокет по окончании работы с объектом
     */
    public function __destruct(){
        if(is_resource($this->connection_handler)){
           fclose($this->connection_handler);
        }
    }

    /**
     * Полный список зарегистрированных на сервере ф-й.
     * Сделана обработка ситуации, когда ф-я когда-то была зарегистрирована
     * и Gearman отвечает, что такая ф-я есть, но для нее 0 в очереди, 0 в процессе и 0 воркеров
     * @return array
     */
    public function all_functions_statuses(){
        $this->send_cmd('status');
        $raw_data =  $this->receive_cmd_data();

        $status = array();
        $temp_array = explode("\n", $raw_data);
        foreach ($temp_array as $item) {

            $raw_array = explode("\t", $item);

            if(is_array($raw_array) AND count($raw_array) == 4){

                if($raw_array[1] != 0 OR $raw_array[2] !=0 OR $raw_array[3] != 0){
                    $status[$raw_array[0]] = array(
                        'in_queue' => $raw_array[1],
                        'jobs_running' => $raw_array[2],
                        'capable_workers' => $raw_array[3]
                    );
                }

            }
        }

        return $status;
    }

    /**
     * Просто список активных (то есть либо в очереди, либо есть воркеры)на сервере ф-й
     * @return array
     */
    public function all_functions_list(){
        $raw_statuses = $this->all_functions_statuses();
        return array_keys($raw_statuses);
    }

    /**
     * состояние определенной ф-и, если такой нет - false
     * @param  $function_name
     * @return bool
     */
    public function function_status($function_name){
        $all_func_array = $this->all_functions_statuses();
        if(!key_exists($function_name, $all_func_array)){
            return false;
        }
        return $all_func_array[$function_name];
    }

    /**
     * Сброс одной задачи в очереди
     * имитируется фейковый воркер
     * @param  $function_name
     * @return void
     */
    protected function reset_single_task($function_name){
        if(!function_exists($function_name)){
            eval('function ' . $function_name . '(){}');
        }
        $fake_worker = new GearmanWorker();
        $fake_worker->addServer($this->host);
        $fake_worker->addFunction($function_name, $function_name);
        $fake_worker->work();
    }

    /**
     * Сброс всей очереди по конкретной функции,
     * рекурсивно по всем задачам этой ф-и
     * @param  $function_name
     * @return bool
     */
    public function reset_task($function_name){
        $raw_func_array = $this->function_status($function_name);
        $number_of_func = $raw_func_array['in_queue'];
        if($number_of_func > 0){
            $this->reset_single_task($function_name);
            $this->reset_task($function_name);
        }
        else{
            return;
        }
    }

    /**
     * Сброс всей очереди - поочередный сброс каждой задачи
     * @return void
     */
    public function reset_all_queue(){
        $functions_list = $this->all_functions_list();
        foreach($functions_list as $function){
            $this->reset_task($function);
        }
    }

    /**
     * Список зарегистрированных воркеров
     * @return array
     */
    public function workers_list(){
        $this->send_cmd('workers');
        $raw_workers = $this->receive_cmd_data();
        $workers = array();
        $temp_array     = explode("\n", $raw_workers);
        foreach ($temp_array as $item) {

            $z = explode(" : ", $item);
            if(is_array($z) AND count($z) > 1){
                $info = $z[0];
                $functions = $z[1];
                list($fd, $ip, $id) = explode(' ', $info);

                $functions = explode(' ', trim($functions));

                if(is_array($functions) AND count($functions) > 0){
                    $workers[] = array(
                        'fd' => $fd,
                        'ip' => $ip,
                        'id' => $id,
                        'functions' => $functions
                    );
                }
            }
        }

        return $workers;
    }

    /**
     * остановка воркера
     * @return string
     */
    public function exit_workers(){

        exec("ps ax | grep ". Settings::$worker_file_name ." | awk '{print $1}' | xargs kill");

        $workers = $this->workers_list();
        if(count($workers) != 0){
            return "No";
        }
        return "Yes";
    }

    /**
     * запуск воркера
     * @return bool
     */
    public function start_worker(){

        $before_start = count($this->workers_list());

        $ctl_string = "php ". Settings::full_path_to_workers() . Settings::$worker_file_name ." > /dev/null &";
        exec($ctl_string);
        sleep(1);
        $after_start = count($this->workers_list());

        if($after_start  > $before_start){
            return true;
        }
        return false;
    }
}
 
