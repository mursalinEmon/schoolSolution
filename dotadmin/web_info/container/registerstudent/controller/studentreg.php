<?php

class Studentreg extends Controller{
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
			// "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Student ID","rowindex"=>"0", "ctrlvalid"=>array()),

			

			// "xsession"=>array("required"=>"*","label"=>"Session","ctrlfield"=>"xsession", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

			// "xclass"=>array("required"=>"*","label"=>"Class","ctrlfield"=>"xclass", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

			// "xversion"=>array("required"=>"*","label"=>"Version","ctrlfield"=>"xversion", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

			// "xshift"=>array("required"=>"*","label"=>"Shift","ctrlfield"=>"xshift", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			// "xsection"=>array("required"=>"*","label"=>"Section","ctrlfield"=>"xsection", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),


			// "xroll"=>array("required"=>"*","label"=>"Roll","ctrlfield"=>"xroll", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

            "section2"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Student Information","rowindex"=>"3", "ctrlvalid"=>array()),

			"xstudentid"=>array("required"=>"*","label"=>"Student ID","ctrlfield"=>"xstudentid", "ctrlvalue"=>"", "ctrltype"=>"text", "readonly"=>"readonly", "ctrlvalid"=>array(),"rowindex"=>"4"),

			"xstuname"=>array("required"=>"*","label"=>"Student Name","ctrlfield"=>"xstuname", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"4"),

			"xdob"=>array("required"=>"*","label"=>"Students Birth Date","ctrlfield"=>"xdob", "ctrlvalue"=>"", "ctrltype"=>"datepicker", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"5"),

			"xbirth"=>array("required"=>"*","label"=>"Student Birth Certificate","ctrlfield"=>"xbirth", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"5"),

			"xsex"=>array("required"=>"*","label"=>"Sex","ctrlfield"=>"xsex", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"5"),

			"xmobile"=>array("required"=>"","label"=>"Students Mobile","ctrlfield"=>"xmobile", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>array(),"rowindex"=>"6"),

			"xstuemail"=>array("required"=>"","label"=>"Students Email","ctrlfield"=>"xstuemail", "ctrlvalue"=>"", "ctrltype"=>"email", "ctrlvalid"=>array(),"rowindex"=>"6"),




			"xaddress1"=>array("required"=>"*","label"=>"Students Present Address","ctrlfield"=>"xaddress1", "ctrlvalue"=>"", "ctrltype"=>"textarea","arearows"=>"1", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"7"),
			"xaddress2"=>array("required"=>"*","label"=>"Students Parmanent Address","ctrlfield"=>"xaddress2", "ctrlvalue"=>"", "ctrltype"=>"textarea","arearows"=>"1", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"7"),

			"xreligion"=>array("required"=>"*","label"=>"Religion","ctrlfield"=>"xreligion", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"8"),

			"xbloodgrp"=>array("required"=>"*","label"=>"Blood Group","ctrlfield"=>"xbloodgrp", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"8"),

			"xnationality"=>array("required"=>"*","label"=>"Nationality","ctrlfield"=>"xnationality", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"8"),

			"xthana"=>array("required"=>"*","label"=>"Thana","ctrlfield"=>"xthana", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"9"),
			"xcity"=>array("required"=>"*","label"=>"City","ctrlfield"=>"xcity", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"9"),
			"xdistrict"=>array("required"=>"*","label"=>"District","ctrlfield"=>"xdistrict", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"9"),
			

			"xfname"=>array("required"=>"*","label"=>"Father Name","ctrlfield"=>"xfname", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"10"),

			"xfmobile"=>array("required"=>"*","label"=>"Father Mobile","ctrlfield"=>"xfmobile", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"10"),

			"xmname"=>array("required"=>"*","label"=>"Mother Name","ctrlfield"=>"xmname", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"11"),
			"xmmobile"=>array("required"=>"*","label"=>"Mother Mobile","ctrlfield"=>"xmmobile", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"11"),

			"xguardian"=>array("required"=>"*","label"=>"Guardian Name","ctrlfield"=>"xguardian", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"12"),

			"xguardianmobile"=>array("required"=>"*","label"=>"Guardian Mobile","ctrlfield"=>"xguardianmobile", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"12"),

			"xguardiannid"=>array("required"=>"*","label"=>"Guardian NID","ctrlfield"=>"xguardiannid", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"12"),

