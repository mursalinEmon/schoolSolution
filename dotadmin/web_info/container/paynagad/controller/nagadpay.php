<?php 
class Nagadpay extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->script="";
        Session::init();
    }

    function paybynagad($token){
        
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
                $vals .= "('".$invoice_no."','".$data->customertype."','".$data->customer."','".$data->cusname."',$stno,'Bkash','".$data->add1."','".$data->city."','".$data->district."','".$data->mobile."','".$cusdt[0]['xpostal']."','".$value->itemcode."','".$value->qty."','".$itemdt[0]['xstdprice']."','".$itemdt[0]['xdp']."','".$data->callbackurl."','".$data->doctype."','".$data->odcid."','".$data->company."','".$data->outlet."','".$data->doc."','".$data->refrin."'),";
            }
        }

        if($data->doctype=='LDC Order'){
            if($amount<10000){
                header('location: '. $data->callbackurl );
                exit;
            }
        }
        $vals = rtrim($vals,",");
        $result = $this->model->createtemp($cols.$vals);
        
        if($result==0){
            echo json_encode(array("result"=>"failed", "message"=>"Could not ceate invoice!"));
            exit;
        }
        //$invoice_no = 'Inv'.Date('YmdH').rand(1000, 10000);
         $amount = '10';

        // echo $invoice_no;
        // echo $amount;
        // exit();

        $MerchantID = "686390008885732";
        $DateTime = Date('YmdHis');
        // $amount = "5000";
        // $acq_fees = "5000";
        // $amount_with_fee = $amount + $acq_fees;
        // $OrderId = 'SB'.strtotime("now").rand(1000, 10000);
        $random = $this->generateRandomString();    

        //$PostURL = "https://api.mynagad.com/api/dfs/check-out/initialize/" . $MerchantID . "/" . $invoice_no;
        $PostURL = "https://api.mynagad.com/api/dfs/check-out/initialize/" . $MerchantID . "/" . $invoice_no;
        // echo $PostURL;
        //echo "<br>";

        //$merchantCallbackURL = "https://portal.amarbazarltd.com/api/merchant-callback-website.php";

        $merchantCallbackURL = URL."nagadpay/callback";

        $SensitiveData = array(
            'merchantId' => $MerchantID,
            'datetime' => $DateTime,
            'orderId' => $invoice_no,
            'challenge' => $random
        );

        /*echo json_encode($SensitiveData);
        exit();
        */

        $PostData = array(
            'accountNumber' => '01639000888', //optional
            'dateTime' => $DateTime,
            'sensitiveData' => $this->EncryptDataWithPublicKey(json_encode($SensitiveData)),
            'signature' => $this->SignatureGenerate(json_encode($SensitiveData))
        );

 
        
        $Result_Data = $this->HttpPostMethod($PostURL, $PostData);
        //Logdebug::appendlog(print_r($Result_Data,true));
        if (isset($Result_Data['sensitiveData']) && isset($Result_Data['signature'])) {
            if ($Result_Data['sensitiveData'] != "" && $Result_Data['signature'] != "") {
        
                $PlainResponse = json_decode($this->DecryptDataWithPrivateKey($Result_Data['sensitiveData']), true);

            if (isset($PlainResponse['paymentReferenceId']) && isset($PlainResponse['challenge'])) {

                    $paymentReferenceId = $PlainResponse['paymentReferenceId'];
                    $randomserver = $PlainResponse['challenge'];

                    $SensitiveDataOrder = array(
                        'merchantId' => $MerchantID,
                        'orderId' => $invoice_no,
                        'currencyCode' => '050',
                        'amount' => $amount,
                        'challenge' => $randomserver
                    );


                    $PostDataOrder = array(
                        'sensitiveData' => $this->EncryptDataWithPublicKey(json_encode($SensitiveDataOrder)),
                        'signature' => $this->SignatureGenerate(json_encode($SensitiveDataOrder)),
                        'merchantCallbackURL' => $merchantCallbackURL
                        // 'additionalMerchantInfo' => json_decode($merchantAdditionalInfo)
                    );

                    $OrderSubmitUrl = "https://api.mynagad.com/api/dfs/check-out/complete/" . $paymentReferenceId;
                    $Result_Data_Order = $this->HttpPostMethod($OrderSubmitUrl, $PostDataOrder);
                        if ($Result_Data_Order['status'] == "Success") {
                            $url = json_encode($Result_Data_Order['callBackUrl']);   
                            echo "<script>window.open($url, '_self')</script>";                      
                        }
                        else {
                            echo json_encode($Result_Data_Order);
                        }
                } else {
                    echo json_encode($PlainResponse);
                }
            }
        }
    }


    function callback(){

        $Query_String = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1]);
        $payment_ref_id = substr($Query_String[2], 15);
        $url = "https://api.mynagad.com/api/dfs/verify/payment/" . $payment_ref_id;
        $json = $this->httpGet($url);
        $arr = json_decode($json, true);
        $tord = $this->model->gettemporder($arr['orderId']);
        $date = date('Y-m-d');
        $year = date('Y',strtotime($date));
        $month = date('m',strtotime($date)); 
        $invoice=0;
        $hostcallback = "";
        //Logdebug::appendlog(serialize($arr));
        if($arr['status']=="Success"){
            $updatetemp = $this->model->updatetemp("update temporder set xstatus='".$arr['status']."' where tempinvoice='".$arr['orderId']."'");
            
            $cols = "bizid,zemail,xdate,xrdin,xdelname,stno,xstatus,xnote,xbranch,xpaymethod,xpostcode";
            $vals = "(100,'".$tord[0]['xcus']."','".date('Y-m-d')."','".$tord[0]['xcus']."','".$tord[0]['xdelname']."','".$tord[0]['stno']."','Confirmed','".$tord[0]['xdeladd']."','".$tord[0]['xcus']."','".$tord[0]['xpaymethod']."','".$tord[0]['xpostal']."')";
            $invoice = $this->model->createinvoice("imretail",$cols, $vals);
            $hostcallback = $tord[0]['xcallback'];
            $amount = 0;
            $totalbv = 0;
            if($invoice>0){
                $cols = "bizid,xtxnnum,zemail,xdate,xrdin,xdelname,xtoparty,stno,xitemcode,xqty,xrate,xbv,xyear,xper,xstatus,xdeladd,xcity,xdistrict,xmobile,xpaymethod,xpostcode,xdocnum,xdoctype,xsign,xodcnum,xcompany,xoutlet,xdoc";
                $vals = "";
                foreach($tord as $key=>$val){
                    $amount+=floatval($tord[0]['xqty'])*floatval($tord[0]['xrate']);
                    $totalbv+=floatval($val['xqty'])*floatval($val['xdp']);
                    $vals .= "(100,'".$invoice."','".$tord[0]['xcus']."','".$date."','".$val['xcus']."','".$val['xdelname']."','".$val['xrefrin']."','".$val['stno']."','".$val['xitemcode']."','".$val['xqty']."','".$val['xrate']."','".$val['xdp']."',".$year.",".$month.",'Confirmed','".$val['xdeladd']."','".$val['xcity']."','".$val['xdistrict']."','".$val['xmobile']."','".$val['xpaymethod']."','".$val['xpostal']."','".$val['tempinvoice']."','".$val['xdoctype']."', '1','".$val['xodcnum']."','".$val['xcompany']."','".$val['xoutlet']."','".$val['xdoc']."'),";
                }
                $vals = rtrim($vals,",");
                //Logdebug::appendlog($vals);
                $invoicedt = $this->model->createinvoice("imretaildet",$cols, $vals);
            }

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
                'zemail'=>Session::get('suser')
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
                'xsrctaxpct'=>0
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
        
        $this->finalcallback($invoice, $arr['status'], $hostcallback);
        
    }

    function finalcallback($invoice, $status, $hostcallback){
        $this->view->status = $status;
        $this->view->invoice = $invoice;
        $this->view->callback = $hostcallback;
        $this->view->render("rawtemplate","payment/callback");
    }


    function httpGet($url)
        {
            $ch = curl_init();
            $timeout = 10;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/0 (Windows; U; Windows NT 0; zh-CN; rv:3)");
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $file_contents = curl_exec($ch);
            echo curl_error($ch);
            curl_close($ch);
            return $file_contents;
        }

    
        function generateRandomString($length = 40)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function EncryptDataWithPublicKey($data)
{
    $pgPublicKey = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAiCWvxDZZesS1g1lQfilVt8l3X5aMbXg5WOCYdG7q5C+Qevw0upm3tyYiKIwzXbqexnPNTHwRU7Ul7t8jP6nNVS/jLm35WFy6G9qRyXqMc1dHlwjpYwRNovLc12iTn1C5lCqIfiT+B/O/py1eIwNXgqQf39GDMJ3SesonowWioMJNXm3o80wscLMwjeezYGsyHcrnyYI2LnwfIMTSVN4T92Yy77SmE8xPydcdkgUaFxhK16qCGXMV3mF/VFx67LpZm8Sw3v135hxYX8wG1tCBKlL4psJF4+9vSy4W+8R5ieeqhrvRH+2MKLiKbDnewzKonFLbn2aKNrJefXYY7klaawIDAQAB";
    $public_key = "-----BEGIN PUBLIC KEY-----\n" . $pgPublicKey . "\n-----END PUBLIC KEY-----";
    // echo $public_key; 
    // exit();
    $key_resource = openssl_get_publickey($public_key);
    openssl_public_encrypt($data, $crypttext, $key_resource);
    return base64_encode($crypttext);
}

