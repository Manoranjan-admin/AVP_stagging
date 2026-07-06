<?php
function getCount($table,$typ,$condition)
{
		$query = "SELECT ".$typ." as theRes FROM ".$table." where ".$condition."";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
		$returnValue='NIL';
        $estimatecomm=array();	
        if(mysqli_num_rows($result)  > 0){
            while($data= mysqli_fetch_array($result)) 
			{
               $returnValue= $data['theRes'];
            }
        }
		return $returnValue;
}
		

	
?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Today's Statistics</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Todays Statistics - Report Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <h2>Commercial</h2>
            </div>
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo getCount('erp_estimate_comm','count(PK_ES_ID)','sale_date=CURRENT_DATE');	;?><sup
                                    style="font-size: 20px">(Nos.)</sup> |
                                <?php echo number_format(getCount('erp_estimate_comm','sum(grand_total)','sale_date=CURRENT_DATE'),2);	;?><sup
                                    style="font-size: 20px">(₹)</sup></h3>

                            <p>Today's Estimates</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="index.php?erp=92&typ=1" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo getCount('erp_invoice_comm','count(grand_total)','date=CURRENT_DATE');	;?><sup
                                    style="font-size: 20px">(Nos.)</sup> |
                                <?php echo number_format(getCount('erp_invoice_comm','sum(grand_total)','date=CURRENT_DATE'),2);?><sup
                                    style="font-size: 20px">(₹)</sup></h3>

                            <p>Today's Invoices</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="index.php?erp=92&typ=2" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo number_format(getCount('erp_advance_comm','sum(advance_amount)','date=CURRENT_DATE and type=0'),2);	;?><sup
                                    style="font-size: 20px">(₹)</sup></h3>

                            <p>Today's Advances</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="index.php?erp=92&typ=3" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo number_format(getCount('erp_advance_comm','sum(advance_amount)','date=CURRENT_DATE and type=1'),2);	;?><sup
                                    style="font-size: 20px">(₹)</sup></h3>

                            <p>Today's Receipts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="index.php?erp=92&typ=4" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <!-- ./col -->
            <div class="row">
                <h2>Non Commercial</h2>
            </div>
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo getCount('erp_estimate_noncomm','count(PK_ES_ID)','sale_date=CURRENT_DATE');	;?><sup
                                    style="font-size: 20px">(Nos.)</sup> |
                                <?php echo number_format(getCount('erp_estimate_noncomm','sum(grand_total)','sale_date=CURRENT_DATE'),2);	;?><sup
                                    style="font-size: 20px">(₹)</sup></h3>

                            <p>Today's Estimates</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="index.php?erp=92&typ=5" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo getCount('erp_invoice_noncomm','count(grand_total)','date=CURRENT_DATE');	;?><sup
                                    style="font-size: 20px">(Nos.)</sup> |
                                <?php echo number_format(getCount('erp_invoice_noncomm','sum(grand_total)','date=CURRENT_DATE'),2);?><sup
                                    style="font-size: 20px">(₹)</sup></h3>

                            <p>Today's Invoices</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="index.php?erp=92&typ=6" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo number_format(getCount('erp_advance_noncomm','sum(advance_amount)','date=CURRENT_DATE and type=0'),2);	;?><sup
                                    style="font-size: 20px">(₹)</sup></h3>

                            <p>Today's Advances</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="index.php?erp=92&typ=7" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo number_format(getCount('erp_advance_noncomm','sum(advance_amount)','date=CURRENT_DATE and type=1'),2);	;?><sup
                                    style="font-size: 20px">(₹)</sup></h3>

                            <p>Today's Receipts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="index.php?erp=92&typ=8" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <!--<div class="row">
                <?php
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
                <div class="content-wrapper" style="min-height: 1342.88px;">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1><?php echo $heading;?> </h1>
                                </div>

                            </div>
                        </div>
                    </section>


                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="card card-primary">

                                        <div class="card-body">



                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                                    aria-labelledby="nav-waiting-tab">
                                                    <?php echo $tableData;?>
                                                </div>


                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>-->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>