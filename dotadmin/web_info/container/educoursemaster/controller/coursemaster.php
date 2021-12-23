<?php

class Coursemaster extends Controller{
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
            "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Course Information","rowindex"=>"0", "ctrlvalid"=>array()),
            "coursesl"=>array("required"=>"*","label"=>"Course ID","ctrlfield"=>"xcourse", "ctrlvalue"=>"", "ctrltype"=>"group", "ctrlvalid"=>array(),"rowindex"=>"1","url"=>URL."popuppage/coursepopup/coursesl"),			
			"coursetitle"=>array("required"=>"*","label"=>"Course Title","ctrlfield"=>"xcoursetitle", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"1"),			
            "coursedesc"=>array("required"=>"","label"=>"Course Long Description","ctrlfield"=>"xcoursedesc", "ctrlvalue"=>"", "ctrltype"=>"editor", "ctrlvalid"=>array(),"rowindex"=>"2"),						
            "trainer1"=>array("required"=>"*","label"=>"Trainer/Teacher 1","ctrlfield"=>"xteacher", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Trainer","rowindex"=>"3"),
			"trainer1amt"=>array("required"=>"*","label"=>"Trainer 1 Pay","ctrlfield"=>"xteacheramt", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),						
			"trainer2"=>array("required"=>"*","label"=>"Trainer/Teacher 2","ctrlfield"=>"xteacher1", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Trainer","rowindex"=>"3"),
			"trainer2amt"=>array("required"=>"*","label"=>"Trainer 2 Pay","ctrlfield"=>"xteacheramt1", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"false"),"rowindex"=>"3"),						
            "uservenu"=>array("required"=>"*","label"=>"Venu","ctrlfield"=>"xvenu", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Venu","rowindex"=>"4"),
            "coursecat"=>array("required"=>"*","label"=>"Course Category","ctrlfield"=>"xcat", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Course Category","rowindex"=>"4"),
            "startdate"=>array("required"=>"*","label"=>"Start Date","ctrlfield"=>"xstartdate", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"4"),
            "skilllevel"=>array("required"=>"","label"=>"Skill level","ctrlfield"=>"xskillevel", "ctrlvalue"=>"", "ctrltype"=>"editor", "ctrlvalid"=>array(),"rowindex"=>"5"),		
			"learning"=>array("required"=>"","label"=>"Learning of this course","ctrlfield"=>"xlearning", "ctrlvalue"=>"", "ctrltype"=>"editor", "ctrlvalid"=>array(),"rowindex"=>"6"),
			"courseclass"=>array("required"=>"*","label"=>"Course Class","ctrlfield"=>"xcourseclass", "ctrlvalue"=>array("Training"=>"Training","Course"=>"Course"), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Course Class","rowindex"=>"7"),	
			"currency"=>array("required"=>"*","label"=>"Currency","ctrlfield"=>"xcur", "ctrlvalue"=>"BDT", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"false"),"rowindex"=>"7"),		
			"logisticamt"=>array("required"=>"*","label"=>"Logistc Amount","ctrlfield"=>"xlogisticamt", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","number"=>"true"),"rowindex"=>"7"),		
			"point"=>array("required"=>"*","label"=>"Point","ctrlfield"=>"xpoint", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","number"=>"true"),"rowindex"=>"7"),		
			"numclass"=>array("required"=>"*","label"=>"Number Of Classes","ctrlfield"=>"xnumclass", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","number"=>"true"),"rowindex"=>"8"),		
			"hourclass"=>array("required"=>"*","label"=>"Hour Of Classes","ctrlfield"=>"xhourclass", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","number"=>"true"),"rowindex"=>"8"),		
			"duration"=>array("required"=>"*","label"=>"Duration","ctrlfield"=>"xduration", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true"),"rowindex"=>"8"),							
			"capacity"=>array("required"=>"*","label"=>"Capacity","ctrlfield"=>"xcapacity", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true"),"rowindex"=>"8"),							
			"venuamt"=>array("required"=>"*","label"=>"Venu Amount","ctrlfield"=>"xvenuamt", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","number"=>"true"),"rowindex"=>"9"),		
			"vatamt"=>array("required"=>"*","label"=>"VAT","ctrlfield"=>"xvat", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","number"=>"true"),"rowindex"=>"9"),		
			"txnamt"=>array("required"=>"*","label"=>"Trunsaction Amount","ctrlfield"=>"xtxnamt", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true"),"rowindex"=>"9"),							
			"tmamt"=>array("required"=>"*","label"=>"Training Manager Amount","ctrlfield"=>"xtmamt", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true"),"rowindex"=>"9"),							
			"coursetype"=>array("required"=>"*","label"=>"Course Type","ctrlfield"=>"xcoursetype", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Course Type","rowindex"=>"10"),
			"price"=>array("required"=>"*","label"=>"Course Price","ctrlfield"=>"xprice", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"10"),			
            "priority"=>array("required"=>"*","label"=>"Fetured Training","ctrlfield"=>"xpriority", "ctrlvalue"=>array(""=>"","1"=>"1","0"=>"0"), "ctrltype"=>"select","ctrlselected"=>"1", "ctrlvalid"=>array(),"codetype"=>"Featured Course","rowindex"=>"10"),
            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmcourse", "title"=>"User Form"),
            "actionbtn"=>array(                
                array("btnmethod"=>"update","btntext"=>"Update","btnurl"=>URL."coursesettings/updatecourse","btnid"=>"courseupdate"),
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save Course","btnurl"=>URL."coursesettings/savecourse","btnid"=>"usersave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View Course","btnurl"=>URL."coursesettings/singlecourse","btnid"=>"viewcourse", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"Clear","btnurl"=>"","btnid"=>"clearall", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            "coursetitle"=>array("required"=>"","label"=>"Course Title","ctrlfield"=>"xcoursetitle", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1","url"=>"1"),			
            "teacher"=>array("required"=>"","label"=>"Trainer/Teacher","ctrlfield"=>"xteacher1", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),						            
            "category"=>array("required"=>"","label"=>"Category","ctrlfield"=>"xcat", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),		
            "venu"=>array("required"=>"","label"=>"Venu","ctrlfield"=>"xvenu", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),						
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search Course"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."coursesettings/findcourse","btnid"=>"searchcourse", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
                array("btnmethod"=>"print","btntext"=>"Print","btnurl"=>"","btnid"=>"printuserlist", "icon"=>"<i class=\"fa fa-print mr-1\"></i>","btncolor"=>"btn-dark"),
            ),
        );
        
    }

	function init(){   
		$url = URL.'coursesettings/uploadimage';
		$id = "userdropzone";
 
		 $basicform = new Basicform();
 
		 $tabsettings = array(
			 0=>array("isactive"=>"active","tabdesc"=>"Create Course", "tabid"=>"tabcreatecourse", "tabcontent"=>$basicform->createform($this->formset,$this->formfield, false), "icon"=>"far fa-user"),
			 1=>array("isactive"=>"","tabdesc"=>"Upload Image", "tabid"=>"tabuploadimage", "tabcontent"=>ImageUpload::createdropzone($url,$id), "icon"=>"fa fa-cloud-upload-alt"),
			 2=>array("isactive"=>"","tabdesc"=>"Search For Course", "tabid"=>"tabsearchcourse", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),          
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/course_view");
	 }


	 function savecourse(){
        $skilllevel = $_POST['skilllevel'];
		$xlearning = $_POST['learning'];
		$coursedesc = $_POST['coursedesc'];
		$xdate = $_POST['startdate'];
		$det = str_replace('/', '-', $xdate);
		$date = date('Y-m-d', strtotime($det));
		
        $inputs = new Form();
            try{
            $inputs ->post("coursesl")
			
					->post("coursetitle")
                    ->val('minlength', 2)
                    
                
                    
                    ->post("trainer1")
                    ->val('minlength', 1)

					->post("trainer1amt")
                    ->val('minlength', 1)

					->post("trainer2")
                    
					
					->post("trainer2amt")
                    

                    ->post("uservenu")

                    ->post("coursecat")
                    
                    ->post("priority")
                    
                    ->post("currency")

					->post("venuamt")
                    
                    ->post("vatamt")

					->post("txnamt")
                    
                    ->post("tmamt")

					->post("logisticamt")

					->post("courseclass")

                    ->post("point")
                    
                    ->post("numclass")

					->post("hourclass")

                    ->post("duration")
                    
                    ->post("capacity")

					->post("coursetype")

					
                    ->post("price")

                    ->post("coursesl");

            $inputs	->submit();       
            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
                exit;
            }

            $onduplicate = 'on duplicate key update xcoursetitle=VALUES(xcoursetitle), xcoursedesc=VALUES(xcoursedesc),xskillevel=VALUES(xskillevel),
                            xcat=VALUES(xcat),xcoursedesc=VALUES(xcoursedesc),xteacheramt=VALUES(xteacheramt),xcourseclass=VALUES(xcourseclass),
							xlearning=VALUES(xlearning), xvenu=VALUES(xvenu), xteacher=VALUES(xteacher),xcapacity=VALUES(xcapacity),
							xnumclass=VALUES(xnumclass), xhourclass=VALUES(xhourclass), xduration=VALUES(xduration),xcoursetype=VALUES(xcoursetype),
							xprice=VALUES(xprice), xpoint=VALUES(xpoint),xvenuamt=VALUES(xvenuamt), xvat=VALUES(xvat),
							xtxnamt=VALUES(xtxnamt), xtmamt=VALUES(xtmamt),
							 xstartdate=VALUES(xstartdate),xpriority=VALUES(xpriority),xlogisticamt=VALUES(xlogisticamt) ';
			
            $inpdata = $inputs->fetch();
			
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);


			$data['xstartdate']=$date; 
            $data['bizid']=100;
			$data['xskillevel']=$skilllevel; 
			$data['xlearning']=$xlearning; 
			$data['xcoursedesc']=$coursedesc; 
			$data['zemail']=Session::get('suser'); //add business id to array for inserting
			if(!is_numeric($data['xcourse'])){
				unset($data['xcourse']);
			}
            //  //remove autoincrement id from inserting      
			//Logdebug::appendlog(print_r($data, true));
            $success = $this->model->save($data, $onduplicate);
            //Logdebug::appendlog(print_r($data, true));
            if($success > 0)
                echo json_encode(array('message'=>'Course Saved Successfully','result'=>'success','keycode'=>$success));
             else
                echo json_encode(array('message'=>'Failed to save course'.$date,'result'=>'error','keycode'=>''));
    }

	

	function findcourse(){
        $storeFolder = USER_IMAGE_LOCATION;
        $conditions = [];
        $params = [];
        $coursetitle = $_POST['coursetitle'];
        $teacher = $_POST['teacher'];
        $cat = $_POST['category'];
        $venu = $_POST['venu']; 
        //Logdebug::appendlog(serialize($_POST));
        if($coursetitle!=""){
            $conditions[]="xcoursetitle like ?";
            $params[]='%'.$coursetitle.'%';
        }
        if($teacher!=""){
            $conditions[]="xteacher like ?";
            $params[]='%'.$teacher.'%';
        }
        if($cat!=""){
            $conditions[]="xcat like ?";
            $params[]='%'.$cat.'%';
        }
        if($venu!=""){
            $conditions[]="xvenu like ?";
            $params[]='%'.$venu.'%';
        }

        //Logdebug::appendlog(serialize($conditions));

        $userdt =  $this->model->getcourse($conditions,$params);  
        
        echo json_encode($userdt);
        
    }
	
	function singlecourse(){
        $storeFolder = PRODUCT_IMAGE_LOCATION;
        $course = $_POST['param']; 
        $coursedt =  $this->model->getsinglecourse($course);  
		$courseid = $coursedt[0]["xcourse"];
        $coursedt[0]["coursephoto"]="";
        foreach (glob($storeFolder.$courseid.".jpg") as $file) {
					
            $coursedt[0]["coursephoto"] = $file;
            
        }
        echo json_encode($coursedt);
        
    }

	public function uploadimage(){
		
		$storeFolder = PRODUCT_IMAGE_LOCATION;   //2

        $filename = $_POST['dzuserid'];
		
        $result=array();
        foreach (glob($storeFolder.$filename.".jpg") as $file) {
            echo json_encode($result);					
            exit;					
        }
        
        if($filename==''){
            echo json_encode($result);
            exit;
        }
		if (!empty($_FILES)) {

			
				$sfile = $filename.".jpg";	
				
                $imgupload = new ImageUpload();
				$imgupload->store_uploaded_image($storeFolder,'file', 370, 240, $filename);
					

			//Logdebug::appendlog($result);
		}
		
		
		foreach (glob($storeFolder.$filename.".jpg") as $file) {					
					$result[] = $file;					
				}
		echo json_encode($result);
		//Logdebug::appendlog($_FILES['file']['tmp_name']);

    }

	function showuploadedimage(){
        $storeFolder = PRODUCT_IMAGE_LOCATION; 
        $filename = $_POST['param']; 
        $result=array();
		
		foreach (glob($storeFolder.$filename.".jpg") as $file) {
					
					$result[] = $file;
					
				}
			echo json_encode($result);

    }

	public function dropimage(){
		$storeFolder = PRODUCT_IMAGE_LOCATION;    //2
        $request = $_POST['request'];
        $filename = $_POST['name'];
		if($request == 2){ 
			
			$targetFile =  $storeFolder.$filename.'.jpg';  //5
			
			unlink($targetFile); //6
			
		}	
		
		
		foreach (glob($storeFolder.$filename.".jpg") as $file) {
			echo json_encode(array('message'=>'Failed to delete user image!','result'=>'error','keycode'=>''));
            exit;
			}
            echo json_encode(array('message'=>'User image deleted!','result'=>'success','keycode'=>''));
			
    }	
    

	function script(){
		$basicform = new Basicform(); 
		return "
		<script>

		var ckcoursedesc = CKEDITOR.replace('coursedesc', {
			
			on: {
			   pluginsLoaded: function(event) {
				  event.editor.dataProcessor.dataFilter.addRules({
					 elements: {
						script: function(element) {
						   return false;
						}
					 }
				  });
			   }
			}
		 });
		
		 ckcoursedesc.on('change', function() {
			ckcoursedesc.updateElement();         
			});
	

		var ckskilllevel = CKEDITOR.replace('skilllevel', {
			
			on: {
			   pluginsLoaded: function(event) {
				  event.editor.dataProcessor.dataFilter.addRules({
					 elements: {
						script: function(element) {
						   return false;
						}
					 }
				  });
			   }
			}
		 });
		
		 ckskilllevel.on('change', function() {
			ckskilllevel.updateElement();         
			});

			var cklearning = CKEDITOR.replace('learning', {
			
				on: {
				   pluginsLoaded: function(event) {
					  event.editor.dataProcessor.dataFilter.addRules({
						 elements: {
							script: function(element) {
							   return false;
							}
						 }
					  });
				   }
				}
			 });
			
			 cklearning.on('change', function() {
				cklearning.updateElement();         
				});
		
		

		//-----------------------
		// save update delete ajax
		//-----------------------
		".$basicform->returnajax($this->formset, "coursesl")."
		//-----------------------
		//user form validation
		//-----------------------
		".$basicform->validateform($this->formfield, 'frmcourse')."            
		//-----------------------
		//upload user image
	   //-----------------------
	   ".$basicform->dropzone('userdropzone', 'coursesl')."  
	   
	   let today = new Date();
		let dd = today.getDate();

		let mm = today.getMonth()+1; 
		const yyyy = today.getFullYear();

		$('input[name=\"startdate\"]').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			startDate: dd+'-'+mm+'-'+yyyy,
			locale: {
				format: 'DD-MM-YYYY'
				}
			});

	   $('#clearall').on('click', function(){
			$('#frmcourse').trigger('reset');
			$('#imglist').html('No image found!');
		})

		
   
		$('#searchcourse').on('click', function(){
            
			var url = '".URL."coursesettings/findcourse';
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
						   tblhtml='<thead><th>Course ID</th><th>Course Tiltle</th><th>Teacher</th><th>Category</th><th>Venu</th></thead>';
						   tblhtml+='<tbody>';
						   $.each(result, function(key, value){
						   
									tblhtml+='<tr><td><a class=\"tblrow\" href=\"javascript:void(0)\">'+value.xcourse+'</a></td><td>'+value.xcoursetitle+'</td><td>'+value.xteacher+'</td><td>'+value.xcat+'</td><td>'+value.xvenu+'</td></tr>';      
									
						   });
						   tblhtml+='</tbody>';
						   $('#searchtbl').html(tblhtml);
						   
								  
						},
						error: function(xhr, resp, text) {
							loaderoff();
							$(this).removeClass('disabled');
						   
							console.log(xhr, resp, text);
						}
					});
					return false;
		});

		//-----------------------
            // show user & uploaded image
           //-----------------------
                $('#viewcourse').on('click', function(){
                    var url = $(this).val();
                    var uid = $('#coursesl').val();
                    $.ajax({
                        url:url, 
                        type : 'POST',
                        dataType : 'json', 						
                        data : {param:uid}, // post data || get data
                        beforeSend:function(){
                            $('#viewcourse').addClass('disabled');
                            loaderon(); 
                        },
                        success : function(response) {
                            
                            loaderoff();
                           
                           $('#viewcourse').removeClass('disabled');
                           
                           const myObjStr = response; 
						   $('#coursesl').val(myObjStr[0].xcourse);
						   $('#coursetitle').val(myObjStr[0].xcoursetitle);
						   $('#startdate').val(myObjStr[0].xstartdate);
						   $('#trainer1').html('<option value=\"'+myObjStr[0].xteacher+'\">'+myObjStr[0].xteacher+'</option>');
						   $('#trainer1amt').val(myObjStr[0].xteacheramt);
						   $('#trainer2').html('<option value=\"'+myObjStr[0].xteacher1+'\">'+myObjStr[0].xteacher1+'</option>');
						   $('#trainer2amt').val(myObjStr[0].xteacheramt1);
						   $('#logisticamt').val(myObjStr[0].xlogisticamt);
						   $('#point').val(myObjStr[0].xpoint);
						   $('#capacity').val(myObjStr[0].xcapacity);
						   $('#numclass').val(myObjStr[0].xnumclass);
						   $('#hourclass').val(myObjStr[0].xhourclass);
						   $('#duration').val(myObjStr[0].xduration);
						   $('#venuamt').val(myObjStr[0].xvenuamt);
						   $('#vatamt').val(myObjStr[0].xvat);
						   $('#txnamt').val(myObjStr[0].xtxnamt);
						   $('#tmamt').val(myObjStr[0].xtmamt);
						   $('#priority').html('<option value=\"'+myObjStr[0].xpriority+'\">'+myObjStr[0].xpriority+'</option>');
						   $('#coursecat').html('<option value=\"'+myObjStr[0].xcat+'\">'+myObjStr[0].xcat+'</option>');
						   $('#coursetype').html('<option value=\"'+myObjStr[0].xcoursetype+'\">'+myObjStr[0].xcoursetype+'</option>');
						   CKEDITOR.instances['coursedesc'].setData(myObjStr[0].xcoursedesc);
						   CKEDITOR.instances['learning'].setData(myObjStr[0].xlearning);
						   CKEDITOR.instances['skilllevel'].setData(myObjStr[0].xskillevel);
                           $('#coursedesc').val(myObjStr[0].xcoursedesc);
						   $('#price').val(myObjStr[0].xprice);
                           $('#uservenu').html('<option value=\"'+myObjStr[0].xvenu+'\">'+myObjStr[0].xvenu+'</option>');
						   
                           $('#imglist').html('Image not found!');
                            if(myObjStr[0].coursephoto!=''){
                                $('#imglist').html('');
                                var photo = myObjStr[0].coursephoto;                                
                                $('#imglist').append('<div class=\"col-1\"><div class=\"row\"><img src=\"'+photo+'\" height=\"50\" width=\"60\"></div><div class=\"row\"><a href=\"javascript:void(0)\" onclick=\"imgdrop(\''+photo+'\')\">Remove</a></div></div>');	
                            }
                                    
                        },
                        error: function(xhr, resp, text) {
                            loaderoff();
                            $('#viewcourse').removeClass('disabled');
                           
                            console.log(xhr, resp, text);
                        }
                    });
                })

				$('#coursesl').on('keyup', function (e) {
                    if (e.keyCode === 13) {
                        $('#viewcourse').click();
                        
                    }
                });


				//-----------------------
                // Drop uploaded image
               //-----------------------

                function imgdrop(img){
                    $.ajax({
                        url:'".URL."coursesettings/dropimage', // url where to submit the request
                        type : 'POST', // type of action POST || GET
                        dataType : 'json', // data type						
                        data : {name: $('#coursesl').val(),request:2}, // post data || get data
                        beforeSend:function(){
                            $('.loader').show();
                        },
                        success : function(result) {
                            loaderoff();
                            //const myObjStr = JSON.parse(result);
                            if(result.result=='success'){
                                $('#imglist').html('No image found!');
                                toastr.success(result.message);    
                            }else{
                                toastr.success(result.message);  
                            }
                            
                        },
                        error: function(xhr, resp, text) {
                            loaderoff();
                            console.log(xhr, resp, text);
                        }
                    })
                }

		$('body').on('click','.tblrow', function(){
			_this = $(this).html();                    
			$('.nav-tabs a[href=\"#tabcreatecourse\"]').tab('show');
			$('#coursesl').val(_this);
			$('#viewcourse').click();
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

		</script>";
	}
			
} 