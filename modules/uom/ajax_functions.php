<?php
	//error_reporting(E_ALL);
	session_start();
	include("../../includes/db_config.php");
	include("../../classes/class_uom.php");
	$obj_uom = new Uom('','','','','');
	if(isset($_POST['mode']) && $_POST['mode']=='AddUOM'){
		$obj_uom->setuom_name($_POST['txt_uom_name']);
		$status = $obj_uom->AddUOM();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='Deleteuom'){
		$obj_uom->setpk_uom_id($_POST['id']);
		$status = $obj_uom->deleteUOM();
		echo json_encode($status);
	}
	mysqli_close($GLOBALS["___mysqli_ston"]);
	?>
