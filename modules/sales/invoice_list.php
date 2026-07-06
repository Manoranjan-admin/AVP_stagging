<?php
error_reporting(0);
include("classes/class_sale_order.php");
$obj_saleorder = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$get_sales_order_waiting_approve = $obj_saleorder->getallsalesorder(0);
$data_sales_order_waiting_approve=array();
while($rows=mysqli_fetch_array($get_sales_order_waiting_approve)) {
  $data_sales_order_waiting_approve[]=$rows;
}

$get_sales_order_approve = $obj_saleorder->getallsalesorder(1);
$data_sales_order_approve=array();
while($rows1=mysqli_fetch_array($get_sales_order_approve)) {
  $data_sales_order_approve[]=$rows1;
}

$get_sales_order_cancelled = $obj_saleorder->getallsalesorder(2);
$data_sales_order_cancelled=array();
while($rows2=mysqli_fetch_array($get_sales_order_cancelled)) {
  $data_sales_order_cancelled[]=$rows2;
}

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Sales Invoice</li>
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
                      <a href="index.php?erp=18" class="btn btn-success">Add New Sales Invoice</a>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel" aria-labelledby="nav-waiting-tab">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                            <tr>
                                <th>S.No </th>
                                <th>So.No</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Total Amount(₹)</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php for($i=0;$i< count($data_sales_order_waiting_approve) ;$i++){ ?>
                                <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo $data_sales_order_waiting_approve[$i]['prefix'].'/'.$data_sales_order_waiting_approve[$i]['prefix_year'].'/'.$data_sales_order_waiting_approve[$i]['sales_no']; ?></td>
                                    <td><?php echo $data_sales_order_waiting_approve[$i]['cus_name']; ?></td>
                                    <td><?php echo date('d/m/Y',strtotime($data_sales_order_waiting_approve[$i]['sale_date'])); ?></td>
                                    <td><?php echo number_format($data_sales_order_waiting_approve[$i]['grand_total'], 2); ?></td>
                                    <th><span class="Waiting">Waiting</span></th>
                                    <td>
                                      <a href="index.php?erp=15&id=<?php echo $data_sales_order_waiting_approve[$i]['sono']; ?>" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="View" name="btnEdit"><span class="fa fa-eye"></span></a>
                                      <a href="index.php?erp=14&id=<?php echo $data_sales_order_waiting_approve[$i]['sono']; ?>" class="custom_btn_class btn btn-success" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-edit"></span></a>
                                    </td>
                                </tr>
                                <?php } ?>
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
  <script src="assets/dist/js/custom/customer.js?version=<?php echo md5_file('js/custom/customer.js');?>"></script>
<script> 

  $(".sidebar .nav-link").removeClass("active");
  $(".sidebar .nav-item").removeClass("menu-open");
    
  $(".sidebar .sales").addClass("menu-open");
  $(".sidebar .sales_invoice .nav-link").addClass("active");
</script>


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
</script>
<style type="text/css">
  .dataTables_wrapper {
    margin-top: 14px;
  }
</style>