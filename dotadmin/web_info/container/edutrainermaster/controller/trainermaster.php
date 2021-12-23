<?php

class Trainermaster extends Controller{
	private $formfield=array();
	function __construct(){
		parent::__construct();
		$this->intializeform();
		$this->view->script=$this->script();
		Session::init();
        if(!Session::get('logedin') || Session::get('slogintype') != "Admin"){
            header('location: '. URL .'adminlogin');
            exit;
        }
	}
	private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(
            "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Course Information","rowindex"=>"0", "ctrlvalid"=>array()),
            "teachersl"=>array("required"=>"*","label"=>"Teacher ID","ctrlfield"=>"xteacher", "ctrlvalue"=>"", "ctrltype"=>"group", "ctrlvalid"=>array(),"rowindex"=>"1","url"=>URL."popuppage/teacherpopup/teachersl"),			
			"teachername"=>array("required"=>"*","label"=>"Teacher Name","ctrlfield"=>"xteachername", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"1"),			
			"mobile"=>array("required"=>"*","label"=>"Mobile","ctrlfield"=>"xmobile", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"11"),"rowindex"=>"1"),
			"email"=>array("required"=>"*","label"=>"Email","ctrlfield"=>"xemailaddr", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","email"=>"true","minlength"=>"7"),"rowindex"=>"2"),
			"address"=>array("required"=>"*","label"=>"Address","ctrlfield"=>"xaddress", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"2"),			
            "education"=>array("required"=>"*","label"=>"Education","ctrlfield"=>"xeducation", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),						
			"owndesc"=>array("required"=>"","label"=>"Own Description","ctrlfield"=>"xowndesc", "ctrlvalue"=>"", "ctrltype"=>"editor", "ctrlvalid"=>array(),"rowindex"=>"4"),						
            "expartarea"=>array("required"=>"","label"=>"Expart Area","ctrlfield"=>"xexpartarea", "ctrlvalue"=>"", "ctrltype"=>"editor", "ctrlvalid"=>array(),"rowindex"=>"5"),						
			"category"=>array("required"=>"*","label"=>"Category","ctrlfield"=>"category", "ctrlvalue"=>array("None"=>"None"), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Trainer Category","rowindex"=>"6"),
			"sortindex"=>array("required"=>"*","label"=>"Sort Index","ctrlfield"=>"xsortindex", "ctrlvalue"=>"100", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"6"),
            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmtrainer", "title"=>"Trainer Entry Form"),
            "actionbtn"=>array(                
                array("btnmethod"=>"Delete","btntext"=>"Delete","btnurl"=>URL."trainersettings/deletetrainer","btnid"=>"trainerdelete"),
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save Information","btnurl"=>URL."trainersettings/savetrainer","btnid"=>"trainersave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View Information","btnurl"=>URL."trainersettings/singletrainer","btnid"=>"viewtrainer", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"New","btnurl"=>"","btnid"=>"clearall", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            "trainername"=>array("required"=>"","label"=>"Trainer Name","ctrlfield"=>"xtrainername", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1","url"=>"1"),			
            "mobile"=>array("required"=>"","label"=>"Mobile","ctrlfield"=>"xmobile", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),						            
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search Course"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."trainersettings/findtrainer","btnid"=>"searchtrainer", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
                array("btnmethod"=>"print","btntext"=>"Print","btnurl"=>"","btnid"=>"printuserlist", "icon"=>"<i class=\"fa fa-print mr-1\"></i>","btncolor"=>"btn-dark"),
            ),
        );
        
    }

	function init(){   
		$url = URL.'trainersettings/uploadimage';
		$id = "userdropzone";
 
		 $basicform = new Basicform();
 
		 $tabsettings = array(
			 0=>array("isactive"=>"active","tabdesc"=>"Manage Trainer/Teacher", "tabid"=>"tabcreatetrainer", "tabcontent"=>$basicform->createform($this->formset,$this->formfield, false), "icon"=>"far fa-user"),
			 1=>array("isactive"=>"","tabdesc"=>"Upload Image", "tabid"=>"tabuploadimage", "tabcontent"=>ImageUpload::createdropzone($url,$id), "icon"=>"fa fa-cloud-upload-alt"),
			 2=>array("isactive"=>"","tabdesc"=>"Search For Trainer", "tabid"=>"tabsearchtrainer", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),          
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/trainer_view");
	 }


	 function savetrainer(){
        $expartarea = $_POST['expartarea'];
		$owndesc = $_POST['owndesc'];
		// Logdebug::appendlog('test');
        $inputs = new Form();
            try{
            $inputs ->post("teachersl")
			
					->post("teachername")
                    ->val('minlength', 2)
                    
                
                    
                    ->post("mobile")
                    ->val('minlength', 1)

					->post("email")
                    ->val('minlength', 1)

					->post("address")

					->post("sortindex")

					->post("category")
                    
					
					->post("education");

            $inputs	->submit();       
            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
                exit;
            }

            $onduplicate = 'on duplicate key update xteachername=VALUES(xteachername), xmobile=VALUES(xmobile),xemailaddr=VALUES(xemailaddr),
                            xaddress=VALUES(xaddress),xsortindex=VALUES(xsortindex),category=VALUES(category),xowndesc=VALUES(xowndesc),xexpartarea=VALUES(xexpartarea),xeducation=VALUES(xeducation)';
			
            $inpdata = $inputs->fetch();
			
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);
            $data['bizid']=Session::get('sbizid');
			$data['xexpartarea']=$expartarea; 
			$data['xexperience']=10; 
			$data['xowndesc']=$owndesc; 			
			$data['zemail']=Session::get('suser'); //add business id to array for inserting
			if(!is_numeric($data['xteacher'])){
				unset($data['xteacher']);
			}
            //  //remove autoincrement id from inserting      
			
            $success = $this->model->save($data, $onduplicate);
            //Logdebug::appendlog(print_r($data, true));
            if($success > 0)
                echo json_encode(array('message'=>'Trainer/Teacher Saved Successfully','result'=>'success','keycode'=>$success));
             else
                echo json_encode(array('message'=>'Failed to save Trainer/Teacher','result'=>'error','keycode'=>''));
    }

	

	function findtrainer(){
        $storeFolder = USER_IMAGE_LOCATION;
        $conditions = "bizid = ".Session::get('sbizid')."";
        $teachername = $_POST['trainername'];
        $mobile = $_POST['mobile'];
        
        //Logdebug::appendlog(serialize($_POST));
        if($teachername!=""){
			$conditions .=" and xteachername like '%".$teachername."%'";
        }
        if($mobile!=""){
			$conditions .=" and xmobile like '%".$mobile."%'";
        }
        

        //Logdebug::appendlog(serialize($conditions));

        $trainerdt =  $this->model->gettrainer($conditions);  
        
        echo json_encode($trainerdt);
        
    }
	
	function singletrainer(){
        $storeFolder = TEACHER_IMAGE_LOCATION;
        $trainer = $_POST['param']; 
        $trainerdt =  $this->model->getsingletrainer($trainer);  
		$trainerid = $trainerdt[0]["xteacher"];
        $trainerdt[0]["trainerphoto"]="";
        foreach (glob($storeFolder.$trainerid.".jpg") as $file) {
					
            $trainerdt[0]["trainerphoto"] = $file;
            
        }
        echo json_encode($trainerdt);
        
    }

	public function uploadimage(){
		
		$storeFolder = TEACHER_IMAGE_LOCATION;   //2

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
				//Logdebug::appendlog($sfile);	
                $imgupload = new ImageUpload();
				$imgupload->store_uploaded_image($storeFolder,'file', 240, 170, $filename);
					

			//Logdebug::appendlog($result);
		}
		
		
		foreach (glob($storeFolder.$filename.".jpg") as $file) {					
					$result[] = $file;					
				}
		echo json_encode($result);
		//Logdebug::appendlog($_FILES['file']['tmp_name']);

    }

	function showuploadedimage(){
        $storeFolder = TEACHER_IMAGE_LOCATION; 
        $filename = $_POST['param']; 
        $result=array();
		
		foreach (glob($storeFolder.$filename.".jpg") as $file) {
					
					$result[] = $file;
					
				}
			echo json_encode($result);

    }

	public function dropimage(){
		$storeFolder = TEACHER_IMAGE_LOCATION;    //2
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

		var owndesc = CKEDITOR.replace('owndesc', {
			
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
		
		 owndesc.on('change', function() {
			owndesc.updateElement();         
			});
	

		var expartarea = CKEDITOR.replace('expartarea', {
			
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
		
		 expartarea.on('change', function() {
			expartarea.updateElement();         
			});

			
		//-----------------------
		// save update delete ajax
		//-----------------------
		".$basicform->returnajax($this->formset, "teachersl")."
		//-----------------------
		//user form validation
		//-----------------------
		".$basicform->validateform($this->formfield, 'frmtrainer')."            
		//-----------------------
		//upload user image
	   //-----------------------
	   ".$basicform->dropzone('userdropzone', 'teachersl')."   

	   $('#clearall').on('click', function(){
			$('#frmtrainer').trigger('reset');
			$('#imglist').html('No image found!');
		})
   
		$('#searchtrainer').on('click', function(){
            
			var url = '".URL."trainersettings/findtrainer';
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
						   tblhtml='<thead><th>Trainer/Teacher ID</th><th>Name</th><th>Email</th><th>Mobile</th><th>Address</th></thead>';
						   tblhtml+='<tbody>';
						   $.each(result, function(key, value){
						   
									tblhtml+='<tr><td><a class=\"tblrow\" href=\"javascript:void(0)\">'+value.xteacher+'</a></td><td>'+value.xteachername+'</td><td>'+value.xemailaddr+'</td><td>'+value.xmobile+'</td><td>'+value.xaddress+'</td></tr>';      
									
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
                $('#viewtrainer').on('click', function(){
                    var url = $(this).val();
                    var uid = $('#teachersl').val();
                    $.ajax({
                        url:url, 
                        type : 'POST',
                        dataType : 'json', 						
                        data : {param:uid}, // post data || get data
                        beforeSend:function(){
                            $('#viewtrainer').addClass('disabled');
                            loaderon(); 
                        },
                        success : function(response) {
                            
                            loaderoff();
                           
                           $('#viewtrainer').removeClass('disabled');
                           
                           const myObjStr = response; 
						   $('#teachersl').val(myObjStr[0].xteacher);
						   $('#teachername').val(myObjStr[0].xteachername);
						   $('#email').val(myObjStr[0].xemailaddr);
						   $('#mobile').val(myObjStr[0].xmobile);
						   $('#address').val(myObjStr[0].xaddress);
						   $('#education').val(myObjStr[0].xeducation);
						   $('#category').html('<option value=\"'+myObjStr[0].category+'\">'+myObjStr[0].category+'</option>');
						   CKEDITOR.instances['owndesc'].setData(myObjStr[0].xowndesc);
						   CKEDITOR.instances['expartarea'].setData(myObjStr[0].xexpartarea);
						   
                           $('#imglist').html('Image not found!');
                            if(myObjStr[0].coursephoto!=''){
                                $('#imglist').html('');
                                var photo = myObjStr[0].trainerphoto;                                
                                $('#imglist').append('<div class=\"col-1\"><div class=\"row\"><img src=\"'+photo+'\" height=\"50\" width=\"60\"></div><div class=\"row\"><a href=\"javascript:void(0)\" onclick=\"imgdrop(\''+photo+'\')\">Remove</a></div></div>');	
                            }
                                    
                        },
                        error: function(xhr, resp, text) {
                            loaderoff();
                            $('#viewtrainer').removeClass('disabled');
                           
                            console.log(xhr, resp, text);
                        }
                    });
                })

				$('#teachersl').on('keyup', function (e) {
                    if (e.keyCode === 13) {
                        $('#viewtrainer').click();
                        
                    }
                });


				//-----------------------
                // Drop uploaded image
               //-----------------------

                function imgdrop(img){
                    $.ajax({
                        url:'".URL."trainersettings/dropimage', // url where to submit the request
                        type : 'POST', // type of action POST || GET
                        dataType : 'json', // data type						
                        data : {name: $('#teachersl').val(),request:2}, // post data || get data
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
			$('.nav-tabs a[href=\"#tabcreatetrainer\"]').tab('show');
			$('#teachersl').val(_this);
			$('#viewtrainer').click();
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