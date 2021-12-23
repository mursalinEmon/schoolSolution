<?php 
class Ecomorder extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function init(){
		echo "Sales Order initiated...";
		
		$this->model->getroledt("a8b594af4049cfd51a52012ee22bf603d0b31b137b081c579b1da224bb3f8f2f");
	}
	
		
	function createsales(){
		$data = json_decode(file_get_contents("php://input"));
		
		//Logdebug::appendlog(serialize($data->paymethod));		
		$token = $data->token;
		$apikey = $data->apikey;
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'error','response'=>'0','message'=>'Api Key Mismatch!'));
			exit;
		}
		
				
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>'Token Mismatch!'));
			exit;
		}
		$totalamount=0;
		foreach($data->cartitem as $key=>$value){
			$itemmaster = $this->model->getitemmaster($roldet[0]["bizid"],$value->id);
			$totalamount=$totalamount+($itemmaster[0]["xstdprice"]*$value->cartCount);
		}
		$bal = $this->model->getPwalletbalance($roldet[0]["zemail"]);
				
		if($bal<$totalamount){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>'Insufficient Balance!'));
			exit;
		}
		$date = date("Y-m-d");

		$purchasetime=date("Y-m-d H:i:s");
		
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date));
		
		//$year=0;
		//$month=0;
		$stno = $this->model->getStNo();
		$adddata = array(			
			"bizid" => $roldet[0]["bizid"],			  
			"zemail"=>$roldet[0]["zemail"],
			"xcus"=>$roldet[0]["zemail"],
			"xdate"=>$date,		    					
			"xdelname"=>$data->del->firstName,
			"xcur"=>'BDT',			
			"xdeladdress"=>$data->del->address,			
			"xstatus"=>'Pending',
			"xyear"=>$year,
			"xper"=>$month,					
			"xdelcompany"=>$data->del->company,	
			"xdelemail"=>$data->del->email,				
			"xmobile"=>$data->del->phone,	
			"xdistrict"=>$data->del->country,	
			"xthana"=>$data->del->city,	
			"xpostal"=>$data->del->zip,	
			"xpaymethod"=>$data->paymethod->paymentMethod->value,
			"xdelmethod"=>$data->delmethod->deliveryMethod->name,
			"stno"=>$stno
		);
		
		//z$logmst = "insert into somst (xsonum,zemail,bizid,xcus,xdate,xprefix,xcontact,xcur,xexch,xcusdoc,xgrossdisc,xstatus,xyear,xper,xnotes)
		//values('".$sono."','".$roldet[0]["zemail"]."','".$roldet[0]["bizid"]."','".$data->cuscode."',
		//'".$date."','".$data->prefix."','".$data->cuscontact."','".$data->currency."','".$data->exchgrate."'
		//,'".$data->cusdoc."','".$data->grossdisc."','Open','".$year."','".$month."','".$data->salesnotes."')";
		
		//Logdebug::appendlog($logmst);
			$result = 0;
		
			$invoice="";
			$result = $this->model->create_sales($adddata);
			
			$invoice=$result;
		
		$cols = "bizid,xdate,xecomsl,xitemcode,xrow,xitembatch,xwh,xbranch,xqty,xrate,xcost,
		xunitsale,xcur,xexch,zemail,xtaxrate,xtypestk,xdisc,xtaxcode,xtaxscope,xyear,xper,xpoint,xcus,xpaymethod,stno";
		$vals = "";
		$row = 1;
		$hasdt = 0; 
		$totals=0;
		foreach($data->cartitem as $key=>$value){
			if($value->id!==""){
			$itemmaster = $this->model->getitemmaster($roldet[0]["bizid"],$value->id);
			//$itemcost = $this->model->getitemcost($roldet[0]["bizid"],$value->id);
			$cst = 0;
			//$totals=$totals+($itemmaster[0]["xstdprice"]*$value->cartCount);
			//if(count($itemcost)>0){
			//	$cst = $itemcost[0]['xcost'];
			//}			
			
			$vals .= "(".$roldet[0]["bizid"].",'".$date."', '".$result."','".$value->id."',".$row.",'".$value->id."','CW','CW','".$value->cartCount."',
			'".$itemmaster[0]["xstdprice"]."','".$itemmaster[0]["xpricepur"]."', '".$itemmaster[0]["xunitsale"]."','BDT',
			'1','".$roldet[0]["zemail"]."',0,'','".$value->discount."','','None',".$year.",".$month.",'".$itemmaster[0]["xpoint"]."','".$roldet[0]["zemail"]."','".$data->paymethod->paymentMethod->value."',".$stno."),";
			
			
				$row++;
			
			}
		}
		$vals = rtrim($vals,',');
		//Logdebug::appendlog($vals);
				
				
		 
		if($result>0){
			
				$result = $this->model->create_salesdt($cols, $vals);
				
		}
		
		//$body = "Mr/Mrs. ".$data->name.", Thanks for your purchase order. Invoice : ".$invoice." Purchase Time: ".$purchasetime.".. Total:".." Thank You.";
		//$sms = new Sendsms();
		
		if($result>0){	
			//$smsresult = $sms->send_sms($body, $data->del->phone);		
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$result.' Sales Order Saved!', 'keycode'=>$result));
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
		
		$cols = "bizid,xdate,xreqdelnum,xquotnum,xitemcode,xrow,xitembatch,xwh,xbranch,xqty,xrate,xstdcost,
				xunit,xcur,xexch,zemail,xtaxrate,xtypestk,xdisc,xtaxcode,xtaxscope,xyear,xper";
			
		foreach($data->mstDetail as $key=>$value){
			
			$itemmaster = $this->model->getitemmaster($roldet[0]["bizid"],$value->itemcode);
			$itemcost = $this->model->getitemcost($roldet[0]["bizid"],$value->itemcode);
			
			
			$vals .= "(".$roldet[0]["bizid"].",'".$date."', '".$txnno."','".$data->quotno."','".$value->itemcode."',".$itemrow.",'".$value->itemcode."','CW','CW','".$value->qty."',
			'".$value->prodrate."','".$itemcost[0]['xcost']."', '".$itemmaster[0]["xunitsale"]."','".$data->currency."',
			'".$data->exchgrate."','".$roldet[0]["zemail"]."',0,'".$itemmaster[0]["xtypestk"]."','".$value->discount."','".$itemmaster[0]["xtaxcodesales"]."','None',".$year.",".$month."),";
				
			}
		
			
	}
	
	function deletesalesitem(){
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
		$st = "delete from sodet where sodetsl=".$data->dtsl." and bizid=".$roldet[0]["bizid"];
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
		$st = "update somst set xstatus='Confirmed' where xstatus='Open' and sosl=".$data->dtsl." and bizid=".$roldet[0]["bizid"];
		//Logdebug::appendlog($st);
		$result = $this->model->executest($st);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> 'Confirmed','message'=>'Sales Order Confirmed!', 'keycode'=>''));
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
		$st = "update somst set xstatus='Canceled' where xstatus='Confirmed' and sosl=".$data->dtsl." and bizid=".$roldet[0]["bizid"];
		//Logdebug::appendlog($st);
		$result = $this->model->executest($st);
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> 'Canceled','message'=>'Sales Order Canceled!', 'keycode'=>''));
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
			$this->model->getsalesautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getallautolist($token, $searchstr=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getsalesallautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getsales($token, $sono){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$data=array();
		if($sono!==""){
			$data["mst"]=$this->model->getsales($sono,$roldet[0]["bizid"]);
			$data["det"]=$this->model->getsalesdet($sono,$roldet[0]["bizid"]);
		}
		echo json_encode($data);
	}
	function getallsales($token){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->getallsales($roldet[0]["bizid"], $roldet[0]["zemail"]);
	}
	function getcombal($token){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$this->model->comBal($roldet[0]['zemail']);
	}
	function pwalletbalance($token){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		echo json_encode($this->model->getPwalletbalance($roldet[0]["zemail"]));
	}
}