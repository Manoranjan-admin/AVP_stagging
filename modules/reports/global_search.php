<?php
error_reporting(1);
include "../../includes/db_config.php";
?>

<style>
#amountTotal {
    background: #28a745;
    margin: 20px;
    font-size: 20px;
    color: #fff;
}

#advanceTotal {
    background: #28a745;
    margin: 20px;
    font-size: 20px;
    color: #fff;
}

#billTotal {
    background: #28a745;
    margin: 20px;
    font-size: 20px;
    color: #fff;
}

#bulkTotal {
    background: #28a745;
    margin: 20px;
    font-size: 20px;
    color: #fff;
}

#outstandingTotal {
    background: #28a745;
    margin: 20px;
    font-size: 20px;
    color: #fff;
}
.labeltotaltxt{
    font-size: 18px;
    font-weight: 800;
}
</style>
<div class="content-wrapper">
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
                            <h4 class="mb-3 mt-0"><?php echo $title; ?> Global Search Reports</h4>
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

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="txt_fields"> Fields </label>
                                <select id="txt_fields" class=" form-control " tabindex="-1" aria-hidden="true">
                                    <option value="">--Select Fields--</option>
                                    <option value="est.sono">Order Number</option>
                                    <option value="cm.cus_name">Customer Name</option>
                                    <option value="cm.cus_code">Customer Code</option>
                                    <option value="est.grand_total">Total Amount</option>
                                    <option value="est.order_status">Status</option>
                                    <option value="est.bill_paid">Paid Status</option>
                                    <!-- <option value="GREATER THEN">GREATER THEN</option>
                                                <option value="LESS THEN">LESS THEN</option>
                                                <option value="BETWEEN">BETWEEN</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="txt_condition"> Condition </label>
                                <select id="txt_condition" class=" form-control " tabindex="-1" aria-hidden="true">
                                    <option value="">--Select Condition--</option>
                                    <option value="LIKE">LIKE</option>
                                    <option value="EQUAL">EQUAL</option>
                                    <option value="IN">IN</option>
                                    <option value="NOT IN">NOT IN</option>
                                    <option value="NOT EQUAL">NOT EQUAL</option>
                                    <!-- <option value="GREATER THEN">GREATER THEN</option>
                                                <option value="LESS THEN">LESS THEN</option>
                                                <option value="BETWEEN">BETWEEN</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 form-group" id="searchFieldadd">
                            <label for="name">Search <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="" id="txt_search" name="txt_search" />

                            <span id="producterrorMsg"></span>

                        </div>

                        <div class="col-lg-2 pt-4">
                            <button type="button" class="btn btn-info btn-lg butttns" id="report_search">Search</button>

                            <input type="reset" class="btn btn-primary btn-lg" value="Reset" id="report_reset">
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center labeltotaltxt">Amount Total: <span class="text-danger"></span></div>
                            <div id="amountTotal" class="text-center"></div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-center labeltotaltxt">Advance Received Total: <span class="text-danger"></span></div>
                            <div id="advanceTotal" class="text-center"></div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-center labeltotaltxt">Bill Received Total: <span class="text-danger"></span></div>
                            <div class="text-center" id="billTotal"></div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-center labeltotaltxt">Bulk Receipts Total: <span class="text-danger"></span></div>
                            <div class="text-center" id="bulkTotal"></div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-center labeltotaltxt">Outstanding Total: <span class="text-danger"></span></div>
                            <div class="text-center" id="outstandingTotal"></div>
                        </div>
                    </div>
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
                    <div class="card card-lightblue color-palette card-tabs">
                        <!-- <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div> -->
                        <!-- /.card-header -->
                        <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo $activecls = (isset($_GET['typ']) && $_GET['typ'] == 1) ? 'active': ''; ?>"
                                            id="custom-tabs-one-inprogress-tab" href="?erp=136&typ=1" role="tab" ">Commercial</a>
                                     </li>
                                      <li class=" nav-item">
                                            <a class="nav-link <?php echo $activecls = (isset($_GET['typ']) && $_GET['typ'] == 2) ? 'active': ''; ?>"
                                                id="custom-tabs-one-complete-tab" href="?erp=136&typ=2">Non
                                                Commercial</a>
                                    </li>

                                </ul>
                            </div>
                        <!-- form start -->
                        <div class="card-body">
                        
                            <!-- DATA TABLE-->
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                    aria-labelledby="nav-waiting-tab">

                                    <table id="gobalsearchTable"
                                        class="table table-bordered table-striped dataTable dtr-inline">

                                        <thead>

                                            <tr>

                                                <th>S.No </th>
                                                <th>Date</th>
                                                <th>Order Number</th>
                                                <th>Customer Name</th>
                                                <th>Customer Code</th>
                                                <th>Mode / Franchise</th>
                                                <th>Total Amount (₹)</th>
                                                <th>Advance (₹)</th>
                                                <th>Receipts (₹)</th>
                                                <th>Bulk Receipts (₹)</th>
                                                <th>Outstanding (₹)</th>
                                                <th>Status</th>
                                                <th>Paid Status</th>





                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td valign="top" colspan="12" class="dataTables_empty">No matching
                                                    records found</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="6" style="text-align:right" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
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



                <!--/.col (right) -->

            </div>

            <!-- /.row -->

        </div><!-- /.container-fluid -->

    </section>

</div>
<?php
  mysqli_close($GLOBALS["___mysqli_ston"]);
  ?>
<style type="text/css">
.dataTables_wrapper {
    margin-top: 14px;
}
</style>

