<?php

error_reporting(1);



include "classes/class_customer.php";

$obj_cus = new Customer('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $GLOBALS["___mysqli_ston"]);

$getcustomer = $obj_cus->getAllCustomer();

$cus_data = array();

while ($cus_rows = mysqli_fetch_array($getcustomer)) {

    $cus_data[] = $cus_rows;

}

$getfranchise  = $obj_cus->getAllFrachise();

$franch_data = array();

while ($franch_rows = mysqli_fetch_array($getfranchise)) {

    $franch_data[] = $franch_rows;

}





	if($_GET['type']==1){	

	$heading='Commercial Collection Report';

	}else if($_GET['type']==2){

	$heading='Non Commercial Collection Report';

	}		

							



function getTable($customerID,$tableName,$payTable)

{

	$query = "SELECT est.PK_ES_ID, (est.grand_total) as totalAmt,est.sono, est.sale_date,est.order_status,est.delivery_date FROM ".$tableName." as est where est.order_status != 6";

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

	

		

		$tableBody='';

        if(mysqli_num_rows($result)  > 0){

			$counter=1;

            while($data= mysqli_fetch_array($result)) 

			{

				

               $advance=getReceipts($data['PK_ES_ID'],0,$payTable);

			   $receipts=getReceipts($data['PK_ES_ID'],1,$payTable);

			   $tableBody .='	

							

                              <tr>

                                <td>'.$counter.'</td>

                                <td>'.$data['sono'].'</td>

								<td>'.$data['sale_date'].'</td>

								<td>'.$data['sale_date'].'</td>

								<td>'.date("d-M-Y", strtotime($data['sale_date'])).'</td>

                                <td style="text-align:right;">'.number_format($data['totalAmt'],2).'</td>

								<td style="text-align:right;">'.number_format($advance,2).'</td>                                      

								<td style="text-align:right;">'.number_format($receipts,2).'</td>  

								<td style="text-align:right;">'.number_format($data['totalAmt']-($receipts+$advance),2).'</td>                                <td><a href="index.php?erp=97&typ=1&cusid='.$data['pk_cus_id'].'" class="btn btn-primary  btn-sm">'.getStatus($data["order_status"]).'</a></td>

                              </tr>

                            ';

							$counter++;

            }

        }	

							



return $tableBody;

}



function getReceipts($cusID,$type,$payTable)

{

	

	

	$query = "SELECT sum(advance_amount) as advance FROM ".$payTable." where fk_es_id=".$cusID." and type=".$type;

		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

	

		$returnValue='0';

        $estimatecomm=array();	

        if(mysqli_num_rows($result)  > 0){

			$counter=1;

            while($data= mysqli_fetch_array($result)) 

			{

				$returnValue=$data['advance'];

			}

		}

		return $returnValue;

}

function getStatus($status)

{

	

	switch ($status) 

	{

	  case 0:

		return("Yet to Start");

		break;

	   case 1:

		return("Designing");

		break;

	 case 2:

		return("Printing");

		break;

	 case 3:

		return("Lamination");

		break;

	 case 4:

		return("Finishing");

		break;

	 case 5:

		return("Ready for Delivery");

		break;

	 case 6:

		return("Delivered");

		break;	

	  default:

		return("Yet to Start");

	}

}



?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1><?php echo $heading;?> </h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>



                    </ol>

                </div>

            </div>

        </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <!-- left column -->

                <div class="col-md-12">

                    <form class="row" autocomplete="off" method="post" id="rmcyte_employee">



                        <div class="row">

                            <div class=" col-md-1 form-group col-md-auto">

                                <label for="name">From Date <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" value="" name="from_date" id="from_date_filter"
                                    placeholder="">

                            </div>



                            <div class=" col-md-1 form-group col-md-auto">

                                <label for="email">To Date <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" value="" name="to_date" id="to_date_filter"
                                    placeholder="">

                            </div>

                            <div class=" col-md-2 form-group col-md-auto">

                                <label for="name">Mode of Receipts <span class="text-danger"></span></label>

                                <select class="form-control txt_mode_payment " name="txt_mode_payment"
                                    id="txt_mode_payment">

                                    <option value="">Select Mode of Receipts</option>

                                    <option value="1">Cash</option>

                                    <option value="2">Credit Card</option>

                                    <option value="3">UPI</option>
                                    <option value="4">Bank Transfer</option>
                                    <option value="5">Cheque</option>

                                </select>



                            </div>

                            <div class=" col-md-2 form-group col-md-auto">

                                <label for="name">Receipt Type <span class="text-danger"></span></label>

                                <select class="form-control txt_receipt_type " name="txt_receipt_type"
                                    id="txt_receipt_type">

                                    <option value="1">Single</option>

                                    <option value="2">Bulk</option>

                                </select>



                            </div>





                            <div class=" col-md-2 form-group col-md-auto">

                                <label for="name">Franchise <span class="text-danger"></span></label>

                                <select class="form-control txt_franchise_name " name="txt_franchise_name"
                                    id="txt_franchise_name">

                                    <option value="">Select Franchise</option>

                                    <?php for ($i = 0; $i < count($franch_data); $i++) {?>

                                    <option value="<?php echo $franch_data[$i]['pk_cat_id']; ?>">

                                        <?php echo $franch_data[$i]['cat_name'] ; ?>

                                    </option>

                                    <?php }?>

                                </select>



                            </div>

                            <div class=" col-md-2 form-group col-md-auto">

                                <label for="name">Customer <span class="text-danger"></span></label></br>

                                <select class="form-control txt_customer_name" name="txt_customer_name"
                                    id="txt_customer_name">

                                    <option value="">Select Customer</option>

                                    <?php for ($i = 0; $i < count($cus_data); $i++) {?>

                                    <option value="<?php echo $cus_data[$i]['pk_cus_id']; ?>">

                                        <?php echo $cus_data[$i]['cus_name'] . " - (" . $cus_data[$i]['cus_code'] . ")"; ?>

                                    </option>

                                    <?php }?>

                                </select>



                            </div>

                            <!--<div class="form-group col-md-auto">

                            <label for="name">Customer <span class="text-danger">*</span></label>

                            <select class="form-control txt_customer_name "

                                                        name="txt_customer_name" id="txt_customer_name"

                                                       >

                                                        <option value="">Select Customer</option>

                                                        <?php for ($i = 0; $i < count($cus_data); $i++) {?>

                                                        <option value="<?php echo $cus_data[$i]['pk_cus_id']; ?>">

                                                            <?php echo $cus_data[$i]['cus_name'] . " - (" . $cus_data[$i]['cus_code'] . ")"; ?>

                                                        </option>

                                                        <?php }?>

                                                    </select>

                           

                        </div>-->

                            <div class="col-md-2">

                                <input type="button" class="btn btn-info btn-lg butttns" value="Search"
                                    id="report_search">

                                                      <input type="button" class="btn btn-primary btn-lg butttns" value="Reset"
                                    id="report_reset">

                            </div>

                        </div>

                        <!--<div class="container">

						  <div class="row justify-content-md-center">

							<div class="col col-lg-2">

							 <input type="button" class="btn btn-info btn-lg" value="Search" id="report_search">

							</div>

							<div class="col-md-auto">

							  <input type="button" class="btn btn-primary btn-lg" value="Reset" id="report_reset">

							</div>

						  </div>

						</div>

						

						<div class="col-lg-12">

                             <div class="col-lg-1 pt-4">

                            <input type="search" class="btn btn-info btn-lg" value="Search" id="report_search">

                            

                        </div>

                        <div class="col-lg-1 pt-4">

                            <input type="reset" class="btn btn-primary btn-lg" value="Reset" id="report_reset">

                            

                        </div>

                        </div>-->





                    </form>

                    <form id="frm-example" name="frm-example" method="POST"
                        action="index.php?erp=105&type=<?php echo $_GET['type']; ?>">



                        <!-- jquery validation -->

                        <div class="card card-primary">

                            <!-- <div class="card-header">

                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>

              </div> -->

                            <!-- /.card-header -->

                            <!-- form start -->

                            <div class="card-body">

                                <!-- DATA TABLE-->





                                <div class="tab-content" id="nav-tabContent">

                                    <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                        aria-labelledby="nav-waiting-tab">

                                        <?php if(isset($_GET['type']) &&  $_GET['type']== 1){ ?>



                                        <table id="estimateTable"
                                            class="table table-bordered table-striped dataTable dtr-inline">

                                            <thead>

                                                <tr>



                                                    <th>S.No </th>

                                                    <th>Date Of Receipts</th>

                                                    <th>Estimate Number</th>

                                                    <th>Amount(₹)</th>

                                                    <th>Mode</th>

                                                    <th>Customer</th>

                                                    <th>Franchise</th>

                                                    <th>Type</th>





                                                </tr>

                                            </thead>



                                            <tbody>

                                                <?php //echo getTable($_GET['cusid'],'erp_estimate_comm','erp_advance_comm');?>



                                            </tbody>
                                            <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) {?>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3" style="text-align:right"></th>
                                                    <th colspan="1" style="text-align:right"></th>
                                                    <th colspan="4"></th>
                                                </tr>
                                            </tfoot> <?php } ?>

                                        </table>

                                        <br />

                                        <?php } else if(isset($_GET['type']) &&  $_GET['type']== 2){  ?>



                                        <table id="estimateTable"
                                            class="table table-bordered table-striped dataTable dtr-inline">

                                            <thead>

                                                <tr>



                                                    <th>S.No </th>

                                                    <th>Date Of Receipts</th>

                                                    <th>Estimate Number</th>

                                                    <th>Amount(₹)</th>

                                                    <th>Mode</th>

                                                    <th>Customer</th>

                                                    <th>Franchise</th>

                                                    <th>Type</th>





                                                </tr>

                                            </thead>



                                            <tbody>

                                                <?php //echo getTable($_GET['cusid'],'erp_estimate_noncomm','erp_advance_noncomm');?>



                                            </tbody>
                                            <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) {?>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3" style="text-align:right"></th>
                                                    <th colspan="1" style="text-align:right"></th>
                                                    <th colspan="4"></th>
                                                </tr>
                                            </tfoot> <?php } ?>

                                        </table>

                                        <?php } ?>

                                    </div>



                                </div>



                            </div>

                        </div>

                    </form>

                    <!-- /.card -->

                </div>

                <!--/.col (left) -->

                <!-- right column -->



                <!--/.col (right) -->

            </div>

            <!-- /.row -->

        </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

