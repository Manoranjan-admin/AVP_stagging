<?php
include("includes/db_config.php");
include("assets/mpdf/mpdf.php");
ob_start();

$pdf=new \Mpdf\Mpdf(['mode' => 'fullpage','margin_top' => 10, 'format' => 'A4', 'orientation' => 'L']);
$pdf->useSubstitutions = false;
$pdf->simpleTables = true;
$pdf->packTableData = true;
$pdf->autoScriptToLang = true;
$pdf->baseScript = 1;
$pdf->autoVietnamese = true;
$pdf->autoArabic = true;
$pdf->autoLangToFont = true;
$pdf->showWatermarkText = true;
$pdf->use_kwt = true; 
$html_contact = '<style>
	.clearfix:after {
	content: "";
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
	font-size: 12px; 
	font-family: Arial;
	text-transform: uppercase;
	}

	table {
	width: 100%;
	border-collapse: collapse;
	border-spacing: 0;
	}


	table th,
	table td {
	text-align: center;
	}

	table th {
		color: #000;
		border: 1px solid #000000;
		white-space: nowrap;
		font-weight: normal;
		text-align: left;
		padding-left: 6px;
		padding-right: 6px;
	}


	table td {
	padding-left: 6px;
	text-align: left;
	border: 1px solid #000;
	text-transform: uppercase;
	}

	table td table tr td {
	font-size:9px;
	text-transform: uppercase;
	}

	table p{
		margin:5px 0;
	}

	table.items thead tr th{
		font-size:8px;
		text-transform: uppercase;
	}
	table.items tbody tr td{
		font-size:8px;
		padding-bottom:1px;
		text-transform: uppercase;
	}
	th, td {
		border:solid #000 !important;
		border-width:0 1px 1px 0 !important;
	}
	</style>
<pagefooter name="footer" content-center="{PAGENO}"></pagefooter><setpagefooter value="off"></setpagefooter><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ERP INVOICE</title>
</head>
<body>';


