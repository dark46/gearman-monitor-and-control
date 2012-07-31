<?php
include_once '../gearman_includes.php';

try{
   $monitor = new Gearman_Monitor();
}
catch(Exception $e){
   echo $e->getMessage();
   die();
}
$worker_stop = $monitor->exit_workers();
if($worker_stop){
    Logmaker::$echo_mode = false;
    Logmaker::save_log('Workers stopped');

    echo 'Все обработчики остановлены';
}
else {
    Logmaker::$echo_mode = false;
    Logmaker::save_log('FAIL Worker Stop');
    echo 'Обработчики НЕ остановлены';
}

 
