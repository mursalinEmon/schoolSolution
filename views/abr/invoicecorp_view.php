<div class="container">
    <div class="page-title">
                
                <div class="panel panel-default">
                    <div class="panel-head">
                        <div class="panel-title">
                            
                            <div style="float: right;"><a class="btn btn-success" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
                        </div>
                    </div>
                    
                </div>
              
    </div>
<div id="invoice">

    
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" >
                            <img src="<?php echo URL;?>public/images/biz/intelliva.png" data-holder-rendered="true" />
                        </a>
                        <h3>Online Sales Invoice</h3>
                        <p>Vat Registration No: 000282438-0208</p>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" >
                            Amarbazar Ltd.
                            </a>
                        </h2>
                        <div>35/C Kashfiya Plaza, 5th & 6th Floor, Dhaka 1000</div>
                        <div>01639000888</br>02-5555252</div>
                        <div>info@amarbazarltd.com</div>
                        
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                    <div class="text-gray-light"><strong>INVOICE NO : <?php echo $this->invdata['invoiceno'];?></strong></div>
                    <div class="to">DATE : <?php echo $this->invdata['header'][0]['entrydate'];?></div>
                        <div class="text-gray-light"><strong>BILL TO:</strong></div>
                        <div class="to">Contact Name : <?php echo $this->invdata['header'][0]['cusname'];?></div>                        
                        <!-- <div class="email">Email :</div>
                        <div class="email">Phone :</div> -->
                    </div>
                    <div class="col invoice-details">
                        <div class="text-gray-light"><strong>SHIP TO:</strong></div>
                        <div class="to">Contact Name : <?php echo $this->invdata['detail'][0]['cusname'];?></div>
                        <div class="to">Company Name : <?php echo $this->invdata['detail'][0]['company'];?></div>
                        <div class="address">Address : <?php echo $this->invdata['detail'][0]['deladd'];?></div>
                        <div class="email">Phone : <?php echo $this->invdata['detail'][0]['mobile'];?></div>
                        <!--<h1 class="invoice-id">INVOICE 3-2-1</h1>
                        <div class="date">Date of Invoice: 01/10/2018</div>
                        <div class="date">Due Date: 30/10/2018</div>-->
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th class="text-left">ITEM CODE</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right">QTY</th>
                            <th class="text-right">Unit Price</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; $total = 0; foreach($this->invdata['detail'] as $key=>$value){ $i++; $total = floatval($value['rate'])*floatval($value['qty']); ?>
                        <tr>
                            <td class="no"><?php echo $i;?></td>
                            <td class="text-left"><?php echo $value['itemcode'];?></td>
                            <td class="unit"><?php echo $value['itemdesc'];?></td>
                            <td class="qty"><?php echo $value['qty'];?></td>
                            <td class="total"><?php echo $value['rate'];?></td>
                            <td class="total"><?php echo floatval($value['rate'])*floatval($value['qty']);?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">TOTAL</td>							
                            <td class="total"><?php echo $total; ?></td>
                            <td></td>
                        </tr>
						
                    </tfoot>
                </table>
                
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.<br>
                Product price is VAT included. 
            </footer>
        </div>
       
        <div></div>
    </div>
</div>

</div>