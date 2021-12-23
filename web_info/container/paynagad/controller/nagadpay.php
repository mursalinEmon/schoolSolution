<?php 
class Nagadpay extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->script="";
        Session::init();
    }

    function paybynagad($token){
        // $data = Session::get($token);
        $data = json_decode(Session::get($token), true);

                // Logdebug::appendlog(print_r($data, true));

        // $item = $data->itemdt;
        // Logdebug::appendlog($item);
        global $invoice_no;
        global $amount;
        $amount = 0;
        $invoice_no = uniqid();
        $numitems = 1;
        $date = date('Y-m-d');
       
        $cols = "insert into temp_sales (xtemptxn,xdate,xpassword,xcustomertype,xcourse,xrate,xqty,xpoint,xpaymethod,xcountry,xdistrict,xthana,xmobile,xname,xemail,xaddress,xcupon,xdoctype,xdisc,xstatus) values";
        $vals = "";
        foreach($data["itemdt"] as $key=>$value){
            // Logdebug::appendlog($data->itemdt);
                // Logdebug::appendlog(print_r($value, true));

            $itemdt = $this->model->getcoursedt($value["itemcode"]);
            // $itemdt = $itm[0];
            // Logdebug::appendlog(print_r($_SESSION, false));

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
            echo json_encode(array("result"=>"failed", "message"=>"Not a valid amount! amount is ".$amount));
            exit;
        }
        
         $result = $this->model->createtemp($cols.$vals);
            // Logdebug::appendlog(print_r($result, true));
        if($result==0){  
            // echo $cols.$vals;          
            echo json_encode(array("result"=>"failed", "message"=>"Could not ceate invoice!"));
            exit;
        }
        
        $MerchantID = "687129232705734";
        $DateTime = Date('YmdHis');
        // $amount = "5000";
        // $acq_fees = "5000";
        // $amount_with_fee = $amount + $acq_fees;
        // $OrderId = 'SB'.strtotime("now").rand(1000, 10000);
        $random = $this->generateRandomString();    

        // $PostURL = "https://api.mynagad.com/api/dfs/check-out/initialize/" . $MerchantID . "/" . $invoice_no;
        $PostURL = "https://api.mynagad.com/api/dfs/check-out/initialize/" . $MerchantID . "/" . $invoice_no;
        // echo $PostURL;
        //echo "<br>";

        // $merchantCallbackURL = "https://portal.amarbazarltd.com/api/merchant-callback-website.php";

        $merchantCallbackURL = URL."nagadpay/callback";
//https://dotademy.com/nagadpay/callback
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
            'accountNumber' => '01712923270', //optional
            'dateTime' => $DateTime,
            'sensitiveData' => $this->EncryptDataWithPublicKey(json_encode($SensitiveData)),
            'signature' => $this->SignatureGenerate(json_encode($SensitiveData))
        );

 
        
        $Result_Data = $this->HttpPostMethod($PostURL, $PostData);
        //print_r($Result_Data);
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
        $hostcallback = URL;
        
        //Logdebug::appendlog(serialize($arr));
        if($arr['status']=="Success"){
            $tran_id = $arr['orderId'];

            if($tord[0]['xstatus']=='Success'){
                $this->finalcallback("", 'Failed',URL);
                exit;
            }
            
            $isordered = $this->model->isordered($tran_id);
            if(count($isordered)>0){
                $this->finalcallback("", 'Failed',URL);
                exit;
            }

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
                if($totalbv>0){
                    $this->httppost($data);
                }

            }            

        }
        
        
        $this->finalcallback($invoice, $arr['status'], $hostcallback);
        
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
        $this->view->status = $status;
        $this->view->invoice = $invoice;
        $this->view->callback = $hostcallback;
        $this->view->render("notemplate","payment/callback");
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
    $merchantPrivateKey = "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCGaHR3Zg3D98Tc9La5zn2lUkTzKqP1AKrN9DNET5yINJkzAddvZWg6ZU9rfGmWaUrJH2aYoISzfdbaNS6R+EnmLw8FP+Chdkfv1+QkxLEDIPD9OKz46vOpgsVGrm62SwoLl/66QH50auwZLSONsg+KuEf4e/7+2bROd25bsYOs1WM3pCKI/SIzLycLsEixqK6xSR7udclBcbftzoLR56IKN4PYsxiYxw+SE4g3IBhhVzNAmRwBKECyioCvpQWsl765IEZlkYPGPfNapBh8uUARFYs4cMxnLZoQbdCOWCl60auhcJfuwGUQZIqb+BFZWtHt7O5WKRin0rSHMacEyM6JAgMBAAECggEAZkTQaZEjZDsAdcdVyadOfx5MDGIjguZREIiBAbc5uYGcF+2MyNv2JIi1l2mAxcuz9biIzhVFI3XapwnUN4keYaDo4uuptfFT5zD0DO4EagcElwgqxPOxFwfDp3ZOEzKhoBS0427zSQ2aO8XWyZf0r25shKuEaNGpmhLRy78UG8rexXrqj1RRfdahA05wguNkCl8zZhoRi4wTqcRpTViaw0SYwHJVmkeUHtN3vBZNTgIrbxGpialG12eu7Ma7bepktb7P42T3a8Iho5tCDy7Y+PdRi9yBisqaUa0zerqZwPzHUDQO6lQYBW1fglgqrz4IB0e5PDhvBbwXdx+eSssTKQKBgQDHLxLvyH9HY88uT4Fc6aJI5noTLy1YZUNsR6BV9dp495AETAt0oF9K0Ip83jAVn0aX7dzXZMKjjNxDcBGgiVHMzZ1swVcuDW9vMMotinL9ncgnQ8XP8lrleS3Wr31b13EsLMnWcJGVgRKoDFR9u+ruFkrYeQ+7sPKQ1j7In3Af0wKBgQCsv0d8z20lL+jSrxrznnEqLiQAIMFXuif+zC4ZDgYdyh4ZJWjNlNhulsNR4zXC2fhot+/MLSosMNQVaHPXiP6SgNLlyXQYgNSbpYoW635EoMkxi+M8E9XaE3qjgsPSdK1zjPKTYSbCXljPjq+NtDTtakkNmT4lMLovPGWE0eh6swKBgAsX4hQctIoDUwyfPPMxx+oLfA0JeZsMuL6VFqby9GH8V7cFjTXHoMcH6k6eCUuK/WGEy+HrKLP3KmVPHow0WavwX64o7nQQJ36n1vrGVTUuznDxY1j7hHh3UUg9qdutmg39yJf62QDcmW9mkGYYSzNLZou74lZvunK6m/CMgLAlAoGBAKjUjRaTV1W33DFEx+9/U5Ro4fBqEuwdWQdyID+GcD3fEsl6wVHi/iAfIqe+iwVzqI8X7bo8DfKAilad7lGhZ0RhuTyxRdDI4IF6KVq7L339MoVE9YH61M+8p+h0XdQrCnZbM50Mnyfps5yvFC5HCE9cyCcNNSp91AlkWseTq0V3AoGBAL+oxeDE+0SxxUYxcgPl7QhnH/RX5Vb0oJ9QROQJUt1EC3y24xxvI1eCzKNL5JN/eZZ/4mZBmljLbe84ZMIfO/ebJxyi4UIF9NIiBO1HFiiH/G8mLZxF/mYlQzTVCAxzKpA6slWa7SOo8smBB0GDBcAtUNwafoI/7JJTjdmqE7Bu";
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
    $merchantPrivateKey = "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCGaHR3Zg3D98Tc9La5zn2lUkTzKqP1AKrN9DNET5yINJkzAddvZWg6ZU9rfGmWaUrJH2aYoISzfdbaNS6R+EnmLw8FP+Chdkfv1+QkxLEDIPD9OKz46vOpgsVGrm62SwoLl/66QH50auwZLSONsg+KuEf4e/7+2bROd25bsYOs1WM3pCKI/SIzLycLsEixqK6xSR7udclBcbftzoLR56IKN4PYsxiYxw+SE4g3IBhhVzNAmRwBKECyioCvpQWsl765IEZlkYPGPfNapBh8uUARFYs4cMxnLZoQbdCOWCl60auhcJfuwGUQZIqb+BFZWtHt7O5WKRin0rSHMacEyM6JAgMBAAECggEAZkTQaZEjZDsAdcdVyadOfx5MDGIjguZREIiBAbc5uYGcF+2MyNv2JIi1l2mAxcuz9biIzhVFI3XapwnUN4keYaDo4uuptfFT5zD0DO4EagcElwgqxPOxFwfDp3ZOEzKhoBS0427zSQ2aO8XWyZf0r25shKuEaNGpmhLRy78UG8rexXrqj1RRfdahA05wguNkCl8zZhoRi4wTqcRpTViaw0SYwHJVmkeUHtN3vBZNTgIrbxGpialG12eu7Ma7bepktb7P42T3a8Iho5tCDy7Y+PdRi9yBisqaUa0zerqZwPzHUDQO6lQYBW1fglgqrz4IB0e5PDhvBbwXdx+eSssTKQKBgQDHLxLvyH9HY88uT4Fc6aJI5noTLy1YZUNsR6BV9dp495AETAt0oF9K0Ip83jAVn0aX7dzXZMKjjNxDcBGgiVHMzZ1swVcuDW9vMMotinL9ncgnQ8XP8lrleS3Wr31b13EsLMnWcJGVgRKoDFR9u+ruFkrYeQ+7sPKQ1j7In3Af0wKBgQCsv0d8z20lL+jSrxrznnEqLiQAIMFXuif+zC4ZDgYdyh4ZJWjNlNhulsNR4zXC2fhot+/MLSosMNQVaHPXiP6SgNLlyXQYgNSbpYoW635EoMkxi+M8E9XaE3qjgsPSdK1zjPKTYSbCXljPjq+NtDTtakkNmT4lMLovPGWE0eh6swKBgAsX4hQctIoDUwyfPPMxx+oLfA0JeZsMuL6VFqby9GH8V7cFjTXHoMcH6k6eCUuK/WGEy+HrKLP3KmVPHow0WavwX64o7nQQJ36n1vrGVTUuznDxY1j7hHh3UUg9qdutmg39yJf62QDcmW9mkGYYSzNLZou74lZvunK6m/CMgLAlAoGBAKjUjRaTV1W33DFEx+9/U5Ro4fBqEuwdWQdyID+GcD3fEsl6wVHi/iAfIqe+iwVzqI8X7bo8DfKAilad7lGhZ0RhuTyxRdDI4IF6KVq7L339MoVE9YH61M+8p+h0XdQrCnZbM50Mnyfps5yvFC5HCE9cyCcNNSp91AlkWseTq0V3AoGBAL+oxeDE+0SxxUYxcgPl7QhnH/RX5Vb0oJ9QROQJUt1EC3y24xxvI1eCzKNL5JN/eZZ/4mZBmljLbe84ZMIfO/ebJxyi4UIF9NIiBO1HFiiH/G8mLZxF/mYlQzTVCAxzKpA6slWa7SOo8smBB0GDBcAtUNwafoI/7JJTjdmqE7Bu";
    $private_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $merchantPrivateKey . "\n-----END RSA PRIVATE KEY-----";
    openssl_private_decrypt(base64_decode($crypttext), $plain_text, $private_key);
    return $plain_text;
}


}
?>