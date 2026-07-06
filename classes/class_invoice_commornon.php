<?php
class Invoice_commornon
{
	public $pk_id;
	public $eno;
	public $sono;
	public $fk_so_id;
	public $sdate;
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

	public function __construct($c_pk_id, $c_eno, $c_sono, $c_so_id, $c_sdate, $c_customer_id, $c_reference_number, $c_orientation, $c_shipment_to, $c_category_id, $c_product_id, $c_item_id, $c_innersheet, $c_specialeffects, $c_types_id, $c_qty, $c_price, $c_total, $c_cgst, $c_cgst_amt, $c_gsttype, $c_final_total, $c_item_total, $c_cgst_final, $c_cgst_amt_final, $c_remark, $c_igst_amt_final, $c_gst_total, $c_discount_field1, $c_discount_final1, $c_discount_final_amt1, $c_discount_type1, $c_discount_field2, $c_discount_final2, $c_discount_final_amt2, $c_discount_type2, $c_discount_field3, $c_discount_final3, $c_discount_final_amt3, $c_discount_type3, $c_discount_field4, $c_discount_final4, $c_discount_final_amt4, $c_discount_type4, $c_discount_field5, $c_discount_final5, $c_discount_final_amt5, $c_discount_type5, $c_grand_total, $c_types, $c_pricetype, $c_paymenttype, $c_city, $c_custom_value, $c_approval_status, $c_visibility, $c_caltype1,  $c_caltype2, $c_caltype3, $c_caltype4, $c_caltype5)

