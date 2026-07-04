<?php
session_start();

if ( isset($_SESSION['qruser_id'])) {
   header("location: ../index.php");
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERP | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/custom/style.css">
    <!-- jQuery -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery Validation -->
    <script src="../../assets/plugins/jquery_validation/jquery.validate.min.js"></script>
    <script src="../../assets/plugins/jquery_validation/additional-methods.min.js"></script>

</head>

<body class="hold-transition login-page">
<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><img src="../../assets/images/AVogo.png"  height="100"></span>
				
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="text-center">
						<h2 class="loghead">Log In</h2>
					</div>
					<div class="">
						<form control="" class="form-group" id="userLogin" method="post">
							<div class="alert alert-success" id="successAlert" style="display:none">
							You have successfully logged into your account.
							</div>
							<div class="alert alert-danger" id="failedAlert" style="display:none">
							Username or Password entered is incorrect.
							</div>
							<div class="alert alert-warning" id="statusinactiveAlert" style="display:none">
							Your Account is In-active. Please contact your Administrator.
							</div>
							<?php 
							if(@$alert != ''):
							echo '<div class="alert alert-danger" role="alert" id="warningAlert"><div class="media"><strong>Oops! </strong> '.$alert.'</div></div>';
							endif;
							?>
							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="Username" autocomplete="off">
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" placeholder="Password" autocomplete="off">
							</div>
							<!--<div class="row">
								<input type="checkbox" name="remember_me" id="remember_me" class="">
								<label class="loghead" for="remember_me">Remember Me!</label>
							</div>-->
							<div class="text-center">
								<input type="hidden" name="mode" value="<?php echo base64_encode('userLogin') ?>" />
								<input type="submit" value="Submit" class="btn">
							</div>
						</form>
					</div>
				
				</div>
			</div>
		</div>
	</div>
    <!-- /.login-box -->
    <style>
        .loghead{
            color: #1562b2;
        }
 .main-content{
	width: 50%;
	border-radius: 20px;
	box-shadow: 0 5px 5px rgba(0,0,0,.4);
	margin: 16em auto;
	display: flex;
}
.company__info{
	background-color: #fff;
	border-top-left-radius: 20px;
	border-bottom-left-radius: 20px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	color: #fff;
}
.fa-android{
	font-size:3em;
}
@media screen and (max-width: 640px) {
	.main-content{width: 90%;}
	.company__info{
		display: none;
	}
	.login_form{
		border-top-left-radius:20px;
		border-bottom-left-radius:20px;
	}
}
@media screen and (min-width: 642px) and (max-width:800px){
	.main-content{width: 70%;}
}
.row > h2{
	color:#fec629;
}
.login_form{
	background-color: #fff;
	border-top-right-radius:20px;
	border-bottom-right-radius:20px;
	border-top:1px solid #ccc;
	border-right:1px solid #ccc;
}
form{
	padding: 0 2em;
}
.form__input{
	width: 100%;
	border:0px solid transparent;
	border-radius: 0;
	border-bottom: 1px solid #aaa;
	padding: 1em .5em .5em;
	padding-left: 2em;
	outline:none;
	margin:1.5em auto;
	transition: all .5s ease;
}
.form__input:focus{
	border-bottom-color: #fec629;
	box-shadow: 0 0 5px rgba(0,80,80,.4); 
	border-radius: 4px;
}
.btn{
	transition: all .5s ease;
	width: 70%;
	border-radius: 30px;
	color:#fec629;
	font-weight: 600;
	background-color: #fff;
	border: 1px solid #fec629;
	margin-top: 1.5em;
	margin-bottom: 1em;
}
.btn:hover, .btn:focus{
	background-color: #fec629;
	color:#fff;
}
    </style>
    <!-- Bootstrap 4 -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../assets/dist/js/adminlte.min.js"></script>

    <script src="../assets/js/loginuser.js"></script>

</body>

</html>