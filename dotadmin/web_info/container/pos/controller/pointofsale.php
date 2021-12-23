<?php

class Pointofsale extends Controller{

    private $formfield=array();

    function __construct(){
        parent::__construct();
        $this->view->script=$this->script();
        $this->intializeform();
        Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }
    }

    function init(){
        Session::set('postoken',uniqid());
        $this->view->token=Session::get('postoken'); 
        
        $this->view->render("templateadmin","abr/pos_view");
    }

    function loadinvoicedata(){
        //Logdebug::appendlog('started');
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
            if(Session::get('postoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
            
            if(strlen($text)<4){
                throw new Exception(serialize(array('field'=>'Search By', 'response'=>' minimum 4 characters!')));
            }
            if($col=='by CIN')
                $col = 'xcus';
            if($col=='by RIN')
                $col = 'xrdin';    
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
        try{
            if(Session::get('postoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
            if($text!=""){
                if(strlen($text)<4){
                    throw new Exception(serialize(array('field'=>'Search By', 'response'=>' minimum 4 characters!')));
                }
            }
            if($col=='by Customer Name')
                $col = 'c.xorg';
            if($col=='by CIN')
                $col = 'm.xcus';
            if($col=='by Customer Mobile')
                $col = 'c.xmobile';
            if($col=='by Invoice')
                $col = 'm.xsalesnum';
            if($col=='by Date')
                $col = 'm.xdate';
            if($text==""){
                echo json_encode(array('message'=>$this->model->txnsearchall(),'result'=>'success'));
            }else{
            echo json_encode(array('message'=>$this->model->txnsearch($col, $text),'result'=>'success'));
            }
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
            if(Session::get('postoken')!=$token){
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

    function getmystock(){
         $text = $_POST['searchtext'];
        
         $token = $_POST['token'];
        try{
            if(Session::get('postoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
        
            echo json_encode(array('message'=>$this->model->mystock($text),'result'=>'success'));
        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }

    function showtxndetail(){
        $invoiceno = $_POST['invoice'];
        $token = $_POST['token'];

        try{
            if(Session::get('postoken')!=$token){
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
           if(Session::get('postoken')!=$token){
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
            if(Session::get('postoken')!=$token){
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
            $dt['xdoc']=2;
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
        
        $refrin = $_POST['refrin'];

        $invno = $_POST['invoice'];

        //Logdebug::appendlog(Session::get('suser')." - ".$invno); 

        //$invsl = $this->model->getinvoiceno()[0]['xinvno'];
        
        //$invno = Session::get('sdistrisl')."-".$invsl;

        $stno = $this->model->getSatementNo();
         
        try{

            if($refrin==""){
                throw new Exception(serialize(array('field'=>'Ref. RIN', 'response'=>' is rquired!')));
            }
               
            $rindt = $this->model->getrindt($refrin);
            
            if(count($rindt)==0){
                throw new Exception(serialize(array('field'=>'Ref. RIN', 'response'=>' not registered in database!')));
            }
            //
            if(Session::get('postoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
            
            $invoicedt = $this->model->getinvoicedetail($invno);
            //Logdebug::appendlog(serialize($invoicedt)); 
            if(count($invoicedt['header'])==0){
                throw new Exception(serialize(array('field'=>'Invoice', 'response'=>' can not be confirmed! Not created!')));
            }
           
            if($invoicedt['header'][0]['status']=='Confirmed'){
                throw new Exception(serialize(array('field'=>'Invoice status already', 'response'=>' confirmed! can not be Confirmed!')));
            }

            if(count($invoicedt['detail'])==0){
                throw new Exception(serialize(array('field'=>'Invoice', 'response'=>' can not be confirmed! please add items in the cart!')));
            }
            $totalbv = 0;
            foreach($invoicedt['detail'] as $key=>$val){
                $totalbv+=floatval($val['bv']);
            }
            $date = date('Y-m-d');

            
            $data = array(
                'bizid'=>100,
                'xcus' => $invoicedt['header'][0]['cin'],
                'point' => $totalbv,
                'xdocnum'=>$invno,
                'xdoctype'=>'POS Sales',
                'xsign'=>1,
                'xdate'=>$date,
                'stno'=>$stno,
                'zemail'=>Session::get('suser')
            );

            $comdata = array(
                'bizid'=>100,
                'xrdin' => $refrin,
                'distrisl' => $rindt[0]['distrisl'],
                'xdocnum'=>$invno,
                'xcomtype'=>'Spot Promotion',
                'xcom'=>$totalbv,
                'xpaid'=>0,
                'xdate'=>$date,
                'stno'=>$stno,
                'xsrctaxpct'=>0
            );

            $success = $this->model->confirm($invno,$refrin);

            if($totalbv>0){
                $success = $this->model->createtxn('mlmbv',$data);
                $success = $this->model->createtxn('mlmtotrep',$comdata);
            }

            if($success>0){
                echo json_encode(array('message'=>'Confirmed successfully!','result'=>'success'));
            }


        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }

    function getrefrin($rin=""){
        if($rin==""){
            echo json_encode(array('message'=>'No RIN to search!','result'=>'error'));
            exit;
        }

        $rindt = $this->model->getrindt($rin);

        if(count($rindt)>0){
            echo json_encode(array('message'=>$rindt[0]['xorg'],'result'=>'success'));
        }else{
            echo json_encode(array('message'=>'RIN is not registered!','result'=>'error'));
        }
    }

    function deletecartitem(){
        $item = $_POST['itemcode'];
       
        $token = $_POST['token'];

        $invsl = $this->model->getinvoiceno()[0]['xinvno'];
        
        $invno = Session::get('sdistrisl')."-".$invsl;

       try{
           if(Session::get('postoken')!=$token){
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

   function printinvoice($invoice){        
        $this->view->invdata = $this->model->getinvoicedetail($invoice);
        $this->view->render("rawtemplate","abr/invoice_view");
   }

    function script(){
        return "
        <script>
            var cartitems = {};
            var filterresult=[];
            var carttotal = 0;

            function loadinvoice(){
                $.ajax({
                        
                    url:\"".URL."pos/loadinvoicedata\", 
                    type : \"GET\", 
                    dataType: \"json\",                                 				
                    //data : {}, // post data || get data                    
                    beforeSend:function(){	
                        loaderon();   
                    },
                    success : function(result) {
                       // console.log(result)
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
                $('#invoiceno').html(cartitems['invoiceno'])
                var today = new Date();
                $('#entrydate').html(today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear())
                $('#cin').html('')
                $('#cinname').html('')   
                if(cartitems['header'].length!=0){
                    
                    $('#entrydate').html(cartitems['header'][0]['entrydate'])
                    $('#cin').html(cartitems['header'][0]['cin'])
                    $('#cinname').html(cartitems['header'][0]['cusname'])   
                }
                carttotal = 0;
                var totalbv = 0;
                if(cartitems['detail'].length!=0){
                    
                    $.each(cartitems['detail'], function(key, val){
                        carttotal+=parseFloat(val['total'])
                        totalbv+=parseFloat(val['bv'])
                        $('#carttable tbody').append(`<tr>
                        <td>`+val['itemcode']+`&nbsp;`+val['itemdesc']+`</td>
                        <td>`+val['qty']+`</td>
                        <td>`+val['rate']+`</td>
                        <td>`+val['total']+`</td>
                        <td>`+val['bv']+`</td>
                        <td><a href=\"javascript:void(0)\" onclick=\"deleteitem('`+val['itemcode']+`')\">X</a></td>
                        </tr>`)
                    })
                    
                }
                $('#carttotal').html(`<strong>`+carttotal+`</strong>`)
                $('#totalbv').html(`<strong>`+totalbv+`</strong>`)
            }
            $(document).ready(function(){   
                carttotal = 0;
                loadinvoice();

                $('#confirmsales').on('click', function(){
                    //alert( $('#invoiceno').html())
                    $.ajax({
                        
                        url:\"".URL."pos/confirmsales\", 
                        type : \"POST\",                                  				
                        data : {refrin:$('#refrin').val(), invoice: $('#invoiceno').html(),token: $('#token').val()}, // post data || get data                    
                        beforeSend:function(){	
                            loaderon();   
                        },
                        success : function(result) {
                           //console.log(result)
                            loaderoff();
                            const resultobj = JSON.parse(result);
                            if(resultobj['result']=='success'){
                                loadinvoice()
                                
                            }else{
                                console.log(resultobj['message'])
                            }
                            
                        },error: function(xhr, resp, text) {
                            loaderoff();
                            
                        }
                    })
                })
                
                $('#btnadd').on('click', function(){
                    $('#cin').html('')
                    $('#cinname').html('')
                    $.ajax({
                        
                        url:\"".URL."pos/showcustomer\", 
                        type : \"POST\",                                  				
                        data : {searchtext:$('#searchtext').val(), token: $('#token').val()}, // post data || get data                    
                        beforeSend:function(){	
                            loaderon();   
                        },
                        success : function(result) {
                            //console.log(result)
                            loaderoff();
                            const resultobj = JSON.parse(result);
                            if(resultobj['result']=='success'){
                                
                                    if(resultobj['message'].length!=0){
                                        $('#cin').html(resultobj['message'][0]['cin'])
                                        $('#cinname').html(resultobj['message'][0]['cusname'])
                                    }
                                
                            }else{
                                console.log(resultobj['message'])
                            }
                            
                        },error: function(xhr, resp, text) {
                            loaderoff();
                            
                        }
                    })

                })

                
                $('#searchcus').on('click', function(){
                    $('#customertable tbody').html('');
                    $.ajax({
                        
                        url:\"".URL."pos/searchcustomer\", 
                        type : \"POST\",                                  				
                        data : {searchtext:$('#searchtext').val(),searchtype:$('#searchtype').val(), token: $('#token').val()}, // post data || get data                    
                        beforeSend:function(){	
                            loaderon();   
                        },
                        success : function(result) {
                            //console.log(result)
                            loaderoff();
                            const resultobj = JSON.parse(result);
                            if(resultobj['result']=='success'){
                                $.each(resultobj['message'], function(key, val){
                                    $('#customertable tbody').append(`<tr><td>`+val['cin']+`</td><td>`+val['cusname']+`</td><td>`+val['mobile']+`</td><td><a href=\"javascript:void(0)\" onclick=\"showcustomer(\``+val['cin']+`\`,\``+val['cusname']+`\`)\">Add</a></td></tr>`);
                                    
                                })
                            }else{
                                console.log(resultobj['message'])
                            }
                            
                        },error: function(xhr, resp, text) {
                            loaderoff();
                            
                        }
                    })
                })
                
                $('#btnitemsearch').on('click', function(){
                    $('#tblitemsearch tbody').html('');
                    $.ajax({
                        
                        url:\"".URL."pos/getmystock\", 
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

                                var aresult = [];
                                resultobj['message'].reduce(function(res, value) {
                                    if (!res[value.itemcode]) {
                                        res[value.itemcode] = { itemcode: value.itemcode,itemdesc: value.itemdesc, qty: 0 };
                                        aresult.push(res[value.itemcode])
                                    }
                                    res[value.itemcode].qty += parseInt(value.qty);
                                    return res;
                                    }, {});

                                    filterresult = aresult;
                                    //console.log(aresult)
                                    renderitemstock(aresult)
                                
                            }else{
                                console.log(resultobj['message'])
                            }
                            
                        },error: function(xhr, resp, text) {
                            loaderoff();
                            
                        }
                    })
                })

                $('#refrin').on('blur', function(){
                    var refrin=$(this).val()
                    $('#refname').html('')
                    $.ajax({
                        
                        url:\"".URL."pos/getrefrin/\"+refrin, 
                        type : \"GET\",                                  				
                        datatype:'json',
                        beforeSend:function(){	
                            loaderon();   
                        },
                        success : function(result) {
                            //console.log(result)
                            loaderoff();
                            const resultobj = JSON.parse(result);
                            if(resultobj['result']=='success'){
                                $('#refname').html(resultobj['message'])
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
                      
                     $.each(filterItems(filterresult, $(this).val()), function(key,val){
                         if(parseInt(val['qty'])>0)
                            $('#tblitemsearch tbody').append(`<tr><td><img src=\"".URL."public/images/productimage/`+val['itemcode']+`.jpg\" onerror=\"this.src='noimages.png';\" height=\"60\" width=\"60\"></td><td class=\"align-middle\">`+val['itemcode']+`</td><td class=\"align-middle\">`+ val['itemdesc']+`</td><td class=\"align-middle text-center\"><input type=\"text\" value=\"1\" class=\"form-control form-control-sm\" >`+val['qty']+`</td><td class=\"align-middle\"><a id=\"`+val['itemcode']+`\" href=\"javascript:void(0)\" onclick=\"savecart($(this))\"><i class=\"fa fa-cart-plus\"></i></a></td></tr>`);
                     })
                  });


                  $('#searchtxn').on('click', function(){
                    $('#txntable tbody').html('');
                    $.ajax({
                        
                        url:\"".URL."pos/searchtxn\", 
                        type : \"POST\",                                  				
                        data : {searchtext:$('#searchbystr').val(),searchtype:$('#searchbytype').val(), token: $('#token').val()}, // post data || get data                    
                        beforeSend:function(){	
                            loaderon();   
                        },
                        success : function(result) {
                            //console.log(result)
                            loaderoff();
                            const resultobj = JSON.parse(result);
                            if(resultobj['result']=='success'){
                                $.each(resultobj['message'], function(key, val){
                                    $('#txntable tbody').append(`<tr><td>`+val['txndate']+`</td><td>`+val['txnnum']+`</td><td>`+val['cin']+`</td><td>`+val['cusname']+`</td><td>`+val['mobile']+`</td><td><a href=\"javascript:void(0)\" onclick=\"c(\``+val['txnnum']+`\`)\">View Detail</a></td><td><a target=\"_blank\" href=\"".URL."pos/printinvoice/`+val['txnnum']+`\">Print</a></td></tr>`);
                                    
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

            function renderitemstock(aresult){
                $('#tblitemsearch tbody').html('')
                $.each(aresult, function(key, val){

                    if(parseInt(val['qty'])>0)
                        $('#tblitemsearch tbody').append(`<tr><td><img src=\"".URL."public/images/productimage/`+val['itemcode']+`.jpg\" onerror=\"this.src='noimages.png';\" height=\"60\" width=\"60\"></td><td class=\"align-middle\">`+val['itemcode']+`</td><td class=\"align-middle\">`+ val['itemdesc']+`</td><td class=\"align-middle text-center\"><input type=\"text\" value=\"1\" class=\"form-control form-control-sm\">`+val['qty']+`</td><td class=\"align-middle\"><a id=\"`+val['itemcode']+`\" href=\"javascript:void(0)\" onclick=\"savecart($(this))\"><i class=\"fa fa-cart-plus\"></i></a></td></tr>`);
                    
                })
            }
            
            function showcustomer(cin, cusname){
                $('#cin').html('')
                $('#cinname').html('')
                $('#cin').html(cin)
                $('#cinname').html(cusname)
            }

            function savecart(_this){
                var vqty = _this.parent().parent().children().children('input').val();
                var vitemcode = _this.attr('id');
                var vcus = $('#cin').html();

                $.ajax({
                        
                    url:\"".URL."pos/saveinvoice\", 
                    type : \"POST\",                                  				
                    data : {itemcode: vitemcode, cus: vcus, qty: vqty, token: $('#token').val()}, 
                    beforeSend:function(){	
                        loaderon();   
                    },
                    success : function(result) {
                        //console.log(result)
                        loaderoff();
                        const resultobj = JSON.parse(result);
                        if(resultobj['result']=='success'){
                            loadinvoice()
                            currentitemstock(vitemcode, _this)
                        }else{
                            console.log(resultobj['message'])
                        }
                        
                    },error: function(xhr, resp, text) {
                        loaderoff();
                        
                    }
                })

            }

            function currentitemstock(vitemcode){
                $.ajax({
                        
                    url:\"".URL."pos/getitemstock\", 
                    type : \"POST\",                                  				
                    data : {itemcode: vitemcode, token: $('#token').val()}, 
                    beforeSend:function(){	
                        loaderon();   
                    },
                    success : function(result) {
                        //console.log(result)
                        loaderoff();
                        const resultobj = JSON.parse(result);
                        if(resultobj['result']=='success'){
                            
                            $.each(filterresult, function(key, val){
                                if(val['itemcode']==vitemcode){
                                    filterresult[key]['qty']=resultobj['message'][0]['stock']
                                    renderitemstock(filterresult)
                                    return true;
                                }
                            })
                            
                        }else{
                            //console.log(resultobj['message'])
                        }
                        
                    },error: function(xhr, resp, text) {
                        loaderoff();
                        
                    }
                })
            }

            function deleteitem(vitemcode){
                
                $.ajax({
                        
                    url:\"".URL."pos/deletecartitem\", 
                    type : \"POST\",                                  				
                    data : {itemcode: vitemcode, token: $('#token').val()}, 
                    beforeSend:function(){	
                        loaderon();   
                    },
                    success : function(result) {
                        //console.log(result)
                        loaderoff();
                        const resultobj = JSON.parse(result);
                        if(resultobj['result']=='success'){
                            
                            $.each(cartitems['detail'], function(key, val){
                                if(val['itemcode']==vitemcode){                                    
                                    cartitems['detail'].splice(key,1);
                                    loadintable()
                                    currentitemstock(vitemcode)
                                    return true;
                                }
                            })
                            
                        }else{
                            //console.log(resultobj['message'])
                        }
                        
                    },error: function(xhr, resp, text) {
                        loaderoff();
                        
                    }
                })
            }

            function showinvoiceitem(vinvoice){
                $('#modalinvoicedt tbody').html('')
                $.ajax({
                        
                    url:\"".URL."pos/showtxndetail\", 
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
            
        </script>
        ";
    }
}