<?php error_reporting(0); ?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New UOM</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add New UOM</li>
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
              <form class="form-horizontal theme-form" id="form_uom_add" novalidate="novalidate">
                <div class="card-body">
                  <div id="stepwizard">
                        <div class="one-half-column">
                          <div class="form-group">
                            <label for="" class="control-label">Code </label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_customer_code" name="txt_customer_code" id="txt_customer_code" placeholder="Auto" title="Customer Code" readonly="">
                              <span class="error" id="txt_customer_code_error"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">Name <span class="color">*</span></label>
                            <div class="control-field">
                              <input type="text" class="form-control textOnly txt_uom_name" name="txt_uom_name" id="txt_uom_name" maxlength="50" placeholder="UOM" title="UOM">
                              <span class="error" id="txt_customer_name_error"></span>
                            </div>
                          </div>
                        </div>
                      <input type="hidden" name="mode" id="mode" value="AddUOM">
                    
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

  $(".nav-link").removeClass("active");
  $(".nav-item").removeClass("menu-open");
    
  $(".master").addClass("menu-open");
  $(".master_uom .nav-link").addClass("active");
</script>