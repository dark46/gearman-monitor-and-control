<?php
include_once '../gearman_includes.php';

try{
   $monitor = new Gearman_Monitor();
}
catch(Exception $e){
    echo 'x';
    die();
}
$workers = $monitor->workers_list();
echo count($workers);