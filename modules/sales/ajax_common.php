<?php
//error_reporting(E_ALL);
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

require_once '../../vendor/autoload.php';
include "../../classes/NumbersToWords.php";
$obj_nu = new NumbersToWords();


include("../../includes/db_config.php");
include("../../classes/class_estimate_commornon.php");
include("../../classes/class_customer.php");
include("../../classes/class_product.php");

$obj_estimatecommornon = new Estimate_commornon('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$obj_cus = new Customer('','','','','','','','','','','','','','','','','','','','','','',$GLOBALS["___mysqli_ston"]);
$obj_product = new Product('','','','','','','','','','','','','','');

	if(isset($_POST['mode']) && $_POST['mode']=='sendPDFmailComm'){

			//error_reporting(E_ALL); 
			//ini_set('display_errors', 1);
			$data_id = $_POST['soid'];

			
			if (isset($data_id) && ($data_id != '')) {

				
			$redColor = [255, 0, 0];
			$obj_estimatecommornon->setpk_sale_order($data_id);
			$getSQId = $obj_estimatecommornon->getSalesOrderById($data_id);
			$datas = mysqli_fetch_array($getSQId);

			$company = $obj_estimatecommornon->EditCustomer();
			$companyData = mysqli_fetch_array($company);


			$getSQAddress = $obj_estimatecommornon->getSalesOrderAddressById($data_id);
			$sqaddress = mysqli_fetch_array($getSQAddress);

			$unitArr = array();
			$scproduct = array();
			$gradeArr = array();
			$getSCProducts = $obj_estimatecommornon->getSalesOrderProductByPROId($data_id);

			while ($datass = mysqli_fetch_array($getSCProducts)) {

			$unitArr[] = $datass['uom'];
			$obj_estimatecommornon->setpk_sale_order($data_id);
			$getSCProduct = $obj_estimatecommornon->getSalesOrderProductByIdForPDF($datass['PK_ESP_ID']);
			$product_id = $datass['product_id'];

			while ($data = mysqli_fetch_array($getSCProduct)) {

			if ($data['type_tables']) {
			$itemdata = $obj_estimatecommornon->getAllItemDataprint($data['table_pk_id'], $data['type_tables'], $data['fk_item_id']);
			$itemdataval = mysqli_fetch_array($itemdata);
			$data['itemname'] = $itemdataval['name'];
			} else {
			$data['itemname'] = 'Commercial';
			}

			//array_push($a,"blue","yellow");

			//    var_dump($itemdataval );
			$scproduct[] = $data;
			}
			}
			}
			
			$com_name = $companyData['com_name'];
			$address_street = $companyData['com_address'];
			$address_city = $companyData['com_city'];
			$address_state = $companyData['com_state'];
			$com_phone = $companyData['com_phone'];
			$address_fax = $companyData['com_fax'];
			$com_email_id = $companyData['com_email'];
			$com_website = $companyData['com_website'];
			$getCustomer = $obj_estimatecommornon->getCustomer($datas['customer_id']);
			$getCustomerdata = mysqli_fetch_array($getCustomer);
			//var_dump($getCustomerdata);
			//exit;
			$sq_no = $datas['sono'];
			$date = date('d-M-Y', strtotime($datas['created_on']));
			$cus_name = $getCustomerdata['cus_name'];
			$cus_code = $getCustomerdata['cus_code'];
			$cus_address =($getCustomerdata['cus_address'])? $getCustomerdata['cus_address']:'' ;
			$cus_address_2 = ($getCustomerdata['cus_address_2'])? ",".$getCustomerdata['cus_address_2']:'' ;
			$cus_address_3 = ($getCustomerdata['cus_address_3'])? ",".$getCustomerdata['cus_address_3']:'' ;
			$cus_email = $getCustomerdata['cus_email'];
			$cus_mob_no = $getCustomerdata['cus_mob_no'];
			$cus_gst_no = $getCustomerdata['cus_gst_no'];
			$cus_city = $getCustomerdata['cus_city'];
			$cus_state = $getCustomerdata['cus_state'];
			$cus_fax = $getCustomerdata['cus_fax'];

			$city= $obj_estimatecommornon->getCityName($cus_city);
			$state = $obj_estimatecommornon->getStateName($cus_state);

			$cityName = mysqli_fetch_array($city);
			$stateName = mysqli_fetch_array($state);

			$g_no = $datas['reference_no'];
			$sq_no = $datas['sono'];

			$date = date('d-M-Y', strtotime($datas['sale_date']));

			$shipmentfrom = $datas['shipment_from'];
			$shipmentto = $datas['shipment_to'];
	
			$sq_total_discount = number_format($datas['gst_total'], 2);
			$sq_total = number_format($datas['item_total'], 2);
			$sq_grand_total = number_format($datas['grand_total'], 2);
			$inword = $obj_nu->convertCurrencyToWords(sprintf("%01.2f", $datas['grand_total']));

			//var_dump( $scproduct);
			//exit;
			
			$terms_description = "
			<br>
			1. Goods under this  are supplied on your Account and Risk.<br>
			2. The amount of this Sales Quote should be paid on the due date else interest @18% per annum and applicable GST will be charged from the date of sales quote till the actual payment.<br>
			3. All payments should be made by RTGS/NEFT/A/c. payee cheque/Draft/irrevocable letter of credit drawn in favour of  AV Digital Press .<br>
			4. All claims for Goods lost or damaged in transit or discrepancies of any kind (including shortages in weight and non-delivery) must be made upon the carrier or insurance Company as applicable.<br>
			5. All disputes under this will be settled by Competent Court within the jurisdication of Madurai.<br>
			";

			//$mpdf=new mPDF('','', 0, '', 10, 10, 70, 15, 10, 10, 'A4-L');

			$html = "<html><head>
			<style>
			.clearfix:after {
			content: '';
			display: table;
			clear: both;
			}

			a {
			color: #5D6975;
			text-decoration: underline;
			}

			body {
			color: #001028;
			background: #FFFFFF;
			font-family: Arial, sans-serif;
			font-size: 13px;
			font-family: Arial;
			text-transform: uppercase;
			}

			table {
			width: 100%;
			border-collapse: collapse;
			border-spacing: 0;
			border:1px solid #000000!important;

			}
			table th,
			table td {
			text-align: center;
			}

			table th {
			color: #000;
			border:1px solid #000000!important;
			white-space: nowrap;
			font-weight: normal;
			text-align: left;
			padding-left: 6px;
			padding-right: 6px;
			}


			table td {
			padding-left: 6px;
			text-align: left;
			border:1px solid #000000!important;
			text-transform: uppercase;
			}

			table td table tr td {
			font-size:13px;
			text-transform: uppercase;
			}

			table p{
			margin:5px 0;
			}

			table.items thead tr th{
			font-size:13px;
			text-transform: uppercase;
			}
			table.items tbody tr td{
			font-size:13px;
			padding-bottom:1px;
			text-transform: uppercase;
			}
			th, td {
			border:1px solid #000000!important;
			border-width:0 1px 1px 0 !important;
			}
			tr.headdetails {
			padding: 80px;
			height:80px;
			background: #ddd;

			}
			</style>
			</head>
			<body>
			<main>";

			$html .= "<table style='border-width:unset;border-style:unset;border-color:unset;margin-bottom:0;border-bottom:0;'>
			<thead>
			<tr>

			<th style='border:0;vertical-align: baseline;width: 30%;font-size:15px;float:right'><small>Page No: 1 of {nbpg}</small></th>
			</tr>
			<tr>

			<th style='border:0;width: 30%;padding-top:0;padding-bottom:0;font-size:30px;text-align:center'></th>
			<th style='border:0;width: 50%;padding-top:0;padding-bottom:0;font-size:25px;text-align:center'><h4> Estimate</h4></th>
			<th style='border:0;width: 20%;padding-top:0;padding-bottom:0;'></th>


			</tr>
			<tr>
			<th style='border:0;width: 10%;padding-top:0;padding-bottom:0;'></th>
			<th colspan='' style='border:0;padding:0;padding-bottom:0;width: 60%'></th>
			<th style='border:0;width: 10%;padding-top:0;padding-bottom:0;'></th>

			</tr>


			</thead>
			</table>";

			$html .= "<table cellspacing='0' cellpadding='0' style='border-width:0px;border-style:none;border-color:#000;margin-bottom:0;border-top:0;border-bottom:0;border-left:0;border-right:0;border:0;margin-bottom:5px'>
			<tbody>


			<tr style='padding-top:5px;padding-bottom:5px'>

			<td colspan='2' style='border:0;'></td>
			</tr>	</tbody>	</table>";

			$html .= "<table cellspacing='0' cellpadding='0' style='border-width:1px;border-style:solid;border-color:#000;margin-bottom:0;border-top:0;border-bottom:0;border-left:0;border-right:0;margin-bottom:5px'>
			<tbody>


			<tr>
				<td   style='width:60%;border-top:1px;border-width:1px;border-style:solid;border-color:#000;vertical-align:baseline;line-height:0;padding-top:2px;padding-left:6px;'>
					<table style='border-width:0px;border-style:solid;border-color:#000;margin-bottom:0;border-top:0;border-bottom:0;border-left:0;border-right:0;'>

					<tr><td  style='border:0;padding:0;padding-bottom:3px;font-size:17px'><p style='float:left'>Date:</p><p style='text-transform:uppercase;'></td><td style='border:0;padding:0;padding-bottom:3px;font-size:17px'>" . $date . "</p></td>

					</tr>
					<tr >
					<td  style='border:0;padding:0;padding-bottom:3px;font-size:17px'><p>Order:</p></td><td style='border:0;padding:0;padding-bottom:3px;font-size:17px'><p style='text-transform:uppercase;'><b>" . $sq_no . "</b></p></td>
					</tr>
					<tr >
					<td  style='border:0;padding:0;padding-bottom:3px;font-size:17px'><p>Customer Code:</p></td><td style='border:0;padding:0;padding-bottom:3px;font-size:17px'><p style='text-transform:uppercase;'>" . $cus_code . "</p></td>
					</tr>
					</table>
				</td>
				<td   style='font-size:17px;width:60%;vertical-align:baseline;line-height:0;padding-top:2px;padding-left:6px;border-width:1px;border-style:solid;border-color:#000;'><p>Customer Details : <b>" . $cus_name . "</b></p>
				<table style='border-width:0px;margin-bottom:0;border-top:0;border-bottom:0;border-left:0;border-right:0;'>

				<tr>
					<td colspan='2' style='border-left:0;border-right:0;border:0;padding:0;padding-bottom:3px;font-size:15px'></td><td style='border:0;padding:0;padding-bottom:3px;font-size:17px'></td>
					</tr>
					<tr>
				
					<td colspan='2' style='border:0;padding:0;padding-bottom:3px;font-size:15px'><p></p></td><td style='border:0;padding:0;padding-bottom:3px;font-size:15px'><p>" . $cus_address . " " . $cus_address_2 . " " . $cus_address_3 . " " . $stateName['state'] . "-" . $cus_fax . "</p></td>
					</tr>
					<tr>
					<td colspan='2' style='border:0;padding:0;padding-bottom:3px;font-size:15px'><p></p></td><td style='border:0;padding:0;padding-bottom:3px;font-size:15px'><p> <b>Mobile: </b>" . $cus_mob_no . "</p></td>
				</tr>

				</table>
			</td>



			</tbody>
			</table>
			";
			$html .= "<table style='border-width:1px;border-color:#000;margin-bottom:0;marign-top:80px' class='items'>";
			$html .= "	<thead>

			<tr class='headdetails' style='height:100px'><th style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;'><b>Item Type</b></th><th style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;'><b>Item</b></th><th style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;'><b>	Price Type</b></th><th style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;'><b>	Quantity</b></th><th style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;text-align:right'>	<b>Total</b>[<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</th>
			</tr>
			</thead>";
			$itemsTotal = 0;
			$html .= "<tbody>";

			for ($i = 0; $i < count($scproduct); $i++) {
			$j = $i + 1;
			$type = '';

			$typesname = '';
			if ($scproduct[$i]['types'] == 1) {
			$typesname = 'Commercial';
			} else {
			$typesname = 'Non Commercial';

			}
			$pricetypes = '';

			if ($scproduct[$i]['price_type'] == 1) {
			$pricetypes = 'First Copy';
			} else if ($scproduct[$i]['price_type'] == 2) {

			$pricetypes = 'Additional Copy';
			} 

			$orientation = '';
			if ($scproduct[$i]['orientation'] == 1) {
			$orientation = 'Length';
			} else if ($scproduct[$i]['orientation'] == 2) {
			$orientation = 'Breadth';

			}

			
			$html .= "	<tr>


					<td   style='text-transform:uppercase;padding-right: 5px;padding-top: 5px;padding-bottom:5px'>" . $scproduct[$i]['types_name'] . "  </td>
					<td  style='text-transform:uppercase;padding-right: 5px;padding-top: 5px;padding-bottom:5px'> " . htmlspecialchars_decode($scproduct[$i]['itemnames']) . "</td>
					<td  style='text-transform:uppercase;padding-right: 5px;padding-top: 5px;padding-bottom:5px'> " . $pricetypes . "</td>
					<td  style='text-transform:uppercase;padding-right: 5px;padding-top: 5px;padding-bottom:5px'> " . $scproduct[$i]['qty'] . "</td>

					<td  style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;text-align:right'>" . number_format($scproduct[$i]['final_total'], 2) . "</td>
					</tr>
					";
			if ($scproduct[$i]['final_total'] == '' || $scproduct[$i]['final_total'] == null) {
			$scproduct[$i]['final_total'] = 0;
			}
			$itemsTotal += $scproduct[$i]['final_total'];
			}

			if (empty($datas['gst_total'])) {
			$datas['gst_total'] = 0;
			}

			$gst_total = 0;
			if($datas['state'] ==33)
			{
			$gst_total = floatVal($datas['gst_total']) +  floatVal($datas['sgst_total']) ;

			}
			else{
			$gst_total = floatVal($datas['gst_total']);

			}

			$gstPlusTotal = $datas['item_total'] + $gst_total;
			$inword = $obj_nu->convertCurrencyToWords(sprintf("%01.2f", $datas['grand_total']));
			//$html .= "</tbody></table><table style='border-width:0px;border-style:none;border-color:#000;margin-bottom:0;border-bottom:0;border-top:0;marign-top:80px' class='items'><tbody>

			$html .= "<tr>

			<td style='padding-top: 5px;padding-bottom:5px;border-right:0  !important;border-bottom:0 !important;'></td>
			<td style='padding-top: 5px;padding-bottom:5px;border-right:0;border-bottom:0;border-left:0;'></td>
			<td style='padding-top: 5px;padding-bottom:5px;border-right:0;border-bottom:0;border-left:0;'></td>
			<td style='padding-top: 5px;padding-bottom:5px;border-right:0;border-bottom:0;border-left:0;'></td>
			<td style='padding-top: 5px;padding-bottom:5px;border-right:0;border-bottom:0;border-left:0;'></td></tr>";
			$html .= "<tr>

				<td style='border-right:0 !important;border-bottom:0 !important;'></td>
				<td style='border-right:0;border-bottom:0;border-left:0;'></td>
				<td style='border-right:0;border-bottom:0;border-left:0;'></td>

				<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>Sub Total [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
				<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . number_format($datas['item_total'], 2) . "</td>

			</tr>

			";

			if ($datas['discount_final'] > 0) {
			$symboltype = '';
			if ($datas['discount_type'] == 1) {
			$symboltype = '+';
			} else {
			$symboltype = '-';
			}
			$discount_final ='';
			if ($datas['caltype1'] == 2) {
			$discount_final = '(' . $datas['discount_final'] . '%)';
			}

			$html .= "<tr>
			<td style='border-right:0 !important;border-bottom:0 !important;'></td>
			<td style='border-right:0;border-bottom:0;border-left:0;'></td>
			<td style='border-right:0;border-bottom:0;border-left:0;'></td>

			<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . $datas['discount_field'] . " ".$discount_final." [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
				<td style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>[" . $symboltype . "] " . number_format($datas['discount_final_amt'], 2) . "</td>

			</tr>";
			}
			if ($datas['discount_final2'] > 0) {
			$symboltype2 = '';
			if ($datas['discount_type2'] == 1) {
			$symboltype2 = '+';
			} else {
			$symboltype2 = '-';
			}

			$discount_final2 ='';
			if ($datas['caltype2'] == 2) {
			$discount_final2 = '(' . $datas['discount_final2'] . '%)';
			}

			$html .= "<tr>
			<td style='border-right:0 !important;border-bottom:0 !important;'></td>
			<td style='border-right:0;border-bottom:0;border-left:0;'></td>
			<td style='border-right:0;border-bottom:0;border-left:0;'></td>

			<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . $datas['discount_field2'] . " " . $discount_final2. " [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
					<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>[" . $symboltype2 . "] " . number_format($datas['discount_final_amt2'], 2) . "</td>

				</tr>";
			}
			if ($datas['discount_final3'] > 0) {
			$symboltype3 = '';
			if ($datas['discount_type3'] == 1) {
			$symboltype3 = '+';
			} else {
			$symboltype3 = '-';
			}

			$discount_final3 ='';
			if ($datas['caltype3'] == 2) {
			$discount_final3 = '(' . $datas['discount_final3'] . '%)';
			}

			$html .= "<tr>
			<td style='border-right:0 !important;border-bottom:0 !important;'></td>
			<td style='border-right:0;border-bottom:0;border-left:0;'></td>
			<td style='border-right:0;border-bottom:0;border-left:0;'></td>

						<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . $datas['discount_field3'] . " " . $discount_final3 . " [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
						<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>[" . $symboltype3 . "] " . number_format($datas['discount_final_amt3'], 2) . "</td>

					</tr>";
			}
			if ($datas['discount_final4'] > 0) {
			$symboltype4 = '';
			if ($datas['discount_type4'] == 1) {
			$symboltype4 = '+';
			} else {
			$symboltype4 = '-';
			}

			$discount_final4 ='';
			if ($datas['caltype4'] == 2) {
			$discount_final4 = '(' . $datas['discount_final4'] . '%)';
			}

			
			}
			if ($datas['discount_final5'] > 0) {
			$symboltype5 = '';
			if ($datas['discount_type5'] == 1) {
			$symboltype5 = '+';
			} else {
			$symboltype5 = '-';
			}
			$discount_final5 ='';
			if ($datas['caltype5'] == 2) {
			$discount_final5 = '(' . $datas['discount_final5'] . '%)';
			}

			}
			$gst_total = 0;
			if($datas['state'] ==33)
			{
			//$gst_total = floatVal($datas['gst_total']) +  floatVal($datas['sgst_total']) 
			$html .= "<tr><td style='border-right:0 !important;border-bottom:0 !important;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'> CGST (" . $datas['gst_percent'] . "%) [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td><td style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . number_format($datas['gst_total'], 2) . "</td></tr><tr><td style='border-right:0 !important;border-bottom:0 !important;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'> SGST (" . $datas['sgst_percent'] . "%) [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td><td style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . number_format($datas['sgst_total'], 2) . "</td></tr>";

			}
			else{
			//$gst_total = floatVal($datas['gst_total']);
			$html .= "<tr><td style='border-right:0 !important;border-bottom:0 !important;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'> IGST (" . $datas['gst_percent'] . "%) [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>	<td style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . number_format($datas['gst_total'], 2) . "</td></tr>";
			}

			$html .= "<tr>
			<td rowspan='1' colspan='3' style='text-transform:uppercase;vertical-align:middle;padding-top:4px;padding-bottom:2px;'><img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />, In Words : " . $inword . " Only.</td>
			<td  colspan='1' style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px;border-top:1px solid #000000;'> <b>Grand Total</b>  [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
			<td colspan='1' style='text-transform:uppercase;border-top:1px solid #000000;padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'><b>" . $datas['grand_total'] . "</b></td>
			</tr>
			</tbody>
			</table>";
			$advanceSection='';
			if($datas['discount_final4'] !='0')
			{
			$advanceSection='Advanced Received Rs.'.$datas['discount_final4'];
			}
			$remarksSection="<table style='display: table;'>
			<tr><td style='border-right:0 !important;border-bottom:0 !important;padding-top:2px;padding-bottom:4px;font-size:12px'>Remarks:<br>".$datas['remark']."<br>".$advanceSection."</td></tr></table></body></html>";
			$html .= $remarksSection;

			
		
			ob_clean();
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->SetTitle('AV Digital Press '.$filename);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->WriteHTML($html);

			$mpdf->Output('../../files/order/'.$cus_name.'.pdf', 'F');
			

			$from_mail='cdsphp@gmail.com';
			$message=$_POST['txt_message_pop'];
			$subject ='test';


	 	$from =$_POST['txt_emailfrom_pop'];
       $to = $_POST['txt_emailto_pop'];
       $subject = 'Order PDF File  - '. $sq_no;
       $message = $_POST['txt_message_pop'];
       $file_type = 'pdf';

       //things u need
       $file = "../../files/order/".$cus_name.".pdf";
       $content = chunk_split(base64_encode(file_get_contents($file)));
       $uid = md5(uniqid(time()));  //unique identifier

       //standard mail headers
       $header = "From: ".$from."\r\n";
       $header .= "Reply-To: ".$replyto. "\r\n";
       $header .= "MIME-Version: 1.0\r\n";


       //declare multiple kinds of email (plain text + attch)
       $header .="Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n";
       $header .="This is a multi-part message in MIME format.\r\n";

       //plain txt part

       $header .= "--".$uid."\r\n";
       $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
       $header .= "Content-Transfer-Encoding: 7bit\r\n";
       $header .= $message. "\r\n";


       //attch part
       $header .= "--".$uid."\r\n";
       $header .= "Content-Type: ".$file_type."; name=\"".$cus_name.".pdf\"\r\n";
       $header .= "Content-Transfer-Encoding: base64\r\n";
       $header .= "Content-Disposition: attachment; filename=\"".$cus_name.".pdf\"\r\n";
       $header .= $content."\r\n";  //chucked up 64 encoded attch


       //sending the mail - message is not here, but in the header in a multi part

       if(mail($to, $subject, $message, $header)) {
       echo 1;
       
       }else {
           echo 0;
           echo error_get_last()['message'];
       }

	}
	if(isset($_POST['mode']) && $_POST['mode']=='sendPDFmailNonComm'){

		//error_reporting(E_ALL); 
		//ini_set('display_errors', 1);
		$data_id = $_POST['soid'];

		
		if (isset($data_id) && ($data_id != '')) {

			
		$redColor = [255, 0, 0];
		$obj_estimatecommornon->setpk_sale_order($data_id);
		$getSQId = $obj_estimatecommornon->getEstimateNonCommById($data_id);
		$datas = mysqli_fetch_array($getSQId);

		$company = $obj_estimatecommornon->EditCustomer();
		$companyData = mysqli_fetch_array($company);


		$getSQAddress = $obj_estimatecommornon->getEstimateNonCommAddressById($data_id);
		$sqaddress = mysqli_fetch_array($getSQAddress);

		$unitArr = array();
		$scproduct = array();
		$gradeArr = array();
		$getSCProducts = $obj_estimatecommornon->getEstimateNonCommProductByPROId($data_id);

		while ($datass = mysqli_fetch_array($getSCProducts)) {

		$unitArr[] = $datass['uom'];
		$obj_estimatecommornon->setpk_sale_order($data_id);
		$getSCProduct = $obj_estimatecommornon->getEstimateNonCommByIdForPDF($datass['PK_ESP_ID']);
		$product_id = $datass['product_id'];

		while ($data = mysqli_fetch_array($getSCProduct)) {

		if ($data['type_tables']) {
		$itemdata = $obj_estimatecommornon->getAllItemDataprint($data['table_pk_id'], $data['type_tables'], $data['fk_item_id']);
		$itemdataval = mysqli_fetch_array($itemdata);
		$data['itemname'] = $itemdataval['name'];
		} else {
		$data['itemname'] = 'Commercial';
		}

		//array_push($a,"blue","yellow");

		//    var_dump($itemdataval );
		$scproduct[] = $data;
		}
		}
		}
		
		$com_name = $companyData['com_name'];
		$address_street = $companyData['com_address'];
		$address_city = $companyData['com_city'];
		$address_state = $companyData['com_state'];
		$com_phone = $companyData['com_phone'];
		$address_fax = $companyData['com_fax'];
		$com_email_id = $companyData['com_email'];
		$com_website = $companyData['com_website'];
		$getCustomer = $obj_estimatecommornon->getCustomer($datas['customer_id']);
		$getCustomerdata = mysqli_fetch_array($getCustomer);
		//var_dump($getCustomerdata);
		//exit;
		$sq_no = $datas['sono'];
		$date = date('d-M-Y', strtotime($datas['created_on']));
		$cus_name = $getCustomerdata['cus_name'];
		$cus_code = $getCustomerdata['cus_code'];
		$cus_address =($getCustomerdata['cus_address'])? $getCustomerdata['cus_address']:'' ;
		$cus_address_2 = ($getCustomerdata['cus_address_2'])? ",".$getCustomerdata['cus_address_2']:'' ;
		$cus_address_3 = ($getCustomerdata['cus_address_3'])? ",".$getCustomerdata['cus_address_3']:'' ;
		$cus_email = $getCustomerdata['cus_email'];
		$cus_mob_no = $getCustomerdata['cus_mob_no'];
		$cus_gst_no = $getCustomerdata['cus_gst_no'];
		$cus_city = $getCustomerdata['cus_city'];
		$cus_state = $getCustomerdata['cus_state'];
		$cus_fax = $getCustomerdata['cus_fax'];

		$city= $obj_estimatecommornon->getCityName($cus_city);
		$state = $obj_estimatecommornon->getStateName($cus_state);

		$cityName = mysqli_fetch_array($city);
		$stateName = mysqli_fetch_array($state);

		$g_no = $datas['reference_no'];
		$sq_no = $datas['sono'];

		$date = date('d-M-Y', strtotime($datas['sale_date']));

		$shipmentfrom = $datas['shipment_from'];
		$shipmentto = $datas['shipment_to'];

		$sq_total_discount = number_format($datas['gst_total'], 2);
		$sq_total = number_format($datas['item_total'], 2);
		$sq_grand_total = number_format($datas['grand_total'], 2);
		$inword = $obj_nu->convertCurrencyToWords(sprintf("%01.2f", $datas['grand_total']));

		//var_dump( $scproduct);
		//exit;
		
		$terms_description = "
		<br>
		1. Goods under this  are supplied on your Account and Risk.<br>
		2. The amount of this Sales Quote should be paid on the due date else interest @18% per annum and applicable GST will be charged from the date of sales quote till the actual payment.<br>
		3. All payments should be made by RTGS/NEFT/A/c. payee cheque/Draft/irrevocable letter of credit drawn in favour of  AV Digital Press .<br>
		4. All claims for Goods lost or damaged in transit or discrepancies of any kind (including shortages in weight and non-delivery) must be made upon the carrier or insurance Company as applicable.<br>
		5. All disputes under this will be settled by Competent Court within the jurisdication of Madurai.<br>
		";

		//$mpdf=new mPDF('','', 0, '', 10, 10, 70, 15, 10, 10, 'A4-L');

		$html = "<html><head>
		<style>
		.clearfix:after {
		content: '';
		display: table;
		clear: both;
		}
	
		a {
		color: #5D6975;
		text-decoration: underline;
		}
	
		body {
		color: #001028;
		background: #FFFFFF;
		font-family: Arial, sans-serif;
		font-size: 1px;
		font-family: Arial;
		text-transform: uppercase;
		}
	
		table {
		width: 100%;
		border-collapse: collapse;
		border-spacing: 0;
		border:1px solid #000000!important;
	
		}
	
	
		table th,
		table td {
		text-align: center;
		}
	
		table th {
			color: #000;
			border:1px solid #000000!important;
			white-space: nowrap;
			font-weight: normal;
			text-align: left;
			padding-left: 6px;
			padding-right: 6px;
		}
	
	
		table td {
		padding-left: 6px;
		text-align: left;
		border:1px solid #000000!important;
		text-transform: uppercase;
		}
	
		table td table tr td {
		font-size:12px;
		text-transform: uppercase;
		}
	
		table p{
			margin:5px 0;
		}
	
		table.items thead tr th{
			font-size:12px;
			text-transform: uppercase;
		}
		table.items tbody tr td{
			font-size:12px;
			padding-bottom:1px;
			text-transform: uppercase;
		}
		th, td {
			border:1px solid #000000!important;
			border-width:0 1px 1px 0 !important;
		}
		tr.headdetails {
			padding: 80px;
		height:80px;
			  background: #ddd;
	
		  }
		</style>
		</head>
		<body>
		<main>";
	
	$html .= "<table style='border-width:unset;border-style:unset;border-color:unset;margin-bottom:0;border-bottom:0;'>
				<thead>
				<tr>
	
				<th style='border:0;vertical-align: baseline;width: 30%;font-size:15px;float:right'><small>Page No: 1 of {nbpg}</small></th>
			</tr>
		
			<tr>
			<th style='border:0;width: 10%;padding-top:0;padding-bottom:0;'></th>
			<th colspan='' style='border:0;padding:0;padding-bottom:0;width: 60%'></th>
			<th style='border:0;width: 10%;padding-top:0;padding-bottom:0;'></th>
	
			</tr>
	
	
				</thead>
			</table>";
	
	/*$html .= "<table style='border:0;marign-top:80px;'>
	<tr >
	
	<td style='border:0;margin-top:15px;padding-bottom:0;text-align:center;'><img src='data:image/png;base64," . base64_encode($generator->getBarcode($sq_no, $generator::TYPE_CODE_128)) . "' style='margin:20px;height: 60px;    width: 304px;'>
	</td>    </tr>
	
	</table>";
	 */
	$html .= "<table cellspacing='0' cellpadding='0' style='border-width:0px;border-style:none;border-color:#000;margin-bottom:0;border-top:0;border-bottom:0;border-left:0;border-right:0;border:0;margin-bottom:5px'>
					<tbody>
					
	
					<tr><td  colspan='3' style='border-top:0;border-bottom:0;border-left:0;border-right:0;line-height:0;padding-top:2px;padding-left:6px;text-align:center'>
	
		
		
					</td>
		
		
				</tr>
				<tr style='padding-top:5px;padding-bottom:5px'>
	
				<td style='border:0;padding-top:5px;padding-bottom:0px;font-size:30px;text-align:center'></td>
				<td style='border:0;padding-top:5px;padding-bottom:0px;font-size:18px;text-align:center'><h4> Estimate</h4></td>
				<td style='border:0;padding-top:5px;padding-bottom:0px;'></td>
	
	
				</tr>
	
							</tbody>	</table>";
	
	$html .= "<table cellspacing='0' cellpadding='0' style='border-width:1px;border-style:solid;border-color:#000;margin-bottom:0;margin-bottom:5px'>
					<tbody>
	
	
					<tr>
					<td   style='width:60%;border-top:1px;border-width:1px;border-style:solid;border-color:#000;vertical-align:baseline;line-height:0;padding-top:2px;padding-left:6px;'>
						<table style='border-width:0px;border-style:solid;border-color:#000;margin-bottom:0;border-top:0;border-bottom:0;border-left:0;border-right:0;'>
	
						<tr><td  style='border:0;padding:0;padding-bottom:3px;font-size:17px'><p style='float:left'>Date:</p><p style='text-transform:uppercase;'></td><td style='border:0;padding:0;padding-bottom:3px;font-size:17px'>" . $date . "</p></td>
	
						</tr>
						<tr >
						<td  style='border:0;padding:0;padding-bottom:3px;font-size:17px'><p>Order:</p></td><td style='border:0;padding:0;padding-bottom:3px;font-size:17px'><p style='text-transform:uppercase;'><b>" . $sq_no . "</b></p></td>
						</tr>
						<tr >
						<td  style='border:0;padding:0;padding-bottom:3px;font-size:17px'><p>Customer Code:</p></td><td style='border:0;padding:0;padding-bottom:3px;font-size:17px'><p style='text-transform:uppercase;'>" . $cus_code . "</p></td>
						</tr>
						</table>
					</td>
					<td   style='font-size:17px;width:60%;vertical-align:baseline;line-height:0;padding-top:2px;padding-left:6px;border-width:1px;border-style:solid;border-color:#000;'><p>Customer Details : <b>" . $cus_name . "</b></p>
					<table style='border-width:0px;margin-bottom:0;border-top:0;border-bottom:0;border-left:0;border-right:0;'>
	
					<tr>
						<td colspan='2' style='border-left:0;border-right:0;border:0;padding:0;padding-bottom:3px;font-size:15px'></td><td style='border:0;padding:0;padding-bottom:3px;font-size:17px'></td>
						</tr>
						<tr>
					
						<td colspan='2' style='border:0;padding:0;padding-bottom:3px;font-size:15px'><p></p></td><td style='border:0;padding:0;padding-bottom:3px;font-size:15px'><p>" . $cus_address . " " . $cus_address_2 . " " . $cus_address_3 . " " . $stateName['state'] . "-" . $cus_fax . "</p></td>
						</tr>
						<tr>
						<td colspan='2' style='border:0;padding:0;padding-bottom:3px;font-size:15px'><p></p></td><td style='border:0;padding:0;padding-bottom:3px;font-size:15px'><p> <b>Mobile: </b>" . $cus_mob_no . "</p></td>
					</tr>
							</table>
						</td>
	
	
	
					</tbody>
				</table>
				";
	$html .= "<table style='border-width:1px;border-color:#000;margin-bottom:0;marign-top:80px' class='items'>";
	$html .= "	<thead>
	
						<tr class='headdetails' style='height:100px'><th style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;'><b>ItemType</b></th><th style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;'><b>	Item</b></th><th style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;'><b>	Orientation</b></th><th style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;'><b>Price Type</b></th><th style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;'><b>	Quantity</b></th><th style='padding-right: 5px;padding-top: 5px;padding-bottom:5px;text-align:right'>	<b>Total</b>[<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</th>
						</tr>
						</thead>";
	$itemsTotal = 0;
	$html .= "<tbody>";
	
	for ($i = 0; $i < count($scproduct); $i++) {
		$j = $i + 1;
		$type = '';
	
		$typesname = '';
		if ($scproduct[$i]['types'] == 1) {
			$typesname = 'Commercial';
		} else {
			$typesname = 'Non Commercial';
	
		}
	
		$pricetypes = '';
		
		if($scproduct[$i]['itemtype']==4 || $scproduct[$i]['itemtype']==5)
		{
			if ($scproduct[$i]['price_type'] == 1) {
				$pricetypes = ' 4 Color ';
			} else if ($scproduct[$i]['price_type'] == 2) {
				$pricetypes = '7 Color ';
		
			} 
		}
	
	
		$orientation = '';
		if ($scproduct[$i]['orientation'] == 1) {
			$orientation = 'Length';
		} else if ($scproduct[$i]['orientation'] == 2) {
			$orientation = 'Breadth';
	
		}
	
		/*$html.=""ce (<img src='../assets/images/RS.png' style='width: 13px;height: 8px;'  />)</b></th>
	
		<th style=''><b>Items     <thead>
		<tr>
		<th style='padding-top:4px;padding-bottom:4px;'><b>S.No</b></th>
		<th style='padding-top:4px;padding-bottom:4px;'><b>Product Name / Model No</b></th>
		<th style=''><b>Inner Sheet</b></th>
		<th style=''><b>Special Effects</b></th>
		<th style=''><b> Size</b></th>
		<th style=''><b>Quantity</b></th>
		<th style=''><b>PriAmount (<img src='../assets/images/RS.png' style='width: 13px;height: 8px;'  />)</b></th>
	
		</tr>
		</thead>*/
		if($scproduct[$i]['fk_items_id'] > 0)
		{
		$html .= "	<tr>
	
	
								<td   style='padding-bottom: 5px;padding-top: 5px;text-transform:uppercase;padding-right: 5px'>" . $scproduct[$i]['types_name'] . "</td> <td   style='padding-bottom: 5px;padding-top: 5px;text-transform:uppercase;padding-right: 5px'>" . htmlspecialchars_decode($scproduct[$i]['itemnames']) . " </td>
								<td  style='padding-bottom: 5px;padding-top: 5px;text-transform:uppercase;padding-right: 5px'> " . $orientation . "</td>
	
								<td  style='padding-bottom: 5px;padding-top: 5px;text-transform:uppercase;padding-right: 5px'> " . $pricetypes . "</td>
								<td  style='padding-bottom: 5px;padding-top: 5px;text-transform:uppercase;padding-right: 5px'> " . $scproduct[$i]['qty'] . "</td>
								<td  style='padding-bottom: 5px;padding-top: 5px;padding-right: 5px;text-align:right'>" . number_format($scproduct[$i]['final_total'], 2) . "</td>
								</tr>
								";
		}
		if ($scproduct[$i]['final_total'] == '' || $scproduct[$i]['final_total'] == null) {
			$scproduct[$i]['final_total'] = 0;
		}
		$itemsTotal += $scproduct[$i]['final_total'];
	}
	
	if (empty($datas['gst_total'])) {
		$datas['gst_total'] = 0;
	}
	
	$gst_total = 0;
	if($datas['state'] ==33)
	{
		$gst_total = floatVal($datas['gst_total']) +  floatVal($datas['sgst_total']) ;
		
	}
	else{
		$gst_total = floatVal($datas['gst_total']);
		
	}
	
	$gstPlusTotal = $datas['item_total'] + $gst_total;
	$inword = $obj_nu->convertCurrencyToWords(sprintf("%01.2f", $datas['grand_total']));
	//$html .= "</tbody></table><table style='border-width:0px;border-style:none;border-color:#000;margin-bottom:0;border-bottom:0;border-top:0;marign-top:80px' class='items'><tbody>
	
	$html .= "<tr>
	
	<td style='padding-top: 5px;padding-bottom: 5px;border-right:0  !important;border-bottom:5px; !important;'></td>
	<td style='padding-top: 5px;padding-bottom: 5px;border-right:0;border-bottom:5px;border-left:0;'></td>
	<td style='padding-top: 5px;padding-bottom: 5px;border-right:0;border-bottom:5px;border-left:0;'></td>
	<td style='padding-top: 5px;padding-bottom: 5px;border-right:0;border-bottom:5px;border-left:0;'></td></tr>";
	/*$html .= "<tr>
	
							<td style='border-right:0 !important;border-bottom:0 !important;'></td>
							<td style='border-right:0;border-bottom:0;border-left:0;'></td>
							<td style='border-right:0;border-bottom:0;border-left:0;'></td>
							<td style='border-right:0;border-bottom:0;border-left:0;'></td>
	
							<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>Sub Total [<img src='../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
							<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . number_format($datas['item_total'], 2) . "</td>
	
						</tr>
	
						";*/
	
	if ($datas['discount_final'] > 0) {
		$symboltype = '';
		if ($datas['discount_type'] == 1) {
			$symboltype = '+';
		} else {
			$symboltype = '-';
		}
		$discount_final ='';
		if ($datas['caltype1'] == 2) {
			$discount_final = '(' . $datas['discount_final'] . '%)';
		}
		
		$html .= "<tr>
						<td style='border-right:0 !important;border-bottom:0 !important;'></td>
						<td style='border-right:0;border-bottom:0;border-left:0;'></td>
						<td style='border-right:0;border-bottom:0;border-left:0;'></td>
						<td style='border-right:0;border-bottom:0;border-left:0;'></td>
	
						<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . $datas['discount_field'] . " ".$discount_final." [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
							<td style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>[" . $symboltype . "] " . number_format($datas['discount_final_amt'], 2) . "</td>
	
						</tr>";
	}
	if ($datas['discount_final2'] > 0) {
		$symboltype2 = '';
		if ($datas['discount_type2'] == 1) {
			$symboltype2 = '+';
		} else {
			$symboltype2 = '-';
		}
	
		$discount_final2 ='';
		if ($datas['caltype2'] == 2) {
			$discount_final2 = '(' . $datas['discount_final2'] . '%)';
		}
	
		$html .= "<tr>
		<td style='border-right:0 !important;border-bottom:0 !important;'></td>
		<td style='border-right:0;border-bottom:0;border-left:0;'></td>
		<td style='border-right:0;border-bottom:0;border-left:0;'></td>
		<td style='border-right:0;border-bottom:0;border-left:0;'></td>
	
						<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . $datas['discount_field2'] . " " . $discount_final2. " [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
								<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>[" . $symboltype2 . "] " . number_format($datas['discount_final_amt2'], 2) . "</td>
	
							</tr>";
	}
	if ($datas['discount_final3'] > 0) {
		$symboltype3 = '';
		if ($datas['discount_type3'] == 1) {
			$symboltype3 = '+';
		} else {
			$symboltype3 = '-';
		}
	
		$discount_final3 ='';
		if ($datas['caltype3'] == 2) {
			$discount_final3 = '(' . $datas['discount_final3'] . '%)';
		}
	
		$html .= "<tr>
		<td style='border-right:0 !important;border-bottom:0 !important;'></td>
		<td style='border-right:0;border-bottom:0;border-left:0;'></td>
		<td style='border-right:0;border-bottom:0;border-left:0;'></td>
		<td style='border-right:0;border-bottom:0;border-left:0;'></td>
	
									<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . $datas['discount_field3'] . " " . $discount_final3 . " [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
									<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>[" . $symboltype3 . "] " . number_format($datas['discount_final_amt3'], 2) . "</td>
	
								</tr>";
	}
	if ($datas['discount_final4'] > 0) {
		$symboltype4 = '';
		if ($datas['discount_type4'] == 1) {
			$symboltype4 = '+';
		} else {
			$symboltype4 = '-';
		}
	
		$discount_final4 ='';
		if ($datas['caltype4'] == 2) {
			$discount_final4 = '(' . $datas['discount_final4'] . '%)';
		}
	
	   /* $html .= "<tr>
		<td style='border-right:0 !important;border-bottom:0 !important;'></td>
						<td style='border-right:0;border-bottom:0;border-left:0;'></td>
						<td style='border-right:0;border-bottom:0;border-left:0;'></td>
	
										<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . $datas['discount_field4'] . " " . $discount_final4 . " [<img src='../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
										<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>[" . $symboltype4 . "] " . number_format($datas['discount_final_amt4'], 2) . "</td>
	
									</tr>";*/
	}
	if ($datas['discount_final5'] > 0) {
		$symboltype5 = '';
		if ($datas['discount_type5'] == 1) {
			$symboltype5 = '+';
		} else {
			$symboltype5 = '-';
		}
		$discount_final5 ='';
		if ($datas['caltype5'] == 2) {
			$discount_final5 = '(' . $datas['discount_final5'] . '%)';
		}
	
	   /* $html .= "<tr>
		<td style='border-right:0 !important;border-bottom:0 !important;'></td>
		<td style='border-right:0;border-bottom:0;border-left:0;'></td>
		<td style='border-right:0;border-bottom:0;border-left:0;'></td>
	
											<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . $datas['discount_field5'] . "" .$discount_final5." [<img src='../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
											<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>[" . $symboltype5 . "] " . number_format($datas['discount_final_amt5'], 2) . "</td>
	
										</tr>";*/
	}
	
	$gst_total = 0;
	if($datas['state'] ==33)
	{
		//$gst_total = floatVal($datas['gst_total']) +  floatVal($datas['sgst_total']) 
	//	$html .= "<tr><td style='border-right:0 !important;border-bottom:0 !important;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td>	<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'> CGST (" . $datas['gst_percent'] . "%) [<img src='../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>	<td style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . number_format($datas['gst_total'], 2) . "</td>	</tr><tr><td style='border-right:0 !important;border-bottom:0 !important;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'> SGST (" . $datas['sgst_percent'] . "%) [<img src='../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td><td style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . number_format($datas['sgst_total'], 2) . "</td></tr>";
		
	}
	else{
		//$gst_total = floatVal($datas['gst_total']);
	//	$html .= "<tr><td style='border-right:0 !important;border-bottom:0 !important;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td><td style='border-right:0;border-bottom:0;border-left:0;'></td>	<td  style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px;'>IGST (" . $datas['gst_percent'] . "%) [<img src='../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>	<td style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>" . number_format($datas['gst_total'], 2) . "</td></tr>";
		
	}
	
	$html .= "<tr>
	
						<td rowspan='1' colspan='3' style='text-transform:uppercase;vertical-align:middle;padding-top:4px;padding-bottom:2px;'><img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />, In Words : " . $inword . " Only.</td>
						<td  colspan='2' style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px;border-top:1px solid #000000;'> <b>Grand Total</b>  [<img src='../../../assets/images/RS.png' style='width: 13px;height: 8px;'  />]</td>
						<td colspan='1' style='text-transform:uppercase;border-top:1px solid #000000;padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'><b>" . $datas['grand_total'] . "</b></td>
	
					</tr>
	
					
					</tbody>
				</table>";
			
				$advanceSection='';
				if($datas['discount_final4'] !='0')
				{
					$advanceSection='Advanced Received Rs.'.$datas['discount_final4'];
				}
				
				$remarksSection="<table style='display: table;'>
				<tr><td style='border-right:0 !important;border-bottom:0 !important;padding-top:2px;padding-bottom:4px;font-size:12px'>Remarks:<br>".$datas['remark']."<br>".$advanceSection."</td></tr></table></body></html>";
				$html .= $remarksSection;
				
	
	
	//var_dump($html);
	//exit;
	ob_clean();
	//$filename="Sales Order";
	//$mpdf= new \Mpdf\MpdfmPDF('utf-8','A5-L');
	
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->SetTitle('AV Digital Press '.$filename);
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($html);

		$mpdf->Output('../../files/order/'.$cus_name.'.pdf', 'F');
		

		$from_mail='cdsphp@gmail.com';
		$message=$_POST['txt_message_pop'];
		$subject ='test';


	 $from =$_POST['txt_emailfrom_pop'];
   $to = $_POST['txt_emailto_pop'];
   $subject = 'Order PDF File  - '. $sq_no;
   $message = $_POST['txt_message_pop'];
   $file_type = 'pdf';

   //things u need
   $file = "../../files/order/".$cus_name.".pdf";
   $content = chunk_split(base64_encode(file_get_contents($file)));
   $uid = md5(uniqid(time()));  //unique identifier

   //standard mail headers
   $header = "From: ".$from."\r\n";
   $header .= "Reply-To: ".$replyto. "\r\n";
   $header .= "MIME-Version: 1.0\r\n";


   //declare multiple kinds of email (plain text + attch)
   $header .="Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n";
   $header .="This is a multi-part message in MIME format.\r\n";

   //plain txt part

   $header .= "--".$uid."\r\n";
   $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
   $header .= "Content-Transfer-Encoding: 7bit\r\n";
   $header .= $message. "\r\n";


   //attch part
   $header .= "--".$uid."\r\n";
   $header .= "Content-Type: ".$file_type."; name=\"".$cus_name.".pdf\"\r\n";
   $header .= "Content-Transfer-Encoding: base64\r\n";
   $header .= "Content-Disposition: attachment; filename=\"".$cus_name.".pdf\"\r\n";
   $header .= $content."\r\n";  //chucked up 64 encoded attch


   //sending the mail - message is not here, but in the header in a multi part

   if(mail($to, $subject, $message, $header)) {
   echo 1;
   
   }else {
	   echo 0;
	   echo error_get_last()['message'];
   }

}
mysqli_close($GLOBALS["___mysqli_ston"]);
	?>