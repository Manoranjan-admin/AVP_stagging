<?php
/* ob_start("ob_gzhandler"); */

$min_serveOptions['maxAge'] = 0;
include("includes/db_config.php");

include("classes/class_operation.php");
include("classes/class_module.php");
include("classes/class_handler.php");


$menuID = '';
$handlerID = '';
$operationID = '';
$moduleID = '';
$quickID = '';

$Title = '';
$handlerName = '';
$BreadCrumb = '';
$menuName = '';
$moduleName = '';
$operationName = '';

$moduleFolder = '';

$pageToLoad = 'dashboard.php';
$handlerPage = 'handler_inc.php';

$handler = new Handler('', '', '', '');
$module = new Module($moduleID, '', '');
$operations = new Operation($operationID, '', '');


$addAccess = 0;
$ListAccess = 0;
$ViewAccess = 0;
$EditAccess = 0;
$DeleteAccess = 0;


if (isset($_GET['erp'])) {

	$handlerID = $_GET['erp'];
	$type = $_GET['typ'] ??  $_GET['type'] ?? 0;
	$menuId = $_GET['mnu'] ??  $_GET['mnu'] ?? 0;

	$handler->setHandlerID($handlerID);
	$getHandlerExist = $handler->getHandlerExist();
	if (is_numeric($handlerID) && $getHandlerExist != 0) {
		$handlerResult = $handler->getHandlerById();
		while ($handlerData = mysqli_fetch_array($handlerResult)) {
			$Title = $handlerData['handler_name'];
			$BreadCrumb = "Home >>" . $menuName . " >> " . $Title;
			$operationID = $handlerData['operation_id'];
			$moduleID = $handlerData['module_id'];
		}

		$module->setModuleID($moduleID);
		$moduleResult = $module->getModuleById();
		while ($moduleData = mysqli_fetch_array($moduleResult)) {
			$moduleName = $moduleData['module_name'];
			$moduleFolder = $moduleData['module_folder'];
		}

		$operations->setOperationID($operationID);
		$operationResult = $operations->getOperationById();
		while ($operationData = mysqli_fetch_array($operationResult)) {
			$operationName = $operationData['operation_name'];
			$pageToLoad = 'modules/' . $moduleFolder . "/" . $operationData['operation_file'];
			$pageHandler = 'modules/' . $moduleFolder . "/" . $handlerPage;
		}

		$getAccessEnable = $handler->checkAccess($menuId, $type);
		if ($_SESSION['roleId'] != 999 && $getAccessEnable == 0) {
			$pageToLoad = 'modules/access_settings/acs_warning.php';
		}

		if ($_SESSION['roleId'] == 999) {
			$addAccess = 1;
			$ListAccess = 1;
			$ViewAccess = 1;
			$EditAccess = 1;
			$DeleteAccess = 1;
		}

		if ($_SESSION['roleId'] != 999 && $getAccessEnable != 0) {
			$accArr = $handler->getAccess($menuId, $type);
			// print_r($accArr);
			foreach ($accArr as $index => $row) {
				if ($row['fk_action_id'] == 1) {
					$addAccess = $row['access_status'];
				} else if ($row['fk_action_id'] == 2) {
					$ListAccess = $row['access_status'];
				} else if ($row['fk_action_id'] == 3) {
					$ViewAccess = $row['access_status'];
				} else if ($row['fk_action_id'] == 4) {
					$EditAccess = $row['access_status'];
				} else if ($row['fk_action_id'] == 5) {
					$DeleteAccess = $row['access_status'];
				}
			}
		}
	} else {
		//$pageToLoad='modules/common_module/404.php';
		//$pageHandler='modules/common_module/'.$handlerPage;
	}
}




// echo "Access types: ";
// echo "\n";
// echo $addAccess;
// echo "\n";
// echo $ListAccess;
// echo "\n";
// echo $ViewAccess;
// echo "\n";
// echo $EditAccess;
// echo "\n";
// echo $DeleteAccess;

echo <<<EOF
<input type="hidden" id="add_access" value="{$addAccess}">
<input type="hidden" id="list_access" value="{$ListAccess}">
<input type="hidden" id="view_access" value="{$ViewAccess}">
<input type="hidden" id="edit_access" value="{$EditAccess}">
<input type="hidden" id="delete_access" value="{$DeleteAccess}">
EOF;
