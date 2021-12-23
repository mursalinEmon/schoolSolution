<?php
//echo "Test";die;
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Credentials: true");
//header("Access-Control-Max-Age: 1000");
//header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
//header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");

date_default_timezone_set("Asia/Dhaka");
//Configuration files
require 'config.php';
spl_autoload_register(function($class) {
    require LIBS . $class .".php";
});
require "libs/Controller.php";
$appboot = new Appboot();

$appboot->init();
