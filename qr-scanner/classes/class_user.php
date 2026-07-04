<?php

class User {

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

	
   
	public function __construct($c_user_id,$c_user_name,$c_user_password,$c_user_email,$c_user_hint,$c_user_laccess,$c_user_status,$c_user_fname,$c_user_lname) {

		$this->user_id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_id);
		$this->user_name=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_name);
		$this->user_password=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_password);
		$this->user_email=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_email);
		$this->user_hint=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_hint);
		$this->user_laccess=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_laccess);
		$this->user_status=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_status);
		$this->user_fname=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_fname);
		$this->user_lname=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_user_lname);
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
	public function getUserLastName(){
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
	public function setUserLastName($s_user_lname){
		$this->user_lname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_user_lname);
	} 
	public function setUsertoken($m_user_token) 
	{
        $this->token = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $m_user_token);
	}
	
	
	function getUserByID(){
		$query = "SELECT user_id,user_name,user_password,user_email,user_hint,user_laccess,user_status,user_fname,user_lname FROM erp_QR_usermaster where user_status != '0' ";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function getUserByIDLoginDetails(){


		$query = "SELECT um.user_id,um.user_name,um.user_email,um.user_hint,um.user_laccess,um.user_status,um.user_fname,um.user_lname,um.fk_role_id,ur.name FROM erp_QR_usermaster um INNER JOIN erp_QR_userrole ur ON ur.pk_usrole_id = um.fk_role_id  WHERE um.user_status != '0' and ( um.user_name = '".$this->user_name."'  OR um.user_email = '".$this->user_name."' ) AND um.user_password = '".md5($this->user_password)."'";

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function checkUserEmailExists(){
		
		$seluser = "SELECT * FROM erp_QR_usermaster WHERE user_email = '".$this->user_email."'";
		
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $seluser);
		
		return $result;
	}

	function updatePassword($pwd,$org_pwd,$email){
		
		$query = "UPDATE erp_QR_usermaster SET user_password = '".$pwd."' WHERE user_email='".$email."' order by user_id desc LIMIT 1";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return 1;
		
	}
	/* OTP */
	function updateGenerateOTP($uid,$otp){
	
		$query = "UPDATE erp_QR_usermaster SET OTP = '".$otp."' WHERE user_id='".$uid."' order by user_id desc LIMIT 1";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return 1;
		
	}
	function getCheckexistOTP(){
		$query = "SELECT user_id,user_name,user_password,user_email,user_hint,user_laccess,user_status,user_fname,user_lname,fk_role_id FROM erp_QR_usermaster WHERE user_status != '0' and  OTP = '".$this->user_name."'  ";

		
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
		
}

?>