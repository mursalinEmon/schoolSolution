<?php 
class Purchase extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function init(){
		echo "Purchase initiated...";
	}
	
		
	function createinternationalpo(){
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
			if($dataarray[$i]["menu"]==="International Purchase Order"){
				$menuauth=$dataarray[$i]["action"];
			}			
		}	
		
		if($menuauth!=="Insert" && $menuauth!=="Insert Update" && $menuauth!=="Insert Update Delete"){
			echo json_encode(array('result'=>'error','response'=>'','message'=>'You are not autherized!'));
			exit;
		}
		
		$pono = $data->pono;
		if($pono==="")
			$pono = $this->model->getpono($roldet[0]["bizid"],"pomst","xponum",$data->prefix,6);
		
		
		
		
		//$year = date('Y',strtotime($date));
		//$month = date('m',strtotime($date)); 
		$year=0;
		$month=0;
		
		$adddata = array(			
			"xponum"=>$pono,			
			"zemail"=>$roldet[0]["zemail"],
			"bizid" => $roldet[0]["bizid"],			  
			"xsup"=>$data->supcode,
			"xdate"=>$data->podate,		    
			"xprefix"=>$data->prefix,
			"xcorto"=>$data->supcontact,
			"xcur"=>$data->currency,
			"xexch"=>$data->exchgrate,
			"xsupdoc"=>$data->supdoc,
			"xlcno"=>$data->lcno,
			"xlcdate"=>$data->lcdate,
			"xpino"=>$data->pino,
			"xpidate"=>$data->pidate,
			"xghodate"=>$data->ghodate,
			"xdeldate"=>$data->deldate,
			"xeta"=>$data->eta,
			"xetd"=>$data->etd,
			"xshipterm"=>$data->shipterm,
			"xshipvia"=>$data->shipvia,
			"xstatus"=>'Open',
			"xyear"=>$year,
			"xper"=>$month,
			"xpotype"=>'International Purchase',
			"xnotes"=>$data->ponotes,
		);
		
		
		$onduplicate = " ON DUPLICATE KEY UPDATE xsup='".$data->supcode."',
		xcorto='".$data->supcontact."', xdate='".$data->podate."', xcorto='".$data->supcontact."',
		xcur='".$data->currency."', xexch=".$data->exchgrate.", xsupdoc='".$data->supdoc."',
		xlcno='".$data->lcno."', xlcdate='".$data->lcdate."',xpino='".$data->pino."',
		xpidate='".$data->pidate."',xghodate='".$data->ghodate."',xdeldate='".$data->deldate."',
		xeta='".$data->eta."',xetd='".$data->etd."',xshipterm='".$data->shipterm."',
		xnotes='".$data->ponotes."',xshipvia='".$data->shipvia."', xyear=".$year.", xper=".$month."";
		
		$cols = "bizid,xdate,xponum,xitemcode,xrow,xitembatch,xwh,xbranch,xqty,xratepur,
		xunitpur,xunitstk,xcur,xexch,zemail,xtaxrate,xtypestk,xdisc,xtaxcode,xtaxscope";
		$vals = "";
		$row = $this->model->getrow($roldet[0]["bizid"],$pono);
		$hasdt = 0; 
		foreach($data->purchaseDetail as $key=>$value){
			if($value->prodname!==""){
			$hasdt = 1;		
			if($value->dtrow!="0")
				$itemrow = $value->dtrow;
			else
				$itemrow=$row;
			
			$vals .= "(".$roldet[0]["bizid"].",'".$data->podate."', '".$pono."','".$value->itemcode."',".$itemrow.",'".$value->itemcode."','CW','CW','".$value->qty."',
			'".$value->prodrate."', 'PC', 'PC','".$data->currency."',
			'".$data->exchgrate."','".$roldet[0]["zemail"]."',0,'None',0,'None','None'),";
			
			if($value->dtrow=="0")
				$row++;
			
				}
			}
		$vals = rtrim($vals,','); 
		//Logdebug::appendlog($vals);
		$onduplicatedt=" ON DUPLICATE KEY UPDATE xdate=VALUES(xdate), xitemcode=VALUES(xitemcode),
		xitembatch=VALUES(xitembatch),xqty=VALUES(xqty),xratepur=VALUES(xratepur),xunitpur=VALUES(xunitpur),
		xunitstk=VALUES(xunitstk),xcur=VALUES(xcur),xexch=VALUES(xexch)";
		
		//$onduplicatedt = ""; point 1
		
		$result = 0;
		
		if(intval($data->posl) === 0){
			$result = $this->model->create_international_po($adddata, $onduplicate);
		}else{//Logdebug::appendlog($data->posl);
			$result = $this->model->create_international_po($adddata, $onduplicate);
			$result = 1;
		}
		
		//Logdebug::appendlog($result.'-'.$hasdt);
		if($result>0){
			if($hasdt === 1){//Logdebug::appendlog(3);
				$result = $this->model->create_international_podt($cols, $vals, $onduplicatedt);
			}
		}
		
		
		if($result>0){			
			echo json_encode(array('result'=>'no error', 'response'=> $result,'message'=>$pono.' PO Saved!', 'keycode'=>$pono));
		}
		else
			echo json_encode(array('result'=>'error', 'response'=> '0','message'=>'Operation Failed!'));
		
	}
	
	function deletepoitem(){
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
		$st = "delete from podet where xpodetsl=".$data->dtsl." and bizid=".$roldet[0]["bizid"];
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
			$this->model->getpoautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getallautolist($token, $searchstr=""){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		if($searchstr!=="")
			$this->model->getpoallautolist($searchstr, $roldet[0]["bizid"]);
	}
	
	function getpo($token, $pono){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
		if($pono!=="")
			$this->model->getpo($pono,$roldet[0]["bizid"]);
	}
}