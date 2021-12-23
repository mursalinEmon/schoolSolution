<?php 
class Ablpay extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->script=$this->script();
        Session::init();
    }

    
    
    function initializepay($token){
        
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
        $cols = "insert into temporder (tempinvoice,xcustype,xcus,stno,xpaymethod,xdeladd,xpostal,xitemcode,xqty,xrate,xdp) values";
        $vals = "";
        foreach($data->itemdt as $key=>$value){
            $itemdt = $this->model->getitemdt($value->item);
            if(count($itemdt)==0){
                echo json_encode(array("result"=>"failed", "message"=>"Item not found!"));
                exit;
            }
            if(count($itemdt)>0){
                $amount += floatval($value->qty)*floatval($itemdt[0]['xmrp']);
                $vals .= "('".$invoice_no."','".$data->customertype."','".$data->customer."',$stno,'ABL Purchase Account','".$cusdt[0]['xadd1']."','".$cusdt[0]['xpostal']."','".$value->item."','".$value->qty."','".$itemdt[0]['xmrp']."','".$itemdt[0]['xdp']."'),";
            }
        }
        $vals = rtrim($vals,",");
        $result = $this->model->createtemp($cols.$vals);
        
        if($result==0){
            echo json_encode(array("result"=>"failed", "message"=>"Could not ceate invoice!"));
            exit;
        }
        $this->view->html = '<div class="panel-body">
                    <p>Provide your rin and PIN no correctly.<br>আপনি আপনার সঠিক রিন্ এবং পিন প্রদান করুন |</p>
                    <p><h2>Total Amount: '.$amount.'</h2><p>
                    <p>
                    <div class="input-group">
                        <input type="text" id="rin" class="form-control form-control-sm" placeholder="ABL RIN">                                                
                    </div>   
                    </p>
                    <p>Name: <span id="rinname"></span></p>
                    <p>
                    <div class="input-group">
                        <input type="password" id="pin" class="form-control form-control-sm" placeholder="ABL PIN">                                                
                    </div> 
                    <p id="sumresult">Enter Result: <span id="a"></span>+<span id="b"></span></p>
                    <div class="input-group mt-1">
                        <input type="text" id="mysum" class="form-control form-control-sm" placeholder="Result">                                                
                    </div>   
                    </p>
                    <button id="btnnext" class="btn btn-primary btn-gradient btn-shadow btn-pill btn-block blockui-page">Next</button>
                </div>';
        $this->view->render("rawtemplate","payment/ablpay_view");
    }

    function checkpin(){
        
        if(isset($_POST['rin']) && isset($_POST['pin'])){
        $data = $_POST;
        $rindt = $this->model->getrindt($data['rin'],$data['pin']);
        $mobile = "";
            if(count($rindt)){
                $mobile = $rindt[0]['mobile'];
                echo json_encode(array("result"=>"success","message"=>"<span class=\"text-success\">".$rindt[0]['rinname']."</span>"));
                exit;
            }else{
                echo json_encode(array("result"=>"error","message"=>"<span class=\"text-danger\">RIN/PIN did not match!</span>"));
                exit;
            }
            
        }else{
            echo json_encode(array("result"=>"error","message"=>""));
        }
    }

    function paymentcomplete($token){
        $this->sendotp();
        $data = $_POST;
        $this->sendotp();
        $this->view->html = '<div class="panel-body">
                    <p> 6 digit OTP sent to your mobile.<br>৬ সংখ্যার ও টি পি নম্বর আপনার মোবাইল নম্বরে প্রেরণ করা হয়েছে |</p>
                    
                    <p>
                    OTP নম্বর প্রদান করুন
                    <div class="input-group">
                        <input type="text" id="searchtext" class="form-control form-control-sm" placeholder="XXXXXX">                                                
                    </div>   
                    </p>
                    
                    <a class="btn btn-primary btn-gradient btn-shadow btn-pill btn-block blockui-page">Next</a>
                </div>';
        $this->view->render("rawtemplate","payment/ablpay_view");

    }

    function sendotp(){
        $token = Session::get("session_token");
        $otp = rand(100000,999999);
        $sendsms = new Sendsms();
        $sendsms->send_single_sms("আপনার ও টি পি নম্বর ".$otp."। এই ও টি পি নম্বরের স্থায়িত্ত ১০ মিনিট ।", '');
        Session::set($token."otp",$otp);
        echo(json_encode(array("result"=>"success","message"=>"")));
    }

    function script(){
        return "
        <script>
        $(document).ready(function() {
           
            $('#btnnext').attr('disabled', true);
            $('#sumresult').hide()
            var a = 0;
            var b = 0;
            var res = 0
            $('#pin').on('blur', function(){
                $('#sumresult').show()
                
                a = Math.floor((Math.random() * 10) + 1);
                b = Math.floor((Math.random() * 10) + 1);
                $('#a').html(a)
                $('#b').html(b)
                res = a+b;
                
                $.ajax({					
					url:\"".URL."ablpay/checkpin\", 
					type : \"POST\",                                  				
                    data : {rin:$('#rin').val(),pin:$('#pin').val()}, // post data || get data 
					beforeSend:function(){	
                        
					},
					success : function(result) {
                        //console.log(result)
                        
						const resultobj = JSON.parse(result)
						if(resultobj['result']=='success'){
                            $('#btnnext').attr('disabled', false);
                            
                            $('#rinname').html(resultobj['message']);
                            
                        }else{
                            $('#btnnext').attr('disabled', true);
                            $('#rinname').html(resultobj['message'])
                        }
						
					},error: function(xhr, resp, text) {
						//$('#btnnext').attr('disabled', true);
					}
				})
            })

            $('#btnnext').on('click', function(){
                if(res == $('#mysum').val())
                    alert('ok')
                else
                    alert('error')
                
            })
        })

        </script>
        ";

    }
    

}
?>