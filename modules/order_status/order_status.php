<?php
error_reporting(0);
include "classes/class_order_status.php";
$obj_orderstatus = new Order_status('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
// Handle multiple IDs
$ids = isset($_GET['id']) ? explode(',', $_GET['id']) : array();
$typs = isset($_GET['typ']) ? $_GET['typ'] : 1;

$allJobOrdersData = array();
$allStatusData = array();
$allSOData = array();

foreach ($ids as $id) {

    $obj_orderstatus->setso_id($id);
    $obj_orderstatus->seteno($typs);

    $getJobOrderData = $obj_orderstatus->getJobOrderData();
    $allJobOrdersData[$id] = $getJobOrderData;

    $checkCompletedStatus = $obj_orderstatus->checkCompletedStatus();
    $statusdata = mysqli_fetch_array($checkCompletedStatus);
    $allStatusData[$id] = $statusdata;

    if ($typs == 1) {
        $getSOdata = $obj_orderstatus->getEstimateCommdata();
        $allSOData[$id] = mysqli_fetch_array($getSOdata);
    } else if ($typs == 2) {
        $getSOdata = $obj_orderstatus->getEstimateNonCommdata();
        $allSOData[$id] = mysqli_fetch_array($getSOdata);
    }
}

$statustitle = ($typs == 1) ? 'Commercial' : 'Non Commercial';

// First ID for display logic
$firstId = !empty($ids) ? $ids[0] : 0;
$statusdata = isset($allStatusData[$firstId]) ? $allStatusData[$firstId] : array();
$getSoval = isset($allSOData[$firstId]) ? $allSOData[$firstId] : array();
?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $statustitle; ?> Order Status - <?php echo $getSoval['sono']; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"> Order Status</li>
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

                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body row">
                            <!-- DATA TABLE-->
                            <div class="mb-2 text-right">
                            </div>

                            <div class="nav nav-tab col-md-4" id="nav-tab" role="tablist">
                                <?php
                                if ($statusdata['close_status'] != 1) { ?>

                                    <form method="post" id="changeStatus">

                                        <fieldset>
                                            <div class="form-group">
                                                <label for="" class="control-label">Estimate No <span class="color">
                                                        *</span></label>
                                                <div class="control-field">
                                                    <?php foreach ($ids as $id) {
                                                        echo $allSOData[$id]['sono'] . "<br>";
                                                    } ?>
                                                    <input type="hidden" name="txt_sc_no" id="txt_sc_no"
                                                        value="<?php echo implode(',', $ids); ?>">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="control-label">Status <span class="color">
                                                        *</span></label>
                                                <div class="control-field">
                                                    <?php
                                                    $disstatus1 = (intval(1) <= intval($statusdata['statusval'])) ? 'disabled' : '';
                                                    $disstatus2 = (intval(2) <= intval($statusdata['statusval'])) ? 'disabled' : '';
                                                    $disstatus3 = (intval(3) <= intval($statusdata['statusval'])) ? 'disabled' : '';
                                                    $disstatus4 = (intval(4) <= intval($statusdata['statusval'])) ? 'disabled' : '';
                                                    $disstatus5 = (intval(5) <= intval($statusdata['statusval'])) ? 'disabled' : '';
                                                    $disstatus6 = (intval(6) <= intval($statusdata['statusval'])) ? 'disabled' : '';
                                                    ?>
                                                    <select class="txt_status control-field chosen_required" id="txt_status"
                                                        name="txt_status">
                                                        <option value="">Select One</option>
                                                        <?php //if($_SESSION[''] == 2)
                                                        ?>
                                                        <?php if ($_SESSION['roleId'] != 5) { ?>
                                                            <option value="1" <?php echo $disstatus1; ?>>Designer Head Split
                                                                Order</option>
                                                        <?php }
                                                        if ($_SESSION['roleId'] != 4) {
                                                        ?>
                                                            <option value="2" <?php echo $disstatus2; ?>>Send for Printing
                                                            </option>
                                                            <?php if ($_SESSION['roleId'] != 5) {
                                                            ?>
                                                                <option value="3" <?php echo $disstatus3; ?>>Send for Lamination
                                                                </option>
                                                                <option value="4" <?php echo $disstatus4; ?>>Finishing of Order
                                                                </option>
                                                                <option value="5" <?php echo $disstatus5; ?>>Ready for Delivery
                                                                </option>
                                                                <option value="6" <?php echo $disstatus6; ?>> Delivered
                                                                </option>
                                                        <?php }
                                                        } ?>



                                                    </select>
                                                    <span class="txt_status-error"></span>
                                                </div>
                                            </div>
                                            <!--  <div class="form-group">
                                            <label for="" class="control-label">Created by <span class="color">
                                                    *</span></label>
                                            <div class="control-field">-->
                                            <input type="hidden" class="txt_createdby " id="txt_createdby"
                                                name="txt_createdby" value="0" />
                                            <!--   <span class="txt_createdby-error" ></span>

                                        </div>
                                        </div>-->
                                            <div class="form-group">
                                                <label for="" class="control-label">Date<span class="color">
                                                        *</span></label>
                                                <div class="control-field">
                                                    <input type="date" class=" txt_date " id="txt_date"
                                                        name="txt_date" />
                                                    <span class="txt_date-error"></span>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="control-label">Comments</label>
                                                <div class="control-field">
                                                    <textarea class=" txt_comments " id="txt_comments"
                                                        name="txt_comments"> </textarea>

                                                </div>
                                            </div>
                                            <input type="hidden" name="mode" value="changeOrderStatus">
                                            <input type="hidden" name="typId" value="<?php echo $_GET['typ'] ?>">
                                            <button type="submit" name="changeBtn">Change Status</button>
                                        </fieldset>
                                    </form>
                                <?php } ?>
                            </div>
                            <div id="timeline" class="col-md-8">
                                <?php foreach ($ids as $id):

                                    $getJobOrderData = $allJobOrdersData[$id];
                                    $getSoval = $allSOData[$id];
                                    while ($datass = mysqli_fetch_array($getJobOrderData)) {
                                        $statustitle = '';
                                        if ($datass['status'] == 1) {
                                            $statustitle = 'Designer Head Split Order';
                                        } elseif ($datass['status'] == 2) {
                                            $statustitle = 'Send for Printing';
                                        } else if ($datass['status'] == 3) {
                                            $statustitle = 'Send for Lamination';
                                        } else if ($datass['status'] == 4) {
                                            $statustitle = 'Finishing of Order';
                                        } else if ($datass['status'] == 5) {
                                            $statustitle = 'Ready for Delivery';
                                        } else if ($datass['status'] == 6) {
                                            $statustitle = 'Delivered';
                                        }
                                        $timecreates =   date("h:i:s A", strtotime($datass['timecreate']));
                                ?>

                                        <article>
                                            <div class="inner">
                                                <span class="date">
                                                    <span class="day"><?php echo $datass['DAY']; ?><sup>th</sup></span>
                                                    <span class="month"><?php echo $datass['MONTH']; ?></span>
                                                    <span class="year"><?php echo $datass['YEAR']; ?></span>
                                                    <span class="hour"><?php echo $timecreates; ?></span>
                                                </span>

                                                <h2><?php echo $statustitle . ' - ' . $getSoval['sono']; ?></h2>

                                                <p><?php echo $datass['comments']; ?></p>
                                            </div>
                                        </article>
                                <?php }
                                endforeach; ?>
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-12">


                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<style>
    *,
    *:before,
    *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        font-family: 'Nunito', sans-serif;
        color: #384047;
    }

    form#changeStatus {
        max-width: 1022px;
        margin: 10px auto;
        padding: 10px 20px;
        background: #f4f7f8;
        border-radius: 8px;
    }


    #changeStatus>input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="datetime"],
    input[type="email"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="time"],
    input[type="url"],
    textarea,
    select {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        font-size: 16px;
        height: auto;
        margin: 0;
        outline: 0;
        padding: 15px;
        width: 100%;
        background-color: #e8eeef;
        color: #8a97a0;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
        margin-bottom: 0;
    }

    input[type="radio"],
    input[type="checkbox"] {
        margin: 0 4px 8px 0;
    }

    #changeStatus select {
        padding: 6px;
        height: 32px;
        border-radius: 2px;
    }

    #changeStatus button {
        padding: 19px 39px 18px 39px;
        color: #FFF;
        background-color: #0067B4;
        font-size: 18px;
        text-align: center;
        font-style: normal;
        border-radius: 5px;
        width: 100%;
        border: 1px solid #F89713;
        border-width: 1px 1px 3px;
        box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
        margin-bottom: 10px;
    }

    fieldset {
        margin-bottom: 30px;
        border: none;
    }

    legend {
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    label.light {
        font-weight: 300;
        display: inline;
    }

    .number {
        background-color: #5fcf80;
        color: #fff;
        height: 30px;
        width: 30px;
        display: inline-block;
        font-size: 0.8em;
        margin-right: 4px;
        line-height: 30px;
        text-align: center;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
        border-radius: 100%;
    }



    @media screen and (min-width: 480px) {

        form {
            max-width: 616px;
            width: 100%;
        }

    }

    div#timeline {
        width: 80%;
        margin: 20px auto;
        position: relative;
    }

    div#timeline:before {
        content: '';
        display: block;
        position: absolute;
        left: 50%;
        top: 0;
        margin: 0 0 0 -2px;
        width: 2px;
        height: 100%;
        background: #f99b19;
    }

    div#timeline article {
        width: 100%;
        margin: 0 0 60px 0;
        position: relative;
    }

    div#timeline article:after {
        content: '';
        display: block;
        clear: both;
    }

    div#timeline article div.inner {
        width: 40%;
        float: left;
        margin: 5px 0 0 0;
        border-radius: 6px;
    }

    div#timeline article div.inner span.date {
        display: block;
        width: 111px;
        height: 103px;
        padding: 5px 0;
        position: absolute;
        top: 0;
        left: 47%;
        margin: 0 0 0 -25px;
        border-radius: 100%;
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
        background: #25303B;
        color: rgba(255, 255, 255, 0.5);
        border: 2px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 0 0 7px #25303B;
    }

    div#timeline article div.inner span.date span {
        display: block;
        text-align: center;
    }

    div#timeline article div.inner span.date span.day {
        font-size: 10px;
    }

    div#timeline article div.inner span.date span.month {
        font-size: 18px;
    }

    div#timeline article div.inner span.date span.year {
        font-size: 10px;
    }

    div#timeline article div.inner h2 {
        padding: 5px;
        margin: 0;
        color: #fff;
        font-size: 18px;
        text-transform: uppercase;
        letter-spacing: -1px;
        border-radius: 6px 6px 0 0;
        position: relative;
    }

    div#timeline article div.inner h2:after {
        content: '';
        position: absolute;
        top: 20px;
        right: -5px;
        width: 10px;
        height: 10px;
        -webkit-transform: rotate(-45deg);
    }

    div#timeline article div.inner p {
        padding: 15px;
        margin: 0;
        font-size: 14px;
        background: #ececec;
        color: #656565;
        border-radius: 0 0 6px 6px;
    }

    div#timeline article:nth-child(2n+2) div.inner {
        float: right;
    }

    div#timeline article:nth-child(2n+2) div.inner h2:after {
        left: -5px;
    }

    div#timeline article:nth-child(1) div.inner h2 {
        background: #e74c3c;
    }

    div#timeline article:nth-child(1) div.inner h2:after {
        background: #e74c3c;
    }

    div#timeline article:nth-child(2) div.inner h2 {
        background: #2ecc71;
    }

    div#timeline article:nth-child(2) div.inner h2:after {
        background: #2ecc71;
    }

    div#timeline article:nth-child(3) div.inner h2 {
        background: #e67e22;
    }

    div#timeline article:nth-child(3) div.inner h2:after {
        background: #e67e22;
    }

    div#timeline article:nth-child(4) div.inner h2 {
        background: #1abc9c;
    }

    div#timeline article:nth-child(4) div.inner h2:after {
        background: #1abc9c;
    }

    div#timeline article:nth-child(5) div.inner h2 {
        background: #9b59b6;
    }

    div#timeline article:nth-child(5) div.inner h2:after {
        background: #9b59b6;
    }

    div#timeline article:nth-child(6) div.inner h2 {
        background: #17a2b8;
    }

    div#timeline article:nth-child(6) div.inner h2:after {
        background: #17a2b8;
    }
