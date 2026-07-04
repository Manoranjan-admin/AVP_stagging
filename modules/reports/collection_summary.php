<?php



error_reporting(1);







include "classes/class_customer.php";



$obj_cus = new Customer('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $GLOBALS["___mysqli_ston"]);



$getcustomer = $obj_cus->getAllCustomer();



$cus_data = array();



while ($cus_rows = mysqli_fetch_array($getcustomer)) {



    $cus_data[] = $cus_rows;



}



$getfranchise  = $obj_cus->getAllFrachise();



$franch_data = array();



while ($franch_rows = mysqli_fetch_array($getfranchise)) {



    $franch_data[] = $franch_rows;



}











	if($_GET['type']==1){	



	$heading='Commercial Collection Report';



	}else if($_GET['type']==2){



	$heading='Non Commercial Collection Report';



	}		



							







function getTable($customerID,$tableName,$payTable)



{



	$query = "SELECT est.PK_ES_ID, (est.grand_total) as totalAmt,est.sono, est.sale_date,est.order_status,est.delivery_date FROM ".$tableName." as est where est.order_status != 6";



		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);



	



		



		$tableBody='';



        if(mysqli_num_rows($result)  > 0){



			$counter=1;



            while($data= mysqli_fetch_array($result)) 



			{



				



               $advance=getReceipts($data['PK_ES_ID'],0,$payTable);



			   $receipts=getReceipts($data['PK_ES_ID'],1,$payTable);



			   $tableBody .='	



							



                              <tr>



                                <td>'.$counter.'</td>



                                <td>'.$data['sono'].'</td>



								<td>'.$data['sale_date'].'</td>



								<td>'.$data['sale_date'].'</td>



								<td>'.date("d-M-Y", strtotime($data['sale_date'])).'</td>



                                <td style="text-align:right;">'.number_format($data['totalAmt'],2).'</td>





                              </tr>



                            ';



							$counter++;



            }



        }	



							







return $tableBody;



}







function getReceipts($cusID,$type,$payTable)



