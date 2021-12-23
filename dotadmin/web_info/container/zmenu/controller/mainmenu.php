<?php 
class Mainmenu extends Controller{

	function __construct(){
		parent::__construct();
        
        $this->view->script = $this->script();
        
        Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }

    }


    function init(){
       
        $this->view->render("templateadmin","abr/dashboard_view");
        
    }
    
    



    function logout(){			
        $biz = Session::get('sbizid');
        Session::destroy();
        header('location: '. URL .'adminlogin');
        exit;
    }

    

    public function script(){
        return "
            <script>
            // $(document).ready(function() {
            //     loadtodaycom()
            //     mybalance()
            // var table = $('#bintable').DataTable({
            //     \"pageLength\": 10,
                
            //     \"columnDefs\": [
            //         { \"title\": \"BIN\", \"targets\": 0 },
            //         { \"title\": \"BIN Type\", \"targets\": 1 },
            //         { \"title\": \"BIN BV\", \"targets\": 2 },
            //         { \"title\": \"Toal BV Team A\", \"targets\": 3 },
            //         { \"title\": \"Toal BV Team B\", \"targets\": 4 },
            //         { \"title\": \"BIN Rank\", \"targets\": 5 }
            //     ],
            //     \"columns\": [
            //         { \"data\": \"bin\" },
            //         { \"data\": \"binstatus\" },
            //         { \"data\": \"binpoint\" },
            //         { \"data\": \"abv\" },
            //         { \"data\": \"bbv\" },
            //         { \"data\": \"executivetype\" }
            //     ]
            // });

            //loadbinlist();

            //loadgentotal();

            //loadtodaysjoin();

            // function loadgentotal(){
            //     $.ajax({
                            
            //         url:\"".URL."mainmenu/loadgensum/\", 
            //         type : \"GET\",                                  				
            //         //data : {edate: $('#datesearch').val()}, // post data || get data 
            //         datatype:'json',                     
            //         beforeSend:function(){
            //             loaderon();   
            //         },
            //         success : function(result) {
            //             //console.log(result)
            //             loaderoff();
            //             const resultobj = JSON.parse(result);
            //             $('#gen1').html(resultobj['gen1'])
            //             $('#gen2').html(resultobj['gen2'])
            //             $('#gen3').html(resultobj['gen3'])
            //             $('#gen4').html(resultobj['gen4'])
            //             $('#gen5').html(resultobj['gen5'])
            //         },  
            //         error: function(xhr, resp, text) {
            //             loaderoff();
            //             console.log(xhr, resp, text);
            //         }
            //     })
            // }

            // $('#btnreload').on('click', function(){
            //     loadtodaycom()
            //     loadtodaysjoin()
            // })
            
            function mybalance(){
                $.ajax({
                            
                    url:\"".URL."mainmenu/mybalance/\", 
                    type : \"GET\",                                  				
                    //data : {edate: $('#datesearch').val()}, // post data || get data 
                    datatype:'json',                     
                    beforeSend:function(){
                        loaderon();   
                    },
                    success : function(result) {
                        //console.log(result)
                        loaderoff();
                        const resultobj = JSON.parse(result);
                        console.log(resultobj)
                        $('#mybv').html(resultobj['mybv'])
                        $('#myospbv').html(resultobj['myospbv'])
                        $('#mypbal').html(resultobj['myapacc'])
                    },  
                    error: function(xhr, resp, text) {
                        loaderoff();
                        console.log(xhr, resp, text);
                    }
                })
            }

            function loadtodaycom(){
                $.ajax({
                            
                    url:\"".URL."mainmenu/loadtodaycom/\", 
                    type : \"GET\",                                  				
                    //data : {edate: $('#datesearch').val()}, // post data || get data 
                    datatype:'json',                     
                    beforeSend:function(){
                        loaderon();   
                        $('#todaypromolist').html('')
                    },
                    success : function(result) {
                       //console.log(result)
                        loaderoff();
                        const resultobj = JSON.parse(result);
                        var totexp = 0
                        $.each(resultobj, function(key, val){
                            console.log(parseFloat(val['com']))
                            totexp += parseFloat(val['com'])
                            $('#todaypromolist').append(
                                `<div class=\"content\">
                                    <div class=\"row align-items-center\">
                                        <div class=\"col\">
                                            <h5 class=\"title\"> 
                                           `+val['comtype']+`</h5>
                                        </div>
                                        <div class=\"col text-right\">
                                            <div class=\"text-primary\"><strong>`+val['com']+`</strong> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>` 
                            )
                        })
                        $('#todaypromototal').html(totexp)
                    },  
                    error: function(xhr, resp, text) {
                        loaderoff();
                        console.log(xhr, resp, text);
                    }
                })
            }

            function loadtodaysjoin(){
                $.ajax({
                            
                    url:\"".URL."mainmenu/loadtodayjoin/\", 
                    type : \"GET\",                                  				
                    //data : {edate: $('#datesearch').val()}, // post data || get data 
                    datatype:'json',                     
                    beforeSend:function(){
                        loaderon();   
                    },
                    success : function(result) {
                        //console.log(result)
                        loaderoff();
                        const resultobj = JSON.parse(result);
                        //console.log(resultobj)
                            var asum=0;
                            var bsum=0;
                            var asumn=0;
                            var bsumn=0;
                            $.each(resultobj['ateam'], function(key, val){ 
                            //     $('#alist').append(`<li>
                            //     <div class=\"main-icon\"><i class=\"icon-people\"></i></div>
                            //     <div class=\"content\">
                            //         <p><strong>`+val['bin']+`</strong>&nbsp;` +val['retailename']+ `&nbsp;<span class=\"badge badge-success badge-pill\">` +val['bv']+ `</span></p>
                                    
                            //     </div>
                            // </li>`);
                            asum+=parseFloat(val['bv'])
                            })

                            $.each(resultobj['ateamn'], function(key, val){ 
                                asumn+=parseFloat(val['bv'])
                            })
                            console.log(asumn)
                            $.each(resultobj['bteam'], function(key, val){ 
                            //     $('#blist').append(`<li>
                            //     <div class=\"main-icon\"><i class=\"icon-people\"></i></div>
                            //     <div class=\"content\">
                            //         <p><strong>`+val['bin']+`</strong>&nbsp;` +val['retailename']+ `&nbsp;<span class=\"badge badge-success badge-pill\">` +val['bv']+ `</span></p>
                                    
                            //     </div>
                            // </li>`);
                            bsum+=parseFloat(val['bv'])
                            })
                            $.each(resultobj['bteamn'], function(key, val){ 
                                bsumn+=parseFloat(val['bv'])
                            })
                            console.log(bsumn)
                            var atotal = asum+asumn
                            var btotal = bsum+bsumn

                       $('#ateambv').text(atotal)
                       $('#bteambv').text(btotal)
                        
                    },  
                    error: function(xhr, resp, text) {
                        loaderoff();
                        console.log(xhr, resp, text);
                    }
                })
            }

            
            function loadbinlist(){
                    $.ajax({
                                
                        url:\"".URL."mainmenu/loadbindt/\", 
                        type : \"GET\",                                  				
                        //data : {edate: $('#datesearch').val()}, // post data || get data 
                        datatype:'json',                   
                        beforeSend:function(){
                            loaderon();   
                        },
                        success : function(result) {
                            //console.log(result)
                            loaderoff();
                            const resultobj = JSON.parse(result);
                            
                            
                            table.rows.add(resultobj).draw();
                            
                            
                        },  
                        error: function(xhr, resp, text) {
                            loaderoff();
                            console.log(xhr, resp, text);
                        }
                    })
                }

        });
            </script>
        ";
    }
}

?>