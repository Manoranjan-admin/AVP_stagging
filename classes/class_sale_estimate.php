<?php
class Estimate
{
    public $pk_id;
    public $eno;
    public $sono;
    public $so_id;
    public $sdate;
    public $customer_id;
    public $city;
    public $product_id;
    public $category_id;
    public $innersheet_id;
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
    public $discount_final;
    public $discount_final_amt;
    public $grand_total;
    public $approval_status;
    public $visibility;
    public $status;

    public function __construct($c_pk_id, $c_eno, $c_sono, $so_id, $c_sdate, $c_customer_id, $c_city, $c_product_id,  $c_item_id,  $c_orientation,  $c_types,  $c_pricetype,  $c_paymenttype,$c_category_id, $c_innersheet_id, $c_specialeffects_id, $c_types_id, $c_qty, $c_price, $c_total, $c_gst, $c_gst_total, $c_final_total, $c_item_total, $c_discount_final, $c_discount_final_amt, $c_grand_total, $c_approval_status, $c_visibility, $status)
    {
        $this->pk_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pk_id);
        $this->eno = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_eno);
        $this->sono = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sono);
        $this->so_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_so_id);
        $this->sdate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_sdate);
        $this->customer_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_customer_id);
        $this->city = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_city);
        $this->product_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_product_id);
        $this->category_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_category_id);
        $this->item_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_item_id);
        $this->orientation = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_orientation);
        $this->types = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_types);
        $this->pricetype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_pricetype);
        $this->paymenttype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_paymenttype);
        $this->innersheet_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_innersheet_id);
        $this->specialeffects_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_specialeffects_id);
        $this->types_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_types_id);
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
    public function getcity()
    {
        return $this->city;
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
    public function getinnersheet_id()
    {
        return $this->innersheet_id;
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
    public function setcity($s_city)
    {
        $this->city = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_city);
    }

    public function setproduct_id($s_product_id)
    {
        $this->product_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_product_id);
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
  
    public function setinnersheet_id($s_innersheet_id)
    {
        $this->innersheet_id = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_innersheet_id);
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
    public function Sales_Estimate_lastinserted_id()
    {
        $res = 0;
        $query = "SELECT PK_SE_ID FROM " . SALES_ESTIMATE . " GROUP BY PK_SE_ID ORDER BY PK_SE_ID DESC";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        $cunt = mysqli_num_rows($result);

        if ($cunt > 0) {
            $data = mysqli_fetch_array($result);
            $res = $data['PK_SE_ID'];
        }
        return $res;
    }

    public function addSalesEstimate()
    {
      
        $query1 = "INSERT INTO " . SALES_ESTIMATE . " SET eno='" . $this->eno . "' ,fk_so_id='" . $this->so_id . "' , date='" . $this->sdate . "', fk_customer_id='" . $this->customer_id . "', city='" . $this->city . "',item_total='" . $this->item_total . "', discount_final='" . $this->discount_final . "', discount_final_amt='" . $this->discount_final_amt . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->gst . "',gst_total='" . $this->gst_total . "',types='" . $this->types . "',orientation='" . $this->orientation . "',price_type='" . $this->pricetype . "',payment_type='" . $this->paymenttype . "',status=1, visibility=1";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
        if ($result1) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }
    public function addSalesEstimateProduct()
    {

        $query1 = "INSERT INTO " . SALES_ESTIMATE_PRODUCT . " SET fk_se_id='" . $this->pk_id . "',fk_category_id='".$this->category_id."', fk_product_id='".$this->product_id."',  itemtype='" . $this->types_id . "', fk_item_id='" . $this->item_id . "', sep_qty='" . $this->qty . "', sep_price='" . $this->price . "', sep_total='" . $this->final_total . "'";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
        if ($result1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function updateSalesEstimate($eid)
    {

       // $query1 = "UPDATE  " . SALES_ESTIMATE . " SET  fk_so_id='" . $this->so_id . "',date='" . $this->sdate . "', fk_customer_id='" . $this->customer_id . "' , city='" . $this->city . "',item_total='" . $this->item_total . "', discount_final='" . $this->discount_final . "', discount_final_amt='" . $this->discount_final_amt . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->gst . "',gst_total='" . $this->gst_total . "',types='" . $this->types . "',orientation='" . $this->orientation . "',price_type='" . $this->pricetype . "',payment_type='" . $this->paymenttype . "',status=1, visibility='1' where PK_SE_ID ='" . $eid . "'";
        $query1 = "UPDATE  " . SALES_ESTIMATE . " SET  item_total='" . $this->item_total . "', discount_final='" . $this->discount_final . "', discount_final_amt='" . $this->discount_final_amt . "', grand_total='" . $this->grand_total . "',gst_percent='" . $this->gst . "',gst_total='" . $this->gst_total . "',types='" . $this->types . "', visibility='1' where PK_SE_ID ='" . $eid . "'";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
        if ($result1) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }

    public function deleteSalesEstimateProduct($eid)
    {
        $query = "DELETE FROM " . SALES_ESTIMATE_PRODUCT . " WHERE fk_se_id='" . $eid . "'";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    public function listSalesEstimate()
    {

        $sqlQuery = "SELECT se.eno, cus.cus_name, se.gst_percent ,se.gst_total, se.grand_total,se.status,se.item_total,se.PK_SE_ID,DATE_FORMAT(se.date, '%d-%m-%Y') as se_date,se.city FROM " . SALES_ESTIMATE . " AS se LEFT JOIN " . CUSTOMER . " AS cus ON se.fk_customer_id = cus.pk_cus_id ";

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

        $stmtTotal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  " . SALES_ESTIMATE . " ");
        $allResult = mysqli_fetch_assoc($stmtTotal);
        $allRecords = mysqli_num_rows($stmtTotal);

        $displayRecords = mysqli_num_rows($stmt);
        $records = array();
        $i = 1;
        while ($record = mysqli_fetch_assoc($stmt)) {

            $rows = array();
            $rows[] = $i;
            $rows[] = ucfirst($record['eno']);
            $rows[] = ucfirst($record['sono']);
            $rows[] = $record['cus_name'];
            $rows[] = $record['se_date'];
            $rows[] = $record['item_total'];
            $rows[] = $record['grand_total'];
            //  $rows[] = $record['status'];
           
            $ediview = '<a href="index.php?erp=32&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-view" data-toggle="tooltip" title="View" name="btnView"><span class="fa fa-eye"></span></a>';
            if($record['status'] == 1)
            {
                $ediview .=  ' <a href="index.php?erp=31&id=' . $record["PK_SE_ID"] . '" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>';
                $btinvoice = '<button  class="btn btn-primary createtoInvoice"  onClick="createInvoice(' . $record["PK_SE_ID"] . ')"  data-value="' . $record["PK_SE_ID"] . '" >Create a Invoice</button> ';
            }
            else{
                $btinvoice ='<span style="color:green"><b>Created Invoice </b></span>';
            }
            $rows[]  =  $ediview;
            $rows[] =  $btinvoice;
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
        $query = "SELECT * FROM " . SALES_ORDER . " WHERE status=1 AND customer_id = " . $this->customer_id . "  AND types = " . $this->types . " ORDER BY pk_sale_order DESC";
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
        $query = "SELECT * FROM " . SALES_ORDER . " WHERE customer_id = " . $this->customer_id . " AND types = " . $this->types . "  ORDER BY pk_sale_order DESC";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        $cunt = mysqli_num_rows($result);

        if ($cunt > 0) {
            while ($data = mysqli_fetch_array($result)) {
                $res[] = $data;
            }
        }
        return $res;
    }

  
    public function getSalesEstimateById($eid = "")
    { 
       // $query = "SELECT se.PK_SE_ID ,se.eno,se.date,se.discount_final as discount_final,se.discount_final_amt as discount_final_amt,se.gst_percent as gst_percent,se.gst_total as gst_total,se.item_total as item_total,se.grand_total as grand_total,se.fk_customer_id,se.fk_so_id,se.fk_category_id,se.fk_product_id,se.payment_type,se.price_type,p.product_name,c.cat_name,se.orientation,se.types,se.city FROM " . SALES_ESTIMATE . " se LEFT JOIN ".PRODUCT." p ON se.fk_product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON se.fk_category_id=c.pk_cat_id   WHERE se.PK_SE_ID IN(" . $eid . ") ";
        $query = "SELECT se.PK_SE_ID ,se.eno,se.date,se.discount_final as discount_final,se.discount_final_amt as discount_final_amt,se.gst_percent as gst_percent,se.gst_total as gst_total,se.item_total as item_total,se.grand_total as grand_total,se.fk_customer_id,se.fk_so_id,se.payment_type,se.price_type,se.orientation,se.types,se.city FROM " . SALES_ESTIMATE . " se    WHERE se.PK_SE_ID IN(" . $eid . ") ";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $res;
    }
    public function getSalesEstimateProductByPROId($eid = "")
    {
        $query = "SELECT * FROM " . SALES_ESTIMATE_PRODUCT . "  WHERE fk_se_id IN(" . $eid . ") ORDER BY PK_SEP_ID ASC";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $res;

    }
    public function getSalesEstimateProductById($eid = "")
    {
        //    $query = "SELECT * FROM ".SALES_ORDER_PRODUCT."  WHERE pk_sop_id='".$sop_id."'";

        
  $query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,its.fk_item_id as itemnames,ty.types_name,sqp.itemtype,ty.type_tables,ty.table_pk_id,sqp.fk_category_id,sqp.fk_product_id,p.product_name,c.cat_name FROM ".SALES_ESTIMATE_PRODUCT." sqp  LEFT JOIN ".PRODUCT." p ON sqp.fk_product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN ".ITEMS." its ON sqp.fk_item_id = its.pk_items_id LEFT JOIN ".TYPES." ty ON ty.pk_types_id = sqp.itemtype    WHERE sqp.PK_SEP_ID='".$eid."' ";

  
      //  $query = "SELECT p.product_name,p.pk_product_id,sqp.PK_SEP_ID  ,c.pk_cat_id,c.cat_name,sqp.sep_price, sqp.sep_total,sqp.fk_category_id,  sqp.sep_qty, isheet.name as innername,se.name as specialeffectsname,s.name as sizename,sqp.inner_sheet_id,sqp.special_effects_id,sqp.size_id FROM " . SALES_ESTIMATE_PRODUCT . " sqp LEFT JOIN " . PRODUCT . " AS p ON p.pk_product_id =sqp.fk_product_id LEFT JOIN " . CATEGORY . " AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN " . INNER_SHEET . " AS isheet ON isheet.pk_is_id = sqp.inner_sheet_id LEFT JOIN " . SPECIAL_EFFECTS . " AS se ON se.pk_se_id = sqp.special_effects_id LEFT JOIN " . SIZE . " AS s ON s.pk_size_id = sqp.size_id WHERE p.visibility='1' and sqp.PK_SEP_ID='" . $eid . "'";
        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $res;
    }
    public function getSalesEstimateAddressById($eid)
    {
        $query = "SELECT * FROM " . SALES_ESTIMATE . " se LEFT JOIN " . CUSTOMER . " cus ON cus.pk_cus_id = se.fk_customer_id  WHERE se.PK_SE_ID=" . $eid . "";
        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $res;
    }
    public function getSalesEstimateProductByIdForPDF($eid)
    {
        //    fk_specialeffects_id fk_size_id product_name price final_total gst_total item_total grand_total qty name
      //  $query = "SELECT p.product_name,p.pk_product_id,sqp.PK_SEP_ID  ,c.pk_cat_id,c.cat_name,sqp.sep_price, sqp.sep_total,sqp.fk_category_id,  sqp.sep_qty, isheet.name as innername,se.name as specialeffectsname,s.name as sizename,sqp.inner_sheet_id,sqp.special_effects_id,sqp.size_id FROM " . SALES_ESTIMATE_PRODUCT . " sqp LEFT JOIN " . PRODUCT . " AS p ON p.pk_product_id =sqp.fk_product_id LEFT JOIN " . CATEGORY . " AS c ON c.pk_cat_id = p.fk_catgeory_id LEFT JOIN " . INNER_SHEET . " AS isheet ON isheet.pk_is_id = sqp.inner_sheet_id LEFT JOIN " . SPECIAL_EFFECTS . " AS se ON se.pk_se_id = sqp.special_effects_id LEFT JOIN " . SIZE . " AS s ON s.pk_size_id = sqp.size_id WHERE p.visibility='1' and sqp.PK_SEP_ID='" . $eid . "'";
      $query = "SELECT sqp.PK_SEP_ID ,sqp.sep_price, sqp.sep_total, sqp.sep_qty,sqp.fk_item_id, ty.pk_types_id,ty.types_name,sqp.itemtype,ty.type_tables,ty.table_pk_id,its.fk_item_id as itemnames,sqp.fk_category_id,sqp.fk_product_id,p.product_name,c.cat_name FROM " . SALES_ESTIMATE_PRODUCT . " sqp LEFT JOIN ".PRODUCT." p ON sqp.fk_product_id =p.pk_product_id LEFT JOIN ".CATEGORY." c ON sqp.fk_category_id=c.pk_cat_id LEFT JOIN ".ITEMS." its ON sqp.fk_item_id = its.pk_items_id LEFT JOIN ".TYPES." ty ON ty.pk_types_id = sqp.itemtype   WHERE  sqp.PK_SEP_ID='" . $eid . "'";

        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return $res;
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
    public function EditCustomer()
    {
        $query = "SELECT * FROM " . COMPANY . " WHERE pk_com_id=1 AND visibility != '0'";
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
    public function createtoInvoice()
    {
         $query1 = "INSERT INTO  " . SALES_INVOICE . " (	
         gst_percent, gst_total, discount_final, discount_final_amt, fk_so_id, fk_customer_id, reference_number, shipment_from, shipment_to, item_total, date, grand_total, status, visibility, eno,payment_type,price_type,orientation,types,city)   SELECT  gst_percent, gst_total, discount_final, discount_final_amt, fk_so_id, fk_customer_id, reference_number, shipment_from, shipment_to, item_total, date, grand_total, status, visibility,'" . $this->eno . "',payment_type,price_type,orientation,types,city FROM " . SALES_ESTIMATE . "  where PK_SE_ID =" . $this->pk_id . "";
        
        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
        if ($result1) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }
    public function createtoInvoiceProduct()
    {
         $query1 = "INSERT INTO  " . SALES_INVOICE_PRODUCT . " (itemtype,fk_item_id,sep_pro_desc,sep_qty,sep_price,sep_total,sep_product_remarks,fk_category_id,fk_product_id,sonoID,fk_se_id)  SELECT itemtype,fk_item_id, sep_pro_desc,sep_qty,sep_price,sep_total,sep_product_remarks,fk_category_id,fk_product_id,sonoID,'" . $this->so_id . "' FROM " . SALES_ESTIMATE_PRODUCT  . "  where fk_se_id =" . $this->pk_id . "";
        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
        if ($result1) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }
    public function changeEstimateStatus()
    {

        $query1 = "UPDATE  ".SALES_ESTIMATE." SET  status=2 where PK_SE_ID=" . $this->pk_id . "";

        $result1 = mysqli_query($GLOBALS["___mysqli_ston"], $query1);
        if ($result1) {
            return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
        } else {
            return 0;
        }
    }
    public function getAllItemDataprint($pk_id,$typetables,$item_id){
		//	$_POST['valid']
	//	var_dump($typetables);
		$TABLES = admin_db_prefix.strtolower(trim($typetables));
		

		//$tablesval = ;
			$query = "SELECT ".$pk_id." as id,name,cost,description FROM ".$TABLES." WHERE ".$pk_id." =".$item_id." AND visibility= 1 ";	
	
			$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $res;
		}
}
