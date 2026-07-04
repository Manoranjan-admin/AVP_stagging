<?php
error_reporting(0);


?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->

    <!-- Main content -->

    <section class="content-header">
      <div class="container-fluid">

      <div class="mb-2 text-right">
                    </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Search Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">List Search Order</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid"><!-- ./row -->
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
                    <a class="nav-link active" id="estimatecomm-tabs-one-inprogress-tab" data-toggle="pill" href="#estimatecomm-tabs-one-inprogress" role="tab" aria-controls="estimatecomm-tabs-one-inprogress" aria-selected="false">Commercial Estimate InProgress</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="estimatecomm-tabs-one-complete-tab" data-toggle="pill" href="#estimatecomm-tabs-one-complete" role="tab" aria-controls="estimatecomm-tabs-one-complete" aria-selected="false"> Commercial Estimate Completed</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="estimatenon-tabs-one-inprogress-tab" data-toggle="pill" href="#estimatenon-tabs-one-inprogress" role="tab" aria-controls="estimatenon-tabs-one-inprogress" aria-selected="false">Non Commercial Estimate InProgress</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="estimatenon-tabs-one-complete-tab" data-toggle="pill" href="#estimatenon-tabs-one-complete" role="tab" aria-controls="estimatenon-tabs-one-complete" aria-selected="false">Non Commercial Estimate Completed</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="invoicecomm-tabs-one-complete-tab" data-toggle="pill" href="#invoicecomm-tabs-one-complete" role="tab" aria-controls="invoicecomm-tabs-one-complete" aria-selected="false">Commercial Invoice</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="invoicenon-tabs-one-complete-tab" data-toggle="pill" href="#invoicenon-tabs-one-complete" role="tab" aria-controls="invoicenon-tabs-one-complete" aria-selected="false">Non Commercial Invoice</a>
                  </li>

                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane active show" id="estimatecomm-tabs-one-inprogress" role="tabpanel" aria-labelledby="estimatecomm-tabs-one-inprogress-tab">
                  <table id="estimatecomminprogressTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Estimate No</th>
                                <th>Customer</th>
                                <th>Customer Code </th>
                                <th>Date</th>
                                <th>Bill Receipt(₹)</th>
                                <th>Advance(₹)</th>
                                <th>Total Amount(₹)</th>
                                <th>Action</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
            <tr>
            <th colspan="5" style="text-align:right"></th> <th colspan="1"></th><th colspan="1"></th><th colspan="1"></th><th colspan="1"></th><th colspan="1"></th>

            </tr>
        </tfoot>
                        </table>
                  </div>
                  <div class="tab-pane  " id="estimatecomm-tabs-one-complete" role="tabpanel" aria-labelledby="estimatecomm-tabs-one-complete-tab">
                  <table id="estimatecommcompleteTable" class="table table-bordered table-striped dataTable dtr-inline" style="width:100%">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Estimate No</th>
                                <th>Customer</th>
                                <th>Customer Code </th>
                                <th>Date</th>
                                <th>Bill Receipt(₹)</th>
                                <th>Advance(₹)</th>
                                <th>Total Amount(₹)</th>
                                <th>Action</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
            <tr>
            <th colspan="5" style="text-align:right"></th> <th colspan="1"></th><th colspan="1"></th><th colspan="1"></th><th colspan="1"></th><th colspan="1"></th>

            </tr>
        </tfoot>
                        </table>
                  </div>
                  <div class="tab-pane  " id="estimatenon-tabs-one-inprogress" role="tabpanel" aria-labelledby="estimatenon-tabs-one-inprogress-tab">
                  <table id="estimatenoninprogressTable" class="table table-bordered table-striped dataTable dtr-inline" style="width:100%">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Estimate No</th>
                                <th>Customer</th>
                                <th>Customer Code </th>
                                <th>Date</th>
                                <th>Bill Receipt(₹)</th>
                                <th>Advance(₹)</th>
                                <th>Total Amount(₹)</th>
                                <th>Action</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
            <tr>
            <th colspan="5" style="text-align:right"></th> <th colspan="1"></th><th colspan="1"></th><th colspan="1"></th><th colspan="1"></th><th colspan="1"></th>

            </tr>
        </tfoot>
                        </table>
                  </div>
                  <div class="tab-pane  " id="estimatenon-tabs-one-complete" role="tabpanel" aria-labelledby="estimatenon-tabs-one-complete-tab">
                  <table id="estimatenoncompleteTable" class="table table-bordered table-striped dataTable dtr-inline" style="width:100%">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Estimate No</th>
                                <th>Customer</th>
                                <th>Customer Code </th>
                                <th>Date</th>
                                <th>Bill Receipt(₹)</th>
                                <th>Advance(₹)</th>
                                <th>Total Amount(₹)</th>
                                <th>Action</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
            <tr>
            <th colspan="5" style="text-align:right"></th> <th colspan="1"></th><th colspan="1"></th><th colspan="1"></th><th colspan="1"></th><th colspan="1"></th>

            </tr>
        </tfoot>
                        </table>
                  </div>
                  <div class="tab-pane  " id="invoicecomm-tabs-one-complete" role="tabpanel" aria-labelledby="invoicecomm-tabs-one-complete-tab">
                  <table id="invoicecommcompleteTable" class="table table-bordered table-striped dataTable dtr-inline" style="width:100%">
                            <thead>
                            <tr>
                            <th>S.No </th>
                                <th>Invoice No</th>
                                <th>Estimate No</th>
                                <th>Customer</th>
                                <th>Customer Code </th>
                                <th>Date</th>
                                <th>Receipts Type</th>
                                <th>Total Amount(₹)</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <th colspan="7" style="text-align:right">Total:</th>
                            <th colspan="2"></th>
        </tfoot>
                        </table>
                  </div>
                  <div class="tab-pane  " id="invoicenon-tabs-one-complete" role="tabpanel" aria-labelledby="invoicenon-tabs-one-complete-tab">
                  <table id="invoicenoncompleteTable" class="table table-bordered table-striped dataTable dtr-inline" style="width:100%">
                            <thead>
                            <tr>
                            <th>S.No </th>
                                <th>Invoice No</th>
                                <th>Estimate No</th>
                                <th>Customer</th>
                                <th>Customer Code </th>
                                <th>Date</th>
                                <th>Receipts Type</th>
                                <th>Total Amount(₹)</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
            <tr>
            <th colspan="7" style="text-align:right">Total:</th>
                            <th colspan="2"></th>
            </tr>
        </tfoot>
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

  <script src="assets/dist/js/searchOrder_ajax.js?version=<?php echo md5_file('js/searchOrder_ajax.js'); ?>"></script>



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