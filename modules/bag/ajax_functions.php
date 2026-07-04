<?php
	//error_reporting(E_ALL);
	session_start();
	include("../../includes/db_config.php");
	include("../../classes/class_bag.php");
	$obj_bag = new Bag('','','','','','','');
	if(isset($_POST['mode']) && $_POST['mode']=='AddBag'){
		$obj_bag->setname($_POST['txt_name']);
		$obj_bag->setcost($_POST['txt_cost']);
		$obj_bag->setDesc($_POST['txt_description']);
		$status = $obj_bag->AddBag();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='EditBag'){
		$obj_bag->setid($_POST['txt_bag_id']);
		$obj_bag->setname($_POST['txt_name']);
		$obj_bag->setcost($_POST['txt_cost']);
		$obj_bag->setDesc($_POST['txt_description']);
		$status = $obj_bag->EditBag();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='DeleteBag'){
		$obj_bag->setid($_POST['id']);
		$status = $obj_bag->deleteBag();
		echo json_encode($status);
	}
	mysqli_close($GLOBALS["___mysqli_ston"]);
	?>