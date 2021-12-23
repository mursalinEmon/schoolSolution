<?php 
class Delivery extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function init(){
		echo "Delivery Order initiated...";
	}
	
		
	function createdelivery(){
		$data = json_decode(file_get_contents("php://input"));
		
		//Logdebug::appendlog(serialize($data));		
		$token = $data->token;
		$apikey = $data->apikey;
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'error','response'=>'0','message'=>'Api Key Mismatch!'));
			exit;
		}
		
		if($data->cuscode==""){
			echo json_encode(array('result'=>'no error', 'response'=> '0','message'=>'Customer Not Found!', 'keycode'=>''));
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
			if($dataarray[$i]["menu"]==="Delivery Order"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$sono = $data->delno;
		if($sono==="")
			$sono = $this->model->getsono($roldet[0]["bizid"],"imreqdelmst","xreqdelnum",$data->prefix,6);
		
		
		$xdate = $data->deldate;
		$dt = str_replace('/', '-', $xdate);
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date)); 
		//Logdebug::appendlog($sono);
		$adddata = array(			
			"xreqdelnum"=>$sono,			
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],			  
			"xcus"=>$data->cuscode,			
			"xdate"=>$date,		    
			"xprefix"=>$data->prefix,			
			"xcontact"=>$data->cuscontact,
			"xcur"=>$data->currency,
			"xexch"=>$data->exchgrate,
			"xcusdoc"=>$data->cusdoc,
			"xgrossdisc"=>$data->grossdisc,
			"xstatus"=>'Open',
			"xyear"=>$year,
			"xper"=>$month,			
			"xnotes"=>$data->salesnotes,
		);
		
	//	$logmst = "insert into somst (xreqdelnum,zemail,bizid,xcus,xdate,xprefix,xcontact,xcur,xexch,xcusdoc,xgrossdisc,xstatus,xyear,xper,xnotes)
	//	values('".$sono."','".$roldet[0]["zemail"]."','".$roldet[0]["bizid"]."','".$data->cuscode."',
	//	'".$date."','".$data->prefix."','".$data->cuscontact."','".$data->currency."','".$data->exchgrate."'
	//	,'".$data->cusdoc."','".$data->grossdisc."','Open','".$year."','".$month."','".$data->salesnotes."')";
		
	//	Logdebug::appendlog($logmst);
		
		$onduplicate = " ON DUPLICATE KEY UPDATE xcus='".$data->cuscode."',
		xcontact='".$data->cuscontact."', xdate='".$date."',
		xcur='".$data->currency."', xexch=".$data->exchgrate.", xcusdoc='".$data->cusdoc."',
		xnotes='".$data->salesnotes."', xgrossdisc='".$data->grossdisc."', 
		xyear=".$year.", xper=".$month."";
		
		$cols = "bizid,xdate,xreqdelnum,xitemcode,xrow,xitembatch,xwh,xbranch,xqty,xrate,xstdcost,
		xunit,xcur,xexch,zemail,xtaxrate,xtypestk,xdisc,xtaxcode,xtaxscope,xyear,xper";
		$vals = "";
		$row = $this->model->getrow($roldet[0]["bizid"],$sono);
		$hasdt = 0; 
		foreach($data->mstDetail as $key=>$value){
			if($value->prodname!==""){
			$itemmaster = $this->model->getitemmaster($roldet[0]["bizid"],$value->itemcode);
			$itemcost = $this->model->getitemcost($roldet[0]["bizid"],$value->itemcode);
			$cst = 0;
			if(count($itemcost)>0){
				$cst = $itemcost[0]['xcost'];
			}		
			
			$hasdt = 1;
			if($value->dtrow!="0")
				$itemrow = $value->dtrow;
			else
				$itemrow=$row;
			
			$vals .= "(".$roldet[0]["bizid"].",'".$date."', '".$sono."','".$value->itemcode."',".$itemrow.",'".$value->itemcode."','CW','CW','".$value->qty."',
			'".$value->prodrate."','".$cst."', '".$itemmaster[0]["xunitsale"]."','".$data->currency."',
			'".$data->exchgrate."','".$roldet[0]["zemail"]."',0,'".$itemmaster[0]["xtypestk"]."','".$value->discount."','".$itemmaster[0]["xtaxcodesales"]."','None',".$year.",".$month."),";
			
			if($value->dtrow=="0")
				$row++;
			
				}
			}
		$vals = rtrim($vals,','); 
		//Logdebug::appendlog("insert into (".$cols.") values ". $vals);
		$onduplicatedt=" ON DUPLICATE KEY UPDATE xdate=VALUES(xdate), xitemcode=VALUES(xitemcode),
		xitembatch=VALUES(xitembatch),xqty=VALUES(xqty),xdisc=VALUES(xdisc),xrate=VALUES(xrate),xunit=VALUES(xunit),
		xcur=VALUES(xcur),xexch=VALUES(xexch)";
		
		//$onduplicatedt = ""; point 1
		
		$result = 0;
		
		if(intval($data->delsl) == 0){ //Logdebug::appendlog(serialize($adddata));
			$result = $this->model->create_delivery($adddata, "");
		}else{
			$result = $this->model->create_delivery($adddata, $onduplicate);
			$result = 1;
		}
		
		$resultdt = $result; 
		if($result>0){
			if($hasdt === 1){
				$result = $this->model->create_deliverydt($cols, $vals, $onduplicatedt);
				if($result>0)
					$resultdt = $result;
			}
		}
		
		
		if($resultdt>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$sono.' Delivery Order Saved!', 'keycode'=>$sono));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	
	function createfromquot(){
		$data = json_decode(file_get_contents("php://input"));
		
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
			if($dataarray[$i]["menu"]==="Sales Quotation"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		
		$sono = $this->model->getsono($roldet[0]["bizid"],"somst","xsonum",'SORD',6);
		
		$dt = date($data->quotdate);
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date)); 
		
		$mstdata = "insert into somst (xsonum,xquotnum,zemail,bizid,xcus,xdate,xprefix,xcontact,xcur,xexch,xcusdoc,xgrossdisc,xstatus,xyear,xper)
		values ('".$sono."','".$data->quotno."','".$roldet[0]["zemail"]."','".$roldet[0]["bizid"]."','".$data->cuscode."','".$date."',
		'SORD','".$data->cuscontact."','".$data->currency."',".$data->exchgrate.",'".$data->cusdoc."',".$data->grossdisc.",
		'Confirmed',".$year.",".$month.")";
		
		$cols = "bizid,xdate,xsonum,xitemcode,xrow,xitembatch,xwh,xbranch,xqty,xrate,xstdcost,
				xunitsale,xcur,xexch,zemail,xtaxrate,xtypestk,xdisc,xtaxcode,xtaxscope,xyear,xper";
			
		foreach($data->mstDetail as $key=>$value){
			
			$itemmaster = $this->model->getitemmaster($roldet[0]["bizid"],$value->itemcode);
			$itemcost = $this->model->getitemcost($roldet[0]["bizid"],$value->itemcode);
			
			
			$vals .= "(".$roldet[0]["bizid"].",'".$date."', '".$sono."','".$value->itemcode."',".$itemrow.",'".$value->itemcode."','CW','CW','".$value->qty."',
			'".$value->prodrate."','".$itemcost[0]['xcost']."', '".$itemmaster[0]["xunitsale"]."','".$data->currency."',
			'".$data->exchgrate."','".$roldet[0]["zemail"]."',0,'".$itemmaster[0]["xtypestk"]."','".$value->discount."','".$itemmaster[0]["xtaxcodesales"]."','None',".$year.",".$month."),";
			
			
				
			}
		
			
	}
	
	function deliveryfromquot(){
		$data = json_decode(file_get_contents("php://input"));
		
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
			if($dataarray[$i]["menu"]==="Sales Quotation"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$prefx = "DEL0";
		$txnno = $this->model->getsono($roldet[0]["bizid"],"imreqdelmst","xreqdelnum",$prefx,6);
		
		$dt = date($data->quotdate);
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date)); 
		
		$mstdata = "insert into imreqdelmst (xreqdelnum,xquotnum,zemail,bizid,xcus,xdate,xprefix,xcontact,xcur,xexch,xcusdoc,xgrossdisc,xstatus,xyear,xper)
		values ('".$txnno."','".$data->quotno."','".$roldet[0]["zemail"]."','".$roldet[0]["bizid"]."','".$data->cuscode."','".$date."',
		'".$prefx."','".$data->cuscontact."','".$data->currency."',".$data->exchgrate.",'".$data->cusdoc."',".$data->grossdisc.",
		'Confirmed',".$year.",".$month.")";
		
		$cols = "bizid,xdate,xreqdelnum,xitemcode,xrow,xitembatch,xwh,xbranch,xqty,xrate,xstdcost,
		xunit,xcur,xexch,zemail,xtaxrate,xtypestk,xdisc,xtaxcode,xtaxscope,xyear,xper";
			
		foreach($data->mstDetail as $key=>$value){
			
			$itemmaster = $this->model->getitemmaster($roldet[0]["bizid"],$value->itemcode);
			$itemcost = $this->model->getitemcost($roldet[0]["bizid"],$value->itemcode);
			
			
			$vals .= "(".$roldet[0]["bizid"].",'".$date."', '".$sono."','".$value->itemcode."',".$itemrow.",'".$value->itemcode."','CW','CW','".$value->qty."',
			'".$value->prodrate."','".$cst."', '".$itemmaster[0]["xunitsale"]."','".$data->currency."',
			'".$data->exchgrate."','".$roldet[0]["zemail"]."',0,'".$itemmaster[0]["xtypestk"]."','".$value->discount."','".$itemmaster[0]["xtaxcodesales"]."','None',".$year.",".$month."),";
			
			}
		
			
	}
	
	function deletedelitem(){
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
		$st = "delete from imreqdeldet where xreqdeldetsl=".$data->dtsl." and xstatus not in ('Confirmed', 'Canceled') and bizid=".$roldet[0]["bizid"];
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
		$st = "update imreqdelmst set xstatus='Confirmed' where xstatus='Open' and ximdelsl=".$data->dtsl." and bizid=".$roldet[0]["bizid"];
		//Logdebug::appendlog($st);
		$result = $this->model->executest($st);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> 'Confirmed','message'=>'Delivery Order Confirmed!', 'keycode'=>''));
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
		$st = "update imreqdelmst set xstatus='Canceled' where xstatus='Confirmed' and ximdelsl=".$data->dtsl." and bizid=".$roldet[0]["bizid"];
		//Logdebug::appendlog($st);
		$result = $this->model->executest($st);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> 'Canceled','message'=>'Delivery Order Canceled!', 'keycode'=>''));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '-','message'=>'Cancel Operation Failed!'));
		
	}
	
	function getautolist($token, $searchstr=""){
		//Logdebug::appendlog($searchstr);
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getdeliveryautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getallautolist($token, $searchstr=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getdeliveryallautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getdelivery($token, $sono){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$data=array();
		if($sono!==""){
			$data["mst"]=$this->model->getdelivery($sono,$roldet[0]["bizid"]);
			$data["det"]=$this->model->getdeliverydet($sono,$roldet[0]["bizid"]);
		}
		echo json_encode($data);
	}
	function getalldelivery($token, $status){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getalldelivery($status,$roldet[0]["bizid"]);
	}
}