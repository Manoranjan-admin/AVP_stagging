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
                                        aria-controls="custom-tabs-one-inprogress" aria-selected="false">Balance
                                        Receivable</a>
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

                                    <table id="salesOrderTable"
                                        class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>Estimate No</th>
                                                <th>Customer</th>
                                                <th>Customer Code </th>
                                                <th>Date</th>
                                                <th>Total Amount(₹)</th>
                                                <th>Advance (₹)</th>
                                                <th>Advance Received (₹)</th>
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
                                <div class="tab-pane  " id="custom-tabs-one-cancelled" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-cancelled-tab">

                                    <table id="salesOrdercancelledTable"
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
                <h4 class="modal-title w-100 font-weight-bold">Reason for cancellation - <b><span
                            id="txt_ono"></span></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-6">
                    <label data-success="right" for="orangeForm-pass">Reason</label>
                    <input type="hidden" id="txt_oid" name="txt_oid" value="">
                    <input type="hidden" id="txt_sono" name="txt_sono" value="">
                    <textarea id="txt_reason" name="txt_reason" rows="5" class="form-control"
                        style="height: 68px !important;" required></textarea>
                    <span class="error" id="txt_reason_error"></span>

                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="btnCancelsub" class="btnCancelsub btn btn-warning">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="history_modal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h5 class="modal-title">Payment History</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <!-- <div class="d-flex flex-column justify-content-around mb-3">
                    <h6><b>Customer Code: </b><span id="customer_code">NA</span></h6>
                    <h6><b>Customer Name: </b><span id="customer_name">NA</span></h6>
                    <h6><b>Order No: </b><span id="order_no">NA</span></h6>
                </div> -->
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
<script
    src="assets/dist/js/so_serverdatatable_ajax.js?version=<?php echo md5_file('js/so_serverdatatable_ajax.js'); ?>">
</script>



<script>
    class Sales {
        constructor() {
            this.bindEvents();
        }

        bindEvents() {

            $('[title]').tooltip();

            $(document).on('click', ".view_rp_details", (e) => {
                const sono = $(e.currentTarget).data('sono');

                $("#history_modal").modal('show');
                this.loadRazorpayDetails(sono);
            });

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

        loadRazorpayDetails(sono) {
            $.ajax({
                url: "modules/sales/ajax_functions_commercial.php",
                type: "POST",
                data: {
                    mode: "getRazorpayDetails",
                    sono: sono
                },
                dataType: "json",
                beforeSend: () => {
                    $('#rp_payment_container').html(
                        `<div class="col-12 text-center">Loading...</div>`
                    );
                },
                success: (data) => {

                    $('#rp_payment_container').empty();

                    if (data.length === 0) {
                        $('#rp_payment_container').html(
                            `<div class="col-12 text-center">No Razorpay payments</div>`
                        );
                        return;
                    }

                    let total = 0;

                    data.forEach((row) => {

                        total += parseFloat(row.amount);

                        $('#rp_payment_container').append(`
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm border-left-success">
                            <div class="card-body">

                                <h6 class="mb-2"><b>Order No:</b> ${row.order_no}</h6>

                                <p><b>Payment ID:</b> ${row.razorpay_payment_id}</p>
                                <p><b>Razorpay Order:</b> ${row.razorpay_order_id}</p>

                                <p><b>Amount:</b> ₹ ${row.amount}</p>
                                <p><b>Status:</b> 
                                    <span class="badge badge-success">${row.status}</span>
                                </p>

                                <p><b>Method:</b> ${row.method}</p>
                                <p><b>Email:</b> ${row.email}</p>
                                <p><b>Contact:</b> ${row.contact}</p>

                                <p><b>Fee:</b> ₹ ${row.fee}</p>
                                <p><b>Tax:</b> ₹ ${row.tax}</p>

                                <p><b>VPA:</b> ${row.vpa}</p>

                                <p><b>Date:</b> ${row.created_at}</p>

                            </div>
                        </div>
                    </div>
                `);
                    });

                    // Total card
                    $('#rp_payment_container').append(`
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <b>Total Received: ₹ ${total}</b>
                    </div>
                </div>
            `);
                }
            });
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
                    $('#history_modal tbody').html(
                        `<tr><td colspan="8" class="text-center">Loading...<td></tr>`)
                },
                success: (data) => {
                    $('#history_modal tbody').empty();

                    if (data.length == 0) {
                        $('#history_modal tbody').append(
                            `<tr><td colspan="8" class="text-center">No data available<td></tr>`)
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
      $(".<?php echo $typscls; ?> .nav-link").addClass("active");*/
</script>
<style type="text/css">
    .dataTables_wrapper {
        margin-top: 14px;
    }

    .bg-Info {
        background-color: #17a2b8 !important;
    }
</style>