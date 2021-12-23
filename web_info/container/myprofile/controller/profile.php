<?php 
	class Profile extends Controller{
		private $nav; 
		function __construct(){
			parent::__construct();
			Session::init();
			$this->view->script=$this->script();
			$logged = Session::get('loggedIn');
			//Logdebug::appendlog(var_dump($logged),true);
			if($logged == false){
				Session::destroy();
				header('location: '.URL.'studentlogin');
				exit;
			}
			
	       
	    }
 
	    function init(){			
			$this->nav = "nav1";
			$this->view->script=$this->script();
			$this->view->curcourses = $this->model->mycurcourses();
			//Logdebug::appendlog(print_r($this->model->mycurcourses()),true);
	    	$this->view->render("dashboard","webhome/dashboard_view");
		}

		function showprofile(){
			$this->nav = "nav2";
			$this->view->script=$this->script();
			$studentdt = $this->model->getstudentdt();
			$this->view->studentid = $studentdt[0]["xstudent"];
			 $this->view->studentname = $studentdt[0]["xstuname"];
			 $this->view->regtime = $studentdt[0]["ztime"];			 
			 $this->view->mail = $studentdt[0]["xstuemail"];
			 $this->view->mobile = $studentdt[0]["xmobile"];
	    	$this->view->render("dashboard","webhome/profile_view");
		}
		function editprofile(){	
			$this->nav = "nav1";		
			$this->view->script=$this->script();
			$studentdt = $this->model->getstudentdt();
			$this->view->studentid = $studentdt[0]["xstudent"];
			$this->view->studentname = $studentdt[0]["xstuname"];
			$this->view->regtime = $studentdt[0]["ztime"];			 
			$this->view->mail = $studentdt[0]["xstuemail"];
			$this->view->mobile = $studentdt[0]["xmobile"];
			$this->view->address = $studentdt[0]["xaddress"];
			$this->view->address = $studentdt[0]["xaddress"];
			$this->view->sex = $studentdt[0]["xsex"];
			
			$this->view->render("dashboard","webhome/editprofile_view");
		}

		function profileupdate(){
			//Logdebug::appendlog($_FILES['photofile']['name']);
			$address = "";
			$sex = "";
			$email="";
			if(isset($_POST["address"])){
				$address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["ssex"])){
				$sex = filter_var($_POST["ssex"], FILTER_SANITIZE_STRING);
			}
			if(isset($_POST["email"])){
				$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
			}
			$udata = array("xaddress"=>$address,"xsex"=>$sex, "xstuemail"=>$email);

			if ($_FILES["photofile"]["name"]){
				$imgupload = new ImageUpload();
				$imgupload->store_uploaded_image('assets/images/students/','photofile', 80, 60, Session::get('suser'));
				
			}

			$success=$this->model->update("edustudent", $udata, " xstudent='".Session::get('suser')."'");
			if($success){
				echo json_encode(array("message"=>"Updated successfully!", "result"=>"success"));
			}else{
				echo json_encode(array("message"=>"Couldnot Update!", "result"=>"error"));
			}

		}

		function showcourses(){
			$this->nav = "nav3";
			$this->view->script=$this->script();
			$studentdt = $this->model->getstudentdt(); 
			$this->view->studentid = $studentdt[0]["xstudent"];
			$this->view->studentname = $studentdt[0]["xstuname"];
			$this->view->mail = $studentdt[0]["xstuemail"];
			
			$curcourses = $this->model->mycurcourses();
			$this->view->curcourses = $curcourses;
	    	$this->view->render("dashboard","webhome/mycourse_view");
		}


		function logout(){
			Session::destroy();
			header('location: ' . URL . 'studentlogin');
			exit;
		}
		
		function getpuritems($invoice){
        $noticedt =  $this->model->getpuritems($invoice);
        //Logdebug::appendlog(print_r($noticedt, true));
        echo json_encode($noticedt);
        
        }
		
		function script(){
			return "<script>
			//alert('test');
			function modalopen(sl){
			    $('#ndescription').html('');
			    $('#invno').html('');
			    $('#invno').html('Invoice : #'+sl);
			    var tbl = '';
                var notices = '".URL."dashboard/getpuritems/'+sl;
                //console.log(notices);
			    $.get(notices, function(o){
                    // console.log(o[0].xecomsl);
                    tbl += '<tr><td>#'+o[0].xitemcode+'</td><td>'+o[0].xitemdesc+'</td><td>'+o[0].xrate+'</td><td>'+o[0].xbatchname+'</td></tr>';
                    $('#ndescription').append(tbl);
                }, 'json');
			}
        
		   </script>";
		}

	}

?>