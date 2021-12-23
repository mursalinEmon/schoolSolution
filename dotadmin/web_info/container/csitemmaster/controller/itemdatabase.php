<?php 
class Itemdatabase extends Controller{
	private $formfield = array();
    private $formset = array();
    private $searchfield = array();
    private $searchsettings = array();
	function __construct(){
		parent::__construct();
		$this->intializeform();
		$this->view->script = $this->script();

		//$this->view->js = array('views/bizsetup/js/bizsetup.js');
	}

	
	private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(
            "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Item Information","rowindex"=>"0", "ctrlvalid"=>array()),
            "itemcode"=>array("required"=>"*","label"=>"Item Code","ctrlfield"=>"xitemcode", "ctrlvalue"=>"", "ctrltype"=>"group", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"1","url"=>URL."popuppage/itempopup/itemcode"),			
            "itemdesc"=>array("required"=>"*","label"=>"Short Description","ctrlfield"=>"xdesc", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"1"),		           
            "category"=>array("required"=>"","label"=>"Category","ctrlfield"=>"xcat", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Item Category","rowindex"=>"2"),
			"brand"=>array("required"=>"","label"=>"Brand","ctrlfield"=>"xbrand", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Item Brand","rowindex"=>"2"),
            "salesprice"=>array("required"=>"*","label"=>"Price","ctrlfield"=>"xstdprice", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2", "number"=>"true"),"rowindex"=>"2"),						
			"longdesc"=>array("required"=>"","label"=>"Long Description","ctrlfield"=>"xlongdesc", "ctrlvalue"=>"", "ctrltype"=>"editor", "ctrlvalid"=>array(),"rowindex"=>"3"),		
			"itemid"=>array( "ctrlvalue"=>"", "ctrltype"=>"hidden", "ctrlfield"=>"itemid", "rowindex"=>"4", "ctrlvalid"=>array()),
            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmitem", "title"=>"Item Database"),
            "actionbtn"=>array(                
                array("btnmethod"=>"delete","btntext"=>"Delete","btnurl"=>URL."item/deleteitem","btnid"=>"itemdelete"),
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save Item","btnurl"=>URL."item/saveitem","btnid"=>"itemsave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View Item","btnurl"=>URL."manageuser/singleuser","btnid"=>"viewitem", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"Clear","btnurl"=>"","btnid"=>"clearitem", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            "srcitemcode"=>array("required"=>"","label"=>"Item Code","ctrlfield"=>"xitemcode", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1","url"=>"1"),			
            "srcitemdesc"=>array("required"=>"","label"=>"Description","ctrlfield"=>"xdesc", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),						            
            "srcitemcat"=>array("required"=>"","label"=>"Category","ctrlfield"=>"xcat", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),		
            "srcitembrand"=>array("required"=>"","label"=>"Brand","ctrlfield"=>"xbrand", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array(),"rowindex"=>"1"),						
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearchitem", "title"=>"Search Item"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."item/finditem","btnid"=>"btnsearchitem", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
                array("btnmethod"=>"print","btntext"=>"Print","btnurl"=>"","btnid"=>"printitemlist", "icon"=>"<i class=\"fa fa-print mr-1\"></i>","btncolor"=>"btn-dark"),
            ),
        );
        
    }


	function init(){
		$url = URL.'manageuser/uploadimage';
       $id = "userdropzone";

        $basicform = new Basicform();

        $tabsettings = array(
            0=>array("isactive"=>"active","tabdesc"=>"Create Item", "tabid"=>"tabcreateitem", "tabcontent"=>$basicform->createform($this->formset,$this->formfield, false), "icon"=>"far fa-user"),
            1=>array("isactive"=>"","tabdesc"=>"Upload Image", "tabid"=>"tabuploadimage", "tabcontent"=>ImageUpload::createdropzone($url,$id), "icon"=>"fa fa-cloud-upload-alt"),
            2=>array("isactive"=>"","tabdesc"=>"Search For Item", "tabid"=>"tabsearchitem", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),          
            
        );
        
        $this->view->userform = $basicform->createtab($tabsettings);
                
		$this->view->render("templateadmin","itemdatabase/init");
	}

	function saveitem(){
       
        $inputs = new Form();
            try{
				$inputs ->post("itemcode")
				->val('minlength', 2)
				
				->post("itemdesc")
				->val('minlength', 2)
				
				->post("longdesc")
				->val('minlength', 1)
			
				->post("category")
			
				->post("brand")
				
				->post("itemid")
			
				->post("salesprice");
			
			$inputs	->submit();       
			}catch(Exception $e){
			 $res = unserialize($e->getMessage());              
			
			 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
			exit;
			}
			
			$onduplicate = 'on duplicate key update xdesc=VALUES(xdesc), xlongdesc=VALUES(xlongdesc),
						xcat=VALUES(xcat), xbrand=VALUES(xbrand), xstdprice=VALUES(xstdprice)';
			
            $inpdata = $inputs->fetch(); //Logdebug::appendlog(serialize($inpdata));
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);
			$data['bizid']=100; //add business id to array for inserting			
            $data['zemail']='rajib';
            unset($data['itemid']);  //remove autoincrement id from inserting      
            $success = $this->model->save($data, $onduplicate);
			
