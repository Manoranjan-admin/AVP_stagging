<?php
//error_reporting(E_ALL);
session_start();

include("../../includes/db_config.php");
include("../../classes/class_product.php");

$obj_product = new Product('','','','','','','','','','','','','','');


if(isset($_POST['mode']) && $_POST['mode']=='Deleteproduct'){
	$obj_product->setpk_product_id($_POST['id']);
	$status = $obj_product->delete_product();
	if($status == 1){
		echo json_encode(1);
	}
	else{
		echo json_encode(0);
	}
}
if(isset($_POST['mode']) && $_POST['mode']=='AddProduct'){

	
	$lastPid = $obj_product->getLastproductID();
	$previousYr = date("y",strtotime("-1 year"));  //last year 
	$nextYr = date('y', strtotime('+1 year'));
	$year = substr( date('Y'),0, 2);
	/*if ( date('m') < 4 ) {
		$finacial_year=$previousYr.$year;
	}
	else
	{*/
		$finacial_year=$year.$nextYr;
/*	}*/

	if(mysqli_fetch_row($lastPid)  > 0) {
		$value2='';
        if ($row = mysqli_fetch_array($lastPid)) {
            $value2 = $row['cp_no'];
            $value2 = substr($value2, 8, 13);//separating numeric part

            $value2 = $value2 + 1;//Incrementing numeric part

            $value2 = "CP/".$finacial_year."/" . sprintf('%05s', $value2);//concatenating incremented value
            $pNum = $value2; 
        }
		
    } 
	else{
		
		$pNum = '';
	}

	//$obj_product->setfk_catgeory_id($_POST['txt_input_category']);
	$obj_product->setprodcode($pNum);
	$obj_product->setproduct_name($_POST['txt_product_name']);
	$obj_product->setfirst_price($_POST['txt_4color_price']);
	$obj_product->setadditional_price($_POST['txt_7color_price']);
	$obj_product->setproduct_desc($_POST['txt_product_description']);

	$status = $obj_product->productAdd();
	if($status == 1){
		echo json_encode(1);
	}
	else{
		echo json_encode(0);
	}
}
if(isset($_POST['mode']) && $_POST['mode']=='EditProduct'){
	//$obj_product->setpk_product_id($_POST['txt_product_code']);
	$obj_product->setpk_product_id($_POST['txt_product_code']);

	$obj_product->setproduct_name($_POST['txt_product_name']);
	$obj_product->setfirst_price($_POST['txt_4color_price']);
	$obj_product->setadditional_price($_POST['txt_7color_price']);
	$obj_product->setproduct_desc($_POST['txt_product_description']);
	$status = $obj_product->productEdit();
	if($status == 1){
		echo json_encode(1);
	}
	else{
		echo json_encode(0);
	}
}
if(isset($_POST['mode']) && $_POST['mode']=='getProductListing'){
	$status = $obj_product->getAllProducts();
	$getProduct=array();
	while($data=mysqli_fetch_array($status)) {
		$getProduct[]=$data;
	}	
	echo json_encode(array($getProduct));
}

if(isset($_POST['mode']) && $_POST['mode']=='getproduct_by_id'){
	$obj_product->setpk_product_id($_POST['id']);
	$status = $obj_product->getproduct_byid();
	$getProduct=array();
	while($data=mysqli_fetch_array($status)) {
		$getProduct[]=$data;
	}	
	echo json_encode(array($getProduct));
}

if(isset($_POST['mode']) && $_POST['mode']=='getTypesListing'){

	$types = $obj_product->getTypesListing();
	$gettypes=array();
	while($data=mysqli_fetch_array($types)) {
		$gettypes[]=$data;
	}	
	echo json_encode(array($gettypes));
}
/*if(isset($_POST['mode']) && $_POST['mode'] == 'getAllUOM') 
{	
	$getUom=$obj_rm->getAllUOM();
	$uomArr=array();
	while($data=$getUom->fetch())
	{
		$uomArr[]=$data;
	}	
		
	echo json_encode($uomArr);
}*/
mysqli_close($GLOBALS["___mysqli_ston"]);
?>