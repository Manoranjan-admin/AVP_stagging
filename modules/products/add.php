<?php
//error_reporting(E_ALL);
include("classes/class_category.php");
include("classes/class_uom.php");
$obj_cat = new Category('','','','','','');
$obj_uom = new Uom('','','','','');
$getuom = $obj_uom->getalluom();
$uom_data=array();
while($uom_rows=mysqli_fetch_array($getuom)) {
  $uom_data[]=$uom_rows;
}

$getcate = $obj_cat->getallcategory();
$cat_data=array();
while($cat_rows=mysqli_fetch_array($getcate)) {
  $cat_data[]=$cat_rows;
}

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add New Product</li>
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
              <form class="form-horizontal theme-form" id="form_product_add" novalidate="novalidate">
                <div class="card-body">
                  <div id="stepwizard">
                        <div class="one-half-column">
                          <div class="form-group">
                            <label for="" class="control-label">Code </label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_product_code" name="txt_product_code" id="txt_product_code" placeholder="Auto" title="Code" readonly="">
                              <span class="error" id="txt_customer_code_error"></span>
                            </div>
                          </div>
                       <!--   <div class="form-group">
                            <label for="" class="control-label">Category <span class="color">*</span></label>
                            <div class="control-field">
                              <select class="form-control txt_input_material capallfields" id="txt_input_category" name="txt_input_category" style="display: none;">
                                <option value="0" selected="" disabled="">Select Input Product Category</option>
                                <?php
                                for ($i=0; $i < count($cat_data); $i++) { 
                                   ?>
                                   <option value="<?php echo $cat_data[$i]['pk_cat_id']; ?>"><?php echo $cat_data[$i]['cat_name']; ?></option>
                                   <?php
                                 } 
                                ?>
                                
                              </select>
                              <span class="error" id="txt_customer_code_error"></span>
                            </div>
                          </div>-->
                          <div class="form-group">
                            <label for="" class="control-label">Name <span class="color">*</span></label>
                            <div class="control-field">
                              <input type="text" class="form-control textOnly txt_product_name" name="txt_product_name" id="txt_product_name" maxlength="50" placeholder="Name" title="Name">
                              <span class="error" id="txt_product_name_error"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">4 Color Price<span class="color">*</span></label>
                            <div class="control-field">
                                 <input type="number" class="form-control txt_4color_price" name="txt_4color_price" id="txt_4color_price" maxlength="100" min="0" placeholder="4 Color Price" required="required" title="4 Color Price" value="">

                              <span class="error" id="txt_4color_price-error"></span>
                            </div>
                          </div>
                 

                          <div class="form-group">
                            <label for="" class="control-label">7 Color Price <span class="color">*</span></label>
                            <div class="control-field">
                              <input type="number" class="form-control txt_7color_price" name="txt_7color_price" id="txt_7color_price" maxlength="100" min="0" placeholder="7 Color Price " required="required" title="7 Color Price"  value="">
                              <span class="error" id="txt_7color_price-error"></span>
                            </div>
                          </div>
                       <!--   <div class="form-group">
                            <label for="" class="control-label">Inner Sheet </label>
                            <div class="control-field">
                              <input type="text" class="form-control textOnly txt_inner_sheet" name="txt_inner_sheet" id="txt_inner_sheet" maxlength="50" placeholder="Inner Sheet " title="Inner Sheet ">
                              <span class="error" id="txt_inner_sheet_error"></span>
                            </div>
                          </div>  <div class="form-group">
                            <label for="" class="control-label">Special Effects </label>
                            <div class="control-field">
                              <input type="text" class="form-control textOnly txt_special_effects" name="txt_special_effects" id="txt_special_effects" maxlength="50" placeholder="Special Effects" title="Special Effects">
                              <span class="error" id="ttxt_special_effects_error"></span>
                            </div>
                          </div>
                          </div>  <div class="form-group">
                            <label for="" class="control-label">Size </label>
                            <div class="control-field">
                              <input type="text" class="form-control textOnly txt_size" name="txt_size" id="txt_size" maxlength="50" placeholder="Size" title="Size">
                              <span class="error" id="txt_size_error"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">UOM <span class="color"> *</span></label>
                            <div class="control-field">
                              <select class="form-control txt_uom" name="txt_uom" id="txt_uom" required data-placeholder="SELECT UOM">
                                <option value="0" selected="" disabled="">Select UOM</option>
                                <?php
                                for ($i=0; $i < count($uom_data); $i++) { 
                                  ?>
                                  <option value="<?php echo $uom_data[$i]['pk_uom_id']; ?>"><?php echo $uom_data[$i]['uom_name']; ?></option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="control-label">CGST</label>
                            <div class="control-field">
                              <input type="number" class="form-control txt_product_cgst" name="txt_product_cgst" id="txt_product_cgst" maxlength="100" min="0" placeholder="CGST" title="CGST">
                              <span class="error" id="txt_product_cgst"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="control-label">SGST</label>
                            <div class="control-field">
                              <input type="number" class="form-control txt_product_sgst" name="txt_product_sgst" id="txt_product_sgst" maxlength="100" min="0" placeholder="SGST" title="SGST">
                              <span class="error" id="txt_product_sgst"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="control-label">IGST</label>
                            <div class="control-field">
                              <input type="number" class="form-control txt_product_igst" name="txt_product_igst" id="txt_product_igst" maxlength="100" min="0" placeholder="IGST" title="Product IGST">
                              <span class="error" id="txt_product_igst"></span>
                            </div>
                          </div>-->

                       

                          <div class="form-group">
                            <label for="" class="control-label">Description</label>
                            <div class="control-field">
                              <textarea class="form-control" name="txt_product_description" id="txt_product_description"></textarea>
                              <span class="error" id="txt_product_description"></span>
                            </div>
                          </div>
                      </div>
                      <input type="hidden" name="mode" id="mode" value="AddProduct">
                    
                  </div>
                </div>
                <!-- /.card-body -->
               <div class="card-footer text-right">
						<div class="row">
							<div class="col-lg-6 pr-lg-3">
							<button type="submit" class="btn btn-success btn-lg">Submit</button>
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
    $('#form_product_add').validate({
            rules: {
                txt_input_category: { required: true },
                txt_product_name: { required: true },
              /*  txt_inner_sheet: { required: true },
                txt_special_effects: { required: true },
                txt_size: { required: true },*/
                txt_uom: { required: true },
                txt_product_price: { required: true },
            },
            submitHandler: function(form) {
                var formData = new FormData($('#form_product_add')[0]);
                $.ajax({
                    url: "modules/products/ajax_functions.php",
                    data: formData,
                    type: 'post',
                    async: false,
                    dataType: 'json',
                    beforeSend: function() { $("#cover").css("display", "block"); },
                    success: function(response) {
                        $("#cover").css("display", "none");
                        if(response == 1){
                            swal({
                              title: "Success!",
                              text: "Product has been added successfully!.",
                              type: "success",
                              timer: 1000,
                              buttons: false,
                            }).then(function() {
                                window.location.href = "index.php?erp=5";
                            });
                        }
                        else{
                            swal("Failed!", "Something went wrong, Try again!", "error");
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
    $("#txt_product_sgst").keyup(function(){
    var current = $(this).val();
    if(parseFloat(current) > 0){
      $("#txt_product_igst").val("");
    }
  })
  $("#txt_product_cgst").keyup(function(){
    var current = $(this).val();
    if(parseFloat(current) > 0){
      $("#txt_product_igst").val("");
    }
  })
  $("#txt_product_igst").keyup(function(){
    var current = $(this).val();
    if(parseFloat(current) > 0){
      $("#txt_product_sgst").val("");
      $("#txt_product_cgst").val("");
    }
  })
  </script>
  <script>
  $('#txt_input_category').select2();
  $('#txt_uom').select2();
  $(function () {
    // Summernote
    $('#txt_product_description').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
  $(".nav-link").removeClass("active");
  $(".nav-item").removeClass("menu-open");
    
  $(".master").addClass("menu-open");
  $(".master_product .nav-link").addClass("active");
</script>
<style type="text/css">
  .theme-form .control-field {
    /*display: flex;*/
}
.select2 {
      width: 100% !important;
}
</style>