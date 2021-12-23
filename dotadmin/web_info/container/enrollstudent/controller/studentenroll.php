<?php

class Studentenroll extends Controller{
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
	

	private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(
			"section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Student ID","rowindex"=>"0", "ctrlvalid"=>array()),

			"xstudentid"=>array("required"=>"*","label"=>"Student ID","ctrlfield"=>"xstudentid", "ctrlvalue"=>"", "ctrltype"=>"text", "readonly"=>"readonly", "ctrlvalid"=>array(),"rowindex"=>"1"),

			"xsession"=>array("required"=>"*","label"=>"Session","ctrlfield"=>"xsession", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

			"xclass"=>array("required"=>"*","label"=>"Class","ctrlfield"=>"xclass", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"xversion"=>array("required"=>"*","label"=>"Version","ctrlfield"=>"xversion", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"xshift"=>array("required"=>"*","label"=>"Shift","ctrlfield"=>"xshift", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),

			"xsec"=>array("required"=>"*","label"=>"Section","ctrlfield"=>"xsec", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),


			"xroll"=>array("required"=>"*","label"=>"Roll","ctrlfield"=>"xroll", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),

			

            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmnotice", "title"=>"User Form"),
            "actionbtn"=>array(                
                array("btnmethod"=>"update","btntext"=>"Update","btnurl"=>URL."questioncreate/updatequestion","btnid"=>"noticeupdate"),
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save Student","btnurl"=>URL."studentenroll/enrollStudent","btnid"=>"usersave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"Find Student","btnurl"=>URL."studentenroll/findStudent","btnid"=>"findStudent", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"Clear","btnurl"=>"","btnid"=>"clearall", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            "itmcode"=>array("required"=>"*","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Course", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

            "batchid"=>array("required"=>"*","label"=>"Batch","ctrlfield"=>"xbatch", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Batch", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),						
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search Exam"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."noticecreate/findnotice","btnid"=>"searchnotice", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
                array("btnmethod"=>"print","btntext"=>"Print","btnurl"=>"","btnid"=>"printuserlist", "icon"=>"<i class=\"fa fa-print mr-1\"></i>","btncolor"=>"btn-dark"),
            ),
        );
        
    }

	function init(){ 
 
		 $basicform = new Basicform();
 
		 $tabsettings = array(
			 0=>array("isactive"=>"active","tabdesc"=>"Enroll Student", "tabid"=>"tabcreatenotice", "tabcontent"=>$basicform->createform($this->formset,$this->formfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"far fa-user"),
			 1=>array("isactive"=>"","tabdesc"=>"Search For Student", "tabid"=>"tabsearchnotice", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false), "icon"=>"fa fa-search"),          
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/studentenroll_view");
	 }


	 function enrollStudent(){
		
        $inputs = new Form();


		try{
			$inputs ->post("xstudentid")
			->post("xsession")
			->val('minlength', 1)

			->post("xclass")
			->val('minlength', 1)
			
			->post("xversion")
			->val('minlength', 1)

			->post("xshift")
			->val('minlength', 1)

			->post("xsec")
			->val('minlength', 1)

			->post("xroll")
			->val('minlength', 1);

            $inputs	->submit();       
            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
                exit;
            }

           

			$onduplicate = "";
            // $onduplicate = 'on duplicate key update xitemcode=VALUES(xitemcode), xbatch=VALUES(xbatch),xtitle=VALUES(xtitle),xdescription=VALUES(xdescription)';
			
            $inpdata = $inputs->fetch();
			
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);
			Logdebug::appendlog(print_r($data, true));

			if(strlen($data["xclass"])==1){
				$class = "0".$data["xclass"];
			}else{
				$class = $data["xclass"];
			}
			if(strlen($data["xversion"])=='Bangla'){
				$version = "01";
			}else{
				$version = "02";
			}
			if(strlen($data["xshift"])=='Morning'){
				$shift = "01";
			}else{
				$shift = "02";
			}
			if(strlen($data["xsec"])==1){
				$section = "0".$data["xsec"];
			}else{
				$section = $data["xsec"];
			}

			if(strlen($data["xroll"])==1){
				$roll = "00".$data["xroll"];
			}elseif(strlen($data["xroll"])==2){
				$roll = "0".$data["xroll"];
			}else{
				$roll = $data["xroll"];
			}
			// $data['zdate']=date('Y-m-d');
            // $data['xdate']=$date;
			$data['xflag'] = 'Live';
			$data['zactive'] = 1;
			// // $data['zutime']=date("H:i:s");
            $data['bizid']=Session::get('sbizid');
            // //  //remove autoincrement id from inserting      
			// Logdebug::appendlog(print_r($data, true));
            $success = $this->model->save($data, $onduplicate);
			
            if($success  > 0)
                echo json_encode(array('message'=>'Student Enrolled Successfully','result'=>'success','keycode'=>$success));
             else
                echo json_encode(array('message'=>'Failed to Enroll Student'.$data,'result'=>'error','keycode'=>''));
    }

	
	function findStudent(){
		$stuname = $_POST['stuname'];
		$st = $this->model->findStudent($stuname);

		$st=$st[0];

    	// Logdebug::appendlog(print_r($st,true));

		if($st > 0)
                echo json_encode(array('message'=>'Student Found Successfully','result'=>'success','keycode'=>$st));
             else
                echo json_encode(array('message'=>'Student Not Found','result'=>'error','keycode'=>''));
		
	}

	function findnotice(){
        $res = "";
        $batchid = "";
		$conditions = "bizid = ".Session::get('sbizid')."";
        $itemcode = $_POST['itmcode'];
        if(isset($_POST['batchid']))
            $batchid = $_POST['batchid'];
            
        try{
        //Logdebug::appendlog(serialize($itemcode));
            if($batchid!=""){
                $conditions .=" and xbatch like '%".$batchid."%'";
            }
            if($itemcode!=""){
                $conditions .=" and xitemcode like '%".$itemcode."%'";
            }
            
            if($itemcode == "" || $batchid == ""){
                //Logdebug::appendlog('Please');
                throw new Exception('Please select Course and Batch!');
                
            }

        }catch(Exception $e){
                $res = $e->getMessage();              
                //Logdebug::appendlog($res);
                echo json_encode(array('message'=>$res,'result'=>'fielderror','keycode'=>''));
            exit;
        }

        if($res == ""){
            //Logdebug::appendlog('$res');
            $batchdt =  $this->model->getnotice($conditions); 
            echo json_encode($batchdt);
        }
        
    }
	
	function singlenotice(){
        $notice = $_POST['param']; 
        $noticedt =  $this->model->getsinglenotice($notice);
        //Logdebug::appendlog(print_r($noticedt, true));
        echo json_encode($noticedt);
        
    }

	function singlenoticemodal($notice){
        $noticedt =  $this->model->getsinglenotice($notice);
        //Logdebug::appendlog(print_r($noticedt, true));
        echo json_encode($noticedt);
        
    }

	function getCourse(){
        $courses = $this->model->getCourse();
        // Logdebug::appendlog($courses);
        echo json_encode($courses);
    }

	function getSelectBatch($course){
        //Logdebug::appendlog($batch);
        $batchdt =  $this->model->getSelectBatch($course);
        echo json_encode($batchdt);
        
    }
	function getLesson($course){
		$lessons =  $this->model->getLesson($course);
        // Logdebug::appendlog(print_r($lessons, true));
        echo json_encode($lessons);
        
    }
    

	function script(){
		$basicform = new Basicform(); 
		return "
		<script>

			$('#frmnotice').hide();

			$('#xversion, #xshift, #xsec, #xsession, #xclass, #xroll, #xreligion, #xdistrict, #xbloodgrp, #xnationality, #xcity, #xthana, #xsex').append(
				$('<option>', {value: '', text: '--Select--'})
			);
	
			$('#xreligion').append(
				$('<option>', {value: 'Islam', text: 'Islam'}), 
				$('<option>', {value: 'Hinduism', text: 'Hinduism'}), 
				$('<option>', {value: 'Christianity', text: 'Christianity'}),
				$('<option>', {value: 'Buddhism', text: 'Buddhism'}), 
				$('<option>', {value: 'Other Religion', text: 'Other Religion'}) 
			);
			$('#xbloodgrp').append(
				$('<option>', {value: 'A+', text: 'A+'}), 
				$('<option>', {value: 'A-', text: 'A-'}), 
				$('<option>', {value: 'B+', text: 'B+'}),
				$('<option>', {value: 'B-', text: 'B-'}), 
				$('<option>', {value: 'O+', text: 'O+'}),
				$('<option>', {value: 'O-', text: 'O-'}),
				$('<option>', {value: 'AB+', text: 'AB+'}), 
				$('<option>', {value: 'AB-', text: 'AB-'}) 
			);
			$('#xversion').append(
				$('<option>', {value: 'Bangla', text: 'Bangla'}), 
				$('<option>', {value: 'English', text: 'English'})
			);
			$('#xsex').append(
				$('<option>', {value: 'Male', text: 'Male'}), 
				$('<option>', {value: 'Female', text: 'Female'})
			);
			$('#xnationality').append(
				$('<option>', {value: 'Bangladeshi', text: 'Bangladeshi'})
			);
			$('#xshift').append(
				$('<option>', {value: 'Morning', text: 'Morning'}), 
				$('<option>', {value: 'Day', text: 'Day'})
			);
			$('#xsec').append(
				$('<option>', {value: '1', text: '1'}), 
				$('<option>', {value: '2', text: '2'})
			);
	
	
			var thisYear = new Date().getFullYear();
	
			$('#xsession').append($('<option>', {value: thisYear, text: thisYear}));
	
			for(i=1; i<=12; i++){
				$('#xclass').append($('<option>', {value: i, text: i}));
			}
			
			for(i=1; i<=50; i++){
				$('#xroll').append($('<option>', {value: i, text: i}));
			}

		$('#questionset').append(
			$('<option>', {value: '', text: '--Select--'}), 
			$('<option>', {value: 'Set-A', text: 'Set-A'}), 
			$('<option>', {value: 'Set-B', text: 'Set-B'}), 
			$('<option>', {value: 'Set-C', text: 'Set-C'}), 
			$('<option>', {value: 'Set-D', text: 'Set-D'})
		);

		

		//-----------------------
		// save update delete ajax
		//-----------------------
		".$basicform->returnajax($this->formset, "noticesl")."
		//-----------------------
		//user form validation
		//-----------------------
		".$basicform->validateform($this->formfield, 'frmnotice')."            
		 

	   $('#clearall').on('click', function(){
			$('#frmnotice').trigger('reset');
			$('#imglist').html('No image found!');
		})

		
		
		$('#findStudent').on('click',function(){
			var url = $(this).val();
			var stuname = $('#stuname').val();
			console.log(stuname);

			$.ajax({
				url:url, 
				type : 'POST',
				dataType : 'json', 						
				data : {stuname:stuname}, 
				beforeSend:function(){
					$(this).addClass('disabled');
					// loaderon(); 
				},
				success : function(result) {

					console.log(result);
					var student = result.keycode;
					console.log(typeof(student));

					$('#frmnotice').hide();
					
					loaderoff();
							var tblhtml ='';
						   $(this).removeClass('disabled');

						   if(result.result=='fielderror'){
								toastr.error(result.message);
							}
						if(result.result='success'){
						   tblhtml='<thead><th>Student Name</th><th>Father Name</th><th>Mother Name</th><th>Address</th><th>Guardian Name</th><th>Action</th></thead>';
						   tblhtml+='<tbody>';
						   
						   
								tblhtml+='<tr><td><a class=\"btn btn-primary tblrow\" style=\"border-radius:60px; font-size: 12px; href=\"javascript:void(0)\">'+student.xstuname+'</a></td><td>'+student.xfname+'</td><td>'+student.xmname+'</td><td>'+student.xaddress1+'</td><td>'+student.xguardian+'</td><td><a class=\"btn btn-primary\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px\" id=\"enrollstu\">Enroll Student</a></td></tr>';      
									
					
						   tblhtml+='</tbody>';
						   $('#searchtbl').html(tblhtml);

						   if(result.result=='error'){
								toastr.error(result.message);                               
							}

							$('#enrollstu').on('click', function(){
								var url = '".URL."studentenroll/enrollStudent';
								$('#frmnotice').show();
								//console.log(url);
								// var student = result.keycode;
								$('#xstudentid').val(student.xstudentid);
							})
				}
						  
				},
				error: function(xhr, resp, text) {
					loaderoff();
					$(this).removeClass('disabled');
				   
					console.log(xhr, resp, text);
				}
			});
			return false;
		})
   
		$('#searchnotice').on('click', function(){
            
			var url = '".URL."questioncreate/findnotice';
			var formid = 'frmsearch';
				
					$.ajax({
						url:url, 
						type : 'POST',
						dataType : 'json', 						
						data : $('#'+formid).serialize(), 
						beforeSend:function(){
							$(this).addClass('disabled');
							loaderon(); 
						},
						success : function(result) {
							
							loaderoff();
							var tblhtml ='';
						   $(this).removeClass('disabled');

						   if(result.result=='fielderror'){
								toastr.error(result.message);
							}
						if(!result.result){
						   tblhtml='<thead><th>Notice ID</th><th>Course</th><th>Batch</th><th>Notice Tiltle</th><th>Description</th><th>Action</th></thead>';
						   tblhtml+='<tbody>';
						   $.each(result, function(key, value){
						   
								tblhtml+='<tr><td><a class=\"btn btn-primary tblrow\" style=\"border-radius:60px; font-size: 12px; href=\"javascript:void(0)\">'+value.xsl+'</a></td><td>'+value.xitemcode+'</td><td>'+value.xbatch+'</td><td>'+value.xtitle+'</td><td>'+value.xdescription+'...</td><td><a class=\"btn btn-success\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px\" data-toggle=\"modal\" data-target=\"#myModal\" onClick=\"open_modal(\''+value.xsl+'\')\">View Notice</a></td></tr>';      
									
						   });
						   tblhtml+='</tbody>';
						   $('#searchtbl').html(tblhtml);

						   if(result.result=='error'){
								toastr.error(result.message);                               
							}
						}
								  
						},
						error: function(xhr, resp, text) {
							loaderoff();
							$(this).removeClass('disabled');
						   
							console.log(xhr, resp, text);
						}
					});
					return false;
		});

		//---------------------
        // batch show in modal
        //---------------------
        
        function open_modal(sl){
            //alert(status)
            $('#ntitle').html('');
            $('#ndescription').html('');
            var notices = '".URL."noticecreate/singlenoticemodal/'+sl;
            //console.log(notices);
            $.get(notices, function(o){
                //console.log(o);
                $('#ntitle').append(o[0].xtitle);
				$('#ndescription').append(o[0].xdescription);
            }, 'json');
        }

		//-----------------------
		// show user & uploaded image
		//-----------------------
			$('#viewnotice').on('click', function(){
				var url = $(this).val();
				var uid = $('#noticesl').val();
				$.ajax({
					url:url, 
					type : 'GET',
					dataType : 'json', 						
					data : {param:uid}, // post data || get data
					beforeSend:function(){
						$('#viewnotice').addClass('disabled');
						loaderon(); 
					},
					success : function(response) {
						
						loaderoff();
						
						$('#viewnotice').removeClass('disabled');
						
						const myObjStr = response;
						console.log(myObjStr);
						$('#noticesl').val(myObjStr[0].xsl);
						$('#itemcode').html('<option value=\"'+myObjStr[0].xitemcode+'\">'+myObjStr[0].xitemdesc+'</option>');
						$('#batch').html('<option value=\"'+myObjStr[0].xbatch+'\">'+myObjStr[0].xbatchname+'</option>');
						$('#title').val(myObjStr[0].xtitle);
						CKEDITOR.instances['description'].setData(myObjStr[0].xdescription);
						$('#description').val(myObjStr[0].xdescription);
						//console.log(myObjStr[0].xdescription);
						//----------------------------
						// Course Select data for view //
						//----------------------------

						var courses = '".URL."questioncreate/getCourse';
						//console.log(courses);
						$.get(courses, function(o){
							//console.log(o);
							for(var i = 0; i < o.length; i++){ 					
								$('#itemcode').append($('<option>', {value: o[i].xitemcode, text: o[i].xdesc}));
							}
						}, 'json');

						//----------------------------
						// Batch Select data for view//
						//---------------------

						//var val = $('#itemcode').val();
						var batchs = '".URL."questioncreate/getSelectBatch/'+myObjStr[0].xitemcode;
						$.get(batchs, function(o){
							//console.log(o);
							for(var i = 0; i < o.length; i++){ 					
								$('#batch').append($('<option>', {value: o[i].xbatch, text: o[i].xbatchname}));
							}
						}, 'json');

								
					},
					error: function(xhr, resp, text) {
						loaderoff();
						$('#viewnotice').removeClass('disabled');
						
						console.log(xhr, resp, text);
					}
				});
			})

			$('#noticesl').on('keyup', function (e) {
				if (e.keyCode === 13) {
					$('#viewnotice').click();
					
				}
			});


		$('body').on('click','.tblrow', function(){
			_this = $(this).html();                    
			$('.nav-tabs a[href=\"#tabcreatenotice\"]').tab('show');
			$('#noticesl').val(_this);
			$('#viewnotice').click();
		});

		$('#printcourselist').on('click', function(){
			//$('#printdivcourse').print();
			var divToPrint=document.getElementById('printdivcourse');

			var newWin=window.open('','Print-Window');

			newWin.document.open();
			newWin.document.write('<html><head><link rel=\"stylesheet\" href=\"./asset_admin/dist/css/style.css\" /><title>Print Document</title></head>');
			newWin.document.write('<body onload=\"window.print()\">'+divToPrint.innerHTML+'</body></html>');

			newWin.document.close();

			setTimeout(function(){newWin.close();},10);
		})

		//----------------------------
		// Coursr select data //
		//----------------------------

		//$('#itemcode').attr('onChange', 'getperdistrict(this.value)');

		var courses = '".URL."questioncreate/getCourse';
		console.log(courses);
		$('#itemcode').append('<option>--select--</option>')
		$.get(courses, function(o){
			// console.log(o);
			for(var i = 0; i < o.length; i++){ 					
				$('#itemcode').append($('<option>', {value: o[i].xitemcode, text: o[i].xdesc}));
			}
		}, 'json');


		//----------------------------
		// Batch Select data //
		//---------------------
		
		$('#itemcode').on('change',function(){
			
			$('#batch').find('option').remove();
			var val = $('#itemcode').val();
			var batchs = '".URL."questioncreate/getSelectBatch/'+val;
			$('#batch').append('<option>--select--</option>')
			$.get(batchs, function(o){
				//console.log(o);
				for(var i = 0; i < o.length; i++){ 					
					$('#batch').append($('<option>', {value: o[i].xbatch, text: o[i].xbatchname}));
				}
			}, 'json');

		})

		//----------------------------
		// Lesson Select data //
		//---------------------
		
		$('#itemcode').on('change',function(){
			
			$('#lesson').find('option').remove();
			var val = $('#itemcode').val();
			var lessons = '".URL."questioncreate/getLesson/'+val;
			// console.log(lessons);
			$('#lesson').append('<option>--select--</option>')
			$.get(lessons, function(o){
				// console.log(o);
				for(var i = 0; i < o.length; i++){ 					
					$('#lesson').append($('<option>', {value: o[i].xlesson, text: o[i].xdesc}));
				}
			}, 'json');
		})

		//----------------------------
		// Course Select data for search //
		//---------------------

		var courses = '".URL."questioncreate/getCourse';
		//console.log(courses);
		$('#itmcode').append('<option>--select--</option>')
		$.get(courses, function(o){
			//console.log(o);
			for(var i = 0; i < o.length; i++){ 					
				$('#itmcode').append($('<option>', {value: o[i].xitemcode, text: o[i].xdesc}));
			}
		}, 'json');

		//----------------------------
		// Batch Select data for search //
		//---------------------
		
		$('#itmcode').on('change',function(){
			
			$('#batchid').find('option').remove();
			var val = $('#itmcode').val();
			var batchs = '".URL."questioncreate/getSelectBatch/'+val;
			$('#batchid').append('<option>--select--</option>')
			$.get(batchs, function(o){
				//console.log(o);
				for(var i = 0; i < o.length; i++){ 					
					$('#batchid').append($('<option>', {value: o[i].xbatch, text: o[i].xbatchname}));
				}
			}, 'json');

		})


				var districts = ['Barishal','Bhola','Chattogram','Khagrachari','Brahmanbaria','Chandpur',
				'Comilla','Cox&apos;s Bazar','Feni','Lakshmipur','Noakhali','Rangamati', 'Dhaka', 'Faridpur',
				'Gazipur', 'Gopalganj','Kishoreganj','Madaripur','Manikganj', 'Munshiganj',
				'Narayangonj','Narsingdi','Rajbari','Shariatpur','Tangail', 'Bagerhat','Chuadanga',
				'Jashore','Jhenaidah','Khulna','Kushtia','Magura','Narail','Satkhira', 'Jamalpur',
				'Mymensingh', 'Netrakona', 'Sherpur','Bogura','Chapai Nawabganj', 'Joypurhat','Naogaon',
				'Natore','Pabna', 'Rajshahi','Sirajganj','Dinajpur','Gaibandha','Kurigram','Lalmonirhat',
				'Nilphamari','Panchagarh', 'Rangpur','Thakurgaon', 'Habiganj','Moulvibazar','Sunamganj',
				'Sylhet',
		];

		districts.sort(function (a, b) {
			if (b > a) {
				return -1;
			}
			if (a > b) {
				return 1;
			}
			return 0;
		});


		$.each(districts,function(key,val){
			//  console.log(val);
			$('#xdistrict').append('<option>'+val.toUpperCase()+'</option>');			
		});

		</script>";
	}
			
} 