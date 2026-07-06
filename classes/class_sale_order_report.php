<?php
class Sale_order {
	public $pk_sale_order;
	public $sono;
	public $fk_so_id;
	public $sale_date;
	public $customer_id;
	public $reference_number;
	public $shipment_from;
	public $shipment_to;
	public $product_id;
	public $category_id;
	public $innersheet;
	public $specialeffects;
	public $types_id;
	public $item_id;
	public $qty;
	public $price;
	public $total;
	public $cgst;
   	public $cgst_amt;
   	public $sgst;
   	public $sgst_amt;
   	public $igst;
   	public $igst_amt;
   	public $final_total;
   	public $item_total;
   	public $cgst_final;
   	public $cgst_amt_final;
   	public $sgst_final;
   	public $sgst_amt_final;
   	public $igst_final;
   	public $igst_amt_final;
   	public $gst_total;
   	public $discount_final;
   	public $discount_final_amt;
   	public $grand_total;
   	public $temrs;
   	public $remark;
   	public $custom_label;
   	public $custom_type;
   	public $custom_value;
   	public $approval_status;
   	public $visibility;

	public function __construct($c_pk_sale_order, $c_sono , $c_fk_so_id, $c_sale_date, $c_customer_id, $c_reference_number, $c_shipment_from, $c_shipment_to,$c_category_id, $c_product_id, $c_item_id,$c_innersheet,$c_specialeffects,$c_types_id, $c_qty, $c_price, $c_total, $c_cgst, $c_cgst_amt, $c_sgst, $c_sgst_amt, $c_igst, $c_igst_amt, $c_final_total, $c_item_total, $c_cgst_final, $c_cgst_amt_final, $c_sgst_final, $c_sgst_amt_final, $c_igst_final, $c_igst_amt_final, $c_gst_total, $c_discount_final, $c_discount_final_amt, $c_grand_total, $c_temrs, $c_remark, $c_custom_label, $c_custom_type, $c_custom_value, $c_approval_status, $c_visibility) {
		$this->pk_sale_order=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pk_sale_order);
		$this->sono=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sono);
		$this->fk_so_id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_fk_so_id);
		$this->sale_date=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sale_date);
		$this->customer_id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_customer_id);
		$this->reference_number=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_reference_number);
		$this->shipment_from=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_shipment_from);
		$this->shipment_to=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_shipment_to);
		$this->product_id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_product_id);
		$this->category_id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_category_id);
		$this->item_id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_item_id);
		$this->innersheet=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_innersheet);
		$this->specialeffects=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_specialeffects);
		$this->types_id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_types_id);
		$this->qty=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_qty);
		$this->price=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_price);
		$this->total=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_total);
		$this->cgst=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cgst);
		$this->cgst_amt=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cgst_amt);
		$this->sgst=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sgst);
		$this->sgst_amt=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sgst_amt);
		$this->igst=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_igst);
		$this->igst_amt=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_igst_amt);
		$this->final_total=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_final_total);
		$this->item_total=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_item_total);
		$this->cgst_final=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cgst_final);
		$this->cgst_amt_final=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cgst_amt_final);
		$this->sgst_final=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sgst_final);
		$this->sgst_amt_final=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sgst_amt_final);
		$this->igst_final=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_igst_final);
		$this->igst_amt_final=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_igst_amt_final);
		$this->gst_total=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_gst_total);
		$this->discount_final=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final);
		$this->discount_final_amt=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt);
		$this->grand_total=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_grand_total);
		$this->temrs=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_temrs);
		$this->remark=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_remark);
		$this->custom_label=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_custom_label);
		$this->custom_type=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_custom_type);
		$this->custom_value=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_custom_value);
		$this->approval_status=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_approval_status);
		$this->visibility=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_visibility);
   	}

   	public function getpk_sale_order() 
	{
        return $this->pk_sale_order;
	}
	public function getsono() 
	{
        return $this->sono;
	}
	public function getfk_so_id() 
	{
        return $this->fk_so_id;
	}
	public function getsale_date() 
	{
        return $this->sale_date;
	}
	public function getcustomer_id() 
	{
        return $this->customer_id;
	}
	public function getreference_number() 
	{
        return $this->reference_number;
	}
	public function getshipment_from() 
	{
        return $this->shipment_from;
	}
	public function getshipment_to() 
	{
        return $this->shipment_to;
	}
	public function getproduct_id() 
	{
        return $this->product_id;
	}
	public function getcategory_id() 
	{
        return $this->category_id;
	}
	public function getitem_id() 
	{
        return $this->item_id;
	}
	public function getinnersheet() 
	{
        return $this->innersheet;
	}
	public function getspecialeffects() 
	{
        return $this->specialeffects;
	}
	public function gettypes_id() 
	{
        return $this->types_id;
	}
	public function getqty() 
	{
        return $this->qty;
	}
	public function getprice() 
	{
        return $this->price;
	}
	public function gettotal() 
	{
        return $this->total;
	}
	public function getcgst() 
	{
        return $this->cgst;
	}
	public function getcgst_amt() 
	{
        return $this->cgst_amt;
	}
	public function getsgst() 
	{
        return $this->sgst;
	}
	public function getsgst_amt() 
	{
        return $this->sgst_amt;
	}
	public function getigst() 
	{
        return $this->igst;
	}
	public function getigst_amt() 
	{
        return $this->igst_amt;
	}
	public function getfinal_total() 
	{
        return $this->final_total;
	}
	public function getitem_total() 
	{
        return $this->item_total;
	}
	public function getcgst_final() 
	{
        return $this->cgst_final;
	}
	public function getcgst_amt_final() 
	{
        return $this->cgst_amt_final;
	}
	public function getsgst_final() 
	{
        return $this->sgst_final;
	}
	public function getsgst_amt_final() 
	{
        return $this->sgst_amt_final;
	}
	public function getigst_final() 
	{
        return $this->igst_final;
	}
	public function getigst_amt_final() 
	{
        return $this->igst_amt_final;
	}
	public function getgst_total() 
	{
        return $this->gst_total;
	}
	public function getdiscount_final() 
	{
        return $this->discount_final;
	}
	public function getdiscount_final_amt() 
	{
        return $this->discount_final_amt;
	}
	public function getgrand_total() 
	{
        return $this->grand_total;
	}
	public function gettemrs() 
	{
        return $this->temrs;
	}
	public function getremark() 
	{
        return $this->remark;
	}
	public function getcustom_label() 
	{
        return $this->custom_label;
	}
	public function getcustom_type() 
	{
        return $this->custom_type;
	}
	public function getcustom_value() 
	{
        return $this->custom_value;
	}
	public function getapproval_status() 
	{
        return $this->approval_status;
	}
	public function getvisibility() 
	{
        return $this->visibility;
	}

	

	public function setpk_sale_order($s_pk_sale_order) 
	{
        $this->pk_sale_order = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_pk_sale_order);
	}
	public function setsono($s_sono) 
	{
        $this->sono = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_sono);
	}
	public function setfk_so_id($s_fk_so_id) 
	{
        $this->fk_so_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_fk_so_id);
	}
	public function setsale_date($s_sale_date) 
	{
        $this->sale_date = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_sale_date);
	}
	public function setcustomer_id($s_customer_id) 
	{
        $this->customer_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_customer_id);
	}
	public function setreference_number($s_reference_number) 
	{
        $this->reference_number = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_reference_number);
	}
	public function setshipment_from($s_shipment_from) 
	{
        $this->shipment_from = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_shipment_from);
	}
	public function setshipment_to($s_shipment_to) 
	{
        $this->shipment_to = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_shipment_to);
	}
	public function setproduct_id($s_product_id) 
	{
        $this->product_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_product_id);
	}
	public function setcategory_id($s_category_id) 
	{
        $this->category_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_category_id);
	}

	public function setinnersheet($s_innersheet) 
	{
        $this->innersheet = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_innersheet);
	}
	public function setspecialeffects($s_specialeffects) 
	{
        $this->specialeffects = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_specialeffects);
	}
	public function settypes_id($s_types_id) 
	{
        $this->types_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_types_id);
	}
	public function setitem_id($s_item_id) 
	{
        $this->item_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_item_id);
	}
	public function setqty($s_qty) 
	{
        $this->qty = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_qty);
	}
	public function setprice($s_price) 
	{
        $this->price = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_price);
	}
	public function settotal($s_total) 
	{
        $this->total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_total);
	}
	public function setcgst($s_cgst) 
	{
        $this->cgst = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cgst);
	}
	public function setcgst_amt($s_cgst_amt) 
	{
        $this->cgst_amt = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cgst_amt);
	}
	public function setsgst($s_sgst) 
	{
        $this->sgst = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_sgst);
	}
	public function setsgst_amt($s_sgst_amt) 
	{
        $this->sgst_amt = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_sgst_amt);
	}
	public function setigst($s_igst) 
	{
        $this->igst = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_igst);
	}
	public function setigst_amt($s_igst_amt) 
	{
        $this->igst_amt = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_igst_amt);
	}
	public function setfinal_total($s_final_total) 
	{
        $this->final_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_final_total);
	}
	public function setitem_total($s_item_total) 
	{
        $this->item_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_item_total);
	}
	public function setcgst_final($s_cgst_final) 
	{
        $this->cgst_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cgst_final);
	}
	public function setcgst_amt_final($s_cgst_amt_final) 
	{
        $this->cgst_amt_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cgst_amt_final);
	}
	public function setsgst_final($s_sgst_final) 
	{
        $this->sgst_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_sgst_final);
	}
	public function setsgst_amt_final($s_sgst_amt_final) 
	{
        $this->sgst_amt_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_sgst_amt_final);
	}
	public function setigst_final($s_igst_final) 
	{
        $this->igst_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_igst_final);
	}
	public function setigst_amt_final($s_igst_amt_final) 
	{
        $this->igst_amt_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_igst_amt_final);
	}
	public function setgst_total($s_gst_total) 
	{
        $this->gst_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_gst_total);
	}
	public function setdiscount_final($s_discount_final) 
	{
        $this->discount_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final);
	}
	public function setdiscount_final_amt($s_discount_final_amt) 
	{
        $this->discount_final_amt = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final_amt);
	}
	public function setgrand_total($s_grand_total) 
	{
        $this->grand_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_grand_total);
	}
	public function settemrs($s_temrs) 
	{
        $this->temrs = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_temrs);
	}
	public function setremark($s_remark) 
	{
        $this->remark = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_remark);
	}
	public function setcustom_label($s_custom_label) 
	{
        $this->custom_label = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_custom_label);
	}
	public function setcustom_type($s_custom_type) 
	{
        $this->custom_type = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_custom_type);
	}
	public function setcustom_value($s_custom_value) 
	{
        $this->custom_value = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_custom_value);
	}
	public function setapproval_status($s_approval_status) 
	{
        $this->approval_status = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_approval_status);
	}
	public function setvisibility($s_visibility) 
	{
        $this->visibility = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_visibility);
	}

	
	function filterlistSalesOrder()
	{

		//SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus, IF(so.types = 2, (SELECT GROUP_CONCAT(types_name) as typesname FROM invoice_erp.erp_sales_order_product sop LEFT JOIN invoice_erp.erp_types tys ON tys.pk_types_id = sop.itemtype where sop.fk_so_id = so.pk_sale_order) , 'Commercial') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname FROM invoice_erp.erp_sales_order_product sop LEFT JOIN invoice_erp.erp_items items ON items.pk_items_id = sop.fk_items_id where sop.fk_so_id = so.pk_sale_order) as itemnameval FROM invoice_erp.erp_sales_order AS so LEFT JOIN invoice_erp.erp_customer_master AS cus ON so.customer_id = cus.pk_cus_id where so.visibility=1 AND so.sale_date BETWEEN "2021-10-13" AND "2021-10-13" ORDER BY so.pk_sale_order DESC LIMIT 0, 10

	//	$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.pk_sale_order = osi.fk_so_id) as osstatus FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id ";
   

	//$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus,  IF(so.types = 2, (SELECT GROUP_CONCAT(types_name) as typesname  FROM  ".SALES_ORDER_PRODUCT." sop LEFT JOIN ".TYPES." tys ON tys.pk_types_id  = sop.itemtype where	sop.fk_so_id = so.pk_sale_order) , 'Commercial') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  ".SALES_ORDER_PRODUCT." sop LEFT JOIN ".ITEMS." items ON items.pk_items_id  = sop.fk_items_id where sop.fk_so_id = so.pk_sale_order) as itemnameval,so.types  FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id ";

	$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus, IF(sop.types = 2, (SELECT GROUP_CONCAT(tys.types_name) as typesname   FROM  ".SALES_ORDER_PRODUCT." sops  LEFT JOIN  ".TYPES." tys ON tys.pk_types_id  = sops.itemtype where	sops.fk_so_id = so.pk_sale_order) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  ".SALES_ORDER_PRODUCT." sops LEFT JOIN ".ITEMS." items ON items.pk_items_id  = sops.fk_items_id where sops.fk_so_id = so.pk_sale_order) as itemnameval,so.types FROM ".SALES_ORDER." AS so  LEFT JOIN  ".SALES_ORDER_PRODUCT." sop ON sop.fk_so_id = so.pk_sale_order LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id ";


        $fromDate = str_replace('/', '-', $_POST['fromDate']);
 	    $fromDateval = date('Y-m-d', strtotime($fromDate));
	    $toDate = str_replace('/', '-', $_POST['toDate']);
	    $toDateval = date('Y-m-d', strtotime($toDate));

     	$statusfilter = (!empty($_POST["statusfilter"]))? 'so.order_status ='.$_POST["statusfilter"].' AND' : '' ;
		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= 'where (so.visibility=1) AND '.$statusfilter.' so.sale_date BETWEEN "'.$fromDateval.'" AND "'.$toDateval.'"   OR  so.sono LIKE "%' . $_POST["search"]["value"] . '%" ';
				$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
		}
		else{
			$sqlQuery .= 'where so.visibility=1 AND  '.$statusfilter.' so.sale_date BETWEEN "'.$fromDateval.'" AND "'.$toDateval.'"';
		}
		if (!empty($_POST["order"])) {
			$sqlQuery .= 'GROUP BY so.pk_sale_order ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= 'GROUP BY so.pk_sale_order ORDER BY so.pk_sale_order DESC ';
		}
		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], 'SELECT * FROM  '.SALES_ORDER.' ');
		//echo 'SELECT * FROM  '.SALES_ORDER.'';
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmt);
		$displayRecords = mysqli_num_rows($stmt);
		$records = array();
		$i =1;
		$color_class = '';


		
		while ($record = mysqli_fetch_assoc($stmt)) {
			$osstatus = '';
			if($record['order_status'] == 1){
				$color_class = 'color-designer';
			}
			elseif ($record['order_status'] == 2){
				$color_class = 'color-printing';
			}
			elseif ($record['order_status'] == 3){
				$color_class = 'color-lamination';
			}
			elseif ($record['order_status'] == 4){
				$color_class = 'color-finishing';
			}
			elseif ($record['order_status'] == 5){
				$color_class = 'color-ready-for-Delivery';
			}
			elseif ($record['order_status'] == 6){
				$color_class = 'color-complete-delivery';
			}
			elseif ($record['order_status'] == 7){
				$color_class = 'color-paid';
			}
			elseif ($record['order_status'] == 8){
				$color_class = 'color-unpaid';
			}
			else {
				$color_class = '';
			}
			if(!empty($record['osstatus']))
			{
				$osstatus = '<span class="custom_btn_class btn btn-success '.$color_class.'" >'.$record['osstatus'] .'</span>';
			}
			else{
				$osstatus = '<span class="custom_btn_class btn btn-success '.$color_class.'" >Unpaid</span>';
			}
			//$record['typesnameval']
			//$record['typesnameval']
			$typesnameval  = explode(',',$record['typesnameval']);
			$itemnameval  = explode(',',$record['itemnameval']);
			$va  = array();
			$fisrtComm  = 0;
			for($i=0;$i< count($itemnameval); $i++)
			{
				if($record['types'] == 1)
				{
				
					if($fisrtComm == 0)
					{
						$va[] ='Commercial : '. $itemnameval[$i];

					}
					else{
						$va[] = $itemnameval[$i];

					}
						

				}else{
					$va[] = $typesnameval[$i].' : '.$itemnameval[$i];
				}
				$fisrtComm++;
			}

			
				$valsTypesItem = implode(',',$va);
			$rows = array();
			//$rows[] =$i;
			$rows[] = ucfirst($record['sono']);
			$rows[] = $record['cus_name'];
				$rows[] = $record['jo_date'];
			  //  $rows[] = $record['status'];
			  $rows[] = $valsTypesItem;
			  $rows[] = '<p class="alignrightAmount">'.$record['grand_total'].'</p>';
			//$rows[] = $record['itemnameval'];
	        //$rows[] = $record['status'];
		    $rows[] = $osstatus;
	        $rows[] = '<a href="index.php?erp=34&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
			$records[] = $rows;
			$i++;
		}

		$output = array(
			"draw" => intval($_POST["draw"]),
			"iTotalRecords" => $displayRecords,
			"iTotalDisplayRecords" => $allRecords,
			"data" => $records,
		);
		echo json_encode($output);
	}
		function filterCustomerlistSalesOrder()
		{
		
			/*fromDate
			toDate
			statusfilter*/
			
		   $sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus, IF(sop.types = 2, (SELECT GROUP_CONCAT(tys.types_name) as typesname   FROM  ".SALES_ORDER_PRODUCT." sops  LEFT JOIN  ".TYPES." tys ON tys.pk_types_id  = sops.itemtype where	sops.fk_so_id = so.pk_sale_order) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  ".SALES_ORDER_PRODUCT." sops LEFT JOIN ".ITEMS." items ON items.pk_items_id  = sops.fk_items_id where sops.fk_so_id = so.pk_sale_order) as itemnameval,so.types FROM ".SALES_ORDER." AS so  LEFT JOIN  ".SALES_ORDER_PRODUCT." sop ON sop.fk_so_id = so.pk_sale_order LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id ";
	   

		   //$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus, IF(sop.types = 2, (SELECT GROUP_CONCAT(tys.types_name) as typesname  FROM   ".TYPES." tys where tys.pk_types_id  = sop.itemtype ) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(items.fk_item_id) as typesname  FROM  ".ITEMS." items where items.pk_items_id  = sop.fk_items_id) as itemnameval,so.types FROM ".SALES_ORDER." AS so  LEFT JOIN  ".SALES_ORDER_PRODUCT." sop ON sop.fk_so_id = so.pk_sale_order LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id ";


		   $fromDate = str_replace('/', '-', $_POST['fromDate']);

		   $fromDateval = date('Y-m-d', strtotime($fromDate));
		   $toDate = str_replace('/', '-', $_POST['toDate']);

		   $toDateval = date('Y-m-d', strtotime($toDate));

	   	$statusfilter = (!empty($_POST["statusfilter"]))? 'so.customer_id ='.$_POST["statusfilter"].' AND' : '' ;


			if (!empty($_POST["search"]["value"])) {
				$jodate = strtotime($_POST["search"]["value"]);
				$jodateVals = date('Y-m-d', $jodate);
			

				$sqlQuery .= 'where (so.visibility=1) AND '.$statusfilter.' so.sale_date BETWEEN "'.$fromDateval.'" AND "'.$toDateval.'"   OR  so.sono LIKE "%' . $_POST["search"]["value"] . '%" ';
				$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			 //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
			}
			else{
				$sqlQuery .= 'where so.visibility=1 AND  '.$statusfilter.' so.sale_date BETWEEN "'.$fromDateval.'" AND "'.$toDateval.'"';
	
			}
			
			if (!empty($_POST["order"])) {
				$sqlQuery .= 'GROUP BY so.pk_sale_order ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
			} else {
				$sqlQuery .= 'GROUP BY so.pk_sale_order ORDER BY so.pk_sale_order DESC ';
			}
	
			if ($_POST["length"] != -1) {
				$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
			}

		//	var_dump($sqlQuery);
		//	exit;
		   $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
	
			$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], 'SELECT * FROM  '.SALES_ORDER.'  ');
			$allResult = mysqli_fetch_assoc($stmtTotal);
			$allRecords = mysqli_num_rows($stmt);
	
			$displayRecords = mysqli_num_rows($stmt);
			$records = array();
			$i =1;
			$color_class = '';
			while ($record = mysqli_fetch_assoc($stmt)) {
				if($record['order_status'] == 1){
					$color_class = 'color-designer';
				}
				elseif ($record['order_status'] == 2){
					$color_class = 'color-printing';
				}
				elseif ($record['order_status'] == 3){
					$color_class = 'color-lamination';
				}
				elseif ($record['order_status'] == 4){
					$color_class = 'color-finishing';
				}
				elseif ($record['order_status'] == 5){
					$color_class = 'color-ready-for-Delivery';
				}
				elseif ($record['order_status'] == 6){
					$color_class = 'color-complete-delivery';
				}
				elseif ($record['order_status'] == 7){
					$color_class = 'color-paid';
				}
				elseif ($record['order_status'] == 8){
					$color_class = 'color-unpaid';
				}
				else {
					$color_class = '';
				}
				$osstatus = '';
				if(!empty($record['osstatus']))
				{
					$osstatus = '<span class="custom_btn_class btn btn-success '.$color_class.'" >'.$record['osstatus'] .'</span>';
				}
				$typesnameval  = explode(',',$record['typesnameval']);
			$itemnameval  = explode(',',$record['itemnameval']);
			$va  = array();
			$fisrtComm  = 0;
			for($i=0;$i< count($itemnameval); $i++)
			{
				if($record['types'] == 1)
				{
				
					if($fisrtComm == 0)
					{
						$va[] ='Commercial : '. $itemnameval[$i];

					}
					else{
						$va[] = $itemnameval[$i];

					}
						

				}else{
					$va[] = $typesnameval[$i].' : '.$itemnameval[$i];
				}
				$fisrtComm++;
			}

			
				$valsTypesItem = implode(',',$va);
				$rows = array();
				//$rows[] =$i;
				$rows[] = ucfirst($record['sono']);
		  	  $rows[] = $record['cus_name'];
				$rows[] = $record['jo_date'];
			  //  $rows[] = $record['status'];
			  $rows[] = $valsTypesItem;
			  $rows[] = '<p class="alignrightAmount">'.$record['grand_total'].'</p>';

			   $rows[] = $osstatus;
	
			   $rows[] = '<a href="index.php?erp=34&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
				//$rows[] = '<a href="index.php?erp=15&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>	<a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';
				$records[] = $rows;
				$i++;
			}
	
			$output = array(
				"draw" => intval($_POST["draw"]),
				"iTotalRecords" => $displayRecords,
				"iTotalDisplayRecords" => $allRecords,
				"data" => $records,
			);
	
			echo json_encode($output);
		}
	
		function filterCustomerCreditOrder()
		{
			if($_POST["search"]["value"] == ''){
				$sel_customer='SELECT c.cus_name,so.customer_id,so.payment_type FROM `erp_sales_order` as so LEFT JOIN erp_customer_master as c ON so.customer_id=c.pk_cus_id GROUP BY so.customer_id';
				}else{
				$sel_customer="SELECT c.cus_name,so.customer_id,so.payment_type FROM `erp_sales_order` as so LEFT JOIN erp_customer_master as c ON so.customer_id=c.pk_cus_id WHERE c.cus_name LIKE  '%".$_POST["search"]["value"]."%' GROUP BY so.customer_id";	
				}
			
			$customer_list = mysqli_query($GLOBALS["___mysqli_ston"], $sel_customer);
			
		$allRecords = mysqli_num_rows($customer_list);
	
			$displayRecords = mysqli_num_rows($customer_list);
			if($allRecords > 0){
			
			while ($customer = mysqli_fetch_assoc($customer_list)) {
				$row=array();
				$row[] = $customer["cus_name"];
				//$row[] = $_POST["search"]["value"];
				
				//echo $customer["customer_id"];
				$get_total="SELECT sum(grand_total) as total from erp_sales_order where customer_id=".$customer["customer_id"]."";
				$get_total1 = mysqli_query($GLOBALS["___mysqli_ston"], $get_total);
			while ($get_total2 = mysqli_fetch_assoc($get_total1)) {
				
				if($get_total2["total"] != ''){
				//$row[] = $get_total2["total"];
				$row[] ='<p class="alignrightAmount">'.$get_total2["total"].'</p>';
				$total= $get_total2["total"];
				}else{
				//$row[] = 0.00;
				$row[] ='<p class="alignrightAmount">0.00</p>';
				$total = 0.00;
				}
				//echo $get_total2["total"];
				
			}
			$get_advance="SELECT sum(discount_final4) as advance from erp_sales_order where customer_id=".$customer["customer_id"]."";
				$get_advance1 = mysqli_query($GLOBALS["___mysqli_ston"], $get_advance);
			while ($get_advance2 = mysqli_fetch_assoc($get_advance1)) {
				
				//$row[] = $get_advance2["advance"];
				if($get_advance2["advance"] != ''){
				//$row[] = $get_advance2["advance"];
				$row[] ='<p class="alignrightAmount">'.$get_advance2["advance"].'</p>';
				$advance= $get_advance2["advance"];
				}else{
				$row[] ='<p class="alignrightAmount">0.00</p>';
				$advance= 0.00;
				}
				
			}
			$get_receipt_credit="SELECT sum(paid_amount) as receipt FROM `erp_order_payment` WHERE fk_customer_id=".$customer["customer_id"]."";
				$get_receipt_credit1 = mysqli_query($GLOBALS["___mysqli_ston"], $get_receipt_credit);
			while ($get_receipt_credit2 = mysqli_fetch_assoc($get_receipt_credit1)) {
				
				//$row[] = $get_receipt2["receipt"];
				if($get_receipt_credit2["receipt"] != ''){
				//$row[] = $get_receipt_credit2["receipt"];
				$receipt_credit= $get_receipt_credit2["receipt"];
				}else{
				//$row[] = 0.00;
				$receipt_credit=  0.00;
				}
				
			}
			
				$get_receipt_cash="SELECT (sum(grand_total)-sum(discount_final_amt4)) as receipt FROM `erp_sales_invoice` where fk_customer_id=".$customer["customer_id"]." and payment_type=1";
			$get_receipt_cash1 = mysqli_query($GLOBALS["___mysqli_ston"], $get_receipt_cash);
			while ($get_receipt_cash2 = mysqli_fetch_assoc($get_receipt_cash1)) {
				
				//$row[] = $get_receipt2["receipt"];
				if($get_receipt_cash2["receipt"] != ''){
				//$row[] = $get_receipt_cash2["receipt"];
				$receipt_cash= $get_receipt_cash2["receipt"];
				}else{
				//$row[] = 0.00;
				$receipt_cash=  0.00;
				}
				
			}
			$receipt_total=$receipt_credit+$receipt_cash;
			//$row[]=number_format($receipt_total, 2);
			$row[] ='<p class="alignrightAmount">'.number_format($receipt_total, 2).'</p>';
			
			
			$pending= number_format($total-($advance+$receipt_total), 2);
			//$row[] = $pending;
			$row[] ='<p class="alignrightAmount">'.$pending.'</p>';
			/*$get_pending="SELECT remaining_amount FROM `erp_order_payment` WHERE fk_customer_id=".$customer["customer_id"]." ORDER BY id DESC LIMIT 1";
				$get_pending1 = mysqli_query($GLOBALS["___mysqli_ston"], $get_pending);
			while ($get_pending2 = mysqli_fetch_assoc($get_pending1)) {
				
				//$row[] = $get_pending2["remaining_amount"];
				if($get_pending2["remaining_amount"] != ''){
				$row[] = $get_pending2["remaining_amount"];
				}else{
				$row[] = '0.00';
				}
				
			} */
			$row[]= '<a href="index.php?erp=63&id='.$customer["customer_id"].'" class="custom_btn_class btn_center btn btn-warning" data-toggle="tooltip" title="View" name="btnEdit">View</a>';
			$records[]=$row;
			
		}
			}
			else{
			$records = array();
			}
			
	
			$output = array(
				"draw" => intval($_POST["draw"]),
				"iTotalRecords" => $displayRecords,
				"iTotalDisplayRecords" => $allRecords,
				"data" => $records,
			);
			echo json_encode($output);
		}
		function singlecustomerreport()
		{
			//$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.pk_sale_order = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM ".SALES_INVOICE." AS si WHERE si.fk_so_id =so.pk_sale_order) ,(SELECT sum(op.paid_amount) as receipt FROM ".ORDER_PAYMENT." AS op WHERE op.fk_order_no =so.pk_sale_order)) as receipt  FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  ";
			$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.pk_sale_order = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.grand_total-si.discount_final_amt4 as receipt FROM ".SALES_INVOICE." AS si WHERE si.fk_so_id =so.pk_sale_order) ,(SELECT sum(op.paid_amount) as receipt FROM ".ORDER_PAYMENT." AS op WHERE op.fk_order_no =so.pk_sale_order)) as receipt  FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  ";
      // echo $sqlQuery;
   
        if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
            $jodateVals = date('Y-m-d', $jodate);
            $sqlQuery .= 'where (so.visibility=1 AND so.status= 1 AND so.customer_id = '.$_POST["customer_id"].') AND  so.sono LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
            $sqlQuery .= ' OR so.item_total LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.grand_total LIKE "%' . $_POST["search"]["value"] . '%" ';
         //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
        }
		else{
			$sqlQuery .= 'where so.visibility=1  AND so.customer_id = '.$_POST["customer_id"].'';

		}
		
        if (!empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= ' ORDER BY so.pk_sale_order DESC ';
        }

        if ($_POST["length"] != -1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
		
		//var_dump($sqlQuery);
		//exit;
       $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  ".SALES_ORDER." where customer_id = ".$_POST["customer_id"]."");
        $allResult = mysqli_fetch_assoc($stmtTotal);
        $allRecords = mysqli_num_rows($stmtTotal);
        $displayRecords = mysqli_num_rows($stmt);
        $records = array();
        $i =1;
        while ($record = mysqli_fetch_assoc($stmt)) {
            $dateVal = strtotime($record['mixmonthlevel']);
            $dateVals = date('Y-m', $dateVal);
            $dateValname = date('M Y', $dateVal);
            $osstatus = '';
			if($record['osstatus']  == 1)
			{
				$osstatus = '<span class="custom_btn_class btn btn-success" >Designer Head Split Order</span>';
							
			}
			else if($record['osstatus']  == 2)
			{
				$osstatus = '<span class="custom_btn_class btn btn-success" >Send for Printing</span>';
			
			}	else if($record['osstatus']  == 3)
			{
				$osstatus = '<span class="custom_btn_class btn btn-success" >Send for Lamination</span>';
			
			}	else if($record['osstatus']  == 4)
			{
				$osstatus = '<span class="custom_btn_class btn btn-success" >Finishing of Order</span>';
			
			}	else if($record['osstatus']  == 5)
			{
				$osstatus = '<span class="custom_btn_class btn btn-success" >Ready for Delivery</span>';
				
			}	else if($record['osstatus']  == 6)
			{
				$osstatus = '<span class="custom_btn_class btn btn-success" >Complete Delivery</span>';
			}

            $rows = array();
			
			  //$rows[] =$_POST['start']+$i;<p class="alignleftvalue '.$colorGTadvance.'">'.$pending.'</p>
			  $rows[] = $record['jo_date'];
            $rows[] = ucfirst($record['sono']);
            //$rows[] = $record['cus_name'];
            //$rows[] = $record['jo_date'];
			$payment_type = ($record['payment_type']== 1)? 'Cash' : 'Credit';
            $rows[] = $payment_type ;
			$rows[] = '<p class="alignrightAmount">'.$record['grand_total'].'</p>';
            $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
            $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			
			$colorGTadvance ='';
			if($pending> 0)
			{
				$colorGTadvance ='redadvgtcolor';
			}
			else{
				$colorGTadvance ='greenadvgtcolor';
			}
			
			$pending= number_format($record['grand_total']-($record['discount_final4']+$record['receipt']), 2);
            $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
			
			//var_dump($record['discount_final4']);
			//var_dump($record['receipt']);
			//var_dump($record['grand_total']);
			//var_dump($pending);
          //  $rows[] = $record['status'];
          //$rows[] = '<a href="index.php?erp=15&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
		 //  $rows[] = '<a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-eye"></span></a>';

		   //$rows[] = $osstatus;

		   $rows[] ='<a href="index.php?erp=64&id='.$_POST["customer_id"].'" class="custom_btn_class btn btn-info" data-toggle="tooltip" title="Status" name="btnEdit">View Payment</a>';
		   
            $records[] = $rows;
            $i++;
        }

        $output = array(
            "draw" => intval($_POST["draw"]),
            "iTotalRecords" => $displayRecords,
            "iTotalDisplayRecords" => $allRecords,
            "data" => $records,
        );

        echo json_encode($output);
			
			
	
		}
		function singlecustomerreport_by_id()
		{
			
			
			$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.pk_sale_order = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.grand_total-si.discount_final_amt4 as receipt FROM ".SALES_INVOICE." AS si WHERE si.fk_so_id =so.pk_sale_order) ,(SELECT sum(op.paid_amount) as receipt FROM ".ORDER_PAYMENT." AS op WHERE op.fk_order_no =so.pk_sale_order)) as receipt  FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  ";
   
        if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
            $jodateVals = date('Y-m-d', $jodate);
            $sqlQuery .= 'where (so.visibility=1 AND so.status= 1 AND so.customer_id = '.$_POST["customer_id"].') AND  so.sono LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
            $sqlQuery .= ' OR so.item_total LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.grand_total LIKE "%' . $_POST["search"]["value"] . '%" ';
         //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
        }
		else{
			$sqlQuery .= 'where so.visibility=1  AND so.customer_id = '.$_POST["customer_id"].'';

		}
        if (!empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= ' ORDER BY so.pk_sale_order DESC ';
        }

        if ($_POST["length"] != -1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
		
		
       $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  ".SALES_ORDER." where customer_id = ".$_POST["customer_id"]."");
        $allResult = mysqli_fetch_assoc($stmtTotal);
        $allRecords = mysqli_num_rows($stmtTotal);
        $displayRecords = mysqli_num_rows($stmt);
        $records = array();
        $i =1;
        while ($record = mysqli_fetch_assoc($stmt)) {
            $dateVal = strtotime($record['mixmonthlevel']);
            $dateVals = date('Y-m', $dateVal);
            $dateValname = date('M Y', $dateVal);
			
            $rows = array();
			
			  $rows[] =$_POST['start']+$i;
			  $rows[] = $record['jo_date'];
            $rows[] = ucfirst($record['sono']);
            //$rows[] = $record['cus_name'];
            //$rows[] = $record['jo_date'];
			$payment_type = ($record['payment_type']== 1)? 'Cash' : 'Credit';
            $rows[] = $payment_type ;
			$rows[] = '<p class="alignrightAmount">'.$record['grand_total'].'</p>';
            //$rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
            //$rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			
			$colorGTadvance ='';
			if($pending> 0)
			{
				$colorGTadvance ='redadvgtcolor';
			}
			else{
				$colorGTadvance ='greenadvgtcolor';
			}
			
			$pending= number_format($record['grand_total']-($record['discount_final4']+$record['receipt']), 2);
           // $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
			
			//var_dump($record['discount_final4']);
			//var_dump($record['receipt']);
			//var_dump($record['grand_total']);
			//var_dump($pending);
          //  $rows[] = $record['status'];
          //$rows[] = '<a href="index.php?erp=15&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
		 //  $rows[] = '<a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-eye"></span></a>';

		   //$rows[] = $osstatus;

		   //$rows[] ='<a href="index.php?erp=64&id='.$_POST["customer_id"].'" class="custom_btn_class btn btn-info" data-toggle="tooltip" title="Status" name="btnEdit">View Payment</a>';
		   
            $records[] = $rows;
            $i++;
        }

        $output = array(
            "draw" => intval($_POST["draw"]),
            "iTotalRecords" => $displayRecords,
            "iTotalDisplayRecords" => $allRecords,
            "data" => $records,
        );

        echo json_encode($output);
			
			
	
		}
	
		function getCustomerList(){
			
			$query = "SELECT pk_cus_id,cus_name,cus_state,cus_city FROM ".CUSTOMER." WHERE visibility= 1";	
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
		}
		function getCreditPaymentList(){
			//MIN(op.remaining_amount) as remaining_amount fk_so_id
			$query = "SELECT si.fk_so_id,si.grand_total ,(select IF(sum(opsv.remaining_amount),MIN(opsv.remaining_amount),0) as remain FROM ".ORDER_PAYMENT." opsv WHERE opsv.fk_si_id= si.PK_SE_ID ) as remaining_amount,(select so.discount_final4 as advance FROM ".SALES_ORDER." so WHERE so.pk_sale_order = si.fk_so_id ) as advance_amount ,si.PK_SE_ID, si.eno,cus.cus_name,si.fk_customer_id FROM " . SALES_INVOICE . " si LEFT JOIN " . CUSTOMER . " AS cus ON si.fk_customer_id = cus.pk_cus_id  LEFT JOIN ".ORDER_PAYMENT." op ON op.fk_si_id = si.PK_SE_ID WHERE si.grand_total > (select IF(sum(op.paid_amount),sum(ops.paid_amount),0) as remain FROM ".ORDER_PAYMENT." ops WHERE ops.fk_si_id= si.PK_SE_ID ) AND si.payment_type = 2 GROUP BY si.PK_SE_ID ORDER BY si.PK_SE_ID DESC";
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
		}
		function insertOrderPayment(){
			/*
			$obj_saleorder_report->setso_id( $_POST['txt_invoice_no']);
			$obj_saleorder_report->setcgst_amt($_POST['txt_total_amount']);
			$obj_saleorder_report->setsgst_amt($_POST['txt_remain_amount']);
			$obj_saleorder_report->setigst_amt($_POST['txt_paying_amount']);
			$obj_saleorder_report->setreference_number( $_POST['txt_createdby']);
			$obj_saleorder_report->setcustomer_id( $_POST['txt_comments']);
			$obj_saleorder_report->setsdate(date('Y-m-d',strtotime($_POST['txt_date'])));

			txt_invoice_no txt_total_amount txt_remain_amount txt_paying_amount*/
			$remainAmt =0;
			//$status =2;
			if($this->cgst_amt >= $this->sgst_amt)
			{
				if($this->sgst_amt > 0)
				{
					$remainAmt = $this->sgst_amt - $this->igst_amt;

				}
				else{
					$remainAmt = $this->cgst_amt - $this->igst_amt;

				}
		//	$status =1;
			}
			
		
			 
			$query1 = "INSERT INTO " . ORDER_PAYMENT . " SET fk_si_id='" . $this->sono . "' , date='" . $this->sale_date . "', comments='" . $this->remark. "',created_by='" . $this->setreference_number . "', total_amount='" . $this->cgst_amt . "', remaining_amount='" . $remainAmt . "', paid_amount='" . $this->igst_amt . "', fk_order_no='" . $this->fk_so_id . "', fk_customer_id='" . $this->customer_id . "',status=1";

	
			$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
			if ($result1) {
				return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
			} else {
				return 0;
			}
		}

}