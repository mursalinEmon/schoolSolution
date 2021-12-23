<?php

class Bcupgrade extends Controller{

	
	
	function __construct(){
		parent::__construct();
		
		
		Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
		}
		$this->view->script=$this->script();
	}
	function init(){
		
		Session::set('upgradetoken',uniqid());
        $this->view->token=Session::get('upgradetoken');       
		$this->view->render("templateadmin","abr/bcupgrade_view");
		
	}


	function loadbinlist(){
			$bintype = $_POST['bintype'];
			
		try{
			if(Session::get('upgradetoken')!=$_POST['token']){
				throw new Exception(serialize(array('field'=>'Token', 'response'=>' mismatch! Please refresh!')));
			}

			if($bintype!='Primary' && $bintype!='WelcomeRetailer' && $bintype!='ExpressRetailer' && $bintype!='PreRetailer'){
				throw new Exception(serialize(array('field'=>'BIN', 'response'=>' type not found!')));
			}

			echo json_encode($this->model->getbinlist($bintype));

		}catch(Exception $e){
			$res = unserialize($e->getMessage()); 
			
			echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
			
		}
	}

	function loadbinpoint(){
		$bin = $_POST['bin'];
		
			try{
			    
			    if($bin==""){
    				throw new Exception(serialize(array('result'=>'error','field'=>"Bin", 'response'=>' is not valid!')));
    			}
				if(Session::get('upgradetoken')!=$_POST['token']){
					throw new Exception(serialize(array('field'=>'Token', 'response'=>' mismatch! Please refresh!')));
				}

				if(!is_numeric($bin)){
					throw new Exception(serialize(array('field'=>'Not', 'response'=>' a valid bin, only number accepted!')));
				}

				$binpoint = $this->model->bininfo($bin)[0]['centerpoint'];
				echo json_encode(array('result'=>'success','message'=>$binpoint));
			}catch(Exception $e){
				$res = unserialize($e->getMessage()); 
				
				echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
				
			}
		}



	function loadbalance(){
		if(Session::get('upgradetoken')!=$_POST['token']){
			echo json_encode(array('result'=>'success','message'=>'Token mismatch!'));
			exit;
		}
		$balance = $this->model->pointbal();
		
		echo json_encode(array('result'=>'success','message'=>$balance[0]['pointbal']));
	}
	
	function uploadbv(){

		$date = date('Y-m-d');
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date)); 

		$bin = $_POST['bin'];
		$bintype = $_POST['bintype'];

		$stno = $this->model->getSatementNo();

		$balance = $this->model->pointbal()[0]['pointbal'];

		$bininfo = $this->model->bininfo($bin);
		
		try{

			$requiredbv = 0;
			if($bintype=='Primary'){
				$requiredbv = 100-floatval($bininfo[0]['centerpoint']);
				$totmatching = $this->model->totalmatching($bin)[0]['totalcom'];
				if(($totmatching/500)>0){
					throw new Exception(serialize(array('result'=>'error','field'=>"Bin", 'response'=>' required steps not comleted!')));	
				}
			}
		    
		    if($bin==""){
				throw new Exception(serialize(array('result'=>'error','field'=>"Bin", 'response'=>' is not valid!')));
			}

			if(!is_numeric($bin)){
				throw new Exception(serialize(array('result'=>'error','field'=>"Bin", 'response'=>' is not valid!')));
			}
			if(count($this->model->checkupload($bin))>0){
				throw new Exception(serialize(array('result'=>'error','field'=>"Bin", 'response'=>' BV already uploaded!')));
			}
			if(Session::get('upgradetoken')!=$_POST['token']){
				throw new Exception(serialize(array('field'=>'Token', 'response'=>' mismatch! Please refresh!')));
			}
			if($bintype!='Primary' && $bintype!='Regular'){
				throw new Exception(serialize(array('result'=>'error','field'=>"Bin", 'response'=>' is not eligible!')));
			}
			
			
			if($bintype=='Regular'){
				$requiredbv = 500-floatval($bininfo[0]['centerpoint']);
			}

			if($requiredbv<=0){
				throw new Exception(serialize(array('result'=>'error','field'=>"Bin", 'response'=>' is not eligible!')));
			}
			//Logdebug::appendlog($balance);
			if($balance<floatval($requiredbv)){
				throw new Exception(serialize(array('result'=>'error','field'=>"Not", 'response'=>' enough bv balance!')));
			}

			$mybin=$this->model->getmybin($bin);
			
			if(count($mybin)==0){
				throw new Exception(serialize(array('result'=>'error','field'=>"BIN", 'response'=>' not in list!')));
			}

			//Logdebug::appendlog($bv);

			$data['bizid']=100;
			$data['xdate']=$date;
			$data['bin']=$bin;
			$data['point']=$requiredbv;
			$data['stno']=$stno;
			$data['binstatus']=$bintype;
			$data['distrisl']=Session::get('sdistrisl');
			$data['xcus']=$mybin[0]['xcus'];
			$data['zemail']=Session::get('suser'); 
			$data['xdoctype']="BC Upgrade";
			$data['xdocnum']="0";
			$data['xsign']=-1;
			$data['xyear']=$year;
			$data['xper']=$month;
			//
			$success = $this->model->uploadmybv($data);
			if($success>0)
				$success = $this->model->updatetree("update mlmtree set  binstatus='".$bintype."' where bin=$bin");
			if($success>0){				
				echo json_encode(array('result'=>'success','message'=>$requiredbv." bv uploaded and binstatus ".$bintype." updated successfully!!"));
			}
			else{
				echo json_encode(array('result'=>'error','message'=>'Unable to upload bv!'));
			}

		}catch(Exception $e){
			$res = unserialize($e->getMessage()); 
			
			echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
			
		}
		//SELECT c.bin,m.xbinstatus FROM `mlmtree` m ,`mlmtree_matching` c WHERE c.lefttotalpoint+c.lefthitpoint>=175000 and c.righttotalpoint+c.righthitpoint>=175000 and m.bin=c.bin
		//SELECT bin FROM `mlmtree_matching` c WHERE c.lefttotalpoint+c.lefthitpoint>=175000 and c.righttotalpoint+c.righthitpoint>=175000 and bin not in (select bin from mlmtree where executivetype='ASO')
		
	}
	
	

	function script(){
		return "
			<script>
			function loadbin(vbintype){
				
				$.ajax({
                        
					url:\"".URL."bcupgrade/loadbinlist\", 
					type : \"POST\",                                  				
					data : {bintype:vbintype, token: $('#token').val() },                   
					beforeSend:function(){	
						$('#bin').html('<option></option>')
						$('#binpoint').html('0');
						loaderon();   
					},
					success : function(result) {
						
						loaderoff();
						const resultobj = JSON.parse(result);
						//console.log(result)
						$.each(resultobj, function(key,val){
							$('#bin').append('<option value=\"'+val['bin']+'\">'+val['bin']+'</option>')
						})
						

					},error: function(xhr, resp, text) {
						loaderoff();
						
						
					}
				})
			}

			function getbalance(){
				
				$.ajax({
                        
					url:\"".URL."bcupgrade/loadbalance\", 
					type : \"POST\",                                  				
					data : { token: $('#token').val() },                   
					beforeSend:function(){	
						loaderon();   
					},
					success : function(result) {
						
						loaderoff();
						const resultobj = JSON.parse(result);
						console.log(result)
						$('#balancebv').html(resultobj['message']);

					},error: function(xhr, resp, text) {
						loaderoff();
						
						
					}
				})
			}

			$(document).ready(function(){
				getbalance()
				var lgdata = {}

				$('#bintstatus').on('change', function(){
					loadbin($('#bintstatus').val());	
				})
				
				$('#bin').on('change', function(){
					
					$.ajax({
                        
						url:\"".URL."bcupgrade/loadbinpoint\", 
						type : \"POST\",                                  				
						data : { bin: $('#bin').val(), token: $('#token').val() },                   
						beforeSend:function(){	
							$('#binpoint').html('0');
							loaderon();   
						},
						success : function(result) {
							
							loaderoff();
							const resultobj = JSON.parse(result);
							console.log(result)
							$('#binpoint').html(resultobj['message']);
	
						},error: function(xhr, resp, text) {
							loaderoff();
							
							
						}
					})
				})
				
				$('#upload').on('click', function(){
					
					$.ajax({
                        
						url:\"".URL."bcupgrade/uploadbv\", 
						type : \"POST\",                                  				
						data : { bin: $('#bin').val(),bintype: $('#bintype').val(), token: $('#token').val() },                   
						beforeSend:function(){	
							$('#resultalert').addClass('alert-dark');
								$('#resultalert').removeClass('alert-primary');
								$('#resultalert').removeClass('alert-danger');
							loaderon();   
						},
						success : function(result) {
							
							loaderoff();
							console.log(result)
							const resultobj = JSON.parse(result);
							getbalance()
							if(resultobj['result']=='success'){
								$('#resultalert').html(resultobj['message'])
								$('#resultalert').removeClass('alert-dark');
								$('#resultalert').addClass('alert-primary');
								$('#resultalert').removeClass('alert-danger');
							}else{
								$('#resultalert').html(resultobj['message'])
								$('#resultalert').removeClass('alert-dark');
								$('#resultalert').removeClass('alert-primary');
								$('#resultalert').addClass('alert-danger');
							}
							
	
						},error: function(xhr, resp, text) {
							loaderoff();
							
							
						}
					})
				})

				
			})
		
			</script>
		";
	}
} 