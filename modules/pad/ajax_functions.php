<?php
	//error_reporting(E_ALL);
	session_start();
	include("../../includes/db_config.php");
	include("../../classes/class_pad.php");
	$obj_pad = new Pad('','','','','','','');
	if(isset($_POST['mode']) && $_POST['mode']=='AddPad'){
		$obj_pad->setname($_POST['txt_name']);
		$obj_pad->setcost($_POST['txt_cost']);
		$obj_pad->setDesc($_POST['txt_description']);
		$status = $obj_pad->AddPad();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='EditPad'){
		$obj_pad->setid($_POST['txt_pad_id']);
		$obj_pad->setname($_POST['txt_name']);
		$obj_pad->setcost($_POST['txt_cost']);
		$obj_pad->setDesc($_POST['txt_description']);
		$status = $obj_pad->EditPad();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='DeletePad'){
		$obj_pad->setid($_POST['id']);
		$status = $obj_pad->deletePad();
		echo json_encode($status);
	}
	mysqli_close($GLOBALS["___mysqli_ston"]);
	?>