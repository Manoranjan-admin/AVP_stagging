<?php
//error_reporting(E_ALL);
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
session_start();
include("../../includes/db_config.php");
include("../../classes/class_estimate_status.php");
$obj_estimatestatus= new Estimate_status('', '', '', '', '');


	if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateComm') {
	
        $obj_estimatestatus->listEstimateComm();
    }
	if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateCommcomplete') {
	
        $obj_estimatestatus->listEstimateCommcomplete();
    }
	if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateNonComm') {
	
        $obj_estimatestatus->listEstimateNonComm();
    }
	
	if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateNonCommComplete') {
	
        $obj_estimatestatus->listEstimateNonCommComplete();
    }
	mysqli_close($GLOBALS["___mysqli_ston"]);
	
	
	?>