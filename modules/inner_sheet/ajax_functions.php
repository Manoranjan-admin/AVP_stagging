<?php
	//error_reporting(E_ALL);

	session_start();
	include("../../includes/db_config.php");
	include("../../classes/class_inner_sheet.php");
	$obj_cat = new Inner_sheet('','','','','','','');
	if(isset($_POST['mode']) && $_POST['mode']=='AddInnersheet'){
		$obj_cat->setname($_POST['txt_name']);
		$obj_cat->setcost($_POST['txt_cost']);
		$obj_cat->setDesc($_POST['txt_description']);
		$status = $obj_cat->AddInnersheet();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='EditInnersheet'){
		$obj_cat->setid($_POST['txt_is_id']);
		$obj_cat->setname($_POST['txt_name']);
		$obj_cat->setcost($_POST['txt_cost']);
		$obj_cat->setDesc($_POST['txt_description']);
		$status = $obj_cat->EditInnersheet();
		echo json_encode($status);
	}
	
	if(isset($_POST['mode']) && $_POST['mode']=='Deleteinnersheet'){

		$obj_cat->setid($_POST['id']);
		$status = $obj_cat->deleteInnersheet();
		echo json_encode($status);
	}
	mysqli_close($GLOBALS["___mysqli_ston"]);
	?>