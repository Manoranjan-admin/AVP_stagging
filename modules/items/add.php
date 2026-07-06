<?php
//error_reporting(E_ALL);

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Items</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Items</li>
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
                        <!--   fk_item_id
                        type
                        item_type-->
                        <form class="form-horizontal theme-form" method="post" id="form_Items_add" novalidate="novalidate">
                            <div class="card-body">
                                <div id="stepwizard">
                                    <div class="one-half-column">

                                        <div class="form-group">
                                            <label for="" class="control-label">Type <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <select class="form-control  txt_types" name="txt_types"
                                                    id="txt_types">
                                                    <option>Select one </option>
                                                    <option <?php if($_GET['typ'] == 1){ echo "selected=selected"; } ?> value="1">Commercial</option>
                                                    <option <?php if($_GET['typ'] == 2){ echo "selected=selected"; } ?>  value="2">Non Commercial</option>
                                                </select>
                                                <span class="error" id="txt_types_error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Item Type<span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <select class="form-control textOnly txt_item_type" name="txt_item_type"
                                                    id="txt_item_type">
                                                    <option>Select one </option>

                                                </select>


                                                <span class="error" id="txt_item_type-error"></span>
                                            </div>
                                        </div>
                                        <?php if(isset($_GET['its']) && $_GET['its']== 2){ ?>
                                        <div class="form-group parentPro">
                                            <label for="" class="control-label">Parent Product<span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <select class="form-control textOnly txt_product" name="txt_product"
                                                    id="txt_product">
                                                    <option>Select one </option>
                                                </select>
                                                <span class="error" id="txt_product-error"></span>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label for="" class="control-label">Item Name</label>
                                            <div class="control-field">
                                                <input type="text" class="form-control textOnly txt_item"
                                                    name="txt_item" id="txt_item" value="">
                                                <span class="error" id="txt_item_error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group commtype" style="display:none">
                                            <label for="" class="control-label">First Copy Price</label>
                                            <div class="control-field">
                                                <input type="number" class="form-control txt_first_copyprice"
                                                    name="txt_first_copyprice" id="txt_first_copyprice" maxlength="100" min="0"
                                                    placeholder="Price" required="required"
                                                    title="First Copy Price" aria-required="true" value="0">

                                                <span class="error" id="txt_first_copyprice-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group commtype" style="display:none">
                                            <label for="" class="control-label">Additional Copy Price </label>
                                            <div class="control-field">
                                                <input type="number" class="form-control txt_second_addiprice"
                                                    name="txt_second_addiprice" id="txt_second_addiprice"
                                                    maxlength="100" min="0" placeholder=" Price"
                                                    required="required" title="Additional Copy Price"
                                                    aria-required="true"  value="0">
                                                <span class="error" id="txt_second_addiprice-error"></span>
                                            </div>
                                        </div>
                                       <!-- <div class="form-group othercommtype" style="display:none">
                                            <label for="" class="control-label"> Price</label>
                                            <div class="control-field">
                                                <input type="number" class="form-control txt_first_copyprice"
                                                    name="txt_first_copyprice" id="txt_first_price" maxlength="100" min="0"
                                                    placeholder="Price" required="required"
                                                    title="Price" aria-required="true">

                                                <span class="error" id="txt_first_price-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group othercommtype" style="display:none">
                                            <label for="" class="control-label"> Price <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <input type="number" class="form-control txt_second_addiprice"
                                                    name="txt_second_addiprice" id="txt_second_price"
                                                    maxlength="100" min="0" placeholder="Price"
                                                    required="required" title=" Price"
                                                    aria-required="true" readonly>
                                                <span class="error" id="txt_second_price-error"></span>
                                            </div>
                                        </div>-->
                                        <div class="form-group noncommtype" style="display:none">
                                            <label for="" class="control-label noncomm4label" >4 Color Price</label>
                                            <label for="" class="control-label othernoncomm4label" style="display:none"> Price </label>

                                            <div class="control-field">
                                                <input type="number" class="form-control txt_4color_price"
                                                    name="txt_4color_price" id="txt_4color_price" maxlength="100"
                                                    min="0" placeholder="Price" required="required"
                                                    title="4 Color Price"  aria-required="true" value="0">

                                                <span class="error" id="txt_4color_price-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group noncommtype" style="display:none">

                                            <label for="" class="control-label noncomm7label" >7 Color Price </label>
                                            <label for="" class="control-label othernoncomm4label" style="display:none"> Price </label>

                                            <div class="control-field">
                                                <input type="number" class="form-control txt_7color_price"
                                                    name="txt_7color_price" id="txt_7color_price" maxlength="100"
                                                    min="0" placeholder="Price " required="required"
                                                    title="7 Color Price"  aria-required="true"  value="0">
                                                <span class="error" id="txt_7color_price-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="mode" id="mode" value="AddItems">

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <div class="row">
                                    <div class="col-lg-6 pr-lg-3">
                                        <button type="submit" id="add_items"
                                            class="btn btn-success btn-lg">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<script type="text/javascript">
$( document ).ready(function() {
  //  $('.txt_types').trigger("change");

//$('.commtype').hide();
//$('.noncommtype').hide();
$('#form_Items_add').validate({
    rules: {
        txt_types: {
            required: true
        },
        txt_item_type: {
            required: true
        },
        txt_item: {
            required: true
        },
        txt_product: {
            required: true
        },
       txt_first_copyprice: {
            required: true
        },
        txt_second_addiprice: {
            required: true
        },
     
        txt_4color_price: {
            required: true
        },
        txt_7color_price: {
            required: true
        },
      
    },
submitHandler: function(form) {
   // $("#add_items").prop('disabled', true);

    var formData = new FormData($('#form_Items_add')[0]);
    $.ajax({
        url: "modules/items/ajax_functions.php",
        data: formData,
        type: 'post',
        async: false,
        dataType: 'json',
        beforeSend: function() {
            $("#cover").css("display", "block");
        },
        success: function(response) {
            $("#cover").css("display", "none");
            if (response == 1) {
                swal({
                    title: "Success!",
                    text: "Items has been added successfully!.",
                    type: "success",
                    timer: 1000,
                    buttons: false,
                }).then(function() {
                    window.location.href = "index.php?erp=51&typ=<?php echo $_GET['typ']; ?>&its=<?php echo $_GET['its']; ?>";
                });
            } else {
                swal("Failed!", "Something went wrong or Already exist, Try again!", "error");
            }
        },
        error: function(response) {
            console.log(response);
        },
        cache: false,
        contentType: false,
        processData: false
    });
},
onkeyup: false
});




var types = $('.txt_types').find("option:selected").val();
var itemtype = <?php echo (isset($_GET['its'])) ? $_GET['its'] : 0; ?>;

$('.noncommtype').hide();
$('.commtype').hide();

$('.txt_item_type').empty();
if (types == 2) {
    $.ajax({
        url: "modules/products/ajax_functions.php",
        data: {
            'mode': 'getTypesListing'
        },
        type: 'post',
        async: false,
        dataType: 'json',
        success: function(response) {
            $('.txt_item_type').html('<option selected disabled>Select</option>');
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_types_id == '9999') {
                    //  type_tables, table_pk_id, orderid
                    $('.txt_item_type').append('<option value="' + response[0][i]
                        .pk_types_id + '" data-types="2" data-tables="' + response[0][i]
                        .type_tables + '" data-pkid="' + response[0][i].table_pk_id + '">' +
                        response[0][i].types_name + ' </option>');
                } else {
                    $('.txt_item_type').append('<option value="' + response[0][i].pk_types_id +
                        '" data-types="2" data-tables="' + response[0][i].type_tables +
                        '" data-pkid="' + response[0][i].table_pk_id + '">' + response[0][i]
                        .types_name + '</option>');
                }
            }
            setTimeout(function() {
                    $('.txt_item_type').find('option[value="'+itemtype +'"]').attr("selected",true);
                }, 1000);



        }
    });

       $('.noncommtype').show();
       if(itemtype == 2){
         getProductItems();
       }
} else {
   $('.commtype').show();

    $('.txt_item_type').html('<option selected disabled>Select</option><option value="1">Product</option>');
    setTimeout(function() {
        $('.txt_item_type').find('option[value="'+itemtype +'"]').attr("selected",true);
    }, 1000);
}

$('.txt_item_type').on('change', function() {
    var itemtypes = $(this).find("option:selected").val();
    if(itemtypes == 2)
    {
        $('.parentPro').show();

    }
    else{
    $('.parentPro').hide();
    }

});
$('.txt_types').on('change', function() {
    $('.noncommtype').hide();
    $('.othercommtype').hide();
    $('.commtype').hide();
    var types = $(this).find("option:selected").val();
   // var itemtype = <?php echo $_GET['its']; ?>;
    $('.noncommtype').hide();
    $('.commtype').hide();

    $('.txt_item_type').empty();
    if (types == 2) {
        $.ajax({
            url: "modules/products/ajax_functions.php",
            data: {
                'mode': 'getTypesListing'
            },
            type: 'post',
            async: false,
            dataType: 'json',
            success: function(response) {
                $('.txt_item_type').html('<option selected disabled>Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_types_id == '9999') {
                        //  type_tables, table_pk_id, orderid
                        $('.txt_item_type').append('<option value="' + response[0][i]
                            .pk_types_id + '" data-types="2" data-tables="' + response[0][i]
                            .type_tables + '" data-pkid="' + response[0][i].table_pk_id + '">' +
                            response[0][i].types_name + ' </option>');
                    } else {
                        $('.txt_item_type').append('<option value="' + response[0][i].pk_types_id +
                            '" data-types="2" data-tables="' + response[0][i].type_tables +
                            '" data-pkid="' + response[0][i].table_pk_id + '">' + response[0][i]
                            .types_name + '</option>');
                    }
                }
              /*  setTimeout(function() {
                    $('.txt_item_type').find('option[value="'+itemtype +'"]').attr("selected",true);
                }, 1000);*/
            }
        });
           $('.noncommtype').show();
      //$('.commtype').hide();

    } else {
       $('.commtype').show();
     //$('.noncommtype').hide();

        $('.txt_item_type').html('<option selected disabled>Select</option><option value="1">Product</option>');

    }
});

});
$('.txt_item_type').on('change', function() {
    getItemListing();
});


