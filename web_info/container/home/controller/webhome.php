<?php 
	class Webhome extends Controller{

		function __construct(){
	        parent::__construct();
	       $this->view->script=$this->script();
	    }

	    function init(){
	        //echo "Test";die;
			//$this->view->business = $this->model->getbusiness();
			//$this->view->category = $this->model->getcategories();
			$this->view->menuitem=Menu::getmenu();
			//$this->view->teachers = $this->model->getteachers();
			$this->view->courses = $this->model->getcourses();
	    	$this->view->render("webtemplate","webhome/init");
		}
		
// 		function photogallery(){		
// 			$this->view->bannertext='<h1>Photo <span class="text-warning">Gallery</span></h1>';
// 			$this->view->breadcrumb='<p><a href="'.URL.'">Home</a> &#8594; <span>Photo Gallery</span></p>';
// 			$this->view->menuitem=Menu::getmenu();
// 	    	$this->view->render("webpagetemplate","webhome/photogallery");
// 		}

		function getcourse(){
		
			$itemcode=$_POST["xitemcode"];
			// Logdebug::appendlog($itemcode);
			$course = $this->model->getcourse($itemcode)[0];

			if($course > 0)				
				echo json_encode(array('message'=>'got the Course ','result'=>'success','course'=>$course));
             else
                echo json_encode(array('message'=>'Failed to get the course','result'=>'error','course'=>''));
		}

		// function products(){		
		// 	$this->view->bannertext='<h1>ABL <span class="text-warning">Products</span></h1>';
		// 	$this->view->breadcrumb='<p><a href="'.URL.'">Home</a> &#8594; <span>ABL Products</span></p>';
		// 	$this->view->menuitem=Menu::getmenu();	
	    // 	$this->view->render("webpagetemplate","webhome/products");
		// }
		
		private function script(){
			return "<script>
				function cartlist(){

				}
				</script>
			";
		}

	}

?>