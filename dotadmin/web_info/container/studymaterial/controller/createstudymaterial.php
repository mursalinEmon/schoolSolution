<?php

class Createstudymaterial extends Controller{
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
            "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Study Materials Information","rowindex"=>"0", "ctrlvalid"=>array()),

            "sl"=>array("required"=>"*","label"=>"Material ID","ctrlfield"=>"xsl", "ctrlvalue"=>"", "ctrltype"=>"text", "readonly"=>"readonly", "ctrlvalid"=>array(),"rowindex"=>"1"),			

            "xsession"=>array("required"=>"*","label"=>"Session","ctrlfield"=>"xsession", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

			"xclass"=>array("required"=>"*","label"=>"Class","ctrlfield"=>"xclass", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"xversion"=>array("required"=>"*","label"=>"Version","ctrlfield"=>"xversion", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"xshift"=>array("required"=>"*","label"=>"Shift","ctrlfield"=>"xshift", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),

			"xsection"=>array("required"=>"*","label"=>"Section","ctrlfield"=>"xsection", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),

            "xitemcode"=>array("required"=>"*","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"4"),

			"xsubject"=>array("required"=>"*","label"=>"Subject","ctrlfield"=>"xsubname", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"4"),

			"url"=>array("required"=>"*","label"=>"Youtube Watch Link","ctrlfield"=>"xurl", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"5"),

			"emburl"=>array("required"=>"*","label"=>"Youtube Embedded Link","ctrlfield"=>"xemburl", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"5"),
            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmnotice", "title"=>"User Form"),
            "actionbtn"=>array(
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save Material","btnurl"=>URL."studymaterial/savenotice","btnid"=>"usersave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View Material","btnurl"=>URL."studymaterial/singlenotice","btnid"=>"viewnotice", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"Clear","btnurl"=>"","btnid"=>"clearall", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            "itmcode"=>array("required"=>"*","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Course", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

            "batchid"=>array("required"=>"*","label"=>"Batch","ctrlfield"=>"xbatch", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Batch", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),						
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search Class Materials"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."studymaterial/findnotice","btnid"=>"searchnotice", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
                array("btnmethod"=>"print","btntext"=>"Print","btnurl"=>"","btnid"=>"printuserlist", "icon"=>"<i class=\"fa fa-print mr-1\"></i>","btncolor"=>"btn-dark"),
            ),
        );
        
    }

	function init(){ 
 
		 $basicform = new Basicform();
 
		 $tabsettings = array(
			 0=>array("isactive"=>"active","tabdesc"=>"Create Class Materials", "tabid"=>"tabcreatenotice", "tabcontent"=>$basicform->createform($this->formset,$this->formfield, false), "icon"=>"far fa-user"),
			 1=>array("isactive"=>"","tabdesc"=>"Search For Class Materials", "tabid"=>"tabsearchnotice", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable table-responsive" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),          
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/studymaterial_view");
	 }


	 function savenotice(){
		
        $inputs = new Form();
            try{
            $inputs ->post("sl")
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
                    

					->post("url")
                    ->val('minlength', 1)
					
					->post("emburl")
                    ->val('minlength', 1);

            $inputs	->submit();       
            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
                exit;
            }

			$onduplicate = "";
            // $onduplicate = 'on duplicate key update xitemcode=VALUES(xitemcode), xbatch=VALUES(xbatch),xlessonno=VALUES(xlessonno),xurl=VALUES(xurl),xemburl=VALUES(xemburl),xlessonname=VALUES(xlessonname)';
			
            $inpdata = $inputs->fetch();
			
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);
			// Logdebug::appendlog($data['xitemcode']);
			// Logdebug::appendlog($data['xlessonno']);
			// $lessname =  $this->model->getLessonName($data['xitemcode'], $data['xlessonno']); 
			// $data['xlessonname']=$lessname[0]['xdesc'];
			$data['xdate']=date('Y-m-d');
            $data['bizid']=Session::get('sbizid');
			$data['zemail']=Session::get('suser'); //add business id to array for inserting
			if(!is_numeric($data['xsl'])){
				unset($data['xsl']);
			}
            //  //remove autoincrement id from inserting      
			//Logdebug::appendlog(print_r($data, true));
            $success = $this->model->save($data, $onduplicate);
            //Logdebug::appendlog(print_r($data, true));
            if($success > 0)
                echo json_encode(array('message'=>'Class Materials Saved Successfully','result'=>'success','keycode'=>$success));
             else
                echo json_encode(array('message'=>'Failed to Save Class Materials'.$data,'result'=>'error','keycode'=>''));
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
        echo json_encode($courses);
    }

	function getSelectBatch($course){
        //Logdebug::appendlog($batch);
        $batchdt =  $this->model->getSelectBatch($course);
        echo json_encode($batchdt);
        
    }

	function getSelectLesson($course){
        //Logdebug::appendlog($batch);
        $batchdt =  $this->model->getSelectLesson($course);
		// Logdebug::appendlog(print_r($batchdt,true));
        echo json_encode($batchdt);
        
    }
    

	function script(){
		$basicform = new Basicform(); 
		return "
		<script>

		//-----------------------
		// save update delete ajax
		//-----------------------
		".$basicform->returnajax($this->formset, "sl")."
		//-----------------------
		//user form validation
		//-----------------------
		".$basicform->validateform($this->formfield, 'frmnotice')."            
		 
		var classes = '".URL."studymaterial/getClass';
       
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

	   $('#clearall').on('click', function(){
			$('#frmnotice').trigger('reset');
			$('#imglist').html('No image found!');
		})

		
   
		$('#searchnotice').on('click', function(){
            
			var url = '".URL."studymaterial/findnotice';
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
						   tblhtml='<thead><th>SM ID</th><th>Date</th><th>Lesson</th><th>Youtube Link</th><th>Embedded Link</th></thead>';
						   tblhtml+='<tbody>';
						   $.each(result, function(key, value){
						   
								tblhtml+='<tr><td><a class=\"btn btn-primary tblrow\" style=\"border-radius:60px; font-size: 12px; href=\"javascript:void(0)\">'+value.xsl+'</a></td><td>'+value.xdate+'</td><td>'+value.xlessonname+'</td><td>'+value.xurl+'</td><td>'+value.xemburl+'</td></tr>';      
									
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
            var notices = '".URL."studymaterial/singlenoticemodal/'+sl;
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
				var uid = $('#sl').val();
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
						$('#sl').val(myObjStr[0].xsl);
						$('#itemcode').html('<option value=\"'+myObjStr[0].xitemcode+'\">'+myObjStr[0].xitemdesc+'</option>');
						$('#batch').html('<option value=\"'+myObjStr[0].xbatch+'\">'+myObjStr[0].xbatchname+'</option>');
						$('#lesson').html('<option value=\"'+myObjStr[0].xlessonno+'\">'+myObjStr[0].xlessonname+'</option>');
						$('#url').val(myObjStr[0].xurl);
						$('#emburl').val(myObjStr[0].xemburl);

						//----------------------------
						// Course Select data for view //
						//----------------------------

						var courses = '".URL."studymaterial/getCourse';
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
						var batchs = '".URL."studymaterial/getSelectBatch/'+myObjStr[0].xitemcode;
						$.get(batchs, function(o){
							//console.log(o);
							for(var i = 0; i < o.length; i++){ 					
								$('#batch').append($('<option>', {value: o[i].xbatch, text: o[i].xbatchname}));
							}
						}, 'json');

						//----------------------------
						// Lesson Select data //
						//---------------------

						var lessons = '".URL."studymaterial/getSelectLesson/'+myObjStr[0].xitemcode;
						$('#lesson').append('<option></option>')
						$.get(lessons, function(o){
							//console.log(o);
							for(var i = 0; i < o.length; i++){ 					
								$('#lesson').append($('<option>', {value: o[i].xlesson, text: o[i].xdesc}));
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

			$('#sl').on('keyup', function (e) {
				if (e.keyCode === 13) {
					$('#viewnotice').click();
					
				}
			});


		$('body').on('click','.tblrow', function(){
			_this = $(this).html();                    
			$('.nav-tabs a[href=\"#tabcreatenotice\"]').tab('show');
			$('#sl').val(_this);
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

		// var courses = '".URL."studymaterial/getCourse';
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
			var batchs = '".URL."studymaterial/getSelectBatch/'+val;
			$('#batch').append('<option>--select--</option>')
			$.get(batchs, function(o){
				//console.log(o);
				for(var i = 0; i < o.length; i++){ 					
					$('#batch').append($('<option>', {value: o[i].xbatch, text: o[i].xbatchname}));
				}
			}, 'json');

			//----------------------------
			// Lesson Select data //
			//---------------------

			$('#lesson').find('option').remove();
			var val = $('#itemcode').val();
			var lessons = '".URL."studymaterial/getSelectLesson/'+val;
			$('#lesson').append('<option></option>')
			$.get(lessons, function(o){
				//console.log(o);
				for(var i = 0; i < o.length; i++){ 					
					$('#lesson').append($('<option>', {value: o[i].xlesson, text: o[i].xdesc}));
				}
			}, 'json');

		})

		//----------------------------
		// Course Select data for search //
		//---------------------

		var courses = '".URL."studymaterial/getCourse';
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
			var batchs = '".URL."studymaterial/getSelectBatch/'+val;
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