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
Logmaker::save_log('All Workers Stopped');

$monitor->reset_all_queue();
Logmaker::save_log('Queue Reset');

echo "Очередь сброшена, обработчики остановлены";