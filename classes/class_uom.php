<?php

class Uom {

	public $pk_uom_id;
	public $uom_name;
	public $visibility;
	public $created_on;
	public $updated_on;

	
   
	public function __construct($c_pk_uom_id,$c_uom_name,$c_visibility,$c_created_on,$c_updated_on) {

		$this->pk_uom_id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pk_uom_id);
		$this->uom_name=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_uom_name);
		$this->visibility=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_visibility);
		$this->created_on=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_created_on);
		$this->updated_on=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_updated_on);
   }
   	

   	//accessor (or) getter
	public function getpk_uom_id() 
	{
        return $this->pk_uom_id;
	}
	public function getuom_name() 
	{
        return $this->uom_name;
	}
	public function getvisibility() 
	{
        return $this->visibility;
	}
	public function getcreated_on() 
	{
        return $this->created_on;
	}
	public function getupdated_on() 
	{
        return $this->updated_on;
	}
    
	//settor (or) modifier
	public function setpk_uom_id($s_pk_uom_id) 
	{
        $this->pk_uom_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_pk_uom_id);
	}
	public function setuom_name($s_uom_name) 
	{
        $this->uom_name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_uom_name);
	}
	public function setUserPassword($s_visibility) 
	{
        $this->visibility = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_visibility);
	}
	public function setUserEmail($s_created_on) 
	{
        $this->created_on = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_created_on);
	}
	public function setUserHint($s_updated_on) 
	{
		$this->updated_on = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_updated_on);
	}
	function getalluom(){
		$query = "SELECT * FROM ".UOM_MASTER." WHERE visibility = '1' ORDER BY pk_uom_id DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function AddUOM(){
		$res = 0;
		$sql = "SELECT * FROM ".UOM_MASTER." WHERE uom_name ='".$this->uom_name."' AND visibility = '1'";
		$rest = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		$counts =  mysqli_num_rows($rest);
		if($counts > 0){
			$res = 2;
		}
		else{
			$query = "INSERT INTO ".UOM_MASTER." SET uom_name ='".$this->uom_name."', visibility = '1'";
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			$res = 1;
		}	
		return $res;
	}
	function deleteUOM(){
		$res = 0;
		$sql = "UPDATE ".UOM_MASTER." SET visibility = '0' WHERE  pk_uom_id='".$this->pk_uom_id."'";
		$rest = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		if($rest){
			$res = 1;
		}
		return $res;
	}
	
}

?>