			"xpassword"=>array("required"=>"","label"=>"Password","ctrlfield"=>"xpassword", "ctrlvalue"=>"", "ctrltype"=>"password", "ctrlvalid"=>array(),"rowindex"=>"13"),
			"xconfirmpassword"=>array("required"=>"","label"=>"Confirm Password","ctrlfield"=>"xconfirmpassword", "ctrlvalue"=>"", "ctrltype"=>"password", "ctrlvalid"=>array(),"rowindex"=>"13"),

            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmnotice", "title"=>"User Form"),
            "actionbtn"=>array(                
                array("btnmethod"=>"update","btntext"=>"Update","btnurl"=>URL."questioncreate/updatequestion","btnid"=>"noticeupdate"),
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save","btnurl"=>URL."studentregister/saveStudent","btnid"=>"usersave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View Student","btnurl"=>URL."questioncreate/singleQuestion","btnid"=>"viewnotice", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
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
			 0=>array("isactive"=>"active","tabdesc"=>"Register Student", "tabid"=>"tabcreatenotice", "tabcontent"=>$basicform->createform($this->formset,$this->formfield, false), "icon"=>"far fa-user"),
			 1=>array("isactive"=>"","tabdesc"=>"Search For Student", "tabid"=>"tabsearchnotice", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),          
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/studentreg_view");
	 }


	 function saveStudent(){
		// // $xdate = $_POST['startdate'];
        // $dt = date('Y/m/d', strtotime($xdate));
        // $date = str_replace('/', '-', $dt);
		// Logdebug::appendlog('test');

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

					->post("xsection")
                    ->val('minlength', 1)

					->post("xroll")
                    ->val('minlength', 1)

					->post("xstuname")
                    ->val('minlength', 1)

					->post("xdob")
                    ->val('minlength', 1)

					->post("xbirth")
                    ->val('minlength', 1)

					->post("xmobile")
                    ->val('minlength', 1)


					->post("xstuemail")
                    ->val('minlength', 1)


					->post("xaddress1")
                    ->val('minlength', 1)

					->post("xaddress2")
                    ->val('minlength', 1)

					->post("xreligion")
                    ->val('minlength', 1)

					->post("xsex")
                    ->val('minlength', 1)

					->post("xbloodgrp")
                    ->val('minlength', 1)


					->post("xnationality")
                    ->val('minlength', 1)

					->post("xthana")
                    ->val('minlength', 1)

					->post("xcity")
                    ->val('minlength', 1)

					->post("xdistrict")
                    ->val('minlength', 1)

					->post("xfname")
                    ->val('minlength', 1)

					->post("xfmobile")
                    ->val('minlength', 1)

					->post("xmname")
                    ->val('minlength', 1)

					->post("xmmobile")
                    ->val('minlength', 1)

					->post("xguardian")
                    ->val('minlength', 1)

					->post("xguardianmobile")
                    ->val('minlength', 1)

					->post("xguardiannid")
                    ->val('minlength', 1)

					->post("xpassword")
                    ->val('minlength', 1)
					
					->post("xconfirmpassword")
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
        	// Logdebug::appendlog(print_r($data, true));

			

			$xpass = Hash::create('sha256',$data["xpassword"],HASH_KEY);

			$xdate = $data['xdob'];
        	$dt = date('Y/m/d', strtotime($xdate));
        	$xdob = str_replace('/', '-', $dt);

			$data['xdob']=$xdob;
			$data['xpassword']=$xpass;
			$data['xregflag'] = 0;
			$data['zactive'] = 1;
			// $data['zutime']=date("H:i:s");
            $data['bizid']=Session::get('sbizid');
			// $data['zemail']=Session::get('suser'); //add business id to array for inserting
            //  //remove autoincrement id from inserting 
			
			$removeKeys = array('xsession', 'xclass', 'xversion','xshift','xsection','xroll','xconfirmpassword');

			foreach($removeKeys as $key) {
			unset($data[$key]);
			}
			Logdebug::appendlog(print_r($data, true));
            $success = $this->model->save($data, $onduplicate);
            //Logdebug::appendlog(print_r($data, true));
            if($success > 0)
                echo json_encode(array('message'=>'Exam Created Successfully','result'=>'success','keycode'=>$success));
             else
                echo json_encode(array('message'=>'Failed to Create Exam'.$data,'result'=>'error','keycode'=>''));
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
			$('#xdistrict, #xcity, #xthana').append('<option>'+val.toUpperCase()+'</option>');			
		});

		</script>";
	}
			
} 