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
                        <button class="btn btn-primary" id="addProcessBtn">
                            ➕ Add Process
                        </button>
                    </div>

                    <!-- Process Table -->
                    <div class="table-responsive">
                        <table id="process_table" class="table table-bordered table-hover w-100">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Process Name</th>
                                    <th>Description</th>
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

<div class="modal fade" id="processModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <h5 class="modal-title">Add Process</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="processForm">
                    <input type="hidden" name="pk_process_id" id="pk_process_id">

                    <div class="form-group">
                        <label>Process Name</label>
                        <input type="text" name="process_name" id="process_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="saveProcess">Save</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="sequenceModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h5 class="modal-title">Process Sequence</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="seq_sono">
                <input type="hidden" id="seq_type">


                <div class="mb-3">
                    <label><b>Available Processes</b></label>
                    <div id="processList" class="d-flex flex-wrap gap-2">
                    </div>
                </div>


                <div class="mt-4">
                    <label><b>Sequence Positions</b></label>
                    <div id="positionList" class="d-flex flex-wrap gap-2">

                    </div>
                </div>
            </div>

            <div class="mb-2">
                <button type="button" class="btn btn-warning btn-sm" id="resetSequence">Reset All</button>
            </div>

            <div class="modal-footer">
                <button class="btn btn-warning" id="saveSequence">Save Sequence</button>
            </div>

        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
$(document).ready(function () {

    const table = $('#process_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "modules/ProcessandSequence/process_seq_ajax.php",
            type: "POST",
            data: { mode: "getProcessList" }
        },
        columns: [
            {
                data: null,
                render: (d, t, r, m) => m.row + m.settings._iDisplayStart + 1
            },
            { data: "process_name" },
            { data: "process_description" },
            {
                data: null,
                render: function (row) {
                    return `
                        <button class="btn btn-sm btn-info editProcess"
                            data-id="${row.pk_process_id}"
                            data-name="${row.process_name}"
                            data-desc="${row.process_description}">
                            ✏️
                        </button>
                        <button class="btn btn-sm btn-danger deleteProcess"
                            data-id="${row.pk_process_id}">
                            🗑
                        </button>
                    `;
                }
            }
        ]
    });

    // Open Add Modal
    $('#addProcessBtn').click(function () {
        $('#processForm')[0].reset();
        $('#pk_process_id').val('');
        $('.modal-title').text('Add Process');
        $('#processModal').modal('show');
    });

    // Edit Process
    $(document).on('click', '.editProcess', function () {
        $('#pk_process_id').val($(this).data('id'));
        $('#process_name').val($(this).data('name'));
        $('#description').val($(this).data('desc'));
        $('.modal-title').text('Edit Process');
        $('#processModal').modal('show');
    });

    // Save Process
    $('#saveProcess').click(function () {
        $.ajax({
            url: "modules/ProcessandSequence/process_seq_ajax.php",
            type: "POST",
            data: $('#processForm').serialize() + "&mode=saveProcess",
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    $('#processModal').modal('hide');
                    table.ajax.reload(null, false);
                } else {
                    alert("Failed");
                }
            }
        });
    });

    // Delete Process
    $(document).on('click', '.deleteProcess', function () {

        if (!confirm("Are you sure to delete?")) return;

        $.ajax({
            url: "modules/ProcessandSequence/process_seq_ajax.php",
            type: "POST",
            data: {
                mode: "deleteProcess",
                pk_process_id: $(this).data('id')
            },
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    table.ajax.reload(null, false);
                } else {
                    alert("Delete failed");
                }
            }
        });
    });

});
</script>