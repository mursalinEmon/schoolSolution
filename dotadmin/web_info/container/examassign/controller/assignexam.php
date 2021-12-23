<?php

class Assignexam extends Controller{
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
            "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Exam Assign","rowindex"=>"0", "ctrlvalid"=>array()),

			// "formdetail"=>array("id"=>"formsearch", "title"=>"Search Assigned Exam"),

			"exammstsl"=>array("required"=>"*","label"=>"Exam ID","ctrlfield"=>"xexammstsl", "ctrlvalue"=>"", "ctrltype"=>"text", "readonly"=>"readonly", "ctrlvalid"=>array(),"rowindex"=>"1"),

			"itemcode"=>array("required"=>"*","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

			"lesson"=>array("required"=>"*","label"=>"Lesson","ctrlfield"=>"xlessonno", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),			

			"batch"=>array("required"=>"*","label"=>"Batch","ctrlfield"=>"xbatch", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Batch", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"questionset"=>array("required"=>"*","label"=>"Question Set","ctrlfield"=>"xset", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),





			// "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Question Information","rowindex"=>"0", "ctrlvalid"=>array()),

			// "exammstsl "=>array("required"=>"*","label"=>"Exam ID","ctrlfield"=>"xexammstsl ", "ctrlvalue"=>"", "ctrltype"=>"text", "readonly"=>"readonly", "ctrlvalid"=>array(),"rowindex"=>"1"),

			// "itemcode"=>array("required"=>"*","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

			// "lesson"=>array("required"=>"*","label"=>"Lesson","ctrlfield"=>"xlessonno", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),			

            // "batch"=>array("required"=>"*","label"=>"Batch","ctrlfield"=>"xbatch", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Batch", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),
           

			// "section2"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Create Question","rowindex"=>"3", "ctrlvalid"=>array()),

			// "title"=>array("required"=>"*","label"=>"Question Title","ctrlfield"=>"ztime", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"4"),

			// "option1"=>array("required"=>"*","label"=>"Option 1","ctrlfield"=>"zutime", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"5"),

			// "option2"=>array("required"=>"*","label"=>"Option 2","ctrlfield"=>"option2", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"6"),


			// "option3"=>array("required"=>"*","label"=>"Option 3","ctrlfield"=>"option3", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"7"),

			// "option4"=>array("required"=>"*","label"=>"Option 4","ctrlfield"=>"option4", "ctrlvalue"=>"", 
			// "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"8"),

			// "section3"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Provide Answer","rowindex"=>"9", "ctrlvalid"=>array()),

			// "answer"=>array("required"=>"*","label"=>"Correct Answer","ctrlfield"=>"answer", "ctrlvalue"=>"", 
			// "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"10"),
            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmnotice", "title"=>"User Form"),
            "actionbtn"=>array(                
                array("btnmethod"=>"update","btntext"=>"Update","btnurl"=>URL."questioncreate/updatequestion","btnid"=>"noticeupdate"),
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Assign Exam","btnurl"=>URL."examassign/assignexam","btnid"=>"usersave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"Find Exam","btnurl"=>URL."examassign/findExam","btnid"=>"findexam", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"Clear","btnurl"=>"","btnid"=>"clearall", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            "itmcode"=>array("required"=>"*","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Course", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

            "batchid"=>array("required"=>"*","label"=>"Batch","ctrlfield"=>"xbatch", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Batch", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),						
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search Assigned Exam"),
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
			 0=>array("isactive"=>"active","tabdesc"=>"Assign Exam", "tabid"=>"tabcreatenotice", "tabcontent"=>$basicform->createform($this->formset,$this->formfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"far fa-user"),
			 1=>array("isactive"=>"","tabdesc"=>"Search For Exam", "tabid"=>"tabsearchnotice", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false), "icon"=>"fa fa-search"),          
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/examassign_view");
	 }


	 function findExam(){

		$itemcode = $_POST['itemcode'];
		$lesson = $_POST['lesson'];
		$questionset = $_POST['questionset'];
		$batch = $_POST['batch'];

            $data['bizid']=Session::get('sbizid');
            $data['itemcode']=$itemcode;
            $data['lesson']=$lesson;
            $data['batch']=$batch;
            $data['questionset']=$questionset;
			
            //  //remove autoincrement id from inserting      
			// Logdebug::appendlog(print_r($data, true));
            $success = $this->model->getExam($data);
			$exams =  $success[0];
            // Logdebug::appendlog(print_r($exams, true));
            if($exams > 0)
                echo json_encode(array('message'=>'Exam Available','result'=>'success','keycode'=>$exams));
             else
                echo json_encode(array('message'=>'Failed to Find Exam'.$data,'result'=>'error','keycode'=>''));
    }

	function assignExam(){
		// Logdebug::appendlog('hello');
		$exam = $_POST['exam'];
		$onduplicate="";
		$data=array(
			"bizid" => Session::get('sbizid'),
			"xitemcode" => $exam["xitemcode"],
			"xexammstsl" => $exam["xexammstsl"],
			"xset" => $exam["xset"],
			"xbatch" => $exam["xbatch"],
			"xlessonno" => $exam["xlessonno"],
			"xstartdate" => $exam["xdate"],
			"xenddate" => $exam["xdate"],
			"xstarttime" => $exam["xstarttime"],
			"xendtime" => $exam["xendtime"],
			"zactive" => 1,
			
		);
        // Logdebug::appendlog(print_r($data, true));


		$success = $this->model->assign($data, $onduplicate);
        // Logdebug::appendlog(print_r($success, true));


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

		$('#findexam').on('click',function(){
			var url = $(this).val();
			var formid = 'frmnotice';
			console.log(url);

			$.ajax({
				url:url, 
				type : 'POST',
				dataType : 'json', 						
				data : $('#'+formid).serialize(), 
				beforeSend:function(){
					$(this).addClass('disabled');
					// loaderon(); 
				},
				success : function(result) {

					console.log(result);
					var exam = result.keycode;
					console.log(typeof(exam));

					
					loaderoff();
							var tblhtml ='';
						   $(this).removeClass('disabled');

						   if(result.result=='fielderror'){
								toastr.error(result.message);
							}
						if(result.result='success'){
						   tblhtml='<thead><th>Exam ID</th><th>Course</th><th>Batch</th><th>Exam Date</th><th>Exam Start Time</th><th>Exam End Time</th><th>Action</th></thead>';
						   tblhtml+='<tbody>';
						   
						   
								tblhtml+='<tr><td><a class=\"btn btn-primary tblrow\" style=\"border-radius:60px; font-size: 12px; href=\"javascript:void(0)\">'+exam.xexammstsl+'</a></td><td>'+exam.xitemcode+'</td><td>'+exam.xbatch+'</td><td>'+exam.xstarttime+'</td><td>'+exam.xdate+'</td><td>'+exam.xendtime+'...</td><td><a class=\"btn btn-primary\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px\" id=\"assignexamnow\">Assign Exam</a></td></tr>';      
									
					
						   tblhtml+='</tbody>';
						   $('#searchtbl').html(tblhtml);

						   if(result.result=='error'){
								toastr.error(result.message);                               
							}

							$('#assignexamnow').on('click', function(){
								var url = '".URL."examassign/assignExam';
								$.ajax({
									url:url, 
									type : 'POST',
									dataType : 'json', 						
									data : {exam:exam}, 
									beforeSend:function(){
										$(this).addClass('disabled');
										// loaderon(); 
									},
									success : function(result) {
					
										console.log(result);
										
											  
									},
									error: function(xhr, resp, text) {
										loaderoff();
										$(this).removeClass('disabled');
									   
										console.log(xhr, resp, text);
									}
								});
								return false;
								console.log('assignExam');
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
						if(result.result=='success'){
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
					type : 'POST',
					dataType : 'json', 						
					data : {param:uid}, // post data || get data
					
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

						var courses = '".URL."examassign/getCourse';
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
						var batchs = '".URL."examassign/getSelectBatch/'+myObjStr[0].xitemcode;
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

		</script>";
	}
			
} 