$html_contact.= "
		<table style='border-width:1px;border-style:solid;border-color:#000;margin-bottom:0;border-bottom:0;'>
			<thead>
				<tr>
					<th style='border:0;width: 18%;padding-top:0;padding-bottom:0;'><img src='".SO_LOGO."' style='width: 150px;height:35px;'/></th>
					<th style='border:0;text-align: center;width:72%;'><h2>SALES ORDER</h2></th>
					<th style='border:0;vertical-align: baseline;width: 10%;'><small>Page No: {PAGENO} of {nb}</small></th>
				</tr>
			</thead>
		</table>";
	
	$html_contact.="<table cellspacing='0' cellpadding='0' style='border-width:1px;border-style:solid;border-color:#000;margin-bottom:0;border-top:0;'>
				<tbody>
					<tr>
						<td style='border-top:0;vertical-align:baseline;line-height:0;padding-top:2px;padding-left:6px;'>
							<table cellspacing='0' cellpadding='0'>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;font-size:12px;'><b>Seller Details</b></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>Name:</b></p></td>
									<td colspan='2' style='border:0;padding:0;text-transform:uppercase;padding-bottom:2px;padding-left:10px;'><p>".SELLER_NAME."</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;vertical-align:baseline;'><p><b>Address:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;vertical-align:baseline;'><p style='text-transform:uppercase;'>".SELLER_ADDRESS."</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>City:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>".SELLER_CITY."</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>State:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>".SELLER_STATE."</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;text-transform: uppercase;'><p><b>Pincode:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:capitalize;text-transform: uppercase;'>".SELLER_PINCODE."</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:0px;'><p><b>Phone:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:0px;padding-left:10px;'><p style='text-transform:uppercase;'>".SELLER_PHONE."</p></td>
								</tr>
							</table>
						</td>
						<td style='border-top:0;vertical-align:baseline;line-height:0;padding-top:2px;padding-left:6px;'>
							<table>
							
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>Seller Code: </b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>".SELLER_CODE."</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>Seller GST No: </b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>".SELLER_GST_NO."</p></td>
								</tr>
								
							</table>
						</td>
						<td  style='border-top:0;vertical-align:baseline;border-bottom:0;line-height:0;padding-top:2px;padding-left:6px;' rowspan='2'>
							<table>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;font-size:12px'><p><b>Sales Order No:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;font-size:12px;padding-left:10px;'><p style='text-transform:uppercase;'>sq_no</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>Date:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>date</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>Reference No:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>g_no</p></td>
								</tr>
								
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>Customer PO Number :</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>customer_po_number</p></td>
								</tr>
								
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>Customer PO Date:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>podate</p></td>
								</tr>
								
								
							</table>
						</td>
					</tr>
					<tr>
						<td style='border-top:0;border-bottom:0;vertical-align:baseline;line-height:0;padding-top:2px;padding-left:6px;'>
							<table>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;font-size:12px'><b>Recipient Details</b></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>Name:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>cus_name</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;vertical-align:baseline;'><p><b>Address:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;vertical-align:baseline;'><p style='text-transform:uppercase;'>cus_address</p></td>
								</tr>
								<tr>
								<td colspan='2' style='border:0;padding:0;padding-bottom:2px;vertical-align:baseline;'><p><b>City:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;vertical-align:baseline;'><p style='text-transform:uppercase;'>city</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>State:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>state_name</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>Address with Pincode:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p>cus_address_3</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>Phone:</b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>cus_phone</p></td>
								</tr>
								
								
							</table>
						</td>
						<td style='border-top:0;border-bottom:0;vertical-align:baseline;padding-top:2px;padding-left:6px;'>
							<table>
							
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b>Recipient Code:</b></p></td>
									<td colspan='2' style='border:0;text-transform:uppercase;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>cus_code</p></td>
								</tr>
								<tr>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;'><p><b> Recipient GST No: </b></p></td>
									<td colspan='2' style='border:0;padding:0;padding-bottom:2px;padding-left:10px;'><p style='text-transform:uppercase;'>cus_gst_no</p></td>
								</tr>
								
							</table>
						</td>
					</tr>
				</tbody>
			</table>
			<table style='border-width:1.2px;border-style:solid;border-color:#000;margin-bottom:0;border-bottom:0;'>
				<thead>
					<tr>
						<th style='padding: 2px 10px;border-right:0;font-size:11px;'><p style='text-transform:uppercase;'>Despatch From: shipmentfrom</p></th>
						<th style='padding: 2px 10px;border-left:0;font-size:11px;'><p style='text-transform:uppercase;'>Despatch To: shipmentto</p></th>
					</tr>
				</thead>
			</table>";
	
			$html_contact.="<table style='border-width:0px;border-style:solid;border-color:#000;margin-bottom:0;border-bottom:0;border-top:0;' class='items'>
			<thead>
				<tr>
					<th style='padding-top:4px;padding-bottom:4px;'><b>S.No</b></th>
					<th style='padding-top:4px;padding-bottom:4px;'><b>Product Name / Model No</b></th>
					<th style=''><b>HSN</b></th>
					<th style=''><b>Grade</b></th>
					<th style=''><b>Quantity</b></th>
					<th style=''><b>UOM</b></th>
					<th style=''><b>Price (<img src='".SO_CURRENCY."' style='width: 13px;height: 8px;'  />)</b></th>
					<th style=''><b>Items Amount (<img src='".SO_CURRENCY."' style='width: 13px;height: 8px;'  />)</b></th>
					<th style=''><b>CGST Amount (<img src='".SO_CURRENCY."' style='width: 13px;height: 8px;'  />)</b></th>
					<th style=''><b>SGST Amount (<img src='".SO_CURRENCY."' style='width: 13px;height: 8px;'  />)</b></th>
					<th style=''><b>IGST Amount (<img src='".SO_CURRENCY."' style='width: 13px;height: 8px;'  />)</b></th>
					
			</tr>
		</thead>
		<tbody>";
						$html_contact .="<tr>
							<td style='border-top: 0;border-bottom:0;text-transform:uppercase;padding-right: 10px;padding-top: 2px;padding-bottom:2px'>1</td>
							<td style='border-top: 0;border-bottom:0;text-transform:uppercase;padding-right: 10px;padding-top: 2px;padding-bottom:2px'>Sono</td>
							
							<td style='border-top: 0;border-bottom:0;text-transform:uppercase;padding-right: 10px;padding-top: 2px;padding-bottom:2px'>hsn</td>
							<td style='text-transform:uppercase;border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'>gradeArr</td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'>sop_quantity</td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'>unit</td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px;text-align:right'>sop_unit_price</td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px;text-align:right'>sop_sub_total</td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px;text-align:right'>sop_CGST_amount</td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px;text-align:right'>sop_SGST_amount</td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px;text-align:right'>sop_IGST_amount</td>
							
						</tr>";
					$html_contact .="
							<tr>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'></td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'></td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'></td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'></td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'></td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'></td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'></td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'></td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'></td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'></td>
							<td style='border-top: 0;border-bottom:0;padding-right: 10px;padding-top: 2px;padding-bottom:2px'></td>
							</tr>
						";
				$html_contact.="
					<tr>
					
						<td style='border-right:0;border-bottom:0'></td>
						<td style='border-right:0;border-bottom:0'></td>
						<td style='border-right:0;border-bottom:0'></td>
						<td style='border-right:0;border-bottom:0'></td>
						<td style='border-right:0;border-bottom:0'></td>
						<td style='border-right:0;border-bottom:0'></td>
						<td style='border-right:0;border-bottom:0'></td>
						<td style='border-right:0;'></td>
						<td colspan='2' style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>Items Total [<img src='../../images/RS.png' style='width: 13px;height: 8px;'  />]</td>
						<td colspan='1' style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>so_item_total</td>
						
					</tr>
					<tr>
						
						<td style='border-right:0'></td>
						<td style='border-right:0'></td>
						<td style='border-right:0'></td>
						<td style='border-right:0'></td>
						<td style='border-right:0;'></td>
						<td style='border-right:0;'></td>
						<td style='border-right:0;'></td>
						<td style='border-right:0;'></td>
						<td colspan='2' style='border-top:0;padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>Total GST [<img src='../../images/RS.png' style='width: 13px;height: 8px;'  />]</td>
						<td colspan='1' style='border-top:0;text-transform:uppercase;border-bottom:1px solid #000000;padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'>so_gst_total</td>
						
					</tr>
				
					<tr >
						<td rowspan='12' colspan='8' style='text-transform:uppercase;vertical-align:middle;padding-top:4px;padding-bottom:2px;'><img src='../../images/RS.png' style='width: 13px;height: 8px;'  />, In Words : inword Only.</td>
					</tr>";
						
			$html_contact.="<tr >	
						<td colspan='2' style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'><b>Grand Total [<img src='../../images/RS.png' style='width: 13px;height: 8px;'  />]</b></td>
						<td colspan='1' style='padding-top:2px;padding-bottom:2px;text-align:right;padding-right: 4px'><b>so_total_amount</td>
					</tr>
				</tbody>
			</table>
		<table>
			<tbody>
				<tr>
					<td style='vertical-align:baseline;padding-top:2px;padding-left:4px;width:20%;' rowspan='3' >Payment Terms: pt</td>
				</tr>
				<tr>
					<td style='padding-bottom:2px;text-transform:uppercase;padding-top:2px;font-size:9px;vertical-align:baseline;'>Terms and Conditions:<span style='font-size:8px'>fk_terms_conditions_id</span></td>
					<td style='vertical-align:baseline;padding-top:2px;padding-left:4px;width:33.6%;padding-bottom:35px;' rowspan='3'>Signature</td>
				</tr>
				
				<tr>
					<td style='padding-bottom:2px;vertical-align:baseline;font-size:8px;text-transform: uppercase;' ><span style='font-size:8px'> terms_description</span></td>
				</tr>
				
			</tbody>
		</table>";
	$html_contact.= '</body></html>';

	//echo $html;
