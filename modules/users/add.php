<?php error_reporting(0); ?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add New Users</li>
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
                            <label for="" class="control-label">Name <span class="color">*</span></label>
                            <div class="control-field">
                              <input type="text" class="form-control textOnly txt_customer_name" name="txt_customer_name" id="txt_customer_name" maxlength="50" placeholder="User Name" >
                              <span class="error" id="txt_customer_name_error"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">Password <span class="color">*</span></label>
                            <div class="control-field">
                              <input type="password" class="form-control textOnly txt_customer_pass" name="txt_customer_pass" id="txt_customer_pass" maxlength="30" placeholder="Password" >
                              <span class="error" id="txt_customer_name_error"></span>
                            </div>
                          </div>
                        
                        </div>
                        <div class="one-half-column pull-right">
                          
                                                   
                        <div class="form-group">
                            <label for="" class="control-label"> Email </label>
                            
                            <div class="control-field">
                              <input type="email" class="form-control txt_email" name="txt_email" id="txt_email" placeholder="example@sample.com" title="Email" onblur="validateEmail(this)">
                            </div>
                          </div>
                      
                 
                          <div class="form-group">
                            <label for="" class="control-label">Role <span class="color">*</span></label>
                            <div class="control-field">
                              <select class="form-control textOnly txt_customer_role" name="txt_customer_role" id="txt_customer_role" ><option value="">Select one</option>
                              <option value="1">Admin</option>
                              <option value="2">Booking</option>
                              <option value="3">Account</option>
                              <option value="4">Designer</option>
                              <option value="5">Printing</option>
                              
                              <span class="error" id="txt_customer_role_error"></span>
                            </div>
                          </div>
                         
                          
                         
                        </div>
                      <input type="hidden" name="mode" id="mode" value="AddUsers">
                    
                  </div>
                </div>
                
                <!-- /.card-body -->
                <div class=" text-right">
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
  <script type="text/javascript">


$('#form_customer_add').validate({
        rules: {
            txt_customer_name: { required: true },
            txt_customer_pass: { required: true },
            txt_customer_role: { required: true },
            // txt_customer_code:{required: true},
            // txt_customer_gst_no: { required: true },
        },
        submitHandler: function(form) {
            $('#form_customer_add :button[type="submit"]').prop('disabled', true);

            var formData = new FormData($('#form_customer_add')[0]);
            $.ajax({
                url: "modules/users/ajax_functions.php",
                data: formData,
                type: 'post',
                async: false,
                dataType: 'json',
                beforeSend: function() { $("#cover").css("display", "block"); },
                success: function(response) {
                    $("#cover").css("display", "none");
                    if (response == 1) {
                        swal({
                            title: "Success!",
                            text: "User has been added successfully!.",
                            type: "success",
                            timer: 2000,
                            buttons: false,
                        }).then(function() {
                            window.location.href = "index.php?erp=137";
                        });
                    } else {
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