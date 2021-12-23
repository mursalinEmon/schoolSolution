<?php

class Customer extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	function init(){
		//$roldet = $this->model->getroledt("ccab45e79d9a609631fd339e84119f836685ff7959d79ed29a0d2fc8d9a8ad28");
		
		
	}
	
	function createcustomer(){
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
		if($data->cusmob===""){
			echo json_encode(array('result'=>'error','response'=>'Customer Mobile Not Found!','message'=>''));
			exit;
		}
		
		$customer = $this->model->getcustomerbymobile($data->cusmob,$roldet[0]["bizid"]);
		
		if(count($customer)>0){
			echo json_encode(array('result'=>'no error', 'response'=> '0','message'=>'Duplicate Customer!', 'keycode'=>''));
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
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		
		$cuscode = $this->model->getcustomercode($roldet[0]["bizid"],"secus","xcus",$data->cusprefix,6);
		
		$adddata = array(			
			"xcus"=>$cuscode,
			"xorg"=>$data->cusdesc,
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],			  
			"xadd"=>$data->cusadd,
			"xdeladd"=>$data->cusdeladd,
		    "xbillingadd"=>$data->cusbilladd,
			"xtaxno"=>$data->custaxnum,
			"xtaxscope"=>$data->custaxscope,
			"xphone"=>$data->cusphone,
			"xmobile"=>$data->cusmob,
			"xcusemail"=>$data->cusemail,
		    "xcreditlimit"=>$data->cuscrlimit,
			"xdiscountpct"=>$data->cusdiscountpct,
		    "xagent"=>$data->cussalesparson,
		    "zactive"=>$data->cusactive,  
		    "xcontact"=>$data->cuscontact,
		    "xcontactphone"=>$data->cuscontactphone,
		    "xcontactmob"=>$data->cuscontactmob,
		    "xweburl"=>$data->cusweb,
   		    "xnid"=>$data->cusnid,
	  	    "xbank"=>$data->cusbank,
		    "xbankbr"=>$data->cusbankbr,
		    "xbankacc"=>$data->cusaccnum,
		    "xcascard"=>$data->cuscardnum,
		    "xpoint"=>$data->cuspoint,
			"xcusprefix"=>$data->cusprefix
		);
		
		$result = $this->model->create($adddata);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$cuscode.' Customer Created!', 'keycode'=>$cuscode));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	
	function updatecustomer(){
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
		
		$where = " xcussl=".$data->cussl;
		
		$adddata = array(	
			
			"xorg"=>$data->cusdesc,
			"xemail"=>$roldet[0]["zemail"],
			"xadd"=>$data->cusadd,
			"xdeladd"=>$data->cusdeladd,
		    "xbillingadd"=>$data->cusbilladd,
			"xtaxno"=>$data->custaxnum,
			"xtaxscope"=>$data->custaxscope,
			"xphone"=>$data->cusphone,
			"xmobile"=>$data->cusmob,
			"xcusemail"=>$data->cusemail,
		    "xcreditlimit"=>$data->cuscrlimit,
			"xdiscountpct"=>$data->cusdiscountpct,
		    "xagent"=>$data->cussalesparson,
		    "zactive"=>$data->cusactive,		  
		    "xcontact"=>$data->cuscontact,
		    "xcontactphone"=>$data->cuscontactphone,
		    "xcontactmob"=>$data->cuscontactmob,
		    "xweburl"=>$data->cusweb,
   		    "xnid"=>$data->cusnid,
	  	    "xbank"=>$data->cusbank,
		    "xbankbr"=>$data->cusbankbr,
		    "xbankacc"=>$data->cusaccnum,
		    "xcascard"=>$data->cuscardnum,
		    "xpoint"=>$data->cuspoint
		);
		
		$result = $this->model->update($adddata, $where);
		
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$data->cuscode.' Customer Updated!'));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	function deletecustomer(){
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
		
		$st = "delete from secus where xcussl=".$data->xcussl;
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
			$this->model->getcusautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getallautolist($token, $searchstr=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getcusallautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function findcustomer($token,$customer=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getcustomerbycode($customer, $roldet[0]["bizid"]);
	}
	function customerlist($token){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getcustomerlist($roldet[0]["bizid"]);
	}
} 