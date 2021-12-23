<?php

class Passdelivery extends Controller{
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

        

        $this->searchfield = array(            
            "stuname"=>array("required"=>"","label"=>"Student Name","ctrlfield"=>"xstuname", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1","url"=>"1"),			
            "mobile"=>array("required"=>"","label"=>"Mobile","ctrlfield"=>"xmobile", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),						            
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search Course"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."trainingpass/findpass","btnid"=>"searchtrainer", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
                array("btnmethod"=>"print","btntext"=>"Print","btnurl"=>"","btnid"=>"printuserlist", "icon"=>"<i class=\"fa fa-print mr-1\"></i>","btncolor"=>"btn-dark"),
            ),
        );
        
    }

	function init(){   
		
		 $basicform = new Basicform();
 
		 $tabsettings = array(
			 
			 0=>array("isactive"=>"active","tabdesc"=>"Search For Training Pass", "tabid"=>"tabsearchtraining", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),          
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/passdelivery_view");
	 }


	
	function findtrainer(){
        $storeFolder = USER_IMAGE_LOCATION;
        $conditions = [];
        $params = [];
        $teachername = $_POST['trainername'];
        $mobile = $_POST['mobile'];
        
        //Logdebug::appendlog(serialize($_POST));
        if($teachername!=""){
            $conditions[]="xteachername like ?";
            $params[]='%'.$teachername.'%';
        }
        if($mobile!=""){
            $conditions[]="xmobile like ?";
            $params[]='%'.$mobile.'%';
        }
        

        //Logdebug::appendlog(serialize($conditions));

        $trainerdt =  $this->model->gettrainer($conditions,$params);  
        
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