</div>











<style type="text/css">
.dataTables_wrapper {

    margin-top: 14px;

}



.txt_customer_name {

    height: 35px;

    width: 250px;

}

.butttns {

    margin: 20px;

}



.ui-datepicker {

    font-size: 5%;

}



.ui-widget-header {

    background: #77CC6D;

}



.ui-widget-content .ui-state-default:hover {

    background: #77CC6D;

    border-radius: 2px;

}


</style>



<script>
$('#txt_customer_name').select2();
$('#txt_mode_payment').select2();
$('#txt_franchise_name').select2();
$('#txt_receipt_type').select2();

function newexportaction1(e, dt, button, config) {

    var self = this;

    var oldStart = dt.settings()[0]._iDisplayStart;

    dt.one('preXhr', function(e, s, data) {

        // Just this once, load all data from the server...

        data.start = 0;

        data.length = 2147483647;

        dt.one('preDraw', function(e, settings) {

            // Call the original action function

            if (button[0].className.indexOf('buttons-copy') >= 0) {

                $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);

            } else if (button[0].className.indexOf('buttons-excel') >= 0) {

                $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?

                    $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :

                    $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);

            } else if (button[0].className.indexOf('buttons-csv') >= 0) {

                $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?

                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :

                    $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);

            } else if (button[0].className.indexOf('buttons-pdf') >= 0) {

                $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?

                    $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :

                    $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);

            } else if (button[0].className.indexOf('buttons-print') >= 0) {

                $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);

            }

            dt.one('preXhr', function(e, s, data) {

                // DataTables thinks the first item displayed is index 0, but we're not drawing that.

                // Set the property to what it was before exporting.

                settings._iDisplayStart = oldStart;

                data.start = oldStart;

            });

            // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.

            setTimeout(dt.ajax.reload, 0);

            // Prevent rendering of the full data to the DOM

            return false;

        });

    });

    // Requery the server with the new one-time export settings

    dt.ajax.reload();

};

