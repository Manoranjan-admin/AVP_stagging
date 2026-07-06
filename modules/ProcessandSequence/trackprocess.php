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

<style>
    /* Process draggable boxes */
    #processList {
        min-height: 80px;
    }

    /* Top process boxes */
    #processList .process-box {
        padding: 10px 15px;
        border: 2px solid #007bff;
        border-radius: 6px;
        background: #f8f9fa;
        cursor: grab;
        user-select: none;
    }

    #processList,
    #positionList {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        /* little gap between boxes */
    }

    #processList .process-box,
    #positionList .position-box {
        min-width: 120px;
    }

    /* Bottom position boxes */
    #positionList .position-box {
        width: 120px;
        height: 45px;
        border: 2px dashed #28a745;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        background-color: #fdfdfd;
    }

    /* Highlight on hover */
    .position-box.hovered {
        background-color: #d4edda;
        border-color: #28a745;
    }

    /* Sequence list */
    #sequenceList {
        min-height: 200px;
        border: 2px dashed #28a745;
        padding: 10px;
        border-radius: 6px;
        background-color: #fdfdfd;
    }

    #sequenceList li {
        cursor: move;
        margin-bottom: 8px;
        background-color: #ffffff;
    }

    /* Drag placeholder */
    .ui-state-highlight {
        height: 45px;
        background-color: #e9ecef;
        border: 2px dashed #adb5bd;
        margin-bottom: 8px;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Process Master</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">

                <div class="card-body">

                    <!-- Add Button -->
                    <div class="mb-3 text-right">
                        <button class="btn btn-warning" id="assignProcessBtn">
                            Assign Process
                        </button>
                    </div>

                    <!-- Process Table -->
                    <div class="table-responsive">
                        <table id="process_table" class="table table-bordered table-hover w-100">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Order Type</th>
                                    <th>Order No</th>
                                    <th>QR</th>
                                    <th>Current Process Name</th>
                                    <!-- <th>Modified On</th> -->
                                    <th width="120">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="assignProcessModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-success">
                <h5 class="modal-title">Assign Process</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <!-- Type Selection -->
                <div class="form-group">
                    <label>Select Type</label>
                    <select id="order_type" class="form-control">
                        <option value="">Select Type</option>
                        <option value="commercial">Commercial</option>
                        <option value="non_commercial">Non Commercial</option>
                    </select>
                </div>

                <!-- Order Multi Select -->
                <div class="form-group">
                    <label>Select Orders</label>
                    <select id="order_list" class="form-control" multiple></select>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id="saveAssignProcess">Assign</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="updateProcessModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Update Process</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="update_order_no">
                <input type="hidden" id="update_qr_path">

                <div class="form-group">
                    <label>Current Process</label>
                    <input type="text" id="current_process" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Select Next Process</label>
                    <select id="next_process" class="form-control"></select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="saveProcessUpdate">Save</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {

        const table = $('#process_table').DataTable({
            processing: true,
            ajax: {
                url: "modules/ProcessandSequence/process_seq_ajax.php",
                type: "POST",
                data: {
                    mode: "getTrackingList"
                },
                dataSrc: "data"
            },
            columns: [{
                    data: null,
                    render: (d, t, r, m) => m.row + 1
                },
                {
                    data: "order_type"
                },
                {
                    data: "order_no"
                },
                {
                    data: "qr_path",
                    render: function(data) {
                        return `<img src="${data}" width="60"/>`;
                    }
                },
                {
                    data: "process_name"
                },
                // {
                //     data: "modified_on"
                // },
                {
                    data: null,
                    render: function(row) {
                        return `
    <button class="btn btn-sm btn-primary updateProcess"
        data-order="${row.order_no}"
        data-process="${row.process_name}"
        data-processid="${row.fk_process_id}"
        data-qr="${row.qr_path}">
        Update Process
    </button>`;
                    }
                }
            ]
        });
        $('#assignProcessBtn').click(function() {
            $('#assignProcessModal').modal('show');
        });

        $('#saveAssignProcess').click(function() {

            let type = $('#order_type').val();
            let orders = $('#order_list').val();

            if (!type) {
                alert("Please select type");
                return;
            }

            if (!orders || orders.length === 0) {
                alert("Please select at least one order");
                return;
            }

            $.ajax({
                url: "modules/ProcessandSequence/process_seq_ajax.php",
                type: "POST",
                data: {
                    mode: "assignProcessTracking",
                    type: type,
                    orders: orders
                },
                dataType: "json",
                success: function(res) {

                    if (res.status) {

                        alert("Process Assigned Successfully");

                        $('#assignProcessModal').modal('hide');

                        // reset fields
                        $('#order_type').val('');
                        $('#order_list').val(null).trigger('change');

                    } else {
                        alert(res.message || "Assignment Failed");
                    }
                },
                error: function() {
                    alert("Server Error");
                }
            });

        });

        $(document).on('click', '.updateProcess', function() {

            let orderNo = $(this).data('order');
            let currentProcessName = $(this).data('process');
            let currentProcessId = $(this).data('processid');
            let qrPath = $(this).data('qr');

            $('#update_order_no').val(orderNo);
            $('#current_process').val(currentProcessName);
            $('#update_qr_path').val(qrPath);

            // Store QR path in hidden field
            if (!$('#update_qr_path').length) {
                $('<input>').attr({
                    type: 'hidden',
                    id: 'update_qr_path'
                }).appendTo('#updateProcessModal .modal-body');
            }

            $('#update_qr_path').val(qrPath);

            $.post("modules/ProcessandSequence/process_seq_ajax.php", {
                    mode: "getSequenceList1"
                },
                function(res) {

                    let options = '<option value="">Select</option>';

                    res.forEach(r => {
                        options += `<option value="${r.fk_process_id}">
                    ${r.process_name} (Position ${r.seq_position})
                </option>`;
                    });

                    $('#next_process').html(options);

                    // preselect current process
                    $('#next_process').val(currentProcessId);

                }, 'json'
            );

            $('#updateProcessModal').modal('show');
        });

        $('#saveProcessUpdate').click(function() {

            console.log("Sending QR:", $('#update_qr_path').val()); // debug

            $.post("modules/ProcessandSequence/process_seq_ajax.php", {
                mode: "updateProcessTracking",
                order_no: $('#update_order_no').val(),
                process_id: $('#next_process').val(),
                qr_path: $('#update_qr_path').val()
            }, function(res) {

                if (res.status) {
                    alert("Process Updated");
                    $('#updateProcessModal').modal('hide');
                    table.ajax.reload();
                }

            }, 'json');
        });

        $('#order_type').change(function() {

            let selectedType = $(this).val();

            $('#order_list').val(null).trigger('change');

            $('#order_list').select2({
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
                            type: selectedType,
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

        });

    });
</script>