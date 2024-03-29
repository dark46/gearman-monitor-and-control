<?php
include_once '../gearman_includes.php';

try{
   $monitor = new Gearman_Monitor();
}
catch(Exception $e){
   echo $e->getMessage();
   die();
}

$function_name = $_GET['function_name'];
$func_synonym = array_search($function_name, Settings::$func_name_synonyms);
if($func_synonym){
    $function_name = $func_synonym;
}

$monitor->reset_task($function_name);
Logmaker::save_log('Reset Queue for Task: ' .$function_name);

if($func_synonym){
    $function_name = $_GET['function_name'];
}

echo 'Очередь задачи <span style="font-weight:bold">' . $function_name . '</span> сброшена';
