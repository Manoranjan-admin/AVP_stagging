<?php
//error_reporting(E_ALL);

include("db_config.php");
include("../classes/class_user.php");
require("../SMTP/class.phpmailer.php");

$user = new User('', '', '', '', '', '', '', '', '');
//User login
if (isset($_POST['mode']) && $_POST['mode'] == 'userLogin') {

	$user->setUserName($_POST['txt_username']);
	$user->setUserPassword($_POST['txt_password']);
	$checkOrgUserLogin = $user->getUserByIDLoginDetails();
	$numcount = mysqli_num_rows($checkOrgUserLogin);

	if ($numcount > 0) {
		$userData = mysqli_fetch_assoc($checkOrgUserLogin);

		// if($userData['user_id'] == 6)
		// {
		// 	$otpcode = rand(100000,999999);
		// 	$site_admin = "admin";

		// $headers = "MIME-Version: 1.0" . "\r\n"; 
		// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
		// $headers .= 'From: AVP <cdsphp@gmail.com>' . "\r\n";


		// 	$subject = 'OTP Login';

		// 	// message
		// 	$message1 = "<!doctype html>
		// 	<html>
		// 	<head>
		// 	  <title>".$subject."</title>
		// 	</head>
		// 	<body> 	  <table width='100%' border='0' cellspacing='5' cellpadding='0' style='font-size:13px;border-collapse:collapse;font-family:arial;border:1px solid #ddd'><tr>
		// 	      <td colspan='3' style='text-align:center;' ><img src='https://test.rishidhkannan.com/assets/images/AVogo.png' title='STF'></td>
		//         </tr>
		// 	    <tr><td colspan='3' style='text-align:center;background:#E1ECEF'><h1 style='color: #00acc1;'></h1></td></tr><tr><td colspan='3' style='padding:10px;'> Hi Admin,</td></tr>
		// 	    <tr>
		// 	    <td colspan='3' style='padding:10px;'>This is your OTP:  '.$otpcode.'</td>
		// 		</tr>";

		// 	    $message1 .= '</table>	<table><tr><td>Regards,</td></tr><tr><td>AVP Team</td></tr></table>
		// 		</body>
		// 	  </html>';
		// 	//echo  $message1 ;
		// 	//exit;
		// 	$mail = new PHPMailer(); 
		// 	//$mail->SetLanguage("en", 'includes/phpMailer/language/');
		// 	$mail->Mailer = "mail";

		// 	//$mail->IsSMTP();
		// 	$mail->Host = "localhost";
		// 	$mail->SMTPAuth = true;
		// 	$mail->SMTPSecure = 'tls'; 
		// 	$mail->Port=587;
		// 	$mail->Username = "cdsphp@gmail.com";
		// 	$mail->Password = "Cd5#phP$!";
		// 	$mail->From = "cdsphp@gmail.com";
		// 	$mail->FromName = "OTP login";
		// 	$mail->AddReplyTo("scottrylon@gmail.com");
		// 	$mail->AddAddress("vasu62002@gmail.com");
		// 	//$mail->AddAddress("scottrylon@gmail.com");
		// 	//$mail->AddBCC("scottrylon@gmail.com");
		// 	$mail->AddBCC("praveenkumar.ek@gmail.com");
		// 	$mail->IsHTML(true);
		// 	$mail->Subject = "AVP - OTP Login";
		// //	$mail->Body = $message1;
		// 	$mail->Body    = ' Hi, '.$otpcode.' is your OTP(One Time Password) to login';

		// 	//$mail->Send();
		// 	if ($mail->Send()) {
		// 		//echo 'Message sent!';
		// 		$updateOTP=$user->updateGenerateOTP($userData['user_id'],$otpcode);
		// 		//$_SESSION['timeoutotp'] = time();

		// 		$_SESSION['msgotp'] =  "OTP has been generated sucessfully. ";

		// 		echo json_encode(2);

		// 	} else {
		// 		//echo 'Mailer Error: ' . $mail->ErrorInfo;
		// 		echo json_encode(0);

		// 	}

		// 	die();
		// }
		// else{

		$_SESSION['user_id'] = $userData['user_id'];
		$_SESSION['user_name'] = $userData['user_name'];
		$_SESSION['user_email'] = $userData['user_email'];
		$_SESSION['user_fname'] = $userData['user_fname'];
		$_SESSION['roleId'] = $userData['fk_role_id'];
		$_SESSION['loggedin'] = 1;
		// }




		if (!empty($_POST["remember"])) {
			setcookie("memberlogin", $_POST["txt_username"], time() + (10 * 365 * 24 * 60 * 60), '/');
			setcookie("memberpassword", $_POST["txt_password"], time() + (10 * 365 * 24 * 60 * 60), '/');
		} else {
			if (isset($_COOKIE["memberlogin"])) {
				setcookie("memberlogin", "");
			}
			if (isset($_COOKIE["memberpassword"])) {
				setcookie("memberpassword", "");
			}
		}
		// echo json_encode(1);

		if ($userData['fk_role_id'] == 999) {
			echo json_encode(1);
		} else {
			$link = $user->getNavLink($userData['user_id']);
			if ($link) {
				echo json_encode(["link" => $link]);
			} else {
				echo json_encode(1);
			}
		}
	} else {
		$_SESSION['loggedin'] = 0;
		echo json_encode(0);
		exit;
	}
}
if (isset($_POST['mode']) && $_POST['mode'] == 'userLoginOTP') {

	$user->setUserName($_POST['txt_otp']);
	$checkOrgUserLogin = $user->getCheckexistOTP();
	$numcount = mysqli_num_rows($checkOrgUserLogin);

	if ($numcount > 0) {
		$userData = mysqli_fetch_assoc($checkOrgUserLogin);

		$_SESSION['user_id'] = $userData['user_id'];
		$_SESSION['user_name'] = $userData['user_name'];
		$_SESSION['user_email'] = $userData['user_email'];
		$_SESSION['user_fname'] = $userData['user_fname'];
		$_SESSION['roleId'] = $userData['fk_role_id'];
		$_SESSION['loggedin'] = 1;

		$otpcode = "";
		$updateOTP = $user->updateGenerateOTP($userData['user_id'], $otpcode);

		if (!empty($_POST["remember"])) {
			setcookie("memberlogin", $_POST["txt_username"], time() + (10 * 365 * 24 * 60 * 60), '/');
			setcookie("memberpassword", $_POST["txt_password"], time() + (10 * 365 * 24 * 60 * 60), '/');
		} else {
			if (isset($_COOKIE["memberlogin"])) {
				setcookie("memberlogin", "");
			}
			if (isset($_COOKIE["memberpassword"])) {
				setcookie("memberpassword", "");
			}
		}
		echo json_encode(1);
	} else {
		$_SESSION['loggedin'] = 0;
		echo json_encode(0);
		exit;
	}
}
if (isset($_POST['mode']) && $_POST['mode'] == 'userForgotPwd') {


	$user->setUserEmail($_POST['emailaddress']);
	$checkUserEmailExists = $user->checkUserEmailExists();
	$numcount = mysqli_num_rows($checkUserEmailExists);
	if ($numcount > 0) {

		$userData = mysqli_fetch_assoc($checkUserEmailExists);
		// generate a unique random token of length 100
		$token = bin2hex(random_bytes(50));
		$user->setUserEmail($_POST['emailaddress']);
		$user->setUsertoken($token);
		$insertToken = $user->insertToken();
		/* SEND EMAIL TO USER */
		$msg = '<table style="background-color: #ecf0f5;width: 100%;display: table;border-collapse: separate;border-spacing: 2px;border-color: grey;">
			<tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
				<td style="display: block;max-width: 600px;margin: 0 auto;clear: both;vertical-align: top;" width="600">
					<div style="max-width: 600px;margin: 0 auto;display: block;padding: 20px;">
						<table  style="display: table;border-collapse: separate;border-spacing: 2px;border-color: grey;background-color: #fff;border-bottom: 2px solid #d7d7d7;" width="100%" cellpadding="0" cellspacing="0">
							<tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
								<td style="padding: 20px;vertical-align: top;">
									<table  style="display: table;border-collapse: separate;border-spacing: 2px;border-color: grey;" width="100%" cellpadding="0" cellspacing="0">
										<tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
											<td style="vertical-align: top;">
												<img src="http://crirpo.joomlastaging.com/images/logo.png" style="width: 30%;margin-left: 35%;padding: 5px;">
											</td>
										</tr>
										<tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
											<td style="padding: 10px 0 20px;vertical-align: top;">
												<h3>Dear ' . $userData['user_name'] . '</h3>
											</td>
										</tr>
										<tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
											<td style="padding: 0 0 20px;vertical-align: top;">
												Please click on the following link to reset your password.
												<a href="http://joomlastaging.com/cri-mms/reset_password?token=' . $token . '">Click Here</a>
											</td>
										</tr>
										
									</table>
									
								</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>';
		/* SEND MAIL USING SENDGRID */

		require("../sendgird/sendgrid-php.php");

		$email = new \SendGrid\Mail\Mail();
		$email->setFrom("admin@capdigisoft.info", "CRI RPO Support Team");
		$email->setSubject("Reset your password");
		$email->addTo($_POST['emailaddress'], $userData['user_name']);
		$email->addContent(
			"text/html",
			$msg
		);
		$sendgrid = new SendGrid('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');
		//$sendgrid = new \SendGrid(SENDGRID_API_KEY);
		try {
			$response = $sendgrid->send($email);
			echo json_encode(1);
		} catch (Exception $e) {
			echo json_encode(2);
		}


		echo json_encode(1);
	} else {
		echo json_encode(0);
		exit;
	}
}
if (isset($_POST['mode']) && $_POST['mode'] == 'userResetPassword') {
	$new_pass = $_POST['txt_password'];
	$new_pass_c = $_POST['txt_cpassword'];

	// Grab to token that came from the email link
	$token = $_POST['token'];

	// select email address of user from the password_reset table 

	$email = $user->getUserInfo($token);

	if ($email) {

		$new_pass = md5($new_pass);
		$updatePwd = $user->updatePassword($new_pass, $new_pass_c, $email);
		echo json_encode(1);
		exit;
	}
}
function getRandomWord($len = 10)
{
	$word = array_merge(range('a', 'z'), range('A', 'Z'));
	shuffle($word);
	return substr(implode($word), 0, $len);
}
