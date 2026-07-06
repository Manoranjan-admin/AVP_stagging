<?php
error_reporting(0);
$heading='Estimate';
if($_GET['typ']==1){$heading="Commercial Estimate";
$tableHead='<table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Estimate.No</th>
								<th>Date</th>
                                <th>Customer</th>
                                <th>Total Amount(₹)</th>                               
                            </tr>
                            </thead><tbody>';
							
		$query = "SELECT est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname FROM erp_estimate_comm as est,erp_customer_master as cm where sale_date=CURRENT_DATE and est.customer_id=cm.pk_cus_id";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
		$returnValue='NIL';
        $estimatecomm=array();	
        if(mysqli_num_rows($result)  > 0){
			$counter=1;
            while($data= mysqli_fetch_array($result)) 
			{
               
			   $tableBody .='	
						
                              <tr>
                                <td>'.$counter.'</td>
                                <td>'.$data['sono'].'</td>
                                <td  style="text-align:center;">'.date("d-M-Y", strtotime($data['sale_date'])).'</td>
                                <td>'.$data['cusname'].'</td>                               
                                <td style="text-align:right;">'.number_format($data['grand_total'],2).'</td>
                              </tr>
                            ';
							$counter++;
            }
        }	
							


$tableFooter='</tbody>
                        </table>';
						
$tableData=$tableHead.$tableBody.$tableFooter;
}
elseif($_GET['typ']==2){$heading="Commercial Invoice";

$tableHead='<table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Invoice.No</th>
								<th>Date</th>
                                <th>Customer</th>
                                <th>Total Amount(₹)</th>                               
                            </tr>
                            </thead><tbody>';
							
		$query = "SELECT est.eno,est.date,est.grand_total,cm.cus_name as cusname FROM erp_invoice_comm as est,erp_customer_master as cm where date=CURRENT_DATE and est.fk_customer_id=cm.pk_cus_id ";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
		$returnValue='NIL';
        $estimatecomm=array();	
        if(mysqli_num_rows($result)  > 0){
			$counter=1;
            while($data= mysqli_fetch_array($result)) 
			{
               
			   $tableBody .='	
						
                              <tr>
                                <td>'.$counter.'</td>
                                <td>'.$data['eno'].'</td>
                                <td  style="text-align:center;">'.date("d-M-Y", strtotime($data['date'])).'</td>
                                <td>'.$data['cusname'].'</td>                               
                                <td style="text-align:right;">'.number_format($data['grand_total'],2).'</td>
                              </tr>
                            ';
							$counter++;
            }
        }	
							


$tableFooter='</tbody>
                        </table>';
						
$tableData=$tableHead.$tableBody.$tableFooter;
}
elseif($_GET['typ']==3){$heading="Commercial Advances";
$tableHead='<table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Estimate No.</th>
                                <th>Date</th>
								<th>Customer</th>                              
                                <th>Amount(₹)</th>
                               
                            </tr>
                            </thead>';
							
							
							$query = "SELECT est.sono,rec.date,rec.advance_amount,cm.cus_name as cusname FROM erp_advance_comm as rec,erp_customer_master as cm, erp_estimate_comm as est where date=CURRENT_DATE and rec.customer_id=cm.pk_cus_id and est.PK_es_id=rec.fk_es_id and rec.type=0";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
		$returnValue='NIL';
        $estimatecomm=array();	
        if(mysqli_num_rows($result)  > 0){
			$counter=1;
            while($data= mysqli_fetch_array($result)) 
			{
               
			   $tableBody .='	
						
                              <tr>
                                <td>'.$counter.'</td>
                                <td>'.$data['sono'].'</td>
                                <td  style="text-align:center;">'.date("d-M-Y", strtotime($data['date'])).'</td>
                                <td>'.$data['cusname'].'</td>                               
                                <td style="text-align:right;">'.number_format($data['advance_amount'],2).'</td>
                              </tr>
                            ';
							$counter++;
            }
        }	
							


$tableFooter='</tbody>
                        </table>';
						
$tableData=$tableHead.$tableBody.$tableFooter;
                          

}
elseif($_GET['typ']==4){$heading="Commercial Receipts";
$tableHead='<table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Estimate No.</th>
                                <th>Date</th>
								<th>Customer</th>                              
                                <th>Amount(₹)</th>
                               
                            </tr>
                            </thead>';
							
							
							$query = "SELECT est.sono,rec.date,rec.advance_amount,cm.cus_name as cusname FROM erp_advance_comm as rec,erp_customer_master as cm, erp_estimate_comm as est where date=CURRENT_DATE and rec.customer_id=cm.pk_cus_id and est.PK_es_id=rec.fk_es_id and rec.type=1";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
		$returnValue='NIL';
        $estimatecomm=array();	
        if(mysqli_num_rows($result)  > 0){
			$counter=1;
            while($data= mysqli_fetch_array($result)) 
			{
               
			   $tableBody .='	
						
                              <tr>
                                <td>'.$counter.'</td>
                                <td>'.$data['sono'].'</td>
                                <td  style="text-align:center;">'.date("d-M-Y", strtotime($data['date'])).'</td>
                                <td>'.$data['cusname'].'</td>                               
                                <td style="text-align:right;">'.number_format($data['advance_amount'],2).'</td>
                              </tr>
                            ';
							$counter++;
            }
        }	
							


$tableFooter='</tbody>
                        </table>';
						
$tableData=$tableHead.$tableBody.$tableFooter;
}
elseif($_GET['typ']==5){$heading="Non Commercial Estimate";
$tableHead='<table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Estimate.No</th>
								<th>Date</th>
                                <th>Customer</th>
                                <th>Total Amount(₹)</th>                               
                            </tr>
                            </thead><tbody>';
							
		$query = "SELECT est.sono,est.sale_date,est.grand_total,cm.cus_name as cusname FROM erp_estimate_noncomm as est,erp_customer_master as cm where sale_date=CURRENT_DATE and est.customer_id=cm.pk_cus_id";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
		$returnValue='NIL';
        $estimatecomm=array();	
        if(mysqli_num_rows($result)  > 0){
			$counter=1;
            while($data= mysqli_fetch_array($result)) 
			{
               
			   $tableBody .='	
						
                              <tr>
                                <td>'.$counter.'</td>
                                <td>'.$data['sono'].'</td>
                                <td  style="text-align:center;">'.date("d-M-Y", strtotime($data['sale_date'])).'</td>
                                <td>'.$data['cusname'].'</td>                               
                                <td style="text-align:right;">'.number_format($data['grand_total'],2).'</td>
                              </tr>
                            ';
							$counter++;
            }
        }	
							


$tableFooter='</tbody>
                        </table>';
						
$tableData=$tableHead.$tableBody.$tableFooter;


}
elseif($_GET['typ']==6){$heading="Non Commercial Invoice";
$tableHead='<table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Invoice.No</th>
								<th>Date</th>
                                <th>Customer</th>
                                <th>Total Amount(₹)</th>                               
                            </tr>
                            </thead><tbody>';
							
		$query = "SELECT est.eno,est.date,est.grand_total,cm.cus_name as cusname FROM erp_invoice_noncomm as est,erp_customer_master as cm where date=CURRENT_DATE and est.fk_customer_id=cm.pk_cus_id ";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
		$returnValue='NIL';
        $estimatecomm=array();	
        if(mysqli_num_rows($result)  > 0){
			$counter=1;
            while($data= mysqli_fetch_array($result)) 
			{
               
			   $tableBody .='	
						
                              <tr>
                                <td>'.$counter.'</td>
                                <td>'.$data['eno'].'</td>
                                <td  style="text-align:center;">'.date("d-M-Y", strtotime($data['date'])).'</td>
                                <td>'.$data['cusname'].'</td>                               
                                <td style="text-align:right;">'.number_format($data['grand_total'],2).'</td>
                              </tr>
                            ';
							$counter++;
            }
        }	
							


$tableFooter='</tbody>
                        </table>';
						
$tableData=$tableHead.$tableBody.$tableFooter;

}
elseif($_GET['typ']==7){$heading="Non Commercial Advances";

$tableHead='<table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Estimate No.</th>
                                <th>Date</th>
								<th>Customer</th>                              
                                <th>Amount(₹)</th>
                               
                            </tr>
                            </thead>';
							
							
							$query = "SELECT est.sono,rec.date,rec.advance_amount,cm.cus_name as cusname FROM erp_advance_noncomm as rec,erp_customer_master as cm, erp_estimate_noncomm as est where date=CURRENT_DATE and rec.customer_id=cm.pk_cus_id and est.PK_es_id=rec.fk_es_id and rec.type=0";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
		$returnValue='NIL';
        $estimatecomm=array();	
        if(mysqli_num_rows($result)  > 0){
			$counter=1;
            while($data= mysqli_fetch_array($result)) 
			{
               
			   $tableBody .='	
						
                              <tr>
                                <td>'.$counter.'</td>
                                <td>'.$data['sono'].'</td>
                                <td  style="text-align:center;">'.date("d-M-Y", strtotime($data['date'])).'</td>
                                <td>'.$data['cusname'].'</td>                               
                                <td style="text-align:right;">'.number_format($data['advance_amount'],2).'</td>
                              </tr>
                            ';
							$counter++;
            }
        }	
							


$tableFooter='</tbody>
                        </table>';
						
$tableData=$tableHead.$tableBody.$tableFooter;

}
elseif($_GET['typ']==8){$heading="Non Commercial Receipts";

$tableHead='<table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Estimate No.</th>
                                <th>Date</th>
								<th>Customer</th>                              
                                <th>Amount(₹)</th>
                               
                            </tr>
                            </thead>';
							
							
							$query = "SELECT est.sono,rec.date,rec.advance_amount,cm.cus_name as cusname FROM erp_advance_noncomm as rec,erp_customer_master as cm, erp_estimate_noncomm as est where date=CURRENT_DATE and rec.customer_id=cm.pk_cus_id and est.PK_es_id=rec.fk_es_id and rec.type=1";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
		$returnValue='NIL';
        $estimatecomm=array();	
        if(mysqli_num_rows($result)  > 0){
			$counter=1;
            while($data= mysqli_fetch_array($result)) 
			{
               
			   $tableBody .='	
						
                              <tr>
                                <td>'.$counter.'</td>
                                <td>'.$data['sono'].'</td>
                                <td  style="text-align:center;">'.date("d-M-Y", strtotime($data['date'])).'</td>
                                <td>'.$data['cusname'].'</td>                               
                                <td style="text-align:right;">'.number_format($data['advance_amount'],2).'</td>
                              </tr>
                            ';
							$counter++;
            }
        }	
							


$tableFooter='</tbody>
                        </table>';
						
$tableData=$tableHead.$tableBody.$tableFooter;

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
                                    <?php echo $tableData;?>
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
var dataRecordscus = $('#estimateTable').DataTable({
    "dom": 'Blfrtip',
    "lengthChange": true,
        buttons: [{
            extend: 'pdf',
            exportOptions: {
                columns: [0, 1, 2, 3, 4]
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: [0, 1, 2, 3, 4]
            }
        }
    ],
    "lengthMenu": [
        [10, 25, 50,-1],
        [10, 25, 50,"All"]
    ],
    "pageLength": 10,
});
/*
$('.search_key').on('click', function(e) {
    if ($('.searchKeyword').val() != '') {
        dataRecordscus.search($('.searchKeyword').val()).draw();
    } else {
        dataRecordscus.search('').columns().search('').draw();
    }
});*/
</script>