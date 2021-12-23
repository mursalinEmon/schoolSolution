<div id="login" style="padding: 0;">
	<div class="login_form_area">
		<div class="login_contant"> 
			<img class="i__top" src="<?php echo URL; ?>public/images/theme/i_01.png">
			<img class="i__bottom" src="<?php echo URL; ?>public/images/theme/i_02.png">
			<div class="row">
				<div class="col-sm-12 col-md-4 col-xl-4">
					<div class="login_box">
						<img height="90" width="150" src="<?php echo URL; ?>public/images/biz/DOT-SCHOOL-SOLUTION-PNG.png">
						<div class="log_form_area"> 
							<div class="bs-docs-section">
								<div class="bs-example">
									<form role="form" action="<?php echo URL; ?>adminlogin/login" method="post">
										<div class="form-group">
											<input type="text" name="login" class="form-control" id="exampleInputEmail1" autocomplete="on" required>
											<span class="form-highlight"></span>
											<span class="form-bar"></span>
											<label class="float-label" >Username</label>
										</div>

										<div class="form-group">
											<input type="password" name="password" class="form-control" id="password" minlength="5" maxlength="50" autocomplete="on" required>
											<span class="form-highlight"></span>
											<span class="form-bar"></span>
											<label class="float-label" >Password</label>
										</div>

										<div class="form-group">
										    <input class="form-control" type="text" name="bizid" id="bizid" required>
										    <span class="form-highlight"></span>
											<span class="form-bar"></span>
											<label class="float-label" >Login Code</label>
										</div>
										<div class="form-group">
											<select name="logintype" id="logintype" class="form-control">
												<option value="">--Login Type--</option>
												<option value="Admin">Admin</option>
												<option value="Teacher">Teacher</option>
											</select>
										</div>
										<!-- <a href="<?php //echo URL; ?>sendpass/index/<?php //echo $bizid; ?>">I forgot my password</a> -->
										<div class="dbbutton">
											<input class="btn btn-raised btn-default ripple-effect" type="submit" value="Log In">
											<!-- <input class="btn btn-raised btn-default ripple-effect" type="button" id="accesstoken" value="Request Token"> -->
										</div>		
										<div class="forgot">
											<a href="<?php echo URL; ?>forgotpass"><strong>Forgot Password?</strong></a>
										</div>					
                                        
									
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
						<h2><strong>ADMIN / TEACHER</strong></h2>
						<p>Largest online training academy</p>
						</div>
					</div>
				</div>

                
		</div>
        	<br>
 </div>

</div>