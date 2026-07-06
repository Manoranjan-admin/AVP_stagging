<?php
//error_reporting(E_ALL);
include("classes/class_items.php");
$obj_items = new items('', '', '', '', '', '', '', '', '', '', '', '', '', '');
$getitems = $obj_items->getAllitems($_GET['typ'], $_GET['its']);
$data = array();
while ($rows = mysqli_fetch_array($getitems)) {
    $data[] = $rows;
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

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Item Name <span class="text-danger">*</span></label>
                                    <select id="item_filter" class="form-control select2">
                                        <option value="">Select Item</option>
                                        <?php
                                        $baseNames = [];

                                        foreach ($data as $row) {

                                            $name = $row['fk_item_id'];

                                            // Remove numbers and everything after
                                            $base = preg_replace('/[\s\-]*\d+.*/', '', $name);

                                            $base = trim($base);

                                            $baseNames[] = $base;
                                        }

                                        // Unique values
                                        $baseNames = array_unique($baseNames);

                                        foreach ($baseNames as $name) {
                                        ?>
                                            <option value="<?php echo $name; ?>">
                                                <?php echo $name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <button id="filter_btn" class="btn btn-info">Search</button>
                                    <button id="reset_btn" class="btn btn-primary">Reset</button>

                                </div>


                            </div>


                            <button id="edit_selected" class="btn btn-warning mb-2">
                                Edit Selected
                            </button>

                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="select_all"></th>
                                        <th>S.No </th>
                                        <th>Item Type</th>
                                        <th>Item Name</th>
                                        <th>Item Price(4 color price)</th>
                                        <th>Item Price(7 color price)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($data); $i++) {
                                        $typesname = '';
                                        if ($data[$i]['type'] == 1) {
                                            $typesname = 'Commercial';
                                        } else {
                                            $typesname = 'Non Commercial';
                                        }
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="row_checkbox"
                                                    value="<?php echo $data[$i]['pk_items_id']; ?>">
                                            </td>
                                            <td><?php echo $i + 1; ?></td>
                                            <td><?php echo $data[$i]['itemtypesval']; ?></td>
                                            <td><?php echo $data[$i]['fk_item_id']; ?></td>
                                            <td><?php echo '₹ ' . $data[$i]['first_price']; ?></td>
                                            <td><?php echo '₹ ' . $data[$i]['second_price']; ?></td>

                                            <td>
                                                <a href="index.php?erp=52&typ=<?= $data[$i]['type'] ?>&id=<?php echo $data[$i]['pk_items_id']; ?>"
                                                    class="custom_btn_class btn btn-edit" data-toggle="tooltip" title="Edit"
                                                    name="btnEdit"><span class="fa fa-edit"></span></a>
                                                <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 999 || $_SESSION['roleId'] == 1)) { ?>
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

        var itemtable = $("#example1").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            lengthMenu: [
                [10, 50, 100, -1],
                [10, 50, 100, "All"]
            ],
            pageLength: 10
        });

        $('.select2').select2({
            placeholder: "Select Item",
            allowClear: true
        });

        $('#filter_btn').click(function() {
            var itemName = $('#item_filter').val();

            if (itemName) {
                itemtable.column(3).search('^' + itemName, true, false).draw();
            }
        });;

        $('#item_filter').on('change', function() {
            var itemName = $(this).val();
            itemtable.column(3).search('^' + itemName, true, false).draw();
        });


        $('#reset_btn').click(function() {
            $('#item_filter').val('').trigger('change');
            itemtable.search('').columns().search('').draw();
        });

        $('#select_all').on('click', function() {
            var rows = itemtable.rows({
                search: 'applied'
            }).nodes();
            $('input.row_checkbox', rows).prop('checked', this.checked);
        });

        $('#bulk_edit_btn').click(function() {

            var selected = [];

            $('.row_checkbox:checked').each(function() {
                selected.push($(this).val());
            });

            if (selected.length === 0) {
                alert("Please select at least one item");
                return;
            }

            // Redirect to bulk edit page
            window.location = "index.php?erp=60&ids=" + selected.join(',');
        });


        $('#edit_selected').click(function() {

            var selected = [];

            $('.row_checkbox:checked').each(function() {
                selected.push($(this).val());
            });

            if (selected.length === 0) {
                alert('Please select at least one item');
                return;
            }

            // redirect to SAME edit page with multiple ids
            window.location.href = "index.php?erp=52&ids=" + selected.join(',');
        });

        function editItem(id) {

            var selected = [];

            $('.row_checkbox').on('change', function() {

                var itemName = $(this).closest('tr').find('td:eq(3)').text().trim();

                if ($(this).is(':checked')) {

                    $('#example1 tbody tr').each(function() {

                        if ($(this).find('td:eq(3)').text().trim() === itemName) {
                            $(this).find('.row_checkbox').prop('checked', true);
                        }

                    });

                }
            });
        }

    });
</script>


<script>
    $(document).ready(function() {


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