<?php
 class Manageuser extends Controller{
    private $formfield = array();
    private $formset = array();
    private $searchfield = array();
    private $searchsettings = array();
    function __construct(){
            parent::__construct();            
            //$this->view->js = array('views/aduser/js/worker.js');
            $this->intializeform();
            $this->view->script = $this->script();
            Session::init();
        if(!Session::get('logedin') || Session::get('slogintype') != "Admin"){
            header('location: '. URL .'adminlogin');
            exit;
        }
            
    }

    private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(
            "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"User Information","rowindex"=>"0", "ctrlvalid"=>array()),
            "userid"=>array("required"=>"*","label"=>"User ID","ctrlfield"=>"zemail", "ctrlvalue"=>"", "ctrltype"=>"group", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"1","url"=>URL."popuppage/userpopup/userid"),			
            "username"=>array("required"=>"*","label"=>"User Name","ctrlfield"=>"zuserfullname", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"1"),						
            "userrole"=>array("required"=>"*","label"=>"Role","ctrlfield"=>"zrole", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"User Role","rowindex"=>"2"),
            "uservenu"=>array("required"=>"*","label"=>"Venu","ctrlfield"=>"xbranch", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Venu","rowindex"=>"3"),
            "useremail"=>array("required"=>"","label"=>"User Email","ctrlfield"=>"zaltemail", "ctrlvalue"=>"", "ctrltype"=>"email", "ctrlvalid"=>array(),"rowindex"=>"2"),		
            "usermobile"=>array("required"=>"","label"=>"Mobile","ctrlfield"=>"zusermobile", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"2"),						
            "password"=>array("required"=>"*","label"=>"Password","ctrlfield"=>"zpassword", "ctrlvalue"=>"", "ctrltype"=>"password", "ctrlvalid"=>array("required"=>"true","minlength"=>"6"),"rowindex"=>"3"),		
            "useradd"=>array("required"=>"","label"=>"Address","ctrlfield"=>"zuseradd", "ctrlvalue"=>"", "ctrltype"=>"textarea", "arearows"=>"3", "ctrlvalid"=>array(),"rowindex"=>"3"),						
            "usersl"=>array("ctrlfield"=>"xusersl", "ctrlvalue"=>"", "ctrltype"=>"hidden", "rowindex"=>"7", "ctrlvalid"=>array()),
            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmuser", "title"=>"User Form"),
            "actionbtn"=>array(                
                array("btnmethod"=>"delete","btntext"=>"Delete","btnurl"=>URL."manageuser/deleteuser","btnid"=>"userdelete"),
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save User","btnurl"=>URL."manageuser/saveuser","btnid"=>"usersave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View User","btnurl"=>URL."manageuser/singleuser","btnid"=>"viewuser", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"Clear","btnurl"=>"","btnid"=>"clearuser", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            "srcuserid"=>array("required"=>"","label"=>"User ID","ctrlfield"=>"zemail", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1","url"=>"1"),			
            "srcusername"=>array("required"=>"","label"=>"User Name","ctrlfield"=>"zuserfullname", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),						            
            "srcuseremail"=>array("required"=>"","label"=>"User Email","ctrlfield"=>"zaltemail", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),		
            "srcusermobile"=>array("required"=>"","label"=>"Mobile","ctrlfield"=>"zusermobile", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),						
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search User"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."manageuser/finduser","btnid"=>"searchuser", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
                array("btnmethod"=>"print","btntext"=>"Print","btnurl"=>"","btnid"=>"printuserlist", "icon"=>"<i class=\"fa fa-print mr-1\"></i>","btncolor"=>"btn-dark"),
            ),
        );
        
    }

    

    function init(){   
       $url = URL.'manageuser/uploadimage';
       $id = "userdropzone";

        $basicform = new Basicform();

        $tabsettings = array(
            0=>array("isactive"=>"active","tabdesc"=>"Create User", "tabid"=>"tabcreateuser", "tabcontent"=>$basicform->createform($this->formset,$this->formfield, false), "icon"=>"far fa-user"),
            1=>array("isactive"=>"","tabdesc"=>"Upload Image", "tabid"=>"tabuploadimage", "tabcontent"=>ImageUpload::createdropzone($url,$id), "icon"=>"fa fa-cloud-upload-alt"),
            2=>array("isactive"=>"","tabdesc"=>"Search For User", "tabid"=>"tabsearchuser", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),          
            
        );
        
        $this->view->userform = $basicform->createtab($tabsettings);
        
        $this->view->render("templateadmin","aduser/init");
    }


    function saveuser(){
        
        $inputs = new Form();
            try{
            $inputs ->post("userid")
                    ->val('minlength', 2)
                    
                    ->post("username")
                    ->val('minlength', 2)
                    
                    ->post("userrole")
                    ->val('minlength', 1)

                    ->post("useradd")

                    ->post("useremail")
                    
                    ->post("usersl")

                    ->post("uservenu")

                    ->post("usermobile");

            $inputs	->submit();       
            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
                exit;
            }

            $onduplicate = 'on duplicate key update zuserfullname=VALUES(zuserfullname), zaltemail=VALUES(zaltemail),
                            zrole=VALUES(zrole), xbranch=VALUES(xbranch),zpassword=VALUES(zpassword), zusermobile=VALUES(zusermobile)';
            $inpdata = $inputs->fetch();
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);
            $data['bizid']=Session::get('sbizid'); //add business id to array for inserting
            $data['zpassword'] = Hash::create('sha256',$_POST['password'],HASH_KEY);
            unset($data['xusersl']);  //remove autoincrement id from inserting      
            $success = $this->model->save($data, $onduplicate);
            //Logdebug::appendlog(print_r($data, false));
            if($success > 0)
                echo json_encode(array('message'=>'User Saved Successfully','result'=>'success','keycode'=>$data['zemail']));
             else
                echo json_encode(array('message'=>'Failed to save user','result'=>'error','keycode'=>''));
    }

    function singleuser(){
        $storeFolder = USER_IMAGE_LOCATION;
        $user = $_POST['param']; 
        $userdt =  $this->model->getsingleuser($user);  
        $userdt[0]["userphoto"]="";
        foreach (glob($storeFolder.$user.".jpg") as $file) {
					
            $userdt[0]["userphoto"] = $file;
            
        }
        echo json_encode($userdt);
        
    }

    function finduser(){
        $storeFolder = USER_IMAGE_LOCATION;
        $conditions = "bizid = ".Session::get('sbizid')."";
        $userid = $_POST['srcuserid'];
        $username = $_POST['srcusername'];
        $useremail = $_POST['srcuseremail'];
        $usermobile = $_POST['srcusermobile']; 
        //Logdebug::appendlog($useremail);
        if($userid!=""){
            $conditions .=" and zemail like '%".$userid."%'";
        }
        if($username!=""){
            $conditions .=" and zuserfullname like '%".$username."%'";
        }
        if($useremail!=""){
            $conditions .=" and zaltemail like '%".$useremail."%'";
        }
        if($usermobile!=""){
            $conditions .=" and zusermobile like '%".$usermobile."%'";
        }

        //Logdebug::appendlog(serialize($conditions));

        $userdt =  $this->model->getuser($conditions);  
        
        echo json_encode($userdt);
        
    }

    function deleteuser(){
        
        $user = $_POST["userid"];
        $st = "delete from pausers where zemail='$user'"; 
        $success = $this->model->executest($st);
        if($success > 0)
                echo json_encode(array('message'=>'User Deleted Successfully','result'=>'success','keycode'=>$success));
             else
                echo json_encode(array('message'=>'Failed to delete user','result'=>'error','keycode'=>''));
    }
    
    public function uploadimage(){
		
		$storeFolder = USER_IMAGE_LOCATION;   //2
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
				$tempFile = $_FILES['file']['tmp_name'];          //3             
				
				$targetPath = $storeFolder;  //4
				
				$targetFile =  $targetPath.$sfile;  //5
				
				move_uploaded_file($tempFile,$targetFile); //6
                

			//Logdebug::appendlog($result);
		}
		
		
		foreach (glob($storeFolder.$filename.".jpg") as $file) {					
					$result[] = $file;					
				}
		echo json_encode($result);
		//Logdebug::appendlog($_FILES['file']['tmp_name']);

    }
    
    function showuploadedimage(){
        $storeFolder = USER_IMAGE_LOCATION; 
        $filename = $_POST['param']; 
        $result=array();
		
		foreach (glob($storeFolder.$filename.".jpg") as $file) {
					
					$result[] = $file;
					
				}
			echo json_encode($result);

    }

    public function dropimage(){
		$storeFolder = USER_IMAGE_LOCATION;    //2
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
            
            //-----------------------
            // save update delete ajax
            //-----------------------
            ".$basicform->returnajax($this->formset)."
            //-----------------------
            //user form validation
            //-----------------------
            ".$basicform->validateform($this->formfield, 'frmuser')."            
            //-----------------------
            //upload user image
           //-----------------------
           ".$basicform->dropzone('userdropzone', 'usersl')."   

           
            
            $('#clearuser').on('click', function(){
                $('#frmuser').trigger('reset');
                $('#imglist').html('No image found!');
            })
           
            //-----------------------
            // show user & uploaded image
           //-----------------------
                $('#viewuser').on('click', function(){
                    var url = $(this).val();
                    var uid = $('#userid').val();
                    $.ajax({
                        url:url, 
                        type : 'POST',
                        dataType : 'json', 						
                        data : {param:uid}, // post data || get data
                        beforeSend:function(){
                            $('#viewuser').addClass('disabled');
                            loaderon(); 
                        },
                        success : function(response) {
                            
                            loaderoff();
                           
                           $('#viewuser').removeClass('disabled');
                           
                           const myObjStr = response;
                           $('#username').val(myObjStr[0].username);                           
                           $('#userrole').html('<option value=\"'+myObjStr[0].zrole+'\">'+myObjStr[0].zrole+'</option>');
                           $('#useradd').val(myObjStr[0].xuseradd);
                           $('#useremail').val(myObjStr[0].zaltemail);
                           $('#usermobile').val(myObjStr[0].zusermobile);                           
                           $('#uservenu').html('<option value=\"'+myObjStr[0].xbranch+'\">'+myObjStr[0].xbranch+'</option>');
                           $('#usersl').val(myObjStr[0].zemail);
                           $('#imglist').html('Image not found!');
                            if(myObjStr[0].userphoto!=''){
                                $('#imglist').html('');
                                var photo = myObjStr[0].userphoto;                                
                                $('#imglist').append('<div class=\"col-1\"><div class=\"row\"><img src=\"'+photo+'\" height=\"50\" width=\"60\"></div><div class=\"row\"><a href=\"javascript:void(0)\" onclick=\"imgdrop(\''+photo+'\')\">Remove</a></div></div>');	
                            }
                                    
                        },
                        error: function(xhr, resp, text) {
                            loaderoff();
                            $('#viewuser').removeClass('disabled');
                           
                            console.log(xhr, resp, text);
                        }
                    });
                })

                $('#userid').on('keyup', function (e) {
                    if (e.keyCode === 13) {
                        $('#viewuser').click();
                        
                    }
                });

                //-----------------------
                // Drop uploaded image
               //-----------------------

                function imgdrop(img){
                    $.ajax({
                        url:'".URL."manageuser/dropimage', // url where to submit the request
                        type : 'POST', // type of action POST || GET
                        dataType : 'json', // data type						
                        data : {name: $('#usersl').val(),request:2}, // post data || get data
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
                //-------------
                //user search
                //-------------
                $('#searchuser').on('click', function(){
            
                    var url = '".URL."manageuser/finduser';
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
                                   tblhtml='<thead><th>User ID</th><th>User Name</th><th>Email</th></thead>';
                                   tblhtml+='<tbody>';
                                   $.each(result, function(key, value){
                                   
                                            tblhtml+='<tr><td><a class=\"tblrow\" href=\"javascript:void(0)\">'+value.zemail+'</a></td><td>'+value.zemail+'</td><td>'+value.zaltemail+'</td></tr>';      
                                            
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

                $('body').on('click','.tblrow', function(){
                    _this = $(this).html();                    
                    $('.nav-tabs a[href=\"#tabcreateuser\"]').tab('show');
                    $('#userid').val(_this);
                    $('#viewuser').click();
                });

                $('#printuserlist').on('click', function(){
                    //$('#printdivuser').print();
                    var divToPrint=document.getElementById('printdivuser');

                    var newWin=window.open('','Print-Window');

                    newWin.document.open();
                    newWin.document.write('<html><head><link rel=\"stylesheet\" href=\"./asset_admin/dist/css/style.css\" /><title>Print Document</title></head>');
                    newWin.document.write('<body onload=\"window.print()\">'+divToPrint.innerHTML+'</body></html>');

                    newWin.document.close();

                    setTimeout(function(){newWin.close();},10);
                })
            </script>
        ";
    }
    
}

?>