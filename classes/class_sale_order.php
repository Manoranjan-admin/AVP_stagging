<?php
class Sale_order {
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

	public $approval_status;

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

	public function __construct($c_pk_sale_order, $c_sono , $c_fk_so_id, $c_sale_date, $c_customer_id, $c_reference_number, $c_orientation, $c_shipment_to,$c_category_id, $c_product_id, $c_item_id,$c_innersheet,$c_specialeffects,$c_types_id, $c_qty, $c_price, $c_total, $c_cgst, $c_cgst_amt, $c_gsttype, $c_final_total, $c_item_total, $c_cgst_final, $c_cgst_amt_final, $c_remark, $c_igst_amt_final, $c_gst_total, $c_discount_field1,$c_discount_final1,$c_discount_final_amt1, $c_discount_type1, $c_discount_field2,$c_discount_final2,$c_discount_final_amt2, $c_discount_type2, $c_discount_field3,$c_discount_final3,$c_discount_final_amt3, $c_discount_type3, $c_discount_field4,$c_discount_final4,$c_discount_final_amt4, $c_discount_type4, $c_discount_field5,$c_discount_final5,$c_discount_final_amt5, $c_discount_type5, $c_grand_total, $c_types, $c_pricetype, $c_paymenttype, $c_city, $c_custom_value, $c_approval_status, $c_visibility, $c_caltype1,  $c_caltype2, $c_caltype3, $c_caltype4,$c_caltype5) {
		$this->pk_sale_order=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pk_sale_order);
		$this->sono=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sono);
		$this->fk_so_id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_fk_so_id);
		$this->sale_date=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sale_date);
		$this->customer_id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_customer_id);
		$this->reference_number=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_reference_number);
		$this->orientation=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_orientation);
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
		
		$this->gsttype=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_gsttype);
		$this->final_total=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_final_total);
		$this->item_total=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_item_total);
		$this->cgst_final=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cgst_final);
		$this->cgst_amt_final=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_cgst_amt_final);
		$this->caltype1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype1);
		$this->caltype2=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype2);
		$this->caltype3=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype3);
		$this->caltype4=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype4);
		$this->caltype5=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype5);
		$this->remark=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_remark);
		$this->igst_amt_final=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_igst_amt_final);
		$this->gst_total=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_gst_total);
		
		$this->discount_field1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_field1);
		$this->discount_final1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final1);
		$this->discount_final_amt1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt1);
		$this->discount_type1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_type1);

		$this->discount_field2=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_field2);
		$this->discount_final2=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final2);
		$this->discount_final_amt2=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt2);
		$this->discount_type2=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_type2);

		$this->discount_field3=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_field3);
		$this->discount_final3=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final3);
		$this->discount_final_amt3=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt3);
		$this->discount_type3=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_type3);

		$this->discount_field4=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_field4);
		$this->discount_final4=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final4);
		$this->discount_final_amt4=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt4);
		$this->discount_type4=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_type4);

		$this->discount_field5=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_field5);
		$this->discount_final5=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final5);
		$this->discount_final_amt5=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt5);
		$this->discount_type5=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_type5);


		$this->grand_total=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_grand_total);
		$this->types=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_types);
		$this->pricetype=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pricetype);
		$this->paymenttype=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_paymenttype);
		$this->city=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_city);
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
	function Sales_order_lastinserted_id(){
		$res = 0;
 		$query = "SELECT pk_sale_order FROM ".SALES_ORDER." GROUP BY pk_sale_order ORDER BY pk_sale_order DESC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$cunt = mysqli_num_rows($result);
	
		if($cunt > 0){
			$data = mysqli_fetch_array($result);
			$res = $data['pk_sale_order'] ;
		}
		return $res;
	}

	function addSalesOrder(){
	//	$sales_no = str_pad($this->sono, 5, '0', STR_PAD_LEFT);
	//	$prefix_year = date('Y');
	 //	$query1 = "INSERT INTO ".SALES_ORDER." SET sono='".$this->sono."', sale_date='".$this->sale_date."', customer_id='".$this->customer_id."', reference_number='".$this->reference_number."', shipment_from='".$this->shipment_from."', shipment_to='".$this->shipment_to."', cgst_amt_final='".$this->cgst_amt_final."', sgst_amt_final='".$this->sgst_amt_final."', igst_amt_final='".$this->igst_amt_final."', item_total='".$this->item_total."', gst_total='".$this->gst_total."', discount_final='".$this->discount_final."', discount_final_amt='".$this->discount_final_amt."', grand_total='".$this->grand_total."', approval_status='".$this->approval_status."',status=1, visibility='1',sales_no='".$sales_no."'";
	 //	 $query1 = "INSERT INTO ".SALES_ORDER." SET sono='".$this->sono."', sale_date='".$this->sale_date."', customer_id='".$this->customer_id."', city='".$this->city."',item_total='".$this->item_total."', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."', discount_field4='".$this->discount_field4."', discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_type4='".$this->discount_type4."', discount_field5='".$this->discount_field5."', discount_final5='".$this->discount_final5."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."', grand_total='".$this->grand_total."',gst_percent='".$this->cgst."',gst_total='".$this->cgst_amt."',  gst_type='".$this->gsttype."', remark='".$this->remark."',status=1, visibility='1',sales_no='".$sales_no."',payment_type='".$this->paymenttype."',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',caltype4='".$this->caltype4."',caltype5='".$this->caltype5."',created_by=".$_SESSION['user_id']."";  
	 
	 	 $query1 = "INSERT INTO ".SALES_ORDER." SET sono='".$this->sono."', sale_date='".$this->sale_date."', customer_id='".$this->customer_id."', city='".$this->city."',item_total='".$this->item_total."', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."',  discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."', grand_total='".$this->grand_total."',gst_percent='".$this->cgst."',gst_total='".$this->cgst_amt."',  gst_type='".$this->gsttype."', remark='".$this->remark."',status=1, visibility='1',sales_no='".$sales_no."',payment_type='".$this->paymenttype."',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',created_by=".$_SESSION['user_id']."";  
		  
	
		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		
		if($result1){
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		}
		else{
			return 0;
		}
	}
	function addSalesOrderProduct(){
	//	$sales_no = str_pad($this->sono, 5, '0', STR_PAD_LEFT);
	//	$prefix_year = date('Y'); , itemtable='".$this->itemtable."'
		$query1 = "INSERT INTO ".SALES_ORDER_PRODUCT." SET fk_so_id='".$this->fk_so_id."',types='".$this->types."',fk_category_id='".$this->category_id."',  itemtype='".$this->types_id."', fk_items_id='".$this->item_id."', qty='".$this->qty."',price_type='".$this->pricetype."',orientation='".$this->orientation."', price='".$this->price."', taxable_total='".$this->total."', final_total='".$this->final_total."'";
		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if($result1){
			return 1;
		}
		else{
			return 0;
		}
	}
	function updateSalesOrder($sales_no){
		
		 $query1 = "UPDATE  ".SALES_ORDER." SET	  sale_date='".$this->sale_date."', customer_id='".$this->customer_id."', city='".$this->city."',item_total='".$this->item_total."', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."',  discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."', grand_total='".$this->grand_total."',gst_percent='".$this->cgst."',gst_total='".$this->cgst_amt."',  gst_type='".$this->gsttype."', remark='".$this->remark."',status=1, visibility='1',sales_no='".$sales_no."',payment_type='".$this->paymenttype."',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',modified_by=".$_SESSION['user_id']." where pk_sale_order ='".$sales_no."'";
		
		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if($result1){
			return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
		}
		else{
			return 0;
		}
	}
	function deleteSalesOrderProduct($so_id){
		$query = "DELETE FROM ".SALES_ORDER_PRODUCT." WHERE fk_so_id='".$so_id."'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		if($result){
			return 1;
		}
		else{
			return 0;
		}
	}
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
	function getallsalesorder($types){
		$query = "SELECT so.sono, cus.cus_name,so.sale_date, so.grand_total, so.prefix, so.prefix_year, so.sales_no,so.discount_field, so.discount_final, so.discount_final_amt, so.discount_type, so.discount_field2, so.discount_final2, so.discount_final_amt2, so.discount_type2, so.discount_field3, so.discount_final3, so.discount_final_amt3, so.discount_type3, so.discount_field4, so.discount_final4, so.discount_final_amt4, so.discount_type4, so.discount_field5, so.discount_final5, so.discount_final_amt5, so.discount_type5,so.remark,so.gst_type,so.caltype1,so.caltype2,so.caltype3,so.caltype4,so.caltype5  FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id WHERE so.visibility='1' AND so.approval_status='".$types."' GROUP BY so.sono ORDER BY so.pk_sale_order ASC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function getsalesorder_edit($id){
		$query = "SELECT * FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id WHERE so.visibility='1' AND so.sono='".$id."' ORDER BY so.pk_sale_order ASC";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function Sales_order_detele($sono_id){
		$query = "DELETE FROM ".SALES_ORDER." WHERE sono='".$sono_id."'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	
	 function listSalesOrder()
    {


       $sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.pk_sale_order = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM ".SALES_INVOICE." AS si WHERE si.fk_so_id =so.pk_sale_order) ,(SELECT sum(op.paid_amount) as receipt FROM ".ORDER_PAYMENT." AS op WHERE op.fk_order_no =so.pk_sale_order)) as receipt  FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  ";

	     
   
        if (!empty($_POST["search"]["value"])) {
			$jodate = strtotime($_POST["search"]["value"]);
            $jodateVals = date('Y-m-d', $jodate);
            $sqlQuery .= 'where (so.visibility=1 ) AND  so.sono LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.sale_date LIKE "%' . $jodateVals . '%" ';
            $sqlQuery .= ' OR so.item_total LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.grand_total LIKE "%' . $_POST["search"]["value"] . '%" ';
         //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
        }
		else{
			$sqlQuery .= 'where so.visibility=1 ';

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
       $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  ".SALES_ORDER." where visibility=1  ");
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
				$osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
							
			}
			else if($record['osstatus']  == 2)
			{
				$osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
			
			}	else if($record['osstatus']  == 3)
			{
				$osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
			
			}	else if($record['osstatus']  == 4)
			{
				$osstatus = '<span class="custom_btn_class text-info" >Finishing of Order</span>';
			
			}	else if($record['osstatus']  == 5)
			{
				$osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
				
			}	else if($record['osstatus']  == 6)
			{
				$osstatus = '<span class="custom_btn_class text-info" >Complete Delivery</span>';
			}
			else if($record['osstatus']  == 7)
			{
				$osstatus = '<span class="custom_btn_class text-success" >Paid</span>';
			}
			else if($record['osstatus']  == 8)
			{
				$osstatus = '<span class="custom_btn_class text-success" >Completed</span>';
			}
            $rows = array();
            $rows[] =$_POST['start']+$i;
            $rows[] = ucfirst($record['sono']);
            $rows[] = $record['cus_name'];
            $rows[] = $record['jo_date'];
			$payment_type = ($record['payment_type']== 1)? 'Cash' : 'Credit';
            $rows[] = $payment_type ;
            $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';
			$colorGTadvance ='';
			
			//var_dump($record['discount_final4']);
			//var_dump($record['receipt']);
			//var_dump($record['grand_total']);
			$pending= number_format($record['grand_total']-($record['discount_final4']+$record['receipt']), 2);
			//var_dump($pending);

			if($pending> 0)
			{
				$colorGTadvance ='redadvgtcolor';
			}
			else{
				$colorGTadvance ='greenadvgtcolor';
			}
			$receipt =	($record['receipt'])? number_format($record['receipt'], 2) : 0;
            $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';
            $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';
            $rows[] = '<p class="alignrightAmount">'.$record['grand_total'].'</p>';
          //  $rows[] = $record['status'];
          $rows[] = '<a href="index.php?erp=15&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
		 //  $rows[] = '<a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-eye"></span></a>';

		 //var_dump($record['osstatus']);

			if($record['status'] == 2 && $record['osstatus'] == NULL  )
			{
		   		$rows[] = 'Invoice is created';
			}
			else{
		   		$rows[] = $osstatus;
			}

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
	 function listSalesOrderApprove()
    {
	

       $sqlQuery = "SELECT so.sono, cus.cus_name,so.sale_date, so.grand_total,so.status,so.item_total,so.pk_sale_order FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id ";
   
   
        if (!empty($_POST["search"]["value"])) {
            $sqlQuery .= 'where so.visibility=1  AND so.status= 2 (AND  so.sono LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.sale_date LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.item_total LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.grand_total LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%") ';
        }
		else{
			$sqlQuery .= 'where so.visibility=1 AND so.status= 2 ';

		}
        if (!empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY so.pk_sale_order DESC ';
        }

        if ($_POST["length"] != -1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
	
       $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  ".SALES_ORDER." ");
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
            $rows[] =$i;
            $rows[] = ucfirst($record['sono']);
            $rows[] = $record['cus_name'];
            $rows[] = $record['sale_date'];
            $rows[] = $record['item_total'];
            $rows[] = '<p class="alignrightAmount">'.$record['grand_total'].'</p>';
            $rows[] = $record['status'];
      //      $rows[] = '<a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>	<a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';
			$rows[] = '<a href="index.php?erp=15&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>';
		//	$rows[] = '<a href="index.php?erp=15&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>	<a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';
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
	 function listSalesOrderCancel()
    {
	

       $sqlQuery = "SELECT so.sono, cus.cus_name,so.sale_date, so.grand_total,so.status,so.item_total,so.pk_sale_order FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id ";
   
   
        if (!empty($_POST["search"]["value"])) {
            $sqlQuery .= 'where so.visibility=1 AND so.status= 3 (AND so.sono LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.sale_date LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.item_total LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.grand_total LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" )';
        }
		else{
			$sqlQuery .= 'where so.visibility=1 AND so.status= 3 ';

		}
        if (!empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY so.pk_sale_order DESC ';
        }

        if ($_POST["length"] != -1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
		
       $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  ".SALES_ORDER."");
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
            $rows[] =$i;
            $rows[] = ucfirst($record['sono']);
            $rows[] = $record['cus_name'];
            $rows[] = $record['sale_date'];
            $rows[] = $record['item_total'];
            $rows[] = '<p class="alignrightAmount">'.$record['grand_total'].'</p>';
            $rows[] = $record['status'];
		//	$rows[] = '<a href="index.php?erp=15&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>	<a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';
			$rows[] = '<a href="index.php?erp=15&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>';

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
	/*function Sales_order_update($sono_id){
		$arr = explode("/",$this->sono);
		$prefix = $arr[0];
		$sales_no = $arr[2];
		$prefix_year = $arr[1];
		$query1 = "INSERT INTO ".SALES_ORDER." SET sono='".$sono_id."', sale_date='".$this->sale_date."', customer_id='".$this->customer_id."', reference_number='".$this->reference_number."', shipment_from='".$this->shipment_from."', shipment_to='".$this->shipment_to."', product_id='".$this->product_id."', uom='".$this->uom."', qty='".$this->qty."', price='".$this->price."', total='".$this->total."', cgst='".$this->cgst."', cgst_amt='".$this->cgst_amt."', sgst='".$this->sgst."', sgst_amt='".$this->sgst_amt."', igst='".$this->igst."', igst_amt='".$this->igst_amt."', final_total='".$this->final_total."', item_total='".$this->item_total."', cgst_final='".$this->cgst_final."', cgst_amt_final='".$this->cgst_amt_final."', sgst_final='".$this->sgst_final."', sgst_amt_final='".$this->sgst_amt_final."', igst_final='".$this->igst_final."', igst_amt_final='".$this->igst_amt_final."', gst_total='".$this->gst_total."', discount_final='".$this->discount_final."', discount_final_amt='".$this->discount_final_amt."', grand_total='".$this->grand_total."', approval_status='".$this->approval_status."', visibility='1', prefix='".$prefix."', prefix_year = '".$prefix_year."', sales_no='".$sales_no."'";
		$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		if($result1){
			return 1;
		}
		else{
			return 0;
		}
	}*/
	function get_sale_approval_ids(){
		$sql = "SELECT * FROM ".SALES_ORDER." WHERE customer_id='".$this->customer_id."' AND approval_status='1' AND visibility='1' GROUP BY sono"; 
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		$data =array();
		while ($rows = mysqli_fetch_array($result)) {
			$data[] = $rows;
		}
		return $data;
	}

	function getSalesOrderById($soid=""){	
		   //$query = "SELECT so.pk_sale_order  as soId ,so.sono,so.sale_date,sum(so.discount_final) as discount_final,sum(so.discount_final_amt) as discount_final_amt,sum(so.gst_percent) as gst_percent,sum(so.gst_total) as gst_total,sum(so.item_total) as item_total,sum(so.grand_total) as grand_total,so.customer_id,so.sono,so.fk_category_id,so.fk_product_id,so.reference_number,so.types,so.price_type,so.payment_type,p.product_name,c.cat_name,so.orientation,so.city FROM ".SALES_ORDER." so LEFT JOIN ".PRODUCT." p ON so.fk_product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON so.fk_category_id=c.pk_cat_id WHERE so.pk_sale_order IN(".$soid.")";
		   $query = "SELECT so.pk_sale_order  as soId ,so.sono,so.sale_date,sum(so.discount_final) as discount_final,sum(so.discount_final_amt) as discount_final_amt,sum(so.gst_percent) as gst_percent,sum(so.gst_total) as gst_total,sum(so.item_total) as item_total,sum(so.grand_total) as grand_total,so.customer_id,so.sono,so.reference_number,so.types,so.price_type,so.payment_type,so.orientation,so.city,so.discount_field, so.discount_final, so.discount_final_amt, so.discount_type, so.discount_field2, so.discount_final2, so.discount_final_amt2, so.discount_type2, so.discount_field3, so.discount_final3, so.discount_final_amt3, so.discount_type3, so.discount_field4, so.discount_final4, so.discount_final_amt4, so.discount_type4, so.discount_field5, so.discount_final5, so.discount_final_amt5, so.discount_type5,so.remark,so.gst_type,so.caltype1,so.caltype2,so.caltype3,so.caltype4,so.caltype5 FROM ".SALES_ORDER." so  WHERE so.pk_sale_order IN(".$soid.")";
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;	
	}
	function getSalesOrderProductByPROId($soid=""){
		 $query = "SELECT * FROM ".SALES_ORDER_PRODUCT."  WHERE fk_so_id IN(".$soid.") ORDER BY pk_sop_id ASC"; 
	
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;	
		
	}
	function getSalesOrderProductById($sopid=""){
		/*$query1 = "SELECT pk_types_id,types_name,type_tables,table_pk_id,orderid  FROM ".SALES_ORDER_PRODUCT." sqp LEFT JOIN ".TYPES." as ty ON ty.pk_types_id =sqp.fk_types_id WHERE sqp.pk_sop_id='".$sopid."'"; 
		$res1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
		$result =mysqli_fetch_array($res1 );
var_dump($result);
exit;*/
	   $query = "SELECT sqp.pk_sop_id ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,p.product_name,c.cat_name,sqp.fk_category_id,sqp.product_id,sqp.types,sqp.price_type,sqp.orientation FROM ".SALES_ORDER_PRODUCT." sqp  LEFT JOIN ".PRODUCT." p ON sqp.product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON sqp.fk_category_id=c.pk_cat_id WHERE sqp.pk_sop_id='".$sopid."' ";
	$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;	
	}
	function getSalesOrderAddressById($soid){	
		$query = "SELECT * FROM ".SALES_ORDER." sq LEFT JOIN ".CUSTOMER." cus ON cus.pk_cus_id = sq.customer_id  WHERE pk_sale_order=".$soid."";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;	
   }
   function EditCustomer(){
		$query = "SELECT * FROM ".COMPANY." WHERE pk_com_id=1 AND visibility != '0'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	function getSalesOrderProductByIdForPDF($sqp_id){
	//	fk_specialeffects_id fk_size_id product_name price final_total gst_total item_total grand_total qty name
	 	// $query = "SELECT p.product_name ,sqp.price, sqp.final_total,   sqp.qty, isheet.name as innername,se.name as specialeffectsname,s.name as sizename FROM ".SALES_ORDER_PRODUCT." sqp LEFT JOIN ".PRODUCT." AS p ON p.pk_product_id =sqp.product_id LEFT JOIN ".CATEGORY." AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN ".INNER_SHEET." AS isheet ON isheet.pk_is_id = sqp.fk_innersheet_id LEFT JOIN ".SPECIAL_EFFECTS." AS se ON se.pk_se_id = sqp.fk_specialeffects_id LEFT JOIN ".SIZE." AS s ON s.pk_size_id = sqp.fk_size_id WHERE p.visibility='1' and sqp.pk_sop_id='".$sqp_id."'";
		// IF(so.types = 1, (SELECT GROUP_CONCAT(types_name) as typesname  FROM  ".SALES_ORDER_PRODUCT." sop LEFT JOIN ".TYPES." tys ON tys.pk_types_id  = sop.itemtype where	sop.fk_so_id = so.pk_sale_order) , 'Commercial') as typesnameval


		 $query = "SELECT sqp.pk_sop_id ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,its.fk_item_id as itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,p.product_name,c.cat_name,sqp.fk_category_id,sqp.product_id,its.first_price,its.second_price,sqp.types,sqp.price_type,sqp.orientation FROM ".SALES_ORDER_PRODUCT." sqp LEFT JOIN ".PRODUCT." p ON sqp.product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN ".ITEMS." its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ".TYPES." ty ON ty.pk_types_id = sqp.itemtype LEFT JOIN ".SALES_ORDER." so ON sqp.fk_so_id=so.pk_sale_order  WHERE sqp.pk_sop_id='".$sqp_id."' ";

		
		//  $query = "SELECT sqp.pk_sop_id ,sqp.price, sqp.final_total, sqp.qty,sqp.fk_item_id, ty.pk_types_id,ty.types_name,sqp.fk_types_id,ty.type_tables,ty.table_pk_id FROM ".SALES_ORDER_PRODUCT." sqp  LEFT JOIN ".TYPES." AS ty ON ty.pk_types_id = sqp.fk_types_id  WHERE sqp.pk_sop_id='".$sqp_id."' ";
	
	$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	
	function getCityName($cityid){
		$query = "SELECT * FROM ".CITIES." WHERE pk_city_id= '".$cityid."'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
		
	}

	function getStateName($stateid){
		$query = "SELECT * FROM ".STATES." WHERE state_code= '".$stateid."'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
		
	}
	function getCustomer($cusId){
			
			$query = "SELECT pk_cus_id,cus_state,cus_city FROM ".CUSTOMER." WHERE pk_cus_id= ".$cusId;	
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
		}
	function getCategoryListingData(){
		$query = "SELECT pk_cat_id,cat_name FROM ".CATEGORY." WHERE visibility= 1";	
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;
	}
	function getInnerSheetData(){
		$query = "SELECT pk_is_id,name,cost,description FROM ".INNER_SHEET." WHERE visibility= 1";	
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;
	}
	function getInnersheet_id($InnerId){
		$query = "SELECT pk_is_id,name,cost,description FROM ".INNER_SHEET." WHERE pk_is_id= ".$InnerId;	
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;
	}
	function getAllSpecialEffectsData(){
		
		$query = "SELECT pk_se_id,name,cost,description  FROM ".SPECIAL_EFFECTS." WHERE visibility= 1";	
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;
	}
	function getAllSizeData(){
		
		$query = "SELECT pk_size_id,name,cost,description FROM ".SIZE." WHERE visibility= 1 ";	
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;
	}
		
	
	function getAllBagData(){
		
		$query = "SELECT pk_bag_id,name,cost,description FROM ".BAG." WHERE visibility= 1 ";	
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;
	}
		
	
	function getAllBoxData(){
		
		$query = "SELECT pk_box_id,name,cost,description FROM ".BOX." WHERE visibility= 1 ";	
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;
	}
		
	
	function getAllPadData(){
		
		$query = "SELECT pk_pad_id,name,cost,description FROM ".PAD." WHERE visibility= 1 ";	
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;
	}
		
	function getAllItemData(){
	//	$_POST['valid']
	define('TABLES',admin_db_prefix.strtolower(trim($_POST['tables'])));

	//$tablesval = ;
		$query = "SELECT ".$_POST['pkid']." as id,name,cost,description FROM ".TABLES." WHERE visibility= 1 ";	
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;
	}
	function getAllItemDataprint($pk_id,$typetables,$item_id){
		//	$_POST['valid']
	//	var_dump($typetables);
		$TABLES = admin_db_prefix.strtolower(trim($typetables));
		

		//$tablesval = ;
			$query = "SELECT ".$pk_id." as id,name,cost,description FROM ".$TABLES." WHERE ".$pk_id." =".$item_id." AND visibility= 1 ";	
	
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
		}
		function filterlistSalesOrder()
		{
		
			/*fromDate
			toDate
			statusfilter*/
			
		   $sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5 FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id ";
	   
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
			 //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
			}
			else{
				$sqlQuery .= 'where so.visibility=1 AND  '.$statusfilter.' so.sale_date BETWEEN "'.$fromDateval.'" AND "'.$toDateval.'"';
	
			}
			
			if (!empty($_POST["order"])) {
				$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
			} else {
				$sqlQuery .= ' ORDER BY so.pk_sale_order DESC ';
			}
	
			if ($_POST["length"] != -1) {
				$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
			}

		//	var_dump($sqlQuery);
		//	exit;
		   $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
	
			$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], 'SELECT * FROM  '.SALES_ORDER.' ');
			$allResult = mysqli_fetch_assoc($stmtTotal);
			$allRecords = mysqli_num_rows($stmtTotal);
	
			$displayRecords = mysqli_num_rows($stmt);
			$records = array();
			$i =1;
			while ($record = mysqli_fetch_assoc($stmt)) {
		
				$osstatus = '';
				if(!empty($record['osstatus']))
				{
					$osstatus = '<span class="custom_btn_class btn btn-success" >'.$record['osstatus'] .'</span>';
				}
				$rows = array();
				$rows[] =$i;
				$rows[] = ucfirst($record['sono']);
				$rows[] = $record['jo_date'];
			  //  $rows[] = $record['status'];
		
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
		function getSalesOrderByIdStatus()
		{
			$fromDateval ='';
			$toDateval ='';
			if(isset($_POST['fromDate']))
			{
				$fromDate = str_replace('/', '-', $_POST['fromDate']);
				$fromDateval = date('Y-m-d', strtotime($fromDate));
			}

			if(isset($_POST['toDate']))
			{
				$toDate = str_replace('/', '-', $_POST['toDate']);
				$toDateval = date('Y-m-d', strtotime($toDate));
			}
			
			
			
			$statusfilter = '';
			if(isset($_POST["status-filter"]) && !empty($_POST["status-filter"])){
				
				$statusfilter = 'AND so.order_status ='.$_POST["status-filter"].' ' ;
			}
			else if(isset($_POST["customer-filter"]) && !empty($_POST["customer-filter"]) ){
				$statusfilter =	'AND so.customer_id ='.$_POST["customer-filter"].' ' ;
			}
	   		//$statusfilter = ($_POST["status-filter"]==1)? 'so.order_status= 7 AND' : 'so.order_status != 7' ;
			   
			   
		//	$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus,  IF(so.types = 2, (SELECT GROUP_CONCAT(types_name) as typesname ,its.first_price,its.second_price FROM  ".SALES_ORDER_PRODUCT." sop LEFT JOIN ".TYPES." tys ON tys.pk_types_id  = sop.itemtype where	sop.fk_so_id = so.pk_sale_order) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  ".SALES_ORDER_PRODUCT." sop LEFT JOIN ".ITEMS." items ON items.pk_items_id  = sop.fk_items_id where sop.fk_so_id = so.pk_sale_order) as itemnameval,so.types FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id 
		
			$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus, IF(sop.types = 2, (SELECT GROUP_CONCAT(tys.types_name) as typesname   FROM  ".SALES_ORDER_PRODUCT." sops  LEFT JOIN  ".TYPES." tys ON tys.pk_types_id  = sops.itemtype where	sops.fk_so_id = so.pk_sale_order) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  ".SALES_ORDER_PRODUCT." sops LEFT JOIN ".ITEMS." items ON items.pk_items_id  = sops.fk_items_id where sops.fk_so_id = so.pk_sale_order) as itemnameval,so.types FROM ".SALES_ORDER." AS so  LEFT JOIN  ".SALES_ORDER_PRODUCT." sop ON sop.fk_so_id = so.pk_sale_order LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  where so.visibility=1 AND so.sale_date BETWEEN '".$fromDateval."' AND '".$toDateval."'  ".$statusfilter."  GROUP BY so.pk_sale_order";

			$allResult = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
			return $allResult;
		}
		function getCreditSalesOrderByIdStatus()
		{
		
			
			$statusfilter = '';
		
			 if(isset($_POST["customerfilter"]) && !empty($_POST["customerfilter"]) ){
				$statusfilter =	'AND so.customer_id ='.$_POST["customerfilter"].' ' ;
			}
	   		//$statusfilter = ($_POST["status-filter"]==1)? 'so.order_status= 7 AND' : 'so.order_status != 7' ;
			   
		
			$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus, IF(sop.types = 2, (SELECT GROUP_CONCAT(tys.types_name) as typesname   FROM  ".SALES_ORDER_PRODUCT." sops  LEFT JOIN  ".TYPES." tys ON tys.pk_types_id  = sops.itemtype where	sops.fk_so_id = so.pk_sale_order) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  ".SALES_ORDER_PRODUCT." sops LEFT JOIN ".ITEMS." items ON items.pk_items_id  = sops.fk_items_id where sops.fk_so_id = so.pk_sale_order) as itemnameval,so.types FROM ".SALES_ORDER." AS so  LEFT JOIN  ".SALES_ORDER_PRODUCT." sop ON sop.fk_so_id = so.pk_sale_order LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  where so.visibility=1 AND payment_type=2  ".$statusfilter."  GROUP BY so.pk_sale_order";
	
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
			
		   $sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.pk_sale_order,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus,so.city FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id ";
	   
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
				$sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
			} else {
				$sqlQuery .= ' ORDER BY so.pk_sale_order DESC ';
			}
	
			if ($_POST["length"] != -1) {
				$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
			}

		//	var_dump($sqlQuery);
		//	exit;
		   $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);
	
			$stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], 'SELECT * FROM  '.SALES_ORDER.' ');
			$allResult = mysqli_fetch_assoc($stmtTotal);
			$allRecords = mysqli_num_rows($stmtTotal);
	
			$displayRecords = mysqli_num_rows($stmt);
			$records = array();
			$i =1;
			while ($record = mysqli_fetch_assoc($stmt)) {
		
				$osstatus = '';
				if(!empty($record['osstatus']))
				{
					$osstatus = '<span class="custom_btn_class btn btn-success" >'.$record['osstatus'] .'</span>';
				}
				$rows = array();
				$rows[] =$i;
				$rows[] = ucfirst($record['sono']);
				$rows[] = $record['jo_date'];
			  //  $rows[] = $record['status'];
		
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
	
		function getCustomerList(){
			
			$query = "SELECT pk_cus_id,cus_name,cus_state,cus_city FROM ".CUSTOMER." WHERE visibility= 1";	
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
		}
		function getCostProduct(){
						$query = "SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price FROM ".ITEMS." WHERE pk_items_id=".$_POST['itemtypeId']." and visibility= 1 ";	
				$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return $res;
			}

			function getComercialorNonItemsType(){
				$query = "SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price FROM ".ITEMS." WHERE type=".$_POST['typesid']." and item_type = ".$_POST['itemtypeId']."  and visibility= 1 ";	
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;
	}
	/*	function getNonComercialItemsType(){
						$query = "SELECT pk_items_id,fk_item_id,type,item_type FROM ".ITEMS." WHERE type=".$_POST['typesid']." and item_type = ".$_POST['itemtypeId']."  and visibility= 1 ";	
				$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return $res;
			}*/

			function getCostNonCommercialProduct($productId){
			
				$query = "SELECT pk_product_id,product_name,4color_price,7color_price FROM ".PRODUCT." WHERE visibility= 1 AND pk_product_id =".$productId." ";	
				$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return $res;
			}
			function getCostCommercialProduct($productId){
				$query = "SELECT pk_commprod_id,product_name,firstcopy_price, additionalcopy_price FROM ".COMMERCIAL_PRODUCTS." WHERE visibility= 1 AND pk_commprod_id =".$productId."";	
				$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			return $res;
			}
			public function changePaidorder($soid,$status)
			{
		
				$query1 = "UPDATE  " . SALES_ORDER . " SET  order_status= ".$status." where pk_sale_order = " . $soid . "";
		
				$result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
				if ($result1) {
					return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
				} else {
					return 0;
				}
			}
			public function changePaidorderstatus($soid,$status,$sdate)
			{
			$query = "SELECT * FROM " . ORDER_STATUS . "  WHERE fk_so_id=" . $soid . " AND close_status =1; ";
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			$cunt = mysqli_num_rows($result);
			if ($cunt == 0) {
			 $query1 = "INSERT INTO  " . ORDER_STATUS . "  SET fk_so_id=" . $soid. " ,date='" . $sdate . "',status=" . $status . " , statuschangeby=1, visibility =1 ";
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
			
}