<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
class Report
{
    public $fromdate;
    public $todate;

    public function __construct($c_fromdate, $c_todate)
    {
        $this->fromdate = mysqli_real_escape_string($GLOBALS['___mysqli_ston'], $c_fromdate);
        $this->todate = mysqli_real_escape_string($GLOBALS['___mysqli_ston'], $c_todate);
    }

    public function getfromdate()
    {
        return $this->fromdate;
    }

    public function gettodate()
    {
        return $this->todate;
    }

    public function setfromdate($s_fromdate)
    {
        $this->fromdate = mysqli_real_escape_string($GLOBALS['___mysqli_ston'], $s_fromdate);
    }

    public function settodate($s_todate)
    {
        $this->todate = mysqli_real_escape_string($GLOBALS['___mysqli_ston'], $s_todate);
    }

    public function collection_summary_grant_total($fromDateval, $toDateval, $customer, $franchise)
    {
        $customerq = '';
        $franchiseq = '';
        if ($customer != '') {
            $customerq = 'AND customer_id=' . $customer . '';
        }
        if ($franchise != '') {
            $franchiseq = 'AND franchise=' . $franchise . '';
        }
        $query = 'SELECT SUM(grand_total) as grand_total
		FROM `erp_estimate_comm` WHERE visibility =1 AND DATE_FORMAT(sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);
        while ($record = mysqli_fetch_assoc($res)) {
            //$result = number_format( $record[ 'grand_total' ], 2 );
            $result = $record['grand_total'];
        }
        //echo $query;
        return $result;
    }

    public function collection_summary_cash_total($fromDateval, $toDateval, $customer, $franchise, $type)
    {
        $customerq = '';
        $franchiseq = '';
        if ($customer != '') {
            $customerq = 'AND est.customer_id=' . $customer . '';
        }
        if ($franchise != '') {
            $franchiseq = 'AND est.franchise=' . $franchise . '';
        }
        if ($type == '1') {
            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_comm` as adv LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=1 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        } else if ($type == '2') {
            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_bill_comm` as adv LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=1 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        }

        //    $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_comm` as adv LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=1 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "'.$fromDateval.'" AND "'.$toDateval.'" '.$customerq.' '.$franchiseq.' ';

        //$query = 'SELECT SUM(advance_amount) as cash FROM `erp_advance_comm` WHERE payment_type=1 AND visibility =1 AND DATE_FORMAT(date, "%Y-%m-%d") BETWEEN "'.$fromDateval.'" AND "'.$toDateval.'"';

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        while ($record = mysqli_fetch_assoc($res)) {

            //$result = number_format( $record[ 'cash' ], 2 );

            $result = $record['cash'];
        }

        //echo $query;

        return $result;
    }

    public function collection_summary_upi_total($fromDateval, $toDateval, $customer, $franchise, $type)
    {

        $customerq = '';

        $franchiseq = '';

        if ($customer != '') {

            $customerq = 'AND est.customer_id=' . $customer . '';
        }

        if ($franchise != '') {

            $franchiseq = 'AND est.franchise=' . $franchise . '';
        }

        if ($type == '1') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_comm` as adv LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=3 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        } else if ($type == '2') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_bill_comm` as adv LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=3 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        }

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        while ($record = mysqli_fetch_assoc($res)) {

            // $result = number_format( $record[ 'cash' ], 2 );

            $result = $record['cash'];
        }

