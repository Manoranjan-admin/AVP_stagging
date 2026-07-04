<?php
	//error_reporting(E_ALL);
	session_start();
	include("../../includes/db_config.php");
	include("../../classes/class_customer.php");
	$obj_cus = new Customer('','','','','','','','','','','','','','','','','','','','','','',$GLOBALS["___mysqli_ston"]);
	if(isset($_POST['mode']) && $_POST['mode']=='getAllStates'){
		$getAllStates=$obj_cus->getAllStates();
		while($data=mysqli_fetch_array($getAllStates)) {
			$states[]=$data;
		}
		echo json_encode($states);
	}

	if(isset($_POST['mode']) && $_POST['mode']=='getAllCitiesByState'){
		$stateId=$_POST['state_id'];
		$getAllCities=$obj_cus->getAllCitiesByState($stateId);
		while($data=mysqli_fetch_array($getAllCities)) {
			$cities[]=$data;
		}
		echo json_encode($cities);
	}

	if(isset($_POST['mode']) && $_POST['mode']=='getAllCustomer'){
		$getAllCustomer=$obj_cus->getAllCustomer();
		$customers=array();
		while($data=$getAllCustomer->fetch()) {
			$customers[]=$data;
		}
		echo json_encode($customers);
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'AddCustomer'){
		//echo 'test';
		$last_id=$obj_cus->getCustomerLastId();
		//echo 'test';
		$table_name=CUSTOMER;
		
		if($last_id=='')
		{
			$last_id=1;
		}
		
		$cus_code='CUS_'.sprintf("%03s", $last_id+1);
		$cus_name=$_POST['txt_customer_name'];
		$cus_gst_no=$_POST['txt_customer_gst_no'];
		$cus_address=$_POST['txt_customer_address'];
		$cus_address2=$_POST['txt_customer_address_2'];
		$cus_address3=$_POST['txt_customer_address_3'];
		$cus_city=$_POST['txt_customer_city'];
		$cus_state=$_POST['txt_customer_state'];
		$cus_phone=$_POST['txt_phone'];
		$cus_email=$_POST['txt_email'];
		$cus_fax=$_POST['txt_fax'];
		$cus_contact_person=$_POST['txt_contact_person'];
		$cus_website=$_POST['txt_customer_website'];
		$cus_group=$_POST['txt_customer_group'];
		$cus_std_code=$_POST['txt_customer_stdcode'];
		$cus_alter_no=$_POST['txt_customer_alterno'];
		$cus_mob_no=$_POST['txt_customer_mobno'];
		$cus_grade_group=$_POST['txt_customer_grade_group'];
		$cus_created_by='';
		$cus_updated_by='';
		$cus_visibility='1';

		$obj_cus->setCusCode($cus_code);
		$obj_cus->setCusName($cus_name);
		$obj_cus->setCusGstNo($cus_gst_no);
		$obj_cus->setCusAddress($cus_address);
		$obj_cus->setCusAddress2($cus_address2);
		$obj_cus->setCusAddress3($cus_address3);
		$obj_cus->setCusCity($cus_city);
		$obj_cus->setCusState($cus_state);
		$obj_cus->setCusPhone($cus_phone);
		$obj_cus->setCusEmail($cus_email);
		$obj_cus->setCusFax($cus_fax);
		$obj_cus->setCusContactPerson($cus_contact_person);
		$obj_cus->setCusWebsite($cus_website);
		$obj_cus->setCusGroup($cus_group);
		$obj_cus->setCusSTDCode($cus_std_code);
		$obj_cus->setCusAlterNo($cus_alter_no);
		$obj_cus->setCusMobNo($cus_mob_no);
		$obj_cus->setCusGradeGroup($cus_grade_group);
		$obj_cus->setCusCreatedBy(''); 
		$obj_cus->setCusUpdatedBy(''); 
		$obj_cus->setCusVisibility($cus_visibility);
		$addcus=$obj_cus->AddCustomer();
		if($addcus == 1){
			echo json_encode(1);
		}
		else{
			echo json_encode(0);
		}
		
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'DeleteCustomer'){
		$obj_cus->setCusId($_POST['id']);
		$obj_cus->setCusVisibility('0');
		$getCustomer=$obj_cus->DeleteCustomer();
		echo json_encode(1);
	}

	if(isset($_POST['mode']) && $_POST['mode'] == 'EditCustomer'){
		$obj_cus->setCusId($_POST['id']);
		$getCustomer=$obj_cus->EditCustomer();
		while($data1=mysqli_fetch_array($getCustomer)) {
			$editcus[]=$data1;
		}	
			
		echo json_encode(array($editcus));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'UpdateCustomer')
	{	
		$table_name=CUSTOMER;
		$cus_id=$_POST['id'];
		$cus_code=$_POST['txt_customer_code'];
		//$cus_code=(substr(str_replace(' ','',$_POST['txt_customer_name']), 0, 3).'_'.date('Y').'_'.sprintf("%04s", $cus_id));
		$cus_name=$_POST['txt_customer_name'];
		$cus_gst_no=$_POST['txt_customer_gst_no'];
		$cus_address=$_POST['txt_customer_address'];
		$cus_address2=$_POST['txt_customer_address_2'];
		$cus_address3=$_POST['txt_customer_address_3'];
		$cus_city=$_POST['txt_customer_city'];
		$cus_state=$_POST['txt_customer_state'];
		$cus_phone=$_POST['txt_phone'];
		$cus_email=$_POST['txt_email'];
		$cus_fax=$_POST['txt_fax'];
		$cus_contact_person=$_POST['txt_contact_person'];
		$cus_website=$_POST['txt_customer_website'];
		$cus_group=$_POST['txt_customer_group'];
		$cus_std_code=$_POST['txt_customer_stdcode'];
		$cus_alter_no=$_POST['txt_customer_alterno'];
		$cus_mob_no=$_POST['txt_customer_mobno'];
		$cus_grade_group=$_POST['txt_customer_grade_group'];
		$cus_created_by='';
		$cus_updated_by='';
		$cus_visibility='1';
		$obj_cus->setCusId($cus_id);
		//$obj_cus->setCusCode($cus_code);
		$obj_cus->setCusName($cus_name);
		$obj_cus->setCusGstNo($cus_gst_no);
		$obj_cus->setCusAddress($cus_address);
		$obj_cus->setCusAddress2($cus_address2);
		$obj_cus->setCusAddress3($cus_address3);
		$obj_cus->setCusCity($cus_city);
		$obj_cus->setCusState($cus_state);
		$obj_cus->setCusPhone($cus_phone);
		$obj_cus->setCusEmail($cus_email);
		$obj_cus->setCusFax($cus_fax);
		$obj_cus->setCusContactPerson($cus_contact_person);
		$obj_cus->setCusWebsite($cus_website);
		$obj_cus->setCusGroup($cus_group);
		$obj_cus->setCusSTDCode($cus_std_code);
		$obj_cus->setCusAlterNo($cus_alter_no);
		$obj_cus->setCusMobNo($cus_mob_no);
		$obj_cus->setCusGradeGroup($cus_grade_group);
		$obj_cus->setCusCreatedBy(''); 
		$obj_cus->setCusUpdatedBy(''); 
		$obj_cus->setCusVisibility($cus_visibility);
		$updateCustomer=$obj_cus->UpdateCustomer();
		echo json_encode(0);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='getAllListCustomer'){
		$getAllListCustomer=$obj_cus->getAllListCustomer();
	}
	mysqli_close($GLOBALS["___mysqli_ston"]);
?>