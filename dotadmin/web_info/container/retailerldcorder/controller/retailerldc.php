<?php
class Retailerldc extends Controller{
    function __construct(){
        parent::__construct();
        
        $this->intializeform();
        Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }
        $this->view->script=$this->script();
    }

    function init(){
        Session::set('ordertoken',uniqid());
        $this->view->token=Session::get('ordertoken'); 
        
        $this->view->render("templateadmin","abr/retailerldc_view");
    }

    function loadinvoicedata(){
        $invno = Session::get('sdistrisl')."-".$this->model->getinvoiceno()[0]['xinvno'];
        
        echo json_encode($this->model->getinvoicedetail($invno)); 
    }

    function intializeform(){
        $this->formfield = array(      	
            "itemcode"=>array("ctrlfield"=>"xitemcode"),						
            "cus"=>array("ctrlfield"=>"xparty"),
            "qty"=>array("ctrlfield"=>"xqty")
		);
    }

    function searchcustomer(){
        $text = $_POST['searchtext'];
        $col = $_POST['searchtype'];
        $token = $_POST['token'];
        try{
            if(Session::get('ordertoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
            
            if(strlen($text)<4){
                throw new Exception(serialize(array('field'=>'Search By', 'response'=>' minimum 4 characters!')));
            }
            if($col=='by CIN')
                $col = 'xcus';
            if($col=='by Mobile')
                $col = 'xmobile';
            if($col=='by Name')
                $col = 'xorg';

            echo json_encode(array('message'=>$this->model->customersearch($col, $text),'result'=>'success'));
        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }

    function searchtxn(){
        $text = $_POST['searchtext'];
        $col = $_POST['searchtype'];
        $token = $_POST['token'];
        $isdaterange = $_POST['daterange'];
        $ftdate = $_POST['ftdate'];
        $daterange = explode('-',$ftdate);
        $startdate = str_replace(' ','',$daterange[2]."-".$daterange[1]."-".$daterange[0]);
        $enddate = str_replace(' ','',$daterange[5]."-".$daterange[4]."-".$daterange[3]);
        try{
            if(Session::get('ordertoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
            if($col!=""){
                if(strlen($text)<4){
                    throw new Exception(serialize(array('field'=>'Search By', 'response'=>' minimum 4 characters!')));
                }
            }else{
                $text = "";
            }

            if($col=='by Customer Name')
                $col = 'm.xdelname';            
            if($col=='by Customer Mobile')
                $col = 'c.xmobile';
            if($col=='by Invoice')
                $col = 'm.imretailsl';

                $where = "";
            
                if($text!="" && !$isdaterange)
                    $where = " m.xrdin = c.xrdin and ".$col." like '%".$text."%' and m.zemail = '".Session::get('suser')."'";
            
                if($text=="" && $isdaterange)
                    $where = " m.xrdin = c.xrdin and m.xdate between '".$startdate."' and '".$enddate."' and m.zemail = '".Session::get('suser')."'";

                
                if($text!="" && $isdaterange)
                    $where = " m.xrdin = c.xrdin and m.xdate between '".$startdate."' and '".$enddate."' and ".$col." like '%".$text."%' and m.zemail = '".Session::get('suser')."'";

            
            
            echo json_encode(array('message'=>$this->model->txnsearch($where),'result'=>'success'));
        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }

    function showcustomer(){
        $cus = $_POST['searchtext'];
        
        $token = $_POST['token'];

        $invsl = $this->model->getinvoiceno()[0]['xinvno'];
        
        $invno = Session::get('sdistrisl')."-".$invsl;
        try{
            if(Session::get('ordertoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
            $cusdt = $this->model->getcustomer($cus);
            if(count($cusdt)==0){
                throw new Exception(serialize(array('field'=>'Customer', 'response'=>' not found!')));
            }

            $invoicedt = $this->model->getinvoicedetail($invno);
            $flag=0;
            if(count($invoicedt['header'])==0){                
                $flag=0;
            }else{

                if($invoicedt['header'][0]['status']=='Confirmed'){
                    throw new Exception(serialize(array('field'=>'Invoice status already', 'response'=>' confirmed! can not be Confirmed!')));
                    
                }else{
                    $flag=1;
                }                
            }
            
            if(count($invoicedt['detail'])>0){
                $flag=2;
            }

            if($flag==0){
                echo json_encode(array('message'=>$cusdt,'result'=>'success'));
                exit;
              }
            
            if($flag>0){
              $success=$this->model->updatecus($invno,$cus,$flag);
                if($success>0)
                    echo json_encode(array('message'=>$cusdt,'result'=>'success'));
                else
                    throw new Exception(serialize(array('field'=>'Could not update', 'response'=>' contact to helpline!')));

            }
            
            
            
            
        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }

    function getitems(){
         $text = $_POST['searchtext'];
        
         $token = $_POST['token'];
        try{
            if(Session::get('ordertoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
        
            echo json_encode(array('message'=>$this->model->ablitemlist($text),'result'=>'success'));
        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }

    function showtxndetail(){
        $invoiceno = $_POST['invoice'];
        $token = $_POST['token'];

        try{
            if(Session::get('ordertoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
        
            echo json_encode(array('message'=>$this->model->gettxndetail($invoiceno),'result'=>'success'));
        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }

    function getitemstock(){
        $item = $_POST['itemcode'];
       
        $token = $_POST['token'];
       try{
           if(Session::get('ordertoken')!=$token){
               throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
           }
       
           echo json_encode(array('message'=>$this->model->itemstock($item),'result'=>'success'));
       }catch(Exception $e){
           $res = unserialize($e->getMessage()); 
       
           echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
       }
   }

    function saveinvoice(){

        $item = $_POST['itemcode'];

        $cus = $_POST['cus'];

        $qty = $_POST['qty'];

        $token = $_POST['token'];

        $invsl = $this->model->getinvoiceno()[0]['xinvno'];
        
        $invno = Session::get('sdistrisl')."-".$invsl;

        try{
            if(Session::get('ordertoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
            if(count($this->model->getinvoiceheader($invno))>0){
                if($this->model->getinvoiceheader($invno)[0]['xstatus']=='Confirmed'){
                    throw new Exception(serialize(array('field'=>'Invoice status already', 'response'=>' confirmed! can not be added!')));
                }
            }

            if($item==""){
                throw new Exception(serialize(array('field'=>'Item', 'response'=>' is empty!')));
            }

            if($qty==""){
                throw new Exception(serialize(array('field'=>'Quantity', 'response'=>' is empty!')));
            }
            if($qty==0){
                throw new Exception(serialize(array('field'=>'Quantity', 'response'=>' is 0!')));
            }
            
            $inputs = new Form();

            $inputs ->post("itemcode")
                    ->val('minlength', 1)
                    ->val('maxlength', 20)

                    ->post("cus")
                    ->val('minlength', 1)
                    ->val('maxlength', 20)
					
                    ->post("qty")
                    ->val('digit');
                    
            $inputs	->submit(); 		

            $inpdata = $inputs->fetch(); 

            $data = Apptools::form_field_to_data($inpdata, $this->formfield);   
            
            $stock = $this->model->itemstock($data['xitemcode'])[0]['stock'];

            $itemdt = $this->model->getitemdt($data['xitemcode']);

            $cusdt = $this->model->getcustomer($data['xparty']);
            
            $stno = $this->model->getSatementNo();
            
            if($stock==0){
                throw new Exception(serialize(array('field'=>'Stock', 'response'=>' is 0!')));
            }

            if((floatval($stock)-floatval($qty))<0){
                throw new Exception(serialize(array('field'=>'Stock', 'response'=>' Not enough! can to be added!')));
            }

            if(count($itemdt)==0){
                throw new Exception(serialize(array('field'=>'Item', 'response'=>' Not found! can to be added!')));
            }

            if(count($cusdt)==0){
                throw new Exception(serialize(array('field'=>'Customer', 'response'=>' Not found! can to be added!')));
            }
            
            $date = date('Y-m-d');
            $year = date('Y',strtotime($date));
            $month = date('m',strtotime($date)); 

            $hdata['xsalesnum']=$invno;
            $hdata['bizid']=100;
            $hdata['zemail']=Session::get('suser');
            $hdata['xdate']=$date;
            $hdata['xcus']=$data['xparty'];
            $hdata['stno']=$stno;
            $hdata['xstatus']="Created";
            $hdata['xdoctype']="POS Sales";
            $hdata['xinvsl']=$invsl;

            $dt['xtxnnum']=$invno;
            $dt['bizid']=100;
            $dt['zemail']=Session::get('suser');
            $dt['xdate']=$date;
            $dt['xrdin']=Session::get('suser');
            $dt['xtoparty']=$data['xparty'];
            $dt['stno']=$stno;
            $dt['xstatus']="Created";
            $dt['xdoctype']="POS Sales";
            $dt['xdocnum']=$invno;
            $dt['xdoc']=1;
            $dt['xyear']=$year;
            $dt['xper']=$month; 
            $dt['xitemcode']=$data['xitemcode'];
            $dt['xqty']=$data['xqty'];
            $dt['xrate']=$itemdt[0]['xstdprice'];
            $dt['xbv']=$itemdt[0]['xdp'];
            $dt['xrow']=0;
            $dt['xsign']=-1;

            $total = floatval($dt['xqty'])*floatval($dt['xrate']);
            $totalbv = floatval($dt['xqty'])*floatval($dt['xbv']);

            $result = array('txnnum'=>$invno,'itemcode'=>$dt['xitemcode'],'qty'=>$dt['xqty'],
            'rate'=>$dt['xrate'],'total'=>(string)$total,'itemdesc'=>$itemdt[0]['xdesc'],'bv'=>(string)$totalbv);

            $success = $this->model->create($hdata,$dt);
            if($success>0){
                echo json_encode(array('message'=>$result,'result'=>'success'));
            }


        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }
    

    function confirmsales(){
        $token = $_POST['token'];

        $invsl = $this->model->getinvoiceno()[0]['xinvno'];
        
        $invno = Session::get('sdistrisl')."-".$invsl;

        try{

            if(Session::get('ordertoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }

            $invoicedt = $this->model->getinvoicedetail($invno);

            if(count($invoicedt['header'])==0){
                throw new Exception(serialize(array('field'=>'Invoice', 'response'=>' can not be confirmed! Not created!')));
            }

            if($invoicedt['header'][0]['status']=='Confirmed'){
                throw new Exception(serialize(array('field'=>'Invoice status already', 'response'=>' confirmed! can not be Confirmed!')));
            }

            if(count($invoicedt['detail'])==0){
                throw new Exception(serialize(array('field'=>'Invoice', 'response'=>' can not be confirmed! please add items in the cart!')));
            }

            $success = $this->model->confirm($invno);

            if($success>0){
                echo json_encode(array('message'=>'Confirmed successfully!','result'=>'success'));
            }


        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }

    function deletecartitem(){
        $item = $_POST['itemcode'];
       
        $token = $_POST['token'];

        $invsl = $this->model->getinvoiceno()[0]['xinvno'];
        
        $invno = Session::get('sdistrisl')."-".$invsl;

       try{
           if(Session::get('ordertoken')!=$token){
               throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
           }
           
           $invoicedt = $this->model->getinvoicedetail($invno);

           if($invoicedt['header'][0]['status']=='Confirmed'){
            throw new Exception(serialize(array('field'=>'Invoice status already', 'response'=>' confirmed! can not be Confirmed!')));
        }

        if(count($invoicedt['detail'])==0){
            throw new Exception(serialize(array('field'=>'Invoice', 'response'=>' can not be confirmed! please add items in the cart!')));
        }

        $success = $this->model->deleteitem($invno, $item);

        if($success>0)
           echo json_encode(array('message'=>'Item deleted!','result'=>'success'));

       }catch(Exception $e){
           $res = unserialize($e->getMessage()); 
       
           echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
       }
   }

    function script(){
        return "
        <script>
            var cartitems = {};
            var filterresult=[];
            var itemcartdt=[];
            var carttotal = 0;
            var totalbv = 0;
            
            $(\"#delform\").validate({
                rules: {
                    delname: {
                        required:true, 
                        minlength:2,
                        maxlength:30
                    },
                    mobile: {
                        required:true, 
                        minlength:11,
                        maxlength:15
                    },
                    postal: {
                        required:true, 
                        minlength:3,
                        maxlength:6
                    },
                    deladd: {
                        required:true, 
                        minlength:4,
                        maxlength:100
                    }
                },
                messages: {
                    delname:{
                        required: 'Reuired Field', 
                        minlength: 'Minimum of 2 characters',
                        maxlength: 'Maximum of 30 characters'

                    },
                    mobile:{
                        required: 'Required Field', 
                        minlength: 'Minimum of 11 characters',
                        maxlength: 'Maximum of 15 characters'
                    },
                    postal:{
                        required: 'Required Field', 
                        minlength: 'Minimum of 3 characters',
                        maxlength: 'Maximum of 6 characters'
                    },
                    deladd: {
                        required: 'Required Field', 
                        minlength: 'Minimum of 4 characters',
                        maxlength: 'Maximum of 100 characters'
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

            $('#clearcart').on('click', function(){
                localStorage.removeItem('ldcreailcart')
                itemcartdt = [];
                carttotal = 0;
                totalbv = 0;
                loadintable()
                
            })

            if(localStorage.getItem('ldcreailcart') != null){
                itemcartdt = JSON.parse(localStorage.getItem('ldcreailcart'))
            }

            function loadinvoice(){
                $.ajax({
                        
                    url:\"".URL."buy/loadinvoicedata\", 
                    type : \"GET\", 
                    dataType: \"json\",                                 				
                    //data : {}, // post data || get data                    
                    beforeSend:function(){	
                        loaderon();   
                    },
                    success : function(result) {
                        
                        loaderoff();
                        cartitems = result;
                        loadintable()
                    },error: function(xhr, resp, text) {
                        loaderoff();
                        
                    }
                })
            }
             
            
             
            function loadintable(){
                $('#carttable tbody').html('')
                var ldcreailcart = JSON.parse(localStorage.getItem('ldcreailcart'));
                var today = new Date();
                $('#entrydate').html(today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear())
                //$('#cin').html('')
                //$('#cinname').html('')   
                
               
                totalbv = 0;
                carttotal = 0;
                if(ldcreailcart!=null){
                    if(ldcreailcart.length!=0){
                        
                        $.each(ldcreailcart, function(key, val){
                            var rowtotal=parseFloat(val['rate'])*parseFloat(val['qty'])
                            var rowbv=parseFloat(val['bv'])*parseFloat(val['qty'])
                            carttotal+=rowtotal
                            totalbv+=rowbv
                            $('#carttable tbody').append(`<tr>
                            <td>`+val['itemcode']+`&nbsp;`+val['itemdesc']+`</td>
                            <td>`+val['qty']+`</td>
                            <td>`+val['rate']+`</td>
                            <td>`+rowtotal+`</td>
                            <td>`+rowbv+`</td>
                            <td><a href=\"javascript:void(0)\" onclick=\"deleteitem('`+val['itemcode']+`')\">X</a></td>
                            </tr>`)
                        })
                        
                    }
                }
                $('#carttotal').html(`<strong>`+carttotal+`</strong>`)
                $('#totalbv').html(`<strong>`+totalbv+`</strong>`)
            }

            $(document).ready(function(){   
                carttotal = 0;
                totalbv = 0;
                loadintable()

                var districtlist = ['Dhaka', 'Faridpur','Gazipur','Gopalganj','Jamalpur','Kishoreganj',	'Madaripur',	
		 'Manikganj','Munshiganj','Mymensingh','Narayanganj','Narshingdi','Netrakona','Rajbari','Shariatpur',	
		 'Sherpur',	'Tangail','Bogra','Chapinawabganj',	'Joypurhat','Naogaon','Natore',	'Pabna','Rajshahi',	
		 'Sirajganj','Dinajpur','Gaibandha','Kurigram',	'Lalmonirhat', 'Nilphamari','Panchagarh','Rangpur',	
		 'Thakurgaon', 'Bandarban',	'Brahmanbaria',	'Chandpur',	'Chittagong','Comilla','Cox’s Bazar',	
		 'Feni','Khagrachari','Lakshmipur','Noakhali','Rangamati','Hobiganj','Moulvibazar','Sunamganj',	
		 'Sylhet','Chuadanga','Bagherhat','Jessore','Jinaidaha','Khulna','Kustia','Magura',	'Meherpur',	
		 'Narail','Satkhira','Barguna','Barishal','Bhola','Jhalokathi',	'Patuakhali','Pirojpur'	
        ];
        districtlist.sort(function (a, b) {
            if (b > a) {
                return -1;
            }
            if (a > b) {
                return 1;
            }
            return 0;
        });
        $.each(districtlist,function(key,val){
            console.log(val)		
       })
		 $('#district').append('<option default>Select District</option>');
		 $.each(districtlist,function(key,val){
			 $('#district').append('<option>'+val.toUpperCase()+'</option>');			
        })
        
        $('#district').on('change', function(){
            $('#thana').html('<option default>Select Thana</option>');
            const selected = thana.filter(thanas => thanas.District == $('#district').val());
            $.each(selected, function(key, val){
                $('#thana').append('<option>'+val.upazilla+'</option>');
            })
            
        })		

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
        
        $('#odcdistrict').append('<option default>Select ODC District</option>');
		 $.each(districts,function(key,val){
			 $('#odcdistrict').append('<option>'+val+'</option>');			
        })
        
        $('#odcdistrict').on('change', function(){
            
            $.ajax({
                        
                url:\"".URL."buy/loadodc\", 
                type : \"POST\", 
                //dataType: \"json\",                                 				
                data : {district:$('#odcdistrict').val(), token: $('#token').val()},             
                beforeSend:function(){	
                    loaderon();
                    $('#odc').html('<option default>Select ODC No</option>');	
                },
                success : function(result) {
                    //console.log(result)
                    const resultobj = JSON.parse(result);
                    if(resultobj['result']=='success'){
                        $.each(resultobj['message'],function(key,val){
                            $('#odc').append('<option value=\"'+val['odcid']+'\">'+val['odcid']+'</option>');			
                       })   
                    }
                    loaderoff();
                    
                },error: function(xhr, resp, text) {
                    loaderoff();
                    
                }
            })
        })

        // $('#odc').on('change', function(){
            
        //     $.ajax({
                        
        //         url:\"".URL."buy/loadodc\", 
        //         type : \"POST\", 
        //         //dataType: \"json\",                                 				
        //         data : {district:$('#odcdistrict').val(), token: $('#token').val()},             
        //         beforeSend:function(){	
        //             loaderon();
        //             $('#odc').html('<option default>Select ODC No</option>');	
        //         },
        //         success : function(result) {
        //             //console.log(result)
        //             const resultobj = JSON.parse(result);
        //             if(resultobj['result']=='success'){
        //                 $.each(resultobj['message'],function(key,val){
        //                     $('#odc').append('<option value=\"'+val['odcid']+'\">'+val['odcid']+'</option>');			
        //               })   
        //             }
        //             loaderoff();
                    
        //         },error: function(xhr, resp, text) {
        //             loaderoff();
                    
        //         }
        //     })
        // })


                $('input[id=\"tdate\"]').daterangepicker({
                    
                    startDate: moment().startOf('hour'),
                    endDate: moment().startOf('hour').add(32, 'hour'),
                    locale: {
                      format: 'DD-MM-YYYY'
                    }
                  });

                  $('#rptdaterange').hide()
                
                $('#daterange').on('click',function(){
                    
                    if(this.checked)
                        $('#rptdaterange').show()
                    else
                        $('#rptdaterange').hide()
                })
                $('#cartdiv').removeClass('bg-danger');
                $('#cartdiv').addClass('bg-info');    

                

                $('#checkout').on('click', function(){
                    var valid = 0;
                    var message = '' 
                    if($('#delname').val()==''){
                        valid = 1;
                        var message = 'Delivery name not  found'
                    }
                    if($('#deladd').val()==''){
                        valid = 2;
                        var message = 'Delivery address not  found'
                    }
                    if($('#mobile').val()==''){
                        valid = 3;
                        var message = 'Delivery mobile not  found'
                    }
                    if($('#district').val()==''){
                        valid = 5;
                        var message = 'District not found'
                    }
                    if($('#thana').val()==''){
                        valid = 6;
                        var message = 'Thana/Upazilla not  found'
                    }

                    if(valid==0){
                    if(carttotal > 10000){
                    $.ajax({
                        
                        url:\"".PAYGATE_URL."\", 
                        type : \"POST\",                                  				
                        data : {customer:\"".Session::get('suser')."\",refrin:'',company:'',outlet:'',doc:'1',doctype:'LDC Order',odcid:$('#odc').val(),cusname:$('#delname').val(),add1:$('#deladd').val(),add2:$('#deladd').val(),city:$('#thana').val(),district: $('#district').val(),postal:$('#postal').val(),callbackurl:\"".URL."ldcorder\",mobile:$('#mobile').val(),customertype:\"Retailer\",apikey:\"36cfce7372fc99723569236e883dc4db39669cdf116a57d6d126e05fdea7be3c\",itemdt:itemcartdt}, 
                        
                        beforeSend:function(){	
                            loaderon();   
                            
                        },
                        success : function(result) {
                            loaderoff();

                            const resultobj = JSON.parse(result);
                            if(resultobj['result']=='success')
                                location.href=\"".PAYGATE_URL."paygateway/\"+resultobj['message'];
                            
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
                
                   $('#btnitemsearch').on('click', function(){
                    $('#tblitemsearch tbody').html('');
                    $.ajax({
                        
                        url:\"".URL."ldcorder/getitems\", 
                        type : \"POST\",                                  				
                        data : {searchtext:$('#searchitem').val(), token: $('#token').val()}, 
                        beforeSend:function(){	
                            loaderon();   
                        },
                        success : function(result) {
                            //console.log(result)
                            loaderoff();
                            const resultobj = JSON.parse(result);
                            if(resultobj['result']=='success'){

                                    filterresult = resultobj;
                                    
                                    renderitemstock(resultobj)
                                
                            }else{
                                console.log(resultobj['message'])
                            }
                            
                        },error: function(xhr, resp, text) {
                            loaderoff();
                            
                        }
                    })
                })

                

                $('#searchitem').on('keyup',function(){
                    $('#tblitemsearch tbody').html('');
                    const filterItems = (arr, query) => {
                        return arr.filter(el => el['itemdesc'].toLowerCase().indexOf(query.toLowerCase()) !== -1)
                      }
                      
                     $.each(filterItems(filterresult['message'], $(this).val()), function(key,val){
                         
                        $('#tblitemsearch tbody').append(`<tr><td><img src=\"<?php echo URL;?>public/images/theme/noimages.png\" height=\"60\" width=\"60\"></td><td class=\"align-middle\">`+val['itemcode']+`</td><td class=\"align-middle\"><span class=\"itemdesc\">`+ val['itemdesc']+`</span> <br> Rate: <span class=\"text-success rate\">`+val['mrp']+` </span><br>BV : <span class=\"text-danger bv\">`+val['bv']+`<span></td><td class=\"align-middle text-center\"><input type=\"text\" value=\"1\" class=\"form-control form-control-sm\"></td><td class=\"align-middle\"><a id=\"`+val['itemcode']+`\" href=\"javascript:void(0)\" onclick=\"savecart($(this))\"><i class=\"fa fa-cart-plus\"></i></a></td></tr>`);
                     })
                  });


                  $('#searchtxn').on('click', function(){
                    $('#txntable tbody').html('');

                    

                    var dataobj = {searchtext:$('#searchbystr').val(),searchtype:$('#searchbytype').val(), daterange:$('#daterange').is(':checked'),ftdate:$('#tdate').val(), token: $('#token').val()} 
                    $.ajax({
                        
                        url:\"".URL."buy/searchtxn\", 
                        type : \"POST\",                                  				
                        data : dataobj,
                        beforeSend:function(){	
                            loaderon();   
                        },
                        success : function(result) {
                            //console.log(result)
                            loaderoff();
                            const resultobj = JSON.parse(result);
                            if(resultobj['result']=='success'){
                                $.each(resultobj['message'], function(key, val){
                                    $('#txntable tbody').append(`<tr><td>`+val['txndate']+`</td><td>`+val['txnnum']+`</td><td>`+val['rin']+`</td><td>`+val['cusname']+`</td><td>`+val['mobile']+`</td><td><a href=\"javascript:void(0)\" onclick=\"showinvoiceitem(\``+val['txnnum']+`\`)\">View Detail</a></td></tr>`);
                                    
                                })
                            }else{
                                console.log(resultobj['message'])
                            }
                            
                        },error: function(xhr, resp, text) {
                            loaderoff();
                            
                        }
                    })
                  })
            })

            function renderitemstock(result){
                $('#tblitemsearch tbody').html('')
               //console.log(result)
                $.each(result['message'], function(key, val){
                    
                    $('#tblitemsearch tbody').append(`<tr><td><img src=\"<?php echo URL;?>public/images/theme/noimages.png\" height=\"60\" width=\"60\"></td><td class=\"align-middle\">`+val['itemcode']+`</td><td class=\"align-middle\"><span class=\"itemdesc\">`+ val['itemdesc']+`</span> <br> Rate: <span class=\"text-success rate\">`+val['mrp']+` </span><br>BV : <span class=\"text-danger bv\">`+val['bv']+`<span></td><td class=\"align-middle text-center\"><input type=\"text\" value=\"1\" class=\"form-control form-control-sm\"></td><td class=\"align-middle\"><a id=\"`+val['itemcode']+`\" href=\"javascript:void(0)\" onclick=\"savecart($(this))\"><i class=\"fa fa-cart-plus\"></i></a></td></tr>`);
                    
                })
            }

            // function showcustomer(cin, cusname){
            //     $('#cin').html('')
            //     $('#cinname').html('')
            //     $('#cin').html(cin)
            //     $('#cinname').html(cusname)
            // }

            

            function savecart(_this){
                var vqty = _this.parent().parent().children().children('input').val();
                var vitemcode = _this.attr('id');
                var vcus = $('#cin').html(); 
                var vitemdesc = _this.parent().parent().children().children('.itemdesc').html();
                var vrate = _this.parent().parent().children().children('.rate').html();
                var vbv = _this.parent().parent().children().children('.bv').html();
                var exist=0;
                var index=0;
                if(itemcartdt.length==0){
                    itemcartdt.push({itemcode:vitemcode,itemdesc:vitemdesc,rate:vrate,qty:vqty,bv:vbv});
                }else{
                    $.each(itemcartdt, function(key, val){
                        
                        if(vitemcode == val['itemcode']){
                            exist = 1;
                            index=key;
                        }
                    })
                    if(exist == 0)
                        itemcartdt.push({itemcode:vitemcode,itemdesc:vitemdesc,rate:vrate,qty:vqty,bv:vbv});
                    else
                        itemcartdt[index]['qty']=vqty;

                }
                
                localStorage.setItem('ldcreailcart',JSON.stringify(itemcartdt));
                loadintable();

            }


            function deleteitem(vitemcode){
                $.each(itemcartdt, function(key, val){                        
                    if(vitemcode == val['itemcode']){
                        itemcartdt.splice(key, 1);
                        localStorage.setItem('ldcreailcart',JSON.stringify(itemcartdt));
                        loadintable();
                    }
                })
            }

            function showinvoiceitem(vinvoice){
                $('#modalinvoicedt tbody').html('')
                $.ajax({
                        
                    url:\"".URL."buy/showtxndetail\", 
                    type : \"POST\",                                  				
                    data : {invoice: vinvoice, token: $('#token').val()}, 
                    beforeSend:function(){	
                        loaderon();   
                    },
                    success : function(result) {
                        
                        loaderoff();
                        const resultobj = JSON.parse(result);
                        if(resultobj['result']=='success'){
                            var carttotal=0;
                            var totalbv=0;
                            $.each(resultobj['message'], function(key, val){
                                carttotal+=parseFloat(val['total'])
                                totalbv+=parseFloat(val['bv'])
                                $('#modalinvoicedt tbody').append(`<tr>
                                <td>`+val['itemcode']+`&nbsp;`+val['itemdesc']+`</td>
                                <td>`+val['qty']+`</td>
                                <td>`+val['rate']+`</td>
                                <td>`+val['total']+`</td>
                                <td>`+val['bv']+`</td>                                
                                </tr>`)
                            })
                            $('#invtotal').html(`<strong>`+carttotal+`</strong>`)
                            $('#invbv').html(`<strong>`+totalbv+`</strong>`)
                            $('#modalinvoicedt').modal('toggle');
				            $('#modalinvoicedt').modal('show');
                        }else{
                            
                        }
                        
                    },error: function(xhr, resp, text) {
                        loaderoff();
                        
                    }
                })
            }
            

            var thana = [
                {District:'BAGERHAT', upazilla:'MOLLAHAT'},
                {District:'BAGERHAT', upazilla:'RAMPAL'},
                {District:'BAGERHAT', upazilla:'MONGLA'},
                {District:'BAGERHAT', upazilla:'MORALGANJ'},
                {District:'BAGERHAT', upazilla:'FAKIRHAT'},
                {District:'BAGERHAT', upazilla:'KACHUA'},
                {District:'BAGERHAT', upazilla:'CHITALMARI'},
                {District:'BAGERHAT', upazilla:'BAGERHAT SADAR'},
                {District:'BAGERHAT', upazilla:'SARANKHOLA'},
                {District:'BANDARBAN', upazilla:'ALIKADAM'},
                {District:'BANDARBAN', upazilla:'RUMA'},
                {District:'BANDARBAN', upazilla:'BANDARBAN SADAR'},
                {District:'BANDARBAN', upazilla:'THANCHI'},
                {District:'BANDARBAN', upazilla:'ROWANGCHARI'},
                {District:'BANDARBAN', upazilla:'LAMA'},
                {District:'BARGUNA', upazilla:'PATHARGHATA'},
                {District:'BARGUNA', upazilla:'BARGUNA SADAR'},
                {District:'BARGUNA', upazilla:'BETAGI'},
                {District:'BARGUNA', upazilla:'AMTALI'},
                {District:'BARISHAL', upazilla:'GOURNADI'},
                {District:'BARISHAL', upazilla:'HIZLA'},
                {District:'BARISHAL', upazilla:'BARISHAL SADAR'},
                {District:'BARISHAL', upazilla:'MULADI'},
                {District:'BARISHAL', upazilla:'AGAILJHARA'},
                {District:'BARISHAL', upazilla:'BABUGANJ'},
                {District:'BARISHAL', upazilla:'WAZIRPUR'},
                {District:'BARISHAL', upazilla:'BANARIPARA'},
                {District:'BARISHAL', upazilla:'BAKERGANJ'},
                {District:'BHOLA', upazilla:'TAZUMUDDIN'},
                {District:'BHOLA', upazilla:'BORHANUDDIN'},
                {District:'BHOLA', upazilla:'MONPURA'},
                {District:'BHOLA', upazilla:'LALMOHAN'},
                {District:'BHOLA', upazilla:'DAULATKHAN'},
                {District:'BHOLA', upazilla:'CHARFESSON'},
                {District:'BOGURA', upazilla:'DHUNAT'},
                {District:'BOGURA', upazilla:'SHIBGANJ'},
                {District:'BOGURA', upazilla:'ADAMDIGHI'},
                {District:'BOGURA', upazilla:'NANDIGRAM'},
                {District:'BOGURA', upazilla:'SONATOLA'},
                {District:'BOGURA', upazilla:'SARIAKANDI'},
                {District:'BOGURA', upazilla:'SHAJAHANPUR'},
                {District:'BOGURA', upazilla:'BOGURA SADAR'},
                {District:'BOGURA', upazilla:'SARIAKANDI'},
                {District:'BOGURA', upazilla:'KAHALOO'},
                {District:'BOGURA', upazilla:'GABTALI'},
                {District:'BOGURA', upazilla:'SHERPUR'},
                {District:'BOGURA', upazilla:'DUPCHANCHIA'},
                {District:'BRAHMANBARIA', upazilla:'BRAHMANBARIA SADAR'},
                {District:'BRAHMANBARIA', upazilla:'ASHUGANJ'},
                {District:'BRAHMANBARIA', upazilla:'SARAIL'},
                {District:'BRAHMANBARIA', upazilla:'NABINAGAR'},
                {District:'BRAHMANBARIA', upazilla:'BANCHARAMPUR'},
                {District:'BRAHMANBARIA', upazilla:'BIJOYNAGAR'},
                {District:'BRAHMANBARIA', upazilla:'NASIRNAGAR'},
                {District:'BRAHMANBARIA', upazilla:'KASBA'},
                {District:'CHANDPUR', upazilla:'HAJIGANJ'},
                {District:'CHANDPUR', upazilla:'CHANDPUR SADAR'},
                {District:'CHANDPUR', upazilla:'HAIMCHAR'},
                {District:'CHANDPUR', upazilla:'FARIDGANJ'},
                {District:'CHANDPUR', upazilla:'MATLAB (NORTH)'},
                {District:'CHANDPUR', upazilla:'SHAHRASTI'},
                {District:'CHAPAINAWABGANJ', upazilla:'NACHOLE'},
                {District:'CHAPAINAWABGANJ', upazilla:'CHAPAINAWABGANJ SADAR'},
                {District:'CHATTOGRAM', upazilla:'FATIKCHARI'},
                {District:'CHATTOGRAM', upazilla:'RANGUNIA'},
                {District:'CHATTOGRAM', upazilla:'SATKANIA'},
                {District:'CHATTOGRAM', upazilla:'SITAKUNDA'},
                {District:'CHATTOGRAM', upazilla:'MIRSHARAI'},
                {District:'CHATTOGRAM', upazilla:'HATHAZARI'},
                {District:'CHATTOGRAM', upazilla:'ANWARA'},
                {District:'CHATTOGRAM', upazilla:'PATIYA'},
                {District:'CHATTOGRAM', upazilla:'CHANDANAISH'},
                {District:'CHATTOGRAM', upazilla:'RAWZAN'},
                {District:'CHATTOGRAM', upazilla:'KARNAFULI'},
                {District:'CHATTOGRAM', upazilla:'BOALKHALI'},
                {District:'CHATTOGRAM', upazilla:'BANSHKHALI'},
                {District:'CHUADANGA', upazilla:'JIBANNAGAR'},
                {District:'COXS BAZAR', upazilla:'KUTUBDIA'},
                {District:'COXS BAZAR', upazilla:'PEKUA'},
                {District:'COXS BAZAR', upazilla:'COXS BAZAR SADAR'},
                {District:'COXS BAZAR', upazilla:'UKHIA'},
                {District:'COXS BAZAR', upazilla:'TEKNAF'},
                {District:'COXS BAZAR', upazilla:'MAHESHKHALI'},
                {District:'COXS BAZAR', upazilla:'RAMU'},
                {District:'CUMILLA', upazilla:'MEGHNA'},
                {District:'CUMILLA', upazilla:'MONOHARGANJ'},
                {District:'CUMILLA', upazilla:'BURICHANG'},
                {District:'CUMILLA', upazilla:'MURADNAGAR'},
                {District:'CUMILLA', upazilla:'ADARSHA SADAR'},
                {District:'CUMILLA', upazilla:'DEBIDWAR'},
                {District:'CUMILLA', upazilla:'CUMILLA SADAR(SOUTH)'},
                {District:'CUMILLA', upazilla:'LAKSAM'},
                {District:'CUMILLA', upazilla:'NANGOLKOT'},
                {District:'CUMILLA', upazilla:'CHOUDDAGRAM'},
                {District:'CUMILLA', upazilla:'HOMNA'},
                {District:'CUMILLA', upazilla:'LALMAI'},
                {District:'CUMILLA', upazilla:'BRAHMANPARA'},
                {District:'CUMILLA', upazilla:'TITAS'},
                {District:'CUMILLA', upazilla:'DAUDKANDI'},
                {District:'DHAKA', upazilla:'KERANIGANJ'},
                {District:'DHAKA', upazilla:'DOHAR'},
                {District:'DHAKA', upazilla:'NAWABGANJ'},
                {District:'DHAKA', upazilla:'DHAMRAI'},
                {District:'DHAKA', upazilla:'SAVAR'},
                {District: 'DHAKA', upazilla:'ADABOR'},
                {District: 'DHAKA', upazilla:'BADDA'},
                {District: 'DHAKA', upazilla:'BANDAR'},
                {District: 'DHAKA', upazilla:'BANGSHAL'},
                {District: 'DHAKA', upazilla:'BIMAN BANDAR'},
                {District: 'DHAKA', upazilla:'CANTONMENT'},
                {District: 'DHAKA', upazilla:'CHAWKBAZAR'},
                {District: 'DHAKA', upazilla:'DAKSHINKHAN'},
                {District: 'DHAKA', upazilla:'DARUS SALAM'},
                {District: 'DHAKA', upazilla:'DEMRA'},
                {District: 'DHAKA', upazilla:'DHANMONDI'},
                {District: 'DHAKA', upazilla:'GAZIPUR SADAR'},
                {District: 'DHAKA', upazilla:'GENDARIA'},
                {District: 'DHAKA', upazilla:'GULSHAN'},
                {District: 'DHAKA', upazilla:'HAZARIBAGH'},
                {District: 'DHAKA', upazilla:'JATRABARI'},
                {District: 'DHAKA', upazilla:'KADAMTALI'},
                {District: 'DHAKA', upazilla:'KAFRUL'},
                {District: 'DHAKA', upazilla:'KALABAGAN'},
                {District: 'DHAKA', upazilla:'KAMRANGIRCHAR'},
                {District: 'DHAKA', upazilla:'KERANIGANJ'},
                {District: 'DHAKA', upazilla:'KHILGAON'},
                {District: 'DHAKA', upazilla:'KHILKHET'},
                {District: 'DHAKA', upazilla:'KOTWALI'},
                {District: 'DHAKA', upazilla:'LALBAGH'},
                {District: 'DHAKA', upazilla:'MIRPUR'},
                {District: 'DHAKA', upazilla:'MOHAMMADPUR'},
                {District: 'DHAKA', upazilla:'MOTIJHEEL'},
                {District: 'DHAKA', upazilla:'NARAYANGANJ SADAR'},
                {District: 'DHAKA', upazilla:'NEW MARKET'},
                {District: 'DHAKA', upazilla:'PALLABI'},
                {District: 'DHAKA', upazilla:'PALTAN'},
                {District: 'DHAKA', upazilla:'RAMNA'},
                {District: 'DHAKA', upazilla:'RAMPURA'},
                {District: 'DHAKA', upazilla:'SABUJBAGH'},
                {District: 'DHAKA', upazilla:'SAVAR'},
                {District: 'DHAKA', upazilla:'SHAH ALI'},
                {District: 'DHAKA', upazilla:'SHAHBAGH'},
                {District: 'DHAKA', upazilla:'SHER-E-BANGLA NAGAR'},
                {District: 'DHAKA', upazilla:'SHYAMPUR'},
                {District: 'DHAKA', upazilla:'SUTRAPUR'},
                {District: 'DHAKA', upazilla:'TEJGAON'},
                {District: 'DHAKA', upazilla:'TEJGAON'},
                {District: 'DHAKA', upazilla:'TURAG'},
                {District: 'DHAKA', upazilla:'UTTARA'},
                {District: 'DHAKA', upazilla:'UTTAR KHAN'},
                {District:'DINAJPUR', upazilla:'BIRGANJ'},
                {District:'DINAJPUR', upazilla:'DINAJPUR SADAR'},
                {District:'DINAJPUR', upazilla:'BOCHAGANJ'},
                {District:'DINAJPUR', upazilla:'BIRAMPUR'},
                {District:'DINAJPUR', upazilla:'KHANSAMA'},
                {District:'DINAJPUR', upazilla:'HAKIMPUR'},
                {District:'DINAJPUR', upazilla:'GHORAGHAT'},
                {District:'DINAJPUR', upazilla:'CHIRIRBANDAR'},
                {District:'DINAJPUR', upazilla:'PARBATIPUR'},
                {District:'DINAJPUR', upazilla:'KAHAROLE'},
                {District:'DINAJPUR', upazilla:'NAWABGANJ'},
                {District:'DINAJPUR', upazilla:'FULBARI'},
                {District:'FARIDPUR', upazilla:'CHAR BHADRASAN'},
                {District:'FARIDPUR', upazilla:'SALTHA'},
                {District:'FARIDPUR', upazilla:'BHANGA'},
                {District:'FARIDPUR', upazilla:'FARIDPUR SADAR'},
                {District:'FARIDPUR', upazilla:'BOALMARI'},
                {District:'FARIDPUR', upazilla:'MADHUKHALI'},
                {District:'FARIDPUR', upazilla:'NAGARKANDA'},
                {District:'FARIDPUR', upazilla:'SADARPUR'},
                {District:'FENI', upazilla:'CHAGALNAIYA'},
                {District:'FENI', upazilla:'FULGAZI'},
                {District:'FENI', upazilla:'FENI SADAR'},
                {District:'GAIBANDHA', upazilla:'SUNDARGANJ'},
                {District:'GAIBANDHA', upazilla:'PALASHBARI'},
                {District:'GAIBANDHA', upazilla:'GOBINDAGANJ'},
                {District:'GAIBANDHA', upazilla:'GAIBANDHA SADAR'},
                {District:'GAZIPUR', upazilla:'GAZIPUR SADAR'},
                {District:'GAZIPUR', upazilla:'KALIGANJ'},
                {District:'GAZIPUR', upazilla:'KAPASIA'},
                {District:'GAZIPUR', upazilla:'KALIAKAIR'},
                {District:'GAZIPUR', upazilla:'SREEPUR'},
                {District:'GOPALGANJ', upazilla:'TUNGIPARA'},
                {District:'GOPALGANJ', upazilla:'KOTALIPARA'},
                {District:'GOPALGANJ', upazilla:'GOPALGANJ SADAR'},
                {District:'GOPALGANJ', upazilla:'MAKSUDPUR'},
                {District:'HABIGANJ', upazilla:'CHUNARUGHAT'},
                {District:'HABIGANJ', upazilla:'SHAYESTAGANJ'},
                {District:'HABIGANJ', upazilla:'BAHUBAL'},
                {District:'HABIGANJ', upazilla:'MADHABPUR'},
                {District:'HABIGANJ', upazilla:'AJMIRIGANJ'},
                {District:'HABIGANJ', upazilla:'NABIGANJ'},
                {District:'HABIGANJ', upazilla:'HABIGANJ SADAR'},
                {District:'HABIGANJ', upazilla:'LAKHAI'},
                {District:'HABIGANJ', upazilla:'BANIACHONG'},
                {District:'JAMALPUR', upazilla:'JAMALPUR SADAR'},
                {District:'JAMALPUR', upazilla:'MADARGANJ'},
                {District:'JAMALPUR', upazilla:'MELANDAH'},
                {District:'JAMALPUR', upazilla:'ISLAMPUR'},
                {District:'JASHORE', upazilla:'KESHABPUR'},
                {District:'JASHORE', upazilla:'JHIKARGACHA'},
                {District:'JASHORE', upazilla:'SHARSHA'},
                {District:'JASHORE', upazilla:'CHOUGACHHA'},
                {District:'JASHORE', upazilla:'MANIRAMPUR'},
                {District:'JHALAKATHI', upazilla:'NALCHITY'},
                {District:'JHALAKATHI', upazilla:'RAJAPUR'},
                {District:'JHALAKATHI', upazilla:'JHALAKATHI SADAR'},
                {District:'JHALAKATHI', upazilla:'KATHALIA'},
                {District:'JHENAIDAH', upazilla:'SHAILKUPA'},
                {District:'JHENAIDAH', upazilla:'MOHESHPUR'},
                {District:'JHENAIDAH', upazilla:'SHAILKUPA'},
                {District:'JHENAIDAH', upazilla:'KOTCHANDPUR'},
                {District:'JHENAIDAH', upazilla:'HARINAKUNDA'},
                {District:'JHENAIDAH', upazilla:'KALIGANJ'},
                {District:'JOYPURHAT', upazilla:'JOYPURHAT SADAR'},
                {District:'JOYPURHAT', upazilla:'PANCHBIBI'},
                {District:'JOYPURHAT', upazilla:'AKKELPUR'},
                {District:'JOYPURHAT', upazilla:'KHETLAL'},
                {District:'JOYPURHAT', upazilla:'KALAI'},
                {District:'KHAGRACHARI', upazilla:'LAXMICHHARI'},
                {District:'KHAGRACHARI', upazilla:'GUIMARA'},
                {District:'KHAGRACHARI', upazilla:'MATIRANGA'},
                {District:'KHAGRACHARI', upazilla:'PANCHHARI'},
                {District:'KHAGRACHARI', upazilla:'MOHALCHARI'},
                {District:'KHAGRACHARI', upazilla:'MANIKCHHARI'},
                {District:'KHAGRACHARI', upazilla:'DIGHINALA'},
                {District:'KHAGRACHARI', upazilla:'RAMGARH'},
                {District:'KHULNA', upazilla:'TEROKHADA'},
                {District:'KHULNA', upazilla:'BATIAGHATA'},
                {District:'KHULNA', upazilla:'DACOPE'},
                {District:'KHULNA', upazilla:'DIGHOLIA'},
                {District:'KHULNA', upazilla:'KOYRA'},
                {District:'KHULNA', upazilla:'DUMURIA'},
                {District:'KHULNA', upazilla:'FULTALA'},
                {District:'KISHOREGANJ', upazilla:'KATIADI'},
                {District:'KISHOREGANJ', upazilla:'KISHOREGANJ SADAR'},
                {District:'KISHOREGANJ', upazilla:'KARIMGANJ'},
                {District:'KISHOREGANJ', upazilla:'KULIARCHAR'},
                {District:'KISHOREGANJ', upazilla:'TARAIL'},
                {District:'KISHOREGANJ', upazilla:'BHAIRAB'},
                {District:'KISHOREGANJ', upazilla:'HOSSAINPUR'},
                {District:'KISHOREGANJ', upazilla:'MITHAMOIN'},
                {District:'KISHOREGANJ', upazilla:'ITNA'},
                {District:'KISHOREGANJ', upazilla:'PAKUNDIA'},
                {District:'KURIGRAM', upazilla:'KURIGRAM SADAR'},
                {District:'KURIGRAM', upazilla:'FULBARI'},
                {District:'KURIGRAM', upazilla:'RAJIBPUR'},
                {District:'KURIGRAM', upazilla:'BHURUNGAMARI'},
                {District:'KURIGRAM', upazilla:'ULIPUR'},
                {District:'KUSHTIA', upazilla:'KUSHTIA SADAR'},
                {District:'KUSHTIA', upazilla:'KUMARKHALI'},
                {District:'KUSHTIA', upazilla:'MIRPUR'},
                {District:'KUSHTIA', upazilla:'KHOKSA'},
                {District:'KUSHTIA', upazilla:'BHERAMARA'},
                {District:'KUSHTIA', upazilla:'DAULATPUR'},
                {District:'LALMONIRHAT', upazilla:'PATGRAM'},
                {District:'LALMONIRHAT', upazilla:'KALIGANJ'},
                {District:'LALMONIRHAT', upazilla:'LALMONIRHAT SADAR'},
                {District:'LALMONIRHAT', upazilla:'HATIBANDHA'},
                {District:'LAXMIPUR', upazilla:'RAIPUR'},
                {District:'LAXMIPUR', upazilla:'LAXMIPUR SADAR'},
                {District:'LAXMIPUR', upazilla:'KAMALNAGAR'},
                {District:'LAXMIPUR', upazilla:'RAMGANJ'},
                {District:'MADARIPUR', upazilla:'KALKINI'},
                {District:'MADARIPUR', upazilla:'SHIBCHAR'},
                {District:'MADARIPUR', upazilla:'RAJOIR'},
                {District:'MADARIPUR', upazilla:'MADARIPUR SADAR'},
                {District:'MAGURA', upazilla:'SREEPUR'},
                {District:'MAGURA', upazilla:'SHALIKHA'},
                {District:'MAGURA', upazilla:'SREEPUR'},
                {District:'MAGURA', upazilla:'MAGURA SADAR'},
                {District:'MANIKGANJ', upazilla:'SINGAIR'},
                {District:'MANIKGANJ', upazilla:'GHIOR'},
                {District:'MANIKGANJ', upazilla:'SHIBALAY'},
                {District:'MANIKGANJ', upazilla:'SATURIA'},
                {District:'MANIKGANJ', upazilla:'HARIRAMPUR'},
                {District:'MANIKGANJ', upazilla:'MANIKGANJ SADAR'},
                {District:'MANIKGANJ', upazilla:'DAULATPUR'},
                {District:'MEHERPUR', upazilla:'MEHERPUR SADAR'},
                {District:'MOULVIBAZAR', upazilla:'BARALEKHA'},
                {District:'MOULVIBAZAR', upazilla:'MOULVIBAZAR SADAR'},
                {District:'MOULVIBAZAR', upazilla:'JURI'},
                {District:'MOULVIBAZAR', upazilla:'SREEMANGAL'},
                {District:'MOULVIBAZAR', upazilla:'KULAURA'},
                {District:'MOULVIBAZAR', upazilla:'RAJNAGAR'},
                {District:'MUNSHIGANJ', upazilla:'GAJARIA'},
                {District:'MUNSHIGANJ', upazilla:'MUNSHIGANJ SADAR'},
                {District:'MUNSHIGANJ', upazilla:'TONGIBARI'},
                {District:'MUNSHIGANJ', upazilla:'SERAJDIKHAN'},
                {District:'MUNSHIGANJ', upazilla:'LOUHAJONG'},
                {District:'MUNSHIGANJ', upazilla:'SREENAGAR'},
                {District:'MYMENSINGH', upazilla:'DHOBAURA'},
                {District:'MYMENSINGH', upazilla:'FULPUR'},
                {District:'MYMENSINGH', upazilla:'TRISHAL'},
                {District:'MYMENSINGH', upazilla:'ISHWARGONJ'},
                {District:'MYMENSINGH', upazilla:'BHALUKA'},
                {District:'MYMENSINGH', upazilla:'NANDAIL'},
                {District:'MYMENSINGH', upazilla:'MYMENSINGH SADAR'},
                {District:'MYMENSINGH', upazilla:'GAFFARGAON'},
                {District:'MYMENSINGH', upazilla:'TARAKANDA'},
                {District:'MYMENSINGH', upazilla:'HALUAGHAT'},
                {District:'NAOGAON', upazilla:'DHAMOIRHAT'},
                {District:'NAOGAON', upazilla:'NIAMATPUR'},
                {District:'NAOGAON', upazilla:'PORSHA'},
                {District:'NAOGAON', upazilla:'ATRAI'},
                {District:'NAOGAON', upazilla:'MOHADEVPUR'},
                {District:'NAOGAON', upazilla:'SAPAHAR'},
                {District:'NAOGAON', upazilla:'NAOGAON SADAR'},
                {District:'NAOGAON', upazilla:'RANINAGAR'},
                {District:'NARAIL', upazilla:'KALIA'},
                {District:'NARAIL', upazilla:'LOHAGARA'},
                {District:'NARAIL', upazilla:'NARAIL SADAR'},
                {District:'NARAYANGANJ', upazilla:'BANDAR'},
                {District:'NARAYANGANJ', upazilla:'NARAYANGANJ SADAR'},
                {District:'NARAYANGANJ', upazilla:'ARAIHAZAR'},
                {District:'NARAYANGANJ', upazilla:'RUPGANJ'},
                {District:'NARAYANGANJ', upazilla:'SONARGAON'},
                {District:'NARAYANGANJ', upazilla:'NARAYANGANJ SADAR'},
                {District:'NARSINGDI', upazilla:'MONOHARDI'},
                {District:'NARSINGDI', upazilla:'PALASH'},
                {District:'NARSINGDI', upazilla:'BELABO'},
                {District:'NARSINGDI', upazilla:'RAIPURA'},
                {District:'NARSINGDI', upazilla:'SHIBPUR'},
                {District:'NARSINGDI', upazilla:'NARSINGDI SADAR'},
                {District:'NATORE', upazilla:'NALDANGA'},
                {District:'NATORE', upazilla:'GURUDASPUR'},
                {District:'NATORE', upazilla:'LALPUR'},
                {District:'NATORE', upazilla:'BAGATIPARA'},
                {District:'NATORE', upazilla:'BARAIGRAM'},
                {District:'NATORE', upazilla:'SINGRA'},
                {District:'NETROKONA', upazilla:'KENDUA'},
                {District:'NETROKONA', upazilla:'MADAN'},
                {District:'NETROKONA', upazilla:'KHALIAJURI'},
                {District:'NETROKONA', upazilla:'KALMA KANDA'},
                {District:'NILPHAMARI', upazilla:'SYEDPUR'},
                {District:'NILPHAMARI', upazilla:'DOMAR'},
                {District:'NILPHAMARI', upazilla:'JALDHAKA'},
                {District:'NILPHAMARI', upazilla:'NILPHAMARI SADAR'},
                {District:'NILPHAMARI', upazilla:'KISHOREGANJ'},
                {District:'NILPHAMARI', upazilla:'DIMLA'},
                {District:'NOAKHALI', upazilla:'SUNAIMORI'},
                {District:'NOAKHALI', upazilla:'KABIRHAT'},
                {District:'NOAKHALI', upazilla:'BEGUMGANJ'},
                {District:'NOAKHALI', upazilla:'HATIYA'},
                {District:'NOAKHALI', upazilla:'NOAKHALI SADAR'},
                {District:'NOAKHALI', upazilla:'CHATKHIL'},
                {District:'NOAKHALI', upazilla:'SHUBARNACHAR'},
                {District:'NOAKHALI', upazilla:'COMPANIGANJ'},
                {District:'PABNA', upazilla:'PABNA SADAR'},
                {District:'PABNA', upazilla:'BHANGURA'},
                {District:'PABNA', upazilla:'CHATMOHAR'},
                {District:'PABNA', upazilla:'SANTHIA'},
                {District:'PABNA', upazilla:'FARIDPUR'},
                {District:'PABNA', upazilla:'SANTHIA'},
                {District:'PABNA', upazilla:'BERA'},
                {District:'PABNA', upazilla:'SUJANAGAR'},
                {District:'PANCHAGARH', upazilla:'ATWARI'},
                {District:'PANCHAGARH', upazilla:'BODA'},
                {District:'PATUAKHALI', upazilla:'PATUAKHALI SADAR'},
                {District:'PATUAKHALI', upazilla:'BAWPHAL'},
                {District:'PATUAKHALI', upazilla:'DASHMINA'},
                {District:'PATUAKHALI', upazilla:'RANGABALI'},
                {District:'PATUAKHALI', upazilla:'MIRZAGANJ'},
                {District:'PATUAKHALI', upazilla:'DHUMKI'},
                {District:'PATUAKHALI', upazilla:'GALACHIPA'},
                {District:'PIROJPUR', upazilla:'BHANDARIA'},
                {District:'PIROJPUR', upazilla:'PIROJPUR SADAR'},
                {District:'PIROJPUR', upazilla:'INDURKANDI'},
                {District:'PIROJPUR', upazilla:'NESARABAD'},
                {District:'RAJBARI', upazilla:'RAJBARI SADAR'},
                {District:'RAJBARI', upazilla:'GOALANDA'},
                {District:'RAJBARI', upazilla:'BALIAKANDI'},
                {District:'RAJBARI', upazilla:'PANGSA'},
                {District:'RAJSHAHI', upazilla:'PUTHIA'},
                {District:'RAJSHAHI', upazilla:'BAGHA'},
                {District:'RAJSHAHI', upazilla:'DURGAPUR'},
                {District:'RAJSHAHI', upazilla:'PABA'},
                {District:'RAJSHAHI', upazilla:'MOHANPUR'},
                {District:'RAJSHAHI', upazilla:'GODAGARI'},
                {District:'RAJSHAHI', upazilla:'TANORE'},
                {District:'RAJSHAHI', upazilla:'CHARGHAT'},
                {District:'RANGAMATI', upazilla:'JURAICHARI'},
                {District:'RANGAMATI', upazilla:'BARKAL'},
                {District:'RANGAMATI', upazilla:'RANGAMATI SADAR'},
                {District:'RANGAMATI', upazilla:'KAPTAI'},
                {District:'RANGAMATI', upazilla:'NANIARCHAR'},
                {District:'RANGAMATI', upazilla:'LANGADU'},
                {District:'RANGAMATI', upazilla:'KAWKHALI'},
                {District:'RANGAMATI', upazilla:'RAJASTHALI'},
                {District:'RANGAMATI', upazilla:'BELAICHHARI'},
                {District:'RANGPUR', upazilla:'TARAGANJ'},
                {District:'RANGPUR', upazilla:'RANGPUR SADAR'},
                {District:'RANGPUR', upazilla:'PIRGACHA'},
                {District:'RANGPUR', upazilla:'PIRGANJ'},
                {District:'RANGPUR', upazilla:'BADARGANJ'},
                {District:'RANGPUR', upazilla:'KAUNIA'},
                {District:'RANGPUR', upazilla:'GANGACHARA'},
                {District:'RANGPUR', upazilla:'MITHAPUKUR'},
                {District:'SATKHIRA', upazilla:'TALA'},
                {District:'SATKHIRA', upazilla:'KALAROA'},
                {District:'SATKHIRA', upazilla:'SHAYMNAGAR'},
                {District:'SATKHIRA', upazilla:'SATKHIRA SADAR'},
                {District:'SATKHIRA', upazilla:'ASHASUNI'},
                {District:'SHARIATPUR', upazilla:'NARIA'},
                {District:'SHARIATPUR', upazilla:'SHARIATPUR SADAR'},
                {District:'SHARIATPUR', upazilla:'BHEDARGANJ'},
                {District:'SHARIATPUR', upazilla:'GOSHAIRHAT'},
                {District:'SHERPUR', upazilla:'NAKHLA'},
                {District:'SHERPUR', upazilla:'SREEBARDI'},
                {District:'SHERPUR', upazilla:'NALITABARI'},
                {District:'SHERPUR', upazilla:'SHERPUR SADAR'},
                {District:'SHERPUR', upazilla:'JHENAIGATI'},
                {District:'SIRAJGANJ', upazilla:'ULLAHPARA'},
                {District:'SIRAJGANJ', upazilla:'CHOWHALI'},
                {District:'SIRAJGANJ', upazilla:'TARASH'},
                {District:'SIRAJGANJ', upazilla:'SIRAJGANJ SADAR'},
                {District:'SIRAJGANJ', upazilla:'RAIGANJ'},
                {District:'SIRAJGANJ', upazilla:'KAZIPUR'},
                {District:'SIRAJGANJ', upazilla:'KAMARKHAND'},
                {District:'SUNAMGANJ', upazilla:'JAGANNATHPUR'},
                {District:'SUNAMGANJ', upazilla:'DOARABAZAR'},
                {District:'SUNAMGANJ', upazilla:'TAHIRPUR'},
                {District:'SUNAMGANJ', upazilla:'CHHATAK'},
                {District:'SUNAMGANJ', upazilla:'SUNAMGANJ SADAR'},
                {District:'SUNAMGANJ', upazilla:'JAMALGANJ'},
                {District:'SUNAMGANJ', upazilla:'CHHATAK'},
                {District:'SUNAMGANJ', upazilla:'SOUTH SUNAMGANJ'},
                {District:'SUNAMGANJ', upazilla:'DHARMAPASHA'},
                {District:'SYLHET', upazilla:'BALAGANJ'},
                {District:'SYLHET', upazilla:'BISWANATH'},
                {District:'SYLHET', upazilla:'COMPANIGANJ'},
                {District:'SYLHET', upazilla:'ZAKIGANJ'},
                {District:'SYLHET', upazilla:'KANAIGHAT'},
                {District:'SYLHET', upazilla:'OSMANINAGAR'},
                {District:'SYLHET', upazilla:'SOUTH SHURMA'},
                {District:'SYLHET', upazilla:'JAINTAPUR'},
                {District:'SYLHET', upazilla:'GOWAINGHAT'},
                {District:'SYLHET', upazilla:'BEANIBAZAR'},
                {District:'SYLHET', upazilla:'SYLHET SADAR'},
                {District:'SYLHET', upazilla:'GOLAPGANJ'},
                {District:'TANGAIL', upazilla:'TANGAIL SADAR'},
                {District:'TANGAIL', upazilla:'DHANBARI'},
                {District:'TANGAIL', upazilla:'MADHUPUR'},
                {District:'TANGAIL', upazilla:'KALIHATI'},
                {District:'TANGAIL', upazilla:'NAGARPUR'},
                {District:'TANGAIL', upazilla:'GOPALPUR'},
                {District:'TANGAIL', upazilla:'BHUAPUR'},
                {District:'TANGAIL', upazilla:'GHATAIL'},
                {District:'TANGAIL', upazilla:'MIRZAPUR'},
                {District:'TANGAIL', upazilla:'BASHAIL'},
                {District:'TANGAIL', upazilla:'DELDUAR'},
                {District:'TANGAIL', upazilla:'SHAKHIPUR'},
                {District:'THAKURGAON', upazilla:'THAKURGAON SADAR'},
                {District:'THAKURGAON', upazilla:'RANISANKAIL'},
                {District:'THAKURGAON', upazilla:'PIRGANJ'},
                {District:'THAKURGAON', upazilla:'BALIADANGI'}
                        ]
        </script>
        ";
    }
}



?>