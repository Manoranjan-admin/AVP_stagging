<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

include("../../includes/db_config.php");
include("../../classes/class_process_seq.php");

header('Content-Type: application/json');

$obj_process = new Process();

$mode = $_POST['mode'] ?? '';

switch ($mode) {


    case 'getProcessList':

        $start  = intval($_POST['start'] ?? 0);
        $length = intval($_POST['length'] ?? 10);
        $search = $_POST['search']['value'] ?? '';

        $data  = $obj_process->getAllProcessList($start, $length, $search);
        $total = $obj_process->getTotalProcessCount($search);

        echo json_encode([
            "draw"            => intval($_POST['draw'] ?? 1),
            "recordsTotal"    => $total,
            "recordsFiltered" => $total,
            "data"            => $data
        ]);
        break;

    case 'saveProcess':

        $id   = $_POST['pk_process_id'] ?? '';
        $name = trim($_POST['process_name'] ?? '');
        $desc = trim($_POST['description'] ?? '');

        if (empty($name)) {
            echo json_encode([
                'status'  => false,
                'message' => 'Process name is required'
            ]);
            exit;
        }

        if ($id) {
            $status = $obj_process->updateProcess($id, $name, $desc);
        } else {
            $status = $obj_process->insertProcess($name, $desc);
        }

        echo json_encode([
            'status' => $status ? true : false
        ]);
        exit;

    case 'deleteProcess':

        $id = $_POST['pk_process_id'] ?? '';

        if (empty($id)) {
            echo json_encode([
                'status' => false,
                'message' => 'Invalid ID'
            ]);
            exit;
        }

        $status = $obj_process->deleteProcess($id);

        echo json_encode([
            'status' => $status ? true : false
        ]);
        exit;

    case 'getAllProcessMaster':

        $data = $obj_process->getAllProcessMaster();

        echo json_encode([
            'status' => true,
            'data'   => $data
        ]);
        exit;

    case 'getAllSequenceList':

        $data = $obj_process->getAllSequenceList();

        echo json_encode([
            'status' => true,
            'data'   => $data
        ]);
        exit;

    case 'saveMasterSequence':

        $sequence = $_POST['sequence'] ?? [];

        $status = $obj_process->saveMasterSequence($sequence);

        echo json_encode(['status' => $status]);
        exit;

    case 'assignProcessTracking':

        $type   = $_POST['type'] ?? '';
        $orders = $_POST['orders'] ?? [];

        $result = $obj_process->assignProcessTracking($type, $orders);

        echo json_encode($result);
        exit;


    case 'getTrackingList':

        $data = $obj_process->getTrackingList();

        echo json_encode([
            "data" => $data
        ]);
        exit;

    case 'updateProcessTracking':

        $orderNo   = $_POST['order_no'] ?? '';
        $processId = $_POST['process_id'] ?? '';
        $qrPath = $_POST['qr_path'] ?? '';


        $result = $obj_process->updateProcessTracking($orderNo, $processId, $qrPath);

        echo json_encode($result);
        exit;

    case 'getSequenceList1':

        $data = $obj_process->getAllSequenceList1();

        echo json_encode($data);
        exit;

    default:
        echo json_encode(["data" => []]);
        break;
}

mysqli_close($GLOBALS["___mysqli_ston"]);
exit;