        return $result;
    }

    public function collection_summary_bank_total($fromDateval, $toDateval, $customer, $franchise, $type)
    {

        $customerq = '';

        $franchiseq = '';

        if ($customer != '') {

            $customerq = 'AND est.customer_id=' . $customer . '';
        }

        if ($franchise != '') {

            $franchiseq = 'AND est.franchise=' . $franchise . '';
        }

        if ($type == '1') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_comm` as adv LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=4 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        } else if ($type == '2') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_bill_comm` as adv LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=4 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        }

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        while ($record = mysqli_fetch_assoc($res)) {

            //$result = number_format( $record[ 'cash' ], 2 );

            $result = $record['cash'];
        }

        //echo $query;

        return $result;
    }

    public function collection_summary_credit_total($fromDateval, $toDateval, $customer, $franchise, $type)
    {

        $customerq = '';

        $franchiseq = '';

        if ($customer != '') {

            $customerq = 'AND est.customer_id=' . $customer . '';
        }

        if ($franchise != '') {

            $franchiseq = 'AND est.franchise=' . $franchise . '';
        }

        if ($type == '1') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_comm` as adv LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=2 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        } else if ($type == '2') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_bill_comm` as adv LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=2 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        }

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        while ($record = mysqli_fetch_assoc($res)) {

            //$result = number_format( $record[ 'cash' ], 2 );

            $result = $record['cash'];
        }

        //echo $query;

        return $result;
    }

    public function collection_summary_cheque_total($fromDateval, $toDateval, $customer, $franchise, $type)
    {

        $customerq = '';

        $franchiseq = '';

        if ($customer != '') {

            $customerq = 'AND est.customer_id=' . $customer . '';
        }

        if ($franchise != '') {

            $franchiseq = 'AND est.franchise=' . $franchise . '';
        }

        if ($type == '1') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_comm` as adv LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=5 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        } else if ($type == '2') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_bill_comm` as adv LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=5 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        }

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        while ($record = mysqli_fetch_assoc($res)) {

            //$result = number_format( $record[ 'cash' ], 2 );

            $result = $record['cash'];
        }

        //echo $query;

        return $result;
    }

    public function collection_summary_grant_total_non($fromDateval, $toDateval, $customer, $franchise)
    {

        $customerq = '';

        $franchiseq = '';

        if ($customer != '') {

            $customerq = 'AND customer_id=' . $customer . '';
        }

        if ($franchise != '') {

            $franchiseq = 'AND franchise=' . $franchise . '';
        }

        $query = 'SELECT SUM(grand_total) as grand_total

		FROM `erp_estimate_noncomm` WHERE visibility =1 AND DATE_FORMAT(sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        while ($record = mysqli_fetch_assoc($res)) {

            // $result = number_format( $record[ 'grand_total' ], 2 );

            $result = $record['grand_total'];
        }

        //echo $query;

        return $result;
    }

    public function collection_summary_cash_total_non($fromDateval, $toDateval, $customer, $franchise, $type)
    {

        $customerq = '';

        $franchiseq = '';

        if ($customer != '') {

            $customerq = 'AND est.customer_id=' . $customer . '';

            //$customerq1 = 'AND est.customer_id='.$customer.'';

        }

        if ($franchise != '') {

            $franchiseq = 'AND est.franchise=' . $franchise . '';
        }

        if ($type == '1') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_noncomm` as adv LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=1 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        } else if ($type == '2') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_bill_noncomm` as adv LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=1 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        }

        //$query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_noncomm` as adv LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=1 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "'.$fromDateval.'" AND "'.$toDateval.'" '.$customerq.' '.$franchiseq.' ';

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        while ($record = mysqli_fetch_assoc($res)) {

            // $result = number_format( $record[ 'cash' ], 2 );

            $result = $record['cash'];
        }

        //echo $query;

        return $result;
    }

    public function collection_summary_upi_total_non($fromDateval, $toDateval, $customer, $franchise, $type)
    {

        $customerq = '';

        $franchiseq = '';

        if ($customer != '') {

            $customerq = 'AND est.customer_id=' . $customer . '';
        }

        if ($franchise != '') {

            $franchiseq = 'AND est.franchise=' . $franchise . '';
        }

        if ($type == '1') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_noncomm` as adv LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=3 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        } else if ($type == '2') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_bill_noncomm` as adv LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=3 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        }

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        while ($record = mysqli_fetch_assoc($res)) {

            // $result = number_format( $record[ 'cash' ], 2 );

            $result = $record['cash'];
        }

        return $result;
    }

    public function collection_summary_bank_total_non($fromDateval, $toDateval, $customer, $franchise, $type)
    {

        $customerq = '';

        $franchiseq = '';

        if ($customer != '') {

            $customerq = 'AND est.customer_id=' . $customer . '';
        }

        if ($franchise != '') {

            $franchiseq = 'AND est.franchise=' . $franchise . '';
        }

        if ($type == '1') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_noncomm` as adv LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=4 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        } else if ($type == '2') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_bill_noncomm` as adv LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=4 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        }

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        while ($record = mysqli_fetch_assoc($res)) {

            //$result = number_format( $record[ 'cash' ], 2 );

            $result = $record['cash'];
        }

        //echo $query;

        return $result;
    }

    public function collection_summary_credit_total_non($fromDateval, $toDateval, $customer, $franchise, $type)
    {

        $customerq = '';

        $franchiseq = '';

        if ($customer != '') {

            $customerq = 'AND est.customer_id=' . $customer . '';
        }

        if ($franchise != '') {

            $franchiseq = 'AND est.franchise=' . $franchise . '';
        }

        if ($type == '1') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_noncomm` as adv LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=2 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        } else if ($type == '2') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_bill_noncomm` as adv LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=2 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        }

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        while ($record = mysqli_fetch_assoc($res)) {

            //$result = number_format( $record[ 'cash' ], 2 );

            $result = $record['cash'];
        }

        //echo $query;

        return $result;
    }

    public function collection_summary_cheque_total_non($fromDateval, $toDateval, $customer, $franchise, $type)
    {

        $customerq = '';

        $franchiseq = '';

        if ($customer != '') {

            $customerq = 'AND est.customer_id=' . $customer . '';
        }

        if ($franchise != '') {

            $franchiseq = 'AND est.franchise=' . $franchise . '';
        }

        if ($type == '1') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_noncomm` as adv LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=5 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        } else if ($type == '2') {

            $query = 'SELECT SUM(adv.advance_amount) as cash FROM `erp_advance_bill_noncomm` as adv LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID WHERE adv.payment_type=5 AND adv.visibility =1 AND DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" ' . $customerq . ' ' . $franchiseq . ' ';
        }

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        while ($record = mysqli_fetch_assoc($res)) {

            //$result = number_format( $record[ 'cash' ], 2 );

            $result = $record['cash'];
        }

        //echo $query;

        return $result;
    }

    public function commercial_collection_report()
    {

        if (isset($_POST['txt_receipt_type']) && $_POST['txt_receipt_type'] == 1) {

            // $r_type = $_POST[ 'txt_receipt_type' ]-1;

            $sqlQuery = 'SELECT adv.pk_adv_com_id,adv.advance_amount,adv.payment_type,adv.type,cus.cus_name,est.sono as es_no,est.sale_date,adv.date,cat.cat_name as franchies FROM `erp_advance_comm` as adv LEFT JOIN erp_customer_master as cus ON adv.customer_id=cus.pk_cus_id LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID LEFT JOIN erp_category as cat ON est.franchise=cat.pk_cat_id';
        } else if (isset($_POST['txt_receipt_type']) && $_POST['txt_receipt_type'] == 2) {

            $sqlQuery = "SELECT adv.pk_adv_com_id,adv.advance_amount,adv.payment_type,adv.type,cus.cus_name,est.sono,est.sale_date,adv.date,cat.cat_name,( SELECT GROUP_CONCAT(DISTINCT(f.cat_name)
             ORDER BY f.cat_name) cat_name FROM erp_estimate_comm est LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise 
             WHERE FIND_IN_SET(est.PK_ES_ID, adv.fk_es_id) > 0  ) as franchies,(select GROUP_CONCAT(ems.sono,' (',cms.cus_name,')')
             FROM erp_estimate_comm ems LEFT JOIN erp_customer_master cms ON cms.pk_cus_id = ems.customer_id  WHERE FIND_IN_SET(ems.PK_ES_ID,adv.fk_es_id)) as es_no 
             FROM `erp_advance_bill_comm` as adv LEFT JOIN erp_customer_master as cus ON adv.customer_id=cus.pk_cus_id LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID
             LEFT JOIN erp_category as cat ON est.franchise=cat.pk_cat_id";


            //  $sqlQuery = "SELECT adv.pk_adv_com_id,adv.advance_amount,adv.payment_type,adv.type,cus.cus_name,est.sono,est.sale_date,adv.date,cat.cat_name,( SELECT GROUP_CONCAT(DISTINCT(f.cat_name) ORDER BY f.cat_name) cat_name FROM erp_estimate_comm est LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise WHERE FIND_IN_SET(est.PK_ES_ID, adv.fk_es_id) > 0  ) as franchies, (select GROUP_CONCAT(sono SEPARATOR ' , ') FROM erp_estimate_comm WHERE FIND_IN_SET(PK_ES_ID,adv.fk_es_id)) as es_no FROM `erp_advance_bill_comm` as adv LEFT JOIN erp_customer_master as cus ON adv.customer_id=cus.pk_cus_id LEFT JOIN erp_estimate_comm as est ON adv.fk_es_id=est.PK_ES_ID LEFT JOIN erp_category as cat ON est.franchise=cat.pk_cat_id";

        }

        $mode = ($_POST['txt_mode_payment']) ? 'AND  adv.payment_type = ' . trim($_POST['txt_mode_payment']) . '' : '';

        // $type = ( $_POST[ 'txt_receipt_type' ] ) ? 'AND  adv.type = '.$r_type.'' : '';

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . trim($_POST['txt_customer_name']) . '' : '';

        $franid = ($_POST['txt_franchise_name']) ? 'AND  est.franchise = ' . trim($_POST['txt_franchise_name']) . '' : '';



        $fdate = str_replace('/', '-', $_POST['fromDate']);

        $fromDateval = date('Y-m-d', strtotime($fdate));

        $tdate = str_replace('/', '-', $_POST['toDate']);

        $toDateval = date('Y-m-d', strtotime($tdate));

        if (!empty($_POST['search']['value'])) {

            $amt = '.00';

            if (preg_match("/{$amt}/i", $_POST['search']['value'])) {

                $_POST['search']['value'] = str_replace($amt, '', $_POST['search']['value']);
            }

            $b_type = strtolower($_POST['search']['value']);

            if ($b_type == 'receipt' || $b_type == 'r' || $b_type == 're' || $b_type == 'rec' || $b_type == 'rece' || $b_type == 'recei' || $b_type == 'receip') {

                $search1 = ' OR adv.type =1';
            } else if ($b_type == 'advance' || $b_type == 'a' || $b_type == 'ad' || $b_type == 'adv' || $b_type == 'adva' || $b_type == 'advan' || $b_type == 'advanc') {

                $search1 = ' OR adv.type =0';
            } else if ($b_type == 'cash' || $b_type == 'c' || $b_type == 'ca' || $b_type == 'cas' || $b_type == 'cas') {

                $search1 = ' OR adv.payment_type =1';
            } else if ($b_type == 'credit card' || $b_type == 'credit' || $b_type == 'card' || $b_type == 'cr' || $b_type == 'cre' || $b_type == 'cred' || $b_type == 'credi' || $b_type == 'credit ' || $b_type == 'credit c' || $b_type == 'credit ca' || $b_type == 'credit car') {

                $search1 = ' OR adv.payment_type =2';
            } else if ($b_type == 'upi' || $b_type == 'u' || $b_type == 'up') {

                $search1 = ' OR adv.payment_type =3';
            } else if ($b_type == 'bank transfer' || $b_type == 'bank' || $b_type == 'transfer' || $b_type == 'ba' || $b_type == 'ban' || $b_type == 'bank ' || $b_type == 'bank t' || $b_type == 'bank tr' || $b_type == 'bank tra' || $b_type == 'bank tran' || $b_type == 'bank trans' || $b_type == 'bank transf' || $b_type == 'bank transfe') {

                $search1 = ' OR adv.payment_type =4';
            } else if ($b_type == 'cheque' || $b_type == 'ch' || $b_type == 'che' || $b_type == 'cheq' || $b_type == 'chequ') {

                $search1 = ' OR adv.payment_type =5';
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.visibility=1 ' . $mode . ' ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR adv.date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR ( SELECT GROUP_CONCAT(DISTINCT(f.cat_name) ORDER BY f.cat_name) cat_name FROM erp_estimate_comm est LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise WHERE FIND_IN_SET(est.PK_ES_ID, adv.fk_es_id) > 0  ) LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= $search1;

            $sqlQuery .= ' )';
        } else {

            $sqlQuery .= ' where est.visibility=1 ' . $mode . '  ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY adv.date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }


        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        /*  if ( isset( $_POST[ 'txt_receipt_type' ] ) && $_POST[ 'txt_receipt_type' ] == 1 ) {

        $stmtTotal = mysqli_query( $GLOBALS[ '___mysqli_ston' ], 'SELECT * FROM  erp_advance_comm where visibility=1' );

    } else if ( isset( $_POST[ 'txt_receipt_type' ] ) && $_POST[ 'txt_receipt_type' ] == 2 ) {

        $stmtTotal = mysqli_query( $GLOBALS[ '___mysqli_ston' ], 'SELECT * FROM  erp_advance_bill_comm where visibility=1  AND bill_paid = 1 ' );

    }
    */

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_advance_comm where visibility=1');

        $stmtTotal1 = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_advance_bill_comm where visibility=1');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $allResult1 = mysqli_fetch_assoc($stmtTotal1);

        $allRecords1 = mysqli_num_rows($stmtTotal1);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $payment_type = '';

            $pay_name = '';

            if ($record['payment_type'] == 1) {

                $payment_type = 'Cash';
            } else if ($record['payment_type'] == 2) {

                $payment_type = 'Credit Card';
            } else if ($record['payment_type'] == 3) {

                $payment_type = 'UPI';
            } else if ($record['payment_type'] == 4) {
                $payment_type = 'Bank Transfer';
            } else if ($record['payment_type'] == 5) {
                $payment_type = 'Cheque';
            }

            if (isset($_POST['txt_receipt_type']) && $_POST['txt_receipt_type'] == 1) {

                if ($record['type'] == 0) {

                    $pay_name = 'Advance';
                } else if ($record['type'] == 1) {

                    $pay_name = 'Receipt';
                }
            } else if (isset($_POST['txt_receipt_type']) && $_POST['txt_receipt_type'] == 2) {

                $pay_name = 'Bulk Payment';
            }

            // $advance = $this->getReceiptsadv( $record[ 'PK_ES_ID' ], 0, 'erp_advance_comm' );

            //$receipts = $this->getReceiptsrec( $record[ 'PK_ES_ID' ], 1, 'erp_advance_comm' );

            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['date']));

            $rows[] = ucfirst($record['es_no']);

            $rows[] = number_format($record['advance_amount'], 2);

            $rows[] = $payment_type;

            $rows[] = $record['cus_name'];

            $rows[] = $record['franchies'];

            $rows[] = $pay_name;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords + $allRecords1,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        //echo $sqlQuery;

        echo json_encode($output);
    }

    public function noncommercial_collection_report()
    {

        if (isset($_POST['txt_receipt_type']) && $_POST['txt_receipt_type'] == 1) {

            // $r_type = $_POST[ 'txt_receipt_type' ]-1;

            $sqlQuery = 'SELECT adv.pk_adv_noncom_id,adv.advance_amount,adv.payment_type,adv.type,cus.cus_name,est.sono as es_no,est.sale_date,adv.date,cat.cat_name as franchies FROM `erp_advance_noncomm` as adv LEFT JOIN erp_customer_master as cus ON adv.customer_id=cus.pk_cus_id LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID LEFT JOIN erp_category as cat ON est.franchise=cat.pk_cat_id ';
        } else if (isset($_POST['txt_receipt_type']) && $_POST['txt_receipt_type'] == 2) {

            $sqlQuery = "SELECT adv.pk_adv_noncom_id,adv.advance_amount,adv.payment_type,adv.type,cus.cus_name,est.sono,est.sale_date,adv.date,cat.cat_name,( SELECT GROUP_CONCAT(DISTINCT(f.cat_name) ORDER BY f.cat_name) cat_name FROM erp_estimate_noncomm est LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise WHERE FIND_IN_SET(est.PK_ES_ID, adv.fk_es_id) > 0  ) as franchies,(select GROUP_CONCAT(ems.sono, ' (',cms.cus_name,')') FROM erp_estimate_noncomm ems LEFT JOIN erp_customer_master cms ON cms.pk_cus_id = ems.customer_id  WHERE FIND_IN_SET(ems.PK_ES_ID,adv.fk_es_id)) as es_no FROM `erp_advance_bill_noncomm` as adv LEFT JOIN erp_customer_master as cus ON adv.customer_id=cus.pk_cus_id LEFT JOIN erp_estimate_noncomm as est ON adv.fk_es_id=est.PK_ES_ID LEFT JOIN erp_category as cat ON est.franchise=cat.pk_cat_id";
        }

        $mode = ($_POST['txt_mode_payment']) ? 'AND  adv.payment_type = ' . trim($_POST['txt_mode_payment']) . '' : '';

        // $type = ( $_POST[ 'txt_receipt_type' ] ) ? 'AND  adv.type = '.$r_type.'' : '';

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . trim($_POST['txt_customer_name']) . '' : '';

        $franid = ($_POST['txt_franchise_name']) ? 'AND  est.franchise = ' . trim($_POST['txt_franchise_name']) . '' : '';

        $fdate = str_replace('/', '-', $_POST['fromDate']);

        $fromDateval = date('Y-m-d', strtotime($fdate));

        $tdate = str_replace('/', '-', $_POST['toDate']);

        $toDateval = date('Y-m-d', strtotime($tdate));

        if (!empty($_POST['search']['value'])) {

            $b_type = strtolower($_POST['search']['value']);

            if ($b_type == 'receipt' || $b_type == 'r' || $b_type == 're' || $b_type == 'rec' || $b_type == 'rece' || $b_type == 'recei' || $b_type == 'receip') {

                $search1 = ' OR adv.type =1';
            } else if ($b_type == 'advance' || $b_type == 'a' || $b_type == 'ad' || $b_type == 'adv' || $b_type == 'adva' || $b_type == 'advan' || $b_type == 'advanc') {

                $search1 = ' OR adv.type =0';
            } else if ($b_type == 'cash' || $b_type == 'c' || $b_type == 'ca' || $b_type == 'cas' || $b_type == 'cas') {

                $search1 = ' OR adv.payment_type =1';
            } else if ($b_type == 'credit card' || $b_type == 'credit' || $b_type == 'card' || $b_type == 'cr' || $b_type == 'cre' || $b_type == 'cred' || $b_type == 'credi' || $b_type == 'credit ' || $b_type == 'credit c' || $b_type == 'credit ca' || $b_type == 'credit car') {

                $search1 = ' OR adv.payment_type =2';
            } else if ($b_type == 'upi' || $b_type == 'u' || $b_type == 'up') {

                $search1 = ' OR adv.payment_type =3';
            } else if ($b_type == 'bank transfer' || $b_type == 'bank' || $b_type == 'transfer' || $b_type == 'ba' || $b_type == 'ban' || $b_type == 'bank ' || $b_type == 'bank t' || $b_type == 'bank tr' || $b_type == 'bank tra' || $b_type == 'bank tran' || $b_type == 'bank trans' || $b_type == 'bank transf' || $b_type == 'bank transfe') {

                $search1 = ' OR adv.payment_type =4';
            } else if ($b_type == 'cheque' || $b_type == 'ch' || $b_type == 'che' || $b_type == 'cheq' || $b_type == 'chequ') {

                $search1 = ' OR adv.payment_type =5';
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.visibility=1 ' . $mode . ' ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR adv.date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR ( SELECT GROUP_CONCAT(DISTINCT(f.cat_name) ORDER BY f.cat_name) cat_name FROM erp_estimate_noncomm est LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise WHERE FIND_IN_SET(est.PK_ES_ID, adv.fk_es_id) > 0  ) LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= $search1;

            $sqlQuery .= ' )';
        } else {

            $sqlQuery .= ' where est.visibility=1 ' . $mode . '  ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY adv.date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_advance_noncomm where visibility=1');

        $stmtTotal1 = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_advance_bill_noncomm where visibility=1');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $allResult1 = mysqli_fetch_assoc($stmtTotal1);

        $allRecords1 = mysqli_num_rows($stmtTotal1);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {
            $payment_type = '';
            $pay_name = '';
            if ($record['payment_type'] == 1) {
                $payment_type = 'Cash';
            } else if ($record['payment_type'] == 2) {
                $payment_type = 'Credit Card';
            } else if ($record['payment_type'] == 3) {
                $payment_type = 'UPI';
            } else if ($record['payment_type'] == 4) {
                $payment_type = 'Bank Transfer';
            } else if ($record['payment_type'] == 5) {
                $payment_type = 'Cheque';
            }
            if (isset($_POST['txt_receipt_type']) && $_POST['txt_receipt_type'] == 1) {
                if ($record['type'] == 0) {
                    $pay_name = 'Advance';
                } else if ($record['type'] == 1) {
                    $pay_name = 'Receipt';
                }
            } else if (isset($_POST['txt_receipt_type']) && $_POST['txt_receipt_type'] == 2) {
                $pay_name = 'Bulk Payment';
            }
            // $advance = $this->getReceiptsadv( $record[ 'PK_ES_ID' ], 0, 'erp_advance_comm' );
            //$receipts = $this->getReceiptsrec( $record[ 'PK_ES_ID' ], 1, 'erp_advance_comm' );
            $rows = array();
            $rows[] = $_POST['start'] + $i;
            $rows[] = date('d-m-Y', strtotime($record['date']));
            $rows[] = ucfirst($record['es_no']);
            $rows[] = number_format($record['advance_amount'], 2);
            $rows[] = $payment_type;
            $rows[] = $record['cus_name'];
            $rows[] = $record['franchies'];
            $rows[] = $pay_name;
            $records[] = $rows;
            $i++;
        }
        $output = array(
            'draw' => intval($_POST['draw']),
            'recordsTotal' => $allRecords + $allRecords1,
            'recordsFiltered' => $displayRecords,
            'data' => $records,
        );
        //echo $sqlQuery;
        echo json_encode($output);
    }

    public function listCommPeriodicalReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,cm.cus_state,cm.cus_city,est.order_status,cm.cus_mob_no,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,f.cat_name  FROM erp_estimate_comm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise ';
        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));


        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . $_POST['txt_customer_name'] . '' : '';

        /*    $stateid = ( $_POST[ 'txt_state' ] ) ? 'AND  cm.cus_state = ' . $_POST[ 'txt_state' ] . '' : '';

    $cityid = ( $_POST[ 'txt_city' ] ) ? 'AND  cm.cus_city = ' . $_POST[ 'txt_city' ] . '' : '';
    */

        // $itemsquery = ( $_POST[ 'txt_items_name' ] ) ? 'AND  estp.fk_items_id = '.$_POST[ 'txt_items_name' ].' ' : " AND  estp.fk_items_id = ''  ";

        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.visibility=1 ' . $cusid . '  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" )';

            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_mob_no LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';

            /*  $sqlQuery .= ' where (est.visibility=1 AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "'.$fromDateval.'" AND "'.$toDateval.'")';

        $sqlQuery .= ' AND ( est.sono LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

        $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

        $sqlQuery .= ' OR cm.cus_name LIKE "%' . $_POST[ 'search' ][ 'value' ] . '%" ';

        $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

        $sqlQuery .= ' OR est.grand_total LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%") ';
        */
        } else {

            $sqlQuery .= 'where est.visibility=1 ' . $cusid . '  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.sono ,est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        //echo $sqlQuery;
        //exit;
        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM  erp_estimate_comm where visibility=1   AND  DATE_FORMAT(sale_date, '%Y-%m-%d') BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "' ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();
        //echo $sqlQuery;

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 1,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_COMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            $allResultproduct1 = [];

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if (array_key_exists('orientation', $allResultproduct1)) {
                    if ($allResultproduct1['orientation'] == 1) {
                        $itemorient = 'Length';
                    } else if ($allResultproduct1['orientation'] == 2) {
                        $itemorient = 'Breadth';
                    }
                }
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            //$rows[] = $record[ 'cuscode' ];

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            $rows[] = $itemnamesdata;

            // $rows[] = $itemorient;

            /* $rows[] =  $advance;

        $rows[] = $receipts;
        */

            // $rows[] = $osstatus;

            $rows[] = $record['grand_total'];

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listNonCommPeriodicalReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,cm.cus_state,cm.cus_city,est.order_status,cm.cus_mob_no,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,f.cat_name  FROM erp_estimate_noncomm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise ';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . $_POST['txt_customer_name'] . '' : '';

        //  $itemsquery = ( $_POST[ 'txt_items_name' ] ) ? 'AND  estp.fk_items_id = '.$_POST[ 'txt_items_name' ].' ' : " AND  estp.fk_items_id = ''  ";

        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.visibility=1 ' . $cusid . '  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_mob_no LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            $sqlQuery .= 'where est.visibility=1 ' . $cusid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.sono ,est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM  erp_estimate_noncomm WHERE visibility=1  AND  DATE_FORMAT(sale_date, '%Y-%m-%d') BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "'");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_noncomm');

            $rows = array();

            //IF( its.item_type = 2 && its.item_type = 2, ty.types_name, 'Product' ) as types_name item_type 4 5

            //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

            //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

            $sqlQueryproduct1 = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ')  as itemnames ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name, sum(sqp.qty) as qty FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '  AND sqp.itemtype = 4  ';

            $resultprod1 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct1);

            $allResultproduct1 = mysqli_fetch_assoc($resultprod1);

            $allcountprod1 = mysqli_num_rows($resultprod1);

            $sqlQueryproduct5 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 1,its.fk_item_id,'') as proditemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '  AND sqp.itemtype = 1';

            $resultprod5 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct5);

            $allResultproduct5 = mysqli_fetch_assoc($resultprod5);

            $allcountprod5 = mysqli_num_rows($resultprod5);

            $sqlQueryproduct6 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 2,its.fk_item_id,'') as proditemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '  AND sqp.itemtype = 2';

            $resultprod6 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct6);

            $allResultproduct6 = mysqli_fetch_assoc($resultprod6);

            $allcountprod6 = mysqli_num_rows($resultprod6);

            $sqlQueryproduct2 = "SELECT sqp.PK_ESP_ID, IF(its.item_type = 8,its.fk_item_id ,'') as paditemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 8';

            $resultprod2 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct2);

            $allResultproduct2 = mysqli_fetch_assoc($resultprod2);

            $allcountprod2 = mysqli_num_rows($resultprod2);

            $sqlQueryproduct3 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 7, its.fk_item_id ,'') as boxitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 7';

            $resultprod3 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct3);

            $allResultproduct3 = mysqli_fetch_assoc($resultprod3);

            $allcountprod3 = mysqli_num_rows($resultprod3);

            $sqlQueryproduct4 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 3, its.fk_item_id ,'') as sizeitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 3';

            $resultprod4 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct4);

            $allResultproduct4 = mysqli_fetch_assoc($resultprod4);

            $allcountprod4 = mysqli_num_rows($resultprod4);



            $sqlQueryproduct7 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 6, its.fk_item_id ,'') as bagitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 6';

            $resultprod7 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct7);

            $allResultproduct7 = mysqli_fetch_assoc($resultprod7);

            $allcountprod7 = mysqli_num_rows($resultprod7);


            /* $sqlQueryproduct8 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 4, GROUP_CONCAT(its.fk_item_id) ,'') as innersheetitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record[ 'PK_ES_ID' ] . ' AND sqp.itemtype = 4';

        $resultprod8 = mysqli_query( $GLOBALS[ '___mysqli_ston' ], $sqlQueryproduct8 );

        $allResultproduct8 = mysqli_fetch_assoc( $resultprod8 );

        $allcountprod8 = mysqli_num_rows( $resultprod8 );
            */

            //  $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 7, its.fk_item_id ,'') as boxitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM ".ESTIMATE_NONCOMM_PRO.' sqp LEFT JOIN '.ITEMS.' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN '.TYPES.' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = '.$record[ 'PK_ES_ID' ].'';

            $itemnamesdata = '';

            $itemqty = '';

            $itemorient = '';

            $proditemname = '';

            $paditemname = '';

            $boxitemname = '';

            $sizeitemname = '';

            if ($allcountprod1 > 0) {

                // var_dump( $allResultproduct );

                $itemnamesdata = $allResultproduct1['itemnames'];

                $itemqty = $allResultproduct1['qty'];

                $itemorient = '';

                if ($allResultproduct5['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct5['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            if ($allcountprod5 > 0) {

                // var_dump( $allResultproduct );

                $proditemname = $allResultproduct5['proditemname'];
            }

            if ($allcountprod6 > 0) {

                // var_dump( $allResultproduct );

                $catitemname = $allResultproduct6['proditemname'];
            }

            if ($allcountprod2 > 0) {

                $paditemname = $allResultproduct2['paditemname'];
            }

            if ($allcountprod3 > 0) {

                // var_dump( $allResultproduct );

                $boxitemname = $allResultproduct3['boxitemname'];
            }

            if ($allcountprod4 > 0) {

                // var_dump( $allResultproduct );

                $sizeitemname = $allResultproduct4['sizeitemname'];
            }

            if ($allcountprod7 > 0) {

                $bagitemname = $allResultproduct7['bagitemname'];
            }

            /*  if ( $allcountprod8 > 0 ) {

           // var_dump($allResultproduct8);
           $innersheetitemname = $allResultproduct8[ 'innersheetitemname' ];

        }*/

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            // $rows[] = $record[ 'cuscode' ];

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            $rows[] = $itemnamesdata;

            // $rows[] = $proditemname.' <br/>'.$catitemname;

            $rows[] = $proditemname . ' <br/>' . $catitemname . ' <br/>' . $paditemname . ' <br/>' . $boxitemname . ' <br/>' . $bagitemname;

            //     $rows[] =  $paditemname;

            //    $rows[] = $boxitemname;

            $rows[] = $sizeitemname;

            //$rows[] = $innersheetitemname;

            $rows[] = $itemqty;

            $rows[] = $itemorient;

            // $rows[] = $osstatus;

            $rows[] = $record['grand_total'];

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            // 'iTotalRecords' => $displayRecords,

            //'iTotalDisplayRecords' => $allRecords,

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listCommCustomerReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise ,f.cat_name,est.payment_type,est.bill_paid FROM erp_estimate_comm as est INNER JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN ' . CITIES . ' c ON c.pk_city_id = cm.cus_city LEFT JOIN ' . STATES . ' s ON s.state_code= cm.cus_state INNER JOIN ' . CATEGORY . ' f ON f.pk_cat_id= est.franchise  ';

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . $_POST['txt_customer_name'] . '' : '';
        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));
        if (!empty($_POST['search']['value'])) {
            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));
            $sqlQuery .= ' where (est.visibility=1  ' . $cusid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';
            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';
            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR est.payment_type LIKE "%' . trim($paymentval) . '%" ';
            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%" )';
        } else {

            $sqlQuery .= 'where est.visibility=1 ' . $cusid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.sono, est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        //echo $sqlQuery;
        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_comm where visibility=1  ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $paymenttype = '';
            if ($record['payment_type'] == 1) {
                $paymenttype = 'Cash';
            } else if ($record['payment_type'] == 2) {
                $paymenttype = 'Credit';
            }

            $query = "SELECT ( SELECT est.grand_total  FROM erp_estimate_comm est WHERE est.PK_ES_ID= " . $record['PK_ES_ID'] . ") as grand_total 
            FROM erp_advance_bill_comm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ", bp.fk_es_id) > 0";
            $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

            $bulkPay = '0';
            if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_array($result)) {
                    $bulkPay = $data['grand_total'];
                }
            }

            $query1 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=0";
            $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
            $advance = '0';
            if (mysqli_num_rows($result1)  > 0) {
                while ($data1 = mysqli_fetch_array($result1)) {
                    $advance = $data1['advance'];
                }
            }
            $query2 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=1";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $receipts = '0';
            if (mysqli_num_rows($result2)  > 0) {
                while ($data2 = mysqli_fetch_array($result2)) {
                    $receipts = $data2['advance'];
                }
            }



            $outTotal = $record['grand_total'] - ($receipts + $advance);
            $bulkamt = $outTotal;
            //$bulkamt =0;
            //var_dump($outTotal);
            // var_dump($bulkpay);


            if ($outTotal > 0 && $bulkPay > 0) {
                $bulkamt = floatval(0);
            }
            $editBtn = "";
            if ($bulkamt <= 0 || $record['bill_paid'] == 1) {
                $paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
            } else {
                $paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
            }
            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $view_btn = "<button type='button' class='btn btn-sm btn-primary view_his_btn' data-es_id='{$record['PK_ES_ID']}' data-cus_code='{$record['cuscode']}' data-cus_name='{$record['cusname']}' data-sono='{$record['sono']}' data-toggle='modal' data-target='#history_modal'>View</button>";

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name ,sqp.orientation FROM " . ESTIMATE_COMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cuscode'];

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            $rows[] = $paymenttype;

            $rows[] = $itemorient;

            $rows[] = $itemnamesdata;

            $rows[] = $advance;

            $rows[] = $receipts;

            $rows[] = $record['grand_total'];

            $rows[] = $osstatus;

            $rows[] = $paid_status;

            $rows[] = $view_btn;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

            /*

        'draw' => intval( $_POST[ 'draw' ] ),

        'iTotalRecords' => $displayRecords,

        'iTotalDisplayRecords' => $allRecords,

        'data' => $records, */

        );

        echo json_encode($output);
    }

    public function listNonCommCustomerReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise , itms.fk_item_id,f.cat_name,est.payment_type,est.bill_paid  FROM erp_estimate_noncomm as est INNER JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  INNER JOIN ' . CATEGORY . ' f ON f.pk_cat_id= est.franchise  INNER JOIN ' . ESTIMATE_NONCOMM_PRO . ' esp ON esp.fk_so_id= est.PK_ES_ID  LEFT JOIN ' . ITEMS . ' itms ON itms.pk_items_id= esp.fk_items_id ';

        //  $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status,cm.pk_cus_id ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise  FROM erp_estimate_noncomm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN ' . CITIES . ' c ON c.pk_city_id = cm.cus_city LEFT JOIN ' . STATES . ' s ON s.state_code= cm.cus_state ';

        //$fromDateval = date( 'Y-m-d', strtotime( $_POST[ 'fromDate' ] ) );

        //    $toDateval = date( 'Y-m-d', strtotime( $_POST[ 'toDate' ] ) );

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . $_POST['txt_customer_name'] . '' : '';
        $itemssize = ($_POST['txt_size_name']) ? 'AND  itms.pk_items_id  LIKE "%' . $_POST['txt_size_name'] . '%"' : '';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST['search']['value'])) {

            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.visibility=1  ' . $cusid . ' ' . $itemssize . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            /*

        if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {

            $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );

            $sqlQuery .= ' where (est.visibility=1  '.$cusid.')';
            */

            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.payment_type LIKE "%' . trim($paymentval) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

            $sqlQuery .= 'where est.visibility=1 ' . $cusid . ' ' . $itemssize . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            //$sqlQuery .= 'GROUP BY  est.PK_ES_ID  ORDER BY est.sono, est.sale_date ASC ';
            $sqlQuery .= 'GROUP BY est.PK_ES_ID ';
            $sqlQuery .= 'ORDER BY est.sale_date ASC, est.sono ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        // var_dump( $sqlQuery );

        // exit;

        //echo  $sqlQuery;

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_noncomm where visibility=1 ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $paymenttype = '';
            if ($record['payment_type'] == 1) {
                $paymenttype = 'Cash';
            } else if ($record['payment_type'] == 2) {
                $paymenttype = 'Credit';
            }

            $query = "SELECT ( SELECT est.grand_total  FROM erp_estimate_comm est WHERE est.PK_ES_ID= " . $record['PK_ES_ID'] . ") as grand_total 
            FROM erp_advance_bill_comm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ", bp.fk_es_id) > 0";
            $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

            $bulkPay = '0';
            if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_array($result)) {
                    $bulkPay = $data['grand_total'];
                }
            }

            $query1 = "SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=0";
            $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
            $advance = '0';
            if (mysqli_num_rows($result1)  > 0) {
                while ($data1 = mysqli_fetch_array($result1)) {
                    $advance = $data1['advance'];
                }
            }
            $query2 = "SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=1";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $receipts = '0';
            if (mysqli_num_rows($result2)  > 0) {
                while ($data2 = mysqli_fetch_array($result2)) {
                    $receipts = $data2['advance'];
                }
            }



            $outTotal = $record['grand_total'] - ($receipts + $advance);
            $bulkamt = $outTotal;
            //$bulkamt =0;
            //var_dump($outTotal);
            // var_dump($bulkpay);


            if ($outTotal > 0 && $bulkPay > 0) {
                $bulkamt = floatval(0);
            }
            $editBtn = "";
            if ($bulkamt <= 0 || $record['bill_paid'] == 1) {
                $paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
            } else {
                $paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
            }
            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $view_btn = "<span class='btn btn-sm btn-primary view_his_btn' data-es_id='{$record['PK_ES_ID']}' data-cus_code='{$record['cuscode']}' data-cus_name='{$record['cusname']}' data-sono='{$record['sono']}' data-toggle='modal' data-target='#history_modal' title='View Payment History'><i class='fa fa-history'></i></span>";

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_noncomm');

            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cuscode'];

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            $rows[] = $paymenttype;

            $rows[] = $itemorient;

            $rows[] = $itemnamesdata;

            $rows[] = $advance;

            $rows[] = $receipts;

            $rows[] = $record['grand_total'];

            $rows[] = $osstatus;

            $rows[] = $paid_status;

            $rows[] = $view_btn;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }
    public function listCommProductReport()
    {

        //  if ( isset( $_POST[ 'txt_items_name' ] ) && $_POST[ 'txt_items_name' ] != '' ) {

        $sqlQuery = 'SELECT eitm.fk_item_id,estp.PK_ESP_ID,COUNT(estp.PK_ESP_ID) countOrder,ests.sono,DATE_FORMAT(ests.sale_date,"%d/%m/%Y") AS sale_date , estp.fk_so_id,estp.fk_items_id, eitm.fk_item_id  "itemname", eitm.pk_items_id  "itemnameid",estp.status FROM ' . ESTIMATE_COMM_PRO . '  estp INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id INNER JOIN ' . ESTIMATE_COMM . ' ests ON ests.PK_ES_ID = estp.fk_so_id ';



        // $itemsnamequery = ( $_POST[ 'txt_items_name' ] ) ? '   itemnameid = ' . $_POST[ 'txt_items_name' ] . ' ' : "  ";
        $txt_items_name = array_filter($_POST['txt_items_name']);

        if (($key = array_search('ALL', $txt_items_name)) !== false) {
            unset($txt_items_name[$key]);
        }

        $itemsnamequery = (!empty($txt_items_name)) ? ' AND  TempPro.itemnameid IN (' . implode(',', $txt_items_name) . ') ' : "  ";

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST['search']['value'])) {


            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where ( estp.status = 0    AND  DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            $sqlQuery .= ' AND ( ests.sono LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            $sqlQuery .= 'where  estp.status = 0  AND  DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'GROUP BY estp.fk_so_id,eitm.fk_item_id HAVING COUNT(estp.PK_ESP_ID) > 0  ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'GROUP BY estp.fk_so_id,eitm.fk_item_id HAVING COUNT(estp.PK_ESP_ID) > 0  ORDER BY  estp.PK_ESP_ID, estp.fk_so_id  DESC ';
        }
        $sqlQuerylimit = '';
        if ($_POST['length'] != -1) {

            $sqlQuerylimit = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $sqlQuery1 =  ' SELECT TempPro.countOrder,TempPro.sale_date,TempPro.sono,TempPro.itemname,TempPro.itemnameid, TempPro.status FROM  ( ' . $sqlQuery . ' ) TempPro  where TempPro.status = 0  ' . $itemsnamequery . '' . $sqlQuerylimit . '';



        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery1);

        $itemsqueryval = 'WHERE  estp.status = 0  AND  DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" GROUP BY estp.fk_so_id,eitm.fk_item_id  HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY  estp.PK_ESP_ID, estp.fk_so_id  DESC';


        // echo 'SELECT *  FROM  ' . ESTIMATE_NONCOMM_PRO . '  estp  LEFT JOIN '.ESTIMATE_NONCOMM.' ests ON ests.PK_ES_ID = estp.fk_so_id ' . $itemsqueryval . '';
        //exit;
        // 'SELECT *  FROM  ' . ESTIMATE_NONCOMM_PRO . '  estp LEFT JOIN '.ESTIMATE_NONCOMM.' ests ON ests.PK_ES_ID = estp.fk_so_id  ' . $itemsqueryval . ''
        $selectQryCount =  'SELECT estp.PK_ESP_ID, eitm.pk_items_id "itemnameid",estp.status  FROM  ' . ESTIMATE_COMM_PRO . '  estp INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id INNER JOIN ' . ESTIMATE_COMM . ' ests ON ests.PK_ES_ID = estp.fk_so_id  ' . $itemsqueryval . '';


        $sqlQuery2 =  '  SELECT * FROM(' . $selectQryCount . ') TempPro   where TempPro.status = 0 ' . $itemsnamequery . '';

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery2);
        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        //$allResult = mysqli_fetch_assoc( $stmtTotal );

        //$allRecords = mysqli_num_rows( $stmtTotal );

        $displayRecords = mysqli_num_rows($stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = $record['sale_date'];
            $rows[] = $record['sono'];
            $rows[] = $record['itemname'];


            $rows[] = $record['countOrder'];

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'iTotalRecords' => $displayRecords,

            'iTotalDisplayRecords' => $allRecords,

            //'iTotalDisplayRecords' => $sqlQuery,

            'data' => $records,

        );
        echo json_encode($output);

        /* } else {
   
           $records = array();
   
           $output = array(
   
               'draw' => intval( $_POST[ 'draw' ] ),
   
               'iTotalRecords' => '0',
   
               // 'iTotalDisplayRecords' => $allRecords,
   
               'iTotalDisplayRecords' => '0',
   
               'data' => $records,
   
           );
   
           echo json_encode( $output );
   
       }*/
    }

    /* public function listNonCommProductReport()
    {
   
           if ( isset( $_POST[ 'txt_items_name' ] ) && $_POST[ 'txt_items_name' ] != '' ) {
   
               $sqlQuery = 'SELECT COUNT(estp.PK_ESP_ID) as countOrder,estp.created_on , (select est.sono FROM ' . ESTIMATE_NONCOMM . ' est where est.PK_ES_ID = estp.fk_so_id ) as sonos,(select its.fk_item_id FROM ' . ITEMS . ' its where its.pk_items_id = estp.fk_items_id ) as itemname FROM ' . ESTIMATE_NONCOMM_PRO . ' as estp ';
   
               $itemsquery = ( $_POST[ 'txt_items_name' ] ) ? 'AND  estp.fk_items_id = ' . $_POST[ 'txt_items_name' ] . ' ' : " AND  estp.fk_items_id = ''  ";
   
               if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {
   
                   $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );
   
                   $sqlQuery .= ' where ( estp.status = 0 AND estp.itemtype =1 ' . $itemsquery . ')';
   
                   $sqlQuery .= ' AND ( est.sono LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';
   
               } else {
   
                   $sqlQuery .= 'where  estp.status = 0 AND estp.itemtype =1 ' . $itemsquery . '';
   
               }
   
               if ( !empty( $_POST[ 'order' ] ) ) {
   
                   $sqlQuery .= 'HAVING COUNT(estp.PK_ESP_ID) > 0  ORDER BY ' . $_POST[ 'order' ][ '0' ][ 'column' ] . ' ' . $_POST[ 'order' ][ '0' ][ 'dir' ] . ' ';
   
               } else {
   
                   $sqlQuery .= 'HAVING COUNT(estp.PK_ESP_ID) > 0  ORDER BY estp.PK_ESP_ID DESC ';
   
               }
   
               if ( $_POST[ 'length' ] != -1 ) {
   
                   $sqlQuery .= 'LIMIT ' . $_POST[ 'start' ] . ', ' . $_POST[ 'length' ];
   
               }
   
               $stmt = mysqli_query( $GLOBALS[ '___mysqli_ston' ], $sqlQuery );
   
               $itemsqueryval = ( $_POST[ 'txt_items_name' ] ) ? 'AND  fk_items_id = ' . $_POST[ 'txt_items_name' ] . ' HAVING COUNT(PK_ESP_ID) > 0 ' : " AND  fk_items_id = ''  HAVING COUNT(PK_ESP_ID) > 0 ";
   
               $stmtTotal = mysqli_query( $GLOBALS[ '___mysqli_ston' ], 'SELECT * FROM  ' . ESTIMATE_NONCOMM_PRO . '  where  status = 0  ' . $itemsqueryval . '' );
   
               $allResult = mysqli_fetch_assoc( $stmtTotal );
   
               $allRecords = mysqli_num_rows( $stmtTotal );
   
               $displayRecords = mysqli_num_rows( $stmt );
   
               $records = array();
   
               $i = 1;
   
               while ( $record = mysqli_fetch_assoc( $stmt ) ) {
   
                   $rows = array();
   
                   $rows[] = $_POST[ 'start' ] + $i;
   
                   $rows[] = $record[ 'itemname' ];
   
                   $rows[] = $record[ 'countOrder' ];
   
                   $records[] = $rows;
   
                   $i++;
   
               }
   
               $output = array(
   
                   'draw' => intval( $_POST[ 'draw' ] ),
   
                   'iTotalRecords' => $displayRecords,
   
                   'iTotalDisplayRecords' => $allRecords,
   
                   //'iTotalDisplayRecords' => $sqlQuery,
   
                   'data' => $records,
   
               );
   
               echo json_encode( $output );
   
           } else {
   
               $records = array();
   
               $output = array(
   
                   'draw' => intval( $_POST[ 'draw' ] ),
   
                   'iTotalRecords' => '0',
   
                   // 'iTotalDisplayRecords' => $allRecords,
   
                   'iTotalDisplayRecords' => '0',
   
                   'data' => $records,
   
               );
   
               echo json_encode( $output );
   
           }

       }
*/
    // public function listNonCommProductReport()
    // {

    //        //if ( isset( $_POST[ 'txt_items_name' ] ) && $_POST[ 'txt_items_name' ] != '' ) {


    //          //  $sqlQuery = 'SELECT COUNT(estp.PK_ESP_ID) as countOrder,estp.created_on , ,(select its.fk_item_id FROM ' . ITEMS . ' its where its.pk_items_id = estp.fk_items_id AND  ) as itemname FROM  ' . ITEMS . ' its LEFT JOIN ' . ESTIMATE_NONCOMM_PRO . ' as estp ON its.pk_items_id = estp.fk_items_id  LEFT JOIN '.ESTIMATE_NONCOMM.' ests ON ests.PK_ES_ID = estp.fk_so_id ';

    //        /*  WITH temp_producttb AS ( SELECT eitm.fk_item_id,estp.PK_ESP_ID,COUNT(estp.PK_ESP_ID) countOrder,ests.sono,ests.sale_date, estp.fk_so_id,estp.fk_items_id,MAX(CASE WHEN estp.itemtype = 1 THEN eitm.fk_item_id ELSE 0 END) "itemname",MAX(CASE WHEN estp.itemtype = 2 THEN eitm.fk_item_id ELSE 0 END) "itemcategory",MAX(CASE WHEN estp.itemtype = 3 THEN eitm.fk_item_id ELSE 0 END) "itemsize",MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE 0 END) "itemnameid",MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE 0 END) "itemcategoryid",MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE 0 END) "itemsizeid" FROM rishidhkannan_test.erp_estimate_noncomm_product estp INNER JOIN rishidhkannan_test.erp_items eitm ON eitm.pk_items_id = estp.fk_items_id INNER JOIN rishidhkannan_test.erp_estimate_noncomm ests ON ests.PK_ES_ID = estp.fk_so_id where estp.status = 0 GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY estp.PK_ESP_ID, estp.fk_so_id DESC ) SELECT countOrder,sono,itemname, itemcategory, itemsize,itemnameid, itemcategoryid, itemsizeid FROM temp_producttb where itemnameid = 332 AND itemcategoryid = 261 AND  itemsizeid =57;*/

    //          $sqlQuery = 'SELECT eitm.fk_item_id,estp.PK_ESP_ID,COUNT(estp.PK_ESP_ID) countOrder,ests.sono,DATE_FORMAT(ests.sale_date,"%d/%m/%Y") AS sale_date , estp.fk_so_id,estp.fk_items_id,MAX(CASE WHEN estp.itemtype = 1 THEN eitm.fk_item_id ELSE "" END) "itemname",MAX(CASE WHEN estp.itemtype = 2 THEN eitm.fk_item_id ELSE "" END) "itemcategory",MAX(CASE WHEN estp.itemtype = 3 THEN eitm.fk_item_id ELSE "" END) "iteminnersheet",MAX(CASE WHEN estp.itemtype = 4 THEN eitm.fk_item_id ELSE "" END) "itemsize",MAX(CASE WHEN estp.itemtype = 6 THEN eitm.fk_item_id ELSE "" END) "itembag",MAX(CASE WHEN estp.itemtype = 7 THEN eitm.fk_item_id ELSE "" END) "itembox",MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE "" END) "itemnameid",MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE "" END) "itemcategoryid",MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE "" END) "iteminnersheetid",MAX(CASE WHEN estp.itemtype = 4 THEN eitm.pk_items_id ELSE "" END) "itemsizeid",MAX(CASE WHEN estp.itemtype = 6 THEN eitm.pk_items_id ELSE "" END) "itembagid",MAX(CASE WHEN estp.itemtype = 7 THEN eitm.pk_items_id ELSE "" END) "itemboxid",estp.status FROM ' . ESTIMATE_NONCOMM_PRO . '  estp INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id INNER JOIN '.ESTIMATE_NONCOMM.' ests ON ests.PK_ES_ID = estp.fk_so_id ';

    //      //    $sqlQuery = 'SELECT COUNT(estp.PK_ESP_ID) as countOrder,estp.created_on , (select est.sono FROM ' . ESTIMATE_NONCOMM . ' est where est.PK_ES_ID = estp.fk_so_id ) as sonos,(select its.fk_item_id FROM ' . ITEMS . ' its where its.pk_items_id = estp.fk_items_id ) as itemname FROM ' . ESTIMATE_NONCOMM_PRO . ' as estp LEFT JOIN '.ESTIMATE_NONCOMM.' ests ON ests.PK_ES_ID = estp.fk_so_id';

    //      $txt_items_name = array_filter($_POST[ 'txt_items_name' ]);
    //      $txt_items_category = array_filter($_POST[ 'txt_items_category' ]);
    //      $txt_items_size = array_filter($_POST[ 'txt_items_size' ]);
    //      $txt_items_innersheet = array_filter($_POST[ 'txt_items_innersheet' ]);
    //      $txt_items_bag = array_filter($_POST[ 'txt_items_bag' ]);
    //      $txt_items_box = array_filter($_POST[ 'txt_items_box' ]);

    //      if (($key = array_search('ALL', $txt_items_name)) !== false) {
    //        unset($txt_items_name[$key]);
    //        }
    //      if (($key = array_search('ALL', $txt_items_category)) !== false) {
    //        unset($txt_items_category[$key]);
    //        }
    //      if (($key = array_search('ALL', $txt_items_size)) !== false) {
    //        unset($txt_items_size[$key]);
    //        }
    //      if (($key = array_search('ALL', $txt_items_innersheet)) !== false) {
    //        unset($txt_items_size[$key]);
    //       }
    //      if (($key = array_search('ALL', $txt_items_bag)) !== false) {
    //        unset($txt_items_bag[$key]);
    //        }
    //      if (($key = array_search('ALL', $txt_items_box)) !== false) {
    //        unset($txt_items_box[$key]);
    //        }

    //            $itemsnamequery = (  !empty($txt_items_name )  ) ? ' AND  TempPro.itemnameid IN (' . implode(',',$txt_items_name) . ') ' : "  ";
    //            $itemscategoryquery = ( !empty($txt_items_category)  > 0 ) ? ' AND   TempPro.itemcategoryid IN (' .implode(',', $txt_items_category) . ') ' : "   ";
    //            $itemssizequery = (  !empty($txt_items_size) ) ? ' AND  TempPro.itemsizeid IN (' .  implode(',',$txt_items_size) . ') ' : "  ";
    //            $itemsinnersheetquery = (  !empty($txt_items_innersheet) ) ? ' AND  TempPro.iteminnersheetid IN (' .  implode(',',$txt_items_innersheet) . ') ' : "  ";
    //            $itemsbagquery = (  !empty($txt_items_bag) ) ? ' AND  TempPro.itembagid IN (' .  implode(',',$txt_items_bag) . ') ' : "  ";
    //            $itemsboxquery = (  !empty($txt_items_box) ) ? ' AND  TempPro.itemboxid IN (' .  implode(',',$txt_items_box) . ') ' : "  ";



    //          $fromDate = str_replace('/', '-', $_POST[ 'fromDate' ]);
    //         $fromDateval = date( 'Y-m-d', strtotime(  $fromDate ) );
    //          $toDate = str_replace('/', '-', $_POST[ 'toDate' ]);
    //         $toDateval = date( 'Y-m-d', strtotime(  $toDate ) );

    //         $seacrchSono = '';
    //         $seacrchDate = '';
    //        if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {


    //            $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );

    //            $sqlQuery .= ' where ( estp.status = 0    AND  DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

    //            $sqlQuery .= ' AND ( ests.sono LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" )';
    //           // $sqlQuery .= ' OR COUNT(estp.PK_ESP_ID) LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%") ';

    //        //    $seacrchDate = ' AND  ests.sale_date LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

    //          //  $seacrchSono = ' AND  ests.sono LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';




    //        } else {

    //            $sqlQuery .= 'where  estp.status = 0  AND  DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';

    //        }

    //            if ( !empty( $_POST[ 'order' ] ) ) {

    //                $sqlQuery .= 'GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0  ORDER BY ' . $_POST[ 'order' ][ '0' ][ 'column' ] . ' ' . $_POST[ 'order' ][ '0' ][ 'dir' ] . ' ';

    //            } else {

    //                $sqlQuery .= 'GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0  ORDER BY  estp.PK_ESP_ID, estp.fk_so_id  DESC ';

    //            }
    //            $sqlQuerylimit = '';
    //            if ( $_POST[ 'length' ] != -1 ) {

    //                $sqlQuerylimit = 'LIMIT ' . $_POST[ 'start' ] . ', ' . $_POST[ 'length' ];

    //            }


    //          $sqlQuery1 =  ' SELECT TempPro.countOrder,TempPro.sale_date,TempPro.sono,TempPro.itemname,TempPro.itemcategory,TempPro.iteminnersheet,TempPro.itemsize,TempPro.itembag,TempPro.itembox,TempPro.itemnameid, TempPro.itemcategoryid, TempPro.iteminnersheetid, TempPro.itemsizeid, TempPro.itembagid, TempPro.itemboxid FROM  ( '.$sqlQuery.' ) TempPro  where TempPro.status = 0  ' . $itemsnamequery . ' ' . $itemscategoryquery . ' ' . $itemssizequery . ' '. $itemsbagquery .' '.$itemsboxquery.'  '.$sqlQuerylimit .'';

    //     //var_dump( $sqlQuery1);
    //     //exit;
    //        //    $sqlQuery1 =  ' WITH temp_producttb AS ( '.$sqlQuery.' ) SELECT countOrder,sale_date,sono,itemname, itemcategory, itemsize,itemnameid, itemcategoryid, itemsizeid FROM temp_producttb where status = 0  ' . $itemsnamequery . ' ' . $itemscategoryquery . ' ' . $itemssizequery . ' '.$sqlQuerylimit .'';

    //            $stmt = mysqli_query( $GLOBALS[ '___mysqli_ston' ], $sqlQuery1 );

    //            $itemsqueryval = 'WHERE  estp.status = 0  AND  DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" GROUP BY estp.fk_so_id  HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY  estp.PK_ESP_ID, estp.fk_so_id  DESC';


    //           // echo 'SELECT *  FROM  ' . ESTIMATE_NONCOMM_PRO . '  estp  LEFT JOIN '.ESTIMATE_NONCOMM.' ests ON ests.PK_ES_ID = estp.fk_so_id ' . $itemsqueryval . '';


    //           // 'SELECT *  FROM  ' . ESTIMATE_NONCOMM_PRO . '  estp LEFT JOIN '.ESTIMATE_NONCOMM.' ests ON ests.PK_ES_ID = estp.fk_so_id  ' . $itemsqueryval . ''
    //            $selectQryCount =  'SELECT estp.PK_ESP_ID,MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE "" END) "itemnameid",MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE "" END) "itemcategoryid",MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE "" END)  "iteminnersheetid",MAX(CASE WHEN estp.itemtype = 4 THEN eitm.pk_items_id ELSE "" END) "itemsizeid",MAX(CASE WHEN estp.itemtype = 6 THEN eitm.pk_items_id ELSE "" END) "itembagid",MAX(CASE WHEN estp.itemtype = 7 THEN eitm.pk_items_id ELSE "" END) "itemboxid",estp.status  FROM  ' . ESTIMATE_NONCOMM_PRO . '  estp INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id INNER JOIN '.ESTIMATE_NONCOMM.' ests ON ests.PK_ES_ID = estp.fk_so_id  ' . $itemsqueryval . '';


    //             $sqlQuery2 =  ' SELECT * FROM('.$selectQryCount.') TempPro  where TempPro.status = 0 ' . $itemsnamequery . ' ' . $itemscategoryquery . '  ' . $itemssizequery . '  '. $itemsbagquery .' '.$itemsboxquery.' ';

    //             $stmtTotal = mysqli_query( $GLOBALS[ '___mysqli_ston' ],  $sqlQuery2);

    //            $allResult = mysqli_fetch_assoc( $stmtTotal );

    //            $allRecords = mysqli_num_rows( $stmtTotal );

    //            $displayRecords = mysqli_num_rows( $stmt );

    //            $records = array();

    //            $i = 1;

    //            while ( $record = mysqli_fetch_assoc( $stmt ) ) {


    //                $rows = array();

    //                $rows[] = $_POST[ 'start' ] + $i;

    //                $rows[] = $record[ 'sale_date' ];
    //                $rows[] = $record[ 'sono' ];
    //                $rows[] = $record[ 'itemname' ];
    //                $rows[] = $record[ 'itemcategory' ];
    //                $rows[] = $record[ 'itemsize' ];
    //                $rows[] = $record[ 'iteminnersheet' ];
    //                $rows[] = $record[ 'itembag' ];
    //                $rows[] = $record[ 'itembox' ];

    //                $rows[] = $record[ 'countOrder' ];

    //                $records[] = $rows;

    //                $i++;

    //            }

    //            $output = array(

    //                'draw' => intval( $_POST[ 'draw' ] ),

    //                'iTotalRecords' => $displayRecords,

    //                'iTotalDisplayRecords' => $allRecords,

    //                //'iTotalDisplayRecords' => $sqlQuery,

    //                'data' => $records,

    //            );

    //            echo json_encode( $output );

    //   /*     } else {

    //            $records = array();

    //            $output = array(

    //                'draw' => intval( $_POST[ 'draw' ] ),

    //                'iTotalRecords' => '0',

    //                // 'iTotalDisplayRecords' => $allRecords,

    //                'iTotalDisplayRecords' => '0',

    //                'data' => $records,

    //            );

    //            echo json_encode( $output );

    //        }*/

    //    }


    // public function listNonCommProductReport()
    // {


    //          $sqlQuery = 'SELECT eitm.fk_item_id, estp.qty, estp.PK_ESP_ID,COUNT(estp.PK_ESP_ID) countOrder,ests.sono,DATE_FORMAT(ests.sale_date,"%d/%m/%Y") AS sale_date , estp.fk_so_id,estp.fk_items_id,MAX(CASE WHEN estp.itemtype = 1 THEN eitm.fk_item_id ELSE "" END) "itemname",  MAX(CASE WHEN estp.itemtype = 1 THEN estp.qty ELSE 0 END) "itemname_qty", MAX(CASE WHEN estp.itemtype = 2 THEN eitm.fk_item_id ELSE "" END) "itemcategory", MAX(CASE WHEN estp.itemtype = 2 THEN estp.qty ELSE 0 END) "itemcategory_qty",
    //          MAX(CASE WHEN estp.itemtype = 3 THEN eitm.fk_item_id ELSE "" END) "iteminnersheet", MAX(CASE WHEN estp.itemtype = 3 THEN estp.qty ELSE 0 END) "iteminnersheet_qty", MAX(CASE WHEN estp.itemtype = 4 THEN eitm.fk_item_id ELSE "" END) "itemsize",     MAX(CASE WHEN estp.itemtype = 4 THEN estp.qty ELSE 0 END) "itemsize_qty", MAX(CASE WHEN estp.itemtype = 6 THEN eitm.fk_item_id ELSE "" END) "itembag",     MAX(CASE WHEN estp.itemtype = 6 THEN estp.qty ELSE 0 END) "itembag_qty", MAX(CASE WHEN estp.itemtype = 7 THEN eitm.fk_item_id ELSE "" END) "itembox",     MAX(CASE WHEN estp.itemtype = 7 THEN estp.qty ELSE 0 END) "itembox_qty",MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE "" END) "itemnameid",MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE "" END) "itemcategoryid",MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE "" END) "iteminnersheetid",MAX(CASE WHEN estp.itemtype = 4 THEN eitm.pk_items_id ELSE "" END) "itemsizeid",MAX(CASE WHEN estp.itemtype = 6 THEN eitm.pk_items_id ELSE "" END) "itembagid",MAX(CASE WHEN estp.itemtype = 7 THEN eitm.pk_items_id ELSE "" END) "itemboxid",estp.status FROM ' . ESTIMATE_NONCOMM_PRO . '  estp INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id INNER JOIN '.ESTIMATE_NONCOMM.' ests ON ests.PK_ES_ID = estp.fk_so_id ';


    //      $txt_items_name = array_filter($_POST[ 'txt_items_name' ]);
    //      $txt_items_category = array_filter($_POST[ 'txt_items_category' ]);
    //      $txt_items_size = array_filter($_POST[ 'txt_items_size' ]);
    //      $txt_items_innersheet = array_filter($_POST[ 'txt_items_innersheet' ]);
    //      $txt_items_bag = array_filter($_POST[ 'txt_items_bag' ]);
    //      $txt_items_box = array_filter($_POST[ 'txt_items_box' ]);

    //      if (($key = array_search('ALL', $txt_items_name)) !== false) {
    //        unset($txt_items_name[$key]);
    //        }
    //      if (($key = array_search('ALL', $txt_items_category)) !== false) {
    //        unset($txt_items_category[$key]);
    //        }
    //      if (($key = array_search('ALL', $txt_items_size)) !== false) {
    //        unset($txt_items_size[$key]);
    //        }
    //      if (($key = array_search('ALL', $txt_items_innersheet)) !== false) {
    //        unset($txt_items_size[$key]);
    //       }
    //      if (($key = array_search('ALL', $txt_items_bag)) !== false) {
    //        unset($txt_items_bag[$key]);
    //        }
    //      if (($key = array_search('ALL', $txt_items_box)) !== false) {
    //        unset($txt_items_box[$key]);
    //        }

    //            $itemsnamequery = (  !empty($txt_items_name )  ) ? ' AND  TempPro.itemnameid IN (' . implode(',',$txt_items_name) . ') ' : "  ";
    //            $itemscategoryquery = ( !empty($txt_items_category)  > 0 ) ? ' AND   TempPro.itemcategoryid IN (' .implode(',', $txt_items_category) . ') ' : "   ";
    //            $itemssizequery = (  !empty($txt_items_size) ) ? ' AND  TempPro.itemsizeid IN (' .  implode(',',$txt_items_size) . ') ' : "  ";
    //            $itemsinnersheetquery = (  !empty($txt_items_innersheet) ) ? ' AND  TempPro.iteminnersheetid IN (' .  implode(',',$txt_items_innersheet) . ') ' : "  ";
    //            $itemsbagquery = (  !empty($txt_items_bag) ) ? ' AND  TempPro.itembagid IN (' .  implode(',',$txt_items_bag) . ') ' : "  ";
    //            $itemsboxquery = (  !empty($txt_items_box) ) ? ' AND  TempPro.itemboxid IN (' .  implode(',',$txt_items_box) . ') ' : "  ";



    //          $fromDate = str_replace('/', '-', $_POST[ 'fromDate' ]);
    //         $fromDateval = date( 'Y-m-d', strtotime(  $fromDate ) );
    //          $toDate = str_replace('/', '-', $_POST[ 'toDate' ]);
    //         $toDateval = date( 'Y-m-d', strtotime(  $toDate ) );

    //         $seacrchSono = '';
    //         $seacrchDate = '';
    //        if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {


    //            $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );

    //            $sqlQuery .= ' where ( estp.status = 0    AND  DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

    //            $sqlQuery .= ' AND ( ests.sono LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" )';





    //        } else {

    //            $sqlQuery .= 'where  estp.status = 0  AND  DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';

    //        }

    //            if ( !empty( $_POST[ 'order' ] ) ) {

    //                $sqlQuery .= 'GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0  ORDER BY ' . $_POST[ 'order' ][ '0' ][ 'column' ] . ' ' . $_POST[ 'order' ][ '0' ][ 'dir' ] . ' ';

    //            } else {

    //                $sqlQuery .= 'GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0  ORDER BY  estp.PK_ESP_ID, estp.fk_so_id  DESC ';

    //            }
    //            $sqlQuerylimit = '';
    //            if ( $_POST[ 'length' ] != -1 ) {

    //                $sqlQuerylimit = 'LIMIT ' . $_POST[ 'start' ] . ', ' . $_POST[ 'length' ];

    //            }


    //          $sqlQuery1 =  ' SELECT TempPro.countOrder,TempPro.sale_date,TempPro.sono,TempPro.itemname,TempPro.itemcategory,TempPro.iteminnersheet,TempPro.itemsize,TempPro.itembag,TempPro.itembox,TempPro.itemnameid, TempPro.itemcategoryid, TempPro.iteminnersheetid, TempPro.itemsizeid, TempPro.itembagid, TempPro.itemboxid FROM  ( '.$sqlQuery.' ) TempPro  where TempPro.status = 0  ' . $itemsnamequery . ' ' . $itemscategoryquery . ' ' . $itemssizequery . ' '. $itemsbagquery .' '.$itemsboxquery.'  '.$sqlQuerylimit .'';


    //            $stmt = mysqli_query( $GLOBALS[ '___mysqli_ston' ], $sqlQuery1 );

    //            $itemsqueryval = 'WHERE  estp.status = 0  AND  DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" GROUP BY estp.fk_so_id  HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY  estp.PK_ESP_ID, estp.fk_so_id  DESC';


    //            $selectQryCount =  'SELECT estp.PK_ESP_ID,MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE "" END) "itemnameid",MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE "" END) "itemcategoryid",MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE "" END)  "iteminnersheetid",MAX(CASE WHEN estp.itemtype = 4 THEN eitm.pk_items_id ELSE "" END) "itemsizeid",MAX(CASE WHEN estp.itemtype = 6 THEN eitm.pk_items_id ELSE "" END) "itembagid",MAX(CASE WHEN estp.itemtype = 7 THEN eitm.pk_items_id ELSE "" END) "itemboxid",estp.status  FROM  ' . ESTIMATE_NONCOMM_PRO . '  estp INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id INNER JOIN '.ESTIMATE_NONCOMM.' ests ON ests.PK_ES_ID = estp.fk_so_id  ' . $itemsqueryval . '';


    //             $sqlQuery2 =  ' SELECT * FROM('.$selectQryCount.') TempPro  where TempPro.status = 0 ' . $itemsnamequery . ' ' . $itemscategoryquery . '  ' . $itemssizequery . '  '. $itemsbagquery .' '.$itemsboxquery.' ';

    //             $stmtTotal = mysqli_query( $GLOBALS[ '___mysqli_ston' ],  $sqlQuery2);

    //            $allResult = mysqli_fetch_assoc( $stmtTotal );

    //            $allRecords = mysqli_num_rows( $stmtTotal );

    //            $displayRecords = mysqli_num_rows( $stmt );

    //            $records = array();

    //            $i = 1;

    //           // ...
    // while ($record = mysqli_fetch_assoc($stmt)) {
    //     $rows = array();
    //     $rows[] = $_POST['start'] + $i;
    //     $rows[] = $record['sale_date'];
    //     $rows[] = $record['sono'];
    //     $rows[] = $record['itemname'];
    //     $rows[] = $record['itemcategory'];
    //     $rows[] = $record['itemsize'];
    //     $rows[] = $record['iteminnersheet'];
    //     $rows[] = $record['itembag'];
    //     $rows[] = $record['itembox'];
    //     $rows[] = $record['itemname_qty']; // Include the quantity fields here
    //     $rows[] = $record['itemcategory_qty'];
    //     $rows[] = $record['itemsize_qty'];
    //     $rows[] = $record['iteminnersheet_qty'];
    //     $rows[] = $record['itembag_qty'];
    //     $rows[] = $record['itembox_qty'];
    //     $rows[] = $record['countOrder'];
    //     $records[] = $rows;
    //     $i++;
    // }

    // $output = array(
    //     'draw' => intval($_POST['draw']),
    //     'iTotalRecords' => $displayRecords,
    //     'iTotalDisplayRecords' => $allRecords,
    //     'data' => $records,
    // );

    // echo json_encode($output);

    //    }






    // public function listNonCommProductReport()
    // {
    //     $sqlQuery = 'SELECT eitm.fk_item_id, estp.qty, estp.PK_ESP_ID, COUNT(estp.PK_ESP_ID) countOrder, ests.sono, DATE_FORMAT(ests.sale_date,"%d/%m/%Y") AS sale_date, estp.fk_so_id, estp.fk_items_id,
    //     MAX(CASE WHEN estp.itemtype = 1 THEN eitm.fk_item_id ELSE "" END) AS itemname,
    //     MAX(CASE WHEN estp.itemtype = 1 THEN estp.qty ELSE 0 END) AS itemname_qty,
    //     MAX(CASE WHEN estp.itemtype = 2 THEN eitm.fk_item_id ELSE "" END) AS itemcategory,
    //     MAX(CASE WHEN estp.itemtype = 2 THEN estp.qty ELSE 0 END) AS itemcategory_qty,
    //     MAX(CASE WHEN estp.itemtype = 3 THEN eitm.fk_item_id ELSE "" END) AS itemsize,
    //     MAX(CASE WHEN estp.itemtype = 3 THEN estp.qty ELSE 0 END) AS itemsize_qty,
    //     GROUP_CONCAT(DISTINCT CASE WHEN estp.itemtype = 4 THEN eitm.fk_item_id ELSE "" END ORDER BY estp.qty SEPARATOR \',\n\') AS iteminnersheet,
    //     GROUP_CONCAT(DISTINCT CASE WHEN estp.itemtype = 4 THEN estp.qty ELSE "" END ORDER BY estp.qty SEPARATOR \',\n\') AS iteminnersheet_qty,
    //     MAX(CASE WHEN estp.itemtype = 6 THEN eitm.fk_item_id ELSE "" END) AS itembag,
    //     MAX(CASE WHEN estp.itemtype = 6 THEN estp.qty ELSE 0 END) AS itembag_qty,
    //     MAX(CASE WHEN estp.itemtype = 7 THEN eitm.fk_item_id ELSE "" END) AS itembox,
    //     MAX(CASE WHEN estp.itemtype = 7 THEN estp.qty ELSE 0 END) AS itembox_qty,
    //     MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE "" END) AS itemnameid,
    //     MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE "" END) AS itemcategoryid,
    //     MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE "" END) AS itemsizeid,
    //     GROUP_CONCAT(DISTINCT CASE WHEN estp.itemtype = 4 THEN eitm.pk_items_id ELSE "" END ORDER BY estp.qty SEPARATOR \',\n\') AS iteminnersheetid,
    //     MAX(CASE WHEN estp.itemtype = 6 THEN eitm.pk_items_id ELSE "" END) AS itembagid,
    //     MAX(CASE WHEN estp.itemtype = 7 THEN eitm.pk_items_id ELSE "" END) AS itemboxid,
    //     estp.status
    //     FROM ' . ESTIMATE_NONCOMM_PRO . ' estp
    //     INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id
    //     INNER JOIN ' . ESTIMATE_NONCOMM . ' ests ON ests.PK_ES_ID = estp.fk_so_id ';
    //     $txt_items_name = array_filter($_POST['txt_items_name']);
    //     $txt_items_category = array_filter($_POST['txt_items_category']);
    //     $txt_items_size = array_filter($_POST['txt_items_size']);
    //     $txt_items_innersheet = array_filter($_POST['txt_items_innersheet']);
    //     $txt_items_bag = array_filter($_POST['txt_items_bag']);
    //     $txt_items_box = array_filter($_POST['txt_items_box']);

    //     if (($key = array_search('ALL', $txt_items_name)) !== false) {
    //         unset($txt_items_name[$key]);
    //     }
    //     if (($key = array_search('ALL', $txt_items_category)) !== false) {
    //         unset($txt_items_category[$key]);
    //     }
    //     if (($key = array_search('ALL', $txt_items_size)) !== false) {
    //         unset($txt_items_size[$key]);
    //     }
    //     if (($key = array_search('ALL', $txt_items_innersheet)) !== false) {
    //         unset($txt_items_innersheet[$key]);
    //     }
    //     if (($key = array_search('ALL', $txt_items_bag)) !== false) {
    //         unset($txt_items_bag[$key]);
    //     }
    //     if (($key = array_search('ALL', $txt_items_box)) !== false) {
    //         unset($txt_items_box[$key]);
    //     }

    //     $itemsnamequery = (!empty($txt_items_name)) ? ' AND TempPro.itemnameid IN (' . implode(',', $txt_items_name) . ') ' : '';
    //     $itemscategoryquery = (!empty($txt_items_category)) ? ' AND TempPro.itemcategoryid IN (' . implode(',', $txt_items_category) . ') ' : '';
    //     $itemssizequery = (!empty($txt_items_size)) ? ' AND TempPro.itemsizeid IN (' . implode(',', $txt_items_size) . ') ' : '';
    //     $itemsinnersheetquery = (!empty($txt_items_innersheet)) ? ' AND TempPro.iteminnersheetid IN (' . implode(',', $txt_items_innersheet) . ') ' : '';
    //     $itemsbagquery = (!empty($txt_items_bag)) ? ' AND TempPro.itembagid IN (' . implode(',', $txt_items_bag) . ') ' : '';
    //     $itemsboxquery = (!empty($txt_items_box)) ? ' AND TempPro.itemboxid IN (' . implode(',', $txt_items_box) . ') ' : '';

    //     $fromDate = str_replace('/', '-', $_POST['fromDate']);
    //     $fromDateval = date('Y-m-d', strtotime($fromDate));
    //     $toDate = str_replace('/', '-', $_POST['toDate']);
    //     $toDateval = date('Y-m-d', strtotime($toDate));

    //     $searchSono = '';
    //     $searchDate = '';

    //     if (!empty($_POST['search']['value'])) {
    //         $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));
    //         $searchSono = ' AND (ests.sono LIKE "%' . trim($_POST['search']['value']) . '%" )';
    //     }

    //     $sqlQuery .= ' WHERE estp.status = 0 AND DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
    //     $sqlQuery .= $searchSono;

    //     if (!empty($_POST['order'])) {
    //         $sqlQuery .= ' GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
    //     } else {
    //         $sqlQuery .= ' GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY  estp.PK_ESP_ID, estp.fk_so_id DESC ';
    //     }

    //     $sqlQuerylimit = '';
    //     if ($_POST['length'] != -1) {
    //         $sqlQuerylimit = ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    //     }

    //     $sqlQuery1 = 'SELECT TempPro.countOrder, TempPro.sale_date, TempPro.sono, TempPro.itemname, TempPro.itemname_qty, TempPro.itemcategory, TempPro.itemcategory_qty, TempPro.iteminnersheet, TempPro.iteminnersheet_qty, TempPro.itemsize, TempPro.itemsize_qty, TempPro.itembag, TempPro.itembag_qty, TempPro.itembox, TempPro.itembox_qty,
    //         TempPro.itemnameid, TempPro.itemcategoryid, TempPro.itemsizeid, TempPro.iteminnersheetid, TempPro.itembagid, TempPro.itemboxid
    //         FROM ( ' . $sqlQuery . ' ) TempPro WHERE TempPro.status = 0 ' . $itemsnamequery . ' ' . $itemscategoryquery . ' ' . $itemssizequery . ' ' . $itemsinnersheetquery . ' ' . $itemsbagquery . ' ' . $itemsboxquery . ' ' . $sqlQuerylimit . '';
    //     echo $sqlQuery1;
    //     exit;

    //     $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery1);

    //     $itemsqueryval = ' WHERE estp.status = 0 AND DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" GROUP BY estp.fk_so_id  HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY  estp.PK_ESP_ID, estp.fk_so_id  DESC';

    //     $selectQryCount = 'SELECT estp.PK_ESP_ID, MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE "" END) "itemnameid",
    //         MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE "" END) "itemcategoryid",
    //         MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE "" END) "itemsizeid",
    //         MAX(CASE WHEN estp.itemtype = 4 THEN eitm.pk_items_id ELSE "" END) "iteminnersheetid",
    //         MAX(CASE WHEN estp.itemtype = 6 THEN eitm.pk_items_id ELSE "" END) "itembagid",
    //         MAX(CASE WHEN estp.itemtype = 7 THEN eitm.pk_items_id ELSE "" END) "itemboxid", estp.status
    //         FROM ' . ESTIMATE_NONCOMM_PRO . ' estp
    //         INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id
    //         INNER JOIN ' . ESTIMATE_NONCOMM . ' ests ON ests.PK_ES_ID = estp.fk_so_id  ' . $itemsqueryval . '';

    //     $sqlQuery2 = ' SELECT * FROM(' . $selectQryCount . ') TempPro  WHERE TempPro.status = 0 ' . $itemsnamequery . ' ' . $itemscategoryquery . '  ' . $itemssizequery . ' ' . $itemsinnersheetquery . ' ' . $itemsbagquery . ' ' . $itemsboxquery . ' ';

    //     $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'],  $sqlQuery2);
    //     $allResult = mysqli_fetch_assoc($stmtTotal);
    //     $allRecords = mysqli_num_rows($stmtTotal);
    //     $displayRecords = mysqli_num_rows($stmt);
    //     $records = array();
    //     $i = 1;

    //     while ($record = mysqli_fetch_assoc($stmt)) {
    //         $rows = array();
    //         $rows[] = $_POST['start'] + $i;
    //         $rows[] = $record['sale_date'];
    //         $rows[] = $record['sono'];
    //         $rows[] = $record['itemname'];
    //         $rows[] = $record['itemname_qty'];
    //         $rows[] = $record['itemcategory'];
    //         $rows[] = $record['itemcategory_qty'];
    //         $rows[] = $record['itemsize'];
    //         $rows[] = $record['itemsize_qty'];
    //         $rows[] = $record['iteminnersheet'];
    //         $rows[] = $record['iteminnersheet_qty'];
    //         $rows[] = $record['itembag'];
    //         $rows[] = $record['itembag_qty'];
    //         $rows[] = $record['itembox'];
    //         $rows[] = $record['itembox_qty'];
    //         $rows[] = $record['countOrder'];
    //         $records[] = $rows;
    //         $i++;
    //     }

    //     $output = array(
    //         'draw' => intval($_POST['draw']),
    //         'iTotalRecords' => $displayRecords,
    //         'iTotalDisplayRecords' => $allRecords,
    //         'data' => $records,
    //     );

    //     echo json_encode($output);
    // }

    // public function listNonCommProductReport()
    // {
    //     $txt_items_name = (isset($_POST['txt_items_name'])) ? $_POST['txt_items_name'] : array('ALL');
    //     $txt_items_category = (isset($_POST['txt_items_category'])) ? $_POST['txt_items_category'] : array('ALL');
    //     $txt_items_size = (isset($_POST['txt_items_size'])) ? $_POST['txt_items_size'] : array('ALL');
    //     $txt_items_innersheet = (isset($_POST['txt_items_innersheet'])) ? $_POST['txt_items_innersheet'] : array('ALL');
    //     $txt_items_bag = (isset($_POST['txt_items_bag'])) ? $_POST['txt_items_bag'] : array('ALL');
    //     $txt_items_box = (isset($_POST['txt_items_box'])) ? $_POST['txt_items_box'] : array('ALL');


    //     if (($key = array_search('ALL', $txt_items_name)) !== false) {
    //         unset($txt_items_name[$key]);
    //     }
    //     if (($key = array_search('ALL', $txt_items_category)) !== false) {
    //         unset($txt_items_category[$key]);
    //     }
    //     if (($key = array_search('ALL', $txt_items_size)) !== false) {
    //         unset($txt_items_size[$key]);
    //     }
    //     if (($key = array_search('ALL', $txt_items_innersheet)) !== false) {
    //         unset($txt_items_innersheet[$key]);
    //     }
    //     if (($key = array_search('ALL', $txt_items_bag)) !== false) {
    //         unset($txt_items_bag[$key]);
    //     }
    //     if (($key = array_search('ALL', $txt_items_box)) !== false) {
    //         unset($txt_items_box[$key]);
    //     }

    //     $selectedInnersheetNames = array();
    //     if (!empty($txt_items_innersheet)) {
    //         $selectedInnersheetNames = $txt_items_innersheet;
    //     }

    //     $innersheetFilter = '';
    //     $innersheetFiltersel = '';
    //     if (!empty($selectedInnersheetNames)) {
    //         // Use a subquery to filter the iteminnersheet values
    //         $innersheetFilter = ' AND TempPro.iteminnersheetid IN (' . implode(',', $selectedInnersheetNames) . ')';
    //         $innersheetFiltersel = ' && estp.fk_items_id IN (' . implode(',', $selectedInnersheetNames) . ') ';


    //     }


    //     $sqlQuery = 'SELECT eitm.fk_item_id, estp.qty, estp.PK_ESP_ID, COUNT(estp.PK_ESP_ID) countOrder, ests.sono, DATE_FORMAT(ests.sale_date,"%d/%m/%Y") AS sale_date, estp.fk_so_id, estp.fk_items_id,
    //     MAX(CASE WHEN estp.itemtype = 1 THEN eitm.fk_item_id ELSE "" END) AS itemname,
    //     MAX(CASE WHEN estp.itemtype = 1 THEN estp.qty ELSE 0 END) AS itemname_qty,
    //     MAX(CASE WHEN estp.itemtype = 2 THEN eitm.fk_item_id ELSE "" END) AS itemcategory,
    //     MAX(CASE WHEN estp.itemtype = 2 THEN estp.qty ELSE 0 END) AS itemcategory_qty,
    //     MAX(CASE WHEN estp.itemtype = 3 THEN eitm.fk_item_id ELSE "" END) AS itemsize,
    //     MAX(CASE WHEN estp.itemtype = 3 THEN estp.qty ELSE 0 END) AS itemsize_qty,
    //     GROUP_CONCAT(DISTINCT CASE WHEN estp.itemtype = 4   '.$innersheetFiltersel.' THEN eitm.fk_item_id ELSE "" END ORDER BY estp.qty SEPARATOR \'<br>\') AS iteminnersheet,
    //     GROUP_CONCAT(DISTINCT CASE WHEN estp.itemtype = 4 '.$innersheetFiltersel.'  THEN estp.qty ELSE "" END ORDER BY estp.qty SEPARATOR \'<br>\') AS iteminnersheet_qty,
    //     MAX(CASE WHEN estp.itemtype = 6 THEN eitm.fk_item_id ELSE "" END) AS itembag,
    //     MAX(CASE WHEN estp.itemtype = 6 THEN estp.qty ELSE 0 END) AS itembag_qty,
    //     MAX(CASE WHEN estp.itemtype = 7 THEN eitm.fk_item_id ELSE "" END) AS itembox,
    //     MAX(CASE WHEN estp.itemtype = 7 THEN estp.qty ELSE 0 END) AS itembox_qty,
    //     MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE "" END) AS itemnameid,
    //     MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE "" END) AS itemcategoryid,
    //     MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE "" END) AS itemsizeid,
    //     TRIM(BOTH "," FROM GROUP_CONCAT(DISTINCT CASE WHEN estp.itemtype = 4 '.$innersheetFiltersel.'  THEN eitm.pk_items_id ELSE "" END SEPARATOR ",")) AS iteminnersheetid,
    //     MAX(CASE WHEN estp.itemtype = 6 THEN eitm.pk_items_id ELSE "" END) AS itembagid,
    //     MAX(CASE WHEN estp.itemtype = 7 THEN eitm.pk_items_id ELSE "" END) AS itemboxid,
    //     estp.status
    //     FROM ' . ESTIMATE_NONCOMM_PRO . ' estp
    //     INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id
    //     INNER JOIN ' . ESTIMATE_NONCOMM . ' ests ON ests.PK_ES_ID = estp.fk_so_id ';




    //     $itemsnamequery = (!empty($txt_items_name)) ? ' AND TempPro.itemnameid IN (' . implode(',', $txt_items_name) . ') ' : '';
    //     $itemscategoryquery = (!empty($txt_items_category)) ? ' AND TempPro.itemcategoryid IN (' . implode(',', $txt_items_category) . ') ' : '';
    //     $itemssizequery = (!empty($txt_items_size)) ? ' AND TempPro.itemsizeid IN (' . implode(',', $txt_items_size) . ') ' : '';

    //     $itemsbagquery = (!empty($txt_items_bag)) ? ' AND TempPro.itembagid IN (' . implode(',', $txt_items_bag) . ') ' : '';
    //     $itemsboxquery = (!empty($txt_items_box)) ? ' AND TempPro.itemboxid IN (' . implode(',', $txt_items_box) . ') ' : '';

    //     $fromDate = str_replace('/', '-', $_POST['fromDate']);
    //     $fromDateval = date('Y-m-d', strtotime($fromDate));
    //     $toDate = str_replace('/', '-', $_POST['toDate']);
    //     $toDateval = date('Y-m-d', strtotime($toDate));

    //     $searchSono = '';
    //     $searchDate = '';

    //     if (!empty($_POST['search']['value'])) {
    //         $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));
    //         $searchSono = ' AND (ests.sono LIKE "%' . trim($_POST['search']['value']) . '%" )';
    //     }

    //     $sqlQuery .= ' WHERE estp.status = 0 AND DATE_FORMAT(ests.sale_date, "%Y-%m-d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
    //     $sqlQuery .= $searchSono;

    //     if (!empty($_POST['order'])) {
    //         $sqlQuery .= ' GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
    //     } else {
    //         $sqlQuery .= ' GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY  estp.PK_ESP_ID, estp.fk_so_id DESC ';
    //     }

    //     $sqlQuerylimit = '';
    //     if ($_POST['length'] != -1) {
    //         $sqlQuerylimit = ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    //     }

    //     $sqlQuery1 = 'SELECT TempPro.countOrder, TempPro.sale_date, TempPro.sono, TempPro.itemname, TempPro.itemname_qty, TempPro.itemcategory, TempPro.itemcategory_qty, TempPro.iteminnersheet, TempPro.iteminnersheet_qty, TempPro.itemsize, TempPro.itemsize_qty, TempPro.itembag, TempPro.itembag_qty, TempPro.itembox, TempPro.itembox_qty,
    //     TempPro.itemnameid, TempPro.itemcategoryid, TempPro.itemsizeid, TempPro.iteminnersheetid, TempPro.itembagid, TempPro.itemboxid
    //         FROM ( ' . $sqlQuery . ' ) TempPro WHERE TempPro.status = 0 ' . $itemsnamequery . ' ' . $itemscategoryquery . ' ' . $itemssizequery . ' ' . $innersheetFilter . ' ' . $itemsbagquery . ' ' . $itemsboxquery . ' ' . $sqlQuerylimit . '';

    //     //  echo $sqlQuery1;
    //     //  exit;
    //     $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery1);

    //     $itemsqueryval = ' WHERE estp.status = 0 AND DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" GROUP BY estp.fk_so_id  HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY  estp.PK_ESP_ID, estp.fk_so_id  DESC';

    //     $selectQryCount = 'SELECT estp.PK_ESP_ID, MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE "" END) "itemnameid",
    //         MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE "" END) "itemcategoryid",
    //         MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE "" END) "itemsizeid",
    //         MAX(CASE WHEN estp.itemtype = 4 THEN eitm.pk_items_id ELSE "" END) "iteminnersheetid",
    //         MAX(CASE WHEN estp.itemtype = 6 THEN eitm.pk_items_id ELSE "" END) "itembagid",
    //         MAX(CASE WHEN estp.itemtype = 7 THEN eitm.pk_items_id ELSE "" END) "itemboxid", estp.status
    //         FROM ' . ESTIMATE_NONCOMM_PRO . ' estp
    //         INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id
    //         INNER JOIN ' . ESTIMATE_NONCOMM . ' ests ON ests.PK_ES_ID = estp.fk_so_id  ' . $itemsqueryval . '';

    //     $sqlQuery2 = ' SELECT * FROM(' . $selectQryCount . ') TempPro  WHERE TempPro.status = 0 ' . $itemsnamequery . ' ' . $itemscategoryquery . '  ' . $itemssizequery . ' ' . $innersheetFilter . ' ' . $itemsbagquery . ' ' . $itemsboxquery . ' ';

    //     $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'],  $sqlQuery2);
    //     $allResult = mysqli_fetch_assoc($stmtTotal);
    //     $allRecords = mysqli_num_rows($stmtTotal);
    //     $displayRecords = mysqli_num_rows($stmt);


    //     $records = array();
    //     $i = 1;
    //     while ($record = mysqli_fetch_assoc($stmt)) {




    //         $rows = array();
    //         $rows[] = $_POST['start'] + $i;
    //         $rows[] = $record['sale_date'];
    //         $rows[] = $record['sono'];
    //         $rows[] = $record['itemname'];
    //         $rows[] = $record['itemname_qty'];
    //         $rows[] = $record['itemcategory'];
    //         $rows[] = $record['itemcategory_qty'];
    //         $rows[] = $record['itemsize'];
    //         $rows[] = $record['itemsize_qty'];
    //         $iteminnersheet = $record['iteminnersheet'];
    //         $iteminnersheet_qty = $record['iteminnersheet_qty'];
    //         if (!empty($selectedInnersheetNames)) {
    //             $innersheetValues = explode('<br>', $iteminnersheet);
    //             $innersheetQtyValues = explode('<br>', $iteminnersheet_qty);

    //             $filteredInnersheet = [];
    //             $filteredInnersheetQty = [];
    //             foreach ($innersheetValues as $index => $innersheetValue) {
    //                 if (in_array($innersheetValue, $selectedInnersheetNames)) {
    //                     $filteredInnersheet[] = $innersheetValue;
    //                     $filteredInnersheetQty[] = $innersheetQtyValues[$index];
    //                 }
    //             }
    //             if (empty($filteredInnersheet)) {
    //                 $filteredInnersheet = $innersheetValues;
    //                 $filteredInnersheetQty = $innersheetQtyValues;
    //             }
    //             $iteminnersheet = implode('<br>', $filteredInnersheet);
    //             $iteminnersheet_qty = implode('<br>', $filteredInnersheetQty);
    //         }

    //         $rows[] = $iteminnersheet;
    //         $rows[] = $iteminnersheet_qty;


    //         $rows[] = $record['itembag'];
    //         $rows[] = $record['itembag_qty'];
    //         $rows[] = $record['itembox'];
    //         $rows[] = $record['itembox_qty'];
    //         $rows[] = $record['countOrder'];

    //         $records[] = $rows;
    //         $i++;
    //     }

    //     $output = array(
    //         'draw' => intval($_POST['draw']),
    //         'iTotalRecords' => $displayRecords,
    //         'iTotalDisplayRecords' => $allRecords,
    //         'data' => $records,
    //     );

    //     echo json_encode($output);
    // }


    public function listNonCommProductReport()
    {
        $txt_items_name = (isset($_POST['txt_items_name'])) ? $_POST['txt_items_name'] : array('ALL');
        $txt_items_category = (isset($_POST['txt_items_category'])) ? $_POST['txt_items_category'] : array('ALL');
        $txt_items_size = (isset($_POST['txt_items_size'])) ? $_POST['txt_items_size'] : array('ALL');
        $txt_items_innersheet = (isset($_POST['txt_items_innersheet'])) ? $_POST['txt_items_innersheet'] : array('ALL');
        $txt_items_bag = (isset($_POST['txt_items_bag'])) ? $_POST['txt_items_bag'] : array('ALL');
        $txt_items_box = (isset($_POST['txt_items_box'])) ? $_POST['txt_items_box'] : array('ALL');

        if (($key = array_search('ALL', $txt_items_name)) !== false) {
            unset($txt_items_name[$key]);
        }
        if (($key = array_search('ALL', $txt_items_category)) !== false) {
            unset($txt_items_category[$key]);
        }
        if (($key = array_search('ALL', $txt_items_size)) !== false) {
            unset($txt_items_size[$key]);
        }
        if (($key = array_search('ALL', $txt_items_innersheet)) !== false) {
            unset($txt_items_innersheet[$key]);
        }
        if (($key = array_search('ALL', $txt_items_bag)) !== false) {
            unset($txt_items_bag[$key]);
        }
        if (($key = array_search('ALL', $txt_items_box)) !== false) {
            unset($txt_items_box[$key]);
        }

        $selectedInnersheetNames = array();
        if (!empty($txt_items_innersheet)) {
            $selectedInnersheetNames = $txt_items_innersheet;
        }

        $innersheetFilter = '';
        $innersheetFiltersel = '';
        if (!empty($selectedInnersheetNames)) {
            // Use a subquery to filter the iteminnersheet values
            $innersheetFilter = ' AND TempPro.iteminnersheetid IN (' . implode(',', $selectedInnersheetNames) . ')';
            $innersheetFiltersel = ' && estp.fk_items_id IN (' . implode(',', $selectedInnersheetNames) . ') ';
        }

        $sqlQuery = 'SELECT eitm.fk_item_id, estp.qty, estp.PK_ESP_ID, COUNT(estp.PK_ESP_ID) countOrder, ests.sono, DATE_FORMAT(ests.sale_date,"%d/%m/%Y") AS sale_date, estp.fk_so_id, estp.fk_items_id,
        MAX(CASE WHEN estp.itemtype = 1 THEN eitm.fk_item_id ELSE "" END) AS itemname,
        MAX(CASE WHEN estp.itemtype = 1 THEN estp.qty ELSE 0 END) AS itemname_qty,
        MAX(CASE WHEN estp.itemtype = 2 THEN eitm.fk_item_id ELSE "" END) AS itemcategory,
        MAX(CASE WHEN estp.itemtype = 2 THEN estp.qty ELSE 0 END) AS itemcategory_qty,
        MAX(CASE WHEN estp.itemtype = 3 THEN eitm.fk_item_id ELSE "" END) AS itemsize,
        MAX(CASE WHEN estp.itemtype = 3 THEN estp.qty ELSE 0 END) AS itemsize_qty,
        GROUP_CONCAT(DISTINCT CASE WHEN estp.itemtype = 4   ' . $innersheetFiltersel . ' THEN eitm.fk_item_id ELSE "" END ORDER BY estp.qty SEPARATOR \'<br>\') AS iteminnersheet,
        GROUP_CONCAT(CASE WHEN estp.itemtype = 4 ' . $innersheetFiltersel . ' THEN CASE WHEN estp.qty <> "" THEN estp.qty END ELSE NULL END ORDER BY estp.qty SEPARATOR \'<br>\') AS iteminnersheet_qty,
        MAX(CASE WHEN estp.itemtype = 6 THEN eitm.fk_item_id ELSE "" END) AS itembag,
        MAX(CASE WHEN estp.itemtype = 6 THEN estp.qty ELSE 0 END) AS itembag_qty,
        MAX(CASE WHEN estp.itemtype = 7 THEN eitm.fk_item_id ELSE "" END) AS itembox,
        MAX(CASE WHEN estp.itemtype = 7 THEN estp.qty ELSE 0 END) AS itembox_qty,
        MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE "" END) AS itemnameid,
        MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE "" END) AS itemcategoryid,
        MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE "" END) AS itemsizeid,
        TRIM(BOTH "," FROM GROUP_CONCAT(DISTINCT CASE WHEN estp.itemtype = 4 ' . $innersheetFiltersel . '  THEN eitm.pk_items_id ELSE "" END SEPARATOR ",")) AS iteminnersheetid,
        MAX(CASE WHEN estp.itemtype = 6 THEN eitm.pk_items_id ELSE "" END) AS itembagid,
        MAX(CASE WHEN estp.itemtype = 7 THEN eitm.pk_items_id ELSE "" END) AS itemboxid,
        estp.status
    FROM ' . ESTIMATE_NONCOMM_PRO . ' estp
    INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id
    INNER JOIN ' . ESTIMATE_NONCOMM . ' ests ON ests.PK_ES_ID = estp.fk_so_id ';

        $itemsnamequery = (!empty($txt_items_name)) ? ' AND TempPro.itemnameid IN (' . implode(',', $txt_items_name) . ') ' : '';
        $itemscategoryquery = (!empty($txt_items_category)) ? ' AND TempPro.itemcategoryid IN (' . implode(',', $txt_items_category) . ') ' : '';
        $itemssizequery = (!empty($txt_items_size)) ? ' AND TempPro.itemsizeid IN (' . implode(',', $txt_items_size) . ') ' : '';
        $itemsbagquery = (!empty($txt_items_bag)) ? ' AND TempPro.itembagid IN (' . implode(',', $txt_items_bag) . ') ' : '';
        $itemsboxquery = (!empty($txt_items_box)) ? ' AND TempPro.itemboxid IN (' . implode(',', $txt_items_box) . ') ' : '';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate . ' +1 day')) . ' 23:59:59';


        $searchSono = '';
        $searchDate = '';

        if (!empty($_POST['search']['value'])) {
            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));
            $searchSono = ' AND (ests.sono LIKE "%' . trim($_POST['search']['value']) . '%" )';
        }

        $sqlQuery .= ' WHERE estp.status = 0 AND DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        $sqlQuery .= $searchSono;


        // Order by sale_date if specified, else default to PK_ESP_ID, estp.fk_so_id DESC
        if (!empty($_POST['order']) && isset($orderColumnNames[$_POST['order']['0']['column']])) {
            $orderByColumn = $orderColumnNames[$_POST['order']['0']['column']];
            $sqlQuery .= ' GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY ' . $orderByColumn . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            // Default ordering by sale_date in decending order
            $sqlQuery .= ' GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY ests.sale_date DESC ';
        }

        $sqlQuerylimit = '';
        if ($_POST['length'] != -1) {
            $sqlQuerylimit = ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $sqlQuery1 = 'SELECT TempPro.countOrder, TempPro.sale_date, TempPro.sono, TempPro.itemname, TempPro.itemname_qty, TempPro.itemcategory, TempPro.itemcategory_qty, TempPro.iteminnersheet, TempPro.iteminnersheet_qty, TempPro.itemsize, TempPro.itemsize_qty, TempPro.itembag, TempPro.itembag_qty, TempPro.itembox, TempPro.itembox_qty,
        TempPro.itemnameid, TempPro.itemcategoryid, TempPro.itemsizeid, TempPro.iteminnersheetid, TempPro.itembagid, TempPro.itemboxid
        FROM ( ' . $sqlQuery . ' ) TempPro WHERE TempPro.status = 0 ' . $itemsnamequery . ' ' . $itemscategoryquery . ' ' . $itemssizequery . ' ' . $innersheetFilter . ' ' . $itemsbagquery . ' ' . $itemsboxquery . ' ' . $sqlQuerylimit . '';

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery1);

        $itemsqueryval = ' WHERE estp.status = 0 AND DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" GROUP BY estp.fk_so_id  HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY  estp.PK_ESP_ID, estp.fk_so_id  DESC';

        $selectQryCount = 'SELECT estp.PK_ESP_ID, MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE "" END) "itemnameid",
        MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE "" END) "itemcategoryid",
        MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE "" END) "itemsizeid",
        MAX(CASE WHEN estp.itemtype = 4 THEN eitm.pk_items_id ELSE "" END) "iteminnersheetid",
        MAX(CASE WHEN estp.itemtype = 6 THEN eitm.pk_items_id ELSE "" END) "itembagid",
        MAX(CASE WHEN estp.itemtype = 7 THEN eitm.pk_items_id ELSE "" END) "itemboxid", estp.status
        FROM ' . ESTIMATE_NONCOMM_PRO . ' estp
        INNER JOIN ' . ITEMS . ' eitm ON eitm.pk_items_id = estp.fk_items_id
        INNER JOIN ' . ESTIMATE_NONCOMM . ' ests ON ests.PK_ES_ID = estp.fk_so_id  ' . $itemsqueryval . '';

        $sqlQuery2 = ' SELECT * FROM(' . $selectQryCount . ') TempPro  WHERE TempPro.status = 0 ' . $itemsnamequery . ' ' . $itemscategoryquery . '  ' . $itemssizequery . ' ' . $innersheetFilter . ' ' . $itemsbagquery . ' ' . $itemsboxquery . ' ';

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'],  $sqlQuery2);
        $allResult = mysqli_fetch_assoc($stmtTotal);
        $allRecords = mysqli_num_rows($stmtTotal);
        $displayRecords = mysqli_num_rows($stmt);

        $records = array();
        $i = 1;
        while ($record = mysqli_fetch_assoc($stmt)) {
            $rows = array();
            $rows[] = $_POST['start'] + $i;
            $rows[] = $record['sale_date'];
            $rows[] = $record['sono'];
            $rows[] = $record['itemname'];
            $rows[] = $record['itemname_qty'];
            $rows[] = $record['itemcategory'];
            $rows[] = $record['itemcategory_qty'];
            $rows[] = $record['itemsize'];
            $rows[] = $record['itemsize_qty'];
            $iteminnersheet = $record['iteminnersheet'];
            $iteminnersheet_qty = $record['iteminnersheet_qty'];
            if (!empty($selectedInnersheetNames)) {
                $innersheetValues = explode('<br>', $iteminnersheet);
                $innersheetQtyValues = explode('<br>', $iteminnersheet_qty);

                $filteredInnersheet = [];
                $filteredInnersheetQty = [];
                foreach ($innersheetValues as $index => $innersheetValue) {
                    if (in_array($innersheetValue, $selectedInnersheetNames)) {
                        $filteredInnersheet[] = $innersheetValue;
                        $filteredInnersheetQty[] = $innersheetQtyValues[$index];
                    }
                }
                if (empty($filteredInnersheet)) {
                    $filteredInnersheet = $innersheetValues;
                    $filteredInnersheetQty = $innersheetQtyValues;
                }
                $iteminnersheet = implode('<br>', $filteredInnersheet);
                $iteminnersheet_qty = implode('<br>', $filteredInnersheetQty);
            }

            $rows[] = $iteminnersheet;
            $rows[] = $iteminnersheet_qty;

            $rows[] = $record['itembag'];
            $rows[] = $record['itembag_qty'];
            $rows[] = $record['itembox'];
            $rows[] = $record['itembox_qty'];
            $rows[] = $record['countOrder'];

            $records[] = $rows;
            $i++;
        }

        $output = array(
            'draw' => intval($_POST['draw']),
            'iTotalRecords' => $displayRecords,
            'iTotalDisplayRecords' => $allRecords,
            'data' => $records,
        );

        echo json_encode($output);
    }






    public function getReceiptsadv($cusID, $type, $payTable)
    {

        $query = 'SELECT sum(advance_amount) as advance FROM ' . $payTable . ' where fk_es_id=' . $cusID . ' and type=' . $type;

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        $returnValue = '0';

        $estimatecomm = array();

        if (mysqli_num_rows($result) > 0) {


            while ($data = mysqli_fetch_array($result)) {

                $returnValue = $data['advance'];
            }
        }

        return $returnValue;
    }

    public function getReceiptsrec($cusID, $type, $payTable)
    {

        $query = 'SELECT sum(advance_amount) as advance FROM ' . $payTable . ' where fk_es_id=' . $cusID . ' and type=' . $type;

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        $returnValue = '0';

        $estimatecomm = array();

        if (mysqli_num_rows($result) > 0) {

            $counter = 1;

            while ($data = mysqli_fetch_array($result)) {

                $returnValue = $data['advance'];
            }
        }

        return $returnValue;
    }


    public function getReceiptsadvwithdate($cusID, $type, $payTable, $filterdate)
    {

        $query = 'SELECT advance_amount as advance,date FROM ' . $payTable . ' where   fk_es_id=' . $cusID . ' and type=' . $type;

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        //$returnValue = array('anotherdate'=> 0,'samedate'=> 0);
        $returnValue['samedate'] = '0';
        $returnValue['anotherdate'] = '0';


        if (mysqli_num_rows($result) > 0) {


            while ($data = mysqli_fetch_array($result)) {
                //$returnValue['advance'] = $data[ 'advance_amount' ];
                //$returnValue['date'] = $data[ 'date' ];
                if ($filterdate == $data['date']) {
                    $returnValue['samedate'] += $data['advance'];
                } else {
                    $returnValue['anotherdate'] += $data['advance'];
                }
            }
        }
        //var_dump($returnValue);
        return $returnValue;
    }

    public function getReceiptsrecwithdate($cusID, $type, $payTable, $filterdate)
    {

        $query = 'SELECT advance_amount as advance,date FROM ' . $payTable . ' where   fk_es_id=' . $cusID . ' and type=' . $type;

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        // $returnValue = array('anotherdate'=> 0,'samedate'=> 0);
        $returnValue['samedate'] = '0';
        $returnValue['anotherdate'] = '0';


        if (mysqli_num_rows($result) > 0) {


            while ($data = mysqli_fetch_array($result)) {
                //$returnValue == $data[ 'advance' ];

                if ($filterdate == $data['date']) {
                    $returnValue['samedate'] += $data['advance'];
                } else {
                    $returnValue['anotherdate'] += $data['advance'];
                }
            }
        }

        return $returnValue;
    }
    public function getAllCommitems()
    {

        $query = 'SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price FROM ' . ITEMS . '   WHERE visibility= 1 and type =1';

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        return $res;
    }

    public function getAllNonCommitems()
    {

        $query = 'SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price FROM ' . ITEMS . '  WHERE visibility= 1 and type =2 AND item_type = 1';

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        return $res;
    }
    public function getAllCommitemsproduct($itemtype)
    {

        $query = 'SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price FROM ' . ITEMS . '   WHERE visibility= 1 and type = 1  AND item_type = ' . $itemtype . '';

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        return $res;
    }
    public function getAllNonCommitemsproduct($itemtype)
    {

        $query = 'SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price FROM ' . ITEMS . '  WHERE visibility= 1 and type =2 AND item_type = ' . $itemtype . '';

        $res = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        return $res;
    }

    public function listEstimateComminprogress()
    {

        $sqlQuery = "SELECT so.sono, cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_COMM . ' AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ' . ORDER_PAYMENT . ' AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt,so.order_status,so.customer_id  FROM ' . ESTIMATE_COMM . ' AS so LEFT JOIN ' . CUSTOMER . ' AS cus ON so.customer_id = cus.pk_cus_id  ';

        if (!empty($_POST['search']['value'])) {


            $jodate = strtotime($_POST['search']['value']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (so.visibility=1 AND so.order_status!=6) AND  (so.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST['search']['value'] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST[ 'search' ][ 'value' ] . '%" ';

        } else if (!empty($_POST['searchVal'])) {

            $jodate = strtotime($_POST['searchVal']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (so.visibility=1 AND so.order_status!=6) AND  (so.sono LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST['searchVal'] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST['searchVal']) . '%") ';
        } else {

            $sqlQuery .= 'where so.visibility=1 AND so.order_status!=6 ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
        }

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  ' . ESTIMATE_COMM . ' where visibility=1 AND order_status!=6  ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $dateVal = strtotime($record['mixmonthlevel']);

            $dateVals = date('Y-m', $dateVal);

            $dateValname = date('M Y', $dateVal);

            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['jo_date'];

            $payment_type = ($record['payment_type'] == 1) ? 'Cash' : (($record['payment_type'] == 2) ? 'Credit Card' : (($record['payment_type'] == 3) ? 'UPI' : (($record['payment_type'] == 4) ? 'Bank Transfer' : (($record['payment_type'] == 5) ? 'Cheque' : ''))));

            // $rows[] = $payment_type ;

            //  $rows[] = '<p class="alignrightAmount">'.$record[ 'discount_final4' ].'</p>';

            $colorGTadvance = '';

            $pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);

            if ($pending > 0) {

                $colorGTadvance = 'redadvgtcolor';
            } else {

                $colorGTadvance = 'greenadvgtcolor';
            }

            $receipt = ($record['receipt']) ? number_format($record['receipt'], 2) : 0;

            $rows[] = $receipt;

            $rows[] = $pending;

            $rows[] = floatVal($record['grand_total']);

            $rows[] = '<a href="index.php?erp=67&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=68&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            //  $rows[] = '<a href="index.php?erp=67&id='.$record[ 'PK_ES_ID' ].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

            /*    if ( $record[ 'status' ] == 2 && $record[ 'osstatus' ] == NULL )
 {

            $rows[] = 'Invoice is created';

        } else {
            */

            $rows[] = $osstatus;

            //}

            $rows[] = '<a href="index.php?erp=34&typ=1&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a><a href="index.php?erp=80&type=1&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-warning" data-toggle="tooltip" title="Advance" >Advance</a>';

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'iTotalRecords' => $displayRecords,

            'iTotalDisplayRecords' => $allRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listEstimateCommcomplete()
    {

        $sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_COMM . ' AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ' . ORDER_PAYMENT . ' AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt,so.order_status  FROM ' . ESTIMATE_COMM . ' AS so LEFT JOIN ' . CUSTOMER . ' AS cus ON so.customer_id = cus.pk_cus_id  ';

        if (!empty($_POST['search']['value'])) {

            $jodate = strtotime($_POST['search']['value']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (so.visibility=1 AND so.order_status=6) AND  (so.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST['search']['value'] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST['search']['value']) . '%" )';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST[ 'search' ][ 'value' ] . '%" ';

        } else if (!empty($_POST['searchVal'])) {

            $jodate = strtotime($_POST['searchVal']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (so.visibility=1 AND so.order_status!=6) AND  (so.sono LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST['searchVal']) . '%") ';
        } else {

            $sqlQuery .= 'where so.visibility=1 AND so.order_status=6 ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
        }

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //var_dump( $sqlQuery );

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  ' . ESTIMATE_COMM . ' where visibility=1 AND order_status=6  ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $dateVal = strtotime($record['mixmonthlevel']);

            $dateVals = date('Y-m', $dateVal);

            $dateValname = date('M Y', $dateVal);

            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['jo_date'];

            //    $payment_type = ( $record[ 'payment_type' ] == 1 )? 'Cash' : 'Credit';

            $payment_type = ($record['payment_type'] == 1) ? 'Cash' : (($record['payment_type'] == 2) ? 'Credit Card' : (($record['payment_type'] == 3) ? 'UPI' : (($record['payment_type'] == 4) ? 'Bank Transfer' : (($record['payment_type'] == 5) ? 'Cheque' : ''))));

            $bar = ($foo == 1) ? '1' : (($foo == 2) ? '2' : 'other');

            // $rows[] = $payment_type ;

            //  $rows[] = '<p class="alignrightAmount">'.$record[ 'discount_final4' ].'</p>';

            $colorGTadvance = '';

            $pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);

            if ($pending > 0) {

                $colorGTadvance = 'redadvgtcolor';
            } else {

                $colorGTadvance = 'greenadvgtcolor';
            }

            $receipt = ($record['receipt']) ? number_format($record['receipt'], 2) : 0;

            $rows[] = $receipt;

            $rows[] = $pending;

            $rows[] = floatval($record['grand_total']);

            $rows[] = '<a href="index.php?erp=67&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

            //  $rows[] = '<a href="index.php?erp=67&id='.$record[ 'PK_ES_ID' ].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

            /*    if ( $record[ 'status' ] == 2 && $record[ 'osstatus' ] == NULL )
 {

            $rows[] = 'Invoice is created';

        } else {
            */

            $rows[] = $osstatus;

            //}

            $rows[] = '<a href="index.php?erp=34&typ=1&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'iTotalRecords' => $displayRecords,

            'iTotalDisplayRecords' => $allRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listEstimateNoninprogress()
    {

        $sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_NONCOMM . ' AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ' . ORDER_PAYMENT . ' AS op WHERE op.fk_order_no =so.PK_ES_ID )) as receipt,so.order_status,so.customer_id  FROM ' . ESTIMATE_NONCOMM . ' AS so LEFT JOIN ' . CUSTOMER . ' AS cus ON so.customer_id = cus.pk_cus_id  ';

        if (!empty($_POST['search']['value'])) {

            $jodate = strtotime($_POST['search']['value']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (so.visibility=1 AND so.order_status !=6 ) AND  (so.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST['search']['value'] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST[ 'search' ][ 'value' ] . '%" ';

        } else if (!empty($_POST['searchVal'])) {

            $jodate = strtotime($_POST['searchVal']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (so.visibility=1 AND so.order_status!=6) AND  (so.sono LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST['searchVal'] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST['searchVal']) . '%") ';
        } else {

            $sqlQuery .= 'where so.visibility=1 AND so.order_status !=6 ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
        }

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //var_dump( $sqlQuery );

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  ' . ESTIMATE_NONCOMM . ' where visibility=1 AND order_status !=6  ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $dateVal = strtotime($record['mixmonthlevel']);

            $dateVals = date('Y-m', $dateVal);

            $dateValname = date('M Y', $dateVal);

            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['jo_date'];

            $payment_type = ($record['payment_type'] == 1) ? 'Cash' : (($record['payment_type'] == 2) ? 'Credit Card' : (($record['payment_type'] == 3) ? 'UPI' : (($record['payment_type'] == 4) ? 'Bank Transfer' : (($record['payment_type'] == 5) ? 'Cheque' : ''))));

            // $rows[] = $payment_type ;

            //  $rows[] = '<p class="alignrightAmount">'.$record[ 'discount_final4' ].'</p>';

            $colorGTadvance = '';

            $pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);

            if ($pending > 0) {

                $colorGTadvance = 'redadvgtcolor';
            } else {

                $colorGTadvance = 'greenadvgtcolor';
            }

            $receipt = ($record['receipt']) ? number_format($record['receipt'], 2) : 0;

            $rows[] = $receipt;

            $rows[] = $pending;

            $rows[] = floatval($record['grand_total']);

            $rows[] = '<a href="index.php?erp=69&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=70&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            // $rows[] = '<a href="index.php?erp=69&id='.$record[ 'PK_ES_ID' ].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

            /*if ( $record[ 'status' ] == 2 && $record[ 'osstatus' ] == NULL )
 {

            $rows[] = 'Invoice is created';

        } else {
            */

            $rows[] = $osstatus;

            //}

            $rows[] = '<a href="index.php?erp=34&typ=2&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a><a href="index.php?erp=80&type=2&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-warning" data-toggle="tooltip" title="Advance" >Advance</a>';

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'iTotalRecords' => $displayRecords,

            'iTotalDisplayRecords' => $allRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listEstimateNoncomplete()
    {

        $sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_NONCOMM . ' AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ' . ORDER_PAYMENT . ' AS op WHERE op.fk_order_no =so.PK_ES_ID )) as receipt,so.order_status  FROM ' . ESTIMATE_NONCOMM . ' AS so LEFT JOIN ' . CUSTOMER . ' AS cus ON so.customer_id = cus.pk_cus_id  ';

        if (!empty($_POST['search']['value'])) {

            $jodate = strtotime($_POST['search']['value']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (so.visibility=1 AND so.order_status=6 ) AND  (so.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST['search']['value'] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST['search']['value']) . '%" )';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST[ 'search' ][ 'value' ] . '%" ';

        } else if (!empty($_POST['searchVal'])) {

            $jodate = strtotime($_POST['searchVal']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (so.visibility=1 AND so.order_status =6) AND  (so.sono LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST['searchVal'] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST['searchVal']) . '%") ';
        } else {

            $sqlQuery .= 'where so.visibility=1  AND so.order_status =6 ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
        }

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //var_dump( $sqlQuery );

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  ' . ESTIMATE_NONCOMM . ' where visibility=1 AND order_status =6  ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $dateVal = strtotime($record['mixmonthlevel']);

            $dateVals = date('Y-m', $dateVal);

            $dateValname = date('M Y', $dateVal);

            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['jo_date'];

            $payment_type = ($record['payment_type'] == 1) ? 'Cash' : (($record['payment_type'] == 2) ? 'Credit Card' : (($record['payment_type'] == 3) ? 'UPI' : (($record['payment_type'] == 4) ? 'Bank Transfer' : (($record['payment_type'] == 5) ? 'Cheque' : ''))));

            // $rows[] = $payment_type ;

            //  $rows[] = '<p class="alignrightAmount">'.$record[ 'discount_final4' ].'</p>';

            $colorGTadvance = '';

            $pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);

            if ($pending > 0) {

                $colorGTadvance = 'redadvgtcolor';
            } else {

                $colorGTadvance = 'greenadvgtcolor';
            }

            $receipt = ($record['receipt']) ? number_format($record['receipt'], 2) : 0;

            $rows[] = $receipt;

            $rows[] = $pending;

            //  $rows[] = '<p class="alignrightAmount">'.$record[ 'grand_total' ].'</p>';

            $rows[] = floatval($record['grand_total']);

            $rows[] = '<a href="index.php?erp=69&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

            // $rows[] = '<a href="index.php?erp=69&id='.$record[ 'PK_ES_ID' ].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

            /*if ( $record[ 'status' ] == 2 && $record[ 'osstatus' ] == NULL )
 {

            $rows[] = 'Invoice is created';

        } else {
            */

            $rows[] = $osstatus;

            //}

            $rows[] = '<a href="index.php?erp=34&typ=2&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'iTotalRecords' => $displayRecords,

            'iTotalDisplayRecords' => $allRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listInvoiceCommcomplete()
    {

        $sqlQuery = "SELECT se.eno,cus.cus_code, cus.cus_name, se.gst_percent ,se.gst_total, se.grand_total,se.status,se.item_total,se.PK_SE_ID,DATE_FORMAT(se.date, '%d-%m-%Y') as se_date,se.city,so.sono,se.payment_type  FROM " . INVOICE_COMM . ' AS se LEFT JOIN ' . ESTIMATE_COMM . ' AS so ON so.PK_ES_ID  = se.fk_so_id  LEFT JOIN ' . CUSTOMER . ' AS cus ON se.fk_customer_id = cus.pk_cus_id ';

        if (!empty($_POST['search']['value'])) {

            $jodate = strtotime($_POST['search']['value']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (se.visibility=1 AND se.status= 1) AND  (se.eno LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR so.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST['search']['value'] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR se.date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR se.item_total LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR se.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST[ 'search' ][ 'value' ] . '%" ';

        } else if (!empty($_POST['searchVal'])) {

            $jodate = strtotime($_POST['searchVal']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (se.visibility=1 AND se.status= 1) AND  (se.eno LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR so.sono LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST['searchVal'] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR se.date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR se.item_total LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR se.grand_total LIKE "%' . trim($_POST['searchVal']) . '%") ';
        } else {

            $sqlQuery .= 'where se.visibility=1  ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'ORDER BY se.PK_SE_ID DESC ';
        }

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  ' . INVOICE_COMM . ' ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $rows = array();

            $rows[] = $i;

            $rows[] = ucfirst($record['eno']);

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['se_date'];

            $payment_type = ($record['payment_type'] == 1) ? 'Cash' : (($record['payment_type'] == 2) ? 'Credit Card' : (($record['payment_type'] == 3) ? 'UPI' : (($record['payment_type'] == 4) ? 'Bank Transfer' : (($record['payment_type'] == 5) ? 'Cheque' : ''))));

            $rows[] = $payment_type;

            $rows[] = $record['grand_total'];

            //  $rows[] = $record[ 'status' ];

            $rows[] = '<a href="index.php?erp=74&id=' . $record['PK_SE_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=73&id=' . $record['PK_SE_ID'] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            // $rows[] = '<a href="index.php?erp=74&id=' . $record[ 'PK_SE_ID' ] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

            //$rows[] = '<a href="index.php?erp=15&id='.$record[ 'PK_ES_ID' ].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>    <a href="index.php?erp=14&id='.$record[ 'PK_ES_ID' ].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'iTotalRecords' => $displayRecords,

            'iTotalDisplayRecords' => $allRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listInvoiceNoncomplete()
    {

        $sqlQuery = "SELECT se.eno,cus.cus_code ,cus.cus_name, se.gst_percent ,se.gst_total, se.grand_total,se.status,se.item_total,se.PK_SE_ID,DATE_FORMAT(se.date, '%d-%m-%Y') as se_date,se.city,so.sono,se.payment_type  FROM " . INVOICE_NONCOMM . ' AS se LEFT JOIN ' . ESTIMATE_NONCOMM . ' AS so ON so.PK_ES_ID  = se.fk_so_id LEFT JOIN ' . CUSTOMER . ' AS cus ON se.fk_customer_id = cus.pk_cus_id ';

        if (!empty($_POST['search']['value'])) {

            $jodate = strtotime($_POST['search']['value']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (se.visibility=1 AND se.status= 1) AND  (se.eno LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR so.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST['search']['value'] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR se.date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR se.item_total LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR se.grand_total LIKE "%' . trim($_POST['search']['value']) . '%" )';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST[ 'search' ][ 'value' ] . '%" ';

        } else if (!empty($_POST['searchVal'])) {

            $jodate = strtotime($_POST['searchVal']);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (se.visibility=1 AND se.status= 1) AND  (se.eno LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR so.sono LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST['searchVal'] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR se.date LIKE "%' . trim($jodateVals) . '%" ';

            $sqlQuery .= ' OR se.item_total LIKE "%' . trim($_POST['searchVal']) . '%" ';

            $sqlQuery .= ' OR se.grand_total LIKE "%' . trim($_POST['searchVal']) . '%") ';
        } else {

            $sqlQuery .= 'where se.visibility=1  ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'ORDER BY se.PK_SE_ID DESC ';
        }

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  ' . INVOICE_NONCOMM . ' ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $rows = array();

            $rows[] = $i;

            $rows[] = ucfirst($record['eno']);

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['se_date'];

            $payment_type = ($record['payment_type'] == 1) ? 'Cash' : (($record['payment_type'] == 2) ? 'Credit Card' : (($record['payment_type'] == 3) ? 'UPI' : (($record['payment_type'] == 4) ? 'Bank Transfer' : (($record['payment_type'] == 5) ? 'Cheque' : ''))));

            $rows[] = $payment_type;

            $rows[] = $record['grand_total'];

            //  $rows[] = $record[ 'status' ];

            $rows[] = '<a href="index.php?erp=78&id=' . $record['PK_SE_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=77&id=' . $record['PK_SE_ID'] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            //  $rows[] = '<a href="index.php?erp=78&id=' . $record[ 'PK_SE_ID' ] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

            //$rows[] = '<a href="index.php?erp=15&id='.$record[ 'PK_ES_ID' ].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>    <a href="index.php?erp=14&id='.$record[ 'PK_ES_ID' ].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'iTotalRecords' => $displayRecords,

            'iTotalDisplayRecords' => $allRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listCommFranchiseReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,est.payment_type,f.cat_name,est.bill_paid,est.remark  FROM erp_estimate_comm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN ' . CITIES . ' c ON c.pk_city_id = cm.cus_city LEFT JOIN ' . STATES . ' s ON s.state_code= cm.cus_state LEFT JOIN ' . CATEGORY . ' f ON f.pk_cat_id= est.franchise  ';

        $cusid = ($_POST['txt_franchise_name']) ? 'AND  est.franchise = ' . $_POST['txt_franchise_name'] . '' : '';


        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST['search']['value'])) {

            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.visibility=1  ' . $cusid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.payment_type LIKE "%' . trim($paymentval) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%" )';
        } else {

            $sqlQuery .= 'where est.visibility=1 ' . $cusid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_comm where visibility=1  ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $paymenttype = '';
            if ($record['payment_type'] == 1) {
                $paymenttype = 'Cash';
            } else if ($record['payment_type'] == 2) {
                $paymenttype = 'Credit';
            }



            $query = "SELECT ( SELECT est.grand_total  FROM erp_estimate_comm est WHERE est.PK_ES_ID= " . $record['PK_ES_ID'] . ") as grand_total 
            FROM erp_advance_bill_comm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ", bp.fk_es_id) > 0";
            $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

            $bulkPay = '0';
            if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_array($result)) {
                    $bulkPay = $data['grand_total'];
                }
            }

            $query1 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=0";
            $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
            $advance = '0';
            if (mysqli_num_rows($result1)  > 0) {
                while ($data1 = mysqli_fetch_array($result1)) {
                    $advance = $data1['advance'];
                }
            }
            $query2 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=1";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $receipts = '0';
            if (mysqli_num_rows($result2)  > 0) {
                while ($data2 = mysqli_fetch_array($result2)) {
                    $receipts = $data2['advance'];
                }
            }



            $outTotal = $record['grand_total'] - ($receipts + $advance);
            $bulkamt = $outTotal;
            //$bulkamt =0;
            //var_dump($outTotal);
            // var_dump($bulkpay);


            if ($outTotal > 0 && $bulkPay > 0) {
                $bulkamt = floatval(0);
            }
            $editBtn = "";
            if ($bulkamt <= 0 || $record['bill_paid'] == 1) {
                $paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
            } else {
                $paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
            }
            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name ,sqp.orientation FROM " . ESTIMATE_COMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cuscode'];

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            //  $rows[] = $paymenttype;

            //  $rows[] = $record[ 'remark' ];

            $rows[] = $itemorient;

            $rows[] = $itemnamesdata;

            $rows[] = $advance;

            $rows[] = $receipts;

            $rows[] = $record['grand_total'];

            $rows[] = $osstatus;

            $rows[] = $paid_status;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

            /*

            'draw' => intval( $_POST[ 'draw' ] ),

            'iTotalRecords' => $displayRecords,

            'iTotalDisplayRecords' => $allRecords,

            'data' => $records, */

        );

        echo json_encode($output);
    }

    public function listNonCommFranchiseReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status,cm.pk_cus_id ,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise , itms.fk_item_id,est.payment_type,f.cat_name,est.bill_paid,est.remark FROM erp_estimate_noncomm as est INNER JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id INNER JOIN ' . CATEGORY . ' f ON f.pk_cat_id= est.franchise  INNER JOIN ' . ESTIMATE_NONCOMM_PRO . ' esp ON esp.fk_so_id= est.PK_ES_ID  LEFT JOIN ' . ITEMS . ' itms ON itms.pk_items_id= esp.fk_items_id ';

        //$fromDateval = date( 'Y-m-d', strtotime( $_POST[ 'fromDate' ] ) );

        //    $toDateval = date( 'Y-m-d', strtotime( $_POST[ 'toDate' ] ) );

        $cusid = ($_POST['txt_franchise_name']) ? 'AND  est.franchise = ' . $_POST['txt_franchise_name'] . '' : '';
        $itemssize = ($_POST['txt_size_name']) ? 'AND  itms.pk_items_id  LIKE "%' . $_POST['txt_size_name'] . '%"' : '';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));


        if (!empty($_POST['search']['value'])) {

            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }
            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.visibility=1  ' . $cusid . ' ' . $itemssize . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            /*

            if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {

                $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );

                $sqlQuery .= ' where (est.visibility=1  '.$cusid.')';
                */

            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.payment_type LIKE "%' . trim($paymentval) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

            $sqlQuery .= 'where est.visibility=1 ' . $cusid . ' ' . $itemssize . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'GROUP BY est.PK_ES_ID ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'GROUP BY est.PK_ES_ID ORDER BY est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //  var_dump( $sqlQuery );

        // exit;

        //echo  $sqlQuery;

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_noncomm where visibility=1 ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $paymenttype = '';
            if ($record['payment_type'] == 1) {
                $paymenttype = 'Cash';
            } else if ($record['payment_type'] == 2) {
                $paymenttype = 'Credit';
            }



            $query = "SELECT ( SELECT est.grand_total  FROM erp_estimate_comm est WHERE est.PK_ES_ID= " . $record['PK_ES_ID'] . ") as grand_total 
            FROM erp_advance_bill_comm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ", bp.fk_es_id) > 0";
            $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

            $bulkPay = '0';
            if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_array($result)) {
                    $bulkPay = $data['grand_total'];
                }
            }

            $query1 = "SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=0";
            $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
            $advance = '0';
            if (mysqli_num_rows($result1)  > 0) {
                while ($data1 = mysqli_fetch_array($result1)) {
                    $advance = $data1['advance'];
                }
            }
            $query2 = "SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=1";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $receipts = '0';
            if (mysqli_num_rows($result2)  > 0) {
                while ($data2 = mysqli_fetch_array($result2)) {
                    $receipts = $data2['advance'];
                }
            }



            $outTotal = $record['grand_total'] - ($receipts + $advance);
            $bulkamt = $outTotal;
            //$bulkamt =0;
            //var_dump($outTotal);
            // var_dump($bulkpay);


            if ($outTotal > 0 && $bulkPay > 0) {
                $bulkamt = floatval(0);
            }
            $editBtn = "";
            if ($bulkamt <= 0 || $record['bill_paid'] == 1) {
                $paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
            } else {
                $paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
            }
            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_noncomm');

            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cuscode'];

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            //  $rows[] = $paymenttype;

            //   $rows[] = $record[ 'remark' ];


            $rows[] = $itemorient;

            $rows[] = $itemnamesdata;

            $rows[] = $advance;

            $rows[] = $receipts;

            $rows[] = $record['grand_total'];

            $rows[] = $osstatus;

            $rows[] = $paid_status;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listCommDeliveredReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.delivery_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,os.date as deldate,f.cat_name   FROM erp_estimate_comm as est LEFT JOIN ' . ORDER_STATUS . ' as os ON os.fk_so_id=est.PK_ES_ID LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN ' . CITIES . ' c ON c.pk_city_id = cm.cus_city LEFT JOIN ' . STATES . ' s ON s.state_code= cm.cus_state LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise ';

        //       $fromDate = str_replace('/', '-', $_POST[ 'fromDate' ]);
        //  $fromDateval = date( 'Y-m-d', strtotime(  $fromDate ) );
        //   $toDate = str_replace('/', '-', $_POST[ 'toDate' ]);
        //  $toDateval = date( 'Y-m-d', strtotime(  $toDate ) );
        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));


        $cusid = ($_POST['txt_status'] && $_POST['txt_status'] == 5) ? 'AND  est.order_status <=' . $_POST['txt_status'] . '' : (($_POST['txt_status'] && $_POST['txt_status'] == 6) ? 'AND  est.order_status = ' . $_POST['txt_status'] . '' : '');

        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.visibility=1 ' . $cusid . ' AND  DATE_FORMAT(est.delivery_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR os.date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%" )';
        } else {

            $sqlQuery .= 'where est.visibility=1 ' . $cusid . ' AND  DATE_FORMAT(est.delivery_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.delivery_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $cusidval = ($_POST['txt_status'] && $_POST['txt_status'] == 5) ? 'AND  order_status <= ' . $_POST['txt_status'] . '' : (($_POST['txt_status'] && $_POST['txt_status'] == 6) ? 'AND  order_status = ' . $_POST['txt_status'] . '' : '');

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_comm where visibility=1 ' . $cusidval . '');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $deliveryDate = isset($record['deldate']) ? date('d-m-Y', strtotime($record['deldate'])) : '';

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name ,sqp.orientation FROM " . ESTIMATE_COMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = $osstatus == '<span class="custom_btn_class text-success" >Delivered</span>' ? $deliveryDate : '';

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cuscode'];

            $rows[] = $record['cusname'];

            $rows[] = $itemorient;

            $rows[] = $record['cat_name'];

            $rows[] = $itemnamesdata;

            $rows[] = $advance;

            $rows[] = $receipts;

            $rows[] = $record['grand_total'];

            $rows[] = $osstatus;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

            /*

                'draw' => intval( $_POST[ 'draw' ] ),

                'iTotalRecords' => $displayRecords,

                'iTotalDisplayRecords' => $allRecords,

                'data' => $records, */

        );

        echo json_encode($output);
    }

    public function listNonCommDeliveredReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.delivery_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status,cm.pk_cus_id ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,os.date as deldate,f.cat_name  FROM erp_estimate_noncomm as est LEFT JOIN ' . ORDER_STATUS . ' as os ON os.fk_so_id=est.PK_ES_ID LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN ' . CITIES . ' c ON c.pk_city_id = cm.cus_city LEFT JOIN ' . STATES . ' s ON s.state_code= cm.cus_state   LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise ';

        //$fromDateval = date( 'Y-m-d', strtotime( $_POST[ 'fromDate' ] ) );

        //    $toDateval = date( 'Y-m-d', strtotime( $_POST[ 'toDate' ] ) );

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        $cusid = ($_POST['txt_status'] && $_POST['txt_status'] == 5) ? 'AND  est.order_status  <= ' . $_POST['txt_status'] . '' : (($_POST['txt_status'] && $_POST['txt_status'] == 6) ? 'AND  est.order_status = ' . $_POST['txt_status'] . '' : '');

        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.visibility=1 ' . $cusid . '  AND  DATE_FORMAT(est.delivery_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            /*

                if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {

                    $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );

                    $sqlQuery .= ' where (est.visibility=1  '.$cusid.')';
                    */

            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR os.date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

            //$sqlQuery .= 'where est.visibility=1  ' . $cusid . ' AND DATE_FORMAT(est.delivery_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
            $sqlQuery .= ' WHERE est.visibility=1 ' . $cusid . ' AND DATE_FORMAT(est.delivery_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.delivery_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //echo  $sqlQuery;

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $cusidval = ($_POST['txt_status'] && $_POST['txt_status'] == 5) ? 'AND  status  <= ' . $_POST['txt_status'] . '' : (($_POST['txt_status'] && $_POST['txt_status'] == 6) ? 'AND  order_status = ' . $_POST['txt_status'] . '' : '');

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_noncomm where visibility=1 ' . $cusidval . ' ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_noncomm');

            $rows = array();

            /* if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {

                    $b_type = strtolower( $_POST[ 'search' ][ 'value' ] );

                    if ( $b_type == 'length' || $b_type == 'l' || $b_type == 'le' || $b_type == 'len' || $b_type == 'leng' || $b_type == 'lengt' ) {

                        $search1 = ' AND sqp.orientation=1';

                    } else if ( $b_type == 'Breadth' || $b_type == 'b' || $b_type == 'br' || $b_type == 'bre' || $b_type == 'brea' || $b_type == 'bread' || $b_type == 'breadt' ) {

                        $search1 = ' AND sqp.orientation =2';

                    }

                    $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM ".ESTIMATE_NONCOMM_PRO.' sqp LEFT JOIN '.ITEMS.' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN '.TYPES.' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = '.$record[ 'PK_ES_ID' ].' '.$search1.'';

                } else {
                    */

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            //}

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = isset($record['deldate']) ? date('d-m-Y', strtotime($record['deldate'])) : '';

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cuscode'];

            $rows[] = $record['cusname'];

            $rows[] = $itemorient;

            $rows[] = $record['cat_name'];

            $rows[] = $itemnamesdata;

            $rows[] = $advance;

            $rows[] = $receipts;

            $rows[] = $record['grand_total'];

            $rows[] = $osstatus;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listCommBulkPaymentReport()
    {

        $sqlQuery = 'SELECT bp.pk_adv_com_id,bp.fk_es_id,bp.advance_amount,bp.payment_type,bp.date,bp.discount,( SELECT GROUP_CONCAT(est.sono ORDER BY est.PK_ES_ID) so_no FROM erp_estimate_comm est WHERE FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0  ) as so_no,( SELECT GROUP_CONCAT(DISTINCT(cus.cus_name) ORDER BY cus.cus_name) cus_name FROM erp_estimate_comm est LEFT JOIN ' . CUSTOMER . ' AS cus ON est.customer_id = cus.pk_cus_id  WHERE FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0  ) as cus_name ,( SELECT GROUP_CONCAT(DISTINCT(f.cat_name) ORDER BY f.cat_name) cat_name FROM erp_estimate_comm est LEFT JOIN ' . CATEGORY . ' f ON f.pk_cat_id= est.franchise WHERE FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0  ) as cat_name   FROM ' . BULK_PAYMENT_COMM . ' bp    ';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST['search']['value'])) {
            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));
            $sqlQuery .= ' where  (  bp.pk_adv_com_id IS NOT NULL AND DATE_FORMAT(bp.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';
            $sqlQuery .= ' AND ( ( SELECT GROUP_CONCAT(est.sono ORDER BY est.PK_ES_ID) so_no FROM erp_estimate_comm est WHERE FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0  ) LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR bp.date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR bp.payment_type LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR bp.discount LIKE "%' . trim($_POST['search']['value']) . '%" )';
            $sqlQuery .= ' OR bp.advance_amount LIKE "%' . trim($_POST['search']['value']) . '%" ';
        } else {
            $sqlQuery .= 'where  bp.pk_adv_com_id IS NOT NULL AND DATE_FORMAT(bp.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }
        if (!empty($_POST['order'])) {
            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= ' ORDER BY bp.date ASC ';
        }
        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);
        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  ' . BULK_PAYMENT_COMM . ' ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $paymenttype = '';

            if ($record['payment_type'] == 1) {

                $paymenttype = 'Cash';
            } else if ($record['payment_type'] == 2) {

                $paymenttype = 'Credit Card';
            } else if ($record['payment_type'] == 3) {

                $paymenttype = 'UPI';
            } else if ($record['payment_type'] == 4) {

                $paymenttype = 'Bank Transfer';
            } else if ($record['payment_type'] == 5) {

                $paymenttype = 'Cheque';
            }

            $rows = array();
            $rows[] = $_POST['start'] + $i;
            $rows[] = date('d-m-Y', strtotime($record['date']));
            $rows[] = $record['cus_name'];
            $rows[] = $record['cat_name'];
            $rows[] = ucfirst($record['so_no']);
            $rows[] = $paymenttype;
            $rows[] = number_format($record['discount'], 2);

            $rows[] = number_format($record['advance_amount'], 2);
            $rows[] = '<a href="index.php?erp=130&id=' . $record['pk_adv_com_id'] . '&typ=1" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

            /*

                    'draw' => intval( $_POST[ 'draw' ] ),

                    'iTotalRecords' => $displayRecords,

                    'iTotalDisplayRecords' => $allRecords,

                    'data' => $records, */

        );

        echo json_encode($output);
    }

    public function listNonCommBulkPaymentReport()
    {

        $sqlQuery = 'SELECT bp.pk_adv_noncom_id,bp.fk_es_id,bp.advance_amount,bp.payment_type,bp.date,bp.discount,( SELECT GROUP_CONCAT(est.sono ORDER BY est.PK_ES_ID) so_no FROM erp_estimate_noncomm est WHERE FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0  ) as so_no,( SELECT GROUP_CONCAT(DISTINCT(cus.cus_name) ORDER BY cus.cus_name) cus_name FROM erp_estimate_noncomm est LEFT JOIN ' . CUSTOMER . ' AS cus ON est.customer_id = cus.pk_cus_id  WHERE FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0  ) as cus_name ,( SELECT GROUP_CONCAT(DISTINCT(f.cat_name) ORDER BY f.cat_name) cat_name FROM erp_estimate_noncomm est LEFT JOIN ' . CATEGORY . ' f ON f.pk_cat_id= est.franchise WHERE FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0  ) as cat_name   FROM ' . BULK_PAYMENT_NONCOMM . ' bp  ';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where ( DATE_FORMAT(bp.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            $sqlQuery .= ' AND ( SELECT GROUP_CONCAT(est.sono ORDER BY est.PK_ES_ID) so_no FROM erp_estimate_noncomm est WHERE FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0 ) LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR bp.date LIKE "%' . $searchdate . '%" ';

            //   $sqlQuery .= ' OR FIND_IN_SET(f.pk_cat_id,  est.franchise) > 0 ) LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

            // $sqlQuery .= ' OR  FIND_IN_SET(cus.pk_cus_id,est.customer_id) > 0 ) LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

            $sqlQuery .= ' OR bp.payment_type LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR bp.discount LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR bp.advance_amount LIKE "%' . trim($_POST['search']['value']) . '%" ';
        } else {

            $sqlQuery .= 'where  DATE_FORMAT(bp.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY bp.date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  ' . BULK_PAYMENT_NONCOMM . ' ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_array($stmt)) {

            //var_dump( $record );

            $paymenttype = '';

            if ($record['payment_type'] == 1) {

                $paymenttype = 'Cash';
            } else if ($record['payment_type'] == 2) {

                $paymenttype = 'Credit Card';
            } else if ($record['payment_type'] == 3) {

                $paymenttype = 'UPI';
            } else if ($record['payment_type'] == 4) {

                $paymenttype = 'Bank Transfer';
            } else if ($record['payment_type'] == 5) {

                $paymenttype = 'Cheque';
            }

            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['date']));

            $rows[] = $record['cus_name'];

            $rows[] = $record['cat_name'];

            $rows[] = $record['so_no'];

            $rows[] = $paymenttype;

            $rows[] = number_format($record['discount'], 2);

            $rows[] = number_format($record['advance_amount'], 2);
            $rows[] = '<a href="index.php?erp=130&id=' . $record['pk_adv_noncom_id'] . '&typ=2" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        //echo $sqlQuery;

        echo json_encode($output);
    }

    public function listEstimateCash($tableestimate, $tableinvoice)
    {
        $sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . $tableinvoice . ' AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ' . ORDER_PAYMENT . ' AS op WHERE op.fk_order_no =so.PK_ES_ID )) as receipt,so.order_status,so.types_of_payment,f.cat_name  FROM ' . $tableestimate . ' AS so LEFT JOIN ' . CUSTOMER . ' AS cus ON so.customer_id = cus.pk_cus_id  LEFT JOIN erp_category f ON f.pk_cat_id= so.franchise ';

        $cusid = ($_POST['txt_customer_name']) ? 'AND  so.customer_id = ' . $_POST['txt_customer_name'] . '' : '';
        $franchid = ($_POST['txt_franchise_name']) ? 'AND  so.franchise = ' . $_POST['txt_franchise_name'] . '' : '';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST['search']['value'])) {
            $jodate = strtotime($_POST['search']['value']);
            $jodateVals = date('Y-m-d', $jodate);
            $sqlQuery .= 'where (so.visibility=1 AND  so.types_of_payment = 2 ' . $cusid . ' ' . $franchid . ' AND  DATE_FORMAT(so.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '") ';

            $sqlQuery .= ' AND  (so.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
            $sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST['search']['value']) . '%" )';
            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST[ 'search' ][ 'value' ] . '%" ';
        } else {
            $sqlQuery .= 'where (so.visibility=1  AND  so.types_of_payment = 2 ' . $cusid . ' ' . $franchid . ' AND  DATE_FORMAT(so.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';
        }

        if (!empty($_POST['order'])) {
            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
        }
        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);
        if ($_POST['length'] != -1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        // echo  $sqlQuery;
        // exit;

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  ' . $tableestimate  . ' where visibility=1 AND  types_of_payment = 2 ');
        $allResult = mysqli_fetch_assoc($stmtTotal);
        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);
        $records = array();
        $i = 1;
        while ($record = mysqli_fetch_assoc($stmt)) {
            if (isset($record['mixmonthlevel'])) {
                $dateVal = strtotime($record['mixmonthlevel']);
                $dateVals = date('Y-m', $dateVal);
                $dateValname = date('M Y', $dateVal);
            }
            $osstatus = '';

            // $advance = getReceiptsamount( $record[ 'PK_ES_ID' ], 0, 'erp_advance_noncomm' );
            // $receipts = getReceiptsamount( $record[ 'PK_ES_ID' ], 1, 'erp_advance_noncomm' );
            //$bulkPay = getbulkPayment( $record[ 'PK_ES_ID' ], 'erp_estimate_noncomm', 'erp_advance_bill_noncomm' );

            $query = 'SELECT ( SELECT est.grand_total  FROM erp_estimate_noncomm est WHERE est.PK_ES_ID= ' . $record['PK_ES_ID'] . ") as grand_total
                    FROM erp_advance_bill_noncomm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ', bp.fk_es_id) > 0';

            //  $query = 'SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=' . $cusID ;
            $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

            $bulkPay = '0';
            if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_array($result)) {

                    $bulkPay = $data['grand_total'];
                }
            }

            $query1 = 'SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=' . $record['PK_ES_ID'] . ' AND type=0';
            $result1 = mysqli_query($GLOBALS['___mysqli_ston'], $query1);

            $advance = '0';
            if (mysqli_num_rows($result1) > 0) {
                while ($data1 = mysqli_fetch_array($result1)) {
                    $advance = $data1['advance'];
                }
            }

            $query2 = 'SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=' . $record['PK_ES_ID'] . ' AND type=1';
            $result2 = mysqli_query($GLOBALS['___mysqli_ston'], $query2);

            $receipts = '0';
            if (mysqli_num_rows($result2) > 0) {
                while ($data2 = mysqli_fetch_array($result2)) {
                    $receipts = $data2['advance'];
                }
            }

            $outTotal = $record['grand_total'] - ($receipts + $advance);
            $bulkamt = $outTotal;
            //$bulkamt = 0;
            //var_dump( $outTotal );
            // var_dump( $bulkpay );

            if ($outTotal > 0 && $bulkPay > 0) {
                $bulkamt = floatval(0);
            }
            if ($bulkamt <= 0) {
                $paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
            } else {
                $paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
            }

            if ($record['order_status'] == 1) {
                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {
                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {
                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {
                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {
                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {
                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {
                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }
            $rows = array();
            $rows[] = $_POST['start'] + $i;
            $rows[] = ucfirst($record['sono']);
            $rows[] = $record['cus_name'];
            $rows[] = $record['cus_code'];
            $rows[] = $record['cat_name'];
            $rows[] = 'Cash';
            $rows[] = $record['jo_date'];
            $payment_type = ($record['payment_type'] == 1) ? 'Cash' : (($record['payment_type'] == 2) ? 'Credit Card' : (($record['payment_type'] == 3) ? 'UPI' : (($record['payment_type'] == 4) ? 'Bank Transfer' : (($record['payment_type'] == 5) ? 'Cheque' : ''))));
            // $rows[] = $payment_type ;
            //  $rows[] = '<p class="alignrightAmount">'.$record[ 'discount_final4' ].'</p>';
            $colorGTadvance = '';
            $pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
            if ($pending > 0) {
                $colorGTadvance = 'redadvgtcolor';
            } else {
                $colorGTadvance = 'greenadvgtcolor';
            }
            //    $receipt =    ( $record[ 'receipt' ] )? number_format( $record[ 'receipt' ], 2 ) : 0;
            // $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
            // $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
            //  $rows[] = '<p class="alignrightAmount">'.$record[ 'grand_total' ].'</p>';
            $rows[] = number_format($record['grand_total'], 2);
            $rows[] = '<a href="index.php?erp=69&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
            // $rows[] = '<a href="index.php?erp=69&id='.$record[ 'PK_ES_ID' ].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
            /*if ( $record[ 'status' ] == 2 && $record[ 'osstatus' ] == NULL )
                {
                    $rows[] = 'Invoice is created';
                } else {
                    */
            $rows[] = $osstatus;
            $rows[] = $paid_status;
            //}
            $rows[] = '<a href="index.php?erp=34&typ=2&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
            $records[] = $rows;
            $i++;
        }
        $output = array(
            'draw' => intval($_POST['draw']),
            'recordsTotal' => $allRecords,
            'recordsFiltered' => $displayRecords,
            'data' => $records,
        );
        echo json_encode($output);
    }

    public function listEstimateCredit($tableestimate, $tableinvoice)
    {
        $sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . $tableinvoice . ' AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ' . ORDER_PAYMENT . ' AS op WHERE op.fk_order_no =so.PK_ES_ID )) as receipt,so.order_status,so.types_of_payment,f.cat_name  FROM ' . $tableestimate . ' AS so LEFT JOIN ' . CUSTOMER . ' AS cus ON so.customer_id = cus.pk_cus_id LEFT JOIN erp_category f ON f.pk_cat_id= so.franchise  ';

        $cusid = ($_POST['txt_customer_name']) ? 'AND  so.customer_id = ' . $_POST['txt_customer_name'] . '' : '';
        $franchid = ($_POST['txt_franchise_name']) ? 'AND  so.franchise = ' . $_POST['txt_franchise_name'] . '' : '';
        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST['search']['value'])) {
            $jodate = strtotime($_POST['search']['value']);
            $jodateVals = date('Y-m-d', $jodate);
            $sqlQuery .= 'where (so.visibility=1 AND  so.types_of_payment = 1 ' . $cusid . ' ' . $franchid . ' AND  DATE_FORMAT(so.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '") AND  (so.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
            $sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST['search']['value']) . '%" )';
            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST[ 'search' ][ 'value' ] . '%" ';
        } else {
            $sqlQuery .= 'where (so.visibility=1  AND  so.types_of_payment = 1 ' . $cusid . ' ' . $franchid . ' AND  DATE_FORMAT(so.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';
        }

        if (!empty($_POST['order'])) {
            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
        }
        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);
        if ($_POST['length'] != -1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  ' . $tableestimate  . ' where visibility=1 AND  types_of_payment = 1 ');
        $allResult = mysqli_fetch_assoc($stmtTotal);
        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);
        $records = array();
        $i = 1;
        while ($record = mysqli_fetch_assoc($stmt)) {
            if (isset($record['mixmonthlevel'])) {
                $dateVal = strtotime($record['mixmonthlevel']);
                $dateVals = date('Y-m', $dateVal);
                $dateValname = date('M Y', $dateVal);
            }
            $osstatus = '';

            // $advance = getReceiptsamount( $record[ 'PK_ES_ID' ], 0, 'erp_advance_noncomm' );
            // $receipts = getReceiptsamount( $record[ 'PK_ES_ID' ], 1, 'erp_advance_noncomm' );
            //$bulkPay = getbulkPayment( $record[ 'PK_ES_ID' ], 'erp_estimate_noncomm', 'erp_advance_bill_noncomm' );

            $query = 'SELECT ( SELECT est.grand_total  FROM erp_estimate_noncomm est WHERE est.PK_ES_ID= ' . $record['PK_ES_ID'] . ") as grand_total
                    FROM erp_advance_bill_noncomm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ', bp.fk_es_id) > 0';

            //  $query = 'SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=' . $cusID ;
            $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

            $bulkPay = '0';
            if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_array($result)) {

                    $bulkPay = $data['grand_total'];
                }
            }

            $query1 = 'SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=' . $record['PK_ES_ID'] . ' AND type=0';
            $result1 = mysqli_query($GLOBALS['___mysqli_ston'], $query1);

            $advance = '0';
            if (mysqli_num_rows($result1) > 0) {
                while ($data1 = mysqli_fetch_array($result1)) {
                    $advance = $data1['advance'];
                }
            }

            $query2 = 'SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=' . $record['PK_ES_ID'] . ' AND type=1';
            $result2 = mysqli_query($GLOBALS['___mysqli_ston'], $query2);

            $receipts = '0';
            if (mysqli_num_rows($result2) > 0) {
                while ($data2 = mysqli_fetch_array($result2)) {
                    $receipts = $data2['advance'];
                }
            }

            $outTotal = $record['grand_total'] - ($receipts + $advance);
            $bulkamt = $outTotal;
            //$bulkamt = 0;
            //var_dump( $outTotal );
            // var_dump( $bulkpay );

            if ($outTotal > 0 && $bulkPay > 0) {
                $bulkamt = floatval(0);
            }
            if ($bulkamt <= 0) {
                $paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
            } else {
                $paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
            }

            if ($record['order_status'] == 1) {
                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {
                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {
                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {
                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {
                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {
                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {
                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }
            $rows = array();
            $rows[] = $_POST['start'] + $i;
            $rows[] = ucfirst($record['sono']);
            $rows[] = $record['cus_name'];
            $rows[] = $record['cus_code'];
            $rows[] = $record['cat_name'];
            $rows[] = 'Credit';
            $rows[] = $record['jo_date'];
            $payment_type = ($record['payment_type'] == 1) ? 'Cash' : (($record['payment_type'] == 2) ? 'Credit Card' : (($record['payment_type'] == 3) ? 'UPI' : (($record['payment_type'] == 4) ? 'Bank Transfer' : (($record['payment_type'] == 5) ? 'Cheque' : ''))));
            // $rows[] = $payment_type ;
            //  $rows[] = '<p class="alignrightAmount">'.$record[ 'discount_final4' ].'</p>';
            $colorGTadvance = '';
            $pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
            if ($pending > 0) {
                $colorGTadvance = 'redadvgtcolor';
            } else {
                $colorGTadvance = 'greenadvgtcolor';
            }
            //    $receipt =    ( $record[ 'receipt' ] )? number_format( $record[ 'receipt' ], 2 ) : 0;
            // $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
            // $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
            //  $rows[] = '<p class="alignrightAmount">'.$record[ 'grand_total' ].'</p>';
            $rows[] = number_format($record['grand_total'], 2);
            $rows[] = '<a href="index.php?erp=69&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
            // $rows[] = '<a href="index.php?erp=69&id='.$record[ 'PK_ES_ID' ].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
            /*if ( $record[ 'status' ] == 2 && $record[ 'osstatus' ] == NULL )
 {
                    $rows[] = 'Invoice is created';
                } else {
                    */
            $rows[] = $osstatus;
            $rows[] = $paid_status;
            //}
            $rows[] = '<a href="index.php?erp=34&typ=2&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
            $records[] = $rows;
            $i++;
        }
        $output = array(
            'draw' => intval($_POST['draw']),
            'recordsTotal' => $allRecords,
            'recordsFiltered' => $displayRecords,
            'data' => $records,
        );
        echo json_encode($output);
    }

    public function listEstimateCancellationCommReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,est.reason  FROM erp_estimate_comm_cancel as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN ' . CITIES . ' c ON c.pk_city_id = cm.cus_city LEFT JOIN ' . STATES . ' s ON s.state_code= cm.cus_state ';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));
        if (!empty($_POST['search']['value'])) {
            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));
            $sqlQuery .= ' where (est.visibility=1   )';

            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';
            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%") ';
            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {
            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';
            $sqlQuery .= 'where est.visibility=1  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }
        if (!empty($_POST['order'])) {
            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= ' ORDER BY est.sono, est.sale_date ASC ';
        }
        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);
        if ($_POST['length'] != -1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //echo  $sqlQuery;
        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);
        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_comm_cancel where visibility=1 ');
        $allResult = mysqli_fetch_assoc($stmtTotal);
        $allRecords = mysqli_num_rows($stmtTotal);
        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();
        $i = 1;
        while ($record = mysqli_fetch_assoc($stmt)) {
            $osstatus = '';
            if ($record['order_status'] == 1) {
                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {
                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {
                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {
                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {
                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {
                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {
                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }
            $rows = array();
            $rows[] = $_POST['start'] + $i;
            $rows[] = date('d-m-Y', strtotime($record['sale_date']));
            $rows[] = $record['cusname'];
            $rows[] = ucfirst($record['sono']);
            $rows[] = $record['grand_total'];
            $rows[] = $record['reason'];
            $rows[] = '<a href="index.php?erp=124&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

            // $rows[] = $osstatus;
            $records[] = $rows;
            $i++;
        }
        $output = array(
            'draw' => intval($_POST['draw']),
            'recordsTotal' => $allRecords,
            'recordsFiltered' => $displayRecords,
            'data' => $records,
        );
        echo json_encode($output);
    }

    public function listEstimateCancellationNonCommReport()
    {
        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status,cm.pk_cus_id ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,est.reason  FROM erp_estimate_noncomm_cancel as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN ' . CITIES . ' c ON c.pk_city_id = cm.cus_city LEFT JOIN ' . STATES . ' s ON s.state_code= cm.cus_state ';
        //$fromDateval = date( 'Y-m-d', strtotime( $_POST[ 'fromDate' ] ) );

        //    $toDateval = date( 'Y-m-d', strtotime( $_POST[ 'toDate' ] ) );

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST['search']['value'])) {
            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));
            $sqlQuery .= ' where (est.visibility=1  )';

            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';
            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%") ';
            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {
            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';
            $sqlQuery .= 'where est.visibility=1  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }
        if (!empty($_POST['order'])) {
            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= ' ORDER BY est.sono, est.sale_date ASC ';
        }
        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);
        if ($_POST['length'] != -1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        // var_dump( $sqlQuery );
        // exit;
        //echo  $sqlQuery;
        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);
        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_noncomm_cancel where visibility=1 ');
        $allResult = mysqli_fetch_assoc($stmtTotal);
        $allRecords = mysqli_num_rows($stmtTotal);
        $displayRecords = mysqli_num_rows($display_stmt);
        $records = array();
        $i = 1;
        while ($record = mysqli_fetch_assoc($stmt)) {
            $osstatus = '';
            if ($record['order_status'] == 1) {
                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {
                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {
                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {
                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {
                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {
                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {
                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }
            $rows = array();
            $rows[] = $_POST['start'] + $i;
            $rows[] = date('d-m-Y', strtotime($record['sale_date']));
            $rows[] = $record['cusname'];
            $rows[] = ucfirst($record['sono']);
            $rows[] = $record['grand_total'];
            $rows[] = $record['reason'];
            $rows[] = '<a href="index.php?erp=123&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

            //  $rows[] = $osstatus;
            $records[] = $rows;
            $i++;
        }
        $output = array(
            'draw' => intval($_POST['draw']),
            'recordsTotal' => $allRecords,
            'recordsFiltered' => $displayRecords,
            'data' => $records,
        );

        echo json_encode($output);
    }

    public function listNonCommCustomerReporttest()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise , itms.fk_item_id  FROM erp_estimate_noncomm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  LEFT JOIN ' . ESTIMATE_NONCOMM_PRO . ' esp ON esp.fk_so_id= est.PK_ES_ID  LEFT JOIN ' . ITEMS . ' itms ON itms.pk_items_id= esp.fk_items_id ';

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . $_POST['txt_customer_name'] . '' : '';
        $itemssize = ($_POST['txt_size_name']) ? 'AND  itms.pk_items_id  LIKE "%' . $_POST['txt_size_name'] . '%"' : '';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));
        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));
            $sqlQuery .= ' where (est.visibility=1  ' . $cusid . ' ' . $itemssize . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';
            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';
            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%" )';
        } else {

            $sqlQuery .= 'where est.visibility=1 ' . $cusid . ' ' . $itemssize . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID  ORDER BY est.sono, est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_noncomm where visibility=1 ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name ,sqp.orientation FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cuscode'];

            $rows[] = $record['cusname'];

            $rows[] = $itemorient;

            $rows[] = $itemnamesdata;

            $rows[] = $advance;

            $rows[] = $receipts;

            $rows[] = $record['grand_total'];

            $rows[] = $osstatus;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

            /*

                    'draw' => intval( $_POST[ 'draw' ] ),

                    'iTotalRecords' => $displayRecords,

                    'iTotalDisplayRecords' => $allRecords,

                    'data' => $records, */

        );

        echo json_encode($output);
    }

    public function listCommPaidReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,cm.cus_state,cm.cus_city,est.order_status,cm.cus_mob_no,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,f.cat_name  FROM erp_estimate_comm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise ';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . $_POST['txt_customer_name'] . '' : '';
        $franid = ($_POST['txt_franchise_name']) ? 'AND  est.franchise = ' . trim($_POST['txt_franchise_name']) . '' : '';

        /*    $stateid = ( $_POST[ 'txt_state' ] ) ? 'AND  cm.cus_state = ' . $_POST[ 'txt_state' ] . '' : '';

                $cityid = ( $_POST[ 'txt_city' ] ) ? 'AND  cm.cus_city = ' . $_POST[ 'txt_city' ] . '' : '';
                */

        // $itemsquery = ( $_POST[ 'txt_items_name' ] ) ? 'AND  estp.fk_items_id = '.$_POST[ 'txt_items_name' ].' ' : " AND  estp.fk_items_id = ''  ";

        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.bill_paid = 1 AND est.visibility=1 ' . $cusid . ' ' . $franid . '  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" )';

            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_mob_no LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            $sqlQuery .= 'where est.bill_paid = 1 AND est.visibility=1 ' . $cusid . ' ' . $franid . '  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.sono ,est.sale_date ASC ';
        }
        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM  erp_estimate_comm where bill_paid = 1 AND visibility=1   AND  DATE_FORMAT(sale_date, '%Y-%m-%d') BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "' ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();
        //echo $sqlQuery;

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

            $outTotal = $record['grand_total'] - ($receipts + $advance);
            $bulkamt = $outTotal;

            $bulkPay = $record['grand_total'];

            if ($outTotal > 0 && $bulkPay > 0) {

                $bulkamt = floatval(0);
            }
            $paid_status = '';
            if ($bulkamt <= 0 || $record['bill_paid'] == 1) {
                $paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
            }

            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 1,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_COMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';



            // if ( $allcountprod > 0 ) {

            //     $itemnamesdata = $allResultproduct[ 'itemnames' ];

            //     $itemorient = '';

            //     if ( $allResultproduct1[ 'orientation' ] == 1 ) {
            //         $itemorient = 'Length';
            //     } else if ( $allResultproduct1[ 'orientation' ] == 2 ) {
            //         $itemorient = 'Breadth';
            //     }

            // }

            if ($allcountprod > 0) {
                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if (isset($allResultproduct1) && $allResultproduct1['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if (isset($allResultproduct1) && $allResultproduct1['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }


            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            $rows[] = $itemnamesdata;

            $rows[] = $record['grand_total'];
            $rows[] = $paid_status;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listNonCommPaidReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,cm.cus_state,cm.cus_city,est.order_status,cm.cus_mob_no,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,f.cat_name  FROM erp_estimate_noncomm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise ';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . $_POST['txt_customer_name'] . '' : '';
        $franid = ($_POST['txt_franchise_name']) ? 'AND  est.franchise = ' . trim($_POST['txt_franchise_name']) . '' : '';


        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.bill_paid = 1 AND est.visibility=1 ' . $cusid . ' ' . $franid . '  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_mob_no LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            $sqlQuery .= 'where est.bill_paid = 1 AND est.visibility=1 ' . $cusid . '  ' . $franid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.sono ,est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM  erp_estimate_noncomm WHERE bill_paid = 1 AND visibility=1  AND  DATE_FORMAT(sale_date, '%Y-%m-%d') BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "'");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_noncomm');

            $outTotal = $record['grand_total'] - ($receipts + $advance);
            $bulkamt = $outTotal;

            $bulkPay = $record['grand_total'];

            if ($outTotal > 0 && $bulkPay > 0) {

                $bulkamt = floatval(0);
            }
            $paid_status = '';
            if ($bulkamt <= 0 || $record['bill_paid'] == 1) {
                $paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
            }
            $rows = array();

            //IF( its.item_type = 2 && its.item_type = 2, ty.types_name, 'Product' ) as types_name item_type 4 5

            //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

            //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

            $sqlQueryproduct1 = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ')  as itemnames ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name, sum(sqp.qty) as qty FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '  AND sqp.itemtype = 4 ';

            $resultprod1 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct1);

            $allResultproduct1 = mysqli_fetch_assoc($resultprod1);

            $allcountprod1 = mysqli_num_rows($resultprod1);

            $sqlQueryproduct5 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 1,its.fk_item_id,'') as proditemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '  AND sqp.itemtype = 1';

            $resultprod5 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct5);

            $allResultproduct5 = mysqli_fetch_assoc($resultprod5);

            $allcountprod5 = mysqli_num_rows($resultprod5);

            $sqlQueryproduct6 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 2,its.fk_item_id,'') as proditemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '  AND sqp.itemtype = 2';

            $resultprod6 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct6);

            $allResultproduct6 = mysqli_fetch_assoc($resultprod6);

            $allcountprod6 = mysqli_num_rows($resultprod6);

            $sqlQueryproduct2 = "SELECT sqp.PK_ESP_ID, IF(its.item_type = 8,its.fk_item_id ,'') as paditemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 8';

            $resultprod2 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct2);

            $allResultproduct2 = mysqli_fetch_assoc($resultprod2);

            $allcountprod2 = mysqli_num_rows($resultprod2);

            $sqlQueryproduct3 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 7, its.fk_item_id ,'') as boxitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 7';

            $resultprod3 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct3);

            $allResultproduct3 = mysqli_fetch_assoc($resultprod3);

            $allcountprod3 = mysqli_num_rows($resultprod3);

            $sqlQueryproduct4 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 3, its.fk_item_id ,'') as sizeitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 3';

            $resultprod4 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct4);

            $allResultproduct4 = mysqli_fetch_assoc($resultprod4);

            $allcountprod4 = mysqli_num_rows($resultprod4);

            $sqlQueryproduct7 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 6, its.fk_item_id ,'') as bagitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 6';

            $resultprod7 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct7);

            $allResultproduct7 = mysqli_fetch_assoc($resultprod7);

            $allcountprod7 = mysqli_num_rows($resultprod7);

            //  $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 7, its.fk_item_id ,'') as boxitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM ".ESTIMATE_NONCOMM_PRO.' sqp LEFT JOIN '.ITEMS.' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN '.TYPES.' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = '.$record[ 'PK_ES_ID' ].'';

            $itemnamesdata = '';

            $itemqty = '';

            $itemorient = '';

            $proditemname = '';

            $paditemname = '';

            $boxitemname = '';

            $sizeitemname = '';

            if ($allcountprod1 > 0) {

                // var_dump( $allResultproduct );

                $itemnamesdata = $allResultproduct1['itemnames'];

                $itemqty = $allResultproduct1['qty'];

                $itemorient = '';

                if ($allResultproduct5['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct5['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            if ($allcountprod5 > 0) {

                // var_dump( $allResultproduct );

                $proditemname = $allResultproduct5['proditemname'];
            }

            if ($allcountprod6 > 0) {

                // var_dump( $allResultproduct );

                $catitemname = $allResultproduct6['proditemname'];
            }

            if ($allcountprod2 > 0) {

                $paditemname = $allResultproduct2['paditemname'];
            }

            if ($allcountprod3 > 0) {

                // var_dump( $allResultproduct );

                $boxitemname = $allResultproduct3['boxitemname'];
            }

            if ($allcountprod4 > 0) {

                // var_dump( $allResultproduct );

                $sizeitemname = $allResultproduct4['sizeitemname'];
            }

            if ($allcountprod7 > 0) {

                $bagitemname = $allResultproduct7['bagitemname'];
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            // $rows[] = $record[ 'cuscode' ];

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            $rows[] = $itemnamesdata;

            // $rows[] = $proditemname.' <br/>'.$catitemname;

            $rows[] = $proditemname . ' <br/>' . $catitemname . ' <br/>' . $paditemname . ' <br/>' . $boxitemname . ' <br/>' . $bagitemname;

            //     $rows[] =  $paditemname;

            //    $rows[] = $boxitemname;

            $rows[] = $sizeitemname;

            $rows[] = $itemqty;

            $rows[] = $itemorient;

            $rows[] = $record['grand_total'];
            $rows[] = $paid_status;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            // 'iTotalRecords' => $displayRecords,

            //'iTotalDisplayRecords' => $allRecords,

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listCommNotPaidReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,cm.cus_state,cm.cus_city,est.order_status,cm.cus_mob_no,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,f.cat_name  FROM erp_estimate_comm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise ';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . $_POST['txt_customer_name'] . '' : '';
        $franid = ($_POST['txt_franchise_name']) ? 'AND  est.franchise = ' . trim($_POST['txt_franchise_name']) . '' : '';


        /*    $stateid = ( $_POST[ 'txt_state' ] ) ? 'AND  cm.cus_state = ' . $_POST[ 'txt_state' ] . '' : '';

                $cityid = ( $_POST[ 'txt_city' ] ) ? 'AND  cm.cus_city = ' . $_POST[ 'txt_city' ] . '' : '';
                */

        // $itemsquery = ( $_POST[ 'txt_items_name' ] ) ? 'AND  estp.fk_items_id = '.$_POST[ 'txt_items_name' ].' ' : " AND  estp.fk_items_id = ''  ";

        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.bill_paid = 0 AND est.visibility=1 ' . $cusid . ' ' . $franid . '  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '" )';

            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_mob_no LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';

            /*  $sqlQuery .= ' where (est.visibility=1 AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "'.$fromDateval.'" AND "'.$toDateval.'")';

                    $sqlQuery .= ' AND ( est.sono LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

                    $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

                    $sqlQuery .= ' OR cm.cus_name LIKE "%' . $_POST[ 'search' ][ 'value' ] . '%" ';

                    $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

                    $sqlQuery .= ' OR est.grand_total LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%") ';
                    */
        } else {

            $sqlQuery .= 'where est.bill_paid =0 AND est.visibility=1 ' . $cusid . ' ' . $franid . '  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.sono ,est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        //echo $sqlQuery;
        //exit;
        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM  erp_estimate_comm where bill_paid =0 AND visibility=1   AND  DATE_FORMAT(sale_date, '%Y-%m-%d') BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "' ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();
        //echo $sqlQuery;

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $osstatus = '';

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

            $outTotal = $record['grand_total'] - ($receipts + $advance);
            $bulkamt = $outTotal;

            $bulkPay = $record['grand_total'];

            if ($outTotal > 0 && $bulkPay > 0) {

                $bulkamt = floatval(0);
            }

            $paid_status = '';
            if ($bulkamt > 0 || isset($record['bill_paid']) && $record['bill_paid'] == 0) {

                $paid_status = '<span class="custom_btn_class text-danger" > Not Amount Received</span>';
            }
            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 1,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_COMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if (isset($allResultproduct1) && $allResultproduct1['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if (isset($allResultproduct1) && $allResultproduct1['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            //$rows[] = $record[ 'cuscode' ];

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            $rows[] = $itemnamesdata;

            // $rows[] = $itemorient;

            /* $rows[] =  $advance;

                    $rows[] = $receipts;
                    */

            // $rows[] = $osstatus;

            $rows[] = $record['grand_total'];
            $rows[] = $paid_status;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listNonCommNotPaidReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,cm.cus_state,cm.cus_city,est.order_status,cm.cus_mob_no,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,f.cat_name  FROM erp_estimate_noncomm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise ';
        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . $_POST['txt_customer_name'] . '' : '';
        $franid = ($_POST['txt_franchise_name']) ? 'AND  est.franchise = ' . trim($_POST['txt_franchise_name']) . '' : '';

        //  $itemsquery = ( $_POST[ 'txt_items_name' ] ) ? 'AND  estp.fk_items_id = '.$_POST[ 'txt_items_name' ].' ' : " AND  estp.fk_items_id = ''  ";

        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.bill_paid = 0 AND est.visibility=1 ' . $cusid . ' ' . $franid . '  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_mob_no LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            $sqlQuery .= 'where  est.bill_paid = 0 AND est.visibility=1 ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.sono ,est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM  erp_estimate_noncomm WHERE bill_paid = 0 AND visibility=1  AND  DATE_FORMAT(sale_date, '%Y-%m-%d') BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "'");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_noncomm');

            $outTotal = $record['grand_total'] - ($receipts + $advance);
            $bulkamt = $outTotal;

            $bulkPay = $record['grand_total'];

            if ($outTotal > 0 && $bulkPay > 0) {

                $bulkamt = floatval(0);
            }
            $paid_status = '';
            if ($bulkamt > 0 || isset($record['bill_paid']) && $record['bill_paid'] == 0) {

                $paid_status = '<span class="custom_btn_class text-danger" > Not Amount Received</span>';
            }
            $rows = array();

            //IF( its.item_type = 2 && its.item_type = 2, ty.types_name, 'Product' ) as types_name item_type 4 5

            //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

            //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

            $sqlQueryproduct1 = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ')  as itemnames ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name, sum(sqp.qty) as qty FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '  AND sqp.itemtype = 4 ';

            $resultprod1 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct1);

            $allResultproduct1 = mysqli_fetch_assoc($resultprod1);

            $allcountprod1 = mysqli_num_rows($resultprod1);

            $sqlQueryproduct5 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 1,its.fk_item_id,'') as proditemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '  AND sqp.itemtype = 1';

            $resultprod5 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct5);

            $allResultproduct5 = mysqli_fetch_assoc($resultprod5);

            $allcountprod5 = mysqli_num_rows($resultprod5);

            $sqlQueryproduct6 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 2,its.fk_item_id,'') as proditemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '  AND sqp.itemtype = 2';

            $resultprod6 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct6);

            $allResultproduct6 = mysqli_fetch_assoc($resultprod6);

            $allcountprod6 = mysqli_num_rows($resultprod6);

            $sqlQueryproduct2 = "SELECT sqp.PK_ESP_ID, IF(its.item_type = 8,its.fk_item_id ,'') as paditemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 8';

            $resultprod2 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct2);

            $allResultproduct2 = mysqli_fetch_assoc($resultprod2);

            $allcountprod2 = mysqli_num_rows($resultprod2);

            $sqlQueryproduct3 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 7, its.fk_item_id ,'') as boxitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 7';

            $resultprod3 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct3);

            $allResultproduct3 = mysqli_fetch_assoc($resultprod3);

            $allcountprod3 = mysqli_num_rows($resultprod3);

            $sqlQueryproduct4 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 3, its.fk_item_id ,'') as sizeitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 3';

            $resultprod4 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct4);

            $allResultproduct4 = mysqli_fetch_assoc($resultprod4);

            $allcountprod4 = mysqli_num_rows($resultprod4);

            $sqlQueryproduct7 = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 6, its.fk_item_id ,'') as bagitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . ' AND sqp.itemtype = 6';

            $resultprod7 = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct7);

            $allResultproduct7 = mysqli_fetch_assoc($resultprod7);

            $allcountprod7 = mysqli_num_rows($resultprod7);

            //  $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,IF(its.item_type = 7, its.fk_item_id ,'') as boxitemname ,its.item_type,IF(sqp.types = 2,ty.types_name ,'Product') as types_name  FROM ".ESTIMATE_NONCOMM_PRO.' sqp LEFT JOIN '.ITEMS.' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN '.TYPES.' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = '.$record[ 'PK_ES_ID' ].'';

            $itemnamesdata = '';

            $itemqty = '';

            $itemorient = '';

            $proditemname = '';

            $paditemname = '';

            $boxitemname = '';

            $sizeitemname = '';

            if ($allcountprod1 > 0) {

                // var_dump( $allResultproduct );

                $itemnamesdata = $allResultproduct1['itemnames'];

                $itemqty = $allResultproduct1['qty'];

                $itemorient = '';

                if ($allResultproduct5['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct5['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            if ($allcountprod5 > 0) {

                // var_dump( $allResultproduct );

                $proditemname = $allResultproduct5['proditemname'];
            }

            if ($allcountprod6 > 0) {

                // var_dump( $allResultproduct );

                $catitemname = $allResultproduct6['proditemname'];
            }

            if ($allcountprod2 > 0) {

                $paditemname = $allResultproduct2['paditemname'];
            }

            if ($allcountprod3 > 0) {

                // var_dump( $allResultproduct );

                $boxitemname = $allResultproduct3['boxitemname'];
            }

            if ($allcountprod4 > 0) {

                // var_dump( $allResultproduct );

                $sizeitemname = $allResultproduct4['sizeitemname'];
            }

            if ($allcountprod7 > 0) {

                $bagitemname = $allResultproduct7['bagitemname'];
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            // $rows[] = $record[ 'cuscode' ];

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            $rows[] = $itemnamesdata;

            // $rows[] = $proditemname.' <br/>'.$catitemname;

            $rows[] = $proditemname . ' <br/>' . $catitemname . ' <br/>' . $paditemname . ' <br/>' . $boxitemname . ' <br/>' . $bagitemname;

            //     $rows[] =  $paditemname;

            //    $rows[] = $boxitemname;

            $rows[] = $sizeitemname;

            $rows[] = $itemqty;

            $rows[] = $itemorient;

            // $rows[] = $osstatus;

            $rows[] = $record['grand_total'];
            $rows[] = $paid_status;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            // 'iTotalRecords' => $displayRecords,

            //'iTotalDisplayRecords' => $allRecords,

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function getNReceipts($cusID, $type)
    {
        $query = 'SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where customer_id=' . $cusID . ' and type=' . $type;
        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);
        $returnValue = '0';
        $estimatecomm = array();
        if (mysqli_num_rows($result) > 0) {
            $counter = 1;
            while ($data = mysqli_fetch_array($result)) {
                $returnValue = $data['advance'];
            }
        }
        return $returnValue;
    }
    /*
            public function getNReceiptsout( $cusID, $esId, $type, $tabletype, $tabletypeestimate )
 {
                $query = 'SELECT ad.advance_amount as advance FROM '.$tabletype.' ad INNER JOIN '.$tabletypeestimate.' est where est.customer_id=' . $cusID . ' and ad.fk_es_id IN(' . $esId. ') and ad.type=' . $type;
                $result = mysqli_query( $GLOBALS[ '___mysqli_ston' ], $query );
                $returnValue = '0';
                $estimatecomm = array();
                if ( mysqli_num_rows( $result ) > 0 ) {
                    $counter = 1;
                    while ( $data = mysqli_fetch_array( $result ) ) {
                        $returnValue = $data[ 'advance' ];
                    }
                }
                return $returnValue;
            }*/
    public function getNReceiptsoutcomm($cusID, $esId, $type)
    {
        $query = 'SELECT sum(advance_amount) as advance FROM erp_advance_comm where customer_id=' . $cusID . ' and fk_es_id IN(' . $esId . ') and type=' . $type;
        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);
        $returnValue = '0';
        $estimatecomm = array();
        if (mysqli_num_rows($result) > 0) {
            $counter = 1;
            while ($data = mysqli_fetch_array($result)) {
                $returnValue = $data['advance'];
            }
        }
        return $returnValue;
    }

    public function getNbulkPaymentcomm($esID, $cusID)
    {
        //implode( ',', $esID );
        $query = 'SELECT  SUM(est.grand_total ) as grand_total   FROM ' . BULK_PAYMENT_COMM . ' bp INNER JOIN erp_estimate_comm est ON FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0 AND est.customer_id=' . $cusID . ' WHERE   est.PK_ES_ID IN(' . $esID . ') ';
        //  $query = 'SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=' . $cusID ;
        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);
        $returnValue = '0';
        $estimatecomm = array();
        if (mysqli_num_rows($result) > 0) {
            $counter = 1;
            while ($data = mysqli_fetch_array($result)) {
                $returnValue = $data['grand_total'];
            }
        }
        return $returnValue;
    }
    public function getNReceiptsout($cusID, $esId, $type)
    {
        //  $query1 = 'SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=' . $record[ 'PK_ES_ID' ] . ' AND type=0';
        $query = 'SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where customer_id=' . $cusID . ' and fk_es_id IN(' . $esId . ') and type=' . $type;
        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);
        $returnValue = '0';
        $estimatecomm = array();
        if (mysqli_num_rows($result) > 0) {
            $counter = 1;
            while ($data = mysqli_fetch_array($result)) {
                $returnValue = $data['advance'];
            }
        }
        return $returnValue;
    }

    public function getNbulkPayment($esID, $cusID)
    {
        //implode( ',', $esID );
        $query = 'SELECT  SUM(est.grand_total ) as grand_total   FROM ' . BULK_PAYMENT_NONCOMM . ' bp INNER JOIN erp_estimate_noncomm est ON FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0 AND est.customer_id=' . $cusID . ' WHERE   est.PK_ES_ID IN(' . $esID . ') ';
        //  $query = 'SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=' . $cusID ;
        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);
        $returnValue = '0';
        $estimatecomm = array();
        if (mysqli_num_rows($result) > 0) {
            $counter = 1;
            while ($data = mysqli_fetch_array($result)) {
                $returnValue = $data['grand_total'];
            }
        }
        return $returnValue;
    }

    /* public function getNbulkPayment( $esID, $cusID,$tabletype, $tabletypeestimate)
 {
                //implode( ',', $esID );
                $query = 'SELECT  bp.advance_amount  as advance_amount, bp.discount  as discount  FROM '.$tabletype.' bp INNER JOIN '.$tabletypeestimate.' est ON FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0  WHERE   bp.fk_es_id IN('.$esID.') AND est.customer_id=' . $cusID.'' ;
                //  $query = 'SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=' . $cusID ;
                $result = mysqli_query( $GLOBALS[ '___mysqli_ston' ], $query );
                $returnValue = '0';
                $estimatecomm = array();
                if ( mysqli_num_rows( $result ) > 0 ) {
                    while ( $data = mysqli_fetch_array( $result ) ) {
						$returnValue = floatval($data[ 'advance_amount' ]) + floatval($data[ 'discount' ])  ;

                    }
                }
                return $returnValue;
            }   
			public function getNbulkPaymentTot( $esID, $cusID,$tabletype, $tabletypeestimate,$outNTotal)
 {
                //implode( ',', $esID );
                $query = 'SELECT  SUM(bp.advance_amount)  as advance_amount, SUM(bp.discount)  as discount, SUM(est.grand_total) as grand_total,est.PK_ES_ID  FROM '.$tabletype.' bp INNER JOIN '.$tabletypeestimate.' est ON FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0  WHERE   bp.fk_es_id IN('.$esID.') AND est.customer_id=' . $cusID.'' ;
                //  $query = 'SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=' . $cusID ;
                $result = mysqli_query( $GLOBALS[ '___mysqli_ston' ], $query );
                $returnValue = '0';
                $estimatecomm = array();
                if ( mysqli_num_rows( $result ) > 0 ) {
                    while ( $data = mysqli_fetch_array( $result ) ) {
						//var_dump($data);
							if(floatval($data[ 'grand_total' ]) > floatval($outNTotal))
							{
								$returnValue =   (floatval($data[ 'grand_total' ])  - floatval($outNTotal));
							}
							else if(floatval($data[ 'grand_total' ]) < floatval($outNTotal))
							{
								$returnValue =  (floatval($outNTotal) - floatval($data[ 'grand_total' ]));
								//$returnValue =  floatval($outNTotal) - floatval($data[ 'grand_total' ]);
							}
                    }
                }
                return $returnValue;
            }
*/
    /*   public function listCommOutstandingReport() {

                $sqlQuery = 'SELECT sum(est.grand_total) as totalAmt,cus.cus_name,f.cat_name,cus.pk_cus_id,GROUP_CONCAT(est.PK_ES_ID) as es_id,est.sale_date,est.franchise FROM `erp_estimate_comm` as est LEFT JOIN erp_customer_master as cus on cus.pk_cus_id=est.customer_id LEFT JOIN erp_category as f ON est.franchise=f.pk_cat_id  ';

                $fromDate = str_replace('/', '-', $_POST[ 'fromDate' ]);
                $fromDateval = date( 'Y-m-d', strtotime(  $fromDate ) );
                $toDate = str_replace('/', '-', $_POST[ 'toDate' ]);
                $toDateval = date( 'Y-m-d', strtotime(  $toDate ) );

                $cusid = ( $_POST[ 'txt_customer_name' ] ) ? 'AND  cus.cus_name = "'. $_POST[ 'txt_customer_name' ] . '"' : '';
                $fransid = ( $_POST[ 'txt_franchise_name' ] ) ? 'AND  f.cat_name = "' . $_POST[ 'txt_franchise_name' ] . '"' : '';

                //  $itemsquery = ( $_POST[ 'txt_items_name' ] ) ? 'AND  estp.fk_items_id = '.$_POST[ 'txt_items_name' ].' ' : " AND  estp.fk_items_id = ''  ";

                if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {

                    $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );

                    $sqlQuery .= ' where ( est.visibility=1 ' . $cusid . ' '.$fransid.'  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

                    $sqlQuery .= ' AND (  est.sale_date LIKE "%' . $searchdate . '%" ';

                    $sqlQuery .= ' OR cus.cus_name LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

                    //   $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

                    $sqlQuery .= ' OR f.cat_name LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

                    $sqlQuery .= ' OR est.grand_total LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%") ';

                } else {

                    $sqlQuery .= 'where  est.visibility=1 ' . $cusid . ' '.$fransid.' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';

                }

                if ( !empty( $_POST[ 'order' ] ) ) {

                    $sqlQuery .= 'group by est.customer_id ORDER BY ' . $_POST[ 'order' ][ '0' ][ 'column' ] . ' ' . $_POST[ 'order' ][ '0' ][ 'dir' ] . ' ';

                } else {

                    $sqlQuery .= 'group by est.customer_id ORDER BY est.sono ,est.sale_date ASC ';

                }
                $display_stmt = mysqli_query( $GLOBALS[ '___mysqli_ston' ], $sqlQuery );

                if ( $_POST[ 'length' ] != -1 ) {

                    $sqlQuery .= 'LIMIT ' . $_POST[ 'start' ] . ', ' . $_POST[ 'length' ];

                }

                $stmt = mysqli_query( $GLOBALS[ '___mysqli_ston' ], $sqlQuery );

                $stmtTotal = mysqli_query( $GLOBALS[ '___mysqli_ston' ], "SELECT * FROM  erp_estimate_comm WHERE   visibility=1   AND  DATE_FORMAT(sale_date, '%Y-%m-%d') BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "' group by customer_id" );

                $allResult = mysqli_fetch_assoc( $stmtTotal );

                $allRecords = mysqli_num_rows( $stmtTotal );

                $displayRecords = mysqli_num_rows( $display_stmt );

                $records = array();

                $i = 1;

                while ( $record = mysqli_fetch_assoc( $stmt ) ) {

                    $advance = $this->getNReceiptsout( $record[ 'pk_cus_id' ], $record[ 'es_id' ], 0 , 'erp_advance_comm','erp_estimate_comm');
                    $receipts = $this->getNReceiptsout( $record[ 'pk_cus_id' ], $record[ 'es_id' ], 1, 'erp_advance_comm','erp_estimate_comm');

                    $returnValue = 'NIL';

                 
                    $outNTotal = $record[ 'totalAmt' ] - ( $receipts + $advance  ) ;
                    $bulkNamt = $outNTotal ;
					
					$bulkNpay = $this->getNbulkPayment( $record[ 'es_id' ], $record[ 'pk_cus_id' ], 'erp_advance_bill_comm' ,'erp_estimate_comm');
					
                    $bulkNpaytot = $this->getNbulkPaymentTot( $record[ 'es_id' ], $record[ 'pk_cus_id' ], 'erp_advance_bill_comm' ,'erp_estimate_comm',$outNTotal);
					
                    if (  $bulkNpaytot > 0 )
                    {
						
							$bulkNamt =  floatval($bulkNpaytot)   ;
						

                    }
                    $rows = array();

                    //IF( its.item_type = 2 && its.item_type = 2, ty.types_name, 'Product' ) as types_name item_type 4 5

                    //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

                    //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

                    $rows[] = $_POST[ 'start' ] + $i;

                    $rows[] = $record[ 'cus_name' ];

                    $rows[] = $record[ 'cat_name' ];

                    $rows[] = number_format( $record[ 'totalAmt' ], 2 );

                    $rows[] = number_format( $advance, 2 );

                    $rows[] = number_format( $receipts, 2 );

                    $rows[] = number_format( $bulkNpay, 2 );

                    $rows[] = number_format( $bulkNamt, 2 );

                    $fransid = ( $_POST[ 'txt_franchise_name' ] ) ? $record[ 'franchise' ] : 0;

                    $rows[] = '<a href="index.php?erp=97&typ=1&cusid=' . $record[ 'pk_cus_id' ] . '&fromda='.$fromDateval.'&toda='.$toDateval.'&fransid='.$fransid.'" class="btn btn-primary  btn-sm">View Estimates</a>';

                    $records[] = $rows;

                    $i++;

                }

                $output = array(

                    'draw' => intval( $_POST[ 'draw' ] ),

                    // 'iTotalRecords' => $displayRecords,

                    //'iTotalDisplayRecords' => $allRecords,

                    'recordsTotal' => $allRecords,

                    'recordsFiltered' => $displayRecords,

                    'data' => $records,

                );

                echo json_encode( $output );

            }

            public function listNoncommOutstandingReport() {

                $sqlQuery = 'SELECT sum(est.grand_total) as totalAmt,cus.cus_name,f.cat_name,cus.pk_cus_id,GROUP_CONCAT(est.PK_ES_ID) as es_id,est.sale_date,est.franchise FROM `erp_estimate_noncomm` as est LEFT JOIN erp_customer_master as cus on cus.pk_cus_id=est.customer_id LEFT JOIN erp_category as f ON est.franchise=f.pk_cat_id  ';

                $fromDate = str_replace('/', '-', $_POST[ 'fromDate' ]);
                $fromDateval = date( 'Y-m-d', strtotime(  $fromDate ) );
                $toDate = str_replace('/', '-', $_POST[ 'toDate' ]);
                $toDateval = date( 'Y-m-d', strtotime(  $toDate ) );

                $cusid = ( $_POST[ 'txt_customer_name' ] ) ? 'AND  cus.cus_name = "'. $_POST[ 'txt_customer_name' ] . '"' : '';
                $fransid = ( $_POST[ 'txt_franchise_name' ] ) ? 'AND  f.cat_name = "' . $_POST[ 'txt_franchise_name' ] . '"' : '';

                //  $itemsquery = ( $_POST[ 'txt_items_name' ] ) ? 'AND  estp.fk_items_id = '.$_POST[ 'txt_items_name' ].' ' : " AND  estp.fk_items_id = ''  ";

                if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {

                    $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );

                    $sqlQuery .= ' where ( est.visibility=1 ' . $cusid . ' '.$fransid.'  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

                    $sqlQuery .= ' AND (  est.sale_date LIKE "%' . $searchdate . '%" ';

                    $sqlQuery .= ' OR cus.cus_name LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

                    //   $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

                    $sqlQuery .= ' OR f.cat_name LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

                    $sqlQuery .= ' OR est.grand_total LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%") ';

                } else {

                    $sqlQuery .= 'where  est.visibility=1 ' . $cusid . ' '.$fransid.' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';

                }

                if ( !empty( $_POST[ 'order' ] ) ) {

                    $sqlQuery .= 'group by est.customer_id ORDER BY ' . $_POST[ 'order' ][ '0' ][ 'column' ] . ' ' . $_POST[ 'order' ][ '0' ][ 'dir' ] . ' ';

                } else {

                    $sqlQuery .= 'group by est.customer_id ORDER BY est.sono ,est.sale_date ASC ';

                }
                $display_stmt = mysqli_query( $GLOBALS[ '___mysqli_ston' ], $sqlQuery );

                if ( $_POST[ 'length' ] != -1 ) {

                    $sqlQuery .= 'LIMIT ' . $_POST[ 'start' ] . ', ' . $_POST[ 'length' ];

                }

                $stmt = mysqli_query( $GLOBALS[ '___mysqli_ston' ], $sqlQuery );

                $stmtTotal = mysqli_query( $GLOBALS[ '___mysqli_ston' ], "SELECT * FROM  erp_estimate_noncomm WHERE   visibility=1  AND  DATE_FORMAT(sale_date, '%Y-%m-%d') BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "' group by customer_id" );

                $allResult = mysqli_fetch_assoc( $stmtTotal );

                $allRecords = mysqli_num_rows( $stmtTotal );

                $displayRecords = mysqli_num_rows( $display_stmt );

                $records = array();

                $i = 1;

                while ( $record = mysqli_fetch_assoc( $stmt ) ) {

                    $advance = $this->getNReceiptsout( $record[ 'pk_cus_id' ], $record[ 'es_id' ], 0 , 'erp_advance_noncomm','erp_estimate_noncomm');
                    $receipts = $this->getNReceiptsout( $record[ 'pk_cus_id' ], $record[ 'es_id' ], 1, 'erp_advance_noncomm','erp_estimate_noncomm');

                    $returnValue = 'NIL';

                    $outNTotal = $record[ 'totalAmt' ] - ( $receipts + $advance  ) ;
                    $bulkNamt = $outNTotal;
					$bulkNpay = $this->getNbulkPayment( $record[ 'es_id' ], $record[ 'pk_cus_id' ], 'erp_advance_bill_noncomm','erp_estimate_noncomm' );

					$bulkNpaytot = $this->getNbulkPaymentTot( $record[ 'es_id' ], $record[ 'pk_cus_id' ], 'erp_advance_bill_noncomm' ,'erp_estimate_noncomm',$outNTotal);
					
                    if (  $bulkNpaytot > 0 )
                    {
						$bulkNamt =  floatval($bulkNpaytot) - floatval($advrece)   ;
						
						
                    }
                    $rows = array();

                    //IF( its.item_type = 2 && its.item_type = 2, ty.types_name, 'Product' ) as types_name item_type 4 5

                    //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

                    //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

                    $rows[] = $_POST[ 'start' ] + $i;

                    $rows[] = $record[ 'cus_name' ];

                    $rows[] = $record[ 'cat_name' ];

                    $rows[] = number_format( $record[ 'totalAmt' ], 2 );

                    $rows[] = number_format( $advance, 2 );

                    $rows[] = number_format( $receipts, 2 );

                    $rows[] = number_format( $bulkNpay, 2 );

                    $rows[] = number_format( $bulkNamt, 2 );

                    $fransid = ( $_POST[ 'txt_franchise_name' ] ) ? $record[ 'franchise' ] : 0;

                    $rows[] = '<a href="index.php?erp=97&typ=1&cusid=' . $record[ 'pk_cus_id' ] . '&fromda='.$fromDateval.'&toda='.$toDateval.'&fransid='.$fransid.'" class="btn btn-primary  btn-sm">View Estimates</a>';

                    $records[] = $rows;

                    $i++;

                }

                $output = array(

                    'draw' => intval( $_POST[ 'draw' ] ),

                    // 'iTotalRecords' => $displayRecords,

                    //'iTotalDisplayRecords' => $allRecords,

                    'recordsTotal' => $allRecords,

                    'recordsFiltered' => $displayRecords,

                    'data' => $records,

                );

                echo json_encode( $output );

            }*/
    public function listCommOutstandingReport()
    {

        $sqlQuery = 'SELECT sum(est.grand_total) as totalAmt,cus.cus_name,f.cat_name,cus.pk_cus_id,GROUP_CONCAT(est.PK_ES_ID) as es_id,est.sale_date,est.franchise FROM `erp_estimate_comm` as est LEFT JOIN erp_customer_master as cus on cus.pk_cus_id=est.customer_id LEFT JOIN erp_category as f ON est.franchise=f.pk_cat_id  ';



        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));



        $cusid = ($_POST['txt_customer_name']) ? 'AND  cus.cus_name = "' . $_POST['txt_customer_name'] . '"' : '';
        $fransid = ($_POST['txt_franchise_name']) ? 'AND  f.cat_name = "' . $_POST['txt_franchise_name'] . '"' : '';

        //  $itemsquery = ( $_POST[ 'txt_items_name' ] ) ? 'AND  estp.fk_items_id = '.$_POST[ 'txt_items_name' ].' ' : " AND  estp.fk_items_id = ''  ";

        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where ( est.visibility=1 ' . $cusid . ' ' . $fransid . '  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            $sqlQuery .= ' AND (  est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            //   $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            $sqlQuery .= 'where  est.visibility=1 ' . $cusid . ' ' . $fransid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'group by est.customer_id ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'group by est.customer_id ORDER BY est.sono ,est.sale_date ASC ';
        }
        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM  erp_estimate_comm WHERE   visibility=1  AND  DATE_FORMAT(sale_date, '%Y-%m-%d') BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "' group by customer_id");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $advance = $this->getNReceiptsoutcomm($record['pk_cus_id'], $record['es_id'], 0);
            $receipts = $this->getNReceiptsoutcomm($record['pk_cus_id'], $record['es_id'], 1);

            $returnValue = 'NIL';

            $bulkNpay = $this->getNbulkPaymentcomm($record['es_id'], $record['pk_cus_id']);
            $outNTotal = $record['totalAmt'] - ($receipts + $advance);
            $bulkNamt = $outNTotal;
            if ($outNTotal > 0 && $bulkNpay > 0) {
                $bulkNamt = floatval($outNTotal) - floatval($bulkNpay);
            }
            $rows = array();

            //IF( its.item_type = 2 && its.item_type = 2, ty.types_name, 'Product' ) as types_name item_type 4 5

            //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

            //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

            $rows[] = $_POST['start'] + $i;

            $rows[] = $record['cus_name'];

            $rows[] = $record['cat_name'];

            $rows[] = number_format($record['totalAmt'], 2);

            $rows[] = isset($advance) ? number_format($advance, 2) : '';

            $rows[] = isset($receipts) ? number_format($receipts, 2) : '';

            $rows[] = isset($bulkNpay) ? number_format($bulkNpay, 2) : '';

            $rows[] = number_format($bulkNamt, 2);

            $fransid = ($_POST['txt_franchise_name']) ? $record['franchise'] : 0;

            $rows[] = '<a href="index.php?erp=97&typ=1&cusid=' . $record['pk_cus_id'] . '&fromda=' . $fromDateval . '&toda=' . $toDateval . '&fransid=' . $fransid . '" class="btn btn-primary  btn-sm">View Estimates</a>';

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            // 'iTotalRecords' => $displayRecords,

            //'iTotalDisplayRecords' => $allRecords,

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listNoncommOutstandingReport()
    {

        $sqlQuery = 'SELECT sum(est.grand_total) as totalAmt,cus.cus_name,f.cat_name,cus.pk_cus_id,GROUP_CONCAT(est.PK_ES_ID) as es_id,est.sale_date,est.franchise FROM `erp_estimate_noncomm` as est LEFT JOIN erp_customer_master as cus on cus.pk_cus_id=est.customer_id LEFT JOIN erp_category as f ON est.franchise=f.pk_cat_id  ';


        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));


        $cusid = ($_POST['txt_customer_name']) ? 'AND  cus.cus_name = "' . $_POST['txt_customer_name'] . '"' : '';
        $fransid = ($_POST['txt_franchise_name']) ? 'AND  f.cat_name = "' . $_POST['txt_franchise_name'] . '"' : '';

        //  $itemsquery = ( $_POST[ 'txt_items_name' ] ) ? 'AND  estp.fk_items_id = '.$_POST[ 'txt_items_name' ].' ' : " AND  estp.fk_items_id = ''  ";

        if (!empty($_POST['search']['value'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where ( est.visibility=1 ' . $cusid . ' ' . $fransid . '  AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

            $sqlQuery .= ' AND (  est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            //   $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim( $_POST[ 'search' ][ 'value' ] ) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            $sqlQuery .= 'where  est.visibility=1 ' . $cusid . ' ' . $fransid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'group by est.customer_id ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'group by est.customer_id ORDER BY est.sono ,est.sale_date ASC ';
        }
        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT * FROM  erp_estimate_noncomm WHERE   visibility=1  AND  DATE_FORMAT(sale_date, '%Y-%m-%d') BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "' group by customer_id");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $advance = $this->getNReceiptsout($record['pk_cus_id'], $record['es_id'], 0);
            $receipts = $this->getNReceiptsout($record['pk_cus_id'], $record['es_id'], 1);

            $returnValue = 'NIL';

            $bulkNpay = $this->getNbulkPayment($record['es_id'], $record['pk_cus_id']);
            $outNTotal = $record['totalAmt'] - ($receipts + $advance);
            $bulkNamt = $outNTotal;
            if ($outNTotal > 0 && $bulkNpay > 0) {
                $bulkNamt = floatval($outNTotal) - floatval($bulkNpay);
            }
            $rows = array();

            //IF( its.item_type = 2 && its.item_type = 2, ty.types_name, 'Product' ) as types_name item_type 4 5

            //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

            //IF( its.item_type = 1, its.fk_item_id, '' ) as proditemname  ( GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ' ) )

            $rows[] = $_POST['start'] + $i;

            $rows[] = $record['cus_name'];

            $rows[] = $record['cat_name'];

            $rows[] = isset($record['totalAmt']) ? number_format($record['totalAmt'], 2) : '';

            $rows[] = isset($advance) ? number_format($advance, 2) : '';

            $rows[] = isset($receipts) ? number_format($receipts, 2) : '';

            $rows[] = isset($bulkNpay) ? number_format($bulkNpay, 2) : '';

            $rows[] = isset($bulkNamt) ? number_format($bulkNamt, 2) : '';

            $fransid = ($_POST['txt_franchise_name']) ? $record['franchise'] : 0;

            $rows[] = '<a href="index.php?erp=97&typ=2&cusid=' . $record['pk_cus_id'] . '&fromda=' . $fromDateval . '&toda=' . $toDateval . '&fransid=' . $fransid . '" class="btn btn-primary  btn-sm">View Estimates</a>';

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            // 'iTotalRecords' => $displayRecords,

            //'iTotalDisplayRecords' => $allRecords,

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listCommBulkOrderByReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise ,f.cat_name,est.payment_type FROM erp_estimate_comm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN ' . CITIES . ' c ON c.pk_city_id = cm.cus_city LEFT JOIN ' . STATES . ' s ON s.state_code= cm.cus_state LEFT JOIN ' . CATEGORY . ' f ON f.pk_cat_id= est.franchise  ';

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . $_POST['txt_customer_name'] . '' : '';
        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));
        if (!empty($_POST['search']['value'])) {
            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));
            $sqlQuery .= ' where (est.visibility=1    ' . $cusid . '  AND  FIND_IN_SET(est.PK_ES_ID,(SELECT bp.fk_es_id FROM ' . BULK_PAYMENT_COMM . ' bp where bp.pk_adv_com_id= "' . $_POST['bulkid'] . '")) AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';
            $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';
            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';
            $sqlQuery .= ' OR est.payment_type LIKE "%' . trim($paymentval) . '%" ';
            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%" )';
        } else {

            $sqlQuery .= 'where est.visibility=1   AND  FIND_IN_SET(est.PK_ES_ID,(SELECT bp.fk_es_id FROM ' . BULK_PAYMENT_COMM . ' bp where bp.pk_adv_com_id= "' . $_POST['bulkid'] . '"))   ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.sono, est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_comm where visibility=1  AND  FIND_IN_SET(PK_ES_ID,(SELECT bp.fk_es_id FROM ' . BULK_PAYMENT_COMM . ' bp where bp.pk_adv_com_id= "' . $_POST['bulkid'] . '")) ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $paymenttype = '';
            if ($record['payment_type'] == 1) {
                $paymenttype = 'Cash';
            } else if ($record['payment_type'] == 2) {
                $paymenttype = 'Credit';
            }

            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name ,sqp.orientation FROM " . ESTIMATE_COMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cuscode'];

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            $rows[] = $paymenttype;

            $rows[] = $itemorient;

            $rows[] = $itemnamesdata;

            $rows[] = $advance;

            $rows[] = $receipts;

            $rows[] = $record['grand_total'];

            $rows[] = $osstatus;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

            /*

                    'draw' => intval( $_POST[ 'draw' ] ),

                    'iTotalRecords' => $displayRecords,

                    'iTotalDisplayRecords' => $allRecords,

                    'data' => $records, */

        );

        echo json_encode($output);
    }

    public function listNonCommBulkOrderByReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise , itms.fk_item_id,f.cat_name,est.payment_type  FROM erp_estimate_noncomm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  LEFT JOIN ' . CATEGORY . ' f ON f.pk_cat_id= est.franchise  LEFT JOIN ' . ESTIMATE_NONCOMM_PRO . ' esp ON esp.fk_so_id= est.PK_ES_ID  LEFT JOIN ' . ITEMS . ' itms ON itms.pk_items_id= esp.fk_items_id ';

        //  $sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status,cm.pk_cus_id ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise  FROM erp_estimate_noncomm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN ' . CITIES . ' c ON c.pk_city_id = cm.cus_city LEFT JOIN ' . STATES . ' s ON s.state_code= cm.cus_state ';

        //$fromDateval = date( 'Y-m-d', strtotime( $_POST[ 'fromDate' ] ) );

        //    $toDateval = date( 'Y-m-d', strtotime( $_POST[ 'toDate' ] ) );

        $cusid = ($_POST['txt_customer_name']) ? 'AND  est.customer_id = ' . $_POST['txt_customer_name'] . '' : '';
        $itemssize = ($_POST['txt_size_name']) ? 'AND  itms.pk_items_id  LIKE "%' . $_POST['txt_size_name'] . '%"' : '';

        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST['search']['value'])) {

            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.visibility=1  ' . $cusid . ' ' . $itemssize . '  AND  FIND_IN_SET(est.PK_ES_ID,(SELECT bp.fk_es_id FROM ' . BULK_PAYMENT_NONCOMM . ' bp  where  bp.pk_adv_noncom_id= "' . $_POST['bulkid'] . '")))';

            /*

                    if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {

                        $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );

                        $sqlQuery .= ' where (est.visibility=1  '.$cusid.')';
                        */

            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.payment_type LIKE "%' . trim($paymentval) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

            $sqlQuery .= 'where est.visibility=1 AND  FIND_IN_SET(est.PK_ES_ID,(SELECT bp.fk_es_id FROM ' . BULK_PAYMENT_NONCOMM . ' bp where bp.pk_adv_noncom_id= "' . $_POST['bulkid'] . '"))  ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID  ORDER BY est.sono, est.sale_date ASC ';
        }

        //    var_dump($sqlQuery);
        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        // var_dump( $sqlQuery );

        // exit;

        //echo  $sqlQuery;

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_noncomm where visibility=1  AND  FIND_IN_SET(PK_ES_ID,(SELECT bp.fk_es_id FROM ' . BULK_PAYMENT_NONCOMM . ' bp where bp.pk_adv_noncom_id= "' . $_POST['bulkid'] . '")) ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $paymenttype = '';
            if ($record['payment_type'] == 1) {
                $paymenttype = 'Cash';
            } else if ($record['payment_type'] == 2) {
                $paymenttype = 'Credit';
            }

            $osstatus = '';

            if ($record['order_status'] == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status'] == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status'] == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status'] == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status'] == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status'] == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status'] == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_noncomm');

            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cuscode'];

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            $rows[] = $paymenttype;

            $rows[] = $itemorient;

            $rows[] = $itemnamesdata;

            $rows[] = $advance;

            $rows[] = $receipts;

            $rows[] = $record['grand_total'];

            $rows[] = $osstatus;

            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function getCommBulkTotal($bulkID)
    {

        $sqlQuery = 'SELECT bp.pk_adv_com_id,bp.fk_es_id,bp.advance_amount,bp.payment_type,bp.date,bp.discount,( SELECT SUM(est.grand_total) FROM erp_estimate_comm est WHERE FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0  ) as ordertotal ,( SELECT SUM(ad.advance_amount) FROM erp_advance_comm ad WHERE FIND_IN_SET(ad.fk_es_id, bp.fk_es_id) > 0  ) as advancetotal   FROM ' . BULK_PAYMENT_COMM . ' bp  where  pk_adv_com_id = ' . $bulkID . ' ';

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $resultval = mysqli_num_rows($result);
        $data = array();
        if ($resultval > 0) {
            $data = $result;
        }
        return $data;
    }
    public function getNonCommBulkTotal($bulkID)
    {

        $sqlQuery = 'SELECT bp.pk_adv_noncom_id,bp.fk_es_id,bp.advance_amount,bp.payment_type,bp.date,bp.discount,( SELECT SUM(est.grand_total) FROM erp_estimate_noncomm est WHERE FIND_IN_SET(est.PK_ES_ID, bp.fk_es_id) > 0  ) as ordertotal,( SELECT SUM(ad.advance_amount) FROM erp_advance_noncomm ad WHERE FIND_IN_SET(ad.fk_es_id, bp.fk_es_id) > 0  ) as advancetotal   FROM ' . BULK_PAYMENT_NONCOMM . ' bp  where  pk_adv_noncom_id = ' . $bulkID . ' ';

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $resultval = mysqli_num_rows($result);
        $data = array();
        if ($resultval > 0) {
            $data = $result;
        }
        return $data;
    }



    public function listCommEODReport()
    {




        $sqlQuery = 'SELECT est.PK_ES_ID, (est.grand_total) as totalAmt,est.sono, est.sale_date,est.order_status,est.delivery_date,cm.cus_name,cm.pk_cus_id,(SELECT GROUP_CONCAT(adv.advance_amount) FROM erp_advance_comm adv where adv.fk_es_id = est.PK_ES_ID ) as advamount ,(SELECT GROUP_CONCAT( CASE WHEN adv.type = 0 THEN DATE_FORMAT(adv.date, "%d-%m-%Y") WHEN adv.type = 1 THEN DATE_FORMAT(adv.date, "%d-%m-%Y") ELSE "nill" END, CASE WHEN adv.type = 0 THEN " - Advance" WHEN adv.type = 1 THEN " - Bill Receipts" ELSE "nill" END) FROM erp_advance_comm adv where adv.fk_es_id = est.PK_ES_ID ) as advdatetype, (SELECT DATE_FORMAT(date, "%d-%m-%Y") AS bulkdate  FROM erp_advance_bill_comm adv where FIND_IN_SET( est.PK_ES_ID, adv.fk_es_id) ) as bulkdate   FROM erp_estimate_comm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  ';


        //$cusid = ( $_POST[ 'txt_customer_name' ] ) ? 'AND  est.customer_id = ' . $_POST[ 'txt_customer_name' ] . '' : '';

        $fdate = str_replace('/', '-', $_POST['Date']);
        $Dateval = date('Y-m-d', strtotime($fdate));

        $sqlQueryadvbill = 'SELECT CASE WHEN GROUP_CONCAT(advbill.fk_es_id) > 0 THEN GROUP_CONCAT(advbill.fk_es_id) ELSE 0 END AS es_id FROM erp_advance_comm  advbill where DATE_FORMAT(advbill.date, "%Y-%m-%d")="' . $Dateval . '"';

        $getadvbill = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryadvbill);
        $getadvbillres = mysqli_fetch_assoc($getadvbill);




        $sqlQuerybulk = 'SELECT bp.fk_es_id as esid FROM  erp_advance_bill_comm bp  WHERE  DATE_FORMAT(bp.date, "%Y-%m-%d")="' . $Dateval . '"';
        $getbulk = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuerybulk);
        $getbulkresval['esid'] = 0;
        if (mysqli_num_rows($getbulk) > 0) {
            $getbulkres = mysqli_fetch_assoc($getbulk);
            $getbulkresval['esid']  = $getbulkres['esid'];
        }



        $resultbulkadbill = implode(",", array_unique(array_merge(explode(",", $getadvbillres['es_id']), explode(",", $getbulkresval['esid']))));

        //  $Dateval = date( 'Y-m-d', strtotime( $_POST[ 'Date' ] ) );


        if (!empty($_POST['search']['value'])) {

            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            //$sqlQuery .= ' where (est.visibility=1    AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") = "' . $Dateval . '" )'; 
            $sqlQuery .= ' where (est.visibility=1    AND est.PK_ES_ID IN( ' . $resultbulkadbill . ') )';

            /*
 
        if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {
 
            $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );
 
            $sqlQuery .= ' where (est.visibility=1  '.$cusid.')';
            */

            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

            //  $sqlQuery .= 'where est.visibility=1   AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") = "' . $Dateval . '" ';
            $sqlQuery .= 'where est.visibility=1    AND est.PK_ES_ID IN( ' . $resultbulkadbill . ')';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID  ORDER BY est.sono, est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //var_dump( $sqlQuery );


        //$allRecords = mysqli_num_rows( $stmtTotal );



        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_comm where visibility=1  AND PK_ES_ID IN( ' . $resultbulkadbill . ')');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $advance = $this->getReceiptsadvwithdate($record['PK_ES_ID'], 0, 'erp_advance_comm', $Dateval);

            $receipts = $this->getReceiptsrecwithdate($record['PK_ES_ID'], 1, 'erp_advance_comm', $Dateval);

            //var_dump($advance['samedate']);
            //var_dump($advance['anotherdate']);

            $bulkPay = $this->getbulkPaymentwithdate($record['PK_ES_ID'], 'erp_estimate_comm', 'erp_advance_bill_comm', $Dateval);

            $outTotal = $record['totalAmt'] - (($receipts['samedate'] + $receipts['anotherdate']) + ($advance['samedate'] + $advance['anotherdate']));
            $bulkamt = $outTotal;
            $bulkPaytot =    $bulkPay['samedate'] + $bulkPay['anotherdate'];
            if ($outTotal > 0 && $bulkPaytot > 0) {
                $bulkamt = floatval(0);
            }


            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            /* advamount
            advdate
            advtype*/
            $bulkdate = ($record['bulkdate']) ? '<br/>' . $record['bulkdate'] . ' -  Bulk Receipts' : '';
            $rows[] = $record['advdatetype'] . ' ' . $bulkdate;
            // $rows[] = date( 'd-m-Y', strtotime( $record[ 'sale_date' ] ) );

            $rows[] = ucfirst($record['sono']);


            $rows[] = $record['cus_name'];

            $rows[] = number_format($record['totalAmt'], 2);

            $rows[] =    ($advance['samedate'] != 0 || $advance['anotherdate']) ? '<span class="bg-success">' . $advance['samedate'] . '</span> + <span class="error">(' . $advance['anotherdate'] . ') </span> = ' . $advance['samedate'] + $advance['anotherdate'] : 0;

            // $rows[] =  $receipts;
            //   $rows[] =    $receipts['samedate'].'-'.$receipts['anotherdate'];
            $rows[] =    ($receipts['samedate'] != 0 || $receipts['anotherdate']) ? '<span class="error">' . $receipts['samedate'] . '</span> + <span class="error">(' . $receipts['anotherdate'] . ') </span> = ' . $receipts['samedate'] + $receipts['anotherdate'] : 0;

            $rows[] =   ($bulkPay['samedate'] != 0 || $bulkPay['anotherdate']) ? '<span class="error">' . $bulkPay['samedate'] . '</span> + <span class="error">(' . $bulkPay['anotherdate'] . ') </span> = ' . $bulkPay['samedate'] + $bulkPay['anotherdate'] : 0;


            //$rows[] = 0;
            // $rows[] = 0;
            //$rows[] =  $bulkPay['samedate'].'-'.$bulkPay['anotherdate'];

            $rows[] =  number_format($bulkamt, 2);


            $records[] = $rows;

            $i++;
        }
        //var_dump( $records);
        //exit;
        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listNonCommEODReport()
    {





        $sqlQuery = 'SELECT est.PK_ES_ID, (est.grand_total) as totalAmt,est.sono, est.sale_date,est.order_status,est.delivery_date,cm.cus_name,cm.pk_cus_id,(SELECT GROUP_CONCAT(adv.advance_amount) FROM erp_advance_noncomm adv where adv.fk_es_id = est.PK_ES_ID ) as advamount ,(SELECT GROUP_CONCAT( CASE WHEN adv.type = 0 THEN DATE_FORMAT(adv.date, "%d-%m-%Y") WHEN adv.type = 1 THEN DATE_FORMAT(adv.date, "%d-%m-%Y") ELSE "nill" END, CASE WHEN adv.type = 0 THEN " - Advance" WHEN adv.type = 1 THEN " - Bill Receipts" ELSE "nill" END) FROM erp_advance_noncomm adv where adv.fk_es_id = est.PK_ES_ID ) as advdatetype, (SELECT DATE_FORMAT(date, "%d-%m-%Y") AS bulkdate  FROM erp_advance_bill_noncomm adv where FIND_IN_SET( est.PK_ES_ID, adv.fk_es_id) ) as bulkdate   FROM erp_estimate_noncomm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  ';


        //$cusid = ( $_POST[ 'txt_customer_name' ] ) ? 'AND  est.customer_id = ' . $_POST[ 'txt_customer_name' ] . '' : '';

        $fdate = str_replace('/', '-', $_POST['Date']);
        $Dateval = date('Y-m-d', strtotime($fdate));

        $sqlQueryadvbill = 'SELECT CASE WHEN GROUP_CONCAT(advbill.fk_es_id) > 0 THEN GROUP_CONCAT(advbill.fk_es_id) ELSE 0 END AS es_id FROM erp_advance_noncomm  advbill where DATE_FORMAT(advbill.date, "%Y-%m-%d")="' . $Dateval . '"';

        $getadvbill = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryadvbill);
        $getadvbillres = mysqli_fetch_assoc($getadvbill);




        $sqlQuerybulk = 'SELECT bp.fk_es_id as esid FROM  erp_advance_bill_noncomm bp  WHERE  DATE_FORMAT(bp.date, "%Y-%m-%d")="' . $Dateval . '"';
        $getbulk = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuerybulk);
        $getbulkresval['esid'] = 0;
        if (mysqli_num_rows($getbulk) > 0) {
            $getbulkres = mysqli_fetch_assoc($getbulk);
            $getbulkresval['esid']  = $getbulkres['esid'];
        }



        $resultbulkadbill = implode(",", array_unique(array_merge(explode(",", $getadvbillres['es_id']), explode(",", $getbulkresval['esid']))));

        //  $Dateval = date( 'Y-m-d', strtotime( $_POST[ 'Date' ] ) );


        if (!empty($_POST['search']['value'])) {

            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            //$sqlQuery .= ' where (est.visibility=1    AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") = "' . $Dateval . '" )'; 
            $sqlQuery .= ' where (est.visibility=1    AND est.PK_ES_ID IN( ' . $resultbulkadbill . ') )';

            /*

       if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {

           $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );

           $sqlQuery .= ' where (est.visibility=1  '.$cusid.')';
           */

            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

            //  $sqlQuery .= 'where est.visibility=1   AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") = "' . $Dateval . '" ';
            $sqlQuery .= 'where est.visibility=1    AND est.PK_ES_ID IN( ' . $resultbulkadbill . ')';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID  ORDER BY est.sono, est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //var_dump( $sqlQuery );


        //$allRecords = mysqli_num_rows( $stmtTotal );



        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_noncomm where visibility=1  AND PK_ES_ID IN( ' . $resultbulkadbill . ')');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $advance = $this->getReceiptsadvwithdate($record['PK_ES_ID'], 0, 'erp_advance_noncomm', $Dateval);

            $receipts = $this->getReceiptsrecwithdate($record['PK_ES_ID'], 1, 'erp_advance_noncomm', $Dateval);

            //var_dump($advance['samedate']);
            //var_dump($advance['anotherdate']);

            $bulkPay = $this->getbulkPaymentwithdate($record['PK_ES_ID'], 'erp_estimate_noncomm', 'erp_advance_bill_noncomm', $Dateval);

            $outTotal = $record['totalAmt'] - (($receipts['samedate'] + $receipts['anotherdate']) + ($advance['samedate'] + $advance['anotherdate']));
            $bulkamt = $outTotal;
            $bulkPaytot =    $bulkPay['samedate'] + $bulkPay['anotherdate'];
            if ($outTotal > 0 && $bulkPaytot > 0) {
                $bulkamt = floatval(0);
            }


            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            /* advamount
           advdate
           advtype*/
            $bulkdate = ($record['bulkdate']) ? '<br/>' . $record['bulkdate'] . ' -  Bulk Receipts' : '';
            $rows[] = $record['advdatetype'] . ' ' . $bulkdate;
            // $rows[] = date( 'd-m-Y', strtotime( $record[ 'sale_date' ] ) );

            $rows[] = ucfirst($record['sono']);


            $rows[] = $record['cus_name'];

            $rows[] = number_format($record['totalAmt'], 2);

            $rows[] =    ($advance['samedate'] != 0 || $advance['anotherdate']) ? $advance['samedate'] . ' + <span class="error">(' . $advance['anotherdate'] . ') </span> = ' . $advance['samedate'] + $advance['anotherdate'] : 0;

            // $rows[] =  $receipts;
            //   $rows[] =    $receipts['samedate'].'-'.$receipts['anotherdate'];
            $rows[] =    ($receipts['samedate'] != 0 || $receipts['anotherdate']) ? $receipts['samedate'] . ' + <span class="error">(' . $receipts['anotherdate'] . ') </span> = ' . $receipts['samedate'] + $receipts['anotherdate'] : 0;

            $rows[] =   ($bulkPay['samedate'] != 0 || $bulkPay['anotherdate']) ? $bulkPay['samedate'] . ' + <span class="error">(' . $bulkPay['anotherdate'] . ') </span> = ' . $bulkPay['samedate'] + $bulkPay['anotherdate'] : 0;


            //$rows[] = 0;
            // $rows[] = 0;
            //$rows[] =  $bulkPay['samedate'].'-'.$bulkPay['anotherdate'];

            $rows[] =  number_format($bulkamt, 2);


            $records[] = $rows;

            $i++;
        }
        //var_dump( $records);
        //exit;
        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function getbulkPayment($esID, $tableName, $bulTable)

    {

        //implode(",",$esID);

        $query = "SELECT ( SELECT est.grand_total  FROM " . $tableName . " est WHERE est.PK_ES_ID= " . $esID . ") as grand_total 
   
     FROM " . $bulTable . " bp  WHERE  FIND_IN_SET(" . $esID . ", bp.fk_es_id) > 0";



        //  $query = "SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=" . $cusID ;

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



        $returnValue = '0';

        $estimatecomm = array();

        if (mysqli_num_rows($result) > 0) {

            $counter = 1;

            while ($data = mysqli_fetch_array($result)) {



                $returnValue = $data['grand_total'];
            }
        }



        return $returnValue;
    }

    public function getbulkPaymentwithdate($esID, $tableName, $bulTable, $filterdate)

    {

        //implode(",",$esID);

        $query = "SELECT ( SELECT est.grand_total  FROM " . $tableName . " est WHERE est.PK_ES_ID= " . $esID . ") as grand_total , date
   
     FROM " . $bulTable . " bp  WHERE  FIND_IN_SET(" . $esID . ", bp.fk_es_id) > 0";



        //  $query = "SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=" . $cusID ;

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);




        $returnValue['samedate'] = '0';
        $returnValue['anotherdate'] = '0';


        if (mysqli_num_rows($result) > 0) {


            while ($data = mysqli_fetch_array($result)) {

                if ($filterdate == $data['date']) {
                    $returnValue['samedate'] += $data['grand_total'];
                } else {
                    $returnValue['anotherdate'] += $data['grand_total'];
                }
            }
        }





        return $returnValue;
    }


    public function listCommOutstandingReceiptsReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID, (est.grand_total) as totalAmt,est.sono, est.sale_date,est.order_status,f.cat_name,est.delivery_date,est.bill_paid,cm.cus_name  FROM erp_estimate_comm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id  LEFT JOIN erp_category as f ON est.franchise=f.pk_cat_id  ';




        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        $cusid = ($_POST['txt_customer_name']) ? 'AND  cm.cus_name = "' . $_POST['txt_customer_name'] . '"' : '';
        $fransid = ($_POST['txt_franchise_name']) ? 'AND  f.cat_name = "' . $_POST['txt_franchise_name'] . '"' : '';

        //$Dateval = date( 'Y-m-d', strtotime( $_POST[ 'Date' ] ) );


        if (!empty($_POST['search']['value'])) {

            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= ' where (est.visibility=1  AND  est.bill_paid = 0 ' . $cusid . ' ' . $fransid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"   AND (est.grand_total)  > (SELECT CASE WHEN (sum(ad.advance_amount)) THEN sum(ad.advance_amount) ELSE 0 END as advance FROM erp_advance_comm where fk_es_id=est.PK_ES_ID)   )';


            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';


            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

            $sqlQuery .= 'where est.visibility=1 AND  est.bill_paid = 0   ' . $cusid . ' ' . $fransid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"  AND (est.grand_total)  > (SELECT CASE WHEN (sum(ad.advance_amount)) THEN sum(ad.advance_amount) ELSE 0 END as advance FROM erp_advance_comm ad where ad.fk_es_id=est.PK_ES_ID)  ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID  ORDER BY est.sono, est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }


        //echo  $sqlQuery;

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_comm  est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN erp_category as f ON est.franchise=f.pk_cat_id  where est.visibility=1 AND  est.bill_paid = 0 ' . $cusid . ' ' . $fransid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"  AND (est.grand_total)  > (SELECT CASE WHEN (sum(ad.advance_amount)) THEN sum(ad.advance_amount) ELSE 0 END as advance FROM erp_advance_comm ad where ad.fk_es_id=est.PK_ES_ID)  ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {


            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

            $bulkPay = $this->getbulkPayment($record['PK_ES_ID'], 'erp_estimate_comm', 'erp_advance_bill_comm');

            $outTotal = $record['totalAmt'] - ($receipts + $advance);
            $bulkamt = $outTotal;
            $order_status = '';
            switch ($record["order_status"]) {
                case 0:
                    $order_status = "Yet to Start";

                    break;

                case 1:
                    $order_status =  "Designing";

                    break;

                case 2:
                    $order_status =  "Printing";

                    break;

                case 3:
                    $order_status =  "Lamination";

                    break;

                case 4:
                    $order_status =  "Finishing";

                    break;

                case 5:
                    $order_status =  "Ready for Delivery";

                    break;

                case 6:
                    $order_status =  "Delivered";

                    break;

                default:
                    $order_status =  "Yet to Start";
            }

            if ($outTotal > 0 && $bulkPay > 0) {
                $bulkamt = floatval(0);
            }


            $rows = array();


            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);
            $rows[] = ucfirst($record['cus_name']);
            $rows[] = ucfirst($record['cat_name']);

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));



            //$rows[] = $record['cus_name'];

            $rows[] = number_format($record['totalAmt'], 2);

            $rows[] = isset($advance) ? number_format($advance, 2) : '';

            $rows[] = isset($receipts) ? number_format($receipts, 2) : '';


            $rows[] = isset($bulkpay) ? number_format($bulkPay, 2) : '';

            $rows[] = isset($bulkamt) ? number_format($bulkamt, 2) : '';
            $rows[] =  '<span class="btn btn-primary  btn-sm">' . $order_status . '</span>';


            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listNonCommOutstandingReceiptsReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID, (est.grand_total) as totalAmt,est.sono, est.sale_date,est.order_status,f.cat_name,est.delivery_date,est.bill_paid,cm.cus_name  FROM erp_estimate_noncomm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN erp_category as f ON est.franchise=f.pk_cat_id  ';


        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        $cusid = ($_POST['txt_customer_name']) ? 'AND  cm.cus_name = "' . $_POST['txt_customer_name'] . '"' : '';
        $fransid = ($_POST['txt_franchise_name']) ? 'AND  f.cat_name = "' . $_POST['txt_franchise_name'] . '"' : '';

        if (!empty($_POST['search']['value'])) {

            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= 'where est.visibility=1  AND   est.bill_paid = 0 ' . $cusid . ' ' . $fransid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"    AND (est.grand_total) > (SELECT CASE WHEN (sum(ad.advance_amount)) THEN sum(ad.advance_amount) ELSE 0 END as advance FROM erp_advance_noncomm ad where ad.fk_es_id=est.PK_ES_ID)  ';
            //    $sqlQuery .= ' where (est.visibility=1  ' . $cusid . '   )';

            /*

       if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {

           $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );

           $sqlQuery .= ' where (est.visibility=1  '.$cusid.')';
           */

            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

            //  $sqlQuery .= 'where est.visibility=1 ' . $cusid . ' ';
            $sqlQuery .= 'where est.visibility=1 AND   est.bill_paid = 0  ' . $cusid . ' ' . $fransid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"  AND (est.grand_total)  > (SELECT CASE WHEN (sum(ad.advance_amount)) THEN sum(ad.advance_amount) ELSE 0 END as advance FROM erp_advance_noncomm ad where ad.fk_es_id=est.PK_ES_ID)  ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID  ORDER BY est.sono, est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        // var_dump( $sqlQuery );

        //exit;

        //echo  $sqlQuery;

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_noncomm est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN erp_category as f ON est.franchise=f.pk_cat_id  where est.visibility=1  AND   est.bill_paid = 0 ' . $cusid . ' ' . $fransid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"   AND (est.grand_total) > (SELECT CASE WHEN (sum(ad.advance_amount)) THEN sum(ad.advance_amount) ELSE 0 END as advance FROM erp_advance_noncomm  ad where ad.fk_es_id=est.PK_ES_ID) ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);


        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_noncomm');

            $bulkPay = $this->getbulkPayment($record['PK_ES_ID'], 'erp_estimate_noncomm', 'erp_advance_bill_noncomm');

            $outTotal = $record['totalAmt'] - ($receipts + $advance);
            $bulkamt = $outTotal;

            if ($outTotal > 0 && $bulkPay > 0) {
                $bulkamt = floatval(0);
            }
            $order_status = '';
            switch ($record["order_status"]) {
                case 0:
                    $order_status = "Yet to Start";

                    break;

                case 1:
                    $order_status =  "Designing";

                    break;

                case 2:
                    $order_status =  "Printing";

                    break;

                case 3:
                    $order_status =  "Lamination";

                    break;

                case 4:
                    $order_status =  "Finishing";

                    break;

                case 5:
                    $order_status =  "Ready for Delivery";

                    break;

                case 6:
                    $order_status =  "Delivered";

                    break;

                default:
                    $order_status =  "Yet to Start";
            }


            $rows = array();


            $rows[] = $_POST['start'] + $i;
            $rows[] = ucfirst($record['sono']);
            $rows[] = ucfirst($record['cus_name']);
            $rows[] = ucfirst($record['cat_name']);
            $rows[] = date('d-m-Y', strtotime($record['sale_date']));
            //$rows[] = $record['cus_name'];

            $rows[] = number_format($record['totalAmt'], 2);

            $rows[] = isset($advance) ? number_format($advance, 2) : '';

            $rows[] = isset($receipts) ? number_format($receipts, 2) : '';


            $rows[] = isset($bulkpay) ? number_format($bulkPay, 2) : '';

            $rows[] = isset($bulkamt) ? number_format($bulkamt, 2) : '';
            $rows[] =  '<span class="btn btn-primary  btn-sm">' . $order_status . '</span>';


            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }
    public function getCategoryListing()
    {

        $txt_items_name = array_filter($_POST['parent_id']);
        $itemsnamequery = (!empty($txt_items_name)) ? ' AND  parent_id IN (' . implode(',', $txt_items_name) . ') ' : "  ";

        $query = "SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price,parent_id FROM " . ITEMS . " WHERE visibility= 1 AND type=" . $_POST['typesid'] . " and item_type = " . $_POST['itemtypeId'] . " " . $itemsnamequery . "    ORDER BY fk_item_id ASC";
        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $res;
    }



    public function listCommGlobalSearchReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID, (est.grand_total) as totalAmt,est.sono, est.sale_date,est.order_status,est.delivery_date,est.bill_paid,cm.cus_name,cm.cus_code ,est.payment_type,f.cat_name FROM erp_estimate_comm as est LEFT JOIN ' . CUSTOMER . ' as cm ON est.customer_id=cm.pk_cus_id  LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise  ';



        $searchfilter = "";

        if ($_POST['txt_fields']  &&  $_POST['txt_condition']  &&   ($_POST['txt_search']  || $_POST['txt_search'] == 0)) {


            $txt_search = ' = 0';
            if ($_POST['txt_condition'] ==  'LIKE') {
                $txt_search = ' LIKE "%' . trim($_POST['txt_search']) . '%"';
            } else if ($_POST['txt_condition'] ==  'EQUAL') {
                $txt_search = ' = "' . trim($_POST['txt_search']) . '"';
            } else if ($_POST['txt_condition'] ==  'IN') {
                $txt_searchstrrep =  "'" . str_replace(",", "','", trim($_POST["txt_search"])) . "'";
                $txt_search = ' IN( ' . $txt_searchstrrep .  ')';
            } else if ($_POST['txt_condition'] ==  'NOT IN') {
                $txt_searchstrrep =  "'" . str_replace(",", "','", trim($_POST["txt_search"])) . "'";
                $txt_search = 'NOT IN( ' . $txt_searchstrrep .  ')';
            } else if ($_POST['txt_condition'] ==  'NOT EQUAL') {
                $txt_search = ' != "' . trim($_POST['txt_search']) . '"';
            }
            $searchfilter = 'AND  ' . $_POST['txt_fields'] . ' ' . $txt_search  . '';
        }

        $fdate = str_replace('/', '-', $_POST['fromDate']);
        $fromDate = date('Y-m-d', strtotime($fdate));
        $tdate = str_replace('/', '-', $_POST['toDate']);
        $toDate = date('Y-m-d', strtotime($tdate));

        if (!empty($_POST['search']['value'])) {

            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= 'where est.visibility=1  AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDate . '" AND "' . $toDate . '" ' . $searchfilter . '  ';


            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

            $sqlQuery .= 'where est.visibility=1  AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDate . '" AND "' . $toDate . '" ' . $searchfilter . '  ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID  ORDER BY est.sono, est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }


        //echo  $sqlQuery;

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_comm as est LEFT JOIN ' . CUSTOMER . ' as cm ON est.customer_id=cm.pk_cus_id where est.visibility=1 AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDate . '" AND "' . $toDate . '"     ' . $searchfilter . ' ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {
            $paymenttype = '';

            if ($record['payment_type'] == 1) {
                $paymenttype = 'Cash';
            } else if ($record['payment_type'] == 2) {
                $paymenttype = 'Credit';
            }

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

            $bulkPay = $this->getbulkPayment($record['PK_ES_ID'], 'erp_estimate_comm', 'erp_advance_bill_comm');

            $outTotal = $record['totalAmt'] - ($receipts + $advance);
            $bulkamt = $outTotal;
            $order_status = '';
            switch ($record["order_status"]) {
                case 0:
                    $order_status = "Yet to Start";

                    break;

                case 1:
                    $order_status =  "Designing";

                    break;

                case 2:
                    $order_status =  "Printing";

                    break;

                case 3:
                    $order_status =  "Lamination";

                    break;

                case 4:
                    $order_status =  "Finishing";

                    break;

                case 5:
                    $order_status =  "Ready for Delivery";

                    break;

                case 6:
                    $order_status =  "Delivered";

                    break;

                default:
                    $order_status =  "Yet to Start";
            }

            if ($outTotal > 0 && $bulkPay > 0) {
                $bulkamt = floatval(0);
            }

            $paid_status = "";
            if ($bulkamt <= 0 || $record['bill_paid'] == 1) {
                $paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
            } else {
                $paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
            }


            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name ,sqp.orientation FROM " . ESTIMATE_COMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows = array();


            $rows[] = $_POST['start'] + $i;

            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);
            $rows[] = $record['cus_name'];
            $rows[] = $record['cus_code'];

            // $rows[] = $itemorient;

            $rows[] = $record['cat_name'];


            $rows[] = number_format($record['totalAmt'], 2);

            $rows[] = isset($advance) ? number_format($advance, 2) : '';

            $rows[] = isset($receipts) ? number_format($receipts, 2) : '';


            $rows[] = isset($bulkPay) ? number_format($bulkPay, 2) : '';

            $rows[] = isset($bulkamt) ?  number_format($bulkamt, 2) : '';
            $rows[] =  '<span class="btn btn-primary  btn-sm">' . $order_status . '</span>';
            $rows[] =  $paid_status;


            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function listNonCommGlobalSearchReport()
    {

        $sqlQuery = 'SELECT est.PK_ES_ID, (est.grand_total) as totalAmt,est.sono, est.sale_date,est.order_status,est.delivery_date,est.bill_paid,cm.cus_name,cm.cus_code ,est.payment_type,f.cat_name  FROM erp_estimate_noncomm as est LEFT JOIN ' . CUSTOMER . ' as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN erp_category f ON f.pk_cat_id= est.franchise  ';

        $searchfilter = "";

        if ($_POST['txt_fields']  &&  $_POST['txt_condition']  &&   ($_POST['txt_search']  || $_POST['txt_search'] == 0)) {


            $txt_search = ' = 0';
            if ($_POST['txt_condition'] ==  'LIKE') {
                $txt_search = ' LIKE "%' . trim($_POST['txt_search']) . '%"';
            } else if ($_POST['txt_condition'] ==  'EQUAL') {
                $txt_search = ' = "' . trim($_POST['txt_search']) . '"';
            } else if ($_POST['txt_condition'] ==  'IN') {
                $txt_searchstrrep =  "'" . str_replace(",", "','", trim($_POST["txt_search"])) . "'";
                $txt_search = ' IN( ' . $txt_searchstrrep .  ')';
            } else if ($_POST['txt_condition'] ==  'NOT IN') {
                $txt_searchstrrep =  "'" . str_replace(",", "','", trim($_POST["txt_search"])) . "'";
                $txt_search = 'NOT IN( ' . $txt_searchstrrep .  ')';
            } else if ($_POST['txt_condition'] ==  'NOT EQUAL') {
                $txt_search = ' != "' . trim($_POST['txt_search']) . '"';
            }
            $searchfilter = 'AND  ' . $_POST['txt_fields'] . ' ' . $txt_search  . '';
        }

        $fdate = str_replace('/', '-', $_POST['fromDate']);
        $fromDate = date('Y-m-d', strtotime($fdate));
        $tdate = str_replace('/', '-', $_POST['toDate']);
        $toDate = date('Y-m-d', strtotime($tdate));
        //$Dateval = date( 'Y-m-d', strtotime( $_POST[ 'Date' ] ) );


        if (!empty($_POST['search']['value'])) {

            $paymentval = $_POST['search']['value'];
            if (strtolower(trim($_POST['search']['value'])) == 'cash') {
                $paymentval = 1;
            } else  if (strtolower(trim($_POST['search']['value'])) == 'credit') {
                $paymentval = 2;
            }

            $searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));

            $sqlQuery .= 'where est.visibility=1  AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDate . '" AND "' . $toDate . '" ' . $searchfilter . '  ';
            //    $sqlQuery .= ' where (est.visibility=1  ' . $cusid . '   )';

            /*

        if ( !empty( $_POST[ 'search' ][ 'value' ] ) ) {

            $searchdate = date( 'Y-m-d', strtotime( trim( $_POST[ 'search' ][ 'value' ] ) ) );

            $sqlQuery .= ' where (est.visibility=1  '.$cusid.')';
            */

            $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

            $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';

            $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
        } else {

            //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

            //  $sqlQuery .= 'where est.visibility=1 ' . $cusid . ' ';
            $sqlQuery .= 'where est.visibility=1 AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDate . '" AND "' . $toDate . '"    ' . $searchfilter . ' ';
        }

        if (!empty($_POST['order'])) {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= 'GROUP BY  est.PK_ES_ID  ORDER BY est.sono, est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);

        if ($_POST['length'] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        // var_dump( $sqlQuery );

        // exit;

        //echo  $sqlQuery;

        $stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);


        $stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_noncomm as est LEFT JOIN ' . CUSTOMER . ' as cm ON est.customer_id=cm.pk_cus_id where est.visibility=1 AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDate . '" AND "' . $toDate . '"     ' . $searchfilter . ' ');

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_noncomm');

            $bulkPay = $this->getbulkPayment($record['PK_ES_ID'], 'erp_estimate_noncomm', 'erp_advance_bill_noncomm');

            $outTotal = $record['totalAmt'] - ($receipts + $advance);
            $bulkamt = $outTotal;

            if ($outTotal > 0 && $bulkPay > 0) {
                $bulkamt = floatval(0);
            }

            $paid_status = "";
            if ($bulkamt <= 0 || $record['bill_paid'] == 1) {
                $paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
            } else {
                $paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
            }
            $order_status = '';
            switch ($record["order_status"]) {
                case 0:
                    $order_status = "Yet to Start";

                    break;

                case 1:
                    $order_status =  "Designing";

                    break;

                case 2:
                    $order_status =  "Printing";

                    break;

                case 3:
                    $order_status =  "Lamination";

                    break;

                case 4:
                    $order_status =  "Finishing";

                    break;

                case 5:
                    $order_status =  "Ready for Delivery";

                    break;

                case 6:
                    $order_status =  "Delivered";

                    break;

                default:
                    $order_status =  "Yet to Start";
            }


            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name ,sqp.orientation FROM " . ESTIMATE_NONCOMM_PRO . ' sqp LEFT JOIN ' . ITEMS . ' its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ' . TYPES . ' ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ' . $record['PK_ES_ID'] . '';

            $resultprod = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = '';

            $itemorient = '';

            if ($allcountprod > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = '';

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }
            $rows = array();


            $rows[] = $_POST['start'] + $i;
            $rows[] = date('d-m-Y', strtotime($record['sale_date']));

            $rows[] = ucfirst($record['sono']);
            $rows[] = $record['cus_name'];
            $rows[] = $record['cus_code'];
            //   $rows[] = $itemorient;

            $rows[] = $record['cat_name'];

            $rows[] = number_format($record['totalAmt'], 2);

            $rows[] = number_format($advance, 2);

            $rows[] =  number_format($receipts, 2);


            $rows[] = number_format($bulkPay, 2);

            $rows[] =  number_format($bulkamt, 2);
            $rows[] =  '<span class="btn btn-primary  btn-sm">' . $order_status . '</span>';
            $rows[] =  $paid_status;


            $records[] = $rows;

            $i++;
        }

        $output = array(

            'draw' => intval($_POST['draw']),

            'recordsTotal' => $allRecords,

            'recordsFiltered' => $displayRecords,

            'data' => $records,

        );

        echo json_encode($output);
    }

    public function getCommAllTotalAmount()
    {

        $fdate = str_replace('/', '-', $_POST['Date']);
        $Dateval = date('Y-m-d', strtotime($fdate));


        $sqlQueryadvbill = 'SELECT CASE WHEN GROUP_CONCAT(advbill.fk_es_id) > 0 THEN GROUP_CONCAT(advbill.fk_es_id) ELSE 0 END AS es_id FROM erp_advance_comm  advbill where DATE_FORMAT(advbill.date, "%Y-%m-%d")="' . $Dateval . '"';

        $getadvbill = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryadvbill);
        $getadvbillres = mysqli_fetch_assoc($getadvbill);



        $sqlQuerybulk = 'SELECT bp.fk_es_id as esid FROM  erp_advance_bill_comm bp  WHERE  DATE_FORMAT(bp.date, "%Y-%m-%d")="' . $Dateval . '"';
        $getbulk = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuerybulk);

        $getbulkresval['esid'] = 0;

        if (mysqli_num_rows($getbulk) > 0) {
            $getbulkres = mysqli_fetch_assoc($getbulk);
            $getbulkresval['esid']  = $getbulkres['esid'];
        }




        $resultbulkadbill = implode(",", array_unique(array_merge(explode(",", $getadvbillres['es_id']), explode(",", $getbulkresval['esid']))));



        $query = 'SELECT est.grand_total as grand_total,est.PK_ES_ID FROM erp_estimate_comm est LEFT JOIN ' . CUSTOMER . ' as cm ON est.customer_id=cm.pk_cus_id  ';
        if (!empty($_POST['searchdata'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['searchdata'])));


            $query .= ' where (est.visibility=1   AND est.PK_ES_ID IN( ' . $resultbulkadbill . ') ';

            $query .= 'AND ( est.sono LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR DATE_FORMAT(est.sale_date, "%Y-%m-%d") LIKE "%' . $searchdate . '%" ';

            $query .= ' OR cm.cus_name LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR est.grand_total LIKE "%' . trim($_POST['searchdata']) . '%") ';
        } else {


            $query .= 'where est.visibility=1    AND est.PK_ES_ID IN( ' . $resultbulkadbill . ')  ';
        }

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        $returnValue = '0';

        $rows = array('total' => 0, 'advance' => 0, 'receipts' => 0, 'bulkpay' => 0, 'bulkamt' => 0);

        if (mysqli_num_rows($result) > 0) {

            while ($data = mysqli_fetch_array($result)) {

                $advance = $this->getReceiptsadv($data['PK_ES_ID'], 0, 'erp_advance_comm');

                $receipts = $this->getReceiptsrec($data['PK_ES_ID'], 1, 'erp_advance_comm');

                $bulkPay = $this->getbulkPayment($data['PK_ES_ID'], 'erp_estimate_comm', 'erp_advance_bill_comm');

                $outTotal = $data['grand_total'] - ($receipts + $advance);
                $bulkamt = $outTotal;

                if ($outTotal > 0 && $bulkPay > 0) {
                    $bulkamt = floatval(0);
                }

                $rows['total'] += $data['grand_total'];

                $rows['advance'] += $advance;

                $rows['receipts'] +=  $receipts;


                $rows['bulkpay'] +=  $bulkPay;

                $rows['bulkamt'] +=  $bulkamt;
            }
        }


        $rowsval['total'] = number_format($rows['total'], 2);
        $rowsval['advance'] = number_format($rows['advance'], 2);
        $rowsval['receipts'] = number_format($rows['receipts'], 2);
        $rowsval['bulkpay'] = number_format($rows['bulkpay'], 2);
        $rowsval['bulkamt'] = number_format($rows['bulkamt'], 2);
        echo json_encode($rowsval);
    }
    public function getNonCommAllTotalAmount()
    {

        $fdate = str_replace('/', '-', $_POST['Date']);
        $Dateval = date('Y-m-d', strtotime($fdate));



        $sqlQueryadvbill = 'SELECT CASE WHEN GROUP_CONCAT(advbill.fk_es_id) > 0 THEN GROUP_CONCAT(advbill.fk_es_id) ELSE 0 END AS es_id FROM erp_advance_noncomm  advbill where DATE_FORMAT(advbill.date, "%Y-%m-%d")="' . $Dateval . '"';

        $getadvbill = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryadvbill);
        $getadvbillres = mysqli_fetch_assoc($getadvbill);



        $sqlQuerybulk = 'SELECT bp.fk_es_id as esid FROM  erp_advance_bill_noncomm bp  WHERE  DATE_FORMAT(bp.date, "%Y-%m-%d")="' . $Dateval . '"';
        $getbulk = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuerybulk);
        $getbulkresval['esid'] = 0;

        if (mysqli_num_rows($getbulk) > 0) {
            $getbulkres = mysqli_fetch_assoc($getbulk);
            $getbulkresval['esid']  = $getbulkres['esid'];
        }




        $resultbulkadbill = implode(",", array_unique(array_merge(explode(",", $getadvbillres['es_id']), explode(",", $getbulkresval['esid']))));


        $query = 'SELECT est.grand_total as grand_total,est.PK_ES_ID FROM erp_estimate_noncomm est LEFT JOIN ' . CUSTOMER . ' as cm ON est.customer_id=cm.pk_cus_id  ';
        if (!empty($_POST['searchdata'])) {
            $searchdate = date('Y-m-d', strtotime(trim($_POST['searchdata'])));

            $query .= ' where (est.visibility=1  AND est.PK_ES_ID IN( ' . $resultbulkadbill . ') ';

            $query .= 'AND ( est.sono LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR DATE_FORMAT(est.sale_date, "%Y-%m-%d") LIKE "%' . $searchdate . '%" ';

            $query .= ' OR cm.cus_name LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR est.grand_total LIKE "%' . trim($_POST['searchdata']) . '%") ';
        } else {


            $query .= 'where est.visibility=1   AND est.PK_ES_ID IN( ' . $resultbulkadbill . ')  ';
        }

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        $returnValue = '0';

        $rows = array('total' => 0, 'advance' => 0, 'receipts' => 0, 'bulkpay' => 0, 'bulkamt' => 0);

        if (mysqli_num_rows($result) > 0) {

            while ($data = mysqli_fetch_array($result)) {

                $advance = $this->getReceiptsadv($data['PK_ES_ID'], 0, 'erp_advance_noncomm');

                $receipts = $this->getReceiptsrec($data['PK_ES_ID'], 1, 'erp_advance_noncomm');

                $bulkPay = $this->getbulkPayment($data['PK_ES_ID'], 'erp_estimate_noncomm', 'erp_advance_bill_noncomm');

                $outTotal = $data['grand_total'] - ($receipts + $advance);
                $bulkamt = $outTotal;

                if ($outTotal > 0 && $bulkPay > 0) {
                    $bulkamt = floatval(0);
                }

                $rows['total'] += $data['grand_total'];

                $rows['advance'] += $advance;

                $rows['receipts'] +=  $receipts;


                $rows['bulkpay'] +=  $bulkPay;

                $rows['bulkamt'] +=  $bulkamt;
            }
        }


        $rowsval['total'] = number_format($rows['total'], 2);
        $rowsval['advance'] = number_format($rows['advance'], 2);
        $rowsval['receipts'] = number_format($rows['receipts'], 2);
        $rowsval['bulkpay'] = number_format($rows['bulkpay'], 2);
        $rowsval['bulkamt'] = number_format($rows['bulkamt'], 2);
        echo json_encode($rowsval);
    }
    public function getCommAllTotalAmountGlobal()
    {



        $query = 'SELECT est.grand_total as grand_total,est.PK_ES_ID FROM erp_estimate_comm est LEFT JOIN ' . CUSTOMER . ' as cm ON est.customer_id=cm.pk_cus_id ';

        $searchfilter = "";

        if ($_POST['txt_fields']  &&  $_POST['txt_condition']  &&   ($_POST['txt_search']  || $_POST['txt_search'] == 0)) {


            $txt_search = ' = 0';
            if ($_POST['txt_condition'] ==  'LIKE') {
                $txt_search = ' LIKE "%' . trim($_POST['txt_search']) . '%"';
            } else if ($_POST['txt_condition'] ==  'EQUAL') {
                $txt_search = ' = "' . trim($_POST['txt_search']) . '"';
            } else if ($_POST['txt_condition'] ==  'IN') {
                $txt_searchstrrep =  "'" . str_replace(",", "','", trim($_POST["txt_search"])) . "'";
                $txt_search = ' IN( ' . $txt_searchstrrep .  ')';
            } else if ($_POST['txt_condition'] ==  'NOT IN') {
                $txt_searchstrrep =  "'" . str_replace(",", "','", trim($_POST["txt_search"])) . "'";
                $txt_search = 'NOT IN( ' . $txt_searchstrrep .  ')';
            } else if ($_POST['txt_condition'] ==  'NOT EQUAL') {
                $txt_search = ' != "' . trim($_POST['txt_search']) . '"';
            }
            $searchfilter = 'AND  ' . $_POST['txt_fields'] . ' ' . $txt_search  . '';
        }



        $fdate = str_replace('/', '-', $_POST['fromDate']);
        $fromDate = date('Y-m-d', strtotime($fdate));
        $tdate = str_replace('/', '-', $_POST['toDate']);
        $toDate = date('Y-m-d', strtotime($tdate));




        if (!empty($_POST['searchdata'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['searchdata'])));

            $query .= ' where (est.visibility=1   AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDate . '" AND "' . $toDate . '" ' . $searchfilter . '  ';

            $query .= 'AND ( est.sono LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR est.sale_date LIKE "%' .  $searchdate  . '%" ';

            $query .= ' OR cm.cus_name LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR est.grand_total LIKE "%' . trim($_POST['searchdata']) . '%") ';
        } else {


            $query .= 'where est.visibility=1  AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDate . '" AND "' . $toDate . '" ' . $searchfilter . '  ';
        }

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        $returnValue = '0';

        $rows = array('total' => 0, 'advance' => 0, 'receipts' => 0, 'bulkpay' => 0, 'bulkamt' => 0);

        if (mysqli_num_rows($result) > 0) {

            while ($data = mysqli_fetch_array($result)) {

                $advance = $this->getReceiptsadv($data['PK_ES_ID'], 0, 'erp_advance_comm');

                $receipts = $this->getReceiptsrec($data['PK_ES_ID'], 1, 'erp_advance_comm');

                $bulkPay = $this->getbulkPayment($data['PK_ES_ID'], 'erp_estimate_comm', 'erp_advance_bill_comm');

                $outTotal = $data['grand_total'] - ($receipts + $advance);
                $bulkamt = $outTotal;

                if ($outTotal > 0 && $bulkPay > 0) {
                    $bulkamt = floatval(0);
                }

                $rows['total'] += $data['grand_total'];

                $rows['advance'] += $advance;

                $rows['receipts'] +=  $receipts;


                $rows['bulkpay'] +=  $bulkPay;

                $rows['bulkamt'] +=  $bulkamt;
            }
        }


        $rowsval['total'] = number_format($rows['total'], 2);
        $rowsval['advance'] = number_format($rows['advance'], 2);
        $rowsval['receipts'] = number_format($rows['receipts'], 2);
        $rowsval['bulkpay'] = number_format($rows['bulkpay'], 2);
        $rowsval['bulkamt'] = number_format($rows['bulkamt'], 2);
        echo json_encode($rowsval);
    }
    public function getNonCommAllTotalAmountGlobal()
    {

        $query = 'SELECT est.grand_total as grand_total,est.PK_ES_ID FROM erp_estimate_noncomm est LEFT JOIN ' . CUSTOMER . ' as cm ON est.customer_id=cm.pk_cus_id ';

        $searchfilter = "";

        if ($_POST['txt_fields']  &&  $_POST['txt_condition']  &&   ($_POST['txt_search']  || $_POST['txt_search'] == 0)) {


            $txt_search = ' = 0';
            if ($_POST['txt_condition'] ==  'LIKE') {
                $txt_search = ' LIKE "%' . trim($_POST['txt_search']) . '%"';
            } else if ($_POST['txt_condition'] ==  'EQUAL') {
                $txt_search = ' = "' . trim($_POST['txt_search']) . '"';
            } else if ($_POST['txt_condition'] ==  'IN') {
                $txt_searchstrrep =  "'" . str_replace(",", "','", trim($_POST["txt_search"])) . "'";
                $txt_search = ' IN( ' . $txt_searchstrrep .  ')';
            } else if ($_POST['txt_condition'] ==  'NOT IN') {
                $txt_searchstrrep =  "'" . str_replace(",", "','", trim($_POST["txt_search"])) . "'";
                $txt_search = 'NOT IN( ' . $txt_searchstrrep .  ')';
            } else if ($_POST['txt_condition'] ==  'NOT EQUAL') {
                $txt_search = ' != "' . trim($_POST['txt_search']) . '"';
            }
            $searchfilter = 'AND  ' . $_POST['txt_fields'] . ' ' . $txt_search  . '';
        }



        $fdate = str_replace('/', '-', $_POST['fromDate']);
        $fromDate = date('Y-m-d', strtotime($fdate));
        $tdate = str_replace('/', '-', $_POST['toDate']);
        $toDate = date('Y-m-d', strtotime($tdate));




        if (!empty($_POST['searchdata'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['searchdata'])));

            $query .= ' where (est.visibility=1   AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDate . '" AND "' . $toDate . '" ' . $searchfilter . '  ';

            $query .= 'AND ( est.sono LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR est.sale_date LIKE "%' .  $searchdate  . '%" ';

            $query .= ' OR cm.cus_name LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR est.grand_total LIKE "%' . trim($_POST['searchdata']) . '%") ';
        } else {


            $query .= 'where est.visibility=1  AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDate . '" AND "' . $toDate . '" ' . $searchfilter . '  ';
        }

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        $returnValue = '0';

        $rows = array('total' => 0, 'advance' => 0, 'receipts' => 0, 'bulkpay' => 0, 'bulkamt' => 0);

        if (mysqli_num_rows($result) > 0) {

            while ($data = mysqli_fetch_array($result)) {

                $advance = $this->getReceiptsadv($data['PK_ES_ID'], 0, 'erp_advance_noncomm');

                $receipts = $this->getReceiptsrec($data['PK_ES_ID'], 1, 'erp_advance_noncomm');

                $bulkPay = $this->getbulkPayment($data['PK_ES_ID'], 'erp_estimate_noncomm', 'erp_advance_bill_noncomm');

                $outTotal = $data['grand_total'] - ($receipts + $advance);
                $bulkamt = $outTotal;

                if ($outTotal > 0 && $bulkPay > 0) {
                    $bulkamt = floatval(0);
                }

                $rows['total'] += $data['grand_total'];

                $rows['advance'] += $advance;

                $rows['receipts'] +=  $receipts;


                $rows['bulkpay'] +=  $bulkPay;

                $rows['bulkamt'] +=  $bulkamt;
            }
        }

        $rowsval['total'] = number_format($rows['total'], 2);
        $rowsval['advance'] = number_format($rows['advance'], 2);
        $rowsval['receipts'] = number_format($rows['receipts'], 2);
        $rowsval['bulkpay'] = number_format($rows['bulkpay'], 2);
        $rowsval['bulkamt'] = number_format($rows['bulkamt'], 2);
        echo json_encode($rowsval);
    }



    public function getCommAllTotalAmountOsr()
    {

        $fdate = str_replace('/', '-', $_POST['Date']);
        $Dateval = date('Y-m-d', strtotime($fdate));


        $sqlQueryadvbill = 'SELECT CASE WHEN GROUP_CONCAT(advbill.fk_es_id) > 0 THEN GROUP_CONCAT(advbill.fk_es_id) ELSE 0 END AS es_id FROM erp_advance_comm  advbill where DATE_FORMAT(advbill.date, "%Y-%m-%d")="' . $Dateval . '"';

        $getadvbill = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryadvbill);
        $getadvbillres = mysqli_fetch_assoc($getadvbill);



        $sqlQuerybulk = 'SELECT bp.fk_es_id as esid FROM  erp_advance_bill_comm bp  WHERE  DATE_FORMAT(bp.date, "%Y-%m-%d")="' . $Dateval . '"';
        $getbulk = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuerybulk);

        $getbulkresval['esid'] = 0;

        if (mysqli_num_rows($getbulk) > 0) {
            $getbulkres = mysqli_fetch_assoc($getbulk);
            $getbulkresval['esid']  = $getbulkres['esid'];
        }




        $resultbulkadbill = implode(",", array_unique(array_merge(explode(",", $getadvbillres['es_id']), explode(",", $getbulkresval['esid']))));



        $query = 'SELECT est.grand_total as grand_total,est.PK_ES_ID FROM erp_estimate_comm est LEFT JOIN ' . CUSTOMER . ' as cm ON est.customer_id=cm.pk_cus_id  ';
        if (!empty($_POST['searchdata'])) {

            $searchdate = date('Y-m-d', strtotime(trim($_POST['searchdata'])));


            $query .= ' where (est.visibility=1   AND est.PK_ES_ID IN( ' . $resultbulkadbill . ') ';

            $query .= 'AND ( est.sono LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR DATE_FORMAT(est.sale_date, "%Y-%m-%d") LIKE "%' . $searchdate . '%" ';

            $query .= ' OR cm.cus_name LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR est.grand_total LIKE "%' . trim($_POST['searchdata']) . '%") ';
        } else {


            $query .= 'where est.visibility=1    AND est.PK_ES_ID IN( ' . $resultbulkadbill . ')  ';
        }

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        $returnValue = '0';

        $rows = array('total' => 0, 'advance' => 0, 'receipts' => 0, 'bulkpay' => 0, 'bulkamt' => 0);

        if (mysqli_num_rows($result) > 0) {

            while ($data = mysqli_fetch_array($result)) {

                $advance = $this->getReceiptsadv($data['PK_ES_ID'], 0, 'erp_advance_comm');

                $receipts = $this->getReceiptsrec($data['PK_ES_ID'], 1, 'erp_advance_comm');

                $bulkPay = $this->getbulkPayment($data['PK_ES_ID'], 'erp_estimate_comm', 'erp_advance_bill_comm');

                $outTotal = $data['grand_total'] - ($receipts + $advance);
                $bulkamt = $outTotal;

                if ($outTotal > 0 && $bulkPay > 0) {
                    $bulkamt = floatval(0);
                }

                $rows['total'] += $data['grand_total'];

                $rows['advance'] += $advance;

                $rows['receipts'] +=  $receipts;


                $rows['bulkpay'] +=  $bulkPay;

                $rows['bulkamt'] +=  $bulkamt;
            }
        }


        $rowsval['total'] = number_format($rows['total'], 2);
        $rowsval['advance'] = number_format($rows['advance'], 2);
        $rowsval['receipts'] = number_format($rows['receipts'], 2);
        $rowsval['bulkpay'] = number_format($rows['bulkpay'], 2);
        $rowsval['bulkamt'] = number_format($rows['bulkamt'], 2);
        echo json_encode($rowsval);
    }
    public function getNonCommAllTotalAmountOsr()
    {

        $fdate = str_replace('/', '-', $_POST['fDate']);
        $fDateval = date('Y-m-d', strtotime($fdate));

        $tdate = str_replace('/', '-', $_POST['tDate']);
        $tDateval = date('Y-m-d', strtotime($tdate));




        $sqlQueryadvbill = 'SELECT CASE WHEN GROUP_CONCAT(advbill.fk_es_id) > 0 THEN GROUP_CONCAT(advbill.fk_es_id) ELSE 0 END AS es_id FROM erp_advance_noncomm  advbill where DATE_FORMAT(advbill.date, "%Y-%m-%d")BETWEEN "' . $fDateval . '" AND "' . $tDateval . '"';

        $getadvbill = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryadvbill);
        $getadvbillres = mysqli_fetch_assoc($getadvbill);



        $sqlQuerybulk = 'SELECT bp.fk_es_id as esid FROM  erp_advance_bill_noncomm bp  WHERE  DATE_FORMAT(bp.date, "%Y-%m-%d") BETWEEN "' . $fDateval . '" AND "' . $tDateval . '"';
        $getbulk = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuerybulk);
        $getbulkresval['esid'] = 0;

        if (mysqli_num_rows($getbulk) > 0) {
            $getbulkres = mysqli_fetch_assoc($getbulk);
            $getbulkresval['esid']  = $getbulkres['esid'];
        }




        $resultbulkadbill = implode(",", array_unique(array_merge(explode(",", $getadvbillres['es_id']), explode(",", $getbulkresval['esid']))));



        $query = 'SELECT est.grand_total as grand_total,est.PK_ES_ID FROM erp_estimate_noncomm est LEFT JOIN ' . CUSTOMER . ' as cm ON est.customer_id=cm.pk_cus_id  ';
        if (!empty($_POST['searchdata'])) {
            $searchfdate = date('Y-m-d', strtotime(trim($_POST['searchdata'])));

            $query .= ' where (est.visibility=1  AND   DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fDateval . '" AND "' . $tDateval . '"';

            $query .= 'AND ( est.sono LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR DATE_FORMAT(est.sale_date, "%Y-%m-%d")  LIKE "' . $searchfdate . '" ';

            $query .= ' OR cm.cus_name LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR est.grand_total LIKE "%' . trim($_POST['searchdata']) . '%") ';
        } else {


            $query .= 'where est.visibility=1   AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fDateval . '" AND "' . $tDateval . '" ';
        }

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        $returnValue = '0';

        $rows = array('total' => 0, 'advance' => 0, 'receipts' => 0, 'bulkpay' => 0, 'bulkamt' => 0);

        if (mysqli_num_rows($result) > 0) {

            while ($data = mysqli_fetch_array($result)) {

                $advance = $this->getReceiptsadv($data['PK_ES_ID'], 0, 'erp_advance_noncomm');

                $receipts = $this->getReceiptsrec($data['PK_ES_ID'], 1, 'erp_advance_noncomm');

                $bulkPay = $this->getbulkPayment($data['PK_ES_ID'], 'erp_estimate_noncomm', 'erp_advance_bill_noncomm');

                $outTotal = $data['grand_total'] - ($receipts + $advance);
                $bulkamt = $outTotal;

                if ($outTotal > 0 && $bulkPay > 0) {
                    // $bulkamt = floatval(0)  ;
                    $bulkamt = floatval($outTotal) - floatval($bulkPay);
                }

                $rows['total'] += $data['grand_total'];

                $rows['advance'] += $advance;

                $rows['receipts'] +=  $receipts;


                $rows['bulkpay'] +=  $bulkPay;

                $rows['bulkamt'] +=  $bulkamt;
            }
        }


        $rowsval['total'] = number_format($rows['total'], 2);
        $rowsval['advance'] = number_format($rows['advance'], 2);
        $rowsval['receipts'] = number_format($rows['receipts'], 2);
        $rowsval['bulkpay'] = number_format($rows['bulkpay'], 2);
        $rowsval['bulkamt'] = number_format($rows['bulkamt'], 2);
        echo json_encode($rowsval);
    }

    public function getNonCommAllTotalAmountOsrFiltered()
    {

        $fdate = str_replace('/', '-', $_POST['fDate']);
        $fDateval = date('Y-m-d', strtotime($fdate));

        $tdate = str_replace('/', '-', $_POST['tDate']);
        $tDateval = date('Y-m-d', strtotime($tdate));




        $sqlQueryadvbill = 'SELECT CASE WHEN GROUP_CONCAT(advbill.fk_es_id) > 0 THEN GROUP_CONCAT(advbill.fk_es_id) ELSE 0 END AS es_id FROM erp_advance_noncomm  advbill where DATE_FORMAT(advbill.date, "%Y-%m-%d")BETWEEN "' . $fDateval . '" AND "' . $tDateval . '"';

        $getadvbill = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQueryadvbill);
        $getadvbillres = mysqli_fetch_assoc($getadvbill);



        $sqlQuerybulk = 'SELECT bp.fk_es_id as esid FROM  erp_advance_bill_noncomm bp  WHERE  DATE_FORMAT(bp.date, "%Y-%m-%d") BETWEEN "' . $fDateval . '" AND "' . $tDateval . '"';
        $getbulk = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuerybulk);
        $getbulkresval['esid'] = 0;

        if (mysqli_num_rows($getbulk) > 0) {
            $getbulkres = mysqli_fetch_assoc($getbulk);
            $getbulkresval['esid']  = $getbulkres['esid'];
        }




        $resultbulkadbill = implode(",", array_unique(array_merge(explode(",", $getadvbillres['es_id']), explode(",", $getbulkresval['esid']))));



        $query = 'SELECT est.grand_total as grand_total,est.PK_ES_ID FROM erp_estimate_noncomm est LEFT JOIN ' . CUSTOMER . ' as cm ON est.customer_id=cm.pk_cus_id  ';
        if (!empty($_POST['searchdata'])) {
            $searchfdate = date('Y-m-d', strtotime(trim($_POST['searchdata'])));

            $query .= ' where (est.visibility=1  AND   DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fDateval . '" AND "' . $tDateval . '"';

            $query .= 'AND ( est.sono LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR DATE_FORMAT(est.sale_date, "%Y-%m-%d")  LIKE "' . $searchfdate . '" ';

            $query .= ' OR cm.cus_name LIKE "%' . trim($_POST['searchdata']) . '%" ';

            $query .= ' OR est.grand_total LIKE "%' . trim($_POST['searchdata']) . '%") ';
        } else {


            $query .= 'where est.visibility=1   AND DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fDateval . '" AND "' . $tDateval . '" ';
        }

        $result = mysqli_query($GLOBALS['___mysqli_ston'], $query);

        $returnValue = '0';

        $rows = array('total' => 0, 'advance' => 0, 'receipts' => 0, 'bulkpay' => 0, 'bulkamt' => 0);

        if (mysqli_num_rows($result) > 0) {

            while ($data = mysqli_fetch_array($result)) {

                $advance = $this->getReceiptsadv($data['PK_ES_ID'], 0, 'erp_advance_noncomm');

                $receipts = $this->getReceiptsrec($data['PK_ES_ID'], 1, 'erp_advance_noncomm');

                $bulkPay = $this->getbulkPayment($data['PK_ES_ID'], 'erp_estimate_noncomm', 'erp_advance_bill_noncomm');

                $outTotal = $data['grand_total'] - ($receipts + $advance);
                $bulkamt = $outTotal;

                if ($outTotal > 0 && $bulkPay > 0) {
                    // $bulkamt = floatval(0)  ;
                    $bulkamt = floatval($outTotal) - floatval($bulkPay);
                }

                $rows['total'] += $data['grand_total'];

                $rows['advance'] += $advance;

                $rows['receipts'] +=  $receipts;


                $rows['bulkpay'] +=  $bulkPay;

                $rows['bulkamt'] +=  $bulkamt;
            }
        }


        $rowsval['total'] = number_format($rows['total'], 2);
        $rowsval['advance'] = number_format($rows['advance'], 2);
        $rowsval['receipts'] = number_format($rows['receipts'], 2);
        $rowsval['bulkpay'] = number_format($rows['bulkpay'], 2);
        $rowsval['bulkamt'] = number_format($rows['bulkamt'], 2);
        echo json_encode($rowsval);
    }

    public function getOrderPaymentHistory($data)
    {
        global $GLOBALS;

        if ($data['type'] == 1) {
            $query = "SELECT 
                    ac.type,
                    ac.advance_amount,
                    ac.payment_type,
                    ac.remarks,
                    ec.sono,
                    0 as discount,
                    DATE_FORMAT(ac.date, '%b %d, %Y') AS paid_date
                FROM erp_advance_comm ac
                INNER JOIN erp_estimate_comm ec 
                        ON FIND_IN_SET(ec.PK_ES_ID, ac.fk_es_id)
                WHERE ac.fk_es_id = ?
                AND ac.visibility = 1
                UNION 
                SELECT 
                    -- (LENGTH(abc.fk_es_id) - LENGTH(REPLACE(abc.fk_es_id, ',', '')) + 1) AS advance_amount,
                    '2' as type,
                    abc.advance_amount,
                    abc.payment_type,
                    abc.remarks,
                    abc.discount,
                    GROUP_CONCAT(ec.sono SEPARATOR ', ') as sono,
                    DATE_FORMAT(abc.date, '%b %d, %Y') AS paid_date
                FROM erp_advance_bill_comm abc
                INNER JOIN erp_estimate_comm ec 
                        ON FIND_IN_SET(ec.PK_ES_ID, abc.fk_es_id)
                WHERE FIND_IN_SET(?, abc.fk_es_id)
                AND abc.visibility = 1
                GROUP BY abc.pk_adv_com_id";
        } else {
            $query = "SELECT 
                    anc.type,
                    anc.advance_amount,
                    anc.payment_type,
                    anc.remarks,
                    enc.sono,
                    0 as discount,
                    DATE_FORMAT(anc.date, '%b %d, %Y') AS paid_date
                FROM erp_advance_noncomm anc
                INNER JOIN erp_estimate_noncomm enc 
                       ON FIND_IN_SET(enc.PK_ES_ID, anc.fk_es_id)
                WHERE anc.fk_es_id = ?
                AND anc.visibility = 1
                UNION
                SELECT 
                    -- (LENGTH(abnc.fk_es_id) - LENGTH(REPLACE(abnc.fk_es_id, ',', '')) + 1) AS advance_amount,
                    '2' as type,
                    abnc.advance_amount,
                    abnc.payment_type,
                    abnc.remarks,
                    GROUP_CONCAT(enc.sono SEPARATOR ', ') as sono,
                    abnc.discount,
                    DATE_FORMAT(abnc.date, '%b %d, %Y') AS paid_date
                FROM erp_advance_bill_noncomm abnc
                INNER JOIN erp_estimate_noncomm enc 
                        ON FIND_IN_SET(enc.PK_ES_ID, abnc.fk_es_id)
                WHERE FIND_IN_SET(?, abnc.fk_es_id)
                AND abnc.visibility = 1
                GROUP BY abnc.pk_adv_noncom_id";
        }


        $stmt = mysqli_prepare($GLOBALS['___mysqli_ston'], $query);

        if (!$stmt) {
            echo json_encode([]);
            return;
        }

        mysqli_stmt_bind_param($stmt, "ii", $data['pk_es_id'], $data['pk_es_id']);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            echo json_encode([]);
            return;
        }

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        echo json_encode($rows);
    }
}


//                    $deliveryDate = isset($record['deldate']) ? date('d-m-Y', strtotime($record['deldate'])) : '';

// SELECT eitm.fk_item_id, estp.qty, estp.PK_ESP_ID, COUNT(estp.PK_ESP_ID) countOrder, ests.sono, DATE_FORMAT(ests.sale_date,"%d/%m/%Y") AS sale_date, estp.fk_so_id, estp.fk_items_id,
//            MAX(CASE WHEN estp.itemtype = 1 THEN eitm.fk_item_id ELSE "" END) "itemname",
//            MAX(CASE WHEN estp.itemtype = 1 THEN estp.qty ELSE 0 END) "itemname_qty",
//            MAX(CASE WHEN estp.itemtype = 2 THEN eitm.fk_item_id ELSE "" END) "itemcategory",
//            MAX(CASE WHEN estp.itemtype = 2 THEN estp.qty ELSE 0 END) "itemcategory_qty",
//            MAX(CASE WHEN estp.itemtype = 3 THEN eitm.fk_item_id ELSE "" END) "iteminnersheet",
//            MAX(CASE WHEN estp.itemtype = 3 THEN estp.qty ELSE 0 END) "iteminnersheet_qty",
//            MAX(CASE WHEN estp.itemtype = 4 THEN eitm.fk_item_id ELSE "" END) "itemsize",
//            MAX(CASE WHEN estp.itemtype = 4 THEN estp.qty ELSE 0 END) "itemsize_qty",
//            MAX(CASE WHEN estp.itemtype = 6 THEN eitm.fk_item_id ELSE "" END) "itembag",
//            MAX(CASE WHEN estp.itemtype = 6 THEN estp.qty ELSE 0 END) "itembag_qty",
//            MAX(CASE WHEN estp.itemtype = 7 THEN eitm.fk_item_id ELSE "" END) "itembox",
//            MAX(CASE WHEN estp.itemtype = 7 THEN estp.qty ELSE 0 END) "itembox_qty",
//            MAX(CASE WHEN estp.itemtype = 1 THEN eitm.pk_items_id ELSE "" END) "itemnameid",
//            MAX(CASE WHEN estp.itemtype = 2 THEN eitm.pk_items_id ELSE "" END) "itemcategoryid",
//            MAX(CASE WHEN estp.itemtype = 3 THEN eitm.pk_items_id ELSE "" END) "iteminnersheetid",
//            MAX(CASE WHEN estp.itemtype = 4 THEN eitm.pk_items_id ELSE "" END) "itemsizeid",
//            MAX(CASE WHEN estp.itemtype = 6 THEN eitm.pk_items_id ELSE "" END) "itembagid",
//            MAX(CASE WHEN estp.itemtype = 7 THEN eitm.pk_items_id ELSE "" END) "itemboxid",
//            estp.status
//        FROM rishidhkannan_staging.erp_estimate_noncomm_product  estp
//        INNER JOIN rishidhkannan_staging.erp_items eitm ON eitm.pk_items_id = estp.fk_items_id
//        INNER JOIN rishidhkannan_staging.erp_estimate_noncomm ests ON ests.PK_ES_ID = estp.fk_so_id  WHERE estp.status = 0 AND DATE_FORMAT(ests.sale_date, "%Y-%m-%d") BETWEEN "2023-09-06" AND "2023-10-06" GROUP BY estp.fk_so_id HAVING COUNT(estp.PK_ESP_ID) > 0 ORDER BY  estp.PK_ESP_ID, estp.fk_so_id DESC