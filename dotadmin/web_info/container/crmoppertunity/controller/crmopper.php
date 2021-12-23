<?php

class Crmopper extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	function init(){
		//$roldet = $this->model->getroledt("ccab45e79d9a609631fd339e84119f836685ff7959d79ed29a0d2fc8d9a8ad28");
		echo "CRM Oppertunity Started...";
		
	}
	
	function createoppertunity(){
		$data = json_decode(file_get_contents("php://input"));
		
				
		$token = $data->token;
		$apikey = $data->apikey;
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'Api Key Mismatch!'));
			exit;
		}
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		
		
				
		$menudata = json_encode(unserialize($roldet[0]["xkeymenu"]));
		
		$dataarray = json_decode($menudata, true);
		$menuauth="";
		for($i=0; $i<count($dataarray); $i++){
			if($dataarray[$i]["menu"]==="Oppertunity Management"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$xdate = $data->expdate;
		$dt = str_replace('/', '-', $xdate);
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date)); 
		$res = 0;
		//Logdebug::appendlog($data->inteactionno);
		$adddata = array(			
			"xoppersl"=>$data->opperno,
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],	
			"xcldate"=>$date,		
			"xexprevenew"=>$data->exprevenew,
			"xlead"=>$data->leadid,			
		    "xsalesman"=>$data->salesman,		
			"xremarks"=>$data->remarks,		    
			
		);
		
		$onduplicate = " ON DUPLICATE KEY UPDATE xcldate='".$date."',
		xexprevenew='".$data->exprevenew."', xsalesman='".$data->salesman."',xlead='".$data->leadid."',		
		xremarks='".$data->remarks."'";

		
		
		$result = $this->model->createoppertunity($adddata,$onduplicate);
		
		
		
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>'Oppertunity Saved!', 'keycode'=>$result));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	
	function getautolist($token, $searchstr=""){
		
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getopperautolist($searchstr,100);
	}
	
	function getallautolist($token, $searchstr=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getopperallautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function findoppertunity($token,$opper=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getopperbycode($opper, $roldet[0]["bizid"]);
	}
	function findlead($token,$lead=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getleadbycode($lead, $roldet[0]["bizid"]);
	}
	function oppertunitylist($token){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getopperlist($roldet[0]["bizid"]);
	}
	
	function confirm(){
		
		$data = json_decode(file_get_contents("php://input"));
		
				
		$token = $data->token;
		$apikey = $data->apikey;
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'Api Key Mismatch!'));
			exit;
		}
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		
		$st = "update crmoppertunity set xstatus='Confirmed' where xstatus='Open' and xoppersl=".$data->oppertunityno;
		
		
		
		$result = $this->model->dbexecute($st);
		
		$cuscode = $this->model->getcode($roldet[0]["bizid"],"secus","xcus","CUS0",6);
		
		$lead = $this->model->getlead($data->leadid, $roldet[0]["bizid"]);
		
		$adddata = array(			
			"xcus"=>$cuscode,
			"xorg"=>$lead[0]["xorg"],
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],			  
			"xadd"=>$lead[0]["xadd"],
			"xphone"=>$lead[0]["xphone"],
			"xmobile"=>$lead[0]["xmobile"],
			"xcusemail"=>$lead[0]["xorg"],
			"xagent"=>$lead[0]["xagent"],
		    "xcusprefix"=>"CUS0"
		);
			
		
		if($result>0){	
			$result = $this->model->createcustomer($adddata);
				if($result>0)
					echo json_encode(array('result'=>'no error', 'response'=> $data->oppertunityno,'message'=>$data->oppertunityno.' No Oppertunity Confirmed! & '.$cuscode.' Customer Created', 'keycode'=>$data->oppertunityno));
				else
					echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
		
	}
	
	
} 