<?php
//error_reporting(E_ALL);
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
session_start();

include("../../includes/db_config.php");

include("../../classes/class_report.php");

include("../../classes/class_advance_commornon.php");

$obj_saleorder = new Report('', '');

$obj_advancecommornon = new Advance_commornon('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

   
	if(isset($_POST['mode']) && $_POST['mode'] == 'listCustomerReport') {
        if($_POST['typ'] == 1)
        {
            $obj_saleorder->listCommCustomerReport();

        }
        else if($_POST['typ'] == 2)
        {
            $obj_saleorder->listNonCommCustomerReport();
        }
    }

    if(isset($_POST['mode']) && $_POST['mode'] == 'listFranchiseReport') {
        if($_POST['typ'] == 1)
        {
            $obj_saleorder->listCommFranchiseReport();

        }
        else if($_POST['typ'] == 2)
        {
            $obj_saleorder->listNonCommFranchiseReport();
        }
    }
  
	if(isset($_POST['mode']) && $_POST['mode']=='get_estimate_by_customer'){
	
		$result = array();
		if($_POST['type'] == 1){
			  $result = $obj_advancecommornon->get_estimate_by_customer_comm($_POST['customer']);
		}else if($_POST['type'] == 2){
			$result = $obj_advancecommornon->get_estimate_by_customer_noncomm($_POST['customer']);
		}
	
	  echo json_encode($result);
		
	}
	if(isset($_POST['mode']) && $_POST['mode']=='get_customer_by_estimate'){
	
		$result = $obj_advancecommornon->get_customer_by_estimate($_POST['estimate']);
		echo json_encode($result);
		  
	  }
/*Multiple Advance */

if(isset($_POST['mode']) && $_POST['mode']=='addAdvancecommmulti'){
	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	$ad_date = date('Y-m-d',strtotime($txt_pi_date));

	$result = $obj_advancecommornon->add_advance_commmulti($ad_date);

	
	if($result == 1)
	{
	
		$sono =	($_POST['txt_estimate_name']) ? $_POST['txt_estimate_name'] : '' ;

		//var_dump( $sono);
	//	exit;
		$status = 6;
		$result = $obj_advancecommornon->changecommPaidorder($sono,$status);
		$result = $obj_advancecommornon->changecommPaidorderstatus($sono,$status,$ad_date);
	
		$result2 = $obj_advancecommornon->update_estimate_commmulti();

	
	}
	echo "1";
}

if(isset($_POST['mode']) && $_POST['mode']=='editAdvanceCommMulti'){
	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	$ad_date = date('Y-m-d',strtotime($txt_pi_date));
	$result = $obj_advancecommornon->edit_advance_commmulti($ad_date);
	echo json_encode($result);
}

if(isset($_POST['mode']) && $_POST['mode'] == 'listAdvanceCommMulti') {
	$obj_advancecommornon->listAdvanceCommMulti();
}
if(isset($_POST['mode']) && $_POST['mode'] == 'getAdvanceEditValuesMulti') {
	$id=$_POST['soid'];
	
	$get_data=$obj_advancecommornon->get_edit_advance_detailsmulti($id);
	$advance=array();

	while($datass=mysqli_fetch_array($get_data)) 
	{	
			$advance[]=$datass;	
		
	} 
	
	echo json_encode($advance);
}
if(isset($_POST['mode']) && $_POST['mode']=='check_amountmulti'){

	if($_POST['estimate_no'] == "Select Estimate"){
		$result='Select Estimate Number';
	}else{
		if($_POST['type']==1){
	  $result = $obj_advancecommornon->check_pending_amount_commmulti($_POST['estimate_no'],$_POST['adv_amount']);
		}elseif($_POST['type']==2){
			$result = $obj_advancecommornon->check_pending_amount_noncommmulti($_POST['estimate_no'],$_POST['adv_amount']);
		}
	}
	echo json_encode($result);
		
	}
if(isset($_POST['mode']) && $_POST['mode']=='check_amount_by_esidmulti'){
	if($_POST['estimate_no'] == "Select Estimate"){
		$result='Select Estimate Number';
	}else{
		if($_POST['type']==1){
	  $result = $obj_advancecommornon->check_pending_amount_comm_by_esidmulti($_POST['estimate_no'],$_POST['adv_amount']);
		}elseif($_POST['type']==2){
			$result = $obj_advancecommornon->check_pending_amount_noncomm_by_esidmulti($_POST['estimate_no'],$_POST['adv_amount']);
		}
	}
	echo json_encode($result);
		
	}
	
if(isset($_POST['mode']) && $_POST['mode']=='addAdvanceNonCommmulti'){
	//var_dump($_POST);
	//exit;
	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	
	$ad_date = date('Y-m-d',strtotime($txt_pi_date));
//	$obj_advancecommornon->setsono($soNum);
	/*$obj_advancecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
	$obj_advancecommornon->setcustomer_id($_POST['txt_customer_name']);
	$obj_advancecommornon->setremark($_POST['txt_remarks']);
	$obj_advancecommornon->setpaymenttype($_POST['txt_payment_type']);*/
	$result = $obj_advancecommornon->add_advance_noncommmulti($ad_date);

	if($result == 1)
	{
		$sono =	($_POST['txt_estimate_name']) ? $_POST['txt_estimate_name'] : '' ;
		$status = 6;
		$result = $obj_advancecommornon->changenoncommPaidorder($sono,$status);
		$result = $obj_advancecommornon->changenoncommPaidorderstatus($sono,$status,$ad_date);
		$result2 = $obj_advancecommornon->update_estimate_noncommmulti();

	}
	echo "1";
}

if(isset($_POST['mode']) && $_POST['mode']=='editAdvanceNonCommmulti'){
	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	
	$ad_date = date('Y-m-d',strtotime($txt_pi_date));
//	$obj_advancecommornon->setsono($soNum);
	/*$obj_advancecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
	$obj_advancecommornon->setcustomer_id($_POST['txt_customer_name']);
	$obj_advancecommornon->setremark($_POST['txt_remarks']);
	$obj_advancecommornon->setpaymenttype($_POST['txt_payment_type']);*/
	
	$result = $obj_advancecommornon->edit_advance_noncommmulti($ad_date);
	echo json_encode($result);
	
}

	if(isset($_POST['mode']) && $_POST['mode'] == 'listAdvanceNonCommMulti') {
	
		
        $obj_advancecommornon->listAdvanceNonCommMulti();
    }

	if(isset($_POST['mode']) && $_POST['mode'] == 'getAdvanceEditValuesMulti') {
		$id=$_POST['soid'];
		
		$get_data=$obj_advancecommornon->get_edit_advance_details_non_commmulti($id);
		$advance=array();

		while($datass=mysqli_fetch_array($get_data)) 
		{	
				$advance[]=$datass;	
			
		} 
		
		echo json_encode($advance);
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'listBulkReport') {
		//var_dump($_POST);
		//exit;
        if($_POST['typ'] == 1)
        {
            $obj_advancecommornon->listCommBulkReport();

        }
        else if($_POST['typ'] == 2)
        {
            $obj_advancecommornon->listNonCommBulkReport();
        }
		
    }
	if(isset($_POST['mode']) && $_POST['mode'] == 'checkBulkorderstatusdelivered') {
		$sono =	($_POST['ordernumber']) ? $_POST['ordernumber'] : '' ;
		$result = array();
		if($_POST['typ'] == 1)
		{
			$result = $obj_advancecommornon->checkBulkorderstatusdelivered($sono,'erp_estimate_comm');

		}
		else if($_POST['typ'] == 2){
			$result = $obj_advancecommornon->checkBulkorderstatusdelivered($sono,'erp_estimate_noncomm');

		}
		echo json_encode($result);


	}

	?>