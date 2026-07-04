<?php
	//error_reporting(E_ALL);
	session_start();
	include("../../includes/db_config.php");
	include("../../classes/class_box.php");
	$obj_box = new Box('','','','','','','');
	if(isset($_POST['mode']) && $_POST['mode']=='AddBox'){
		$obj_box->setname($_POST['txt_name']);
		$obj_box->setcost($_POST['txt_cost']);
		$obj_box->setDesc($_POST['txt_description']);
		$status = $obj_box->AddBox();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='EditBox'){
		$obj_box->setid($_POST['txt_box_id']);
		$obj_box->setname($_POST['txt_name']);
		$obj_box->setcost($_POST['txt_cost']);
		$obj_box->setDesc($_POST['txt_description']);
		$status = $obj_box->EditBox();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='DeleteBox'){
		$obj_box->setid($_POST['id']);
		$status = $obj_box->deleteBox();
		echo json_encode($status);
	}
	mysqli_close($GLOBALS["___mysqli_ston"]);
	?>