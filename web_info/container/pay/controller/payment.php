<?php 
class Payment extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->script="";
        
    }

    
    function init(){
        Session::init();
        // Logdebug::appendlog($user, true);
        // Logdebug::appendlog(print_r($_POST, true));
        if(!isset($_POST['apikey'])){
            echo json_encode(array("result"=>"error","message"=>"could not create session!"));
        }
        if($_POST['apikey']==Session::get('token')){ 
            $data = $_POST;
        // Logdebug::appendlog($data);
            $session_token = uniqid();
            Session::set("session_token", $session_token);
            Session::set($session_token, json_encode($data));
            echo json_encode(array("result"=>"success","message"=>$session_token));            
        }else{
            echo json_encode(array("result"=>"error","message"=>"API key mismatch!"));
        }
        
    }

    function paygateway($token){
        
        // Logdebug::appendlog($token);
        Session::init();
        if($token==Session::get("session_token")){
            $this->view->token=$token;
            $data = json_decode(Session::get($token));
            $user = Session::get('suser');
            $refno = Session::get('refno');

            // Logdebug::appendlog($user);
            $studentdt = $this->model->getstudent($user);
            // Logdebug::appendlog(print_r($studentdt, true));
            // $this->view->callbackurl=$data->callbackurl;
            // $this->view->render("notemplate","payment/paymentgateway");

        $data = Session::get($token);

        $data = json_decode(Session::get($token), true);
                // Logdebug::appendlog(print_r($data, true));
        // Logdebug::appendlog($data);
        global $invoice_no;
        global $amount;
        $amount = 0;
        $invoice_no = "SSL".uniqid();
        $numitems = 1;
        $date = date('Y-m-d');
        $status = 'success';
        
        $cols = "insert into ecomsales_temp(xdate,bizid,xstudent,xstudentmobile,xitemcode,xprice,xqty,xref,xdocnum,xtxnnum,xtxnmobile,xstatus,xoperator) values";
        $vals = "";
        foreach($data["itemdt"] as $key=>$value){
            $itemdt = $this->model->getcoursedt($value["itemcode"]);
            // Logdebug::appendlog(print_r($itemdt, true));
            if(count($itemdt)==0){
                echo json_encode(array("result"=>"failed", "message"=>"Item not found!"));
                exit;
            }
            if(count($itemdt)>0){
                $amount += floatval($value["qty"])*floatval($itemdt[0]['xstdprice']);
                $numitems+=1;
                $vals .= "('".$date."','".BIZID."','".$user."','".$data["mobile"]."','".$value["itemcode"]."','".$itemdt[0]['xstdprice']."','".$value["qty"]."','".$refno."','".BIZID."','".$data["txnid"]."','".$data["txnno"]."','Created','".$data["operator"]."'),";
            }
        }
        $vals = rtrim($vals,",");
        //$amount = 10;
        if($amount<10){
            echo json_encode(array("result"=>"failed", "message"=>"Not a valid amount!"));
            exit;
        }
         $result = $this->model->createtemp($cols.$vals);
        //  Logdebug::appendlog(print_r($result, true));
       
        if($result==0){  
            echo $cols.$vals;          
            echo json_encode(array("result"=>"failed", "message"=>"Could not ceate invoice!"));
            exit;
        }
        // else {
        //      $this->view->$status;
        //      $this->view->render("wetemplate","payment/callback");
				// header('location: '.URL.'home');

            
        // }
        }else{
            echo json_encode(array("result"=>"error","message"=>"Session expired!"));
        }
		
        // $sendsms = new Sendsms();
		// $result = $sendsms->send_sms("Dear ".$studentdt[0]["xstuname"]. 
        // "Welcome to our Institution.
        // Your course (" .$itemdt[0]["xdesc"]. ") has been enrolled successfully.
        // Your Login ID:" .$studentdt[0]["xmobile"]. 
        // "Regards
        // ABCL IT.
        // Hotline: 01957300900", $studentdt[0]["xmobile"]);
		echo json_encode(array('message'=>'Verification code sent!','result'=>'success','keycode'=>''));
        header('location: '.URL.'paymentsuc');

        // $this->view->$status;
        // $this->view->render("wetemplate","payment/callback");
    }   
    // function paygateway($token){
        
    //     // Logdebug::appendlog($token);
    //     Session::init();
    //     if($token==Session::get("session_token")){
    //         $this->view->token=$token;
    //         $data = json_decode(Session::get($token));
    //         // Logdebug::appendlog($data);

    //         $this->view->callbackurl=$data->callbackurl;
    //         $this->view->render("notemplate","payment/paymentgateway");
    //     }else{
    //         echo json_encode(array("result"=>"error","message"=>"Session expired!"));
    //     }
    // }   
    
    

}
?>