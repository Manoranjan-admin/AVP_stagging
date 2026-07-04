<?php
error_reporting(E_ALL);
ini_set("display_erros", 1);

?>
<style>
    .input__item label {
        position: relative;
    }

    .input__item input {
        width: 100%;
        padding: 15px;
        font-size: 17px;
        padding-right: 50px;
        border: 1.4px solid #e6d9d9;
    }

    .input__item .showPass {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        font-size: 15px;
        margin: 0;
        background: transparent;
        padding: 0;
        border: 0;
        line-height: 1;
        margin-right: 10px;
        cursor: pointer;
        color: dodgerblue;
    }

    .input__item .showPass:focus {
        outline: none;
    }

    .updatebtn_user {
        margin: 0 10px;
    }

    /* .tab-pane {
        display: block !important;
    } */
</style>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Users List</li>
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




                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="users-tab" data-toggle="tab" data-target="#users" type="button" role="tab" aria-controls="users" aria-selected="true">Users</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="roles-tab" data-toggle="tab" data-target="#roles" type="button" role="tab" aria-controls="roles" aria-selected="false">Roles</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                                    <div class="my-2 text-right">
                                        <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 1 || $_SESSION['roleId'] == 999)) { ?>

                                            <a href="index.php?erp=137" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Add New
                                                User</a>
                                        <?php } ?>
                                    </div>

                                    <table id="userstable" class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th> Name</th>
                                                <th> Password</th>
                                                <th> Role</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="roles" role="tabpanel" aria-labelledby="roles-tab">
                                    <div class="my-2 text-right">
                                        <?php if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 1 || $_SESSION['roleId'] == 999)) : ?>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#role_modal">
                                                <i class="fa fa-plus mr-2"></i>Add New Role
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                    <table class="table table-striped" id="role_tbl">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- ajax function -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>


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


<div class="modal fade" id="role_modal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h5 class="modal-title">Add Role</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="role_form" onsubmit="return false">
                    <div class="mb-3">
                        <label for="role_name" class="form-label">Role <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="role_name" name="role_name">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="role_add_btn">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>




<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

