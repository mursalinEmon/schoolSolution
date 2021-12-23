<?php 
class Sslpay extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->script="";
        
    }

    function makepayment($token){
        Session::init();
        $data = json_decode(Session::get($token));

        global $invoice_no;
        global $amount;
        $amount = 0;
        $invoice_no = "ABL-PAY".uniqid();
        $numitems = 0;
        $cusdt = array();
        if($data->customertype=="Retailer"){
            $cusdt = $this->model->rindt($data->customer);
        }else{
            $cusdt = $this->model->cusdt($data->customer);
            
        }
        
        $stno = $this->model->getstno()[0]['stno'];
        if(count($cusdt)==0){
            echo json_encode(array("result"=>"failed", "message"=>"Customer not found!"));
            exit;
        }
        $cols = "insert into temporder (tempinvoice,xcustype,xcus,xdelname,stno,xpaymethod,xdeladd,xcity,xdistrict,xmobile,xpostal,xitemcode,xqty,xrate,xdp,xcallback,xdoctype,xodcnum,xcompany,xoutlet,xdoc,xrefrin) values";
        $vals = "";
        foreach($data->itemdt as $key=>$value){
            $itemdt = $this->model->getitemdt($value->itemcode);
            if(count($itemdt)==0){
                echo json_encode(array("result"=>"failed", "message"=>"Item not found!"));
                exit;
            }
            if(count($itemdt)>0){
                $amount += floatval($value->qty)*floatval($itemdt[0]['xstdprice']);
                $numitems+=1;
                $vals .= "('".$invoice_no."','".$data->customertype."','".$data->customer."','".$data->cusname."',$stno,'SSLCOMMERZE','".$cusdt[0]['xadd1']."','".$data->city."','".$data->district."','".$data->mobile."','".$cusdt[0]['xpostal']."','".$value->itemcode."','".$value->qty."','".$itemdt[0]['xstdprice']."','".$itemdt[0]['xdp']."','".$data->callbackurl."','".$data->doctype."','".$data->odcid."','".$data->company."','".$data->outlet."','".$data->doc."','".$data->refrin."'),";
            }
        }
        $vals = rtrim($vals,",");
        if($data->doctype=='LDC Order'){
            if($amount<10000){
                header('location: '. $data->callbackurl );
                exit;
            }
        }
        
        $result = $this->model->createtemp($cols.$vals);
       
        if($result==0){
            echo json_encode(array("result"=>"failed", "message"=>"Could not ceate invoice!"));
            exit;
        }
       
        $post_data = array();

        $post_data['total_amount'] = $amount;//$_POST['amount'];
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $invoice_no;

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $cusdt[0]['xorg'];
        $post_data['cus_email'] = 'info@amarbazarltd.com';
        $post_data['cus_add1'] = $data->add1;
        $post_data['cus_add2'] = $data->add2;
        $post_data['cus_city'] = $data->city;
        $post_data['cus_state'] = $data->district;
        $post_data['cus_postcode'] = $data->postal;
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $data->mobile;
        //$post_data['cus_fax'] = "01711111111";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = $cusdt[0]['xorg'];
         $post_data['ship_add1'] = $data->add1;
         $post_data['ship_add2'] = $data->add2;
        $post_data['ship_city'] = $data->city;
        $post_data['ship_state'] = $data->district;
        $post_data['ship_postcode'] = $data->postal;
        $post_data['ship_phone'] = $data->mobile;
        $post_data['ship_country'] = "Bangladesh";

       

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
        $hostcallback="";
        $validation = $sslc->orderValidate($tran_id, $amount, $currency, $_POST);
        //Logdebug::appendlog($validation);
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
           $this->finalcallback("", 'Failed',$tord[0]['xcallback']);
           exit;
       }
       
       $isordered = $this->model->isordered($tran_id);
       if(count($isordered)>0){
           $this->finalcallback("", 'Failed',$tord[0]['xcallback']);
           exit;
       }
        //Logdebug::appendlog(serialize($arr));
        
            $updatetemp = $this->model->updatetemp("update temporder set xstatus='".$status."' where tempinvoice='".$tran_id."'");
            
            $cols = "bizid,zemail,xdate,xrdin,xdelname,stno,xstatus,xnote,xbranch,xpaymethod,xpostcode";
            $vals = "(100,'".$tord[0]['xcus']."','".date('Y-m-d')."','".$tord[0]['xcus']."','".$tord[0]['xdelname']."','".$tord[0]['stno']."','Confirmed','".$tord[0]['xdeladd']."','".$tord[0]['xcus']."','".$tord[0]['xpaymethod']."','".$tord[0]['xpostal']."')";
            $hostcallback = $tord[0]['xcallback'];
            $invoice = $this->model->createinvoice("imretail",$cols, $vals);
            $amount = 0;
            $totalbv = 0;
            if($invoice>0){
                $cols = "bizid,xtxnnum,zemail,xdate,xrdin,xdelname,xtoparty,stno,xitemcode,xqty,xrate,xbv,xyear,xper,xstatus,xdeladd,xcity,xdistrict,xmobile,xpaymethod,xpostcode,xdocnum,xdoctype,xsign,xodcnum,xcompany,xoutlet,xdoc";
                $vals = "";
                foreach($tord as $key=>$val){
                    $amount+=floatval($val['xqty'])*floatval($val['xrate']);
                    $totalbv+=floatval($val['xqty'])*floatval($val['xdp']);
                    $vals .= "(100,'".$invoice."','".$tord[0]['xcus']."','".$date."','".$val['xcus']."','".$val['xdelname']."','".$val['xrefrin']."','".$val['stno']."','".$val['xitemcode']."','".$val['xqty']."','".$val['xrate']."','".$val['xdp']."',".$year.",".$month.",'Confirmed','".$val['xdeladd']."','".$val['xcity']."','".$val['xdistrict']."','".$val['xmobile']."','".$val['xpaymethod']."','".$val['xpostal']."','".$val['tempinvoice']."','".$val['xdoctype']."', '1','".$val['xodcnum']."','".$val['xcompany']."','".$val['xoutlet']."','".$val['xdoc']."'),";
                }
                $vals = rtrim($vals,",");
                
                //Logdebug::appendlog($vals);
                $invoicedt = $this->model->createinvoice("imretaildet",$cols, $vals);
            

            }
            
            if($tord[0]['xdoctype']=='Corporate Order'){
                $data = array(
                    'bizid'=>100,
                    'xcus' => $tord[0]['xcus'],
                    'point' => $totalbv,
                    'xdocnum'=>$invoice,
                    'xdoctype'=>'Corporate Order',
                    'xsign'=>1,
                    'xdate'=>$date,
                    'stno'=>$tord[0]['stno'],
                    'zemail'=>'System'
                );
                
                $comdata = array(
                    'bizid'=>100,
                    'xrdin' => $tord[0]['xrefrin'],
                    'distrisl' => 0,
                    'xdocnum'=>$invoice,
                    'xcomtype'=>'Spot Promotion',
                    'xdoctype'=>'Corporate Sale',
                    'xcom'=>$totalbv,
                    'xpaid'=>0,
                    'xdate'=>$date,
                    'stno'=>$tord[0]['stno'],
                    'xsrctaxpct'=>0,
                    'zemail'=>'System'
                );
                
                
                $success = $this->model->createtxn('mlmbv',$data);
                $success = $this->model->createtxn('mlmtotrep',$comdata);
            }

            if($tord[0]['xdoctype']=='LDC Order'){
                if($amount>=10000){
                    $comdata = array(
                        'bizid'=>100,
                        'xrdin' => $tord[0]['xcus'],
                        'distrisl' => 0,
                        'xdocnum'=>$invoice,
                        'xcomtype'=>'LDC Promotion',
                        'xcom'=>$amount*.04,
                        'xpaid'=>0,
                        'xdate'=>$date,
                        'stno'=>$tord[0]['stno'],
                        'xsrctaxpct'=>0
                    );
                    $success = $this->model->createtxn('mlmtotrep',$comdata);
                }
            }
            
        }


        $this->finalcallback($invoice, $status,$hostcallback);
    }

    function finalcallback($invoice, $status, $hostcallback){
        //Session::init();
        $this->view->status = $status;
        $this->view->invoice = $invoice;
        $this->view->callback = $hostcallback;
        $this->view->render("rawtemplate","payment/callback");
    }

    function sslfail(){
        $tran_id = $_POST['tran_id'];
        $tord = $this->model->gettemporder($tran_id);
        $hostcallback = $tord[0]['xcallback'];
        Logdebug::appendlog();
        $this->finalcallback('0', 'fail',$hostcallback);
    }
    
    function sslcancel(){
        $tran_id = $_POST['tran_id'];
        $tord = $this->model->gettemporder($tran_id);
        $hostcallback = $tord[0]['xcallback'];
        $this->finalcallback('0', 'fail',$hostcallback);
    }

    function sslipn(){
        
    }
    

}
?>