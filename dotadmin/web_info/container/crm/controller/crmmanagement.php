<?php

class Crmmanagement extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	function init(){
		//$roldet = $this->model->getroledt("ccab45e79d9a609631fd339e84119f836685ff7959d79ed29a0d2fc8d9a8ad28");
		echo "CRM Management Started...";
		
	}
	
	function createlead(){
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
			if($dataarray[$i]["menu"]==="Lead Management"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		
		$cuscode = $this->model->getcode($roldet[0]["bizid"],"crmlead","xlead",$data->cusprefix,6);
		//Logdebug::appendlog($cuscode);
		$adddata = array(			
			"xlead"=>$cuscode,			
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],	
			"xorg"=>$data->org,			
			"xadd"=>$data->leadadd,
			"xphone"=>$data->leadphone,
			"xmobile"=>$data->leadmobile,
			"xcusemail"=>$data->leademail,
		    "xagent"=>$data->salesman,
			"xremarks"=>$data->remarks,		    
			"xleadprefix"=>$data->cusprefix
		);
		
		$result = $this->model->create($adddata);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$cuscode.' Lead Created!', 'keycode'=>$cuscode));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	
	function updatelead(){
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
			if($dataarray[$i]["menu"]==="Customer Database"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$where = " xleadsl=".$data->leadsl;
		
		$adddata = array(	
			
			"xorg"=>$data->org,			
			"xadd"=>$data->leadadd,
			"xphone"=>$data->leadphone,
			"xmobile"=>$data->leadmobile,
			"xcusemail"=>$data->leademail,
		    "xagent"=>$data->salesman,
			"xremarks"=>$data->remarks,	
		);
		
		$result = $this->model->update($adddata, $where);
		
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$data->leadcode.' Lead Updated!'));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	function deletelead(){
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
			if($dataarray[$i]["menu"]==="Customer Database"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$st = "delete from crmlead where xleadsl=".$data->leadsl;
				//Logdebug::appendlog($st);
		$result = $this->model->dbdelete($st);
		
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$data->cuscode.' Customer Deleted!'));
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
			$this->model->getleadautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getallautolist($token, $searchstr=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getleadallautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function findlead($token,$customer=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getleadbycode($customer, $roldet[0]["bizid"]);
	}
	function leadlist($token){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getleadlist($roldet[0]["bizid"]);
	}
	
	
	function createinteraction(){
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
			if($dataarray[$i]["menu"]==="Interaction Tracking"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$xdate = $data->txndate;
		$dt = str_replace('/', '-', $xdate);
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date)); 
		$res = 0;
		//Logdebug::appendlog($data->inteactionno);
		$adddata = array(			
			"xintsl"=>$data->inteactionno,
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],	
			"xdate"=>$date,			
			"xinteractiontype"=>$data->interactiontype,
			"xoppersl"=>$data->oppertunityno,
			"xlead"=>$data->leadid,			
		    "xfeedback"=>$data->feedback,
			"xremarks"=>$data->remarks,		    
			
		);
		
		$onduplicate = " ON DUPLICATE KEY UPDATE xdate='".$date."',
		xinteractiontype='".$data->interactiontype."', xoppersl='".$data->oppertunityno."',xlead='".$data->leadid."',		
		xfeedback='".$data->feedback."', xremarks='".$data->remarks."'";

		
		
		$result = $this->model->createinteraction($adddata,$onduplicate);
		
		
		
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>'Interaction Saved!', 'keycode'=>$result));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
} 