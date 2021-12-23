<?php
 include '../libs/Database.php';

 include '../config.php';
$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$fields=array();
echo json_encode($db->select("seitem",$fields,""));