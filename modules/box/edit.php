<?php error_reporting(0); 
include("classes/class_box.php");
$obj_cat = new Box('','','','','','','');
$obj_cat->setid($_GET['id']); 
$getcate = $obj_cat->geteditBox();
$rows=mysqli_fetch_array($getcate)
?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Box</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Box</li>
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
              <form class="form-horizontal theme-form" id="form_box_Edit" novalidate="novalidate">
                <div class="card-body">
                  <div id="stepwizard">
                        <div class="one-half-column">
                          <!--<div class="form-group">
                            <label for="" class="control-label">Code </label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_box_id" name="txt_box_id" id="txt_box_id" placeholder="Auto" title=" Code" readonly="" value="<?php echo $rows['pk_size_id']; ?>">
                              <span class="error" id="txt_box_id_error"></span>
                            </div>
                          </div>-->
                          <input type="hidden" class="form-control txt_box_id" name="txt_box_id" id="txt_box_id" value="<?php echo $rows['pk_box_id']; ?>">

                          <div class="form-group">
                            <label for="" class="control-label">Name <span class="color">*</span></label>
                            <div class="control-field">
                              <input type="text" class="form-control textOnly txt_name" name="txt_name" id="txt_name" maxlength="50" placeholder=" Name" title=" Name" value="<?php echo $rows['name']; ?>">
                              <span class="error" id="txt_name_error"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">Cost <span class="color">*</span></label>
                            <div class="control-field">
                              <input type="number" class="form-control textOnly txt_cost" name="txt_cost" id="txt_cost" maxlength="50" placeholder=" Cost" title=" Cost" value="<?php echo $rows['cost']; ?>">
                              <span class="error" id="txt_cost_error"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">Description</label>
                            <div class="control-field">
                              <textarea class="form-control" name="txt_description" id="txt_description"><?php echo $rows['description']; ?></textarea>
                              <span class="error" id="txt_description"></span>
                            </div>
                          </div>
                        </div>
                      <input type="hidden" name="mode" id="mode" value="EditBox">
                    
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
  <script src="assets/dist/js/custom/customer.js?version=<?php echo md5_file('js/custom/customer.js');?>"></script>
  <script> 
  $(function () {
    // Summernote
    $('#txt_description').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })

  $(".nav-link").removeClass("active");
  $(".nav-item").removeClass("menu-open");
    
  $(".master").addClass("menu-open");
  $(".master_box.nav-link").addClass("active");
</script>