	//  public function __construct($c_pk_id, $c_eno, $c_sono, $so_id, $c_sdate, $c_customer_id, $c_city,  $c_item_id,  $c_orientation,  $c_types,  $c_pricetype,  $c_paymenttype,$c_category_id, $c_remark, $c_specialeffects_id, $c_types_id, $c_qty, $c_price, $c_total, $c_gst, $c_gst_total, $c_final_total, $c_item_total, $c_discount_field1,$c_discount_final1,$c_discount_final_amt1, $c_discount_type1, $c_discount_field2,$c_discount_final2,$c_discount_final_amt2, $c_discount_type2, $c_discount_field3,$c_discount_final3,$c_discount_final_amt3, $c_discount_type3, $c_discount_field4,$c_discount_final4,$c_discount_final_amt4, $c_discount_type4, $c_discount_field5,$c_discount_final5,$c_discount_final_amt5, $c_discount_type5, $c_grand_total, $c_approval_status, $c_visibility, $status, $c_caltype1,  $c_caltype2, $c_caltype3, $c_caltype4,$c_caltype5)
	{

		$this->pk_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pk_id);
		$this->eno = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_eno);
		$this->sono = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sono);
		$this->fk_so_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_so_id ?? '');
		$this->sdate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sdate);
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
	}

	public function getpk_id()
	{
		return $this->pk_id;
	}
	public function geteno()
	{
		return $this->eno;
	}
	public function getsono()
	{
		return $this->sono;
	}
	public function getso_id()
	{
		return $this->fk_so_id;
	}
	public function getsdate()
	{
		return $this->sdate;
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


	public function setpk_id($s_pk_id)
	{
		$this->pk_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_pk_id);
	}
	public function seteno($s_eno)
	{
		$this->eno = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_eno);
	}
	public function setso_id($s_so_id)
	{
		$this->fk_so_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_so_id);
	}
	public function setsono($s_sono)
	{
		$this->sono = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_sono);
	}
	public function setsdate($s_sdate)
	{
		$this->sdate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_sdate);
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

	public function setdiscount_field4($s_discount_field4)
	{
		$this->discount_field4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_field4);
	}
	public function setdiscount_final4($s_discount_final4)
	{
		$this->discount_final4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final4);
	}
	public function setdiscount_final_amt4($s_discount_final_amt4)
	{
		$this->discount_final_amt4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final_amt4);
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
		$this->discount_final_amt5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_final_amt5);
	}
	public function setdiscount_type5($s_discount_type5)
	{
		$this->discount_type5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_discount_type5);
	}
	public function setgrand_total($s_grand_total)
	{
		$this->grand_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_grand_total);
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
	/*Commercial*/

	public function Sales_Invoice_lastinserted_id()
	{
		$res = 0;
		$query = "SELECT PK_SE_ID FROM " . INVOICE_COMM . " GROUP BY PK_SE_ID ORDER BY PK_SE_ID DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);

		if ($cunt > 0) {
			$data = mysqli_fetch_array($result);
			$res = $data['PK_SE_ID'];
		}
		return $res;
	}
	public function Sales_Invoice_last()
	{
		$res = 0;
		// $query = "SELECT eno FROM " . INVOICE_COMM . " where MONTH(sale_date) >= 4 AND YEAR(sale_date) = YEAR(CURRENT_DATE()) GROUP BY PK_SE_ID ORDER BY PK_SE_ID DESC";
		$query = "SELECT eno FROM " . INVOICE_COMM . "  ORDER BY PK_SE_ID DESC LIMIT 1";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		return $result;
	}


	public function addSalesInvoice()
	{


		//	 $query1 = "INSERT INTO ".INVOIC_COMM." SET sono='".$this->sono."', sale_date='".$this->sale_date."', customer_id='".$this->customer_id."', city='".$this->city."',item_total='".$this->item_total."', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."',  discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."', grand_total='".$this->grand_total."',gst_percent='".$this->cgst."',gst_total='".$this->cgst_amt."',sgst_percent='".$this->cgst_final."',sgst_total='".$this->cgst_amt_final."',  gst_type='".$this->gsttype."',  delivery_date='".$this->shipment_to."',  state='".$this->reference_number."',  franchise='".$this->product_id."', remark='".$this->remark."',status=1, visibility='1',sales_no='".$sales_no."',payment_type='".$this->paymenttype."',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',created_by=".$_SESSION['user_id']."";  



		// $query1 = "INSERT INTO " . INVOICE_COMM . " SET eno='" . $this->eno . "' ,fk_so_id='" . $this->so_id . "' , date='" . $this->sdate . "', fk_customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->gst . "',gst_total='" . $this->gst_total . "',payment_type='" . $this->paymenttype . "', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."', discount_field4='".$this->discount_field4."', discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_type4='".$this->discount_type4."', discount_field5='".$this->discount_field5."', discount_final5='".$this->discount_final5."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."',remark='" . $this->remark . "',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',caltype4='".$this->caltype4."',caltype5='".$this->caltype5."',status=1, visibility=1,created_by=".$_SESSION['user_id']."";


		$query1 = "INSERT INTO " . INVOICE_COMM . " SET eno='" . $this->eno . "' ,fk_so_id='" . $this->fk_so_id . "' , date='" . $this->sdate . "', fk_customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "',  discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  delivery_date='" . $this->shipment_to . "',  state='" . $this->reference_number . "',  franchise='" . $this->product_id . "',  streetorarea='" . $this->custom_value . "', remark='" . $this->remark . "',status=1, visibility='1',payment_type='" . $this->paymenttype . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',created_by=" . $_SESSION['user_id'] . "";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	public function addSalesInvoiceProduct()
	{

		$query1 = "INSERT INTO " . INVOICE_COMM_PRO . " SET fk_se_id='" . $this->pk_id . "', fk_item_id='" . $this->item_id . "', sep_qty='" . $this->qty . "', sep_price='" . $this->price . "', sep_total='" . $this->final_total . "',orientation='" . $this->orientation . "',price_type='" . $this->pricetype . "'";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return 1;
		} else {
			return 0;
		}
	}
	public function getJobOrder()
	{
		$res = array();
		$query = "SELECT * FROM " . ESTIMATE_COMM . " WHERE  order_status < 6 AND customer_id = " . $this->customer_id . "  ORDER BY PK_ES_ID DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);

		if ($cunt > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$res[] = $data;
			}
		}
		return $res;
	}
	public function getJobOrderEdit()
	{

		$res = array();
		//SELECT * FROM rishidhkannan_live.erp_estimate_comm WHERE (order_status < 6 AND customer_id = 72) AND PK_ES_ID != 3 ORDER BY PK_ES_ID DESC
		$query = "SELECT * FROM " . ESTIMATE_COMM . " WHERE order_status < 6  AND  customer_id = " . $this->customer_id . "   ORDER BY PK_ES_ID DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);

		if ($cunt > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$res[] = $data;
			}
		}
		return $res;
	}


	public function getSalesInvoiceById($eid = "")
	{


		//$query = "SELECT si.PK_SE_ID ,si.eno,si.date,si.discount_final as discount_final,si.discount_final_amt as discount_final_amt,si.gst_percent as gst_percent,si.gst_total as gst_total,si.item_total as item_total,si.grand_total as grand_total,si.fk_customer_id,si.fk_so_id,si.fk_category_id,si.fk_product_id,si.payment_type,si.price_type,p.product_name,c.cat_name,si.orientation,si.types,si.city FROM ".INVOICE_COMM." si LEFT JOIN ".PRODUCT." p ON si.fk_product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON si.fk_category_id=c.pk_cat_id   WHERE si.PK_SE_ID IN(" . $eid . ") ";
		$query = "SELECT si.PK_SE_ID ,si.eno,si.date,si.gst_percent as gst_percent,si.gst_total as gst_total,si.item_total as item_total,si.grand_total as grand_total,si.fk_customer_id,si.fk_so_id,si.payment_type,si.discount_field, si.discount_final, si.discount_final_amt, si.discount_type, si.discount_field2, si.discount_final2, si.discount_final_amt2, si.discount_type2, si.discount_field3, si.discount_final3, si.discount_final_amt3, si.discount_type3, si.discount_field4, si.discount_final4, si.discount_final_amt4, si.discount_type4, si.discount_field5, si.discount_final5, si.discount_final_amt5, si.discount_type5,si.remark,si.city,si.caltype1,si.caltype2,si.caltype3,si.caltype4,si.caltype5,si.state,si.franchise,si.delivery_date,si.sgst_percent,si.sgst_total,si.gst_type,  si.streetorarea, (SELECT sono FROM " . ESTIMATE_COMM . " ec WHERE ec.PK_ES_ID = si.fk_so_id ) as e_sono,si.created_on FROM " . INVOICE_COMM . " si   WHERE si.PK_SE_ID IN(" . $eid . ") ";


		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	public function getSalesInvoiceProductByPROId($eid = "")
	{
		$query = "SELECT * FROM " . INVOICE_COMM_PRO . "  WHERE fk_se_id IN(" . $eid . ") ORDER BY PK_SEP_ID ASC";

		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	public function getSalesInvoiceProductById($eid = "")
	{
		//    $query = "SELECT * FROM ".SALES_ORDER_PRODUCT."  WHERE pk_sop_id='".$sop_id."'";



		$query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,ty.types_name,sqp.itemtype,ty.type_tables,ty.table_pk_id,its.fk_item_id as itemnames,p.product_name,c.cat_name,sqp.fk_product_id,sqp.fk_category_id,sqp.price_type,sqp.orientation,sqp.types FROM " . INVOICE_COMM_PRO . " sqp LEFT JOIN " . PRODUCT . " p ON sqp.fk_product_id =p.pk_product_id LEFT JOIN " . CATEGORY . " c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN " . ITEMS . " its ON sqp.fk_item_id = its.pk_items_id  LEFT JOIN " . TYPES . " AS ty ON ty.pk_types_id = sqp.itemtype  WHERE sqp.PK_SEP_ID='" . $eid . "' ";

		//echo $query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,its.fk_item_id as itemnames,ty.types_name,sqp.itemtype,ty.type_tables,ty.table_pk_id FROM " . INVOICE_COMM_PRO . " sqp LEFT JOIN ".TYPES." AS ty ON ty.pk_types_id = sqp.itemtype  WHERE sqp.PK_SEP_ID='" . $eid . "'";

		//  $query = "SELECT p.product_name,p.pk_product_id,sqp.PK_SEP_ID  ,c.pk_cat_id,c.cat_name,sqp.sep_price, sqp.sep_total,sqp.fk_category_id,  sqp.sep_qty, isheet.name as innername,se.name as specialeffectsname,s.name as sizename,sqp.inner_sheet_id,sqp.special_effects_id,sqp.size_id FROM " . SALES_ESTIMATE_PRODUCT . " sqp LEFT JOIN " . PRODUCT . " AS p ON p.pk_product_id =sqp.fk_product_id LEFT JOIN " . CATEGORY . " AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN " . INNER_SHEET . " AS isheet ON isheet.pk_is_id = sqp.inner_sheet_id LEFT JOIN " . SPECIAL_EFFECTS . " AS se ON se.pk_se_id = sqp.special_effects_id LEFT JOIN " . SIZE . " AS s ON s.pk_size_id = sqp.size_id WHERE p.visibility='1' and sqp.PK_SEP_ID='" . $eid . "'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	public function getSalesInvoiceAddressById($eid)
	{
		$query = "SELECT * FROM " . INVOICE_COMM . " se LEFT JOIN " . CUSTOMER . " cus ON cus.pk_cus_id = se.fk_customer_id  WHERE se.PK_SE_ID=" . $eid . "";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	public function getSalesInvoiceProductByIdForPDF($eid)
	{
		// $query = "SELECT sqp.pk_sop_id ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,its.fk_item_id as itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,p.product_name,c.cat_name,sqp.fk_category_id,sqp.product_id,its.first_price,its.second_price,sqp.types,sqp.price_type,sqp.orientation FROM ".SALES_ORDER_PRODUCT." sqp LEFT JOIN ".PRODUCT." p ON sqp.product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN ".ITEMS." its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ".TYPES." ty ON ty.pk_types_id = sqp.itemtype LEFT JOIN ".SALES_ORDER." so ON sqp.fk_so_id=so.PK_ES_ID  WHERE sqp.pk_sop_id='".$sqp_id."' ";



		//    fk_specialeffects_id fk_size_id product_name price final_total gst_total item_total grand_total qty name
		$query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,its.fk_item_id as itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.itemtype,ty.type_tables,ty.table_pk_id,p.product_name,c.cat_name,sqp.fk_product_id,sqp.fk_category_id,sqp.price_type,sqp.orientation,sqp.types FROM " . INVOICE_COMM_PRO . " sqp LEFT JOIN " . PRODUCT . " p ON sqp.fk_product_id =p.pk_product_id LEFT JOIN " . CATEGORY . " c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN " . ITEMS . " its ON sqp.fk_item_id = its.pk_items_id LEFT JOIN " . TYPES . " AS ty ON ty.pk_types_id = sqp.itemtype  WHERE sqp.PK_SEP_ID='" . $eid . "'";

		// $query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,ty.types_name,sqp.itemtype,ty.type_tables,ty.table_pk_id,its.fk_item_id as itemnames FROM " . SALES_ESTIMATE_PRODUCT . " sqp LEFT JOIN ".ITEMS." its ON sqp.fk_item_id = its.pk_items_id LEFT JOIN ".TYPES." ty ON ty.pk_types_id = sqp.itemtype   WHERE  sqp.PK_SEP_ID='" . $eid . "'";

		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}


	public function listSalesInvoice()
	{

		$sqlQuery = "SELECT se.eno,cus.cus_code ,cus.cus_name, cus.cus_gst_no, se.gst_percent ,se.gst_total, se.grand_total,se.status,se.item_total,se.PK_SE_ID,DATE_FORMAT(se.date, '%d-%m-%Y') as se_date,se.city,so.sono,se.payment_type  FROM " . INVOICE_COMM . " AS se LEFT JOIN " . ESTIMATE_COMM . " AS so ON so.PK_ES_ID  = se.fk_so_id LEFT JOIN " . CUSTOMER . " AS cus ON se.fk_customer_id = cus.pk_cus_id ";


		$sqlQuery .= " WHERE se.visibility=1 ";


		if (!empty($_POST['filter_date'])) {
			$filterDate = date('Y-m-d', strtotime($_POST['filter_date']));
			$sqlQuery .= " AND DATE(se.date) = '" . $filterDate . "' ";
		}

		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= " AND (";
			// $sqlQuery .= 'where (se.visibility=1 AND se.status= 1) AND  (se.eno LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= 'se.eno LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR se.date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR se.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR se.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%") ';

			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		}
		// else {
		// 	$sqlQuery .= 'where se.visibility=1  ';
		// }



		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= 'ORDER BY se.PK_SE_ID DESC ';
		}
		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . INVOICE_COMM . " ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {


			$rows = array();
			$rows[] = $i;
			// $rows[] = ucfirst($record['eno']);
			// $rows[] = ucfirst($record['sono']);
			$rows[] = ucfirst($record['eno'] ?? '');
			$rows[] = ucfirst($record['sono'] ?? '');
			$rows[] = $record['cus_name'];
			$rows[] = $record['cus_code'];
			$rows[] = $record['cus_gst_no'] ?: '-';
			$rows[] = $record['se_date'];

			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2)  ? "Credit Card" : (($record['payment_type'] == 3)  ? "UPI" : (($record['payment_type'] == 4)  ? "Bank Transfer" : (($record['payment_type'] == 5)  ? "Cheque" : ''))));

			$rows[] = $payment_type;

			$rows[] = $record['grand_total'];
			//  $rows[] = $record['status'];
			$rows[] = '<a href="index.php?erp=74&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=73&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
			// $rows[] = '<a href="index.php?erp=74&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			//$rows[] = '<a href="index.php?erp=15&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>    <a href="index.php?erp=14&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';
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

	// public function listSalesInvoice()
	// {

	// 	$sqlQuery = "SELECT se.eno,cus.cus_code ,cus.cus_name, se.gst_percent ,se.gst_total, se.grand_total,se.status,se.item_total,se.PK_SE_ID,DATE_FORMAT(se.date, '%d-%m-%Y') as se_date,se.city,so.sono,se.payment_type  FROM " . INVOICE_COMM . " AS se LEFT JOIN " . ESTIMATE_COMM . " AS so ON so.PK_ES_ID  = se.fk_so_id LEFT JOIN " . CUSTOMER . " AS cus ON se.fk_customer_id = cus.pk_cus_id ";

	// 	if (!empty($_POST["search"]["value"])) {
	// 		$jodate = strtotime($_POST["search"]["value"]);
	// 		$jodateVals = date('Y-m-d', $jodate);
	// 		$sqlQuery .= 'where (se.visibility=1 AND se.status= 1) AND  (se.eno LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
	// 		$sqlQuery .= ' OR so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
	// 		$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
	// 		$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
	// 		$sqlQuery .= ' OR se.date LIKE "%' . $jodateVals . '%" ';
	// 		$sqlQuery .= ' OR se.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
	// 		$sqlQuery .= ' OR se.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%") ';

	// 		//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
	// 	} else {
	// 		$sqlQuery .= 'where se.visibility=1  ';
	// 	}


	// 	if (!empty($_POST["order"])) {
	// 		$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
	// 	} else {
	// 		$sqlQuery .= 'ORDER BY se.PK_SE_ID DESC ';
	// 	}
	// 	$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

	// 	if ($_POST["length"] != -1) {
	// 		$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	// 	}

	// 	$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

	// 	$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . INVOICE_COMM . " ");
	// 	$allResult = mysqli_fetch_assoc($stmtTotal);
	// 	$allRecords = mysqli_num_rows($stmtTotal);

	// 	$displayRecords = mysqli_num_rows($display_stmt);
	// 	$records = array();
	// 	$i = 1;
	// 	while ($record = mysqli_fetch_assoc($stmt)) {


	// 		$rows = array();
	// 		$rows[] = $i;
	// 		$rows[] = ucfirst($record['eno']);
	// 		$rows[] = ucfirst($record['sono']);
	// 		$rows[] = $record['cus_name'];
	// 		$rows[] = $record['cus_code'];
	// 		$rows[] = $record['se_date'];

	// 		$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2)  ? "Credit Card" : (($record['payment_type'] == 3)  ? "UPI" : (($record['payment_type'] == 4)  ? "Bank Transfer" : (($record['payment_type'] == 5)  ? "Cheque" : ''))));

	// 		$rows[] = $payment_type;

	// 		$rows[] = $record['grand_total'];
	// 		//  $rows[] = $record['status'];
	// 		$rows[] = '<a href="index.php?erp=74&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=73&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
	// 		// $rows[] = '<a href="index.php?erp=74&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
	// 		//$rows[] = '<a href="index.php?erp=15&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>    <a href="index.php?erp=14&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';
	// 		$records[] = $rows;
	// 		$i++;
	// 	}

	// 	$output = array(
	// 		"draw" => intval($_POST["draw"]),
	// 		"recordsTotal" => $allRecords,
	// 		"recordsFiltered" => $displayRecords,
	// 		"data" => $records,
	// 	);

	// 	echo json_encode($output);
	// }
	public function updateSalesInvoice($eid)
	{

		$query1 = "UPDATE  " . INVOICE_COMM . " SET  fk_so_id='" . $this->fk_so_id . "',date='" . $this->sdate . "', fk_customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "',  discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  delivery_date='" . $this->shipment_to . "',  state='" . $this->reference_number . "',  franchise='" . $this->product_id . "',  streetorarea='" . $this->custom_value . "', remark='" . $this->remark . "',status=1, visibility='1',payment_type='" . $this->paymenttype . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',modified_by=" . $_SESSION['user_id'] . " where PK_SE_ID ='" . $eid . "'";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	public function deleteComInvoiceProduct($eid)
	{
		$query = "DELETE FROM " . INVOICE_COMM_PRO . " WHERE fk_se_id='" . $eid . "'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}

	/*Non commercial*/
	public function NonComInvoice_lastinserted_id()
	{
		$res = 0;
		$query = "SELECT PK_SE_ID FROM " . INVOICE_NONCOMM . " GROUP BY PK_SE_ID ORDER BY PK_SE_ID DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);

		if ($cunt > 0) {
			$data = mysqli_fetch_array($result);
			$res = $data['PK_SE_ID'];
		}
		return $res;
	}
	public function NonComInvoice_last()
	{

		$res = 0;
		// $query = "SELECT eno FROM " . INVOICE_NONCOMM . " where MONTH(sale_date) >= 4 AND YEAR(sale_date) = YEAR(CURRENT_DATE()) GROUP BY PK_SE_ID ORDER BY PK_SE_ID DESC";
		$query = "SELECT eno FROM " . INVOICE_NONCOMM . "  ORDER BY PK_SE_ID DESC LIMIT 1";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		return $result;
	}
	public function addNonComInvoice()
	{


		$query1 = "INSERT INTO " . INVOICE_NONCOMM . " SET eno='" . $this->eno . "' ,fk_so_id='" . $this->fk_so_id . "' , date='" . $this->sdate . "', fk_customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "',  discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  delivery_date='" . $this->shipment_to . "',  state='" . $this->reference_number . "',  franchise='" . $this->product_id . "',  streetorarea='" . $this->custom_value . "', remark='" . $this->remark . "',status=1, visibility='1',payment_type='" . $this->paymenttype . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',created_by=" . $_SESSION['user_id'] . "";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	public function addNonComInvoiceProduct($data)
	{
		$group_id = $data['group_id'] ?? 1;
		$query1 = "INSERT INTO " . INVOICE_NONCOMM_PRO . " SET fk_se_id='" . $this->pk_id . "' , fk_types_id='" . $this->types_id . "', fk_item_id='" . $this->item_id . "', sep_qty='" . $this->qty . "', sep_price='" . $this->price . "', sep_total='" . $this->final_total . "',orientation='" . $this->orientation . "',price_type='" . $this->pricetype . "', group_id ='$group_id'";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return 1;
		} else {
			return 0;
		}
	}
	public function getNonJobOrder()
	{
		$res = array();
		$query = "SELECT * FROM " . ESTIMATE_NONCOMM . " WHERE order_status < 6 AND customer_id = " . $this->customer_id . "  ORDER BY PK_ES_ID DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);

		if ($cunt > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$res[] = $data;
			}
		}
		return $res;
	}
	public function getNonJobOrderEdit()
	{

		$res = array();
		$query = "SELECT * FROM " . ESTIMATE_NONCOMM . " WHERE order_status < 6 AND customer_id = " . $this->customer_id . "  ORDER BY PK_ES_ID DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);

		if ($cunt > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$res[] = $data;
			}
		}
		return $res;
	}

	public function getNonJobOrderEditAll()
	{

		$res = array();
		$query = "SELECT * FROM " . ESTIMATE_NONCOMM . " WHERE customer_id = " . $this->customer_id . "  ORDER BY PK_ES_ID DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);

		if ($cunt > 0) {
			while ($data = mysqli_fetch_array($result)) {
				$res[] = $data;
			}
		}
		return $res;
	}


	public function getNonCommInvoiceById($eid = "")
	{


		$query = "SELECT si.PK_SE_ID ,si.eno,si.date,si.gst_percent as gst_percent,si.gst_total as gst_total,si.item_total as item_total,si.grand_total as grand_total,si.fk_customer_id,si.fk_so_id,si.payment_type,si.discount_field, si.discount_final, si.discount_final_amt, si.discount_type, si.discount_field2, si.discount_final2, si.discount_final_amt2, si.discount_type2, si.discount_field3, si.discount_final3, si.discount_final_amt3, si.discount_type3, si.discount_field4, si.discount_final4, si.discount_final_amt4, si.discount_type4, si.discount_field5, si.discount_final5, si.discount_final_amt5, si.discount_type5,si.remark,si.city,si.caltype1,si.caltype2,si.caltype3,si.caltype4,si.caltype5,si.state,si.franchise,si.delivery_date,si.sgst_percent,si.sgst_total,si.gst_type,  si.streetorarea, (SELECT sono FROM " . ESTIMATE_NONCOMM . " ec WHERE ec.PK_ES_ID = si.fk_so_id ) as e_sono,si.created_on FROM " . INVOICE_NONCOMM . " si   WHERE si.PK_SE_ID IN(" . $eid . ") ";


		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	public function getNonCommInvoiceProductByPROId($eid = "")
	{
		$query = "SELECT * FROM " . INVOICE_NONCOMM_PRO . "  
					WHERE fk_se_id IN(" . $eid . ") 
					ORDER BY 
						CASE 
							WHEN fk_types_id IN (6,7,8) THEN 1
							ELSE 0
						END ASC,
						group_id ASC,
						fk_types_id ASC";

		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	public function getNonCommInvoiceProductById($eid = "")
	{

		$query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,ty.types_name,ty.type_tables,ty.table_pk_id,its.fk_item_id as itemnames,sqp.fk_product_id,sqp.fk_category_id,sqp.price_type,sqp.orientation,sqp.itemtype,sqp.fk_types_id, sqp.group_id FROM " . INVOICE_NONCOMM_PRO . " sqp LEFT JOIN " . ITEMS . " its ON sqp.fk_item_id = its.pk_items_id  LEFT JOIN " . TYPES . " AS ty ON ty.pk_types_id = sqp.fk_types_id  WHERE sqp.PK_SEP_ID='" . $eid . "' ";

		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	public function getNonCommInvoiceAddressById($eid)
	{
		$query = "SELECT * FROM " . INVOICE_NONCOMM . " se LEFT JOIN " . CUSTOMER . " cus ON cus.pk_cus_id = se.fk_customer_id  WHERE se.PK_SE_ID=" . $eid . "";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	public function getNonCommInvoiceProductByIdForPDF($eid)
	{
		//    fk_specialeffects_id fk_size_id product_name price final_total gst_total item_total grand_total qty name
		$query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,its.fk_item_id as itemnames,ty.types_name ,sqp.itemtype,ty.type_tables,ty.table_pk_id,sqp.fk_product_id,sqp.fk_category_id,sqp.price_type,sqp.orientation,sqp.types, sqp.fk_types_id FROM " . INVOICE_NONCOMM_PRO . " sqp  LEFT JOIN " . ITEMS . " its ON sqp.fk_item_id = its.pk_items_id LEFT JOIN " . TYPES . " AS ty ON ty.pk_types_id = sqp.fk_types_id  WHERE sqp.PK_SEP_ID='" . $eid . "'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}


	public function listNonCommInvoice()
	{

		// $sqlQuery = "SELECT se.eno,cus.cus_code ,cus.cus_name, se.gst_percent ,se.gst_total, se.grand_total,se.status,se.item_total,se.PK_SE_ID,DATE_FORMAT(se.date, '%d-%m-%Y') as se_date,se.city,(SELECT so.sono FROM " . ESTIMATE_NONCOMM . " so WHERE so.PK_ES_ID  = se.fk_so_id ) as so_no,se.payment_type  FROM " . INVOICE_NONCOMM . " AS se LEFT JOIN " . CUSTOMER . " AS cus ON se.fk_customer_id = cus.pk_cus_id ";

		$sqlQuery = "SELECT se.eno,cus.cus_code ,cus.cus_name, cus.cus_gst_no, se.gst_percent ,se.gst_total, se.grand_total,se.status,se.item_total,se.PK_SE_ID,DATE_FORMAT(se.date, '%d-%m-%Y') as se_date,se.city,so.sono,se.payment_type  FROM " . INVOICE_NONCOMM . " AS se LEFT JOIN " . ESTIMATE_NONCOMM . " AS so ON so.PK_ES_ID  = se.fk_so_id LEFT JOIN " . CUSTOMER . " AS cus ON se.fk_customer_id = cus.pk_cus_id ";

		$sqlQuery .= " WHERE se.visibility=1 ";


		if (!empty($_POST['filter_date'])) {
			$filterDate = date('Y-m-d', strtotime($_POST['filter_date']));
			$sqlQuery .= " AND DATE(se.date) = '" . $filterDate . "' ";
		}

		if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
			$jodateVals = date('Y-m-d', $jodate);
			$sqlQuery .= " AND (";
			// $sqlQuery .= 'where (se.visibility=1 AND se.status= 1) AND  (se.eno LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= 'se.eno LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR so.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR cus.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR se.date LIKE "%' . $jodateVals . '%" ';
			$sqlQuery .= ' OR se.item_total LIKE "%' . trim($_POST["search"]["value"]) . '%" ';
			$sqlQuery .= ' OR se.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%" )';
			//   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
		}
		// else {
		// 	$sqlQuery .= 'where se.visibility=1  ';
		// }


		if (!empty($_POST["order"])) {
			$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$sqlQuery .= 'ORDER BY se.PK_SE_ID DESC ';
		}
		$display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
		if ($_POST["length"] != -1) {
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

		$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . INVOICE_NONCOMM . " ");
		$allResult = mysqli_fetch_assoc($stmtTotal);
		$allRecords = mysqli_num_rows($stmtTotal);

		$displayRecords = mysqli_num_rows($display_stmt);
		$records = array();
		$i = 1;
		while ($record = mysqli_fetch_assoc($stmt)) {


			$rows = array();
			$rows[] = $i;
			$rows[] = ucfirst($record['eno']);
			$rows[] = ucfirst($record['sono']);
			$rows[] = $record['cus_name'];
			$rows[] = $record['cus_code'];
			$rows[] = $record['cus_gst_no'] ?: '-';
			$rows[] = $record['se_date'];

			$payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2)  ? "Credit Card" : (($record['payment_type'] == 3)  ? "UPI" : (($record['payment_type'] == 4)  ? "Bank Transfer" : (($record['payment_type'] == 5)  ? "Cheque" : ''))));

			$rows[] = $payment_type;

			$rows[] = $record['grand_total'];
			//  $rows[] = $record['status'];
			$rows[] = '<a href="index.php?erp=78&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=77&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
			//  $rows[] = '<a href="index.php?erp=78&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
			//$rows[] = '<a href="index.php?erp=15&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>    <a href="index.php?erp=14&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';
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
	// public function listNonCommInvoice()
	// {
	// 	error_reporting(E_ALL);
	// 	ini_set('display_errors', 1);

	// 	$request = $_POST;

	// 	// Column mapping for ORDER BY
	// 	$columns = array(
	// 		0 => 'se.PK_SE_ID',
	// 		1 => 'se.eno',
	// 		2 => 'so.sono',
	// 		3 => 'cus.cus_name',
	// 		4 => 'cus.cus_code',
	// 		5 => 'se.date',
	// 		6 => 'se.payment_type',
	// 		7 => 'se.grand_total',
	// 		8 => 'se.PK_SE_ID'
	// 	);

	// 	// Base Query
	// 	$baseQuery = " FROM " . INVOICE_NONCOMM . " AS se
	//     LEFT JOIN " . ESTIMATE_NONCOMM . " AS so ON so.PK_ES_ID = se.fk_so_id
	//     LEFT JOIN " . CUSTOMER . " AS cus ON se.fk_customer_id = cus.pk_cus_id
	//     WHERE se.visibility = 1 AND se.status = 1 ";

	// 	// 🔹 Search Filter
	// 	if (!empty($request['search']['value'])) {

	// 		$searchValue = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $request['search']['value']);

	// 		$jodate = strtotime($searchValue);
	// 		$jodateVals = $jodate ? date('Y-m-d', $jodate) : '';

	// 		$baseQuery .= " AND (
	//         se.eno LIKE '%$searchValue%' OR
	//         so.sono LIKE '%$searchValue%' OR
	//         cus.cus_name LIKE '%$searchValue%' OR
	//         cus.cus_code LIKE '%$searchValue%' OR
	//         se.date LIKE '%$jodateVals%' OR
	//         se.item_total LIKE '%$searchValue%' OR
	//         se.grand_total LIKE '%$searchValue%'
	//     ) ";
	// 	}

	// 	// 🔹 Total Records (without filtering)
	// 	$totalQuery = "SELECT COUNT(*) as total FROM " . INVOICE_NONCOMM . " WHERE visibility = 1 AND status = 1";
	// 	$totalResult = mysqli_query($GLOBALS["___mysqli_ston"], $totalQuery);
	// 	$totalRow = mysqli_fetch_assoc($totalResult);
	// 	$recordsTotal = $totalRow['total'];

	// 	// 🔹 Total Filtered Records
	// 	$filteredQuery = "SELECT COUNT(*) as total " . $baseQuery;
	// 	$filteredResult = mysqli_query($GLOBALS["___mysqli_ston"], $filteredQuery);
	// 	$filteredRow = mysqli_fetch_assoc($filteredResult);
	// 	$recordsFiltered = $filteredRow['total'];

	// 	// 🔹 Main Data Query
	// 	$sqlQuery = "SELECT 
	//         se.eno,
	//         so.sono,
	//         cus.cus_name,
	//         cus.cus_code,
	//         DATE_FORMAT(se.date, '%d-%m-%Y') as se_date,
	//         se.payment_type,
	//         se.grand_total,
	//         se.PK_SE_ID
	//     " . $baseQuery;

	// 	// 🔹 ORDER BY
	// 	if (!empty($request['order'])) {
	// 		$columnIndex = $request['order'][0]['column'];
	// 		$columnName = $columns[$columnIndex];
	// 		$columnSortOrder = $request['order'][0]['dir'];
	// 		$sqlQuery .= " ORDER BY $columnName $columnSortOrder ";
	// 	} else {
	// 		$sqlQuery .= " ORDER BY se.PK_SE_ID DESC ";
	// 	}

	// 	// 🔹 LIMIT
	// 	if ($request['length'] != -1) {
	// 		$start = intval($request['start']);
	// 		$length = intval($request['length']);
	// 		$sqlQuery .= " LIMIT $start, $length ";
	// 	}

	// 	$result = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

	// 	$data = array();
	// 	$i = $request['start'] + 1;

	// 	while ($row = mysqli_fetch_assoc($result)) {

	// 		// Payment Type Text
	// 		switch ($row['payment_type']) {
	// 			case 1:
	// 				$paymentType = "Cash";
	// 				break;
	// 			case 2:
	// 				$paymentType = "Credit Card";
	// 				break;
	// 			case 3:
	// 				$paymentType = "UPI";
	// 				break;
	// 			case 4:
	// 				$paymentType = "Bank Transfer";
	// 				break;
	// 			case 5:
	// 				$paymentType = "Cheque";
	// 				break;
	// 			default:
	// 				$paymentType = "";
	// 				break;
	// 		}

	// 		$nestedData = array();
	// 		$nestedData[] = $i;
	// 		$nestedData[] = ucfirst($row['eno']);
	// 		$nestedData[] = ucfirst($row['sono']);
	// 		$nestedData[] = $row['cus_name'];
	// 		$nestedData[] = $row['cus_code'];
	// 		$nestedData[] = $row['se_date'];
	// 		$nestedData[] = $paymentType;
	// 		$nestedData[] = number_format($row['grand_total'], 2);

	// 		$nestedData[] = '
	//         <a href="index.php?erp=78&id=' . $row["PK_SE_ID"] . '" class="btn btn-sm btn-info">
	//             <i class="fa fa-eye"></i>
	//         </a>
	//         <a href="index.php?erp=77&id=' . $row["PK_SE_ID"] . '" class="btn btn-sm btn-primary">
	//             <i class="fa fa-edit"></i>
	//         </a>
	//     ';

	// 		$data[] = $nestedData;
	// 		$i++;
	// 	}

	// 	// 🔹 Final Output
	// 	$output = array(
	// 		"draw" => intval($request['draw']),
	// 		"recordsTotal" => intval($recordsTotal),
	// 		"recordsFiltered" => intval($recordsFiltered),
	// 		"data" => $data
	// 	);

	// 	echo json_encode($output);
	// }
	public function updateNonComInvoice($eid)
	{

		$query1 = "UPDATE  " . INVOICE_NONCOMM . " SET  fk_so_id='" . $this->fk_so_id . "',date='" . $this->sdate . "', fk_customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "',  discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  delivery_date='" . $this->shipment_to . "',  state='" . $this->reference_number . "',  franchise='" . $this->product_id . "',  streetorarea='" . $this->custom_value . "', remark='" . $this->remark . "',status=1, visibility='1',payment_type='" . $this->paymenttype . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',modified_by=" . $_SESSION['user_id'] . " where PK_SE_ID ='" . $eid . "'";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	public function deleteNonComInvoiceProduct($eid)
	{
		$query = "DELETE FROM " . INVOICE_NONCOMM_PRO . " WHERE fk_se_id='" . $eid . "'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}
	/*Non End*/
	/*public function updateSalesInvoice($eid)
    {

        $query1 = "UPDATE  " . INVOICE_COMM . " SET  fk_so_id='" . $this->so_id . "',date='" . $this->sdate . "', fk_customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "', grand_total='" . $this->grand_total . "',payment_type='" . $this->paymenttype . "',gst_percent='" . $this->gst . "',gst_total='" . $this->gst_total . "',remark='" . $this->remark . "', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."', discount_field4='".$this->discount_field4."', discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_type4='".$this->discount_type4."', discount_field5='".$this->discount_field5."', discount_final5='".$this->discount_final5."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',caltype4='".$this->caltype4."',caltype5='".$this->caltype5."',status=1, visibility='1',,modified_by=".$_SESSION['user_id']." where PK_SE_ID ='" . $eid . "'";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
        if ($result1) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }*/





	/*	function getSalesInvoiceById($eid=""){	 
		$query = "SELECT PK_SE_ID ,eno,date,discount_final as discount_final,discount_final_amt as discount_final_amt,gst_percent as gst_percent,gst_total as gst_total,item_total as item_total,grand_total as grand_total,fk_customer_id,fk_so_id FROM ".INVOICE_COMM."  WHERE PK_SE_ID IN(".$eid.") AND status = 1";
		  $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	  return $res;	
  }
  function getSalesInvoiceProductByPROId($eid=""){
	   $query = "SELECT * FROM ".INVOICE_COMM_PRO."  WHERE fk_se_id IN(".$eid.") ORDER BY PK_SEP_ID ASC"; 
  
	  $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	  return $res;	
	  
  }
  function getSalesInvoiceProductById($eidp=""){
  //	$query = "SELECT * FROM ".SALES_ORDER_PRODUCT."  WHERE pk_sop_id='".$sop_id."'"; 

    $query = "SELECT p.product_name,p.pk_product_id,sqp.PK_SEP_ID  ,c.pk_cat_id,c.cat_name,sqp.sep_price, sqp.sep_total,sqp.fk_category_id,  sqp.sep_qty, isheet.name as innername,se.name as specialeffectsname,s.name as sizename,sqp.inner_sheet_id,sqp.special_effects_id,sqp.size_id FROM ".INVOICE_COMM_PRO." sqp LEFT JOIN ".PRODUCT." AS p ON p.pk_product_id =sqp.fk_product_id LEFT JOIN ".CATEGORY." AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN ".INNER_SHEET." AS isheet ON isheet.pk_is_id = sqp.inner_sheet_id LEFT JOIN ".SPECIAL_EFFECTS." AS se ON se.pk_se_id = sqp.special_effects_id LEFT JOIN ".SIZE." AS s ON s.pk_size_id = sqp.size_id WHERE p.visibility='1' and sqp.PK_SEP_ID='".$eidp."'";
  $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	  return $res;	
  }
  function getSalesInvoiceAddressById($eid){	
	$query = "SELECT * FROM ".INVOICE_COMM." se LEFT JOIN ".CUSTOMER." cus ON cus.pk_cus_id = se.fk_customer_id  WHERE se.PK_SE_ID=".$eid."";
	$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;	
}
function getSalesInvoiceProductByIdForPDF($eid){
	//	fk_specialeffects_id fk_size_id product_name price final_total gst_total item_total grand_total qty name
	 	 $query = "SELECT p.product_name,p.pk_product_id,sqp.PK_SEP_ID  ,c.pk_cat_id,c.cat_name,sqp.sep_price, sqp.sep_total,sqp.fk_category_id,  sqp.sep_qty, isheet.name as innername,se.name as specialeffectsname,s.name as sizename,sqp.inner_sheet_id,sqp.special_effects_id,sqp.size_id FROM ".INVOICE_COMM_PRO." sqp LEFT JOIN ".PRODUCT." AS p ON p.pk_product_id =sqp.fk_product_id LEFT JOIN ".CATEGORY." AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN ".INNER_SHEET." AS isheet ON isheet.pk_is_id = sqp.inner_sheet_id LEFT JOIN ".SPECIAL_EFFECTS." AS se ON se.pk_se_id = sqp.special_effects_id LEFT JOIN ".SIZE." AS s ON s.pk_size_id = sqp.size_id WHERE p.visibility='1' and sqp.PK_SEP_ID='".$eid."'";
	
	$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	*/

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

	function EditCustomer()
	{
		$query = "SELECT * FROM " . COMPANY . " WHERE pk_com_id=1 AND visibility != '0'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}

	public function updateSOStatus($soid)
	{

		$query1 = "UPDATE  " . ESTIMATE_COMM . " SET  status=2 where PK_ES_ID IN (" . $soid . ")";

		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if ($result1) {
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		} else {
			return 0;
		}
	}
	function getComercialorNonItemsType()
	{
		$query = "SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price FROM " . ITEMS . " WHERE type=" . $_POST['typesid'] . " and item_type = " . $_POST['itemtypeId'] . "  and visibility= 1 ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getCostProduct()
	{
		$query = "SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price FROM " . ITEMS . " WHERE pk_items_id=" . $_POST['itemtypeId'] . " and visibility= 1 ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	public function getAllCities()
	{
		$query = "SELECT pk_city_id,city FROM " . CITIES . " ORDER BY city ASC  ";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	/*
public function check_pending_amount_comm($sono,$adv)
		{
			$query1="SELECT ad.advance_amount FROM erp_advance_comm as ad LEFT JOIN erp_estimate_comm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.sono ='".$sono."'";
			$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
			$rowcount=mysqli_num_rows($result1);
			if($rowcount == 0){
			$query = "SELECT grand_total FROM `erp_estimate_comm` WHERE sono = '".$sono."'";
		
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			
			while ($record = mysqli_fetch_assoc($result)) {
			
			if($record['grand_total'] >= $adv){
			//$value = "Advance is greater than estimate amount";
			$value='true';
			}else{
				$value='Pending Amount is '.$record['grand_total'];
			}
			}
			}else{
			$value = "Bill receipt amount or advance has been collected";
			}
			return $value;
		}*/
}
