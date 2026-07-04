<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Estimate_commornon
{
	public $pk_sale_order;
	public $sono;
	public $fk_so_id;
	public $sale_date;
	public $customer_id;
	public $reference_number;
	public $orientation;
	public $shipment_to;
	public $product_id;
	public $category_id;
	public $innersheet;
	public $specialeffects;
	public $types_id;
	public $item_id;
	public $types;
	public $pricetype;
	public $paymenttype;
	public $qty;
	public $price;
	public $total;
	public $cgst;
	public $cgst_amt;

	public $gsttype;
	public $final_total;
	public $item_total;

	public $cus_plan_dis_amount;
	public $cus_plan_tot_amount;
	public $cgst_final;
	public $cgst_amt_final;

	public $caltype1;
	public $caltype2;
	public $caltype3;
	public $caltype4;
	public $caltype5;
	public $remark;
	public $igst_amt_final;
	public $gst_total;
	public $discount_field1;
	public $discount_final_amt1;
	public $discount_final1;
	public $discount_type1;
	public $discount_field2;
	public $discount_final_amt2;
	public $discount_final2;
	public $discount_type2;
	public $discount_field3;
	public $discount_final_amt3;
	public $discount_final3;
	public $discount_type3;
	public $discount_field4;
	public $discount_final_amt4;
	public $discount_final4;
	public $discount_type4;
	public $discount_field5;
	public $discount_final_amt5;
	public $discount_final5;
	public $discount_type5;
	public $grand_total;
	public $city;
	public $custom_value;
	public $visibility;
	public $approval_status;
	public $advance_amt;

	public function __construct($c_pk_sale_order, $c_sono, $c_fk_so_id, $c_sale_date, $c_customer_id, $c_reference_number, $c_orientation, $c_shipment_to, $c_category_id, $c_product_id, $c_item_id, $c_innersheet, $c_specialeffects, $c_types_id, $c_qty, $c_price, $c_total, $c_cgst, $c_cgst_amt, $c_gsttype, $c_final_total, $c_item_total, $c_cus_plan_dis_amount, $c_cus_plan_tot_amount, $c_cgst_final, $c_cgst_amt_final, $c_remark, $c_igst_amt_final, $c_gst_total, $c_discount_field1, $c_discount_final1, $c_discount_final_amt1, $c_discount_type1, $c_discount_field2, $c_discount_final2, $c_discount_final_amt2, $c_discount_type2, $c_discount_field3, $c_discount_final3, $c_discount_final_amt3, $c_discount_type3, $c_discount_field4, $c_discount_final4, $c_discount_final_amt4, $c_discount_type4, $c_discount_field5, $c_discount_final5, $c_discount_final_amt5, $c_discount_type5, $c_grand_total, $c_advance_amt, $c_types, $c_pricetype, $c_paymenttype, $c_city, $c_custom_value, $c_approval_status, $c_visibility, $c_caltype1, $c_caltype2, $c_caltype3, $c_caltype4, $c_caltype5)
	{
		$this->pk_sale_order = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pk_sale_order);
		$this->sono = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sono);
		$this->fk_so_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_fk_so_id);
		$this->sale_date = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sale_date);
		$this->customer_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_customer_id);
		$this->reference_number = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_reference_number);
		$this->orientation = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_orientation);
		$this->shipment_to = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_shipment_to);
		$this->product_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_product_id);
		$this->category_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_category_id);
		$this->item_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_item_id);
		$this->innersheet = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_innersheet);
		$this->specialeffects = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_specialeffects);
		$this->types_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_types_id);
		$this->qty = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_qty);
		$this->price = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_price);
		$this->total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_total);
		$this->cgst = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cgst);
		$this->cgst_amt = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cgst_amt);

		$this->gsttype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_gsttype);
		$this->final_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_final_total);
		$this->item_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_item_total);
		$this->cus_plan_dis_amount = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cus_plan_dis_amount);
		$this->cus_plan_tot_amount = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cus_plan_tot_amount);
		$this->cgst_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cgst_final);
		$this->cgst_amt_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cgst_amt_final);
		$this->caltype1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype1);
		$this->caltype2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype2);
		$this->caltype3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype3);
		$this->caltype4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype4);
		$this->caltype5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype5);
		$this->remark = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_remark);
		$this->igst_amt_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_igst_amt_final);
		$this->gst_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_gst_total);

		$this->discount_field1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_field1);
		$this->discount_final1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final1);
		$this->discount_final_amt1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt1);
		$this->discount_type1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_type1);

		$this->discount_field2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_field2);
		$this->discount_final2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final2);
		$this->discount_final_amt2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt2);
		$this->discount_type2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_type2);

		$this->discount_field3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_field3);
		$this->discount_final3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final3);
		$this->discount_final_amt3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt3);
		$this->discount_type3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_type3);

		$this->discount_field4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_field4);
		$this->discount_final4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final4);
		$this->discount_final_amt4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt4);
		$this->discount_type4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_type4);

		$this->discount_field5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_field5);
		$this->discount_final5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final5);
		$this->discount_final_amt5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt5);
		$this->discount_type5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_type5);


		$this->grand_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_grand_total);
		$this->types = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_types);
		$this->pricetype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pricetype);
		$this->paymenttype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_paymenttype);
		$this->city = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_city);
		$this->custom_value = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_custom_value);
		$this->approval_status = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_approval_status);
		$this->visibility = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_visibility);
		$this->advance_amt = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_advance_amt);
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
	public function getorientation()
	{
		return $this->orientation;
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

	public function getgsttype()
	{
		return $this->gsttype;
	}

	public function getfinal_total()
	{
		return $this->final_total;
	}
	public function getitem_total()
	{
		return $this->item_total;
	}

	public function getcus_plan_dis_amount()
	{
		return $this->cus_plan_dis_amount;
	}

	public function getcus_plan_tot_amount()
	{
		return $this->cus_plan_tot_amount;
	}

	public function getcgst_final()
	{
		return $this->cgst_final;
	}
	public function getcgst_amt_final()
	{
		return $this->cgst_amt_final;
	}
	public function getcaltype1()
	{
		return $this->caltype1;
	}
	public function getcaltype2()
	{
		return $this->caltype2;
	}
	public function getcaltype3()
	{
		return $this->caltype3;
	}
	public function getcaltype4()
	{
		return $this->caltype4;
	}
	public function getcaltype5()
	{
		return $this->caltype5;
	}
	public function getremark()
	{
		return $this->remark;
	}
	public function getigst_amt_final()
	{
		return $this->igst_amt_final;
	}
	public function getgst_total()
	{
		return $this->gst_total;
	}
	public function getdiscount_field1()
	{
		return $this->discount_field1;
	}
	public function getdiscount_final1()
	{
		return $this->discount_final1;
	}
	public function getdiscount_final_amt1()
	{
		return $this->discount_final_amt1;
	}
	public function getdiscount_type1()
	{
		return $this->discount_type1;
	}

	public function getdiscount_field2()
	{
		return $this->discount_field2;
	}
	public function getdiscount_final2()
	{
		return $this->discount_final2;
	}
	public function getdiscount_final_amt2()
	{
		return $this->discount_final_amt2;
	}
	public function getdiscount_type2()
	{
		return $this->discount_type2;
	}

	public function getdiscount_field3()
	{
		return $this->discount_field3;
	}
	public function getdiscount_final3()
	{
		return $this->discount_final3;
	}
	public function getdiscount_final_amt3()
	{
		return $this->discount_final_amt3;
	}
	public function getdiscount_type3()
	{
		return $this->discount_type3;
	}

	public function getdiscount_field4()
	{
		return $this->discount_field4;
	}
	public function getdiscount_final4()
	{
		return $this->discount_final4;
	}
	public function getdiscount_final_amt4()
	{
		return $this->discount_final_amt4;
	}
	public function getdiscount_type4()
	{
		return $this->discount_type4;
	}

	public function getdiscount_field5()
	{
		return $this->discount_field5;
	}
	public function getdiscount_final5()
	{
		return $this->discount_final5;
	}
	public function getdiscount_final_amt5()
	{
		return $this->discount_final_amt5;
	}
	public function getdiscount_type5()
	{
		return $this->discount_type5;
	}
	public function getgrand_total()
	{
		return $this->grand_total;
	}
	public function getadvance_amt()
	{
		return $this->advance_amt;
	}
	public function gettypes()
	{
		return $this->types;
	}
	public function getpricetype()
	{
		return $this->pricetype;
	}
	public function getpaymenttype()
	{
		return $this->paymenttype;
	}
	public function getcity()
	{
		return $this->city;
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
	public function setorientation($s_orientation)
	{
		$this->orientation = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_orientation);
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

	public function setgsttype($s_gsttype)
	{
		$this->gsttype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_gsttype);
	}

	public function setfinal_total($s_final_total)
	{
		$this->final_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_final_total);
	}

	public function setitem_total($s_item_total)
	{
		$this->item_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_item_total);
	}


	public function setcus_plan_dis_amount($s_cus_plan_dis_amount)
	{
		$this->cus_plan_dis_amount = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_plan_dis_amount);
	}

	public function setcus_plan_tot_amount($s_cus_plan_tot_amount)
	{
		$this->cus_plan_tot_amount = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cus_plan_tot_amount);
	}

	public function setcgst_final($s_cgst_final)
	{
		$this->cgst_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cgst_final);
	}
	public function setcgst_amt_final($s_cgst_amt_final)
	{
		$this->cgst_amt_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_cgst_amt_final);
	}
	public function setcaltype1($s_caltype1)
	{
		$this->caltype1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_caltype1);
	}
	public function setcaltype2($s_caltype2)
	{
		$this->caltype2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_caltype2);
	}
	public function setcaltype3($s_caltype3)
	{
		$this->caltype3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_caltype3);
	}
	public function setcaltype4($s_caltype4)
	{
		$this->caltype4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_caltype4);
	}
	public function setcaltype5($s_caltype5)
	{
		$this->caltype5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_caltype5);
	}
	public function setremark($s_remark)
	{
		$this->remark = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_remark);
	}
	public function setigst_amt_final($s_igst_amt_final)
	{
		$this->igst_amt_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_igst_amt_final);
	}
	public function setgst_total($s_gst_total)
	{
		$this->gst_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_gst_total);
	}

	public function setdiscount_field1($s_discount_field1)
	{
		$this->discount_field1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_field1);
	}
	public function setdiscount_final1($s_discount_final1)
	{
		$this->discount_final1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final1);
	}
	public function setdiscount_final_amt1($s_discount_final_amt1)
	{
		$this->discount_final_amt1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final_amt1);
	}
	public function setdiscount_type1($s_discount_type1)
	{
		$this->discount_type1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_type1);
	}

	public function setdiscount_field2($s_discount_field2)
	{
		$this->discount_field2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_field2);
	}

	public function setdiscount_final2($s_discount_final2)
	{
		$this->discount_final2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final2);
	}
	public function setdiscount_final_amt2($s_discount_final_amt2)
	{
		$this->discount_final_amt2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final_amt2);
	}
	public function setdiscount_type2($s_discount_type2)
	{
		$this->discount_type2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_type2);
	}

	public function setdiscount_field3($s_discount_field3)
	{
		$this->discount_field3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_field3);
	}
	public function setdiscount_final3($s_discount_final3)
	{
		$this->discount_final3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final3);
	}
	public function setdiscount_final_amt3($s_discount_final_amt3)
	{
		$this->discount_final_amt3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final_amt3);
	}
	public function setdiscount_type3($s_discount_type3)
	{
		$this->discount_type3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_type3);
	}

	// public function setdiscount_field4($s_discount_field4) 
	// {
	// 	$this->discount_field4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_field4);

	// }
	public function setdiscount_field4($s_discount_field4)
	{
		$this->discount_field4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], (string) $s_discount_field4);
	}

	public function setdiscount_final4($s_discount_final4)
	{
		$this->discount_final4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], (string) $s_discount_final4);
	}
	public function setdiscount_final_amt4($s_discount_final_amt4)
	{
		$this->discount_final_amt4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], (string) $s_discount_final_amt4);
	}
	public function setdiscount_type4($s_discount_type4)
	{
		$this->discount_type4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_type4);
	}

	public function setdiscount_field5($s_discount_field5)
	{
		$this->discount_field5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_field5);
	}
	public function setdiscount_final5($s_discount_final5)
	{
		$this->discount_final5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final5);
	}
	public function setdiscount_final_amt5($s_discount_final_amt5)
	{
		$this->discount_final_amt5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], (string) $s_discount_final_amt5);
	}
	public function setdiscount_type5($s_discount_type5)
	{
		$this->discount_type5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_type5);
	}
	public function setgrand_total($s_grand_total)
	{
		$this->grand_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_grand_total);
	}
	public function setadvance_amt($s_advance_amt)
	{
		$this->advance_amt = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_advance_amt);
	}
	public function settypes($s_types)
	{
		$this->types = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_types);
	}
	public function setpaymenttype($s_paymenttype)
	{
		$this->paymenttype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_paymenttype);
	}
	public function setpricetype($s_pricetype)
	{
		$this->pricetype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_pricetype);
	}
	public function setcity($s_city)
	{
		$this->city = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_city);
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

	/* Commercial */

	function EstimateComm_lastinserted_id()
	{
		$res = 0;
		$query = "SELECT PK_ES_ID FROM " . ESTIMATE_COMM . " GROUP BY PK_ES_ID ORDER BY PK_ES_ID DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);

		if ($cunt > 0) {
			$res = mysqli_fetch_array($result);
			$res = $data['PK_ES_ID'];
		}
		return $res;
	}
	function EstimateComm_last()
	{


		$res = 0;
		// $query = "SELECT sono FROM ".ESTIMATE_COMM." where MONTH(sale_date) >= 4 AND YEAR(sale_date) = YEAR(CURRENT_DATE()) GROUP BY PK_ES_ID ORDER BY PK_ES_ID DESC";
		$query = "SELECT sono FROM " . ESTIMATE_COMM . "  ORDER BY PK_ES_ID DESC LIMIT 1";

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		/*	$cunt = mysqli_num_rows($result);
				  if($cunt > 0){
				  $data = mysqli_fetch_array($result);
				  $res = $data['PK_ES_ID'] ;
			  }*/
		return $result;
	}
	function addEstimateComm()
	{
		$sales_no = isset($sales_no) ? $sales_no : '0';

		$query1 = "INSERT INTO " . ESTIMATE_COMM . " SET sono='" . $this->sono . "', sale_date='" . $this->sale_date . "', customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "',cus_plan_dis_amount='" . $this->cus_plan_dis_amount . "',cus_plan_tot_amount='" . $this->cus_plan_tot_amount . "', discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',advance_amt='" . $this->advance_amt . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  delivery_date='" . $this->shipment_to . "',  state='" . $this->reference_number . "',  franchise='" . $this->product_id . "',  streetorarea='" . $this->custom_value . "', remark='" . $this->remark . "',status=1, visibility='1',sales_no='" . $sales_no . "',payment_type='" . $this->paymenttype . "',types_of_payment='" . $this->discount_field4 . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',created_by=" . $_SESSION['user_id'] . "";


		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	function addEstimateCommProduct()
	{

		$query1 = "INSERT INTO " . ESTIMATE_COMM_PRO . " SET fk_so_id='" . $this->fk_so_id . "',fk_category_id='" . $this->category_id . "',fk_items_id='" . $this->item_id . "', qty='" . $this->qty . "',price_type='" . $this->pricetype . "',orientation='" . $this->orientation . "', price='" . $this->price . "', taxable_total='" . $this->total . "', final_total='" . $this->final_total . "'";
		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return 1;
		} else {
			return 0;
		}
	}
	function updateEstimateComm($sales_no, $correction_status, $printing_status, $lamination_status, $croppingandchecking_status)
	{

		// $query1 = "UPDATE  ".ESTIMATE_COMM." SET	  sale_date='".$this->sale_date."', customer_id='".$this->customer_id."', city='".$this->city."',item_total='".$this->item_total."', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."',  discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."', grand_total='".$this->grand_total."',gst_percent='".$this->cgst."',gst_total='".$this->cgst_amt."',sgst_percent='".$this->cgst_final."',sgst_total='".$this->cgst_amt_final."',  gst_type='".$this->gsttype."',  delivery_date='".$this->shipment_to."',  state='".$this->reference_number."',  franchise='".$this->product_id."',  streetorarea='".$this->custom_value."', remark='".$this->remark."',status=1, visibility='1',sales_no='".$sales_no."',payment_type='".$this->paymenttype."',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',modified_by=".$_SESSION['user_id']." where PK_ES_ID ='".$sales_no."'"; 

		$query1 = "UPDATE  " . ESTIMATE_COMM . " SET	 item_total='" . $this->item_total . "', customer_id='" . $this->customer_id . "', discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  franchise='" . $this->product_id . "',     remark='" . $this->remark . "', visibility='1',payment_type='" . $this->paymenttype . "',types_of_payment='" . $this->discount_field4 . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',modified_by=" . $_SESSION['user_id'] . ",correction_status=" . $correction_status . ",printing_status=" . $printing_status . ",lamination_status=" . $lamination_status . ",croppingandchecking_status=" . $croppingandchecking_status . " where PK_ES_ID ='" . $sales_no . "'";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	function updateEstimateCommnew($sales_no, $correction_status, $printing_status, $lamination_status, $croppingandchecking_status)
	{

		// $query1 = "UPDATE  ".ESTIMATE_COMM." SET	  sale_date='".$this->sale_date."', customer_id='".$this->customer_id."', city='".$this->city."',item_total='".$this->item_total."', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."',  discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."', grand_total='".$this->grand_total."',gst_percent='".$this->cgst."',gst_total='".$this->cgst_amt."',sgst_percent='".$this->cgst_final."',sgst_total='".$this->cgst_amt_final."',  gst_type='".$this->gsttype."',  delivery_date='".$this->shipment_to."',  state='".$this->reference_number."',  franchise='".$this->product_id."',  streetorarea='".$this->custom_value."', remark='".$this->remark."',status=1, visibility='1',sales_no='".$sales_no."',payment_type='".$this->paymenttype."',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',modified_by=".$_SESSION['user_id']." where PK_ES_ID ='".$sales_no."'"; 

		// echo  $query1 = "UPDATE  ".ESTIMATE_COMM." SET	 item_total='".$this->item_total."', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."',  discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."', grand_total='".$this->grand_total."',gst_percent='".$this->cgst."',gst_total='".$this->cgst_amt."',sgst_percent='".$this->cgst_final."',sgst_total='".$this->cgst_amt_final."',  gst_type='".$this->gsttype."',  franchise='".$this->product_id."',     remark='".$this->remark."', visibility='1',payment_type='".$this->paymenttype."',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',modified_by=".$_SESSION['user_id'].",correction_status=".$correction_status.",printing_status=".$printing_status.",lamination_status=".$lamination_status.",croppingandchecking_status=".$croppingandchecking_status." where PK_ES_ID ='".$sales_no."'"; 
		// exit;
		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	function deleteEstimateCommProduct($so_id)
	{
		$query = "DELETE FROM " . ESTIMATE_COMM_PRO . " WHERE fk_so_id='" . $so_id . "'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}

	function listEstimateComm()
	{
		$sqlQuery = "SELECT so.sono, cus.cus_code, cus.cus_name, so.grand_total, so.advance_amt, so.status,so.item_total,so.cus_plan_dis_amount,so.cus_plan_tot_amount,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_COMM . " AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM " . ORDER_PAYMENT . " AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt,so.order_status,so.customer_id  FROM " . ESTIMATE_COMM . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  ";



		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= 'where (so.visibility=1 AND so.order_status!=6) AND  (so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.cus_plan_dis_amount LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%") ';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		} else {
			$sqlQuery .= 'where so.visibility=1 AND so.order_status!=6 ';
		}

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}

		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . ESTIMATE_COMM . " where visibility=1 AND order_status!=6  ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {
			$osstatus = '';
			if (isset($record['mixmonthlevel']) && !empty($record['mixmonthlevel'])) {
				$dateVal = strtotime($record['mixmonthlevel']); // Convert to timestamp
				$dateVals = date('Y-m', $dateVal); // Format as 'Y-m'
				$dateValname = date('M Y', $dateVal); // Format as 'M Y'
			} else {
				// Handle cases where 'mixmonthlevel' is missing or empty
				$dateVal = null;
				$dateVals = "N/A";
				$dateValname = "N/A";
			}


			$query = "SELECT ( SELECT est.grand_total  FROM erp_estimate_comm est WHERE est.PK_ES_ID= " . $record['PK_ES_ID'] . ") as grand_total 
			FROM erp_advance_bill_comm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ", bp.fk_es_id) > 0";

			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

			$bulkPay = '0';
			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {

					$bulkPay = $data['grand_total'];
				}
			}

			$query1 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=0";
			$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

			$advance = '0';
			if (mysqli_num_rows($result1) > 0) {
				while ($data1 = mysqli_fetch_array($result1)) {
					$advance = $data1['advance'];
				}
			}

			$query2 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=1";
			$result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);

			$receipts = '0';
			if (mysqli_num_rows($result2) > 0) {
				while ($data2 = mysqli_fetch_array($result2)) {
					$receipts = $data2['advance'];
				}
			}



			$outTotal = $record['grand_total'] - ($receipts + $advance);
			$bulkamt = $outTotal;


			if ($outTotal > 0 && $bulkPay > 0) {
				$bulkamt = floatval(0);
			}

			if ($record['order_status'] == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status'] == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status'] == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status'] == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status'] == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status'] == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status'] == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}

			$query_rp = "SELECT SUM(amount) as total_received 
             FROM erp_rp_payment 
             WHERE order_no = '" . $record['sono'] . "'";

			$result_rp = mysqli_query($GLOBALS["___mysqli_ston"], $query_rp);

			$rp_total = 0;

			if (mysqli_num_rows($result_rp) > 0) {
				$data_rp = mysqli_fetch_assoc($result_rp);
				$rp_total = $data_rp['total_received'] ? $data_rp['total_received'] : 0;
			}
			if ($rp_total > 0) {
				$rows[] = '<span class="text-success view_rp_details" 
                    style="cursor:pointer; font-weight:bold"
                    data-sono="' . $record['sono'] . '">
                    ₹ ' . number_format($rp_total, 2) . '
               </span>';
			} else {
				$rows[] = '-';
			}


			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = $record['sono'];
			$rows[] = $record['cus_name'];
			$rows[] = $record['cus_code'];
			$rows[] = $record['jo_date'];
			$rows[] = $record['cus_plan_dis_amount'];
			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));
			// $rows[] = $payment_type ;
			//  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$colorGTadvance = '';
			$pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
			if ($pending > 0) {
				$colorGTadvance = 'redadvgtcolor';
			} else {
				$colorGTadvance = 'greenadvgtcolor';
			}
			//$advance=$this->getReceiptsadv($record['PK_ES_ID'],0,'erp_advance_comm');
			//$receipt=$this->getReceiptsadv($record['PK_ES_ID'],1,'erp_advance_comm');
			//$bulkPay=$this->getbulkPayment($record['PK_ES_ID'],'erp_estimate_comm','erp_advance_bill_comm');


			//	$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
			// $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			// $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
			$edtoption = '';
			$canceloption = '';
			$rows[] = floatVal($record['grand_total']);
			// $rows[] = floatVal($advance);
			$rows[] = floatVal($record['advance_amt']);
			$rows[] = ($rp_total > 0)
				? '<span class="view_rp_details" data-sono="' . $record['sono'] . '">₹ ' . number_format($rp_total, 2) . '</span>'
				: '-';
			$rows[] = floatVal($bulkamt);

			//if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) {
			$edtoption = '<a href="index.php?erp=68&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
			if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) {
				//$canceloption = '<span data-id='.$record["PK_ES_ID"].' data-sono='.$record["sono"].' class="btnCancel bg-danger btn btn-edit" title="Cancel" id="btnCancel"><span class=" fa fa-times"></span></span>';

				$canceloption = '<span data-id=' . $record["PK_ES_ID"] . ' data-sono=' . $record["sono"] . ' class="btnCancelval bg-danger btn btn-edit" title="Cancel" data-toggle="modal" data-target="#modalCancelBtn" id="btnCancelval"><span class=" fa fa-times"></span></span>';
			}

			//}
			/*	$cancelbtnb = "";
						 if($_SESSION['user_id'] == 1)
						 {
							 $cancelbtnb = '<span data-id='.$record["PK_ES_ID"].' data-sono='.$record["sono"].' class="btnCancelval bg-danger btn btn-edit" title="Cancel" data-toggle="modal" data-target="#modalCancelBtn" id="btnCancelval"><span class=" fa fa-times"></span></span>';
						 }*/
			$rows[] = '<a href="index.php?erp=67&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>' . $edtoption . '' . $canceloption . '';
			//  $rows[] = '<a href="index.php?erp=67&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			/*	if($record['status'] == 2 && $record['osstatus'] == NULL  )
					  {
							 $rows[] = 'Invoice is created';
					  }
					  else{*/
			$rows[] = $osstatus;
			//}

			$rows[] = '<a href="index.php?erp=34&typ=1&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a><a href="index.php?erp=80&type=1&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-warning" data-toggle="tooltip" title="Advance" >Advance</a>';
			$records[] = $rows;
			$i++;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $allRecords,
			"recordsFiltered" => $displayRecords,
			"data" => $records,
		);
		echo json_encode($output);
	}

	function listEstimateCommcomplete()
	{
		$sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.cus_plan_dis_amount,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_COMM . " AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM " . ORDER_PAYMENT . " AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt,so.order_status,so.bill_paid FROM " . ESTIMATE_COMM . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  ";



		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= 'where (so.visibility=1 AND so.order_status=6) AND  (so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.cus_plan_dis_amount LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%" )';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		} else {
			$sqlQuery .= 'where so.visibility=1 AND so.order_status=6 ';
		}

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}
		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		//var_dump($sqlQuery);
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . ESTIMATE_COMM . " where visibility=1 AND order_status=6  ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {
			$osstatus = '';
			if (isset($record['mixmonthlevel']) && !empty($record['mixmonthlevel'])) {
				$dateVal = strtotime($record['mixmonthlevel']); // Convert to timestamp
				$dateVals = date('Y-m', $dateVal); // Format as 'Y-m'
				$dateValname = date('M Y', $dateVal); // Format as 'M Y'
			} else {
				// Handle cases where 'mixmonthlevel' is missing or empty
				$dateVal = null;
				$dateVals = "N/A";
				$dateValname = "N/A";
			}


			// $advance=getReceiptsamount($record['PK_ES_ID'],0,"erp_advance_noncomm");
			// $receipts=getReceiptsamount($record['PK_ES_ID'],1,"erp_advance_noncomm");
			//$bulkPay=getbulkPayment($record['PK_ES_ID'],"erp_estimate_noncomm","erp_advance_bill_noncomm");

			$query = "SELECT ( SELECT est.grand_total  FROM erp_estimate_comm est WHERE est.PK_ES_ID= " . $record['PK_ES_ID'] . ") as grand_total 