<script>
    function showPass(id) {
        if ($('#showPass_' + id).text().toLowerCase() === "show") {
            $('#showPass_' + id).text("Hide");
            $('#showPass_' + id)
                .prev("input")
                .prop("type", "text");
        } else {
            $('#showPass_' + id).text("Show");
            $('#showPass_' + id)
                .prev("input")
                .prop("type", "password");
        }
    }

    var dataRecordscus = $('#userstable').DataTable({
        "lengthChange": true,
        "searchable": true,
        "processing": true,
        "serverSide": true,
        "ordering": false,
        "bjQueryUI": true,
        "order": [],
        "dom": 'Blfrtip',
        /*"buttons":
        {
                extend: 'pdf', title: 'Station Report',
                extend: 'csv', title: 'Station Report',
                extend: 'excel', title: 'Station Report'
        },*/
        buttons: [],

        /* "columnDefs": [{
                 "targets": [0],
                 "visible": false,
                 "searchable": false
             },

         ],*/
        "ajax": {
            url: "modules/users/ajax_functions.php",
            type: "POST",
            //  data: { mode: 'filterlistSalesOrder' },
            data: function(d) {
                d.mode = 'getAllUsers';
                d.fromDate = $('#from_date_cus').val();
                d.toDate = $('#to_date_cus').val();
                d.txt_state = $('#txt_state ').find(":selected").val();
                d.txt_city = $('#txt_city ').find(":selected").val();
                //  d.mo_id = $('#mo_id').find(":selected").val();
                //        d.report_status_id = $('#report_status_id').find(":selected").val();
            },
            dataType: "json",

        },

        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "pageLength": 10,

        //Alphabet Sort



        'initComplete': function() {
            $("input[type='search']").attr("name", "searchuser");
            $("input[type='search']").attr("autocomplete", "nope");

        }


    });


    $('#report_search').on('click', function() {
        dataRecordscus.draw();
    });

    class Users {

        constructor() {
            this.getAllRoles();
            this.bindEvents();
            this.addRole();
        }

        bindEvents() {

            $("#users-tab").addClass("active");

            $(document).on('click', '.edit_btn', (e) => {
                this.changeEditMode(e);
            });

            $(document).on('click', '.save_btn', (e) => {
                this.saveRole(e);
            });

            $(document).on('click', '.cancel_btn', (e) => {
                this.cancelEdit(e);
            });

            $(document).on('click', '.delete_btn', (e) => {
                this.updateRoleVisibility(e);
            });
        }

        addRole() {

            const callObj = this;

            $("#role_form").validate({
                rules: {
                    role_name: {
                        required: true,
                        minlength: 2,
                        maxlength: 150
                    },
                },
                messages: {
                    role_name: {
                        required: "Please enter the role name",
                        minlength: "Role name must be at least 2 characters long",
                        maxlength: "Role name cannot exceed 150 characters"
                    },
                },
                submitHandler: function(form) {
                    const formData = new FormData(form);
                    formData.set("mode", "addRole");
                    $.ajax({
                        cache: false,
                        async: false,
                        url: "modules/users/ajax_functions.php",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        beforeSend: function() {
                            $("#role_add_btn").html(`<i class="fa fa-spinner fa-spin"></i>`);
                        },
                        success: function(data) {
                            if (data) {
                                form.reset();
                                $('.close').trigger("click");
                                swal("Added!", "Role added successfully.", "success");
                            } else {
                                swal("Failed!", "Unable to add role.", "error");
                            }

                            callObj.getAllRoles();
                        },
                        complete: () => {
                            $("#role_add_btn").html("Add");
                        }
                    });

                }
            })
        }

        restoreActionButtons($tr, roleId) {
            $tr.children().eq(2).html(`
                <button class="btn btn-primary btn-sm edit_btn me-2"
                        data-role_id="${roleId}">
                    <i class="fa fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-sm delete_btn"
                        data-role_id="${roleId}">
                    <i class="fa fa-trash"></i>
                </button>
            `);
        }


        // ✅ Switch row to edit mode
        changeEditMode(e) {

            const $btn = $(e.currentTarget);
            const $tr = $btn.closest('tr');

            const roleName = $tr.children().eq(1).text().trim();
            const roleId = $btn.data('role_id');

            // store original value (for cancel)
            $tr.data('original_role', roleName);

            // role name → input
            $tr.children().eq(1).html(`
                <input type="text"
                    class="form-control form-control-sm role_input"
                    value="${roleName}">
            `);

            // action buttons → save + cancel
            $tr.children().eq(2).html(`
                <button class="btn btn-success btn-sm save_btn"
                        data-role_id="${roleId}">
                    <i class="fa fa-save"></i>
                </button>

                <button class="btn btn-danger btn-sm cancel_btn">
                    <i class="fa fa-times"></i>
                </button>
            `);
        }

        saveRole(e) {

            const callObj = this;

            const $btn = $(e.currentTarget);
            const $tr = $btn.closest('tr');

            const roleId = $btn.data('role_id');
            const newRoleName = $tr.find('.role_input').val().trim();

            if (newRoleName === "") {
                swal("Warning", "Role name cannot be empty", "warning");
                return;
            }

            swal({
                title: "Update Role?",
                text: "Are you sure you want to save changes?",
                icon: "warning",
                buttons: ['Cancel', 'Yes, Save'],
                dangerMode: true
            }).then((willSave) => {

                if (willSave) {

                    $.ajax({
                        url: "modules/users/ajax_functions.php",
                        type: "POST",
                        data: {
                            mode: "updateRole",
                            role_id: roleId,
                            role_name: newRoleName
                        },
                        beforeSend: () => {
                            $btn.prop('disabled', true);
                            $btn.html(`<i class="fa fa-spinner fa-spin"></i>`);
                        },
                        success: (res) => {

                            if (res == 1) {

                                swal("Updated!", "Role updated successfully.", "success");

                                // restore UI
                                $tr.children().eq(1).text(newRoleName);
                                callObj.restoreActionButtons($tr, roleId);


                            } else {

                                swal("Failed!", "Unable to update role.", "error");

                                const originalRole = $tr.data('original_role');

                                $tr.children().eq(1).text(originalRole);
                                callObj.restoreActionButtons($tr, roleId);

                            }

                            $btn.prop('disabled', false);
                        },
                        error: () => {

                            swal("Server Error", "Something went wrong.", "error");

                            $btn.prop('disabled', false);
                        }
                    });

                }
            });
        }

        // ✅ Cancel edit mode
        cancelEdit(e) {

            const $btn = $(e.currentTarget);
            const $tr = $btn.closest('tr');

            const originalRole = $tr.data('original_role');
            const roleId = $tr.find('.save_btn').data('role_id');

            // restore original text
            $tr.children().eq(1).text(originalRole);

            // restore edit button
            this.restoreActionButtons($tr, roleId);
        }

        // ✅ Load roles table
        getAllRoles() {

            $.ajax({
                url: "modules/users/ajax_functions.php",
                type: "POST",
                data: {
                    mode: "getAllRoles"
                },
                dataType: "json",

                beforeSend: () => {
                    $('#role_tbl tbody').html(`
                        <tr>
                            <td colspan="3" class="text-center">
                                <i class="fa fa-spinner fa-spin"></i> Loading...
                            </td>
                        </tr>
                    `);
                },

                success: (data) => {

                    const $tbody = $('#role_tbl tbody');
                    $tbody.empty();

                    if (data.length === 0) {
                        $tbody.append(`
                        <tr>
                            <td colspan="3" class="text-center">
                                No data available
                            </td>
                        </tr>
                    `);
                        return;
                    }

                    data.forEach((row, index) => {

                        $tbody.append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${row.role_name}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm edit_btn me-2"
                                            data-role_id="${row.role_id}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm delete_btn"
                                            data-role_id="${row.role_id}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `);
                    });
                },

                error: () => {
                    $('#role_tbl tbody').html(`
                        <tr>
                            <td colspan="3" class="text-danger text-center">
                                Failed to load data
                            </td>
                        </tr>
                    `);
                }
            });
        }

        updateRoleVisibility(e) {

            const callObj = this;

            const id = $(e.currentTarget).data("role_id");

            if ($("#edit_access").val() == 0) {
                location.href = 'index.php?erp=141';
                return;
            }

            swal({
                title: "Are you sure you want to delete the role",
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
                        url: "modules/users/ajax_functions.php",
                        data: {
                            mode: 'updateRoleVisibility',
                            role_id: id
                        },
                        success: function(response) {
                            if (response == 1) {
                                swal("Delete!", "Role has been deleted.", "success");
                            } else {
                                swal("Failed!", "Something went wrong, Try again!", "error");
                            }
                            callObj.getAllRoles();
                        },
                        error: function(response) {
                            console.log(response);
                        },
                    });
                }
            });
        }
    }

    // ✅ Init
    $(document).ready(() => {
        new Users();
    });


    /*
    $('.search_key').on('click', function(e) {
        if ($('.searchKeyword').val() != '') {
            dataRecordscus.search($('.searchKeyword').val()).draw();
        } else {
            dataRecordscus.search('').columns().search('').draw();
        }
    });

    */
    /*
    $('#from_date_cus').on('change', function() {
        dataRecordscus.draw();
    });

    $('#to_date_cus').on('change', function() {
        dataRecordscus.draw();
    });


    $('#txt_state').on('change', function() {
        dataRecordscus.draw();
    });
    $('#txt_city').on('change', function() {
        dataRecordscus.draw();
    });*/
    $('#report_reset').on('click', function() {

        $('#from_date_cus').val(' ');
        $('#to_date_cus').val(' ');

        $('#txt_state').prop('selectedIndex', 0);
        $('#txt_state').trigger('change.select2');
        $('#txt_city').prop('selectedIndex', 0);
        $('#txt_city').trigger('change.select2');

        dataRecordscus.draw();
    });

    function updatevisibility(id) {

        // alert(1)
        // alert($("#edit_access").val())

        if ($("#edit_access").val() == 0) {
            location.href = 'index.php?erp=141';
            return;
        }

        var userpass = $('#txt_userpass_' + id).val();
        var username = $('#txt_username_' + id).val();
        var userrole = $('#txt_role_' + id).val();

        swal({
            title: "Are you sure you want to change the user password?",
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
                    url: "modules/users/ajax_functions.php",
                    data: {
                        "id": id,
                        "userpass": userpass,
                        "username": username,
                        "userrole": userrole,
                        "mode": 'UpdateUsers'
                    },
                    beforeSend: function() {
                        $("#loaderscancel").show();
                    },
                    complete: function() {
                        $("#loaderscancel").hide();
                    },
                    success: function(response) {
                        if (response == 1) {
                            swal("Update!", "User Password has been updated.", "success");
                            window.location = 'index.php?erp=132';
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

    $(".master").addClass("menu-open");
    $(".master_customer .nav-link").addClass("active");
</script>