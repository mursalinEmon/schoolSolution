<?php 
	class Facprofile extends Controller{
		private $nav; 
		function __construct(){
			parent::__construct();
			Session::init();
			$logged = Session::get('teacherlogin');
			if($logged == false){
				Session::destroy();
				header('location: '.URL.'teacherlogin');
				exit;
			}
			
	       
	    }
 
	    function init(){			
			$this->nav = "nav1";
			$this->view->script="<script>for(var i=1; i<=4; i++){
				$('#nav'+i).removeClass('page-active');
			}
			$(\"#".$this->nav."\").addClass('page-active');</script>";
			$teacherdt = $this->model->getteacherdt();
			$this->view->teacherid = $teacherdt[0]["xteacher"];
			$this->view->teachername = $teacherdt[0]["xteachername"];
			$this->view->mail = $teacherdt[0]["xemailaddr"];
			 
	    	$this->view->render("facdashboard","webhome/facdashboard_view");
		}

		function showprofile(){
			$this->nav = "nav2";
			$this->view->script="<script>for(var i=1; i<=4; i++){
				$('#nav'+i).removeClass('page-active');
			}
			$(\"#".$this->nav."\").addClass('page-active');</script>";
			$teacherdt = $this->model->getteacherdt();
			$this->view->teacherid = $teacherdt[0]["xteacher"];
			 $this->view->teachername = $teacherdt[0]["xteachername"];
			 $this->view->regtime = $teacherdt[0]["ztime"];			 
			 $this->view->mail = $teacherdt[0]["xemailaddr"];
			 $this->view->mobile = $teacherdt[0]["xmobile"];
	    	$this->view->render("facdashboard","webhome/facprofile_view");
		}
		function editprofile(){	
			$this->nav = "nav3";		
			$this->view->script=$this->script();
			$teacherdt = $this->model->getteacherdt();
			$this->view->teacherid = $teacherdt[0]["xteacher"];
			$this->view->teachername = $teacherdt[0]["xteachername"];
			$this->view->regtime = $teacherdt[0]["ztime"];			 
			$this->view->mail = $teacherdt[0]["xemailaddr"];
			$this->view->mobile = $teacherdt[0]["xmobile"];
			$this->view->address = $teacherdt[0]["xaddress"];
			$this->view->experience = $teacherdt[0]["xexperience"];
			$this->view->education = $teacherdt[0]["xeducation"];
			$this->view->owndesc = $teacherdt[0]["xowndesc"];
			$this->view->expartarea = $teacherdt[0]["xexpartarea"];
			
			$this->view->render("facdashboard","webhome/editfacprofile_view");
		}

		function profileupdate(){
			//Logdebug::appendlog($_FILES['photofile']['name']);
			$address = "";
			$sex = "";
			$email="";
			if(isset($_POST["address"])){
				$address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["fullname"])){
				$fullname = filter_var($_POST["fullname"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["email"])){
				$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["mobile"])){
				$mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["education"])){
				$education = filter_var($_POST["education"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["experience"])){
				$experience = filter_var($_POST["experience"], FILTER_SANITIZE_STRING);
			}
			
				$owndesc = $_POST["owndesc"];
			
			
				$expartarea = $_POST["expartarea"];
			

			$udata = array("xaddress"=>$address,"xteachername"=>$fullname, "xemailaddr"=>$email, "xmobile"=>$mobile
			, "xeducation"=>$education,"xexperience"=>$experience,"xowndesc"=>$owndesc,"xexpartarea"=>$expartarea);
			//Logdebug::appendlog(print_r($udata, true));
			if ($_FILES["photofile"]["name"]){
			
				$imgupload = new ImageUpload();
				$res = $imgupload->store_uploaded_image('assets/images/teachers/','photofile', 160, 120, Session::get('fuser'));
				
			}

			$success=$this->model->update("eduteacher", $udata, " xteacher='".Session::get('fuser')."'");
			if($success){
				echo json_encode(array("message"=>"Updated successfully!", "result"=>"success"));
			}else{
				echo json_encode(array("message"=>"Couldnot Update!", "result"=>"error"));
			}

		}


		function savecourse(){
			//Logdebug::appendlog($_FILES['photofile']['name']);
			$coursetitle = "";
			$mypay = "0";
			$description="";
			$venu = "";
			$category = "";
			$numclass="0";
			$hourclass = "0";
			$duration = "0";
			$capacity="0";
			$logisticamt = "0";
			$salesprice="0";
			$skilllevel = "";
			$learning = "";

			if(isset($_POST["coursetitle"])){
				$coursetitle = filter_var($_POST["coursetitle"], FILTER_SANITIZE_STRING);
			}
			
				$skilllevel = $_POST["skilllevel"];
			
			
				$learning = $_POST["learning"];
			
			if(isset($_POST["mypay"])){
				$mypay = filter_var($_POST["mypay"], FILTER_SANITIZE_STRING);
			}
			
			$description = $_POST["description"];
			
			if(isset($_POST["venu"])){
				$venu = filter_var($_POST["venu"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["category"])){
				$category = filter_var($_POST["category"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["numclass"])){
				$numclass = filter_var($_POST["numclass"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["hourclass"])){
				$hourclass = filter_var($_POST["hourclass"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["duration"])){
				$duration = filter_var($_POST["duration"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["capacity"])){
				$capacity = filter_var($_POST["capacity"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["logisticamt"])){
				$logisticamt = filter_var($_POST["logisticamt"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["salesprice"])){
				$salesprice = filter_var($_POST["salesprice"], FILTER_SANITIZE_STRING);
			}

			$udata = array("xcoursetitle"=>$coursetitle,"xcoursedesc"=>$description,"xteacher"=>Session::get('fusername'),"xteacheramt"=>$mypay, "xvenu"=>$venu, "xcat"=>$category
			, "xnumclass"=>$numclass,"xhourclass"=>$hourclass,"xduration"=>$duration,"xcapacity"=>$capacity,
			"xlogisticamt"=>$logisticamt,"xprice"=>$salesprice,"xskillevel"=>$skilllevel,"xlearning"=>$learning);

			
			$success=$this->model->dbinsert("educourse", $udata);
			if($success){
				if ($_FILES["coursefile"]["name"]){
			
					$imgupload = new ImageUpload();
					$imgupload->store_uploaded_image('assets/images/courses/','photofile', 160, 120, Session::get('fuser'));
					
				}
	
				echo json_encode(array("message"=>"Course Created successfully!", "result"=>"success"));
			}else{
				echo json_encode(array("message"=>"Couldnot Create Course!", "result"=>"error"));
			}

		}

		function uploadcourse(){	
			$this->nav = "nav4";		
			$this->view->script=$this->uploadcoursescript();
			$teacherdt = $this->model->getteacherdt();
			$coursedt = $this->model->getcoursedt();
			$this->view->teacherid = $teacherdt[0]["xteacher"];
			$this->view->teachername = $teacherdt[0]["xteachername"];						 
			$this->view->mail = $teacherdt[0]["xemailaddr"];
			$this->view->mobile = $teacherdt[0]["xmobile"];
			$this->view->address = $teacherdt[0]["xaddress"];
			
			$this->view->render("facdashboard","webhome/uploadcourse_view");
		}

		function showcourses(){
			$this->nav = "nav3";
			$this->view->script="<script>for(var i=1; i<=4; i++){
				$('#nav'+i).removeClass('page-active');
			}
			$(\"#".$this->nav."\").addClass('page-active');</script>";
			$teacherdt = $this->model->getteacherdt(); 
			$this->view->teacherid = $teacherdt[0]["xteacher"];
			$this->view->teachername = $teacherdt[0]["xteachername"];
			$this->view->mail = $teacherdt[0]["xemailaddr"];
			
			$curcourses = $this->model->mycurcourses();
			$this->view->curcourses = $curcourses;
	    	$this->view->render("facdashboard","webhome/myfaccourse_view");
		}


		function logout(){
			Session::destroy();
			header('location: ' . URL . 'teacherlogin');
			exit;
		}
		
		private function script(){
			return "<script>
			
			var ckowndesc = CKEDITOR.replace('owndesc', {
			
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
			
			 ckowndesc.on('change', function() {
				ckowndesc.updateElement();         
				});
		
				var ckexpartarea = CKEDITOR.replace('expartarea', {
			
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
			
				 ckexpartarea.on('change', function() {
					ckexpartarea.updateElement();         
					});
			
			$(document).ready(function(e){

				for(var i=1; i<=4; i++){
					$('#nav'+i).removeClass('page-active');
				}
				$(\"#".$this->nav."\").addClass('page-active');
					
					$('#photoupload').on('submit',(function(e) {
						e.preventDefault();
						var formData = new FormData(this);
						
						$.ajax({
							type:'POST',
							url:\"".URL."facdashboard/profileupdate\", 
							data:formData,
							cache:false,
							contentType: false,
							processData: false,
							success:function(data){
								console.log(data);
								var res = JSON.parse(data)
								cartmessage(res.message)
								
							},
							error: function(data){
								
								//console.log(data);
							}
						});
					}));



		
				})
				</script>

			";
		}

		private function uploadcoursescript(){
			return "<script>

			$('#thm').on('change', function(){
				
				$('#themeimage').attr(\"src\",\"".URL."assets/images/courses/\"+this.value+'.jpg');
					
			})

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
			
				var ckskilllevel = CKEDITOR.replace('skilllevel', {
			
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
				
				 ckskilllevel.on('change', function() {
					ckskilllevel.updateElement();         
					});	

					
						var cklearning = CKEDITOR.replace('learning', {
					
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
						
						 cklearning.on('change', function() {
							cklearning.updateElement();         
							});			
			
			
			
			$(document).ready(function(e){

				for(var i=1; i<=4; i++){
					$('#nav'+i).removeClass('page-active');
				}
				$(\"#".$this->nav."\").addClass('page-active');
					
			
					$('#coursereg').on('submit',(function(e) {
						e.preventDefault();
						var formData = new FormData(this);
						
						$.ajax({
							type:'POST',
							url:\"".URL."facdashboard/savecourse\", 
							data:formData,
							cache:false,
							contentType: false,
							processData: false,
							success:function(data){
								var res = JSON.parse(data)
								cartmessage(res.message)
								//console.log(data);
							},
							error: function(data){
								
								//console.log(data);
							}
						});
					}));
		
				})
				</script>

			";
		}

	}

?>