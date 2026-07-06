<?php


// error_reporting(E_ALL);
// ini_set("display_errors", 1);

session_start();

include("../../includes/db_config.php");

include("../../classes/class_user.php");

$obj_cus = new User('', '', '', '', '', '', '', '', '');



if (isset($_POST['mode']) && $_POST['mode'] == 'getAllUsers') {

	$getAllUsers = $obj_cus->getAllUsers();
}

/*

	if(isset($_POST['mode']) && $_POST['mode'] == 'DeleteCustomer'){

		$obj_cus->setCusId($_POST['id']);

		$obj_cus->setCusVisibility('0');

		$getCustomer=$obj_cus->DeleteCustomer();

		echo json_encode(1);

	}



	if(isset($_POST['mode']) && $_POST['mode'] == 'EditCustomer'){

		$obj_cus->setCusId($_POST['id']);

		$getCustomer=$obj_cus->EditCustomer();

		while($data1=mysqli_fetch_array($getCustomer)) {

			$editcus[]=$data1;

		}	

			

		echo json_encode(array($editcus));

	}*/

if (isset($_POST['mode']) && $_POST['mode'] == 'UpdateUsers') {
	$getCustomer = 0;
	if ($_POST['username'] || $_POST['userpass']) {
		$obj_cus->setUserName($_POST['username']);
		$obj_cus->setUserPassword($_POST['userpass']);
		$obj_cus->setUserid($_POST['id']);
		$getCustomer = $obj_cus->updateUserPassword($_POST['userrole']);
	}
	echo $getCustomer;
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getAllRoles') {
	$data = $obj_cus->getAllRoles();
	echo json_encode($data);
}
if (isset($_POST['mode']) && $_POST['mode'] == 'addRole') {
	$data = $obj_cus->addRole($_POST);
	echo json_encode($data);
}
if (isset($_POST['mode']) && $_POST['mode'] == 'updateRole') {
	$data = $obj_cus->updateRole($_POST);
	echo json_encode($data);
}
if (isset($_POST['mode']) && $_POST['mode'] == 'updateRoleVisibility') {
	$data = $obj_cus->updateRoleVisibility($_POST);
	echo json_encode($data);
}
if (isset($_POST['mode']) && $_POST['mode'] == 'AddUsers') {
	/*$getCustomer =0;
		if($_POST['username'] || $_POST['userpass'])
		{*/

	$userrole = '';

	if ($_POST['txt_customer_role'] == 1) {
		$userrole = 'admin';
	} else if ($_POST['txt_customer_role'] == 2) {
		$userrole = 'booking';
	} else if ($_POST['txt_customer_role'] == 3) {
		$userrole = 'account';
	} else if ($_POST['txt_customer_role'] == 4) {
		$userrole = 'designer';
	} else if ($_POST['txt_customer_role'] == 5) {
		$userrole = 'printing';
	}


	$obj_cus->setUserName($_POST['txt_customer_name']);
	$obj_cus->setUserEmail($_POST['txt_email']);
	$obj_cus->setUserHint($userrole);
	$obj_cus->setUserPassword($_POST['txt_customer_pass']);
	$obj_cus->setUserid($_POST['txt_customer_role']);
	$getCustomer = $obj_cus->AddUsers();

	if ($getCustomer) {
		$obj_cus->AddMenuAccess($_POST['txt_customer_name'], $getCustomer, $_POST['txt_customer_role']);
	}
	/*}*/
	echo 1;
}


mysqli_close($GLOBALS["___mysqli_ston"]);
