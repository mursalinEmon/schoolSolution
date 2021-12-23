
<?php
	$bizid="";
	$bizname="";			
	foreach($this->bizness as $key=>$value){
	  
	   $bizid = $value['bizid'];
	   $bizname = $value['bizlong'];
	}
	
?>


<div id="login" style="padding: 0;">
	<div class="login_form_area">
		<div class="login_contant"> 
			<img class="i__top" src="<?php echo URL; ?>public/images/theme/i_01.png">
			<img class="i__bottom" src="<?php echo URL; ?>public/images/theme/i_02.png">
			<div class="row">
				<div class="col-sm-12 col-md-4 col-xl-4">
					<div class="login_box">
						<img src="<?php echo URL; ?>public/images/biz/doterplogo.png">                        
						<div class="log_form_area"> 
							<div class="bs-docs-section">
								<div class="bs-example">
									<form role="form" action="<?php echo URL; ?>adminlogin/login" method="post">
										<div class="form-group">
											<input type="email" name="login" class="form-control" id="exampleInputEmail1" autocomplete="on" required>
											<span class="form-highlight"></span>
											<span class="form-bar"></span>
											<label class="float-label" for="exampleInputEmail1">Email</label>
										</div>

										<div class="form-group">
											<input type="password" name="password" class="form-control" id="exampleInputEmail1" minlength="6" maxlength="50" autocomplete="on" required>
											<span class="form-highlight"></span>
											<span class="form-bar"></span>
											<label class="float-label" for="exampleInputEmail1">Password</label>
										</div>

										<div class="form-group">
											<input type="text" name="token" class="form-control" id="exampleInputEmail1" autocomplete="on" required>
											<span class="form-highlight"></span>
											<span class="form-bar"></span>
											<label class="float-label" for="exampleInputEmail1">Access Token</label>
										</div>	
										<!-- <a href="<?php echo URL; ?>sendpass/index/<?php echo $bizid; ?>">I forgot my password</a> -->
										<div class="dbbutton">
											<input class="btn btn-raised btn-default ripple-effect" type="submit" value="Log In">
											<input class="btn btn-raised btn-default ripple-effect" type="button" id="accesstoken" value="Request Token">
										</div>		
										<div class="forgot">
											<a href="<?php echo URL; ?>manageadmin"><strong>Back to Directories</strong></a>
										</div>					

                                        <input type="hidden" name="bizid" value="<?php echo $bizid; ?>">
									
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-8 col-xl-8">
				<div class="login_box">
						
						<img class="login__images" src="<?php echo URL; ?>public/images/theme/login__banner.jpeg">
				
						<div class="login__text">
						<h2><strong>DBS</strong></h2>
					<p>Dot DB Solutions has been supporting clients nationwide in managing the evolving role of information technology in business. As a strategic business partner, we provide diversified IT solutions and services that support attainment of our clients’ business objectives. Our services and solutions include, Software development, Total Business IT Solutions, customized application software development, Web Application Development, Database Implementation and Adequate solutions for the clients.  </p>
						</div>
					</div>
				</div>

                
		</div>
        <div class="row text-danger">
                   <strong> <?php echo $bizname; ?></strong>
                </div>
                <br>
 </div>

	</div>