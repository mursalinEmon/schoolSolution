<?php 
class Echeckout extends Controller{
    function __construct(){
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
			if(!$logged){
				
				header('location: '.URL.'logincheckout');
				exit;
			}
        $this->view->script = $this->script();
    }
 
    function init(){
        //$this->view->business = $this->model->getbusiness();
        //$this->view->category = $this->model->getcategories();
        //$this->view->maincategory = $this->model->getmaincategories();        
        $token = uniqid(); 
        Session::set('token', $token);       
        $this->view->token = $token;
        $user = Session::get("suser");
        $this->view->info = $this->model->getstudentinfo($user);
        $this->view->render("studentlogin","dotschoolview/checkoutexisting_view");
    }

    
    function script(){
        return "
        <script>
        $('#checkout').on('click', function(){
            var valid = 0; 
            var carttotal = 1;
            var items = [];

            
            
            var cartlist = JSON.parse(sessionStorage.getItem('cartitem'));     
            if(cartlist.length==0){
                valid = 1;
                cartmessage(\"Empty Cart!\");  
            }              
            for(var i=0; i < cartlist.length; i++){
                items.push(cartlist[i]);
            }
            
            if(valid==0){
            if(carttotal > 0){
                    $.ajax({
                        
                        url:\"".PAYGATE_URL."/paynow\", 
                        type : \"POST\",                                  				
                        data : {fullname:$('#fullname').html(),customertype:'dotademic',email:$('#email').html(),mobile:$('#mobile').html(),address:$('#address').html(),country:'Bangladesh',doctype:'Existing Student',txnid:$('#txnid').val(),city:$('#city').val(),operator:$('#operator').val(),txnid:$('#txnid').val(),txnno:$('#txnno').val(),callbackurl:\"".URL."\",customertype:\"ABCLIT\",apikey:$('#token').val(),itemdt:items}, 
                        
                        beforeSend:function(){	
                            // loaderon();   
                            
                        },
                        success : function(result) {
                            // loaderoff();
                            console.log(result)
                            const resultobj = JSON.parse(result);
                            if(resultobj['result']=='success'){
                                
                                location.href=\"".PAYGATE_URL."/paynow/paygateway/\"+resultobj['message'];
                            }
                            
                        },error: function(xhr, resp, text) {
                            // loaderoff();
                            
                        }
                    })
                    }else{
                        $('#cartdiv').removeClass('bg-info');
                        $('#cartdiv').addClass('bg-danger');    
                        $('#cartmessage').html('<strong>LDC Minimum order BDT 10000. !</strong>')
                    }
                }else{
                    $('#cartdiv').removeClass('bg-info');
                    $('#cartdiv').addClass('bg-danger');
                    $('#cartmessage').html('<strong>'+message+'</strong>')
                }
            })

        $(document).ready(function(){
            showitems() 
        })


        function showitems(){
            var cartlist = JSON.parse(sessionStorage.getItem('cartitem'));
            var gtotal = 0;
            for(var i=0; i < cartlist.length; i++){
                gtotal += parseInt(cartlist[i].qty)*parseInt(cartlist[i].amt);
                $('#stotal').html('BDT '+gtotal);
                $('#total').html('BDT '+gtotal);
                var itm = cartlist[i].itemcode;
                $('#checkoutitems').append(
                    `
                    <ul class=\"shopping-list pt-4\">
                            <li class=\"d-flex align-items-center justify-content-between\">
                                <div class=\"shopping-img\">
                                <img src=\"".URL."assets/images/courses/`+cartlist[i].itemcode+`.jpg\" alt=\"product image\">
                                </div>
                                <div class=\"shopping-link\" >
                                   `+cartlist[i].desc + `
                                </div>
                                <div class=\"shopping-qty\" style=\"margin-right:5rem;\">
                                   `+cartlist[i].qty + `
                                </div>
                                <div class=\"shopping-price\">
                                    <span>`+parseInt(cartlist[i].amt)*parseInt(cartlist[i].qty)+`</span>
                                    
                                </div>
                            </li>
                        </ul>
                    `
                    
                );
            }
        }

        $('#operator').on('change', function(){
            var operator = $('#operator').val();
            
            if(operator == 'bkash'){
                $('#pay-nagad').hide();
                $('#pay-bkash').show();
            }
            else if(operator == 'nagad'){
                $('#pay-bkash').hide();
                $('#pay-nagad').show();
            }
            
            $('#pay-input').show();
            $('#pay-input1').show();
        });


        </script>
        ";
    }
}