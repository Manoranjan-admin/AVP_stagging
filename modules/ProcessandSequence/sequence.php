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
    .box-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .process-box,
    .position-box {
        width: 140px;
        height: 70px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-weight: 600;
        cursor: pointer;
        padding: 5px;
    }

    /* Top Process */
    .process-box {
        background: #db7312;
        color: #000;
        cursor: grab;
    }

    /* Bottom Position */
    .position-box {
        border: 2px dashed #db7312;
        background: #f5f5f5;
    }

    .position-box.hovered {
        background: #d4edda;
    }

    .position-box.filled {
        background: #db7312;
        color: #000;
        border: 2px solid #db7312;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Process Sequence</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-warning">
                <div class="card-body">

                    <label><b>Available Processes (Drag to positions below)</b></label>
                    <div id="processContainer" class="box-wrapper mb-4"></div>

                    <label><b>Sequence Positions</b></label>
                    <div id="positionContainer" class="box-wrapper"></div>

                    <div class="mt-3">
                        <button class="btn btn-warning" id="saveSequence">Save Order</button>
                        <button class="btn btn-secondary" id="resetSequence">Reset All</button>
                    </div>

                </div>
            </div>

        </div>
    </section>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {

        let allProcesses = [];


        $.ajax({
            url: "modules/ProcessandSequence/process_seq_ajax.php",
            type: "POST",
            data: {
                mode: "getAllProcessMaster"
            },
            dataType: "json",
            success: function(res) {
                if (res.status) {
                    allProcesses = res.data;
                    renderProcessBoxes();
                    renderPositionBoxes();
                    loadSavedSequence(); // 👈 ADD THIS
                }
            }
        });

        function renderProcessBoxes() {
            $('#processContainer').html('');

            allProcesses.slice(0, 20).forEach(p => {
                $('#processContainer').append(`
                <div class="process-box" 
                     data-id="${p.pk_process_id}">
                    ${p.process_name}
                </div>
            `);
            });

            $(".process-box").draggable({
                revert: "invalid",
                helper: "clone"
            });
        }

        function loadSavedSequence() {

            $.ajax({
                url: "modules/ProcessandSequence/process_seq_ajax.php",
                type: "POST",
                data: {
                    mode: "getAllSequenceList"
                },
                dataType: "json",
                success: function(res) {

                    if (!res.status) return;

                    res.data.forEach(seq => {

                        let positionBox = $(`.position-box[data-position="${seq.seq_position}"]`);

                        let process = allProcesses.find(p => p.pk_process_id == seq.fk_process_id);

                        if (positionBox.length && process) {

                            positionBox
                                .text(process.process_name)
                                .data("process-id", process.pk_process_id)
                                .addClass("filled");

                            // Remove from top list
                            $(`#processContainer .process-box[data-id="${process.pk_process_id}"]`).remove();
                        }
                    });

                    makeDraggable();
                }
            });
        }

        function renderPositionBoxes() {
            $('#positionContainer').html('');

            for (let i = 1; i <= 20; i++) {
                $('#positionContainer').append(`
                <div class="position-box" data-position="${i}">
                    Position ${i}
                </div>
            `);
            }

            $(".position-box").droppable({
                accept: ".process-box",
                hoverClass: "hovered",
                drop: function(event, ui) {

                    let processName = ui.draggable.text();
                    let processId = ui.draggable.data("id");

                    let existingId = $(this).data("process-id");

                    // If already something exists here, return old one back to top
                    if (existingId) {
                        let existingName = $(this).text();
                        $('#processContainer').append(`
                <div class="process-box" data-id="${existingId}">
                    ${existingName}
                </div>
            `);
                    }

                    // Remove from top list
                    $(`#processContainer .process-box[data-id="${processId}"]`).remove();

                    // Place inside dropped position
                    $(this)
                        .data("process-id", processId)
                        .text(processName)
                        .addClass("filled"); // ✅ highlight

                    makeDraggable();
                }
            });
        }

        function makeDraggable() {
            $(".process-box").draggable({
                revert: "invalid",
                helper: "clone"
            });
        }

        $('#resetSequence').click(function() {
            renderProcessBoxes();
            renderPositionBoxes();
        });

        $('#saveSequence').click(function() {

            let sequence = [];

            $('.position-box').each(function() {
                sequence.push({
                    position: $(this).data('position'),
                    process_id: $(this).data('process-id') || null
                });
            });

            $.ajax({
                url: "modules/ProcessandSequence/process_seq_ajax.php",
                type: "POST",
                data: {
                    mode: "saveMasterSequence",
                    sequence: sequence
                },
                dataType: "json",
                success: function(res) {
                    if (res.status) {
                        alert("Sequence Saved Successfully");
                    } else {
                        alert("Save Failed");
                    }
                }
            });

        });

    });
</script>