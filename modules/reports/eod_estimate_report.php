<?php
error_reporting(0);

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
                            <h4 class="mb-3 mt-0"><?php echo $title; ?> EOD Collection Estimate Reports</h4>
                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="name">Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="<?php 
                                            echo date('d/m/Y'); 
                                        ?>" name="from_date" id="from_date" placeholder="">
                        </div>
                        <div class="col-lg-7 pt-4 ">
                          
                            <input type="button" class="btn btn-info btn-lg butttns" value="Search" id="report_search">
                            <input type="reset" class="btn btn-primary btn-lg" value="Reset" id="report_reset">
                        </div>

                        <div class="col-lg-3 pt-4 ">
                        <span  class="error"><b>(* The amount received on different dates is marked in red)</b></span>

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
                                    <?php //echo $tableData;?>

                                    <table id="eodestimateTable"
                                        class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>Date</th>
                                                <th>Transaction Date</th>
                                                <th>Estimate No.</th>
                                                <th>Customer</th>
                                                <th>Amount</th>
                                                <th>Advance Received</th>
                                                <th>Bill Received </th>
                                                <th>Bulk Receipts </th>
                                                <th>Outstanding</th>

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
                                                <th colspan="5" style="text-align:right" rowspan="1"></th>
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

table tfoot {
    display: table-row-group;
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


var dataRecords = $('#eodestimateTable').DataTable({



    // paginate: false,

    "lengthChange": true,
    "searchable": true,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "bjQueryUI": true,
    "order": [],
    'columnDefs': [{
        'targets': [ 5, 6, 7, 8,9],
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
            title: '<?php echo $title; ?> EOD Estimate Reports',
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
            title: '<?php echo $title; ?> EOD Estimate Reports',
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
            d.mode = 'listEODReport';
            d.Date = $('#from_date').val();
            d.typ = <?php echo $_GET['typ']; ?>;
            //  d.mo_id = $('#mo_id').find(":selected").val();
            //        d.report_status_id = $('#report_status_id').find(":selected").val();
        },
        dataType: "json",

    },
   /* "drawCallback": function(row, data, start, end, display) {
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
            $('#amountTotal').empty();
            $('#advanceTotal').empty();
            $('#billTotal').empty();
            $('#bulkTotal').empty();
            $('#outstandingTotal').empty();
            // Total over all pages
            total1 = api
                .column(4)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal1 = api
                .column(4, {
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
                .column(5)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal2 = api
                .column(5, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

     

            $('#advanceTotal').append('₹' + pageTotal2.toFixed(2));

            total3 = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal3 = api
                .column(6, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer


            $('#billTotal').append('₹' + pageTotal3.toFixed(2));

            total4 = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            pageTotal4 = api
                .column(7, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

   
            $('#bulkTotal').append('₹' + pageTotal4.toFixed(2));
            total5 = api
                .column(8)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            pageTotal5 = api
                .column(8, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer


            $('#outstandingTotal').append('₹' + pageTotal5.toFixed(2));


        }
    },*/
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
    var nowdate = new Date();
    $('#from_date').datepicker('setDate',nowdate );
    dataRecords.draw();
    getAllTotalAmount();

});

getAllTotalAmount();



$('#eodestimateTable_filter input[type="search"]').on('change', function() {
    getAllTotalAmount();
});

function getAllTotalAmount()
{
    var searchdata =  $('#eodestimateTable_filter input[type="search"]').val();
    $.ajax({
        
        url: "modules/reports/ajax_functions.php",
        type: "POST",
        data: {
            'mode': 'getAllTotalAmount',
            'Date': $('#from_date').val(),
            'searchdata': searchdata,
            'typ':<?php echo $_GET['typ']; ?>,
          
        },
        dataType: "json",

        success: function(response) {

            $('#amountTotal').empty();
            $('#advanceTotal').empty();
            $('#billTotal').empty();
            $('#bulkTotal').empty();
            $('#outstandingTotal').empty();
          
           
            
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
</script>

<script type="text/javascript">
var dateNow = new Date();
var disableddate = new Date();

disableddate.setDate(disableddate.getDate());

$('#txt_pi_date').datepicker({
    format: "dd/mm/yyyy"
}).datepicker('setDate', dateNow);

$('#txt_delivery_date').datepicker({
    format: "dd/mm/yyyy",
    startDate: disableddate
}).datepicker('setDate', dateNow);
</script>