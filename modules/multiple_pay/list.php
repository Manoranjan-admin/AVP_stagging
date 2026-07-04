<?php
error_reporting(1);

include "classes/class_customer.php";
$obj_cus = new Customer('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $GLOBALS["___mysqli_ston"]);
$getcustomer = $obj_cus->getAllCustomer();
$cus_data = array();
while ($cus_rows = mysqli_fetch_array($getcustomer)) {
    $cus_data[] = $cus_rows;
}
$getfranchise  = $obj_cus->getAllFrachise();
$franch_data = array();
while ($franch_rows = mysqli_fetch_array($getfranchise)) {
    $franch_data[] = $franch_rows;
}



$heading = 'Filter   ';


function getTable($customerID, $tableName, $payTable)
{
    $query = "SELECT est.PK_ES_ID, (est.grand_total) as totalAmt,est.sono, est.sale_date,est.order_status,est.delivery_date FROM " . $tableName . " as est where est.order_status != 6";
    $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);


    $tableBody = '';
    if (mysqli_num_rows($result)  > 0) {
        $counter = 1;
        while ($data = mysqli_fetch_array($result)) {

            $advance = getReceipts($data['PK_ES_ID'], 0, $payTable);
            $receipts = getReceipts($data['PK_ES_ID'], 1, $payTable);
            $tableBody .= '	
							
                              <tr>
                                <td>' . $counter . '</td>
                                <td>' . $data['sono'] . '</td>
								<td>' . $data['sale_date'] . '</td>
								<td>' . $data['sale_date'] . '</td>
								<td>' . date("d-M-Y", strtotime($data['sale_date'])) . '</td>
                                <td style="text-align:right;">' . number_format($data['totalAmt'], 2) . '</td>
								<td style="text-align:right;">' . number_format($advance, 2) . '</td>                                      
								<td style="text-align:right;">' . number_format($receipts, 2) . '</td>  
								<td style="text-align:right;">' . number_format($data['totalAmt'] - ($receipts + $advance), 2) . '</td>                                <td><a href="index.php?erp=97&typ=1&cusid=' . $data['pk_cus_id'] . '" class="btn btn-primary  btn-sm">' . getStatus($data["order_status"]) . '</a></td>
                              </tr>
                            ';
            $counter++;
        }
    }


    return $tableBody;
}

