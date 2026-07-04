<?php
error_reporting(0);
$heading = 'Bulk Payment Report';
$customerSearch = '';
$appendQuery = '';
if (isset($_POST['txtCustomer'])) {
    $customerSearch = $_POST['txtCustomer'];
    $appendQuery = " and cus.cus_name like '%" . $customerSearch . "%'";
}

$tableHead = '<table id="customerWiseTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                            <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                                <th>S.No </th>
                                <th>Customer Name.</th>
                                <th>Total Amount (₹)</th>
								<th>Advance (₹)</th>
                                <th>Receipts (₹)</th>
								<th>Outstanding (₹)</th>
								<th>View Estimates</th>

                            </tr>
                            </thead>';

$query = "SELECT sum(est.grand_total) as totalAmt,cus.cus_name,cus.pk_cus_id FROM `erp_estimate_comm` as est,erp_customer_master as cus where cus.pk_cus_id=est.customer_id " . $appendQuery . " group by customer_id";
$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

$returnValue = 'NIL';
$estimatecomm = array();
if (mysqli_num_rows($result) > 0) {
    $counter = 1;
    while ($data = mysqli_fetch_array($result)) {

        $advance = getReceipts($data['pk_cus_id'], 0);
        $receipts = getReceipts($data['pk_cus_id'], 1);
        $tableBody .= '

                              <tr>
                                 <td></td>
                                <td>' . $counter . '</td>
                                <td>' . $data['cus_name'] . '</td>
                                <td style="text-align:right;">' . number_format($data['totalAmt'], 2) . '</td>
								<td style="text-align:right;">' . number_format($advance, 2) . '</td>
								<td style="text-align:right;">' . number_format($receipts, 2) . '</td>
								<td style="text-align:right;">' . number_format($data['totalAmt'] - ($receipts + $advance), 2) . '</td>
                                <td><a href="index.php?erp=109&typ=1&cusid=' . $data['pk_cus_id'] . '" class="btn btn-primary  btn-sm">View Estimates</a></td>
                              </tr>
                            ';
        $counter++;
    }
}

$tableFooter = '</tbody>
                        </table>';

$tableData = $tableHead . $tableBody . $tableFooter;

function getReceipts($cusID, $type)
{

    $query = "SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=" . $cusID . " and type=" . $type;
    $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

    $returnValue = '0';
    $estimatecomm = array();
    if (mysqli_num_rows($result) > 0) {
        $counter = 1;
        while ($data = mysqli_fetch_array($result)) {
            $returnValue = $data['advance'];
        }
    }
    return $returnValue;
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
    echo ' | <a href="index.php?erp=93">Reset</a>';
}
?>

                    </h1>
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
                                <form id="frm-example" name="frm-example" >
                                <p class="form-group">
                                         <button type="submit" class="btn btn-primary">Submit</button>
                                </p>
                           <?php //echo $_GET['type'];
                            if(isset($_GET['type']) && $_GET['type'] == 1){ ?>
                                <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                    aria-labelledby="nav-waiting-tab">
                                    <h3>Commercial Outstanding Report</h3>
                                    <?php echo $tableData; ?>
                                </div>
                                <?php }  ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php

                                            $tableBody = '';
                                            $tableHead = '<table id="singlecustomerWiseTable" class="table table-bordered table-striped dataTable dtr-inline">
                                                                        <thead>
                                                                        <tr>
                                                                           <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                                                                            <th>S.No </th>
                                                                            <th>Customer Name.</th>
                                                                            <th>Total Amount (₹)</th>
                                                                            <th>Advance (₹)</th>
                                                                            <th>Receipts (₹)</th>
                                                                            <th>Outstanding (₹)</th>
                                                                        <th>View Estimates</th>
                                                                        </tr>
                                                                        </thead>';

                                            $query = "SELECT sum(est.grand_total) as totalAmt,cus.cus_name,cus.pk_cus_id FROM `erp_estimate_noncomm` as est,erp_customer_master as cus where cus.pk_cus_id=est.customer_id " . $appendQuery . " group by customer_id";
                                            $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

                                            $returnValue = 'NIL';
                                            $estimatecomm = array();
                                            if (mysqli_num_rows($result) > 0) {
                                                $counter = 1;
                                                while ($data = mysqli_fetch_array($result)) {

                                                    $advance = getNReceipts($data['pk_cus_id'], 0);
                                                    $receipts = getNReceipts($data['pk_cus_id'], 1);
                                                    $tableBody .= '

                                                                        <tr>
                                                                            <td></td>
                                                                            <td>' . $counter . '</td>
                                                                            <td>' . $data['cus_name'] . '</td>
                                                                            <td style="text-align:right;">' . number_format($data['totalAmt'], 2) . '</td>
                                                                            <td style="text-align:right;">' . number_format($advance, 2) . '</td>
                                                                            <td style="text-align:right;">' . number_format($receipts, 2) . '</td>
                                                                            <td style="text-align:right;">' . number_format($data['totalAmt'] - ($receipts + $advance), 2) . '</td>
                                                                            <td><a href="index.php?erp=109&typ=1&cusid=' . $data['pk_cus_id'] . '" class="btn btn-primary  btn-sm">View Estimates</a></td>
                                                                        </tr>
                                                                        ';
                                                    $counter++;
                                                }
                                            }

                                            $tableFooter = '</tbody>
                                                                    </table>';

                                            $tableData2 = $tableHead . $tableBody . $tableFooter;

                                            function getNReceipts($cusID, $type)
                                            {

                                                $query = "SELECT sum(advance_amount) as advance FROM erp_advance_noncomm where customer_id=" . $cusID . " and type=" . $type;
                                                $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

                                                $returnValue = '0';
                                                $estimatecomm = array();
                                                if (mysqli_num_rows($result) > 0) {
                                                    $counter = 1;
                                                    while ($data = mysqli_fetch_array($result)) {
                                                        $returnValue = $data['advance'];
                                                    }
                                                }
                                                return $returnValue;
                                            }

                                            if(isset($_GET['type']) && $_GET['type'] == 2){
                                            ?>

                                        <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                            aria-labelledby="nav-waiting-tab">
                                            <br /><br />
                                            <h3>Non Commercial Outstanding Report</h3>
                                            <?php echo $tableData2; ?>
                                        </div>
                                    </div>

                                </div>
                                <?php } ?>
                                            </form>
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





<style type="text/css">
.dataTables_wrapper {
    margin-top: 14px;
}
</style>
<script>
var table = $('#customerWiseTable').DataTable({
    dom: 'Bfrtip',
    'columnDefs': [{
   'targets': 0,
   'searchable':false,
   'orderable':false,
   'className': 'dt-body-center',
   'render': function (data, type, full, meta){
       return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
   }
}],
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
        }
    ]
});


$('#singlecustomerWiseTable').DataTable({
    dom: 'Bfrtip',
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
        }
    ]
});

// Handle click on "Select all" control
$('#example-select-all').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   // Handle click on checkbox to set state of "Select all" control
   $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });

   // Handle form submission event
   $('#frm-example').on('submit', function(e){
      var form = this;

      // Iterate over all checkboxes in the table
      table.$('input[type="checkbox"]').each(function(){
         // If checkbox doesn't exist in DOM
         if(!$.contains(document, this)){
            // If checkbox is checked
            if(this.checked){
               // Create a hidden element
               $(form).append(
                  $('<input>')
                     .attr('type', 'hidden')
                     .attr('name', this.name)
                     .val(this.value)
               );
            }
         }
      });
   });

</script>