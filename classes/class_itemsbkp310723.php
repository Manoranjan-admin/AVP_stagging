<?php

class items {
	public $id;
	public $types;
	public $itemtype;
	public $item;
	public $firstprice;
	public $secondprice;
	public $visibility;
	public $created_on;
	public $updated_on;

	
   
	public function __construct($c_id,$c_types,$c_itemtype,$c_item,$c_firstprice,$c_secondprice, $c_visibility,$c_created_on,$c_updated_on) {

		$this->id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_id);
		$this->types=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_types);
		$this->itemtype=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_itemtype);
		$this->item=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_item);
		$this->firstprice=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_firstprice);
		$this->secondprice=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_secondprice);
		$this->visibility=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_visibility);
		$this->created_on=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_created_on);
		$this->updated_on=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_updated_on);
   }
   	

   	//accessor (or) getter
	public function getid() 
	{
        return $this->id;
	}
	public function gettypes() 
	{
        return $this->types;
	}
	public function getitemtype() 
	{
        return $this->itemtype;
	}
	public function getitem() 
	{
        return $this->item;
	}
	public function getfirstprice() 
	{
        return $this->firstprice;
	}
	public function getsecondprice() 
	{
        return $this->secondprice;
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
	public function settypes($s_types) 
	{
        $this->types = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_types);
	}
	public function setitemtype($s_itemtype) 
	{
        $this->itemtype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_itemtype);
	}
	public function setitem($s_item) 
	{
        $this->item = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_item);
	}
	public function setfirstprice($s_firstprice) 
	{
        $this->firstprice = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_firstprice);
	}
	public function setsecondprice($s_secondprice) 
	{
        $this->secondprice = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_secondprice);
	}
	public function setvisibility($s_visibility) 
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


	function AddItems(){
		$res = 0;
		 $sql = "SELECT * FROM ".ITEMS." WHERE fk_item_id ='".$this->item."' AND   type ='".$this->types ."' AND item_type ='".$this->itemtype."' AND parent_id ='".$this->visibility."' AND visibility = '1'";
	
		$rest = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		$counts =  mysqli_num_rows($rest);
		if($counts > 0){
			$res = 2;
		}
		else{
			$query = "INSERT INTO ".ITEMS." SET fk_item_id ='".$this->item ."',first_price ='".$this->firstprice."' , second_price ='".$this->secondprice."',type ='".$this->types ."',item_type ='".$this->itemtype."',parent_id ='".$this->visibility."' , visibility = '1'";

			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			$res = 1;
		}
		
		return $res;
	}
	
	function EditItems(){
		/*$res = 0;
		$sql2 = "SELECT * FROM ".ITEMS." WHERE types ='".$this->types."' AND type ='".$this->types ."' AND item_type ='".$this->itemtype."' AND visibility='1'";
	
		$rest1 = mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		$counts1 =  mysqli_num_rows($rest1);
		if($counts1 > 0){
			$res = 2;
		}
		else{*/
			$query = "UPDATE ".ITEMS." SET fk_item_id ='".$this->item ."',first_price ='".$this->firstprice."' , second_price ='".$this->secondprice."',type ='".$this->types ."',item_type ='".$this->itemtype."',parent_id ='".$this->visibility."' WHERE pk_items_id  =".$this->id."";
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			//$res = 1;
	/*	}		*/
		return $result;
	}
	
	function deleteInnersheet(){
	
		$res = 0;
		$sql = "UPDATE ".ITEMS." SET visibility='0' WHERE pk_items_id =".$this->id."";
		$rest = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		if($rest){
			$res = 1;
		}
		return $res;
	}
	function getAllitems($typ,$its){
	
		$query = "SELECT pk_items_id,item.fk_item_id,item.type,  (IF(item.type =1, 'Product', (SELECT ts.types_name FROM ".TYPES." ts Where ts.pk_types_id = item.item_type))) as itemtypesval FROM ".ITEMS." item  WHERE  item.visibility = '1' AND item.type=".$typ." AND item.item_type=".$its."";

			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getAllCommercialItemData(){
		$query = "SELECT * FROM ".COMMERCIAL_PRODUCTS." WHERE  visibility = '1'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function getEditItems(){
		$query = "SELECT item.fk_item_id,item.type,item.item_type,item.first_price,item.second_price,item.parent_id  FROM ".ITEMS." item  WHERE item.pk_items_id =".$this->id." AND  item.visibility = '1'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function getProductItems(){
		
		$query = "SELECT item.pk_items_id,item.fk_item_id,item.type,item.item_type,item.first_price,item.second_price,item.parent_id   FROM ".ITEMS." item  WHERE item.type=2 AND  item.item_type = 1 AND item.parent_id = 0 AND  item.visibility = '1'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
		
}

?>