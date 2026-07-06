<?php

class Customer
{

	public $cus_id;
	public $cus_code;
	public $cus_name;
	public $cus_gst_no;
	public $cus_address;
	public $cus_address2;
	public $cus_address3;
	public $cus_city;
	public $cus_state;
	public $cus_phone;
	public $cus_email;
	public $cus_fax;
	public $cus_contact_person;
	public $cus_website;
	public $cus_group;
	public $cus_std_code;
	public $cus_alter_no;
	public $cus_mob_no;
	public $cus_grade_group;
	public $cus_created_by;
	public $cus_updated_by;
	public $cus_visibility;
	public $localConnection;

	/* Constructor */
	public function __construct($c_cus_id, $c_cus_code, $c_cus_name, $c_cus_gst_no, $c_cus_address, $c_cus_address2, $c_cus_address3, $c_cus_city, $c_cus_state, $c_cus_phone, $c_cus_email, $c_cus_fax, $c_cus_contact_person, $c_cus_website, $c_cus_group, $c_cus_std_code, $c_cus_alter_no, $c_cus_mob_no, $c_cus_grade_group, $c_cus_created_by, $c_cus_updated_by, $c_cus_visibility, $c_localConnection)
	{
		$this->cus_id = $c_cus_id;
		$this->cus_code = $c_cus_code;
		$this->cus_name = $c_cus_name;
		$this->cus_gst_no = $c_cus_gst_no;
		$this->cus_address = $c_cus_address;
		$this->cus_address2 = $c_cus_address2;
		$this->cus_address3 = $c_cus_address3;
		$this->cus_city = $c_cus_city;
		$this->cus_state = $c_cus_state;
		$this->cus_phone = $c_cus_phone;
		$this->cus_email = $c_cus_email;
		$this->cus_fax = $c_cus_fax;
		$this->cus_contact_person = $c_cus_contact_person;
		$this->cus_website = $c_cus_website;
		$this->cus_group = $c_cus_group;
		$this->cus_std_code = $c_cus_std_code;
		$this->cus_alter_no = $c_cus_alter_no;
		$this->cus_mob_no = $c_cus_mob_no;
		$this->cus_grade_group = $c_cus_grade_group;
		$this->cus_created_by = $c_cus_created_by;
		$this->cus_updated_by = $c_cus_updated_by;
		$this->cus_visibility = $c_cus_visibility;
		$this->localConnection = $c_localConnection;
	}

	/* getter (or) accessor */
	public function getCusId()
	{
		return $this->cus_id;
	}
	public function getCusCode()
	{
		return $this->cus_code;
	}
	public function getCusName()
	{
		return $this->cus_name;
	}
	public function getCusGstNo()
	{
		return $this->cus_gst_no;
	}
	public function getCusAddress()
	{
		return $this->cus_address;
	}
	public function getCusAddress2()
	{
		return $this->cus_address2;
	}
	public function getCusAddress3()
	{
		return $this->cus_address3;
	}
	public function getCusCity()
	{
		return $this->cus_city;
	}
	public function getCusState()
	{
		return $this->cus_state;
	}
	public function getCusPhone()
	{
		return $this->cus_phone;
	}
	public function getCusEmail()
	{
		return $this->cus_email;
	}
	public function getCusFax()
	{
		return $this->cus_fax;
	}
	public function getCusContactPerson()
	{
		return $this->cus_contact_person;
	}
	public function getCusWebsite()
	{
		return $this->cus_website;
	}
	public function getCusGroup()
	{
		return $this->cus_group;
	}
	public function getCusSTDCode()
	{
		return $this->cus_std_code;
	}
	public function getCusAlterNo()
	{
		return $this->cus_alter_no;
	}
	public function getCusMobNo()
	{
		return $this->cus_mob_no;
	}
	public function getCusGradeGroup()
	{
		return $this->cus_grade_group;
	}
	public function getCusCreatedBy()
	{
		return $this->cus_created_by;
	}
	public function getCusUpdatedBy()
	{
		return $this->cus_updated_by;
	}
	public function getCusVisibility()
	{
		return $this->cus_visibility;
	}

