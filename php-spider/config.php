<?php

//$GLOBALS['config']['db'] = array(
//    'host'  => '127.0.0.1',
//    'port'  => 3306,
//    'user'  => 'root',
//    'pass'  => '123456',
//    'name'  => 'spider',
//);
//
//$GLOBALS['config']['redis'] = array(
//    'host'      => '127.0.0.1',
//    'port'      => 6379,
//    'pass'      => '',
//    'prefix'    => 'phpspider',
//    'timeout'   => 30,
//);
define('CORE', dirname(__FILE__));
define('PATH_ROOT', CORE."/");

spl_autoload_register(function ($class) {
    if ($class) {
        $file = str_replace('\\', '/', $class);
        $file = PATH_ROOT.$file.'.php';

        if (file_exists($file)) {
            //系统配置
            if (file_exists($file)) {
                include $file;
            }
        }
    }
});
//include "mimetype.php";
