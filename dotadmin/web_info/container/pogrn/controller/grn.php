<?php 
class Grn extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function init(){
		echo "GRN initiated...";
	}
	
		
	function creategrn(){
		$data = json_decode(file_get_contents("php://input"));
		
		//Logdebug::appendlog(serialize($data));		
		$token = $data->token;
		$apikey = $data->apikey;
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'error','response'=>'0','message'=>'Api Key Mismatch!'));
			exit;
		}
		
		if($data->supcode==""){
			echo json_encode(array('result'=>'no error', 'response'=> '0','message'=>'Supplier Not Found!', 'keycode'=>''));
			exit;
		}
		if($data->currency==""){
			echo json_encode(array('result'=>'no error', 'response'=> '0','message'=>'Currency Not Found!', 'keycode'=>''));
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
			if($dataarray[$i]["menu"]==="Goods Received Note"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$grnno = $data->grnno;
		if($grnno==="")
			$grnno = $this->model->getgrnno($roldet[0]["bizid"],"pogrnmst","xgrnnum",$data->prefix,6);
		
		$year = date('Y',strtotime($data->grndate));
		$month = date('m',strtotime($data->grndate)); 
		//$year=0;
		//$month=0;
		
		$adddata = array(			
			"xgrnnum"=>$grnno,			
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],			  
			"xsup"=>$data->supcode,
			"xdate"=>$data->grndate,		    
			"xprefix"=>$data->prefix,			
			"xcontact"=>$data->supcontact,
			"xcur"=>$data->currency,
			"xexch"=>$data->exchgrate,
			"xsupdoc"=>$data->supdoc,
			"xgrossdisc"=>$data->grossdisc,
			"xstatus"=>'Open',
			"xyear"=>$year,
			"xper"=>$month,			
			"xnotes"=>$data->grnnotes,
		);
		
		//$logmst = "insert into pogrnmst (xgrnnum,zemail,bizid,xsup,xdate,xprefix,xcontact,xcur,xexch,xsupdoc,xgrossdisc,xstatus,xyear,xper,xnotes)
		//values('".$sono."','".$roldet[0]["zemail"]."','".$roldet[0]["bizid"]."','".$data->cuscode."',
		//'".$data->salesdate."','".$data->prefix."','".$data->cuscontact."','".$data->currency."','".$data->exchgrate."'
		//,'".$data->cusdoc."','".$data->grossdisc."','Open','".$year."','".$month."','".$data->salesnotes."')";
		
		//Logdebug::appendlog($logmst);
		
		$onduplicate = " ON DUPLICATE KEY UPDATE xsup='".$data->supcode."',
		xcontact='".$data->supcontact."', xdate='".$data->grndate."',
		xcur='".$data->currency."', xexch=".$data->exchgrate.", xsupdoc='".$data->supdoc."',
		xnotes='".$data->grnnotes."', xgrossdisc='".$data->grossdisc."', 
		xyear=".$year.", xper=".$month."";
		
		$cols = "bizid,xdate,xgrnnum,xitemcode,xrow,xitembatch,xwh,xbranch,xqty,xrate,xstdcost,
		xunitstk,xcur,xexch,zemail,xtaxrate,xtypestk,xdisc,xtaxcode,xtaxscope,xyear,xper";
		$vals = "";
		$row = $this->model->getrow($roldet[0]["bizid"],$grnno);
		$hasdt = 0; 
		foreach($data->mstDetail as $key=>$value){
			if($value->prodname!==""){
			$itemmaster = $this->model->getitemmaster($roldet[0]["bizid"],$value->itemcode);	
			$hasdt = 1;
			if($value->dtrow!="0")
				$itemrow = $value->dtrow;
			else
				$itemrow=$row;
			
			$vals .= "(".$roldet[0]["bizid"].",'".$data->grndate."', '".$grnno."','".$value->itemcode."',".$itemrow.",'".$value->itemcode."','CW','CW','".$value->qty."',
			'".$value->prodrate."','".$value->prodrate."', '".$itemmaster[0]["xunitstk"]."','".$data->currency."',
			'".$data->exchgrate."','".$roldet[0]["zemail"]."',0,'".$itemmaster[0]["xtypestk"]."','".$value->discount."','".$itemmaster[0]["xtaxcodesales"]."','None',".$year.",".$month."),";
			
			if($value->dtrow=="0")
				$row++;
			
				}
			}
		$vals = rtrim($vals,','); 
		Logdebug::appendlog("insert into pogrndet (".$cols.") values ".$vals);
		$onduplicatedt=" ON DUPLICATE KEY UPDATE xdate=VALUES(xdate), xitemcode=VALUES(xitemcode),
		xitembatch=VALUES(xitembatch),xqty=VALUES(xqty),xdisc=VALUES(xdisc),xrate=VALUES(xrate),xunitstk=VALUES(xunitstk),
		xcur=VALUES(xcur),xexch=VALUES(xexch), xstdcost=VALUES(xstdcost)";
		
		//$onduplicatedt = ""; point 1
		
		$result = 0;
		
		if(intval($data->grnsl) == 0){
			$result = $this->model->create_grn($adddata, "");
		}else{
			$result = $this->model->create_grn($adddata, $onduplicate);
			$result = 1;
		}
		
		$resultdt = $result; 
		if($result>0){
			if($hasdt === 1){
				$result = $this->model->create_grndt($cols, $vals, $onduplicatedt);
				if($result>0)
					$resultdt = $result;
			}
		}
		//Logdebug::appendlog($resultdt);
		
		if($resultdt>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$grnno.' GRN Created!', 'keycode'=>$grnno));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	
	function deletegrnitem(){
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
		$st = "delete from pogrndet where xgrndetsl=".$data->dtsl." and bizid=".$roldet[0]["bizid"];
		//Logdebug::appendlog($st);
		$result = $this->model->deleteitem($st);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>'Item Deleted!', 'keycode'=>''));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
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
		$st = "update pogrnmst set xstatus='Confirmed' where xstatus='Open' and xgrnsl=".$data->dtsl." and bizid=".$roldet[0]["bizid"];
		//Logdebug::appendlog($st);
		$result = $this->model->executest($st);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> 'Confirmed','message'=>'GRN Confirmed!', 'keycode'=>''));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '','message'=>'Confirm Operation Failed!'));
		
	}
	function cancel(){
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
		$st = "update pogrnmst set xstatus='Canceled' where xstatus='Confirmed' and xgrnsl=".$data->dtsl." and bizid=".$roldet[0]["bizid"];
		//Logdebug::appendlog($st);
		$result = $this->model->executest($st);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> 'Canceled','message'=>'GRN Canceled!', 'keycode'=>''));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '','message'=>'Cancel Operation Failed!'));
		
	}
	
	function getautolist($token, $searchstr=""){
		//Logdebug::appendlog($searchstr);
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getgrnautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getallautolist($token, $searchstr=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getgrnallautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getgrn($token, $grnno){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$data=array();
		if($grnno!==""){
			$data["mst"]=$this->model->getgrn($grnno,$roldet[0]["bizid"]);
			$data["det"]=$this->model->getgrndet($grnno,$roldet[0]["bizid"]);
		}
		echo json_encode($data);
	}
	function getallgrn($token, $status){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getallgrn($status,$roldet[0]["bizid"]);
	}
}