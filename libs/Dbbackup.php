<?php

class dbbackup{
	
	function takebackup(){
	$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'erp';
   
   $backup_file = 'dbbackup/'.$dbname . date("Y-m-d-H-i-s") . '.sql';
   $command = "mysqldump --opt -h $dbhost -u$dbuser -p$dbpass ". "$dbname > $backup_file";
   echo 'Success';
	system($command);
	}
   	
}