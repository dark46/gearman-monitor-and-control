<?php
//Подключение этого файла требуется для автолоадера и
//прописывания путей Smarty
include_once 'gearman_includes.php';
$log_file = Settings::full_path_to_log();

//костыль с проверкой - на случай очистки логов
if(file_exists($log_file)){
    $log_content = file($log_file, FILE_SKIP_EMPTY_LINES);
}

$out = array();

if(isset($log_content) && is_array($log_content) && count($log_content) > 0){
    foreach($log_content as $row){
        if(strlen($row) > 2){
            $out[] = $row;
        }
    }
}

/**
 * Устанавливаем начальное кол-во последних строк лог-файла,
 * отображаемых на странице ()
 * Обмениваемся даными сессий "в лоб" - через куки
 */
$initial_rows_count = Settings::$initial_count_log_rows;

if(count($out) > $initial_rows_count){
    setcookie('log_count', count($out) - $initial_rows_count, 0, '/');
}
else{
    setcookie('log_count', 0, 0, '/');
}

$tpl = new Tpl_Obj_Gearman(); $tpl->template_dir = 'view/tpl';

$tpl->assign('path_to_view', 'view');

$tpl->assign('page_title', 'Gearman Monitor');

$tpl->assign('refresh_interval', Settings::$refresh_interval);

$tpl->display('page_header.tpl');

$tpl->display('interval_div.tpl');

$tpl->display('workers_table.tpl');

$tpl->display('functions_table.tpl');

$tpl->display('log_view.tpl');

$tpl->display('page_footer.tpl');


