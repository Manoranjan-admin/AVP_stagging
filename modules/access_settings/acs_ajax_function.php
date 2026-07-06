<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

include("../../includes/db_config.php");
include("../../classes/class_access_settings.php");

$objAcs = new AccessSettings();

if (isset($_POST['mode']) && $_POST['mode'] == 'getAllMenuWithRoleAccess') {
    $res = $objAcs->getAllMenuWithRoleAccess($_POST);
    echo json_encode($res);
} elseif (isset($_POST['mode']) && $_POST['mode'] == 'updateAccess') {
    $res = $objAcs->updateAccess($_POST);
    echo json_encode($res);
}
