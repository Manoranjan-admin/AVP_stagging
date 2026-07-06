<?php
//error_reporting(E_ALL);
include("classes/class_customer.php");
$obj_cus = new Customer('','','','','','','','','','','','','','','','','','','','','','',$GLOBALS["___mysqli_ston"]);
$getcustomer = $obj_cus->getAllCustomer();
$data=array();
while($rows=mysqli_fetch_array($getcustomer)) {
  $data[]=$rows;
}
?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Customer List</li>
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
                                <a href="index.php?erp=1" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Add New
                                    Customer</a>
                               
                            </div>

                            <form class="row" autocomplete="off" method="post" id="rmcyte_employee">

                                <div class="col-lg-2 form-group">
                                    <label for="name">From Date <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="" name="from_date_cus"
                                        id="from_date_cus" placeholder="">
                                </div>

                                <div class="col-lg-2 form-group">
                                    <label for="email">To Date</label>
                                    <input type="text" class="form-control" value="" name="to_date_cus" id="to_date_cus"
                                        placeholder="">
                                </div>
                                <div class="col-lg-2 form-group">
                                    <label for="name">State <span class="text-danger">*</span></label>
                                    <select class="form-control txt_state capallfields "
                                        style=" text-transform:uppercase !important;" id="txt_state" name="txt_state">
                                        </option>

                                    </select>

                                </div>
                                <div class="col-lg-2 form-group">
                                    <label for="name">City <span class="text-danger">*</span></label>
                                    <select class="form-control txt_city capallfields "
                                        style=" text-transform:uppercase !important;" id="txt_city" name="txt_city">

                                    </select>

                                </div>

                                <div class="col-lg-4 pt-4">
                                    <input type="button" class="btn btn-info btn-lg butttns" value="Search"
                                        id="report_search">
                                    <input type="reset" class="btn btn-primary btn-lg" value="Reset" id="report_reset">
                                </div>
                            </form>

                            <table id="customer_table" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>S.No </th>
                                        <th>Customer Code</th>
                                        <th>Customer Name</th>
                                        <!-- <th>Customer Email</th> -->
                                        <th>Customer GST No</th>
                                        <!-- <th>GST No</th> -->
                                        <th>Address </th>
                                        <th>State </th>
                                        <th>City </th>
                                        <th>Phone </th>
                                        <th>Zip Code </th>
                                        <th>Mobile Number </th>
                                        <th>Created On </th>
                                        <th>Action</th>
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




<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

<script>
$('#txt_state').select2();
$('#txt_city').select2();



// Custom filtering function which will search data in column four between two values


function newexportaction1(e, dt, button, config) {
    var self = this;
    var oldStart = dt.settings()[0]._iDisplayStart;
    dt.one('preXhr', function(e, s, data) {
        // Just this once, load all data from the server...
        data.start = 0;
        data.length = 2147483647;
        dt.one('preDraw', function(e, settings) {
            // Call the original action function
            if (button[0].className.indexOf('buttons-copy') >= 0) {
                $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-print') >= 0) {
                $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
            }
            dt.one('preXhr', function(e, s, data) {
                // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                // Set the property to what it was before exporting.
                settings._iDisplayStart = oldStart;
                data.start = oldStart;
            });
            // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
            setTimeout(dt.ajax.reload, 0);
            // Prevent rendering of the full data to the DOM
            return false;
        });
    });
    // Requery the server with the new one-time export settings
    dt.ajax.reload();
}
var dataRecordscus = $('#customer_table').DataTable({
    "lengthChange": true,
    "searchable": false,
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
    buttons: [{
            extend: 'print',
            text: '<span class="mdi mdi-file-print"></span> Print',
            title: 'Customer Details',
            action: newexportaction1,

            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],

                modifier: {
                    search: 'applied',
                    order: 'applied',

                }
            }
        },

        /*  {
              extend: 'pdf',
              text: '<span class="mdi mdi-file-pdf"></span> PDF',
              title: 'Periodical Report',
              action: newexportaction1,

              orientation: 'landscape',
              pageSize: 'LEGAL'
          }*/
    ],

    "columnDefs": [{
            "targets": [4, 5, 8, 9],
            "visible": false,
            "searchable": false
        },

    ],
    "ajax": {
        url: "modules/customer/ajax_functions.php",
        type: "POST",
        //  data: { mode: 'filterlistSalesOrder' },
        data: function(d) {
            d.mode = 'getAllListCustomer';
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






});




$('#report_search').on('click', function() {
    dataRecordscus.draw();
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

    $('#txt_state').prop('selectedIndex',0);
    $('#txt_state').trigger('change.select2');
    $('#txt_city').prop('selectedIndex',0);
    $('#txt_city').trigger('change.select2');

    dataRecordscus.draw();
});

function updatevisibility(id) {
    swal({
        title: "Are you sure you want to delete the user?",
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
                url: "modules/customer/ajax_functions.php",
                data: {
                    "id": id,
                    "mode": 'DeleteCustomer'
                },
                beforeSend: function() {
                    $("#loaderscancel").show();
                },
                complete: function() {
                    $("#loaderscancel").hide();
                },
                success: function(response) {
                    if (response == 1) {
                        swal("Deleted!", "Customer has been deleted.", "success");
                        window.location = 'index.php?erp=2';
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

getAllStates(0, 0);

function getAllStates(stateid, cityid) {
    $.post("modules/customer/ajax_functions.php", {
            mode: 'getAllStates',
        },
        function(response, status) {
            if (response) {
                var data = jQuery.parseJSON(response);
                var stateNameOpt = '<option value=""  selected>SELECT STATE</option>';

                for (var i in data) {
                    stateNameOpt = stateNameOpt + '<option data-stid=' + data[i]['pk_state_id'] + ' value=' + data[
                        i]['state_code'] + '>' + data[i]['state_name'] + '</option>';
                }
                $('#txt_state').append(stateNameOpt);
                $('#txt_customer_city').append('<option value=""  selected>SELECT CITY</option>');
            }

            setTimeout(function() {
                $("#txt_state").find('option[value="' + stateid + '"]').attr("selected", true);

                //$("#form_customer_update #txt_customer_state").val(stateid).trigger("change");
                getCity(stateid, cityid);

            }, 1000);
        });
}

$("#txt_state").change(function() {
    var stateId = $("#txt_state").find(":selected").attr('data-stid');
    getCity(stateId, 0);
});

function getCity(stateId, cityid) {
    if ($("#txt_state").find(":selected").attr('data-stid') != '' && $("#txt_state").find(":selected").attr(
            'data-stid') != null) {
        var stateId = $("#txt_state").find(":selected").attr('data-stid');
        $('#txt_city').empty();
        $('#txt_city').append('<option value=""  selected>SELECT CITY</option>');
        $.post("modules/customer/ajax_functions.php", {
                mode: 'getAllCitiesByState',
                state_id: stateId
            },
            function(data, status) {
                var data = jQuery.parseJSON(data);
                var cityNameOpt = '';
                if (data.length > 0) {
                    var cityNameOpt = '';
                    for (var i in data) {

                        cityNameOpt = cityNameOpt + '<option value=' + data[i]['pk_city_id'] + '>' + data[i][
                            'city'
                        ] + '</option>';
                    }
                    $('#txt_city').append(cityNameOpt);
                }
                setTimeout(function() {
                    $("#form_customer_update #txt_city").find('option[value="' + cityid + '"]').attr(
                        "selected", true);
                    $("#txt_city").change();
                }, 1000);
            });
    } else {
        $('#txt_city').empty();
        $('#txt_city').append('<option value=""  selected>SELECT CITY</option>');
    }
}
</script>