function SignatureGenerate($data)
{
    $merchantPrivateKey = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCadYA/Ob4dKUDPJFU3NWHrxq9rD0IkI1p6pjcxhc9aHdVm2w8Tm8nHYgA6FFYhfoswxRjd71dljOwWTx9RUzhY+n0hiBdLPNUDpcWVr2KMZvxiVJS83rNEcYb39KR9es9ZqisidxagpGqlsXTe12KuVZzxvW2tSFuqg8fNxlqjXNNM90OWCiwmkDHJLICO0oa3WT2F8IgHEVcI9mkZ+eJf3CE/Ueb73S0VSZnC3GS6BaWQgk/mYsXL6g4RHn9XosFe7yiH8AJz/HldYjak7JT/bkFXp+/IolxY9I4TOOmuo8w49rA4wArEytxrxVe/gZ/qkYp8jp1mXUmXmc3Lz69hAgMBAAECggEAY6RFdYQklt9UBc0khBcV8mocI+6V9oYwCktL89CksTfpwQ60LSwlAVDBYLZZ0gW2eWHM5u9N7B769nFYfLg48320V3tZu5mkuVOpoSShaH3PdwelZCoub4rlTPQvYRtmxCs45GT63erzOay+/jroWBq2wmQ3ar/xEpEsxhydwCBTH72cDiW/cLRGN1FaWeeR1Ay1RfRhRXhC77xBbt9wV4jh2z5iJUG+ipdoDTICmNDdfYi1ktUdsm7vzNwhJgSfpfc7g8DcC7IMjRLwffTUye8ONXoMN2v46F2JMruv0hAwlz+DldHfSx2U9KKXWC34vHBw3TkcjF4BIOTCoEPS+QKBgQDN7sXRqcVZ0R2ubHe3OGgxnpvREzm4f/3W9m3xigUC+fiCMoB9jCRc+Mq09AIujq84dHEKdst/5ZKzQjnbMmBADto9OSFZ2PWznQ+6aGVbzwJh93m7UKtIX2GyX+sgit8YRaxzwvuuQeda1SYXTRleNFuYFTK91/K1JMmVKED6uwKBgQDAAwKXZ+RjwHGWUTdTWepswzOWjTnGvIiwejPI3TopGHLH8iM1aaSpn2iVKrule3mOb1AFK1Ik5uHiGxqRgcKAR6XJMv/sstKZh5m+upB7t/YDm0b8CanJuXiX9CMbB/y7wLd3WCw2dGZCyG8/H0lCxmUlH7Cu5nR6IJjbFJrCkwKBgQCnbxzN1HAOD9VHLQ/FG4qz1VaxDiWfGgmkTqajfWmHuwBPs4n/CgPCx9HggIiJnB9hEmOac24P5fN55j2uN+5EBw9wOdQg/iL/T5MrJ5hJpi00xAbowrUQ2eRQKGa/BcpQLM4DLSR+0TyvAKDAz0Hx8zYJmCqyajL/DxMLQDhc4wKBgHBQknB7/fV3eTnDMgiYfO630/JJk7UzTQVlxerFtSKawXFBquSwcfgiXat7fp3StwzhAb60U21wfEqlLgpVC6+7uTcSlO8gvt29muoc+SzVM5tydbgx8tYjnm3MCcjjCCvPE8JEmkAUIEkKM0CKDXF42Ws4uUHlXdaeQKtNxyTvAoGAdEITOVWoliqn1FVUfsL3bUW6XKqdUHT7r0Fwdqd5Ex702T7BlftlgpbOYjxDJpxLDAVhZb/ZDd8lzj6tpnkn71LZjk7a4TvRpTupT2G+6eNWz13/dco7RboFVzHjG+1q+FcXXI1hbFimhRdMmdeIxwaZVRxu+stui+Q50iKcHjk=";
    $private_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $merchantPrivateKey . "\n-----END RSA PRIVATE KEY-----";
    // echo $private_key; 
    // exit();
    openssl_sign($data, $signature, $private_key, OPENSSL_ALGO_SHA256);
    return base64_encode($signature);
}

