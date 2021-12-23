<?php 
class Sslpay extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->script="";
        
    }

    function makepayment($token){
        // Logdebug::appendlog($token);

        Session::init();
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
        
        $cols = "insert into temp_sales (xtemptxn,xdate,xpassword,xcustomertype,xcourse,xrate,xqty,xpoint,xpaymethod,xcountry,xdistrict,xthana,xmobile,xname,xemail,xaddress,xcupon,xdoctype,xdisc,xstatus) values";
        $vals = "";
        foreach($data["itemdt"] as $key=>$value){
            $itemdt = $this->model->getcoursedt($value["itemcode"]);
            if(count($itemdt)==0){
                echo json_encode(array("result"=>"failed", "message"=>"Item not found!"));
                exit;
            }
            if(count($itemdt)>0){
                $amount += floatval($value["qty"])*floatval($itemdt[0]['xstdprice']);
                $numitems+=1;
                $vals .= "('".$invoice_no."','".$date."','123456','".$data["customertype"]."','".$value["itemcode"]."','".$itemdt[0]['xstdprice']."','".$value["qty"]."','500','Nagad','".$data["country"]."','".$data["city"]."','Sadar','".$data["mobile"]."','".$data["fullname"]."','".$data["email"]."','".$data["address"]."','No Coupon','Online Sales',0,'Created'),";
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
       
        $post_data = array();

        $post_data['total_amount'] = $amount;//$_POST['amount'];
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $invoice_no;

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $data["fullname"];
        $post_data['cus_email'] = $data["email"];
        $post_data['cus_add1'] = $data["address"];
        $post_data['cus_add2'] = $data["address"];
        $post_data['cus_city'] = $data["city"];
        $post_data['cus_state'] = $data["city"];
        $post_data['cus_postcode'] = "000";
        $post_data['cus_country'] = $data["country"];;
        $post_data['cus_phone'] = $data["mobile"];
        //$post_data['cus_fax'] = "01711111111";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = $data["fullname"];
         $post_data['ship_add1'] = $data["address"];
         $post_data['ship_add2'] = $data["address"];
        $post_data['ship_city'] = $data["city"];
        $post_data['ship_state'] = $data["city"];
        $post_data['ship_postcode'] = "0000";
        $post_data['ship_phone'] = $data["mobile"];
        $post_data['ship_country'] = $data["country"];

       

        $post_data['emi_option'] = "0";
        

        $post_data["product_category"] = "Ecommerce";
        $post_data["product_name"] = "Ecommerce Items";
        
         $post_data["shipping_method"] = "Courier";
         $post_data["num_of_item"] = $numitems;
        

        # SPECIAL PARAM
        $post_data['tokenize_id'] = "1";

        # 1 : Physical Goods
        # 2 : Non-Physical Goods Vertical(software)
        # 3 : Airline Vertical Profile
        # 4 : Travel Vertical Profile
        # 5 : Telecom Vertical Profile

        $post_data["product_profile"] = "general";
        $post_data["product_profile_id"] = "5";

        //$post_data["topup_number"] = "01711111111"; # topUpNumber
        //Logdebug::appendlog(serialize($post_data));
        # First, save the input data into local database table `orders`
        //$query = new OrderTransaction();
        //$sql = $query->saveTransactionQuery($post_data);

        // if ($conn_integration->query($sql) === TRUE) {

        //     # Call the Payment Gateway Library
             $sslcomz = new SslCommerzNotification();
             $sslcomz->makePayment($post_data, 'hosted');
        // } else {
        //     echo "Error: " . $sql . "<br>" . $conn_integration->error;
        // }
    }

    function sslsuccess(){
        //Session::init();
        $sslc = new SslCommerzNotification();

        $hostcallback="";
        // if(!isset($_POST['tran_id'])){
        //     $this->finalcallback('0', 'failed',"");
        //     exit;
        // }
        $tran_id = $_POST['tran_id'];
        $amount =  $_POST['amount'];
        $currency =  $_POST['currency'];
        
        $validation = $sslc->orderValidate($tran_id, $amount, $currency, $_POST);
        
        $tran_id = (string)$tran_id;
        $status= "failed";
        $invoice=0;
        
        if ($validation == TRUE) {
        $status= "Success";
        $tord = $this->model->gettemporder($tran_id);
        $date = date('Y-m-d');
        $year = date('Y',strtotime($date));
        $month = date('m',strtotime($date)); 
        
       if($tord[0]['xstatus']=='Success'){
           $this->finalcallback("", 'Failed',URL);
           exit;
       }
       
       $isordered = $this->model->isordered($tran_id);
       if(count($isordered)>0){
           $this->finalcallback("", 'Failed',URL);
           exit;
       }
        //Logdebug::appendlog(serialize($arr));
       
           $updatetemp = $this->model->updatetemp("update temporder set xstatus='".$status."' where tempinvoice='".$tran_id."'");
           $student = $this->model->getstudent($tord[0]['xmobile']);
           $studentid = 0;
           
           if(count($student)==0){
            $pass = Hash::create('sha256',$tord[0]['xpassword'],HASH_KEY);
            $cols = "xstuname,xstuemail,xmobile,xaddress,xpassword,xsex,xcustype,xcountry,xcity,xverified";
            $vals = "('".$tord[0]['xname']."','".$tord[0]['xemail']."','".$tord[0]['xmobile']."','".$tord[0]['xaddress']."','".$pass."','Male','".$tord[0]['xcustomertype']."','".$tord[0]['xcountry']."','".$tord[0]['xthana']."',1)";
            $studentid = $this->model->save("edustudent",$cols, $vals);
            //Logdebug::appendlog($cols.$vals);
           }else{
            $studentid = $student[0]["xstudent"];
           }
           
            $cols = "xdate,xstudent,xfullname,xaddress,xmobile,xstatus,xtemptxn,xcustype,xpaymethod";
            $vals = "('".$date."',$studentid,'".$tord[0]['xname']."','".$tord[0]['xaddress']."','".$tord[0]['xmobile']."','Confirmed','".$tran_id."','".$tord[0]['xcustomertype']."','".$tord[0]['xpaymethod']."')";
            //$hostcallback = $tord[0]['xcallback'];
            $invoice = $this->model->save("edusalesmst",$cols, $vals);
            $amount = 0;
            $totalbv = 0;
            $data = array();
            if($invoice>0){
                $cols = "xsalesnum,xdate,xstudent,xcourse,xprice,xqty,xpoint,xstartdate,xdelqty,xcustype,xpaymethod,xcoupon";
                $vals = "";
                foreach($tord as $key=>$val){
                    $amount+=floatval($val['xqty'])*floatval($val['xrate']);
                    $totalbv+=floatval($val['xqty'])*floatval($val['xpoint']);

                    $coupon = "";
                    if(floatval($val['xpoint'])>0){
                        for($i=1;$i<=intval($val['xqty']); $i++){
                            $coupon.= strtoupper(uniqid()).",";
                        }
                    
                        $coupon = rtrim($coupon,",");
                    }
                    array_push($data,array(
                        "coupon"=>$coupon,
                        "bv"=>$val['xpoint'],
                        "payref"=>$invoice
                        
                    ));       

                    $vals .= "('".$invoice."','".$date."',$studentid,'".$val['xcourse']."','".$val['xrate']."','".$val['xqty']."','".$val['xpoint']."','',0,'".$val['xcustomertype']."','".$val['xpaymethod']."','".$coupon."'),";
                }
                $vals = rtrim($vals,",");
                
                
                $invoicedt = $this->model->save("edusalesdet",$cols, $vals);
                // if($totalbv>0){
                //     $this->httppost($data);
                // }
            }
            
            
            
        }
        $this->finalcallback($invoice, $status, URL);
    }

    function httppost($data)
    {
        $pubkeystr = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAsm/4/760SyRA4n8b2XBg SaW6DWVIXQ0vYaeho7bpsv+kXXvQnW2u8VLUL8M3KAvDDan+m9mc0BvPSuP1Eymo bt/Bt1NmNHnJAW1Bs0jg9mcNCuc1WSyf3OAn1G7UnsJMC3He8Wxvk/P2sIcL71Rv CvVStUfySNogYn9Eo1lJCHAEJhP4coLZWXvyDbUoXjNwpujaFBNd0fe5VlVEZRU4 RoTxCbcG8sUJzdJUmKcL+XLEe9QjY6UipSesMFLFtAVuUwKjsu01jfvqgcy0RNko 8jajEYdQXWn5c5qyOr4/XlDI2ZjZKFLAoddq1n31cXSzp5OmJmeG6Ia/9t4gSFDV QQIDAQAB";
        $pubkey = "-----BEGIN PUBLIC KEY-----\n" . $pubkeystr . "\n-----END PUBLIC KEY-----";

        $ch = curl_init();
        $header = array(
            'Content-Type:application/json',
           
        );

        $token = "678262745628596dgfksjfgkjf68676789%%";
        
    

    openssl_public_encrypt(json_encode($data), $encrypted, $pubkey);

    $postdata = array(
        "token"=>$token,
        "data" => base64_encode($encrypted)
    );
        
     curl_setopt($url, CURLOPT_HTTPHEADER, $header);
    
    curl_setopt($ch, CURLOPT_URL,"https://portal2.amarbazarltd.com/ablexpress/createcoupon.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
                json_encode($postdata));

    // In real life you should use something like:
    // curl_setopt($ch, CURLOPT_POSTFIELDS, 
    //          http_build_query(array('postvar1' => 'value1')));

    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    //echo $server_output;
    curl_close ($ch);

    }

    function finalcallback($invoice, $status, $hostcallback){
        //Session::init();
        $this->view->status = $status;
        $this->view->invoice = $invoice;
        $this->view->callback = $hostcallback;
        $this->view->render("notemplate","payment/callback");
    }

    function sslfail(){
        $tran_id = $_POST['tran_id'];
        $tord = $this->model->gettemporder($tran_id);
        $hostcallback = $tord[0]['xcallback'];
        //Logdebug::appendlog();
        $this->finalcallback('0', 'fail',URL);
    }
    
    function sslcancel(){
        $tran_id = $_POST['tran_id'];
        $tord = $this->model->gettemporder($tran_id);
        $hostcallback = $tord[0]['xcallback'];
        $this->finalcallback('0', 'fail',URL);
    }

    function sslipn(){
        
    }
    

}
?>