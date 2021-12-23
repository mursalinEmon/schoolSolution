<?php
class Companyrpt extends Controller{
    function __construct(){
        parent::__construct();

        Session::init();
		$this->view->script = $this->script();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }
    }

    public function init(){
        $this->view->render("templateadmin","companyreport/init");
    }

    public function showgendata(){
        $edt = $_POST['edate'];
        $ed =  strtotime($edt);                
        $date = date('Y-m-d', $ed);
        //Logdebug::appendlog(Session::get('sbranch'));
        $this->model->gendata($date);
    }

    public function showofferdata(){
        $edt = $_POST['edate'];
        $ed =  strtotime($edt);                
        $date = date('Y-m-d', $ed);
        //Logdebug::appendlog($date);
        $this->model->offerdata($date);
    }

    private function script(){
        return "<script>
            
              $(document).ready(function() {

               $('#divreporttable').hide();
               $('#divreporttableoffer').hide()
                

               var table = $('#reporttable').DataTable({
                \"pageLength\": 100,
                
                \"columnDefs\": [
                    { \"title\": \"Date\", \"targets\": 0 },
                    { \"title\": \"Hour Ending\", \"targets\": 1 },
                    { \"title\": \"Time\", \"targets\": 2 },
                    { \"title\": \"Plant 1\", \"targets\": 3 },
                    { \"title\": \"Plant 2\", \"targets\": 4 },
                    { \"title\": \"Company\", \"targets\": 5 }
                ],
                \"columns\": [
                    { \"data\": \"xdate\" },
                    { \"data\": \"xhourending\" },
                    { \"data\": \"xtime\" },
                    { \"data\": \"xplant1\" },
                    { \"data\": \"xplant2\" },
                    { \"data\": \"xcompany\" }
                ]
            });

            var offertable = $('#reporttableoffer').DataTable({
                    
                \"pageLength\": 100,
                
                \"columnDefs\": [
                   
                    { \"title\": \"Hour Ending\", \"targets\": 0 },
                    { \"title\": \"B0 Price\", \"targets\": 1 },
                    { \"title\": \"B0 Vol\", \"targets\": 2 },
                    { \"title\": \"B1 Price\", \"targets\": 3 },
                    { \"title\": \"B1 Vol\", \"targets\": 4 },
                    { \"title\": \"B2 Price\", \"targets\": 5 },
                    { \"title\": \"B2 Vol\", \"targets\": 6 },
                    { \"title\": \"B3 Price\", \"targets\": 7 },
                    { \"title\": \"B3 Vol\", \"targets\": 8 },
                    { \"title\": \"B4 Price\", \"targets\": 9 },
                    { \"title\": \"B4 Vol\", \"targets\": 10 },
                    { \"title\": \"B5 Price\", \"targets\": 11 },
                    { \"title\": \"B5 Vol\", \"targets\": 12 },
                    { \"title\": \"B6 Price\", \"targets\": 13 },
                    { \"title\": \"B6 Vol\", \"targets\": 14 }
                ],
                \"columns\": [
                    
                    { \"data\": \"xhourending\" },
                    { \"data\": \"xpriceb0\" },
                    { \"data\": \"xvolumeb0\" },
                    { \"data\": \"xpriceb1\" },
                    { \"data\": \"xvolumeb1\" },
                    { \"data\": \"xpriceb2\" },
                    { \"data\": \"xvolumeb2\" },
                    { \"data\": \"xpriceb3\" },
                    { \"data\": \"xvolumeb3\" },
                    { \"data\": \"xpriceb4\" },
                    { \"data\": \"xvolumeb4\" },
                    { \"data\": \"xpriceb5\" },
                    { \"data\": \"xvolumeb5\" },
                    { \"data\": \"xpriceb6\" },
                    { \"data\": \"xvolumeb6\" }
                ]
            })
        
            $('#search').on('click', function(){
                var optype = $('#role').val();
                if(optype=='Generation Data'){
                    
                        $('#divreporttableoffer').hide()
                        $('#divreporttable').show();
                        $('#tbltitle').text('Generation Report');
                        $.ajax({
                        
                            url:\"".URL."companyreport/showgendata/\", 
                            type : \"POST\",                                  				
                            data : {edate: $('#datesearch').val()}, // post data || get data                    
                            beforeSend:function(){
                                loaderon();   
                            },
                            success : function(result) {
                                
                                loaderoff();
                                const resultobj = JSON.parse(result);
                                
                                offertable.clear().draw();
                                table.clear().draw();
                                
                                    table.rows.add(resultobj).draw();
                                
                                
                            },  
                            error: function(xhr, resp, text) {
                                loaderoff();
                                console.log(xhr, resp, text);
                            }
                        })
                    }
                    if(optype=='Offer Data'){
                        if('".Session::get('sbranch')."'=='Company 1'){
                            offertable.columns( [5,6,9,10,13,14] ).visible( false );
                        }
                        if('".Session::get('sbranch')."'=='Company 2'){
                            offertable.columns( [1,2,3,4,7,8,11,12] ).visible( false );
                        }

                        $('#divreporttable').hide();
                $('#divreporttableoffer').show();
                $('#tbltitle').text('Offer Report');
                $.ajax({
                   
                    url:\"".URL."companyreport/showofferdata/\", 
                    type : \"POST\",                                  				
                    data : {edate: $('#datesearch').val()}, // post data || get data                    
                    beforeSend:function(){
                        loaderon();   
                    },
                    success : function(result) {
                        
                        loaderoff();
                        const resultobj = JSON.parse(result);
                        
                        table.clear().draw();
                        
                        offertable.clear().draw();
                        //console.log(resultobj)
                        offertable.rows.add(resultobj).draw();
                        
                        
                    },  
                    error: function(xhr, resp, text) {
                        loaderoff();
                        console.log(xhr, resp, text);
                    }
                })
                    }
            });

            
        
            } );
        </script>";
    }
}