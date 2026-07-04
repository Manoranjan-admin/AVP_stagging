<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
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

//include "classes/class_customer.php";
//$obj_cus = new Customer('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $GLOBALS["___mysqli_ston"]);

include("classes/class_report.php");
$obj_saleorder = new Report('', '');

$title = '';
$getAllitems = array();

if (isset($_GET['typ']) && $_GET['typ'] == 1) {
    $title = 'Commercial';
    $getAllitems1 = $obj_saleorder->getAllCommitemsproduct(1);
    $getAllitems2 = $obj_saleorder->getAllCommitemsproduct(2);
    $getAllitems3 = $obj_saleorder->getAllCommitemsproduct(3);
    $getAllitems6 = $obj_saleorder->getAllCommitemsproduct(6);
    $getAllitems7 = $obj_saleorder->getAllCommitemsproduct(7);
} else if (isset($_GET['typ']) && $_GET['typ'] == 2) {
    $title = 'Non Commercial';
    $getAllitems1 = $obj_saleorder->getAllNonCommitemsproduct(1);
    $getAllitems2 = $obj_saleorder->getAllNonCommitemsproduct(2);
    $getAllitems3 = $obj_saleorder->getAllNonCommitemsproduct(3);
    $getAllitems4 = $obj_saleorder->getAllNonCommitemsproduct(4);
    $getAllitems6 = $obj_saleorder->getAllNonCommitemsproduct(6);
    $getAllitems7 = $obj_saleorder->getAllNonCommitemsproduct(7);
}

$items_data1 = array();
if (isset($getAllitems1) && mysqli_num_rows($getAllitems1) > 0) {
    while ($items_rows1 = mysqli_fetch_array($getAllitems1)) {
        $items_data1[] = $items_rows1;
    }
}

$items_data2 = array();
if (isset($getAllitems2) && mysqli_num_rows($getAllitems2) > 0) {
    while ($items_rows2 = mysqli_fetch_array($getAllitems2)) {
        $items_data2[] = $items_rows2;
    }
}

$items_data3 = array();
if (isset($getAllitems3) && mysqli_num_rows($getAllitems3) > 0) {
    while ($items_rows3 = mysqli_fetch_array($getAllitems3)) {
        $items_data3[] = $items_rows3;
    }
}

$items_data4 = array();
if (isset($getAllitems4) && mysqli_num_rows($getAllitems4) > 0) {
    while ($items_rows4 = mysqli_fetch_array($getAllitems4)) {
        $items_data4[] = $items_rows4;
    }
}

$items_data6 = array();
if (isset($getAllitems6) && mysqli_num_rows($getAllitems6) > 0) {
    while ($items_rows6 = mysqli_fetch_array($getAllitems6)) {
        $items_data6[] = $items_rows6;
    }
}

