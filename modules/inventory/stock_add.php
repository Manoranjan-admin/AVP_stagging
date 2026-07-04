<?php
//error_reporting(E_ALL);

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php if ($_GET['typ'] == 1): ?>
                        <h1>Add Commercial Stocks</h1>
                    <?php else: ?>
                        <h1>Add Non-Commercial Stocks</h1>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <?php if ($_GET['typ'] == 1): ?>
                            <li class="breadcrumb-item active">Add Commercial Stocks</li>
                        <?php else: ?>
                            <li class="breadcrumb-item active">Add Non-Commercial Stocks</li>
                        <?php endif; ?>
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
                                                    id="txt_types" readonly disabled>
                                                    <option>Select one </option>
                                                    <option <?php if ($_GET['typ'] == 1) {
                                                                echo "selected=selected";
                                                            } ?> value="1">Commercial</option>
                                                    <option <?php if ($_GET['typ'] == 2) {
                                                                echo "selected=selected";
                                                            } ?> value="2">Non Commercial</option>
                                                </select>
                                                <span class="error" id="txt_types_error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Item Type<span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <select class="form-control textOnly txt_item_type" name="txt_item_type"
                                                    id="txt_item_type" readonly disabled>
                                                    <option>Select one </option>

                                                </select>


                                                <span class="error" id="txt_item_type-error"></span>
                                            </div>
                                        </div>
                                        <?php if (isset($_GET['its']) && $_GET['its'] == 2) { ?>
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
                                                <?php if (isset($_GET['items_id'])): ?>
                                                    <select class="form-control textOnly txt_item" name="txt_item"
                                                        id="txt_item" readonly disabled>
                                                        <option selected diabled>Select one </option>
                                                    </select>
                                                <?php else: ?>
                                                    <select class="form-control textOnly txt_item" name="txt_item"
                                                        id="txt_item">
                                                        <option selected diabled>Select one </option>
                                                    </select>
                                                <?php endif; ?>
                                                <span class="error" id="txt_item_error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txt_stock" class="control-label">Stocks<span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <input type="number" class="form-control textOnly txt_stock"
                                                    name="txt_stock" id="txt_stock" value="0" min="1">
                                                <span class="error" id="txt_stock_error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txt_stock_notes" class="control-label">Stock Notes</label>
                                            <div class="control-field">
                                                <textarea name="txt_stock_notes" class="form-control txt_stock_notes" id="txt_stock_notes" placeholder="Type here.." rows="4" style="height:auto !important"></textarea>
                                                <span class="error" id="txt_stock_notes_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="mode" id="mode" value="addStocks">

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <div class="row">
                                    <div class="col-lg-6 pr-lg-3">
                                        <button type="submit" id="add_stock_btn"
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
    $(document).ready(function() {
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
                txt_stock: {
                    required: true
                },
                txt_stock_notes: {
                    maxlength: 250
                },
            },
            submitHandler: function(form) {
                var formData = new FormData(form);
                var created_by = <?= $_SESSION['user_id'] ?? null ?>;
                if (created_by) {
                    formData.set('created_by', created_by)
                } else {
                    location.reload();
                }
                formData.set('stock_id', <?= $_GET['stock_id'] ?? 0 ?>)

                $.ajax({
                    url: "modules/inventory/inventory_ajax.php",
                    data: formData,
                    type: 'post',
                    async: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $("#cover").css("display", "block");
                        $("#add_stock_btn").attr("disabled", true);
                    },
                    success: function(response) {
                        $("#cover").css("display", "none");
                        if (response == 1) {
                            swal({
                                title: "Success!",
                                text: "Stock has been added successfully!.",
                                type: "success",
                                timer: 1000,
                                buttons: false,
                            }).then(function() {
                                // window.location.href = "index.php?erp=51&typ=<?php echo $_GET['typ']; ?>&its=<?php echo $_GET['its']; ?>";
                                history.back();
                            });
                        } else {
                            swal("Failed!", "Something went wrong or Already exist, Try again!", "error");
                        }
                    },
                    complete: function() {
                        setTimeout(() => {
                            $("#add_stock_btn").attr("disabled", false);
                        }, 5000);
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
                        $('.txt_item_type').find('option[value="' + itemtype + '"]').attr("selected", true);
                    }, 1000);



                }
            });

            $('.noncommtype').show();
            if (itemtype == 2) {
                getProductItems();
            }

        } else {
            $('.commtype').show();

            $('.txt_item_type').html('<option selected disabled>Select</option><option value="1">Product</option>');
            setTimeout(function() {
                $('.txt_item_type').find('option[value="' + itemtype + '"]').attr("selected", true);
            }, 1000);
        }

        $("#txt_item").html("<option selected disabled>Loading...</option>")
        $("#txt_item").trigger("change")
        setTimeout(() => {
            getAllItems()
        }, 2000);



        $('.txt_item_type').on('change', function() {
            var itemtypes = $(this).find("option:selected").val();
            if (itemtypes == 2) {
                $('.parentPro').show();

            } else {
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

    $('#txt_types, #txt_item_type').on('change', function() {
        getAllItems();
    });


    function getAllItems() {
        const type = $('#txt_types').val();
        const item_type = $('#txt_item_type').val();

        // alert(type + "||" + item_type)

        if (type && item_type) {

            $.ajax({
                url: "modules/inventory/inventory_ajax.php",
                type: 'POST',
                data: {
                    mode: 'getAllItems',
                    type: type,
                    item_type: item_type
                },
                dataType: "json",
                async: false,
                // beforeSend: () => {
                //     $("#txt_item").html("<option selected disabled>Loading...</option>")
                //     $("#txt_item").trigger("change")
                // },
                success: function(response) {
                    $("#txt_item").empty();
                    $("#txt_item").append("<option selected disabled>Select one </option>")
                    response.forEach((row) => {
                        var items_id = <?= $_GET['items_id'] ?? 0 ?>;
                        const isSelected = items_id == row.pk_items_id ? "selected" : "";
                        $("#txt_item").append(`<option value="${row.pk_items_id}" ${isSelected}>${row.fk_item_id}</option>`)
                    })

                    $("#txt_item").trigger("change")
                }

            })
        }
    }


    function getProductItems() {

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
        if (types == 2) {
            var itemtype = $('.txt_item_type').find("option:selected").val();

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

    }
    $(".nav-link").removeClass("active");
    $(".nav-item").removeClass("menu-open");

    $(".items").addClass("menu-open");
    $(".master_items .nav-link").addClass("active");
</script>
<style type="text/css">
    /* .theme-form .control-field {
        display: flex;
    } */

    .select2 {
        width: 100% !important;
    }
</style>