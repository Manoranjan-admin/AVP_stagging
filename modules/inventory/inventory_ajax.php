<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

include("../../includes/db_config.php");
include("../../classes/class_inventory.php");

header('Content-Type: application/json');

$obj_inven = new Inventory();

$mode = $_POST['mode'] ?? '';

switch ($mode) {

    case 'getCommercialItems':
        $data = $obj_inven->getItemStockList($_POST);
        echo json_encode(["data" => $data]);
        break;

    case 'getAllItems':
        $data = $obj_inven->getAllItems($_POST);
        echo json_encode(["data" => $data]);
        break;

    case 'addStocks':
        echo json_encode($obj_inven->addStocks($_POST));
        break;

    case 'getStockByItem':
        $data = $obj_inven->getStockByItem($_POST);
        echo json_encode($data);
        break;

    case 'getAllComEst':
        $data = $obj_inven->getAllComEst($_POST);
        echo json_encode($data);
        break;

    case 'getAllNonComEst':
        $data = $obj_inven->getAllNonComEst($_POST);
        echo json_encode($data);
        break;

    case 'getAlluonList':
        $data = $obj_inven->getAlluonList($_POST);
        echo json_encode($data);
        break;

    case 'utilizeStock':
        echo json_encode($obj_inven->utilizeStock($_POST));
        break;

    case 'getUtilizationList':
        echo json_encode(["data" => $obj_inven->getUtilizationList($_POST)]);
        break;

    case 'searchOrders':

    $type   = $_POST['type'] ?? '';
    $search = $_POST['search'] ?? '';

    if ($type == '1') {
        $data = $obj_inven->searchComOrders($search);
    } else {
        $data = $obj_inven->searchNonComOrders($search);
    }

    echo json_encode($data);
    exit;




    default:
        echo json_encode(["data" => []]);
        break;
}

mysqli_close($GLOBALS["___mysqli_ston"]);
exit;
