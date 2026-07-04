<?php
error_reporting(0);
/*$typs = (isset($_GET['typ']) && $_GET['typ']==1) ? 'Commercial': 'Non Commercial';
$typsid = (isset($_GET['typ']) && $_GET['typ']==1) ? 65: 66;
$typscls = (isset($_GET['typ']) && $_GET['typ']==1) ? 'estimate_commercial': 'estimate_noncommercial';*/

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <form class="" autocomplete="off" method="post" id="advance_list">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <?php if ($_GET['type'] == 1) { ?>
                            <h1>List Commercial Bill Receipts</h1>
                        <?php } elseif ($_GET['type'] == 2) { ?>
                            <h1>List NonCommercial Bill Receipts</h1>
                        <?php } ?>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">List Bill Receipts</li>
                        </ol>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="name">From Date <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?php
                                                                        echo date('d/m/Y', strtotime("-1 months"));
                                                                        ?>" name="from_date" id="from_date" placeholder="">
                    </div>

                    <div class="col-lg-4 form-group">
                        <label for="email">To Date</label>
                        <input type="text" class="form-control" value="<?php echo date('d/m/Y') ?>" name="to_date"
                            id="to_date" placeholder="">
                    </div>
                    <div class="col-lg-4 pt-4">
                        <input type="button" class="btn btn-info btn-lg butttns" value="Search" id="report_search">
                        <input type="reset" class="btn btn-primary btn-lg" value="Reset" id="report_reset">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </form>
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

                            <?php if ($_GET['type'] == 1) { ?>
                                <div class="mb-2 text-right">
                                    <a href="index.php?erp=89&type=1" class="btn btn-primary"><i class="fa fa-plus mr-2"
                                            aria-hidden="true"></i> Add New Commercial Bill Receipts</a>

                                </div>
                            <?php } elseif ($_GET['type'] == 2) { ?>
                                <div class="mb-2 text-right">
                                    <a href="index.php?erp=89&type=2" class="btn btn-primary"><i class="fa fa-plus mr-2"
                                            aria-hidden="true"></i> Add New NonCommercial Bill Receipts</a>

                                </div>
                            <?php } ?>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <!--  <a class="nav-item nav-link active" id="nav-waiting-tab" data-toggle="tab" href="#nav-waiting" role="tab" aria-controls="waiting-approved" aria-selected="true">WAITING FOR APPROVAL</a>
                     <a class="nav-item nav-link" id="nav-approved-tab" data-toggle="tab" href="#nav-approved" role="tab" aria-controls="nav-approved" aria-selected="false">APPROVED</a>
                        <a class="nav-item nav-link" id="nav-cancelled-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-cancelled" aria-selected="false">CANCELLED</a>-->
                                </div>
                            </nav>
                            <?php if ($_GET['type'] == 1) { ?>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                        aria-labelledby="nav-waiting-tab">
                                        <table id="com_billTable"
                                            class="table table-bordered table-striped dataTable dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th>S.No </th>
                                                    <th>So.No</th>
                                                    <th>Customer</th>
                                                    <th>Customer Code</th>
                                                    <th>Date</th>
                                                    <th>Receipts type</th>
                                                    <th>Paid Amount(₹)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) { ?>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="6" style="text-align:right"></th>
                                                        <th colspan="2"></th>
                                                    </tr>
                                                </tfoot>
                                            <?php } ?>
                                        </table>
                                    </div>

                                </div> <?php } elseif ($_GET['type'] == 2) { ?>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                        aria-labelledby="nav-waiting-tab">
                                        <table id="noncom_billTable"
                                            class="table table-bordered table-striped dataTable dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th>S.No </th>
                                                    <th>So.No</th>
                                                    <th>Customer</th>
                                                    <th>Customer Code</th>

                                                    <th>Date</th>
                                                    <th>Receipts type</th>
                                                    <th>Paid Amount(₹)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) { ?>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="6" style="text-align:right"></th>
                                                        <th colspan="2"></th>
                                                    </tr>
                                                </tfoot>
                                            <?php } ?>
                                        </table>
                                    </div>

                                </div>
                            <?php
                                    }
                            ?>

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

<script src="assets/dist/js/noncommer_table_ajax.js?version=<?php echo md5_file('js/noncommer_table_ajax.js'); ?>">
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