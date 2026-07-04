<?php
error_reporting(0);
include("classes/class_items.php");
$obj_items = new items('', '', '', '', '', '', '', '', '', '', '', '', '', '');
$isBulk = false;
$data = [];

if (isset($_GET['ids'])) {
    // MULTIPLE EDIT
    $isBulk = true;

    $ids = explode(',', $_GET['ids']);
    $idList = implode(',', array_map('intval', $ids));

    $getitems = mysqli_query(
        $GLOBALS["___mysqli_ston"],
        "SELECT * FROM " . ITEMS . " WHERE pk_items_id IN ($idList)"
    );

    while ($row = mysqli_fetch_array($getitems)) {
        $data[] = $row;
    }
} else {
    // SINGLE EDIT
    $obj_items->setid($_GET['id']);
    $getitems = $obj_items->getEditItems();
    $rows = mysqli_fetch_array($getitems);
}
// $obj_items->setid($_GET['id']);
// $getitems = $obj_items->getEditItems();
// $rows=mysqli_fetch_array($getitems);
//var_dump($rows);

//error_reporting(E_ALL);

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Items</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Items</li>
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
                        <form class="form-horizontal theme-form" id="form_Items_edit" novalidate="novalidate">
                            <div class="card-body">
                                <div id="stepwizard">
                                    <div class="one-half-column">
                                        <!-- <input type="hidden" name="item_id" id="item_id" value="<?php echo $_GET['id']; ?>"> -->
                                        <?php if ($isBulk) { ?>
                                            <input type="hidden" name="mode" value="BulkEditItems">
                                        <?php } else { ?>
                                            <input type="hidden" name="item_id" id="item_id" value="<?php echo $_GET['id']; ?>">
                                        <?php } ?>

                                        <?php if (!$isBulk) { ?>

                                            <div class="form-group">
                                                <label for="" class="control-label">Type <span
                                                        class="color">*</span></label>
                                                <div class="control-field">
                                                    <select class="form-control textOnly txt_types" name="txt_types"
                                                        id="txt_types">
                                                        <option>Select one </option>
                                                        <option <?php echo ($rows['type'] == 1) ? 'selected' : ''; ?> value="1">Commercial</option>
                                                        <option <?php echo ($rows['type'] == 2) ? 'selected' : ''; ?> value="2">Non Commercial</option>
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


                                            <?php if ($isBulk) { ?>

                                                <div class="form-group">
                                                    <div class="control-field">

                                                        <!-- HEADER ROW -->
                                                        <div class="row mb-2 font-weight-bold text-center">
                                                            <div>Type</div>
                                                            <div>Item Type</div>
                                                            <div>Parent Product</div>
                                                            <div>Item Name</div>
                                                            <div>First Price</div>
                                                            <div>Second Price</div>
                                                        </div>

                                                        <!-- DATA ROWS -->
                                                        <?php foreach ($data as $row) { ?>
                                                            <div class="row mb-2 align-items-center"
                                                                data-type="<?= $row['type']; ?>"
                                                                data-itemtype="<?= $row['item_type']; ?>"
                                                                data-parent="<?= $row['parent_id']; ?>">

                                                                <div class="item-block">

                                                                    <input type="hidden" name="item_ids[]" value="<?= $row['pk_items_id']; ?>">

                                                                    <div>
                                                                        <select name="txt_types[]" class="form-control txt_types">
                                                                            <option value="1" <?= ($row['type'] == 1) ? 'selected' : '' ?>>Commercial</option>
                                                                            <option value="2" <?= ($row['type'] == 2) ? 'selected' : '' ?>>Non Commercial</option>
                                                                        </select>
                                                                    </div>

                                                                    <div>
                                                                        <select name="txt_item_type[]" class="form-control txt_item_type"></select>
                                                                    </div>

                                                                    <div>
                                                                        <select name="txt_product[]" class="form-control txt_product"></select>
                                                                    </div>

                                                                    <div>
                                                                        <input type="text" name="txt_item[]" class="form-control"
                                                                            value="<?= $row['fk_item_id']; ?>">
                                                                    </div>

                                                                    <div>
                                                                        <input type="number" name="txt_first_price[]" class="form-control"
                                                                            value="<?= $row['first_price']; ?>">
                                                                    </div>

                                                                    <div>
                                                                        <input type="number" name="txt_second_price[]" class="form-control"
                                                                            value="<?= $row['second_price']; ?>">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        <?php } ?>

                                                    </div>
                                                </div>




                                            <?php } else { ?>
                                                <label for="" class="control-label">Item Name</label>
                                                <div class="control-field">
                                                    <input type="text" class="form-control textOnly txt_item" name="txt_item"
                                                        id="txt_item" value="">
                                                    <span class="error" id="txt_item_error"></span>
                                                </div>
                                        </div>
                                        <div class="form-group commtype" style="display:none">
                                            <label for="" class="control-label">First Copy Price<span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <input type="number" class="form-control txt_first_copyprice"
                                                    name="txt_first_copyprice" id="txt_first_copyprice" maxlength="100" min="0"
                                                    placeholder="First Copy Price" required="required"
                                                    title="First Copy Price" aria-required="true" value="0">

                                                <span class="error" id="txt_first_copyprice-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group commtype" style="display:none">
                                            <label for="" class="control-label">Additional Copy Price <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <input type="number" class="form-control txt_second_addiprice"
                                                    name="txt_second_addiprice" id="txt_second_addiprice"
                                                    maxlength="100" min="0" placeholder="Additional Copy Price"
                                                    required="required" title="Additional Copy Price"
                                                    aria-required="true" value="0">
                                                <span class="error" id="txt_second_addiprice-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group noncommtype" style="display:none">
                                            <label for="" class="control-label noncomm4label">4 Color Price</label>
                                            <label for="" class="control-label othernoncomm4label" style="display:none"> Price </label>

                                            <div class="control-field">
                                                <input type="number" class="form-control txt_4color_price"
                                                    name="txt_4color_price" id="txt_4color_price" maxlength="100"
                                                    min="0" placeholder="Price" required="required"
                                                    title="4 Color Price" value="0" aria-required="true">

                                                <span class="error" id="txt_4color_price-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group noncommtype" style="display:none">

                                            <label for="" class="control-label noncomm7label">7 Color Price </label>
                                            <label for="" class="control-label othernoncomm4label" style="display:none"> Price </label>

                                            <div class="control-field">
                                                <input type="number" class="form-control txt_7color_price"
                                                    name="txt_7color_price" id="txt_7color_price" maxlength="100"
                                                    min="0" placeholder="Price " required="required"
                                                    title="7 Color Price" value="0" aria-required="true">
                                                <span class="error" id="txt_7color_price-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="mode" id="mode" value="EditItems">

                                </div>
                            <?php } ?>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <div class="row">
                                    <div class="col-lg-6 pr-lg-3">
                                        <button type="submit" id="edit_items"
                                            class="btn btn-success btn-lg">Update</button>
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
    $('.commtype').hide();
    $('.noncommtype').hide();
    $('#form_Items_edit').validate({
        // rules: {
        //     txt_types: {
        //         required: true
        //     },
        //     txt_item_type: {
        //         required: true
        //     },
        //     txt_item: {
        //         required: true
        //     },
        //     txt_product: {
        //         required: true
        //     },
        //     txt_first_copyprice: {
        //         required: true
        //     },
        //     txt_second_addiprice: {
        //         required: true
        //     },
        //     txt_4color_price: {
        //         required: true
        //     },
        //     txt_7color_price: {
        //         required: true
        //     },
        // },
        rules: {
            'txt_types[]': {
                required: true
            },
            'txt_item_type[]': {
                required: true
            },
            'txt_item[]': {
                required: true
            },
            'txt_product[]': {
                required: true
            }
        },
        submitHandler: function(form) {
            $("#edit_items").prop('disabled', true);

            var formData = new FormData($('#form_Items_edit')[0]);
            $.ajax({
                url: "modules/items/ajax_functions.php",
                data: formData,
                type: 'post',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: function() {
                    $("#cover").css("display", "block");
                },
                success: function(response) {
                    $("#cover").css("display", "none");
                    if (response == 1) {
                        swal({
                            title: "Success!",
                            text: "Items has been updated successfully!.",
                            type: "success",
                            timer: 7000,
                            buttons: false,
                        }).then(function() {
                            location.reload();
                            //  window.location.href = "index.php?erp=52&id=<?php echo $_GET['id']; ?>";
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
        // submitHandler: function(form) {

        //     $("#edit_items").prop('disabled', true);

        //     var formData = new FormData($('#form_Items_edit')[0]);

        //     $.ajax({
        //         url: "modules/items/ajax_functions.php",
        //         data: formData,
        //         type: 'post',
        //         success: function(response) {

        //             if (response == 1) {
        //                 swal("Success!", "Updated successfully!", "success")
        //                     .then(() => location.reload());
        //             } else {
        //                 swal("Failed!", "Error!", "error");
        //             }
        //         }
        //     });
        // },
        onkeyup: false
    });


    /*
    $('.txt_types').on('change', function() {
        var typsval = $(this).val();
        $('.commtype').hide();
        $('.noncommtype').hide();
    if(typsval == 1)
    {
        $('.commtype').show();
    }
    else{
        $('.noncommtype').show();
    }

    });*/
    var itemtype = <?php echo (isset($_GET['its'])) ? $_GET['its'] : 0; ?>;

    $('.txt_types').on('change', function() {
        $('.commtype').hide();
        $('.noncommtype').hide();
        var types = $(this).val();

        $('.txt_item_type').empty();
        if (types == 2) {
            $('.noncommtype').show();

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



                }
            });

            if (itemtype == 2) {

                getProductItems(0);
            }
        } else {
            $('.commtype').show();

            $('.txt_item_type').html('<option selected disabled>Select</option><option value="1">Product</option>');

        }
    });
    $('.txt_item_type').on('change', function() {
        getItemListing();

    });



    $('.txt_item_type').on('change', function() {
        var itemtypes = $(this).find("option:selected").val();
        if (itemtypes == 2) {
            $('.parentPro').show();

        } else {
            $('.parentPro').hide();
        }

    });

    function getProductItems(parentid) {
        $.ajax({
            url: "modules/items/ajax_functions.php",
            data: {
                'mode': 'getProductItemsListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {

                $('.txt_product').html('<option disabled>Select</option>');

                for (var i = 0; i < response[0].length; i++) {
                    $('.txt_product').append(
                        '<option value="' + response[0][i].pk_items_id + '">' +
                        response[0][i].fk_item_id +
                        '</option>'
                    );
                }

                // ✅ Set selected value AFTER loading
                $('.txt_product').val(parentid);
            }
        });
    }
    getItemedit();

    $(document).on('change', '.txt_item_type', function() {

        let block = $(this).closest('.item-block');
        let itemType = $(this).val();
        let productDropdown = block.find('.txt_product');

        if (itemType == 2) {

            $.ajax({
                url: "modules/items/ajax_functions.php",
                data: {
                    mode: 'getProductItemsListing'
                },
                type: 'post',
                dataType: 'json',
                success: function(response) {

                    productDropdown.empty();

                    response[0].forEach(function(row) {
                        productDropdown.append(
                            `<option value="${row.pk_items_id}">
                            ${row.fk_item_id}
                        </option>`
                        );
                    });

                }
            });

            productDropdown.show();
        } else {
            productDropdown.hide();
        }
    });

    $(document).ready(function() {

        $('.item-block').each(function() {

            let block = $(this);

            let type = block.closest('[data-type]').data('type');
            let itemType = block.closest('[data-itemtype]').data('itemtype');
            let parentId = block.closest('[data-parent]').data('parent');

            let typeDropdown = block.find('.txt_types');
            let itemTypeDropdown = block.find('.txt_item_type');
            let productDropdown = block.find('.txt_product');

            // ✅ STEP 1: SET TYPE
            typeDropdown.val(type);

            // ✅ STEP 2: LOAD ITEM TYPES BASED ON TYPE
            if (type == 2) {

                $.ajax({
                    url: "modules/products/ajax_functions.php",
                    data: {
                        mode: 'getTypesListing'
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(res) {

                        itemTypeDropdown.empty().append('<option>Select</option>');

                        res[0].forEach(function(row) {
                            itemTypeDropdown.append(
                                `<option value="${row.pk_types_id}">
                                ${row.types_name}
                            </option>`
                            );
                        });

                        // ✅ STEP 3: SET ITEM TYPE AFTER LOAD
                        itemTypeDropdown.val(itemType);

                        // ✅ STEP 4: LOAD PARENT IF NEEDED
                        if (itemType == 2) {

                            $.ajax({
                                url: "modules/items/ajax_functions.php",
                                data: {
                                    mode: 'getProductItemsListing'
                                },
                                type: 'post',
                                dataType: 'json',
                                success: function(res2) {

                                    productDropdown.empty();

                                    res2[0].forEach(function(row) {
                                        productDropdown.append(
                                            `<option value="${row.pk_items_id}">
                                            ${row.fk_item_id}
                                        </option>`
                                        );
                                    });

                                    // ✅ STEP 5: SET PARENT AFTER LOAD
                                    productDropdown.val(parentId);
                                    productDropdown.show();
                                }
                            });

                        } else {
                            productDropdown.hide();
                        }

                    }
                });

            } else {
                // COMMERCIAL
                itemTypeDropdown.html('<option value="1">Product</option>');
                itemTypeDropdown.val(1);
                productDropdown.hide();
            }

        });

    });

    function getItemedit() {
        var id = getQueryVariable('id');

        $.ajax({
            url: "modules/items/ajax_functions.php",
            data: {
                'mode': 'getItemedit',
                'id': id
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {

                let data = response[0];

                // 1️⃣ Set TYPE and trigger change
                $('#txt_types').val(data.type).trigger('change');

                // 2️⃣ Set item name
                $('#txt_item').val(data.fk_item_id);

                // 3️⃣ Prices
                if (data.type == 1) {
                    $('#txt_first_copyprice').val(data.first_price);
                    $('#txt_second_addiprice').val(data.second_price);
                } else {
                    $('#txt_4color_price').val(data.first_price);
                    $('#txt_7color_price').val(data.second_price);
                }

                // 4️⃣ Load ITEM TYPE then set value
                setTimeout(function() {

                    getTypesListingedit(data.item_type);

                    setTimeout(function() {

                        $('#txt_item_type').val(data.item_type).trigger('change');

                        // 5️⃣ If parent needed
                        if (data.item_type == 2) {

                            getProductItems(data.parent_id);

                            setTimeout(function() {
                                $('#txt_product').val(data.parent_id);
                            }, 500);

                            $('.parentPro').show();
                        } else {
                            $('.parentPro').hide();
                        }

                    }, 500);

                }, 500);
            }
        });
    }

    function getTypesListingedit(itemtype) {
        $('.commtype').hide();
        $('.noncommtype').hide();
        var types = $('.txt_types').find("option:selected").val();
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
                        $('.txt_item_type').val(itemtype).trigger('change');
                        getItemListing();

                        //   $('.txt_product_name_' + zz).chosen();
                        //    $('.txt_product_name_' + zz).trigger('chosen:updated');
                    }, 1000);


                }
            });
            $('.noncommtype').show();
        } else if (types == 1) {
            $('.commtype').show();
            $('.txt_item_type').html('<option  disabled>Select</option><option value="1" selected >Product</option>');

        }

    }

    $(document).on('change', '.txt_types', function() {

        let block = $(this).closest('.item-block');
        let type = $(this).val();

        let itemTypeDropdown = block.find('.txt_item_type');
        let productDropdown = block.find('.txt_product');

        itemTypeDropdown.empty();

        if (type == 2) {
            // NON COMMERCIAL

            $.ajax({
                url: "modules/products/ajax_functions.php",
                data: {
                    mode: 'getTypesListing'
                },
                type: 'post',
                dataType: 'json',
                success: function(response) {

                    itemTypeDropdown.append('<option>Select</option>');

                    response[0].forEach(function(row) {
                        itemTypeDropdown.append(
                            `<option value="${row.pk_types_id}">
                            ${row.types_name}
                        </option>`
                        );
                    });
                }
            });

        } else {
            // COMMERCIAL
            itemTypeDropdown.html('<option value="1">Product</option>');
        }
    });
    getItemListing();

    function getItemListing() {
        //alert('test');
        // var types = $('.txt_types').find("option:selected").val();


        $('.noncomm4label').hide();
        $('.noncomm7label').hide();
        $('.othernoncomm4label').hide();
        $('.othernoncomm7label').hide();
        $('.commtype').hide();




        var types = $('.txt_types').find("option:selected").val();
        console.log(types);

        if (types == 2) {
            var itemtype = $('.txt_item_type').find("option:selected").val();
            console.log(itemtype);
            // if(itemtype == 1 || itemtype == 2)
            if (itemtype == 4 || itemtype == 5) {
                $('.noncomm4label').show();
                $('.noncomm7label').show();
            } else {
                $('.othernoncomm4label').show();
                $('.othernoncomm7label').show();
            }
        } else {
            $('.commtype').show();
        }

        /*  if(types == 2){
  var valid = $('.txt_item_type').find("option:selected").val();
    var tables = $('.txt_item_type').find("option:selected").attr('data-tables');
    var pkid = $('.txt_item_type').find("option:selected").attr('data-pkid');
    
   
    $.ajax({
        url: "modules/items/ajax_functions.php",
        data: {
            'mode': 'getNonCommercialItemsListing','valid':valid,'tables':tables,'pkid':pkid
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
                $('.txt_item').html('<option selected disabled>SELECT '+tables+'</option>');
                $('.itemsdata').show();
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].id == '9999') {
                      //  type_tables, table_pk_id, orderid
                        $('.txt_item').append('<option value="' + response[0][i]
                            .id + '" data-cost="' + response[0][i].cost + '" data-items="2">' + response[0][i].name +
                            ' </option>');
                    } else {

                        $('.txt_item').append('<option value="' + response[0][i]
                            .id + '" data-cost="' + response[0][i].cost + '" data-items="1" >' + response[0][i].name +
                            '</option>');
                    }
                }
           
           
        },
        error: function(response) {
            console.log(response);
        }
    });
    }
    else if(types == 1){
        var pkid = $('.txt_item_type').find("option:selected").val();
    
   
    $.ajax({
        url: "modules/items/ajax_functions.php",
        data: {
            'mode': 'getCommercialItemsListing','pkid':pkid
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
                $('.txt_item').html('<option selected disabled>SELECT ONE</option>');
                $('.itemsdata').show();
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].id == '9999') {
                      //  type_tables, table_pk_id, orderid
                        $('.txt_item').append('<option value="' + response[0][i]
                            .pk_commprod_id + '" data-cost="' + response[0][i].firstcopy_price + '" data-items="2">' + response[0][i].product_name +
                            ' </option>');
                    } else {

                        $('.txt_item').append('<option value="' + response[0][i]
                            .pk_commprod_id + '" data-cost="' + response[0][i].firstcopy_price + '" data-items="1" >' + response[0][i].product_name +
                            '</option>');
                    }
                }
           
           
        },
        error: function(response) {
            console.log(response);
        }
    });
    }*/
    }

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

    .item-block {
        border-bottom: 1px solid #eee;
        padding-bottom: 8px;
    }

    .font-weight-bold {
        font-weight: 600;
    }

    .item-block input,
    .item-block select {
        width: 100%;
        height: 48px;
        /* ⬅️ bigger */
        font-size: 15px;
        padding: 8px 12px;
    }

    /* Better spacing */
    .item-block,
    .font-weight-bold {
        display: flex;
        flex-wrap: nowrap;
        /* 🔥 prevents wrapping */
        gap: 10px;
    }

    .item-block>div,
    .font-weight-bold>div {
        flex: 1;
        /* equal width columns */
        min-width: 150px;
        /* prevents squeezing */
    }
</style>