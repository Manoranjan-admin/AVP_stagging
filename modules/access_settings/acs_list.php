<?php
// error_reporting(0);
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("classes/class_access_settings.php");
$objAcs = new AccessSettings();
$roleData = $objAcs->getAllRoles();

// print_r($roleData);

?>
<style>
    #acs_setting .root_menu {
        font-size: 16px;
        font-weight: bold
    }

    #acs_setting .sub_menu {
        font-size: 14px
    }

    /* Blue tooltip */
    .tooltip-inner {
        background-color: #0d6efd;
        /* Bootstrap primary blue */
        color: #fff;
        font-size: 13px;
    }

    /* Tooltip arrow color */
    .tooltip.bs-tooltip-top .tooltip-arrow::before,
    .tooltip.bs-tooltip-bottom .tooltip-arrow::before,
    .tooltip.bs-tooltip-start .tooltip-arrow::before,
    .tooltip.bs-tooltip-end .tooltip-arrow::before {
        border-top-color: #0d6efd;
        border-bottom-color: #0d6efd;
        border-left-color: #0d6efd;
        border-right-color: #0d6efd;
    }
</style>

<div class="content-wrapper" style="min-height: 1342.88px;" id="acs_setting">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <form class="" autocomplete="off" method="post" id="advance_list">

            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1>Access Settings</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">List Advance</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </form>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">


                        <div class="card-body">



                            <div class="form-group">
                                <h5 class="root_menu">Role <span class="text-danger">*</span></h5>
                                <select name="role" id="role" class="form-control">
                                    <?php foreach ($roleData as $index => $row): ?>
                                        <?php if ($index == 0): ?>
                                            <option value="<?= $row['role_id'] ?>" selected>
                                                <?= $row['role_name'] ?>
                                            </option>
                                        <?php else: ?>
                                            <option value="<?= $row['role_id'] ?>">
                                                <?= $row['role_name'] ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="container-fluid" id="menu_display">

                                <!-- ajax function -->


                            </div>




                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                </div>

            </div>

        </div>
    </section>

</div>