</style>
<script src="assets/dist/js/os_serverdatatable_ajax.js?version="></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $(".nav-link").removeClass("active");
    $(".nav-item").removeClass("menu-open");

    $(".status").addClass("menu-open");
    $(".orderstatus .nav-link").addClass("active");
    getCustomersListings(0);


    //GET CUSTOMER EDIT PAGE
    function getCustomersListings(cusid) {
        var cusid = cusid;
        $.ajax({
            url: "modules/sales/ajax_functions.php",
            data: {
                'mode': 'getCustomerListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                //  $('#txt_customer_name').chosen('destroy');
                $('.txt_customer_name').html('');
                $('.txt_customer_name').append('<option value="">Select Customer</option>');
                for (var i = 0; i < response.length; i++) {
                    $('.txt_customer_name').append('<option value="' + response[i].pk_cus_id + '">' + response[
                        i].cus_name + '</option>');
                }
                setTimeout(function() {
                    $('#txt_customer_name').find('option[value="' + cusid + '"]').attr("selected",
                        true);
                    //   $("#txt_customer_name").chosen();
                    //$("#txt_customer_name").trigger('chosen:updated');
                    /*   if (getQueryVariable('hnd') != pageView) {
                           $('#txt_customer_name').trigger('change');
                       }*/

                }, 1000);
            }
        });
    }

    $('#txt_customer_name').select2();
    $('#txt_uom').select2();
    $(".nav-link").removeClass("active");
    $(".nav-item").removeClass("menu-open");

    $(".sales").addClass("menu-open");
    $(".sales_customer .nav-link").addClass("active");

    $('.txt_product_name').select2();
    $('#txt_product_name_1').select2();

    function getProductListing(type) {
        //alert('test');
        $.ajax({
            url: "modules/products/ajax_functions.php",
            data: {
                'mode': 'getProductListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                if (response[0].length > 0) {
                    console.log(response);
                    //$('.txt_product_name').chosen('destroy');
                    $('.txt_product_name_' + type).html('');
                    $('.txt_product_name_' + type).html('<option selected disabled>Select</option>');
                    for (var i = 0; i < response[0].length; i++) {
                        if (response[0][i].pk_product_id == '9999') {

                            $('.txt_product_name_' + type).append('<option value="' + response[0][i]
                                .pk_product_id + '" data-types="2">' + response[0][i].product_name +
                                ' </option>');
                        } else {

                            $('.txt_product_name_' + type).append('<option value="' + response[0][i]
                                .pk_product_id + '" data-types="1">' + response[0][i].product_name +
                                '</option>');
                        }
                    }
                    //$('.txt_product_name').chosen();
                    $("#proStatus").val(1);
                } else {
                    $('table .itemclone').html(
                        '<tr><td colspan="10" class="text-center error"> No records available in the table !</td></tr>'
                    );
                    $("#additems").hide();
                    $("#proStatus").val(0);
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    function getCategoryListing(type) {
        $.ajax({
            url: "modules/sales/ajax_functions.php",
            data: {
                'mode': 'getCategoryListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {

                //$('.txt_product_name').chosen('destroy');
                $('.txt_category_' + type).html('');
                $('.txt_category_' + type).html('<option selected >Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_product_id == '9999') {

                        $('.txt_category_' + type).append('<option value="' + response[0][i]
                            .pk_cat_id + '" data-types="2">' + response[0][i].cat_name + '</option>');
                    } else {

                        $('.txt_category_' + type).append('<option value="' + response[0][i]
                            .pk_cat_id + '" data-types="1">' +
                            response[0][i].cat_name + '</option>');
                    }
                }
                //$('.txt_product_name').chosen();
                $("#proStatus").val(1);

            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    function getInnerSheetListing(type) {
        //alert('test');
        $.ajax({
            url: "modules/sales/ajax_functions.php",
            data: {
                'mode': 'getInnerSheetListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                if (response[0].length > 0) {
                    console.log(response);
                    $('.txt_innersheet').chosen('destroy');
                    $('.txt_innersheet_' + type).html('');
                    $('.txt_innersheet_' + type).html('<option selected >Select</option>');
                    for (var i = 0; i < response[0].length; i++) {
                        if (response[0][i].pk_is_id == '9999') {

                            $('.txt_innersheet_' + type).append('<option value="' + response[0][i].pk_is_id +
                                '" data-cost="' + response[0][i].cost + '" data-types="2">' + response[0][i]
                                .name + '</option>');
                        } else {

                            $('.txt_innersheet_' + type).append('<option value="' + response[0][i].pk_is_id +
                                '" data-cost="' + response[0][i].cost + '" data-types="1">' + response[0][i]
                                .name + '</option>');
                        }
                    }
                    //  $('.txt_innersheet').chosen();
                    $("#proStatus").val(1);
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    function getSpecialEffectsListing(type) {
        //alert('test');
        $.ajax({
            url: "modules/sales/ajax_functions.php",
            data: {
                'mode': 'getSpecialEffectsListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                if (response[0].length > 0) {
                    console.log(response);
                    //$('.txt_product_name').chosen('destroy');
                    $('.txt_specialeffects_' + type).html('');
                    $('.txt_specialeffects_' + type).html('<option selected >Select</option>');
                    for (var i = 0; i < response[0].length; i++) {
                        if (response[0][i].pk_se_id == '9999') {

                            $('.txt_specialeffects_' + type).append('<option value="' + response[0][i]
                                .pk_se_id + '" data-secost="' + response[0][i].cost + '" data-types="2">' +
                                response[0][i].name + '</option>');
                        } else {

                            $('.txt_specialeffects_' + type).append('<option value="' + response[0][i]
                                .pk_se_id + '"  data-secost="' + response[0][i].cost + '" data-types="1">' +
                                response[0][i].name + '</option>');
                        }
                    }
                    //$('.txt_product_name').chosen();
                    $("#proStatus").val(1);
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    function getSizeListing(type) {
        //alert('test');
        $.ajax({
            url: "modules/sales/ajax_functions.php",
            data: {
                'mode': 'getSizeListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                if (response[0].length > 0) {
                    console.log(response);
                    //$('.txt_product_name').chosen('destroy');
                    $('.txt_size_' + type).html('');
                    $('.txt_size_' + type).html('<option selected >Select</option>');
                    for (var i = 0; i < response[0].length; i++) {
                        if (response[0][i].pk_size_id == '9999') {

                            $('.txt_size_' + type).append('<option value="' + response[0][i].pk_size_id +
                                '" data-sizecost="' + response[0][i].cost + '" data-types="2">' + response[
                                    0][i].name + '</option>');
                        } else {

                            $('.txt_size_' + type).append('<option value="' + response[0][i].pk_size_id +
                                '" data-sizecost="' + response[0][i].cost + '" data-types="1">' + response[
                                    0][i].name + '</option>');
                        }
                    }
                    //$('.txt_product_name').chosen();
                    $("#proStatus").val(1);
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
    $.validator.setDefaults({
        ignore: ":hidden:not(select,textarea)"
    });
    $('#changeStatus').validate({
        rules: {
            txt_status: {
                required: true
            },
            txt_comments: {
                required: true
            },
            txt_date: {
                required: true
            },


        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "txt_status")
                error.insertAfter(".txt_status-error");
            else
                error.insertAfter(element);
        },
        submitHandler: function(form) {

            var formData = new FormData($('#changeStatus')[0]);
            $("button[name='changeBtn']").prop('disabled', true);

            $.ajax({
                url: "modules/order_status/ajax_functions.php",
                data: formData,
                type: 'post',
                async: false,
                dataType: 'json',
                success: function(response) {
                    if (response == 1) {
                        swal({
                            title: "Success!",
                            text: "Status is successfully changed!.",
                            type: "success",
                            timer: 1000,
                            buttons: false,
                        }).then(function() {
                            window.location.href =
                                "index.php?erp=34&typ=<?php echo $_GET['typ']; ?>&id=<?php echo $_GET['id']; ?>";
                        });
                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                        window.location.href =
                            "index.php?erp=34&typ=<?php echo $_GET['typ']; ?>&id=<?php echo $_GET['id']; ?>";
                    }
                },
                error: function(response) {
                    $('.btn_save').prop("disabled", false);
                    console.log(response);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        },
    });
    $('#txt_customer_name').on('change', function() {
        var custId = $('#txt_customer_name').val();
        getJobOrderStatus(custId);
    });

    function getJobOrderStatus(cusId) {
        $.ajax({
            url: "modules/order_status/ajax_functions.php",
            data: {
                'id': cusId,
                'mode': 'getJobOrderStatus'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                console.log('test');
                console.log(response[0]);
                $('#txt_sc_no').html('');
                for (var i = 0; i < response.length; i++) {
                    $('#txt_sc_no').append('<option value="' + response[i].pk_sale_order + '">' + response[i]
                        .sono + '</option>');
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
    $(".txt_status").chosen();
</script>
<style type="text/css">
    .dataTables_wrapper {
        margin-top: 14px;
    }
</style>