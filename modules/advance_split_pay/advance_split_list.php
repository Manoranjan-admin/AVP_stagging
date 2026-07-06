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

                    <div class="col-sm-6 mb-3">
                        <?php if ($_GET['type'] == 1) { ?>
                            <h1>List Commercial Advance</h1>
                        <?php } elseif ($_GET['type'] == 2) { ?>
                            <h1>List NonCommercial Advance</h1>
                        <?php } ?>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">List Advance</li>
                        </ol>
                    </div>
                    <div class="col-lg-4">
                        <label>Item Type <span class="text-danger">*</span></label>
                        <select id="stock_type" class="form-control">
                            <option value="1" <?= $_GET['type'] == 1 ? 'selected' : '' ?>>Commercial</option>
                            <option value="2" <?= $_GET['type'] == 2 ? 'selected' : '' ?>>Non Commercial</option>
                        </select>
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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <?php if ($_GET['type'] == 1) : ?>
                                <div class="mb-2 text-right">
                                    <a href="index.php?erp=148&type=1" class="btn btn-primary"><i class="fa fa-plus mr-2"
                                            aria-hidden="true"></i> Add New Commercial Advance</a>
                                </div>
                            <?php elseif ($_GET['type'] == 2) : ?>
                                <div class="mb-2 text-right">
                                    <a href="index.php?erp=148&type=2" class="btn btn-primary"><i class="fa fa-plus mr-2"
                                            aria-hidden="true"></i> Add New NonCommercial Advance</a>
                                </div>
                            <?php endif; ?>

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                </div>
                            </nav>

                            <?php if ($_GET['type'] == 1) { ?>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                        aria-labelledby="nav-waiting-tab">
                                        <table id="com_advanceTable"
                                            class="table table-bordered table-striped dataTable dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th>S.No </th>
                                                    <th>So.No</th>
                                                    <th>Customer</th>
                                                    <th>Customer Code</th>
                                                    <th>Date</th>
                                                    <th>Receipts type</th>
                                                    <th>Advance Amount(₹)</th>
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
                                        <table id="noncom_advanceTable"
                                            class="table table-bordered table-striped dataTable dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th>S.No </th>
                                                    <th>So.No</th>
                                                    <th>Customer</th>
                                                    <th>Customer Code</th>
                                                    <th>Date</th>
                                                    <th>Receipts type</th>
                                                    <th>Advance Amount(₹)</th>
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
<style>

</style>
<script src="assets/dist/js/advance_split_pay_table_ajax.js?version=<?php echo md5_file('js/noncommer_table_ajax.js'); ?>">
</script>

<script>
    class AdvanceSplitList {

        constructor() {
            this.bindEvents();
        }

        bindEvents() {
            $('#stock_type').on("change", (e) => this.changeNoncommercial(e))
        }

        changeNoncommercial() {
            const url = new URL(location.href);
            const type = url.searchParams.get("type");
            url.searchParams.set("type", type == 1 ? 2 : 1);
            location.href = url.toString();
        }


    }


    $(document).ready(function() {
        var asObj = new AdvanceSplitList();
    })
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