function HttpPostMethod($PostURL, $PostData)
{
    $url = curl_init($PostURL);
    $posttoken = json_encode($PostData);
    $header = array(
        'Content-Type:application/json',
        'X-KM-Api-Version:v-0.2.0',
        'X-KM-IP-V4:' . $this->get_client_ip(),
        'X-KM-Client-Type:PC_WEB'
    );
    
    curl_setopt($url, CURLOPT_HTTPHEADER, $header);
    curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url, CURLOPT_POSTFIELDS, $posttoken);
    curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($url, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($url, CURLOPT_SSL_VERIFYPEER, 0);
    
    $resultdata = curl_exec($url);
    $ResultArray = json_decode($resultdata, true);
    curl_close($url);
    return $ResultArray;

}

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function DecryptDataWithPrivateKey($crypttext)
{
    $merchantPrivateKey = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCadYA/Ob4dKUDPJFU3NWHrxq9rD0IkI1p6pjcxhc9aHdVm2w8Tm8nHYgA6FFYhfoswxRjd71dljOwWTx9RUzhY+n0hiBdLPNUDpcWVr2KMZvxiVJS83rNEcYb39KR9es9ZqisidxagpGqlsXTe12KuVZzxvW2tSFuqg8fNxlqjXNNM90OWCiwmkDHJLICO0oa3WT2F8IgHEVcI9mkZ+eJf3CE/Ueb73S0VSZnC3GS6BaWQgk/mYsXL6g4RHn9XosFe7yiH8AJz/HldYjak7JT/bkFXp+/IolxY9I4TOOmuo8w49rA4wArEytxrxVe/gZ/qkYp8jp1mXUmXmc3Lz69hAgMBAAECggEAY6RFdYQklt9UBc0khBcV8mocI+6V9oYwCktL89CksTfpwQ60LSwlAVDBYLZZ0gW2eWHM5u9N7B769nFYfLg48320V3tZu5mkuVOpoSShaH3PdwelZCoub4rlTPQvYRtmxCs45GT63erzOay+/jroWBq2wmQ3ar/xEpEsxhydwCBTH72cDiW/cLRGN1FaWeeR1Ay1RfRhRXhC77xBbt9wV4jh2z5iJUG+ipdoDTICmNDdfYi1ktUdsm7vzNwhJgSfpfc7g8DcC7IMjRLwffTUye8ONXoMN2v46F2JMruv0hAwlz+DldHfSx2U9KKXWC34vHBw3TkcjF4BIOTCoEPS+QKBgQDN7sXRqcVZ0R2ubHe3OGgxnpvREzm4f/3W9m3xigUC+fiCMoB9jCRc+Mq09AIujq84dHEKdst/5ZKzQjnbMmBADto9OSFZ2PWznQ+6aGVbzwJh93m7UKtIX2GyX+sgit8YRaxzwvuuQeda1SYXTRleNFuYFTK91/K1JMmVKED6uwKBgQDAAwKXZ+RjwHGWUTdTWepswzOWjTnGvIiwejPI3TopGHLH8iM1aaSpn2iVKrule3mOb1AFK1Ik5uHiGxqRgcKAR6XJMv/sstKZh5m+upB7t/YDm0b8CanJuXiX9CMbB/y7wLd3WCw2dGZCyG8/H0lCxmUlH7Cu5nR6IJjbFJrCkwKBgQCnbxzN1HAOD9VHLQ/FG4qz1VaxDiWfGgmkTqajfWmHuwBPs4n/CgPCx9HggIiJnB9hEmOac24P5fN55j2uN+5EBw9wOdQg/iL/T5MrJ5hJpi00xAbowrUQ2eRQKGa/BcpQLM4DLSR+0TyvAKDAz0Hx8zYJmCqyajL/DxMLQDhc4wKBgHBQknB7/fV3eTnDMgiYfO630/JJk7UzTQVlxerFtSKawXFBquSwcfgiXat7fp3StwzhAb60U21wfEqlLgpVC6+7uTcSlO8gvt29muoc+SzVM5tydbgx8tYjnm3MCcjjCCvPE8JEmkAUIEkKM0CKDXF42Ws4uUHlXdaeQKtNxyTvAoGAdEITOVWoliqn1FVUfsL3bUW6XKqdUHT7r0Fwdqd5Ex702T7BlftlgpbOYjxDJpxLDAVhZb/ZDd8lzj6tpnkn71LZjk7a4TvRpTupT2G+6eNWz13/dco7RboFVzHjG+1q+FcXXI1hbFimhRdMmdeIxwaZVRxu+stui+Q50iKcHjk=";
    $private_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $merchantPrivateKey . "\n-----END RSA PRIVATE KEY-----";
    openssl_private_decrypt(base64_decode($crypttext), $plain_text, $private_key);
    return $plain_text;
}


}
?>