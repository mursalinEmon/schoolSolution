<?php 
class Ncheckout extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->script = $this->script();
    }
 
    function init(){
        $this->view->business = $this->model->getbusiness();
        $this->view->category = $this->model->getcategories();
        $this->view->maincategory = $this->model->getmaincategories();
        Session::init();
        $token = uniqid(); 
        Session::set('token', $token);       
        $this->view->token = $token;
        $user = Session::get("suser");
        $this->view->info = $this->model->getstudentinfo($user);
        
        $this->view->render("studentlogin","dotschoolview/checkoutnew_view");
    }

    
    function script(){
        return "
        <script>

        $(\"#sturegform\").validate({
            rules: {
                fullname: {
                    required:true, 
                    minlength:2,
                    maxlength:100
                },
                email:{
                    required:true, 
                    email:true
                },
                mobile:{
                    required:true, 
                    minlength:11,
                    maxlength:15
                },
                address:{
                    required:true,
                },
                password: {
                    required:true, 
                    minlength:6,
                    maxlength:15
                },
                confirmpassword: {
                    required:true, 
                    minlength:6,
                    equalTo: '#password'
                }

            },
            messages: {
                
                mobile:{
                    required: 'Required Field', 
                    minlength: 'Minimum of 11 characters',
                    maxlength: 'Maximum of 15 characters'
                },
                password:{
                    required: 'Required Field', 
                    minlength: 'Minimum of 6 characters',
                    maxlength: 'Maximum of 15 characters'
                },
                confirmpassword:{
                    required: 'Required Field', 
                    minlength: 'Minimum of 6 characters',
                    equalTo: 'Password & Confirm Password did not match'
                }
                
            },errorElement: 'em',
            errorPlacement: function ( error, element ) {                    
                error.addClass( 'input-group help-block text-danger' );
                if ( element.prop( 'type' ) === 'checkbox' ) {
                    error.insertAfter( element.parent( 'label' ) );
                } else {
                    error.insertAfter( element );
                }
            },

        })


        $('#checkout').on('click', function(){
            var valid = 0; 
            var carttotal = 0;
            var items = [];
            if(!$('#sturegform').valid()){
                return false;
             }     
            var cartlist = JSON.parse(sessionStorage.getItem('cartitem')); 
            if(cartlist.length==0){
                valid = 1;
                cartmessage(\"Empty Cart!\");  
            }           
            for(var i=0; i < cartlist.length; i++){
                items.push(cartlist[i]);
                carttotal+=parseInt(cartlist[i].amt);
            }
            
            if(valid==0){
            if(carttotal > 0){
            $.ajax({
                
                url:\"".PAYGATE_URL."paynow\", 
                type : \"POST\",                                  				
                data : {fullname:$('#fullname').val(),customertype:'dotademic',email:$('#email').val(),mobile:$('#mobile').val(),address:$('#address').val(),country:$('#country').val(),doctype:'New Student',city:$('#city').val(),password:$('#password').val(),callbackurl:\"".URL."\",customertype:\"Amarbazar\",apikey:$('#token').val(),itemdt:items}, 
                
                beforeSend:function(){	
                    loaderon();   
                    
                },
                success : function(result) {
                    loaderoff();

                    const resultobj = JSON.parse(result);
                    if(resultobj['result']=='success')
                        location.href=\"".PAYGATE_URL."paynow/paygateway/\"+resultobj['message'];
                    
                },error: function(xhr, resp, text) {
                    loaderoff();
                    
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
            if(cartlist.length==0){

                $('#checkout').prop('disabled', true);
            }
            for(var i=0; i < cartlist.length; i++){
                var gtotal = parseInt(cartlist[i].qty)*parseInt(cartlist[i].amt);
                $('#stotal').html('BDT '+gtotal);
                $('#total').html('BDT '+gtotal);
                var itm = cartlist[i].itemcode;
                $('#checkoutitems').append(
                    `
                    <ul class=\"shopping-list pt-4\">
                            <li class=\"d-flex align-items-center justify-content-between\">
                                <div class=\"shopping-img\">
                                <img src=\"".PRODUCT_IMAGE_LOCATION."`+cartlist[i].itemcode+`.jpg\" alt=\"product image\">
                                </div>
                                <div class=\"shopping-link\">
                                   `+cartlist[i].desc + ` by ` + cartlist[i].trainer+`
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


        var districts = ['Barishal','Bhola','Chattogram','Khagrachari','Brahmanbaria','Chandpur',
        'Comilla','Cox&apos;s Bazar','Feni','Lakshmipur','Noakhali','Rangamati', 'Dhaka', 'Faridpur',
        'Gazipur', 'Gopalganj','Kishoreganj','Madaripur','Manikganj', 'Munshiganj',
        'Narayangonj','Narsingdi','Rajbari','Shariatpur','Tangail', 'Bagerhat','Chuadanga',
        'Jashore','Jhenaidah','Khulna','Kushtia','Magura','Narail','Satkhira', 'Jamalpur',
        'Mymensingh', 'Netrakona', 'Sherpur','Bogura','Chapai Nawabganj', 'Joypurhat','Naogaon',
        'Natore','Pabna', 'Rajshahi','Sirajganj','Dinajpur','Gaibandha','Kurigram','Lalmonirhat',
        'Nilphamari','Panchagarh', 'Rangpur','Thakurgaon', 'Habiganj','Moulvibazar','Sunamganj',
        'Sylhet',
];

districts.sort(function (a, b) {
    if (b > a) {
        return -1;
    }
    if (a > b) {
        return 1;
    }
    return 0;
});


 $.each(districts,function(key,val){
     $('#city').append('<option>'+val.toUpperCase()+'</option>');			
})
        </script>
        ";
    }
}