<?php

class Sslcomresult extends Controller{
    function __construct(){
        parent::__construct();
        Session::init();
    }

    public function init(){
        
        
    }

    public function ipnlistner(){
        Logdebug::appendlog(serialize($_POST));
        echo "success";    
    }

    public function success(){

$sslc = new SslCommerzNotification();
$tran_id = $_POST['tran_id'];
$amount =  $_POST['amount'];
$currency =  $_POST['currency'];

// $query = new OrderTransaction();
// $sql = $query->getRecordQuery($tran_id);
// $result = $conn_integration->query($sql);
// $row = $result->fetch_array(MYSQLI_ASSOC);

//if ($row['status'] == 'Pending') {

    $validation = $sslc->orderValidate($tran_id, $amount, $currency, $_POST);
    $tran_id = (string)$tran_id;

    if ($validation == TRUE) {
        // $query = new OrderTransaction();
        // $sql = $query->updateTransactionQuery($tran_id, 'Success');

        // if ($conn_integration->query($sql) === TRUE) {
        //     echo "Payment Record Updated Successfully";
        // } else {
        //     echo "Error updating record: " . $conn_integration->error;
        // }

        echo "<h2 style='color: green; text-align: center;'>Congratulations! Your Transaction is Successful.</h2>";
        ?>
        <table style="border: 1" class="table">
            <thead>
            <tr>
                <th colspan="2">Payment Status</th>
            </tr>
            </thead>
            <tr>
                <td>Transaction ID</td>
                <td><?php echo $_POST['tran_id'] ?></td>
            </tr>
            <tr>
                <td>Card Type</td>
                <td><?php echo $_POST['card_type'] ?></td>
            </tr>
            <tr>
                <td>Bank Transaction ID</td>
                <td><?php echo $_POST['bank_tran_id'] ?></td>
            </tr>
            <tr>
                <td>Card Type</td>
                <td><?php echo $_POST['card_type'] ?></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td><?php echo $_POST['currency_amount'] ?></td>
            </tr>
        </table>
        <?php
    } else {
        // $query = new OrderTransaction();
        // $sql = $query->updateTransactionQuery($tran_id, 'Failed');
        // echo $sql;
        echo "<h2 style='color: #ff0000; text-align: center'>Payment was not valid. Please contact with the merchant.</h2>";
    }
    
// } else if ($row['status'] == 'Success') {
//     echo "This order is already Successful";
// } else {
//     echo "Invalid Information";
// }
        
    }

    

    
}