	/* settor (or) modifier */
	public function setCusId($s_cus_id)
	{
		$this->cus_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_id);
	}
	public function setCusCode($s_cus_code)
	{
		$this->cus_code = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_code);
	}
	public function setCusName($s_cus_name)
	{
		$this->cus_name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_name);
	}
	public function setCusGstNo($s_cus_gst_no)
	{
		$this->cus_gst_no = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_gst_no);
	}
	public function setCusAddress($s_cus_address)
	{
		$this->cus_address = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_address);
	}
	public function setCusAddress2($s_cus_address2)
	{
		$this->cus_address2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_address2);
	}
	public function setCusAddress3($s_cus_address3)
	{
		$this->cus_address3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_address3);
	}
	public function setCusCity($s_cus_city)
	{
		$this->cus_city = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_city);
	}
	public function setCusState($s_cus_state)
	{
		$this->cus_state = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_state);
	}
	public function setCusPhone($s_cus_phone)
	{
		$this->cus_phone = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_phone);
	}
	public function setCusEmail($s_cus_email)
	{
		$this->cus_email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_email);
	}
	public function setCusFax($s_cus_fax)
	{
		$this->cus_fax = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_fax);
	}
	public function setCusContactPerson($s_cus_contact_person)
	{
		$this->cus_contact_person = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_contact_person);
	}
	public function setCusWebsite($s_cus_website)
	{
		$this->cus_website = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_website);
	}
	public function setCusGroup($s_cus_group)
	{
		$this->cus_group = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_group);
	}
	public function setCusSTDCode($s_cus_std_code)
	{
		$this->cus_std_code = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_std_code);
	}
	public function setCusAlterNo($s_cus_alter_no)
	{
		$this->cus_alter_no = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_alter_no);
	}
	public function setCusMobNo($s_cus_mob_no)
	{
		$this->cus_mob_no = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_mob_no);
	}
	public function setCusGradeGroup($s_cus_grade_group)
	{
		$this->cus_grade_group = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_grade_group);
	}
	public function setCusCreatedBy($s_cus_created_by)
	{
		$this->cus_created_by = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_created_by);
	}
	public function setCusUpdatedBy($s_cus_updated_by)
	{
		$this->cus_updated_by = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_updated_by);
	}

	public function setCusVisibility($s_cus_visibility)
	{
		$this->cus_visibility = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_visibility);
	}

	function getAllCustomer()
	{
		$query = "SELECT cus.pk_cus_id,cus.cus_code, cus.cus_name, cus.cus_email, cus.cus_gst_no, cus.cus_address, s.state_name, c.city, cus.cus_phone, cus.cus_fax, cus.cus_mob_no, cus.created_on FROM " . CUSTOMER . " cus LEFT JOIN " . STATES . " s ON s.pk_state_id = cus.cus_state  LEFT JOIN " . CITIES . " c ON c.pk_city_id = cus.cus_city where cus.visibility = '1' ORDER BY cus.pk_cus_id DESC";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getAllFrancise()
	{
		$query = "SELECT * FROM erp_franchise_master where visibility = '1' ORDER BY pk_cus_id DESC";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	function getCustomerListing()
	{
		$query = "SELECT pk_cus_id,cus_name,cus_address,cus_address_2,cus_address_3,cus_city,cus_state,cus_code FROM " . CUSTOMER . " where visibility = '1' ORDER BY cus_name ASC";
		$res = $this->localConnection->query($query);


		return $res;
	}

	function getAllStates()
	{
		$query = "SELECT pk_state_id,state_name,state_code FROM " . STATES . "  ORDER BY state_name ASC";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	function getAllCitiesByState($stateId)
	{
		$query = "SELECT pk_city_id,city FROM " . CITIES . " where state_id= '" . $stateId . "'  ORDER BY city ASC";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	function getCustomerLastId()
	{
		$query = "SELECT MAX(pk_cus_id) as pk_cus_id FROM " . CUSTOMER . " WHERE visibility = '1'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$data = mysqli_fetch_array($res);
		return $data['pk_cus_id'];
	}

	function AddCustomer()
	{

		$query = "INSERT INTO " . CUSTOMER . " SET pk_cus_id = '0', cus_code = '" . $this->cus_code . "',cus_gst_no = '" . $this->cus_gst_no . "',cus_name = '" . $this->cus_name . "',cus_address = '" . $this->cus_address . "',cus_address_2 = '" . $this->cus_address2 . "',cus_address_3 = '" . $this->cus_address3 . "',cus_city = '" . $this->cus_city . "',cus_state = '" . $this->cus_state . "', cus_phone = '" . $this->cus_phone . "', cus_email = '" . $this->cus_email . "',cus_fax = '" . $this->cus_fax . "',cus_contact_person = '" . $this->cus_contact_person . "',cus_website = '" . $this->cus_website . "',cus_std_code = '" . $this->cus_std_code . "',cus_alter_no = '" . $this->cus_alter_no . "',cus_mob_no = '" . $this->cus_mob_no . "',created_by = '" . $this->cus_created_by . "', modified_by='" . $this->cus_updated_by . "',visibility = '1'";

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		return 1;
	}

	function UpdateCustomer()
	{
		$query = "UPDATE " . CUSTOMER . " SET  cus_name= '" . $this->cus_name . "', cus_gst_no = '" . $this->cus_gst_no . "', cus_name = '" . $this->cus_name . "', cus_address = '" . $this->cus_address . "', cus_address_2 = '" . $this->cus_address2 . "', cus_address_3 = '" . $this->cus_address3 . "', cus_city = '" . $this->cus_city . "', cus_state = '" . $this->cus_state . "', cus_phone = '" . $this->cus_phone . "', cus_email = '" . $this->cus_email . "', cus_fax = '" . $this->cus_fax . "', cus_contact_person = '" . $this->cus_contact_person . "', cus_website = '" . $this->cus_website . "', cus_group = '" . $this->cus_group . "', cus_std_code = '" . $this->cus_std_code . "', cus_alter_no = '" . $this->cus_alter_no . "', cus_mob_no = '" . $this->cus_mob_no . "', modified_on = '', modified_by = '" . $this->cus_updated_by . "' WHERE pk_cus_id=" . $this->cus_id;

		//echo $query;

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		return 1;
	}



	function DeleteCustomer()
	{
		$query = "UPDATE " . CUSTOMER . " SET visibility='0' WHERE pk_cus_id=" . $this->cus_id;

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}

	function EditCustomer()
	{
		$query = "SELECT * FROM " . CUSTOMER . " WHERE pk_cus_id=" . $this->cus_id . " AND visibility != '0'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	function EditCustomerLogin()
	{
		$query1 = "SELECT * FROM " . USER_MASTER . " WHERE is_admin = 10 and ref_id='" . $this->cus_id . " ";
		$res = $this->localConnection->query($query1);
		return $res;
	}

	function getAllCustomerGroup()
	{

		$query = "SELECT pk_customer_group_id,customer_group_name FROM " . CUST_GROUP . " where visibility = '1' ORDER BY customer_group_name ASC";

		$res = $this->localConnection->query($query);
		return $res;
	}

	function getListingForSalesForSummaryReport($country_id)
	{
		$query = "SELECT * FROM " . CUSTOMER . " cus LEFT JOIN " . COUNTRY_MASTER . " cm ON cm.country_id=cus.cus_country_fk LEFT JOIN " . CUSTOMER_INVOICE . " ci ON ci.fk_customer_id=cus.cus_id WHERE cm.country_id='" . $country_id . " AND cus.visibility!='0'";
		$result = $this->localConnection->query($query);
		return $result;
	}

	function getListingForSalesForSummaryReportAll()
	{
		$query = "SELECT * FROM " . CUSTOMER . " cus LEFT JOIN " . COUNTRY_MASTER . " cm ON cm.country_id=cus.cus_country_fk LEFT JOIN " . CUSTOMER_INVOICE . " ci ON ci.fk_customer_id=cus.cus_id WHERE cus.visibility!='0' AND country_id!=''";
		$result = $this->localConnection->query($query);
		return $result;
	}

	function getAllShipment()
	{
		$query = "SELECT * FROM " . SHIPMENT_LOCATION . " where isactive != '0' ORDER BY id DESC";
		$res = $this->localConnection->query($query);
		return $res;
	}

	function getDeliveryMode()
	{
		$query = "SELECT * FROM " . DELIVERY_MODE . " WHERE mod_status = '1'";
		$res = $this->localConnection->query($query);
		return $res;
	}

	function getAllIAListCount()
	{

		$query = "SELECT pk_cus_id FROM " . CUSTOMER . " where visibility!=0 ORDER BY pk_cus_id DESC";

		$result = $this->localConnection->query($query);
		return $result;
	}

	function getAllIAListSearchCount($searchQuery)
	{

		$query = "SELECT cus.pk_cus_id,cus.cus_name,cus.cus_code,cus.cus_email FROM " . CUSTOMER . " cus WHERE cus.visibility != '0' " . $searchQuery . "  ORDER BY pk_cus_id DESC";

		$result = $this->localConnection->query($query);

		return $result;
	}

	function getAllIAList($searchQuery, $columnName = '', $columnSortOrder = '', $row = '', $rowperpage = '', $cusQuery = '', $isFlag = '')
	{
		$cusOrderQry = "";

		$cusOrderQry = "ORDER BY " . $columnName . " " . $columnSortOrder;
		if ($rowperpage == -1) {

			$query =  "SELECT cus.pk_cus_id,cus.cus_code,cus.cus_gst_no,cus.cus_name,cus.cus_address,cus.cus_address_2,cus.cus_address_3,UPPER(ci.city) as city,st.state_name,cus.cus_phone,cus.cus_email,cus.cus_fax,cus.cus_contact_person,cus.cus_website,cg.customer_group_name,cus.cus_std_code,cus.cus_alter_no,cus.cus_mob_no FROM " . CUSTOMER . " cus LEFT JOIN " . STATES . " st ON st.state_code = cus.cus_state LEFT JOIN " . CITIES . " ci ON ci.pk_city_id = cus.cus_city  LEFT JOIN " . CUST_GROUP . " cg ON cg.pk_customer_group_id = cus.cus_group WHERE cus.visibility != '0' " . $searchQuery . " " . $cusOrderQry;
		} else {
			$query =  "SELECT cus.pk_cus_id,cus.cus_code,cus.cus_gst_no,cus.cus_name,cus.cus_address,cus.cus_address_2,cus.cus_address_3,UPPER(ci.city) as city,st.state_name,cus.cus_phone,cus.cus_email,cus.cus_fax,cus.cus_contact_person,cus.cus_website,cg.customer_group_name,cus.cus_std_code,cus.cus_alter_no,cus.cus_mob_no FROM " . CUSTOMER . " cus LEFT JOIN " . STATES . " st ON st.state_code = cus.cus_state LEFT JOIN " . CITIES . " ci ON ci.pk_city_id = cus.cus_city LEFT JOIN " . CUST_GROUP . " cg ON cg.pk_customer_group_id = cus.cus_group WHERE cus.visibility != '0' " . $searchQuery . " " . $cusOrderQry . " limit " . $row . "," . $rowperpage;
		}

		$result = $this->localConnection->query($query);
		return $result;
	}
	function getAllListCustomer()
	{
		$sqlQuery = "SELECT cus.pk_cus_id,cus.cus_code,cus.cus_gst_no,cus.cus_name,cus.cus_address,cus.cus_address_2,cus.cus_address_3,UPPER(ci.city) as city,st.state_name,cus.cus_phone,cus.cus_email,cus.cus_fax,cus.cus_contact_person,cus.cus_website,cus.cus_std_code,cus.cus_alter_no,cus.cus_mob_no,cus.created_on FROM " . CUSTOMER . " cus LEFT JOIN " . STATES . " st ON st.state_code = cus.cus_state LEFT JOIN " . CITIES . " ci ON ci.pk_city_id = cus.cus_city ";


		$fromDateval = ($_POST['fromDate'] != " " && $_POST['fromDate'] != "") ? date('Y-m-d', strtotime($_POST['fromDate'])) : '';
		$toDateval = ($_POST['toDate'] != " "  && $_POST['toDate'] != "") ? date('Y-m-d', strtotime($_POST['toDate'])) : '';
		$stateid = ($_POST["txt_state"]) ? 'AND  cus.cus_state = ' . $_POST["txt_state"] . '' : "";
		$cityid = ($_POST["txt_city"]) ? 'AND  cus.cus_city = ' . $_POST["txt_city"] . '' : "";

		$frmToquery	= '';
		if ($fromDateval != "" && $toDateval != "") {
			$frmToquery		= 'AND  DATE_FORMAT(cus.created_on, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
		}
		//$toDateval = date('Y-m-d', strtotime($_POST['toDate']));

		if (!empty($_POST["search"]["value"])) {
			$searchdate = date('Y-m-d', strtotime(trim($_POST["search"]["value"])));
			$sqlQuery .= 'where (cus.visibility=1 ' . $stateid . ' ' . $cityid . ' ' . $frmToquery . ') AND  (cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_email LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_mob_no LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR st.state_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR ci.city LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.created_on LIKE "%' . $searchdate . '%") ';
		} else {
			$sqlQuery .= 'where cus.visibility=1  ' . $stateid . ' ' . $cityid . ' ' . $frmToquery . '';
		}

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY cus.pk_cus_id DESC ';
		}
		$displayRecords_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		//echo  $sqlQuery ;
		//exit;
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . CUSTOMER . " where visibility = 1  ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($displayRecords_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {
			$created_on = date("d-m-Y", strtotime($record['created_on']));


			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = ucfirst($record['cus_code']);
			$rows[] = $record['cus_name'];
			// $rows[] = $record['cus_email'];
			$email = $record['cus_email'];

			$rows[] = !empty($record['cus_gst_no']) ? $record['cus_gst_no'] : '-';

			// $rows[] = '';
			$rows[] = $record['cus_address'];
			$rows[] = $record['state_name'];
			$rows[] = $record['city'];
			$rows[] = $record['cus_phone'];
			$rows[] = $record['cus_fax'];
			$rows[] = $record['cus_mob_no'];
			$rows[] =  $created_on;
			if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == '999' || $_SESSION['roleId'] == '1')) {
				//var_dump($_SESSION['roleId']);
				$deleterow = ' <a onclick="updatevisibility(' . $record["pk_cus_id"] . ');" class="custom_btn_class btn btn-danger" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-trash"></span></a>';
			}
			$rows[] = ' <a href="index.php?erp=3&id=' . $record["pk_cus_id"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>' . $deleterow . '';
			$deleterow = "";

			$records[] = $rows;
			$i++;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"iTotalRecords" => $allRecords,
			"iTotalDisplayRecords" => $displayRecords,
			"data" => $records,
		);
		echo json_encode($output);
	}

	function getAllFrachise()
	{
		$query = "SELECT pk_cat_id,cat_name FROM " . CATEGORY . "  where visibility = '1' ORDER BY cat_name DESC";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getAllSize()
	{
		$query = "SELECT its.pk_items_id,its.fk_item_id, its.item_type, its.type, its.visibility FROM " . ITEMS . " its  where its.type=2 AND its.item_type =3 AND its.visibility = '1' ORDER BY its.pk_items_id DESC";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
}
