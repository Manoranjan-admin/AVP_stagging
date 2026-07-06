<?php
error_reporting(0);
include("../../includes/db_config.php");
include "../../includes/header.php";
$heading = 'Non Commercial Outstanding Report';
$customerSearch = '';
$appendQuery = '';
if (isset($_POST['txtCustomer'])) {
    $customerSearch = $_POST['txtCustomer'];
    $appendQuery = " and cus.cus_name like '%" . $customerSearch . "%'";
}



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

//$cus_data[$i]['pk_cus_id']; $frans_data[$i]['pk_cat_id']
//
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
                  echo ' | <a href="index.php?erp=116">Reset</a>';
              }
            ?>
                    </h1>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <form class="row" autocomplete="off" method="post" id="rmcyte_employee">
                        <div class="col-lg-12">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="name">From Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="<?php 
                                            echo date('d/m/Y', strtotime("-1 months")); 
                                        ?>" name="from_date" id="from_date" placeholder="">
                        </div>

                        <div class="col-lg-2 form-group">
                            <label for="email">To Date</label>
                            <input type="text" class="form-control" value="<?php echo date('d/m/Y') ?>" name="to_date"
                                id="to_date" placeholder="">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="name">Customer <span class="text-danger">*</span></label>
                            <select class="form-control txt_customer_name " name="txt_customer_name"
                                id="txt_customer_name">
                                <option value="">Select Customer</option>
                                <?php for ($i = 0; $i < count($cus_data); $i++) {?>
                                <option value="<?php echo $cus_data[$i]['cus_name']  ?>">
                                    <?php echo $cus_data[$i]['cus_name'] . " - (" . $cus_data[$i]['cus_code'] . ")"; ?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="name">Franchise <span class="text-danger">*</span></label>
                            <select class="form-control txt_franchise_name " name="txt_franchise_name"
                                id="txt_franchise_name">
                                <option value="">Select Franchise</option>
                                <?php for ($i = 0; $i < count($frans_data); $i++) {?>
                                <option value="<?php echo $frans_data[$i]['cat_name']; ?>">
                                    <?php echo $frans_data[$i]['cat_name'] ; ?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-4 pt-4 ">
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
                                <div class="row">
                                    <div class="col-sm-12">
                                 
                        
                                        <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                            aria-labelledby="nav-waiting-tab">
                                            <br /><br />
                                            <!--<h3>Non Commercial Outstanding Report</h3>-->
                                            <table id="singlecustomerWiseTable" class="table table-bordered table-striped dataTable dtr-inline"> <thead><tr><th>S.No </th> <th>Customer Name.</th>	<th>Franchise</th><th>Total Amount (₹)</th><th>Advance (₹)</th> <th>Receipts (₹)</th> <th>Bulk Receipts (₹)</th>	<th>Outstanding (₹)</th> <th>View Estimates</th></tr> </thead><body></body> <tfoot>
                                            <tr>
                                                <th colspan="3" style="text-align:right" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
                                            </tr>
                                        </tfoot></table>      
                                      </div>
                                
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
$('#txt_customer_name').select2();
$('#txt_franchise_name').select2();
$('#customerWiseTable').DataTable({
    "lengthChange": true,
    "dom": 'Blfrtip',

    buttons: [{
            extend: 'pdf',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5]
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5]
            }
        },
        {
            extend: 'excel',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 7]
            }
        }
    ]
});



