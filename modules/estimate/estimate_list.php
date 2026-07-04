<?php
error_reporting(0);

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Estimate  </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">	Estimate </li>
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
                      <a href="index.php?erp=20" class="btn btn-primary "><i class="fa fa-plus mr-2"></i>Add New Estimate </a>
                    </div>
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                         <!--  <a class="nav-item nav-link active" id="nav-waiting-tab" data-toggle="tab" href="#nav-waiting" role="tab" aria-controls="waiting-approved" aria-selected="true">WAITING FOR APPROVAL</a>
                     <a class="nav-item nav-link" id="nav-approved-tab" data-toggle="tab" href="#nav-approved" role="tab" aria-controls="nav-approved" aria-selected="false">APPROVED</a>
                        <a class="nav-item nav-link" id="nav-cancelled-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-cancelled" aria-selected="false">CANCELLED</a>-->
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel" aria-labelledby="nav-waiting-tab">
                        <table id="estimateTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>Estimate.No</th>
                                <th>So.No</th>
                                <th>Customer</th>
                                <th>Customer Code</th>
                                <th>Date</th>
                                <th>Item Total(₹)</th>
                                <th>Total Amount(₹)</th>
                                <th>Action</th>
                                <th>#</th>
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
  <script src="assets/dist/js/estimate_serverdatatable_ajax.js?version=<?php echo md5_file('js/so_serverdatatable_ajax.js');?>"></script>



<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  $(".nav-link").removeClass("active");
  $(".nav-item").removeClass("menu-open");
    
  $(".sales").addClass("menu-open");
  $(".estimate .nav-link").addClass("active");


  
  
  function createInvoice(id)
  {
  var seid = id;
    $.ajax({
        url: "modules/estimate/ajax_functions.php",
        data: {
            'id': seid,
            'mode': 'createtoInvoice'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
          swal('Success', 'Invoice created successfully :)','success');
          location.reload();
        },
        error: function(response) {
            console.log(response);
        }
    });
  }
</script>
<style type="text/css">
  .dataTables_wrapper {
    margin-top: 14px;
  }


</style>