<?php
	class Product {
		public $pk_product_id;
		public $fk_catgeory_id;
		/*public $prodcode;
		public $product_name;
		public $product_hsn;
		public $inner_sheet;
		public $special_effect;
		public $size;
		public $product_cgst;
		public $product_sgst;
		public $product_igst;
		public $product_price;
		public $product_desc;
		public $visibility;*/

		public $prodcode;
		public $product_name;
		public $first_price;
		public $inner_sheet;
		public $special_effect;
		public $size;
		public $product_cgst;
		public $product_sgst;
		public $product_igst;
		public $additional_price;
		public $product_desc;
		public $visibility;		
		public $product_price;
		public function __construct($c_pk_product_id,$c_fk_catgeory_id,$c_prodcode, $c_product_name,$c_first_price,$c_inner_sheet,$c_special_effect,$c_size,$c_product_cgst,$c_product_sgst,$c_product_igst,$c_additional_price,$c_product_desc,$c_visibility){
			$this->pk_product_id = $c_pk_product_id;
			$this->fk_catgeory_id = $c_fk_catgeory_id;
			$this->prodcode = $c_prodcode;
			$this->product_name = $c_product_name;
			$this->first_price = $c_first_price;
			$this->inner_sheet = $c_inner_sheet;
			$this->special_effect = $c_special_effect;
			$this->size = $c_size;
			$this->product_cgst = $c_product_cgst;
			$this->product_sgst = $c_product_sgst;
			$this->product_igst = $c_product_igst;
			$this->product_price = $c_additional_price;
			$this->product_desc = $c_product_desc;
			$this->visibility = $c_visibility;
		}
		public function getpk_product_id(){ return $this->pk_product_id; }
		public function getfk_catgeory_id(){ return $this->fk_catgeory_id; }
		public function getprodcode(){ return $this->prodcode; }
		public function getproduct_name(){ return $this->product_name; }
		public function getfirst_price(){ return $this->first_price; }
		public function getinner_sheet(){ return $this->inner_sheet; }
		public function getspecial_effect(){ return $this->special_effect; }
		public function getsize(){ return $this->size; }
		public function getproduct_cgst(){ return $this->product_cgst; }
		public function getproduct_sgst(){ return $this->product_sgst; }
		public function getproduct_igst(){ return $this->product_igst; }
		public function getproduct_desc(){ return $this->product_desc; }
		public function getvisibility(){ return $this->visibility; }

		public function setpk_product_id($s_pk_product_id){
			$this->pk_product_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_pk_product_id);
		}
		public function setfk_catgeory_id($s_fk_catgeory_id){
			$this->fk_catgeory_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_fk_catgeory_id);
		}
		public function setprodcode($s_prodcode){
			$this->prodcode = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_prodcode);
		}
		public function setproduct_name($s_product_name){
			$this->product_name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_product_name);
		}
		public function setfirst_price($s_first_price){
			$this->first_price = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_first_price);
		}
		public function setinner_sheet($s_inner_sheet){
			$this->inner_sheet = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_inner_sheet);
		}	
		public function setspecial_effect($s_special_effect){
			$this->special_effect = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_special_effect);
		}
		public function setsize($s_size){
			$this->size = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_size);
		}
		public function setproduct_cgst($s_product_cgst){
			$this->product_cgst = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_product_cgst);
		}
		public function setproduct_sgst($s_product_sgst){
			$this->product_sgst = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_product_sgst);
		}
		public function setproduct_igst($s_product_igst){
			$this->product_igst = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_product_igst);
		}
		public function setproduct_desc($s_product_desc){
			$this->product_desc = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_product_desc);
		}
		public function setadditional_price($s_additional_price){
			$this->additional_price = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$s_additional_price);
		}
		function getAllProducts(){
			//$query = "SELECT * FROM ".PRODUCT." WHERE visibility='1' ORDER BY pk_product_id DESC";
			$query = "SELECT * FROM ".PRODUCT." AS p  WHERE p.visibility='1' GROUP BY p.product_name ORDER BY p.product_name ASC";

			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return $res;
		}
		function delete_product(){
			$query = "UPDATE ".PRODUCT." SET visibility='0' WHERE pk_product_id='".$this->pk_product_id."'";
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return 1;
		}
		function productAdd(){
		 //	$query = "INSERT INTO ".PRODUCT." SET product_name='".$this->product_name."', product_hsn='".$this->product_hsn."', inner_sheet='".$this->inner_sheet."', special_effect='".$this->special_effect."', size='".$this->size."', product_cgst='".$this->product_cgst."', product_sgst='".$this->product_sgst."', product_igst='".$this->product_igst."', product_price='".$this->product_price."', product_desc='".$this->product_desc."', product_uom ='".$uom."', fk_catgeory_id='".$this->fk_catgeory_id."', fk_uom_id='".$this->fk_uom_id."'";
		 	$query = "INSERT INTO ".PRODUCT." SET product_name='".$this->product_name."', 4color_price='".$this->first_price."', 7color_price='".$this->additional_price."', product_desc='".$this->product_desc."',visibility=1";
	
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return 1;
		}
		function Editproduct(){
			$query = "SELECT * FROM ".PRODUCT." WHERE pk_product_id = '".$this->pk_product_id."'";
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return $res;
		}
		function productEdit(){
			//$query = "UPDATE ".PRODUCT." SET product_name='".$this->product_name."', product_hsn='".$this->product_hsn."',inner_sheet='".$this->inner_sheet."', special_effect='".$this->special_effect."', size='".$this->size."', product_cgst='".$this->product_cgst."', product_sgst='".$this->product_sgst."', product_igst='".$this->product_igst."', product_price='".$this->product_price."', product_desc='".$this->product_desc."', fk_catgeory_id='".$this->fk_catgeory_id."', fk_uom_id='".$this->fk_uom_id."' WHERE pk_product_id = '".$this->pk_product_id."'";
			 $query = "UPDATE ".PRODUCT." SET product_name='".$this->product_name."', 4color_price='".$this->first_price."', 7color_price='".$this->additional_price."', product_desc='".$this->product_desc."' WHERE pk_product_id = ".$this->pk_product_id."";
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return 1;
		}
		function getproduct_byid(){
			$query = "SELECT p.product_price,p.product_cgst,p.product_sgst,p.product_igst,u.uom_name as uom  FROM ".PRODUCT." AS p LEFT JOIN ".CATEGORY." AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN ".UOM_MASTER." AS u ON u.pk_uom_id = p.fk_uom_id WHERE p.pk_product_id = '".$this->pk_product_id."'";
			//echo $query;
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return $res;
		}
		function getTypesListing(){
			$query = "SELECT pk_types_id,types_name, type_tables, table_pk_id, orderid	 FROM ".TYPES." WHERE status = 1";
			//echo $query;
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return $res;
		}
		
		function getLastproductID(){
			$query = "SELECT  p_no FROM ".PRODUCT." ORDER BY p_no DESC ";
		
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
		}
		/*function getAllUOM()
		{
			$query = "SELECT * from ".UOM_MASTER." INNER JOIN ".UNIT_MASTER." ON ".UOM_MASTER.".fk_unit_master_id=".UNIT_MASTER.".pk_unit_master_id where ".UOM_MASTER.".visibility !=0 "; 
			$res = $this->localConnection->query($query);
			return $res;
		}*/
	}
?>