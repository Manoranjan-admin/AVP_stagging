<?php

class Category {

	public $pk_cat_id;
	public $cat_name;
	public $cat_description;
	public $visibility;
	public $created_on;
	public $updated_on;

	
   
	public function __construct($c_pk_cat_id,$c_cat_name,$c_cat_description, $c_visibility,$c_created_on,$c_updated_on) {

		$this->pk_cat_id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pk_cat_id);
		$this->cat_name=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cat_name);
		$this->cat_description=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cat_description);
		$this->visibility=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_visibility);
		$this->created_on=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_created_on);
		$this->updated_on=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_updated_on);
   }
   	

   	//accessor (or) getter
	public function getpk_cat_id() 
	{
        return $this->pk_cat_id;
	}
	public function getcat_name() 
	{
        return $this->cat_name;
	}
	public function getDesc() 
	{
        return $this->cat_description;
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
	public function setpk_cat_id($s_pk_cat_id) 
	{
        $this->pk_cat_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_pk_cat_id);
	}
	public function setcat_name($s_cat_name) 
	{
        $this->cat_name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cat_name);
	}
	public function setCatDesc($s_cat_description) 
	{
        $this->cat_description = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cat_description);
	}
	public function setUserPassword($s_visibility) 
	{
        $this->visibility = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_visibility);
	}
	public function setcreated_on($s_created_on) 
	{
        $this->created_on = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_created_on);
	}
	public function setupdated_on($s_updated_on) 
	{
		$this->updated_on = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_updated_on);
	}

	function getallcategory(){
		$query = "SELECT * FROM ".CATEGORY." WHERE visibility = '1' ORDER BY pk_cat_id DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function AddCategory(){
		$res = 0;
		$sql = "SELECT * FROM ".CATEGORY." WHERE cat_name ='".$this->cat_name."' AND visibility = '1'";
		$rest = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		$counts =  mysqli_num_rows($rest);
		if($counts > 0){
			$res = 2;
		}
		else{
			$query = "INSERT INTO ".CATEGORY." SET cat_name ='".$this->cat_name."', visibility = '1', cat_description='".$this->cat_description."'";
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			$res = 1;
		}	
		return $res;
	}
	function geteditcategory(){
		$query = "SELECT * FROM ".CATEGORY." WHERE  pk_cat_id='".$this->pk_cat_id."' AND visibility = '1'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function EditCategory(){
		$res = 0;
		$sql2 = "SELECT * FROM ".CATEGORY." WHERE cat_name ='".$this->cat_name."' AND pk_cat_id != '".$this->pk_cat_id."' AND visibility='1'";
		$rest1 = mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		$counts1 =  mysqli_num_rows($rest1);
		if($counts1 > 0){
			$res = 2;
		}
		else{
			$query = "UPDATE ".CATEGORY." SET cat_name ='".$this->cat_name."', visibility = '1', cat_description='".$this->cat_description."' WHERE pk_cat_id ='".$this->pk_cat_id."'";
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			$res = 1;
		}		
		return $res;
	}
	function deletecategory(){
		$res = 0;
		$sql = "UPDATE ".CATEGORY." SET visibility='0' WHERE pk_cat_id='".$this->pk_cat_id."'";
		$rest = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		if($rest){
			$res = 1;
		}
		return $res;
	}
	
}

?>