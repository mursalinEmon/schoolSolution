<?php

class Batchcreate extends Controller{
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
            "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Class Information","rowindex"=>"0", "ctrlvalid"=>array()),

            "batchsl"=>array("required"=>"*","label"=>"Class ID","ctrlfield"=>"xbatch", "ctrlvalue"=>"", "ctrltype"=>"text", "readonly"=>"readonly", "ctrlvalid"=>array(),"rowindex"=>"1"),

			"xsession"=>array("required"=>"*","label"=>"Session","ctrlfield"=>"xsession", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

			"xclass"=>array("required"=>"*","label"=>"Class","ctrlfield"=>"xclass", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"xversion"=>array("required"=>"*","label"=>"Version","ctrlfield"=>"xversion", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"xshift"=>array("required"=>"*","label"=>"Shift","ctrlfield"=>"xshift", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),

			"xsec"=>array("required"=>"*","label"=>"Section","ctrlfield"=>"xsec", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"3"),

            
			"xsubject"=>array("required"=>"*","label"=>"Subject","ctrlfield"=>"xsubname", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"4"),
            
			"xsubcode"=>array("required"=>"*","label"=>"Subject Code","ctrlfield"=>"xsubcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"4"),
            
            "capacity"=>array("required"=>"*","label"=>"Student Capacity","ctrlfield"=>"xcapacity", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"5"),

			"xteacher"=>array("required"=>"*","label"=>"Teacher","ctrlfield"=>"xteacher", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"5"),
            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmbatch", "title"=>"Batch Create"),
            "actionbtn"=>array(                
                array("btnmethod"=>"Delete","btntext"=>"Delete","btnurl"=>URL."createbatch/deletebatch","btnid"=>"batchdelete"),
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save Information","btnurl"=>URL."createclass/savebatch","btnid"=>"batchsave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View Information","btnurl"=>URL."createbatch/singlebatch","btnid"=>"viewbatch", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"New","btnurl"=>"","btnid"=>"clearall", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            
			"batchname"=>array("required"=>"","label"=>"Batch Name","ctrlfield"=>"xbatchname", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),

            "itmcode"=>array("required"=>"","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array(),"rowindex"=>"1"),
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search Course"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."createbatch/findbatch","btnid"=>"searchbatch", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
                array("btnmethod"=>"print","btntext"=>"Print","btnurl"=>"","btnid"=>"printuserlist", "icon"=>"<i class=\"fa fa-print mr-1\"></i>","btncolor"=>"btn-dark"),
            ),
        );
        
    }

	function init(){
 
		 $basicform = new Basicform();
 
		 $tabsettings = array(
			 0=>array("isactive"=>"active","tabdesc"=>"Batch Create", "tabid"=>"tabcreatebatch", "tabcontent"=>$basicform->createform($this->formset,$this->formfield, false), "icon"=>"far fa-user"),
			 1=>array("isactive"=>"","tabdesc"=>"Search For Batch", "tabid"=>"tabsearchbatch", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),          
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/batch_view");
	 }


	 function savebatch(){
		//  echo "test";die;
		// Logdebug::appendlog('test');
        $inputs = new Form();
            try{
				$inputs ->post("batchsl")
				
						->post("xsubcode")
						->val('minlength', 1)

						->post("xsubject")
						->val('minlength', 1)

						->post("xteacher")
						->val('minlength', 1)
                        
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

						->post("capacity")
						->val('minlength', 1);

				$inputs	->submit();       
            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
                exit;
            }

            $onduplicate = "";
            // $onduplicate = 'on duplicate key update xsubcode=VALUES(xsubcode), xsubject=VALUES(xsubject),xteacher=VALUES(xteacher), xcapacity=VALUES(xcapacity)';
			
            $inpdata = $inputs->fetch();
			
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);
            Logdebug::appendlog(print_r($data, true));
            $data['bizid']=Session::get('sbizid');			
			$data['zemail']=Session::get('suser'); //add business id to array for inserting
			
            //  //remove autoincrement id from inserting      
			
            $success = $this->model->save($data, $onduplicate);
            //Logdebug::appendlog(print_r($data, true));
            if($success > 0)
                echo json_encode(array('message'=>'Class Saved Successfully','result'=>'success','keycode'=>$success));
             else
                echo json_encode(array('message'=>'Failed to save Class','result'=>'error','keycode'=>''));
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


   function getSubject(){
       $xsession = $_POST['xsession'];
       $xclass = $_POST['xclass'];
       $xversion = $_POST['xversion'];
       $xsec = $_POST['xsec'];
       $xshift = $_POST['xshift'];
    //    $data = json_decode($xdata);
        //    Logdebug::appendlog(print_r($xsession, true));
        $subject = $this->model->getSubject($xclass,$xversion,$xsession);
        //    Logdebug::appendlog(print_r($subject, true));

           if($subject)
                echo json_encode(array('message'=>'Subject Found Successfully','result'=>'success','keycode'=>$subject));
            else
                echo json_encode(array('message'=>'Failed to Find Subject','result'=>'error','keycode'=>''));

   }
	

	function findbatch(){
        $conditions = "bizid = ".Session::get('sbizid')."";
        $batchname = $_POST['batchname'];
        $itemcode = $_POST['itmcode'];
        
        //Logdebug::appendlog(serialize($itemcode));
        if($batchname!=""){
            $conditions .=" and xbatchname like '%".$batchname."%'";
        }
        if($itemcode!=""){
            $conditions .=" and xitemcode like '%".$itemcode."%'";
        }
        

        //Logdebug::appendlog(serialize($conditions));

        $batchdt =  $this->model->getbatch($conditions);  
        
        echo json_encode($batchdt);
        
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
	   

        $('#xversion, #xshift, #xsec, #xsession, #xclass, #xroll, #xreligion, #xdistrict, #xbloodgrp, #xnationality, #xcity, #xthana, #xsex,#xsubject,#teacher').append(
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

	   $('#clearall').on('click', function(){
			$('#frmbatch').trigger('reset');
            $('#frmbatch').find('select').append('<option selected=\"selected\"></option>');
		})
   
        $('#xsec').on('change', function(){
            var url = '".URL."createclass/getSubject';
            var xclass = $('#xclass').val();
            var xsession = $('#xsession').val();
            var xsec = $('#xsec').val();
            var xshift = $('#xshift').val();
            var xversion = $('#xversion').val();
            console.log(xversion);

            $.ajax({
                url:url, 
                type : 'POST',
                dataType : 'json', 						
                data : {xclass:xclass,xsession:xsession,xsec:xsec,xshift:xshift,xversion:xversion}, // post data || get data
                beforeSend:function(){
                    $('#viewbatch').addClass('disabled');
                    // loaderon(); 
                },
                success : function(response) {
                    
                   var subject = response.keycode[0];
                   console.log(subject.xsubname);

                   $('#xsubject').append($('<option>', {value: subject.xsubname, text: subject.xsubname}));
                   $('#xsubcode').append($('<option>', {value: subject.xsubcode, text: subject.xsubcode}));
                            
                },
                error: function(xhr, resp, text) {
                    loaderoff();
                    $('#viewbatch').removeClass('disabled');
                   
                    console.log(xhr, resp, text);
                }
            });
        })

		$('#searchbatch').on('click', function(){
            
			var url = '".URL."createbatch/findbatch';
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
						   tblhtml='<thead><th>Batch ID</th><th>Batch Name</th><th>Course</th><th>Teacher</th><th>Capacity</th></thead>';
						   tblhtml+='<tbody>';
						   $.each(result, function(key, value){
						   
									tblhtml+='<tr><td><a class=\"tblrow\" href=\"javascript:void(0)\">'+value.xbatch+'</a></td><td>'+value.xbatchname+'</td><td>'+value.xitemdesc+'</td><td>'+value.xteachername+'</td><td>'+value.xcapacity+'</td></tr>';      
									
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
                           
                            console.log(xhr, resp, text);
                        }
                    });

                    // Teacher Select data //

                    var doctype = '".URL."createclass/getTeacher';
                    //console.log(doctype);
                    // $('#teacher').append('<option></option>')
                    $.get(doctype, function(o){
                        //console.log(o);
                        for(var i = 0; i < o.length; i++){ 					
                            $('#teacher').append($('<option>', {value: o[i].xteacher, text: o[i].xteachername}));
                        }
                    }, 'json');

                    // Course Select data //

                    var courses = '".URL."createbatch/getCourse';
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
			$('.nav-tabs a[href=\"#tabcreatebatch\"]').tab('show');
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

            var doctype = '".URL."createclass/getTeacher';
            //console.log(doctype);
            // $('#teacher').append('<option></option>')
            $.get(doctype, function(o){
                //console.log(o);
                for(var i = 0; i < o.length; i++){ 					
                    $('#xteacher').append($('<option>', {value: o[i].xteacher, text: o[i].xteachername}));
                }
            }, 'json');


            // Course Select data //

            var courses = '".URL."createbatch/getCourse';
            //console.log(courses);
            $('#itemcode').append('<option></option>')
            $.get(courses, function(o){
                //console.log(o);
                for(var i = 0; i < o.length; i++){ 					
                    $('#itemcode').append($('<option>', {value: o[i].xitemcode, text: o[i].xdesc}));
                }
            }, 'json');

            // Course Select data //

            var courses = '".URL."createbatch/getCourse';
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