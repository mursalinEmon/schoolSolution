<?php
class Mybizstatus extends Controller{
    
    function __construct(){
        parent::__construct();
        Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }

        $this->view->script=$this->script();
    }

    function init(){
        $this->view->render("templateadmin","abr/mybizstatus_view");
    }

    function myrequiredbv(){
        $this->model->requiredbv();
    }

    function script(){
        return "
            <script>

            var table = $('#bintable').DataTable({
                \"pageLength\": 25,
                
                \"columnDefs\": [
                    { \"title\": \"BIN\", \"targets\": 0 },
                    { \"title\": \"BIN Type\", \"targets\": 1 },
                    { \"title\": \"Left Point\", \"targets\": 2 },
                    { \"title\": \"Right Point\", \"targets\": 3 },                         
                    { \"title\": \"Required BV\", \"targets\": 4 },
                    { \"title\": \"Top Matching\", \"targets\": 5 },
                    { \"title\": \"Step\", \"targets\": 6 },
                ],
                \"columns\": [
                    { \"data\": \"bin\" },
                    { \"data\": \"binstatus\" },
                    { \"data\": \"leftpoint\" },
                    { \"data\": \"rightpoint\" },
                    { \"data\": \"lo\" },
                    { \"data\": \"tm\" },
                    { \"data\": \"st\" }
                ]
            });

            $(document).ready(function(){                

                loadbinlist()
            })
            function loadbinlist(){
                $.ajax({
                            
                    url:\"".URL."bizstatus/myrequiredbv\", 
                    type : \"GET\",                                  				
                    //data : {edate: $('#datesearch').val()}, // post data || get data 
                    datatype:'json',                   
                    beforeSend:function(){
                        //loaderon();   
                    },
                    success : function(result) {
                        //console.log(result)
                       //loaderoff();
                        const resultobj = JSON.parse(result);

                        var object = [];
                        $.each(resultobj,function(key, val){
                            if(parseInt(val['basiccom'])>0){
                                
                                if(val['binstatus']=='Regular'){
                                    var cnt = Math.floor(parseInt(val['com'])/5000)
                                    var comcnt = 0
                                    if(parseInt(val['basiccom'])!=0){
                                        comcnt = Math.floor(parseInt(val['basiccom'])/500)
                                    }
                                    var reqbv = 0
                                    var step = 0 
                                    if(comcnt==0){
                                        reqbv = 5000;
                                    }else{
                                        reqbv = 5000-(500*comcnt)
                                        step = (5000-reqbv)/500
                                    }
                                    
                                    resultobj[key]['lo']=reqbv
                                    resultobj[key]['tm']=cnt
                                    resultobj[key]['st']=step
                                }
                                if(val['binstatus']=='Primary'){
                                    var cnt = Math.floor(parseInt(val['com'])/1000)
                                    var reqbv = 0
                                    var step = 0
                                    if(cnt==0){
                                        reqbv = 1000-parseInt(val['com']);
                                    }else{
                                        reqbv = (1000*(cnt+1))-parseInt(val['com'])
                                        step = (1000-reqbv)/100
                                    }
                                    resultobj[key]['lo']=reqbv
                                    resultobj[key]['tm']=cnt
                                    resultobj[key]['st']=step
                                }
                            }else{
                                if(val['binstatus']=='Regular'){
                                    resultobj[key]['lo']=5000
                                    resultobj[key]['tm']=0
                                    resultobj[key]['st']=0
                                }
                                if(val['binstatus']=='Primary'){
                                    resultobj[key]['lo']=1000
                                    resultobj[key]['tm']=0
                                    resultobj[key]['st']=0
                                }
                            }

                        })
                        
                        
                        table.rows.add(resultobj).draw();
                        
                        
                    },  
                    error: function(xhr, resp, text) {
                        //loaderoff();
                        console.log(xhr, resp, text);
                    }
                })
            }
            </script>
        ";
    }

}