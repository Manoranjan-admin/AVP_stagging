<?php

class Process
{
    // 	public $id;

    // 	public function __construct($c_id) {

    // 		$this->id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_id);

    //    }




    public function saveSequence($sono, $type, $sequence)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        foreach ($sequence as $seq) {

            $process_id = intval($seq['process_id'] ?? 0);
            $position   = intval($seq['position'] ?? 0);

            if ($process_id <= 0 || $position <= 0) {
                continue;
            }

            $checkSql = "
            SELECT pk_seq_id 
            FROM erp_sequence 
            WHERE est_number = ? 
              AND fk_process_id = ?
              AND item_type = ?
        ";

            $checkStmt = mysqli_prepare($conn, $checkSql);
            mysqli_stmt_bind_param($checkStmt, "sii", $sono, $process_id, $type);
            mysqli_stmt_execute($checkStmt);
            mysqli_stmt_store_result($checkStmt);

            if (mysqli_stmt_num_rows($checkStmt) > 0) {

                $updateSql = "
                UPDATE erp_sequence 
                SET seq_position = ?, visibility = 1
                WHERE est_number = ?
                  AND fk_process_id = ?
                  AND item_type = ?
            ";

                $updateStmt = mysqli_prepare($conn, $updateSql);
                mysqli_stmt_bind_param(
                    $updateStmt,
                    "isii",
                    $position,
                    $sono,
                    $process_id,
                    $type
                );
                mysqli_stmt_execute($updateStmt);
                mysqli_stmt_close($updateStmt);
            } else {

                $insertSql = "
                INSERT INTO erp_sequence 
                (est_number, fk_process_id, seq_position, item_type, visibility)
                VALUES (?, ?, ?, ?, 1)
            ";

                $insertStmt = mysqli_prepare($conn, $insertSql);
                mysqli_stmt_bind_param(
                    $insertStmt,
                    "siii",
                    $sono,
                    $process_id,
                    $position,
                    $type
                );
                mysqli_stmt_execute($insertStmt);
                mysqli_stmt_close($insertStmt);
            }

            mysqli_stmt_close($checkStmt);
        }

