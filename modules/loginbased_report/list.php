<?php
error_reporting(0);
include "classes/class_sale_order_report.php";
$obj_saleorder = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');



$getCreditPaymentList = $obj_saleorder->getCreditPaymentList();
//$getSINOval = mysqli_fetch_array($getCreditPaymentList);

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"> Order Payment</li>
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

                            <div class="nav nav-tab col-md-6" id="nav-tab" role="tablist">
                                <?php if ($statusdata['close_status'] != 1) {?>

                                <form method="post" id="changeStatus">

                                    <fieldset>
                                        <div class="form-group">
                                            <label for="" class="control-label">Sales Invoice No <span class="color">
                                                    *</span></label>
                                            <div class="control-field">
                                       <select class="control-label txt_invoice_no" name="txt_invoice_no" id="txt_invoice_no">
                                            <option value="">Select Invoice</option>
                                       <?php 
                                               while ($getSINOvaldata = mysqli_fetch_array($getCreditPaymentList)) {
                                                    echo '<option value="'.$getSINOvaldata['PK_SE_ID'] .'">'.$getSINOvaldata['eno'].'</option>';
                                               }
                                       
                                       ?>
                                       </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Total Amount <span class="color">
                                                    *</span></label>
                                            <div class="control-field">
                                                <input type="text" class="txt_total_amount " id="txt_total_amount"
                                                    name="txt_total_amount" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Paying Amount <span class="color">
                                                    *</span></label>
                                            <div class="control-field">
                                                <input type="text" class="txt_paying_amount " id="txt_paying_amount"
                                                    name="txt_paying_amount" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Created by <span class="color">
                                                    *</span></label>
                                            <div class="control-field">
                                                <input type="text" class="txt_createdby " id="txt_createdby"
                                                    name="txt_createdby" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Date<span class="color">
                                                    *</span></label>
                                            <div class="control-field">
                                                <input type="date" class=" txt_date " id="txt_date"
                                                    name="txt_date" />
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
                                        <button type="submit" name="changeBtn">Submit</button>
                                    </fieldset>
                                </form>
                                <?php }?>
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

form {
    max-width: 1022px;
    margin: 10px auto;
    padding: 10px 20px;
    background: #f4f7f8;
    border-radius: 8px;
}



input[type="text"],
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
    color: #000000;
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
    margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
    margin: 0 4px 8px 0;
}

select {
    padding: 6px;
    height: 32px;
    border-radius: 2px;
}

button {
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

</style>
<script src="assets/dist/js/os_serverdatatable_ajax.js?version="></script>

<script>

$(".nav-link").removeClass("active");
$(".nav-item").removeClass("menu-open");

$(".sales").addClass("menu-open");
$(".sales_customer .nav-link").addClass("active");






$('#changeStatus').validate({
    rules: {
        txt_invoice_no: {
            required: true
        },
        txt_total_amount : {
            required: true
        },
        txt_paying_amount: {
            required: true
        },
       
         txt_date: {
            required: true
        },
        txt_createdby: {
            required: true
        },

    },
    errorPlacement: function(error, element) {
    if (element.attr("name") == "txt_status" )
        error.insertAfter(".txt_status-error");
    else
        error.insertAfter(element);
},
    submitHandler: function(form) {
      $("button[name='changeBtn']").prop('disabled', true);

        var formData = new FormData($('#changeStatus')[0]);
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
                            "index.php?erp=34&id=<?php echo $_GET['id']; ?>";
                    });
                } else {
                    swal("Failed!", "Something went wrong, Try again!", "error");
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
$('#txt_invoice_no').on('change', function() {
    var invID = $('#txt_invoice_no').val();
    getJobOrderStatus(invID);
});

function getJobOrderStatus(invID) {
    $.ajax({
        url: "modules/order_payment/ajax_functions.php",
        data: {
            'invID': invID,
            'mode': 'getInvoiceAmount'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
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