<?php
error_reporting(0);
$typs = (isset($_GET['typ']) && $_GET['typ'] == 1) ? 'Commercial' : 'Non Commercial';
$typsid = (isset($_GET['typ']) && $_GET['typ'] == 1) ? 65 : 66;
$typscls = (isset($_GET['typ']) && $_GET['typ'] == 1) ? 'estimate_commercial' : 'estimate_noncommercial';

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->

    <!-- Main content -->

    <section class="content-header">
        <div class="container-fluid">

            <div class="mb-2 text-right">
                <a href="index.php?erp=<?php echo $typsid; ?>" class="btn btn-primary"><i class="fa fa-plus mr-2"
                        aria-hidden="true"></i> Add New Estimate</a>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List <?php echo $typs; ?> Estimate</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">List <?php echo $typs; ?>Estimate</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- ./row -->
            <div class="row">
                <div class="col-12">
                </div>
            </div>
            <!-- ./row -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-lightblue color-palette card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-inprogress-tab" data-toggle="pill"
                                        href="#custom-tabs-one-inprogress" role="tab"
                                        aria-controls="custom-tabs-one-inprogress" aria-selected="false">Pending</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-complete-tab" data-toggle="pill"
                                        href="#custom-tabs-one-complete" role="tab"
                                        aria-controls="custom-tabs-one-complete" aria-selected="false">Not Paid Completed</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-paidcomplete-tab" data-toggle="pill"
                                        href="#custom-tabs-one-paidcomplete" role="tab"
                                        aria-controls="custom-tabs-one-paidcomplete" aria-selected="false">Paid Completed</a>
                                </li>
                               

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane active show" id="custom-tabs-one-inprogress" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-inprogress-tab">
                                    <table id="salesOrderTable"
                                        class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>Estimate No</th>
                                                <th>Customer</th>
                                                <th>Customer Code </th>
                                                <th>Date</th>
                                                <th>Advance (₹)</th>
                                                <th>Pending Amount (₹)</th>
                                                <th>Total Amount(₹)</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) {?>
                                        <tfoot>
                                            <tr>
                                                <th colspan="7" style="text-align:right"></th>
                                                <th colspan="1" style="text-align:right"></th>
                                                <th colspan="3"></th>
                                            </tr>
                                        </tfoot>
                                        <?php }?>
                                    </table>
                                </div>
                                <div class="tab-pane  " id="custom-tabs-one-complete" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-complete-tab">
                                    <table id="salesOrdercompleteTable"
                                        class="table table-bordered table-striped dataTable dtr-inline"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>Estimate No</th>
                                                <th>Customer</th>
                                                <th>Customer Code </th>
                                                <th>Date</th>

                                                <th>Total Amount(₹)</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Paid Status</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) {?>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5" style="text-align:right"></th>
                                                <th colspan="1" style="text-align:right"></th>
                                                <th colspan="3"></th>

                                            </tr>
                                        </tfoot>
                                        <?php }?>
                                    </table>
                                </div>
                                <div class="tab-pane  " id="custom-tabs-one-paidcomplete" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-complete-tab">
                                    <table id="salesOrderpaidcompleteTable"
                                        class="table table-bordered table-striped dataTable dtr-inline"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>Estimate No</th>
                                                <th>Customer</th>
                                                <th>Customer Code </th>
                                                <th>Date</th>

                                                <th>Total Amount(₹)</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Paid Status</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) {?>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5" style="text-align:right"></th>
                                                <th colspan="1" style="text-align:right"></th>
                                                <th colspan="3"></th>

                                            </tr>
                                        </tfoot>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.card -->
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script
    src="assets/dist/js/so_serverdatatable_ajax.js?version=<?php echo md5_file('js/so_serverdatatable_ajax.js'); ?>">
</script>



<script>
/*
  $(".nav-link").removeClass("active");
  $(".nav-item").removeClass("menu-open");

  $(".estimate").addClass("menu-open");
  $(".<?php echo $typscls; ?> .nav-link").addClass("active");*/
</script>
<style type="text/css">
.dataTables_wrapper {
    margin-top: 14px;
}
</style>