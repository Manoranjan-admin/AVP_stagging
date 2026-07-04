<?php
	//error_reporting(E_ALL);
	session_start();
	include("../../includes/db_config.php");
	include("../../classes/class_special_effects.php");
	$obj_se = new Special_effects('','','','','','','');
	if(isset($_POST['mode']) && $_POST['mode']=='AddSpecialeffects'){
		$obj_se->setname($_POST['txt_name']);
		$obj_se->setcost($_POST['txt_cost']);
		$obj_se->setDesc($_POST['txt_description']);
		$status = $obj_se->AddSpecialeffects();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='EditSpecialeffects'){

		$obj_se->setid($_POST['txt_id']);
		$obj_se->setname($_POST['txt_name']);
		$obj_se->setcost($_POST['txt_cost']);
		$obj_se->setDesc($_POST['txt_description']);
		$status = $obj_se->EditSpecialeffects();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='DeleteSpecialeffects'){
		$obj_se->setid($_POST['id']);
		$status = $obj_se->deleteSpecialeffects();
		echo json_encode($status);
	}
	mysqli_close($GLOBALS["___mysqli_ston"]);
	?>