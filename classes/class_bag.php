<?php

class Bag {

	public $id;
	public $name;
	public $cost;
	public $description;
	public $visibility;
	public $created_on;
	public $updated_on;

	
   
	public function __construct($c_id,$c_name,$c_description, $c_visibility,$c_created_on,$c_updated_on) {

		$this->id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_id);
		$this->name=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_name);
		$this->cost=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cost);
		$this->description=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_description);
		$this->visibility=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_visibility);
		$this->created_on=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_created_on);
		$this->updated_on=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_updated_on);
   }
   	

   	//accessor (or) getter
	public function getid() 
	{
        return $this->id;
	}
	public function getname() 
	{
        return $this->name;
	}
	public function getcost() 
	{
        return $this->cost;
	}
	public function getDesc() 
	{
        return $this->description;
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
	public function setid($s_id) 
	{
        $this->id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_id);
	}
	public function setname($s_name) 
	{
        $this->name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_name);
	}
	public function setcost($s_cost) 
	{
        $this->cost = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cost);
	}
	public function setDesc($s_description) 
	{
        $this->description = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_description);
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

	function getallBag(){
		$query = "SELECT * FROM ".BAG." WHERE visibility = '1' ORDER BY pk_bag_id DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function AddBag(){
		$res = 0;
		$sql = "SELECT * FROM ".BAG." WHERE name ='".$this->name."' AND visibility = '1'";
		$rest = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		$counts =  mysqli_num_rows($rest);
		if($counts > 0){
			$res = 2;
		}
		else{
			$query = "INSERT INTO ".BAG." SET name ='".$this->name."',cost ='".$this->cost."', visibility = '1', description='".TRIM($this->description)."'";
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			$res = 1;
		}	
		return $res;
	}
	function geteditBag(){
		$query = "SELECT * FROM ".BAG." WHERE  pk_bag_id='".$this->id."' AND visibility = '1'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function EditBag(){
		$res = 0;
		$sql2 = "SELECT * FROM ".BAG." WHERE name ='".$this->name."' AND pk_bag_id != '".$this->id."' AND visibility='1'";

		$rest1 = mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		$counts1 =  mysqli_num_rows($rest1);
		
		if($counts1 > 0){
			$res = 2;
		}
		else{
		
		$query = "UPDATE ".BAG." SET name ='".$this->name."',cost ='".$this->cost."', visibility = '1', description='".TRIM($this->description)."' WHERE pk_bag_id =".$this->id."";
	
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			$res = 1;
		}		
		return $res;
	}
	function deleteBag(){
		$res = 0;
		$sql = "UPDATE ".BAG." SET visibility='0' WHERE pk_bag_id=".$this->id."";
		$rest = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		if($rest){
			$res = 1;
		}
		return $res;
	}
	
}

?>