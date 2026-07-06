<?php

error_reporting(0);
include("classes/class_special_effects.php");
$obj_se = new Special_effects('','','','','','','');

$getcate = $obj_se->getallSpecialeffects();

$data=array();
while($rows=mysqli_fetch_array($getcate)) {
  $data[]=$rows;
}
?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Special Effects List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Special Effects List</li>
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
                      <a href="index.php?erp=26" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Add New Special Effects</a>
                    </div>
                    
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                        <tr>
                            <th>S.No </th>
                            <th> Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php for($i=0;$i< count($data) ;$i++){ ?>
                            <tr>
                                <td><?php echo $i+1; ?></td>
                                <td><?php echo $data[$i]['name']; ?></td>
                                <td><?php echo $data[$i]['description']; ?></td>
                                <td>
                                  <a href="index.php?erp=27&id=<?php echo $data[$i]['pk_se_id']; ?>" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="editdelete"><span class="fa fa-edit"></span></a>

                                  <a onclick="deleteSpecialeffects(<?php echo $data[$i]['pk_se_id']; ?>);" class="custom_btn_class btn btn-danger" data-toggle="tooltip" title="Delete" name="btndelete"><span class="fa fa-trash"></span></a>
                                </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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

  $(".nav-link").removeClass("active");
  $(".nav-item").removeClass("menu-open");
    
  $(".master").addClass("menu-open");
  $(".master_specialeffects .nav-link").addClass("active");
</script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
