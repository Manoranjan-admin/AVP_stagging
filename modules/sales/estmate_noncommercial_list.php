<?php
// error_reporting(0);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$typs = (isset($_GET['typ']) && $_GET['typ'] == 1) ? 'Commercial' : 'Non Commercial';
$typsid = (isset($_GET['typ']) && $_GET['typ'] == 1) ? 65 : 66;
$typscls = (isset($_GET['typ']) && $_GET['typ'] == 1) ? 'estimate_commercial' : 'estimate_noncommercial';



?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->



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
                        <li class="breadcrumb-item active">List <?php echo $typs; ?> Estimate</li>
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
                                        aria-controls="custom-tabs-one-inprogress" aria-selected="false">Balance Receivable</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-complete-tab" data-toggle="pill"
                                        href="#custom-tabs-one-complete" role="tab"
                                        aria-controls="custom-tabs-one-complete" aria-selected="false">Completed</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-cancelled-tab" data-toggle="pill"
                                        href="#custom-tabs-one-cancelled" role="tab"
                                        aria-controls="custom-tabs-one-cancelled" aria-selected="false">Cancelled</a>
                                </li>


                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane active show" id="custom-tabs-one-inprogress" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-inprogress-tab">
                                    <table id="inprogessestimatenoncomm" class="table table-bordered dataTable  col-12">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>Estimate No</th>
                                                <th>Customer</th>
                                                <th>Customer Code </th>
                                                <th>Date</th>
                                                <th>Total Amount(₹)</th>
                                                <th>Plan Discount Amount</th>
                                                <th>Advance (₹)</th>
                                                <th>Balance Receivable(₹)</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) { ?>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5" style="text-align:right"></th>
                                                    <th colspan="1" style="text-align:right"></th>
                                                    <th colspan="5"></th>
                                                </tr>
                                            </tfoot>
                                        <?php } ?>
                                    </table>
                                </div>
                                <div class="tab-pane " id="custom-tabs-one-complete" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-complete-tab">

                                    <table id="completeestimatenoncomm" class="table table-bordered  dataTable  col-12"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>Estimate No</th>
                                                <th>Customer</th>
                                                <th>Customer Code </th>
                                                <th>Date</th>

                                                <!-- <th>Item Total</th>                                               -->
                                                <th>Total Amount(₹)</th>
                                                <th>Plan Discount Amount</th>
                                                <th>Advance (₹)</th>
                                                <th>Balance Receivable(₹)</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Amount Received Status</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) { ?>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5" style="text-align:right"></th>
                                                    <th colspan="1" style="text-align:right"></th>
                                                    <th colspan="6"></th>
                                                </tr>
                                            </tfoot>
                                        <?php } ?>
                                    </table>
                                </div>
                                <div class="tab-pane " id="custom-tabs-one-cancelled" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-cancelled-tab">

                                    <table id="cancelledestimatenoncomm" class="table table-bordered  dataTable  col-12"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>Estimate No</th>
                                                <th>Customer</th>
                                                <th>Customer Code </th>
                                                <th>Date</th>
                                                <th>Total Amount(₹)</th>
                                                <th>Advance (₹)</th>
                                                <th>Balance Receivable(₹)</th>
                                                <th>Reason</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) { ?>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5" style="text-align:right"></th>
                                                    <th colspan="1" style="text-align:right"></th>
                                                    <th colspan="4"></th>
                                                </tr>
                                            </tfoot>
                                        <?php } ?>
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

<div class="modal fade" id="modalCancelBtn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Reason for cancellation - <b><span id="txt_ono"></span></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-6">
                    <label data-success="right" for="orangeForm-pass">Reason</label>
                    <input type="hidden" id="txt_oid" name="txt_oid" value="">
                    <input type="hidden" id="txt_sono" name="txt_sono" value="">
                    <textarea id="txt_reason" name="txt_reason" rows="5" class="form-control" style="height: 68px !important;" required></textarea>
                    <span class="error" id="txt_reason_error"></span>

                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="btnCancelsub" class="btnCancelsub btn btn-warning">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- <script src="assets/dist/js/noncommer_table_ajax.js?version=<?php echo md5_file('js/noncommer_table_ajax.js'); ?>">
