<?php
include_once '../gearman_includes.php';

try{
   $monitor = new Gearman_Monitor();
}
catch(Exception $e){
   echo json_encode('');
    die();
}

$functions = $monitor->all_functions_statuses();
$out_data = array();

$func_synonym = Settings::$func_name_synonyms;

if(is_array($functions) AND count($functions) > 0){
    foreach($functions as $name => $data){
        if(Settings::$synonyms_only_view){
            if(key_exists($name, $func_synonym)){
                $name = $func_synonym[$name];
                $out_data[] = array(
                    'func_name' => $name,
                    'in_queue' => $data['in_queue'],
                    'jobs_running' =>$data['jobs_running'],
                    'capable_workers' => $data['capable_workers'],
                );
            }
        }
        else{
            if(key_exists($name, $func_synonym)){
                $name = $func_synonym[$name];
            }
            $out_data[] = array(
                'func_name' => $name,
                'in_queue' => $data['in_queue'],
                'jobs_running' =>$data['jobs_running'],
                'capable_workers' => $data['capable_workers'],
            );
        }
    }
}
echo json_encode($out_data);

 
