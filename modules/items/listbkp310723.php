<?php
//error_reporting(E_ALL);
include("classes/class_items.php");
$obj_items = new items('','','','','','','','','','','','','','');
$getitems = $obj_items->getAllitems($_GET['typ'],$_GET['its']);
$data=array();
while($rows=mysqli_fetch_array($getitems)) {
  $data[]=$rows;
}
?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Items List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Items List</li>
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

                                <a href="index.php?erp=51&typ=<?php echo $_GET['typ']; ?>&its=<?php echo $_GET['its']; ?>"
                                    class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Add New Items</a>
                            </div>

                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>S.No </th>
                                        <th>Item Type</th>
                                        <th>Item Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0;$i< count($data) ;$i++){ 
                            $typesname = '';
                           if($data[$i]['type'] == 1)
                           {
                              $typesname = 'Commercial';
                           }
                           else{
                            $typesname = 'Non Commercial';
                           }
                             ?>
                                    <tr>
                                        <td><?php echo $i+1; ?></td>
                                        <td><?php echo $data[$i]['itemtypesval']; ?></td>
                                        <td><?php echo $data[$i]['fk_item_id']; ?></td>

                                        <td>
                                            <a href="index.php?erp=52&id=<?php echo $data[$i]['pk_items_id']; ?>"
                                                class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit"
                                                name="btnEdit"><span class="fa fa-edit"></span></a>
                                            <?php if(isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) { ?>
                                            <a onclick="updatevisibility(<?php echo $data[$i]['pk_items_id']; ?>);"
                                                class="custom_btn_class btn btn-danger" data-toggle="tooltip"
                                                title="Edit" name="btndelete"><span class="fa fa-trash"></span></a>
                                            <?php } ?>
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
$(document).ready(function() {

    $('#table_id').DataTable({
        "dom": 'Blfrtip',

        buttons: [{
                extend: 'excel',
                exportOptions: {
                    columns: [0, 1]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1]
                }
            }
        ]
    });


});

function updatevisibility(id) {
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
                type: 'post',
                url: "modules/items/ajax_functions.php",
                data: {
                    "id": id,
                    "mode": 'Deleteproduct'
                },
                beforeSend: function() {
                    $("#loaderscancel").show();
                },
                complete: function() {
                    $("#loaderscancel").hide();
                },
                success: function(response) {
                    if (response == 1) {
                        swal("Deleted!", "Items has been deleted.", "success");
                        window.location =
                            'index.php?erp=50&typ=<?php echo $_GET['typ']; ?>&its=<?php echo $_GET['its']; ?>';
                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                    }
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                },
            });
        }
    });



}
$(".nav-link").removeClass("active");
$(".nav-item").removeClass("menu-open");

$(".items").addClass("menu-open");
$(".master_commproduct .nav-link").addClass("active");
</script>


<script>
$(document).ready(function() {

    var itemtable = $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        'lengthMenu': [
            [10, 50, 100,-1],
            [10, 50, 100,"All"]
        ],
        "pageLength": 10,
        /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
    });

/*
    $('.search_key').on('click', function(e) {
        if ($('.searchKeyword').val() != '') {
            itemtable.search($('.searchKeyword').val()).draw();
        } else {
            itemtable.search('').columns().search('').draw();
        }
    });
*/
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