function getProductItems(){

$.ajax({
        url: "modules/items/ajax_functions.php",
        data: {
            'mode': 'getProductItemsListing'
        },
        type: 'post',
        async: false,
        dataType: 'json',
        success: function(response) {
            $('.txt_product').html('<option selected disabled>Select</option>');
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_items_id == '9999') {
                    //  type_tables, table_pk_id, orderid
                    $('.txt_product').append('<option value="' + response[0][i]
                        .pk_items_id + '" data-types="2">' +
                        response[0][i].fk_item_id + ' </option>');
                } else {
                    $('.txt_product').append('<option value="' + response[0][i].pk_items_id +
                        '" data-types="2" >' + response[0][i]
                        .fk_item_id + '</option>');
                }
            }
          /*  setTimeout(function() {
                    $('.txt_product').find('option[value="'+itemtype +'"]').attr("selected",true);
                }, 1000);*/



        }
    });

}
getItemListing();


function getItemListing() {
    //alert('test');
    $('.noncomm4label').hide();
    $('.noncomm7label').hide();
    $('.othernoncomm4label').hide();
    $('.othernoncomm7label').hide();
    $('.commtype').hide();


    

  var types = $('.txt_types').find("option:selected").val();
if(types == 2){
    var itemtype  = $('.txt_item_type').find("option:selected").val();

    if(itemtype == 4 || itemtype == 5)
    {
     $('.noncomm4label').show();
     $('.noncomm7label').show();
    }
    else{
        $('.othernoncomm4label').show();
     $('.othernoncomm7label').show();
    }
} else {
       $('.commtype').show();
}

}
$(".nav-link").removeClass("active");
$(".nav-item").removeClass("menu-open");

$(".items").addClass("menu-open");
$(".master_items .nav-link").addClass("active");
</script>
<style type="text/css">
.theme-form .control-field {
    /*display: flex;*/
}

.select2 {
    width: 100% !important;
}
</style>
