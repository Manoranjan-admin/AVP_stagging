<?php
error_reporting(0);
include "classes/class_sale_order.php";
$obj_saleorder = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$getCustomerList = $obj_saleorder->getCustomerList();

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Customer Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">List Customer Report</li>
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

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <!--  <a class="nav-item nav-link active" id="nav-waiting-tab" data-toggle="tab" href="#nav-waiting" role="tab" aria-controls="waiting-approved" aria-selected="true">WAITING FOR APPROVAL</a>
                     <a class="nav-item nav-link" id="nav-approved-tab" data-toggle="tab" href="#nav-approved" role="tab" aria-controls="nav-approved" aria-selected="false">APPROVED</a>
                        <a class="nav-item nav-link" id="nav-cancelled-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-cancelled" aria-selected="false">CANCELLED</a>-->
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                    aria-labelledby="nav-waiting-tab">
                                    <form method="post" id="paidstatusForm" action="print_pdf/print_report_PS.php" >
                                    <table class="table">
                                        <thead>
                                            <tr class="filters">
                                                <th style="border: unset;">From date:
                                                    <input type="text" id="fromDate" class="form-control hasDatepicker " placeholder="DD/MM/YYYY" value="<?php echo date('d/m/Y') ?>" name="fromDate">
                                                </th>
                                                <th style="border: unset;">To date:
                                                    <input type="text" id="toDate" class="form-control hasDatepicker " placeholder="DD/MM/YYYY" value="<?php echo date('d/m/Y') ?>" name="toDate">
                                                </th>
                                                <th style="border: unset;">Customer:
                                                    <select id="customer-filter" name="customer-filter" class="form-control">
                                                        <option value="">All</option>
                                                         <?php if(!empty($getCustomerList) ){
                                                            while ($cus_rows = mysqli_fetch_array($getCustomerList)) {
                                                                
                                                              echo "<option value='".$cus_rows['pk_cus_id']."'>".$cus_rows['cus_name']."</option>";  
                                                             }
                                                             }
                                                            ?>
                                                       <!-- <option value="1">Paid</option>
                                                        <option value="2">Not Paid</option>-->

                                                        
                                                    </select>
                                                </th>

                                            </tr>
                                            <tr style="text-align: unset;"><th style="border: unset;"><button type="submit"  class="btn btn-primary" name="paidstatusSubmit" id="paidstatusSubmit" >Export</button></th></tr>
                                        </thead>
                                    </table>
                                    </form>
                                    <table id="customerreportTable"
                                        class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <!-- <th>S.No</th> -->
                                                <th>Order No</th>
                                                <th>Customer</th>
                                                <th>Date</th>
                                                <th>Items</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script
    src="assets/dist/js/customerreport_serverdatatable_ajax.js?version=<?php echo md5_file('js/customerreport_serverdatatable_ajax.js'); ?>">
</script>



<script>
   
$(".nav-link").removeClass("active");
$(".nav-item").removeClass("menu-open");

$(".report").addClass("menu-open");
$(".customerreport .nav-link").addClass("active");


</script>
<script type="text/javascript">

</script>
<style type="text/css">
.dataTables_wrapper {
    margin-top: 14px;
}
</style>