</script> -->

<div class="modal fade" id="history_modal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h5 class="modal-title">Payment History</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="d-flex flex-column justify-content-around mb-3">
                    <h6><b>Customer Code: </b><span id="customer_code">NA</span></h6>
                    <h6><b>Customer Name: </b><span id="customer_name">NA</span></h6>
                    <h6><b>Order No: </b><span id="order_no">NA</span></h6>
                </div>
                <div class="table-responsive">
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Order No</th>
                                <th>Type</th>
                                <th>Payment Type</th>
                                <th>Amount</th>
                                <th>Discount</th>
                                <th>Remarks</th>
                                <th>Paid Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ajax function -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$file_path = 'js/noncommer_table_ajax.js';
$version = file_exists($file_path) ? md5_file($file_path) : time(); // Use a fallback version
?>
<script src="assets/dist/js/noncommer_table_ajax.js?version=<?php echo htmlspecialchars($version); ?>"></script>


<script>
    class Sales {
        constructor() {
            this.bindEvents();
        }

        bindEvents() {

            $('[title]').tooltip();

            $(document).on('click', ".view_his_btn", (e) => {
                const tarEle = $(e.currentTarget);
                const pk_es_id = tarEle.data('es_id');
                const cus_code = tarEle.data('cus_code');
                const cus_name = tarEle.data('cus_name');
                const sono = tarEle.data('sono');
                $("#customer_code").text(cus_code);
                $("#customer_name").text(cus_name);
                $("#order_no").text(sono);
                this.viewPaymentHistory(pk_es_id);
            });
        }


        getPaymentType(id) {
            if (id == 1) {
                return 'Cash';
            } else if (id == 2) {
                return 'Credit Card';
            } else if (id == 3) {
                return 'UPI';
            } else if (id == 4) {
                return 'Bank Transfer';
            } else if (id == 5) {
                return 'Cheque';
            } else {
                return 'NA';
            }
        }

        viewPaymentHistory(pk_es_id) {
            $.ajax({
                url: "modules/reports/ajax_functions.php",
                type: "POST",
                data: {
                    mode: "viewPaymentHistory",
                    pk_es_id: pk_es_id,
                    type: <?= $_GET['typ'] ?>
                },
                dataType: "json",
                beforeSend: () => {
                    $('#history_modal tbody').html(`<tr><td colspan="8" class="text-center">Loading...<td></tr>`)
                },
                success: (data) => {
                    $('#history_modal tbody').empty();

                    if (data.length == 0) {
                        $('#history_modal tbody').append(`<tr><td colspan="8" class="text-center">No data available<td></tr>`)
                    } else {

                        var total_amount = 0;

                        data.forEach((row, index) => {

                            total_amount += parseInt(row.advance_amount);

                            $('#history_modal tbody').append(`
                                <tr>
                                    <td>${index+1}</td>
                                    <td>${row.sono}</td>
                                    <td>${row.type==0 ? 'Advance Payment' : row.type==1 ? 'Bill Payment' : 'Bulk Payment'}</td>
                                    <td>${this.getPaymentType(row.payment_type)}</td>
                                    <td>₹ ${row.advance_amount}</td>
                                    <td>₹ ${row.discount}</td>
                                    <td>${row.remarks}</td>
                                    <td>${row.paid_date}</td>
                                </tr>
                            `)

                        })

                        $('#history_modal tbody').append(`
                            <tr class="bg-Info">
                                <th colspan="4" class="text-white">Total Amount:</th>
                                <td colspan="4" class="text-white">₹ ${total_amount}</td>
                            </tr>
                        `)
                    }


                },
                complete: function() {}
            });
        }
    }

    $(document).ready(function() {
        const salObj = new Sales();
    })

    /*
  $(".nav-link").removeClass("active");
  $(".nav-item").removeClass("menu-open");

  $(".estimate").addClass("menu-open");
  $(".estimate_noncommercial.nav-link").addClass("active");*/
</script>
<style type="text/css">
    .dataTables_wrapper {
        margin-top: 14px;
    }
</style>