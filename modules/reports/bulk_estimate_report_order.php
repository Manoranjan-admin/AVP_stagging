<?php
error_reporting(0);
/*
$from_date ="";
$to_date="";
if(isset($_POST['submit'])){ 
  $from_date1 = $_POST['fromDate']; 
  $to_date1 = $_POST['toDate'];
  
   $from_date2 = str_replace('/', '-', $from_date1);
    $to_date2 = str_replace('/', '-', $to_date1);
	$from_date = date('Y-m-d', strtotime($from_date2)); 
    $to_date = date('Y-m-d', strtotime($to_date2));
   
}  */
$title =  '';
if(isset($_GET['typ']) && $_GET['typ'] == 1)
{
    $title = 'Commercial';
}else if(isset($_GET['typ']) && $_GET['typ'] ==2)
{
    $title = 'Non Commercial';
}
include "classes/class_customer.php";
$obj_cus = new Customer('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $GLOBALS["___mysqli_ston"]);

include("classes/class_report.php");
$obj_saleorder = new Report('', '');

$getcustomer = $obj_cus->getAllCustomer();

$cus_data = array();
while ($cus_rows = mysqli_fetch_array($getcustomer)) {
    $cus_data[] = $cus_rows;
}

$getsize = $obj_cus->getAllSize();
$size_data = array();
while ($size_rows = mysqli_fetch_array($getsize)) {
    $size_data[] = $size_rows;
}


$bulktot_data =array();

if(isset($_GET['typ']) && $_GET['typ'] == 1)
{
    $getbulktot = $obj_saleorder->getCommBulkTotal($_GET['id']);
    $bulktot_data = mysqli_fetch_array($getbulktot);
     
}
else if(isset($_GET['typ']) && $_GET['typ'] == 2)
{
    $getbulktot = $obj_saleorder->getNonCommBulkTotal($_GET['id']);
    $bulktot_data = mysqli_fetch_array($getbulktot);
    
}


?>
<div class="content-wrapper" style="min-height: 1342.88px;">
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
            <div class="row mb-2">
                <div class="col-sm-12">
                    <form class="row" autocomplete="off" method="post" id="rmcyte_employee">
                        <div class="col-lg-12">
                            <h4 class="mb-3 mt-0"><?php echo $title; ?> Bulk Order by Reports</h4>
                        </div>
                        <!--<div class="col-lg-2 form-group">
                            <label for="name">From Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="<?php 
                                            echo date('m/d/Y', strtotime("-1 months")); 
                                        ?>" name="from_date" id="from_date" placeholder="">
                        </div>

                        <div class="col-lg-2 form-group">
                            <label for="email">To Date</label>
                            <input type="text" class="form-control" value="<?php echo date('m/d/Y') ?>" name="to_date"
                                id="to_date" placeholder="">
                        </div>-->
                      <!--  <div class="col-lg-2 form-group">
                            <label for="name">Customer <span class="text-danger">*</span></label>
                            <select class="form-control txt_customer_name " name="txt_customer_name"
                                id="txt_customer_name">
                                <option value="">Select Customer</option>
                                <?php for ($i = 0; $i < count($cus_data); $i++) {?>
                                <option value="<?php echo $cus_data[$i]['pk_cus_id']; ?>">
                                    <?php echo $cus_data[$i]['cus_name'] . " - (" . $cus_data[$i]['cus_code'] . ")"; ?>
                                </option>
                                <?php }?>
                            </select>

                        </div>
                        <?php  if($_GET['typ'] == 2){ ?>
                        <div class="col-lg-2 form-group">
                            <label for="name">Size <span class="text-danger">*</span></label>
                            <select class="form-control txt_size_name " name="txt_size_name" id="txt_size_name">
                                <option value="">Select Size</option>
                                <?php for ($i = 0; $i < count($size_data); $i++) {?>
                                <option value="<?php echo $size_data[$i]['pk_items_id']; ?>">
                                    <?php echo $size_data[$i]['fk_item_id'] ; ?>
                                </option>
                                <?php }?>
                            </select>

                        </div>
                        <?php } ?>
                        <div class="col-lg-4 pt-4 ">
                            <input type="button" class="btn btn-info btn-lg butttns" value="Search" id="report_search">
                            <input type="reset" class="btn btn-primary btn-lg" value="Reset" id="report_reset">
                        </div>-->
                    </form>
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
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="row p-3 text-center">
							<div class="col-md-6 bg-warning text-black  bgboxtxt ">
                                Order Total(₹):
                                <span ><?php echo number_format($bulktot_data['ordertotal'],2); ?></span>
                            </div>
                            <div class="col-md-6 bg-warning text-black  bgboxtxt">
                            Amount Received (₹):
                                <span ><?php echo number_format($bulktot_data['advance_amount'],2); ?></span>
                            </div>
                            
                            </div>
                            <div class="row p-3 text-center">
                            <div class="col-md-6 bg-warning text-black  bgboxtxt">
                                Discount(₹):
                                <span><?php echo number_format($bulktot_data['discount'],2); ?></span>
                            </div>
                            <div class="col-md-6 bg-warning text-black  bgboxtxt">
                               Balance(₹):
                                <span ><?php 
                                 $amtbalance =  0.00;
                                if($bulktot_data['ordertotal'] == $bulktot_data['advance_amount']){
                                    $amtbalance = 0.00;
                                }else{
                                    $amtbalance = $bulktot_data['ordertotal'] - ($bulktot_data['advance_amount'] + $bulktot_data['discount'] + $bulktot_data['advancetotal'] );
                                }
                                echo number_format($amtbalance,2); ?></span>
                            </div>
                        </div>
                       
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <!-- DATA TABLE-->
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                    aria-labelledby="nav-waiting-tab">
                                    <?php //echo $tableData;?>

                                    <table id="estimateTable"
                                        class="table table-bordered table-striped  dtr-inline" style='width:100%'>
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>Date</th>
                                                <th>Order No</th>
                                                <th>Customer Code</th>
                                                <th>Customer Name</th>
                                                <th>Mode</th>
                                                <th>Receipts Type</th>
                                                <th>Orientation </th>
                                                <th>Items</th>
                                                <th>Advance(₹)</th>
                                                <th>Bill Receipt(₹)</th>
                                                <th>Total Amount(₹)</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td valign="top" colspan="11" class="dataTables_empty">No matching
                                                    records found</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="8" style="text-align:right" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>


                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
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


</style>

<script>
//var minDate, maxDate;

$('#txt_customer_name').select2();
$('#txt_size_name').select2();

/*$('#report_reset').on('click', function() {

    $('#txt_customer_name').find("option:selected").prop("selected", false)

    $('#txt_customer_name').trigger('change');

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


var dataRecords = $('#estimateTable').DataTable({

    "footerCallback": function(row, data, start, end, display) {
        var roleId = $('#getSessRollId').val();

        if (roleId == 999 || roleId == 1) {

            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            // Total over all pages
            total1 = api
                .column(9)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal1 = api
                .column(9, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(9).footer()).html(
                '₹' + pageTotal1.toFixed(2)
            );
            total2 = api
                .column(10)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal2 = api
                .column(10, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(10).footer()).html(
                '₹' + pageTotal2.toFixed(2)
            );
            total3 = api
                .column(11)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal3 = api
                .column(11, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(11).footer()).html(
                '₹' + pageTotal3.toFixed(2)
            );

        }
    },
     paginate: false,

    "lengthChange": false,
    "searchable": false,
    searching: false,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "bjQueryUI": true,
    "order": [],
    'columnDefs': [{
    'targets': [9,10,11],
    'className': 'dt-body-right',
    }],
    "dom": 'Blfrtip',
    /*"buttons":
    {
            extend: 'pdf', title: 'Station Report',
            extend: 'csv', title: 'Station Report',
            extend: 'excel', title: 'Station Report'
    },*/
    buttons: [{
            extend: 'print',
            text: '<span class="mdi mdi-file-print"></span> Print',
            title: 'Customer Report',
            action: newexportaction1,

            exportOptions: {
                modifier: {
                    search: 'applied',
                    order: 'applied'
                }
            },
            footer: true

        },

        {
            extend: 'excel',
            text: '<span class="mdi mdi-file-print"></span> Excel',
            title: 'Periodical Report',
            action: newexportaction1,

            exportOptions: {
                modifier: {
                    search: 'applied',
                    order: 'applied'
                }
            },
            // footer: true

        },
        /*  {
              extend: 'pdf',
              text: '<span class="mdi mdi-file-pdf"></span> PDF',
              title: 'Periodical Report',
              action: newexportaction1,

              orientation: 'landscape',
              pageSize: 'LEGAL'
          }*/
    ],



    "ajax": {
        url: "modules/reports/ajax_functions.php",
        type: "POST",
        //  data: { mode: 'filterlistSalesOrder' },
        data: function(d) {
            d.mode = 'listBulkOrderByReport';
            d.fromDate = $('#from_date').val();
            d.toDate = $('#to_date').val();
            d.txt_customer_name = $('#txt_customer_name ').val();
            d.bulkid = <?php echo $_GET['id']; ?>;

            if (2 == <?php echo $_GET['typ']; ?>) {
                d.txt_size_name = $('#txt_size_name ').val();
            }

            d.typ = <?php echo $_GET['typ']; ?>;
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
/*
$('.search_key').on('click', function(e) {
    if ($('.searchKeyword').val() != '') {
        dataRecords.search($('.searchKeyword').val()).draw();
    } else {
        dataRecords.search('').columns().search('').draw();
    }
});*/


$('#report_reset').on('click', function() {

    /* $('#txt_customer_name').select2("val", '');
     $('#txt_size_name').select2("val", '');
     $('#txt_customer_name').trigger('change.select2');
     $('#txt_size_name').trigger('change.select2');*/

    $('#txt_customer_name').prop('selectedIndex', 0);
    $('#txt_customer_name').trigger('change.select2');
    $('#txt_size_name').prop('selectedIndex', 0);
    $('#txt_size_name').trigger('change.select2');

    dataRecords.draw();


});


$('#report_search').on('click', function() {
    dataRecords.draw();
});
/*
$('#txt_size_name').on('change', function() {
    dataRecords.draw();
});
$('#txt_customer_name').on('change', function() {
    dataRecords.draw();
});*/
/*$('#from_date').on('change', function() {
    dataRecords.draw();
});

$('#to_date').on('change', function() {
    dataRecords.draw();
});*/

/*
$('#to_date').on('change', function() {
    dataRecords.draw();
});*/

/*
$('#report_status_id').on('change', function() {
    dataRecords.draw();
});
$('#from_date').on('change', function() {
    dataRecords.draw();
});

$('#to_date').on('change', function() {
    dataRecords.draw();
});*/
</script>

<script type="text/javascript">
var dateNow = new Date();
/*$('#txt_pi_date').datepicker({
  dateFormat: 'dd-mm-yy',
     defaultDate: new Date() 
});*/
var disableddate = new Date();

disableddate.setDate(disableddate.getDate());

$('#txt_pi_date').datepicker({
    format: "dd/mm/yyyy"
}).datepicker('setDate', dateNow);
/*$("#txt_pi_date").datepicker({
        dateFormat: "yy-mm-dd"
    }).datepicker("setDate", dateNow);*/
/*$("#txt_pi_date").datepicker({
        dateFormat: 'd/m/Y'
    }).datepicker('setDate', dateNow)*/

$('#txt_delivery_date').datepicker({
    format: "dd/mm/yyyy",
    startDate: disableddate
}).datepicker('setDate', dateNow);
/*
$('#txt_delivery_date').datetimepicker({
  format:'d/m/Y',
  timepicker:false,
   minDate:0
});
$('#fromDate').datetimepicker({
  format:'d/m/Y',
   timepicker:false,
  // minDate:0
});
$('#toDate').datetimepicker({
  format:'d/m/Y',
   timepicker:false,
  // minDate:0
});*/
/*
$('#from_date').datepicker({
     format: 'mm/dd/yy',
    dateFormat: 'mm/dd/yy',
    autoclose: true,
    todayHighlight: true,
    onSelect: function(selectedDate) {
     $('#to_date').datepicker('option', 'minDate', selectedDate);
     dataRecords.draw();
    //$('#to_date').datepicker('option', {minDate: minDate})
    }

});
$('#to_date').datepicker({
    minDate: "<?php echo date('m/d/Y', strtotime('-1 months')); ?>",
    dateFormat: 'mm/dd/yy',
    autoclose: true,
    todayHighlight: true
});*/
</script>