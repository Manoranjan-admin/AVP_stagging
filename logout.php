<?php 

session_start();
$_SESSION['user_id']='';
$_SESSION['user_name']='';
$_SESSION['loggedin']=0;
session_destroy();
if(isset($_REQUEST['mode']) && $_REQUEST['mode'] == '1'){
	header("Location: index.php?mode=1"); //idle session
}else if(isset($_REQUEST['mode']) && $_REQUEST['mode'] == '2'){
	header("Location: index.php?mode=2"); //DB connectivity error
}else{
	header("Location: index.php");
}

?>
