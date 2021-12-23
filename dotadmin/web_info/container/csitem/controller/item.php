<?php

class Item extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	function init(){
		echo "Item Controller";
	}
		
	function createitem(){
		$data = json_decode(file_get_contents("php://input"));
		//Logdebug::appendlog(1);
				
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
			if($dataarray[$i]["menu"]==="Item Database"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$bizdet = $this->model->getbusinessdet($roldet[0]["bizid"]);
		$itemcode = $data->itemcode;
		if($bizdet[0]['bizitemauto']=="YES"){		
			$itemcode = $this->model->getitemcode($roldet[0]["bizid"],"seitem","xitemcode",$data->itemprefix,6);
		}
		
		$adddata = array(			
			"xitemcode"=>$itemcode,
			"xitemcodealt"=>$itemcode,
			"xdesc"=>$data->itemdesc,
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],			  
			"xlongdesc"=>$data->itemlongdesc,			
			"xpricepur"=>$data->purchaseprice,
			"xstdprice"=>$data->wholesaleprice,
			"xmrp"=>$data->mrp,
			"zactive"=>$data->itemactive,
			"xbrand"=>$data->itemdep,
		    "xcat"=>$data->itemcat,  
		    "xgitem"=>$data->itemgroup,
		    "xtaxcodesales"=>$data->salestaxcode,
		    "xtaxcodepo"=>$data->purchasetaxcode,
		    "xtaxpct"=>$data->taxpct,
   		    "xreorder"=>$data->reorderlevel	  	    
		);
		//Logdebug::appendlog(serialize($adddata));
		$result = $this->model->create($adddata);
		
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$itemcode.' Item Created!', 'keycode'=>$itemcode));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	
	function updateitem(){
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
			if($dataarray[$i]["menu"]==="Item Database"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$where = " xitemsl=".$data->itemsl;
		
		$adddata = array(					
			"xdesc"=>$data->itemdesc,
			"zemail"=>$roldet[0]["zemail"],					  
			"xlongdesc"=>$data->itemlongdesc,			
			"xpricepur"=>$data->purchaseprice,
			"xstdprice"=>$data->wholesaleprice,
			"xmrp"=>$data->mrp,
			"zactive"=>$data->itemactive,
			"xbrand"=>$data->itemdep,
		    "xcat"=>$data->itemcat,  
		    "xgitem"=>$data->itemgroup,
		    "xtaxcodesales"=>$data->salestaxcode,
		    "xtaxcodepo"=>$data->purchasetaxcode,
		    "xtaxpct"=>$data->taxpct,
   		    "xreorder"=>$data->reorderlevel	
		);
		
		$result = $this->model->update($adddata, $where);
		//Logdebug::appendlog($result);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$data->itemcode.' Item Updated!'));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	function deleteitem(){
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
			if($dataarray[$i]["menu"]==="Item Database"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$st = "delete from seitem where xitemsl=".$data->itemsl;
				//Logdebug::appendlog($st);
		$result = $this->model->dbdelete($st);
		
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$data->itemcode.' Item Deleted!'));
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
			$this->model->getitemautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getallautolist($token, $searchstr=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getitemallautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function finditem($token,$item=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getitembycode($item, $roldet[0]["bizid"]);
	}
	function itemlist($token){
		
		$this->model->getitemlist(100);
	}
	function ecomitemlist($cat,$api){
		
		$this->model->getecomitemlist($cat);
		
	}
	function ecomitemlistbysearch($cat,$desc,$api){
		if($cat=="All")
			$this->model->getecomitemlistbyall($desc);
		else
			$this->model->getecomitemlistbysearch($cat,$desc);
	}
	function ecombyitem($item,$api){
		
		$this->model->getecombyitem($item);
		
	}
	
	function ecomfeturelist($feature,$api){
		
		$this->model->getecomitembytype($feature);
		
	}
} 