var fromDate, toDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = fromDate.val();
        var max = maxDate.val();
        var date = new Date( data[4] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
var tablecus = $('#singlecustomerWiseTable').DataTable({

    "footerCallback": function(tfoot, data, start, end, display) {
        var api = this.api();
        var intVal = function(i) {
            return typeof i === 'string' ?
                i.replace(/[\$,]/g, '') * 1 :
                typeof i === 'number' ?
                i : 0;
        };
        total = api
            .column(3)
            .data()
            .reduce(function(a, b) {
                return intVal(a) + intVal(b);
            }, 0);
        console.log(total);
        pageTotal = api
            .column(3, {
                page: 'current'
            })
            .data()
            .reduce(function(a, b) {
                return intVal(a) + intVal(b);
            }, 0);
        $(api.column(3).footer())
            .html( /*  api.column( 3 ).data().reduce( function ( a, b ) {            return a + b;        }, 0 )*/
                '₹' + pageTotal.toFixed(2));

        total1 = api
            .column(4)
            .data()
            .reduce(function(a, b) {
                return intVal(a) + intVal(b);
            }, 0);
        console.log(total1);
        pageTotal1 = api
            .column(4, {
                page: 'current'
            })
            .data()
            .reduce(function(a, b) {
                return intVal(a) + intVal(b);
            }, 0);
        $(api.column(4).footer())
            .html( /*  api.column( 3 ).data().reduce( function ( a, b ) {            return a + b;        }, 0 )*/
                '₹' + pageTotal1.toFixed(2));

        total2 = api
            .column(5)
            .data()
            .reduce(function(a, b) {
                return intVal(a) + intVal(b);
            }, 0);
        console.log(total2);
        pageTotal2 = api
            .column(5, {
                page: 'current'
            })
            .data()
            .reduce(function(a, b) {
                return intVal(a) + intVal(b);
            }, 0);
        $(api.column(5).footer())
            .html( /*  api.column( 3 ).data().reduce( function ( a, b ) {            return a + b;        }, 0 )*/
                '₹' + pageTotal2.toFixed(2));

        total3 = api
            .column(6)
            .data()
            .reduce(function(a, b) {
                return intVal(a) + intVal(b);
            }, 0);
        console.log(total3);
        pageTotal3 = api
            .column(6, {
                page: 'current'
            })
            .data()
            .reduce(function(a, b) {
                return intVal(a) + intVal(b);
            }, 0);
        $(api.column(6).footer())
            .html( /*  api.column( 3 ).data().reduce( function ( a, b ) {            return a + b;        }, 0 )*/
                '₹' + pageTotal3.toFixed(2));

        total4 = api
            .column(7)
            .data()
            .reduce(function(a, b) {
                return intVal(a) + intVal(b);
            }, 0);
        console.log(total4);
        pageTotal4 = api
            .column(7, {
                page: 'current'
            })
            .data()
            .reduce(function(a, b) {
                return intVal(a) + intVal(b);
            }, 0);
        $(api.column(7).footer())
            .html( /*  api.column( 3 ).data().reduce( function ( a, b ) {            return a + b;        }, 0 )*/
                '₹' + pageTotal4.toFixed(2));
    },
    // dom: 'Bfrtip'
    paginate: false,
    "lengthChange": true,
    "searchable": true,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "bjQueryUI": true,
    "order": [],
    'columnDefs': [{
    'targets': [3,4,5,6,7],
    'className': 'dt-body-right',
    }],
    "dom": 'Blfrtip',
   

   
    buttons: [{
            extend: 'pdf',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 7]
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 7]
            }
        },
        {
            extend: 'excel',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5,7]
            }
        }
    ],
    

    "ajax": {
        url: "modules/reports/ajax_functions.php",
        type: "POST",
        //  data: { mode: 'filterlistSalesOrder' },
        data: function(d) {
            d.mode = 'listNoncommOutstandingReport';
            d.fromDate = $('#from_date').val();
            d.toDate = $('#to_date').val();
            d.txt_customer_name = $('#txt_customer_name ').val();
            d.txt_franchise_name  = $('#txt_franchise_name  ').val();


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
		if($('.searchKeyword').val() != ''){
            tablecus.search( $('.searchKeyword').val() ).draw();
		}else{tablecus.search('').columns().search('').draw();}
});
*/
$('#report_reset').on('click', function() {
    $('#txt_customer_name').prop('selectedIndex', 0);
    $('#txt_customer_name').trigger('change.select2');
    $('#txt_franchise_name').prop('selectedIndex', 0);
    $('#txt_franchise_name').trigger('change.select2');
    tablecus.draw();

});

$('#report_search').on('click', function() {
    tablecus.draw();
});

</script>