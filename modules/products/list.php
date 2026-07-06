<?php
//error_reporting(E_ALL);
include("classes/class_product.php");
$obj_product = new Product('','','','','','','','','','','','','','');
$getproduct = $obj_product->getAllProducts();
$data=array();
while($rows=mysqli_fetch_array($getproduct)) {
  $data[]=$rows;
}
?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Product List</li>
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
                      <a href="index.php?erp=5" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Add New Product</a>
                    </div>
                    
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                        <tr>
                            <th>S.No </th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>4 Color Price</th>
                            <th>7 Color Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php for($i=0;$i< count($data) ;$i++){ ?>
                            <tr>
                                <td><?php echo $i+1; ?></td>
                                <td><?php echo $data[$i]['pk_product_id']; ?></td>
                                <td><?php echo $data[$i]['product_name']; ?></td>
                                <td><?php echo $data[$i]['4color_price']; ?></td>
                                <td><?php echo $data[$i]['7color_price']; ?></td>
                                <td>
                                  <a href="index.php?erp=6&id=<?php echo $data[$i]['pk_product_id']; ?>" class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit" name="btnEdit"><span class="fa fa-edit"></span></a>
                                  <a onclick="updatevisibility(<?php echo $data[$i]['pk_product_id']; ?>);" class="custom_btn_class btn btn-danger" data-toggle="tooltip" title="Edit" name="btndelete"><span class="fa fa-trash"></span></a>
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
  
<script>
    $(document).ready( function () {
      
      $('#table_id').DataTable({
      dom: 'Bfrtip',
            buttons: [
      {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1 ]
                }
            },
      {
                extend: 'print',
                exportOptions: {
                     columns: [ 0, 1 ]
                }
            }
            ]
    });
    
     
    } ); 
function updatevisibility(id){
    swal({
        title: "Are you sure you want to delete the product?",
        text: "",
        icon: "warning",
    buttons: [
      'No',
      'Yes'
    ],
        showCancelButton: true,
        closeOnConfirm: false,
        closeOnCancel: false 
    }).then(function(isConfirm) {
        if (isConfirm) {
        
      $.ajax({
        type:'post',
        url: "modules/products/ajax_functions.php",
        data: { 
          "id": id,
          "mode":'Deleteproduct'
        },
        beforeSend: function(){
          $("#loaderscancel").show();
        },
        complete: function(){
          $("#loaderscancel").hide();
        },
        success:function(response){ 
          if(response == 1){
            swal("Deleted!", "Product has been deleted.", "success");
            window.location = 'index.php?erp=4';
          }else {
            swal("Failed!", "Something went wrong, Try again!", "error");
          } 
          console.log(response);
        },
        error: function (response) {
          console.log(response);
        },      
      });
    }
    });
  
  
    
  }
  $(".nav-link").removeClass("active");
  $(".nav-item").removeClass("menu-open");
    
  $(".master").addClass("menu-open");
  $(".master_product .nav-link").addClass("active");
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
