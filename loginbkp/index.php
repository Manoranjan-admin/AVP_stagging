<?php
ob_start("ob_gzhandler");
session_start();
include("../includes/db_config.php");
if ( isset($_SESSION['user_id'])) {
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/custom/style.css">
  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery Validation -->
  <script src="../assets/plugins/jquery_validation/jquery.validate.min.js"></script>
  <script src="../assets/plugins/jquery_validation/additional-methods.min.js"></script>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
	    <div class="login-logo text-center">
			<a href="javascript:;"><img src="../assets/images/AVogo.png" alt="Admin" class="img-fluid" style=" "></a>
		</div>
      <p class="login-box-msg">Sign in to start your session</p>

      <form class="userLoginForm" id="userLoginForm" method="post">
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
        <div class="input-group mb-3">
          <input class="form-control" type="text" name="txt_username" id="txt_username" placeholder="Username" value="<?php if(isset($_COOKIE["memberlogin"])) { echo $_COOKIE["memberlogin"]; } ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <span id="txt_username-error" class="error col-md-12" for="txt_username"></span>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txt_password" id="txt_password" placeholder="Password" value="<?php if(isset($_COOKIE["memberpassword"])) { echo $_COOKIE["memberpassword"]; } ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <span id="txt_password-error" class="error col-md-12" for="txt_password"></span>
        </div>
         
      <!--  <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>-->
          <!-- /.col -->
          <div class="col-4">
            <input type="hidden" name="mode" id="mode" value="userLogin"> 
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

    <!--  <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>-->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>

<script src="../assets/dist/js/custom/login_script.js"></script> 

</body>
</html>
