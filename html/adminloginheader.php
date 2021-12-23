<!-- <?php echo URL."public/css/login.css"; ?> -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?php echo URL; ?>public/images/bizdir/dotbd_logo.png">
  <title><?php echo APPNAME; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
  
  
  <!-- iCheck -->
  
  <link rel="stylesheet" href="<?php echo URL; ?>public/css/login.css"> 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


	<!-- <link rel="stylesheet" hraf="<?php echo URL; ?>public/css/login.css"> -->

  <!-- Google Font -->
  <style type="text/css">
		#login {
			background: #ffffff;
			padding-top: 80px;
			padding-bottom: 100px;
		}
		#login .col-sm-12 {
			padding-left: 0px;
			padding-right: 0px;
		}
		#login .login-holder {
			max-width: 460px;
			display: block;
			margin: auto;
		}
		#login .login-holder h1 {
			font-family: "verdana";
			margin: 20px 0px 40px 0px;
		}
		#login .login-holder p {
			font-size: 14px;
		}
		#login .login-holder p input {
			font-size: 14px;
			border-radius: 0px;
			border-color: transparent;
			background-color: #ecf1f8;
		}
		#login .login-holder button img{ 
			height: 16px;
			margin:0px 5px 5px 5px;
		}
		#login .login-holder button {
			font-size: 14px; 
			border:1px solid #dddddd;
			background: transparent;
			border-radius: 2px;
			padding: 8px 10px;
			margin: 10px 0px;
		}
		#login .foot {
			margin-top: 120px;
		}
		#login .login-form {
			padding: 20px 15px 40px 15px;
			background: #ffffff;
		}
		#login .login-form form + p {
			text-align: center;
			position: relative;
			left: 10px;
			padding-top: 20px;
		}
		#login .login-form form + p a {
			position: relative;
			bottom: 2px;
		}
		#login .small-bold {
			font-family: "verdana";
			margin-top: 30px;
		}
		#login .foot p {
			margin: 5px 0px;
			text-align: center;
			color: #000000;
			font-size: 14px;
			font-weight: normal;
			font-family: "verdana";
		}
		#login .foot p a {
			color: black;
		}
		#login .dbbutton {
			margin-top: 30px;
		}
		#login .dbbutton input {
			background: #aa000a;
			color: #ffffff;
			padding: 6px 15px;
			margin-top: 10px;
			border-radius: 3px;
			font-size: 14px;
			font-family: "verdana";
		}
		#login .col-sm-4 > img {
			padding-top: 15vh;
			display: block;
			margin: 0 auto;
		}
		@media only screen and (max-width: 767px) {
			#login .col-sm-4 > img {
				padding-top: 10px;
			}
		}
		#login .col-sm-4 > p:first-child {
			padding-top: 10vh;
			display: block;
			margin: 0 auto;
		}
		@media only screen and (max-width: 767px) {
			#login .col-sm-4 > p:first-child {
				padding-top: 10px;
			}
		}
		#login .col-sm-4 > p:first-child + p {
			padding-top: 30px;
        }
        .companydesc{
            
            position:absolute;
        }
	</style>
  
  
</head>
<body class="hold-transition login-page">