var dataRecords = $('#estimateTable').DataTable({
    "footerCallback": function(tfoot, data, start, end, display) {
        var api = this.api();
        var intVal = function(i) {
            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
        };
        total = api.column(3).data().reduce(function(a, b) {
            return intVal(a) + intVal(b);
        }, 0);
        console.log(total);
        pageTotal = api.column(3, {
            page: 'current'
        }).data().reduce(function(a, b) {
            return intVal(a) + intVal(b);
        }, 0);
        $(api.column(3).footer())
            .html( /*  api.column( 3 ).data().reduce( function ( a, b ) {            return a + b;        }, 0 )*/
                '₹' + pageTotal.toFixed(2));
    },

    "lengthChange": true,

    "processing": true,

    "serverSide": true,

    "ordering": false,

    // "bjQueryUI": true,

    "order": [],

    //"dom": 'Blfrtip',

    'columnDefs': [{

        'targets': 0,

        'searchable': false,

        'orderable': false,

        'className': 'dt-body-center',

    }, {
        'targets': 3,
        'className': 'dt-body-right',
    }],

    "dom": 'Blfrtip',

    buttons: [

        'print', 'excel'

    ],







    "ajax": {

        url: "modules/reports/ajax_functions.php",

        type: "POST",

        //  data: { mode: 'filterlistSalesOrder' },

        data: function(d) {

            d.mode = 'collection_report';

            d.fromDate = moment($('#from_date_filter').val()).format('mm/dd/yyyy');

            d.toDate =moment($('#to_date_filter').val()).format('mm/dd/yyyy');

            d.txt_mode_payment = $('#txt_mode_payment ').val();

            d.txt_receipt_type = $('#txt_receipt_type ').val();

            d.txt_customer_name = $('#txt_customer_name ').val();

            d.txt_franchise_name = $('#txt_franchise_name ').val();

            d.typ = <?php echo $_GET['type']; ?>;

            //  d.mo_id = $('#mo_id').find(":selected").val();

            //        d.report_status_id = $('#report_status_id').find(":selected").val();

        },

        dataType: "json",



    },



    "lengthMenu": [

        [10, 25, 50, -1],

        [10, 25, 50, "All"]

    ],

    "pageLength": 10,



});


