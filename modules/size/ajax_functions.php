<?php
	//error_reporting(E_ALL);
	session_start();
	include("../../includes/db_config.php");
	include("../../classes/class_size.php");
	$obj_size = new Size('','','','','','','');
	if(isset($_POST['mode']) && $_POST['mode']=='AddSize'){
		$obj_size->setname($_POST['txt_name']);
		$obj_size->setcost($_POST['txt_cost']);
		$obj_size->setDesc($_POST['txt_description']);
		$status = $obj_size->AddSize();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='EditSize'){
		$obj_size->setid($_POST['txt_size_id']);
		$obj_size->setname($_POST['txt_name']);
		$obj_size->setcost($_POST['txt_cost']);
		$obj_size->setDesc($_POST['txt_description']);
		$status = $obj_size->EditSize();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='DeleteSize'){
		$obj_size->setid($_POST['id']);
		$status = $obj_size->deleteSize();
		echo json_encode($status);
	}
	mysqli_close($GLOBALS["___mysqli_ston"]);
	?>