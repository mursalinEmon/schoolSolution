<?php

class Homeworkevaluate extends Controller{
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
                array("btnmethod"=>"update","btntext"=>"Update","btnurl"=>URL."hwevaluate/updatenotice","btnid"=>"noticeupdate"),
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save HW","btnurl"=>URL."hwevaluate/savenotice","btnid"=>"usersave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View HW","btnurl"=>URL."hwevaluate/singlenotice","btnid"=>"viewnotice", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
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
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."hwevaluate/findnotice","btnid"=>"searchnotice", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );
        
    }

	function init(){
 
		 $basicform = new Basicform();
 
		 $tabsettings = array(
			 
			0=>array("isactive"=>"active","tabdesc"=>"Search For HW", "tabid"=>"tabsearchnotice", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),
			           
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/hwevaluation_view");
	 }


	 function markAssign(){

        $date = date("Y-m-d H:i:s");
		$success = 0;
		$tempsl = $_POST['tempsl'];
		$marks = $_POST['marks'];

            try{

				if($marks <= 0)
					throw new Exception("Mark would be greater than 0!");

            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
                exit;
            }

				$fields = array(
					"xmarks"=>$marks,
					"zutime"=>$date,
					"xemail"=>Session::get('suser'),
				);
				$where = "bizid = ".Session::get('sbizid')." and xsl = '".$tempsl."'";
				$success = $this->model->updateTemp($fields, $where);
            	//Logdebug::appendlog(print_r($data, true));
					
            if($success > 0){
				echo json_encode(array('message'=>'Marks Assign Successfully','result'=>'success','keycode'=>$success));
			}else{
				echo json_encode(array('message'=>'Failed to Assign Marks!','result'=>'error','keycode'=>''));
			}
    }

	

	function findnotice(){
        $res = "";
        $conditions = "bizid = ".Session::get('sbizid')."";
        $batchid = "";
        $itemcode = $_POST['itmcode'];
        if(isset($_POST['batchid']))
            $batchid = $_POST['batchid'];
            
        try{
        //Logdebug::appendlog(serialize($itemcode));
			if($itemcode != ""){
				$conditions .= " and xitemcode like '%".$itemcode."%'";
			}

            if($batchid != ""){
                $conditions .= " and xbatch like '%".$batchid."%'";
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
			// Logdebug::appendlog(print_r($batchdt), true);
            echo json_encode($batchdt);
        }
        
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
		".$basicform->returnajax($this->formset, "sl")."
		//-----------------------
		//user form validation
		//-----------------------
		".$basicform->validateform($this->formfield, 'frmnotice')."
		 

	   $('#clearall').on('click', function(){
			$('#frmnotice').trigger('reset');
			$('#imglist').html('No image found!');
		})

		
   
		$('#searchnotice').on('click', function(){
            
			var url = '".URL."hwevaluate/findnotice';
			//console.log(url);
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
						   tblhtml='<thead><th>Date</th><th>Student ID</th><th>Name</th><th>Description</th><th>Marks</th><th>Answer</th><th>Action</th></thead>';
						   tblhtml+='<tbody>';
						   $.each(result, function(key, value){
						   
								tblhtml+='<tr><td>'+value.xdate+'</td><td>'+value.xstudent+'</td><td>'+value.xstuname+'</td><td>'+value.xdescription+'</td><td id=\"tem'+value.xsl+'\">'+value.xmarks+'</td><td><a class=\"btn btn-info\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px; float: right;\" href=".HW_ANSWER_LOCATION."'+value.xsl+'.pdf target=\"_blank\">View HW</a></td><td><a class=\"btn btn-success\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px;\" data-toggle=\"modal\" data-target=\"#exampleModal\" onClick=\"open_modal(\''+value.xsl+'\')\">Mark Assign</a></td></tr>';      
									
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
            //alert(sl)
			$('#tempsl').val(sl);
			$('#txnid').val($('#tem'+sl).html());
			var desc = $('#txnid').val();
			if(desc > 0){
				$('#btnbatch').prop(\"disabled\",false);
			}else{
				$('#btnbatch').prop(\"disabled\",true);
			}
        }

		//-------------------
        // Confirm Sale
        //-------------------

        $('#btnbatch').on('click', function(){
            var url = '".URL."hwevaluate/markAssign';
            var uid = $('#tempsl').val();
            var marks = $('#txnid').val();
            $.ajax({
                url:url, 
                type : 'POST',
                dataType : 'json', 						
                data : {tempsl:uid, marks:marks}, // post data || get data
                beforeSend:function(){
                    $('#btnbatch').addClass('disabled');
                    loaderon(); 
                },
                success : function(result) {
					//console.log(result);
                    loaderoff();
                   $('#btnbatch').removeClass('disabled');

                   if(result.result=='fielderror'){
                        toastr.error(result.message);
                        $('#'+result.keycode).focus();
                    }

                    if(result.result=='success'){
						$('#exampleModal').modal('hide');
                        toastr.success(result.message);
                        $('#tem'+uid).html(marks);
                        
                                                
                    }

                    if(result.result=='error'){
                        toastr.error(result.message);                               
                    }

                            
                },
                error: function(xhr, resp, text) {
                    loaderoff();
                    $('#btnbatch').removeClass('disabled');
                   
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
		// Course Select data for search //
		//---------------------

		var courses = '".URL."hwevaluate/getCourse';
		//console.log(courses);
		$('#itmcode').append('<option></option>')
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
			var batchs = '".URL."hwevaluate/getSelectBatch/'+val;
			$('#batchid').append('<option></option>')
			$.get(batchs, function(o){
				//console.log(o);
				for(var i = 0; i < o.length; i++){ 					
					$('#batchid').append($('<option>', {value: o[i].xbatch, text: o[i].xbatchname}));
				}
			}, 'json');

		})

		$('#txnid').on('keyup',function(){
			var desc = $(this).val();
			if(desc > 0){
				$('#btnbatch').prop(\"disabled\",false);
			}else{
				$('#btnbatch').prop(\"disabled\",true);
			}
		});

		</script>";
	}
			
} 