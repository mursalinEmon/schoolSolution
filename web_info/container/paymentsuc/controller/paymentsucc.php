<?php 
class Paymentsucc extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->script=$this->script();
        
    }

    
    function init(){
        
        Session::init();
        $user = Session::get("suser");

        $this->view->info = $this->model->getstudentinfo($user);
	    // echo "Test";die;
        $status = 'Success';
        $this->view->status=$status;
        $this->view->render("webtemplate","paymentsuc/callback");
    } 
    
    function script(){
        return "
        <script>
            $(document).ready(function(){
                console.log('test');
                showitems();
            });


            function showitems(){
                var valid = 0; 
                var carttotal = 1;
                var items = [];
    
                
                
                var cartlist = JSON.parse(sessionStorage.getItem('cartitem'));     
                console.log(cartlist);              
                for(var i=0; i < cartlist.length; i++){
                    items.push(cartlist[i]);
                }
                var cartlist = JSON.parse(sessionStorage.getItem('cartitem'));
                for(var i=0; i < cartlist.length; i++){
                    var itm = cartlist[i].itemcode;
                    $('#table').append(`

                    <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class=\"text-left\">DESCRIPTION</th>
                            <th class=\"text-right\">HOUR PRICE</th>
                            <th class=\"text-right\">HOURS</th>
                            <th class=\"text-right\">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class=\"no\">04</td>
                            <td class=\"text-left\">
                                <h3>
                                    <a target=\"_blank\" href=\"javascript:;\">
                            Youtube channel
                            </a>
                                </h3>
                                <a target=\"_blank\" href=\"javascript:;\">
                               Useful videos
                           </a> to improve your Javascript skills. Subscribe and stay tuned :)</td>
                            <td class=\"unit\">$0.00</td>
                            <td class=\"qty\">100</td>
                            <td class=\"total\">$0.00</td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan=\"2\"></td>
                            <td colspan=\"2\">SUBTOTAL</td>
                            <td>$5,200.00</td>
                        </tr>
                    </tfoot>
                </table>


                    `);
                    
                }
            }
            </script>
        ";
    }

}
?>