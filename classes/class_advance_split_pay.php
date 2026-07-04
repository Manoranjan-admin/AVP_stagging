<?php

class AdvanceSplitPay
{

    public function listAdvanceComm()
    {

        $sqlQuery = "SELECT adv.pk_adv_com_id,es.sono, cus.cus_name, cus.cus_code, adv.advance_amount,es.PK_ES_ID,DATE_FORMAT(adv.date, '%d-%m-%Y') as adv_date,adv.payment_type FROM erp_advance_comm AS adv LEFT JOIN erp_estimate_comm as es ON adv.fk_es_id=es.PK_ES_ID LEFT JOIN erp_customer_master AS cus ON adv.customer_id = cus.pk_cus_id ";

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST["search"]["value"])) {

            $jodate = $_POST["search"]["value"];
            $jodateVals = date('Y-m-d', strtotime($jodate));

            $sqlQuery .= 'where (adv.visibility=1 AND adv.type=0 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '") AND  (es.sono LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR DATE_FORMAT(adv.date, "%Y-%m-%d") LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . $_POST["search"]["value"] . '%") ';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';

        } else {

            $sqlQuery .= 'where adv.visibility=1  AND adv.type=0 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }



        if (!empty($_POST["order"])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY adv.pk_adv_com_id DESC ';
        }

        $display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        if ($_POST["length"] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_advance_comm where visibility=1 and type=0 ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['adv_date'];

            $payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));

            $rows[] = $payment_type;

            $rows[] = $record['advance_amount'];

            $rows[] = '<a href="index.php?erp=151&id=' . $record["pk_adv_com_id"] . '&type=1" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';


            $records[] = $rows;

            $i++;
        }

        $output = array(

            "draw" => intval($_POST["draw"]),

            "recordsTotal" => $allRecords,

            "recordsFiltered" => $displayRecords,

            "data" => $records,

        );

        echo json_encode($output);
    }

    public function listAdvanceNonComm()
    {
        $sqlQuery = "SELECT adv.pk_adv_noncom_id,es.sono, cus.cus_name, cus.cus_code, adv.advance_amount,es.PK_ES_ID,DATE_FORMAT(adv.date, '%d-%m-%Y') as adv_date,adv.payment_type FROM erp_advance_noncomm AS adv LEFT JOIN erp_estimate_noncomm as es ON adv.fk_es_id=es.PK_ES_ID LEFT JOIN erp_customer_master AS cus ON adv.customer_id = cus.pk_cus_id ";

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST["search"]["value"])) {

            $jodate = $_POST["search"]["value"];
            $jodateVals = date('Y-m-d', strtotime($jodate));

            $sqlQuery .= 'where (adv.visibility=1 AND adv.type=0 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '") AND  (es.sono LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR DATE_FORMAT(adv.date, "%Y-%m-%d") LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . $_POST["search"]["value"] . '%" )';
        } else {

            $sqlQuery .= 'where adv.visibility=1 AND adv.type=0 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }


        if (!empty($_POST["order"])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY adv.pk_adv_noncom_id DESC ';
        }


        $display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        if ($_POST["length"] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_advance_noncomm where visibility=1 and type =0 ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);



        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['adv_date'];

            $payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));

            $rows[] = $payment_type;

            $rows[] = $record['advance_amount'];

            $rows[] = '<a href="index.php?erp=151&id=' . $record["pk_adv_noncom_id"] . '&type=2" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            $records[] = $rows;

            $i++;
        }

        $output = array(

            "draw" => intval($_POST["draw"]),

            "recordsTotal" => $allRecords,

            "recordsFiltered" => $displayRecords,

            "data" => $records,

        );

        echo json_encode($output);
    }

    public function check_advamount_comm($sono)
    {
        if (!is_array($sono)) {
            $sono = [$sono];
        }

        if (empty($sono)) {
            return ['advcount' => 0, 'grand_total' => 0];
        }

        $ids = array_map('intval', $sono);
        $idList = implode(',', $ids);

        $query1 = "SELECT ad.advance_amount, es.grand_total, ad.type
                FROM erp_advance_comm AS ad
                LEFT JOIN erp_estimate_comm es 
                        ON ad.fk_es_id = es.PK_ES_ID
                WHERE es.PK_ES_ID IN ($idList)";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $advance_amount = 0;
        $grand_total = 0;
        $typeCount = 0;

        if (mysqli_num_rows($result1) > 0) {

            while ($record1 = mysqli_fetch_assoc($result1)) {

                $advance_amount += floatval($record1['advance_amount']);
                $grand_total += floatval($record1['grand_total']);

                if ($record1['type'] == 1) {
                    $typeCount++;   // ✅ FIXED
                }
            }
        } else {

            $query2 = "SELECT grand_total FROM erp_estimate_comm 
                    WHERE PK_ES_ID IN ($idList)";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);

            while ($record2 = mysqli_fetch_assoc($result2)) {
                $grand_total += floatval($record2['grand_total']);
            }
        }

        if ($typeCount == 0) {
            $value['advcount'] = $advance_amount;
        } else {
            $value['advcount'] = 0;
        }

        $value['grand_total'] = $grand_total;

        return $value;
    }

    public function check_advamount_noncomm($sono)
    {
        // Ensure array
        if (!is_array($sono)) {
            $sono = [$sono];
        }

        // Sanitize & build IN clause
        $ids = array_map('intval', $sono); // prevent SQL injection
        $idList = implode(',', $ids);

        $query1 = "SELECT ad.advance_amount, es.grand_total, ad.type
                    FROM erp_advance_noncomm AS ad
                    LEFT JOIN erp_estimate_noncomm es 
                        ON ad.fk_es_id = es.PK_ES_ID
                    WHERE es.PK_ES_ID IN ($idList)";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $totVal = 0;
        $checkBillCount = 0;
        $grand_totalVal = 0;
        $advance_amountVal = 0;

        if (mysqli_num_rows($result1) > 0) {

            $advance_amount = 0;
            $grand_total = 0;
            $typeCount = 0;

            while ($record1 = mysqli_fetch_assoc($result1)) {

                $advance_amount += floatval($record1['advance_amount']);
                $grand_total += floatval($record1['grand_total']);
                // ↑ sum totals if multiple estimates

                if ($record1['type'] == 1) {
                    $typeCount++;  // ✅ FIXED (count bill pay rows)
                }
            }

            $advance_amountVal = $advance_amount;
            $grand_totalVal = $grand_total;
            $totVal = $grand_totalVal - $advance_amountVal;
            $checkBillCount = $typeCount;
        } else {

            // No advance rows → fetch totals only
            $query2 = "SELECT grand_total FROM erp_estimate_noncomm WHERE PK_ES_ID IN ($idList)";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);

            $grand_total = 0;

            while ($record2 = mysqli_fetch_assoc($result2)) {
                $grand_total += floatval($record2['grand_total']);
            }

            $totVal = $grand_total;
            $grand_totalVal = $grand_total;
        }

        // Business logic (unchanged but simplified)
        if ($checkBillCount == 0) {

            if ($advance_amountVal > 0) {
                $value['advcount'] = $advance_amountVal;
            } else {
                $value['advcount'] = 0;
            }
        } else {
            $value['advcount'] = 0;
        }

        $value['grand_total'] = $grand_totalVal;

        return $value;
    }

    public function check_pending_amount_comm($sono, $adv)
    {
        if (!is_array($sono)) {
            $sono = [$sono];
        }

        if (empty($sono)) {
            return "No Estimate Selected";
        }

        $ids = array_map('intval', $sono);
        $idList = implode(',', $ids);

        $query1 = "SELECT ad.advance_amount, es.grand_total, ad.type
                FROM erp_advance_comm AS ad
                LEFT JOIN erp_estimate_comm es 
                        ON ad.fk_es_id = es.PK_ES_ID
                WHERE es.PK_ES_ID IN ($idList)";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $advance_amount = 0;
        $grand_total = 0;
        $typeCount = 0;

        if (mysqli_num_rows($result1) > 0) {

            while ($record1 = mysqli_fetch_assoc($result1)) {

                $advance_amount += floatval($record1['advance_amount']);
                $grand_total += floatval($record1['grand_total']);

                if ($record1['type'] == 1) {
                    $typeCount++;
                }
            }
        } else {

            $query2 = "SELECT grand_total FROM erp_estimate_comm 
                    WHERE PK_ES_ID IN ($idList)";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);

            while ($record2 = mysqli_fetch_assoc($result2)) {
                $grand_total += floatval($record2['grand_total']);
            }
        }

        $totVal = $grand_total - $advance_amount;

        if ($typeCount == 0) {

            if ($totVal > 0) {

                if ($totVal >= $adv) {
                    return 'true';
                } else {
                    return 'Balance receivable is ' . $totVal .
                        '. Entered advance is higher. Please enter less amount';
                }
            } else {
                return "Advance already collected fully. You can't edit.";
            }
        } else {
            return "Bill receipt collected. You can't edit.";
        }
    }

    public function check_pending_amount_noncomm($sono, $adv)
    {
        if (!is_array($sono)) {
            $sono = [$sono];
        }

        if (empty($sono)) {
            return "No Estimate Selected";
        }

        $ids = array_map('intval', $sono);
        $idList = implode(',', $ids);

        $query1 = "SELECT ad.advance_amount, es.grand_total, ad.type
                FROM erp_advance_noncomm AS ad
                LEFT JOIN erp_estimate_noncomm es 
                        ON ad.fk_es_id = es.PK_ES_ID
                WHERE es.PK_ES_ID IN ($idList)";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $advance_amount = 0;
        $grand_total = 0;
        $typeCount = 0;

        if (mysqli_num_rows($result1) > 0) {

            while ($record1 = mysqli_fetch_assoc($result1)) {

                $advance_amount += floatval($record1['advance_amount']);
                $grand_total += floatval($record1['grand_total']);

                if ($record1['type'] == 1) {
                    $typeCount++;
                }
            }
        } else {

            $query2 = "SELECT grand_total FROM erp_estimate_noncomm 
                    WHERE PK_ES_ID IN ($idList)";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);

            while ($record2 = mysqli_fetch_assoc($result2)) {
                $grand_total += floatval($record2['grand_total']);
            }
        }

        $totVal = $grand_total - $advance_amount;

        if ($typeCount == 0) {

            if ($totVal > 0) {

                if ($totVal >= $adv) {
                    return 'true';
                } else {
                    return 'Balance receivable is ' . $totVal .
                        '. Entered advance is higher. Please enter less amount';
                }
            } else {
                return "Advance already collected fully. You can't edit.";
            }
        } else {
            return "Bill receipt collected. You can't edit.";
        }
    }

    public function add_advance_comm($data)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        try {

            mysqli_begin_transaction($conn);

            $txt_pi_date = str_replace('/', '-', $data['txt_pi_date']);
            $date = date('Y-m-d', strtotime($txt_pi_date));

            $es_ids       = $data['txt_estimate_name'];   // use $data instead of $_POST
            $payment_type = $data['txt_payment_type'];
            $amounts      = $data['split_amount'];        // advance split amounts
            $cus_id       = $data['txt_customer_name'];
            $remarks      = $data['txt_remarks'];

            foreach ($es_ids as $index => $id) {

                $id     = (int)$id;
                $amount = (float)$amounts[$index];

                $query = "INSERT INTO erp_advance_comm (
                            fk_es_id, customer_id, advance_amount, 
                            payment_type, date, remarks, 
                            created_on, created_by, updated_on,
                            updated_by, visibility, type
                        ) VALUES (
                            $id, '$cus_id', $amount, 
                            '$payment_type', '$date', '$remarks', 
                            CURRENT_DATE, '', '',
                            '', 1, 0
                        )";

                mysqli_query($conn, $query);
            }

            mysqli_commit($conn);

            return 1;
        } catch (\Throwable $th) {

            mysqli_rollback($conn);

            error_log($th->getMessage()); // optional logging

            return 0;
        }
    }

    public function add_advance_noncomm($data)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        try {

            mysqli_begin_transaction($conn);

            $txt_pi_date = str_replace('/', '-', $data['txt_pi_date']);
            $date = date('Y-m-d', strtotime($txt_pi_date));

            $es_ids       = $data['txt_estimate_name'];   // use $data instead of $_POST
            $payment_type = $data['txt_payment_type'];
            $amounts      = $data['split_amount'];        // advance split amounts
            $cus_id       = $data['txt_customer_name'];
            $remarks      = $data['txt_remarks'];

            foreach ($es_ids as $index => $id) {

                $id     = (int)$id;
                $amount = (float)$amounts[$index];

                $query = "INSERT INTO erp_advance_noncomm (
                            fk_es_id, customer_id, advance_amount, 
                            payment_type, date, remarks, 
                            created_on, created_by, updated_on,
                            updated_by, visibility, type
                        ) VALUES (
                            $id, '$cus_id', $amount, 
                            '$payment_type', '$date', '$remarks', 
                            CURRENT_TIMESTAMP, '', '',
                            '', 1, 0
                        )";

                mysqli_query($conn, $query);
            }

            mysqli_commit($conn);

            return 1;
        } catch (\Throwable $th) {

            mysqli_rollback($conn);

            error_log($th->getMessage()); // optional logging

            return 0;
        }
    }
}
