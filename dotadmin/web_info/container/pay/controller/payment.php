<?php 
class Payment extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->script="";
        
    }

    function init(){
        Session::init();
        if(isset($_POST['apikey'])){
            $data = $_POST;
            $session_token = uniqid();
            Session::set("session_token", $session_token);
            Session::set($session_token, json_encode($data));
            echo json_encode(array("result"=>"success","message"=>$session_token));            
        }else{
            echo json_encode(array("result"=>"error","message"=>"could not create session!"));
        }
        
    }

    function paygateway($token){
        Session::init();
        if($token==Session::get("session_token")){
            $this->view->token=$token;
            $data = json_decode(Session::get($token));
            
            $this->view->callbackurl=$data->callbackurl;
            $this->view->render("rawtemplate","payment/paymentgateway");
        }else{
            echo json_encode(array("result"=>"error","message"=>"Session expired!"));
        }
    }   
    
    

}
?>