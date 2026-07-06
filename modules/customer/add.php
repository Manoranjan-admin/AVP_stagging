<?php error_reporting(0); ?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add New Customer</li>
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
              <form class="form-horizontal theme-form" id="form_customer_add" novalidate="novalidate">
                <div class="card-body">
                  <div id="stepwizard">
                        <div class="one-half-column">
                          <div class="form-group">
                            <label for="" class="control-label">Code </label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_customer_code" name="txt_customer_code" id="txt_customer_code" placeholder="Auto"readonly="">
                              <span class="error" id="txt_customer_code_error"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">Name <span class="color">*</span></label>
                            <div class="control-field">
                              <input type="text" class="form-control textOnly txt_customer_name" name="txt_customer_name" id="txt_customer_name" maxlength="50" placeholder="Customer Name" >
                              <span class="error" id="txt_customer_name_error"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">GST No. </label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_customer_gst_no" name="txt_customer_gst_no" id="txt_customer_gst_no" maxlength="15" placeholder="Customer GST No." >
                              <span class="error" id="txt_customer_gst_no_error"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">Address 1 </label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_customer_address" name="txt_customer_address" id="txt_customer_address" maxlength="100" placeholder="Customer Address 1" >
                              <span class="error" id="txt_customer_address_error"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="control-label">Address 2</label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_customer_address_2" name="txt_customer_address_2" id="txt_customer_address_2" maxlength="100" placeholder="Customer Address 2" >
                              <span class="error" id="txt_customer_address_2_error"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="control-label">Address 3</label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_customer_address_3" name="txt_customer_address_3" id="txt_customer_address_3" maxlength="100" placeholder="Customer Address 3" >
                              <span class="error" id="txt_customer_address_3_error"></span>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="control-label">State </label>
                            <div class="control-field">
                              <select class="form-control txt_customer_state capallfields" id="txt_customer_state" name="txt_customer_state" ></select>
                              <input type="hidden" name="txt_customer_state_id" id="txt_customer_state_id" class="txt_customer_state_id">
                              <span class="error" id="txt_customer_state_error"></span>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="control-label">City </label>
                            <div class="control-field">
                              <select class="form-control txt_customer_city capallfields" style=" text-transform:uppercase !important;" id="txt_customer_city" name="txt_customer_city" ></select>
                              <input type="hidden" name="txt_customer_city_id" id="txt_customer_city_id" class="txt_customer_city_id">
                              <span class="error" id="txt_customer_city_error"></span>
                            </div>
                          </div>

                      
                        </div>
                        <div class="one-half-column pull-right">
                          
                          <div class="form-group">
                            <label for="" class="control-label"> Landline No </label>
                            <div class="control-field">
                              <input type="text" class="form-control numbersOnly txt_phone" placeholder="Landline No" name="txt_phone" id="txt_phone" maxlength="15" title="Mobile No">
                              <input type="hidden" name="txt_phone11" id="txt_phone11">
                              <p id="result11" class="display-none"></p>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="control-label"> Zip Code </label>
                            <div class="control-field">
                              <input type="number" class="form-control numbersOnly txt_fax" placeholder="Zip Code" name="txt_fax" id="txt_fax" maxlength="6" title="Zip Code">
                              <input type="hidden" name="txt_fax13" id="txt_fax13">
                              <p id="result13" class="display-none"></p>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="control-label"> Email </label>
                            
                            <div class="control-field">
                              <input type="email" class="form-control txt_email" name="txt_email" id="txt_email" placeholder="example@sample.com" title="Email" onblur="validateEmail(this)">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="control-label"> Contact Person </label>
                            <div class="control-field">
                              <input type="text" maxlength="50" class="form-control textOnly txt_contact_person" name="txt_contact_person" id="txt_contact_person" placeholder="Contact Person" title="Contact Person ">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="control-label">Website </label>
                            <div class="control-field">
                              <input type="text" maxlength="100" class="form-control txt_customer_website" name="txt_customer_website" id="txt_customer_website" placeholder="Customer Website" title="Customer Website">
                              <span class="error" id="txt_customer_website_error"></span>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="control-label">Alternate Number </label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_customer_alterno numbersOnly" name="txt_customer_alterno" maxlength="15" id="txt_customer_alterno" placeholder="Alternate Number" title="Alternate Number">
                              <span class="error" id="txt_customer_alterno_error"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">Mobile Number </label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_customer_mobno numbersOnly" name="txt_customer_mobno" maxlength="15" id="txt_customer_mobno" placeholder="Mobile Number" title="Mobile Number">
                              <span class="error" id="txt_customer_mobno_error"></span>
                            </div>
                          </div>
                        </div>
                      <input type="hidden" name="mode" id="mode" value="AddCustomer">
                    
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-success">Submit</button>
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
  <script type="text/javascript">
        getAllStates(0,0);

function getAllStates(stateid,cityid) {
        $.post("modules/customer/ajax_functions.php", {
                mode: 'getAllStates',
            },
            function(response, status) {
                if (response) {
                    var data = jQuery.parseJSON(response);
                    var stateNameOpt = '<option value=""  selected>SELECT STATE</option>';

                    for (var i in data) {
                        stateNameOpt = stateNameOpt + '<option data-stid='+ data[i]['pk_state_id'] +' value=' + data[i]['state_code'] + '>' + data[i]['state_name'] + '</option>';
                    }
                   $('#txt_customer_state').append(stateNameOpt);
                    $('#txt_customer_city').append('<option value=""  selected>SELECT CITY</option>');
                }

                setTimeout(function() {
                  $("#form_customer_update #txt_customer_state").find('option[value="' + stateid + '"]').attr("selected", true);

                    //$("#form_customer_update #txt_customer_state").val(stateid).trigger("change");
                    getCity(stateid,cityid);

                }, 1000);
            });
    }

    $("#txt_customer_state").change(function() {
      var stateId = $("#txt_customer_state").find(":selected").attr('data-stid');
      getCity(stateId,0);
    });
    
    $('#STD_Code').css("display", "none");

    $("#txt_customer_city").change(function() {
        $('#STD_Code').css("display", "block");
    });
    function getCity(stateId,cityid){
        if ($("#txt_customer_state").find(":selected").attr('data-stid') != '' && $("#txt_customer_state").find(":selected").attr('data-stid') != null) {
            var stateId = $("#txt_customer_state").find(":selected").attr('data-stid');
            $('#txt_customer_city').empty();
            $('#txt_customer_city').append('<option value=""  selected>SELECT CITY</option>');
            $.post("modules/customer/ajax_functions.php", {
                    mode: 'getAllCitiesByState',
                    state_id: stateId
                },
                function(data, status) {
                    var data = jQuery.parseJSON(data);
                    var cityNameOpt = '';
                    if (data.length > 0) {
                        var cityNameOpt = '';
                        for (var i in data) {

                            cityNameOpt = cityNameOpt + '<option value=' + data[i]['pk_city_id'] + '>' + data[i]['city'] + '</option>';
                        }
                        $('#txt_customer_city').append(cityNameOpt);
                    }
                    setTimeout(function() {
                    $("#form_customer_update #txt_customer_city").find('option[value="' + cityid + '"]').attr("selected", true);
                    $("#txt_customer_city").change();
                }, 1000);
                });
        } else {
            $('#txt_customer_city').empty();
            $('#txt_customer_city').append('<option value=""  selected>SELECT CITY</option>');
        }
    }
    $(".nav-link").removeClass("active");
    $(".nav-item").removeClass("menu-open");
    
    $(".master").addClass("menu-open");
    $(".master_customer .nav-link").addClass("active");
  </script>