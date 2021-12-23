<?php
//header("Access-Control-Allow-Origin: http://localhost:4200");
//header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
//header("Access-Control-Allow-Headers: Origin, X-Request-With, Content-Type, Accept, Authorization");

date_default_timezone_set("Asia/Dhaka");
//Configuration files
require 'config.php';
spl_autoload_register(function($class) {
    require LIBS . $class .".php";
});

$appboot = new Appboot();

$appboot->init();