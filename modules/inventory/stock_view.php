<?php
//error_reporting(E_ALL);
// include("classes/class_items.php");
// $obj_items = new items('', '', '', '', '', '', '', '', '', '', '', '', '', '');
// $getitems = $obj_items->getAllitems($_GET['typ'], $_GET['its']);
// $data = array();
// while ($rows = mysqli_fetch_array($getitems)) {
//     $data[] = $rows;
// }
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

                                <a href="index.php?erp=144&typ=1&its=1&items_id=<?= $_GET['items_id'] ?>&stock_id=<?= $_GET['stock_id'] ?>"
                                    class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Add New Stock</a>
                            </div>

                            <table id="stock_table" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>S.No </th>
                                        <th>Item Type</th>
                                        <th>Item Name</th>
                                        <th>Total Stocks</th>
                                        <th>Stock Notes</th>
                                        <th>Created On</th>
                                        <th>Action</th> <!-- New column -->
                                    </tr>
                                </thead>
                                <tbody>

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

        const table = $('#stock_table').DataTable({
            processing: false,
            serverSide: true,
            ordering: false,
            // searching: false,
            // paging: false,
            // info: false,
            // "scrollY": "100vh",

            ajax: {
                url: "modules/inventory/inventory_ajax.php",
                type: "POST",
                data: function(d) {
                    d.mode = "getStockByItem";
                    d.items_id = <?= $_GET['items_id'] ?>;
                }
            },
            columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1; // S.No
                    }
                },
                {
                    data: "item_type"
                },
                {
                    data: "item_name"
                },
                {
                    data: "total_stocks"
                },
                {
                    data: "stock_notes"
                },
                {
                    data: "formated_dt"
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        // Add a View button with item ID in data-id
                        return `<a href="index.php?erp=101" class="btn btn-info btn-sm viewItem" data-items_id="${row.pk_items_id}" data-stock_id="${row.stock_id}">Edit</a>`;
                    }
                }
            ],
            pageLength: 10, // Number of records per page
            lengthMenu: [10, 25, 50, 100], // Pagination options,
            // Enable FixedHeader
            // fixedHeader: {
            //     header: true,
            //     headerOffset: 70 // Offset in pixels (e.g., height of your navbar)
            // },
            // scrollX: true,
            language: {
                emptyTable: "No matching records found",
            }

        });

    });
</script>