<?php
error_reporting(0);
$from_date ="";
$to_date="";
if(isset($_POST['submit'])){ 
  $from_date1 = $_POST['fromDate']; 
  $to_date1 = $_POST['toDate'];
  
   $from_date2 = str_replace('/', '-', $from_date1);
    $to_date2 = str_replace('/', '-', $to_date1);
	$from_date = date('Y-m-d', strtotime($from_date2)); 
    $to_date = date('Y-m-d', strtotime($to_date2));
   
}  
$title =  '';
if(isset($_GET['typ']) && $_GET['typ'] == 1)
{
    $title = 'Commercial';
}else if(isset($_GET['typ']) && $_GET['typ'] ==2)
{
    $title = 'Non Commercial';
}
include "classes/class_customer.php";
$obj_cus = new Customer('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $GLOBALS["___mysqli_ston"]);
$getcustomer = $obj_cus->getAllCustomer();
$cus_data = array();
while ($cus_rows = mysqli_fetch_array($getcustomer)) {
    $cus_data[] = $cus_rows;
}

$getfranchise  = $obj_cus->getAllFrachise();
$frans_data = array();
while ($frans_rows = mysqli_fetch_array($getfranchise)) {
    $frans_data[] = $frans_rows;
}
include("classes/class_report.php");
$obj_saleorder = new Report('', '');

$title =  '';
$getAllitems = array();
if(isset($_GET['typ']) && $_GET['typ'] == 1)
{
    $title = 'Commercial';
    $getAllitems = $obj_saleorder->getAllCommitems();

}else if(isset($_GET['typ']) && $_GET['typ'] ==2)
{
    $title = 'Non Commercial';
    $getAllitems = $obj_saleorder->getAllNonCommitems();

}


$items_data = array();

if(mysqli_num_rows($getAllitems) > 0){
    while ($items_rows = mysqli_fetch_array($getAllitems)) {
        $items_data[] = $items_rows;
    }
}


$getAllStates = $obj_cus->getAllStates();
$state_data = array();
while ($state_rows = mysqli_fetch_array($getAllStates)) {
    $state_data[] = $state_rows;
}

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $heading;?> </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    </ol>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <!--	
<form action="" method="post">
		  <p id="date_filter">
    <span id="date-label-from" class="date-label">From Date: </span><input class="date_range_filter date" type="text" id="fromDate" name="fromDate" />
    <span id="date-label-to" class="date-label">To Date:<input class="date_range_filter date" type="text" id="toDate" name="toDate" />
</p>
<button type="submit" name="submit" class="btn btn-info">Search</button>
</form> -->

                    <form class="row" autocomplete="off" method="post" id="rmcyte_employee">
                        <div class="col-lg-12">
                            <h4 class="mb-3 mt-0"><?php echo $title; ?> Amount Received Reports</h4>
                        </div>

                        <div class="col-lg-3 form-group">
                            <label for="name">From Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="<?php 
                                            echo date('d/m/Y', strtotime("-1 months")); 
                                        ?>" name="from_date" id="from_date" placeholder="">
                        </div>

                        <div class="col-lg-3 form-group">
                            <label for="email">To Date</label>
                            <input type="text" class="form-control" value="<?php echo date('d/m/Y') ?>" name="to_date"
                                id="to_date" placeholder="">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label for="name">Customer <span class="text-danger">*</span></label>
                            <select class="form-control txt_customer_name " name="txt_customer_name"
                                id="txt_customer_name">
                                <option value="">Select Customer</option>
                                <?php for ($i = 0; $i < count($cus_data); $i++) {?>
                                <option value="<?php echo $cus_data[$i]['pk_cus_id']; ?>">
                                    <?php echo $cus_data[$i]['cus_name'] . " - (" . $cus_data[$i]['cus_code'] . ")"; ?>
                                </option>
                                <?php }?>
                            </select>

                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="name">Franchise <span class="text-danger">*</span></label>
                            <select class="form-control txt_franchise_name " name="txt_franchise_name"
                                id="txt_franchise_name">
                                <option value="">Select Franchise</option>
                                <?php for ($i = 0; $i < count($frans_data); $i++) {?>
                                <option value="<?php echo $frans_data[$i]['cat_name']; ?>">
                                    <?php echo $frans_data[$i]['cat_name'] ; ?>
                                </option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="col-lg-3 pt-4">
                            <input type="button" class="btn btn-info btn-lg butttns" value="Search" id="report_search">

                            <input type="reset" class="btn btn-primary btn-lg" value="Reset" id="report_reset">
                        </div>
                    </form>

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


                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                    aria-labelledby="nav-waiting-tab">
                                    <?php //echo $tableData;
                                    if(isset($_GET['typ']) && $_GET['typ'] == 1)
                                    { ?>
                                    <table id="estimateTable"
                                        class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>Date</th>
                                                <th>Order No</th>
                                                <!--<th>Customer Code</th>-->
                                                <th>Customer Name</th>

                                                <th>Mode / Franchise</th>
                                                <th>Items</th>
                                                <th>Total Amount(₹)</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>
                                    <?php } else if(isset($_GET['typ']) && $_GET['typ'] == 2){ ?>
                                    <table id="estimateTable"
                                        class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>S.No </th>
                                                <th>Date</th>
                                                <th>Order No</th>
                                                <!--<th>Customer Code</th>-->
                                                <th>Customer Name</th>

                                                <th>Mode / Franchise</th>
                                                <th>Items</th>
                                                <th>Product</th>

                                                <th>Size </th>
                                                <th>No of Sheet </th>
                                                <th>Orientation </th>
                                                <th>Total Amount(₹)</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>

                                    </table>
                                    <?php } ?>

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

<style type="text/css">
.dataTables_wrapper {
    margin-top: 14px;
}


</style>

<script>
var minDate, maxDate;

$('#txt_customer_name').select2();


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
};


var commornon = [];
var targetsv = [];
if (getQueryVariable('typ') == 1) {
    commornon = [0, 1, 2, 3, 4, 5, 6];
    targetsv = 6;
} else {
    commornon = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    targetsv =10;
}
var roleId = $('#getSessRollId').val();
var dataRecords = $('#estimateTable').DataTable({
  
    "lengthChange": true,
    "searchable": true,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "bjQueryUI": true,
    "order": [],
    'columnDefs': [{
    'targets': targetsv,
    'className': 'dt-body-right',
    }],
    "dom": 'Blfrtip',
  
    buttons: [{
            extend: 'print',
            text: '<span class="mdi mdi-file-print"></span> Print',
            title: 'Amount Received Reports',
            action: newexportaction1,

            exportOptions: {
                modifier: {
                    search: 'applied',
                    order: 'applied'
                }
            },
        },
        {
            extend: 'excel',
            text: '<span class="mdi mdi-file-print"></span> Excel',
            title: 'Amount Received Reports',
            action: newexportaction1,

            exportOptions: {
                modifier: {
                    search: 'applied',
                    order: 'applied'
                }
            },

        },
       
    ],


    "ajax": {
        url: "modules/reports/ajax_functions.php",
        type: "POST",
        //  data: { mode: 'filterlistSalesOrder' },
        data: function(d) {
            d.mode = 'listPaidReport';
            d.fromDate = $('#from_date').val();
            d.toDate = $('#to_date').val();
            d.txt_customer_name = $('#txt_customer_name ').val();
            d.typ = <?php echo $_GET['typ']; ?>;
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

});

/*
$('.search_key').on('click', function(e) {
    if ($('.searchKeyword').val() != '') {
        dataRecords.search($('.searchKeyword').val()).draw();
    } else {
        dataRecords.search('').columns().search('').draw();
    }
});*/
$('#report_search').on('click', function() {
    dataRecords.draw();
});

$('#report_reset').on('click', function() {


    $('#txt_customer_name').prop('selectedIndex', 0);
    $('#txt_customer_name').trigger('change.select2');

    dataRecords.draw();

});
/*
$('#from_date').on('change', function() {
    dataRecords.draw();
});

$('#to_date').on('change', function() {
    dataRecords.draw();
});
$('#txt_customer_name').on('change', function() {
    dataRecords.draw();
});
$('#txt_state').on('change', function() {
    dataRecords.draw();
});
$('#txt_city').on('change', function() {
    dataRecords.draw();
});*/
/*
$('#report_status_id').on('change', function() {
    dataRecords.draw();
});
$('#from_date').on('change', function() {
    dataRecords.draw();
});

$('#to_date').on('change', function() {
    dataRecords.draw();
});*/

var dateNow = new Date();
/*$('#txt_pi_date').datepicker({
  dateFormat: 'dd-mm-yy',
     defaultDate: new Date() 
});*/
var disableddate = new Date();

disableddate.setDate(disableddate.getDate());

$('#txt_pi_date').datepicker({
    format: "dd/mm/yyyy"
}).datepicker('setDate', dateNow);
/*$("#txt_pi_date").datepicker({
        dateFormat: "yy-mm-dd"
    }).datepicker("setDate", dateNow);*/
/*$("#txt_pi_date").datepicker({
        dateFormat: 'd/m/Y'
    }).datepicker('setDate', dateNow)*/

$('#txt_delivery_date').datepicker({
    format: "dd/mm/yyyy",
    startDate: disableddate
}).datepicker('setDate', dateNow);
/*
$('#txt_delivery_date').datetimepicker({
  format:'d/m/Y',
  timepicker:false,
   minDate:0
});
$('#fromDate').datetimepicker({
  format:'d/m/Y',
   timepicker:false,
  // minDate:0
});
$('#toDate').datetimepicker({
  format:'d/m/Y',
   timepicker:false,
  // minDate:0
});*/
/*
$('#from_date').datepicker({
    format: 'dd/mm/yy',
    dateFormat: 'dd/mm/yy',
    autoclose: true,
    todayHighlight: true,
    onSelect: function(selectedDate) {
        $('#to_date').datepicker('option', 'minDate', selectedDate);
        dataRecords.draw();
        //$('#to_date').datepicker('option', {minDate: minDate})
    }

});
$('#to_date').datepicker({
    minDate: "<?php echo date('d/m/Y', strtotime('-1 months')); ?>",
    dateFormat: 'dd/mm/yy',
    autoclose: true,
    todayHighlight: true
});*/

$('#from_date').datepicker({
     format: 'dd/mm/yyyy',
    dateFormat: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true,
    onSelect: function(selectedDate) {
     $('#to_date').datepicker('option', 'minDate', selectedDate);
     dataRecords.draw();
    //$('#to_date').datepicker('option', {minDate: minDate})
    }

});
$('#to_date').datepicker({
  format: 'dd/mm/yyyy',

    minDate: "<?php echo date('d/m/Y', strtotime('-1 months')); ?>",
    dateFormat: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true
});
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
//get id from URL 
function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) {
            return pair[1];
        }
    }
}
</script>