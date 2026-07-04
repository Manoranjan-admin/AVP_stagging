<?php

error_reporting(1);
include "../../includes/db_config.php";
include "../../includes/header.php";

$heading = "Non Commercial Outstanding Receipts";
/*function getTable( $tableName, $payTable,  $bulTable) {
     $query =  "SELECT est.PK_ES_ID, (est.grand_total) as totalAmt,est.sono, est.sale_date,est.order_status,est.delivery_date FROM " .$tableName ." as est  ";
    $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
    $tableBody = "";
    if (mysqli_num_rows($result) > 0) {
        $counter = 1;
        while ($data = mysqli_fetch_array($result)) {
            $advance = getReceipts($data["PK_ES_ID"], 0, $payTable);
            $receipts = getReceipts($data["PK_ES_ID"], 1, $payTable);
            $bulkPay = getbulkPayment($data["PK_ES_ID"], $tableName, $bulTable);
            $outTotal = $data["totalAmt"] - ($receipts + $advance);
            $bulkamt = $outTotal;
            //var_dump($outTotal);
            // var_dump($bulkpay);
            if ($outTotal > 0 && $bulkPay > 0) {
                $bulkamt = floatval(0);
            }
            $tableBody .='<tr> <td>' .$counter . '</td><td>' .$data["sono"] .'</td>
								<td>' .
                date("d-M-Y", strtotime($data["sale_date"])) .
                '</td>
                <td style="text-align:right;">' .
                number_format($data["totalAmt"], 2) .
                '</td>
				<td style="text-align:right;">' .
                number_format($advance, 2) .
                '</td>                                      
				<td style="text-align:right;">' .
                number_format($receipts, 2) .
                '</td>  
				<td style="text-align:right;">' .
                number_format($bulkPay, 2) .
                '</td>  
				<td style="text-align:right;">' .
                number_format($bulkamt, 2) .
                '</td>                          
               <td><span class="btn btn-primary  btn-sm">' .
                getStatus($data["order_status"]) .
                '</span></td></tr>';
            $counter++;
        }
    }

    return $tableBody;
}

function getReceipts($cusID, $type, $payTable)
{
    $query =
        "SELECT sum(advance_amount) as advance FROM " .$payTable ." where fk_es_id=" .  $cusID . " and type=" . $type;

    $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

    $returnValue = "0";

    $estimatecomm = [];

    if (mysqli_num_rows($result) > 0) {
        $counter = 1;

        while ($data = mysqli_fetch_array($result)) {
            $returnValue = $data["advance"];
        }
    }

    return $returnValue;
}

function getbulkPayment($esID, $tableName, $bulTable)
{
    $query = "SELECT ( SELECT est.grand_total  FROM " . $tableName .  " est WHERE est.PK_ES_ID= " . $esID .") as grand_total  FROM " . $bulTable . " bp  WHERE  FIND_IN_SET(" .  $esID . ", bp.fk_es_id) > 0";
    $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
    $returnValue = "0";
    $estimatecomm = [];
    if (mysqli_num_rows($result) > 0) {
        $counter = 1;
        while ($data = mysqli_fetch_array($result)) {
            $returnValue = $data["grand_total"];
        }
    }
    return $returnValue;
}

function getStatus($status)
{
    switch ($status) {
        case 0:
            return "Yet to Start";

            break;

        case 1:
            return "Designing";

            break;

        case 2:
            return "Printing";

            break;

        case 3:
            return "Lamination";

            break;

        case 4:
            return "Finishing";

            break;

        case 5:
            return "Ready for Delivery";

            break;

        case 6:
            return "Delivered";

            break;

        default:
            return "Yet to Start";
    }
}*/
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
?>

<div class="content-wrapper" >
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
                    <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel" aria-labelledby="nav-waiting-tab">
                
                        <table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">

                            <thead>

                            <tr>
                                <th>S.No </th>
                                <th>Estimate Number</th>
								<th>Customer Name</th>
                                <th>Franchise</th>
                                <th>Date</th>
                                <th>Total Amount (₹)</th>
								<th>Advance (₹)</th>                              
                                <th>Receipts (₹)</th>
                                <th>Bulk Receipts (₹)</th>
								<th>Outstanding (₹)</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="1"  rowspan="1"></th>
                                                <th colspan="1"  rowspan="1"></th>
                                                <th colspan="1"  rowspan="1"></th>
                                                <th colspan="1"  rowspan="1"></th>
                                                <th colspan="1" rowspan="1"></th>
                                                <th colspan="1" style="text-align:right" rowspan="1"></th>
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
    /*'initComplete': function (settings, json){
            this.api().columns('5', {page:'current'}).every(function(){
                var column = this;
                var sum = column
                .data()
                .reduce(function (a, b) {
                    a = parseFloat(a, 10);
                    if(isNaN(a)){ a = 0; }                 
 
                    b = parseFloat(b, 10);
                    if(isNaN(b)){ b = 0; }
 
                    return (a + b).toFixed(2);
                });
                if(!sum.includes('₹'))
                    sum +=' @#8377;';
                $(column.footer()).html(sum);
            });
        },
        footerCallback: function () {
 
 this.api().columns('5', {page:'current'}).every(function(){
     var column = this;
     var sum = column
     .data()
     .reduce(function (a, b) {
         a = parseFloat(a, 10);
         if(isNaN(a)){ a = 0; }                 

         b = parseFloat(b, 10);
         if(isNaN(b)){ b = 0; }

         return (a + b).toFixed(2);
     });
     if(!sum.includes('₹'))
         sum +=' @#8377;';
     $(column.footer()).html(sum);
 });
},*/
    "footerCallback": function(row, data, start, end, display) {
        var roleId = $('#getSessRollId').val();

        if (roleId == 999 || roleId == 1) {

            var api = this.api(),
                data;
                var column = this;

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
            total = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);


            // Total over this page
            pageTotal = api
                .column(6, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(6).footer()).html(
                '₹' + pageTotal.toFixed(2)
            );
            total = api
                .column(7)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);


            // Total over this page
            pageTotal = api
                .column(7, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(7).footer()).html(
                '₹' + pageTotal.toFixed(2)
            );
            total = api
                .column(8)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);


            // Total over this page
            pageTotal = api
                .column(8, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(8).footer()).html(
                '₹' + pageTotal.toFixed(2)
            );
            total = api
                .column(9)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);


            // Total over this page
            pageTotal = api
                .column(9, {
                    page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(9).footer()).html(
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
     'targets': [3,4,5,6,7,8,9],
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
            title: 'Non Commercial Outstanding  Receipts',
            
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
            d.mode = 'listOutstandingReceiptsReport';
            d.fromDate = $('#from_date').val();
            d.toDate = $('#to_date').val();
            d.txt_customer_name = $('#txt_customer_name ').val();
            d.txt_franchise_name  = $('#txt_franchise_name  ').val();
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
$('#report_reset').on('click', function() {
    $('#txt_customer_name').prop('selectedIndex', 0);
    $('#txt_customer_name').trigger('change.select2');
    $('#txt_franchise_name').prop('selectedIndex', 0);
    $('#txt_franchise_name').trigger('change.select2');
    dataRecords.draw();

});

$('#report_search').on('click', function() {
    dataRecords.draw();
});
</script>