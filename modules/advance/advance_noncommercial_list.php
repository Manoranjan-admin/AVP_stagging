<?php
error_reporting(0);
$typs = (isset($_GET['typ']) && $_GET['typ']==1) ? 'Commercial': 'Non Commercial';
$typsid = (isset($_GET['typ']) && $_GET['typ']==1) ? 65: 66;
$typscls = (isset($_GET['typ']) && $_GET['typ']==1) ? 'estimate_commercial': 'estimate_noncommercial';


 ?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Of Non Commercial Advance</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">List Non Commercial Advance</li>
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
                            <div class="mb-2 text-right">
                                <a href="index.php?erp=84" class="btn btn-primary"><i class="fa fa-plus mr-2"
                                        aria-hidden="true"></i> Add New <?php //echo $typs; ?> Non Commercial
                                    Advance</a>
                            </div>
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
                                    <table id="noncom_advanceTable"
                                        class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>So.No</th>
                                                <th>Customer</th>
                                                <th>Customer Code</th>
                                                <th>Date</th>
                                                <th>Payment type</th>
                                                <th>Advance Amount(₹)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="6" style="text-align:right">Total:</th>
                                                <th colspan="2"></th>
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
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script src="assets/dist/js/noncommer_table_ajax.js?version=<?php echo md5_file('js/noncommer_table_ajax.js');?>">
</script>



<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#example2").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#example3").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
$(".nav-link").removeClass("active");
$(".nav-item").removeClass("menu-open");

$(".estimate").addClass("menu-open");
$(".estimate_noncommercial.nav-link").addClass("active");
</script>
<style type="text/css">
.dataTables_wrapper {
    margin-top: 14px;
}
</style>