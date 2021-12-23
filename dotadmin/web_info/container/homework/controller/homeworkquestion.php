<?php

class Homeworkquestion extends Controller{
	private $formfield=array();
	function __construct(){
		parent::__construct();
		$this->intializeform();
		$this->view->script=$this->script();
		Session::init();
        if(!Session::get('logedin') || Session::get('slogintype') != "Teacher"){
            header('location: '. URL .'adminlogin');
            exit;
        }
	}
	

	private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(
            "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"HW Information","rowindex"=>"0", "ctrlvalid"=>array()),

            "quesid"=>array("required"=>"*","label"=>"HW ID","ctrlfield"=>"xquesid", "ctrlvalue"=>"", "ctrltype"=>"text", "readonly"=>"readonly", "ctrlvalid"=>array(),"rowindex"=>"1"),

			"xsession"=>array("required"=>"*","label"=>"Session","ctrlfield"=>"xsession", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

			"xclass"=>array("required"=>"*","label"=>"Class","ctrlfield"=>"xclass", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"xversion"=>array("required"=>"*","label"=>"Version","ctrlfield"=>"xversion", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"xshift"=>array("required"=>"*","label"=>"Shift","ctrlfield"=>"xshift", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),

			"xsection"=>array("required"=>"*","label"=>"Section","ctrlfield"=>"xsection", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),

            
			"xsubject"=>array("required"=>"*","label"=>"Subject","ctrlfield"=>"xsubname", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"4"),

			"xitemcode"=>array("required"=>"*","label"=>"Subject Code","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"4"),			

            "date"=>array("required"=>"*","label"=>"Start Date","ctrlfield"=>"xdate", "ctrlvalue"=>"", "ctrltype"=>"datepicker", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"5"),

            "duedate"=>array("required"=>"*","label"=>"Due Date","ctrlfield"=>"xduedate", "ctrlvalue"=>"", "ctrltype"=>"datepicker", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"5"),

            "marks"=>array("required"=>"*","label"=>"Marks","ctrlfield"=>"xmarks", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"5"),

			"description"=>array("required"=>"","label"=>"Description","ctrlfield"=>"xdescription", "ctrlvalue"=>"", "ctrltype"=>"editor", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"6")
            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmnotice", "title"=>"User Form"),
            "actionbtn"=>array(
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save HW","btnurl"=>URL."hwquestion/savenotice","btnid"=>"usersave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View HW","btnurl"=>URL."hwquestion/singlenotice","btnid"=>"viewnotice", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"Clear","btnurl"=>"","btnid"=>"clearall", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            "itmcode"=>array("required"=>"*","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Course", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

            "batchid"=>array("required"=>"*","label"=>"Batch","ctrlfield"=>"xbatch", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Batch", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),						
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search HW"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."hwquestion/findnotice","btnid"=>"searchnotice", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
                array("btnmethod"=>"print","btntext"=>"Print","btnurl"=>"","btnid"=>"printuserlist", "icon"=>"<i class=\"fa fa-print mr-1\"></i>","btncolor"=>"btn-dark"),
            ),
        );
        
    }

	function init(){ 

		$url = URL.'hwquestion/uploadimage';
		$id = "userdropzone";
 
		 $basicform = new Basicform();
 
		 $tabsettings = array(
			 0=>array("isactive"=>"active","tabdesc"=>"Create HW", "tabid"=>"tabcreatenotice", "tabcontent"=>$basicform->createform($this->formset,$this->formfield, false), "icon"=>"far fa-user"),
			 1=>array("isactive"=>"","tabdesc"=>"Upload PDF", "tabid"=>"tabuploadimage", "tabcontent"=>ImageUpload::createdropzonepdf($url,$id), "icon"=>"fa fa-cloud-upload-alt"),
			 2=>array("isactive"=>"","tabdesc"=>"Search For HW", "tabid"=>"tabsearchnotice", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),          
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/homework_view");
	 }


	 function savenotice(){

        $xdate = $_POST['date'];
        $dt = date('Y/m/d', strtotime($xdate));
        $date = str_replace('/', '-', $dt);

        $xddate = $_POST['duedate'];
        $ddt = date('Y/m/d', strtotime($xddate));
        $ddate = str_replace('/', '-', $ddt);
		
        $inputs = new Form();
            try{
            $inputs ->post("quesid")

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

						->post("xsubject")
						->val('minlength', 1)

					->post("xitemcode")
                    ->val('minlength', 1)

					->post("marks")
                    ->val('minlength', 1)

					->post("description")
					->val('minlength', 1);

            $inputs	->submit();       
            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
                exit;
            }

			$onduplicate = "";

            // $onduplicate = 'on duplicate key update xitemcode=VALUES(xitemcode), xbatch=VALUES(xbatch),xmarks=VALUES(xmarks),xdescription=VALUES(xdescription),xdate=VALUES(xdate),xduedate=VALUES(xduedate)';
			
            $inpdata = $inputs->fetch();
			
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);


			$data['xdate']=$date;
			$data['xduedate']=$ddate;
            $data['bizid']=Session::get('sbizid');
			$data['zemail']=Session::get('suser'); //add business id to array for inserting
			if(!is_numeric($data['xquesid'])){
				unset($data['xquesid']);
			}
            //  //remove autoincrement id from inserting      
			// Logdebug::appendlog(print_r($data, true));
            $success = $this->model->save($data, $onduplicate);
            //Logdebug::appendlog(print_r($data, true));
            if($success > 0)
                echo json_encode(array('message'=>'HW question Saved Successfully','result'=>'success','keycode'=>$success));
             else
                echo json_encode(array('message'=>'Failed to Save HW question'.$date,'result'=>'error','keycode'=>''));
    }

	function getClass(){
        $teacher = Session::get('suser');

        $classes = $this->model->getClass($teacher);
        // $classes = $classes[0];
        //    Logdebug::appendlog(print_r($classes, true));

           if($classes > 0)
                echo json_encode(array('message'=>'Class Found Successfully','result'=>'success','keycode'=>$classes));
             else
                echo json_encode(array('message'=>'Failed to find Class','result'=>'error','keycode'=>''));
    }

	function findnotice(){
        $res = "";
        $conditions = " bizid = ".Session::get('sbizid')."";
        $batchid = "";
        $itemcode = $_POST['itmcode'];
        if(isset($_POST['batchid']))
            $batchid = $_POST['batchid'];
            
        try{
        //Logdebug::appendlog(serialize($itemcode));
            if($batchid != ""){
                $conditions .=" and xbatch like '%".$batchid."%'";
            }
            if($itemcode != ""){
                $conditions .= " and xitemcode like '%".$itemcode."%'";
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
		$storeFolder = HW_QUESTION_LOCATION;
        $notice = $_POST['param']; 
        $noticedt =  $this->model->getsinglenotice($notice);
		$trainerid = $noticedt[0]["xquesid"];
        $noticedt[0]["trainerphoto"]="";
		$qsnlocat = Session::get('sbizid')."/"."question/".$trainerid.".pdf";
		//Logdebug::appendlog($storeFolder.$qsnlocat);
		//Logdebug::appendlog($trainerid);
        foreach (glob($storeFolder.$qsnlocat) as $file) {
			// Logdebug::appendlog($file);
            $noticedt[0]["trainerphoto"] = $file;
            
        }
        Logdebug::appendlog(print_r($noticedt, true));
        echo json_encode($noticedt);
        
    }

	public function uploadimage(){
		// Logdebug::appendlog(HW_QUESTION_LOCATION);
		$storeFolder = HW_QUESTION_LOCATION;   //2

        $filename = $_POST['dzuserid'];
		$qsnlocat = Session::get('sbizid')."/"."question/".$filename.".pdf";
		
        $result=array();
        foreach (glob($storeFolder.$qsnlocat) as $file) {
            echo json_encode($result);					
            exit;					
        }
        
        if($filename==''){
            echo json_encode($result);
            exit;
        }
		if (!empty($_FILES)) {

			
				$sfile = Session::get('sbizid')."/"."question/";	
				//Logdebug::appendlog($sfile);	
                $imgupload = new ImageUpload();
				$imgupload->store_uploaded_pdf($storeFolder.$sfile,'file', $filename);
					

			//Logdebug::appendlog($result);
		}
		
		
		foreach (glob($storeFolder.$qsnlocat) as $file) {					
					$result[] = $file;					
				}
		echo json_encode($result);
		//Logdebug::appendlog($_FILES['file']['tmp_name']);

    }

	function showuploadedimage(){
        $storeFolder = HW_QUESTION_LOCATION; 
        $filename = $_POST['param']; 
		$qsnlocat = Session::get('sbizid')."/"."question/".$filename.".pdf";
        $result=array();
		
		foreach (glob($storeFolder.$qsnlocat) as $file) {
					
					$result[] = $file;
					
				}
			echo json_encode($result);

    }

	public function dropimage(){
		$storeFolder = HW_QUESTION_LOCATION;    //2
        $request = $_POST['request'];
        $filename = $_POST['name'];
		$qsnlocat = Session::get('sbizid')."/"."question/".$filename.".pdf";
		if($request == 2){ 
			
			$targetFile =  $storeFolder.$qsnlocat;  //5
			
			unlink($targetFile); //6
			
		}	
		
		
		foreach (glob($storeFolder.$qsnlocat) as $file) {
			echo json_encode(array('message'=>'Failed to delete user Pdf!','result'=>'error','keycode'=>''));
            exit;
			}
            echo json_encode(array('message'=>'User Pdf deleted!','result'=>'success','keycode'=>''));
			
    }


	function singlenoticemodal($notice){
        $noticedt =  $this->model->getsinglenotice($notice);
        //Logdebug::appendlog(print_r($noticedt, true));
        echo json_encode($noticedt);
        
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

		var ckdescription = CKEDITOR.replace('description', {
			
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
		
		 ckdescription.on('change', function() {
			ckdescription.updateElement();         
			});
		
		

		//-----------------------
		// save update delete ajax
		//-----------------------
		".$basicform->returnajax($this->formset, "quesid")."
		//-----------------------
		//user form validation
		//-----------------------
		".$basicform->validateform($this->formfield, 'frmnotice')."
		//-----------------------
		//upload user image
	   //-----------------------
	   ".$basicform->dropzonepdf('userdropzone', 'quesid', '.pdf')." 
		 

	   $('#clearall').on('click', function(){
			$('#frmnotice').trigger('reset');
			$('#imglist').html('No image found!');
		})

		var classes = '".URL."hwquestion/getClass';
       
        $.get(classes, function(o){
            var cls = o.keycode;
            console.log(o.keycode);

            for(var i = 0; i < cls.length; i++){ 					
                $('#xsession').append($('<option>', {value: cls[i].xsession, text: cls[i].xsession}));
                $('#xclass').append($('<option>', {value: cls[i].xclass, text: cls[i].xclass}));
                $('#xversion').append($('<option>', {value: cls[i].xversion, text: cls[i].xversion}));
                $('#xshift').append($('<option>', {value: cls[i].xshift, text: cls[i].xshift}));
                $('#xsection').append($('<option>', {value: cls[i].xsec, text: cls[i].xsec}));
                $('#xsubject').append($('<option>', {value: cls[i].xsubname, text: cls[i].xsubname}));
                $('#xitemcode').append($('<option>', {value: cls[i].xsubcode, text: cls[i].xsubcode}));
            }
            
        }, 'json');
   
		$('#searchnotice').on('click', function(){
            
			var url = '".URL."hwquestion/findnotice';
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
						   tblhtml='<thead><th>HW ID</th><th>Start Date</th><th>Due Date</th><th>Marks</th><th>Description</th><th>Action</th></thead>';
						   tblhtml+='<tbody>';
						   $.each(result, function(key, value){
						   
								tblhtml+='<tr><td><a class=\"btn btn-primary tblrow\" style=\"border-radius:60px; font-size: 12px; href=\"javascript:void(0)\">'+value.xquesid+'</a></td><td>'+value.xdate+'</td><td>'+value.xduedate+'</td><td>'+value.xmarks+'</td><td>'+value.xdescription+'...</td><td><a class=\"btn btn-success\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px\" data-toggle=\"modal\" data-target=\"#myModal\" onClick=\"open_modal(\''+value.xquesid+'\')\">View HW</a></td></tr>';      
									
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
            var notices = '".URL."hwquestion/singlenoticemodal/'+sl;
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
				var uid = $('#quesid').val();
				console.log(url);
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
								console.log(photo);                               
                                $('#imglist').append('<div class=\"col-1\"><div class=\"row\"><a href=\"'+photo+'\" target=\"_blank\"><img src=".URL."public/homework/pdf.png alt=\"View PDF\" width=\"60\" height=\"50\">View PDF</a></div><div class=\"row\"><a style=\"color: red\" href=\"javascript:void(0)\" onclick=\"imgdrop(\''+photo+'\')\">Remove</a></div></div>');	
                            }

						//----------------------------
						// Course Select data for view //
						//----------------------------

						// var courses = '".URL."hwquestion/getCourse';
						// //console.log(courses);
						// $.get(courses, function(o){
						// 	//console.log(o);
						// 	for(var i = 0; i < o.length; i++){ 					
						// 		$('#itemcode').append($('<option>', {value: o[i].xitemcode, text: o[i].xdesc}));
						// 	}
						// }, 'json');

						//----------------------------
						// Batch Select data for view//
						//---------------------

						//var val = $('#itemcode').val();
						var batchs = '".URL."hwquestion/getSelectBatch/'+myObjStr[0].xitemcode;
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
					url:'".URL."hwquestion/dropimage', // url where to submit the request
					type : 'POST', // type of action POST || GET
					dataType : 'json', // data type						
					data : {name: $('#quesid').val(),request:2}, // post data || get data
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

		// var courses = '".URL."hwquestion/getCourse';
		// //console.log(courses);
		// $('#itemcode').append('<option>--select--</option>')
		// $.get(courses, function(o){
		// 	//console.log(o);
		// 	for(var i = 0; i < o.length; i++){ 					
		// 		$('#itemcode').append($('<option>', {value: o[i].xitemcode, text: o[i].xdesc}));
		// 	}
		// }, 'json');


		//----------------------------
		// Batch Select data //
		//---------------------
		
		$('#itemcode').on('change',function(){
			
			$('#batch').find('option').remove();
			var val = $('#itemcode').val();
			var batchs = '".URL."hwquestion/getSelectBatch/'+val;
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

		var courses = '".URL."hwquestion/getCourse';
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
			var batchs = '".URL."hwquestion/getSelectBatch/'+val;
			$('#batchid').append('<option>--select--</option>')
			$.get(batchs, function(o){
				//console.log(o);
				for(var i = 0; i < o.length; i++){ 					
					$('#batchid').append($('<option>', {value: o[i].xbatch, text: o[i].xbatchname}));
				}
			}, 'json');

		})

		</script>";
	}
			
} 