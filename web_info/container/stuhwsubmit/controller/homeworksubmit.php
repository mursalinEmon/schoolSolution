<?php

class Homeworksubmit extends Controller{
	private $formfield=array();
	function __construct(){
		parent::__construct();
		$this->intializeform();
		$this->view->script=$this->script();
		Session::init();
        if(!Session::get('loggedIn')){
            header('location: '. URL .'studentlogin');
            exit;
        }
	}
	

	private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(
            "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"HW Information","rowindex"=>"0", "ctrlvalid"=>array()),

            "quesid"=>array("required"=>"*","label"=>"HW ID","ctrlfield"=>"xquesid", "ctrlvalue"=>"", "ctrltype"=>"group", "ctrlvalid"=>array(),"rowindex"=>"1","url"=>URL."popuppage/coursepopup/quesid"),

			"itemcode"=>array("required"=>"*","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),			

            "batch"=>array("required"=>"*","label"=>"Batch","ctrlfield"=>"xbatch", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Batch", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

            "date"=>array("required"=>"*","label"=>"Start Date","ctrlfield"=>"xdate", "ctrlvalue"=>"", "ctrltype"=>"datepicker", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

            "duedate"=>array("required"=>"*","label"=>"Due Date","ctrlfield"=>"xduedate", "ctrlvalue"=>"", "ctrltype"=>"datepicker", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

            "marks"=>array("required"=>"*","label"=>"Marks","ctrlfield"=>"xmarks", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"description"=>array("required"=>"","label"=>"Description","ctrlfield"=>"xdescription", "ctrlvalue"=>"", "ctrltype"=>"editor", "ctrlvalid"=>array("required"=>"true","minlength"=>"5"),"rowindex"=>"3")
            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmnotice", "title"=>"User Form"),
            "actionbtn"=>array(                
                array("btnmethod"=>"update","btntext"=>"Update","btnurl"=>URL."hwsubmit/updatenotice","btnid"=>"noticeupdate"),
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save HW","btnurl"=>URL."hwsubmit/savenotice","btnid"=>"usersave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View HW","btnurl"=>URL."hwsubmit/singlenotice","btnid"=>"viewnotice", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"Clear","btnurl"=>"","btnid"=>"clearall", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            "xsubject"=>array("required"=>"*","label"=>"Subject","ctrlfield"=>"xsubname", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),						
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search HW"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."hwsubmit/findhomework","btnid"=>"searchnotice", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );
        
    }

	function init(){ 

		$url = URL.'hwsubmit/uploadimage';
		$id = "userdropzone";
 
		 $basicform = new Basicform();
 
		 $tabsettings = array(
			 
			0=>array("isactive"=>"active","tabdesc"=>"Search For HW", "tabid"=>"tabsearchnotice", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),
			           
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("dashboard","abr/hwsubmit_view");
	 }


	 function savenotice(){

		$data = array();
        $date = date('Y-m-d');
		$pdflocat = "";
		$success = 0;
		if($_POST['sl'] != ""){
			$success = $_POST['sl'];
		}
		$storeFolder = HW_ANSWER_LOCATION;
		if(file_exists($storeFolder.$success.".pdf")){
			$pdflocat = $storeFolder.$success.".pdf";
		}
		// Logdebug::appendlog($_POST['qid']);die;
            try{

				if($_POST['hwdescription'] == "")
					throw new Exception("Description is empty!");

            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field'], 'pdfurl'=>$pdflocat));
                exit;
            }
			
			$studentid=Session::get('suser');
			$student = $this->model->fetchStudent($studentid);
			$student = $student[0];
			// Logdebug::appendlog(print_r($student, true));
            
			// Logdebug::appendlog(print_r($data, true));die;   
			$cols = "xitemcode,xclass,xversion,xshift,xsession,xsection,xstudentid,xdescription,xquesid,xdate,bizid,zemail";

			$vals = "((select xitemcode from homework_questions where bizid=".Session::get('sbizid')." and xquesid='".$_POST['qid']."'),'".$student['xclass']."','".$student['xversion']."','".$student['xshift']."','".$student['xsession']."','".$student['xsection']."','".$studentid."', '".$_POST['hwdescription']."', '".$_POST['qid']."', '".$date."', ".Session::get('sbizid').", '".Session::get('suser')."')";

			// $onduplicate = 'on duplicate key update xdescription=VALUES(xdescription), xitemcode=VALUES(xitemcode), xbatch=VALUES(xbatch)';
			$onduplicate = "";
			//Logdebug::appendlog(print_r($data, true));
            $success = $this->model->save($cols, $vals, $onduplicate);
            //Logdebug::appendlog(print_r($data, true));
			$storeFolder = HW_ANSWER_LOCATION;
			if(file_exists($storeFolder.$success.".pdf")){
				$pdflocat = $storeFolder.$success.".pdf";
			}
					
            if($success > 0){
				echo json_encode(array('message'=>'HW question Saved Successfully','result'=>'success','keycode'=>$success, 'pdfurl'=>$pdflocat));
			}else{
				echo json_encode(array('message'=>'Failed to Save HW question'.$date,'result'=>'error','keycode'=>'', 'pdfurl'=>$pdflocat));
			}
    }

	function fillSubject(){

        $studentid=Session::get('suser');
        // Logdebug::appendlog(print_r($studentid, true));
        $student = $this->model->fetchStudent($studentid);
        $student = $student[0];
        $subjects = $this->model->fetchSubjects($student);

        if($subjects)
               echo json_encode(array('message'=>'Subject found Successfully','result'=>'success','keycode'=>$subjects));
            else
               echo json_encode(array('message'=>'Failed to find subject','result'=>'error','keycode'=>''));

    }

	function findhomework(){
        $res = "";
        $batchid = "";
        $subject = $_POST['xsubject'];
        // Logdebug::appendlog(print_r($subject, true));
        $studentid=Session::get('suser');
        $student = $this->model->fetchStudent($studentid);
        $student = $student[0];
        // Logdebug::appendlog(print_r($student, true));
        // if(isset($_POST['batchid']))
        //     $batchid = $_POST['batchid'];
            
        try{
        // Logdebug::appendlog(serialize($subject));
            
            if($subject == ""){
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
            $homework =  $this->model->findhomework($subject,$student);
            // Logdebug::appendlog(print_r($homework, true));
            echo json_encode($homework);
        }
        
    }
	
	function singlenotice(){
		$storeFolder = HW_ANSWER_LOCATION;
        $notice = $_POST['param']; 
        $noticedt =  $this->model->getsinglenotice($notice);
		$trainerid = $noticedt[0]["xquesid"];
        $noticedt[0]["trainerphoto"]="";
		//Logdebug::appendlog($storeFolder);
		//Logdebug::appendlog($trainerid);
        foreach (glob($storeFolder.$trainerid.".pdf") as $file) {
					
            $noticedt[0]["trainerphoto"] = $file;
            
        }
        //Logdebug::appendlog(print_r($noticedt, true));
        echo json_encode($noticedt);
        
    }

	public function uploadimage(){
		// Logdebug::appendlog(HW_QUESTION_LOCATION);
		$storeFolder = HW_ANSWER_LOCATION;   //2

        $filename = $_POST['dzuserid'];
		
        $result=array();
        foreach (glob($storeFolder.$filename.".pdf") as $file) {
            echo json_encode($result);					
            exit;					
        }
        
        if($filename==''){
            echo json_encode($result);
            exit;
        }
		if (!empty($_FILES)) {

			
				$sfile = $filename.".pdf";	
				//Logdebug::appendlog($sfile);	
                $imgupload = new ImageUpload();
				$imgupload->store_uploaded_pdf($storeFolder,'file', $filename);
					

			//Logdebug::appendlog($result);
		}
		
		
		foreach (glob($storeFolder.$filename.".pdf") as $file) {					
					$result[] = $file;					
				}
		echo json_encode($result);
		//Logdebug::appendlog($_FILES['file']['tmp_name']);

    }

	function showuploadedimage(){
        $storeFolder = HW_ANSWER_LOCATION; 
        $filename = $_POST['dzuserid']; 
        $result=array();
		
		foreach (glob($storeFolder.$filename.".pdf") as $file) {
					
					$result[] = $file;
					
				}
			echo json_encode($result);

    }

	public function dropimage(){
		$storeFolder = HW_ANSWER_LOCATION;    //2
        $request = $_POST['request'];
        $filename = $_POST['name'];
		if($request == 2){ 
			
			$targetFile =  $storeFolder.$filename.'.pdf';  //5
			
			unlink($targetFile); //6
			
		}	
		
		
		foreach (glob($storeFolder.$filename.".pdf") as $file) {
			echo json_encode(array('message'=>'Failed to delete user Pdf!','result'=>'error','keycode'=>''));
            exit;
			}
            echo json_encode(array('message'=>'User Pdf deleted!','result'=>'success','keycode'=>''));
			
    }


	function singlenoticemodal($notice){
        // Logdebug::appendlog(print_r($notice, true));
        $homework =  $this->model->gethmdetails($notice);
        // Logdebug::appendlog(print_r($homework, true));
        echo json_encode($homework);
        
    }

	
	function getsubmitanswer($quesid){
        // Logdebug::appendlog(print_r($quesid, true));
        $hwdetail =  $this->model->getsinglesubmithw($quesid);
        echo json_encode($hwdetail);
        
    }

	function getCourse(){
        $courses = $this->model->getCourse();
        echo json_encode($courses);
    }

	function getSelectBatch($course){
        //Logdebug::appendlog($batch);
        $batchdt =  $this->model->getSelectBatch($course);
        echo json_encode($batchdt);
        
    }
    

	function script(){
		$basicform = new Basicform(); 
		return "
		<script>

		
		
		

		//-----------------------
		// save update delete ajax
		//-----------------------
		".$basicform->returnajax($this->formset, "quesid")."
		//-----------------------
		//user form validation
		//-----------------------
		".$basicform->validateform($this->formfield, 'frmnotice')."
		



		Dropzone.autoDiscover = false;
		$('#userdropzone').dropzone ({			
			addRemoveLinks: true, 
			acceptedFiles: '.pdf',
			sending: function(file, xhr, formData){
				formData.append('dzuserid', $('#sl').val());
			},                          
			maxFilesize: 1,
			dictDefaultMessage: 'Drop files here or click here to upload. <br /> Only Pdf Allowed',
			success: function (file, response) {
				
				console.log(response)
				const myObjStr = JSON.parse(response);
				if(myObjStr.length==0){
					toastr.error('File upload failed!');                        
					}else{
					toastr.success('File uploaded successfully!');        
					}
				//$('#imglist').html('');
				myObjStr.forEach(function(resp){   
						
					$('#imglist').html('<div class=\"col-1\"><div class=\"row\"><a href=\"'+resp+'\" target=\"_blank\"><img src=".URL."public/images/uploads/homework/pdf.png alt=\"View PDF\" width=\"90\" height=\"50\">View PDF</a><a style=\"color: red\" href=\"javascript:void(0)\" onclick=\"imgdrop(\''+resp+'\')\">Remove</a></div></div>');	
				});
				this.removeAllFiles(true); 
			},                    
			removedfile: function(file) {
				//toastr.warning('Files Removed successfully!');
				var _ref;
				return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
			}
		});
	   
	   
		 

	   $('#clearall').on('click', function(){
			$('#frmnotice').trigger('reset');
			$('#imglist').html('No image found!');
		})

		var subjects = '".URL."hwsubmit/fillSubject';
        $('#xsubject').append('<option>--select--</option>')
        $.get(subjects, function(o){
            console.log(o);
            var subjects = o.keycode;
            for(var i = 0; i < subjects.length; i++){ 					
                $('#xsubject').append($('<option>', {value: subjects[i].xsubcode, text: subjects[i].xsubname}));
            }
        }, 'json');
   
		$('#searchnotice').on('click', function(){
            
			var url = '".URL."hwsubmit/findhomework';
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
						   tblhtml='<thead><th>Submit</th><th>Start Date</th><th>Due Date</th><th>Marks</th><th>Description</th><th>Action</th></thead>';
						   tblhtml+='<tbody>';
						   $.each(result, function(key, value){
						   
								tblhtml+='<tr><td><a id=\"btnhwsubmit\" class=\"btn btn-primary\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px\" data-toggle=\"modal\" data-target=\"#myModal1\" onClick=\"openSubmitModal(\''+value.xquesid+'\')\">Submit</a></td><td>'+value.xdate+'</td><td>'+value.xduedate+'</td><td>'+value.xmarks+'</td><td>'+value.xdescription+'...</td><td><a class=\"btn btn-success\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px; float: right; margin-left: 3px\" data-toggle=\"modal\" data-target=\"#viewModal\" onClick=\"open_modal(\''+value.xquesid+'\')\">View HW</a><a class=\"btn btn-info\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px; float: right;\" href=".HW_QUESTION_LOCATION."'+value.xquesid+'.pdf target=\"_blank\">View PDF</a></td></tr>';      
									
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
            var notices = '".URL."hwsubmit/singlenoticemodal/'+sl;
            //console.log(notices);
            $.get(notices, function(o){
                //console.log(o);
                $('#ntitle').append(o[0].xsubname);
				$('#ndescription').append(o[0].xdescription);
            }, 'json');
        }


		//---------------------
        // Click Submit in modal
        //---------------------
        
        function openSubmitModal(quesid){
            // alert(quesid)
            $('#qid').val(quesid);
			// console.log(o);
			$('#sl').val('');
			var hwdt = '".URL."hwsubmit/getsubmitanswer/'+quesid;
            //console.log(hwdt.length);
				$.get(hwdt, function(o){
					//console.log(o);
					if(o.length > 0){
						$('#sl').val(o[0].xsl);
					}
				}, 'json');
			
            
        }

		//-----------------------
		// show user & uploaded image
		//-----------------------
			$('#viewnotice').on('click', function(){
				var url = $(this).val();
				var uid = $('#sl').val();
				//console.log(uid);
				$.ajax({
					url:url, 
					type : 'POST',
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
						$('#quesid').val(myObjStr[0].xquesid);
						$('#itemcode').html('<option value=\"'+myObjStr[0].xitemcode+'\">'+myObjStr[0].xitemdesc+'</option>');
						$('#batch').html('<option value=\"'+myObjStr[0].xbatch+'\">'+myObjStr[0].xbatchname+'</option>');
						$('#date').val(myObjStr[0].xdate);
						$('#duedate').val(myObjStr[0].xduedate);
						$('#marks').val(myObjStr[0].xmarks);
						CKEDITOR.instances['description'].setData(myObjStr[0].xdescription);
						$('#description').val(myObjStr[0].xdescription);
						console.log(myObjStr[0]);

						$('#imglist').html('Image not found!');
                            if(myObjStr[0].coursephoto!=''){
                                $('#imglist').html('');
                                var photo = myObjStr[0].trainerphoto; 
								//console.log(photo);                               
                                $('#imglist').append('<div class=\"col-1\"><div class=\"row\"><a href=\"'+photo+'\" target=\"_blank\"><img src=".URL."public/images/uploads/homework/pdf.png alt=\"View PDF\" width=\"60\" height=\"50\">View PDF</a></div><div class=\"row\"><a style=\"color: red\" href=\"javascript:void(0)\" onclick=\"imgdrop(\''+photo+'\')\">Remove</a></div></div>');	
                            }

						//----------------------------
						// Course Select data for view //
						//----------------------------

						var courses = '".URL."hwsubmit/getCourse';
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
						var batchs = '".URL."hwsubmit/getSelectBatch/'+myObjStr[0].xitemcode;
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

			//-----------------------
			// Drop uploaded image
			//-----------------------

			function imgdrop(img){
				$.ajax({
					url:'".URL."hwsubmit/dropimage', // url where to submit the request
					type : 'POST', // type of action POST || GET
					dataType : 'json', // data type						
					data : {name: $('#sl').val(),request:2}, // post data || get data
					beforeSend:function(){
						$('.loader').show();
					},
					success : function(result) {
						loaderoff();
						//const myObjStr = JSON.parse(result);
						if(result.result=='success'){
							$('#imglist').html('No pdf found!');
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
			$('.nav-tabs a[href=\"#tabcreatenotice\"]').tab('show');
			$('#quesid').val(_this);
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

		var courses = '".URL."hwsubmit/getCourse';
		//console.log(courses);
		$('#itemcode').append('<option>--select--</option>')
		$.get(courses, function(o){
			//console.log(o);
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
			var batchs = '".URL."hwsubmit/getSelectBatch/'+val;
			$('#batch').append('<option>--select--</option>')
			$.get(batchs, function(o){
				//console.log(o);
				for(var i = 0; i < o.length; i++){ 					
					$('#batch').append($('<option>', {value: o[i].xbatch, text: o[i].xbatchname}));
				}
			}, 'json');

		})

		//----------------------------
		// Course Select data for search //
		//---------------------

		var courses = '".URL."hwsubmit/getCourse';
		console.log(courses);
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
			var batchs = '".URL."hwsubmit/getSelectBatch/'+val;
			$('#batchid').append('<option>--select--</option>')
			$.get(batchs, function(o){
				//console.log(o);
				for(var i = 0; i < o.length; i++){ 					
					$('#batchid').append($('<option>', {value: o[i].xbatch, text: o[i].xbatchname}));
				}
			}, 'json');

		})

		$(\"div[id^='myModal']\").each(function(){
  
			var currentModal = $(this);
			
			//click next
			currentModal.find('.btn-next').click(function(){
			  currentModal.modal('hide');
			  currentModal.closest(\"div[id^='myModal']\").nextAll(\"div[id^='myModal']\").first().modal('show'); 
			});
			
			//click prev
			currentModal.find('.btn-prev').click(function(){
			  currentModal.modal('hide');
			  currentModal.closest(\"div[id^='myModal']\").prevAll(\"div[id^='myModal']\").first().modal('show'); 
			});
		  
		  });

		  $('#btnhwsubmit').on('click', function(){ 
            //console.log($('#itmcode').val());
            var url = '".URL."hwsubmit/savenotice'; 
                if($('#frmhwsubmit').valid()){
                    $.ajax({
                        url:url, 
                        type : 'POST',
                        dataType : 'json', 						
                        data : $('#frmhwsubmit').serialize(), 
                        beforeSend:function(){
                            $(this).addClass('disabled');
                            loaderon(); 
                        },
                        success : function(result) {
                            //console.log(result);
                            loaderoff();
                           $(this).removeClass('disabled');
						   $('#imglist').html('');
						   if(result.pdfurl != ''){          
								$('#imglist').append('<div class=\"col-1\"><div class=\"row\"><a href=\"'+result.pdfurl+'\" target=\"_blank\"><img src=".URL."public/images/uploads/homework/pdf.png alt=\"View PDF\" width=\"90\" height=\"50\">View PDF</a></div><div class=\"row\"><a style=\"color: red\" href=\"javascript:void(0)\" onclick=\"imgdrop(\''+result.pdfurl+'\')\">Remove</a></div></div>');	
							}
                               
                            if(result.result=='fielderror'){
                                toastr.error(result.message);
                                $('#'+result.keycode).focus();
                            }

                            if(result.result=='success'){
                                toastr.success(result.message);
                                $('#sl').val(result.keycode);
                                                           
                            }

                            if(result.result=='error'){
                                toastr.error(result.message);                               
                            }
                                    
                        },
                        error: function(xhr, resp, text) {
                            loaderoff();
                            $(this).removeClass('disabled');
                           
                            console.log(xhr, resp, text);
                        }
                    });
                }
                return false;
        });

		$('#hwdescription').on('keyup',function(){
			var desc = $(this).val();
			if(desc != ''){
				$('#btnhwsubmit').prop(\"disabled\",false);
			}else{
				$('#btnhwsubmit').prop(\"disabled\",true);
			}
		})

		</script>";
	}
			
} 