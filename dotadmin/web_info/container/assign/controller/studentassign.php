<?php

class Studentassign extends Controller{
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
            "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Assign Student Information","rowindex"=>"0", "ctrlvalid"=>array()),

            "batchsl"=>array("required"=>"*","label"=>"Batch ID","ctrlfield"=>"xbatch", "ctrlvalue"=>"", "ctrltype"=>"group", "ctrlvalid"=>array(),"rowindex"=>"1","url"=>URL."popuppage/teacherpopup/batchsl"),

			"batchname"=>array("required"=>"*","label"=>"Batch Name","ctrlfield"=>"xbatchname", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"1"),

            "capacity"=>array("required"=>"*","label"=>"Student Capacity","ctrlfield"=>"xcapacity", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

			"itemcode"=>array("required"=>"*","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"teacher"=>array("required"=>"*","label"=>"Teacher","ctrlfield"=>"xteacher", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),
            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmbatch", "title"=>"Assign Student"),
            "actionbtn"=>array( 
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save Information","btnurl"=>URL."assignstudent/savebatch","btnid"=>"batchsave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View Information","btnurl"=>URL."assignstudent/singlebatch","btnid"=>"viewbatch", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"New","btnurl"=>"","btnid"=>"clearall", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            
            "itmcode"=>array("required"=>"","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array(),"rowindex"=>"1"),

			"mobile"=>array("required"=>"*","label"=>"Mobile","ctrlfield"=>"xmobile", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"11"),"rowindex"=>"1"),

            "stuid"=>array("required"=>"*","label"=>"Student ID","ctrlfield"=>"xstudent", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"11"),"rowindex"=>"1"),
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search Course"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."assignstudent/findbatch","btnid"=>"searchbatch", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
                array("btnmethod"=>"print","btntext"=>"Print","btnurl"=>"","btnid"=>"printuserlist", "icon"=>"<i class=\"fa fa-print mr-1\"></i>","btncolor"=>"btn-dark"),
            ),
        );
        
    }

	function init(){
 
		 $basicform = new Basicform();
 
		 $tabsettings = array(
			 
			 0=>array("isactive"=>"active","tabdesc"=>"Search For Student", "tabid"=>"tabsearchbatch", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),          
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/assign_view");
	 }


	 function savebatch(){
		 //echo "test";die;
		// Logdebug::appendlog('test');
        $inputs = new Form();
            try{
				$inputs ->post("batchsl")
				
						->post("batchname")
						->val('minlength', 2)

						->post("itemcode")
						->val('minlength', 1)

						->post("teacher")
						->val('minlength', 1)

						->post("capacity")
						->val('minlength', 1);

				$inputs	->submit();       
            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
                exit;
            }

            $onduplicate = 'on duplicate key update xbatchname=VALUES(xbatchname), xitemcode=VALUES(xitemcode),xteacher=VALUES(xteacher), xcapacity=VALUES(xcapacity)';
			
            $inpdata = $inputs->fetch();
			
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);
            $data['bizid']=Session::get('sbizid');			
			$data['zemail']=Session::get('suser'); //add business id to array for inserting
			if(!is_numeric($data['xbatch'])){
				unset($data['xbatch']);
			}
            //  //remove autoincrement id from inserting      
			
            $success = $this->model->save($data, $onduplicate);
            //Logdebug::appendlog(print_r($data, true));
            if($success > 0)
                echo json_encode(array('message'=>'Batch Saved Successfully','result'=>'success','keycode'=>$success));
             else
                echo json_encode(array('message'=>'Failed to save Batch','result'=>'error','keycode'=>''));
    }


    function deletebatch(){
        //echo "test";die;
       // Logdebug::appendlog('test');
       $inputs = new Form();
           try{

                if($_POST['batchsl'] == "")
                    throw new Exception('Batch code not found!');

               $inputs ->post("batchsl");

               $inputs	->submit();

           }catch(Exception $e){
                $res = unserialize($e->getMessage());              
               
                echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
               exit;
           }
           
           $inpdata = $inputs->fetch();
           
           $data = Apptools::form_field_to_data($inpdata, $this->formfield);
           $data['bizid']=Session::get('sbizid');			
           $data['xemail']=Session::get('suser');
           $data['zutime']=date("Y-m-d H:i:s");
           
           $success = $this->model->deleteBatch($data);
           //Logdebug::appendlog(print_r($data, true));
           if($success)
               echo json_encode(array('message'=>'Batch Deleted Successfully','result'=>'success','keycode'=>$success));
            else
               echo json_encode(array('message'=>'Failed to Delete Batch','result'=>'error','keycode'=>''));
   }

	

	function findbatch(){
        $conditions = "bizid = ".Session::get('sbizid')."";
        //$batchname = $_POST['batchname'];
        $itemcode = $_POST['itmcode'];
        $mobile = $_POST['mobile'];
        $stuid = $_POST['stuid'];

        if($itemcode!=""){
            $conditions .=" and xitemcode like '%".$itemcode."%'";
        }else{
            $conditions .=" and xitemcode in (select xitemcode from seitem where bizid = ".Session::get('sbizid')." and xcat = 'Training Courses')";
        }

        if($mobile!=""){
            $conditions .=" and xcus in (select xstudent from edustudent where bizid=ecomsalesdet.bizid and xmobile like '%".$mobile."%')";
        }

        if($stuid!=""){
            $conditions .=" and xcus in (select xstudent from edustudent where bizid=ecomsalesdet.bizid and xstudent = '".$stuid."')";
        }

        //Logdebug::appendlog(serialize($conditions));

        $batchdt =  $this->model->getCoursePurchase($conditions);  
        
        echo json_encode($batchdt);
        
    }
	
	function saveAssign(){
        $sosl = $_POST['param']; 
        $batch = $_POST['batchid'];
        $status = $_POST['salestatus'];
        $res = ""; 
        //Logdebug::appendlog($sosl);
        if($status == "Pending"){
            $fields = array(
                "xbatch"=>$batch,
                "xstatus"=>'Delivered',
            );
            $where = "bizid = ".Session::get('sbizid')." and xecomdetsl = '".$sosl."' and xbatch = 'Pending'";
            $res = "Assign";
        }elseif($status == "Confirmed"){
            $fields = array(
                "xbatch"=>"Pending",
                "xstatus"=>"Pending",
            );
            $where = "bizid = ".Session::get('sbizid')." and xecomdetsl = '".$sosl."' and xbatch <> 'Pending'";
            $res = "Delete";
        }
        
        $success =  $this->model->saveAssignStudent($fields, $where);

        if($success)
            echo json_encode(array('message'=>'Batch '.$res.' Successfully','result'=>'success','keycode'=>$success));
        else
            echo json_encode(array('message'=>'Failed to '.$res.' Batch','result'=>'error','keycode'=>''));
        
    }

    function singlebatch(){
        $batch = $_POST['param']; 
        $batchdt =  $this->model->getsinglebatch($batch);
        echo json_encode($batchdt);
        
    }
    
    function getTeacher(){
        $teachers = $this->model->getTeacher();
        echo json_encode($teachers);
    }

    function getCourse(){
        $courses = $this->model->getCourse();
        echo json_encode($courses);
    }

    function getBatch($course){
        // Logdebug::appendlog($course);
        $batchs = $this->model->getBatch($course);
        echo json_encode($batchs);
    }
    

	function script(){
		$basicform = new Basicform(); 
		return "
		<script>

		//-----------------------
		// save update delete ajax
		//-----------------------
		".$basicform->returnajax($this->formset, "batchsl")."
		//-----------------------
		//user form validation
		//-----------------------
		".$basicform->validateform($this->formfield, 'frmbatch')." 
	   

	   $('#clearall').on('click', function(){
			$('#frmbatch').trigger('reset');
            $('#frmbatch').find('select').append('<option selected=\"selected\"></option>');
		})
   
		$('#searchbatch').on('click', function(){
            
			var url = '".URL."assignstudent/findbatch';
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
						   tblhtml='<thead><th>Student ID</th><th>Student Name</th><th>Mobile</th><th>Date</th><th>Course</th><th>Batch</th><th>Action</th></thead>';
						   tblhtml+='<tbody>';
						   $.each(result, function(key, value){
						   
									tblhtml+='<tr><td>'+value.xcus+'</td><td>'+value.xstuname+'</td><td>'+value.xmobile+'</td><td>'+value.xdate+'</td><td>'+value.xitemdesc+'</td><td id=\"batch'+value.xecomdetsl+'\">'+value.xbatch+'</td>';
                                    
                                if(value.xbatch == 'Pending'){
                                    tblhtml+= '<td class=\"text-right\" id=\"sosl'+value.xecomdetsl+'\"><button class=\"btn btn-primary\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px\" data-toggle=\"modal\" data-target=\"#exampleModal\" onClick=\"open_modal(\''+value.xitemcode+'\','+value.xecomdetsl+',\'Pending\')\">Assign Batch</button></td>';
                                }else{
                                    tblhtml+= '<td class=\"text-right\" id=\"sosl'+value.xecomdetsl+'\"><button class=\"btn btn-danger\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px\" data-toggle=\"modal\" data-target=\"#exampleModal\" onClick=\"open_modal(\''+value.xitemcode+'\','+value.xecomdetsl+',\'Confirmed\')\">Delete Assign</button></td>';
                                }   
                                tblhtml+= '</tr>';      
									
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

        //---------------------
        // batch show in modal
        //---------------------
        
        function open_modal(sl, xecomdetsl, status){
            //alert(status)
            $('#batch').find('option').remove();
            $('#itemcode').val(sl);
            $('#salesdetsl').val(xecomdetsl);
            $('#salestatus').val(status);
            if(status == 'Confirmed'){
                $('#slbatch').css(\"display\",\"none\");
                $('#btnbatch').html('');
                $('#exampleModalLabel').html('');
                $('#btnbatch').append('Delete').removeClass('btn btn-primary').addClass('btn btn-danger');
                $('#exampleModalLabel').append('Are you sure?');
            }else{
                $('#slbatch').css(\"display\",\"block\");
                $('#btnbatch').html('');
                $('#exampleModalLabel').html('');
                $('#btnbatch').append('Save').removeClass('btn btn-danger').addClass('btn btn-primary');
                $('#exampleModalLabel').append('Assign to Batch');
            }
            var batchs = '".URL."assignstudent/getBatch/'+sl;
            //console.log(batchs);
            $.get(batchs, function(o){
                //console.log(o);
                for(var i = 0; i < o.length; i++){ 					
                    $('#batch').append($('<option>', {value: o[i].xbatch, text: o[i].xbatchname}));
                }
            }, 'json');
        }

        //-------------------
        // Assign Save
        //-------------------

        $('#btnbatch').on('click', function(){
            var url = '".URL."assignstudent/saveAssign';
            var uid = $('#salesdetsl').val();
            var batch = $('#batch').val();
            var status = $('#salestatus').val();
            var itemcode = $('#itemcode').val();
            $.ajax({
                url:url, 
                type : 'POST',
                dataType : 'json', 						
                data : {param:uid, batchid:batch, salestatus:status}, // post data || get data
                beforeSend:function(){
                    $('#btnbatch').addClass('disabled');
                    loaderon(); 
                },
                success : function(result) {
                    loaderoff();
                   $('#btnbatch').removeClass('disabled');

                   if(result.result=='fielderror'){
                        toastr.error(result.message);
                        $('#'+result.keycode).focus();
                    }

                    if(result.result=='success'){
                        $('#exampleModal').modal('hide');
                        toastr.success(result.message);
                        $('#sosl'+uid).find('button').remove();
                        if(status == 'Pending'){
                            $('#batch'+uid).html(batch);
                            $('#sosl'+uid).append('<button class=\"btn btn-danger\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px\" data-toggle=\"modal\" data-target=\"#exampleModal\" onClick=\"open_modal(\''+itemcode+'\','+uid+',\'Confirmed\')\">Delete Assign</button>').show();
                        }else{
                            $('#batch'+uid).html('Pending');
                            $('#sosl'+uid).append('<button class=\"btn btn-primary\" style=\"border-radius:60px; font-size: 12px; padding: 5px 5px\" data-toggle=\"modal\" data-target=\"#exampleModal\" onClick=\"open_modal(\''+itemcode+'\','+uid+',\'Pending\')\">Assign Batch</button>').show();
                        }
                        
                                                
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


		//-----------------------
            // show user
        //-----------------------
                $('#viewbatch').on('click', function(){
                    var url = $(this).val();
                    var uid = $('#batchsl').val();
                    $.ajax({
                        url:url, 
                        type : 'POST',
                        dataType : 'json', 						
                        data : {param:uid}, // post data || get data
                        beforeSend:function(){
                            $('#viewbatch').addClass('disabled');
                            loaderon(); 
                        },
                        success : function(response) {
                            
                            loaderoff();
                           
                           $('#viewbatch').removeClass('disabled');
                           
                           const myObjStr = response; 
						   $('#batchsl').val(myObjStr[0].xbatch);
						   $('#batchname').val(myObjStr[0].xbatchname);
						   $('#itemcode').html('<option value=\"'+myObjStr[0].xitemcode+'\">'+myObjStr[0].xitemdesc+'</option>');
						   $('#teacher').html('<option value=\"'+myObjStr[0].xteacher+'\">'+myObjStr[0].xteachername+'</option>');
						   $('#capacity').val(myObjStr[0].xcapacity);
						   $('#education').val(myObjStr[0].xeducation);
                                    
                        },
                        error: function(xhr, resp, text) {
                            loaderoff();
                            $('#viewbatch').removeClass('disabled');
                           
                            //console.log(xhr, resp, text);
                        }
                    });

                    // Teacher Select data //

                    var doctype = '".URL."assignstudent/getTeacher';
                    //console.log(doctype);
                    $('#teacher').append('<option></option>')
                    $.get(doctype, function(o){
                        //console.log(o);
                        for(var i = 0; i < o.length; i++){ 					
                            $('#teacher').append($('<option>', {value: o[i].xteacher, text: o[i].xteachername}));
                        }
                    }, 'json');

                    // Course Select data //

                    var courses = '".URL."assignstudent/getCourse';
                    //console.log(courses);
                    $('#itemcode').append('<option></option>')
                    $.get(courses, function(o){
                        //console.log(o);
                        for(var i = 0; i < o.length; i++){ 					
                            $('#itemcode').append($('<option>', {value: o[i].xitemcode, text: o[i].xdesc}));
                        }
                    }, 'json');
                })

				$('#batchsl').on('keyup', function (e) {
                    if (e.keyCode === 13) {
                        $('#viewbatch').click();
                        
                    }
                });


		$('body').on('click','.tblrow', function(){
			_this = $(this).html();                    
			$('.nav-tabs a[href=\"#tabassignstudent\"]').tab('show');
			$('#batchsl').val(_this);
			$('#viewbatch').click();
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

        // Teacher Select data //

            var doctype = '".URL."assignstudent/getTeacher';
            //console.log(doctype);
            $('#teacher').append('<option></option>')
            $.get(doctype, function(o){
                //console.log(o);
                for(var i = 0; i < o.length; i++){ 					
                    $('#teacher').append($('<option>', {value: o[i].xteacher, text: o[i].xteachername}));
                }
            }, 'json');


            // Course Select data //

            var courses = '".URL."assignstudent/getCourse';
            //console.log(courses);
            $('#itemcode').append('<option></option>')
            $.get(courses, function(o){
                //console.log(o);
                for(var i = 0; i < o.length; i++){ 					
                    $('#itemcode').append($('<option>', {value: o[i].xitemcode, text: o[i].xdesc}));
                }
            }, 'json');

            // Course Select data //

            var courses = '".URL."assignstudent/getCourse';
            //console.log(courses);
            $('#itmcode').append('<option></option>')
            $.get(courses, function(o){
                //console.log(o);
                for(var i = 0; i < o.length; i++){ 					
                    $('#itmcode').append($('<option>', {value: o[i].xitemcode, text: o[i].xdesc}));
                }
            }, 'json');
        

		</script>";
	}

} 