function getReceipts($cusID, $type, $payTable)
{


    $query = "SELECT sum(advance_amount) as advance FROM " . $payTable . " where fk_es_id=" . $cusID . " and type=" . $type;
    $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

    $returnValue = '0';
    $estimatecomm = array();
    if (mysqli_num_rows($result)  > 0) {
        $counter = 1;
        while ($data = mysqli_fetch_array($result)) {
            $returnValue = $data['advance'];
        }
    }
    return $returnValue;
}
function getStatus($status)
{

    switch ($status) {
        case 0:
            return ("Yet to Start");
            break;
        case 1:
            return ("Designing");
            break;
        case 2:
            return ("Printing");
            break;
        case 3:
            return ("Lamination");
            break;
        case 4:
            return ("Finishing");
            break;
        case 5:
            return ("Ready for Delivery");
            break;
        case 6:
            return ("Delivered");
            break;
        default:
            return ("Yet to Start");
    }
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $heading; ?> </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>

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
                    <form class="row" autocomplete="off" method="post" id="rmcyte_employee">
                        <div class="col-lg-12">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="name">From Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="<?php
                                                                            echo date('d/m/Y', strtotime("-1 months"));
                                                                            ?>" name="from_date" id="from_date" placeholder="">
                        </div>

                        <div class="col-lg-2 form-group">
                            <label for="email">To Date</label>
                            <input type="text" class="form-control" value="<?php echo date('d/m/Y') ?>" name="to_date"
                                id="to_date" placeholder="">
                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="name">Franchise <span class="text-danger">*</span></label>
                            <select class="form-control txt_franchise_name " name="txt_franchise_name"
                                id="txt_franchise_name">
                                <option value="">Select Franchise</option>
                                <?php for ($i = 0; $i < count($franch_data); $i++) { ?>
                                    <option value="<?php echo $franch_data[$i]['pk_cat_id']; ?>">
                                        <?php echo $franch_data[$i]['cat_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="name">Customer <span class="text-danger">*</span></label>
                            <select class="form-control txt_customer_name " name="txt_customer_name"
                                id="txt_customer_name">
                                <option value="">Select Customer</option>
                                <?php for ($i = 0; $i < count($cus_data); $i++) { ?>
                                    <option value="<?php echo $cus_data[$i]['pk_cus_id']; ?>">
                                        <?php echo $cus_data[$i]['cus_name'] . " - (" . $cus_data[$i]['cus_code'] . ")"; ?>
                                    </option>
                                <?php } ?>
                            </select>

                        </div>

                        <div class="col-lg-4 pt-4">
                            <input type="button" class="btn btn-info btn-lg butttns" value="Search" id="report_search">

                            <input type="reset" class="btn btn-primary btn-lg" value="Reset" id="report_reset">

                        </div>
                    </form>




                    <!-- jquery validation -->
                    <div class="card card-primary">


                        <!-- <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div> -->
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <!-- DATA TABLE-->
                            <div class="col-md-12">
                                <div id="addbillstatusMSSG"></div>
                            </div>
                            <form id="frm-example" name="frm-example" method="POST"
                                action="index.php?erp=105&type=<?php echo $_GET['type']; ?>">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-waiting" role="tabpanel"
                                        aria-labelledby="nav-waiting-tab">
                                        <?php if (isset($_GET['type']) &&  $_GET['type'] == 1) { ?>

                                            <h3>Commercial Waiting Bulk Receipts </h3>
                                            <p class="form-group text-right">
                                                <button type="submit" id="checkConBtn" class="btn btn-primary">Receipts</button>

                                            <div class="chktotamout">
                                                Selected Amount(&#8377;):
                                                <span id="idSmofAmount"></span>
                                            </div>
                                            </p>

                                            <table id="estimateTable"
                                                class="table table-bordered table-striped dataTable dtr-inline">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" id="select-all">
                                                        </th>

                                                        <th>S.No </th>
                                                        <th>Estimate Number</th>
                                                        <th>Date</th>
                                                        <th>Customer</th>
                                                        <th>Franchise</th>
                                                        <th>Total Amount (₹)</th>
                                                        <th>Advance (₹)</th>
                                                        <th>Receipts (₹)</th>
                                                        <th>Outstanding (₹)</th>
                                                        <th>Status</th>


                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php //echo getTable($_GET['cusid'],'erp_estimate_comm','erp_advance_comm');
                                                    ?>

                                                </tbody>
                                            </table>
                                            <br />
                                        <?php } else if (isset($_GET['type']) &&  $_GET['type'] == 2) {  ?>
                                            <h3>Non Commercial Waiting Bulk Receipts </h3>
                                            <p class="form-group text-right">
                                                <button type="submit" id="checkConBtn" class="btn btn-primary">Receipts</button>
                                            <div class="chktotamout">
                                                Selected Amount(&#8377;):
                                                <span id="idSmofAmount"></span>
                                            </div>
                                            </p>
                                            <table id="estimateTable"
                                                class="table table-bordered table-striped dataTable dtr-inline">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" id="select-all">
                                                        </th>

                                                        <th>S.No </th>
                                                        <th>Estimate Number</th>
                                                        <th>Date</th>
                                                        <th>Customer</th>
                                                        <th>Franchise</th>
                                                        <th>Total Amount (₹)</th>
                                                        <th>Advance (₹)</th>
                                                        <th>Receipts (₹)</th>
                                                        <th>Outstanding (₹)</th>
                                                        <th>Status</th>


                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php //echo getTable($_GET['cusid'],'erp_estimate_noncomm','erp_advance_noncomm');
                                                    ?>

                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>

                                </div>

                        </div>
                    </div>
                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            </form>
            <!-- /.card -->

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

<!-- DataTables Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<!-- Required for Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script>
    $('#txt_customer_name').select2();
    $('#txt_franchise_name').select2();
    /*$('#report_reset').on('click', function() {

        $('#txt_customer_name').find("option:selected").prop("selected", false)

        $('#txt_customer_name').trigger('change');

    });*/

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
    var dataRecords = $('#estimateTable').DataTable({


        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        "ordering": false,
        // "bjQueryUI": true,
        "order": [],
        //"dom": 'Blfrtip',
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center',
            'render': function(data, type, full, meta) {
                return '<input type="checkbox" class="bulkcheckbox" name="id[]" value="' + $('<div/>').text(data).html() +
                    '">';
            }
        }],
        "dom": 'Blfrtip',
        /*"buttons":
        {
                extend: 'pdf', title: 'Station Report',
                extend: 'csv', title: 'Station Report',
                extend: 'excel', title: 'Station Report'
        },*/


        "ajax": {
            url: "modules/multiple_pay/ajax_functions.php",
            type: "POST",
            //  data: { mode: 'filterlistSalesOrder' },
            data: function(d) {
                d.mode = 'listBulkReport';
                d.fromDate = $('#from_date').val();
                d.toDate = $('#to_date').val();
                d.txt_customer_name = $('#txt_customer_name').val();
                d.txt_franchise_name = $('#txt_franchise_name').val();
                d.typ = <?php echo $_GET['type']; ?>;
                if (d.length == -1) {
                    d.export = 1;
                }
                //  d.mo_id = $('#mo_id').find(":selected").val();
                //        d.report_status_id = $('#report_status_id').find(":selected").val();
            },
            dataType: "json",

        },
        buttons: [
            // {
            //     extend: 'print',
            //     text: 'Print',
            //     title: 'Bulk Receipt Report',
            //     action: newexportaction1,
            //     exportOptions: {
            //         modifier: {
            //             search: 'applied',
            //             order: 'applied'
            //         }
            //     }
            // },
            {
                extend: 'excel',
                text: '<span class="mdi mdi-file-print"></span> Excel',
                title: 'Bulk Receipt Report',
                action: newexportaction1,
                exportOptions: {
                    modifier: {
                        search: 'applied',
                        order: 'applied'
                    }
                }
            }
        ],

        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "pageLength": 10,


    });

    var creditAmount = 0

    $('#estimateTable').on('click', 'tr', function() {



        var checkedCount = $("#estimateTable tr td input:checked").length;





        var creditAmount = 0
        var ordernumberarr = [];
        for (var i = 0; i < checkedCount; i++) {
            var amount = $("#estimateTable td input:checked")[i].parentNode.parentNode.children[9].innerHTML
            var ordernumber = $("#estimateTable td input:checked")[i].parentNode.parentNode.children[2].innerHTML
            var esid = $("#estimateTable td input:checked")[i].parentNode.parentNode.children[0].value

            ordernumberarr.push(ordernumber);



            if (amount != "") {
                creditAmount += parseFloat(amount);
            } else {
                creditAmount = 0;
            }
        }
        var datachk = $(this).toggleClass('selected')[0].innerHTML;
        var esid = $(datachk).find("input[type=checkbox]").each(function() {

            return this.value;
        });

        $.ajax({
            url: "modules/multiple_pay/ajax_functions.php",
            data: {
                'mode': 'checkBulkorderstatusdelivered',
                'ordernumber': ordernumberarr,
                'typ': <?php echo $_GET['type']; ?>

            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                if (response.length > 0) {
                    var responseval = [];
                    //    responseval.push(response);
                    // console.log(responseval);
                    var orderid = [];
                    for (var j = 0; j < response.length; j++) {

                        orderid.push(response[j]);
                    }
                    var esordernumer = orderid.join(',');

                    $('#addbillstatusMSSG').empty();

                    //  var esid =  $("#estimateTable tr td  input[type='checkbox']").val(esid).prop('checked',false);;

                    $('#addbillstatusMSSG').html('<div class="addbillstMSSG"><i class="fa fa-exclamation-circle" style="font-size:20px;color:#dfd6d6"><span style="margin: 3px;">Kindly change the status of the estimate  "DELIVERED"  before adding bill receipts. (' + esordernumer + ')</span></i></div>');


                    var esidval = esid.val();
                    console.log(esidval);
                    if (esidval) {
                        $('input[value="' + esidval + '"]').parent('tr').removeClass('selected');
                        $('input[value="' + esidval + '"]').prop('checked', false);
                    }



                    // $('input[type="checkbox"]', table.cells().nodes([1,2])).prop('checked',false); 
                } else {
                    $('#addbillstatusMSSG').empty();
                    $('#checkConBtn').prop('disabled', false);

                    $("#idSmofAmount").text(creditAmount);

                }


                //$('#checkConBtn').prop('disabled', true);
                //  $('input', dataRecords.cells().nodes()).prop('checked',false);

                //$("#txt_customer_name").val(cus);

            },
            error: function(response) {
                console.log(response);
            }
        });

    });

    $('#checkConBtn').on('click', function() {
        var checkedCount = $("#estimateTable tr td input:checked").length;

        $('#addbillstatusMSSG').empty();
        if (checkedCount == 0) {
            $('#addbillstatusMSSG').html('<div class="addbillstMSSG"><i class="fa fa-exclamation-circle" style="font-size:20px;color:#dfd6d6"><span style="margin: 3px;">Please select anyone order. </span></i></div>');
            $('#checkConBtn').prop('disabled', true);
            return false;

        }


    });
    /*
    $('.search_key').on('click', function(e) {
        if ($('.searchKeyword').val() != '') {
            dataRecords.search($('.searchKeyword').val()).draw();
        } else {
            dataRecords.search('').columns().search('').draw();
        }
    });*/

    $('#report_reset').on('click', function() {
        $('#txt_customer_name').prop('selectedIndex', 0);
        $('#txt_customer_name').trigger('change.select2');
        $('#txt_franchise_name').prop('selectedIndex', 0);
        $('#txt_franchise_name').trigger('change.select2');
        dataRecords.draw();

    });
    $('#report_search').on('click', function() {
        dataRecords.draw();
    });
    /*
    $('#txt_customer_name').on('change', function() {
        dataRecords.draw();
    });
    $('#txt_franchise_name ').on('change', function() {
        dataRecords.draw();
    });
    $('#from_date').on('change', function() {
        dataRecords.draw();
    });

    $('#to_date').on('change', function() {
        dataRecords.draw();
    });*/

    // Handle click on "Select all" control
    // $('#example-select-all').on('click', function() {
    //     // Get all rows with search applied
    //     var rows = dataRecords.rows({
    //         'search': 'applied'
    //     }).nodes();
    //     // Check/uncheck checkboxes for all rows in the table
    //     $('input[type="checkbox"]', rows).prop('checked', this.checked);
    // });


    // // Handle click on checkbox to set state of "Select all" control
    // $('#example tbody').on('change', 'input[type="checkbox"]', function() {
    //     // If checkbox is not checked
    //     if (!this.checked) {
    //         var el = $('#example-select-all').get(0);
    //         // If "Select all" control is checked and has 'indeterminate' property
    //         if (el && el.checked && ('indeterminate' in el)) {
    //             // Set visual state of "Select all" control
    //             // as 'indeterminate'
    //             el.indeterminate = true;
    //         }
    //     }
    // });

    $('#select-all').on('click', function() {
        var rows = dataRecords.rows({
            'search': 'applied'
        }).nodes();
        $('input.bulkcheckbox', rows).prop('checked', this.checked);

        updateSelectedAmount();
    });

    $('#estimateTable tbody').on('click', 'input.bulkcheckbox', function(e) {
        e.stopPropagation();
        updateSelectedAmount();
    });

    function updateSelectedAmount() {
        var creditAmount = 0;
        var ordernumberarr = [];

        $('#estimateTable tbody input.bulkcheckbox:checked').each(function() {
            var row = $(this).closest('tr');

            var amount = row.find('td:eq(9)').text(); // Outstanding column
            var ordernumber = row.find('td:eq(2)').text();

            ordernumberarr.push(ordernumber);

            if (amount !== "") {
                creditAmount += parseFloat(amount);
            }
        });

        $("#idSmofAmount").text(creditAmount);
    }
    $('#frm-example').on('submit', function(e) {

        var form = this;
        // Iterate over all checkboxes in the table
        if (!$('input[type="checkbox"]').is(':checked')) {
            e.preventDefault();
            return false;
        } else {

            dataRecords.$('input[type="checkbox"]').each(function() {
                // If checkbox doesn't exist in DOM
                if (!$.contains(document, this)) {
                    // If checkbox is checked
                    if (this.checked) {
                        // Create a hidden element
                        //alert(this.name);
                        $(form).append(
                            $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', this.name)
                            .val(this.value)
                        );
                    }
                }
            });
        }
    });
</script>