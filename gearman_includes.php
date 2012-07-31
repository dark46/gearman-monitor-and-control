<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Устанавливаем пути для подключаемых файлов.
 * Актуально для автолоадера классов
 */
$allPath = array(
    '/view/Smarty',
    '/classes'
);
foreach ($allPath as $path){
    $path = dirname(__FILE__).$path;
    set_include_path(get_include_path().PATH_SEPARATOR.$path);
}


/**
 * Подключение шаблонов и Smarty
 * Все нужные пути прописываются и файлы подключаются при создании объекта Tpl_Obj_Gearman
 * Все пути относительные. Прописать требуется только пути к Smarty и шаблонам
 * Все пути - относительно корня веб-директории
 */
define('RELATIVE_PATH_TO_TEMPLATES', dirname(__FILE__).'view/tpl');
define('RELATIVE_PATH_TO_SMARTY', '/Smarty');

set_include_path(get_include_path().PATH_SEPARATOR.dirname(__FILE__).RELATIVE_PATH_TO_SMARTY);

/**
 * Автозагрузчик классов
 * @param  $className
 * @return void
 */
function __autoload($className){

    //Костыль для Smarty
    if(strstr($className, 'Smarty')){
        $className = strtolower($className);
    }
    include_once $className.'.php';

}


 