/*$pdf->setFooter("Page {PAGENO} of {nb}");
$pdf->SetHTMLFooter('<table width="100%">
    <tr> 
        <td width="50%" style="text-align: right;">Page {PAGENO} of {nb}</td>
    </tr>
</table>');*/
echo $html_contact;
//exit;
$html_contact = mb_convert_encoding($html_contact, 'UTF-8', 'UTF-8');
$pdf-> WriteHTML($html_contact);

ob_end_clean();
$pdf->Output('Invoice.pdf','I');
$content = $pdf->Output('', 'S');


exit;
//ob_start();
$pdf=new \Mpdf\Mpdf(['mode' => 'fullpage','margin_top' => 55, 'format' => 'A4', 'orientation' => 'L']);
$pdf->useSubstitutions = false;
$pdf->simpleTables = true;
$pdf->packTableData = true;
$pdf->autoScriptToLang = true;
$pdf->baseScript = 1;
$pdf->autoVietnamese = true;
$pdf->autoArabic = true;
$pdf->autoLangToFont = true;
$pdf->showWatermarkText = true;
$pdf->use_kwt = true; 
$html_contact = '
<pagefooter name="footer" content-center="{PAGENO}"></pagefooter><setpagefooter value="off"></setpagefooter><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ERP INVOICE</title>
</head>
<body>';
$html_contact.= '<table class="table" style="width:100%;margin:0;"><tbody>';
$html_contact.= '<tr>
                </tr>';
$html_contact.= '</tbody></table></body></html>';
/*$pdf->setFooter("Page {PAGENO} of {nb}");
$pdf->SetHTMLFooter('<table width="100%">
    <tr> 
        <td width="50%" style="text-align: right;">Page {PAGENO} of {nb}</td>
    </tr>
</table>');*/
echo $html_contact;

exit;
$html_contact = mb_convert_encoding($html_contact, 'UTF-8', 'UTF-8');
$pdf-> WriteHTML($html_contact);

ob_end_clean();
$pdf->Output('Invoice.pdf','I');
$content = $pdf->Output('', 'S');
mysqli_close($GLOBALS["___mysqli_ston"]);
?>