<?php 
class Gljv extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function init(){
		echo "Journal Voucher initiated...";
	}
	
		
	function createvoucher(){
		$data = json_decode(file_get_contents("php://input"));
		
		//Logdebug::appendlog(serialize($data));		
		$token = $data->token;
		$apikey = $data->apikey;
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'error','response'=>'0','message'=>'Api Key Mismatch!'));
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
			if($dataarray[$i]["menu"]==="Journal Voucher"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$voucherno = $data->voucherno;
		if($voucherno=="")
			$voucherno = $this->model->getvoucherno($roldet[0]["bizid"],"glheader","xvoucher",$data->prefix,6);
		
		
		//Logdebug::appendlog($voucherno);
		
		$year = date('Y',strtotime($data->xdate));
		$month = date('m',strtotime($data->xdate)); 
		//$year=0;
		//$month=0;
		
		$adddata = array(			
			"xvoucher"=>$voucherno,			
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],			  
			"xnarration"=>$data->narration,
			"xdate"=>$data->xdate,		    
			"xprefix"=>$data->prefix,			
			"xdoctype"=>"Journal Voucher",
			"xdocnum"=>$voucherno,				
			"xstatusjv"=>'Created',
			"xyear"=>$year,
			"xper"=>$month
		);
		/*$st = "insert into glheader (xvoucher,zemail,bizid,xnarration,xdate,xprefix,xdoctype,xdocnum,xstatusjv,xyear,xper)
		 values('".$voucherno."','".$roldet[0]["zemail"]."','".$roldet[0]["bizid"]."','".$data->narration."','".$data->xdate."',
		 '".$data->prefix."','Journal Voucher','".$voucherno."','Created','".$year."','".$month."')";
		 
		Logdebug::appendlog($st);*/
		
		$onduplicate = " ON DUPLICATE KEY UPDATE xnarration='".$data->narration."',
		xdate='".$data->xdate."', 
		xyear=".$year.", xper=".$month."";
		
		
		
		$cols = "bizid,xvoucher,xrow,xacc,xacctype,xaccusage,xaccsource,xaccsub,
		xcur,xbase,xexch,xprime,xflag,xaccnarration";
		$vals = "";
		$row = $this->model->getrow($roldet[0]["bizid"],$voucherno);
		$hasdt = 0; 
		foreach($data->voucherdt as $key=>$value){
			if($value->acccodedt!==""){
			$accdt = $this->model->getaccdetail($roldet[0]["bizid"],$value->acccodedt);	
			
			$baseamt = 0;
			$flg = "Debit";
			
			if(floatval($value->dramtdt)>0){
				$baseamt = $value->dramtdt;
				$flg = "Debit";
			}else if (floatval($value->cramtdt)>0){
				$baseamt = "-".$value->cramtdt;
				$flg = "Credit";
			}else{
				$baseamt = $value->dramtdt;
			}
			
			$hasdt = 1;
			if($value->dtrow!="0")
				$itemrow = $value->dtrow;
			else
				$itemrow=$row;
			
			$vals .= "(".$roldet[0]["bizid"].", '".$voucherno."',".$itemrow.",'".$value->acccodedt."',
			'".$accdt[0]["xacctype"]."','".$accdt[0]["xaccusage"]."','".$accdt[0]["xaccsource"]."','".$value->subacccodedt."',
			'KWD',".$baseamt.",1,".$baseamt.",'".$flg."','".$value->accnarration."'),";
			
			if($value->dtrow=="0")
				$row++;
			
				}
			}
		$vals = rtrim($vals,','); 
		//Logdebug::appendlog("insert into gldetail (".$cols.") values".$vals);
		$onduplicatedt=" ON DUPLICATE KEY UPDATE xacc=VALUES(xacc), xaccnarration=VALUES(xaccnarration),
		xaccsub=VALUES(xaccsub),xacctype=VALUES(xacctype),xaccusage=VALUES(xaccusage),xaccsource=VALUES(xaccsource),xbase=VALUES(xbase),
		xcur=VALUES(xcur),xexch=VALUES(xexch),xexch=VALUES(prime),xflag=VALUES(xflag)";
		
		//$onduplicatedt = ""; point 1
		
		$result = 0;
		
		if(intval($data->vsl) == 0){
			$result = $this->model->create_voucher($adddata, "");
		}else{
			$result = $this->model->create_voucher($adddata, $onduplicate);
			$result = 1;
		}
		
		$resultdt = $result; 
		if($result>0){
			if($hasdt === 1){
				$result = $this->model->create_voucherdt($cols, $vals, $onduplicatedt);
				if($result>0)
					$resultdt = $result;
			}
		}
		
		
		if($resultdt>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$voucherno.' Voucher Saved!', 'keycode'=>$voucherno));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!!!'));
		
	}
	
	function deletequotitem(){
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
		$st = "delete from soquotdet where quotdetsl=".$data->dtsl." and bizid=".$roldet[0]["bizid"];
		$result = $this->model->deleteitem($st);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>'Item Deleted!', 'keycode'=>''));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	function getaccdt($acc, $token){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->accdt($acc, $roldet[0]["bizid"]);
	}
	
	function getautolist($token, $searchstr=""){

		//Logdebug::appendlog($searchstr);
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getjvautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getallautolist($token, $searchstr=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getjvallautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getvoucher($token, $vno){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$data=array();
		if($vno!==""){
			$data["mst"]=$this->model->getglheader($vno,$roldet[0]["bizid"]);
			$data["det"]=$this->model->getgldetail($vno,$roldet[0]["bizid"]);
		}
		echo json_encode($data);
	}
	function getallquot($token, $status){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getallquot($status,$roldet[0]["bizid"]);
	}
}