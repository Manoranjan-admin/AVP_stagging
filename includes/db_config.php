<?php 

// Show errors for debugging (remove // before both lines)
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

// Start session ONLY if not already started
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

/**** DB CONFIG ****/
$org_servername = 'localhost';
$org_dbusername = 'root';
$org_dbpassword = '';
$org_dbname = 'AVP-stagging';

$org_tablePrefix = 'erp_';
$org_name = "ERP";
$org_header = "ERP";
$company_prefix = "erp";

$dbname = 'erp-stagging-new';

/********** SENDGRID CREDENTAILS ********/
/* define('SENDGRID_USERNAME',"tktcheckout12");
define('SENDGRID_PASSWORD',"@w5eNd6!dm@i1");
define('SENDGRID_API_KEY',"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"); */


/**** DB GLOBAL VARIABLES ****/
define('DB_HOST_1', $org_servername);
define('DB_USER_1', $org_dbusername);
define('DB_PASSWORD_1', $org_dbpassword);
define('DB_NAME_1', $org_dbname);
define('DB_CONN_1', '');
define('ORG_NAME', $org_name);
define('ORG_HEAD', $org_header);
define('COMPANY_PREFIX', $company_prefix);
define('BASE_URL', "http://localhost/AVP-stagging/");

/**** TABLE PREFIX CONFIG - WITH BACKTICKS FOR HYPHEN IN DB NAME ****/
define('admin_db_prefix', '`'.$org_dbname.'`.'.$org_tablePrefix);
 
/*** COMMON DB TABLE NAME CONFIG ***/ 

define('USER_MASTER', admin_db_prefix.'admin_master');
define('HANDLER', admin_db_prefix.'handler');
define('MODULE', admin_db_prefix.'module');
define('OPERATION', admin_db_prefix.'operation');
define('COUNTRY_MASTER', admin_db_prefix.'country_master');
define('STATES', admin_db_prefix.'states');
define('CITIES', admin_db_prefix.'cities');
define('CUSTOMER', admin_db_prefix.'customer_master');
define('COMPANY', admin_db_prefix.'company_master');
define('PRODUCT', admin_db_prefix.'products');
define('UOM_MASTER', admin_db_prefix.'uom_master');
define('CATEGORY', admin_db_prefix.'category');
define('SALES_ORDER', admin_db_prefix.'sales_order');

//Estimate
define('ESTIMATE_COMM', admin_db_prefix.'estimate_comm');
define('ESTIMATE_COMM_PRO', admin_db_prefix.'estimate_comm_product');
define('ESTIMATE_NONCOMM', admin_db_prefix.'estimate_noncomm');
define('ESTIMATE_NONCOMM_PRO', admin_db_prefix.'estimate_noncomm_product');

//Invoice
define('INVOICE_COMM', admin_db_prefix.'invoice_comm');
define('INVOICE_COMM_PRO', admin_db_prefix.'invoice_comm_product');
define('INVOICE_NONCOMM', admin_db_prefix.'invoice_noncomm');
define('INVOICE_NONCOMM_PRO', admin_db_prefix.'invoice_noncomm_product');

define('SALES_ORDER_PRODUCT', admin_db_prefix.'sales_order_product');
define('SALES_INVOICE', admin_db_prefix.'sales_invoice');
define('SALES_INVOICE_PRODUCT', admin_db_prefix.'sales_invoice_product');
define('SALES_ESTIMATE', admin_db_prefix.'sales_estimate');
define('SALES_ESTIMATE_PRODUCT', admin_db_prefix.'sales_estimate_product');
define('INNER_SHEET', admin_db_prefix.'inner_sheet');
define('SPECIAL_EFFECTS', admin_db_prefix.'special_effects');
define('SIZE', admin_db_prefix.'size');
define('ORDER_STATUS', admin_db_prefix.'order_status');
define('TYPES', admin_db_prefix.'types');
define('BAG', admin_db_prefix.'bag');
define('BOX', admin_db_prefix.'box');
define('PAD', admin_db_prefix.'pad');
define('COMMERCIAL_PRODUCTS', admin_db_prefix.'commercial_products');
define('ITEMS', admin_db_prefix.'items');
define('ORDER_PAYMENT', admin_db_prefix.'order_payment');
define('BULK_PAYMENT_COMM', admin_db_prefix.'advance_bill_comm');
define('BULK_PAYMENT_NONCOMM', admin_db_prefix.'advance_bill_noncomm');

// Sale order 
define('SO_PREFIX_NAME', 'ERPSO');
define('SO_SHORT_DESC', '<br>
1. Goods under this Sales Quote are supplied on your Account and Risk.<br>
2. The amount of this Sales Quote should be paid on the due date else interest @18% per annum and applicable GST will be charged from the date of sales quote till the actual payment.<br>
3. All payments should be made by RTGS/NEFT/A/c. payee cheque/Draft/irrevocable letter of credit drawn in favour of Raaja Magnetics Limited.<br>
4. All claims for Goods lost or damaged in transit or discrepancies of any kind (including shortages in weight and non-delivery) must be made upon the carrier or insurance Company as applicable.<br>
5. All disputes under this will be settled by Competent Court within the jurisdication of Madurai.<br>');
define('SO_LOGO', 'assets/images/logo_flex_login.png');
define('SO_NAME', '');
define('SO_CURRENCY', 'assets/images/RS.png');
define('SELLER_NAME', 'CDS');
define('SELLER_ADDRESS', '2770 Main Street, Suite 93');
define('SELLER_CITY', 'Frisco');
define('SELLER_STATE', 'TX');
define('SELLER_PINCODE', '75033');
define('SELLER_PHONE', '9876543210');
define('SELLER_CODE', '12345678');
define('SELLER_GST_NO', 'GSTIN123456Z1');



/**** SQL CONNECTION START ****/
// Simple, clean connection
$org_link = mysqli_connect($org_servername, $org_dbusername, $org_dbpassword, $org_dbname);

// Check if connection worked
if (!$org_link) {
    die("Could not connect to MySQL: " . mysqli_connect_error());
}

// Set UTF-8 encoding (for special characters)
mysqli_set_charset($org_link, "utf8");

// Disable strict SQL mode
mysqli_query($org_link, "SET SESSION sql_mode = ''");

// Save connection for old code that uses $GLOBALS
$GLOBALS["___mysqli_ston"] = $org_link;

/**** SQL CONNECTION END ****/

?>