$items_data7 = array();
if (isset($getAllitems7) && mysqli_num_rows($getAllitems7) > 0) {
    while ($items_rows7 = mysqli_fetch_array($getAllitems7)) {
        $items_data7[] = $items_rows7;
    }
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
                    <!--	
<form action="" method="post">
		  <p id="date_filter">
    <span id="date-label-from" class="date-label">From Date: </span><input class="date_range_filter date" type="text" id="fromDate" name="fromDate" />
    <span id="date-label-to" class="date-label">To Date:<input class="date_range_filter date" type="text" id="toDate" name="toDate" />
</p>
<button type="submit" name="submit" class="btn btn-info">Search</button>
</form> -->

                    <form class="row" autocomplete="off" method="post" id="rmcyte_employee">
                        <div class="col-lg-12">
                            <h4 class="mb-3 mt-0"><?php echo $title; ?> Product Reports</h4>
                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="name">From Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"
                                value="<?php echo date('d/m/Y', strtotime("-1 months")); ?>" name="from_date"
                                id="from_date" placeholder="">
                        </div>

                        <div class="col-lg-2 form-group">
                            <label for="email">To Date</label>
                            <input type="text" class="form-control" value="<?php echo date('d/m/Y') ?>" name="to_date"
                                id="to_date" placeholder="">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="name">Product <span class="text-danger">*</span></label>
                            <select class="form-control txt_items_name " name="txt_items_name[]" id="txt_items_name"
                                multiple>
                                <option selected value="ALL">ALL</option>
                                <?php for ($i = 0; $i < count($items_data1); $i++) {?>
                                <option value="<?php echo $items_data1[$i]['pk_items_id']; ?>">
                                    <?php echo $items_data1[$i]['fk_item_id'] ; ?>
                                </option>
                                <?php }?>
                            </select>
                            <span id="producterrorMsg"></span>

                        </div>
                        <?php if(isset($_GET['typ']) && $_GET['typ'] == 2){ ?>
                        <div class="col-lg-2 form-group">
                            <label for="txt_items_category">Category <span class="text-danger">*</span></label>
                            <select class="form-control txt_items_category " name="txt_items_category[]"
                                id="txt_items_category" multiple>
                                <option selected value="ALL">ALL</option>
                                <?php for ($i = 0; $i < count($items_data2); $i++) {?>
                                <option value="<?php echo $items_data2[$i]['pk_items_id']; ?>">
                                    <?php echo $items_data2[$i]['fk_item_id'] ; ?>
                                </option>
                                <?php }?>
                            </select>
                            <span id="categoryerrorMsg"></span>

                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="txt_items_size">Size <span class="text-danger">*</span></label>
                            <select class="form-control txt_items_size " name="txt_items_size[]" id="txt_items_size"
                                multiple>
                                <option selected value="ALL">ALL</option>
                                <?php for ($i = 0; $i < count($items_data3); $i++) {?>
                                <option value="<?php echo $items_data3[$i]['pk_items_id']; ?>">
                                    <?php echo $items_data3[$i]['fk_item_id'] ; ?>
                                </option>
                                <?php }?>
                            </select>
                            <span id="sizeerrorMsg"></span>

                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="txt_items_innersheet">Inner Sheets <span class="text-danger">*</span></label>
                            <select class="form-control txt_items_innersheet " name="txt_items_innersheet[]"
                                id="txt_items_innersheet" multiple>
                                <option selected value="ALL">ALL</option>
                                <?php for ($i = 0; $i < count($items_data4); $i++) {?>
                                <option value="<?php echo $items_data4[$i]['pk_items_id']; ?>">
                                    <?php echo $items_data4[$i]['fk_item_id'] ; ?>
                                </option>
                                <?php }?>
                            </select>
                            <span id="sizeerrorMsg"></span>

                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="txt_items_bag">Bag <span class="text-danger">*</span></label>
                            <select class="form-control txt_items_bag " name="txt_items_bag[]" id="txt_items_bag"
                                multiple>
                                <option selected value="ALL">ALL</option>
                                <?php for ($i = 0; $i < count($items_data6); $i++) {?>
                                <option value="<?php echo $items_data6[$i]['pk_items_id']; ?>">
                                    <?php echo $items_data6[$i]['fk_item_id'] ; ?>
                                </option>
                                <?php }?>
                            </select>
                            <span id="bagerrorMsg"></span>

                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="txt_items_box">Box <span class="text-danger">*</span></label>
                            <select class="form-control txt_items_box " name="txt_items_box[]" id="txt_items_box"
                                multiple>
                                <option selected value="ALL">ALL</option>
                                <?php for ($i = 0; $i < count($items_data7); $i++) {?>
                                <option value="<?php echo $items_data7[$i]['pk_items_id']; ?>">
                                    <?php echo $items_data7[$i]['fk_item_id'] ; ?>
                                </option>
                                <?php }?>
                            </select>
                            <span id="boxerrorMsg"></span>

                        </div>
                        <?php } ?>
                        <div class="col-lg-2 pt-4">
                            <input type="submit" class="btn btn-info btn-lg butttns" value="Search" id="report_search">

                            <input type="reset" class="btn btn-primary btn-lg" value="Reset" id="report_reset">
                        </div>
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
                                    <div class="table-responsive">
                                        <table id="estimateTable"
                                            class="table table-bordered table-striped dataTable dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Date</th>
                                                    <th>Order</th>
                                                    <th>Product</th>
                                                    <th>Product Count</th>
                                                    <?php if(isset($_GET['typ']) && $_GET['typ'] == 2) { ?>
                                                    <th>Category</th>
                                                    <th>Category Count</th>
                                                    <th>Size</th>
                                                    <th>Size Count</th>
                                                    <th>Inner Sheet</th>
                                                    <th>Inner Sheet Count</th>
                                                    <th>Bag</th>
                                                    <th>Bag Count</th>
                                                    <th>Box</th>
                                                    <th>Box Count</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <!-- <tbody>
                                                <tr class="data-row">
                                                </tr>
                                            </tbody> -->
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <?php if(isset($_GET['typ']) && $_GET['typ'] == 2) { ?>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <?php } ?>
                                                    <th></th>
                                                </tr>
                                                <!--  -->
                                            </tfoot>
                                        </table>
                                    </div>
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
$('#txt_items_name').select2({
    allowClear: true
});
$('#txt_items_category').select2();
$('#txt_items_size').select2();
$('#txt_items_innersheet').select2();
$('#txt_items_bag').select2();
$('#txt_items_box').select2();

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

    "lengthChange": true,
    "searchable": true,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "bjQueryUI": true,
    "order": [],
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
            }
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
            d.mode = 'listProductReport';
            d.txt_items_name = $('#txt_items_name ').val();
            d.itemname_qty = $('#itemname_qty').val();

            <?php if(isset($_GET['typ']) && $_GET['typ'] == 2) { ?>
            d.txt_items_category = $('#txt_items_category').val();
            d.itemcategory_qty = $('#itemcategory_qty').val();
            d.txt_items_size = $('#txt_items_size').val();
            d.itemsize_qty = $('#itemsize_qty').val();
            d.txt_items_innersheet = $('#txt_items_innersheet').val();
            d.iteminnersheet_qty = $('#iteminnersheet_qty').val();
            d.txt_items_bag = $('#txt_items_bag').val();
            d.itembag_qty = $('#itembag_qty').val();
            d.txt_items_box = $('#txt_items_box').val();
            d.itembox_qty = $('#itembox_qty').val();
            <?php } ?>
            d.fromDate = $('#from_date').val();
            d.toDate = $('#to_date').val();
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

    // "footerCallback": function(row, data, start, end, display) {
    //     var api = this.api();
    //     var columnIndexes = [4, 6, 8, 10, 12, 14];
    //     for (var i = 0; i < columnIndexes.length; i++) {
    //         var columnIndex = columnIndexes[i];
    //         var total = api.column(columnIndex, {
    //             page: 'current'
    //         }).data().reduce(function(a, b) {
    //             if (b !== null && b !== '') {
    //                 var quantities = b.split('<br>').map(function(qty) {
    //                     return parseInt(qty, 10) || 0;
    //                 });
    //                 var columnTotal = quantities.reduce(function(x, y) {
    //                     return x + y;
    //                 }, 0);
    //                 return a + columnTotal;
    //             }
    //             return a;
    //         }, 0);
    //         $(api.column(columnIndex).footer()).html('Total: ' + total);
    //     }
    // }
    "footerCallback": function(row, data, start, end, display) {
        var api = this.api();
        var columnIndexes = [];

        if (<?php echo $_GET['typ']; ?> === 2) {
            columnIndexes = [4, 6, 8, 10, 12, 14]; // Show totals for all columns if typ is 2
        } else {
            columnIndexes = [4]; // Show total for only the 4th column if typ is 1
        }

        for (var i = 0; i < columnIndexes.length; i++) {
            var columnIndex = columnIndexes[i];
            var total = api.column(columnIndex, {
                page: 'current'
            }).data().reduce(function(a, b) {
                if (b !== null && b !== '') {
                    var quantities = b.split('<br>').map(function(qty) {
                        return parseInt(qty, 10) || 0;
                    });
                    var columnTotal = quantities.reduce(function(x, y) {
                        return x + y;
                    }, 0);
                    return a + columnTotal;
                }
                return a;
            }, 0);
            $(api.column(columnIndex).footer()).html('Total: ' + total);
        }
    }





}); +
/*
$('.search_key').on('click', function(e) {
    if ($('.searchKeyword').val() != '') {
        dataRecords.search($('.searchKeyword').val()).draw();
    } else {
        dataRecords.search('').columns().search('').draw();
    }
});*/
/*
$('#report_search').on('click', function() {
    dataRecords.draw();
});

*/

