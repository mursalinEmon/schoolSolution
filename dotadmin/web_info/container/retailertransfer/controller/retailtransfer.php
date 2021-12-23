<?php

class Retailtransfer extends Controller{

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
        Session::set('ttntoken',uniqid());
        $this->view->token=Session::get('ttntoken'); 
        
        $this->view->render("templateadmin","abr/retailtransfer_view");
    }

    function loadinvoicedata(){
        $invno = "T".Session::get('sdistrisl')."-".$this->model->getinvoiceno()[0]['xinvno'];
        
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
            if(Session::get('ttntoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
            
            if(strlen($text)<4){
                throw new Exception(serialize(array('field'=>'Search By', 'response'=>' minimum 4 characters!')));
            }
            if($col=='by RIN')
                $col = 'xrdin';
            if($col=='by Mobile')
                $col = 'xmobile';
            if($col=='by Name')
                $col = 'xorg';
           
            echo json_encode(array('message'=>$this->model->retailersearch($col, $text),'result'=>'success'));
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
            if(Session::get('ttntoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
            if($col!='All'){
                if($text!=""){
                    if(strlen($text)<4){
                        throw new Exception(serialize(array('field'=>'Search By', 'response'=>' minimum 4 characters!')));
                    }
                }
            }
            //Logdebug::appendlog('tt');
            if($col=='All'){
                echo json_encode(array('message'=>$this->model->txnsearchall(),'result'=>'success'));
            }else{
                if($col=='by Customer Name')
                    $col = 'c.xorg';
                if($col=='by RIN')
                    $col = 'm.xrdin';
                if($col=='by Customer Mobile')
                    $col = 'c.xmobile';
                if($col=='by Txn')
                    $col = 'm.xtransnum';
                if($col=='by Date')
                    $col = 'm.xdate';

                    echo json_encode(array('message'=>$this->model->txnsearch($col, $text),'result'=>'success'));
            }
            
            
            
        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }

    function searchrcvtxn(){
        $text = $_POST['searchtext'];
        $col = $_POST['searchtype'];
        $token = $_POST['token']; 
        try{
            if(Session::get('ttntoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
            if($col!='All'){
                if($text!=""){
                    if(strlen($text)<4){
                        throw new Exception(serialize(array('field'=>'Search By', 'response'=>' minimum 4 characters!')));
                    }
                }
            }
            //Logdebug::appendlog('tt');
            if($col=='All'){
                echo json_encode(array('message'=>$this->model->txnrcvsearchall(),'result'=>'success'));
            }else{
                if($col=='by Customer Name')
                    $col = 'c.xorg';
                if($col=='by RIN')
                    $col = 'm.xrdin';
                if($col=='by Customer Mobile')
                    $col = 'c.xmobile';
                if($col=='by Txn')
                    $col = 'm.xtransnum';
                if($col=='by Date')
                    $col = 'm.xdate';

                    echo json_encode(array('message'=>$this->model->txnrcvsearch($col, $text),'result'=>'success'));
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
        
        $invno = "T".Session::get('sdistrisl')."-".$invsl;
        try{
            if(Session::get('ttntoken')!=$token){
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
            if(Session::get('ttntoken')!=$token){
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
            if(Session::get('ttntoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
        
            echo json_encode(array('message'=>$this->model->gettxndetail($invoiceno),'result'=>'success'));
        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }

    function showrcvdetail(){
        $invoiceno = $_POST['invoice'];
        $token = $_POST['token'];

        try{
            if(Session::get('ttntoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
        
            echo json_encode(array('message'=>$this->model->getrcvdetail($invoiceno),'result'=>'success'));
        }catch(Exception $e){
            $res = unserialize($e->getMessage()); 
		
		    echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
        }
    }

    function getitemstock(){
        $item = $_POST['itemcode'];
       
        $token = $_POST['token'];
       try{
           if(Session::get('ttntoken')!=$token){
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
        
        $invno = "T".Session::get('sdistrisl')."-".$invsl;

        try{
            if(Session::get('ttntoken')!=$token){
                throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
            }
            $invheader = $this->model->getinvoiceheader($invno);
            if(count($invheader)>0){
                if($invheader[0]['xstatus']=='Confirmed'){
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

            $hdata['xtransnum']=$invno;
            $hdata['bizid']=100;
            $hdata['zemail']=Session::get('suser');
            $hdata['xdate']=$date;
            $hdata['xrdin']=$data['xparty'];
            $hdata['stno']=$stno;
            $hdata['xstatus']="Created";
            $hdata['xdoctype']="Retailer Stock Transfer";
            $hdata['xtxnsl']=$invsl;

            $dt['xtxnnum']=$invno;
            $dt['bizid']=100;
            $dt['zemail']=Session::get('suser');
            $dt['xdate']=$date;
            $dt['xrdin']=Session::get('suser');
            $dt['xtoparty']=$data['xparty'];
            $dt['stno']=$stno;
            $dt['xstatus']="Created";
            $dt['xdoctype']="Retailer Stock Transfer";
            $dt['xdocnum']=$invno;
            $dt['xdoc']=3;
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
    

    function confirmtransfer(){
        $token = $_POST['token'];

        $invsl = $this->model->getinvoiceno()[0]['xinvno'];
        
        $invno = "T".Session::get('sdistrisl')."-".$invsl;

        try{

            if(Session::get('ttntoken')!=$token){
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
        
        $invno = "T".Session::get('sdistrisl')."-".$invsl;

       try{
           if(Session::get('ttntoken')!=$token){
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

            function loadinvoice(){
                $.ajax({
                        
                    url:\"".URL."retailtransfer/loadinvoicedata\", 
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
                var carttotal = 0;
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

                loadinvoice();

                $('#confirmsales').on('click', function(){
                    $.ajax({
                        
                        url:\"".URL."retailtransfer/confirmtransfer\", 
                        type : \"POST\",                                  				
                        data : {token: $('#token').val()}, // post data || get data                    
                        beforeSend:function(){	
                            loaderon();   
                        },
                        success : function(result) {
                            console.log(result)
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
                        
                        url:\"".URL."retailtransfer/showcustomer\", 
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
                        
                        url:\"".URL."retailtransfer/searchcustomer\", 
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
                        
                        url:\"".URL."retailtransfer/getmystock\", 
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

                

                $('#searchitem').on('keyup',function(){
                    $('#tblitemsearch tbody').html('');
                    const filterItems = (arr, query) => {
                        return arr.filter(el => el['itemdesc'].toLowerCase().indexOf(query.toLowerCase()) !== -1)
                      }
                      
                     $.each(filterItems(filterresult, $(this).val()), function(key,val){
                        $('#tblitemsearch tbody').append(`<tr><td><img src=\"<?php echo URL;?>public/images/theme/noimages.png\" height=\"60\" width=\"60\"></td><td class=\"align-middle\">`+val['itemcode']+`</td><td class=\"align-middle\">`+ val['itemdesc']+`</td><td class=\"align-middle text-center\"><input type=\"text\" value=\"1\" class=\"form-control form-control-sm\" >`+val['qty']+`</td><td class=\"align-middle\"><a id=\"`+val['itemcode']+`\" href=\"javascript:void(0)\" onclick=\"savecart($(this))\"><i class=\"fa fa-cart-plus\"></i></a></td></tr>`);
                     })
                  });

                  $('#btnrcvtxn').on('click',function(){
                    $('#rcvtable tbody').html('test');
                    $.ajax({
                        
                        url:\"".URL."retailtransfer/searchrcvtxn\", 
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
                                    $('#rcvtable tbody').append(`<tr><td>`+val['txndate']+`</td><td>`+val['txnnum']+`</td><td>`+val['cin']+`</td><td>`+val['cusname']+`</td><td>`+val['mobile']+`</td><td><a href=\"javascript:void(0)\" onclick=\"showrcvitem(\``+val['txnnum']+`\`)\">View Detail</a></td></tr>`);
                                    
                                })
                            }else{
                                console.log(resultobj['message'])
                            }
                            
                        },error: function(xhr, resp, text) {
                            loaderoff();
                            
                        }
                    })
                })

                  $('#searchtxn').on('click', function(){
                    $('#txntable tbody').html('');
                    $.ajax({
                        
                        url:\"".URL."retailtransfer/searchtxn\", 
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
                                    $('#txntable tbody').append(`<tr><td>`+val['txndate']+`</td><td>`+val['txnnum']+`</td><td>`+val['cin']+`</td><td>`+val['cusname']+`</td><td>`+val['mobile']+`</td><td>`+val['totbv']+`</td><td><a href=\"javascript:void(0)\" onclick=\"showinvoiceitem(\``+val['txnnum']+`\`)\">View Detail</a></td></tr>`);
                                    
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
                    $('#tblitemsearch tbody').append(`<tr><td><img src=\"<?php echo URL;?>public/images/theme/noimages.png\" height=\"60\" width=\"60\"></td><td class=\"align-middle\">`+val['itemcode']+`</td><td class=\"align-middle\">`+ val['itemdesc']+`</td><td class=\"align-middle text-center\"><input type=\"text\" value=\"1\" class=\"form-control form-control-sm\">`+val['qty']+`</td><td class=\"align-middle\"><a id=\"`+val['itemcode']+`\" href=\"javascript:void(0)\" onclick=\"savecart($(this))\"><i class=\"fa fa-cart-plus\"></i></a></td></tr>`);
                    
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
                        
                    url:\"".URL."retailtransfer/saveinvoice\", 
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
                            //console.log(resultobj['message'])
                        }
                        
                    },error: function(xhr, resp, text) {
                        loaderoff();
                        
                    }
                })

            }

            function currentitemstock(vitemcode){
                $.ajax({
                        
                    url:\"".URL."retailtransfer/getitemstock\", 
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
                        
                    url:\"".URL."retailtransfer/deletecartitem\", 
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
                        
                    url:\"".URL."retailtransfer/showtxndetail\", 
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

            function showrcvitem(vinvoice){
                $('#modalinvoicedt tbody').html('')
                $.ajax({
                        
                    url:\"".URL."retailtransfer/showrcvdetail\", 
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