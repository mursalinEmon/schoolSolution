<?php
class Placement extends Controller{
    
    function __construct(){
		
		parent::__construct();
		
		$this->view->script = $this->script();

		Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }
		
	}


    function init(){
		$this->view->tree = $this->model->getTree();

		Session::set('token',uniqid());
        $this->view->token=Session::get('token');       
		$this->view->render("templateadmin","abrplacement/init");
	}
	
	function searchtree(){
		try{
			if(Session::get('token')!=$_POST['token']){
				throw new Exception('Token mismatch! Please refresh!');
			}
			
			$bin = $_POST['bin'];
			if($bin==""){
				$bin=0;
			}
			if(!is_numeric($bin)){
				throw new Exception('not a valid bin!');
			}
			echo json_encode($this->model->getTree($bin));
		}catch(Exception $ex){
			echo json_encode($ex->getMessage());
		}
	}

	function getbalancebvbybin(){

		if(Session::get('token')!=$_POST['token']){
			
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'Token mismatch! Please refresh!'));
			exit;
		}
		if($_POST['bin']==""){
			
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'not a valid bin!'));
			exit;
		}
		if(!is_numeric($_POST['bin'])){
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'not a valid bin!'));
			exit;
		}
		if(!is_numeric($_POST['pin'])){
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'not a valid pin!'));
			exit;
		}
		$bin = $_POST['bin'];
		$bindt = $this->model->getbindt($bin);
		if(count($bindt)==0){
			
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'not a valid bin!'));
			exit;
		}
		$rin = $bindt[0]['rin'];
		$pin = $_POST['pin'];

		$balance = $this->model->balancebv($rin, $pin);
		
		if(count($balance)>0)
			echo json_encode(array('result'=>'success','balance'=>$balance[0]['balbv'],'message'=>''));
		else
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'No record found'));
	}

	function getbalancebv(){

		if(Session::get('token')!=$_POST['token']){
			
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'Token mismatch! Please refresh!'));
			exit;
		}
		if($_POST['rin']==""){
			
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'not a valid RIN!'));
			exit;
		}
		if(!is_numeric($_POST['pin'])){
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'not a valid pin!'));
			exit;
		}
		$rin = filter_var ($_POST['rin'], FILTER_SANITIZE_STRING);
		$pin = $_POST['pin'];

		$balance = $this->model->balancebv($rin, $pin);
		//Logdebug::appendlog(serialize($retailer));
		if(count($balance)>0)
			echo json_encode(array('result'=>'success','balance'=>$balance[0]['balbv'],'message'=>''));
		else
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'No record found'));
	}

	function asupline(){
		$date = date('Y-m-d');
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date)); 
		$bin = $_POST['bin'];
		$pin = $_POST['pin'];
		$side = $_POST['side'];
		$retailertype = $_POST['retailertype'];

		$upbin = $this->model->getbindt($bin);
		$stno=$this->model->getSatementNo();
		

		$upsidebin='';
		$upsidedistrisl='';

		

		$reqbv = 1000000;
		if($retailertype=="WelcomeRetailer")
			$reqbv = 10;
		if($retailertype=="ExpressRetailer")
			$reqbv = 25;
		if($retailertype=="PreRetailer")
			$reqbv = 50;
		if($retailertype=="Primary")
			$reqbv = 100;
		if($retailertype=="Regular")
			$reqbv = 500;	
		
		try{

			$bindt = $this->model->getbindt($bin);
		if(count($bindt)==0){
			
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'not a valid bin!'));
			exit;
		}
		$rin = $bindt[0]['rin'];
		$retailer = $this->model->getrindt($rin);
		if(count($retailer)==0){			
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'not a valid RIN!'));
			exit;
		}
		$pin = $_POST['pin'];

		$balance = $this->model->balancebv($rin, $pin);
		if(count($balance)==0){			
			echo json_encode(array('result'=>'error','balance'=>'0','message'=>'not enough bv!'));
			exit;
		}
		if(floatval($balance[0]['balbv'])<$reqbv){
			throw new Exception('Not enough BV');
		}

			if(Session::get('token')!=$_POST['token']){
				throw new Exception('Token mismatch! Please refresh!');
			}
			if($stno<1){
				throw new Exception('Statement not started! Please Wait!');
			}
			if(count($upbin)==0){
				throw new Exception('Upline not found!');
			}
			if($retailertype==""){
				throw new Exception('Retailer Type not found!');
			}
			
			$bc=$this->model->getbc($upbin[0]['distrisl']);
			if($bc<0){
				throw new Exception('Business center not found!');
			}
			if($side=='A'){
				$upsidebin='leftbin';
				$upsidedistrisl='leftdistrisl';
				if($upbin[0]['leftbin']!=0){
					throw new Exception('Team A is full!');
				}
			}

			if($side=='B'){
				$upsidebin='rightbin';
				$upsidedistrisl='rightdistrisl';
				if($upbin[0]['rightbin']!=0){
					throw new Exception('Team B is full!');
				}
			}
			
			$pdata = array(
					'bizid'=>100,
					'xcus' => $retailer[0]['xcus'],
					'distrisl'=>$retailer[0]['distrisl'],
					'point' => $reqbv,
					'xdocnum'=>'DOC1',
					'xdoctype'=>'User Placement',
					'xsign'=>-1,
					'xdate'=>$date,
					'stno'=>$stno,
					'zemail'=>Session::get('suser'),
					'xyear'=>$year,
					'xper'=>$month
				);

			
				

			$data  = array(
				"bizid"=>100,
				"distrisl"=>$upbin[0]['distrisl'],
				"bc"=>$bc[0]['bc'],
				"upbin"=>$upbin[0]['bin'],
				"updistrisl"=>$upbin[0]['distrisl'],
				"upbc"=>$upbin[0]['bc'],
				"side"=>$side,
				"xdate"=>$date,
				"stno"=>$stno,
				"binpoint"=>$reqbv,
				"xpoint"=>$reqbv,
				"xyear"=>$year,
				"xper"=>$month,
				"executivetype"=>'Primary Distributor',
				"xuser"=>Session::get('suser'),
				"xcus"=>$upbin[0]['xcus'],
				"newentry"=>1,
				"xpin"=>$pin,
				"parent"=>$upbin[0]['parent'].",".$upbin[0]['bin'],
				"binstatus"=>$retailertype
			);
			
			$res = $this->model->pointentry($pdata);

			$success = 0;
			
			if($res>0){
				$success = $this->model->createasupline($data);
			}
			
			if($success>0){
				$esuccess = $this->model->ulineupdate(array($upsidebin=>$success,$upsidedistrisl=>$upbin[0]['distrisl']), " bin=".$upbin[0]['bin']);

				
				$reqbv = $reqbv/2;
				$fg1 = $reqbv*.30;
				$fg2 = $reqbv*.20;				
				$fg5 = $reqbv*.10;
				
				$st = "insert into mlmtotrep (bizid, xrdin,distrisl,
				xdocnum,xcomtype,xcom,xpaid,xdate,stno,xsrctaxpct) VALUES (100,'".$retailer[0]['refrin']."',0,'".$success."','Gen1 Commission',".$fg1.",0,'".$date."',$stno,0)";
				if($retailer[0]['refrin1']!=""){				
					$st .= ",(100,'".$retailer[0]['refrin1']."',0,'".$success."','Gen2 Commission',".$fg2.",0,'".$date."',$stno,0)";
				}
				if($retailer[0]['refrin2']!=""){				
					$st .= ",(100,'".$retailer[0]['refrin2']."',0,'".$success."','Gen3 Commission',".$fg2.",0,'".$date."',$stno,0)";
				}
				if($retailer[0]['refrin3']!=""){				
					$st .= ",(100,'".$retailer[0]['refrin3']."',0,'".$success."','Gen4 Commission',".$fg2.",0,'".$date."',$stno,0)";
				}
				if($retailer[0]['refrin4']!=""){				
					$st .= ",(100,'".$retailer[0]['refrin4']."',0,'".$success."','Gen5 Commission',".$fg5.",0,'".$date."',$stno,0)";
				}
				
				$res = $this->model->cretecom($st);				


				echo json_encode(array('result'=>'success','bin'=>$success,'mobile'=>$upbin[0]['mobile']
				,'fullname'=>$upbin[0]['fullname'],'rin'=>$upbin[0]['rin']));
			}
			else{
				echo json_encode(array('result'=>'error','message'=>'Unable yo create bin!'));
			}

		}catch(Exception $e){
			echo json_encode(array('message'=>$e->getMessage(),'result'=>'error','keycode'=>''));
			exit;
		}

		
	}
    
    function newentry(){
		$date = date('Y-m-d');
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date)); 
		$bin = $_POST['bin'];
		$pin = $_POST['pin'];
		$side = $_POST['side'];
		$rin = $_POST['rin'];
		
		$retailertype = $_POST['retailertype'];

		$upbin = $this->model->getbindt($bin);
		$stno=$this->model->getSatementNo();
		
		$retailer = $this->model->getrindt($rin);
		
		$reqbv = 1000000;
		if($retailertype=="WelcomeRetailer")
			$reqbv = 10;
		if($retailertype=="ExpressRetailer")
			$reqbv = 25;
		if($retailertype=="PreRetailer")
			$reqbv = 50;
		if($retailertype=="Primary")
			$reqbv = 100;
		if($retailertype=="Regular")
			$reqbv = 500;	

		$balance = $this->model->balancebv($rin, $pin);

		$upsidebin='';
		$upsidedistrisl='';
		
		try{

			if(Session::get('token')!=$_POST['token']){
				throw new Exception('Token mismatch! Please refresh!');
			}

			if(count($balance)==0){
				throw new Exception('Not enough BV');
			}

			if(floatval($balance[0]['balbv'])<$reqbv){
				throw new Exception('Not enough BV');
			}

			if(count($retailer)==0){
				throw new Exception('RIN not found!');
			}
			

			if($stno<1){
				throw new Exception('Statement not started! Please Wait!');
			}
			if(count($upbin)==0){
				throw new Exception('Upline not found!');
			}
			if($retailertype==""){
				throw new Exception('Retailer Type not found!');
			}
			
			$bc=$this->model->getbc($upbin[0]['distrisl']);
			if($bc<0){
				throw new Exception('Business center not found!');
			}
			if($side=='A'){
				$upsidebin='leftbin';
				$upsidedistrisl='leftdistrisl';
				if($upbin[0]['leftbin']!=0){
					throw new Exception('Team A is full!');
				}
			}

			if($side=='B'){
				$upsidebin='rightbin';
				$upsidedistrisl='rightdistrisl';
				if($upbin[0]['rightbin']!=0){
					throw new Exception('Team B is full!');
				}
			}

			$pdata = array(
					'bizid'=>100,
					'xcus' => $retailer[0]['xcus'],
					'distrisl'=>$retailer[0]['distrisl'],
					'point' => $reqbv,
					'xdocnum'=>"DOC1",
					'xdoctype'=>'User Placement',
					'xsign'=>-1,
					'xdate'=>$date,
					'stno'=>$stno,
					'zemail'=>Session::get('suser'),
					'xyear'=>$year,
					'xper'=>$month
				);

				

			$data  = array(
				"bizid"=>100,
				"distrisl"=>$retailer[0]['distrisl'],
				"bc"=>$bc[0]['bc'],
				"upbin"=>$upbin[0]['bin'],
				"updistrisl"=>$upbin[0]['distrisl'],
				"upbc"=>$upbin[0]['bc'],
				"side"=>$side,
				"xdate"=>$date,
				"stno"=>$stno,
				"binpoint"=>$reqbv,
				"xpoint"=>$reqbv,
				"xyear"=>$year,
				"xper"=>$month,
				"executivetype"=>'Primary Distributor',
				"xuser"=>Session::get('suser'),
				"xcus"=>$retailer[0]['xcus'],
				"newentry"=>1,
				"xpin"=>$retailer[0]['xpin'],
				"parent"=>$upbin[0]['parent'].",".$upbin[0]['bin'],
				"binstatus"=>$retailertype
			);
			
			$res = $this->model->pointentry($pdata);

			$success = 0;
			if($res>0){
				$success = $this->model->createasupline($data);
			}
			if($success>0){
				$esuccess = $this->model->ulineupdate(array($upsidebin=>$success,$upsidedistrisl=>$retailer[0]['distrisl']), " bin=".$upbin[0]['bin']);
				
				
				$reqbv = $reqbv/2;
				$fg1 = $reqbv*.30;
				$fg2 = $reqbv*.20;				
				$fg5 = $reqbv*.10;
				
				$st = "insert into mlmtotrep (bizid, xrdin,distrisl,
				xdocnum,xcomtype,xcom,xpaid,xdate,stno,xsrctaxpct) VALUES (100,'".$retailer[0]['refrin']."',0,'".$success."','Gen1 Commission',".$fg1.",0,'".$date."',$stno,0)";
				if($retailer[0]['refrin1']!=""){				
					$st .= ",(100,'".$retailer[0]['refrin1']."',0,'".$success."','Gen2 Commission',".$fg2.",0,'".$date."',$stno,0)";
				}
				if($retailer[0]['refrin2']!=""){				
					$st .= ",(100,'".$retailer[0]['refrin2']."',0,'".$success."','Gen3 Commission',".$fg2.",0,'".$date."',$stno,0)";
				}
				if($retailer[0]['refrin3']!=""){				
					$st .= ",(100,'".$retailer[0]['refrin3']."',0,'".$success."','Gen4 Commission',".$fg2.",0,'".$date."',$stno,0)";
				}
				if($retailer[0]['refrin4']!=""){				
					$st .= ",(100,'".$retailer[0]['refrin4']."',0,'".$success."','Gen5 Commission',".$fg5.",0,'".$date."',$stno,0)";
				}
							
				$res = $this->model->cretecom($st);				

				echo json_encode(array('result'=>'success','bin'=>$success,'mobile'=>$upbin[0]['mobile']
				,'fullname'=>$upbin[0]['fullname'],'rin'=>$upbin[0]['rin']));
			}
			else{
				echo json_encode(array('result'=>'error','message'=>'Unable yo create bin!'));
			}

		}catch(Exception $e){
			echo json_encode(array('message'=>$e->getMessage(),'result'=>'error','keycode'=>''));
			exit;
		}

		
	}

	function getretailerinfo(){
		$rin = $_POST['rin'];
		$token = $_POST['token'];

		$retailer = $this->model->getrindt($rin);
		//Logdebug::appendlog(serialize($retailer));
		if(count($retailer)>0)
			echo json_encode(array('result'=>'success','fullname'=>$retailer[0]['xorg'],'keycode'=>''));
		else
			echo json_encode(array('result'=>'error','fullname'=>'','keycode'=>''));
	}
    
    function script(){
		
		return "
			<script>
			$(document).ready(function(){
			
			$.ajaxSetup({ cache: false });
			
			showtree();
			$('#search').on('click', function(){
				var bin = $('#bin').val();
				if(!isNaN(bin))
					showtree(bin);
			})

			$('#npin').on('blur', function(){
				$.ajax({
                        
					url:\"".URL."placement/getbalancebv\", 
					type : \"POST\",                                  				
					data : {rin:$('#nrin').val(), pin: $('#npin').val(),token: $('#token').val()}, // post data || get data                    
					beforeSend:function(){	
						loaderon();   
					},
					success : function(result) {
					   //console.log(result)
						loaderoff();
						const resultobj = JSON.parse(result);

						$('#nbalbv').text(resultobj['balance']);
						
					},error: function(xhr, resp, text) {
						loaderoff();
						
					}
				})
			})

			$('#pin').on('blur', function(){
				$.ajax({
                        
					url:\"".URL."placement/getbalancebvbybin\", 
					type : \"POST\",                                  				
					data : {bin:$('#cbin').val(), pin: $('#pin').val(),token: $('#token').val()}, // post data || get data                    
					beforeSend:function(){	
						loaderon();   
					},
					success : function(result) {
					   //console.log(result)
						loaderoff();
						const resultobj = JSON.parse(result);

						$('#balbv').text(resultobj['balance']);
						
					},error: function(xhr, resp, text) {
						loaderoff();
						
					}
				})
			})

			function initasparent(_this){
				
				if(_this == 'rightasprent' || _this == 'leftasprent'){
					
					$('#cbin').val($('#rootbin').text())
					
					if(_this == 'rightasprent'){
						$('#side').val('B')
					}
					if(_this == 'leftasprent'){
						$('#side').val('A')
					}
				}

				if(_this == 'lrightasparent' || _this == 'rrightasparent'){
					
					$('#cbin').val($('#rightbin').text())
					if(_this == 'rrightasparent'){
						$('#side').val('B')
					}
					if(_this == 'lrightasparent'){
						$('#side').val('A')
					}
				}

				if(_this == 'lleftasparent' || _this == 'rleftasparent'){
					var upbin = $('#leftbin').text();
					$('#cbin').val(upbin)
					if(_this == 'lleftasparent'){
						$('#side').val('A')
					}
					if(_this == 'rleftasparent'){
						$('#side').val('B')
					}
				}

				$('#modalpin').modal('toggle');
				$('#modalpin').modal('show');
			}

			$('#nrin').on('blur', function(){
				
				$.ajax({
                        
					url:\"".URL."placement/getretailerinfo\", 
					type : \"POST\",                                  				
					data : {rin:$('#nrin').val(), token: $('#token').val()}, // post data || get data                    
					beforeSend:function(){	
						loaderon();   
					},
					success : function(result) {
						//console.log(result)
						loaderoff();
						const resultobj = JSON.parse(result);

						$('#retailername').text(resultobj['fullname']);
						
					},error: function(xhr, resp, text) {
						loaderoff();
						
					}
				})
			})

			$('#nrefrin').on('blur', function(){
				
				$.ajax({
                        
					url:\"".URL."placement/getretailerinfo\", 
					type : \"POST\",                                  				
					data : {rin:$('#nrefrin').val(), token: $('#token').val()}, // post data || get data                    
					beforeSend:function(){	
						loaderon();   
					},
					success : function(result) {
						//console.log(result)
						loaderoff();
						const resultobj = JSON.parse(result);

						$('#nrefname').text(resultobj['fullname']);
						
					},error: function(xhr, resp, text) {
						loaderoff();
						
					}
				})
			})

			function initnew(_this){

				if(_this == 'rightnew' || _this == 'leftnew'){
					
					$('#ncbin').val($('#rootbin').text())
					
					if(_this == 'rightnew'){
						$('#nside').val('B')
					}
					if(_this == 'leftnew'){
						$('#nside').val('A')
					}
				}

				if(_this == 'lrightnew' || _this == 'rrightnew'){
					
					$('#ncbin').val($('#rightbin').text())
					if(_this == 'rrightnew'){
						$('#nside').val('B')
					}
					if(_this == 'lrightnew'){
						$('#nside').val('A')
					}
				}

				if(_this == 'lleftnew' || _this == 'rleftnew'){
					
					$('#ncbin').val($('#leftbin').text())
					if(_this == 'rleftnew'){
						$('#nside').val('B')
					}
					if(_this == 'lleftnew'){
						$('#nside').val('A')
					}
				}

				$('#modalnew').modal('toggle');
				$('#modalnew').modal('show');
				
			}

			

			$('#savenew').on('click', function(){

				var ubin = $('#ncbin').val();
				var pside = $('#nside').val();
				var ppin = $('#npin').val();
				var nrin = $('#nrin').val()
				var newretailertype=$('.newretailertype:checked').val();
				$.ajax({
                        
					url:\"".URL."placement/newentry\", 
					type : \"POST\",                                  				
					data : {pin: ppin, rin: nrin,bin: ubin, side: pside, retailertype: newretailertype, token: $('#token').val()}, // post data || get data                    
					beforeSend:function(){	
						loaderon();   
					},
					success : function(result) {
						//console.log(result)
						loaderoff();
						const resultobj = JSON.parse(result);
						showtree(ubin);
						$('#npin').val('');
						$('#nrin').val('');
						$('#retailername').text('');
						$('#regular').prop('checked', true);
						$('#modalnew').modal('hide');

					},error: function(xhr, resp, text) {
						loaderoff();
						
						
					}
				})

			})

			$('#savesaupline').on('click', function(){
				
				var ubin = $('#cbin').val();
				var pside = $('#side').val();
				var ppin = $('#pin').val();
				var retailertype=$('.retailertype:checked').val();
				
				$.ajax({
                        
					url:\"".URL."placement/asupline\", 
					type : \"POST\",                                  				
					data : {pin: ppin ,bin: ubin, side: pside, retailertype: retailertype, token: $('#token').val()}, // post data || get data                    
					beforeSend:function(){	
						loaderon();   
					},
					success : function(result) {
						//console.log(result)
						loaderoff();
						const resultobj = JSON.parse(result);
						showtree(ubin);
						$('#pin').val('');
						$('#regular').prop('checked', true);
						$('#modalpin').modal('hide');

					},error: function(xhr, resp, text) {
						loaderoff();
						
						
					}
				})
				
			})
			
			
			function showtree(sbin=''){
				$('#leftnode').css(\"background-color\",\"white\");
				$('#aleftnode').css(\"background-color\",\"white\");
				$('#bleftnode').css(\"background-color\",\"white\");
				$('#rightnode').css(\"background-color\",\"white\");
				$('#arightnode').css(\"background-color\",\"white\");
				$('#brightnode').css(\"background-color\",\"white\");
				$('#leftasprent').html('');
				$('#leftnew').html('');
				$('#rightasprent').html('');
				$('#rightnew').html('');
				$('#lleftasparent').html('');
				$('#lleftnew').html('');
				$('#rleftasparent').html('');
				$('#rleftnew').html('');

				$('#lrightasparent').html('')
				$('#lrightnew').html('')
				$('#rrightasparent').html('')
				$('#rrightnew').html('')
				
				$.ajax({
                        
					url:\"".URL."placement/searchtree\", 
					type : \"POST\",                                  				
					data : {bin: sbin, token: $('#token').val()}, // post data || get data                    
					beforeSend:function(){
						loaderon();   
					},
					success : function(result) {
						
						loaderoff();
						const resultobj = JSON.parse(result);
						//console.log(resultobj)
						//root node
						if(resultobj['rootnode'].length!=0){
							$('#imgupline').attr('src',\"".URL."\"+'public/images/bizimages/retailer/'+resultobj['rootnode']['rin']+'-1.jpg');
							$('#rootfullname').html(resultobj['rootnode']['fullname']);
							$('#rootmobile').html(resultobj['rootnode']['mobile']);
							$('#rootrin').html(resultobj['rootnode']['rin']);
							$('#rootbin').html(resultobj['rootnode']['bin']);
							$('#rootbintype').html(resultobj['rootnode']['bintype']);
							$('#upbin').html(`<a href=\"javascript:void(0)\"><strong>`+resultobj['rootnode']['upbin']+`</a>`);
							$('#rootlcp').html(resultobj['rootnode']['lcp']);
							$('#rootrcp').html(resultobj['rootnode']['rcp']);
							$('#rootatotal').html(resultobj['rootnode']['atotalpoint']);
							$('#rootbtotal').html(resultobj['rootnode']['btotalpoint']);
						}else{
							$('#rootfullname').html('XXXXXX XXXX');
							$('#rootmobile').html('XXXXXXXXX');
							$('#rootrin').html('XXX-XXX-XXXX');
							$('#rootbin').html(0);
							$('#rootbintype').html('');
							$('#rootlcp').html('0');
							$('#rootrcp').html('0');
							$('#rootatotal').html('0');
							$('#rootbtotal').html('0');
						}
						//left node
						if(resultobj['leftnode'].length!=0){
							$('#imgleft').attr('src',\"".URL."\"+'public/images/bizimages/retailer/'+resultobj['leftnode']['rin']+'-1.jpg');
							$('#leftfullname').html(resultobj['leftnode']['fullname']);
							$('#leftmobile').html(resultobj['leftnode']['mobile']);
							$('#leftrin').html(resultobj['leftnode']['rin']);
							$('#leftbin').html(`<a href=\"javascript:void(0)\"><strong>`+resultobj['leftnode']['bin']+`</strong></a>`);
							$('#leftbintype').html(resultobj['leftnode']['bintype']);
							$('#leftlcp').html(resultobj['leftnode']['lcp']);
							$('#leftrcp').html(resultobj['leftnode']['rcp']);
							$('#leftatotal').html(resultobj['leftnode']['atotalpoint']);
							$('#leftbtotal').html(resultobj['leftnode']['btotalpoint']);
							$('#lleftname').html(resultobj['leftnode']['leftname']);
							$('#lleftbin').html(`<a href=\"javascript:void(0)\"><strong>`+resultobj['leftnode']['leftbin']+`</a>`);
							if(resultobj['leftnode']['leftbin']==0){
								$('#aleftnode').css(\"background-color\",\"#D3D3D3\");
								$('#lleftasparent').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create as parent</strong></a>`);
								$('#lleftnew').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create New</strong></a>`);
							}
							$('#lrightname').html(resultobj['leftnode']['rightname']);
							if(resultobj['leftnode']['rightbin']==0){
								$('#bleftnode').css(\"background-color\",\"#D3D3D3\");
								$('#rleftasparent').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create as parent</strong></a>`);
								$('#rleftnew').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create New</strong></a>`);
							}
							$('#lrightbin').html(`<a href=\"javascript:void(0)\"><strong>`+resultobj['leftnode']['rightbin']+`</a>`);
						}else{
							$('#leftnode').css(\"background-color\",\"#D3D3D3\");
							$('#aleftnode').css(\"background-color\",\"#D3D3D3\");
							$('#bleftnode').css(\"background-color\",\"#D3D3D3\");
							$('#leftasprent').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create as parent</strong></a>`);
							$('#leftnew').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create New</strong></a>`);
							$('#leftfullname').html('XXXXX XXXX');
							$('#leftmobile').html('XXXXXX XXXX');
							$('#lleftasparent').html('');
							$('#lleftnew').html('');
							$('#rleftasparent').html('');
							$('#rleftnew').html('');
							$('#leftrin').html('XXX-XXX-XXXX');
							$('#leftbin').html('0');
							$('#leftbintype').html('');
							$('#leftlcp').html('0');
							$('#leftrcp').html('0');
							$('#leftatotal').html('0');
							$('#leftbtotal').html('0');
							$('#lleftname').html('XXXXX XXXX');
							$('#lleftbin').html('0');
							$('#lrightname').html('XXXXX XXXX');
							$('#lrightbin').html('0');
						}

						//rightnode
						
						if(resultobj['rightnode'].length!=0){
							$('#imgright').attr('src',\"".URL."\"+'public/images/bizimages/retailer/'+resultobj['rightnode']['rin']+'-1.jpg');
							$('#rightfullname').html(resultobj['rightnode']['fullname']);
							$('#rightmobile').html(resultobj['rightnode']['mobile']);
							$('#rightrin').html(resultobj['rightnode']['rin']);
							$('#rightbin').html(`<a href=\"javascript:void(0)\"><strong>`+resultobj['rightnode']['bin']+`</strong></a>`);
							$('#rightbintype').html(resultobj['rightnode']['bintype']);
							$('#rightlcp').html(resultobj['rightnode']['lcp']);
							$('#rightrcp').html(resultobj['rightnode']['rcp']);
							$('#rightatotal').html(resultobj['rightnode']['atotalpoint']);
							$('#rightbtotal').html(resultobj['rightnode']['btotalpoint']);
							$('#rleftname').html(resultobj['rightnode']['leftname']);
							$('#rleftbin').html(`<a href=\"javascript:void(0)\"><strong>`+resultobj['rightnode']['leftbin']+`</a>`);
							if(resultobj['rightnode']['leftbin']==0){
								$('#arightnode').css(\"background-color\",\"#D3D3D3\");
								$('#lrightasparent').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create as parent</strong></a>`);
								$('#lrightnew').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create New</strong></a>`);
							}
							$('#rrightname').html(resultobj['rightnode']['rightname']);
							if(resultobj['rightnode']['rightbin']==0){
								$('#brightnode').css(\"background-color\",\"#D3D3D3\");
								$('#rrightasparent').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create as parent</strong></a>`);
								$('#rrightnew').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create New</strong></a>`);
							}
							$('#rrightbin').html(`<a href=\"javascript:void(0)\"><strong>`+resultobj['rightnode']['rightbin']+`</a>`);
						}else{
							$('#rightnode').css(\"background-color\",\"#D3D3D3\");
							$('#arightnode').css(\"background-color\",\"#D3D3D3\");
							$('#brightnode').css(\"background-color\",\"#D3D3D3\");
							$('#rightfullname').html('XXXXX XXXX');
							$('#rightmobile').html('XXXXXXXXXXX');
							$('#rightasprent').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create as parent</strong></a>`);
							$('#rightnew').html(`<a class=\"text-primary\" href=\"javascript:void(0)\"><strong>Create New</strong></a>`);
							$('#rightrin').html('XXX-XXX-XXXX');
							$('#rrightasparent').html('');
							$('#rrightnew').html('');
							$('#lrightasparent').html('');
							$('#lrightnew').html('');
							$('#rightbin').html('0');
							$('#rightbintype').html('');
							$('#rightlcp').html('0');
							$('#rightrcp').html('0');
							$('#rightatotal').html('0');
							$('#rightbtotal').html('0');
							$('#rleftname').html('XXXXX XXXX');
							$('#rleftbin').html('0');
							$('#rrightname').html('XXXXX XXXX');
							$('#rrightbin').html('0');
						}
					},  
					error: function(xhr, resp, text) {
						loaderoff();
						//console.log(xhr, resp, text);
					}
				})
			}
			/////////////////////////
			//right node operation//
			/////////////////////////
			$('#rightasprent').on('click', function(){
				initasparent('rightasprent');
			})

			$('#rrightasparent').on('click', function(){
				initasparent('rrightasparent');
			})

			$('#lrightasparent').on('click', function(){
				initasparent('lrightasparent');
			})

			/////////////////////////
			//End of right node operation//
			/////////////////////////

			/////////////////////////
			//new right node operation//
			/////////////////////////			

			$('#rightnew').on('click', function(){
				initnew('rightnew');
			})

			$('#lrightnew').on('click', function(){
				initnew('lrightnew');
			})

			$('#rrightnew').on('click', function(){
				initnew('rrightnew');
			})
			
			/////////////////////////
			//End of new right node operation//
			/////////////////////////

			/////////////////////////
			//left node operation//
			/////////////////////////
			$('#leftasprent').on('click', function(){
				initasparent('leftasprent');
			})

			$('#lleftasparent').on('click', function(){
				initasparent('lleftasparent');
			})

			$('#rleftasparent').on('click', function(){
				initasparent('rleftasparent');
			})

			/////////////////////////
			//End of left node operation//
			/////////////////////////

			/////////////////////////
			//new left node operation//
			/////////////////////////			

			$('#leftnew').on('click', function(){
				initnew('leftnew');
			})

			$('#lleftnew').on('click', function(){
				initnew('lleftnew');
			})

			$('#rleftnew').on('click', function(){
				initnew('rleftnew');
			})
			
			/////////////////////////
			//End of new right node operation//
			/////////////////////////

			$('#upbin').on('click',function(){
				if($(this).text()!='0')
					showtree($(this).text())
			})

			$('#leftbin').on('click',function(){
				if($(this).text()!='0')
					showtree($(this).text())
			})

			$('#rightbin').on('click',function(){
				if($(this).text()!='0')
					showtree($(this).text())
			})

			$('#lleftbin').on('click',function(){
				if($(this).text()!='0')
					showtree($(this).text())
			})

			$('#lrightbin').on('click',function(){
				if($(this).text()!='0')
					showtree($(this).text())
			})

			$('#rleftbin').on('click',function(){
				if($(this).text()!='0')
					showtree($(this).text())
			})

			$('#rrightbin').on('click',function(){
				if($(this).text()!='0')
					showtree($(this).text())
			})
		})
		
			</script>
		";
	}
}