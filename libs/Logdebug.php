<?php

class Logdebug{
    public static function appendlog($logstring){        
        $myfile = file_put_contents('debug/logs.txt', $logstring.PHP_EOL , FILE_APPEND | LOCK_EX);
    }
    public function modellog($logstring){        
        $myfile = file_put_contents('debug/logs.txt', $logstring.PHP_EOL , FILE_APPEND | LOCK_EX);
    }
}