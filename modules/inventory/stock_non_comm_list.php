<?php
include("../../includes/db_config.php");
$item_id = $_GET['item_id'] ?? '';
$stockType = $_GET['type'] ?? '';
?>

<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Stock Utilization</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Stock Utilization</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-body">

                            <!-- FILTERS -->
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label><b>Date</b></label>
                                    <input type="date" id="filter_date" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label><b>Order No</b></label>
                                    <select id="filter_order" class="form-control">
                                        <option value="">Select Order</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label><b>Remarks</b></label>
                                    <input type="text" id="filter_remarks" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label><b>Value</b></label>
                                    <input type="number" id="filter_value" class="form-control">
                                </div>

                                <div class="col-md-2 d-flex align-items-end">
                                    <button class="btn btn-primary mr-2" id="applyFilter">Filter</button>
                                    <button class="btn btn-secondary" id="resetFilter">Reset</button>
                                </div>
                            </div>

                            <!-- TABLE -->
                            <div class="table-responsive">
                                <table id="utilization_table" class="table table-bordered table-hover w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Item</th>
                                            <th>UOM</th>
                                            <th>Value</th>
                                            <th>Order No</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>


<script>
    $(document).ready(function() {

        let stockType = "<?= $stockType ?>";

        $('#filter_order').select2({
            placeholder: 'Search Order',
            allowClear: true,
            ajax: {
                url: 'modules/inventory/inventory_ajax.php',
                type: 'POST',
                dataType: 'json',
                delay: 300,
                data: function(params) {
                    return {
                        mode: 'searchOrders',
                        type: stockType,
                        search: params.term || ''
                    };
                },
                processResults: function(data) {
                    return {
                        results: data.map(row => ({
                            id: row.sono,
                            text: row.sono
                        }))
                    };
                }
            }
        });


        const table = $('#utilization_table').DataTable({
            responsive: true,
            autoWidth: false,
            pageLength: 10,
            ordering: false,

            ajax: {
                url: "modules/inventory/inventory_ajax.php",
                type: "POST",
                data: function(d) {
                    d.mode = 'getUtilizationList';
                    d.item_id = "<?= $item_id ?>";
                    d.date = $('#filter_date').val();
                    d.order = $('#filter_order').val();
                    d.remarks = $('#filter_remarks').val();
                    d.value = $('#filter_value').val();
                }
            },

            columns: [{
                    data: null,
                    render: (data, type, row, meta) =>
                        meta.row + meta.settings._iDisplayStart + 1
                },
                {
                    data: 'inv_date',
                    render: function(data) {
                        if (!data) return '';
                        let d = new Date(data);
                        let day = String(d.getDate()).padStart(2, '0');
                        let month = String(d.getMonth() + 1).padStart(2, '0');
                        let year = d.getFullYear();
                        return `${day}-${month}-${year}`;
                    }
                },
                {
                    data: 'fk_item_id'
                },
                {
                    data: 'inv_UOM'
                },
                {
                    data: 'inv_value'
                },
                {
                    data: 'est_number'
                },
                {
                    data: 'inv_remarks'
                }
            ]
        });

        $('#applyFilter').click(function() {
            table.ajax.reload();
        });


        $('#resetFilter').click(function() {

            $('#filter_date').val('');
            $('#filter_order').val(null).trigger('change');
            $('#filter_remarks').val('');
            $('#filter_value').val('');

            table.ajax.reload();
        });

    });
</script>