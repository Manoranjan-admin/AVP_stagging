<?php

//error_reporting(E_ALL);

session_start();



include("../../includes/db_config.php");

include("../../classes/class_items.php");



$obj_items = new items('', '', '', '', '', '', '', '', '');





if (isset($_POST['mode']) && $_POST['mode'] == 'Deleteproduct') {

	$obj_items->setid($_POST['id']);

	$status = $obj_items->deleteInnersheet();

	if ($status == 1) {

		echo json_encode(1);
	} else {

		echo json_encode(0);
	}
}

if (isset($_POST['mode']) && $_POST['mode'] == 'AddItems') {





	$txt_first_price = 0;

	$txt_secound_price = 0;

	if ($_POST['txt_types'] == 1) {

		$txt_first_price  = $_POST['txt_first_copyprice'];

		$txt_secound_price  = $_POST['txt_second_addiprice'];
	} else {

		$txt_first_price  = $_POST['txt_4color_price'];

		$txt_secound_price  = $_POST['txt_7color_price'];
	}











	$txt_product = (isset($_POST['txt_product']) && $_POST['txt_product']) ? $_POST['txt_product'] : 0;

	$obj_items->settypes($_POST['txt_types']);

	$obj_items->setitemtype($_POST['txt_item_type']);

	$obj_items->setitem($_POST['txt_item']);

	$obj_items->setfirstprice($txt_first_price);

	$obj_items->setsecondprice($txt_secound_price);

	$obj_items->setvisibility($txt_product);



	$status = $obj_items->AddItems();



	if ($status == 1) {

		echo json_encode(1);
	} else {

		echo json_encode(0);
	}
}

if (isset($_POST['mode']) && $_POST['mode'] == 'EditItems') {



	if ($_POST['txt_types'] == 1) {

		$txt_first_price  = $_POST['txt_first_copyprice'];

		$txt_secound_price  = $_POST['txt_second_addiprice'];
	} else {

		$txt_first_price  = $_POST['txt_4color_price'];

		$txt_secound_price  = $_POST['txt_7color_price'];
	}

	$txt_product = (isset($_POST['txt_product']) && $_POST['txt_product']) ? $_POST['txt_product'] : 0;



	$obj_items->setid($_POST['item_id']);

	$obj_items->settypes($_POST['txt_types']);

	$obj_items->setitemtype($_POST['txt_item_type']);

	$obj_items->setitem($_POST['txt_item']);

	$obj_items->setfirstprice($txt_first_price);

	$obj_items->setsecondprice($txt_secound_price);

	$obj_items->setvisibility($txt_product);



	$status = $obj_items->EditItems();

	if ($status == 1) {

		echo json_encode(1);
	} else {

		echo json_encode(0);
	}
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getProductListing') {

	$status = $obj_items->getAllProducts();

	$obj_items = array();

	while ($data = mysqli_fetch_array($status)) {

		$obj_items[] = $data;
	}

	echo json_encode(array($getProduct));
}



if (isset($_POST['mode']) && $_POST['mode'] == 'getproduct_by_id') {

	$obj_items->setpk_product_id($_POST['id']);

	$status = $obj_items->getproduct_byid();

	$getProduct = array();

	while ($data = mysqli_fetch_array($status)) {

		$getProduct[] = $data;
	}

	echo json_encode(array($getProduct));
}



if (isset($_POST['mode']) && $_POST['mode'] == 'getTypesListing') {



	$types = $obj_product->getTypesListing();

	$gettypes = array();

	while ($data = mysqli_fetch_array($types)) {

		$gettypes[] = $data;
	}

	echo json_encode(array($gettypes));
}

/*Non Commercial */

if (isset($_POST['mode']) && $_POST['mode'] == 'getNonCommercialItemsListing') {



	$getAllItemData = $obj_items->getAllItemData();

	$getitem = array();

	while ($data = mysqli_fetch_array($getAllItemData)) {

		$getitem[] = $data;
	}

	echo json_encode(array($getitem));
}

/*Commercial */

if (isset($_POST['mode']) && $_POST['mode'] == 'getCommercialItemsListing') {



	$getAllItemData = $obj_items->getAllCommercialItemData();

	$getitem = array();

	while ($data = mysqli_fetch_array($getAllItemData)) {

		$getitem[] = $data;
	}

	echo json_encode(array($getitem));
}



if (isset($_POST['mode']) && $_POST['mode'] == 'getItemedit') {



	$obj_items->setid($_POST['id']);

	$getitems = $obj_items->getEditItems();

	$rows = mysqli_fetch_array($getitems);

	echo json_encode(array($rows));
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getProductItemsListing') {



	//$obj_items->setid($_POST['id']);

	$getitems = $obj_items->getProductItems();

	//	$rows=mysqli_fetch_array($getitems);

	$getitem = array();

	while ($data = mysqli_fetch_array($getitems)) {

		$getitem[] = $data;
	}

	echo json_encode(array($getitem));
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

if (isset($_POST['mode']) && $_POST['mode'] == 'BulkEditItems') {

    foreach ($_POST['item_ids'] as $index => $id) {

        $type = $_POST['txt_types'][$index] ?? '';
        $itemType = $_POST['txt_item_type'][$index] ?? '';
        $item = $_POST['txt_item'][$index] ?? '';
        $parent = isset($_POST['txt_product'][$index]) && $_POST['txt_product'][$index] != '' 
                    ? $_POST['txt_product'][$index] 
                    : 0;

        $first_price = $_POST['txt_first_price'][$index] ?? 0;
        $second_price = $_POST['txt_second_price'][$index] ?? 0;

        // 🔒 sanitize
        $item = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $item);

        $query = "UPDATE " . ITEMS . " SET 
            fk_item_id = '$item',
            first_price = '$first_price',
            second_price = '$second_price',
            type = '$type',
            item_type = '$itemType',
            parent_id = '$parent'
            WHERE pk_items_id = $id";

        mysqli_query($GLOBALS["___mysqli_ston"], $query);
    }

    echo json_encode(1);
    exit;
}

mysqli_close($GLOBALS["___mysqli_ston"]);
