<?php
abstract class Logmaker{

    public static $echo_mode = false;

    public static function save_log($operation){
        $logging_data = date("d:m:y_H:i:s ") . $operation. " \n";
        file_put_contents(Settings::full_path_to_log(), $logging_data, FILE_APPEND);
        if(self::$echo_mode){
            echo $operation. "\n";
        }
    }
    
}
 
