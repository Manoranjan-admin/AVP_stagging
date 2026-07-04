<?php 
if(isset($_GET['erp']) && ($_GET['erp'] == 16)){

	include "modules/sales/sales_order_print.php";
}
else{
	
	include("handler.php");

	echo "<script>console.log('Module page path:', '$pageToLoad')</script>";
	
	include "includes/header.php";


	include($pageToLoad); 



	include "includes/footer.php";
}

?>