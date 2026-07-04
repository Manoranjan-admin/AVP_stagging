<?php
error_reporting(0);
include("../../includes/db_config.php");
include "../../includes/header.php";
$heading = 'Non Commercial Cancellation Report';
$customerSearch = '';
$appendQuery = '';
include "classes/class_customer.php";
$obj_cus = new Customer('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $GLOBALS["___mysqli_ston"]);
$getcustomer = $obj_cus->getAllCustomer();
$cus_data = array();
while ($cus_rows = mysqli_fetch_array($getcustomer)) {
    $cus_data[] = $cus_rows;
}
$getfranchise  = $obj_cus->getAllFrachise();
$frans_data = array();
while ($frans_rows = mysqli_fetch_array($getfranchise)) {
    $frans_data[] = $frans_rows;
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $heading; ?>
                        <?php
                if ($customerSearch != '') {
                  echo ' for ' . $customerSearch;
                  echo ' | <a href="index.php?erp=115">Reset</a>';
              } ?>
                    </h1>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <form class="row" autocomplete="off" method="post" id="rmcyte_employee">
                        <div class="col-lg-12">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="name">From Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="<?php 
                                            echo date('d/m/Y', strtotime("-1 months")); 
                                        ?>" name="from_date" id="from_date" placeholder="">
                        </div>
                       
                        <div class="col-lg-4 form-group">
                            <label for="email">To Date</label>
                            <input type="text" class="form-control" value="<?php echo date('d/m/Y') ?>" name="to_date"
                                id="to_date" placeholder="">
                        </div>
                        <div class="col-lg-4 pt-4">
                        <input type="button" class="btn btn-info btn-lg butttns" value="Search" id="report_search">
                    
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
                                    <!-- <h3>Commercial Outstanding Report</h3> -->
                                    <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                        aria-labelledby="nav-waiting-tab">
                                        <?php //echo $tableData;?>

                                        <table id="cancellationReportTable"
                                            class="table table-bordered table-striped dataTable dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th>S.No </th>
                                                    <th>Date</th>
                                                    <th>Customer</th>
                                                    <th>Order No</th>
                                                    <th>Total Amount(₹)</th>
                                                    <th>Reason</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4" style="text-align:right" rowspan="1"></th>
                                                    <th colspan="1" style="text-align:right" rowspan="1"></th>
                                                    <th colspan="1" rowspan="1"></th>
                                                    <th colspan="1" rowspan="1"></th>

                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php 
    include "../../includes/footer.php";
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
var dataRecords = $('#cancellationReportTable').DataTable({

    "footerCallback": function(tfoot, data, start, end, display) {
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
                .column(4)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);


            // Total over this page
            pageTotal = api
                .column(4, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(4).footer()).html(
                '₹' + pageTotal.toFixed(2)
            );


        }
    },
   // paginate: false,

    "lengthChange": true,
    "searchable": true,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "bjQueryUI": true,
    "order": [],
    'columnDefs': [{
    'targets': 4,
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
            title: 'Cancellation Report',
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
            title: 'Cancellation Report',
            action: newexportaction1,

            exportOptions: {
                modifier: {
                    search: 'applied',
                    order: 'applied'
                }
            },
            // footer: true

        },
    ],
    "ajax": {
        url: "modules/reports/ajax_functions.php",
        type: "POST",
        //  data: { mode: 'filterlistSalesOrder' },
        data: function(d) {
            d.mode = 'listEstimateCancellationNonCommReport';
            d.fromDate = $('#from_date').val();
            d.toDate = $('#to_date').val();

        },
        dataType: "json",
    },
    "lengthMenu": [
        [10, 25, 50,-1],
        [10, 25, 50,"All"]
    ],
    "pageLength": 10,
   
});
/*
$('.search_key').on('click', function(e) {
		if($('.searchKeyword').val() != ''){
            dataRecords.search( $('.searchKeyword').val() ).draw();
		}else{dataRecords.search('').columns().search('').draw();}
});
*/


$('#report_search').on('click', function() {
    dataRecords.draw();
});

$('#report_reset').on('click', function() {

dataRecords.draw();

});

/*
$('#report_reset').on('click', function() {

    $('#from_date').val(' ').trigger('change');
    $('#to_date').val(' ').trigger('change');
});
$('#from_date').on('change', function() {
    dataRecords.draw();
});

$('#to_date').on('change', function() {
    dataRecords.draw();
});*/
</script>