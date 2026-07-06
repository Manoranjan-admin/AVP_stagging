<?php
error_reporting(0);
$heading='Outstanding Report';


$tableHead='<table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Customer Name.</th>
                                <th>Total Amount (₹)</th>
								<th>Advance (₹)</th>                              
                                <th>Receipts (₹)</th>
								<th>Outstanding (₹)</th>
                               
                            </tr>
                            </thead>';
							
							
							$query = "SELECT sum(est.grand_total) as totalAmt,cus.cus_name,cus.pk_cus_id FROM `erp_estimate_comm` as est,erp_customer_master as cus where cus.pk_cus_id=est.customer_id group by customer_id";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
		$returnValue='NIL';
        $estimatecomm=array();	
        if(mysqli_num_rows($result)  > 0){
			$counter=1;
            while($data= mysqli_fetch_array($result)) 
			{
				
               $advance=getReceipts($data['pk_cus_id'],0);
			   $receipts=getReceipts($data['pk_cus_id'],1);
			   $tableBody .='	
						
                              <tr>
                                <td>'.$counter.'</td>
                                <td>'.$data['cus_name'].'</td>
                                <td style="text-align:right;">'.number_format($data['totalAmt'],2).'</td>
								<td style="text-align:right;">'.number_format($advance,2).'</td>                                      
								<td style="text-align:right;">'.number_format($receipts,2).'</td>  
								<td style="text-align:right;">'.number_format($data['totalAmt']-($receipts+$advance),2).'</td>                          
                               
                              </tr>
                            ';
							$counter++;
            }
        }	
							


$tableFooter='</tbody>
                        </table>';
						
$tableData=$tableHead.$tableBody.$tableFooter;

function getReceipts($cusID,$type)
{
	
	
	$query = "SELECT sum(advance_amount) as advance FROM `erp_advance_comm` where customer_id=".$cusID." and type=".$type;
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
		$returnValue='0';
        $estimatecomm=array();	
        if(mysqli_num_rows($result)  > 0){
			$counter=1;
            while($data= mysqli_fetch_array($result)) 
			{
				$returnValue=$data['advance'];
			}
		}
		return $returnValue;
}


