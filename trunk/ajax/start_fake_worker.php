<?php
include_once '../gearman_includes.php';

try{
   $monitor = new Gearman_Monitor();
}
catch(Exception $e){
   echo $e->getMessage();
   die();
}
$monitor->exit_workers();
$worker_start = $monitor->start_fake_worker();
if($worker_start){
    Logmaker::$echo_mode = false;
    Logmaker::save_log('Fake Worker Start');
}
else {
    Logmaker::$echo_mode = false;
    Logmaker::save_log('Fail Start Fake Worker');
}

while( count( $monitor->workers_list() ) > 0){
    $monitor->exit_workers();
    Logmaker::$echo_mode = false;
    Logmaker::save_log('Workers stopped');
}

echo "Очередь сброшена, обработчики остановлены";