<?php
	//error_reporting(E_ALL);
	session_start();
	include("../../includes/db_config.php");
	include("../../classes/class_category.php");
	$obj_cat = new Category('','','','','','');
	if(isset($_POST['mode']) && $_POST['mode']=='AddCategory'){
		$obj_cat->setcat_name($_POST['txt_cat_name']);
		$obj_cat->setCatDesc($_POST['txt_cat_description']);
		$status = $obj_cat->AddCategory();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='EditCategory'){
		$obj_cat->setpk_cat_id($_POST['txt_category_id']);
		$obj_cat->setcat_name($_POST['txt_cat_name']);
		$obj_cat->setCatDesc($_POST['txt_cat_description']);
		$status = $obj_cat->EditCategory();
		echo json_encode($status);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='Deletecategory'){
		$obj_cat->setpk_cat_id($_POST['id']);
		$status = $obj_cat->deletecategory();
		echo json_encode($status);
	}
	mysqli_close($GLOBALS["___mysqli_ston"]);
	?>