$('#report_search').on('click', function() {
    dataRecords.draw();
});

$('#report_reset').on('click', function() {


    $('#txt_items_name').prop('selectedIndex', 0);
    $('#txt_items_name').trigger('change.select2');

    $('#txt_items_category').prop('selectedIndex', 0);
    $('#txt_items_category').trigger('change.select2');

    $('#txt_items_size').prop('selectedIndex', 0);
    $('#txt_items_size').trigger('change.select2');

    $('#txt_items_innersheet').prop('selectedIndex', 0);
    $('#txt_items_innersheet').trigger('change.select2');

    $('#txt_items_bag').prop('selectedIndex', 0);
    $('#txt_items_bag').trigger('change.select2');

    $('#txt_items_box').prop('selectedIndex', 0);
    $('#txt_items_box').trigger('change.select2');


    dataRecords.draw();

});

/*
$('#txt_items_name').on('change', function() {
    dataRecords.draw();
});
*/

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




$("#rmcyte_employee").validate({
    ignore: ".ignore-validation",
    // rules: {
    //     'txt_items_name[]': {
    //         required: true,
    //     },
    //     'txt_items_category[]': {
    //         required: true,
    //     },
    //     'txt_items_size[]': {
    //         required: true,
    //     },
    //     'txt_items_innersheet[]': {
    //         required: true,
    //     },
    //     'txt_items_bag[]': {
    //         required: true,
    //     },
    //     'txt_items_box[]': {
    //         required: true,
    //     },
    // },
    // messages: {
    //     'txt_items_name[]': {
    //         required: "Please select the product",
    //     },
    //     'txt_items_category[]': {
    //         required: "Please select the category",
    //     },
    //     'txt_items_size[]': {
    //         required: "Please select the size",
    //     },
    //     'txt_items_innersheet[]': {
    //         required: "Please select the size",
    //     },
    //     'txt_items_bag[]': {
    //         required: "Please select the bag",
    //     },
    //     'txt_items_box[]': {
    //         required: "Please select the box",
    //     },

    // },
    // errorPlacement: function(error, element) {
    //     if (element.attr("name") == "txt_items_name[]") {
    //         error.appendTo("#producterrorMsg");

    //     } else if (element.attr("name") == "txt_items_category[]") {
    //         error.appendTo("#categoryerrorMsg");

    //     } else if (element.attr("name") == "txt_items_size[]") {
    //         error.appendTo("#sizeerrorMsg");

    //     } else if (element.attr("name") == "txt_items_innersheet[]") {
    //         error.appendTo("#sizeerrorMsg");

    //     } else if (element.attr("name") == "txt_items_bag[]") {
    //         error.appendTo("#bagerrorMsg");

    //     } else if (element.attr("name") == "txt_items_box[]") {
    //         error.appendTo("#boxerrorMsg");

    //     } else {
    //         error.insertAfter(element)
    //     }
    // },
    submitHandler: function(form) {
        dataRecords.draw();

    }

});
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



