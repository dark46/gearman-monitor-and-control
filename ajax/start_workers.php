<?php
include_once '../gearman_includes.php';

try{
   $monitor = new Gearman_Monitor();
}
catch(Exception $e){
   echo $e->getMessage();
   die();
}
$worker_start = $monitor->start_worker();
if($worker_start){
    Logmaker::$echo_mode = false;
    Logmaker::save_log('Worker Start');
    echo 'обработчик запущен успешно';
}
else {
    echo 'Обработчик НЕ запущен';
    Logmaker::$echo_mode = false;
    Logmaker::save_log('Fail Start Worker');
}