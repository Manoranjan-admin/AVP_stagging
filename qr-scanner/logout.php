<?php 

session_start();
$_SESSION['qruser_id']='';
$_SESSION['qruser_name']='';
$_SESSION['qrloggedin']=0;
session_destroy();
if(isset($_REQUEST['mode']) && $_REQUEST['mode'] == '1'){
	header("Location: index.php?mode=1"); //idle session
}else if(isset($_REQUEST['mode']) && $_REQUEST['mode'] == '2'){
	header("Location: index.php?mode=2"); //DB connectivity error
}else{
	header("Location: index.php");
}

?>
