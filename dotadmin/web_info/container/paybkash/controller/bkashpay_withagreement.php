<?php 
class Bkashpay extends Controller{
    private $bkashuser = "";
    private $bkashpass = "";
    private $appkey = "";
    private $appsecret = "";
    function __construct(){
        parent::__construct();
        $this->view->script="";
        Session::init();
        $this->bkashuser = "sandboxTokenizedUser02";
        $this->bkashpass = "sandboxTokenizedUser02@12345";
        $this->appkey = "4f6o0cjiki2rfm34kfdadl1eqq";
        $this->appsecret = "2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b";
    
    }

    function makepayment($token){
        
        $data = json_decode(Session::get($token));

        global $invoice_no;
        global $amount;
        $amount = 0;
        $invoice_no = uniqid();
        
        $cusdt = array();
        if($data->customertype=="Retailer"){
            $cusdt = $this->model->rindt($data->customer);
        }else{
            $cusdt = $this->model->cusdt($data->customer);
            $postal = "";
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
                $vals .= "('".$invoice_no."','".$data->customertype."','".$data->customer."','".$data->cusname."',$stno,'Bkash','".$cusdt[0]['xadd1']."','".$data->city."','".$data->district."','".$data->mobile."','".$cusdt[0]['xpostal']."','".$value->itemcode."','".$value->qty."','".$itemdt[0]['xstdprice']."','".$itemdt[0]['xdp']."','".$data->callbackurl."','".$data->doctype."','".$data->odcid."','".$data->company."','".$data->outlet."','".$data->doc."','".$data->refrin."'),";
            }
        }
        if($data->doctype=='LDC Order'){
            if($amount<10000){
                header('location: '. $data->callbackurl );
                exit;
            }
        }
        //Logdebug::appendlog($amount);
        $vals = rtrim($vals,",");
        $result = $this->model->createtemp($cols.$vals);
        Session::set('amount', $amount );
        Session::set('hostcallback', $data->callbackurl );
        if($result==0){
            echo json_encode(array("result"=>"failed", "message"=>"Could not ceate invoice!"));
            exit;
        }