			//Logdebug::appendlog($success);
            if($success > 0)
                echo json_encode(array('message'=>'User Saved Successfully','result'=>'success','keycode'=>$data['xitemcode']));
             else
                echo json_encode(array('message'=>'Failed to save user','result'=>'error','keycode'=>''));
	}
	
	function deleteitem(){
        
        $item = $_POST["itemcode"];
        $st = "delete from seitem where xitemcode='$item'"; 
        $success = $this->model->executest($st);
        if($success > 0)
                echo json_encode(array('message'=>'Item Deleted Successfully','result'=>'success','keycode'=>$success));
             else
                echo json_encode(array('message'=>'Failed to delete item','result'=>'error','keycode'=>''));
	}
	
	function singleitem(){
        $storeFolder = USER_IMAGE_LOCATION;
        $item = $_POST['param']; 
        $itemdt =  $this->model->getsingleitem($item);  
        $itemdt[0]["itemimage"]="";
        foreach (glob($storeFolder.$user.".jpg") as $file) {
					
            $itemdt[0]["itemimage"] = $file;
            
        }
        echo json_encode($userdt);
        
    }
	

	public function uploadimage(){
		
		$storeFolder = './public/images/uploads/';   //2
		$filename = "xitem";
		if (!empty($_FILES)) {

			$files = array();
				foreach (glob($storeFolder."xitem*.jpg") as $file) {
					
					$efile = explode(".",$file);
					
					$files[] = substr($efile[1],strlen($efile[1])-1);
					
				}
				$fileindex = 0;	
			if(count($files)>0){	
				$fileindex = max($files)+1;	
			}	
				$sfile = "xitem".$fileindex.".jpg";	
				$tempFile = $_FILES['file']['tmp_name'];          //3             
				
				$targetPath = $storeFolder;  //4
				
				$targetFile =  $targetPath.$sfile;  //5
				
				move_uploaded_file($tempFile,$targetFile); //6


			//Logdebug::appendlog($result);
		}
		$result=array();
		
		foreach (glob($storeFolder."xitem*.jpg") as $file) {
					
					$result[] = $file;
					
				}
			echo json_encode($result);
		//Logdebug::appendlog($_FILES['file']['tmp_name']);



	}

	public function dropimage(){
		$storeFolder = './public/images/uploads/';   //2
		$request = $_POST['request'];
		if($request == 2){ 
			
			$targetFile =  $storeFolder.$_POST['name'];  //5
			
			unlink($_POST['name']); //6
			
		}	
		$result=array();
		
		foreach (glob($storeFolder."xitem*.jpg") as $file) {
					
					$result[] = $file;
					
				}
			echo json_encode($result);
	}	

	function script(){
		$basicform = new Basicform(); 
		return "<script>
		//-----------------------
            // save update delete ajax
            //-----------------------
            ".$basicform->returnajax($this->formset)."
            //-----------------------
            //user form validation
            //-----------------------
            ".$basicform->validateform($this->formfield, 'frmitem')."  

		
		Dropzone.autoDiscover = false;
		$('#dropzone1').dropzone({			
            addRemoveLinks: false,
			acceptedFiles: 'image/*',			
            dictDefaultMessage: 'Drop files here or click here to upload. <br /> Only Images Allowed',
            success: function (file, response) {
				toastr.success('Files Uploaded successfully!');
				//var _this=this;
				//_this.removeAllFiles();
				const myObjStr = JSON.parse(response);
				$('#imglist').html('');
				myObjStr.forEach(function(resp){
					
					//console.log(resp);
					$('#imglist').append('<div class=\"col-1\"><div class=\"row\"><img src=\"'+resp+'\" height=\"50\" width=\"60\"></div><div class=\"row\"><a href=\"javascript:void(0)\" onclick=\"imgdrop(\''+resp+'\')\">Remove</a></div></div>');	
				});
				
            },
            /*removedfile: function(file) {
				var name = file.name; 
				
                toastr.warning('Files Removed successfully!');
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }*/
		});

		function imgdrop(img){
			$.ajax({
				url:'http://localhost/bdvendor/item/dropimage', // url where to submit the request
				type : 'POST', // type of action POST || GET
				dataType : 'json', // data type						
				data : {name:img,request:2}, // post data || get data
				beforeSend:function(){
					$('.loader').show();
				},
				success : function(result) {
					// you can see the result from the console
					// tab of the developer tools
					$('.loader').hide(); 
					//const myObjStr = JSON.parse(result);
					$('#imglist').html('');
					result.forEach(function(resp){
						
						//console.log(resp);
						$('#imglist').append('<div class=\"col-1\"><div class=\"row\"><img src=\"'+resp+'\" height=\"50\" width=\"60\"></div><div class=\"row\"><a href=\"javascript:void(0)\" onclick=\"imgdrop(\''+resp+'\')\">Remove</a></div></div>');	
					});
				},
				error: function(xhr, resp, text) {
					$('.loader').hide();
					console.log(xhr, resp, text);
				}
			})
		}
		

		//-----------------------
		// show user & uploaded image
	   //-----------------------
			$('#viewitem').on('click', function(){
				var url = $(this).val();
				var sid = $('#itemcode').val();
				$.ajax({
					url:url, 
					type : 'POST',
					dataType : 'json', 						
					data : {param:sid}, // post data || get data
					beforeSend:function(){
						$('#viewuser').addClass('disabled');
						loaderon(); 
					},
					success : function(response) {
						
						loaderoff();
					   
					   $('#viewitem').removeClass('disabled');
					   
					   const myObjStr = response;
					   $('#username').val(myObjStr[0].username);
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
						$('#viewitem').removeClass('disabled');
					   
						console.log(xhr, resp, text);
					}
				});
			})

			$('#itemcode').on('keyup', function (e) {
				if (e.keyCode === 13) {
					$('#viewitem').click();
					
				}
			});
		</script>";
	}
}
?>

