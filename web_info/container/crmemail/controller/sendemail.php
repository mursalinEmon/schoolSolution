<?php

class Sendemail extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	function init(){
		//$roldet = $this->model->getroledt("ccab45e79d9a609631fd339e84119f836685ff7959d79ed29a0d2fc8d9a8ad28");
		echo "CRM Email Started...";
		
	}
	public function send(){
		$mailer = new Mailer();
		$mailstatus = $mailer->sendbyemail("mdrajibd2k@gmail.com","Test Mail", "Test Mail");
		
		echo $mailstatus;
	}
} 