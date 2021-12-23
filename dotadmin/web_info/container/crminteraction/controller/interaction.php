<?php

class Interaction extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	function init(){
		//$roldet = $this->model->getroledt("ccab45e79d9a609631fd339e84119f836685ff7959d79ed29a0d2fc8d9a8ad28");
		echo "CRM Interaction Management Started...";
		
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
	
	
	function interactionlist($token, $oppersl=0){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getinteractionlist($oppersl,$roldet[0]["bizid"]);
	}
	
	function findinteraction($token, $intsl=0){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getinteraction($intsl,$roldet[0]["bizid"]);
	}
	
	
	
} 