$('#txt_items_name').on('select2:select', function(e) {
    var value = e.params.data;
    var dataItemValue = value.id;
    var values = $(this).val();
    if (dataItemValue === "ALL") {
        values = [];
    } else if (values.indexOf("ALL") !== -1) {
        values = $.grep(values, function(value) {
            return value !== "ALL";
        });
    }
    values.push(dataItemValue);
    $('#txt_items_name').val(values);
    $('#txt_items_name').trigger("change"); //notify others for the updated values

    var prodparent_id = values;

    getCategoryListing(2, prodparent_id);
});




// create MultiSelect from select HTML element
function contains(value, values) {
    for (var idx = 0; idx < values.length; idx++) {
        //  console.log(values[idx]);
        //   console.log(value);
        if (values[idx] === value) {
            return true;
        }
    }

    return false;
}




//$('#txt_items_category').on('change', function(){

$('#txt_items_category').on('select2:select', function(e) {
    var value = e.params.data;
    var dataItemValue = value.id;
    var values = $(this).val();
    if (dataItemValue === "ALL") {
        values = [];
    } else if (values.indexOf("ALL") !== -1) {
        values = $.grep(values, function(value) {
            return value !== "ALL";
        });
    }
    values.push(dataItemValue);
    $('#txt_items_category').val(values);
    $('#txt_items_category').trigger("change"); //notify others for the updated values

    e.preventDefault();
});
$('#txt_items_size').on('select2:select', function(e) {
    var value = e.params.data;
    var dataItemValue = value.id;
    var values = $(this).val();
    if (dataItemValue === "ALL") {
        values = [];
    } else if (values.indexOf("ALL") !== -1) {
        values = $.grep(values, function(value) {
            return value !== "ALL";
        });
    }
    values.push(dataItemValue);
    $('#txt_items_size').val(values);
    $('#txt_items_size').trigger("change"); //notify others for the updated values

    e.preventDefault();
});
$('#txt_items_size').on('change', function() {
    var items_size = $(this).val();

});

