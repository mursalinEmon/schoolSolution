<?php 
	class Webhome extends controller{

		function __construct(){
	        parent::__construct();
	       $this->view->script=$this->script();
	    }

	    function init(){			
			
			$this->view->menuitem=Menu::getmenu();
	    	$this->view->render("webtemplate","webhome/init");
		}
		
		function photogallery(){		
			$this->view->bannertext='<h1>Photo <span class="text-warning">Gallery</span></h1>';
			$this->view->breadcrumb='<p><a href="'.URL.'">Home</a> &#8594; <span>Photo Gallery</span></p>';
			$this->view->menuitem=Menu::getmenu();
	    	$this->view->render("webpagetemplate","webhome/photogallery");
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