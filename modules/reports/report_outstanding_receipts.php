<?php

error_reporting(1);
include "../../includes/db_config.php";
include "../../includes/header.php";

$heading = "Outstanding Reports for ";
function getTable(
    $customerID,
    $tableName,
    $payTable,
    $bulTable,
    $fromda,
    $toda,
    $fransid
) {
    $frans = "";
    if ($fransid) {
        $frans = "AND est.franchise='" . $fransid . "'";
    }
    $query =
        "SELECT est.PK_ES_ID, (est.grand_total) as totalAmt,est.sono, est.sale_date,est.order_status,est.delivery_date FROM " .
        $tableName .
        " as est where  DATE_FORMAT(est.sale_date, '%Y-%m-%d') BETWEEN '" .
        $fromda .
        "' AND '" .
        $toda .
        "' " .
        $frans .
        " ";
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
}
?>

<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $heading; ?>  </h1>
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
                    <h3>Commercial Outstanding Report</h3>
                    <table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>S.No </th>
                               <th>Estimate Number</th>
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
                            	<?php echo getTable(
                                 $_GET["cusid"],
                                 "erp_estimate_comm",
                                 "erp_advance_comm",
                                 " erp_advance_bill_comm",
                                 $_GET["fromda"],
                                 $_GET["toda"],
                                 $_GET["fransid"]
                             ); ?>
                            </tbody>
                           </table>
                           <br />
                    

                           <h3>Non Commercial Outstanding Report</h3>

                      <table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">

                            <thead>

                            <tr>

                                <th>S.No </th>

                                <th>Estimate Number</th>

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

                            	<?php echo getTable(
                                 $_GET["cusid"],
                                 "erp_estimate_noncomm",
                                 "erp_advance_noncomm",
                                 "erp_advance_bill_noncomm",
                                 $_GET["fromda"],
                                 $_GET["toda"],
                                 $_GET["fransid"]
                             ); ?>

                                    

                            </tbody>

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