FROM erp_advance_bill_comm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ", bp.fk_es_id) > 0";

			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

			$bulkPay = '0';
			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {

					$bulkPay = $data['grand_total'];
				}
			}

			$query1 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=0";
			$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

			$advance = '0';
			if (mysqli_num_rows($result1) > 0) {
				while ($data1 = mysqli_fetch_array($result1)) {
					$advance = $data1['advance'];
				}
			}

			$query2 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=1";
			$result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);

			$receipts = '0';
			if (mysqli_num_rows($result2) > 0) {
				while ($data2 = mysqli_fetch_array($result2)) {
					$receipts = $data2['advance'];
				}
			}



			$outTotal = $record['grand_total'] - ($receipts + $advance);
			$bulkamt = $outTotal;


			if ($outTotal > 0 && $bulkPay > 0) {
				$bulkamt = floatval(0);
			}

			$history_btn = "<span class='btn btn-sm btn-primary view_his_btn' data-es_id='{$record['PK_ES_ID']}' data-cus_code='{$record['cus_code']}' data-cus_name='{$record['cus_name']}' data-sono='{$record['sono']}' data-toggle='modal' data-target='#history_modal' style='margin:10px'><i class='fa fa-history'></i></span>";

			$editBtn = "";
			if ($bulkamt <= 0 || $record['bill_paid'] == 1) {
				$paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
			} else {
				$paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
				$editBtn = '<a href="index.php?erp=68&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
			}


			if ($record['order_status'] == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status'] == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status'] == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status'] == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status'] == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status'] == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status'] == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}
			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = $record['sono'];
			$rows[] = $record['cus_name'];
			$rows[] = $record['cus_code'];
			$rows[] = $record['jo_date'];
			$rows[] = $record['cus_plan_dis_amount'];
			//	$payment_type = ($record['payment_type']== 1)? 'Cash' : 'Credit';

			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));


			// $bar = ($foo == 1) ? "1" : (($foo == 2) ? "2" : "other");
			$foo = 0; // Initialize $foo or retrieve it from an appropriate source
			$bar = ($foo == 1) ? "1" : (($foo == 2) ? "2" : "other");


			// $rows[] = $payment_type ;
			//  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$colorGTadvance = '';
			$pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
			if ($pending > 0) {
				$colorGTadvance = 'redadvgtcolor';
			} else {
				$colorGTadvance = 'greenadvgtcolor';
			}
			//	$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
			// $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			// $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
			// $advance=$this->getReceiptsadv($record['PK_ES_ID'],0,'erp_advance_comm');
			//  $receipt=$this->getReceiptsadv($record['PK_ES_ID'],1,'erp_advance_comm');
			// $bulkPay=$this->getbulkPayment($record['PK_ES_ID'],'erp_estimate_comm','erp_advance_bill_comm');


			//$pendingval = floatVal($record['grand_total']) - (floatVal($advance)  + floatVal($receipts) + floatVal($bulkPay)) ;

			//  	$outTotal = $record['grand_total'] - ( $receipt + $advance  ) ;


			$rows[] = number_format($record['grand_total'], 2);
			$rows[] = number_format(floatVal($advance), 2);
			$rows[] = number_format($bulkamt, 2);

			$editBtn = "";
			if ($record["bill_paid"] == 0) {
				$editBtn = '<a href="index.php?erp=68&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
			}
			$canceloption = '';
			if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) {

				$canceloption = '<span data-id=' . $record["PK_ES_ID"] . ' data-sono=' . $record["sono"] . ' class="btnCancelval bg-danger btn btn-edit" title="Cancel" data-toggle="modal" data-target="#modalCancelBtn" id="btnCancelval"><span class=" fa fa-times"></span></span>';
			}
			$rows[] = '<a href="index.php?erp=67&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>' . $editBtn . '' . $canceloption . '' . $history_btn . '';

			//  $rows[] = '<a href="index.php?erp=67&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			/*	if($record['status'] == 2 && $record['osstatus'] == NULL  )
					  {
							 $rows[] = 'Invoice is created';
					  }
					  else{*/
			$rows[] = $osstatus;
			$rows[] = $paid_status;
			//}
			$rows[] = '<a href="index.php?erp=34&typ=1&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
			$records[] = $rows;
			$i++;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $allRecords,
			"recordsFiltered" => $displayRecords,
			"data" => $records,
		);
		echo json_encode($output);
	}
	function listEstimateCommCancelled()
	{

		$sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,est.reason  FROM erp_estimate_comm_cancel as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN ' . CITIES . ' c ON c.pk_city_id = cm.cus_city LEFT JOIN ' . STATES . ' s ON s.state_code= cm.cus_state ';

		$fromDateval = isset($_POST['fromDate']) ? date('Y-m-d', strtotime($_POST['fromDate'])) : null;
		$toDateval = isset($_POST['toDate']) ? date('Y-m-d', strtotime($_POST['toDate'])) : null;


		if (!empty($_POST['search']['value'])) {
			$searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));
			$sqlQuery .= ' where (est.visibility=1   )';

			$sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';
			$sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';
			$sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';
			$sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
		} else {
			//$sqlQuery .= 'where est.visibility=1 '.$cusid.'';
			$sqlQuery .= 'where est.visibility=1  ';
		}
		if (!empty($_POST['order'])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY est.sono, est.sale_date ASC ';
		}
		$display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);
		if ($_POST['length'] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		//echo  $sqlQuery;
		$stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);
		$stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_comm_cancel where visibility=1 ');
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);
		$displayRecords = mysqli_num_rows($display_stmt);

		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {
			$osstatus = '';

			$query = "SELECT ( SELECT est.grand_total  FROM erp_estimate_comm est WHERE est.PK_ES_ID= " . $record['PK_ES_ID'] . ") as grand_total 
				FROM erp_advance_bill_comm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ", bp.fk_es_id) > 0";

			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

			$bulkPay = '0';
			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {

					$bulkPay = $data['grand_total'];
				}
			}

			$query1 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=0";
			$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

			$advance = '0';
			if (mysqli_num_rows($result1) > 0) {
				while ($data1 = mysqli_fetch_array($result1)) {
					$advance = $data1['advance'];
				}
			}

			$query2 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=1";
			$result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);

			$receipts = '0';
			if (mysqli_num_rows($result2) > 0) {
				while ($data2 = mysqli_fetch_array($result2)) {
					$receipts = $data2['advance'];
				}
			}



			$outTotal = $record['grand_total'] - ($receipts + $advance);
			$bulkamt = $outTotal;


			if ($outTotal > 0 && $bulkPay > 0) {
				$bulkamt = floatval(0);
			}
			if ($record['order_status'] == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status'] == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status'] == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status'] == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status'] == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status'] == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status'] == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}
			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = $record['sono'];
			$rows[] = $record['cusname'];
			$rows[] = $record['cuscode'];
			$rows[] = date('d-m-Y', strtotime($record['sale_date']));

			/*$advance=$this->getReceiptsadv($record['PK_ES_ID'],0,'erp_advance_comm');
					 $receipt=$this->getReceiptsadv($record['PK_ES_ID'],1,'erp_advance_comm');
					 $bulkPay=$this->getbulkPayment($record['PK_ES_ID'],'erp_estimate_comm','erp_advance_bill_comm');
		 */

			$rows[] = number_format(floatVal($record['grand_total']), 2);

			$rows[] = number_format(floatVal($advance), 2);
			$rows[] = number_format($bulkamt, 2);
			$rows[] = $record['reason'];
			$rows[] = '<a href="index.php?erp=124&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

			// $rows[] = $osstatus;
			$records[] = $rows;
			$i++;
		}
		$output = array(
			'draw' => intval($_POST['draw']),
			'recordsTotal' => $allRecords,
			'recordsFiltered' => $displayRecords,
			'data' => $records,
		);
		echo json_encode($output);
	}

	public function listEstimateNonCommCancelled()
	{
		$sqlQuery = 'SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status,cm.pk_cus_id ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,est.reason FROM erp_estimate_noncomm_cancel as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN ' . CITIES . ' c ON c.pk_city_id = cm.cus_city LEFT JOIN ' . STATES . ' s ON s.state_code= cm.cus_state ';
		//$fromDateval = date( 'Y-m-d', strtotime( $_POST[ 'fromDate' ] ) );

		//    $toDateval = date( 'Y-m-d', strtotime( $_POST[ 'toDate' ] ) );


		if (!empty($_POST['search']['value'])) {
			$searchdate = date('Y-m-d', strtotime(trim($_POST['search']['value'])));
			$sqlQuery .= ' where (est.visibility=1 )';

			$sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST['search']['value']) . '%" ';
			$sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';
			$sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST['search']['value']) . '%" ';
			$sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST['search']['value']) . '%") ';
		} else {
			//$sqlQuery .= 'where est.visibility=1 '.$cusid.'';
			$sqlQuery .= 'where est.visibility=1  ';
		}
		if (!empty($_POST['order'])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY est.sono, est.sale_date ASC ';
		}
		$display_stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);
		if ($_POST['length'] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		//var_dump( $sqlQuery );
		// exit;
		//echo  $sqlQuery;
		$stmt = mysqli_query($GLOBALS['___mysqli_ston'], $sqlQuery);
		$stmtTotal = mysqli_query($GLOBALS['___mysqli_ston'], 'SELECT * FROM  erp_estimate_noncomm_cancel where visibility=1 ');
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);
		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {
			$osstatus = '';

			$query = "SELECT ( SELECT est.grand_total  FROM erp_estimate_noncomm est WHERE est.PK_ES_ID= " . $record['PK_ES_ID'] . ") as grand_total 
			FROM erp_advance_bill_noncomm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ", bp.fk_es_id) > 0";

			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

			$bulkPay = '0';
			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {

					$bulkPay = $data['grand_total'];
				}
			}

			$query1 = "SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=0";
			$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

			$advance = '0';
			if (mysqli_num_rows($result1) > 0) {
				while ($data1 = mysqli_fetch_array($result1)) {
					$advance = $data1['advance'];
				}
			}

			$query2 = "SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=1";
			$result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);

			$receipts = '0';
			if (mysqli_num_rows($result2) > 0) {
				while ($data2 = mysqli_fetch_array($result2)) {
					$receipts = $data2['advance'];
				}
			}



			$outTotal = $record['grand_total'] - ($receipts + $advance);
			$bulkamt = $outTotal;


			if ($outTotal > 0 && $bulkPay > 0) {
				$bulkamt = floatval(0);
			}
			if ($record['order_status'] == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status'] == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status'] == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status'] == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status'] == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status'] == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status'] == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}
			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = $record['sono'];

			$rows[] = $record['cusname'];
			$rows[] = $record['cuscode'];
			$rows[] = date('d-m-Y', strtotime($record['sale_date']));
			//$advance=$this->getReceiptsadv($record['PK_ES_ID'],0,'erp_advance_comm');
			//$receipt=$this->getReceiptsadv($record['PK_ES_ID'],1,'erp_advance_comm');
			//$bulkPay=$this->getbulkPayment($record['PK_ES_ID'],'erp_estimate_comm','erp_advance_bill_comm');


			//$pendingval = floatVal($record['grand_total']) - (floatVal($advance)  + floatVal($receipts) + floatVal($bulkPay)) ;
			$rows[] = $record['grand_total'];

			$rows[] = number_format(floatVal($advance), 2);
			$rows[] = number_format($bulkamt, 2);
			$rows[] = $record['reason'];
			$rows[] = '<a href="index.php?erp=123&id=' . $record['PK_ES_ID'] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

			//  $rows[] = $osstatus;
			$records[] = $rows;
			$i++;
		}
		$output = array(
			'draw' => intval($_POST['draw']),
			'recordsTotal' => $allRecords,
			'recordsFiltered' => $displayRecords,
			'data' => $records,
		);

		echo json_encode($output);
	}

	function listEstimateCommT_O_P()
	{


		$sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_COMM . " AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM " . ORDER_PAYMENT . " AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt,so.order_status,so.types_of_payment,so.bill_paid  FROM " . ESTIMATE_COMM . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  ";

		//$top = ($_POST["types_of_payment"]) ? 'AND  so.types_of_payment = '.$_POST["types_of_payment"].'' : "";


		$top = ($_POST["types_of_payment"]) ? 'AND  so.types_of_payment = ' . $_POST["types_of_payment"] . '' : '0';
		$top2 = ($_POST["types_of_payment"]) ? 'AND  types_of_payment = ' . $_POST["types_of_payment"] . '' : '0';

		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= 'where (so.visibility=1 ' . $top . ' ) AND  (so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%" )';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		} else {
			$sqlQuery .= 'where so.visibility=1  AND  so.types_of_payment = ' . $_POST["types_of_payment"] . '';
		}

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}
		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		//var_dump($sqlQuery);
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . ESTIMATE_COMM . " where visibility=1   " . $top2 . " ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {

			$osstatus = '';

			if (isset($record['mixmonthlevel']) && !empty($record['mixmonthlevel'])) {
				$dateVal = strtotime($record['mixmonthlevel']); // Convert to timestamp
				$dateVals = date('Y-m', $dateVal); // Format as 'Y-m'
				$dateValname = date('M Y', $dateVal); // Format as 'M Y'
			} else {
				// Handle cases where 'mixmonthlevel' is missing or empty
				$dateVal = null;
				$dateVals = "N/A";
				$dateValname = "N/A";
			}

			// $advance=getReceiptsamount($record['PK_ES_ID'],0,"erp_advance_noncomm");
			// $receipts=getReceiptsamount($record['PK_ES_ID'],1,"erp_advance_noncomm");
			//$bulkPay=getbulkPayment($record['PK_ES_ID'],"erp_estimate_noncomm","erp_advance_bill_noncomm");

			$query = "SELECT ( SELECT est.grand_total  FROM erp_estimate_comm est WHERE est.PK_ES_ID= " . $record['PK_ES_ID'] . ") as grand_total 
  		FROM erp_advance_bill_comm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ", bp.fk_es_id) > 0";

			//  $query = "SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=" . $cusID ;
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

			$bulkPay = '0';
			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {

					$bulkPay = $data['grand_total'];
				}
			}

			$query1 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=0";
			$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

			$advance = '0';
			if (mysqli_num_rows($result1) > 0) {
				while ($data1 = mysqli_fetch_array($result1)) {
					$advance = $data1['advance'];
				}
			}

			$query2 = "SELECT sum(advance_amount) as advance FROM erp_advance_comm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=1";
			$result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);

			$receipts = '0';
			if (mysqli_num_rows($result2) > 0) {
				while ($data2 = mysqli_fetch_array($result2)) {
					$receipts = $data2['advance'];
				}
			}



			$outTotal = $record['grand_total'] - ($receipts + $advance);
			$bulkamt = $outTotal;
			//$bulkamt =0;
			//var_dump($outTotal);
			// var_dump($bulkpay);


			if ($outTotal > 0 && $bulkPay > 0) {
				$bulkamt = floatval(0);
			}
			if ($bulkamt <= 0 || $record['bill_paid'] == 1) {
				$paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
			} else {
				$paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
			}


			if ($record['order_status'] == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status'] == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status'] == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status'] == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status'] == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status'] == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status'] == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}
			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = ucfirst($record['sono']);
			$rows[] = $record['cus_name'];
			$rows[] = $record['cus_code'];
			$rows[] = $record['types_of_payment'];
			$rows[] = $record['jo_date'];
			//	$payment_type = ($record['payment_type']== 1)? 'Cash' : 'Credit';

			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));


			$bar = ($foo == 1) ? "1" : (($foo == 2) ? "2" : "other");

			// $rows[] = $payment_type ;
			//  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$colorGTadvance = '';
			$pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
			if ($pending > 0) {
				$colorGTadvance = 'redadvgtcolor';
			} else {
				$colorGTadvance = 'greenadvgtcolor';
			}
			//	$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
			// $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			// $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';

			$rows[] = number_format($record['grand_total'], 2);
			$rows[] = '<a href="index.php?erp=67&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';

			//  $rows[] = '<a href="index.php?erp=67&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			/*	if($record['status'] == 2 && $record['osstatus'] == NULL  )
					  {
							 $rows[] = 'Invoice is created';
					  }
					  else{*/
			$rows[] = $osstatus;
			$rows[] = $paid_status;
			//}
			$rows[] = '<a href="index.php?erp=34&typ=1&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
			$records[] = $rows;
			$i++;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $allRecords,
			"recordsFiltered" => $displayRecords,
			"data" => $records,
		);
		echo json_encode($output);
	}

	function getSalesOrderById($soid = "")
	{
		$query = "SELECT so.PK_ES_ID  as soId ,so.sono,so.sale_date,sum(so.discount_final) as discount_final,sum(so.discount_final_amt) as discount_final_amt,
		 AVG(so.gst_percent) as gst_percent,AVG(so.gst_total) as gst_total,sum(so.item_total) as item_total,sum(so.cus_plan_dis_amount) as cus_plan_dis_amount,sum(so.cus_plan_tot_amount) as cus_plan_tot_amount,
		 sum(so.grand_total) as grand_total,so.customer_id,so.sono,so.reference_number,so.types,so.price_type,so.payment_type,
		 so.orientation,so.city,so.discount_field, so.discount_final, so.discount_final_amt, so.discount_type, 
		 so.discount_field2, so.discount_final2, so.discount_final_amt2, so.discount_type2, so.discount_field3, 
		 so.discount_final3, so.discount_final_amt3, so.discount_type3, so.discount_field4, so.discount_final4, 
		 so.discount_final_amt4, so.discount_type4, so.discount_field5, so.discount_final5, so.discount_final_amt5, 
		 so.discount_type5,so.remark,so.gst_type,so.caltype1,so.caltype2,so.caltype3,so.caltype4,so.caltype5,
		 so.delivery_date,so.state,so.franchise,sgst_percent,sgst_total,(SELECT sum(advance_amount) as advance
		 FROM `erp_advance_comm` where fk_es_id=" . $soid . " and type=0) as advance,so.streetorarea,fm.cat_name,
		 so.created_on,so.correction_status,so.printing_status,so.lamination_status,so.croppingandchecking_status, 
		 IF(so.created_by > 0,(SELECT um.user_name as user_names FROM " . USER_MASTER . " AS um WHERE um.user_id =so.created_by),'') as createdby,
		so.types_of_payment, pm.plan_name, pm.discount FROM " . ESTIMATE_COMM . " so LEFT JOIN erp_category fm ON fm.pk_cat_id = so.franchise 
		LEFT JOIN tbl_customer_plan_detail cpd ON cpd.fk_cust_id = so.customer_id 
		LEFT JOIN tbl_plan_master pm ON pm.pk_id = cpd.fk_plan_id WHERE so.PK_ES_ID =" . $soid . "";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getSalesOrderProductByPROId($soid = "")
	{
		$query = "SELECT * FROM " . ESTIMATE_COMM_PRO . "  WHERE fk_so_id IN(" . $soid . ") ORDER BY PK_ESP_ID ASC";

		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getSalesOrderProductById($sopid = "")
	{

		$query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,sqp.fk_category_id,sqp.product_id,sqp.types,sqp.price_type,sqp.orientation FROM " . ESTIMATE_COMM_PRO . " sqp   WHERE sqp.PK_ESP_ID='" . $sopid . "' ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getSalesOrderAddressById($soid)
	{
		$query = "SELECT * FROM " . ESTIMATE_COMM . " sq LEFT JOIN " . CUSTOMER . " cus ON cus.pk_cus_id = sq.customer_id  WHERE PK_ES_ID=" . $soid . "";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function EditCustomer()
	{
		$query = "SELECT * FROM " . COMPANY . " WHERE pk_com_id=1 AND visibility != '0'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	/*function EditCustomer(){
	   $query = "SELECT * FROM ".CUSTOMER." WHERE pk_com_id=1 AND visibility != '0'";
	   $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	   return $res;
   }*/
	function getSalesOrderProductByIdForPDF($sqp_id)
	{
		//	fk_specialeffects_id fk_size_id product_name price final_total gst_total item_total grand_total qty name
		// $query = "SELECT p.product_name ,sqp.price, sqp.final_total,   sqp.qty, isheet.name as innername,se.name as specialeffectsname,s.name as sizename FROM ".SALES_ORDER_PRODUCT." sqp LEFT JOIN ".PRODUCT." AS p ON p.pk_product_id =sqp.product_id LEFT JOIN ".CATEGORY." AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN ".INNER_SHEET." AS isheet ON isheet.pk_is_id = sqp.fk_innersheet_id LEFT JOIN ".SPECIAL_EFFECTS." AS se ON se.pk_se_id = sqp.fk_specialeffects_id LEFT JOIN ".SIZE." AS s ON s.pk_size_id = sqp.fk_size_id WHERE p.visibility='1' and sqp.PK_ESP_ID='".$sqp_id."'";
		// IF(so.types = 1, (SELECT GROUP_CONCAT(types_name) as typesname  FROM  ".SALES_ORDER_PRODUCT." sop LEFT JOIN ".TYPES." tys ON tys.pk_types_id  = sop.itemtype where	sop.fk_so_id = so.PK_ES_ID) , 'Commercial') as typesnameval


		$query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,its.fk_item_id as itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,p.product_name,c.cat_name,sqp.fk_category_id,sqp.product_id,its.first_price,its.second_price,sqp.types,sqp.price_type,sqp.orientation FROM " . ESTIMATE_COMM_PRO . " sqp LEFT JOIN " . PRODUCT . " p ON sqp.product_id =p.pk_product_id LEFT JOIN " . CATEGORY . " c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN " . ITEMS . " its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN " . TYPES . " ty ON ty.pk_types_id = sqp.itemtype LEFT JOIN " . ESTIMATE_COMM . " so ON sqp.fk_so_id=so.PK_ES_ID  WHERE sqp.PK_ESP_ID='" . $sqp_id . "' ";


		//  $query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty,sqp.fk_item_id, ty.pk_types_id,ty.types_name,sqp.fk_types_id,ty.type_tables,ty.table_pk_id FROM ".SALES_ORDER_PRODUCT." sqp  LEFT JOIN ".TYPES." AS ty ON ty.pk_types_id = sqp.fk_types_id  WHERE sqp.PK_ESP_ID='".$sqp_id."' ";

		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	public function changecommPaidorder($soid, $status)
	{

		$query1 = "UPDATE  " . ESTIMATE_COMM . " SET  order_status= " . $status . "  where PK_ES_ID = " . $soid . "";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	public function changecommPaidorderstatus($soid, $status, $sdate)
	{
		$query = "SELECT * FROM " . ORDER_STATUS . "  WHERE fk_so_id=" . $soid . " AND close_status =1; ";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);
		if ($cunt == 0) {
			$query1 = "INSERT INTO  " . ORDER_STATUS . "  SET fk_so_id=" . $soid . " ,date='" . $sdate . "',status=" . $status . ",types=1 , statuschangeby=" . $_SESSION['user_name'] . ", close_status =1,visibility =1 ";
			$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
			if ($result1) {
				return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}


	/*Non Commercial */



	function EstimateNonComm_lastinserted_id()
	{
		$res = 0;
		$query = "SELECT PK_ES_ID FROM " . ESTIMATE_NONCOMM . " GROUP BY PK_ES_ID ORDER BY PK_ES_ID DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);

		if ($cunt > 0) {
			$data = mysqli_fetch_array($result);
			$res = $data['PK_ES_ID'];
		}
		return $res;
	}
	function EstimateNonComm_last()
	{
		$res = 0;
		// $query = "SELECT sono FROM ".ESTIMATE_NONCOMM." where MONTH(sale_date) >= 4 AND YEAR(sale_date) = YEAR(CURRENT_DATE()) GROUP BY PK_ES_ID ORDER BY PK_ES_ID DESC";
		$query = "SELECT sono FROM " . ESTIMATE_NONCOMM . "  ORDER BY PK_ES_ID DESC LIMIT 1";

		//echo $query;
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		return $result;
	}


	function addEstimateNonComm()
	{

		$query1 = "INSERT INTO " . ESTIMATE_NONCOMM . " SET sono='" . $this->sono . "', sale_date='" . $this->sale_date . "', customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "',cus_plan_dis_amount='" . $this->cus_plan_dis_amount . "',cus_plan_tot_amount='" . $this->cus_plan_tot_amount . "', discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  delivery_date='" . $this->shipment_to . "',  state='" . $this->reference_number . "',  franchise='" . $this->product_id . "',  streetorarea='" . $this->custom_value . "', remark='" . $this->remark . "',status=1, visibility='1',payment_type='" . $this->paymenttype . "',types_of_payment='" . $this->discount_field4 . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',created_by=" . $_SESSION['user_id'] . "";

		// $query1 = "INSERT INTO ".ESTIMATE_NONCOMM." SET sono='".$this->sono."', sale_date='".$this->sale_date."', customer_id='".$this->customer_id."', city='".$this->city."',item_total='".$this->item_total."', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."',  discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."', grand_total='".$this->grand_total."',gst_percent='".$this->cgst."',gst_total='".$this->cgst_amt."',  gst_type='".$this->gsttype."',delivery_date='".$this->shipment_to."',  state='".$this->reference_number."',  franchise='".$this->product_id."', remark='".$this->remark."',status=1, visibility='1',sales_no='".$sales_no."',payment_type='".$this->paymenttype."',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',created_by=".$_SESSION['user_id']."";  


		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	function addEstimateNonCommProduct($data)
	{

		$group_id = $data['group_id'] ?? 1;
		$query1 = "INSERT INTO " . ESTIMATE_NONCOMM_PRO . " SET fk_so_id='" . $this->fk_so_id . "',  itemtype='" . $this->types_id . "', fk_items_id='" . $this->item_id . "', qty='" . $this->qty . "',price_type='" . $this->pricetype . "',orientation='" . $this->orientation . "', price='" . $this->price . "', taxable_total='" . $this->total . "', final_total='" . $this->final_total . "', group_id ='$group_id'";
		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return 1;
		} else {
			return 0;
		}
	}
	function updateEstimateNonComm($sales_no, $correction_status, $printing_status, $lamination_status, $croppingandchecking_status)
	{

		$query1 = "UPDATE  " . ESTIMATE_NONCOMM . " SET	 item_total='" . $this->item_total . "', customer_id='" . $this->customer_id . "', discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  franchise='" . $this->product_id . "',  remark='" . $this->remark . "', visibility='1',payment_type='" . $this->paymenttype . "',types_of_payment='" . $this->discount_field4 . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',modified_by=" . $_SESSION['user_id'] . ",correction_status=" . $correction_status . ",printing_status=" . $printing_status . ",lamination_status=" . $lamination_status . ",croppingandchecking_status=" . $croppingandchecking_status . " where PK_ES_ID ='" . $sales_no . "'";


		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	function deleteEstimateNonCommProduct($so_id)
	{
		$query = "DELETE FROM " . ESTIMATE_NONCOMM_PRO . " WHERE fk_so_id='" . $so_id . "'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}



	function listEstimateNonComm()
	{
		$sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.cus_plan_dis_amount,
	   so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  
	   so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_NONCOMM . " AS si WHERE si.fk_so_id =so.PK_ES_ID) ,
	   (SELECT sum(op.paid_amount) as receipt FROM " . ORDER_PAYMENT . " AS op WHERE op.fk_order_no =so.PK_ES_ID )) as receipt,so.order_status,so.customer_id  FROM " . ESTIMATE_NONCOMM . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  ";



		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= 'where (so.visibility=1 AND so.order_status !=6 ) AND  (so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.cus_plan_dis_amount LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%") ';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		} else {
			$sqlQuery .= 'where so.visibility=1 AND so.order_status !=6 ';
		}


		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}
		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		//var_dump($sqlQuery);
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		//    var_dump($sqlQuery);
		//    exit;

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . ESTIMATE_NONCOMM . " where visibility=1 AND order_status !=6  ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {
			$osstatus = '';
			if (isset($record['mixmonthlevel']) && !empty($record['mixmonthlevel'])) {
				$dateVal = strtotime($record['mixmonthlevel']); // Convert to timestamp
				$dateVals = date('Y-m', $dateVal); // Format as 'Y-m'
				$dateValname = date('M Y', $dateVal); // Format as 'M Y'
			} else {
				// Handle cases where 'mixmonthlevel' is missing or empty
				$dateVal = null;
				$dateVals = "N/A";
				$dateValname = "N/A";
			}

			if ($record['order_status'] == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status'] == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status'] == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status'] == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status'] == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status'] == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status'] == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}

			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = $record['sono'];
			$rows[] = $record['cus_name'];

			$rows[] = $record['cus_code'];
			$rows[] = $record['jo_date'];

			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));
			// $rows[] = $payment_type ;
			//  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$colorGTadvance = '';
			$pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
			if ($pending > 0) {
				$colorGTadvance = 'redadvgtcolor';
			} else {
				$colorGTadvance = 'greenadvgtcolor';
			}

			$advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');
			$receipt = $this->getReceiptsadv($record['PK_ES_ID'], 1, 'erp_advance_noncomm');
			$bulkPay = $this->getbulkPayment($record['PK_ES_ID'], 'erp_estimate_noncomm', 'erp_advance_bill_noncomm');



			$outTotal = $record['grand_total'] - ($receipt + $advance);
			$bulkamt = $outTotal;


			if ($outTotal > 0 && $bulkPay > 0) {
				$bulkamt = floatval(0);
			}


			//	$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
			// $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			// $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
			$edtoption = '';
			$canceloption = '';
			$rows[] = floatval($record['grand_total']);
			$rows[] = $record['cus_plan_dis_amount'];

			$rows[] = floatVal($advance);
			$rows[] = floatVal($bulkamt);
			//	$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
			// $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			// $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';

			$edtoption = '';
			//	if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) {
			$edtoption = '<a href="index.php?erp=70&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
			//}
			if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) {
				//$canceloption = '<span data-id='.$record["PK_ES_ID"].' data-sono='.$record["sono"].' class="btnCancel bg-danger btn btn-edit" title="Cancel" id="btnCancel"><span class=" fa fa-times"></span></span>';
				$canceloption = '<span data-id=' . $record["PK_ES_ID"] . ' data-sono=' . $record["sono"] . ' class="btnCancelval bg-danger btn btn-edit" title="Cancel" data-toggle="modal" data-target="#modalCancelBtn" id="btnCancelval"><span class=" fa fa-times"></span></span>';
			}
			/*	$cancelbtnb = "";
					  if($_SESSION['user_id'] == 1)
					  {
						  $cancelbtnb = '<span data-id='.$record["PK_ES_ID"].' data-sono='.$record["sono"].' class="btnCancelval bg-danger btn btn-edit" title="Cancel" data-toggle="modal" data-target="#modalCancelBtn" id="btnCancelval"><span class=" fa fa-times"></span></span>';
					  }*/

			$rows[] = '<a href="index.php?erp=69&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>' . $edtoption . ' ' . $canceloption . '';


			// $rows[] = '<a href="index.php?erp=69&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			/*if($record['status'] == 2 && $record['osstatus'] == NULL  )
					 {
							$rows[] = 'Invoice is created';
					 }
					 else{*/
			$rows[] = $osstatus;
			//}
			$rows[] = '<a href="index.php?erp=34&typ=2&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a><a href="index.php?erp=80&type=2&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-warning" data-toggle="tooltip" title="Advance" >Advance</a>';
			$records[] = $rows;
			$i++;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $allRecords,
			"recordsFiltered" => $displayRecords,
			"data" => $records,
		);

		echo json_encode($output);
	}

	function listEstimateNonCommComplete()
	{
		$sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.cus_plan_dis_amount,so.cus_plan_tot_amount,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_NONCOMM . " AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM " . ORDER_PAYMENT . " AS op WHERE op.fk_order_no =so.PK_ES_ID )) as receipt,so.order_status,so.bill_paid FROM " . ESTIMATE_NONCOMM . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  ";



		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= 'where (so.visibility=1 AND so.order_status=6 ) AND  (so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.cus_plan_dis_amount LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%" )';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		} else {
			$sqlQuery .= 'where so.visibility=1  AND so.order_status =6 ';
		}

		// var_dump($sqlQuery);
		// exit;

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}
		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		//var_dump($sqlQuery);
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . ESTIMATE_NONCOMM . " where visibility=1 AND order_status =6  ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {

			$osstatus = '';
			if (isset($record['mixmonthlevel']) && !empty($record['mixmonthlevel'])) {
				$dateVal = strtotime($record['mixmonthlevel']); // Convert to timestamp
				$dateVals = date('Y-m', $dateVal); // Format as 'Y-m'
				$dateValname = date('M Y', $dateVal); // Format as 'M Y'
			} else {
				// Handle cases where 'mixmonthlevel' is missing or empty
				$dateVal = null;
				$dateVals = "N/A";
				$dateValname = "N/A";
			}

			// $advance=getReceiptsamount($record['PK_ES_ID'],0,"erp_advance_noncomm");
			// $receipts=getReceiptsamount($record['PK_ES_ID'],1,"erp_advance_noncomm");
			//$bulkPay=getbulkPayment($record['PK_ES_ID'],"erp_estimate_noncomm","erp_advance_bill_noncomm");

			$query = "SELECT ( SELECT est.grand_total  FROM erp_estimate_noncomm est WHERE est.PK_ES_ID= " . $record['PK_ES_ID'] . ") as grand_total 
  FROM erp_advance_bill_noncomm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ", bp.fk_es_id) > 0";

			//  $query = "SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=" . $cusID ;
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

			$bulkPay = '0';
			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {

					$bulkPay = $data['grand_total'];
				}
			}

			$query1 = "SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=0";
			$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

			$advance = '0';
			if (mysqli_num_rows($result1) > 0) {
				while ($data1 = mysqli_fetch_array($result1)) {
					$advance = $data1['advance'];
				}
			}
			$query2 = "SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=1";
			$result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);

			$receipts = '0';
			if (mysqli_num_rows($result2) > 0) {
				while ($data2 = mysqli_fetch_array($result2)) {
					$receipts = $data2['advance'];
				}
			}




			$outTotal = floatval($record['grand_total']) - (floatval($receipts) + floatval($advance));
			//  var_dump($outTotal);
			//   var_dump($bulkPay);
			$bulkamt = $outTotal;
			//$bulkamt =0;


			$editBtn = "";

			if ($outTotal > 0 && $bulkPay > 0) {
				$bulkamt = floatval(0);
			}

			//	 var_dump($record['bill_paid']);
			if ($bulkamt <= 0 || $record['bill_paid'] == 1) {

				$paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
			} else {
				$paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
				$editBtn = '<a href="index.php?erp=70&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
			}


			if ($record['order_status'] == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status'] == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status'] == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status'] == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status'] == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status'] == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status'] == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}
			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = $record['sono'];
			$rows[] = $record['cus_name'];
			$rows[] = $record['cus_code'];
			$rows[] = $record['jo_date'];

			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));
			// $rows[] = $payment_type ;
			//  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$colorGTadvance = '';
			$pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
			if ($pending > 0) {
				$colorGTadvance = 'redadvgtcolor';
			} else {
				$colorGTadvance = 'greenadvgtcolor';
			}

			$history_btn = "<span class='btn btn-sm btn-primary view_his_btn' data-es_id='{$record['PK_ES_ID']}' data-cus_code='{$record['cus_code']}' data-cus_name='{$record['cus_name']}' data-sono='{$record['sono']}' data-toggle='modal' data-target='#history_modal' style='margin:10px'><i class='fa fa-history'></i></span>";


			//	$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
			// $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			// $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
			//  $rows[] = '<p class="alignrightAmount">'.$record['grand_total'].'</p>';
			//  $advance=$this->getReceiptsadv($record['PK_ES_ID'],0,'erp_advance_comm');
			//	$receipt=$this->getReceiptsadv($record['PK_ES_ID'],1,'erp_advance_comm');



			//$pendingval = floatVal($record['grand_total']) - (floatVal($advance)  +  floatVal($receipts) + floatval($bulkPay)) ;
			/*var_dump($record['grand_total']);
					 var_dump($advance);
					 var_dump($pendingval);*/

			$rows[] = number_format($record['grand_total'], 2);
			$rows[] = $record['cus_plan_dis_amount'];
			$rows[] = number_format(floatVal($advance), 2);
			$rows[] = number_format($bulkamt, 2);

			$canceloption = '';
			if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) {

				$canceloption = '<span data-id=' . $record["PK_ES_ID"] . ' data-sono=' . $record["sono"] . ' class="btnCancelval bg-danger btn btn-edit" title="Cancel" data-toggle="modal" data-target="#modalCancelBtn" id="btnCancelval"><span class=" fa fa-times"></span></span>';
			}


			$rows[] = '<a href="index.php?erp=69&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>' . $editBtn . '' . $canceloption . '' . $history_btn . '';
			// $rows[] = '<a href="index.php?erp=69&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			/*if($record['status'] == 2 && $record['osstatus'] == NULL  )
					 {
							$rows[] = 'Invoice is created';
					 }
					 else{*/
			$rows[] = $osstatus;
			$rows[] = $paid_status;
			//}
			$rows[] = '<a href="index.php?erp=34&typ=2&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
			$records[] = $rows;
			$i++;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $allRecords,
			"recordsFiltered" => $displayRecords,
			"data" => $records,
		);
		echo json_encode($output);
	}
	function listEstimatenonNonCommT_O_P()
	{
		$sqlQuery = "SELECT so.sono,cus.cus_code, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . INVOICE_NONCOMM . " AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM " . ORDER_PAYMENT . " AS op WHERE op.fk_order_no =so.PK_ES_ID )) as receipt,so.order_status,so.types_of_payment,so.bill_paid   FROM " . ESTIMATE_NONCOMM . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  ";

		$top = ($_POST["types_of_payment"]) ? 'AND  so.types_of_payment = ' . $_POST["types_of_payment"] . '' : '0';
		$top2 = ($_POST["types_of_payment"]) ? 'AND  types_of_payment = ' . $_POST["types_of_payment"] . '' : '0';


		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= 'where (so.visibility=1 ' . $top . ') AND  (so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR so.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%" )';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		} else {
			$sqlQuery .= 'where so.visibility=1  AND  so.types_of_payment = ' . $_POST["types_of_payment"] . ' ';
		}

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}
		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		//var_dump($sqlQuery);
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . ESTIMATE_NONCOMM . " where visibility=1 " . $top2 . " ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {

			$osstatus = '';
			if (isset($record['mixmonthlevel']) && !empty($record['mixmonthlevel'])) {
				$dateVal = strtotime($record['mixmonthlevel']); // Convert to timestamp
				$dateVals = date('Y-m', $dateVal); // Format as 'Y-m'
				$dateValname = date('M Y', $dateVal); // Format as 'M Y'
			} else {
				// Handle cases where 'mixmonthlevel' is missing or empty
				$dateVal = null;
				$dateVals = "N/A";
				$dateValname = "N/A";
			}

			// $advance=getReceiptsamount($record['PK_ES_ID'],0,"erp_advance_noncomm");
			// $receipts=getReceiptsamount($record['PK_ES_ID'],1,"erp_advance_noncomm");
			//$bulkPay=getbulkPayment($record['PK_ES_ID'],"erp_estimate_noncomm","erp_advance_bill_noncomm");

			$query = "SELECT ( SELECT est.grand_total  FROM erp_estimate_noncomm est WHERE est.PK_ES_ID= " . $record['PK_ES_ID'] . ") as grand_total 
  FROM erp_advance_bill_noncomm bp  WHERE  FIND_IN_SET(" . $record['PK_ES_ID'] . ", bp.fk_es_id) > 0";

			//  $query = "SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=" . $cusID ;
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

			$bulkPay = '0';
			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {

					$bulkPay = $data['grand_total'];
				}
			}

			$query1 = "SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=0";
			$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

			$advance = '0';
			if (mysqli_num_rows($result1) > 0) {
				while ($data1 = mysqli_fetch_array($result1)) {
					$advance = $data1['advance'];
				}
			}

			$query2 = "SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where fk_es_id=" . $record['PK_ES_ID'] . " AND type=1";
			$result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);

			$receipts = '0';
			if (mysqli_num_rows($result2) > 0) {
				while ($data2 = mysqli_fetch_array($result2)) {
					$receipts = $data2['advance'];
				}
			}



			$outTotal = $record['grand_total'] - ($receipts + $advance);
			$bulkamt = $outTotal;
			//$bulkamt =0;
			//var_dump($outTotal);
			// var_dump($bulkpay);


			if ($outTotal > 0 && $bulkPay > 0) {
				$bulkamt = floatval(0);
			}
			if ($bulkamt <= 0 || $record['bill_paid'] == 1) {
				$paid_status = '<span class="custom_btn_class text-success" >Amount Received</span>';
			} else {
				$paid_status = '<span class="custom_btn_class text-danger" >Not Amount Received</span>';
			}


			if ($record['order_status'] == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['order_status'] == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['order_status'] == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['order_status'] == 4) {
				$osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
			} else if ($record['order_status'] == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['order_status'] == 6) {
				$osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
			} else if ($record['order_status'] == 0) {
				$osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
			}
			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = ucfirst($record['sono']);
			$rows[] = $record['cus_name'];
			$rows[] = $record['cus_code'];
			$rows[] = $record['types_of_payment'];
			$rows[] = $record['jo_date'];
			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));
			// $rows[] = $payment_type ;
			//  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$colorGTadvance = '';
			$pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
			if ($pending > 0) {
				$colorGTadvance = 'redadvgtcolor';
			} else {
				$colorGTadvance = 'greenadvgtcolor';
			}
			//	$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
			// $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
			// $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
			//  $rows[] = '<p class="alignrightAmount">'.$record['grand_total'].'</p>';
			$rows[] = number_format($record['grand_total'], 2);
			$rows[] = '<a href="index.php?erp=69&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			// $rows[] = '<a href="index.php?erp=69&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			/*if($record['status'] == 2 && $record['osstatus'] == NULL  )
					 {
							$rows[] = 'Invoice is created';
					 }
					 else{*/
			$rows[] = $osstatus;
			$rows[] = $paid_status;
			//}
			$rows[] = '<a href="index.php?erp=34&typ=2&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
			$records[] = $rows;
			$i++;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $allRecords,
			"recordsFiltered" => $displayRecords,
			"data" => $records,
		);
		echo json_encode($output);
	}

	function getEstimateNonCommById($soid = "")
	{

		$query = "SELECT 
					so.PK_ES_ID AS soId, 
					so.sono, 
					so.sale_date, 
					SUM(so.discount_final) AS discount_final, 
					SUM(so.discount_final_amt) AS discount_final_amt, 
					AVG(so.gst_percent) AS gst_percent, 
					AVG(so.gst_total) AS gst_total, 
					SUM(so.item_total) AS item_total, 
					SUM(so.cus_plan_dis_amount) AS cus_plan_dis_amount, 
					SUM(so.cus_plan_tot_amount) AS cus_plan_tot_amount, 
					SUM(so.grand_total) AS grand_total, 
					so.customer_id, 
					so.reference_number, 
					so.types, 
					so.price_type, 
					so.payment_type, 
					so.orientation, 
					so.city, 
					so.discount_field, 
					so.discount_final, 
					so.discount_final_amt, 
					so.discount_type, 
					so.discount_field2, 
					so.discount_final2, 
					so.discount_final_amt2, 
					so.discount_type2, 
					so.discount_field3, 
					so.discount_final3, 
					so.discount_final_amt3, 
					so.discount_type3, 
					so.discount_field4, 
					so.discount_final4, 
					so.discount_final_amt4, so.discount_type4, 
					so.discount_field5, so.discount_final5, 
					so.discount_final_amt5, so.discount_type5, 
					so.remark, so.gst_type, so.caltype1, so.caltype2, 
					so.caltype3, so.caltype4, so.caltype5, 
					so.delivery_date, so.state, so.franchise, 
					so.sgst_percent, so.sgst_total, 
					(SELECT SUM(advance_amount) FROM `erp_advance_noncomm` WHERE fk_es_id = " . $soid . " AND type = 0) AS advance, 
					so.streetorarea, fm.cat_name, CONVERT_TZ(so.created_on, '-07:00', '+05:30') AS created_on, 
					so.correction_status, 
					so.printing_status, so.lamination_status, 
					so.croppingandchecking_status, 
					IF(so.created_by > 0, (SELECT um.user_name FROM " . USER_MASTER . " AS um WHERE um.user_id = so.created_by), '') AS createdby, 
					so.types_of_payment,
					so.order_status, 
					cpd.planstart_date, cpd.planend_date, cpd.choosenplan, cpd.duration AS customer_plan_duration, 
					pm.plan_name, pm.plan_amount, pm.duration AS plan_duration, 
					pm.discount AS plan_discount 
				FROM " . ESTIMATE_NONCOMM . " so 
				LEFT JOIN erp_category fm ON fm.pk_cat_id = so.franchise 
				LEFT JOIN tbl_customer_plan_detail AS cpd ON cpd.fk_cust_id = so.customer_id 
				LEFT JOIN tbl_plan_master AS pm ON pm.pk_id = cpd.fk_plan_id 
				WHERE so.PK_ES_ID = " . $soid . "";

		// var_dump($query);
		// exit;
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getEstimateNonCommProductByPROId($soid = "")
	{
		// $query = "SELECT * FROM " . ESTIMATE_NONCOMM_PRO . "  WHERE fk_so_id IN(" . $soid . ") ORDER BY PK_ESP_ID ASC";
		$query = "SELECT * 
					FROM " . ESTIMATE_NONCOMM_PRO . "  
					WHERE fk_so_id IN(" . $soid . ") 
					ORDER BY 
						CASE 
							WHEN itemtype IN (6,7,8) THEN 1
							ELSE 0
						END ASC,
						group_id ASC,
						itemtype ASC";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getEstimateNonCommProductById($sopid = "")
	{

		$query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,sqp.fk_category_id,sqp.product_id,sqp.types,sqp.price_type,sqp.orientation,ty.types_name, sqp.group_id FROM " . ESTIMATE_NONCOMM_PRO . " sqp LEFT JOIN " . TYPES . " ty ON ty.pk_types_id = sqp.itemtype  WHERE sqp.PK_ESP_ID='" . $sopid . "' ORDER BY sqp.group_id ASC";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getEstimateNonCommAddressById($soid)
	{
		$query = "SELECT * FROM " . ESTIMATE_NONCOMM . " sq LEFT JOIN " . CUSTOMER . " cus ON cus.pk_cus_id = sq.customer_id  WHERE PK_ES_ID=" . $soid . "";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	function getEstimateNonCommByIdForPDF($sqp_id)
	{

		$query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,its.fk_item_id as itemnames,ty.types_name ,p.product_name,c.cat_name,sqp.fk_category_id,sqp.product_id,its.first_price,its.second_price,sqp.types,sqp.price_type,sqp.orientation FROM " . ESTIMATE_NONCOMM_PRO . " sqp LEFT JOIN " . PRODUCT . " p ON sqp.product_id =p.pk_product_id LEFT JOIN " . CATEGORY . " c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN " . ITEMS . " its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN " . TYPES . " ty ON ty.pk_types_id = sqp.itemtype LEFT JOIN " . ESTIMATE_NONCOMM . " so ON sqp.fk_so_id=so.PK_ES_ID  WHERE sqp.PK_ESP_ID='" . $sqp_id . "' ";

		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}


	public function changenoncommPaidorder($soid, $status)
	{

		$query1 = "UPDATE  " . ESTIMATE_NONCOMM . " SET  order_status= " . $status . " where PK_ES_ID = " . $soid . "";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	public function changenoncommPaidorderstatus($soid, $status, $sdate)
	{
		$query = "SELECT * FROM " . ORDER_STATUS . "  WHERE fk_so_id=" . $soid . " AND close_status =1; ";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);
		if ($cunt == 0) {
			$query1 = "INSERT INTO  " . ORDER_STATUS . "  SET fk_so_id=" . $soid . " ,date='" . $sdate . "',status=" . $status . ",types=2 ,close_status =1, statuschangeby= '{$_SESSION['user_name']}', visibility =1 ";
			$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
			if ($result1) {
				return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}


	/*non end*/

	/*function updateSalesOrderProduct(){


		   
				   $query1 = "UPDATE ".SALES_ORDER_PRODUCT." SET fk_so_id='".$this->fk_so_id."',  product_id='".$this->product_id."', qty='".$this->qty."', price='".$this->price."', taxable_total='".$this->total."',fk_innersheet_id='".$this->innersheet."', fk_specialeffects_id='".$this->specialeffects."', fk_size_id='".$this->size."', final_total='".$this->final_total."'";
		   
			   $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
			   if($result1){
				   return 1;
			   }
			   else{
				   return 0;
			   }
		   }*/
	function getallsalesorder($types)
	{
		$query = "SELECT so.sono, cus.cus_name,so.sale_date, so.grand_total, so.prefix, so.prefix_year, so.sales_no,so.discount_field, so.discount_final, so.discount_final_amt, so.discount_type, so.discount_field2, so.discount_final2, so.discount_final_amt2, so.discount_type2, so.discount_field3, so.discount_final3, so.discount_final_amt3, so.discount_type3, so.discount_field4, so.discount_final4, so.discount_final_amt4, so.discount_type4, so.discount_field5, so.discount_final5, so.discount_final_amt5, so.discount_type5,so.remark,so.gst_type,so.caltype1,so.caltype2,so.caltype3,so.caltype4,so.caltype5  FROM " . SALES_ORDER . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id WHERE so.visibility='1' AND so.approval_status='" . $types . "' GROUP BY so.sono ORDER BY so.PK_ES_ID ASC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function getsalesorder_edit($id)
	{
		$query = "SELECT * FROM " . SALES_ORDER . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id WHERE so.visibility='1' AND so.sono='" . $id . "' ORDER BY so.PK_ES_ID ASC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function Sales_order_detele($sono_id)
	{
		$query = "DELETE FROM " . SALES_ORDER . " WHERE sono='" . $sono_id . "'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}

	function listSalesOrder()
	{


		$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.PK_ES_ID = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM " . SALES_INVOICE . " AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM " . ORDER_PAYMENT . " AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt  FROM " . SALES_ORDER . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  ";



		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= 'where (so.visibility=1 ) AND  so.sono LIKE "%' . $_POST["search"]["value"] . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR so.item_total LIKE "%' . $_POST["search"]["value"] . '%" ';
			$sqlQuery .= ' OR so.grand_total LIKE "%' . $_POST["search"]["value"] . '%" ';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		} else {
			$sqlQuery .= 'where so.visibility=1 ';
		}

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}

		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		//var_dump($sqlQuery);
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . SALES_ORDER . " where visibility=1  ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {

			$osstatus = '';
			if (isset($record['mixmonthlevel']) && !empty($record['mixmonthlevel'])) {
				$dateVal = strtotime($record['mixmonthlevel']); // Convert to timestamp
				$dateVals = date('Y-m', $dateVal); // Format as 'Y-m'
				$dateValname = date('M Y', $dateVal); // Format as 'M Y'
			} else {
				// Handle cases where 'mixmonthlevel' is missing or empty
				$dateVal = null;
				$dateVals = "N/A";
				$dateValname = "N/A";
			}
			if ($record['osstatus'] == 1) {
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
			} else if ($record['osstatus'] == 2) {
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			} else if ($record['osstatus'] == 3) {
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			} else if ($record['osstatus'] == 4) {
				$osstatus = '<span class="custom_btn_class text-info" >Finishing of Order</span>';
			} else if ($record['osstatus'] == 5) {
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
			} else if ($record['osstatus'] == 6) {
				$osstatus = '<span class="custom_btn_class text-info" >Delivered</span>';
			}

			$rows = array();
			$rows[] = $_POST['start'] + $i;
			$rows[] = ucfirst($record['sono']);
			$rows[] = $record['cus_name'];
			$rows[] = $record['jo_date'];
			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));
			$rows[] = $payment_type;
			$rows[] = '<p class="alignrightAmount">' . $record['discount_final4'] . '</p>';
			$colorGTadvance = '';

			//var_dump($record['discount_final4']);
			//var_dump($record['receipt']);
			//var_dump($record['grand_total']);
			$pending = number_format($record['grand_total'] - ($record['discount_final4'] + $record['receipt']), 2);
			//var_dump($pending);

			if ($pending > 0) {
				$colorGTadvance = 'redadvgtcolor';
			} else {
				$colorGTadvance = 'greenadvgtcolor';
			}
			$receipt = ($record['receipt']) ? number_format($record['receipt'], 2) : 0;
			$rows[] = '<p class="alignrightAmount" >' . $receipt . '</p>';
			$rows[] = '<p class="alignrightAmount ' . $colorGTadvance . '">' . $pending . '</p>';
			$rows[] = floatval($record['grand_total']);
			// $rows[] = '<p class="alignrightAmount">'.$record['grand_total'].'</p>';
			//  $rows[] = $record['status'];
			$rows[] = '<a href="index.php?erp=15&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=14&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
			//  $rows[] = '<a href="index.php?erp=14&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-eye"></span></a>';

			//var_dump($record['osstatus']);

			if ($record['status'] == 2 && $record['osstatus'] == NULL) {
				$rows[] = 'Invoice is created';
			} else {
				$rows[] = $osstatus;
			}

			$rows[] = '<a href="index.php?erp=34&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
			//$rows[] = '<a href="index.php?erp=15&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>	<a href="index.php?erp=14&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';
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


	function get_sale_approval_ids()
	{
		$sql = "SELECT * FROM " . SALES_ORDER . " WHERE customer_id='" . $this->customer_id . "' AND approval_status='1' AND visibility='1' GROUP BY sono";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		$data = array();
		while ($rows = mysqli_fetch_array($result)) {
			$data[] = $rows;
		}
		return $data;
	}


	function getCityName($cityid)
	{
		$query = "SELECT * FROM " . CITIES . " WHERE pk_city_id= '" . $cityid . "'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	function getStateName($stateid)
	{
		$query = "SELECT * FROM " . STATES . " WHERE state_code= '" . $stateid . "'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getCustomer($cusId)
	{


		$query = "SELECT pk_cus_id,cus_code,cus_gst_no,cus_name,cus_address,cus_address_2,cus_address_3,cus_state,cus_city,cus_phone,cus_email,cus_fax,cus_mob_no FROM " . CUSTOMER . " WHERE pk_cus_id= " . $cusId;
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getCategoryListingData()
	{
		$query = "SELECT pk_cat_id,cat_name FROM " . CATEGORY . " WHERE visibility= 1";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getInnerSheetData()
	{
		$query = "SELECT pk_is_id,name,cost,description FROM " . INNER_SHEET . " WHERE visibility= 1";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getInnersheet_id($InnerId)
	{
		$query = "SELECT pk_is_id,name,cost,description FROM " . INNER_SHEET . " WHERE pk_is_id= " . $InnerId;
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getAllSpecialEffectsData()
	{

		$query = "SELECT pk_se_id,name,cost,description  FROM " . SPECIAL_EFFECTS . " WHERE visibility= 1";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getAllSizeData()
	{

		$query = "SELECT pk_size_id,name,cost,description FROM " . SIZE . " WHERE visibility= 1 ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}


	function getAllBagData()
	{

		$query = "SELECT pk_bag_id,name,cost,description FROM " . BAG . " WHERE visibility= 1 ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}


	function getAllBoxData()
	{

		$query = "SELECT pk_box_id,name,cost,description FROM " . BOX . " WHERE visibility= 1 ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}


	function getAllPadData()
	{

		$query = "SELECT pk_pad_id,name,cost,description FROM " . PAD . " WHERE visibility= 1 ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	function getAllItemData()
	{
		//	$_POST['valid']
		define('TABLES', admin_db_prefix . strtolower(trim($_POST['tables'])));

		//$tablesval = ;
		$query = "SELECT " . $_POST['pkid'] . " as id,name,cost,description FROM " . TABLES . " WHERE visibility= 1 ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getAllItemDataprint($pk_id, $typetables, $item_id)
	{
		//	$_POST['valid']
		//	var_dump($typetables);
		$TABLES = admin_db_prefix . strtolower(trim($typetables));


		//$tablesval = ;
		$query = "SELECT " . $pk_id . " as id,name,cost,description FROM " . $TABLES . " WHERE " . $pk_id . " =" . $item_id . " AND visibility= 1 ";

		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function filterlistSalesOrder()
	{

		/*fromDate
				 toDate
				 statusfilter*/

		$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5 FROM " . SALES_ORDER . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id ";

		$fromDate = str_replace('/', '-', $_POST['fromDate']);

		$fromDateval = date('Y-m-d', strtotime($fromDate));
		$toDate = str_replace('/', '-', $_POST['toDate']);

		$toDateval = date('Y-m-d', strtotime($toDate));

		$statusfilter = (!empty($_POST["statusfilter"])) ? 'so.order_status =' . $_POST["statusfilter"] . ' AND' : '';


		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);


			$sqlQuery .= 'where (so.visibility=1) AND ' . $statusfilter . ' so.sale_date BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"   OR  so.sono LIKE "%' . $_POST["search"]["value"] . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		} else {
			$sqlQuery .= 'where so.visibility=1 AND  ' . $statusfilter . ' so.sale_date BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
		}

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}

		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		//	var_dump($sqlQuery);
		//	exit;
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], 'SELECT * FROM  ' . SALES_ORDER . ' ');
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {

			$osstatus = '';
			if (!empty($record['osstatus'])) {
				$osstatus = '<span class="custom_btn_class btn btn-success" >' . $record['osstatus'] . '</span>';
			}
			$rows = array();
			$rows[] = $i;
			$rows[] = ucfirst($record['sono']);
			$rows[] = $record['jo_date'];
			//  $rows[] = $record['status'];

			$rows[] = $osstatus;

			$rows[] = '<a href="index.php?erp=34&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
			//$rows[] = '<a href="index.php?erp=15&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>	<a href="index.php?erp=14&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';
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
	function getSalesOrderByIdStatus()
	{
		$fromDateval = '';
		$toDateval = '';
		if (isset($_POST['fromDate'])) {
			$fromDate = str_replace('/', '-', $_POST['fromDate']);
			$fromDateval = date('Y-m-d', strtotime($fromDate));
		}

		if (isset($_POST['toDate'])) {
			$toDate = str_replace('/', '-', $_POST['toDate']);
			$toDateval = date('Y-m-d', strtotime($toDate));
		}



		$statusfilter = '';
		if (isset($_POST["status-filter"]) && !empty($_POST["status-filter"])) {

			$statusfilter = 'AND so.order_status =' . $_POST["status-filter"] . ' ';
		} else if (isset($_POST["customer-filter"]) && !empty($_POST["customer-filter"])) {
			$statusfilter = 'AND so.customer_id =' . $_POST["customer-filter"] . ' ';
		}
		//$statusfilter = ($_POST["status-filter"]==1)? 'so.order_status= 7 AND' : 'so.order_status != 7' ;


		//	$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus,  IF(so.types = 2, (SELECT GROUP_CONCAT(types_name) as typesname ,its.first_price,its.second_price FROM  ".SALES_ORDER_PRODUCT." sop LEFT JOIN ".TYPES." tys ON tys.pk_types_id  = sop.itemtype where	sop.fk_so_id = so.PK_ES_ID) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  ".SALES_ORDER_PRODUCT." sop LEFT JOIN ".ITEMS." items ON items.pk_items_id  = sop.fk_items_id where sop.fk_so_id = so.PK_ES_ID) as itemnameval,so.types FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id 

		$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus, IF(sop.types = 2, (SELECT GROUP_CONCAT(tys.types_name) as typesname   FROM  " . SALES_ORDER_PRODUCT . " sops  LEFT JOIN  " . TYPES . " tys ON tys.pk_types_id  = sops.itemtype where	sops.fk_so_id = so.PK_ES_ID) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  " . SALES_ORDER_PRODUCT . " sops LEFT JOIN " . ITEMS . " items ON items.pk_items_id  = sops.fk_items_id where sops.fk_so_id = so.PK_ES_ID) as itemnameval,so.types FROM " . SALES_ORDER . " AS so  LEFT JOIN  " . SALES_ORDER_PRODUCT . " sop ON sop.fk_so_id = so.PK_ES_ID LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  where so.visibility=1 AND so.sale_date BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "'  " . $statusfilter . "  GROUP BY so.PK_ES_ID";

		$allResult = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
		return $allResult;
	}
	function getCreditSalesOrderByIdStatus()
	{


		$statusfilter = '';

		if (isset($_POST["customerfilter"]) && !empty($_POST["customerfilter"])) {
			$statusfilter = 'AND so.customer_id =' . $_POST["customerfilter"] . ' ';
		}
		//$statusfilter = ($_POST["status-filter"]==1)? 'so.order_status= 7 AND' : 'so.order_status != 7' ;


		$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total, ,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus, IF(sop.types = 2, (SELECT GROUP_CONCAT(tys.types_name) as typesname   FROM  " . SALES_ORDER_PRODUCT . " sops  LEFT JOIN  " . TYPES . " tys ON tys.pk_types_id  = sops.itemtype where	sops.fk_so_id = so.PK_ES_ID) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  " . SALES_ORDER_PRODUCT . " sops LEFT JOIN " . ITEMS . " items ON items.pk_items_id  = sops.fk_items_id where sops.fk_so_id = so.PK_ES_ID) as itemnameval,so.types FROM " . SALES_ORDER . " AS so  LEFT JOIN  " . SALES_ORDER_PRODUCT . " sop ON sop.fk_so_id = so.PK_ES_ID LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  where so.visibility=1 AND payment_type=2  " . $statusfilter . "  GROUP BY so.PK_ES_ID";

		$allResult = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
		return $allResult;
	}
	function getAllorderstatus()
	{

		$sqlQuery = "SELECT id,name,short_code FROM invoice_erp.erp_status_master  where status=1 ";
		$allResult = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
		return $allResult;
	}

	function filterCustomerlistSalesOrder()
	{

		/*fromDate
				 toDate
				 statusfilter*/

		$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.cus_plan_dis_amount,so.PK_ES_ID,
		   DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,
		   (SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus,so.city FROM " . SALES_ORDER . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id ";

		$fromDate = str_replace('/', '-', $_POST['fromDate']);

		$fromDateval = date('Y-m-d', strtotime($fromDate));
		$toDate = str_replace('/', '-', $_POST['toDate']);

		$toDateval = date('Y-m-d', strtotime($toDate));

		$statusfilter = (!empty($_POST["statusfilter"])) ? 'so.customer_id =' . $_POST["statusfilter"] . ' AND' : '';


		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);


			$sqlQuery .= 'where (so.visibility=1) AND ' . $statusfilter . ' so.sale_date BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"   OR  so.sono LIKE "%' . $_POST["search"]["value"] . '%" ';
			$sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		} else {
			$sqlQuery .= 'where so.visibility=1 AND  ' . $statusfilter . ' so.sale_date BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
		}

		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= ' ORDER BY so.PK_ES_ID DESC ';
		}

		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		//	var_dump($sqlQuery);
		//	exit;
		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], 'SELECT * FROM  ' . SALES_ORDER . ' ');
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {

			$osstatus = '';
			if (!empty($record['osstatus'])) {
				$osstatus = '<span class="custom_btn_class btn btn-success" >' . $record['osstatus'] . '</span>';
			}
			$rows = array();
			$rows[] = $i;
			$rows[] = ucfirst($record['sono']);
			$rows[] = $record['jo_date'];
			//  $rows[] = $record['status'];

			$rows[] = $osstatus;

			$rows[] = '<a href="index.php?erp=34&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';
			//$rows[] = '<a href="index.php?erp=15&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>	<a href="index.php?erp=14&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';
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

	function getCustomerList()
	{

		$query = "SELECT pk_cus_id,cus_name,cus_state,cus_city FROM " . CUSTOMER . " WHERE visibility= 1";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getCostProduct()
	{
		$query = "SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price FROM " . ITEMS . " WHERE pk_items_id=" . $_POST['itemtypeId'] . " and visibility= 1 ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getComercialorNonItemsType()
	{

		$query = "SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price,
			parent_id FROM " . ITEMS . " WHERE type=" . $_POST['typesid'] . " and item_type = " . $_POST['itemtypeId'] . " 
			and parent_id = " . $_POST['parent_id'] . "  and visibility= 1 ORDER BY fk_item_id ASC";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	// function getComercialorNonItemsType()
	// {
	// 	$typesid = isset($_POST['typesid']) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['typesid']) : '';
	// 	$itemtypeId = isset($_POST['itemtypeId']) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['itemtypeId']) : '';
	// 	$parent_id = isset($_POST['parent_id']) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['parent_id']) : '';

	// 	$query = "SELECT pk_items_id, fk_item_id, type, item_type, first_price, second_price,
	// 				  parent_id FROM " . ITEMS . " WHERE type = '$typesid' AND item_type = '$itemtypeId' 
	// 				  AND parent_id = '$parent_id' AND visibility = 1 ORDER BY fk_item_id ASC";

	// 	$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	// 	return $res;
	// }

	/*	function getNonComercialItemsType(){
						   $query = "SELECT pk_items_id,fk_item_id,type,item_type FROM ".ITEMS." WHERE type=".$_POST['typesid']." and item_type = ".$_POST['itemtypeId']."  and visibility= 1 ";	
				   $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			   return $res;
			   }*/

	function getCostNonCommercialProduct($productId)
	{

		$query = "SELECT pk_product_id,product_name,4color_price,7color_price FROM " . PRODUCT . " WHERE visibility= 1 AND pk_product_id =" . $productId . " ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getCostCommercialProduct($productId)
	{
		$query = "SELECT pk_commprod_id,product_name,firstcopy_price, additionalcopy_price FROM " . COMMERCIAL_PRODUCTS . " WHERE visibility= 1 AND pk_commprod_id =" . $productId . "";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	public function getAllCities()
	{
		$query = "SELECT pk_city_id,city FROM " . CITIES . " ORDER BY city ASC  ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	public function getAllTypes()
	{
		$query = "SELECT pk_types_id,types_name,table_pk_id FROM " . TYPES . " WHERE status=1 ORDER BY pk_types_id ASC  ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	public function getAllEstimate_comm()
	{
		$query = "SELECT sono,PK_ES_ID FROM `erp_estimate_comm` ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	public function getAllEstimate_noncomm()
	{
		$query = "SELECT sono,PK_ES_ID FROM `erp_estimate_noncomm` ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getestimateCommCustomer($soid)
	{
		$soids = ($soid) ? $soid : 0;

		$query = "SELECT sum(sq.grand_total) as totalAmt,sq.PK_ES_ID,sq.customer_id FROM " . ESTIMATE_COMM . " sq LEFT JOIN " . CUSTOMER . " cus ON cus.pk_cus_id = sq.customer_id  WHERE PK_ES_ID=" . $soids . " ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getestimateNonCommCustomer($soid)
	{
		$soids = ($soid) ? $soid : 0;
		$query = "SELECT * FROM " . ESTIMATE_NONCOMM . " sq  LEFT JOIN " . CUSTOMER . " cus ON cus.pk_cus_id = sq.customer_id  WHERE PK_ES_ID=" . $soids . "";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	function getReceipts($cusID, $type)
	{

		$cusIDs = ($cusID) ? $cusID : 0;

		$query = "SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=" . $cusIDs . " and type=" . $type;
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		$returnValue = '0';
		$estimatecomm = array();
		if (mysqli_num_rows($result) > 0) {
			$counter = 1;
			while ($data = mysqli_fetch_array($result)) {
				$returnValue = $data['advance'];
			}
		}
		return $returnValue;
	}

	function getcustomerbasedetails()
	{
		$query = "SELECT cm.pk_cus_id,cm.cus_code,cm.cus_gst_no,cm.cus_name,cm.cus_address,cm.cus_address_2,cm.cus_address_3,cm.cus_state,cm.cus_city,cm.cus_phone,cm.cus_email,cm.cus_fax,cm.cus_state,cm.cus_city,cm.cus_mob_no FROM " . CUSTOMER . " cm WHERE cm.pk_cus_id= " . $_POST['cusId'];
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function cancelEstimateComm()
	{
		$query = "DELETE FROM " . ESTIMATE_COMM . " WHERE PK_ES_ID='" . $_POST['id'] . "'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}
	function cancelEstimateCommProduct()
	{
		$query = "DELETE FROM " . ESTIMATE_COMM_PRO . " WHERE fk_so_id='" . $_POST['id'] . "'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}
	// function cancelEstimateNonComm()
	// {
	// 	echo $query = "DELETE FROM " . ESTIMATE_NONCOMM . " WHERE PK_ES_ID='" . $_POST['id'] . "'";
	// 	$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	// 	if ($result) {
	// 		return 1;
	// 	} else {
	// 		return 0;
	// 	}
	// }

	function cancelEstimateNonComm()
	{
		$id = intval($_POST['id']);

		$query = "DELETE FROM " . ESTIMATE_NONCOMM . " WHERE PK_ES_ID = $id";

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		if (!$result) {
			die("Delete Error: " . mysqli_error($GLOBALS["___mysqli_ston"]));
		}

		return mysqli_affected_rows($GLOBALS["___mysqli_ston"]);
	}
	function cancelEstimateNonCommProduct()
	{
		$query = "DELETE FROM " . ESTIMATE_NONCOMM_PRO . " WHERE fk_so_id='" . $_POST['id'] . "'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}
	function InsertEstimateComm()
	{
		$query1 = "
INSERT INTO erp_estimate_comm_cancel (
    PK_ES_ID, sono, sales_no, sale_date, customer_id, reference_number,
    shipment_from, shipment_to, item_total, sgst_percent, sgst_type,
    sgst_total, gst_total, discount_final, discount_final_amt, discount_type,
    discount_field2, discount_final2, discount_final_amt2, discount_type2,
    discount_field3, discount_final3, discount_final_amt3, discount_type3,
    discount_field4, discount_final4, discount_final_amt4, discount_type4,
    discount_field5, discount_final5, discount_final_amt5, discount_type5,
    discount_field, total, grand_total, city, remark,
    custom_label, custom_type, custom_value,
    approval_status, visibility, status,
    gst_percent, fk_category_id, fk_product_id,
    order_status, payment_type, types, price_type,
    orientation, gst_type,
    created_on, created_by, modified_on, modified_by,
    caltype1, caltype2, caltype3, caltype4, caltype5,
    delivery_date, state, franchise, streetorarea,
    bill_paid, types_of_payment,
    reason,  
    printing_status,
    lamination_status,
    croppingandchecking_status,
    correction_status
)
SELECT
    PK_ES_ID, sono, sales_no, sale_date, customer_id, reference_number,
    shipment_from, shipment_to, item_total, sgst_percent, sgst_type,
    sgst_total, gst_total, discount_final, discount_final_amt, discount_type,
    discount_field2, discount_final2, discount_final_amt2, discount_type2,
    discount_field3, discount_final3, discount_final_amt3, discount_type3,
    discount_field4, discount_final4, discount_final_amt4, discount_type4,
    discount_field5, discount_final5, discount_final_amt5, discount_type5,
    discount_field, total, grand_total, city, remark,
    custom_label, custom_type, custom_value,
    approval_status, visibility, status,
    gst_percent, fk_category_id, fk_product_id,
    order_status, payment_type, types, price_type,
    orientation, gst_type,
    created_on, created_by, modified_on, modified_by,
    caltype1, caltype2, caltype3, caltype4, caltype5,
    delivery_date, state, franchise, streetorarea,
    bill_paid, types_of_payment,
    '' AS reason,
    printing_status,
    lamination_status,
    croppingandchecking_status,
    correction_status
FROM erp_estimate_comm where PK_ES_ID = " . $_POST['id'] . "";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	function InsertEstimateCommProduct()
	{
		$query1 = "insert into erp_estimate_comm_product_cancel ( `PK_ESP_ID`, `fk_so_id`, `product_id`, `fk_category_id`, `uom`, `qty`, `price`, `sop_CGST_percentage`, `sop_CGST_amount`, `sop_SGST_percentage`, `sop_SGST_amount`, `sop_IGST_percentage`, `sop_IGST_amount`, `final_total`, `status`, `created_on`, `taxable_total`, `fk_specialeffects_id`, `fk_innersheet_id`, `fk_size_id`, `gst_percent`, `gst_total`, `itemtype`, `fk_items_id`, `types`, `price_type`, `orientation`) select * from erp_estimate_comm_product where fk_so_id = " . $_POST['id'] . "";
		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}


	function updateReasondataComm()
	{
		$query1 = "UPDATE  erp_estimate_comm_cancel SET reason='" . $_POST['reason'] . "' where PK_ES_ID = " . $_POST['id'] . "";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return $result1;
		} else {
			return 0;
		}
	}
	// function InsertEstimateNonComm()
	// {
	// 	$query1 = "insert into erp_estimate_noncomm_cancel (`PK_ES_ID`, `sono`, `sales_no`, `sale_date`, `customer_id`, `reference_number`, `shipment_from`, `shipment_to`, `item_total`, `sgst_percent`, `sgst_type`, `sgst_total`, `gst_total`, `discount_final`, `discount_final_amt`, `discount_type`, `discount_field2`, `discount_final2`, `discount_final_amt2`, `discount_type2`, `discount_field3`, `discount_final3`, `discount_final_amt3`, `discount_type3`, `discount_field4`, `discount_final4`, `discount_final_amt4`, `discount_type4`, `discount_field5`, `discount_final5`, `discount_final_amt5`, `discount_type5`, `discount_field`, `total`, `grand_total`, `city`, `remark`, `custom_label`, `custom_type`, `custom_value`, `approval_status`, `visibility`, `status`, `gst_percent`, `fk_category_id`, `fk_product_id`, `order_status`, `payment_type`, `types`, `price_type`, `orientation`, `gst_type`, `created_on`, `created_by`, `modified_on`, `modified_by`, `caltype1`, `caltype2`, `caltype3`, `caltype4`, `caltype5`, `delivery_date`, `state`, `franchise`, `streetorarea`,`bill_paid`,`types_of_payment`,`printing_status`,`lamination_status`,`croppingandchecking_status`,`correction_status`) select * from erp_estimate_noncomm where PK_ES_ID = " . $_POST['id'] . "";



	// 	$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
	// 	if ($result1) {
	// 		return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
	// 	} else {
	// 		return 0;
	// 	}
	// }
	function InsertEstimateNonComm()
	{
		$id = intval($_POST['id']);

		$query = "
    INSERT INTO erp_estimate_noncomm_cancel 
    (PK_ES_ID, sono, sales_no, sale_date, customer_id, reference_number, shipment_from, shipment_to, item_total, sgst_percent, sgst_type, sgst_total, gst_total, discount_final, discount_final_amt, discount_type, discount_field2, discount_final2, discount_final_amt2, discount_type2, discount_field3, discount_final3, discount_final_amt3, discount_type3, discount_field4, discount_final4, discount_final_amt4, discount_type4, discount_field5, discount_final5, discount_final_amt5, discount_type5, discount_field, total, grand_total, city, remark, custom_label, custom_type, custom_value, approval_status, visibility, status, gst_percent, fk_category_id, fk_product_id, order_status, payment_type, types, price_type, orientation, gst_type, created_on, created_by, modified_on, modified_by, caltype1, caltype2, caltype3, caltype4, caltype5, delivery_date, state, franchise, streetorarea, bill_paid, types_of_payment, reason, correction_status, printing_status, lamination_status, croppingandchecking_status)
    
    SELECT 
    PK_ES_ID, sono, sales_no, sale_date, customer_id, reference_number, shipment_from, shipment_to, item_total, sgst_percent, sgst_type, sgst_total, gst_total, discount_final, discount_final_amt, discount_type, discount_field2, discount_final2, discount_final_amt2, discount_type2, discount_field3, discount_final3, discount_final_amt3, discount_type3, discount_field4, discount_final4, discount_final_amt4, discount_type4, discount_field5, discount_final5, discount_final_amt5, discount_type5, discount_field, total, grand_total, city, remark, custom_label, custom_type, custom_value, approval_status, visibility, status, gst_percent, fk_category_id, fk_product_id, order_status, payment_type, types, price_type, orientation, gst_type, created_on, created_by, modified_on, modified_by, caltype1, caltype2, caltype3, caltype4, caltype5, delivery_date, state, franchise, streetorarea, bill_paid, types_of_payment, printing_status, lamination_status, croppingandchecking_status, correction_status
    
    FROM erp_estimate_noncomm 
    WHERE PK_ES_ID = $id
    ";

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		if (!$result) {
			die("Insert Error: " . mysqli_error($GLOBALS["___mysqli_ston"]));
		}

		return mysqli_affected_rows($GLOBALS["___mysqli_ston"]);
	}
	function InsertEstimateNonCommProduct()
	{
		$query1 = "insert into erp_estimate_noncomm_product_cancel ( `PK_ESP_ID`, `fk_so_id`, `product_id`, `fk_category_id`, `uom`, `qty`, `price`, `sop_CGST_percentage`, `sop_CGST_amount`, `sop_SGST_percentage`, `sop_SGST_amount`, `sop_IGST_percentage`, `sop_IGST_amount`, `final_total`, `status`, `created_on`, `taxable_total`, `fk_specialeffects_id`, `fk_innersheet_id`, `fk_size_id`, `gst_percent`, `gst_total`, `itemtype`, `fk_items_id`, `types`, `price_type`, `orientation`) select * from erp_estimate_noncomm_product where fk_so_id = " . $_POST['id'] . "";
		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	function updateReasondataNonComm()
	{
		$query1 = "UPDATE  erp_estimate_noncomm_cancel SET	 reason='" . $_POST['reason'] . "' where PK_ES_ID = " . $_POST['id'] . "";
		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return $result1;
		} else {
			return 0;
		}
	}
	function getReceiptsadv($cusID, $type, $payTable)
	{
		$query = "SELECT sum(advance_amount) as advance FROM " . $payTable . " where fk_es_id=" . $cusID . " and type=" . $type;
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		$returnValue = '0';
		$estimatecomm = array();
		if (mysqli_num_rows($result) > 0) {
			$counter = 1;
			while ($data = mysqli_fetch_array($result)) {
				$returnValue = $data['advance'];
			}
		}
		return $returnValue;
	}
	function getReceiptsrec($cusID, $type, $payTable)
	{
		$query = "SELECT sum(advance_amount) as advance FROM " . $payTable . " where fk_es_id=" . $cusID . " and type=" . $type;
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		$returnValue = '0';
		$estimatecomm = array();
		if (mysqli_num_rows($result) > 0) {
			$counter = 1;
			while ($data = mysqli_fetch_array($result)) {
				$returnValue = $data['advance'];
			}
		}
		return $returnValue;
	}


	public function getbulkPayment($esID, $tableName, $bulTable)
	{
		$query = "SELECT ( SELECT est.grand_total  FROM " . $tableName . " est WHERE est.PK_ES_ID= " . $esID . ") as grand_total 
		  	FROM " . $bulTable . " bp  WHERE  FIND_IN_SET(" . $esID . ", bp.fk_es_id) > 0";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$returnValue = '0';
		$estimatecomm = array();
		if (mysqli_num_rows($result) > 0) {
			$counter = 1;
			while ($data = mysqli_fetch_array($result)) {
				$returnValue = $data['grand_total'];
			}
		}
		return $returnValue;
	}


	/*View Comm Cancellation Estimate*/
	function getSalesOrderByIdcancel($soid = "")
	{

		$query = "SELECT so.PK_ES_ID  as soId ,so.sono,so.sale_date,sum(so.discount_final) as discount_final,sum(so.discount_final_amt) as discount_final_amt,sum(so.gst_percent) as gst_percent,sum(so.gst_total) as gst_total,sum(so.item_total) as item_total,sum(so.grand_total) as grand_total,so.customer_id,so.sono,so.reference_number,so.types,so.price_type,so.payment_type,so.orientation,so.city,so.discount_field, so.discount_final, so.discount_final_amt, so.discount_type, so.discount_field2, so.discount_final2, so.discount_final_amt2, so.discount_type2, so.discount_field3, so.discount_final3, so.discount_final_amt3, so.discount_type3, so.discount_field4, so.discount_final4, so.discount_final_amt4, so.discount_type4, so.discount_field5, so.discount_final5, so.discount_final_amt5, so.discount_type5,so.remark,so.gst_type,so.caltype1,so.caltype2,so.caltype3,so.caltype4,so.caltype5,so.delivery_date,so.state,so.franchise,sgst_percent,sgst_total,(SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where fk_es_id=" . $soid . " and type=0) as advance,so.streetorarea,fm.cat_name,so.created_on FROM erp_estimate_comm_cancel so LEFT JOIN erp_category fm ON fm.pk_cat_id = so.franchise  WHERE so.PK_ES_ID =" . $soid . "";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getSalesOrderProductByPROIdcancel($soid = "")
	{
		$query = "SELECT * FROM 	erp_estimate_comm_product_cancel  WHERE fk_so_id IN(" . $soid . ") ORDER BY PK_ESP_ID ASC";

		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getSalesOrderProductByIdcancel($sopid = "")
	{

		$query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,sqp.fk_category_id,sqp.product_id,sqp.types,sqp.price_type,sqp.orientation FROM erp_estimate_comm_product_cancel sqp   WHERE sqp.PK_ESP_ID='" . $sopid . "' ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	/*View Non Comm Cancellation Estimate*/

	function getEstimateNonCommByIdcancel($soid = "")
	{

		$query = "SELECT so.PK_ES_ID  as soId ,so.sono,so.sale_date,sum(so.discount_final) as discount_final,sum(so.discount_final_amt) as discount_final_amt,sum(so.gst_percent) as gst_percent,sum(so.gst_total) as gst_total,sum(so.item_total) as item_total,sum(so.grand_total) as grand_total,so.customer_id,so.sono,so.reference_number,so.types,so.price_type,so.payment_type,so.orientation,so.city,so.discount_field, so.discount_final, so.discount_final_amt, so.discount_type, so.discount_field2, so.discount_final2, so.discount_final_amt2, so.discount_type2, so.discount_field3, so.discount_final3, so.discount_final_amt3, so.discount_type3, so.discount_field4, so.discount_final4, so.discount_final_amt4, so.discount_type4, so.discount_field5, so.discount_final5, so.discount_final_amt5, so.discount_type5,so.remark,so.gst_type,so.caltype1,so.caltype2,so.caltype3,so.caltype4,so.caltype5,so.delivery_date,so.state,so.franchise,so.sgst_percent,so.sgst_total,(SELECT sum(advance_amount) as advance FROM `erp_advance_noncomm` where fk_es_id=" . $soid . " and type=0) as advance ,  so.streetorarea,fm.cat_name,so.created_on FROM erp_estimate_noncomm_cancel so LEFT JOIN erp_category fm ON fm.pk_cat_id = so.franchise   WHERE so.PK_ES_ID =" . $soid . "";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getEstimateNonCommProductByPROIdcancel($soid = "")
	{
		$query = "SELECT * FROM erp_estimate_noncomm_product_cancel  WHERE fk_so_id IN(" . $soid . ") ORDER BY PK_ESP_ID ASC";

		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getEstimateNonCommProductByIdcancel($sopid = "")
	{

		$query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,sqp.fk_category_id,sqp.product_id,sqp.types,sqp.price_type,sqp.orientation,ty.types_name FROM erp_estimate_noncomm_product_cancel sqp LEFT JOIN " . TYPES . " ty ON ty.pk_types_id = sqp.itemtype  WHERE sqp.PK_ESP_ID='" . $sopid . "' ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
}
