<?php 
class Tempay extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->script="";
        Session::init();
    }

    function makepayment($token){
        Logdebug::appendlog($token);

        Session::init();
        $data = Session::get($token);

        $data = json_decode(Session::get($token), true);
                Logdebug::appendlog(print_r($data, true));
        // Logdebug::appendlog($data);
        global $invoice_no;
        global $amount;
        $amount = 0;
        $invoice_no = "SSL".uniqid();
        $numitems = 1;
        $date = date('Y-m-d');
        
        $cols = "insert into ecomsales_temp(ztime,xdate,bizid,xstudent,xstudentmobile,,xitemcode,xprice,xqty,xref,xdocnum,xtxnnum,xstatus,xoperator) values";
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
                $vals .= "('".$date."','".$date."','100','".$value["itemcode"]."','".$itemdt[0]['xstdprice']."','".$value["qty"]."','".$data["mobile"]."','".$data["country"]."','".$data["city"]."','Sadar','".$data["mobile"]."','".$data["fullname"]."','".$data["email"]."','".$data["address"]."','No Coupon','Online Sales',0,'Created'),";
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


}
?>