$('#txt_items_innersheet').on('select2:select', function(e) {
    var value = e.params.data;
    var dataItemValue = value.id;
    var values = $(this).val();
    if (dataItemValue === "ALL") {
        values = [];
    } else if (values.indexOf("ALL") !== -1) {
        values = $.grep(values, function(value) {
            return value !== "ALL";
        });
    }
    values.push(dataItemValue);
    $('#txt_items_innersheet').val(values);
    $('#txt_items_innersheet').trigger("change"); //notify others for the updated values

    e.preventDefault();
});
$('#txt_items_innersheet').on('change', function() {
    var items_innersheet = $(this).val();

});




$('#txt_items_bag').on('select2:select', function(e) {
    var value = e.params.data;
    var dataItemValue = value.id;
    var values = $(this).val();
    if (dataItemValue === "ALL") {
        values = [];
    } else if (values.indexOf("ALL") !== -1) {
        values = $.grep(values, function(value) {
            return value !== "ALL";
        });
    }
    values.push(dataItemValue);
    $('#txt_items_bag').val(values);
    $('#txt_items_bag').trigger("change"); //notify others for the updated values

    e.preventDefault();
});
$('#txt_items_bag').on('change', function() {
    var items_bag = $(this).val();

});
$('#txt_items_box').on('select2:select', function(e) {
    var value = e.params.data;
    var dataItemValue = value.id;
    var values = $(this).val();
    if (dataItemValue === "ALL") {
        values = [];
    } else if (values.indexOf("ALL") !== -1) {
        values = $.grep(values, function(value) {
            return value !== "ALL";
        });
    }
    values.push(dataItemValue);
    $('#txt_items_box').val(values);
    $('#txt_items_box').trigger("change"); //notify others for the updated values

    e.preventDefault();
});
$('#txt_items_box').on('change', function() {
    var items_box = $(this).val();

});

function getCategoryListing(type, prodparent_id) {
    var typesid = 2;
    var itemtypeId = type;

    $.ajax({
        url: "modules/reports/ajax_functions.php",
        data: {
            'mode': 'getCategoryListing',
            'typesid': typesid,
            'itemtypeId': itemtypeId,
            'parent_id': prodparent_id
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {

            $('#txt_items_category').html('<option selected >ALL</option>');
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_items_id == '9999') {
                    //  type_tables, table_pk_id, orderid
                    $('#txt_items_category').append('<option value="' + response[0][i]
                        .pk_items_id + '"  data-items="2" data-parent_id="' + response[0][i].parent_id +
                        '">' + response[0][i].fk_item_id +
                        ' </option>');
                } else {

                    $('#txt_items_category').append('<option value="' + response[0][i]
                        .pk_items_id + '"  data-items="1" data-parent_id="' + response[0][i].parent_id +
                        '">' + response[0][i].fk_item_id +
                        '</option>');
                }
            }
        },
        error: function(response) {
            console.log(response);
        }
    });


}
</script>