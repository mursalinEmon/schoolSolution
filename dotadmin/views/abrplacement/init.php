<div class="page-wrapper">
		<div class="page-title">
			<div class="panel br-20x panel-default">
				<div class="panel-head">
					<div class="panel-title">
						<div class="row">
							Search Team Member
						</div>
					</div>		
				</div>
				<div class="panel-wrapper">
					<div class="panel-body">						
						<div class="row">
									<div class="col-4">
									        <div class="input-group">
                                                <input type="text" name="bin" id="bin" class="form-control form-control-sm" placeholder="Search by bin">                                                
                                            </div>                                            
									</div>
									
									<input type="hidden" id="token" value="<?php echo $this->token; ?>">
									<button  id="search"  class="btn btn-sm btn-primary btn-pill"><i class="fa fa-search mr-1"></i>Search</button>
						</div>
					</div>
				</div>
			</div>
		</div>
<div class="page-body">                    
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6" id="rootnode">
			<div class="panel br-20x panel-default">
				<div class="panel-head">
					<div class="panel-title">
						<div class="row">
							<div class="col-4">
								<img id="imgupline" onerror="this.src='noimages.png';" class="rounded-circle" height="60" alt="">
							</div>
							<div class="col-8">
								<div><p class="panel-title-text" id="rootfullname"> </p></div>
								<div><p class="panel-title-text" id="rootmobile"></p></div>
								<div><strong>Upbin: <span id="upbin" class="text-danger"></span></strong>&nbsp;<i class="far fa-arrow-alt-circle-up text-promary"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-wrapper">
					<div class="panel-body">						
						<div class="row">
							<div class="col">
								
								<div><strong><span id="rootrin"></span></strong></div>
								<div><strong><span id="rootbin"></span></strong></div>
								<div><strong><span id="rootbintype"></span></strong></div>
							</div>
							<div class="col">
								<div class="text-success"><strong>Current BV</strong></div>
								<div><strong>Team A:  <span id="rootlcp" class="text-danger"></span></strong></div>
								<div><strong>Team B:  <span id="rootrcp" class="text-danger"></span></strong></div>
							</div>
						</div>		
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col"><strong>Team A:  <span id="rootatotal" class="text-danger"></span></strong></div>
						<div class="col">
						<strong>Team B:  <span id="rootbtotal" class="text-danger"></span></strong>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3"></div>
	</div>
	<div class="row">
		<div class="col-6">
			<div class="panel br-20x panel-default" id="leftnode">
				<div class="panel-head">
					<div class="panel-title">
						<div class="row">
							<div class="col d-inline-flex">
								<img id="imgleft" onerror="this.src='noimages.png';" class="rounded-circle" height="60" alt="">
								<h1 class="text-primary">A</h1>
							</div>
							<div class="col">
								<div><p id="leftfullname" class="panel-title-text"> </p></div>
								<div><p id="leftmobile" class="panel-title-text"> </p></div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-wrapper">
					<div class="panel-body">						
						<div class="row">
							<div class="col">
								<div><strong><span id="leftrin"></span></strong></div>
								<div><strong><span id="leftbin" class="text-primary"></span></strong>&nbsp;<i class="far fa-arrow-alt-circle-down text-danger"></i></div>
								<div><strong><span id="leftbintype"></span></strong></div>
								<div><p id="leftasprent" class="panel-title-text"></p></div>
								<div><p id="leftnew" class="panel-title-text"></p></div>
							</div>
							<div class="col">
								<div class="text-success"><strong>Current BV</strong></div>
								<div><strong>Team A:  <span id="leftlcp" class="text-danger"></span></strong></div>
								<div><strong>Team B:  <span id="leftrcp" class="text-danger"></span></strong></div>
							
							</div>
						</div>		
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col"><strong>Team A:  <span id="leftatotal" class="text-danger"></span></strong></div>
						<div class="col">
						<strong>Team B:  <span id="leftbtotal" class="text-danger"></span></strong>
						</div>
					</div>
				</div>
			</div>
				
		</div>		
		<div class="col-6">
		<div class="panel br-20x panel-default" id="rightnode">
				<div class="panel-head">
					<div class="panel-title">
						<div class="row">
							<div class="col d-inline-flex">
								<img id="imgright" onerror="this.src='noimages.png';" class="rounded-circle" height="60" alt="">
								<h1 class="text-primary">B</h1>
							</div>
							<div class="col-8">
								<div><p id="rightfullname" class="panel-title-text"> </p></div>
								<div><p id="rightmobile" class="panel-title-text"> </p></div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-wrapper">
					<div class="panel-body">						
						<div class="row">
						<div class="col">
								<div><strong><span id="rightrin"></span></strong></div>
								<div><strong><span id="rightbin" class="text-primary"></span></strong>&nbsp;<i class="far fa-arrow-alt-circle-down text-danger"></i></div>
								<div><strong><span id="rightbintype"></span></strong></div>
								<div><p id="rightasprent" class="panel-title-text"> </p></div>
								<div><p id="rightnew" class="panel-title-text"> </p></div>
							</div>
							<div class="col">
								<div class="text-success"><strong>Current BV</strong></div>
								<div><strong>Team A:  <span id="rightlcp" class="text-danger"></span></strong></div>
								<div><strong>Team B:  <span id="rightrcp" class="text-danger"></span></strong></div>
							</div>
						</div>		
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col"><strong>Team A:  <span id="rightatotal" class="text-danger"></span></strong></div>
						<div class="col">
						<strong>Team B:  <span id="rightbtotal" class="text-danger"></span></strong>
						</div>
					</div>
				</div>
			</div>
				
		</div>
			<div class="modal fade" id="modalpin">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Existing Retailer Placement</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
						<div class="modal-body">
							<div>
									<div class="col-12">
									        <div class="input-group">
												<input type="password" name="pin" id="pin" class="form-control form-control-sm"  placeholder="PIN to confirm">   
													
												<input type="hidden" id="cbin"> 												
												<input type="hidden" id="side"> 
												                                                                                    
											</div> 
											<p class="mt-1">Balance BV: <span id="balbv"></span></p>                                             
									</div>
										<div class="col-12">
											
												<div class="radio pb-2 row ml-3 mt-2">
													<fieldset id="retailertype">
														<div class="row">															
															<div class="custom-control custom-radio mb-3">
																<input type="radio" name="retailertype" value="WelcomeRetailer" class="custom-control-input retailertype" id="welcome">
																<label class="custom-control-label" for="welcome">Welcome</label>
															</div>
															<div class="custom-control custom-radio mb-3">
																<input type="radio" name="retailertype" value="ExpressRetailer" class="custom-control-input retailertype" id="express">
																<label class="custom-control-label" for="express">Express</label>
															</div>
															<div class="custom-control custom-radio mb-3">
																<input type="radio" name="retailertype" value="PreRetailer" class="custom-control-input retailertype" id="preretailer">
																<label class="custom-control-label" for="preretailer">Pre Retailer</label>
															</div>
															<div class="custom-control custom-radio mb-3">
																<input type="radio" name="retailertype" value="Primary" class="custom-control-input retailertype" id="primary">
																<label class="custom-control-label" for="primary">Primary</label>
															</div>
															<div class="custom-control custom-radio mb-3">
																<input type="radio" name="retailertype" value="Regular" class="custom-control-input retailertype" checked id="regular">
																<label class="custom-control-label" for="regular">Regular</label>
															</div>
														</div>
													</fieldset>
												</div>  
											
										</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" id="savesaupline" class="btn btn-success">Save changes</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modalnew">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">New Retailer Placement</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
						<div class="modal-body">
							<div>
									
									<div class="col-12">									        
										<input type="text" name="nrin" id="nrin" class="form-control form-control-sm"  placeholder="RIN">
									</div>
									<div class="col-12">												
										<label  id="retailername"></label> 									                           
									</div>									
									<div class="col-12">
									    <input type="password" name="npin" id="npin" class="form-control form-control-sm"  placeholder="PIN to confirm">   
										<input type="hidden" id="ncbin"> 												
										<input type="hidden" id="nside">  
										<p>Balance BV: <span id="nbalbv"></span></p>
									</div>									
									
										<div class="col-12">
											
												<div class="radio pb-2 row ml-3 mt-2">
													<fieldset id="newretailertype">
														<div class="row">
															<div class="custom-control custom-radio mb-3">
																<input type="radio" name="newretailertype" value="WelcomeRetailer" class="custom-control-input newretailertype" id="newwelcome">
																<label class="custom-control-label" for="newwelcome">Welcome</label>
															</div>
															<div class="custom-control custom-radio mb-3">
																<input type="radio" name="newretailertype" value="ExpressRetailer" class="custom-control-input newretailertype" id="newexpress">
																<label class="custom-control-label" for="newexpress">Express</label>
															</div>
															<div class="custom-control custom-radio mb-3">
																<input type="radio" name="newretailertype" value="PreRetailer" class="custom-control-input newretailertype" id="newpreretailer">
																<label class="custom-control-label" for="newpreretailer">Pre Retailer</label>
															</div>
															<div class="custom-control custom-radio mb-3">
																<input type="radio" name="newretailertype" value="Primary" class="custom-control-input newretailertype" id="newprimary">
																<label class="custom-control-label" for="newprimary">Primary</label>
															</div>
															<div class="custom-control custom-radio mb-3">
																<input type="radio" name="newretailertype" value="Regular" class="custom-control-input newretailertype" checked id="newregular">
																<label class="custom-control-label" for="newregular">Regular</label>
															</div>
														</div>
													</fieldset>
												</div>  
											
										</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" id="savenew" class="btn btn-success">Save changes</button>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
</div>