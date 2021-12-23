<div class="container">
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print">
                    <div class="text-end">
                        <button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                    </div>
                    <hr>
                </div>
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:;">
    												<img src="assets/images/ABCL logo.png" width="150" alt="">
												</a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="javascript:;">
									ABCL IT
									</a>
                                    </h2>
                                        <div>L.R Bhaban</div>
                                        <div>1/2 Outer Circular Rd, Dhaka</div>
                                        <div>+8801958536733</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">INVOICE TO:</div>
                                    <h2 class="to"><?php echo $this->info[0]["xstuname"];?></h2>
                                    <div class="address"><?php echo $this->info[0]["xaddress"];?></div>
                                    <div class="address"><?php echo $this->info[0]["xmobile"];?></div>
                                    <div class="email"><a href="mailto:john@example.com"><?php echo $this->info[0]["xstuemail"];?></a>
                                    </div>
                                </div>
                                <!-- <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                    <div class="date">Date of Invoice: 01/10/2018</div>
                                    <div class="date">Due Date: 30/10/2018</div>
                                </div> -->
                            </div>
                            <div id="table">
                                <table>
                                    <thead>
                                        <th>fawf</th>
                                        <th>fawf</th>
                                        <th>fawf</th>

                                    </thead>
                                    <tbody>
                                        <td>affwf</td>
                                        <td>affwf</td>
                                        <td>affwf</td>
                                    </tbody>
                                </table>
                            </div>
                            <div class="thanks" style="margin-top: 100px;">Thank you!</div>
                            <div class="notices">
                                <div>NOTICE:</div>
                                <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                            </div>
                        </main>
                        <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>