<script>
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
var dataRecords = $('#gobalsearchTable').DataTable({

    /*"footerCallback": function(row, data, start, end, display) {
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
            total = api
                .column(5)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal = api
                .column(5, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(5).footer()).html(
                '₹' + pageTotal.toFixed(2)
            );


        }
    },*/
    // paginate: false,

    "lengthChange": true,
    "searchable": true,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "bjQueryUI": true,
    "order": [],
    'columnDefs': [{
        'targets': [3, 4, 5, 6, 7, 8, 9, 10],
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
            title: 'Order Report',
            action: newexportaction1,

            exportOptions: {
                modifier: {
                    search: 'applied',
                    order: 'applied'
                }
            },
            footer: true

        },

    ],


    "ajax": {
        url: "modules/reports/ajax_functions.php",
        type: "POST",
        //  data: { mode: 'filterlistSalesOrder' },
        data: function(d) {
            d.mode = 'listGlobalSearchReport';
            d.fromDate = $('#from_date').val();
            d.toDate = $('#to_date').val();
            d.txt_fields = $('#txt_fields').val();
            d.txt_condition = $('#txt_condition').val();
            d.txt_search = $('#txt_search').val();
            d.typ = <?php echo $_GET['typ']; ?>;
            //  d.mo_id = $('#mo_id').find(":selected").val();
            //        d.report_status_id = $('#report_status_id').find(":selected").val();
        },
        dataType: "json",

    },
    "drawCallback": function(row, data, start, end, display) {
        var roleId = $('#getSessRollId').val();

        if (roleId == 999 || roleId == 1) {

          /*  var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };
            $('#amountTotal').empty();
            $('#advanceTotal').empty();
            $('#billTotal').empty();
            $('#bulkTotal').empty();
            $('#outstandingTotal').empty();
            // Total over all pages
            total1 = api
                .column(5)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal1 = api
                .column(5, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $('#amountTotal').append('₹' + pageTotal1.toFixed(2));
            //  $(api.column(9).footer()).html(                '₹' + pageTotal1.toFixed(2)            );
           

            total2 = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal2 = api
                .column(6, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

         
            $('#advanceTotal').append('₹' + pageTotal2.toFixed(2));

            total3 = api
                .column(7)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal3 = api
                .column(7, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer


            $('#billTotal').append('₹' + pageTotal3.toFixed(2));

            total4 = api
                .column(8)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            pageTotal4 = api
                .column(8, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            
            $('#bulkTotal').append('₹' + pageTotal4.toFixed(2));
            total5 = api
                .column(9)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            pageTotal5 = api
                .column(9, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer


            $('#outstandingTotal').append('₹' + pageTotal5.toFixed(2));*/


        }
    },
    "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
    ],
    "pageLength": 10,

});
$('#report_search').on('click', function() {
    dataRecords.draw();
    getAllTotalAmount();
});

$('#report_reset').on('click', function() {
    dataRecords.draw();
    getAllTotalAmount();

});

getAllTotalAmount();



$('#gobalsearchTable_filter input[type="search"]').on('change', function() {
    getAllTotalAmount();
});

function getAllTotalAmount()
{
    var searchdata =  $('#gobalsearchTable_filter input[type="search"]').val();
    $.ajax({
        
        url: "modules/reports/ajax_functions.php",
        type: "POST",
        data: {
            'mode': 'getAllTotalAmountGlobal',
            'searchdata': searchdata,
            'fromDate': $('#from_date').val(),
            'toDate' : $('#to_date').val(),
            'txt_fields' : $('#txt_fields').val(),
            'txt_condition': $('#txt_condition').val(),
            'txt_search' : $('#txt_search').val(),
            'typ':<?php echo $_GET['typ']; ?>,

          
        },
        dataType: "json",

        success: function(response) {

            $('#amountTotal').empty();
            $('#advanceTotal').empty();
            $('#billTotal').empty();
            $('#bulkTotal').empty();
            $('#outstandingTotal').empty();
          
           console.log(response.total);
           console.log(response.advance);
            
            $('#amountTotal').append( response.total);
            $('#advanceTotal').append(response.advance);
            $('#billTotal').append( response.receipts);
            $('#bulkTotal').append(response.bulkpay);
            $('#outstandingTotal').append(response.bulkamt);

        },
        error: function(response) {
            console.log(response);
        }
    });
}
$('#txt_fields').on('change', function() {
    var txt_fields = $(this).val();
    console.log(txt_fields);
    $('#searchFieldadd').empty();
    var htmlsearch =
        '<label for="name">Search <span class="text-danger">*</span></label><input type="text" class="form-control" value="" id="txt_search" name="txt_search">';
    if (txt_fields == 'est.order_status') {
        htmlsearch =
            '<label for="name">Search <span class="text-danger">*</span></label><select id="txt_search" name="txt_search" class=" form-control " tabindex="-1" aria-hidden="true"><option value="">--Select Status--</option><option value="0">Yet to Start</option><option value="1">Designing</option><option value="2">Printing</option> <option value="3">Lamination</option> <option value="4">Finishing</option> <option value="5">Ready for Delivery</option><option value="6">Delivered</option></select>';
    } else if (txt_fields == 'est.bill_paid') {
        htmlsearch =
            '<label for="name">Search <span class="text-danger">*</span></label><select id="txt_search" name="txt_search" class=" form-control " tabindex="-1" aria-hidden="true"><option value="">--Select Paid Status--</option><option value="0">Not Amount Received</option><option value="1">Amount Received</option></select>';
    } else {
        htmlsearch =
            '<label for="name">Search <span class="text-danger">*</span></label><input type="text" class="form-control" value="" id="txt_search" name="txt_search">';
    }
    $('#searchFieldadd').html(htmlsearch);
});
</script>