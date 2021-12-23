<?php

class Pointupload extends Controller{

	private $formfield=array();
	
	function __construct(){
		parent::__construct();
		$this->intializeform();
		
		Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
		}
		$this->view->script=$this->script();
	}
	function init(){
		
		
		Session::set('uploadtoken',uniqid());
        $this->view->token=Session::get('uploadtoken');       
		$this->view->render("templateadmin","abr/pointupload_view");
		
	}

	private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(      	
            "fullname"=>array("ctrlfield"=>"xorg"),						
            "mobile"=>array("ctrlfield"=>"xmobile"),
            "refrin"=>array("ctrlfield"=>"xrdin"),		
			"address"=>array("ctrlfield"=>"xadd1"),
			"cusemail"=>array("ctrlfield"=>"xcusemail")
		);
	}

	function loadbinlist(){
			
		
		try{
			if(Session::get('uploadtoken')!=$_POST['token']){
				throw new Exception(serialize(array('field'=>'Token', 'response'=>' mismatch! Please refresh!')));
			}

			echo json_encode($this->model->getbinlist());

		}catch(Exception $e){
			$res = unserialize($e->getMessage()); 
			
			echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
			
		}
	}

	function loadbalance(){
		if(Session::get('uploadtoken')!=$_POST['token']){
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
		$bv = $_POST['bv'];

		$stno = $this->model->getSatementNo();

		$balance = $this->model->pointbal()[0]['pointbal'];

		$bininfo = $this->model->bininfo($bin);
		
		try{

			if(!is_numeric($bin)){
				throw new Exception(serialize(array('result'=>'error','field'=>"Bin", 'response'=>' is not valid!')));
			}
			if($bv<=0){
				throw new Exception(serialize(array('result'=>'error','field'=>"BV", 'response'=>' is not valid!')));
			}
			
			if(count($this->model->checkupload($bin))>0){
				throw new Exception(serialize(array('result'=>'error','field'=>"Bin", 'response'=>' BV already uploaded!')));
			}
			
			if(Session::get('uploadtoken')!=$_POST['token']){
				throw new Exception(serialize(array('field'=>'Token', 'response'=>' mismatch! Please refresh!')));
			}
			if(count($bininfo)==0){
				throw new Exception(serialize(array('result'=>'error','field'=>"Bin", 'response'=>' is not valid!')));
			}
			if(floatval($bininfo[0]['centerpoint'])>499){
				throw new Exception(serialize(array('result'=>'error','field'=>"Bin", 'response'=>' is not eligible!')));
			}
			$mybin=$this->model->getmybin($bin);

			if($balance<$bv){
				throw new Exception(serialize(array('result'=>'error','field'=>"Balance", 'response'=>' is not enough!')));
			}
			
			if(count($mybin)==0){
				throw new Exception(serialize(array('result'=>'error','field'=>"BIN", 'response'=>' not in list!')));
			}

			//Logdebug::appendlog($bv);

			$data['bizid']=100;
			$data['xdate']=$date;
			$data['bin']=$bin;
			$data['point']=$bv;
			$data['stno']=$stno;
			$data['distrisl']=Session::get('sdistrisl');
			$data['xcus']=$mybin[0]['xcus'];
			$data['zemail']=Session::get('suser'); 
			$data['xdoctype']="BV Upload";
			$data['xdocnum']="0";
			$data['xsign']=-1;
			$data['xyear']=$year;
			$data['xper']=$month;

			$success = $this->model->uploadmybv($data);
			
			if($success>0){				
				echo json_encode(array('result'=>'success','message'=>$bv.' bv uploaded successfully!!'));
			}
			else{
				echo json_encode(array('result'=>'error','message'=>'Unable to upload bv!'));
			}

		}catch(Exception $e){
			$res = unserialize($e->getMessage()); 
			
			echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
			
		}

		
	}
	
	

	function script(){
		return "
			<script>
			function loadbin(){
				$.ajax({
                        
					url:\"".URL."bvupload/loadbinlist\", 
					type : \"POST\",                                  				
					data : {token: $('#token').val() },                   
					beforeSend:function(){	
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
                        
					url:\"".URL."bvupload/loadbalance\", 
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
				loadbin();
				$('#cusreg').on('click', function(){

					console.log(lgdata[548937])
					
				})
				for(var i=0; i<500;){
					
					if(i>=100){
						i+=50;
						$('#bv').append('<option value=\"'+i+'\">'+i+'</option>');
					}else{
						i=i+5;
						$('#bv').append('<option value=\"'+i+'\">'+i+'</option>');
					}

				}
				$('#upload').on('click', function(){
					
					$.ajax({
                        
						url:\"".URL."bvupload/uploadbv\", 
						type : \"POST\",                                  				
						data : { bin: $('#bin').val(),bv: $('#bv').val(), token: $('#token').val() },                   
						beforeSend:function(){	
								$('#resultalert').addClass('alert-dark');
								$('#resultalert').removeClass('alert-primary');
								$('#resultalert').removeClass('alert-danger');
							loaderon(); 
							  
						},
						success : function(result) {
							
							loaderoff();
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