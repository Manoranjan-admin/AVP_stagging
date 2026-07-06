<?php

class User
{

	public $user_id;
	public $user_name;
	public $user_password;
	public $user_email;
	public $user_hint;
	public $user_laccess;
	public $user_status;
	public $user_fname;
	public $user_lname;
	public $token;



	public function __construct($c_user_id, $c_user_name, $c_user_password, $c_user_email, $c_user_hint, $c_user_laccess, $c_user_status, $c_user_fname, $c_user_lname)
	{
		$this->user_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_id);
		$this->user_name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_name);
		$this->user_password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_password);
		$this->user_email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_email);
		$this->user_hint = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_hint);
		$this->user_laccess = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_laccess);
		$this->user_status = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_status);
		$this->user_fname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_fname);
		$this->user_lname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_lname);
	}


	//accessor (or) getter
	public function getUserid()
	{
		return $this->user_id;
	}
	public function getUserName()
	{
		return $this->user_name;
	}
	public function getUserPassword()
	{
		return $this->user_password;
	}
	public function getUserEmail()
	{
		return $this->user_email;
	}
	public function getUserHint()
	{
		return $this->user_hint;
	}
	public function getUserLastAccess()
	{
		return $this->user_laccess;
	}
	public function getUserStatus()
	{
		return $this->user_status;
	}
	public function getUserFirstName()
	{
		return $this->user_fname;
	}
	public function getUserLastName()
	{
		return $this->user_lname;
	}
	public function getUsertoken()
	{
		return $this->token;
	}


	//settor (or) modifier
	public function setUserId($s_user_id)
	{
		$this->user_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_user_id);
	}
	public function setUserName($s_user_name)
	{
		$this->user_name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_user_name);
	}
	public function setUserPassword($s_user_password)
	{
		$this->user_password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_user_password);
	}
	public function setUserEmail($s_user_email)
	{
		$this->user_email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_user_email);
	}
	public function setUserHint($s_user_hint)
	{
		$this->user_hint = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_user_hint);
	}
	public function setUserLastAccess($s_user_laccess)
	{
		$this->user_laccess = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_user_laccess);
	}
	public function setUserStatus($s_user_status)
	{
		$this->user_status = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_user_status);
	}
	public function setUserFirstName($s_user_fname)
	{
		$this->user_fname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_user_fname);
	}
	public function setUserLastName($s_user_lname)
	{
		$this->user_lname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_user_lname);
	}
	public function setUsertoken($m_user_token)
	{
		$this->token = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $m_user_token);
	}


	function getUserByID()
	{
		$query = "SELECT user_id,user_name,user_password,user_email,user_hint,user_laccess,user_status,user_fname,user_lname FROM " . USER_MASTER . " where user_status != '0' ";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function getUserByIDLoginDetails()
	{
		$query = "SELECT user_id,user_name,user_password,user_email,user_hint,user_laccess,user_status,user_fname,user_lname,fk_role_id FROM " . USER_MASTER . " WHERE user_status != '0' and ( user_name = '" . $this->user_name . "'  OR user_email = '" . $this->user_name . "' ) AND user_password = '" . md5($this->user_password) . "'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function checkUserEmailExists()
	{

		$seluser = "SELECT * FROM " . USER_MASTER . " WHERE user_email = '" . $this->user_email . "'";

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $seluser);

		return $result;
	}
	function insertToken()
	{
		$query = "INSERT INTO " . RESET_PWD . " (`email_address`, `token`) VALUES('" . $this->user_email . "','" . $this->token . "')";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return 1;
	}
	function getUserInfo($token)
	{
		$query = "SELECT email_address FROM " . RESET_PWD . " WHERE token='" . $token . "' order by pass_reset_id desc LIMIT 1";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$num = mysqli_num_rows($result);
		if ($num) {
			$res = mysqli_fetch_assoc($result);
			return $res['email_address'];
		}
	}
	function updatePassword($pwd, $org_pwd, $email)
	{

		$query = "UPDATE " . USER_MASTER . " SET user_password = '" . $pwd . "' WHERE user_email='" . $email . "' order by user_id desc LIMIT 1";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return 1;
	}
	/* OTP */
	function updateGenerateOTP($uid, $otp)
	{

		$query = "UPDATE " . USER_MASTER . " SET OTP = '" . $otp . "' WHERE user_id='" . $uid . "' order by user_id desc LIMIT 1";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return 1;
	}
	function getCheckexistOTP()
	{
		$query = "SELECT user_id,user_name,user_password,user_email,user_hint,user_laccess,user_status,user_fname,user_lname,fk_role_id FROM " . USER_MASTER . " WHERE user_status != '0' and  OTP = '" . $this->user_name . "'  ";


		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	/*function getAllUsers(){
		$query = "SELECT user_id,user_name,user_password,user_email,user_hint,user_laccess,user_status,user_fname,user_lname FROM ".USER_MASTER." where user_status != '0' ";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}*/
	function getAllUsers()
	{
		$sqlQuery = "SELECT user_id,user_name,user_password,user_email,user_hint,user_laccess,user_status,user_fname,user_lname, fk_role_id FROM " . USER_MASTER . " ";
		if (!empty($_POST["search"]["value"])) {
			$sqlQuery .= 'where (user_status=1 ) AND  (user_name LIKE "%' . trim($_POST["search"]["value"]) . '%") ';
		} else {
			$sqlQuery .= 'where user_status=1 ';
		}

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY user_id DESC ';
		}
		$displayRecords_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		//echo  $sqlQuery ;
		//exit;
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . USER_MASTER . " where user_status = 1  ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($displayRecords_stmt);

		$roles = mysqli_fetch_all(
			mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM erp_role_master WHERE visibility = 1"),
			MYSQLI_ASSOC
		);

		$roleOptions = "<option value='999'>Super Admin</option>";

		foreach ($roles as $row) {
			$roleOptions .= "<option value='{$row['role_id']}'>{$row['role_name']}</option>";
		}

		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {
			$created_on = date("d-m-Y", strtotime($record['created_on']));

			// mark selected role
			$role_option = str_replace(
				"value='{$record['fk_role_id']}'",
				"value='{$record['fk_role_id']}' selected",
				$roleOptions
			);

			$rows = array();
			$rows[] = $_POST['start'] + $i;
			// $rows[] = $record['user_name'];
			$rows[] = '<label for="txt_username_' . $record["user_id"] . '"><input type="text" name="txt_username" id="txt_username_' . $record["user_id"] . '"   class="txt_username"  	value="' . $record['user_name'] . '"></label>';
			$rows[] = '<label for="txt_userpass_' . $record["user_id"] . '"><input type="password" name="txt_userpass" id="txt_userpass_' . $record["user_id"] . '"   class="txt_userpass"  autocomplete = "new-password"	value=""><button type="button"  onclick="showPass(' . $record["user_id"] . ');" id="showPass_' . $record["user_id"] . '" class="showPass">Show</button></label>';
			$rows[] = "<select name='txt_role' id='txt_role_{$record['user_id']}'>{$role_option}</select>";
			$rows[] = '<span class="updatebtn_user"><a onclick="updatevisibility(' . $record["user_id"] . ');" class="custom_btn_class btn btn-danger" data-toggle="tooltip" title="Update" name="btndelete">Update</a></span>';
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

	function getAllRoles()
	{
		$query = "SELECT * FROM erp_role_master WHERE visibility = 1";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

	function addRole($data)
	{
		$role_name = $data['role_name'];
		$query = "INSERT INTO erp_role_master (role_name, visibility) VALUES ('$role_name', 1)";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result ? 1 : 0;
	}

	// function addRole($data)
	// {
	// 	$conn = $GLOBALS["___mysqli_ston"];
	// 	$role_name = mysqli_real_escape_string($conn, $data['role_name']);

	// 	mysqli_begin_transaction($conn);

	// 	try {

	// 		$query = "INSERT INTO erp_role_master (role_name, visibility) VALUES ('$role_name', 1)";

	// 		if (!mysqli_query($conn, $query)) {
	// 			throw new Exception("Role insert failed");
	// 		}

	// 		$insertId = mysqli_insert_id($conn);

	// 		// ✅ Fetch Super Admin menus
	// 		$menusResult = mysqli_query(
	// 			$conn,
	// 			"SELECT menu_id, rm_menu_name, parent_id FROM erp_role_menu WHERE role_id = 999"
	// 		);

	// 		if (!$menusResult) {
	// 			throw new Exception("Menu fetch failed");
	// 		}

	// 		$menus = mysqli_fetch_all($menusResult, MYSQLI_ASSOC);

	// 		foreach ($menus as $row) {
	// 			$menu_id = $row['menu_id'];
	// 			$rm_menu_name = mysqli_real_escape_string($conn, $row['rm_menu_name']);
	// 			$parent_id = $row['parent_id'];

	// 			$query = "INSERT INTO erp_role_menu (role_id, menu_id, rm_menu_name, parent_id) VALUES ('$insertId', '$menu_id', '$rm_menu_name', '$parent_id')";
	// 			if (!mysqli_query($conn, $query)) {
	// 				throw new Exception("Menu insert failed");
	// 			}
	// 		}

	// 		mysqli_commit($conn);

	// 		return 1;
	// 	} catch (Exception $e) {

	// 		mysqli_rollback($conn);

	// 		error_log("AddRole Error: " . $e->getMessage());

	// 		return 0;
	// 	}
	// }


	function updateRole($data)
	{
		$role_id = $data['role_id'];
		$role_name = $data['role_name'];
		$query = "UPDATE erp_role_master SET role_name= '$role_name' WHERE role_id = '$role_id'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result ? 1 : 0;
	}
	function updateRoleVisibility($data)
	{
		$role_id = $data['role_id'];
		$query = "UPDATE erp_role_master SET visibility = 0 WHERE role_id = '$role_id'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result ? 1 : 0;
	}
	function updateUserPassword($role)
	{
		$user_name = '';
		if ($this->user_name != '') {
			$user_name = " , user_name='" . $this->user_name . "' ";
		}
		$user_password = '';
		if ($this->user_password != '') {
			$user_password = ", user_password='" . md5($this->user_password) . "' , display_password  = '" . $this->user_password . "' ";
		}
		$query = "UPDATE " . USER_MASTER . " SET fk_role_id='{$role}', user_status = 1 " . $user_name . "  " . $user_password . "  WHERE user_id='" . $this->user_id . "' order by user_id desc LIMIT 1";

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		if (mysqli_affected_rows($GLOBALS["___mysqli_ston"])) {
			echo json_encode(1);
		} else {
			echo json_encode(0);
		}
	}

	function AddUsers()
	{

		$query = "INSERT INTO " . USER_MASTER . " SET user_name = '" . $this->user_name . "',user_password = '" . md5($this->user_password) . "',display_password = '" . $this->user_password . "',user_hint = '" . $this->user_hint . "',user_email = '" . $this->user_email . "',fk_role_id = '" . $this->user_id . "',user_status = '1'";

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		// return 1;
		if ($result) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]); // return inserted ID
		} else {
			return false; // or 0 / throw error
		}
	}

	function AddMenuAccess($user_name, $user_id, $role_id)
	{
		$query = "INSERT INTO user_menu_access SET user_name = '$user_name', fk_user_id = '$user_id', fk_role_id = '$role_id'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return 1;
	}

	function getNavLink($user_id)
	{
		$query = "SELECT 
					CONCAT(mnu.menu_link, '&mnu=', mnu.pk_menu_id) AS link
				FROM erp_menu mnu
				INNER JOIN user_menu_access macs 
					ON FIND_IN_SET(mnu.pk_menu_id, macs.menu_id)
				WHERE macs.fk_user_id = '$user_id'
				AND mnu.menu_link != '#'
				ORDER BY mnu.menu_order ASC
				LIMIT 1";

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		if ($result && mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			return $row['link'];   // return menu link
		}

		return false; // no menu found
	}
}