?>
<div class="content-wrapper" >
	
            
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"><!-- ./row -->
        <div class="row">
          <div class="col-12">
            <h4>Order Status&nbsp;<small>Commercial</small></h4>
          </div>
        </div>
        <!-- ./row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-lightblue color-palette card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Yet to Start</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-design" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Designing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Printing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Lamination</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Finishing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-ready" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Ready for Delivery</a>
                  </li>
                   
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
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
				   $query = " SELECT comm.sono,cus.cus_name,comm.PK_ES_ID,comm.sale_date,comm.delivery_date FROM `erp_estimate_comm` as comm,erp_customer_master as cus where cus.pk_cus_id=comm.customer_id and comm.PK_ES_ID not in(select fk_so_id from erp_order_status) order by comm.delivery_date asc";
                   $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                    
                        $returnValue='NIL';
                        $estimatecomm=array();	
                        if(mysqli_num_rows($result)  > 0){
                            $counter=1;
                            while($data= mysqli_fetch_array($result)) 
                            {
							
                                
				  ?>
				  
                  <tr>
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
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        <span class="badge bg-danger">Today</span>
                      </small>
                    <?php
					}
					else
					{
						?>
                         <small class="text-danger mr-1"> <i class="fas fa-arrow-down"></i>&nbsp;<?php echo $diff->format("%R%a days");?></small>
                        <?php
						
					}
					?>
                    </td>
                    <td>
                      <a  target="_blank" href="index.php?erp=67&id=<?php echo $data['PK_ES_ID'];?>" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
					}
						}
				?>
                  
                  </tbody>
                </table>
                  </div>
                  <div class="tab-pane fade " id="custom-tabs-one-design" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
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
				   $query = " SELECT comm.sono,cus.cus_name,comm.PK_ES_ID,comm.sale_date,comm.delivery_date FROM `erp_estimate_comm` as comm,erp_customer_master as cus where cus.pk_cus_id=comm.customer_id and comm.PK_ES_ID  in (select fk_so_id from erp_order_status where status=1) order by comm.delivery_date asc";
                   $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                    
                        $returnValue='NIL';
                        $estimatecomm=array();	
                        if(mysqli_num_rows($result)  > 0){
                            $counter=1;
                            while($data= mysqli_fetch_array($result)) 
                            {
							
                                
				  ?>
				  
                  <tr>
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
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        <span class="badge bg-danger">Today</span>
                      </small>
                    <?php
					}
					else
					{
						?>
                         <small class="text-danger mr-1"> <i class="fas fa-arrow-down"></i>&nbsp;<?php echo $diff->format("%R%a days");?></small>
                        <?php
						
					}
					?>
                    </td>
                    <td>
                       <a target="_blank" href="index.php?erp=67&id=<?php echo $data['PK_ES_ID'];?>" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
					}
						}
				?>
                  
                  </tbody>
                </table>
                  </div>
                  <div class="tab-pane fade " id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
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
				   $query = " SELECT comm.sono,cus.cus_name,comm.PK_ES_ID,comm.sale_date,comm.delivery_date FROM `erp_estimate_comm` as comm,erp_customer_master as cus where cus.pk_cus_id=comm.customer_id and comm.PK_ES_ID  in (select fk_so_id from erp_order_status where status=2) order by comm.delivery_date asc";
                   $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                    
                        $returnValue='NIL';
                        $estimatecomm=array();	
                        if(mysqli_num_rows($result)  > 0){
                            $counter=1;
                            while($data= mysqli_fetch_array($result)) 
                            {
							
                                
				  ?>
				  
                  <tr>
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
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        <span class="badge bg-danger">Today</span>
                      </small>
                    <?php
					}
					else
					{
						?>
                         <small class="text-danger mr-1"> <i class="fas fa-arrow-down"></i>&nbsp;<?php echo $diff->format("%R%a days");?></small>
                        <?php
						
					}
					?>
                    </td>
                    <td>
                      <a target="_blank" href="index.php?erp=67&id=<?php echo $data['PK_ES_ID'];?>" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
					}
						}
				?>
                  
                  </tbody>
                </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                     <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
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
				   $query = " SELECT comm.sono,cus.cus_name,comm.PK_ES_ID,comm.sale_date,comm.delivery_date FROM `erp_estimate_comm` as comm,erp_customer_master as cus where cus.pk_cus_id=comm.customer_id and comm.PK_ES_ID  in (select fk_so_id from erp_order_status where status=3) order by comm.delivery_date asc";
                   $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                    
                        $returnValue='NIL';
                        $estimatecomm=array();	
                        if(mysqli_num_rows($result)  > 0){
                            $counter=1;
                            while($data= mysqli_fetch_array($result)) 
                            {
							
                                
				  ?>
				  
                  <tr>
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
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        <span class="badge bg-danger">Today</span>
                      </small>
                    <?php
					}
					else
					{
						?>
                         <small class="text-danger mr-1"> <i class="fas fa-arrow-down"></i>&nbsp;<?php echo $diff->format("%R%a days");?></small>
                        <?php
						
					}
					?>
                    </td>
                    <td>
                       <a target="_blank" href="index.php?erp=67&id=<?php echo $data['PK_ES_ID'];?>" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
					}
						}
				?>
                  
                  </tbody>
                </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                     <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
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
				   $query = " SELECT comm.sono,cus.cus_name,comm.PK_ES_ID,comm.sale_date,comm.delivery_date FROM `erp_estimate_comm` as comm,erp_customer_master as cus where cus.pk_cus_id=comm.customer_id and comm.PK_ES_ID  in (select fk_so_id from erp_order_status where status=4) order by comm.delivery_date asc";
                   $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                    
                        $returnValue='NIL';
                        $estimatecomm=array();	
                        if(mysqli_num_rows($result)  > 0){
                            $counter=1;
                            while($data= mysqli_fetch_array($result)) 
                            {
							
                                
				  ?>
				  
                  <tr>
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
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        <span class="badge bg-danger">Today</span>
                      </small>
                    <?php
					}
					else
					{
						?>
                         <small class="text-danger mr-1"> <i class="fas fa-arrow-down"></i>&nbsp;<?php echo $diff->format("%R%a days");?></small>
                        <?php
						
					}
					?>
                    </td>
                    <td>
                       <a target="_blank" href="index.php?erp=67&id=<?php echo $data['PK_ES_ID'];?>" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
					}
						}
				?>
                  
                  </tbody>
                </table>
                  </div>
                   <div class="tab-pane fade" id="custom-tabs-one-ready" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
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
				   $query = " SELECT comm.sono,cus.cus_name,comm.PK_ES_ID,comm.sale_date,comm.delivery_date FROM `erp_estimate_comm` as comm,erp_customer_master as cus where cus.pk_cus_id=comm.customer_id and comm.PK_ES_ID  in (select fk_so_id from erp_order_status where status=5) order by comm.delivery_date asc";
                   $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                    
                        $returnValue='NIL';
                        $estimatecomm=array();	
                        if(mysqli_num_rows($result)  > 0){
                            $counter=1;
                            while($data= mysqli_fetch_array($result)) 
                            {
							
                                
				  ?>
				  
                  <tr>
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
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        <span class="badge bg-danger">Today</span>
                      </small>
                    <?php
					}
					else
					{
						?>
                         <small class="text-danger mr-1"> <i class="fas fa-arrow-down"></i>&nbsp;<?php echo $diff->format("%R%a days");?></small>
                        <?php
						
					}
					?>
                    </td>
                    <td>
                       <a target="_blank" href="index.php?erp=67&id=<?php echo $data['PK_ES_ID'];?>" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
					}
						}
				?>
                  
                  </tbody>
                </table>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <!-- /.row --><!-- /.card --><!-- /.card -->
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