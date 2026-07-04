<?php

class Advance_commornon

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



    public function __construct($c_pk_sale_order, $c_sono, $c_fk_so_id, $c_sale_date, $c_customer_id, $c_reference_number, $c_orientation, $c_shipment_to, $c_category_id, $c_product_id, $c_item_id, $c_innersheet, $c_specialeffects, $c_types_id, $c_qty, $c_price, $c_total, $c_cgst, $c_cgst_amt, $c_gsttype, $c_final_total, $c_item_total, $c_cgst_final, $c_cgst_amt_final, $c_remark, $c_igst_amt_final, $c_gst_total, $c_discount_field1, $c_discount_final1, $c_discount_final_amt1, $c_discount_type1, $c_discount_field2, $c_discount_final2, $c_discount_final_amt2, $c_discount_type2, $c_discount_field3, $c_discount_final3, $c_discount_final_amt3, $c_discount_type3, $c_discount_field4, $c_discount_final4, $c_discount_final_amt4, $c_discount_type4, $c_discount_field5, $c_discount_final5, $c_discount_final_amt5, $c_discount_type5, $c_grand_total, $c_types, $c_pricetype, $c_paymenttype, $c_city, $c_custom_value, $c_approval_status, $c_visibility, $c_caltype1, $c_caltype2, $c_caltype3, $c_caltype4, $c_caltype5)

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



    /* Commercial */



    public function EstimateComm_lastinserted_id()

    {

        $res = 0;

        $query = "SELECT PK_ES_ID FROM " . ESTIMATE_COMM . " GROUP BY PK_ES_ID ORDER BY PK_ES_ID DESC";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        $cunt = mysqli_num_rows($result);



        if ($cunt > 0) {

            $data = mysqli_fetch_array($result);

            $res = $data['PK_ES_ID'];
        }

        return $res;
    }



    public function addEstimateComm()

    {



        $query1 = "INSERT INTO " . ESTIMATE_COMM . " SET sono='" . $this->sono . "', sale_date='" . $this->sale_date . "', customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "', discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  delivery_date='" . $this->shipment_to . "',  state='" . $this->reference_number . "',  franchise='" . $this->product_id . "', remark='" . $this->remark . "',status=1, visibility='1',sales_no='" . $sales_no . "',payment_type='" . $this->paymenttype . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',created_by=" . $_SESSION['user_id'] . "";



        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);



        if ($result1) {

            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {

            return 0;
        }
    }

    public function addEstimateCommProduct()

    {



        $query1 = "INSERT INTO " . ESTIMATE_COMM_PRO . " SET fk_so_id='" . $this->fk_so_id . "',fk_category_id='" . $this->category_id . "',fk_items_id='" . $this->item_id . "', qty='" . $this->qty . "',price_type='" . $this->pricetype . "',orientation='" . $this->orientation . "', price='" . $this->price . "', taxable_total='" . $this->total . "', final_total='" . $this->final_total . "'";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        if ($result1) {

            return 1;
        } else {

            return 0;
        }
    }

    public function updateEstimateComm($sales_no)

    {



        $query1 = "UPDATE  " . ESTIMATE_COMM . " SET	  sale_date='" . $this->sale_date . "', customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "', discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  delivery_date='" . $this->shipment_to . "',  state='" . $this->reference_number . "',  franchise='" . $this->product_id . "', remark='" . $this->remark . "',status=1, visibility='1',sales_no='" . $sales_no . "',payment_type='" . $this->paymenttype . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',modified_by=" . $_SESSION['user_id'] . " where PK_ES_ID ='" . $sales_no . "'";



        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        if ($result1) {

            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {

            return 0;
        }
    }

    public function deleteEstimateCommProduct($so_id)

    {

        $query = "DELETE FROM " . ESTIMATE_COMM_PRO . " WHERE fk_so_id='" . $so_id . "'";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 0;
        }
    }



    public function listAdvanceComm()

    {



        //$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.PK_ES_ID = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM ".SALES_INVOICE." AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ".ORDER_PAYMENT." AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt  FROM ".ESTIMATE_COMM." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  ";

        $sqlQuery = "SELECT adv.pk_adv_com_id,es.sono, cus.cus_name, cus.cus_code, adv.advance_amount,es.PK_ES_ID,DATE_FORMAT(adv.date, '%d-%m-%Y') as adv_date,adv.payment_type FROM erp_advance_comm AS adv LEFT JOIN erp_estimate_comm as es ON adv.fk_es_id=es.PK_ES_ID LEFT JOIN erp_customer_master AS cus ON adv.customer_id = cus.pk_cus_id ";




        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));


        if (!empty($_POST["search"]["value"])) {


            $jodate = $_POST["search"]["value"];
            $jodateVals = date('Y-m-d', strtotime($jodate));

            $sqlQuery .= 'where (adv.visibility=1 AND adv.type=0 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '") AND  (es.sono LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR DATE_FORMAT(adv.date, "%Y-%m-%d") LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . $_POST["search"]["value"] . '%") ';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';

        } else {

            $sqlQuery .= 'where adv.visibility=1  AND adv.type=0 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }



        if (!empty($_POST["order"])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY adv.pk_adv_com_id DESC ';
        }

        $display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        if ($_POST["length"] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //var_dump($sqlQuery);

        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_advance_comm where visibility=1 and type=0 ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);



        $displayRecords = mysqli_num_rows($display_stmt);





        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {



            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['adv_date'];

            $payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));

            // $rows[] = $payment_type ;

            //  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';

            $rows[] = $payment_type;



            //    $receipt =    ($record['receipt'])? number_format($record['receipt'], 2) : 0;

            // $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';

            // $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';

            $rows[] = $record['advance_amount'];

            //$rows[] = '<a href="index.php?erp=82&id='.$record["pk_adv_com_id"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=81&id='.$record["pk_adv_com_id"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            $rows[] = '<a href="index.php?erp=81&id=' . $record["pk_adv_com_id"] . '&type=1" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';



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

    public function listBillComm()

    {



        //$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.PK_ES_ID = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM ".SALES_INVOICE." AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ".ORDER_PAYMENT." AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt  FROM ".ESTIMATE_COMM." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  ";

        $sqlQuery = "SELECT adv.pk_adv_com_id,es.sono, cus.cus_name,cus.cus_code, adv.advance_amount,es.PK_ES_ID,DATE_FORMAT(adv.date, '%d-%m-%Y') as adv_date,adv.payment_type,es.bill_paid FROM erp_advance_comm AS adv LEFT JOIN erp_estimate_comm as es ON adv.fk_es_id=es.PK_ES_ID LEFT JOIN erp_customer_master AS cus ON adv.customer_id = cus.pk_cus_id ";




        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST["search"]["value"])) {

            $jodate = $_POST["search"]["value"];

            $jodateVals = date('Y-m-d', strtotime($jodate));

            $sqlQuery .= ' where (adv.visibility=1 AND adv.type=1 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '") AND  (es.sono LIKE "%' . $_POST["search"]["value"] . '%" ';



            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR DATE_FORMAT(adv.date, "%Y-%m-%d") LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . $_POST["search"]["value"] . '%") ';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';

        } else {

            $sqlQuery .= 'where adv.visibility=1  AND adv.type=1 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }



        if (!empty($_POST["order"])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY adv.pk_adv_com_id DESC ';
        }

        $display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        if ($_POST["length"] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }



        //var_dump($sqlQuery);

        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_advance_comm where visibility=1 and type=1  ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);



        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {



            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['adv_date'];

            $payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));

            // $rows[] = $payment_type ;

            //  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';

            $rows[] = $payment_type;



            //    $receipt =    ($record['receipt'])? number_format($record['receipt'], 2) : 0;

            // $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';

            // $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';

            $rows[] = $record['advance_amount'];

            //$rows[] = '<a href="index.php?erp=82&id='.$record["pk_adv_com_id"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=81&id='.$record["pk_adv_com_id"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            // $rows[] = '<a href="index.php?erp=90&id=' . $record["pk_adv_com_id"] . '&type=1" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
            if ($record['bill_paid'] == 0) {
                $rows[] = '<a href="index.php?erp=90&id=' . $record["pk_adv_com_id"] . '&type=1" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
            } else {

                $rows[] = '<a href="index.php?erp=129&id=' . $record["pk_adv_com_id"] . '&type=1" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
            }



            $records[] = $rows;

            $i++;
        }

        $output = array(

            "draw" => intval($_POST["draw"]),

            "recordsTotal" => $allRecords,

            "recordsFiltered" => $displayRecords,

            "data" => $records,

        );

        //echo $sqlQuery;

        echo json_encode($output);
    }

    public function listBillNonComm()

    {

        //$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.PK_ES_ID = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM ".SALES_INVOICE." AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ".ORDER_PAYMENT." AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt  FROM ".ESTIMATE_COMM." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  ";

        $sqlQuery = "SELECT adv.pk_adv_noncom_id,es.sono, cus.cus_name,cus.cus_code, adv.advance_amount,es.PK_ES_ID,DATE_FORMAT(adv.date, '%d-%m-%Y') as adv_date,adv.payment_type,es.bill_paid FROM erp_advance_noncomm AS adv LEFT JOIN erp_estimate_noncomm as es ON adv.fk_es_id=es.PK_ES_ID LEFT JOIN erp_customer_master AS cus ON adv.customer_id = cus.pk_cus_id ";




        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST["search"]["value"])) {

            $jodate = strtotime($_POST["search"]["value"]);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (adv.visibility=1 AND adv.type=1 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '") AND  (es.sono LIKE "%' . $_POST["search"]["value"] . '%" ';



            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR DATE_FORMAT(adv.date, "%Y-%m-%d") LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . $_POST["search"]["value"] . '%" )';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';

        } else {

            $sqlQuery .= 'where adv.visibility=1 and type=1 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }



        if (!empty($_POST["order"])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY adv.pk_adv_noncom_id DESC ';
        }

        $display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        if ($_POST["length"] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //var_dump($sqlQuery);

        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_advance_noncomm where visibility=1 and type =1 ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);



        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {



            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['adv_date'];

            $payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));

            // $rows[] = $payment_type ;

            //  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';

            $rows[] = $payment_type;



            //    $receipt =    ($record['receipt'])? number_format($record['receipt'], 2) : 0;

            // $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';

            // $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';

            $rows[] = $record['advance_amount'];

            //$rows[] = '<a href="index.php?erp=86&id='.$record["pk_adv_noncom_id"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=85&id='.$record["pk_adv_noncom_id"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            //  $rows[] = '<a href="index.php?erp=90&id=' . $record["pk_adv_noncom_id"] . '&type=2" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            if ($record['bill_paid'] == 0) {
                $rows[] = '<a href="index.php?erp=90&id=' . $record["pk_adv_noncom_id"] . '&type=2" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
            } else {

                $rows[] = '<a href="index.php?erp=129&id=' . $record["pk_adv_noncom_id"] . '&type=2" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
            }

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



    public function getSalesOrderById($soid = "")

    {



        $query = "SELECT so.PK_ES_ID  as soId ,so.sono,so.sale_date,sum(so.discount_final) as discount_final,sum(so.discount_final_amt) as discount_final_amt,sum(so.gst_percent) as gst_percent,sum(so.gst_total) as gst_total,sum(so.item_total) as item_total,sum(so.grand_total) as grand_total,so.customer_id,so.sono,so.reference_number,so.types,so.price_type,so.payment_type,so.orientation,so.city,so.discount_field, so.discount_final, so.discount_final_amt, so.discount_type, so.discount_field2, so.discount_final2, so.discount_final_amt2, so.discount_type2, so.discount_field3, so.discount_final3, so.discount_final_amt3, so.discount_type3, so.discount_field4, so.discount_final4, so.discount_final_amt4, so.discount_type4, so.discount_field5, so.discount_final5, so.discount_final_amt5, so.discount_type5,so.remark,so.gst_type,so.caltype1,so.caltype2,so.caltype3,so.caltype4,so.caltype5,so.delivery_date,so.state,so.franchise,sgst_percent,sgst_total FROM " . ESTIMATE_COMM . " so  WHERE so.PK_ES_ID IN(" . $soid . ")";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getSalesOrderProductByPROId($soid = "")

    {

        $query = "SELECT * FROM " . ESTIMATE_COMM_PRO . "  WHERE fk_so_id IN(" . $soid . ") ORDER BY PK_ESP_ID ASC";



        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getSalesOrderProductById($sopid = "")

    {



        $query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,p.product_name,c.cat_name,sqp.fk_category_id,sqp.product_id,sqp.types,sqp.price_type,sqp.orientation FROM " . ESTIMATE_COMM_PRO . " sqp  LEFT JOIN " . PRODUCT . " p ON sqp.product_id =p.pk_product_id LEFT JOIN " . CATEGORY . " c ON sqp.fk_category_id=c.pk_cat_id WHERE sqp.PK_ESP_ID='" . $sopid . "' ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getSalesOrderAddressById($soid)

    {

        $query = "SELECT * FROM " . ESTIMATE_COMM . " sq LEFT JOIN " . CUSTOMER . " cus ON cus.pk_cus_id = sq.customer_id  WHERE PK_ES_ID=" . $soid . "";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function EditCustomer()

    {

        $query = "SELECT * FROM " . COMPANY . " WHERE pk_com_id=1 AND visibility != '0'";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getSalesOrderProductByIdForPDF($sqp_id)

    {

        //    fk_specialeffects_id fk_size_id product_name price final_total gst_total item_total grand_total qty name

        // $query = "SELECT p.product_name ,sqp.price, sqp.final_total,   sqp.qty, isheet.name as innername,se.name as specialeffectsname,s.name as sizename FROM ".SALES_ORDER_PRODUCT." sqp LEFT JOIN ".PRODUCT." AS p ON p.pk_product_id =sqp.product_id LEFT JOIN ".CATEGORY." AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN ".INNER_SHEET." AS isheet ON isheet.pk_is_id = sqp.fk_innersheet_id LEFT JOIN ".SPECIAL_EFFECTS." AS se ON se.pk_se_id = sqp.fk_specialeffects_id LEFT JOIN ".SIZE." AS s ON s.pk_size_id = sqp.fk_size_id WHERE p.visibility='1' and sqp.PK_ESP_ID='".$sqp_id."'";

        // IF(so.types = 1, (SELECT GROUP_CONCAT(types_name) as typesname  FROM  ".SALES_ORDER_PRODUCT." sop LEFT JOIN ".TYPES." tys ON tys.pk_types_id  = sop.itemtype where    sop.fk_so_id = so.PK_ES_ID) , 'Commercial') as typesnameval



        $query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,its.fk_item_id as itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,p.product_name,c.cat_name,sqp.fk_category_id,sqp.product_id,its.first_price,its.second_price,sqp.types,sqp.price_type,sqp.orientation FROM " . ESTIMATE_COMM_PRO . " sqp LEFT JOIN " . PRODUCT . " p ON sqp.product_id =p.pk_product_id LEFT JOIN " . CATEGORY . " c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN " . ITEMS . " its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN " . TYPES . " ty ON ty.pk_types_id = sqp.itemtype LEFT JOIN " . ESTIMATE_COMM . " so ON sqp.fk_so_id=so.PK_ES_ID  WHERE sqp.PK_ESP_ID='" . $sqp_id . "' ";



        //  $query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty,sqp.fk_item_id, ty.pk_types_id,ty.types_name,sqp.fk_types_id,ty.type_tables,ty.table_pk_id FROM ".SALES_ORDER_PRODUCT." sqp  LEFT JOIN ".TYPES." AS ty ON ty.pk_types_id = sqp.fk_types_id  WHERE sqp.PK_ESP_ID='".$sqp_id."' ";



        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }



    /*Non Commercial */



    public function EstimateNonComm_lastinserted_id()

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



    public function addEstimateNonComm()

    {



        $query1 = "INSERT INTO " . ESTIMATE_NONCOMM . " SET sono='" . $this->sono . "', sale_date='" . $this->sale_date . "', customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "', discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  delivery_date='" . $this->shipment_to . "',  state='" . $this->reference_number . "',  franchise='" . $this->product_id . "', remark='" . $this->remark . "',status=1, visibility='1',sales_no='" . $sales_no . "',payment_type='" . $this->paymenttype . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',created_by=" . $_SESSION['user_id'] . "";



        // $query1 = "INSERT INTO ".ESTIMATE_NONCOMM." SET sono='".$this->sono."', sale_date='".$this->sale_date."', customer_id='".$this->customer_id."', city='".$this->city."',item_total='".$this->item_total."', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."',  discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."', grand_total='".$this->grand_total."',gst_percent='".$this->cgst."',gst_total='".$this->cgst_amt."',  gst_type='".$this->gsttype."',delivery_date='".$this->shipment_to."',  state='".$this->reference_number."',  franchise='".$this->product_id."', remark='".$this->remark."',status=1, visibility='1',sales_no='".$sales_no."',payment_type='".$this->paymenttype."',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',created_by=".$_SESSION['user_id']."";



        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);



        if ($result1) {

            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {

            return 0;
        }
    }

    public function addEstimateNonCommProduct()

    {



        $query1 = "INSERT INTO " . ESTIMATE_NONCOMM_PRO . " SET fk_so_id='" . $this->fk_so_id . "',  itemtype='" . $this->types_id . "', fk_items_id='" . $this->item_id . "', qty='" . $this->qty . "',price_type='" . $this->pricetype . "',orientation='" . $this->orientation . "', price='" . $this->price . "', taxable_total='" . $this->total . "', final_total='" . $this->final_total . "'";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        if ($result1) {

            return 1;
        } else {

            return 0;
        }
    }

    public function updateEstimateNonComm($sales_no)

    {



        $query1 = "UPDATE  " . ESTIMATE_NONCOMM . " SET	  sale_date='" . $this->sale_date . "', customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "', discount_field='" . $this->discount_field1 . "', discount_final='" . $this->discount_final1 . "', discount_final_amt='" . $this->discount_final_amt1 . "', discount_type='" . $this->discount_type1 . "', discount_field2='" . $this->discount_field2 . "', discount_final2='" . $this->discount_final2 . "', discount_final_amt2='" . $this->discount_final_amt2 . "', discount_type2='" . $this->discount_type2 . "', discount_field3='" . $this->discount_field3 . "', discount_final3='" . $this->discount_final3 . "', discount_final_amt3='" . $this->discount_final_amt3 . "', discount_type3='" . $this->discount_type3 . "',  discount_final4='" . $this->discount_final4 . "', discount_final_amt4='" . $this->discount_final_amt4 . "', discount_final_amt5='" . $this->discount_final_amt5 . "', discount_type5='" . $this->discount_type5 . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->cgst . "',gst_total='" . $this->cgst_amt . "',sgst_percent='" . $this->cgst_final . "',sgst_total='" . $this->cgst_amt_final . "',  gst_type='" . $this->gsttype . "',  delivery_date='" . $this->shipment_to . "',  state='" . $this->reference_number . "',  franchise='" . $this->product_id . "', remark='" . $this->remark . "',status=1, visibility='1',sales_no='" . $sales_no . "',payment_type='" . $this->paymenttype . "',caltype1='" . $this->caltype1 . "',caltype2='" . $this->caltype2 . "',caltype3='" . $this->caltype3 . "',modified_by=" . $_SESSION['user_id'] . " where PK_ES_ID ='" . $sales_no . "'";



        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        if ($result1) {

            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {

            return 0;
        }
    }

    public function deleteEstimateNonCommProduct($so_id)

    {

        $query = "DELETE FROM " . ESTIMATE_NONCOMM_PRO . " WHERE fk_so_id='" . $so_id . "'";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 0;
        }
    }



    public function listAdvanceNonComm()

    {

        //$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.PK_ES_ID = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM ".SALES_INVOICE." AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ".ORDER_PAYMENT." AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt  FROM ".ESTIMATE_COMM." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  ";

        $sqlQuery = "SELECT adv.pk_adv_noncom_id,es.sono, cus.cus_name, cus.cus_code, adv.advance_amount,es.PK_ES_ID,DATE_FORMAT(adv.date, '%d-%m-%Y') as adv_date,adv.payment_type FROM erp_advance_noncomm AS adv LEFT JOIN erp_estimate_noncomm as es ON adv.fk_es_id=es.PK_ES_ID LEFT JOIN erp_customer_master AS cus ON adv.customer_id = cus.pk_cus_id ";


        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        if (!empty($_POST["search"]["value"])) {

            $jodate = $_POST["search"]["value"];
            $jodateVals = date('Y-m-d', strtotime($jodate));

            $sqlQuery .= 'where (adv.visibility=1 AND adv.type=0 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '") AND  (es.sono LIKE "%' . $_POST["search"]["value"] . '%" ';



            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR DATE_FORMAT(adv.date, "%Y-%m-%d") LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . $_POST["search"]["value"] . '%" )';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';

        } else {

            $sqlQuery .= 'where adv.visibility=1 AND adv.type=0 AND  DATE_FORMAT(adv.date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        }



        if (!empty($_POST["order"])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY adv.pk_adv_noncom_id DESC ';
        }


        $display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        if ($_POST["length"] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_advance_noncomm where visibility=1 and type =0 ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);



        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {



            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['adv_date'];

            $payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));

            // $rows[] = $payment_type ;

            //  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';

            $rows[] = $payment_type;



            //    $receipt =    ($record['receipt'])? number_format($record['receipt'], 2) : 0;

            // $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';

            // $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';

            $rows[] = $record['advance_amount'];

            //$rows[] = '<a href="index.php?erp=86&id='.$record["pk_adv_noncom_id"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=85&id='.$record["pk_adv_noncom_id"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            $rows[] = '<a href="index.php?erp=81&id=' . $record["pk_adv_noncom_id"] . '&type=2" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

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



    public function getEstimateNonCommById($soid = "")

    {



        $query = "SELECT so.PK_ES_ID  as soId ,so.sono,so.sale_date,sum(so.discount_final) as discount_final,sum(so.discount_final_amt) as discount_final_amt,sum(so.gst_percent) as gst_percent,sum(so.gst_total) as gst_total,sum(so.item_total) as item_total,sum(so.grand_total) as grand_total,so.customer_id,so.sono,so.reference_number,so.types,so.price_type,so.payment_type,so.orientation,so.city,so.discount_field, so.discount_final, so.discount_final_amt, so.discount_type, so.discount_field2, so.discount_final2, so.discount_final_amt2, so.discount_type2, so.discount_field3, so.discount_final3, so.discount_final_amt3, so.discount_type3, so.discount_field4, so.discount_final4, so.discount_final_amt4, so.discount_type4, so.discount_field5, so.discount_final5, so.discount_final_amt5, so.discount_type5,so.remark,so.gst_type,so.caltype1,so.caltype2,so.caltype3,so.caltype4,so.caltype5,so.delivery_date,so.state,so.franchise,sgst_percent,sgst_total FROM " . ESTIMATE_NONCOMM . " so  WHERE so.PK_ES_ID IN(" . $soid . ")";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getEstimateNonCommProductByPROId($soid = "")

    {

        $query = "SELECT * FROM " . ESTIMATE_NONCOMM_PRO . "  WHERE fk_so_id IN(" . $soid . ") ORDER BY PK_ESP_ID ASC";



        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getEstimateNonCommProductById($sopid = "")

    {



        $query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,p.product_name,c.cat_name,sqp.fk_category_id,sqp.product_id,sqp.types,sqp.price_type,sqp.orientation FROM " . ESTIMATE_NONCOMM_PRO . " sqp  LEFT JOIN " . PRODUCT . " p ON sqp.product_id =p.pk_product_id LEFT JOIN " . CATEGORY . " c ON sqp.fk_category_id=c.pk_cat_id WHERE sqp.PK_ESP_ID='" . $sopid . "' ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getEstimateNonCommAddressById($soid)

    {

        $query = "SELECT * FROM " . ESTIMATE_NONCOMM . " sq LEFT JOIN " . CUSTOMER . " cus ON cus.pk_cus_id = sq.customer_id  WHERE PK_ES_ID=" . $soid . "";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }



    public function getEstimateNonCommByIdForPDF($sqp_id)

    {



        $query = "SELECT sqp.PK_ESP_ID ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,its.fk_item_id as itemnames,ty.types_name ,p.product_name,c.cat_name,sqp.fk_category_id,sqp.product_id,its.first_price,its.second_price,sqp.types,sqp.price_type,sqp.orientation FROM " . ESTIMATE_NONCOMM_PRO . " sqp LEFT JOIN " . PRODUCT . " p ON sqp.product_id =p.pk_product_id LEFT JOIN " . CATEGORY . " c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN " . ITEMS . " its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN " . TYPES . " ty ON ty.pk_types_id = sqp.itemtype LEFT JOIN " . ESTIMATE_NONCOMM . " so ON sqp.fk_so_id=so.PK_ES_ID  WHERE sqp.PK_ESP_ID='" . $sqp_id . "' ";



        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
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

    public function getallsalesorder($types)

    {

        $query = "SELECT so.sono, cus.cus_name,so.sale_date, so.grand_total, so.prefix, so.prefix_year, so.sales_no,so.discount_field, so.discount_final, so.discount_final_amt, so.discount_type, so.discount_field2, so.discount_final2, so.discount_final_amt2, so.discount_type2, so.discount_field3, so.discount_final3, so.discount_final_amt3, so.discount_type3, so.discount_field4, so.discount_final4, so.discount_final_amt4, so.discount_type4, so.discount_field5, so.discount_final5, so.discount_final_amt5, so.discount_type5,so.remark,so.gst_type,so.caltype1,so.caltype2,so.caltype3,so.caltype4,so.caltype5  FROM " . SALES_ORDER . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id WHERE so.visibility='1' AND so.approval_status='" . $types . "' GROUP BY so.sono ORDER BY so.PK_ES_ID ASC";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }

    public function getsalesorder_edit($id)

    {

        $query = "SELECT * FROM " . SALES_ORDER . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id WHERE so.visibility='1' AND so.sono='" . $id . "' ORDER BY so.PK_ES_ID ASC";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }

    public function Sales_order_detele($sono_id)

    {

        $query = "DELETE FROM " . SALES_ORDER . " WHERE sono='" . $sono_id . "'";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }



    public function listSalesOrder()

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

            $dateVal = strtotime($record['mixmonthlevel']);

            $dateVals = date('Y-m', $dateVal);

            $dateValname = date('M Y', $dateVal);

            $osstatus = '';

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

                $osstatus = '<span class="custom_btn_class text-info" >Complete Delivery</span>';
            } else if ($record['osstatus'] == 7) {

                $osstatus = '<span class="custom_btn_class text-success" >Amount Received</span>';
            } else if ($record['osstatus'] == 8) {

                $osstatus = '<span class="custom_btn_class text-success" >Completed</span>';
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

            $rows[] = '<p class="alignrightAmount">' . $record['grand_total'] . '</p>';

            //  $rows[] = $record['status'];

            $rows[] = '<a href="index.php?erp=15&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=14&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            //  $rows[] = '<a href="index.php?erp=14&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-eye"></span></a>';



            //var_dump($record['osstatus']);



            if ($record['status'] == 2 && $record['osstatus'] == null) {

                $rows[] = 'Invoice is created';
            } else {

                $rows[] = $osstatus;
            }



            $rows[] = '<a href="index.php?erp=34&id=' . $record["PK_ES_ID"] . '" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Status" name="btnEdit">Status</a>';

            //$rows[] = '<a href="index.php?erp=15&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>    <a href="index.php?erp=14&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';

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



    public function get_sale_approval_ids()

    {

        $sql = "SELECT * FROM " . SALES_ORDER . " WHERE customer_id='" . $this->customer_id . "' AND approval_status='1' AND visibility='1' GROUP BY sono";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $sql);

        $data = array();

        while ($rows = mysqli_fetch_array($result)) {

            $data[] = $rows;
        }

        return $data;
    }



    public function getCityName($cityid)

    {

        $query = "SELECT * FROM " . CITIES . " WHERE pk_city_id= '" . $cityid . "'";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }



    public function getStateName($stateid)

    {

        $query = "SELECT * FROM " . STATES . " WHERE pk_state_id= '" . $stateid . "'";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getCustomer($cusId)

    {



        $query = "SELECT pk_cus_id,cus_state,cus_city FROM " . CUSTOMER . " WHERE pk_cus_id= " . $cusId;

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getCategoryListingData()

    {

        $query = "SELECT pk_cat_id,cat_name FROM " . CATEGORY . " WHERE visibility= 1";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getInnerSheetData()

    {

        $query = "SELECT pk_is_id,name,cost,description FROM " . INNER_SHEET . " WHERE visibility= 1";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getInnersheet_id($InnerId)

    {

        $query = "SELECT pk_is_id,name,cost,description FROM " . INNER_SHEET . " WHERE pk_is_id= " . $InnerId;

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getAllSpecialEffectsData()

    {



        $query = "SELECT pk_se_id,name,cost,description  FROM " . SPECIAL_EFFECTS . " WHERE visibility= 1";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getAllSizeData()

    {



        $query = "SELECT pk_size_id,name,cost,description FROM " . SIZE . " WHERE visibility= 1 ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }



    public function getAllBagData()

    {



        $query = "SELECT pk_bag_id,name,cost,description FROM " . BAG . " WHERE visibility= 1 ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }



    public function getAllBoxData()

    {



        $query = "SELECT pk_box_id,name,cost,description FROM " . BOX . " WHERE visibility= 1 ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }



    public function getAllPadData()

    {



        $query = "SELECT pk_pad_id,name,cost,description FROM " . PAD . " WHERE visibility= 1 ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }



    public function getAllItemData()

    {

        //    $_POST['valid']

        define('TABLES', admin_db_prefix . strtolower(trim($_POST['tables'])));



        //$tablesval = ;

        $query = "SELECT " . $_POST['pkid'] . " as id,name,cost,description FROM " . TABLES . " WHERE visibility= 1 ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getAllItemDataprint($pk_id, $typetables, $item_id)

    {

        //    $_POST['valid']

        //    var_dump($typetables);

        $TABLES = admin_db_prefix . strtolower(trim($typetables));



        //$tablesval = ;

        $query = "SELECT " . $pk_id . " as id,name,cost,description FROM " . $TABLES . " WHERE " . $pk_id . " =" . $item_id . " AND visibility= 1 ";



        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function filterlistSalesOrder()

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



        //    var_dump($sqlQuery);

        //    exit;

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

            //$rows[] = '<a href="index.php?erp=15&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>    <a href="index.php?erp=14&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';

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

    public function getSalesOrderByIdStatus()

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



        //    $sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus,  IF(so.types = 2, (SELECT GROUP_CONCAT(types_name) as typesname ,its.first_price,its.second_price FROM  ".SALES_ORDER_PRODUCT." sop LEFT JOIN ".TYPES." tys ON tys.pk_types_id  = sop.itemtype where    sop.fk_so_id = so.PK_ES_ID) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  ".SALES_ORDER_PRODUCT." sop LEFT JOIN ".ITEMS." items ON items.pk_items_id  = sop.fk_items_id where sop.fk_so_id = so.PK_ES_ID) as itemnameval,so.types FROM ".SALES_ORDER." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id



        $sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus, IF(sop.types = 2, (SELECT GROUP_CONCAT(tys.types_name) as typesname   FROM  " . SALES_ORDER_PRODUCT . " sops  LEFT JOIN  " . TYPES . " tys ON tys.pk_types_id  = sops.itemtype where	sops.fk_so_id = so.PK_ES_ID) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  " . SALES_ORDER_PRODUCT . " sops LEFT JOIN " . ITEMS . " items ON items.pk_items_id  = sops.fk_items_id where sops.fk_so_id = so.PK_ES_ID) as itemnameval,so.types FROM " . SALES_ORDER . " AS so  LEFT JOIN  " . SALES_ORDER_PRODUCT . " sop ON sop.fk_so_id = so.PK_ES_ID LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  where so.visibility=1 AND so.sale_date BETWEEN '" . $fromDateval . "' AND '" . $toDateval . "'  " . $statusfilter . "  GROUP BY so.PK_ES_ID";



        $allResult = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        return $allResult;
    }

    public function getCreditSalesOrderByIdStatus()

    {



        $statusfilter = '';



        if (isset($_POST["customerfilter"]) && !empty($_POST["customerfilter"])) {

            $statusfilter = 'AND so.customer_id =' . $_POST["customerfilter"] . ' ';
        }

        //$statusfilter = ($_POST["status-filter"]==1)? 'so.order_status= 7 AND' : 'so.order_status != 7' ;



        $sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus, IF(sop.types = 2, (SELECT GROUP_CONCAT(tys.types_name) as typesname   FROM  " . SALES_ORDER_PRODUCT . " sops  LEFT JOIN  " . TYPES . " tys ON tys.pk_types_id  = sops.itemtype where	sops.fk_so_id = so.PK_ES_ID) , 'Product') as typesnameval, (SELECT GROUP_CONCAT(fk_item_id) as typesname  FROM  " . SALES_ORDER_PRODUCT . " sops LEFT JOIN " . ITEMS . " items ON items.pk_items_id  = sops.fk_items_id where sops.fk_so_id = so.PK_ES_ID) as itemnameval,so.types FROM " . SALES_ORDER . " AS so  LEFT JOIN  " . SALES_ORDER_PRODUCT . " sop ON sop.fk_so_id = so.PK_ES_ID LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id  where so.visibility=1 AND payment_type=2  " . $statusfilter . "  GROUP BY so.PK_ES_ID";



        $allResult = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        return $allResult;
    }

    public function getAllorderstatus()

    {



        $sqlQuery = "SELECT id,name,short_code FROM invoice_erp.erp_status_master  where status=1 ";

        $allResult = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        return $allResult;
    }



    public function filterCustomerlistSalesOrder()

    {



        /*fromDate

        toDate

        statusfilter*/



        $sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date, so.order_status,(SELECT name FROM invoice_erp.erp_status_master AS osi WHERE so.order_status = osi.id) as osstatus,so.city FROM " . SALES_ORDER . " AS so LEFT JOIN " . CUSTOMER . " AS cus ON so.customer_id = cus.pk_cus_id ";



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



        //    var_dump($sqlQuery);

        //    exit;

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

            //$rows[] = '<a href="index.php?erp=15&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>    <a href="index.php?erp=14&id='.$record["PK_ES_ID"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';

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



    public function getCustomerList()

    {



        $query = "SELECT pk_cus_id,cus_name,cus_state,cus_city FROM " . CUSTOMER . " WHERE visibility= 1";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getCostProduct()

    {

        $query = "SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price FROM " . ITEMS . " WHERE pk_items_id=" . $_POST['itemtypeId'] . " and visibility= 1 ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }



    public function getComercialorNonItemsType()

    {

        $query = "SELECT pk_items_id,fk_item_id,type,item_type,first_price,second_price FROM " . ITEMS . " WHERE type=" . $_POST['typesid'] . " and item_type = " . $_POST['itemtypeId'] . "  and visibility= 1 ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    /*    function getNonComercialItemsType(){

    $query = "SELECT pk_items_id,fk_item_id,type,item_type FROM ".ITEMS." WHERE type=".$_POST['typesid']." and item_type = ".$_POST['itemtypeId']."  and visibility= 1 ";

    $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

    return $res;

    }*/



    public function getCostNonCommercialProduct($productId)

    {



        $query = "SELECT pk_product_id,product_name,4color_price,7color_price FROM " . PRODUCT . " WHERE visibility= 1 AND pk_product_id =" . $productId . " ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getCostCommercialProduct($productId)

    {

        $query = "SELECT pk_commprod_id,product_name,firstcopy_price, additionalcopy_price FROM " . COMMERCIAL_PRODUCTS . " WHERE visibility= 1 AND pk_commprod_id =" . $productId . "";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function changePaidorder($soid, $status)

    {



        $query1 = "UPDATE  " . SALES_ORDER . " SET  order_status= " . $status . " where PK_ES_ID = " . $soid . "";



        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        if ($result1) {

            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {

            return 0;
        }
    }

    public function changePaidorderstatus($soid, $status, $sdate)

    {

        $query = "SELECT * FROM " . ORDER_STATUS . "  WHERE fk_so_id=" . $soid . " AND close_status =1; ";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        $cunt = mysqli_num_rows($result);

        if ($cunt == 0) {

            $query1 = "INSERT INTO  " . ORDER_STATUS . "  SET fk_so_id=" . $soid . " ,date='" . $sdate . "',status=" . $status . " , statuschangeby=1, visibility =1 ";

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

    public function add_advance_comm($date)

    {

        $query = "INSERT INTO `erp_advance_comm` (`pk_adv_com_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`,`type`) VALUES (NULL, '" . $_POST['txt_estimate_name'] . "', '" . $_POST['txt_customer_name'] . "', '" . $_POST['adv_amount'] . "', '" . $_POST['txt_payment_type'] . "', '" . $date . "', '" . $_POST['txt_remarks'] . "', '', '', '', '', '1','0')";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function add_bill_comm($date)

    {

        $query = "INSERT INTO `erp_advance_comm` (`pk_adv_com_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`,`type`) VALUES (NULL, '" . $_POST['txt_estimate_name'] . "', '" . $_POST['txt_customer_name'] . "', '" . $_POST['adv_amount'] . "', '" . $_POST['txt_payment_type'] . "', '" . $date . "', '" . $_POST['txt_remarks'] . "', '', '', '', '', '1','1')";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }



    public function edit_advance_comm($date)

    {

        //$query = "INSERT INTO `erp_advance_comm` (`pk_adv_com_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`) VALUES (NULL, '".$_POST['txt_estimate_name']."', '".$_POST['txt_customer_name']."', '".$_POST['adv_amount']."', '".$_POST['txt_payment_type']."', '".$date."', '".$_POST['txt_remarks']."', '', '', '', '', '1')";

        $query = "UPDATE `erp_advance_comm` SET `fk_es_id` = '" . $_POST['txt_estimate_name'] . "', `customer_id` = '" . $_POST['txt_customer_name'] . "', `advance_amount` = '" . $_POST['adv_amount'] . "', `payment_type` = '" . $_POST['txt_payment_type'] . "', `date` = '" . $date . "', `remarks` = '" . $_POST['txt_remarks'] . "' WHERE `erp_advance_comm`.`pk_adv_com_id` = '" . $_POST['adv_id'] . "'";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function edit_bill_comm($date)

    {

        //$query = "INSERT INTO `erp_advance_comm` (`pk_adv_com_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`) VALUES (NULL, '".$_POST['txt_estimate_name']."', '".$_POST['txt_customer_name']."', '".$_POST['adv_amount']."', '".$_POST['txt_payment_type']."', '".$date."', '".$_POST['txt_remarks']."', '', '', '', '', '1')";

        $query = "UPDATE `erp_advance_comm` SET `fk_es_id` = '" . $_POST['txt_estimate_name'] . "', `customer_id` = '" . $_POST['txt_customer_name'] . "', `advance_amount` = '" . $_POST['adv_amount'] . "', `payment_type` = '" . $_POST['txt_payment_type'] . "', `date` = '" . $date . "', `remarks` = '" . $_POST['txt_remarks'] . "' WHERE `erp_advance_comm`.`pk_adv_com_id` = '" . $_POST['adv_id'] . "'";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function edit_bill_noncomm($date)

    {

        //$query = "INSERT INTO `erp_advance_comm` (`pk_adv_com_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`) VALUES (NULL, '".$_POST['txt_estimate_name']."', '".$_POST['txt_customer_name']."', '".$_POST['adv_amount']."', '".$_POST['txt_payment_type']."', '".$date."', '".$_POST['txt_remarks']."', '', '', '', '', '1')";

        $query = "UPDATE `erp_advance_noncomm` SET `fk_es_id` = '" . $_POST['txt_estimate_name'] . "', `customer_id` = '" . $_POST['txt_customer_name'] . "', `advance_amount` = '" . $_POST['adv_amount'] . "', `payment_type` = '" . $_POST['txt_payment_type'] . "', `date` = '" . $date . "', `remarks` = '" . $_POST['txt_remarks'] . "' WHERE `erp_advance_noncomm`.`pk_adv_noncom_id` = '" . $_POST['adv_id'] . "'";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function edit_advance_noncomm($date)

    {

        //$query = "INSERT INTO `erp_advance_comm` (`pk_adv_com_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`) VALUES (NULL, '".$_POST['txt_estimate_name']."', '".$_POST['txt_customer_name']."', '".$_POST['adv_amount']."', '".$_POST['txt_payment_type']."', '".$date."', '".$_POST['txt_remarks']."', '', '', '', '', '1')";

        $query = "UPDATE `erp_advance_noncomm` SET `fk_es_id` = '" . $_POST['txt_estimate_name'] . "', `customer_id` = '" . $_POST['txt_customer_name'] . "', `advance_amount` = '" . $_POST['adv_amount'] . "', `payment_type` = '" . $_POST['txt_payment_type'] . "', `date` = '" . $date . "', `remarks` = '" . $_POST['txt_remarks'] . "' WHERE `erp_advance_noncomm`.`pk_adv_noncom_id` = '" . $_POST['adv_id'] . "'";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function add_advance_noncomm($date)

    {

        //$query = "INSERT INTO `erp_advance_comm` (`pk_adv_noncom_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`) VALUES (NULL, '".$_POST['txt_estimate_name']."', '".$_POST['txt_customer_name']."', '".$_POST['adv_amount']."', '".$_POST['txt_payment_type']."', '".$date."', '', '', '', '', '1')";

        $query = "INSERT INTO `erp_advance_noncomm` (`pk_adv_noncom_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`,`type`) VALUES (NULL, '" . $_POST['txt_estimate_name'] . "', '" . $_POST['txt_customer_name'] . "', '" . $_POST['adv_amount'] . "', '" . $_POST['txt_payment_type'] . "', '" . $date . "', '" . $_POST['txt_remarks'] . "', '', '', '', '', '1','0')";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function add_bill_noncomm($date)

    {

        //$query = "INSERT INTO `erp_advance_comm` (`pk_adv_noncom_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`) VALUES (NULL, '".$_POST['txt_estimate_name']."', '".$_POST['txt_customer_name']."', '".$_POST['adv_amount']."', '".$_POST['txt_payment_type']."', '".$date."', '', '', '', '', '1')";

        $query = "INSERT INTO `erp_advance_noncomm` (`pk_adv_noncom_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`,`type`) VALUES (NULL, '" . $_POST['txt_estimate_name'] . "', '" . $_POST['txt_customer_name'] . "', '" . $_POST['adv_amount'] . "', '" . $_POST['txt_payment_type'] . "', '" . $date . "', '" . $_POST['txt_remarks'] . "', '', '', '', '', '1','1')";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function get_edit_advance_details($id)

    {

        $query = "SELECT ad.customer_id,cus.cus_name,es.sono,ad.date,ad.advance_amount,ad.payment_type,ad.remarks,es.PK_ES_ID,ad.fk_es_id FROM erp_advance_comm as ad LEFT JOIN erp_estimate_comm as es ON ad.fk_es_id = es.PK_ES_ID LEFT JOIN erp_customer_master as cus ON ad.customer_id=cus.pk_cus_id WHERE ad.pk_adv_com_id='" . $id . "' and ad.type=0";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }

    public function get_edit_bill_details($id)

    {

        $query = "SELECT ad.customer_id,cus.cus_name,es.sono,ad.date,ad.advance_amount,ad.payment_type,ad.remarks,es.PK_ES_ID FROM erp_advance_comm as ad LEFT JOIN erp_estimate_comm as es ON ad.fk_es_id = es.PK_ES_ID LEFT JOIN erp_customer_master as cus ON ad.customer_id=cus.pk_cus_id WHERE ad.pk_adv_com_id='" . $id . "' and ad.type=1";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }

    public function get_edit_bill_details_non_comm($id)

    {

        $query = "SELECT ad.customer_id,cus.cus_name,es.sono,ad.date,ad.advance_amount,ad.payment_type,ad.remarks,es.PK_ES_ID FROM erp_advance_noncomm as ad LEFT JOIN erp_estimate_noncomm as es ON ad.fk_es_id = es.PK_ES_ID LEFT JOIN erp_customer_master as cus ON ad.customer_id=cus.pk_cus_id WHERE ad.pk_adv_noncom_id='" . $id . "' and ad.type=1";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }

    public function get_edit_advance_details_non_comm($id)

    {

        $query = "SELECT ad.customer_id,cus.cus_name,es.sono,ad.date,ad.advance_amount,ad.payment_type,ad.remarks,es.PK_ES_ID,ad.fk_es_id FROM erp_advance_noncomm as ad LEFT JOIN erp_estimate_noncomm as es ON ad.fk_es_id = es.PK_ES_ID LEFT JOIN erp_customer_master as cus ON ad.customer_id=cus.pk_cus_id WHERE ad.pk_adv_noncom_id='" . $id . "' and ad.type=0";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }

    public function check_pending_amount_comm($sono, $adv)

    {

        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_comm as ad LEFT JOIN erp_estimate_comm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $sono . "' ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;

        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;
            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];

                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_comm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
        }

        if ($checkBillCount == 0) {
            if ($totVal > 0) {
                if ($totVal >= $adv) {

                    $value = 'true';
                } else {
                    $value = 'Balance receivable is ' .  $totVal . '. The enter advance amount is higher. Please enter less than amount';
                }
            } else {

                $value = "Advance amount has been collected full amount. you can't edit the value";
            }
        } else {

            $value = "Bill receipt amount has been collected. you can't edit the value";
        }


        return $value;
    }

    public function check_pending_amount_noncomm($sono, $adv)

    {

        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_noncomm as ad LEFT JOIN erp_estimate_noncomm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $sono . "' ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;

        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;
            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];

                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_noncomm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
        }
        if ($checkBillCount == 0) {
            if ($totVal > 0) {
                if ($totVal >= $adv) {

                    $value = 'true';
                } else {
                    $value = 'Balance receivable is ' .  $totVal . '. The enter advance amount is higher. Please enter less than amount';
                }
            } else {

                $value = "Advance amount has been collected full amount. you can't edit the value";
            }
        } else {

            $value = "Bill receipt amount has been collected. you can't edit the value";
        }

        return $value;
    }

    public function check_pending_amount_comm_by_esid($esid, $adv)

    {

        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_comm as ad LEFT JOIN erp_estimate_comm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $esid . "' ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;

        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;
            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];

                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_comm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
        }

        if ($checkBillCount == 0) {
            if ($totVal > 0) {
                if ($totVal >= $adv) {

                    $value = 'true';
                } else {
                    $value = 'Balance receivable is ' .  $totVal . '. The enter advance amount is higher. Please enter less than amount';
                }
            } else {

                $value = "Advance amount has been collected full amount. you can't edit the value";
            }
        } else {

            $value = "Bill receipt amount has been collected. you can't edit the value";
        }



        return $value;
    }

    public function check_pending_amount_noncomm_by_esid($esid, $adv)
    {

        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_noncomm as ad LEFT JOIN erp_estimate_noncomm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $esid . "' ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;

        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;
            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];

                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_noncomm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
        }

        if ($checkBillCount == 0) {
            if ($totVal > 0) {
                if ($totVal >= $adv) {
                    $value = 'true';
                } else {
                    $value = 'Balance receivable is ' .  $totVal . '. The enter advance amount is higher. Please enter less than amount';
                }
            } else {

                $value = "Advance amount has been collected full amount. you can't edit the value";
            }
        } else {

            $value = "Bill receipt amount has been collected. you can't edit the value";
        }

        return $value;
    }

    public function get_estimate_by_customer_comm($cus_id)

    {

        $query = "SELECT PK_ES_ID,PK_ES_ID as esid,sono,bill_paid FROM erp_estimate_comm WHERE customer_id='" . $cus_id . "' AND bill_paid = 0";



        $row = array();

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



        while ($record = mysqli_fetch_assoc($result)) {

            $row[] = $record;
        }
        return $row;
    }

    public function get_estimate_by_customer_noncomm($cus_id)

    {

        $query = "SELECT PK_ES_ID,PK_ES_ID as esid,sono ,bill_paid FROM erp_estimate_noncomm WHERE customer_id='" . $cus_id . "' AND bill_paid = 0";



        $row = array();

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



        while ($record = mysqli_fetch_array($result)) {

            $row[] = $record;
        }

        return $row;
    }

    public function get_customer_by_estimate($es_id)

    {

        $query = "SELECT es.customer_id,cus.cus_name FROM erp_estimate_comm as es LEFT JOIN erp_customer_master as cus ON es.customer_id=cus.pk_cus_id WHERE es.PK_ES_ID='" . $es_id . "'";



        $row = array();

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



        while ($record = mysqli_fetch_assoc($result)) {

            $row[] = $record;
        }

        return $row;
    }

    public function getAllEstimate_comm()

    {

        $query = "SELECT sono,PK_ES_ID FROM `erp_estimate_comm` ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function check_pending_amount_comm_bill($sono, $adv)
    {
        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM `erp_estimate_comm` es LEFT JOIN erp_advance_comm ad  ON es.PK_ES_ID=ad.fk_es_id WHERE es.PK_ES_ID ='" . $sono . "' ";


        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;

        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;
            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];

                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_comm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
        }

        if ($checkBillCount == 0) {
            if ($totVal > 0) {
                if ($totVal >= $adv) {
                    $value = 'true';
                } else {
                    $value = 'Balance receivable is ' .  $totVal . '. The enter advance amount is higher. Please enter less than amount';
                }
            } else {

                $value = "Advance amount has been collected full amount. you can't edit the value";
            }
        } else {

            $value = "Bill receipt amount has been collected. you can't edit the value";
        }
        return $value;
    }
    public function check_pending_amount_noncomm_bill($sono, $adv)
    {
        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_noncomm as ad LEFT JOIN erp_estimate_noncomm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $sono . "' ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;

        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;
            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];

                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_noncomm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
        }

        if ($checkBillCount == 0) {
            if ($totVal > 0) {
                if ($totVal >= $adv) {
                    $value = 'true';
                } else {
                    $value = 'Balance receivable is ' .  $totVal . '. The enter advance amount is higher. Please enter less than amount';
                }
            } else {

                $value = "Advance amount has been collected full amount. you can't edit the value";
            }
        } else {

            $value = "Bill receipt amount has been collected. you can't edit the value";
        }
        return $value;
    }

    public function check_pending_amount_comm_bill_by_esid($sono, $adv)

    {


        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_comm as ad LEFT JOIN erp_estimate_comm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.sono ='" . $sono . "' ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;

        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;
            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];

                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_comm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
        }

        if ($checkBillCount == 0) {
            if ($totVal > 0) {
                if ($totVal >= $adv) {
                    $value = 'true';
                } else {
                    $value = 'Balance receivable is ' .  $totVal . '. The enter advance amount is higher. Please enter less than amount';
                }
            } else {

                $value = "Advance amount has been collected full amount. you can't edit the value";
            }
        } else {

            $value = "Bill receipt amount has been collected. you can't edit the value";
        }
        return $value;
    }

    public function check_pending_amount_noncomm_bill_by_esid($sono, $adv)

    {

        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_noncomm as ad LEFT JOIN erp_estimate_noncomm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $sono . "' ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;

        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;
            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];

                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_noncomm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
        }

        if ($checkBillCount == 0) {
            if ($totVal > 0) {
                if ($totVal >= $adv) {
                    $value = 'true';
                } else {
                    $value = 'Balance receivable is ' .  $totVal . '. The enter advance amount is higher. Please enter less than amount';
                }
            } else {

                $value = "Advance amount has been collected full amount. you can't edit the value";
            }
        } else {

            $value = "Bill receipt amount has been collected. you can't edit the value";
        }
        return $value;
    }



    /*Multiple Advance */



    public function add_advance_commmulti($date)

    {

        $query = "INSERT INTO `erp_advance_bill_comm` (`pk_adv_com_id`, `fk_es_id`, `discount`,`advance_amount`, `payment_type`, `date`, `created_by`, `visibility`,`type`) VALUES (NULL, '" . implode(",", $_POST['txt_estimate_name']) . "', '" . $_POST['txt_discount'] . "', '" . $_POST['adv_amount'] . "', '" . $_POST['txt_payment_type'] . "', '" . $date . "',  '" . $_SESSION['roleId'] . "', '1','0')";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function getReceiptById($receipt_id)
    {
        $query = "SELECT 
                pk_adv_com_id,
                fk_es_id AS estimate_ids,
                discount,
                advance_amount AS amount,
                payment_type,
                date AS receipt_date
              FROM erp_advance_bill_comm
              WHERE pk_adv_com_id = '" . $receipt_id . "'";

        return mysqli_query($GLOBALS["___mysqli_ston"], $query);
    }

    public function update_advance_commmulti($receipt_id, $date)
    {
        $query = "UPDATE `erp_advance_bill_comm`
              SET 
                `fk_es_id` = '" . implode(",", $_POST['txt_estimate_name']) . "',
                `discount` = '" . $_POST['txt_discount'] . "',
                `advance_amount` = '" . $_POST['adv_amount'] . "',
                `payment_type` = '" . $_POST['txt_payment_type'] . "',
                `date` = '" . $date . "'
              WHERE `pk_adv_com_id` = '" . $receipt_id . "'";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {
            return 1;
        } else {
            return 2;
        }
    }

    public function edit_advance_commmulti($date)

    {

        $query = "UPDATE `erp_advance_bill_comm` SET `fk_es_id` = '" . implode(",", $_POST['txt_estimate_name']) . "', `customer_id` = '" . $_POST['txt_customer_name'] . "', `advance_amount` = '" . $_POST['adv_amount'] . "', `payment_type` = '" . $_POST['txt_payment_type'] . "', `date` = '" . $date . "', `remarks` = '" . $_POST['txt_remarks'] . "' WHERE `erp_advance_comm`.`pk_adv_com_id` = '" . $_POST['adv_id'] . "'";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function add_advance_noncommmulti($date)

    {

        $query = "INSERT INTO `erp_advance_bill_noncomm` (`pk_adv_noncom_id`, `fk_es_id`, `discount`, `advance_amount`, `payment_type`, `date`,  `created_by`,  `visibility`,`type`) VALUES (NULL, '" . implode(",", $_POST['txt_estimate_name']) . "', '" . $_POST['txt_discount'] . "', '" . $_POST['adv_amount'] . "', '" . $_POST['txt_payment_type'] . "', '" . $date . "',  '" . $_SESSION['roleId'] . "',  '1','0')";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function edit_advance_noncommmulti($date)

    {

        $query = "UPDATE `erp_advance_bill_noncomm` SET `fk_es_id` = '" . implode(",", $_POST['txt_estimate_name']) . "', `customer_id` = '" . $_POST['txt_customer_name'] . "', `advance_amount` = '" . $_POST['adv_amount'] . "', `payment_type` = '" . $_POST['txt_payment_type'] . "', `date` = '" . $date . "', `remarks` = '" . $_POST['txt_remarks'] . "' WHERE `pk_adv_noncom_id` = '" . $_POST['adv_id'] . "'";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function get_edit_advance_detailsmulti($id)

    {

        $query = "SELECT ad.customer_id,cus.cus_name,es.sono,ad.date,ad.advance_amount,ad.payment_type,ad.remarks,es.PK_ES_ID,ad.fk_es_id FROM erp_advance_bill_comm as ad LEFT JOIN erp_estimate_comm as es ON ad.fk_es_id = es.PK_ES_ID LEFT JOIN erp_customer_master as cus ON ad.customer_id=cus.pk_cus_id WHERE ad.pk_adv_com_id='" . $id . "' and ad.type=0";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }

    public function get_edit_advance_details_non_commmulti($id)

    {

        $query = "SELECT ad.customer_id,cus.cus_name,es.sono,ad.date,ad.advance_amount,ad.payment_type,ad.remarks,es.PK_ES_ID,ad.fk_es_id FROM erp_advance_bill_noncomm as ad LEFT JOIN erp_estimate_noncomm as es ON ad.fk_es_id = es.PK_ES_ID LEFT JOIN erp_customer_master as cus ON ad.customer_id=cus.pk_cus_id WHERE ad.pk_adv_noncom_id='" . $id . "' and ad.type=0";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }



    public function check_pending_amount_commmulti($sono, $adv)

    {

        /*     $query1 = "SELECT ad.advance_amount FROM erp_advance_bill_comm as ad LEFT JOIN erp_estimate_comm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID IN (" . $sono . ")";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);



        if ($rowcount == 0) {

            $query = "SELECT sum(grand_total) as grand_total FROM `erp_estimate_comm` WHERE PK_ES_ID IN (" . $sono . ")";



            $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



            while ($record = mysqli_fetch_assoc($result)) {



                if ($record['grand_total'] >= $adv) {

                    //$value = "Advance is greater than estimate amount";

                    $value = 'true';

                } else {

                    $value = 'Balance receivable is ' . $record['grand_total'];

                }

            }

        } else {

            $value = "Bill receipt amount or advance has been collected";

        }*/
        $sono = explode(',', $sono);
        $sonoval = "'" . implode("', '", $sono) . "'";

        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_bill_comm as ad LEFT JOIN erp_estimate_comm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID IN (" . $sonoval . ") ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;

        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;
            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total +=   $record1['grand_total'];

                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $checkBillCount = $type;
        } else {

            // $query2 = "SELECT SUM(grand_total) as grand_total FROM `erp_estimate_comm` WHERE PK_ES_ID = '" . $sonoval . "'";
            // $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            // $record2 = mysqli_fetch_assoc($result2);
            // $totVal = $record2['grand_total'];
            $query2 = "SELECT SUM(grand_total) as grand_total FROM `erp_estimate_comm` WHERE PK_ES_ID IN (" . $sonoval . ")";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
        }

        if ($checkBillCount == 0) {
            if ($totVal > 0) {
                if ($totVal >= $adv) {
                    $value = 'true';
                } else {
                    $value = 'Balance receivable is ' .  $totVal . '. The enter amount is higher. Please enter less than amount';
                }
            } else {

                $value = "Advance amount has been collected full amount. you can't edit the value";
            }
        } else {

            $value = "Bill receipt amount has been collected. you can't edit the value";
        }

        return $value;
    }

    public function check_pending_amount_Noncommmulti($sono, $adv)

    {
        $sono = explode(',', $sono);
        $sonoval = "'" . implode("', '", $sono) . "'";
        $query1 = "SELECT ad.advance_amount as advance_amount,es.grand_total,ad.type FROM erp_advance_bill_noncomm as ad LEFT JOIN erp_estimate_noncomm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID IN (" . $sonoval . ") ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;

        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;
            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];

                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }


            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT SUM(grand_total) as grand_total FROM `erp_estimate_noncomm` WHERE PK_ES_ID IN(" . $sonoval . ") ";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
        }

        if ($checkBillCount == 0) {
            if ($totVal > 0) {
                if ($totVal >= $adv) {
                    $value = 'true';
                } else {
                    $value = 'Balance receivable is ' .  $totVal . '. The enter amount is higher. Please enter less than amount';
                }
            } else {

                $value = "Advance amount has been collected full amount. you can't edit the value";
            }
        } else {

            $value = "Bill receipt amount has been collected. you can't edit the value";
        }


        return $value;
    }

    public function check_pending_amount_comm_by_esidmulti($esid, $adv)

    {

        $query1 = "SELECT ad.advance_amount FROM erp_advance_bill_comm as ad LEFT JOIN erp_estimate_comm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $esid . "' AND ad.type=1";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);

        if ($rowcount == 0) {

            $query = "SELECT grand_total FROM `erp_estimate_comm` WHERE PK_ES_ID = '" . $esid . "'";



            $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



            while ($record = mysqli_fetch_assoc($result)) {



                if ($record['grand_total'] >= $adv) {

                    //$value = "Advance is greater than estimate amount";

                    $value = 'true';
                } else {

                    $value = 'Balance receivable is ' . $record['grand_total'];
                }
            }
        } else {

            $value = "Bill receipt amount has been collected you can't edit the value";
        }



        return $value;
    }

    public function check_pending_amount_noncomm_by_esidmulti($esid, $adv)

    {

        $query1 = "SELECT ad.advance_amount FROM erp_advance_bill_noncomm as ad LEFT JOIN erp_estimate_noncomm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $esid . "' AND ad.type=1";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);

        if ($rowcount == 0) {

            $query = "SELECT grand_total FROM `erp_estimate_noncomm` WHERE PK_ES_ID = '" . $esid . "'";



            $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



            while ($record = mysqli_fetch_assoc($result)) {



                if ($record['grand_total'] >= $adv) {

                    //$value = "Advance is greater than estimate amount";

                    $value = 'true';
                } else {

                    $value = 'Balance receivable is ' . $record['grand_total'];
                }
            }
        } else {

            $value = "Bill receipt amount has been collected you can't edit the value";
        }

        return $value;
    }

    public function listAdvanceCommMulti()

    {

        //$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.PK_ES_ID = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM ".SALES_INVOICE." AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ".ORDER_PAYMENT." AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt  FROM ".ESTIMATE_COMM." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  ";

        $sqlQuery = "SELECT adv.pk_adv_com_id,GROUP_CONCAT( es.sono ORDER BY es.sono ASC SEPARATOR ', ') AS sonoall, cus.cus_name, cus.cus_code, adv.advance_amount,es.PK_ES_ID,DATE_FORMAT(adv.date, '%d-%m-%Y') as adv_date,adv.payment_type FROM erp_advance_bill_comm AS adv LEFT JOIN erp_estimate_comm as es ON FIND_IN_SET(es.PK_ES_ID, adv.fk_es_id) > 0  LEFT JOIN erp_customer_master AS cus ON adv.customer_id = cus.pk_cus_id ";

        if (!empty($_POST["search"]["value"])) {

            $jodate = strtotime($_POST["search"]["value"]);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (adv.visibility=1 AND adv.type=0) AND  (es.sono LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . $_POST["search"]["value"] . '%" )';
        } else {

            $sqlQuery .= 'where adv.visibility=1 AND adv.type=0';
        }

        if (!empty($_POST["order"])) {

            $sqlQuery .= ' GROUP BY adv.pk_adv_com_id ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' GROUP BY adv.pk_adv_com_id ORDER BY adv.pk_adv_com_id DESC ';
        }



        if ($_POST["length"] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_advance_bill_comm where visibility=1 and type =0 ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sonoall']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['adv_date'];

            $payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));

            $rows[] = $payment_type;

            $rows[] = $record['advance_amount'];

            $rows[] = '<a href="index.php?erp=106&id=' . $record["pk_adv_com_id"] . '&type=2" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

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

    public function listAdvanceNonCommMulti()

    {

        //$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.PK_ES_ID = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM ".SALES_INVOICE." AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ".ORDER_PAYMENT." AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt  FROM ".ESTIMATE_COMM." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  ";

        $sqlQuery = "SELECT adv.pk_adv_noncom_id,GROUP_CONCAT( es.sono ORDER BY es.sono ASC SEPARATOR ', ') AS sonoall, cus.cus_name, cus.cus_code, adv.advance_amount,es.PK_ES_ID,DATE_FORMAT(adv.date, '%d-%m-%Y') as adv_date,adv.payment_type FROM erp_advance_bill_noncomm AS adv LEFT JOIN erp_estimate_noncomm as es ON FIND_IN_SET(es.PK_ES_ID, adv.fk_es_id) > 0  LEFT JOIN erp_customer_master AS cus ON adv.customer_id = cus.pk_cus_id ";



        if (!empty($_POST["search"]["value"])) {

            $jodate = strtotime($_POST["search"]["value"]);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (adv.visibility=1 AND adv.type=0) AND  (es.sono LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . $_POST["search"]["value"] . '%" ';

            //$sqlQuery .= ' OR adv.date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . $_POST["search"]["value"] . '%" )';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';

        } else {

            $sqlQuery .= 'where adv.visibility=1 AND adv.type=0';
        }



        if (!empty($_POST["order"])) {

            $sqlQuery .= ' GROUP BY adv.pk_adv_noncom_id ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' GROUP BY adv.pk_adv_noncom_id ORDER BY adv.pk_adv_noncom_id DESC ';
        }



        if ($_POST["length"] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //echo $sqlQuery;

        //exit;

        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_advance_bill_noncomm where visibility=1 and type =0 ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);



        $displayRecords = mysqli_num_rows($stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {



            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sonoall']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['adv_date'];

            $payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));

            // $rows[] = $payment_type ;

            //  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';

            $rows[] = $payment_type;



            //    $receipt =    ($record['receipt'])? number_format($record['receipt'], 2) : 0;

            // $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';

            // $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';

            $rows[] = $record['advance_amount'];

            //$rows[] = '<a href="index.php?erp=86&id='.$record["pk_adv_noncom_id"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=85&id='.$record["pk_adv_noncom_id"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            $rows[] = '<a href="index.php?erp=106&id=' . $record["pk_adv_noncom_id"] . '&type=2" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

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

    /* Multiple Bill */

    public function add_bill_commmulti($date)

    {

        $query = "INSERT INTO `erp_advance_bill_comm` (`pk_adv_com_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`,`type`) VALUES (NULL, '" . implode(",", $_POST['txt_estimate_name']) . "', '" . $_POST['txt_customer_name'] . "', '" . $_POST['adv_amount'] . "', '" . $_POST['txt_payment_type'] . "', '" . $date . "', '" . $_POST['txt_remarks'] . "', '', '', '', '', '1','1')";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function edit_bill_commmulti($date)

    {



        $query = "UPDATE `erp_advance_bill_comm` SET `fk_es_id` = '" . implode(",", $_POST['txt_estimate_name']) . "', `customer_id` = '" . $_POST['txt_customer_name'] . "', `advance_amount` = '" . $_POST['adv_amount'] . "', `payment_type` = '" . $_POST['txt_payment_type'] . "', `date` = '" . $date . "', `remarks` = '" . $_POST['txt_remarks'] . "' WHERE `erp_advance_noncomm`.`pk_adv_com_id` = '" . $_POST['adv_id'] . "'";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function add_bill_noncommmulti($date)

    {

        $query = "INSERT INTO `erp_advance_bill_noncomm` (`pk_adv_noncom_id`, `fk_es_id`, `customer_id`, `advance_amount`, `payment_type`, `date`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `visibility`,`type`) VALUES (NULL, '" . implode(",", $_POST['txt_estimate_name']) . "', '" . $_POST['txt_customer_name'] . "', '" . $_POST['adv_amount'] . "', '" . $_POST['txt_payment_type'] . "', '" . $date . "', '" . $_POST['txt_remarks'] . "', '', '', '', '', '1','1')";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function edit_bill_noncommmulti($date)

    {

        $query = "UPDATE `erp_advance_bill_noncomm` SET `fk_es_id` = '" . implode(",", $_POST['txt_estimate_name']) . "', `customer_id` = '" . $_POST['txt_customer_name'] . "', `advance_amount` = '" . $_POST['adv_amount'] . "', `payment_type` = '" . $_POST['txt_payment_type'] . "', `date` = '" . $date . "', `remarks` = '" . $_POST['txt_remarks'] . "' WHERE `erp_advance_noncomm`.`pk_adv_noncom_id` = '" . $_POST['adv_id'] . "'";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if ($result) {

            return 1;
        } else {

            return 2;
        }
    }

    public function check_pending_amount_comm_billmulti($sono, $adv)

    {

        $query = "SELECT grand_total,sum(advance_amount) as paid FROM `erp_estimate_comm` LEFT JOIN erp_advance_comm ON erp_estimate_comm.PK_ES_ID=erp_advance_comm.fk_es_id WHERE sono ='" . $sono . "'";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



        while ($record = mysqli_fetch_assoc($result)) {

            $pending = $record['grand_total'] - $record['paid'];

            if ($pending >= $adv) {

                //$value = "Advance is greater than estimate amount";

                $value = 'true';
            } else {

                $value = 'Balance receivable is ' . $pending;
            }
        }

        return $value;
    }



    public function check_pending_amount_noncomm_billmulti($sono, $adv)

    {

        $query = "SELECT grand_total,sum(advance_amount) as paid FROM `erp_estimate_noncomm` LEFT JOIN erp_advance_noncomm ON erp_estimate_noncomm.PK_ES_ID=erp_advance_noncomm.fk_es_id WHERE sono ='" . $sono . "'";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



        while ($record = mysqli_fetch_assoc($result)) {

            $pending = $record['grand_total'] - $record['paid'];

            if ($pending >= $adv) {

                //$value = "Advance is greater than estimate amount";

                $value = 'true';
            } else {

                $value = 'Balance receivable is ' . $pending;
            }
        }

        return $value;
    }

    public function check_pending_amount_comm_bill_by_esidmulti($sono, $adv)

    {

        $query = "SELECT grand_total,sum(advance_amount) as paid FROM `erp_estimate_comm` LEFT JOIN erp_advance_bill_comm ON erp_estimate_comm.PK_ES_ID=erp_advance_bill_comm.fk_es_id WHERE PK_ES_ID ='" . $sono . "' and type=0";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



        while ($record = mysqli_fetch_assoc($result)) {

            $pending = $record['grand_total'] - $record['paid'];

            if ($pending >= $adv) {

                //$value = "Advance is greater than estimate amount";

                $value = 'true';
            } else {

                $value = 'Balance receivable is ' . $pending;
            }
        }

        return $value;
    }

    public function check_pending_amount_noncomm_bill_by_esidmulti($sono, $adv)

    {

        $query = "SELECT grand_total,sum(advance_amount) as paid FROM `erp_estimate_noncomm` LEFT JOIN erp_advance_bill_noncomm ON erp_estimate_noncomm.PK_ES_ID=erp_advance_bill_comm.fk_es_id WHERE PK_ES_ID ='" . $sono . "' and type=0";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



        while ($record = mysqli_fetch_assoc($result)) {

            $pending = $record['grand_total'] - $record['paid'];

            if ($pending >= $adv) {

                //$value = "Advance is greater than estimate amount";

                $value = 'true';
            } else {

                $value = 'Balance receivable is ' . $pending;
            }
        }

        return $value;
    }



    public function get_edit_bill_detailsmulti($id)

    {

        $query = "SELECT ad.customer_id,cus.cus_name,es.sono,ad.date,ad.advance_amount,ad.payment_type,ad.remarks,es.PK_ES_ID,ad.fk_es_id FROM erp_advance_bill_comm as ad LEFT JOIN erp_estimate_comm as es ON ad.fk_es_id = es.PK_ES_ID LEFT JOIN erp_customer_master as cus ON ad.customer_id=cus.pk_cus_id WHERE ad.pk_adv_com_id='" . $id . "' and ad.type=1";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }

    public function get_edit_bill_details_non_commmulti($id)

    {

        $query = "SELECT ad.customer_id,cus.cus_name,es.sono,ad.date,ad.advance_amount,ad.payment_type,ad.remarks,es.PK_ES_ID,ad.fk_es_id FROM erp_advance_bill_noncomm as ad LEFT JOIN erp_estimate_noncomm as es ON ad.fk_es_id = es.PK_ES_ID LEFT JOIN erp_customer_master as cus ON ad.customer_id=cus.pk_cus_id WHERE ad.pk_adv_noncom_id='" . $id . "' and ad.type=1";



        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }

    public function listBillCommMulti()

    {

        //$sqlQuery = "SELECT so.sono, cus.cus_name, so.grand_total,so.status,so.item_total,so.PK_ES_ID,DATE_FORMAT(so.sale_date, '%d-%m-%Y') as jo_date,(SELECT MAX(osi.status) FROM invoice_erp.erp_order_status AS osi WHERE so.PK_ES_ID = osi.fk_so_id) as osstatus,so.discount_final4, so.discount_final_amt4,  so.discount_final_amt5,so.payment_type,IF(so.payment_type = 1,(SELECT si.discount_final_amt5 as receipt FROM ".SALES_INVOICE." AS si WHERE si.fk_so_id =so.PK_ES_ID) ,(SELECT sum(op.paid_amount) as receipt FROM ".ORDER_PAYMENT." AS op WHERE op.fk_order_no =so.PK_ES_ID)) as receipt  FROM ".ESTIMATE_COMM." AS so LEFT JOIN ".CUSTOMER." AS cus ON so.customer_id = cus.pk_cus_id  ";

        $sqlQuery = "SELECT adv.pk_adv_com_id,es.sono, cus.cus_name,cus.cus_code, adv.advance_amount,es.PK_ES_ID,DATE_FORMAT(adv.date, '%d-%m-%Y') as adv_date,adv.payment_type FROM erp_advance_bill_comm AS adv LEFT JOIN erp_estimate_comm as es ON adv.fk_es_id=es.PK_ES_ID LEFT JOIN erp_customer_master AS cus ON adv.customer_id = cus.pk_cus_id ";



        if (!empty($_POST["search"]["value"])) {

            $jodate = strtotime($_POST["search"]["value"]);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (adv.visibility=1 ) AND  (es.sono LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . $_POST["search"]["value"] . '%" ';

            //$sqlQuery .= ' OR adv.date LIKE "%' . $jodateVals . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . $_POST["search"]["value"] . '%" )';

            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';

        } else {

            $sqlQuery .= 'where adv.visibility=1 and type=1';
        }



        if (!empty($_POST["order"])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY adv.pk_adv_com_id DESC ';
        }



        if ($_POST["length"] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        //var_dump($sqlQuery);

        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_advance_bill_comm where visibility=1 and type =1 ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);



        $displayRecords = mysqli_num_rows($stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {



            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['adv_date'];

            $payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));

            // $rows[] = $payment_type ;

            //  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';

            $rows[] = $payment_type;



            //    $receipt =    ($record['receipt'])? number_format($record['receipt'], 2) : 0;

            // $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';

            // $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';

            $rows[] = $record['advance_amount'];

            //$rows[] = '<a href="index.php?erp=86&id='.$record["pk_adv_noncom_id"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=85&id='.$record["pk_adv_noncom_id"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            $rows[] = '<a href="index.php?erp=111&id=' . $record["pk_adv_com_id"] . '&type=2" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

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

    public function listBillNonCommMulti()

    {



        $sqlQuery = "SELECT adv.pk_adv_noncom_id,es.sono, cus.cus_name,cus.cus_code, adv.advance_amount,es.PK_ES_ID,DATE_FORMAT(adv.date, '%d-%m-%Y') as adv_date,adv.payment_type FROM erp_advance_bill_noncomm AS adv LEFT JOIN erp_estimate_noncomm as es ON FIND_IN_SET(es.PK_ES_ID, adv.fk_es_id) > 0  LEFT JOIN erp_customer_master AS cus ON adv.customer_id = cus.pk_cus_id ";



        if (!empty($_POST["search"]["value"])) {

            $jodate = strtotime($_POST["search"]["value"]);

            $jodateVals = date('Y-m-d', $jodate);

            $sqlQuery .= 'where (adv.visibility=1 ) AND  (es.sono LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR cus.cus_code LIKE "%' . $_POST["search"]["value"] . '%" ';

            $sqlQuery .= ' OR adv.advance_amount LIKE "%' . $_POST["search"]["value"] . '%" )';
        } else {

            $sqlQuery .= 'where adv.visibility=1 and type=1';
        }



        if (!empty($_POST["order"])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY adv.pk_adv_noncom_id DESC ';
        }



        if ($_POST["length"] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }



        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_advance_bill_noncomm where visibility=1 and type =1 ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);



        $displayRecords = mysqli_num_rows($stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {



            $rows = array();

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = $record['cus_name'];

            $rows[] = $record['cus_code'];

            $rows[] = $record['adv_date'];

            $payment_type = ($record['payment_type'] == 1) ? "Cash" : (($record['payment_type'] == 2) ? "Credit Card" : (($record['payment_type'] == 3) ? "UPI" : (($record['payment_type'] == 4) ? "Bank Transfer" : (($record['payment_type'] == 5) ? "Cheque" : ''))));

            // $rows[] = $payment_type ;

            //  $rows[] = '<p class="alignrightAmount">'.$record['discount_final4'].'</p>';

            $rows[] = $payment_type;



            //    $receipt =    ($record['receipt'])? number_format($record['receipt'], 2) : 0;

            // $rows[] = '<p class="alignrightAmount" >'.$receipt.'</p>';

            // $rows[] = '<p class="alignrightAmount '.$colorGTadvance.'">'.$pending.'</p>';

            $rows[] = $record['advance_amount'];

            //$rows[] = '<a href="index.php?erp=86&id='.$record["pk_adv_noncom_id"].'" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=85&id='.$record["pk_adv_noncom_id"].'" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

            $rows[] = '<a href="index.php?erp=111&id=' . $record["pk_adv_noncom_id"] . '&type=2" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';

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



    public function check_advamount_comm($sono)

    {

        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_comm as ad LEFT JOIN erp_estimate_comm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $sono . "' ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;
        $grand_totalVal = 0;
        $advance_amountVal = 0;
        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;

            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];
                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $advance_amountVal =  $advance_amount;
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $grand_totalVal =  floatVal($grand_total);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_comm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
            $grand_totalVal = $record2['grand_total'];
        }
        if ($checkBillCount == 0) {
            if ($advance_amountVal > 0) {
                if ($grand_totalVal >= $advance_amountVal) {
                    $value['advcount'] = $advance_amountVal;
                    $value['grand_total'] = $grand_totalVal;
                } else {

                    $value['advcount'] = $advance_amountVal;

                    $value['grand_total'] = $grand_totalVal;
                }
            } else {

                $value['advcount'] = 0;

                $value['grand_total'] = $grand_totalVal;
            }
        } else {

            $value['advcount'] = 0;
            $value['grand_total'] = $grand_totalVal;
        }






        return $value;
    }



    public function check_advamount_noncomm($sono)

    {

        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_noncomm as ad LEFT JOIN erp_estimate_noncomm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $sono . "' ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;
        $grand_totalVal = 0;
        $advance_amountVal = 0;
        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;

            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];
                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $advance_amountVal =  $advance_amount;
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $grand_totalVal =  floatVal($grand_total);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_noncomm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
            $grand_totalVal = $record2['grand_total'];
        }

        if ($checkBillCount == 0) {
            if ($advance_amountVal > 0) {
                if ($grand_totalVal >= $advance_amountVal) {
                    $value['advcount'] = $advance_amountVal;
                    $value['grand_total'] = $grand_totalVal;
                } else {

                    $value['advcount'] = $advance_amountVal;

                    $value['grand_total'] = $grand_totalVal;
                }
            } else {

                $value['advcount'] = 0;

                $value['grand_total'] = $grand_totalVal;
            }
        } else {

            $value['advcount'] = 0;
            $value['grand_total'] = $grand_totalVal;
        }







        return $value;
    }



    public function check_billamount_comm($sono)

    {
        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_comm as ad LEFT JOIN erp_estimate_comm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $sono . "'  ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;
        $grand_totalVal = 0;
        $advance_amountVal = 0;
        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;

            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];
                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $advance_amountVal =  $advance_amount;
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $grand_totalVal =  floatVal($grand_total);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_comm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
            $grand_totalVal = $record2['grand_total'];
        }
        if ($checkBillCount == 0) {

            if ($advance_amountVal > 0) {
                if ($grand_totalVal >= $advance_amountVal) {
                    $value['advcount'] = $advance_amountVal;
                    $value['grand_total'] = $grand_totalVal;
                } else {

                    $value['advcount'] = $advance_amountVal;

                    $value['grand_total'] = $grand_totalVal;
                }
            } else {

                $value['advcount'] = 0;

                $value['grand_total'] = $grand_totalVal;
            }
        } else {

            $value['advcount'] = 0;
            $value['grand_total'] = $grand_totalVal;
        }




        return $value;
    }



    public function check_billamount_noncomm($sono)

    {
        $query1 = "SELECT ad.advance_amount,es.grand_total,ad.type FROM erp_advance_noncomm as ad LEFT JOIN erp_estimate_noncomm es ON ad.fk_es_id=es.PK_ES_ID WHERE es.PK_ES_ID ='" . $sono . "'  ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);
        $totVal = floatVal(0);
        $checkBillCount = 0;
        $grand_totalVal = 0;
        $advance_amountVal = 0;
        if ($rowcount > 0) {

            $advance_amount = 0;
            $grand_total = 0;

            $type = 0;
            while ($record1 = mysqli_fetch_assoc($result1)) {
                $advance_amount +=  $record1['advance_amount'];
                $grand_total =  $record1['grand_total'];
                if ($record1['type'] == 1) {
                    $type =  count($record1['type']);
                }
            }
            $advance_amountVal =  $advance_amount;
            $totVal =  floatVal($grand_total) - floatVal($advance_amount);
            $grand_totalVal =  floatVal($grand_total);
            $checkBillCount = $type;
        } else {
            $query2 = "SELECT grand_total FROM `erp_estimate_noncomm` WHERE PK_ES_ID = '" . $sono . "'";
            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            $record2 = mysqli_fetch_assoc($result2);
            $totVal = $record2['grand_total'];
            $grand_totalVal = $record2['grand_total'];
        }
        if ($checkBillCount == 0) {
            if ($advance_amountVal > 0) {
                if ($grand_totalVal >= $advance_amountVal) {
                    $value['advcount'] = $advance_amountVal;
                    $value['grand_total'] = $grand_totalVal;
                } else {

                    $value['advcount'] = $advance_amountVal;

                    $value['grand_total'] = $grand_totalVal;
                }
            } else {

                $value['advcount'] = 0;

                $value['grand_total'] = $grand_totalVal;
            }
        } else {

            $value['advcount'] = 0;
            $value['grand_total'] = $grand_totalVal;
        }




        return $value;
    }



    /* Update Paid Status */

    /*Comm */

    public function changecommPaidorder($soid, $status)

    {

        $query1 = "UPDATE  " . ESTIMATE_COMM . " SET  order_status= " . $status . "  where PK_ES_ID  IN(" . implode(",", $soid) . ")";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        if ($result1) {

            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {

            return 0;
        }
    }

    public function changecommPaidorderstatus($soid, $status, $sdate)

    {

        $query = "SELECT * FROM " . ORDER_STATUS . "  WHERE fk_so_id IN(" . implode(",", $soid) . ") AND close_status =1; ";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        $cunt = mysqli_num_rows($result);

        if ($cunt == 0) {

            for ($i = 0; $i < count($soid); $i++) {



                $query1 = "INSERT INTO  " . ORDER_STATUS . "  SET fk_so_id =" . $soid[$i] . " ,date='" . $sdate . "',status=" . $status . ",types=1 , statuschangeby='" . $_SESSION['user_name'] . "', close_status =1,visibility =1 ";

                $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
            }

            if ($result1) {

                return 1;
            } else {

                return 0;
            }
        } else {

            return 0;
        }
    }

    /*Non Comm */

    public function changenoncommPaidorder($soid, $status)

    {



        $query1 = "UPDATE  " . ESTIMATE_NONCOMM . " SET  order_status= " . $status . " where PK_ES_ID IN(" . implode(",", $soid) . ")";



        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        if ($result1) {

            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {

            return 0;
        }
    }

    public function changenoncommPaidorderstatus($soid, $status, $sdate)

    {

        $query = "SELECT * FROM " . ORDER_STATUS . "  WHERE fk_so_id IN(" . implode(",", $soid) . ") AND close_status =1; ";

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        $cunt = mysqli_num_rows($result);

        if ($cunt == 0) {

            for ($i = 0; $i < count($soid); $i++) {



                $query1 = "INSERT INTO  " . ORDER_STATUS . "  SET fk_so_id = " . $soid[$i] . " ,date='" . $sdate . "',status=" . $status . ",types=2 ,close_status =1, statuschangeby='" . $_SESSION['user_name'] . "', visibility =1 ";

                $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

                //	mysqli_insert_id($GLOBALS["___mysqli_ston"])

            }

            if ($result1) {

                return 1;
            } else {

                return 0;
            }
        } else {

            return 0;
        }
    }









    // function listCommBulkReport()

    // {







    //     $sqlQuery = "SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,f.cat_name  FROM erp_estimate_comm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN " . CITIES . " c ON c.pk_city_id = cm.cus_city LEFT JOIN " . STATES . " s ON s.state_code= cm.cus_state LEFT JOIN " . CATEGORY . " f ON f.pk_cat_id= est.franchise ";



    //     $cusid = ($_POST["txt_customer_name"]) ? 'AND  est.customer_id = ' . $_POST["txt_customer_name"] . '' : "";

    //     $franid = ($_POST["txt_franchise_name"]) ? 'AND  est.franchise = ' . $_POST["txt_franchise_name"] . '' : "";


    //     $fromDate = str_replace('/', '-', $_POST['fromDate']);
    //     $fromDateval = date('Y-m-d', strtotime($fromDate));
    //     $toDate = str_replace('/', '-', $_POST['toDate']);
    //     $toDateval = date('Y-m-d', strtotime($toDate));

    //     if (!empty($_POST["search"]["value"])) {

    //         $searchdate = date('Y-m-d', strtotime(trim($_POST["search"]["value"])));







    //         $sqlQuery .= ' where (est.visibility=1 AND est.bill_paid = 0  ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

    //         $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

    //         $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

    //         $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

    //         $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

    //         $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

    //         $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%" )';
    //     } else {

    //         $sqlQuery .= 'where est.visibility=1  AND est.bill_paid = 0 ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
    //     }

    //     if (!empty($_POST["order"])) {

    //         $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
    //     } else {

    //         $sqlQuery .= ' ORDER BY est.sale_date ASC ';
    //     }

    //     $display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



    //     if ($_POST["length"] != -1) {

    //         $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    //     }

    //     //echo  $sqlQuery;



    //     $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



    //     $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_estimate_comm where visibility=1  AND bill_paid = 0 ");

    //     $allResult = mysqli_fetch_assoc($stmtTotal);

    //     $allRecords = mysqli_num_rows($stmtTotal);







    //     $displayRecords = mysqli_num_rows($display_stmt);





    //     $records = array();

    //     $i = 1;

    //     while ($record = mysqli_fetch_assoc($stmt)) {

    //         $osstatus = '';

    //         if ($record['order_status']  == 1) {

    //             $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
    //         } else if ($record['order_status']  == 2) {

    //             $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
    //         } else if ($record['order_status']  == 3) {

    //             $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
    //         } else if ($record['order_status']  == 4) {

    //             $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
    //         } else if ($record['order_status']  == 5) {

    //             $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
    //         } else if ($record['order_status']  == 6) {

    //             $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
    //         } else if ($record['order_status']  == 0) {

    //             $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
    //         }

    //         $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

    //         $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

    //         $outstanding = $record['grand_total'] - ($receipts + $advance);

    //         if ($outstanding <= 0) {
    //             continue;   // Skip this row
    //         }
    //         $rows = array();

    //         $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name ,sqp.orientation FROM " . ESTIMATE_COMM_PRO . " sqp LEFT JOIN " . ITEMS . " its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN " . TYPES . " ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = " . $record['PK_ES_ID'] . "";



    //         $resultprod = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQueryproduct);

    //         $allResultproduct = mysqli_fetch_assoc($resultprod);

    //         $allcountprod = mysqli_num_rows($resultprod);

    //         $itemnamesdata = "";

    //         $itemorient = "";

    //         if ($allcountprod  > 0) {

    //             $itemnamesdata = $allResultproduct['itemnames'];

    //             $itemorient = "";

    //             if ($allResultproduct['orientation'] == 1) {
    //                 $itemorient = 'Length';
    //             } else if ($allResultproduct['orientation'] == 2) {
    //                 $itemorient = 'Breadth';
    //             }
    //         }

    //         $rows[] = $record['PK_ES_ID'];

    //         $rows[] = $_POST['start'] + $i;

    //         $rows[] = ucfirst($record['sono']);

    //         $rows[] = date("d-m-Y", strtotime($record['sale_date']));

    //         $rows[] = $record['cusname'];

    //         $rows[] = $record['cat_name'];

    //         //$rows[] = $itemnamesdata;

    //         $rows[] = $record['grand_total'];

    //         $rows[] =  $advance;

    //         $rows[] = $receipts;

    //         // $rows[] =  $record['grand_total'] - ($receipts + $advance);
    //         $rows[] =  $outstanding;

    //         $rows[] = $osstatus;

    //         $records[] = $rows;

    //         $i++;
    //     }



    //     $output = array(



    //         "draw" => intval($_POST["draw"]),

    //         "recordsTotal" => $allRecords,

    //         "recordsFiltered" => $displayRecords,

    //         "data" => $records,



    //         /*

    //         "draw" => intval($_POST["draw"]),

    //         "iTotalRecords" => $displayRecords,

    //         "iTotalDisplayRecords" => $allRecords,

    //         "data" => $records,*/

    //     );



    //     echo json_encode($output);
    // }



    function listCommBulkReport()

    {







        // $sqlQuery = "SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,f.cat_name  FROM erp_estimate_comm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN " . CITIES . " c ON c.pk_city_id = cm.cus_city LEFT JOIN " . STATES . " s ON s.state_code= cm.cus_state LEFT JOIN " . CATEGORY . " f ON f.pk_cat_id= est.franchise ";




        $cusid = ($_POST["txt_customer_name"]) ? 'AND  est.customer_id = ' . $_POST["txt_customer_name"] . '' : "";

        $franid = ($_POST["txt_franchise_name"]) ? 'AND  est.franchise = ' . $_POST["txt_franchise_name"] . '' : "";


        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        $sqlQuery = "SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,f.cat_name  FROM erp_estimate_comm as est 
        LEFT JOIN erp_estimate_comm_cancel canc 
    ON canc.PK_ES_ID = est.PK_ES_ID 
        LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id 
        LEFT JOIN " . CITIES . " c ON c.pk_city_id = cm.cus_city 
        LEFT JOIN " . STATES . " s ON s.state_code= cm.cus_state 
        LEFT JOIN " . CATEGORY . " f ON f.pk_cat_id= est.franchise 
        WHERE canc.PK_ES_ID IS NULL

AND est.visibility = 1 
AND est.bill_paid = 0 
$cusid $franid
AND DATE_FORMAT(est.sale_date, '%Y-%m-%d') 
BETWEEN '$fromDateval' AND '$toDateval'";

        // if (!empty($_POST["search"]["value"])) {

        //     $searchdate = date('Y-m-d', strtotime(trim($_POST["search"]["value"])));







        //     $sqlQuery .= ' where (est.visibility=1 AND est.bill_paid = 0  ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';

        //     $sqlQuery .= ' AND ( est.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

        //     $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

        //     $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

        //     $sqlQuery .= ' OR f.cat_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

        //     $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

        //     $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%" )';
        // } else {

        //     $sqlQuery .= 'where est.visibility=1  AND est.bill_paid = 0 ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        // }
        if (!empty($_POST["search"]["value"])) {

            $search = trim($_POST["search"]["value"]);
            $searchdate = date('Y-m-d', strtotime($search));

            $sqlQuery .= " AND (
        est.sono LIKE '%$search%' 
        OR est.sale_date LIKE '%$searchdate%' 
        OR cm.cus_name LIKE '%$search%' 
        OR cm.cus_code LIKE '%$search%' 
        OR est.grand_total LIKE '%$search%'
    )";
        }

        if (!empty($_POST["order"])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        // if ($_POST["length"] != -1) {

        //     $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        // }

        if (!isset($_POST['export'])) {
            if ($_POST["length"] != -1) {
                $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
            }
        }
        //echo  $sqlQuery;



        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_estimate_comm where visibility=1  AND bill_paid = 0 ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);







        $displayRecords = mysqli_num_rows($display_stmt);





        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $osstatus = '';

            if ($record['order_status']  == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status']  == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status']  == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status']  == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status']  == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status']  == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status']  == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }

            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_comm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_comm');

            $outstanding = $record['grand_total'] - ($receipts + $advance);

            if ($outstanding <= 0) {
                continue;   // Skip this row
            }
            $rows = array();

            $sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name ,sqp.orientation FROM " . ESTIMATE_COMM_PRO . " sqp LEFT JOIN " . ITEMS . " its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN " . TYPES . " ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = " . $record['PK_ES_ID'] . "";



            $resultprod = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata = "";

            $itemorient = "";

            if ($allcountprod  > 0) {

                $itemnamesdata = $allResultproduct['itemnames'];

                $itemorient = "";

                if ($allResultproduct['orientation'] == 1) {
                    $itemorient = 'Length';
                } else if ($allResultproduct['orientation'] == 2) {
                    $itemorient = 'Breadth';
                }
            }

            $rows[] = $record['PK_ES_ID'];

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = date("d-m-Y", strtotime($record['sale_date']));

            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            //$rows[] = $itemnamesdata;

            $rows[] = $record['grand_total'];

            $rows[] =  $advance;

            $rows[] = $receipts;

            // $rows[] =  $record['grand_total'] - ($receipts + $advance);
            $rows[] =  $outstanding;

            $rows[] = $osstatus;

            $records[] = $rows;

            $i++;
        }



        $output = array(



            "draw" => intval($_POST["draw"]),

            "recordsTotal" => $allRecords,

            "recordsFiltered" => $displayRecords,

            "data" => $records,



            /*

            "draw" => intval($_POST["draw"]),

            "iTotalRecords" => $displayRecords,

            "iTotalDisplayRecords" => $allRecords,

            "data" => $records,*/

        );



        echo json_encode($output);
    }




    // function listNonCommBulkReport()

    // {



    //     $sqlQuery = "SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status,cm.pk_cus_id ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,f.cat_name  FROM erp_estimate_noncomm as est LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id LEFT JOIN " . CITIES . " c ON c.pk_city_id = cm.cus_city LEFT JOIN " . STATES . " s ON s.state_code= cm.cus_state LEFT JOIN " . CATEGORY . " f ON f.pk_cat_id= est.franchise ";



    //     //$fromDateval = date('Y-m-d', strtotime($_POST['fromDate']));

    //     //	$toDateval = date('Y-m-d', strtotime($_POST['toDate']));

    //     $cusid = ($_POST["txt_customer_name"]) ? 'AND  est.customer_id = ' . $_POST["txt_customer_name"] . '' : "";

    //     $franid = ($_POST["txt_franchise_name"]) ? 'AND  est.franchise = ' . $_POST["txt_franchise_name"] . '' : "";




    //     $fromDate = str_replace('/', '-', $_POST['fromDate']);
    //     $fromDateval = date('Y-m-d', strtotime($fromDate));
    //     $toDate = str_replace('/', '-', $_POST['toDate']);
    //     $toDateval = date('Y-m-d', strtotime($toDate));

    //     if (!empty($_POST["search"]["value"])) {

    //         $searchdate = date('Y-m-d', strtotime(trim($_POST["search"]["value"])));

    //         $sqlQuery .= ' where (est.visibility=1  AND est.bill_paid = 0 ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';



    //         /*

    //     if (!empty($_POST["search"]["value"])) {



    //         $searchdate = date('Y-m-d', strtotime(trim($_POST["search"]["value"])));



    //         $sqlQuery .= ' where (est.visibility=1  '.$cusid.')';*/

    //         $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

    //         $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

    //         $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

    //         $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

    //         $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%") ';
    //     } else {

    //         //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

    //         $sqlQuery .= 'where est.visibility=1  AND est.bill_paid = 0 ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
    //     }

    //     if (!empty($_POST["order"])) {

    //         $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
    //     } else {

    //         $sqlQuery .= ' ORDER BY est.sale_date ASC ';
    //     }

    //     $display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



    //     if ($_POST["length"] != -1) {

    //         $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    //     }

    //     // var_dump( $sqlQuery);

    //     //    exit;

    //     //echo  $sqlQuery;

    //     $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



    //     $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_estimate_noncomm where visibility=1 AND bill_paid = 0 ");

    //     $allResult = mysqli_fetch_assoc($stmtTotal);

    //     $allRecords = mysqli_num_rows($stmtTotal);



    //     $displayRecords = mysqli_num_rows($display_stmt);

    //     $records = array();

    //     $i = 1;

    //     while ($record = mysqli_fetch_assoc($stmt)) {

    //         $osstatus = '';





    //         if ($record['order_status']  == 1) {

    //             $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
    //         } else if ($record['order_status']  == 2) {

    //             $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
    //         } else if ($record['order_status']  == 3) {

    //             $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
    //         } else if ($record['order_status']  == 4) {

    //             $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
    //         } else if ($record['order_status']  == 5) {

    //             $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
    //         } else if ($record['order_status']  == 6) {

    //             $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
    //         } else if ($record['order_status']  == 0) {

    //             $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
    //         }





    //         $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');

    //         $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_noncomm');
    //         $outstanding = $record['grand_total'] - ($receipts + $advance);

    //         if ($outstanding <= 0) {
    //             continue;   // Skip this row
    //         }

    //         $rows = array();



    //         /*$sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM ".ESTIMATE_NONCOMM_PRO." sqp LEFT JOIN ".ITEMS." its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ".TYPES." ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ".$record['PK_ES_ID']."";



    //         $resultprod = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQueryproduct);

    //         $allResultproduct = mysqli_fetch_assoc($resultprod);

    //         $allcountprod = mysqli_num_rows($resultprod);

    //         $itemnamesdata ="";

    //         $itemorient ="";



    //         if( $allcountprod  > 0)

    //         {

    //            $itemnamesdata = $allResultproduct['itemnames'];

    //            $itemorient ="";

    //            if($allResultproduct['orientation'] == 1) { $itemorient ='Length'; }else if($allResultproduct['orientation'] ==2 ) { $itemorient ='Breadth'; }



    //         }*/

    //         $rows[] = $record['PK_ES_ID'];

    //         $rows[] = $_POST['start'] + $i;

    //         $rows[] = ucfirst($record['sono']);

    //         $rows[] = date("d-m-Y", strtotime($record['sale_date']));



    //         $rows[] = $record['cusname'];

    //         $rows[] = $record['cat_name'];

    //         //$rows[] = $itemnamesdata;

    //         $rows[] = $record['grand_total'];

    //         $rows[] =  $advance;

    //         $rows[] = $receipts;

    //         // $rows[] =  $record['grand_total'] - ($receipts + $advance);
    //         $rows[] =  $outstanding;

    //         $rows[] = $osstatus;

    //         $records[] = $rows;

    //         $i++;
    //     }



    //     $output = array(

    //         "draw" => intval($_POST["draw"]),

    //         "recordsTotal" => $allRecords,

    //         "recordsFiltered" => $displayRecords,

    //         "data" => $records,

    //     );



    //     echo json_encode($output);
    // }


    function listNonCommBulkReport()

    {



        // $sqlQuery = "SELECT est.PK_ES_ID,est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname,cm.cus_code as cuscode,est.customer_id,est.order_status,cm.pk_cus_id ,c.city,s.state_name,cm.cus_address, cm.cus_address_2, cm.cus_address_3,  cm.cus_std_code,est.franchise,f.cat_name  FROM erp_estimate_noncomm as est 
        // LEFT JOIN erp_estimate_noncomm_cancel as canc ON est.PK_ES_ID=canc.PK_ES_ID
        // LEFT JOIN erp_customer_master as cm ON est.customer_id=cm.pk_cus_id 
        // LEFT JOIN " . CITIES . " c ON c.pk_city_id = cm.cus_city LEFT JOIN " . STATES . " s ON s.state_code= cm.cus_state LEFT JOIN " . CATEGORY . " f ON f.pk_cat_id= est.franchise ";



        //$fromDateval = date('Y-m-d', strtotime($_POST['fromDate']));

        //	$toDateval = date('Y-m-d', strtotime($_POST['toDate']));

        $cusid = ($_POST["txt_customer_name"]) ? 'AND  est.customer_id = ' . $_POST["txt_customer_name"] . '' : "";

        $franid = ($_POST["txt_franchise_name"]) ? 'AND  est.franchise = ' . $_POST["txt_franchise_name"] . '' : "";




        $fromDate = str_replace('/', '-', $_POST['fromDate']);
        $fromDateval = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $_POST['toDate']);
        $toDateval = date('Y-m-d', strtotime($toDate));

        $sqlQuery = "SELECT est.PK_ES_ID, est.sono, est.sale_date, est.grand_total, 
cm.cus_name as cusname, cm.cus_code as cuscode, est.customer_id, 
est.order_status, cm.pk_cus_id, c.city, s.state_name, 
cm.cus_address, cm.cus_address_2, cm.cus_address_3, cm.cus_std_code, 
est.franchise, f.cat_name ,

IFNULL((SELECT SUM(advance_amount) FROM erp_advance_noncomm 
        WHERE fk_es_id = est.PK_ES_ID AND type = 0),0) AS advance,

IFNULL((SELECT SUM(advance_amount) FROM erp_advance_noncomm 
        WHERE fk_es_id = est.PK_ES_ID AND type = 1),0) AS receipts

FROM erp_estimate_noncomm as est 

LEFT JOIN erp_estimate_noncomm_cancel canc 
    ON canc.PK_ES_ID = est.PK_ES_ID 

LEFT JOIN erp_customer_master as cm ON est.customer_id = cm.pk_cus_id 
LEFT JOIN " . CITIES . " c ON c.pk_city_id = cm.cus_city 
LEFT JOIN " . STATES . " s ON s.state_code = cm.cus_state 
LEFT JOIN " . CATEGORY . " f ON f.pk_cat_id = est.franchise 

WHERE canc.PK_ES_ID IS NULL 

AND est.visibility = 1 
AND est.bill_paid = 0 
$cusid $franid
AND DATE_FORMAT(est.sale_date, '%Y-%m-%d') 
BETWEEN '$fromDateval' AND '$toDateval'
";

        // if (!empty($_POST["search"]["value"])) {

        //     $searchdate = date('Y-m-d', strtotime(trim($_POST["search"]["value"])));

        //     $sqlQuery .= ' where (canc.PK_ES_ID IS NULL AND est.visibility=1  AND est.bill_paid = 0 ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '")';



        //     /*

        // if (!empty($_POST["search"]["value"])) {



        //     $searchdate = date('Y-m-d', strtotime(trim($_POST["search"]["value"])));



        //     $sqlQuery .= ' where (est.visibility=1  '.$cusid.')';*/

        //     $sqlQuery .= 'AND ( est.sono LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

        //     $sqlQuery .= ' OR est.sale_date LIKE "%' . $searchdate . '%" ';

        //     $sqlQuery .= ' OR cm.cus_name LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

        //     $sqlQuery .= ' OR cm.cus_code LIKE "%' . trim($_POST["search"]["value"]) . '%" ';

        //     $sqlQuery .= ' OR est.grand_total LIKE "%' . trim($_POST["search"]["value"]) . '%") ';
        // } 
        if (!empty($_POST["search"]["value"])) {

            $search = trim($_POST["search"]["value"]);
            $searchdate = date('Y-m-d', strtotime($search));

            $sqlQuery .= " AND (
        est.sono LIKE '%$search%' 
        OR est.sale_date LIKE '%$searchdate%' 
        OR cm.cus_name LIKE '%$search%' 
        OR cm.cus_code LIKE '%$search%' 
        OR est.grand_total LIKE '%$search%'
    )";
        }
        // else {

        //     //$sqlQuery .= 'where est.visibility=1 '.$cusid.'';

        //     $sqlQuery .= 'where est.visibility=1  AND est.bill_paid = 0 ' . $cusid . ' ' . $franid . ' AND  DATE_FORMAT(est.sale_date, "%Y-%m-%d") BETWEEN "' . $fromDateval . '" AND "' . $toDateval . '"';
        // }

        if (!empty($_POST["order"])) {

            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $sqlQuery .= ' ORDER BY est.sale_date ASC ';
        }

        $display_stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        if ($_POST["length"] != -1) {

            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        // var_dump( $sqlQuery);

        //    exit;

        //echo  $sqlQuery;

        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);



        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  erp_estimate_noncomm where visibility=1 AND bill_paid = 0 ");

        $allResult = mysqli_fetch_assoc($stmtTotal);

        $allRecords = mysqli_num_rows($stmtTotal);



        $displayRecords = mysqli_num_rows($display_stmt);

        $records = array();

        $i = 1;

        while ($record = mysqli_fetch_assoc($stmt)) {

            $osstatus = '';





            if ($record['order_status']  == 1) {

                $osstatus = '<span class="custom_btn_class text-primary" >Designer Head Split Order</span>';
            } else if ($record['order_status']  == 2) {

                $osstatus = '<span class="custom_btn_class text-secondary" >Send for Printing</span>';
            } else if ($record['order_status']  == 3) {

                $osstatus = '<span class="custom_btn_class text-warning" >Send for Lamination</span>';
            } else if ($record['order_status']  == 4) {

                $osstatus = '<span class="custom_btn_class text-danger" >Finishing of Order</span>';
            } else if ($record['order_status']  == 5) {

                $osstatus = '<span class="custom_btn_class text-info" >Ready for Delivery</span>';
            } else if ($record['order_status']  == 6) {

                $osstatus = '<span class="custom_btn_class text-success" >Delivered</span>';
            } else if ($record['order_status']  == 0) {

                $osstatus = '<span class="custom_btn_class text-muted" >Order Created</span>';
            }





            $advance = $this->getReceiptsadv($record['PK_ES_ID'], 0, 'erp_advance_noncomm');

            $receipts = $this->getReceiptsrec($record['PK_ES_ID'], 1, 'erp_advance_noncomm');
            // $outstanding = $record['grand_total'] - ($receipts + $advance);
            $outstanding = $record['grand_total'] - ($receipts + $advance);

            // if ($outstanding <= 0) {
            //     continue; 
            // }

            $rows = array();



            /*$sqlQueryproduct = "SELECT sqp.PK_ESP_ID ,GROUP_CONCAT( its.fk_item_id ORDER BY its.fk_item_id ASC SEPARATOR '<br/> ') AS itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.orientation  FROM ".ESTIMATE_NONCOMM_PRO." sqp LEFT JOIN ".ITEMS." its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ".TYPES." ty ON ty.pk_types_id = sqp.itemtype where sqp.fk_so_id = ".$record['PK_ES_ID']."";

            

            $resultprod = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQueryproduct);

            $allResultproduct = mysqli_fetch_assoc($resultprod);

            $allcountprod = mysqli_num_rows($resultprod);

            $itemnamesdata ="";

            $itemorient ="";

           

            if( $allcountprod  > 0)

            {

               $itemnamesdata = $allResultproduct['itemnames'];

               $itemorient ="";

               if($allResultproduct['orientation'] == 1) { $itemorient ='Length'; }else if($allResultproduct['orientation'] ==2 ) { $itemorient ='Breadth'; }

              

            }*/

            $rows[] = $record['PK_ES_ID'];

            $rows[] = $_POST['start'] + $i;

            $rows[] = ucfirst($record['sono']);

            $rows[] = date("d-m-Y", strtotime($record['sale_date']));



            $rows[] = $record['cusname'];

            $rows[] = $record['cat_name'];

            //$rows[] = $itemnamesdata;

            $rows[] = $record['grand_total'];

            $rows[] =  $advance;

            $rows[] = $receipts;

            // $rows[] =  $record['grand_total'] - ($receipts + $advance);
            $rows[] =  $outstanding;

            $rows[] = $osstatus;

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

    function getReceiptsadv($cusID, $type, $payTable)

    {

        $query = "SELECT sum(advance_amount) as advance FROM " . $payTable . " where fk_es_id=" . $cusID . " and type=" . $type;

        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



        $returnValue = '0';

        $estimatecomm = array();

        if (mysqli_num_rows($result)  > 0) {

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

        if (mysqli_num_rows($result)  > 0) {

            $counter = 1;

            while ($data = mysqli_fetch_array($result)) {

                $returnValue = $data['advance'];
            }
        }

        return $returnValue;
    }





    public function getAllEstimateComm($soid = "")

    {



        $query = "SELECT so.PK_ES_ID  as soId ,so.sono,so.sale_date,so.grand_total,so.customer_id,so.sono,so.reference_number,so.types,so.price_type,so.payment_type,so.orientation,so.city,so.remark,so.gst_type,so.caltype1,so.caltype2,so.caltype3,so.caltype4,so.caltype5,so.delivery_date,so.state,so.franchise,sgst_percent,sgst_total FROM " . ESTIMATE_COMM . " so  WHERE so.PK_ES_ID IN(" . $soid . ")";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }

    public function getAllEstimateNonComm($soid = "")

    {



        $query = "SELECT so.PK_ES_ID  as soId ,so.sono,so.sale_date,so.grand_total,so.customer_id,so.sono,so.reference_number,so.types,so.price_type,so.payment_type,so.orientation,so.city,so.remark,so.gst_type,so.caltype1,so.caltype2,so.caltype3,so.caltype4,so.caltype5,so.delivery_date,so.state,so.franchise,sgst_percent,sgst_total FROM " . ESTIMATE_NONCOMM . " so  WHERE so.PK_ES_ID IN(" . $soid . ")";



        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $res;
    }





    public function update_estimate_comm()

    {



        $query1 = "UPDATE  " . ESTIMATE_COMM . " SET bill_paid=1 where PK_ES_ID ='" . $_POST['txt_estimate_name'] . "'";



        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        if ($result1) {

            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {

            return 0;
        }
    }

    public function update_estimate_noncomm()

    {



        $query1 = "UPDATE  " . ESTIMATE_NONCOMM . " SET bill_paid=1 where PK_ES_ID ='" . $_POST['txt_estimate_name'] . "'";



        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        if ($result1) {

            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {

            return 0;
        }
    }

    public function update_estimate_commmulti()

    {



        $query1 = "UPDATE  " . ESTIMATE_COMM . " SET bill_paid=1 where PK_ES_ID IN(" . implode(",", $_POST['txt_estimate_name']) . ")";



        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        if ($result1) {

            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {

            return 0;
        }
    }

    public function update_estimate_noncommmulti()

    {



        $query1 = "UPDATE  " . ESTIMATE_NONCOMM . " SET bill_paid=1 where PK_ES_ID IN(" . implode(",", $_POST['txt_estimate_name']) . ") ";



        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        if ($result1) {

            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {

            return 0;
        }
    }
    public function check_status_delived_comm_bil($esid)

    {

        $query1 = "SELECT * FROM  erp_estimate_comm es WHERE es.order_status = 6 AND es.PK_ES_ID ='" . $esid . "' ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);

        if ($rowcount == 0) {

            $value = "true";
        } else {

            $value = "false";
        }



        return $value;
    }
    public function check_status_delived_noncomm_bil($esid)

    {

        $query1 = "SELECT * FROM  erp_estimate_noncomm es WHERE es.order_status = 6 AND es.PK_ES_ID ='" . $esid . "' ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        $rowcount = mysqli_num_rows($result1);

        if ($rowcount == 0) {

            $value = "true";
        } else {

            $value = "false";
        }



        return $value;
    }
    public function checkBulkorderstatusdelivered($esid, $tablename)

    {

        $esidval = "'" . implode("', '", $esid) . "'";


        $query1 = "SELECT * FROM  " . $tablename . " es WHERE es.order_status != 6 AND es.sono IN(" . $esidval . ") ";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);

        // $rowcount = mysqli_num_rows($result1);
        $returnValue = array();
        if (mysqli_num_rows($result1)  > 0) {


            while ($data = mysqli_fetch_array($result1)) {

                $returnValue[] = $data['sono'];
                /*
				$returnValue['sono']=$data['sono'];
				$returnValue['esid']=$data['PK_ES_ID'];*/
            }
        }

        return $returnValue;
    }
}
