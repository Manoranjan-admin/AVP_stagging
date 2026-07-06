<?php
ob_start("ob_gzhandler");
session_start();
include("../includes/db_config.php");
if ( isset($_SESSION['user_id'])) {
   header("location: ../index.php");
  
}

/*
if (isset($_SESSION['msgotp']) ) {
   unset($_SESSION['msgotp']);     // unset $_SESSION   
}
*/


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

      <form class="userLoginFormOtp" id="userLoginFormOtp" method="post">
        <?php if(isset($_SESSION['msgotp'])){ ?>
          <div class="alert alert-success msgotp" > <?php echo $_SESSION['msgotp']; ?>
        </div>
          <?php  } 
        ?><?php 
        if(@$alert != ''):
          echo '<div class="alert alert-danger" role="alert" id="warningAlert"><div class="media"><strong>Oops! </strong> '.$alert.'</div></div>';
          endif;
        ?>
        <div class="input-group mb-3">
          <input class="form-control" type="text" name="txt_otp" id="txt_otp" placeholder="Enter OTP" value="" required>
        
          <span id="txt_otp-error" class="error col-md-12" for="txt_otp"></span>
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
            <input type="hidden" name="mode" id="mode" value="userLoginOTP"> 
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

<script src="../assets/dist/js/custom/login_scriptotp.js"></script> 

<script>
        setTimeout(function() {
          $('.msgotp').hide();
          <?php unset($_SESSION['msgotp']); ?>

        }, 5000); // Will execute this function after 5 seconds
    </script>
</body>
</html>