{



	



	



	$query = "SELECT sum(advance_amount) as advance FROM ".$payTable." where fk_es_id=".$cusID." and type=".$type;



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



function getStatus($status)



{



	



	switch ($status) 



	{



	  case 0:



		return("Yet to Start");



		break;



	   case 1:



		return("Designing");



		break;



	 case 2:



		return("Printing");



		break;



	 case 3:



		return("Lamination");



		break;



	 case 4:



		return("Finishing");



		break;



	 case 5:



		return("Ready for Delivery");



		break;



	 case 6:



		return("Delivered");



		break;	



	  default:



		return("Yet to Start");



	}



}







?>



<div class="content-wrapper" >



    <!-- Content Header (Page header) -->



    <section class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1><?php echo $heading;?>  </h1>



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



          <form class="" autocomplete="off" method="post" id="rmcyte_employee">



                     



						  <div class="row">



                        <div class="col-md-1 form-group col-md-auto">



                            <label for="name">From Date <span class="text-danger">*</span></label>



                            <input type="text" class="form-control" value="" name="from_date" id="from_date_filter" placeholder="">



                        </div>



                       



                        <div class="col-md-1 form-group col-md-auto">



                            <label for="email">To Date  <span class="text-danger">*</span></label>



                            <input type="text" class="form-control" value="" name="to_date"



                                id="to_date_filter" placeholder="">



                        </div>



						<!-- <div class="form-group col-md-auto">



                            <label for="name">Mode of Payment <span class="text-danger"></span></label>



                            <select class="form-control txt_mode_payment "



                                                        name="txt_mode_payment" id="txt_mode_payment"



                                                       >



                                                        <option value="">Select Mode of Payment</option>



                                                        <option value="1">Cash</option>



														<option value="2">Credit Card</option>



														<option value="3">UPI</option>

														

														<option value="4">Bank Transfer</option>



														<option value="5">Cheque</option>



                                                    </select>



                           



                        </div>-->



						 <div class="col-md-2 form-group col-md-auto">



                            <label for="name">Receipt Type <span class="text-danger"></span></label>



                            <select class="form-control txt_receipt_type "



                                                        name="txt_receipt_type" id="txt_receipt_type"



                                                       >



                                                        <option value="1">Single</option>



														<option value="2">Bulk</option>



                                                    </select>



                           



                        </div>



                      



                     



						  <div class="col-md-2 form-group col-md-auto">



                            <label for="name">Franchise <span class="text-danger"></span></label>



                            <select class="form-control txt_franchise_name "



                                                        name="txt_franchise_name" id="txt_franchise_name"



                                                       >



                                                        <option value="">All Franchise</option>



                                                        <?php for ($i = 0; $i < count($franch_data); $i++) {?>



                                                        <option value="<?php echo $franch_data[$i]['pk_cat_id']; ?>">



                                                            <?php echo $franch_data[$i]['cat_name'] ; ?>



                                                        </option>



                                                        <?php }?>



                                                    </select>



                           



                        </div>



						 <div class="col-md-2 form-group col-md-auto">



                            <label for="name">Customer <span class="text-danger"></span></label></br>



                            <select class="form-control txt_customer_name"



                                                        name="txt_customer_name" id="txt_customer_name"



                                                       >



                                                        <option value="">All Customers</option>



                                                       <?php for ($i = 0; $i < count($cus_data); $i++) {?>



                                                        <option value="<?php echo $cus_data[$i]['pk_cus_id']; ?>">



                                                            <?php echo $cus_data[$i]['cus_name'] . " - (" . $cus_data[$i]['cus_code'] . ")"; ?>



                                                        </option>



                                                        <?php }?>



                                                    </select>



                           



                        </div>



						 <!--<div class="form-group col-md-auto">



                            <label for="name">Customer <span class="text-danger">*</span></label>



                            <select class="form-control txt_customer_name "



                                                        name="txt_customer_name" id="txt_customer_name"



                                                       >



                                                        <option value="">Select Customer</option>



                                                        <?php for ($i = 0; $i < count($cus_data); $i++) {?>



                                                        <option value="<?php echo $cus_data[$i]['pk_cus_id']; ?>">



                                                            <?php echo $cus_data[$i]['cus_name'] . " - (" . $cus_data[$i]['cus_code'] . ")"; ?>



                                                        </option>



                                                        <?php }?>



                                                    </select>



                           



                        </div>-->



						<div class="col-md-2">



							 <input type="button" class="btn btn-info btn-lg butttns" value="Search" id="report_search">

							  <input type="button" class="btn btn-primary btn-lg butttns" value="Reset" id="report_reset">



							</div>



							 </div>



						<!--<div class="container">



						  <div class="row justify-content-md-center">



							<div class="col col-lg-2">



							 <input type="button" class="btn btn-info btn-lg" value="Search" id="report_search">



							</div>



							<div class="col-md-auto">



							  <input type="button" class="btn btn-primary btn-lg" value="Reset" id="report_reset">



							</div>



						  </div>



						</div>



						



						<div class="col-lg-12">



                             <div class="col-lg-1 pt-4">



                            <input type="search" class="btn btn-info btn-lg" value="Search" id="report_search">



                            



                        </div>



                        <div class="col-lg-1 pt-4">



                            <input type="reset" class="btn btn-primary btn-lg" value="Reset" id="report_reset">



                            



                        </div>



                        </div>-->



				



						 



                    </form>



                    <form id="frm-example" name="frm-example" method="POST" action="index.php?erp=105&type=<?php echo $_GET['type']; ?>" >



                                



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



                         



                     <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel" aria-labelledby="nav-waiting-tab">

                      <h4>Commercial Collection Summary</h4>

                      </div>

					 <div class="row">

                      <table id="com_table" class="table table-bordered table-striped dataTable dtr-inline">



                            <thead>



                            <tr>







                               <!--  <th>Total Estimate(₹)</th>-->



                                <th>Cash(₹)</th>



                                <th>UPI(₹)</th>



								<th>Bank(₹)</th>



								<th>Credit(₹)</th>

								

								<th>Cheque(₹)</th>



                                <!-- <th>Outstanding(₹)</th>-->



								



                           



                            </tr>



                            </thead>



                            



                            <tbody class="comm_body" id="comm_body">



                            	<?php //echo getTable($_GET['cusid'],'erp_estimate_comm','erp_advance_comm');?>

								<!-- <td></td>-->



                                <td></td>



								<td></td>



								<td></td>



								<td></td>

								

								<td></td>



                               <!-- <td style="text-align:right;"></td>-->



                                    



                            </tbody>

						



                           </table>

						   </div>



                           <br />

                                                

						<div class="tab-pane fade show active" id="nav-waiting" role="tabpanel" aria-labelledby="nav-waiting-tab">

                      <h4>Non Commercial Collection Summary</h4>

                      </div>

					 <div class="row">

                      <table id="non_com_table" class="table table-bordered table-striped dataTable dtr-inline">



                               <thead>



                            <tr>



                               <!-- <th>Total Estimate(₹)</th>-->



                                <th>Cash(₹)</th>



                                <th>UPI(₹)</th>



								<th>Bank(₹)</th>



								<th>Credit(₹)</th>

								

								<th>Cheque(₹)</th>



                               <!-- <th>Outstanding(₹)</th>-->

								                           



                            </tr>



                            </thead>



                            



                            <tbody class="noncomm_body" id="noncomm_body">



                            	<?php// echo getTable($_GET['cusid'],'erp_estimate_noncomm','erp_advance_noncomm');?>

								<!--<td></td> -->



                                <td></td>



								<td></td>



								<td></td>



								<td></td>



                                <td></td>

								

                              <!--  <td style="text-align:right;"></td> -->

                                    



                            </tbody>

							



                           </table>

						   </div>



                        



                      </div>



                      



                   </div>    



                    



              </div>



            </div>



                           </form>



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



 











                  



 



<style type="text/css">



  .dataTables_wrapper {



    margin-top: 14px;



  }



  



 .txt_customer_name {



    height: 35px;



    width: 250px;



}



 .butttns {



    margin: 20px;



}











</style>







<script>







$('#report_search').on('click', function(){



var comm_body='';

var non_comm_body='';

   $.ajax({

                url: "modules/reports/ajax_functions.php",

                type: 'POST',

              

		data: {

                    'mode': 'collection_summary_report',

					'fromDate': $('#from_date_filter').val(),

					'toDate': $('#to_date_filter').val(),

					'txt_receipt_type': $('#txt_receipt_type').val(),

					'txt_customer_name': $('#txt_customer_name').val(),

					'txt_franchise_name': $('#txt_franchise_name').val(),

					

                },

                success: function(data) {

                    var result = JSON.parse(data);

					$('#comm_body').html('');

					$('#noncomm_body').html('');

					//comm_body ='<td style="text-align:right;">' + result.grant_total + '</td><td style="text-align:right;">' + result.cash_total + '</td><td style="text-align:right;">' + result.upi_total + '</td><td style="text-align:right;">' + result.bank_total + '</td><td style="text-align:right;">' + result.credit_total + '</td><td style="text-align:right;">' + result.cheque_total + '</td><td style="text-align:right;">' + result.com_outstanding + '</td>';

					comm_body ='<td style="text-align:right;">' + result.cash_total + '</td><td style="text-align:right;">' + result.upi_total + '</td><td style="text-align:right;">' + result.bank_total + '</td><td style="text-align:right;">' + result.credit_total + '</td><td style="text-align:right;">' + result.cheque_total + '</td>';

					

				//	non_comm_body ='<td style="text-align:right;">' + result.non_grant_total + '</td><td style="text-align:right;">' + result.non_cash_total + '</td><td style="text-align:right;">' + result.non_upi_total + '</td><td style="text-align:right;">' + result.non_bank_total + '</td><td style="text-align:right;">' + result.non_credit_total + '</td><td style="text-align:right;">' + result.non_cheque_total + '</td><td style="text-align:right;">' + result.noncom_outstanding + '</td>';

				non_comm_body ='<td style="text-align:right;">' + result.non_cash_total + '</td><td style="text-align:right;">' + result.non_upi_total + '</td><td style="text-align:right;">' + result.non_bank_total + '</td><td style="text-align:right;">' + result.non_credit_total + '</td><td style="text-align:right;">' + result.non_cheque_total + '</td>';

					$('#comm_body').html(comm_body);

					$('#noncomm_body').html(non_comm_body);

                }

            });







});

    



$('#txt_customer_name').select2();



$('#report_reset').on('click', function(){



    $('#txt_customer_name').find("option:selected").prop("selected", false)



	$('#txt_mode_payment').find("option:selected").prop("selected", false)



	$('#txt_franchise_name').find("option:selected").prop("selected", false)



	$('#txt_receipt_type').find("option:selected").prop("selected", false)



	$('#from_date_filter').val('');



	$('#to_date_filter').val('');

	$('#txt_customer_name').select2();



});











    </script>