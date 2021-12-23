<?php 
class Quotation extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function init(){
		echo "Quotation initiated...";
	}
	
		
	function createquotation(){
		$data = json_decode(file_get_contents("php://input"));
		
		//Logdebug::appendlog(serialize($data));		
		$token = $data->token;
		$apikey = $data->apikey;
		
		if(API_KEY!==$apikey){
			echo json_encode(array('result'=>'error','response'=>'0','message'=>'Api Key Mismatch!'));
			exit;
		}
		
		if($data->cuscode==""){
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
			if($dataarray[$i]["menu"]==="Sales Quotation"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$quotno = $data->quotno;
		if($quotno==="")
			$quotno = $this->model->getquotno($roldet[0]["bizid"],"soquot","xrefquot",$data->prefix,6);
		
		
		//Logdebug::appendlog($data->validitydate);
		
	$xdate = $data->quotdate;
		$dt = str_replace('/', '-', $xdate);
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date));
		$vdate = $data->validitydate;
		$vdt = str_replace('/', '-', $vdate);
		$valdate = date('Y-m-d', strtotime($vdt));
		//$year=0;
		//$month=0;
		
		$adddata = array(			
			"xquotnum"=>$quotno,			
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],			  
			"xcus"=>$data->cuscode,
			"xdate"=>$date,		    
			"xprefix"=>$data->prefix,
			"xlastquot"=>$quotno,
			"xrefquot"=>$quotno,
			"xcontact"=>$data->cuscontact,
			"xcur"=>$data->currency,
			"xexch"=>$data->exchgrate,
			"xcusdoc"=>$data->cusdoc,			
			"xvaliddate"=>$valdate,
			"xgrossdisc"=>$data->grossdisc,
			"xstatus"=>'Open',
			"xyear"=>$year,
			"xper"=>$month,			
			"xnotes"=>$data->quotnotes,
		);
		
	/*	Logdebug::appendlog("insert into soquot (xquotnum,zemail,bizid,xcus,xdate,xprefix,xlastquot,xrefquot,xcontact,xcur,xexch,xcusdoc,xvaliddate,xgrossdisc,xstatus,xyear,xper,xnotes) value('".$quotno."','".$roldet[0]["zemail"]."','".$roldet[0]["bizid"]."','".$data->cuscode."','".$date."','".$data->prefix."','".$quotno."','".$quotno."','".$data->cuscontact."','".$data->currency."','".$data->exchgrate."','".$data->cusdoc."','".$valdate."','".$data->grossdisc."','Open','0','0','Notes')");*/
		
		$onduplicate = " ON DUPLICATE KEY UPDATE xcus='".$data->cuscode."',
		xcontact='".$data->cuscontact."', xdate='".$date."',xvaliddate='".$valdate."',
		xcur='".$data->currency."', xexch=".$data->exchgrate.", xcusdoc='".$data->cusdoc."',
		xnotes='".$data->quotnotes."', xgrossdisc='".$data->grossdisc."', 
		xyear=".$year.", xper=".$month."";
		
		$cols = "bizid,xdate,xquotnum,xitemcode,xrow,xitembatch,xwh,xbranch,xqty,xrate,
		xunitsale,xcur,xexch,zemail,xtaxrate,xtypestk,xdisc,xtaxcode,xtaxscope,xyear,xper";
		$vals = "";
		$row = $this->model->getrow($roldet[0]["bizid"],$quotno);
		$hasdt = 0; 
		foreach($data->quotationDetail as $key=>$value){ 
			if($value->prodname!=""){
			$itemmaster = $this->model->getitemmaster($roldet[0]["bizid"],$value->itemcode); 	
			$hasdt = 1;
			if($value->dtrow!="0")
				$itemrow = $value->dtrow;
			else
				$itemrow=$row;
			
			$vals .= "(".$roldet[0]["bizid"].",'".$date."', '".$quotno."','".$value->itemcode."',".$itemrow.",'".$value->itemcode."','CW','CW','".$value->qty."',
			'".$value->prodrate."', '".$itemmaster[0]["xunitsale"]."','".$data->currency."',
			'".$data->exchgrate."','".$roldet[0]["zemail"]."',0,'".$itemmaster[0]["xtypestk"]."','".$value->discount."','".$itemmaster[0]["xtaxcodesales"]."','None',".$year.",".$month."),";
			//Logdebug::appendlog($vals);
			if($value->dtrow=="0")
				$row++;
			
				}
			}
		$vals = rtrim($vals,','); 
		//Logdebug::appendlog($vals);
		$onduplicatedt=" ON DUPLICATE KEY UPDATE xdate=VALUES(xdate), xitemcode=VALUES(xitemcode),
		xitembatch=VALUES(xitembatch),xqty=VALUES(xqty),xdisc=VALUES(xdisc),xrate=VALUES(xrate),xunitsale=VALUES(xunitsale),
		xcur=VALUES(xcur),xexch=VALUES(xexch)";
		
		//$onduplicatedt = ""; point 1
		
		$result = 0;
		
		if(intval($data->quotsl) == 0){
			$result = $this->model->create_quotation($adddata, "");
		}else{
			$result = $this->model->create_quotation($adddata, $onduplicate);
			$result = 1;
		}
		
		$resultdt = $result; 
		if($result>0){
			if($hasdt === 1){
				$result = $this->model->create_quotationdt($cols, $vals, $onduplicatedt);
				if($result>0)
					$resultdt = $result;
			}
		}
		
		
		if($resultdt>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$quotno.' Quotation Saved!', 'keycode'=>$quotno));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
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
	
	function getautolist($token, $searchstr=""){
		//Logdebug::appendlog($searchstr);
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getquotautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getallautolist($token, $searchstr=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getquotallautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getquot($token, $quotno){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		$data=array();
		if($quotno!==""){
			$data["mst"]=$this->model->getquot($quotno,$roldet[0]["bizid"]);
			$data["det"]=$this->model->getquotdet($quotno,$roldet[0]["bizid"]);
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