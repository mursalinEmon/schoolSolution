<?php

class Supplier extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	function init(){
		echo "Supplier Api!";
	}
	
	function createsupplier(){
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
			if($dataarray[$i]["menu"]==="Supplier Database"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		
		$supcode = $this->model->getsuppliercode($roldet[0]["bizid"],"sesup","xsup",$data->supprefix,6);
		
		$adddata = array(			
			"xsup"=>$supcode,
			"xorg"=>$data->supdesc,
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],			  
			"xadd1"=>$data->supadd,			
			"xtaxno"=>$data->suptaxnum,
			"xtaxscope"=>$data->suptaxscope,
			"xphone"=>$data->supphone,
			"xmobile"=>$data->supmob,
			"xsupemail"=>$data->supemail,
		    "zactive"=>$data->supactive,  
		    "xcontact"=>$data->supcontact,
		    "xcontactphone"=>$data->supcontactphone,
		    "xcontactmob"=>$data->supcontactmob,
		    "xweburl"=>$data->supweb,
   		    "xnid"=>$data->supnid,
	  	    "xbank"=>$data->supbank,
		    "xbankbr"=>$data->supbankbr,
		    "xbankacc"=>$data->supaccnum,
		    "xsupprefix"=>$data->supprefix
		);
		
		$result = $this->model->create($adddata);
		
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$supcode.' Supplier Created!', 'keycode'=>$supcode));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	
	function updatesupplier(){
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
			if($dataarray[$i]["menu"]==="Supplier Database"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$where = " xsupsl=".$data->supsl;
		
		$adddata = array(					
			"xorg"=>$data->supdesc,
			"zemail"=>$roldet[0]["zemail"],					  
			"xadd1"=>$data->supadd,			
			"xtaxno"=>$data->suptaxnum,
			"xtaxscope"=>$data->suptaxscope,
			"xphone"=>$data->supphone,
			"xmobile"=>$data->supmob,
			"xsupemail"=>$data->supemail,		     
		    "xcontact"=>$data->supcontact,
		    "xcontactphone"=>$data->supcontactphone,
		    "xcontactmob"=>$data->supcontactmob,
		    "xweburl"=>$data->supweb,
   		    "xnid"=>$data->supnid,
	  	    "xbank"=>$data->supbank,
		    "xbankbr"=>$data->supbankbr,
		    "xbankacc"=>$data->supaccnum,
		    "xsupprefix"=>$data->supprefix
		);
		
		$result = $this->model->update($adddata, $where);
		//Logdebug::appendlog($result);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$data->supcode.' Supplier Updated!'));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	function deletesupplier(){
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
			if($dataarray[$i]["menu"]==="Supplier Database"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$st = "delete from sesup where xsupsl=".$data->xsupsl;
				//Logdebug::appendlog($st);
		$result = $this->model->dbdelete($st);
		
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$data->supcode.' Supplier Deleted!'));
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
			$this->model->getsupautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getallautolist($token, $searchstr=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getsupallautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function findsupplier($token,$supplier=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getsupplierbycode($supplier, $roldet[0]["bizid"]);
	}
	
	function supplierlist($token){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getsupplierlist($roldet[0]["bizid"]);
	}
} 