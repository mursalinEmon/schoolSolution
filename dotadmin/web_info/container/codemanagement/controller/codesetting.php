<?php
class Codesetting extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function getcodes($type,$apikey){
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>'Insufficient Balance!'));
			exit;
		}	
		$this->model->getcodes($type);
	}
	
	function gettemplates($apikey,$type){
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'Api Key Mismatch','response'=>''));
			exit;
		}	
		$this->model->gettemplates($type);
	}
	
	function createcode(){
		
		$data = json_decode(file_get_contents("php://input"));
		
		$token = $data->token;
		$apikey = $data->apikey;
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'Api Key Mismatch','response'=>''));
			exit;
		}
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'Token Mismatch','response'=>''));
			exit;
		}
		
		
		$adddata = array(			
			"xcodetype"=>$data->codetype,
			"xcode"=>$data->codename,
			"xdesc"=>$data->depcode,
			"bizid" => $roldet[0]["bizid"]
		);
		
		$result = $this->model->create($adddata);
		if($result>0){			
			echo json_encode(array('result'=>'No Error', 'codeid'=>$result,'response'=> "Code saved!"));
		}
		else
			echo json_encode(array('result'=>'Error', 'codeid'=>'', 'response'=> 'Your request failed!'));
		
	}
	
	function updatecode(){
		
		$data = json_decode(file_get_contents("php://input"));
		
		$token = $data->token;
		$apikey = $data->apikey;
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'Api Key Mismatch','response'=>''));
			exit;
		}
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'Token Mismatch','response'=>''));
			exit;
		}
		$where = "codeid='".$data->codeid."'";
		$adddata = array(
			"xcode"=>$data->codename,
			"xdesc"=>$data->depcode
		);
		
		$result = $this->model->updatecode($adddata, $where);
		if($result>0){			
			echo json_encode(array('result'=>'No Error', 'response'=> 'Code Updated!'));
		}
		else
			echo json_encode(array('result'=>'Error', 'response'=> 'Your request failed!'));
		
	}
	
	function deletecode(){
		
		$data = json_decode(file_get_contents("php://input"));
		//Logdebug::appendlog(serialize($data)); die;
		$token = $data->token;
		$apikey = $data->apikey;
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'Api Key Mismatch','response'=>''));
			exit;
		}
		//Logdebug::appendlog("strat");
		$roldet = $this->model->getroledt($token);
		//Logdebug::appendlog(serialize($roldet));
		if(count($roldet)===0){
			echo json_encode(array('result'=>'Token Mismatch','response'=>''));
			exit;
		}
		
		$st = "delete from secodes where xcodetype='".$data->codetype."' and codeid=".$data->codeid;
				
		$result = $this->model->deletecode($st);
		
		if($result>0){			
			echo json_encode(array('result'=>'No Error', 'response'=> 'Code Deleted!'));
		}
		else
			echo json_encode(array('result'=>'Error', 'response'=> 'Your request failed!'));
		
	}
	
	function getsinglecode($apikey,$type, $code){
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'Api Key Mismatch','response'=>''));
			exit;
		}	
		$this->model->getsinglecode($type, $code);
	}
	
	function getsingletemplate($apikey,$type, $template){
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'Api Key Mismatch','response'=>''));
			exit;
		}	
		$this->model->getsingletemplate($type, $template);
	}
}