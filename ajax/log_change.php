<?php
include_once '../gearman_includes.php';

/**
 * эта секция определяет, что отдавать из лог файла.
 * если это - начало работы, то первые 10 строк или все, если их менее 10,
 * если продолжение - то только добавившиеся за время сессии строки
 */
$log_content = file(Settings::full_path_to_log(), FILE_SKIP_EMPTY_LINES);
foreach($log_content as $row){
    if(strlen($row) > 2){
        $out[] = $row;
    }
}
$log_count = count($out);


if(!isset($_COOKIE['log_count'])){

    $initial_rows_count = Settings::$initial_count_log_rows;

    if(count($out) > $initial_rows_count){

        $first_row = count($out) - $initial_rows_count;
    }
    else{

        $first_row = 0;
    }
}
else{
    $first_row = $_COOKIE['log_count'];
}


$json_rows = array();
for($ii = $first_row; $ii < $log_count; $ii++){
    $json_rows[] = $out[$ii];
}


setcookie('log_count', $log_count, 0, '/');


echo json_encode($json_rows);