<script>
    $(document).ready(function() {

        const getAllMenuWithRoleAccess = () => {
            $.ajax({
                url: "modules/access_settings/acs_ajax_function.php",
                type: 'POST',
                data: {
                    mode: "getAllMenuWithRoleAccess",
                    role_id: $("#role").val(),
                },
                success: function(response) {
                    var data = JSON.parse(response);

                    $("#menu_display").empty();
                    var html = '';
                    let currentRoot = '';

                    data.forEach(row => {
                        var actions = JSON.parse(row.actions);

                        if (currentRoot !== row.root_menu) {
                            currentRoot = row.root_menu;
                            html += `<h5 class="root_menu">${row.root_menu}</h5>`;
                        }

                        const enabledActions = actions.filter(a => a.page_status == 1);
                        const allChecked = enabledActions.length > 0 &&
                            enabledActions.every(a => a.access_status == 1);

                        const allCheckedAttr = allChecked ? 'checked' : '';

                        html += `<div class="row m-3">
                                <div class="col-sm-1">
                                    <h6 class='sub_menu'>${row.sub_menu ?? '-'}</h6>
                                </div>
                                <div class="col-sm-11">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input all-checkbox" type="checkbox" value="" 
                                            id="uid_${actions[0].acp_id}_all" 
                                            data-pk_acp_id="${actions[0].acp_id}"
                                            ${allCheckedAttr}>
                                        <label class="form-check-label" for="uid_${actions[0].acp_id}_all">
                                            All
                                        </label>
                                    </div>`;

                        actions.forEach((ac_row, ac_idx) => {
                            const isChecked = ac_row['access_status'] == 1 ? 'checked' : '';
                            const isDisabled = ac_row['page_status'] == 0 ? 'disabled' : '';

                            const tooltipText = "This menu is currently unused or inactive";
                            const tooltipAttr = ac_row.page_status == 0 ?
                                `data-bs-toggle="tooltip" data-bs-placement="top" title="${tooltipText}"` :
                                '';

                            html += `<div class="form-check form-check-inline">
                                    <input class="form-check-input action-checkbox" type="checkbox" value="" 
                                        id="uid_${ac_row.acp_id}_${ac_idx}" 
                                        ${isChecked} 
                                        ${isDisabled}  
                                        data-pk_acp_id="${ac_row.acp_id}"
                                        data-action_index="${ac_idx}">
                                    <label class="form-check-label" for="uid_${ac_row.acp_id}_${ac_idx}" ${tooltipAttr}>
                                        ${ac_row['action_label']}
                                    </label>
                                </div>`;
                        });

                        html += `</div></div>`;
                    });

                    $("#menu_display").html(html);

                    $('[data-bs-toggle="tooltip"]').tooltip();

                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        // Call initially
        getAllMenuWithRoleAccess();

        // Reload menu when role changes
        $("#role").change(function() {
            getAllMenuWithRoleAccess();
        });

        // Delegate click for individual action checkboxes
        $(document).on('change', '.action-checkbox', function() {
            const checkbox = $(this);

            // store previous state BEFORE change
            const previousState = !checkbox.is(':checked');

            const pk_acp_id = checkbox.data('pk_acp_id');
            const isChecked = checkbox.is(':checked') ? 1 : 0;
            const role_id = $("#role").val();

            swal({
                title: "Are you sure?",
                text: "Do you want to update this permission?",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        visible: true,
                        closeModal: true
                    },
                    confirm: {
                        text: "Yes, update",
                        value: true,
                        closeModal: true
                    }
                }
            }).then((willUpdate) => {
                if (willUpdate) {
                    $.post('modules/access_settings/acs_ajax_function.php', {
                        mode: 'updateAccess',
                        role_id: role_id,
                        pk_acp_id: pk_acp_id,
                        checkbox_status: isChecked
                    }, function(response) {
                        getAllMenuWithRoleAccess();
                        console.log(response);
                    });
                } else {
                    // 🔁 revert checkbox if cancelled
                    checkbox.prop('checked', previousState);
                }
            });
        });


        // Delegate click for "All" checkboxes
        $(document).on('change', '.all-checkbox', function() {

            const allCheckbox = $(this);
            const previousAllState = !allCheckbox.is(':checked');
            const isChecked = allCheckbox.is(':checked');
            const role_id = $("#role").val();

            // store child checkbox states
            const childCheckboxes = [];
            allCheckbox
                .closest('.col-sm-11')
                .find('.action-checkbox')
                .each(function() {
                    childCheckboxes.push({
                        el: $(this),
                        checked: $(this).is(':checked')
                    });
                });

            swal({
                title: "Are you sure?",
                text: "This will update all permissions under this menu.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        visible: true,
                        closeModal: true
                    },
                    confirm: {
                        text: "Yes, update all",
                        value: true,
                        closeModal: true
                    }
                }
            }).then((willUpdate) => {

                if (willUpdate) {

                    // apply change + update DB
                    childCheckboxes.forEach(item => {
                        if (!item.el.is(':disabled')) {

                            item.el.prop('checked', isChecked);

                            const ac_pk = item.el.data('pk_acp_id');
                            const ac_status = isChecked ? 1 : 0;

                            $.post('modules/access_settings/acs_ajax_function.php', {
                                mode: 'updateAccess',
                                role_id: role_id,
                                pk_acp_id: ac_pk,
                                checkbox_status: ac_status
                            });
                        }
                    });

                    // refresh once after batch update
                    setTimeout(() => {
                        getAllMenuWithRoleAccess();
                    }, 300);

                } else {
                    // 🔁 revert ALL states on cancel
                    allCheckbox.prop('checked', previousAllState);

                    childCheckboxes.forEach(item => {
                        item.el.prop('checked', item.checked);
                    });
                }
            });
        });


    });
</script>