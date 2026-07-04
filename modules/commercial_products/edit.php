<?php 
error_reporting(0); 
include("classes/class_commercialproduct.php");
$obj_product = new CommercialProduct('','','','','','','','','','','','','','');
$obj_product->setpk_product_id($_GET['id']);
$getproduct = $obj_product->Editproduct();
$rows=mysqli_fetch_array($getproduct);

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
            <h1>Edit Commercial Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
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
              <form class="form-horizontal theme-form" id="form_product_edit" novalidate="novalidate">
                <div class="card-body">
                  <div id="stepwizard">
                        <div class="one-half-column">
                          <div class="form-group">
                            <label for="" class="control-label">Code </label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_product_code" name="txt_product_code" id="txt_product_code" placeholder="Auto" title="Code" readonly="" value="<?php echo $rows['pk_commprod_id'] ?>">
                              <span class="error" id="txt_customer_code_error"></span>
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label for="" class="control-label">Name <span class="color">*</span></label>
                            <div class="control-field">
                              <input type="text" class="form-control textOnly txt_product_name" name="txt_product_name" id="txt_product_name" maxlength="50" placeholder="Product Name" title="Product Name" value="<?php echo $rows['product_name'] ?>">
                              <span class="error" id="txt_product_name_error"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="control-label">First Copy Price<span class="color">*</span></label>
                            <div class="control-field">
                                 <input type="number" class="form-control txt_first_price" name="txt_first_price" id="txt_first_price" maxlength="100" min="0" placeholder="First Copy Price" required="required" title="First Copy Price" value="<?php echo $rows['firstcopy_price'] ?>">

                              <span class="error" id="txt_first_price-error"></span>
                            </div>
                          </div>
                 

                          <div class="form-group">
                            <label for="" class="control-label">Additional Copy Price <span class="color">*</span></label>
                            <div class="control-field">
                              <input type="number" class="form-control txt_additional_price" name="txt_additional_price" id="txt_additional_price" maxlength="100" min="0" placeholder="Additional Copy Price" required="required" title="Additional Copy Price" value="<?php echo $rows['additionalcopy_price'] ?>">
                              <span class="error" id="txt_additional_price-error"></span>
                            </div>
                          </div>
                   

                        

                          <div class="form-group">
                            <label for="" class="control-label">Description</label>
                            <div class="control-field">
                              <textarea class="form-control" name="txt_product_description" id="txt_product_description"><?php echo $rows['product_desc'] ?></textarea>
                              <span class="error" id="txt_product_description"></span>
                            </div>
                          </div>
                      </div>
                      <input type="hidden" name="mode" id="mode" value="EditProduct">
                    
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
						<div class="row">
							<div class="col-lg-6 pr-lg-3">
							<button type="submit" id="cpedit_product" class="btn btn-success btn-lg">Submit</button>
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
    $('#form_product_edit').validate({
            rules: {
                txt_product_name: { required: true },
                txt_product_price: { required: true },
            },
            submitHandler: function(form) {
              $("#cpedit_product").prop('disabled', true);

                var formData = new FormData($('#form_product_edit')[0]);
                $.ajax({
                    url: "modules/commercial_products/ajax_functions.php",
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
                              text: "Product has been updated successfully!.",
                              type: "success",
                              timer: 1000,
                              buttons: false,
                            }).then(function() {
                                window.location.href = "index.php?erp=49&id=<?php echo $_GET['id']; ?>";
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
  $(".master_commproduct .nav-link").addClass("active");

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
<style type="text/css">
  .theme-form .control-field {
    /*display: flex;*/
}
.select2 {
      width: 100% !important;
}
</style>