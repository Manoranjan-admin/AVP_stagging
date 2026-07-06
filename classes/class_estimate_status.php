<?php
class Estimate_status
{
	public $pk_sale_order;
	public $sono;
	public $fk_so_id;
	public $sale_date;
	public $customer_id;


	public function __construct($c_pk_sale_order, $c_sono, $c_fk_so_id, $c_sale_date, $c_customer_id)
	{
		$this->pk_sale_order = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pk_sale_order);
		$this->sono = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sono);
		$this->fk_so_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_fk_so_id);
		$this->sale_date = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sale_date);
		$this->customer_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_customer_id);
	}

	public function getpk_sale_order()
	{
		return $this->pk_sale_order;
	}
	public function getsono()
	{
		return $this->sono;
	}
	public function getfk_so_id()
	{
		return $this->fk_so_id;
	}
	public function getsale_date()
	{
		return $this->sale_date;
	}
	public function getcustomer_id()
	{
		return $this->customer_id;
	}



	public function setpk_sale_order($s_pk_sale_order)
	{
		$this->pk_sale_order = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_pk_sale_order);
	}
	public function setsono($s_sono)
	{
		$this->sono = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_sono);
	}
	public function setfk_so_id($s_fk_so_id)
	{
		$this->fk_so_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_fk_so_id);
	}
	public function setsale_date($s_sale_date)
	{
		$this->sale_date = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_sale_date);
	}
	public function setcustomer_id($s_customer_id)
	{
		$this->customer_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_customer_id);
	}

	/* Commercial */


	function listEstimateComm()
	{
		$sqlQuery = "SELECT so.sono, cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_COMM . " AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM " . ORDER_PAYMENT . " AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt,so.order_status,so.customer_id  FROM " . ESTIMATE_COMM . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  ";

		$sqlQuery .= " WHERE so.visibility=1 AND so.order_status!=6 ";

		$fromDate = '';
		if (!empty($_POST['from_date'])) {
			$fromDateRaw = trim($_POST['from_date']);
			$fromDateObj = DateTime::createFromFormat('d/m/Y', $fromDateRaw);
			if ($fromDateObj instanceof DateTime) {
				$fromDate = $fromDateObj->format('Y-m-d');
			} else {
				$fromDate = date('Y-m-d', strtotime($fromDateRaw));
			}
		}

		$toDate = '';
		if (!empty($_POST['to_date'])) {
			$toDateRaw = trim($_POST['to_date']);
			$toDateObj = DateTime::createFromFormat('d/m/Y', $toDateRaw);
			if ($toDateObj instanceof DateTime) {
				$toDate = $toDateObj->format('Y-m-d');
			} else {
				$toDate = date('Y-m-d', strtotime($toDateRaw));
			}
		}

		if ($fromDate != '' && $toDate != '') {
			$sqlQuery .= " AND DATE(so.sale_date) BETWEEN '" . $fromDate . "' AND '" . $toDate . "' ";
		} else if ($fromDate != '') {
			$sqlQuery .= " AND DATE(so.sale_date) >= '" . $fromDate . "' ";
		} else if ($toDate != '') {
			$sqlQuery .= " AND DATE(so.sale_date) <= '" . $toDate . "' ";
		}

		if (!empty($_POST['filter_customer'])) {
			$customerId = intval($_POST['filter_customer']);
			$sqlQuery .= " AND so.customer_id = '" . $customerId . "' ";
		}

		if (!empty($_POST['filter_franchise'])) {
			$franchiseId = intval($_POST['filter_franchise']);
			$sqlQuery .= " AND so.franchise = '" . $franchiseId . "' ";
		}

		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= " AND (";
			// $sqlQuery .= 'where (so.visibility=1 AND so.order_status!=6) AND  (so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= 'so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%") ';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		}
		// else {
		// 	$sqlQuery .= 'where so.visibility=1 AND so.order_status!=6 ';
		// }


		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}
		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . ESTIMATE_COMM . " where visibility=1 AND order_status!=6  ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {
			$dateVal = strtotime($record['mixmonthlevel']);
			$dateVals = date('Y-m', $dateVal);
			$dateValname = date('M Y', $dateVal);
			$osstatus = '';

			if ($record['order_status']  == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status']  == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status']  == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status']  == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status']  == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status']  == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status']  == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}


			$rows = array();
			$rows[] = '<input type="checkbox" class="estimateChk" name="estimateIds[]" value="' . $record["PK_ES_ID"] . '">';
			$rows[] = $_POST['start'] + $i;
			$rows[] = ucfirst($record['sono']);
			$rows[] = $record['cus_name'];
			$rows[] = $record['cus_code'];
			$rows[] = $record['jo_date'];
			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2)  ? "Credit Card" : (($record['payment_type'] == 3)  ? "UPI" : (($record['payment_type'] == 4)  ? "Bank Transfer" : (($record['payment_type'] == 5)  ? "Cheque" : ''))));
			// $rows[] = $payment_type ;
			//  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$colorGTadvance = '';
			$pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
			if ($pending > 0) {
				$colorGTadvance = 'redadvgtcolor';
			} else {
				$colorGTadvance = 'greenadvgtcolor';
			}
			//	$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
			// $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			// $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
			$rows[] = '<p class="alignrightAmount">' . $record['grand_total'] . '</p>';
			// $rows[] = '<a href="index.php?erp=67&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=68&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
			//  $rows[] = '<a href="index.php?erp=67&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			/*	if($record['status'] == 2 && $record['osstatus'] == NULL  )
			{
				   $rows[] = 'Invoice is created';
			}
			else{*/
			$rows[] = $osstatus;
			//}
			$verifiedstatus = '';
			if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] == 6 || $_SESSION['user_id'] == 1)) {
				$verifiedstatus = '<a href="index.php?erp=131&typ=1&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-warning" data-toggle="tooltip" title="Verified Status" name="btnEdit">Verified Status</a>';
			}

			$rows[] = '<a href="index.php?erp=34&typ=1&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>' . $verifiedstatus;

			$records[] = $rows;
			$i++;
		}
		$output = array(
			/*"draw" => intval($_POST["draw"]),
			"iTotalRecords" => $displayRecords,
			"iTotalDisplayRecords" => $allRecords,
			"data" => $records,*/
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $allRecords,
			"recordsFiltered" => $displayRecords,
			"data" => $records,
		);
		echo json_encode($output);
	}



	function listEstimateCommcomplete()
	{
		$sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_COMM . " AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM " . ORDER_PAYMENT . " AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt,so.order_status  FROM " . ESTIMATE_COMM . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  ";



		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= 'where (so.visibility=1 AND so.order_status=6) AND  (so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%" )';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		} else {
			$sqlQuery .= 'where so.visibility=1 AND so.order_status=6 ';
		}

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}
		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		//var_dump($sqlQuery);
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . ESTIMATE_COMM . " where visibility=1 AND order_status=6  ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {
			$dateVal = strtotime($record['mixmonthlevel']);
			$dateVals = date('Y-m', $dateVal);
			$dateValname = date('M Y', $dateVal);
			$osstatus = '';
			if ($record['order_status']  == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status']  == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status']  == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status']  == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status']  == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status']  == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status']  == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}
			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = ucfirst($record['sono']);
			$rows[] = $record['cus_name'];
			$rows[] = $record['cus_code'];
			$rows[] = $record['jo_date'];
			//	$payment_type = ($record['payment_type']== 1)? 'Cash' : 'Credit';

			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2)  ? "Credit Card" : (($record['payment_type'] == 3)  ? "UPI" : (($record['payment_type'] == 4)  ? "Bank Transfer" : (($record['payment_type'] == 5)  ? "Cheque" : ''))));


			$bar = ($foo == 1) ? "1" : (($foo == 2)  ? "2" : "other");

			// $rows[] = $payment_type ;
			//  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$colorGTadvance = '';
			$pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
			if ($pending > 0) {
				$colorGTadvance = 'redadvgtcolor';
			} else {
				$colorGTadvance = 'greenadvgtcolor';
			}
			//	$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
			// $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			// $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
			$rows[] = '<p class="alignrightAmount">' . $record['grand_total'] . '</p>';
			//  $rows[] = '<a href="index.php?erp=67&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			//  $rows[] = '<a href="index.php?erp=67&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			/*	if($record['status'] == 2 && $record['osstatus'] == NULL  )
				{
					   $rows[] = 'Invoice is created';
				}
				else{*/
			$rows[] = $osstatus;
			//}
			$verifiedstatus = '';
			if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] == 6 || $_SESSION['user_id'] == 1)) {
				$verifiedstatus = '<a href="index.php?erp=131&typ=1&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-warning" data-toggle="tooltip" title="Verified Status" name="btnEdit">Verified Status</a>';
			}

			$rows[] = '<a href="index.php?erp=34&typ=1&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>' . $verifiedstatus;
			//   $rows[] = '<a href="index.php?erp=34&typ=1&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
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
	/* Non Commercial */
	function listEstimateNonComm()
	{
		$sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_NONCOMM . " AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM " . ORDER_PAYMENT . " AS op WHERE op.fk_order_no =so.PK_ES_ID )) as receipt,so.order_status,so.customer_id  FROM " . ESTIMATE_NONCOMM . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  ";

		$sqlQuery .= " WHERE so.visibility=1 AND so.order_status!=6 ";

		// if (!empty($_POST['filter_date'])) {
		// 	$filterDate = date('Y-m-d', strtotime($_POST['filter_date']));
		// 	$sqlQuery .= " AND DATE(so.sale_date) = '" . $filterDate . "' ";
		// }

		// if (!empty($_POST['filter_customer'])) {
		// 	$customerId = intval($_POST['filter_customer']);
		// 	$sqlQuery .= " AND so.customer_id = '" . $customerId . "' ";
		// }

		$fromDate = '';
		if (!empty($_POST['from_date'])) {
			$fromDateRaw = trim($_POST['from_date']);
			$fromDateObj = DateTime::createFromFormat('d/m/Y', $fromDateRaw);
			if ($fromDateObj instanceof DateTime) {
				$fromDate = $fromDateObj->format('Y-m-d');
			} else {
				$fromDate = date('Y-m-d', strtotime($fromDateRaw));
			}
		}

		$toDate = '';
		if (!empty($_POST['to_date'])) {
			$toDateRaw = trim($_POST['to_date']);
			$toDateObj = DateTime::createFromFormat('d/m/Y', $toDateRaw);
			if ($toDateObj instanceof DateTime) {
				$toDate = $toDateObj->format('Y-m-d');
			} else {
				$toDate = date('Y-m-d', strtotime($toDateRaw));
			}
		}

		if ($fromDate != '' && $toDate != '') {
			$sqlQuery .= " AND DATE(so.sale_date) BETWEEN '" . $fromDate . "' AND '" . $toDate . "' ";
		} else if ($fromDate != '') {
			$sqlQuery .= " AND DATE(so.sale_date) >= '" . $fromDate . "' ";
		} else if ($toDate != '') {
			$sqlQuery .= " AND DATE(so.sale_date) <= '" . $toDate . "' ";
		}

		if (!empty($_POST['filter_customer'])) {
			$customerId = intval($_POST['filter_customer']);
			$sqlQuery .= " AND so.customer_id = '" . $customerId . "' ";
		}

		if (!empty($_POST['filter_franchise'])) {
			$franchiseId = intval($_POST['filter_franchise']);
			$sqlQuery .= " AND so.franchise = '" . $franchiseId . "' ";
		}


		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= " AND (";
			// $sqlQuery .= 'where (so.visibility=1 AND so.order_status !=6 ) AND  (so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= 'so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%") ';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		}
		// else {
		// 	$sqlQuery .= 'where so.visibility=1 AND so.order_status !=6 ';
		// }

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}
		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		//var_dump($sqlQuery);
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . ESTIMATE_NONCOMM . " where visibility=1 AND order_status !=6  ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {
			$dateVal = strtotime($record['mixmonthlevel']);
			$dateVals = date('Y-m', $dateVal);
			$dateValname = date('M Y', $dateVal);
			$osstatus = '';
			if ($record['order_status']  == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status']  == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status']  == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status']  == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status']  == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status']  == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status']  == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}

			$rows = array();
			$rows[] = '<input type="checkbox" class="estimateChk" name="estimateIds[]" value="' . $record["PK_ES_ID"] . '">';
			$rows[] = $_POST['start'] + $i;
			$rows[] = ucfirst($record['sono']);
			$rows[] = $record['cus_name'];
			$rows[] = $record['cus_code'];
			$rows[] = $record['jo_date'];
			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2)  ? "Credit Card" : (($record['payment_type'] == 3)  ? "UPI" : (($record['payment_type'] == 4)  ? "Bank Transfer" : (($record['payment_type'] == 5)  ? "Cheque" : ''))));
			// $rows[] = $payment_type ;
			//  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$colorGTadvance = '';
			$pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
			if ($pending > 0) {
				$colorGTadvance = 'redadvgtcolor';
			} else {
				$colorGTadvance = 'greenadvgtcolor';
			}
			//	$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
			// $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			// $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
			$rows[] = '<p class="alignrightAmount">' . $record['grand_total'] . '</p>';
			//  $rows[] = '<a href="index.php?erp=69&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=70&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
			// $rows[] = '<a href="index.php?erp=69&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			/*if($record['status'] == 2 && $record['osstatus'] == NULL  )
				{
					   $rows[] = 'Invoice is created';
				}
				else{*/
			$rows[] = $osstatus;
			//}

			$verifiedstatus = '';
			if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] == 6 || $_SESSION['user_id'] == 1)) {
				$verifiedstatus = '<a href="index.php?erp=131&typ=2&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-warning" data-toggle="tooltip" title="Verified Status" name="btnEdit">Verified Status</a>';
			}

			$rows[] = '<a href="index.php?erp=34&typ=2&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>' . $verifiedstatus;
			//$rows[] = '<a href="index.php?erp=34&typ=2&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
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

	function listEstimateNonCommComplete()
	{
		$sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_NONCOMM . " AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM " . ORDER_PAYMENT . " AS op WHERE op.fk_order_no =so.PK_ES_ID )) as receipt,so.order_status  FROM " . ESTIMATE_NONCOMM . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  ";



		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= 'where (so.visibility=1 AND so.order_status=6 ) AND  (so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%" )';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		} else {
			$sqlQuery .= 'where so.visibility=1  AND so.order_status =6 ';
		}

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}
		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		//var_dump($sqlQuery);
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . ESTIMATE_NONCOMM . " where visibility=1 AND order_status =6  ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {
			$dateVal = strtotime($record['mixmonthlevel']);
			$dateVals = date('Y-m', $dateVal);
			$dateValname = date('M Y', $dateVal);
			$osstatus = '';
			if ($record['order_status']  == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status']  == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status']  == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status']  == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status']  == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status']  == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status']  == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}
			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = ucfirst($record['sono']);
			$rows[] = $record['cus_name'];
			$rows[] = $record['cus_code'];
			$rows[] = $record['jo_date'];
			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2)  ? "Credit Card" : (($record['payment_type'] == 3)  ? "UPI" : (($record['payment_type'] == 4)  ? "Bank Transfer" : (($record['payment_type'] == 5)  ? "Cheque" : ''))));
			// $rows[] = $payment_type ;
			//  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$colorGTadvance = '';
			$pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
			if ($pending > 0) {
				$colorGTadvance = 'redadvgtcolor';
			} else {
				$colorGTadvance = 'greenadvgtcolor';
			}
			//	$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
			// $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			// $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
			$rows[] = '<p class="alignrightAmount">' . $record['grand_total'] . '</p>';
			//	  $rows[] = '<a href="index.php?erp=69&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			// $rows[] = '<a href="index.php?erp=69&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			/*if($record['status'] == 2 && $record['osstatus'] == NULL  )
				{
					   $rows[] = 'Invoice is created';
				}
				else{*/
			$rows[] = $osstatus;
			//}

			$verifiedstatus = '';
			if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] == 6 || $_SESSION['user_id'] == 1)) {
				$verifiedstatus = '<a href="index.php?erp=131&typ=2&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-warning" data-toggle="tooltip" title="Verified Status" name="btnEdit">Verified Status</a>';
			}

			$rows[] = '<a href="index.php?erp=34&typ=2&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>' . $verifiedstatus;
			// $rows[] = '<a href="index.php?erp=34&typ=2&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
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
}
