<?php
class Order_status
{
    public $pk_id;
    public $eno;
    public $sono;
    public $so_id;
    public $sdate;
    public $customer_id;
    public $reference_number;
    public $product_id;
    public $category_id;
    public $innersheet_id;
    public $specialeffects_id;
    public $size_id;
    public $qty;
    public $price;
    public $total;
    public $gst;
    public $gst_total;
    public $final_total;
    public $item_total;
    public $discount_final;
    public $discount_final_amt;
    public $grand_total;
    public $approval_status;
    public $visibility;
    public $status;

    public function __construct($c_pk_id, $c_eno, $c_sono, $so_id, $c_sdate, $c_customer_id, $c_reference_number, $c_product_id, $c_category_id, $c_innersheet_id, $c_specialeffects_id, $c_size_id, $c_qty, $c_price, $c_total, $c_gst, $c_gst_total, $c_final_total, $c_item_total, $c_discount_final, $c_discount_final_amt, $c_grand_total, $c_approval_status, $c_visibility, $status)
    {
        $this->pk_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pk_id);
        $this->eno = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_eno);
        $this->sono = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sono);
        $this->so_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_so_id);
        $this->sdate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sdate);
        $this->customer_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_customer_id);
        $this->reference_number = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_reference_number);
        $this->product_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_product_id);
        $this->category_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_category_id);
        $this->innersheet_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_innersheet_id);
        $this->specialeffects_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_specialeffects_id);
        $this->size_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_size_id);
        $this->qty = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_qty);
        $this->price = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_price);
        $this->total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_total);
        $this->gst = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_gst);
        $this->gst_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_gst_total);
        $this->final_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_final_total);
        $this->item_total = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_item_total);
        $this->discount_final = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final);
        $this->discount_final_amt = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_discount_final_amt);
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
    public function getreference_number()
    {
        return $this->reference_number;
    }

    public function getproduct_id()
    {
        return $this->product_id;
    }
    public function getcategory_id()
    {
        return $this->category_id;
    }
    public function getinnersheet_id()
    {
        return $this->innersheet_id;
    }
    public function getspecialeffects_id()
    {
        return $this->specialeffects_id;
    }
    public function getsize_id()
    {
        return $this->size_id;
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
    public function setreference_number($s_reference_number)
    {
        $this->reference_number = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_reference_number);
    }

    public function setproduct_id($s_product_id)
    {
        $this->product_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_product_id);
    }
    public function setcategory_id($s_category_id)
    {
        $this->category_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_category_id);
    }
    public function setinnersheet_id($s_innersheet_id)
    {
        $this->innersheet_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_innersheet_id);
    }
    public function setspecialeffects_id($s_specialeffects_id)
    {
        $this->specialeffects_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_specialeffects_id);
    }
    public function setsize_id($s_size_id)
    {
        $this->size_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_size_id);
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
    public function getJobOrderData()
    {
          
        
        $query = "SELECT status,fk_customer_id,fk_so_id,date as dateval, DAY(created_on) AS DAY, MONTH(created_on) AS MONTH,  YEAR(created_on) AS YEAR,TIME(created_on)  as timecreate ,comments,statuschangeby FROM " . ORDER_STATUS . "  WHERE fk_so_id=" . $this->so_id . " AND types =".$this->eno." ";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $result;
    }
    public function checkCompletedStatus()
    {
        $query = "SELECT close_status,MAX(status) as statusval FROM " . ORDER_STATUS . "  WHERE fk_so_id=" . $this->so_id . " AND types=" . $this->eno . "     ORDER BY status DESC ";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }
    public function getSOdata()
    {
         $query = "SELECT * FROM " . SALES_ORDER . "  WHERE pk_sale_order=" . $this->so_id . " ";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }
    public function changeOrderStatus()
    {
       
        //SELECT * FROM invoice_erp.erp_order_status WHERE fk_so_id= 11 AND types=1 AND status = IF ((SELECT MAX(status) mxsta FROM invoice_erp.erp_order_status WHERE fk_so_id= 11 AND types=1) >=6,(SELECT MAX(status) mxsta FROM invoice_erp.erp_order_status WHERE fk_so_id= 11 AND types=1),4)
          $query = "SELECT * FROM " . ORDER_STATUS . "  WHERE fk_so_id=" . $this->so_id . " AND status =   IF ((SELECT MAX(status) mxsta FROM " . ORDER_STATUS . " WHERE fk_so_id= " . $this->so_id . " AND types=" . $this->eno ." ) >=" . $this->status . ",(SELECT MAX(status) mxsta FROM " . ORDER_STATUS . " WHERE fk_so_id= " . $this->so_id . " AND types=" . $this->eno . ")," . $this->status . ") AND types=" . $this->eno . "  ";
      // exit;
       $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        $cunt = mysqli_num_rows($result);
        if ($cunt == 0) {

         $query1 = "INSERT INTO  " . ORDER_STATUS . "  SET fk_so_id=" . $this->so_id . " ,date='" . $this->sdate . "',types=" . $this->eno . ",status=" . $this->status . " , statuschangeby='" . $this->reference_number . "',comments='" . $this->customer_id . "', visibility =1 ,fk_customer_id='" . $_SESSION['loggedin'] . "'";
            $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
            if ($result1) {
                return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
            } else {
                return 0;
            }
        } else {

          /*  $query2 = "UPDATE  " . ORDER_STATUS . " SET  status=" . $this->status . " where fk_so_id =" . $this->so_id . "";

            $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
            if ($result2) {
                return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
            } else {*/
                return 0;
           // }
         
        }
    }
    public function updateOrderStatus()
    {
        $query2 = "UPDATE  " . ORDER_STATUS . " SET  close_status= 1 where fk_so_id =" . $this->so_id . "";

        $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
        if ($result2) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }
    public function updateEstimateCommstatus()
    {
        $query2 = "UPDATE  " . ESTIMATE_COMM . " SET  order_status= ".$this->status." where PK_ES_ID =" . $this->so_id . "";

        $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
        if ($result2) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }
    public function updateEstimateNonCommstatus()
    {
        $query2 = "UPDATE  " . ESTIMATE_NONCOMM . " SET  order_status= ".$this->status." where PK_ES_ID =" . $this->so_id . "";

        $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
        if ($result2) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }
    public function updateEstimateCommstatusDelivered()
    {
        $query2 = "UPDATE  " . ESTIMATE_COMM . " SET  status= 2 where PK_ES_ID =" . $this->so_id . "";

        $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
        if ($result2) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }
    public function updateEstimateNonCommstatusDelivered()
    {
        $query2 = "UPDATE  " . ESTIMATE_NONCOMM . " SET status= 2 where PK_ES_ID =" . $this->so_id . "";

        $result2 = mysqli_query($GLOBALS["___mysqli_ston"], $query2);
        if ($result2) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }
    public function getEstimateCommdata()
    {
         $query = "SELECT * FROM " . ESTIMATE_COMM . "  WHERE PK_ES_ID=" . $this->so_id . " ";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }
    public function getEstimateNonCommdata()
    {
         $query = "SELECT * FROM " . ESTIMATE_NONCOMM . "  WHERE PK_ES_ID=" . $this->so_id . " ";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }
    public function getQRuserroledata()
    {
         $query = "SELECT * FROM  erp_QR_userrole  WHERE status = 1 ";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }
    public function getQruserID()
    {
         $query = "SELECT um.user_id FROM  erp_QR_usermaster um  left join erp_QR_userrole ur on ur.pk_usrole_id = um.fk_role_id WHERE um.status = 1 ";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }
    public function getQRalldata()
    {
          $query = "SELECT vs.order_number, um.user_name,vs.created_on FROM  verified_status vs LEFT JOIN erp_QR_usermaster um  ON um.user_id = vs.created_by   WHERE fk_est_id=" . $this->so_id . " AND fk_userrole_id = ".$this->customer_id." AND  order_type= ".$this->reference_number." limit 1";
      
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        return $result;
    }
}