        return [
            'status'  => true,
            'message' => 'Sequence updated successfully'
        ];
    }


    public function getAllComEst($start, $length)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $sql = "
        SELECT 
            e.sono,
            e.customer_id,
            c.cus_name AS customer_name,
            c.cus_code AS customer_code,
            e.delivery_date AS created_at
        FROM erp_estimate_comm e
        LEFT JOIN erp_customer_master c 
            ON e.customer_id = c.pk_cus_id
        WHERE e.visibility = 1 
          AND e.order_status = 0
        ORDER BY e.delivery_date DESC
        LIMIT $start, $length
    ";

        $res = mysqli_query($conn, $sql);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }



    public function getAllNonComEst($start, $length)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $sql = "
        SELECT 
            e.sono,
            e.customer_id,
            c.cus_name AS customer_name,
            c.cus_code AS customer_code,
            e.delivery_date AS created_at
        FROM erp_estimate_noncomm e
        LEFT JOIN erp_customer_master c 
            ON e.customer_id = c.pk_cus_id
        WHERE e.visibility = 1
        ORDER BY e.delivery_date DESC
        LIMIT $start, $length
    ";

        $res = mysqli_query($conn, $sql);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }

    public function getTotalComCount()
    {
        $conn = $GLOBALS["___mysqli_ston"];
        $res = mysqli_query(
            $conn,
            "SELECT COUNT(*) total FROM erp_estimate_comm 
         WHERE visibility = 1 AND order_status = 0"
        );
        return mysqli_fetch_assoc($res)['total'];
    }

    public function getTotalNonComCount()
    {
        $conn = $GLOBALS["___mysqli_ston"];
        $res = mysqli_query(
            $conn,
            "SELECT COUNT(*) total FROM erp_estimate_noncomm 
         WHERE visibility = 1"
        );
        return mysqli_fetch_assoc($res)['total'];
    }

    public function insertProcess($process_name, $description)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $process_name = mysqli_real_escape_string($conn, $process_name);
        $description  = mysqli_real_escape_string($conn, $description);

        $sql = "
        INSERT INTO erp_process
        (process_name, process_description, visibility)
        VALUES
        ('$process_name', '$description', '1')
    ";

        return mysqli_query($conn, $sql);
    }

    public function updateProcess($pk_process_id, $process_name, $description)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $pk_process_id = intval($pk_process_id);
        $process_name  = mysqli_real_escape_string($conn, $process_name);
        $description   = mysqli_real_escape_string($conn, $description);

        $sql = "
        UPDATE erp_process
        SET process_name = '$process_name',
            process_description = '$description'
        WHERE pk_process_id = '$pk_process_id'
    ";

        return mysqli_query($conn, $sql);
    }

    public function getAllProcessList($start = 0, $length = 10, $search = '')
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $where = "WHERE visibility = 1";

        if (!empty($search)) {
            $search = mysqli_real_escape_string($conn, $search);
            $where .= " AND (
            process_name LIKE '%$search%' 
            OR process_description LIKE '%$search%'
        )";
        }

        $query = "
        SELECT *
        FROM erp_process
        $where
        ORDER BY pk_process_id DESC
        LIMIT $start, $length
    ";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            return [];
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getTotalProcessCount($search = '')
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $where = "WHERE visibility = 1";

        if (!empty($search)) {
            $search = mysqli_real_escape_string($conn, $search);
            $where .= " AND (
            process_name LIKE '%$search%' 
            OR process_description LIKE '%$search%'
        )";
        }

        $query = "
        SELECT COUNT(*) as total
        FROM erp_process
        $where
    ";

        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        return $row['total'];
    }

    public function deleteProcess($pk_process_id)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $pk_process_id = intval($pk_process_id);

        $sql = "
        UPDATE erp_process
        SET visibility = 0
        WHERE pk_process_id = '$pk_process_id'
    ";

        return mysqli_query($conn, $sql);
    }

    public function getAllProcessMaster()
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $query = "SELECT * FROM erp_process
              WHERE visibility = 1
              ORDER BY pk_process_id ASC";

        $result = mysqli_query($conn, $query);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function saveMasterSequence($sequence)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        foreach ($sequence as $seq) {

            $process_id = intval($seq['process_id'] ?? 0);
            $position   = intval($seq['position'] ?? 0);

            if ($process_id <= 0 || $position <= 0) {
                continue;
            }

            $checkSql = "
            SELECT pk_seq_id 
            FROM erp_sequence 
            WHERE fk_process_id = ?
        ";

            $checkStmt = mysqli_prepare($conn, $checkSql);
            mysqli_stmt_bind_param($checkStmt, "i", $process_id);
            mysqli_stmt_execute($checkStmt);
            mysqli_stmt_store_result($checkStmt);

            if (mysqli_stmt_num_rows($checkStmt) > 0) {

                $updateSql = "
                UPDATE erp_sequence 
                SET seq_position = ?, visibility = 1
                WHERE fk_process_id = ?
            ";

                $updateStmt = mysqli_prepare($conn, $updateSql);
                mysqli_stmt_bind_param(
                    $updateStmt,
                    "ii",
                    $position,
                    $process_id
                );
                mysqli_stmt_execute($updateStmt);
                mysqli_stmt_close($updateStmt);
            } else {

                $insertSql = "
                INSERT INTO erp_sequence 
                (fk_process_id, seq_position, visibility)
                VALUES (?, ?, 1)
            ";

                $insertStmt = mysqli_prepare($conn, $insertSql);
                mysqli_stmt_bind_param(
                    $insertStmt,
                    "ii",
                    $process_id,
                    $position
                );
                mysqli_stmt_execute($insertStmt);
                mysqli_stmt_close($insertStmt);
            }

            mysqli_stmt_close($checkStmt);
        }

        return [
            'status'  => true,
            'message' => 'Sequence updated successfully'
        ];
    }

    public function getAllSequenceList()
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $query = "SELECT * FROM erp_sequence
              WHERE visibility = 1 
              ORDER BY seq_position ASC";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            return [];
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function assignProcessTracking($type, $orders)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $firstProcessSql = "
        SELECT fk_process_id 
        FROM erp_sequence
        WHERE visibility = 1
        ORDER BY seq_position ASC
        LIMIT 1
    ";

        $firstProcessResult = mysqli_query($conn, $firstProcessSql);
        $firstProcess = mysqli_fetch_assoc($firstProcessResult);

        if (!$firstProcess) {
            return ['status' => false, 'message' => 'No sequence found'];
        }

        $firstProcessId = $firstProcess['fk_process_id'];

        require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/ProcessandSequence/phpqrcode/qrlib.php';

        $qrFolderAbsolute = $_SERVER['DOCUMENT_ROOT'] . '/modules/ProcessandSequence/track_process_qr/';

        if (!file_exists($qrFolderAbsolute)) {
            mkdir($qrFolderAbsolute, 0777, true);
        }

        foreach ($orders as $orderNo) {

            $qrData = $type . "|" . $orderNo . "|" . $firstProcessId;

            $fileName = $orderNo . "_" . time() . ".png";

            // Absolute path (for QRcode::png)
            $qrFullPath = $qrFolderAbsolute . $fileName;

            // Relative path (store in DB)
            $qrPathForDB = "modules/ProcessandSequence/track_process_qr/" . $fileName;

            QRcode::png($qrData, $qrFullPath, QR_ECLEVEL_L, 4);

            $insertSql = "
            INSERT INTO erp_process_tracking
            (order_no, order_type, fk_process_id, qr_path, visibility)
            VALUES (?, ?, ?, ?, 1)
        ";

            $stmt = mysqli_prepare($conn, $insertSql);
            mysqli_stmt_bind_param($stmt, "ssis", $orderNo, $type, $firstProcessId, $qrPathForDB);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        return [
            'status' => true,
            'message' => 'Tracking Created Successfully'
        ];
    }

    public function getTrackingList()
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $query = "
        SELECT t.pk_process_track_id,
               t.order_no,
               t.order_type,
               t.fk_process_id,
               t.qr_path,
               t.modified_on,
               p.process_name
        FROM erp_process_tracking t
        INNER JOIN (
            SELECT order_no, MAX(pk_process_track_id) AS max_id
            FROM erp_process_tracking
            WHERE visibility = 1
            GROUP BY order_no
        ) latest
            ON t.pk_process_track_id = latest.max_id
        LEFT JOIN erp_process p
            ON p.pk_process_id = t.fk_process_id
        WHERE t.visibility = 1
        ORDER BY t.pk_process_track_id DESC
    ";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            return [];
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAllSequenceList1()
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $query = "
        SELECT s.pk_seq_id,
               s.seq_position,
               s.fk_process_id,
               p.process_name
        FROM erp_sequence s
        LEFT JOIN erp_process p 
            ON p.pk_process_id = s.fk_process_id
        WHERE s.visibility = 1
        ORDER BY s.seq_position ASC
    ";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            return [];
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function updateProcessTracking($orderNo, $processId, $qrPath)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        if (!$orderNo || !$processId || !$qrPath) {
            return [
                'status' => false,
                'message' => 'Missing data'
            ];
        }

        $query = "
        INSERT INTO erp_process_tracking
        (order_no, order_type, fk_process_id, qr_path, visibility, created_on, modified_on)
        SELECT order_no,
               order_type,
               ?,
               ?,
               1,
               NOW(),
               NOW()
        FROM erp_process_tracking
        WHERE order_no = ?
        ORDER BY pk_process_track_id DESC
        LIMIT 1
    ";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "iss", $processId, $qrPath, $orderNo);
        mysqli_stmt_execute($stmt);

        return [
            'status' => true,
            'message' => 'Process Updated Successfully'
        ];
    }
}
