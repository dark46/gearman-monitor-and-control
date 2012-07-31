<?php
abstract class Settings{

    /**
     * Имя рабочего воркера
     * @var string
     */
    public static $worker_file_name = 'worker.php';

    /**
     * Полный путь к воркерам
     * Функция - чтобы можно было использовать переменную $_SERVER при формировании пути
     * @static
     * @return string
     */
    public static function full_path_to_workers(){
        return $_SERVER['DOCUMENT_ROOT']."/words/work/";
    }

    /**
     * Путь к директории монитора gearman относительно корня домена
     * @var string
     */
    public static $relative_path_to_gmonitor = 'work/gmonitor/';

    /**
     * Полный путь (с именем файла) к отображаемому лог-файлу
     * Функция - чтобы можно было использовать переменную $_SERVER при формировании пути
     * @static
     * @return string
     */
    public static function full_path_to_log(){
        return $_SERVER['DOCUMENT_ROOT']."/words/work/ajax/log.txt";
    }

    /**
     * Интервал обновления страницы яваскриптом в миллисекундах
     * @var int
     */
    public static $refresh_interval = 2000;

    /**
     * Число последних строк лог-файла, отображаемых при загрузке страницы монитора
     * Последующие строки добавляются к этим
     * @var int
     */
    public static $initial_count_log_rows = 10;

    /**
     * Синонимы имен функций воркера
     * Будут отображаться в таблице вместо имен
     * @var array
     */
    public static $func_name_synonyms = array(
    );

    /**
     * Если false, отображаются все ф-и, зарегистрированные на сервере очередей
     * Если true - только те ф-и, для которых есть в таблице синонимы
     * Нужно для ситуации, когда на сервере очередей крутятся несколько проектов,
     * соотв. они регистрируют функции из разных проектов,
     * а мы хотим мониторить только свои ф-и. Для это ставим это св-во в true и прописываем синонимы
     * ф-й в свойстве func_name_synonyms
     * @var bool
     */
    public static $synonyms_only_view = false;

}