$('#report_reset').on('click', function() {

    $('#txt_customer_name').prop('selectedIndex',0);
    $('#txt_customer_name').trigger('change.select2');
    $('#txt_mode_payment').prop('selectedIndex',0);
    $('#txt_mode_payment').trigger('change.select2');
    $('#txt_franchise_name').prop('selectedIndex',0);
    $('#txt_franchise_name').trigger('change.select2');
    $('#txt_receipt_type').prop('selectedIndex',0);
    $('#txt_receipt_type').trigger('change.select2');
    $('#from_date_filter').val('');

    $('#to_date_filter').val('');

dataRecords.draw();


});

$('#report_search').on('click', function() {



dataRecords.draw();



});

var table1 = $('#estimateTable').DataTable();
var column = table.column(3);
$(column.footer()).html(column.data().reduce(function(a, b) {
    return a + b;
}));

/*

$('#txt_mode_payment').on('change', function() {

    dataRecords.draw();

});

$('#txt_receipt_type').on('change', function() {

    dataRecords.draw();

});

$('#txt_customer_name').on('change', function() {

    dataRecords.draw();

});

$('#txt_franchise_name ').on('change', function() {

    dataRecords.draw();

});

$('#from_date').on('change', function() {

    dataRecords.draw();

});



$('#to_date').on('change', function() {

    dataRecords.draw();

});*/

function newexportaction1(e, dt, button, config) {

    var self = this;

    var oldStart = dt.settings()[0]._iDisplayStart;

    dt.one('preXhr', function(e, s, data) {

        // Just this once, load all data from the server...

        data.start = 0;

        data.length = 2147483647;

        dt.one('preDraw', function(e, settings) {

            // Call the original action function

            if (button[0].className.indexOf('buttons-copy') >= 0) {

                $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);

            } else if (button[0].className.indexOf('buttons-excel') >= 0) {

                $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?

                    $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :

                    $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);

            } else if (button[0].className.indexOf('buttons-csv') >= 0) {

                $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?

                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :

                    $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);

            } else if (button[0].className.indexOf('buttons-pdf') >= 0) {

                $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?

                    $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :

                    $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);

            } else if (button[0].className.indexOf('buttons-print') >= 0) {

                $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);

            }

            dt.one('preXhr', function(e, s, data) {

                // DataTables thinks the first item displayed is index 0, but we're not drawing that.

                // Set the property to what it was before exporting.

                settings._iDisplayStart = oldStart;

                data.start = oldStart;

            });

            // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.

            setTimeout(dt.ajax.reload, 0);

            // Prevent rendering of the full data to the DOM

            return false;

        });

    });

    // Requery the server with the new one-time export settings

    dt.ajax.reload();

};

// Handle click on "Select all" control

$('#example-select-all').on('click', function() {

    // Get all rows with search applied

    var rows = dataRecords.rows({
        'search': 'applied'
    }).nodes();

    // Check/uncheck checkboxes for all rows in the table

    $('input[type="checkbox"]', rows).prop('checked', this.checked);

});



// Handle click on checkbox to set state of "Select all" control

$('#example tbody').on('change', 'input[type="checkbox"]', function() {

    // If checkbox is not checked

    if (!this.checked) {

        var el = $('#example-select-all').get(0);

        // If "Select all" control is checked and has 'indeterminate' property

        if (el && el.checked && ('indeterminate' in el)) {

            // Set visual state of "Select all" control

            // as 'indeterminate'

            el.indeterminate = true;

        }

    }

});

$('#frm-example').on('submit', function(e) {



    var form = this;

    // Iterate over all checkboxes in the table

    if (!$('input[type="checkbox"]').is(':checked')) {

        e.preventDefault();

        return false;

    } else {



        dataRecords.$('input[type="checkbox"]').each(function() {

            // If checkbox doesn't exist in DOM

            if (!$.contains(document, this)) {

                // If checkbox is checked

                if (this.checked) {

                    // Create a hidden element

                    //alert(this.name);

                    $(form).append(

                        $('<input>')

                        .attr('type', 'hidden')

                        .attr('name', this.name)

                        .val(this.value)

                    );

                }

            }

        });

    }

});
</script>



<style type="text/css">





</style>