<?php
class Sales_Invoice
{
	public $pk_id;
    public $eno;
    public $sono;
    public $so_id;
    public $sdate;
    public $customer_id;
    public $city;
    public $category_id;
    public $remark;
    public $specialeffects_id;
	public $types_id;
	public $item_id;
    public $orientation;
    public $types;
	public $pricetype;
	public $paymenttype;
    public $qty;
    public $price;
    public $total;
    public $gst;
    public $gst_total;
    public $final_total;
    public $item_total;
    
	public $caltype1;
	public $caltype2;
   	public $caltype3;
   	public $caltype4;
   	public $caltype5;

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
    public $approval_status;
    public $visibility;
    public $status;

    public function __construct($c_pk_id, $c_eno, $c_sono, $so_id, $c_sdate, $c_customer_id, $c_city,  $c_item_id,  $c_orientation,  $c_types,  $c_pricetype,  $c_paymenttype,$c_category_id, $c_remark, $c_specialeffects_id, $c_types_id, $c_qty, $c_price, $c_total, $c_gst, $c_gst_total, $c_final_total, $c_item_total, $c_discount_field1,$c_discount_final1,$c_discount_final_amt1, $c_discount_type1, $c_discount_field2,$c_discount_final2,$c_discount_final_amt2, $c_discount_type2, $c_discount_field3,$c_discount_final3,$c_discount_final_amt3, $c_discount_type3, $c_discount_field4,$c_discount_final4,$c_discount_final_amt4, $c_discount_type4, $c_discount_field5,$c_discount_final5,$c_discount_final_amt5, $c_discount_type5, $c_grand_total, $c_approval_status, $c_visibility, $status, $c_caltype1,  $c_caltype2, $c_caltype3, $c_caltype4,$c_caltype5)
    {
        $this->pk_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pk_id);
        $this->eno = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_eno);
        $this->sono = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sono);
        $this->so_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_so_id);
        $this->sdate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sdate);
        $this->customer_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_customer_id);
        $this->city = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_city);
        $this->category_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_category_id);
        $this->item_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_item_id);
        $this->orientation = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_orientation);
        $this->types = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_types);
        $this->pricetype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pricetype);
        $this->paymenttype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_paymenttype);
        $this->remark = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_remark);
        $this->specialeffects_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_specialeffects_id);
        $this->types_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_types_id);
        $this->qty = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_qty);
        $this->price = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_price);
        $this->total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_total);
        $this->gst = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_gst);
        $this->gst_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_gst_total);
        $this->final_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_final_total);
        $this->item_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_item_total);
      
        $this->caltype1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype1);
		$this->caltype2=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype2);
		$this->caltype3=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype3);
		$this->caltype4=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype4);
		$this->caltype5=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_caltype5);

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


        $this->grand_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_grand_total);
        $this->approval_status = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_approval_status);
        $this->visibility = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_visibility);
        $this->status = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_status);
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
        return $this->so_id;
    }
    public function getsdate()
    {
        return $this->sdate;
    }
    public function getcustomer_id()
    {
        return $this->customer_id;
    }
    public function getcity()
    {
        return $this->city;
    }

 
    public function getcategory_id()
    {
        return $this->category_id;
    }
    public function getitem_id()
    {
        return $this->item_id;
    }
    public function getorientation()
    {
        return $this->orientation;
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
    public function getremark()
    {
        return $this->remark;
    }
    public function getspecialeffects_id()
    {
        return $this->specialeffects_id;
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
    public function getgst()
    {
        return $this->gst;
    }
    public function getfinal_total()
    {
        return $this->final_total;
    }
    public function getitem_total()
    {
        return $this->item_total;
    }
    public function getgst_total()
    {
        return $this->gst_total;
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

    public function getapproval_status()
    {
        return $this->approval_status;
    }
    public function getvisibility()
    {
        return $this->visibility;
    }
    public function getstatus()
    {
        return $this->status;
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
        $this->so_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_so_id);
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
    public function setcity($s_city)
    {
        $this->city = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_city);
    }

 
    public function setcategory_id($s_category_id)
    {
        $this->category_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_category_id);
    }
    public function setitem_id($s_item_id)
    {
        $this->item_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_item_id);
    }
    public function setorientation($s_orientation)
    {
        $this->orientation = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_orientation);
    }
    public function settypes($s_types)
    {
        $this->types = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_types);
    }
    public function setpricetype($s_pricetype)
    {
        $this->pricetype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_pricetype);
    }
    public function setpaymenttype($s_paymenttype)
    {
        $this->paymenttype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_paymenttype);
    }
  
    public function setremark($s_remark)
    {
        $this->remark = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_remark);
    }
    public function setspecialeffects_id($s_specialeffects_id)
    {
        $this->specialeffects_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_specialeffects_id);
    }
    public function settypes_id($s_types_id)
    {
        $this->types_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_types_id);
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
    public function setgst($s_gst)
    {
        $this->gst = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_gst);
    }

    public function setfinal_total($s_final_total)
    {
        $this->final_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_final_total);
    }
    public function setitem_total($s_item_total)
    {
        $this->item_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_item_total);
    }

    public function setgst_total($s_gst_total)
    {
        $this->gst_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_gst_total);
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

    public function setapproval_status($s_approval_status)
    {
        $this->approval_status = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_approval_status);
    }
    public function setvisibility($s_visibility)
    {
        $this->visibility = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_visibility);
    }
    public function setstatus($s_status)
    {
        $this->status = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_status);
    }
    public function Sales_Invoice_lastinserted_id()
    {
        $res = 0;
        $query = "SELECT PK_SE_ID FROM " . SALES_INVOICE . " GROUP BY PK_SE_ID ORDER BY PK_SE_ID DESC";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        $cunt = mysqli_num_rows($result);

        if ($cunt > 0) {
            $data = mysqli_fetch_array($result);
            $res = $data['PK_SE_ID'];
        }
        return $res;
    }

    public function addSalesInvoice()
    {

        $query1 = "INSERT INTO " . SALES_INVOICE . " SET eno='" . $this->eno . "' ,fk_so_id='" . $this->so_id . "' , date='" . $this->sdate . "', fk_customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->gst . "',gst_total='" . $this->gst_total . "',payment_type='" . $this->paymenttype . "', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."', discount_field4='".$this->discount_field4."', discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_type4='".$this->discount_type4."', discount_field5='".$this->discount_field5."', discount_final5='".$this->discount_final5."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."',remark='" . $this->remark . "',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',caltype4='".$this->caltype4."',caltype5='".$this->caltype5."',status=1, visibility=1,created_by=".$_SESSION['user_id']."";
      
        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
        if ($result1) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }
    public function addSalesInvoiceProduct()
    {

         $query1 = "INSERT INTO " . SALES_INVOICE_PRODUCT . " SET fk_se_id='" . $this->pk_id . "',fk_category_id='".$this->category_id."', fk_product_id='".$this->product_id."' , itemtype='" . $this->types_id . "', fk_item_id='" . $this->item_id . "', sep_qty='" . $this->qty . "', sep_price='" . $this->price . "', inner_sheet_id='" . $this->innersheet_id . "', special_effects_id='" . $this->specialeffects_id . "', size_id='" . $this->size_id . "', sep_total='" . $this->final_total . "',types='" . $this->types . "',orientation='" . $this->orientation . "',price_type='" . $this->pricetype . "'"; 

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
        if ($result1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function updateSalesInvoice($eid)
    {

        $query1 = "UPDATE  " . SALES_INVOICE . " SET  fk_so_id='" . $this->so_id . "',date='" . $this->sdate . "', fk_customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "', grand_total='" . $this->grand_total . "',payment_type='" . $this->paymenttype . "',gst_percent='" . $this->gst . "',gst_total='" . $this->gst_total . "',remark='" . $this->remark . "', discount_field='".$this->discount_field1."', discount_final='".$this->discount_final1."', discount_final_amt='".$this->discount_final_amt1."', discount_type='".$this->discount_type1."', discount_field2='".$this->discount_field2."', discount_final2='".$this->discount_final2."', discount_final_amt2='".$this->discount_final_amt2."', discount_type2='".$this->discount_type2."', discount_field3='".$this->discount_field3."', discount_final3='".$this->discount_final3."', discount_final_amt3='".$this->discount_final_amt3."', discount_type3='".$this->discount_type3."', discount_field4='".$this->discount_field4."', discount_final4='".$this->discount_final4."', discount_final_amt4='".$this->discount_final_amt4."', discount_type4='".$this->discount_type4."', discount_field5='".$this->discount_field5."', discount_final5='".$this->discount_final5."', discount_final_amt5='".$this->discount_final_amt5."', discount_type5='".$this->discount_type5."',caltype1='".$this->caltype1."',caltype2='".$this->caltype2."',caltype3='".$this->caltype3."',caltype4='".$this->caltype4."',caltype5='".$this->caltype5."',status=1, visibility='1',,modified_by=".$_SESSION['user_id']." where PK_SE_ID ='" . $eid . "'";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
        if ($result1) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }

    public function deleteSalesInvoiceProduct($eid)
    {
        $query = "DELETE FROM " . SALES_INVOICE_PRODUCT . " WHERE fk_se_id='" . $eid . "'";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    public function listSalesInvoice()
    {
	
        $sqlQuery = "SELECT se.eno, cus.cus_name, se.gst_percent ,se.gst_total, se.grand_total,se.status,se.item_total,se.PK_SE_ID,DATE_FORMAT(se.date, '%d-%m-%Y') as se_date,se.city,(SELECT so.sono FROM " . SALES_ORDER . " so WHERE so.pk_sale_order  = se.fk_so_id ) as so_no,se.payment_type  FROM " . SALES_INVOICE . " AS se LEFT JOIN " . CUSTOMER . " AS cus ON se.fk_customer_id = cus.pk_cus_id ";

        if (!empty($_POST["search"]["value"])) {
            $jodate = strtotime($_POST["search"]["value"]);
            $jodateVals = date('Y-m-d', $jodate);
            $sqlQuery .= 'where (se.visibility=1 AND se.status= 1) AND  se.eno LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR se.sono LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR cus.cus_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR se.date LIKE "%' . $jodateVals . '%" ';
            $sqlQuery .= ' OR se.item_total LIKE "%' . $_POST["search"]["value"] . '%" ';
            $sqlQuery .= ' OR se.grand_total LIKE "%' . $_POST["search"]["value"] . '%" ';
            //   $sqlQuery .= ' OR so.status LIKE "%' . $_POST["search"]["value"] . '%" ';
        } else {
            $sqlQuery .= 'where se.visibility=1  ';

        }

	
        if (!empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY se.PK_SE_ID DESC ';
        }

        if ($_POST["length"] != -1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $stmt = mysqli_query($GLOBALS["___mysqli_ston"], $sqlQuery);

        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . SALES_INVOICE . " ");
        $allResult = mysqli_fetch_assoc($stmtTotal);
        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($stmt);
        $records = array();
        $i = 1;
        while ($record = mysqli_fetch_assoc($stmt)) {
      

            $rows = array();
            $rows[] = $i;
            $rows[] = ucfirst($record['eno']);
            $rows[] = ucfirst($record['so_no']);
            $rows[] = $record['cus_name'];
            $rows[] = $record['se_date'];

            $payment_type = ($record['payment_type']== 1)? 'Cash' : 'Credit';

            $rows[] = $payment_type;

            $rows[] = '<p class="alignrightAmount" >'.$record['grand_total'].'</p>';
            //  $rows[] = $record['status'];
            $rows[] = '<a href="index.php?erp=21&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a><a href="index.php?erp=33&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
            //$rows[] = '<a href="index.php?erp=15&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>    <a href="index.php?erp=14&id='.$record["pk_sale_order"].'" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>';
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
    public function getJobOrder()
    {
		$res = array();
        $query = "SELECT * FROM " . SALES_ORDER . " WHERE status = 1 AND customer_id = ".$this->customer_id."  ORDER BY pk_sale_order DESC";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        $cunt = mysqli_num_rows($result);

        if ($cunt > 0) {
            while($data = mysqli_fetch_array($result))
            {
            $res[] = $data;
            }
        }
        return $res;
	}
    public function getJobOrderEdit()
    {
			
			$res = array();
			$query = "SELECT * FROM " . SALES_ORDER . " WHERE customer_id = ".$this->customer_id."  ORDER BY pk_sale_order DESC";
			$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
			$cunt = mysqli_num_rows($result);
	
			if ($cunt > 0) {
				while($data = mysqli_fetch_array($result))
				{
				$res[] = $data;
				}
			}
			return $res;
	}
	

    public function getSalesInvoiceById($eid = "")
    {

       
        //$query = "SELECT si.PK_SE_ID ,si.eno,si.date,si.discount_final as discount_final,si.discount_final_amt as discount_final_amt,si.gst_percent as gst_percent,si.gst_total as gst_total,si.item_total as item_total,si.grand_total as grand_total,si.fk_customer_id,si.fk_so_id,si.fk_category_id,si.fk_product_id,si.payment_type,si.price_type,p.product_name,c.cat_name,si.orientation,si.types,si.city FROM ".SALES_INVOICE." si LEFT JOIN ".PRODUCT." p ON si.fk_product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON si.fk_category_id=c.pk_cat_id   WHERE si.PK_SE_ID IN(" . $eid . ") ";
        $query = "SELECT si.PK_SE_ID ,si.eno,si.date,si.gst_percent as gst_percent,si.gst_total as gst_total,si.item_total as item_total,si.grand_total as grand_total,si.fk_customer_id,si.fk_so_id,si.payment_type,si.discount_field, si.discount_final, si.discount_final_amt, si.discount_type, si.discount_field2, si.discount_final2, si.discount_final_amt2, si.discount_type2, si.discount_field3, si.discount_final3, si.discount_final_amt3, si.discount_type3, si.discount_field4, si.discount_final4, si.discount_final_amt4, si.discount_type4, si.discount_field5, si.discount_final5, si.discount_final_amt5, si.discount_type5,si.remark,si.city,si.caltype1,si.caltype2,si.caltype3,si.caltype4,si.caltype5 FROM ".SALES_INVOICE." si   WHERE si.PK_SE_ID IN(" . $eid . ") ";

        
        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $res;
    }
    public function getSalesInvoiceProductByPROId($eid = "")
    {
        $query = "SELECT * FROM " . SALES_INVOICE_PRODUCT . "  WHERE fk_se_id IN(" . $eid . ") ORDER BY PK_SEP_ID ASC";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $res;

    }
    public function getSalesInvoiceProductById($eid = "")
    {
        //    $query = "SELECT * FROM ".SALES_ORDER_PRODUCT."  WHERE pk_sop_id='".$sop_id."'";



         $query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,ty.types_name,sqp.itemtype,ty.type_tables,ty.table_pk_id,its.fk_item_id as itemnames,p.product_name,c.cat_name,sqp.fk_product_id,sqp.fk_category_id,sqp.price_type,sqp.orientation,sqp.types FROM ".SALES_INVOICE_PRODUCT." sqp LEFT JOIN ".PRODUCT." p ON sqp.fk_product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN ".ITEMS." its ON sqp.fk_item_id = its.pk_items_id  LEFT JOIN ".TYPES." AS ty ON ty.pk_types_id = sqp.itemtype  WHERE sqp.PK_SEP_ID='".$eid."' ";

       //echo $query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,its.fk_item_id as itemnames,ty.types_name,sqp.itemtype,ty.type_tables,ty.table_pk_id FROM " . SALES_INVOICE_PRODUCT . " sqp LEFT JOIN ".TYPES." AS ty ON ty.pk_types_id = sqp.itemtype  WHERE sqp.PK_SEP_ID='" . $eid . "'";

      //  $query = "SELECT p.product_name,p.pk_product_id,sqp.PK_SEP_ID  ,c.pk_cat_id,c.cat_name,sqp.sep_price, sqp.sep_total,sqp.fk_category_id,  sqp.sep_qty, isheet.name as innername,se.name as specialeffectsname,s.name as sizename,sqp.inner_sheet_id,sqp.special_effects_id,sqp.size_id FROM " . SALES_ESTIMATE_PRODUCT . " sqp LEFT JOIN " . PRODUCT . " AS p ON p.pk_product_id =sqp.fk_product_id LEFT JOIN " . CATEGORY . " AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN " . INNER_SHEET . " AS isheet ON isheet.pk_is_id = sqp.inner_sheet_id LEFT JOIN " . SPECIAL_EFFECTS . " AS se ON se.pk_se_id = sqp.special_effects_id LEFT JOIN " . SIZE . " AS s ON s.pk_size_id = sqp.size_id WHERE p.visibility='1' and sqp.PK_SEP_ID='" . $eid . "'";
        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $res;
    }
    public function getSalesInvoiceAddressById($eid)
    {
        $query = "SELECT * FROM " . SALES_INVOICE . " se LEFT JOIN " . CUSTOMER . " cus ON cus.pk_cus_id = se.fk_customer_id  WHERE se.PK_SE_ID=" . $eid . "";
        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $res;
    }
    public function getSalesInvoiceProductByIdForPDF($eid)
    {
       // $query = "SELECT sqp.pk_sop_id ,sqp.price, sqp.final_total, sqp.qty, sqp.fk_items_id,sqp.itemtype,its.fk_item_id as itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,p.product_name,c.cat_name,sqp.fk_category_id,sqp.product_id,its.first_price,its.second_price,sqp.types,sqp.price_type,sqp.orientation FROM ".SALES_ORDER_PRODUCT." sqp LEFT JOIN ".PRODUCT." p ON sqp.product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN ".ITEMS." its ON sqp.fk_items_id = its.pk_items_id LEFT JOIN ".TYPES." ty ON ty.pk_types_id = sqp.itemtype LEFT JOIN ".SALES_ORDER." so ON sqp.fk_so_id=so.pk_sale_order  WHERE sqp.pk_sop_id='".$sqp_id."' ";



        //    fk_specialeffects_id fk_size_id product_name price final_total gst_total item_total grand_total qty name
        $query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,its.fk_item_id as itemnames,IF(sqp.types = 2,ty.types_name ,'Product') as types_name,sqp.itemtype,ty.type_tables,ty.table_pk_id,p.product_name,c.cat_name,sqp.fk_product_id,sqp.fk_category_id,sqp.price_type,sqp.orientation,sqp.types FROM " . SALES_INVOICE_PRODUCT . " sqp LEFT JOIN ".PRODUCT." p ON sqp.fk_product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN ".ITEMS." its ON sqp.fk_item_id = its.pk_items_id LEFT JOIN ".TYPES." AS ty ON ty.pk_types_id = sqp.itemtype  WHERE sqp.PK_SEP_ID='" . $eid . "'";
        
       // $query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,ty.types_name,sqp.itemtype,ty.type_tables,ty.table_pk_id,its.fk_item_id as itemnames FROM " . SALES_ESTIMATE_PRODUCT . " sqp LEFT JOIN ".ITEMS." its ON sqp.fk_item_id = its.pk_items_id LEFT JOIN ".TYPES." ty ON ty.pk_types_id = sqp.itemtype   WHERE  sqp.PK_SEP_ID='" . $eid . "'";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $res;
    }
/*	function getSalesInvoiceById($eid=""){	 
		$query = "SELECT PK_SE_ID ,eno,date,discount_final as discount_final,discount_final_amt as discount_final_amt,gst_percent as gst_percent,gst_total as gst_total,item_total as item_total,grand_total as grand_total,fk_customer_id,fk_so_id FROM ".SALES_INVOICE."  WHERE PK_SE_ID IN(".$eid.") AND status = 1";
		  $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	  return $res;	
  }
  function getSalesInvoiceProductByPROId($eid=""){
	   $query = "SELECT * FROM ".SALES_INVOICE_PRODUCT."  WHERE fk_se_id IN(".$eid.") ORDER BY PK_SEP_ID ASC"; 
  
	  $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	  return $res;	
	  
  }
  function getSalesInvoiceProductById($eidp=""){
  //	$query = "SELECT * FROM ".SALES_ORDER_PRODUCT."  WHERE pk_sop_id='".$sop_id."'"; 

    $query = "SELECT p.product_name,p.pk_product_id,sqp.PK_SEP_ID  ,c.pk_cat_id,c.cat_name,sqp.sep_price, sqp.sep_total,sqp.fk_category_id,  sqp.sep_qty, isheet.name as innername,se.name as specialeffectsname,s.name as sizename,sqp.inner_sheet_id,sqp.special_effects_id,sqp.size_id FROM ".SALES_INVOICE_PRODUCT." sqp LEFT JOIN ".PRODUCT." AS p ON p.pk_product_id =sqp.fk_product_id LEFT JOIN ".CATEGORY." AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN ".INNER_SHEET." AS isheet ON isheet.pk_is_id = sqp.inner_sheet_id LEFT JOIN ".SPECIAL_EFFECTS." AS se ON se.pk_se_id = sqp.special_effects_id LEFT JOIN ".SIZE." AS s ON s.pk_size_id = sqp.size_id WHERE p.visibility='1' and sqp.PK_SEP_ID='".$eidp."'";
  $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	  return $res;	
  }
  function getSalesInvoiceAddressById($eid){	
	$query = "SELECT * FROM ".SALES_INVOICE." se LEFT JOIN ".CUSTOMER." cus ON cus.pk_cus_id = se.fk_customer_id  WHERE se.PK_SE_ID=".$eid."";
	$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	return $res;	
}
function getSalesInvoiceProductByIdForPDF($eid){
	//	fk_specialeffects_id fk_size_id product_name price final_total gst_total item_total grand_total qty name
	 	 $query = "SELECT p.product_name,p.pk_product_id,sqp.PK_SEP_ID  ,c.pk_cat_id,c.cat_name,sqp.sep_price, sqp.sep_total,sqp.fk_category_id,  sqp.sep_qty, isheet.name as innername,se.name as specialeffectsname,s.name as sizename,sqp.inner_sheet_id,sqp.special_effects_id,sqp.size_id FROM ".SALES_INVOICE_PRODUCT." sqp LEFT JOIN ".PRODUCT." AS p ON p.pk_product_id =sqp.fk_product_id LEFT JOIN ".CATEGORY." AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN ".INNER_SHEET." AS isheet ON isheet.pk_is_id = sqp.inner_sheet_id LEFT JOIN ".SPECIAL_EFFECTS." AS se ON se.pk_se_id = sqp.special_effects_id LEFT JOIN ".SIZE." AS s ON s.pk_size_id = sqp.size_id WHERE p.visibility='1' and sqp.PK_SEP_ID='".$eid."'";
	
	$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
	*/
	
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
	function EditCustomer(){
		$query = "SELECT * FROM ".COMPANY." WHERE pk_com_id=1 AND visibility != '0'";
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
	}
    
    public function updateSOStatus($soid)
    {

        $query1 = "UPDATE  " . SALES_ORDER . " SET  status=2 where pk_sale_order IN (" . $soid . ")";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
        if ($result1) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }
}