        $this->paybkash($invoice_no);
        
    }


    function paybkash($invoice){
        //$curl = "https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant";
        $curl = "https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant";
        $request_data = array(
            'app_key'=>$this->appkey,
              'app_secret'=>$this->appsecret
            );  
    $url = curl_init($curl);
    $request_data_json=json_encode($request_data);
    $header = array(
            'Content-Type:application/json',
            'username:'.$this->bkashuser,
            'password:'.$this->bkashpass
            );              
    curl_setopt($url,CURLOPT_HTTPHEADER, $header);
    curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url,CURLOPT_POSTFIELDS, $request_data_json);
    curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    
    $resultdata = curl_exec($url);
    curl_close($url);
    $ResultArrayToken = json_decode($resultdata, true); 
    
    Logdebug::appendlog("Grant token");
    Logdebug::appendlog($curl);
    Logdebug::appendlog(print_r($request_data, true));
    Logdebug::appendlog(print_r($ResultArrayToken, true));
    $token = $ResultArrayToken['id_token']; //Logdebug::appendlog($token);
    //new call
    $mode = '0000';
    $payerReference=$invoice;
    $callbackURL=URL.'bkashpay/paycallback/';
    
    $createagreementbody=array(
          'payerReference'=>$payerReference,
          'callbackURL'=>$callbackURL,          
          'mode' => $mode
          
            );  
            // 'agreementID'=>'TokenizedMerchant029TC519315',
            // 'amount'=>'10890',
            // 'intent'=>'sale',
            // 'currency'=>'BDT'
            
    //$url=curl_init("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/create");
    $url=curl_init("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/create");
    
    $createagreementbodyx=json_encode($createagreementbody);
    $header=array(
                 'Content-Type:application/json',
                 'Accept:application/json',
              'authorization:'.$token,
              'x-app-key:'.$this->appkey);  
    
            curl_setopt($url,CURLOPT_HTTPHEADER, $header);
            curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url,CURLOPT_POSTFIELDS, $createagreementbodyx);
            curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

            Session::set('token', $token);
    
         $resultdata=curl_exec($url);  //Logdebug::appendlog($resultdata);       
            $obj = json_decode($resultdata);
            
            Logdebug::appendlog("Create Agreement");            
            Logdebug::appendlog("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/create");
            Logdebug::appendlog(print_r($createagreementbody, true));
            Logdebug::appendlog(print_r($obj, true));

            if(!array_key_exists('errorCode', $obj)){
                 header('Location:' .$obj->{'bkashURL'});
                
            } 
            curl_close($url);
        
    }

    function paycallback(){
        $Query_String = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1]);
        $paymentID = explode("=", $Query_String[0])[1];

        $status = explode("=", $Query_String[1])[1];

        Logdebug::appendlog(print_r($Query_String, true));

        if($status=='failure'){
            
            $this->finalcallback(0, 'Wrong OTP!', Session::get('hostcallback'));
            exit;
        }
        if($status=='cancel'){
            
            $this->finalcallback(0, 'Payment Canecled!', Session::get('hostcallback'));
            exit;
        }                
        
            $requestbody = array(
                'paymentID' => $paymentID
            );
                
            //$url=curl_init("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/execute");
            $url=curl_init("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/execute");
            $requestbodyJson = json_encode($requestbody);

            

            $header=array(
                'Content-Type:application/json',
                'authorization:'.Session::get('token'),
                'x-app-key:'.$this->appkey);

            curl_setopt($url,CURLOPT_HTTPHEADER, $header);
            curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url, CURLOPT_POSTFIELDS, $requestbodyJson);
            curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
            $resultdatax=curl_exec($url);
            $obj = json_decode($resultdatax);

            Logdebug::appendlog("Execute Agreement");            
            Logdebug::appendlog("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/execute");
            Logdebug::appendlog(print_r($requestbody, true));
            Logdebug::appendlog(print_r($obj, true));
            
            curl_close($url);
            //echo $resultdatax;
            // if($obj->{'statusCode'}!='0000'){
                
            //     $this->finalcallback('', $obj->{'statusMessage'}, Session::get('hostcallback'));
                
            //     exit;
            // }    
            $agreementID = $obj->{'agreementID'}; 
            
            $invoice = $obj->{'payerReference'}; 
            $auth = Session::get('token');
           $callbackURL=URL.'bkashpay/callback/';

           $amount = Session::get('amount');
           //Logdebug::appendlog($this->model->gettempamount($invoice)[0]['xamount'].'BDt');
            //Logdebug::appendlog($this->model->gettempamount($invoice)[0]['xamount']);
            $requestbody = array(
                'agreementID' => $agreementID,
                'mode' => '0001',
                'amount' => $amount,
                'currency' => 'BDT',
                'intent' => 'sale',
                'merchantInvoiceNumber' => $invoice,
                'callbackURL' => $callbackURL
            );

            $url = curl_init('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/create');
            
            $requestbodyJson = json_encode($requestbody);
            
            $header = array(
            'Content-Type:application/json',
            'Authorization:' . $auth,
            'X-APP-Key:'.$this->appkey
                );

            curl_setopt($url, CURLOPT_HTTPHEADER, $header);
            curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url, CURLOPT_POSTFIELDS, $requestbodyJson);
            curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            $resultdata = curl_exec($url);
            curl_close($url);
            $obj = json_decode($resultdata);
            Logdebug::appendlog($resultdata);  
            Logdebug::appendlog("Create API");            
            Logdebug::appendlog("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/create");
            Logdebug::appendlog(print_r($requestbody, true));
            Logdebug::appendlog(print_r($obj, true));
            //Logdebug::appendlog(print_r($obj, true));
            Session::set('agreementID',$obj->{'agreementID'});
            header("Location: " . $obj->{'bkashURL'});
    }

    function callback(){
        $Query_String = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1]);
        $paymentID = explode("=", $Query_String[0])[1];
        $status = explode("=", $Query_String[1])[1];

        Logdebug::appendlog(print_r($Query_String, true));
        $auth = Session::get('token');
        if($status=='failure'){
            
            $this->finalcallback(0, 'Worng PIN', Session::get('hostcallback'));
            exit;
        }        
        if($status=='cancel'){
            $request_body = array(
                'agreementID' => Session::get('agreementID')
                );
    
                $header = array(
                    'Content-Type:application/json',
                    'Authorization:' . $auth,
                    'X-APP-Key:'.$this->appkey
                );
    
                $url = curl_init('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/agreement/cancel');
                $request_body_json = json_encode($request_body);
                
                curl_setopt($url, CURLOPT_HTTPHEADER, $header);
                curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($url, CURLOPT_POSTFIELDS, $request_body_json);
                curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                $srcresultdata = curl_exec($url); 
                
                $srcobj = json_decode($srcresultdata);  
                curl_close($url);
                
                Logdebug::appendlog("Cancel Agreement");            
                Logdebug::appendlog('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/agreement/cancel');
                Logdebug::appendlog(print_r($request_body, true));
                Logdebug::appendlog(print_r($srcobj, true));
                    
            $this->finalcallback(0, 'Agreement Canecled!', Session::get('hostcallback'));
            exit;
        }      
        
        $hostcallback = Session::get('hostcallback');    
        $statuscode = "100000";
        // $request_body = array(
        //     'agreementID' => Session::get('agreementID')
        //     );

        
        $request_body = array(
            'paymentID' => $paymentID
            );

            $header = array(
                'Content-Type:application/json',
                'Authorization:' . $auth,
                'X-APP-Key:'.$this->appkey
            );

            $url = curl_init('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/execute');
            $request_body_json = json_encode($request_body);
                
                
                curl_setopt($url, CURLOPT_HTTPHEADER, $header);
                curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($url, CURLOPT_POSTFIELDS, $request_body_json);
                curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                $resultdata = curl_exec($url); 
                
                $obj = json_decode($resultdata);          
                curl_close($url);
                $statuscode = $obj->{'statusCode'};

                

            Logdebug::appendlog("Execute Payment");            
            Logdebug::appendlog("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/execute");
            Logdebug::appendlog(print_r($request_body, true));
            Logdebug::appendlog(print_r($obj, true));
            
            if($statuscode!='0000'){

                $this->finalcallback(0, $obj->{'statusMessage'}, Session::get('hostcallback'));
                exit;
            }
        
        $url = curl_init('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/payment/status');
        $request_body_json = json_encode($request_body);
            
            curl_setopt($url, CURLOPT_HTTPHEADER, $header);
            curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url, CURLOPT_POSTFIELDS, $request_body_json);
            curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            $resultdata = curl_exec($url); 
            
            $obj = json_decode($resultdata);          
            curl_close($url);
            
            Logdebug::appendlog("Payment Status API");            
            Logdebug::appendlog('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/payment/status');
            Logdebug::appendlog(print_r($request_body, true));
            Logdebug::appendlog(print_r($obj, true));
            //echo  $resultdata;

            $request_body = array(
                'trxID' => $obj->{'trxID'}
                );

            $url = curl_init('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/general/searchTransaction');
            $request_body_json = json_encode($request_body);
            
            curl_setopt($url, CURLOPT_HTTPHEADER, $header);
            curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url, CURLOPT_POSTFIELDS, $request_body_json);
            curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            $srcresultdata = curl_exec($url); 
            
            $srcobj = json_decode($srcresultdata);          
            curl_close($url);
            
            Logdebug::appendlog("Search Trunsaction API");            
            Logdebug::appendlog('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/general/searchTransaction');
            Logdebug::appendlog(print_r($request_body, true));
            Logdebug::appendlog(print_r($srcobj, true));

            //Logdebug::appendlog(print_r($obj, true));
            
            $invoice = $obj->{'payerReference'};
            $tord = $this->model->gettemporder($invoice);
            
            $date = date('Y-m-d');
            $year = date('Y',strtotime($date));
            $month = date('m',strtotime($date)); 
            
            
                $status="Success";
                $updatetemp = $this->model->updatetemp("update temporder set xstatus='".$status."' where tempinvoice='".$invoice."'");
                
                $cols = "bizid,zemail,xdate,xrdin,xdelname,stno,xstatus,xnote,xbranch,xpaymethod,xpostcode";
                $vals = "(100,'".$tord[0]['xcus']."','".date('Y-m-d')."','".$tord[0]['xcus']."','".$tord[0]['xdelname']."','".$tord[0]['stno']."','Confirmed','".$tord[0]['xdeladd']."','".$tord[0]['xcus']."','".$tord[0]['xpaymethod']."','".$tord[0]['xpostal']."')";
                $invoice = $this->model->createinvoice("imretail",$cols, $vals);
                $amount = 0;
                $totalbv = 0;
                if($invoice>0){
                    $cols = "bizid,xtxnnum,zemail,xdate,xrdin,xdelname,xtoparty,stno,xitemcode,xqty,xrate,xbv,xyear,xper,xstatus,xdeladd,xcity,xdistrict,xmobile,xpaymethod,xpostcode,xdocnum,xdoctype,xsign,xodcnum,xcompany,xoutlet,xdoc,xtrxnno";
                    $vals = "";
                    foreach($tord as $key=>$val){
                        $amount+=floatval($val['xqty'])*floatval($val['xrate']);
                        $totalbv+=floatval($val['xqty'])*floatval($val['xdp']);
                        $vals .= "(100,'".$invoice."','".$tord[0]['xcus']."','".$date."','".$val['xcus']."','".$val['xdelname']."','".$val['xrefrin']."','".$val['stno']."','".$val['xitemcode']."','".$val['xqty']."','".$val['xrate']."','".$val['xdp']."',".$year.",".$month.",'Confirmed','".$val['xdeladd']."','".$val['xcity']."','".$val['xdistrict']."','".$val['xmobile']."','".$val['xpaymethod']."','".$val['xpostal']."','".$val['tempinvoice']."','".$val['xdoctype']."', '1','".$val['xodcnum']."','".$val['xcompany']."','".$val['xoutlet']."','".$val['xdoc']."','".$obj->{'trxID'}."'),";
                    }
                    $vals = rtrim($vals,",");


                    
                    $invoicedt = $this->model->createinvoice("imretaildet",$cols, $vals);

                    if($tord[0]['xdoctype']=='Corporate Order'){
                        $data = array(
                            'bizid'=>100,
                            'xcus' => $tord[0]['xcus'],
                            'point' => $totalbv,
                            'xdocnum'=>$invoice,
                            'xdoctype'=>'Corporate Sale',
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

            
            
            $this->finalcallback($invoice, $status, $hostcallback);
    }

    function finalcallback($invoice, $status, $hostcallback){
        $this->view->status = $status;
        $this->view->invoice = $invoice;
        $this->view->callback = $hostcallback;
        $this->view->render("rawtemplate","payment/callback");
    }

    function refund($trxid){
        $curl = "https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant";
        $request_data = array(
            'app_key'=>$this->appkey,
              'app_secret'=>$this->appsecret
            );  
    $url = curl_init($curl);
    $request_data_json=json_encode($request_data);
    $header = array(
            'Content-Type:application/json',
            'username:'.$this->bkashuser,               
            'password:'.$this->bkashpass
            );              
    curl_setopt($url,CURLOPT_HTTPHEADER, $header);
    curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url,CURLOPT_POSTFIELDS, $request_data_json);
    curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    
    $resultdata = curl_exec($url);
    curl_close($url);
    $ResultArrayToken = json_decode($resultdata, true); 
    Logdebug::appendlog("Agreement Creation");
    Logdebug::appendlog("Grant token");
    Logdebug::appendlog($curl);
    Logdebug::appendlog(print_r($request_data, true));
    Logdebug::appendlog(print_r($ResultArrayToken, true));
    $token = $ResultArrayToken['id_token']; //Logdebug::appendlog($token);
    //new call
    $request_data = array(
        'paymentID'=>'TR0001N51605696435319',
        'amount'=>'60',
        'trxID'=>'7KI904E1LJ',
        'sku'=>'Not Applicable',
        'reason'=>'Custome Request'
        );  
        $request_body_json=json_encode($request_data);
        $header = array(
            'Content-Type:application/json',
            'Authorization:' . $token,
            'X-APP-Key:'.$this->appkey
        );

        $url = curl_init("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/payment/refund");

            curl_setopt($url, CURLOPT_HTTPHEADER, $header);
            curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url, CURLOPT_POSTFIELDS, $request_body_json);
            curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            $resultdata = curl_exec($url); 
            
            $obj = json_decode($resultdata);          
            curl_close($url);
            
            Logdebug::appendlog("Refund API");            
            Logdebug::appendlog('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/payment/refund');
            Logdebug::appendlog('Refund Request Data');
            Logdebug::appendlog(print_r($request_data, true));
            Logdebug::appendlog('Refund Response');
            Logdebug::appendlog(print_r($obj, true));

            $request_data = array(
                'paymentID'=>'TR0001N51605696435319',                
                'trxID'=>'7KI904E1LJ'                
                );  
                $request_body_json=json_encode($request_data);
                
        
                $url = curl_init("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/payment/refund");
        
                    curl_setopt($url, CURLOPT_HTTPHEADER, $header);
                    curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($url, CURLOPT_POSTFIELDS, $request_body_json);
                    curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                    $resultdata = curl_exec($url); 
                    
                    $obj = json_decode($resultdata);          
                    curl_close($url);
                    
                    Logdebug::appendlog("Refund StatusAPI");            
                    Logdebug::appendlog('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/payment/refund');
                    Logdebug::appendlog('Refund Request Data');
                    Logdebug::appendlog(print_r($request_data, true));
                    Logdebug::appendlog('Refund status Response');
                    Logdebug::appendlog(print_r($obj, true));

    }

    function refundstatus($trxid){
        $curl = "https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant";
        $request_data = array(
            'app_key'=>$this->appkey,
              'app_secret'=>$this->appsecret
            );  
    $url = curl_init($curl);
    $request_data_json=json_encode($request_data);
    $header = array(
            'Content-Type:application/json',
            'username:'.$this->bkashuser,               
            'password:'.$this->bkashpass
            );              
    curl_setopt($url,CURLOPT_HTTPHEADER, $header);
    curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url,CURLOPT_POSTFIELDS, $request_data_json);
    curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    
    $resultdata = curl_exec($url);
    curl_close($url);
    $ResultArrayToken = json_decode($resultdata, true); 
    Logdebug::appendlog("Agreement Creation");
    Logdebug::appendlog("Grant token");
    Logdebug::appendlog($curl);
    Logdebug::appendlog(print_r($request_data, true));
    Logdebug::appendlog(print_r($ResultArrayToken, true));
    $token = $ResultArrayToken['id_token']; //Logdebug::appendlog($token);
    //new call
    
            $request_data = array(
                'paymentID'=>'TR0001N51605696435319',                
                'trxID'=>'7KI904E1LJ'                
                );  
                $request_body_json=json_encode($request_data);
                
        
                $url = curl_init("https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/payment/refund");
        
                    curl_setopt($url, CURLOPT_HTTPHEADER, $header);
                    curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($url, CURLOPT_POSTFIELDS, $request_body_json);
                    curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                    $resultdata = curl_exec($url); 
                    
                    $obj = json_decode($resultdata);          
                    curl_close($url);
                    
                    Logdebug::appendlog("Refund StatusAPI");            
                    Logdebug::appendlog('https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/payment/refund');
                    Logdebug::appendlog('Refund Request Data');
                    Logdebug::appendlog(print_r($request_data, true));
                    Logdebug::appendlog('Refund status Response');
                    Logdebug::appendlog(print_r($obj, true));

    }

}
?>