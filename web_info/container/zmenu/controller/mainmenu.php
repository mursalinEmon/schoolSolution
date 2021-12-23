<?php 
class Mainmenu extends Controller{
	function __construct(){
		parent::__construct();
        Session::init();
		$this->view->script = $this->script();


    }

    public function init(){
        
       
        $this->view->render("menutemplate","mainmenu/init");
    }

    function logout(){			
        $biz = Session::get('sbizid');
        Session::destroy();
        header('location: '. URL .'home');
        exit;
    }

    public function script(){
        return "";
    }
}

?>