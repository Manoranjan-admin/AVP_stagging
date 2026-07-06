<?php

	class Company {
		
		public $com_id;
		public $com_code;
		public $com_name;
		public $com_gst_no;
		public $com_address;
		public $com_address2;
		public $com_address3;
		public $com_city;
		public $com_state;
		public $com_phone;
		public $com_email;
		public $com_fax;
		public $com_contact_person;
		public $com_website;
		public $com_group;
		public $com_grade_group;
		public $com_created_by;
		public $com_updated_by;
		public $com_visibility;
		public $localConnection;
		
		/* Constructor */
		public function __construct($c_com_id,$c_com_code,$c_com_name,$c_com_gst_no,$c_com_address,$c_com_address2,$c_com_address3,$c_com_city,$c_com_state,$c_com_phone,$c_com_email,$c_com_fax,$c_com_contact_person,$c_com_website,$c_com_group,$c_com_grade_group,$c_com_created_by,$c_com_updated_by,$c_com_visibility,$c_localConnection){
			$this->com_id = $c_com_id;
			$this->com_code = $c_com_code;
			$this->com_name = $c_com_name;
			$this->com_gst_no = $c_com_gst_no;
			$this->com_address = $c_com_address;
			$this->com_address2 = $c_com_address2;
			$this->com_address3 = $c_com_address3;
			$this->com_city = $c_com_city;
			$this->com_state = $c_com_state;
			$this->com_phone = $c_com_phone;
			$this->com_email = $c_com_email;
			$this->com_fax = $c_com_fax;
			$this->com_contact_person = $c_com_contact_person;
			$this->com_website = $c_com_website;
			$this->com_group = $c_com_group;
			$this->com_grade_group = $c_com_grade_group;
			$this->com_created_by = $c_com_created_by;
			$this->com_updated_by = $c_com_updated_by;
			$this->com_visibility = $c_com_visibility;
			$this->localConnection=$c_localConnection;
		}
		
		/* getter (or) accessor */ 
		public function getCusId(){ return $this->com_id; }
		public function getCusCode(){ return $this->com_code; }
		public function getCusName(){ return $this->com_name; }
		public function getCusGstNo(){ return $this->com_gst_no; }
		public function getCusAddress(){ return $this->com_address; }
		public function getCusAddress2(){ return $this->com_address2; }
		public function getCusAddress3(){ return $this->com_address3; }
		public function getCusCity(){ return $this->com_city; }
		public function getCusState(){ return $this->com_state; }
		public function getCusPhone(){ return $this->com_phone; }
		public function getCusEmail(){ return $this->com_email; }
		public function getCusFax(){ return $this->com_fax; }
		public function getCusContactPerson(){ return $this->com_contact_person; }
		public function getCusWebsite(){ return $this->com_website; }
		public function getCusGroup(){ return $this->com_group; }
		public function getCusGradeGroup(){ return $this->com_grade_group; }
		public function getCusCreatedBy(){ return $this->com_created_by; }
		public function getCusUpdatedBy(){ return $this->com_updated_by; }
		public function getCusVisibility(){ return $this->com_visibility; }
		
		/* settor (or) modifier */
		public function setCusId($s_com_id){
			$this->com_id = $this->localConnection->quote($s_com_id);
		}
		public function setCusCode($s_com_code){
			$this->com_code = $this->localConnection->quote($s_com_code);
		}
		public function setCusName($s_com_name){
			$this->com_name = $this->localConnection->quote($s_com_name);
		}
		public function setCusGstNo($s_com_gst_no){
			$this->com_gst_no = $this->localConnection->quote($s_com_gst_no);
		}
		public function setCusAddress($s_com_address){
			$this->com_address = $this->localConnection->quote($s_com_address);
		}
		public function setCusAddress2($s_com_address2){
			$this->com_address2 = $this->localConnection->quote($s_com_address2);
		}
		public function setCusAddress3($s_com_address3){
			$this->com_address3 = $this->localConnection->quote($s_com_address3);
		}
		public function setCusCity($s_com_city){
			$this->com_city = $this->localConnection->quote($s_com_city);
		}
		public function setCusState($s_com_state){
			$this->com_state = $this->localConnection->quote($s_com_state);
		}
		public function setCusPhone($s_com_phone){
			$this->com_phone = $this->localConnection->quote($s_com_phone);
		}
		public function setCusEmail($s_com_email){
			$this->com_email = $this->localConnection->quote($s_com_email);
		}
		public function setCusFax($s_com_fax){
			$this->com_fax = $this->localConnection->quote($s_com_fax);
		}
		public function setCusContactPerson($s_com_contact_person){
			$this->com_contact_person = $this->localConnection->quote($s_com_contact_person);
		}
		public function setCusWebsite($s_com_website){
			$this->com_website = $this->localConnection->quote($s_com_website);
		}
		public function setCusGroup($s_com_group){
			$this->com_group = $this->localConnection->quote($s_com_group);
		}
		public function setCusGradeGroup($s_com_grade_group){
			$this->com_grade_group = $this->localConnection->quote($s_com_grade_group);
		}
		public function setCusCreatedBy($s_com_created_by){
			$this->com_created_by = $this->localConnection->quote($s_com_created_by);
		}
		public function setCusUpdatedBy($s_com_updated_by){
			$this->com_updated_by = $this->localConnection->quote($s_com_updated_by);
		}
		
		public function setCusVisibility($s_com_visibility){
			$this->com_visibility = $this->localConnection->quote($s_com_visibility);
		}
		/*
		function getAllCustomer(){
			$query = "SELECT * FROM ".COMPANY." where visibility = '1' ORDER BY pk_com_id DESC";
			$res = $this->localConnection->query($query);
			return $res;
		}
		
		function getCustomerListing(){
			$query = "SELECT * FROM ".COMPANY." where visibility = '1' ORDER BY pk_com_id DESC";
			$res = $this->localConnection->query($query);
			
			
			return $res;
		}

		function getAllStates(){
			$query = "SELECT * FROM ".STATES."  ORDER BY state_name ASC";
			$res = $this->localConnection->query($query); 
			return $res;
		}

		function getAllCitiesByState($stateId){
			$query = "SELECT * FROM ".CITIES." where state_id= '".$stateId."'  ORDER BY city ASC";
			$res = $this->localConnection->query($query); 
			return $res;
		}
		
		function getCustomerLastId(){
			$query = "SELECT MAX(pk_com_id) as pk_com_id FROM ".COMPANY." WHERE visibility = '1'";
			$res = $this->localConnection->query($query);
			$data = $res->fetch();
			return $data['pk_com_id'];
		}
		
		function AddCustomer(){
			
			 $query="INSERT INTO ".COMPANY."(pk_com_id,com_code,com_gst_no,com_name,com_address,com_address_2,com_address_3,com_city,com_state,com_phone,com_email,com_fax,com_contact_person,com_website,com_group,created_on,created_by,modified_on,modified_by,visibility) VALUES ('0',".$this->com_code.",".$this->com_gst_no.",".$this->com_name.",".$this->com_address.",".$this->com_address2.",".$this->com_address3.",".$this->com_city.",".$this->com_state.",".$this->com_phone.",".$this->com_email.",".$this->com_fax.",".$this->com_contact_person.",".$this->com_website.",".$this->com_group.",'',".$this->com_created_by.",'',".$this->com_updated_by.",'1')";
			
			 $result=$this->localConnection->query($query);
			
			 return 1;
		}
		
		function UpdateCustomer()
		{
			 $query ="UPDATE ".COMPANY." SET com_code=".$this->com_code.",com_name=".$this->com_name.",com_gst_no=".$this->com_gst_no.",com_name=".$this->com_name.",com_address=".$this->com_address.",com_address_2=".$this->com_address2.",com_address_3=".$this->com_address3.",com_city=".$this->com_city.",com_state=".$this->com_state.",com_phone=".$this->com_phone.",com_email=".$this->com_email.",com_fax=".$this->com_fax.",com_contact_person=".$this->com_contact_person.",com_website=".$this->com_website.",com_group=".$this->com_group.",modified_on='',modified_by=".$this->com_updated_by." WHERE pk_com_id=".$this->com_id;
			
			$result=$this->localConnection->query($query);
			
			return 1;
		}
		

		
		function DeleteCustomer(){
			$query ="UPDATE ".COMPANY." SET visibility='0' WHERE pk_com_id=".$this->com_id;
			
			$result=$this->localConnection->query($query);
			if($result){
				return 1;
			}else{
				return 0;
			}
		}
		*/
		function EditCustomer(){
		echo	$query = "SELECT * FROM ".COMPANY." WHERE pk_com_id=".$this->com_id." AND visibility != '0'";
		exit;
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return $res;
		}
		
		
		
	
	}
?>
