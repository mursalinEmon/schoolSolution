<?php

class Cusactivate extends Controller{

	private $formfield=array();
	
	function __construct(){
		parent::__construct();
		$this->intializeform();
		$this->view->script=$this->script();
		Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }
	}
	function init(){
		Session::set('custoken',uniqid());
        $this->view->token=Session::get('custoken');       
		$this->view->render("templateadmin","abr/cusactivate_view");
		
	}

	private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(      	
			"cin"=>array("ctrlfield"=>"xcus"),
			"refrin"=>array("ctrlfield"=>"xrdin"),
            "cardlist"=>array("ctrlfield"=>"xid"),
		);
	}

	function loadcard(){
		
		$token = $_POST['token'];
		//Logdebug::appendlog($district);
	   try{
			if(Session::get('custoken')!=$_POST['token']){
				throw new Exception(serialize(array('field'=>'Token', 'response'=>' mismatch! Please refresh!')));
			}
			// Logdebug::appendlog(print_r($this->model->mycardlist(),true));
		   echo json_encode(array('message'=>$this->model->mycardlist(),'result'=>'success'));
	   }catch(Exception $e){
		   $res = unserialize($e->getMessage()); 
	   
		   echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
	   }
	   }

	function showcustomer(){
			
			$inputs = new Form();
		try{
			if(Session::get('custoken')!=$_POST['token']){
				throw new Exception(serialize(array('field'=>'Token', 'response'=>' mismatch! Please refresh!')));
			}

			$inputs ->post("cin")
					->val('minlength', 1)
					->val('maxlength', 20);
					
			$inputs	->submit(); 		

			$inpdata = $inputs->fetch();

			$data = Apptools::form_field_to_data($inpdata, $this->formfield);//Logdebug::appendlog($data['xrdin']);
			//Logdebug::appendlog(print_r($data,true));
			echo json_encode($this->model->getcindt($data['xcus']));

		}catch(Exception $e){
			$res = unserialize($e->getMessage()); 
			
			echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
			
		}
	}
	
	function activatecustomer(){

		$date = date('Y-m-d');
		
		try{
			
			if(Session::get('custoken')!=$_POST['token']){
				throw new Exception(serialize(array('result'=>'error', 'message'=>' mismatch! Please refresh!')));
			}
			
			
			if(!is_numeric($_POST["cardlist"])){
				throw new Exception(serialize(array('result'=>'error','message'=>'No Card No Found!')));
			}

			if(count($this->model->ismycard($_POST["cardlist"]))==0){
				throw new Exception(serialize(array('result'=>'error','message'=>'Not in your stock!')));
			}
			
			$refrin = filter_var($_POST["refrin"], FILTER_SANITIZE_STRING);
			
			if($refrin!=""){
				$refrindet = $this->model->getrindt($refrin);
				if(count($refrindet )==0){
					throw new Exception(serialize(array('result'=>'error','message'=>'No Ref RIN Found!')));
					exit;
				}
			}else{
				throw new Exception(serialize(array('result'=>'error','message'=>'Please provide ref. RIN!')));
				exit;
			}
			
			$inputs = new Form();

			

			$inputs ->post("cin")
					->val('minlength', 1)
					->val('maxlength', 20)

					->post("refrin")
					->val('minlength', 1)
					->val('maxlength', 20)
                    
                    ->post("cardlist")
                    ->val('minlength', 1);
					
			$inputs	->submit(); 		

			$inpdata = $inputs->fetch();

			$data = Apptools::form_field_to_data($inpdata, $this->formfield);
			$data["zutime"]=$date;
			
			$cdata["xcard"]=$data["xid"];
			$cdata["xusedby"]=Session::get('suser');
			$cdata["xcus"]=$data["xcus"];

			$udata["xcardrefrin"] = $data["xrdin"];
			$udata["xid"] = $data["xid"];

			//Logdebug::appendlog(print_r($cdata, true));
			$success = $this->model->save("cashbackcardused",$cdata);
			
			if( (int)$success>0){
				
				$where = " xcus = '".$data["xcus"]."'";
				
				$success = $this->model->activatecustomer("secus",$udata, $where);
				$cardupdate["xsign"]=-1;
				$where = " cardnumber = '".$data["xid"]."'";
				$success = $this->model->activatecustomer("cashbacktxn",$cardupdate, $where);
				$stno = $this->model->getSatementNo();
				$comdata = array(
					'bizid'=>100,
					'xrdin' => $refrin,
					'distrisl' => 0,
					'xdocnum'=>$data["xid"],
					'xcomtype'=>'Cashback Activation Promotion',
					'xdoctype'=>'Cashback Activation Promotion',
					'xcom'=>50,
					'xpaid'=>0,
					'xdate'=>$date,
					'stno'=>$stno,
					'xsrctaxpct'=>0
				);
				$success = $this->model->save("mlmtotrep",$comdata);
				echo json_encode(array('result'=>'success','message'=>'Customer activated!'));
				exit;
			}else{
				echo json_encode(array('result'=>'error','message'=>'Unable to activate cin!'));
				exit;
			}

			

		}catch(Exception $e){
			$res = unserialize($e->getMessage()); 
			
			echo json_encode(array('message'=>"field error",'result'=>'fielderror'));
			
		}

		
	}
	
	function myactivationlist(){
		$this->model->activation();
	}

	function script(){
		return "
			<script>
			$(document).ready(function(){
				
				loadmylist();
				loadcard();

				$('#cusreg').on('click', function(){

					$.ajax({
                        
						url:\"".URL."cusactivate/activatecustomer\", 
						type : \"POST\",                                  				
						data : $('#customerform').serialize(),                 
						beforeSend:function(){	
							loaderon();   
						},
						success : function(result) {
							console.log(result)
							loaderoff();
							const resultobj = JSON.parse(result);
							if(resultobj['result']=='success'){
								
								loadcard();
								$('#resultalert').removeClass('alert-dark')
								$('#resultalert').removeClass('alert-danger')
								
								$('#resultalert').html(resultobj['message'])
								$('#resultalert').addClass('alert-success')
							}else{
								loadcard();
								$('#resultalert').removeClass('alert-dark')
								
								$('#resultalert').removeClass('alert-success')
								$('#resultalert').html(resultobj['message'])
								$('#resultalert').addClass('alert-danger')
							}
						},error: function(xhr, resp, text) {
							loaderoff();
							
							
						}
					})
					
				})
				// $('#refrin').on('blur', function(){
                //     var refrin=$(this).val()
                //     $('#refname').html('')
                //     $.ajax({
                        
                //         url:\"".URL."pos/getrefrin/\"+refrin, 
                //         type : \"GET\",                                  				
                //         datatype:'json',
                //         beforeSend:function(){	
                //             loaderon();   
                //         },
                //         success : function(result) {
                //             //console.log(result)
                //             loaderoff();
                //             const resultobj = JSON.parse(result);
                //             if(resultobj['result']=='success'){
                //                 $('#refname').html(resultobj['message'])
                //             }else{
                //                 console.log(resultobj['message'])
                //             }
                            
                //         },error: function(xhr, resp, text) {
                //             loaderoff();
                            
                //         }
                //     })

                // })
				$('#cin').on('blur', function(){
					$.ajax({
                        
						url:\"".URL."cusactivate/showcustomer\", 
						type : \"POST\",                                  				
						data : {cin: $('#cin').val(), token: $('#token').val() },                   
						beforeSend:function(){	
							loaderon();   
						},
						success : function(result) {
							
							loaderoff();
							const resultobj = JSON.parse(result);
							//console.log(result)
							if(resultobj.length>0){
								$('#cinName').text('Name : '+resultobj[0]['refname'])
								$('#refrin').val(resultobj[0]['refrin'])
							}
						},error: function(xhr, resp, text) {
							loaderoff();
							
							
						}
					})
				})

				$('#clear').on('click', function(){
					$('#customerform').trigger('reset');
				})
			})


			function loadcard(){
				
            
					$.ajax({
								
						url:\"".URL."cusactivate/loadcard\", 
						type : \"POST\", 
						//dataType: \"json\",                                 				
						data : {token: $('#token').val()},             
						beforeSend:function(){	
							loaderon();
							$('#cardlist').html('<option default>Select Card No</option>');	
						},
						success : function(result) {
							//console.log(result)
							const resultobj = JSON.parse(result);
							if(resultobj['result']=='success'){
								$.each(resultobj['message'],function(key,val){
									$('#cardlist').append('<option value=\"'+val['cardno']+'\">'+val['cardno']+'</option>');			
							   })   
							}
							loaderoff();
							
						},error: function(xhr, resp, text) {
							loaderoff();
							
						}
					})
				
			}


			var table = $('#activetable').DataTable({
                \"pageLength\": 25,
                
                \"columnDefs\": [
                    { \"title\": \"Card No\", \"targets\": 0 },
                    { \"title\": \"CIN\", \"targets\": 1 },
                    { \"title\": \"Customer Name\", \"targets\": 2 },
                    { \"title\": \"Customer Address\", \"targets\": 3 },                         
                    { \"title\": \"Customer Mobile\", \"targets\": 4 },
                    { \"title\": \"Ref. RIN\", \"targets\": 5 },
                ],
                \"columns\": [
                    { \"data\": \"cardno\" },
                    { \"data\": \"cin\" },
                    { \"data\": \"cusname\" },
                    { \"data\": \"cusadd\" },
                    { \"data\": \"mobile\" },
                    { \"data\": \"refrin\" }
                ]
            });

           
            function loadmylist(){
                $.ajax({
                            
                    url:\"".URL."cusactivate/myactivationlist\", 
                    type : \"GET\",                                  				
                    
                    datatype:'json',                   
                    beforeSend:function(){
                    
                    },
                    success : function(result) {
                        //console.log(result)
                       
                        const resultobj = JSON.parse(result);

                        
                        table.rows.add(resultobj).draw();
                        
                        
                    },  
                    error: function(xhr, resp, text) {
                        
                        console.log(xhr, resp, text);
                    }
                })
            }

		
			</script>
		";
	}
} 