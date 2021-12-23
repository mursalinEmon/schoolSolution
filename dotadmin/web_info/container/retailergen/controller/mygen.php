<?php

class Mygen extends Controller{

    private $formfield=array();

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
        Session::set('ttntoken',uniqid());
        $this->view->token=Session::get('ttntoken'); 
        
        $this->view->render("templateadmin","abr/generationlist_view");
    }

    function getgenlist(){
        $serachtype = $_POST['gentype'];
        
        $col = '';
        if($serachtype=='Generation 1'){
            $col = 'refrin';
        }
        if($serachtype=='Generation 2'){
            $col = 'refrin1';
        }
        if($serachtype=='Generation 3'){
            $col = 'refrin2';
        }
        if($serachtype=='Generation 4'){
            $col = 'refrin3';
        }
        if($serachtype=='Generation 5'){
            $col = 'refrin4';
        }

        echo json_encode($this->model->getgendetail($col)); 
    }

    

    function script(){
        return "
            <script>
            var table = $('#gentable').DataTable({
                \"pageLength\": 25,
                
                \"columnDefs\": [
                    { \"title\": \"SL\", \"targets\": 0 },
                    { \"title\": \"RIN\", \"targets\": 1 },
                    { \"title\": \"Name\", \"targets\": 2 },
                    { \"title\": \"Mobile No\", \"targets\": 3 },                         
                    { \"title\": \"BIN\", \"targets\": 4 },                    
                ],
                \"columns\": [
                    { \"data\": \"sl\" },
                    { \"data\": \"rin\" },
                    { \"data\": \"cusname\" },
                    { \"data\": \"mobile\" },
                    { \"data\": \"bin\" }
                ]
            });

            $('#searchtxn').on('click',function(){
                loadbinlist()
            })

            function loadbinlist(){
                $.ajax({
                            
                    url:\"".URL."mygen/getgenlist\", 
                    type : \"POST\",                                  				
                    data : {gentype: $('#gentype').val()}, 
                    datatype:'json',                   
                    beforeSend:function(){
                        loaderon();   
                    },
                    success : function(result) {
                        //console.log(result)
                        loaderoff();
                        table.clear().draw();
                        const resultobj = JSON.parse(result);
                        $.each(resultobj, function(key,val){
                            resultobj[key]['sl']=key
                        })
                        table.rows.add(resultobj).draw();
                        
                        
                    },  
                    error: function(xhr, resp, text) {
                        loaderoff();
                        console.log(xhr, resp, text);
                    }
                })
            }
            </script>
        ";
    }
}