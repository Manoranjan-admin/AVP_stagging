<?php
//error_reporting(1);
 
include("../config/dbconnect.php");
include("../classes/class_user.php");

$user=new User('','','','','','','','',''); 
//User login
$mode = base64_decode($_POST['mode']);
if(isset($mode) && $mode=='userLogin'){
	
	$user->setUserName($_POST['username']);
	$user->setUserPassword($_POST['password']);
	$checkOrgUserLogin=$user->getUserByIDLoginDetails();
	$numcount=mysqli_num_rows($checkOrgUserLogin);

	if($numcount > 0) 
	{	
		$userData=mysqli_fetch_assoc($checkOrgUserLogin);
		
		$_SESSION['qruser_id']=$userData['user_id'];
		$_SESSION['qruser_name']=$userData['user_name'];
		$_SESSION['qruser_email']=$userData['user_email'];
		$_SESSION['qruser_fname']=$userData['user_fname'];
		$_SESSION['qrroleId']=$userData['fk_role_id'];
		$_SESSION['qrrolename']=$userData['name'];
		$_SESSION['qrloggedin']=1;
		
		
		if(!empty($_POST["remember"])) 
		{
			setcookie ("memberlogin",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60), '/');
			setcookie ("memberpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60),'/');
		} 
		else 
		{
			if(isset($_COOKIE["memberlogin"])) {
				setcookie ("memberlogin","");
			}
			if(isset($_COOKIE["memberpassword"])) {
				setcookie ("memberpassword","");
			}
		}
		echo json_encode(1);
	}
	else 
	{
		$_SESSION['qrloggedin']=0;
		echo json_encode(0);
		exit;
	}
}
/*
if(isset($_POST['mode']) && $_POST['mode']=='userForgotPwd'){
	
	
	$user->setUserEmail($_POST['emailaddress']);
	$checkUserEmailExists=$user->checkUserEmailExists();
	$numcount=mysqli_num_rows($checkUserEmailExists);
	if($numcount > 0) 
	{	
		
		$userData=mysqli_fetch_assoc($checkUserEmailExists);
		// generate a unique random token of length 100
		$token = bin2hex(random_bytes(50));
		$user->setUserEmail($_POST['emailaddress']);
		$user->setUsertoken($token);
		$insertToken=$user->insertToken();
		$msg='<table style="background-color: #ecf0f5;width: 100%;display: table;border-collapse: separate;border-spacing: 2px;border-color: grey;">
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
												<h3>Dear '.$userData['user_name'].'</h3>
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
				
				require("../sendgird/sendgrid-php.php");

				$email = new \SendGrid\Mail\Mail(); 
				$email->setFrom("admin@capdigisoft.info", "CRI RPO Support Team");
				$email->setSubject("Reset your password");
				$email->addTo($_POST['emailaddress'],$userData['user_name']);
				$email->addContent(
					"text/html", $msg
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
	}
	else 
	{
		echo json_encode(0);
		exit;
	}
}
if(isset($_POST['mode']) && $_POST['mode']=='userResetPassword'){
	$new_pass = $_POST['txt_password'];
	$new_pass_c = $_POST['txt_cpassword'];
	
	  // Grab to token that came from the email link
		$token = $_POST['token'];
		
		// select email address of user from the password_reset table 
		
		$email= $user->getUserInfo($token);
		
		if ($email) {
			
		  $new_pass = md5($new_pass);
		  $updatePwd= $user->updatePassword($new_pass,$new_pass_c,$email);
		  echo json_encode(1);
		  exit;

		}
		
	  
}
function getRandomWord($len = 10) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}*/
?>
