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
                    <h1>Stock List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Stock List</li>
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
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label><b>Stock Type</b></label>
                                    <select id="stock_type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="1">Commercial</option>
                                        <option value="2">Non Commercial</option>
                                    </select>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table id="item_table" class="table table-bordered table-hover w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Item Name</th>
                                            <th>UOM</th>
                                            <th>Stock In Hand</th>
                                            <th>Last Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
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
            <div class="modal fade" id="addStockModal" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">

                        <div class="modal-header bg-primary">
                            <h5 class="modal-title">Add Stock</h5>
                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form id="addStockForm">

                                <input type="hidden" name="pk_items_id">
                                <input type="hidden" name="type">
                                <div class="form-group">
                                    <label>Enter Date</label>
                                    <input type="date" name="stock_date" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>UOM</label>
                                    <input type="text" name="uom" class="form-control" placeholder="Eg: Kg, Nos" required>
                                </div>

                                <div class="form-group">
                                    <label>Value</label>
                                    <input type="number" name="value" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea name="remarks" class="form-control"></textarea>
                                </div>

                            </form>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="saveAddStock">Save</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="utilizeStockModal" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">

                        <div class="modal-header bg-warning">
                            <h5 class="modal-title">Utilize Stock</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form id="utilizeStockForm">

                                <div class="form-group">
                                    <label>Enter Date</label>
                                    <input type="date" name="utilize_date" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Order Number</label>
                                    <select name="order_id" id="order_id" class="form-control" required>
                                        <option value="">Select Order</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>UOM</label>
                                    <input type="text" name="uom" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Value</label>
                                    <input type="number" name="value" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea name="remarks" class="form-control"></textarea>
                                </div>

                            </form>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-warning" id="saveUtilizeStock">Utilize</button>
                        </div>

                    </div>
                </div>
            </div>

    </section>
    <!-- /.content -->
</div>

<script>
    $(document).ready(function() {

        const table = $('#item_table').DataTable({
            responsive: true,
            autoWidth: false,
            pageLength: 10,
            lengthChange: true,
            ordering: false,

            ajax: {
                url: "modules/inventory/inventory_ajax.php",
                type: "POST",
                data: function(d) {
                    if (!$('#stock_type').val()) {
                        return false;
                    }
                    d.mode = "getAllItems";
                    d.type = $('#stock_type').val(); // 1 / 2
                }
            },

            columns: [{
                    data: null,
                    render: (data, type, row, meta) =>
                        meta.row + meta.settings._iDisplayStart + 1
                },

                // ✔ Item Name from fk_item_id
                {
                    data: "fk_item_id",
                    defaultContent: "-"
                },

                // ✔ Blank UOM
                {
                    data: null,
                    render: () => ''
                },

                // ✔ Blank Stock
                {
                    data: null,
                    render: () => ''
                },

                // ✔ Blank Last Updated
                {
                    data: null,
                    render: () => ''
                },

                // ✔ Row-wise buttons
                {
                    data: null,
                    render: function(row) {
                        return `
        <div>
            <button class="btn btn-sm btn-primary addStock"
                style="margin-right:6px;"
                data-id="${row.pk_items_id}">
                Add stock
            </button>

            <button class="btn btn-sm btn-warning utilizeStock"
                style="margin-right:6px;"
                data-id="${row.pk_items_id}">
                Utilize stock
            </button>

            <button class="btn btn-sm btn-info utilization"
                data-id="${row.pk_items_id}">
                Utilization
            </button>
        </div>`;
                    }
                }

            ]
        });



        $('#utilizeStockModal').on('shown.bs.modal', function() {

            let stockType = $('#stock_type').val(); // 1 = Commercial, 2 = Non Commercial
            let mode = '';

            if (stockType === '1') {
                mode = 'getAllComEst';
            } else if (stockType === '2') {
                mode = 'getAllNonComEst';
            } else {
                $('#order_id').html('<option value="">Select Order</option>');
                return;
            }

            $.ajax({
                url: "modules/inventory/inventory_ajax.php",
                type: "POST",
                data: {
                    mode: mode
                },
                dataType: "json",
                success: function(data) {

                    let options = '<option value="">Select Order</option>';

                    data.forEach(row => {
                        options += `<option value="${row.pk_estimate_id}">
                                ${row.so_no}
                            </option>`;
                    });

                    $('#order_id').html(options);
                }
            });
        });


        $('#saveAddStock').click(function() {
            $.ajax({
                url: "modules/inventory/inventory_ajax.php",
                type: "POST",
                data: $('#addStockForm').serialize() + "&mode=addStocks",
                dataType: "json",
                success: function(res) {
                    if (res.status) {
                        $('#addStockModal').modal('hide');
                        $('#item_table').DataTable().ajax.reload();
                    } else {
                        alert(res.error);
                    }
                }
            });
        });


        $('#saveUtilizeStock').click(function() {
            $.post(
                "modules/inventory/inventory_ajax.php",
                $('#utilizeStockForm').serialize() + "&mode=utilizeStock",
                function() {
                    $('#utilizeStockModal').modal('hide');
                    $('#item_table').DataTable().ajax.reload();
                }
            );
        });
        // Reload table when dropdown changes
        $('#stock_type').change(function() {
            table.ajax.reload();
        });

    });
    $(document).on('click', '.addStock', function() {

        $('#addStockModal').modal('show');

        $('#addStockForm input[name="pk_items_id"]').val($(this).data('id'));
        $('#addStockForm input[name="type"]').val($('#stock_type').val());

    });

    $(document).on('click', '.utilizeStock', function() {

        // Open modal
        $('#utilizeStockModal').modal('show');

        // Optional: store item id if needed later
        $('#utilizeStockForm').data('item_id', $(this).data('id'));

    });


    $(document).on('click', '.viewItem', function() {
        location.href = `index.php?erp=145&items_id=${$(this).data('items_id')}&stock_id=${$(this).data('stock_id')}`;
    })
</script>