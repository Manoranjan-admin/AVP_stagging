<?php
$customerSearch='';
$appendQuery='';
if(isset($_POST['txtCustomer']))
{
	$customerSearch=$_POST['txtCustomer'];
	$appendQuery=" and cus.cus_name like '%".$customerSearch."%'";
}
?>
<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pending reports
                        <?php
			if($customerSearch!='')
			{
				echo ' for '.$customerSearch;
				echo ' | <a href="index.php?erp=96">Reset</a>';
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
            <!-- ./row -->
            <div class="row">
                <div class="col-12">
                    <h4>Pending Estimates <small>Commercial</small></h4>
                </div>
            </div>
            <!-- ./row -->
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header ">

                            <table id="pendingCommTable" class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Customer</th>
                                        <th>Estimate Number</th>
                                        <th>Order Date</th>
                                        <th>Due Date</th>
                                        <th>Difference</th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
				   $query = " SELECT comm.sono,cus.cus_name,comm.PK_ES_ID,comm.sale_date,comm.delivery_date FROM `erp_estimate_comm` as comm,erp_customer_master as cus where cus.pk_cus_id=comm.customer_id  and comm.order_status<6 ".$appendQuery."  order by comm.delivery_date asc";
                   $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                    
                        $returnValue='NIL';
                        $estimatecomm=array();	
                        if(mysqli_num_rows($result)  > 0){
                            $counter=1;
                            while($data= mysqli_fetch_array($result)) 
                            {
							
                                
				  ?>

                                    <tr>
                                        <td><?php echo $counter;?></td>
                                        <td>

                                            <?php echo $data['cus_name'];?>
                                        </td>
                                        <td><?php echo $data['sono'];?></td>
                                        <td><?php echo date("d-M-Y", strtotime($data['sale_date']));?></td>
                                        <td> <?php echo date("d-M-Y", strtotime($data['delivery_date']));?></td>
                                        <td>
                                            <?php
					$date1=date_create(date("Y-m-d"));
					$date2=date_create($data['delivery_date']);
					$diff=date_diff($date1,$date2);
					//echo $diff->format("%R%a days");
					$daysDiff=$diff->format("%R%a");
					if($daysDiff==0)
					{
					?>
                                            <small class="text-primary mr-1">
                                                <i class="fas fa-check-square"></i>
                                                <span class="badge bg-danger">Today</span>
                                            </small>
                                            <?php
					}
					elseif($daysDiff<0)
					{
						?>
                                            <small class="text-danger mr-1"> <i
                                                    class="fas fa-arrow-down"></i>&nbsp;<?php echo $diff->format("%R%a days");?></small>
                                            <?php
						
					}
					elseif($daysDiff>0)
					{
						?>
                                            <small class="text-success mr-1"> <i
                                                    class="fas fa-arrow-down"></i>&nbsp;<?php echo $diff->format("%R%a days");?></small>
                                            <?php
						
					}
					?>
                                        </td>
                                        <td>
                                            <a target="_blank"
                                                href="index.php?erp=67&id=<?php echo $data['PK_ES_ID'];?>"
                                                class="text-muted">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
				  $counter++;
					}
						}
				?>

                                </tbody>
                            </table>


                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.card -->
            <!-- /.card -->


            <div class="row">

                <div class="col-12">
                    <h4>Pending Estimates <small> Non Commercial</small></h4>
                </div>

            </div>
            <!-- ./row -->
            <div class="row">
               
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header ">

                            <table id="pendingNonCommTable" class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Customer</th>
                                        <th>Estimate Number</th>
                                        <th>Order Date</th>
                                        <th>Due Date</th>
                                        <th>Difference</th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
				   $query = " SELECT comm.sono,cus.cus_name,comm.PK_ES_ID,comm.sale_date,comm.delivery_date FROM `erp_estimate_noncomm` as comm,erp_customer_master as cus where cus.pk_cus_id=comm.customer_id  and comm.order_status<6 ".$appendQuery." order by comm.delivery_date asc";
                   $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                    
                        $returnValue='NIL';
                        $estimatecomm=array();	
                        if(mysqli_num_rows($result)  > 0){
                            $counter=1;
                            while($data= mysqli_fetch_array($result)) 
                            {
							
                                
				  ?>

                                    <tr>
                                        <td><?php echo $counter;?></td>
                                        <td>

                                            <?php echo $data['cus_name'];?>
                                        </td>
                                        <td><?php echo $data['sono'];?></td>
                                        <td><?php echo date("d-M-Y", strtotime($data['sale_date']));?></td>
                                        <td> <?php echo date("d-M-Y", strtotime($data['delivery_date']));?></td>
                                        <td>
                                            <?php
					$date1=date_create(date("Y-m-d"));
					$date2=date_create($data['delivery_date']);
					$diff=date_diff($date1,$date2);
					//echo $diff->format("%R%a days");
					$daysDiff=$diff->format("%R%a");
					
					if($daysDiff==0)
					{
					?>
                                            <small class="text-primary mr-1">
                                                <i class="fas fa-check-square"></i>
                                                <span class="badge bg-danger">Today</span>
                                            </small>
                                            <?php
					}
					elseif($daysDiff<0)
					{
						?>
                                            <small class="text-danger mr-1"> <i
                                                    class="fas fa-arrow-down"></i>&nbsp;<?php echo $diff->format("%R%a days");?></small>
                                            <?php
						
					}
					elseif($daysDiff>0)
					{
						?>
                                            <small class="text-success mr-1"> <i
                                                    class="fas fa-arrow-down"></i>&nbsp;<?php echo $diff->format("%R%a days");?></small>
                                            <?php
						
					}
					?>
                                        </td>
                                        <td>
                                            <a target="_blank"
                                                href="index.php?erp=67&id=<?php echo $data['PK_ES_ID'];?>"
                                                class="text-muted">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
				  $counter++;
					}
						}
				?>

                                </tbody>
                            </table>


                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


</div>




<style type="text/css">
.dataTables_wrapper {
    margin-top: 14px;
}


</style>
<script>
var commpendrecordTable = $('#pendingCommTable').DataTable({
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
        commpendrecordTable.search($('.searchKeyword').val()).draw();
    } else {
        commpendrecordTable.search('').columns().search('').draw();
    }
});*/

var noncommpendrecordTable = $('#pendingNonCommTable').DataTable({
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
$('.search_key1').on('click', function(e) {
    if ($('.searchKeyword1').val() != '') {
        noncommpendrecordTable.search($('.searchKeyword1').val()).draw();
    } else {
        noncommpendrecordTable.search('').columns().search('').draw();
    }
});*/
</script>