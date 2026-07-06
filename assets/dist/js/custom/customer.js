$(document).ready(function() {

    $('.cover').css('display', 'none');
    /* Needed for Model */
    var customer = [];

    getAllCustomer();
    // getAllStates();
    //getAllCustomerGroup();

    var gettab = getQueryVariable('tab');
    if (gettab && gettab == 2) {
        $('a[href="#customer"]').parent('li').removeClass('active');
        $('a[href="#pricing"]').trigger("click");
    }
    $(document).ajaxStart(function() {
        $('.cover').css('display', 'block');
    });

    $(document).ajaxStop(function() {
        $('.cover').css('display', 'none');
    });

    //  $('#txt_customer_state').select2();
    // $('#txt_customer_city').select2();
    $('#txt_customer_group').select2();



    // setTimeout(function(){
    // 	$("#taskNames").select2("val", data.Task_Id);
    // 	//$("#taskStatus").select2("val",data.Status);

    // },200);

    /*function getAllStates() {
        $.post("modules/customer/ajax_functions.php", {
                mode: 'getAllStates',
            },
            function(response, status) {
                if (response) {
                    var data = jQuery.parseJSON(response);
                    var stateNameOpt = '<option value="" disabled selected>SELECT STATE</option>';

                    for (var i in data) {
                        stateNameOpt = stateNameOpt + '<option value=' + data[i]['pk_state_id'] + '>' + data[i]['state_name'] + '</option>';
                    }
                    $('#txt_customer_state').append(stateNameOpt);
                    $('#txt_customer_city').append('<option value="" disabled selected>SELECT CITY</option>');
                }
            });
    }

    $("#txt_customer_state").change(function() {
        if ($("#txt_customer_state").val() != '' && $("#txt_customer_state").val() != null) {
            var stateId = $("#txt_customer_state").val();
            $('#txt_customer_city').empty();
            $('#txt_customer_city').append('<option value="" disabled selected>SELECT CITY</option>');
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

                });
        } else {
            $('#txt_customer_city').empty();
            $('#txt_customer_city').append('<option value="" disabled selected>SELECT CITY</option>');
        }
    });
*/
    $('#form_customer_add').validate({
        rules: {
            txt_customer_name: { required: true },
            // txt_customer_code:{required: true},
            // txt_customer_gst_no: { required: true },
        },
        submitHandler: function(form) {
            $('#form_customer_add :button[type="submit"]').prop('disabled', true);

            var formData = new FormData($('#form_customer_add')[0]);
            $.ajax({
                url: "modules/customer/ajax_functions.php",
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
                            text: "Customer has been added successfully!.",
                            type: "success",
                            timer: 2000,
                            buttons: false,
                        }).then(function() {
                            window.location.href = "index.php?erp=1";
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

    // Model Functions End

    /*var chnd = getQueryVariable('erp');
    var cmnu = getQueryVariable('mnu');*/
    /* if ((chnd == pageAdd) && (cmnu == menuID)) {


         // callfunction();
         $.validator.setDefaults({ ignore: ":hidden:not(select)" });
         $('#form_customer_add').validate({
             rules: {
                 txt_customer_name: { required: true },
                 // txt_customer_code:{required: true},
                 txt_customer_gst_no: { required: true },
             },
             submitHandler: function(form) {
                 var formData = new FormData($('#form_customer_add')[0]);
                 $.ajax({
                     url: "modules/customer/ajax_functions.php",
                     data: formData,
                     type: 'post',
                     async: false,
                     dataType: 'json',
                     beforeSend: function() { $("#cover").css("display", "block"); },
                     success: function(response) {
                         $("#cover").css("display", "none");
                         if (response == 1) {
                             $("#form_customer_add").trigger('reset');
                             localStorage.setItem("addcustomerstatus", response);
                             window.location.href = "?hnd=" + pageList + "&mnu=" + menuID;
                         } else if (response == 2) {
                             AlertFun('Error', 'Customer Code Already Exist.', 'error');
                         } else if (response == 0) {
                             AlertFun('Error', 'Customer Name Already Exist.', 'error');
                         } else if (response == 4) {
                             $('#txt_user_name').val('');
                             $("#cover").css("display", "none");
                             AlertFun('Error', 'User Name Already Exist.', 'error');
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

     }*/

    /*var getaddstatus = localStorage.getItem("addcustomerstatus");
    if (getaddstatus == 1) {
        AlertFun('Success', 'Customer Added Successfully.', 'success');
        localStorage.setItem("addcustomerstatus", "");
    }

    $(".togglesort").click(function() {
        $(".alphabet").slideToggle("slow");
    });

    $("button#delete_selected").click(function() {
        $("input[name='checkboxName']:checked").each(function() {
            customer.push($(this).val());
            console.log($(this).val());
        });
        if (customer.length > 1) {
            window.location.href = "?hnd=" + pageDelete + "&mnu=" + menuID;
            localStorage.setItem("cusdeleteRecords", customer);
        } else {
            swal('Warning', 'Please Select Minimum 2 Rows!', 'warning');
            customer = [];
        }
    });*/

    //var hnd = getQueryVariable('hnd');
    //var mnu = getQueryVariable('mnu');
    //var id = getQueryVariable('id');
    /* if ((hnd == pageEdit) || (hnd == pageView) && (mnu == menuID) && (id)) {

         $.validator.setDefaults({ ignore: ":hidden:not(select)" });
         $('#form_customer_update').validate({
             rules: {
                 txt_customer_name: { required: true },
                 txt_customer_gst_no: { required: true },
             },
             submitHandler: function(form) {
                 var formData = new FormData($('#form_customer_update')[0]);
                 $.ajax({
                     url: "modules/customer/ajax_functions.php",
                     data: formData,
                     type: 'post',
                     async: false,
                     dataType: 'json',
                     beforeSend: function() { $("#cover").css("display", "block"); },
                     success: function(response) {
                         $("#cover").css("display", "none");
                         if (response == 0) {
                             $("#form_customer_update").trigger('reset');
                             localStorage.setItem("updatecustomerstatus", "1");
                             window.location.href = "?hnd=" + pageList + "&mnu=" + menuID;
                             getAllCustomer();
                         } else if (response == 1) {
                             $('#txt_customer_code').val('');
                             $("#cover").css("display", "none");
                             AlertFun('Error', 'Customer Code already exist. Kindly change it.', 'error');
                         } else if (response == 2) {
                             $('#txt_customer_name').val('');
                             $("#cover").css("display", "none");
                             AlertFun('Error', 'Customer Name already exist. Kindly change it.', 'error');
                         } else if (response == 3) {
                             $('#txt_search_name').val('');
                             $("#cover").css("display", "none");
                             AlertFun('Error', 'Customer Search Name already exist. Kindly change it', 'error');
                         } else if (response == 4) {
                             $('#txt_user_name').val('');
                             $("#cover").css("display", "none");
                             AlertFun('Error', 'User Name Already Exist.', 'error');
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
     }*/

    /*if (id) {

        

    }

   /* var dhnd = getQueryVariable('hnd');
    var dmnu = getQueryVariable('mnu');
    if ((dhnd == pageDelete) && (dmnu == menuID)) {
        var did = localStorage.getItem("cusdeleteRecords");
        $('.delete_id').val(did);
        var vars = did.split(",");
        for (var i = 0; i < vars.length; i++) {
            $.ajax({
                url: "modules/customer/ajax_functions.php",
                data: { 'id': vars[i], 'mode': 'EditCustomer' },
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    for (var j = 0; j < response[0].length; j++) {
                        $('.list-delete').append("<div class='row'><div class='one-half-column'><div class='form-group'><label class='control-label'><b>Customer Code</b></label><div class='control-field'><i>" + response[0][0].cus_code + "</i></div></div></div><div class='one-half-column pull-right'><div class='form-group'><label class='control-label'><b>Customer Name</b></label><div class='control-field'><i>" + response[0][0].cus_name + "</i></div></div></div></div>");
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    }
*/
    /* delete cancel action */
    $("button.btn-cancel").click(function() {
        localStorage.setItem("cusdeleteRecords", "");
        window.location.href = "?hnd=" + pageList + "&mnu=" + menuID;
    });

    /* delete form action */

    $("button.btn-submit").click(function() {
        var did = $('.delete_id').val();
        var vars = did.split(",");
        for (var i = 0; i < vars.length; i++) {
            $.ajax({
                url: "modules/customer/ajax_functions.php",
                data: { 'id': vars[i], 'mode': 'BulkDeleteCustomer' },
                type: 'post',
                async: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response == '1') {
                        localStorage.setItem("cusdeleteRecords", "");
                        getAllCustomer();
                        window.location.href = "?hnd=" + pageList + "&mnu=" + menuID;
                        localStorage.setItem("cusbulkdeletestatus", "1");
                    } else {
                        AlertFun('Failed', 'Customer Deleted Failed.', 'error');
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }

    });

    var bds = localStorage.getItem("cusbulkdeletestatus");
    if (bds == '1') {
        AlertFun('Success', 'Selected Customer has been deleted successfully.', 'success');
        localStorage.setItem("cusbulkdeletestatus", "");
    }

    var cus_status = localStorage.getItem("updatecustomerstatus");
    if (cus_status) {
        AlertFun('Success', 'Customer updated successfully.', 'success');
        localStorage.setItem("updatecustomerstatus", "");
    }

});

/*function InitializeTelInput(Phone,IPhone,RPhone){
	var TempVal = intlTelInput(Phone, {
		initialCountry: "hk",
		preferredCountries: ['cn', 'ru', 'hk'],
	});
	return TempVal;
}*/

function FocusTelInput(Ini, Phone, IPhone, RPhone) {

    Phone.addEventListener("focus", function() {
        RPhone.textContent = "";
    }, false);

    Phone.addEventListener("focusout", function() {
        RPhone.textContent = "";
        var num = Ini.getNumber(),
            valid = Ini.isValidNumber();
        RPhone.textContent = "Number: " + num + ", valid: " + valid;
        if (!valid) {
            IPhone.value = '';
            Ini.telInput.className = 'form-control numbersOnly error';
        } else {
            IPhone.value = num;
            Ini.telInput.className = 'form-control numbersOnly';
        }
    }, false);

}

function DeleteCustomer(cus_id) {
    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#27ad1f",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "modules/customer/ajax_functions.php",
                    data: { "id": cus_id, "mode": "DeleteCustomer" },
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        if (response == 1) {
                            swal("Deleted!", "Your data has been deleted!", "success");
                            location.reload();
                            //getAllCustomer();	
                        } else if (response == 0) {
                            swal('Success', 'Customer Deletion Failed.', 'success');
                            location.reload();
                        }
                    },
                    error: function(response) { console.log(response); }
                });
            } else {
                swal("Cancelled", "Customer is safe!", "error");
            }
        });
}


function getAllCustomer() {

    var table = $("#cus_datatable").DataTable({
        "order": [],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "columnDefs": [{
                "targets": [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
                "visible": false,
                "searchable": false
            },

        ],
        dom: 'Blfrtip',
        buttons: [{
            extend: 'excel',
            title: "Raaja Magnetics ERP-Customer List_" + new Date().getDate() + "-" + (new Date().getMonth() + 1) + "-" + new Date().getFullYear(),
            exportOptions: {
                columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],

            },



            extend: 'excelHtml5',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                var numrows = 3;
                var clR = $('row', sheet);

                //update Row
                clR.each(function() {
                    var attr = $(this).attr('r');
                    var ind = parseInt(attr);
                    ind = ind + numrows;
                    $(this).attr("r", ind);
                });

                // Create row before data
                $('row c ', sheet).each(function() {
                    var attr = $(this).attr('r');
                    var pre = attr.substring(0, 1);
                    var ind = parseInt(attr.substring(1, attr.length));
                    ind = ind + numrows;
                    $(this).attr("r", pre + ind);
                });

                function Addrow(index, data) {
                    msg = '<row r="' + index + '">'
                    for (i = 0; i < data.length; i++) {
                        var key = data[i].key;
                        var value = data[i].value;
                        msg += '<c t="inlineStr" r="' + key + index + '">';
                        msg += '<is>';
                        msg += '<t>' + value + '</t>';
                        msg += '</is>';
                        msg += '</c>';
                    }
                    msg += '</row>';
                    return msg;
                }

                //insert
                var r1 = Addrow(1, [{ key: 'A', value: '' }, { key: 'B', value: '' }]);
                var r2 = Addrow(2, [{ key: 'C', value: 'Raaja Magnetics ERP-Customer List' }]);
                var r3 = Addrow(3, [{ key: 'D', value: 'Date:' + new Date().getDate() + '-' + (new Date().getMonth() + 1) + '-' + new Date().getFullYear() }]);
                var r4 = Addrow(4, [{ key: 'D', value: '' }]);

                sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + r4 + sheet.childNodes[0].childNodes[1].innerHTML;
            }
        }],
        initComplete: function() {
            var $buttons = $('.dt-buttons').hide();
            $('#excel').on('click', function() {
                var btnClass = $(this).attr('id') ?
                    '.buttons-' + $(this).attr('id') :
                    null;
                if (btnClass) $buttons.find(btnClass).click();
            })
        },
        "serverSide": true,
        "serverMethod": 'post',
        "ajax": {
            "url": "modules/customer/ajax_functions.php",
            "data": function(d) {
                d.myKey = $('.alphabet .active').text();
                d.mode = 'getAllCustomers';
            },

            "dataSrc": function(response1) {

                var response = response1.data;
                for (var i = 0; i < response.length; i++) {


                    response[i][0] = "<span style='text-align:center;'><input type='checkbox' class='check' name='checkboxName' id='check' value=" + response[i].pk_cus_id + "></span>";
                    response[i][1] = '<span align="center" width="30"><a href="?hnd=' + pageEdit + '&mnu=' + menuID + '&id=' + response[i].pk_cus_id + '" title="Edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>&nbsp;</span><button class="btn-no-border" onclick="DeleteCustomer(' + response[i].pk_cus_id + ');" title="Delete"><i class="fa fa-trash" ></i></button>';
                    response[i][2] = response[i].cus_name;
                    response[i][3] = response[i].cus_code;
                    response[i][4] = response[i].cus_email;
                    response[i][5] = response[i].cus_gst_no;
                    response[i][6] = response[i].cus_address;
                    response[i][7] = response[i].cus_address_2;
                    response[i][8] = response[i].cus_address_3;
                    response[i][9] = response[i].city;
                    response[i][10] = response[i].state_name;
                    response[i][11] = response[i].cus_std_code;
                    response[i][12] = response[i].cus_phone;
                    response[i][13] = response[i].cus_fax;
                    response[i][14] = response[i].cus_contact_person;
                    response[i][15] = response[i].cus_website;
                    response[i][16] = response[i].customer_group_name;
                    response[i][17] = response[i].cus_alter_no;
                    response[i][18] = response[i].cus_mob_no;

                }
                return response;
            }
        }
    });
    $('#cus_datatable_filter').remove();
    $('.alphabet').remove();
    /* Alphabet Sort */
    var alphabet = $('<div class="alphabet" style="display:none"/>').append('Search: ');

    $('<span class="clear active"/>')
        .data('letter', '')
        .html('All')
        .appendTo(alphabet);

    for (var i = 0; i < 26; i++) {
        var letter = String.fromCharCode(65 + i);

        $('<span/>')
            .data('letter', letter)
            .html(letter)
            .appendTo(alphabet);
    }

    alphabet.insertBefore(table.table().container());

    alphabet.on('click', 'span', function() {
        alphabet.find('.active').removeClass('active');
        $(this).addClass('active');
        _searchColumn = 2;
        _alphabetSearch = $(this).data('letter');
        table.draw();
    });

    $('.search_key').on('click', function(e) {
        if ($('.searchKeyword').val() != '') {
            var searchval = $('.searchKeyword').val();

            var searchnumber = searchval.replace(/\,/g, "");
            var Floatsearchnumber = parseFloat(searchnumber);
            var check = isDate($('.searchKeyword').val());


            if (check == true) {
                var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; //Declare Regex
                var dtArray = searchval.match(rxDatePattern); // is format OK?

                if (dtArray !== null) {

                    table.search(dtArray[5] + '-' + dtArray[3] + '-' + dtArray[1]).draw();
                } else {
                    table.search($('.searchKeyword').val()).draw();
                }
            } else if (typeof Floatsearchnumber == 'number' && !isNaN(Floatsearchnumber)) {

                table.search(Floatsearchnumber).draw();
            } else {

                table.search($('.searchKeyword').val()).draw();
            }

        } else { table.search('').columns().search('').draw(); }
    });

    // $('.searchKeyword').keyup(function() {
    //     table.search('').columns().search('').draw();
    //     if ($(this).val() != '') {
    //         table.search($(this).val()).draw();
    //     } else {
    //         table.search('').columns().search('').draw();
    //     }
    // });

}

function isDate(txtDate) {


    var currVal = txtDate;
    if (currVal == '')
        return false;
    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; //Declare Regex
    var dtArray = currVal.match(rxDatePattern); // is format OK?
    if (dtArray == null)
        return false;

    //Checks for mm/dd/yyyy format.
    dtMonth = dtArray[3];
    dtDay = dtArray[1];
    dtYear = dtArray[5];

    if (dtMonth < 1 || dtMonth > 12)
        return false;
    else if (dtDay < 1 || dtDay > 31)
        return false;
    else if ((dtMonth == 4 || dtMonth == 6 || dtMonth == 9 || dtMonth == 11) && dtDay == 31)
        return false;
    else if (dtMonth == 2) {
        var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
        if (dtDay > 29 || (dtDay == 29 && !isleap))
            return false;
    }
    return true;
}

$('#txt_name').on('blur', function() {
    var countryData = $('#carrierCode').val();
    var a = $('#phoneNumber').val();
    var b = $('.btn-cc').val();
    console.log("hello");
    console.log(a);
    console.log(countryData);
});

function getAllCustomerGroup() {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllCustomerGroup' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            /* console.log(response); */
            $('#txt_customer_group').html('');
            $('#txt_customer_group').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_customer_group').append('<option value="' + response[i].pk_customer_group_id + '">' + response[i].customer_group_name + '</option>');
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllSalesTaxGroup() {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllSalesTaxGroup' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_sales_tax_group').html('');
            $('#txt_sales_tax_group').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_sales_tax_group').append('<option value="' + response[i].taxgroup_id + '">' + response[i].taxgroup_code + '(' + response[i].taxgroup_percentage + '%)</option>');
            }
            $('#txt_sales_tax_group').trigger("chosen:updated");
            $('#txt_sales_tax_group').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllCarriers() {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllCarriers' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            /* console.log(response); */
            $('#txt_carrier_id').html('');
            $('#txt_carrier_id').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_carrier_id').append('<option value="' + response[i].carrier_id + '">' + response[i].carrier_name + ' / ' + response[i].carrier_code + '</option>');
            }
            $('#txt_carrier_id').trigger("chosen:updated");
            $('#txt_carrier_id').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllCarrierss(carid) {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllCarriers' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_carrier_id').html('');
            $('#txt_carrier_id').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                if (carid == response[i].carrier_id) {
                    $('#txt_carrier_id').append('<option value="' + response[i].carrier_id + '" selected>' + response[i].carrier_name + ' / ' + response[i].carrier_code + '</option>');
                } else {
                    $('#txt_carrier_id').append('<option value="' + response[i].carrier_id + '">' + response[i].carrier_name + ' / ' + response[i].carrier_code + '</option>');
                }
            }
            $('#txt_carrier_id').trigger("chosen:updated");
            $('#txt_carrier_id').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}



function getAllSalesTaxGroups(salestaxid) {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllSalesTaxGroup' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            console.log("stg", response);
            $('#txt_sales_tax_group').html('');
            $('#txt_sales_tax_group').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                if (salestaxid == response[i].taxgroup_id) {
                    $('#txt_sales_tax_group').append('<option value="' + response[i].taxgroup_id + '" selected>' + response[i].taxgroup_code + '(' + response[i].taxgroup_percentage + '%)</option>');
                } else {
                    $('#txt_sales_tax_group').append('<option value="' + response[i].taxgroup_id + '">' + response[i].taxgroup_code + '(' + response[i].taxgroup_percentage + '%)</option>');
                }
            }
            $('#txt_sales_tax_group').trigger("chosen:updated");
            $('#txt_sales_tax_group').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllCountry() {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllCountry' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            /* console.log(response); */
            $('#txt_country').html('');
            $('#txt_country').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_country').append('<option value="' + response[i].country_id + '">' + response[i].country_name + '(' + response[i].country_code + ')</option>');
            }
            $('#txt_country').trigger("chosen:updated");
            $('#txt_country').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllCountrys(countryid) {
    var countryid = countryid;
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllCountry' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            /* console.log(response); */
            $('#txt_country').html('');
            $('#txt_country').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_country').append('<option value="' + response[i].country_id + '">' + response[i].country_name + '(' + response[i].country_code + ')</option>');
            }
            console.log(countryid);
            setTimeout(function() {
                $('#txt_country').find('option[value="' + countryid + '"]').attr("selected", true);
                $('#txt_country').trigger("chosen:updated");
                $('#txt_country').chosen();
            }, 500);
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllCurrency() {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllCurrency' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_currency').html('');
            $('#txt_currency').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_currency').append('<option value="' + response[i].currency_id + '">' + response[i].currency_name + ' (' + response[i].currency_symbol + ')</option>');
            }
            $('#txt_currency').trigger("chosen:updated");
            $('#txt_currency').chosen();
            if (localStorage.getItem("COMPANY_CURRENCY")) {
                $('#txt_currency').val(localStorage.getItem("COMPANY_CURRENCY")).trigger("chosen:updated");
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllPaymentTerms() {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllPaymentTerms' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_payment_term').html('');
            $('#txt_payment_term').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_payment_term').append('<option value="' + response[i].ptm_id + '">' + response[i].ptm_code + '</option>');
            }
            $('#txt_payment_term').trigger("chosen:updated");
            $('#txt_payment_term').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllTerms() {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllTerms' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_term').html('');
            $('#txt_term').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_term').append('<option value="' + response[i].tm_id + '">' + response[i].tm_name + '</option>');
            }
            $("#txt_term").trigger("chosen:updated");
            $("#txt_term").chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllCustomerGroups(cusid) {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllCustomerGroup' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_costomer_group').html('');
            $('#txt_costomer_group').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                if (cusid == response[i].cusgroup_id) {
                    $('#txt_costomer_group').append('<option value="' + response[i].cusgroup_id + '" selected>' + response[i].cusgroup_code + '</option>');
                } else {
                    $('#txt_costomer_group').append('<option value="' + response[i].cusgroup_id + '">' + response[i].cusgroup_code + '</option>');
                }
            }
            $('#txt_costomer_group').trigger("chosen:updated");
            $('#txt_costomer_group').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllCurrencys(curid) {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllCurrency' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_currency').html('');
            $('#txt_currency').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                if (curid == response[i].currency_id) {
                    $('#txt_currency').append('<option value="' + response[i].currency_id + '" selected>' + response[i].currency_name + ' (' + response[i].currency_symbol + ')</option>');
                } else {
                    $('#txt_currency').append('<option value="' + response[i].currency_id + '">' + response[i].currency_name + ' (' + response[i].currency_symbol + ')</option>');
                }
            }
            $('#txt_currency').trigger("chosen:updated");
            $('#txt_currency').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllPaymentTermss(ptmid) {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllPaymentTerms' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_payment_term').html('');
            $('#txt_payment_term').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                if (ptmid == response[i].ptm_id) {
                    $('#txt_payment_term').append('<option value="' + response[i].ptm_id + '" selected>' + response[i].ptm_code + '</option>');
                } else {
                    $('#txt_payment_term').append('<option value="' + response[i].ptm_id + '">' + response[i].ptm_code + '</option>');
                }
            }
            $('#txt_payment_term').trigger("chosen:updated");
            $('#txt_payment_term').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllTermss(termsid) {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllTerms' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_term').html('');
            $('#txt_term').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                if (termsid == response[i].tm_id) {
                    $('#txt_term').append('<option value="' + response[i].tm_id + '" selected>' + response[i].tm_name + '</option>');
                } else {
                    $('#txt_term').append('<option value="' + response[i].tm_id + '">' + response[i].tm_name + '</option>');
                }
            }
            $('#txt_term').trigger("chosen:updated");
            $('#txt_term').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllLiners(type) {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'type': type, 'mode': 'getAllLFs' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_liner').html('');
            $('#txt_liner').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_liner').append('<option value="' + response[i].lf_id + '">' + response[i].lf_name + '</option>');
            }
            $("#txt_liner").chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllLinerss(type, linid) {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'type': type, 'mode': 'getAllLFs' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_liner').html('');
            $('#txt_liner').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                if (linid == response[i].lf_id) {
                    $('#txt_liner').append('<option value="' + response[i].lf_id + '" selected>' + response[i].lf_name + '</option>');
                } else {
                    $('#txt_liner').append('<option value="' + response[i].lf_id + '">' + response[i].lf_name + '</option>');
                }
            }
            $('#txt_liner').trigger("chosen:updated");
            $('#txt_liner').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllForwarders(type) {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'type': type, 'mode': 'getAllLFs' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_frwd').html('');
            $('#txt_frwd').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_frwd').append('<option value="' + response[i].lf_id + '">' + response[i].lf_name + '</option>');
            }
            $("#txt_frwd").trigger("chosen:updated");
            $("#txt_frwd").chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllForwarderss(type, forid) {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'type': type, 'mode': 'getAllLFs' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_frwd').html('');
            $('#txt_frwd').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                if (forid == response[i].lf_id) {
                    $('#txt_frwd').append('<option value="' + response[i].lf_id + '" selected>' + response[i].lf_name + '</option>');
                } else {
                    $('#txt_frwd').append('<option value="' + response[i].lf_id + '">' + response[i].lf_name + '</option>');
                }
            }
            $('#txt_frwd').trigger("chosen:updated");
            $('#txt_frwd').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllBrandsById(bid) {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllBrands' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_brand_code').chosen('destroy');
            $('#txt_brand_code').html('');
            $('#txt_brand_code').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                if (bid == response[i].brand_id) {
                    $('#txt_brand_code').append('<option value="' + response[i].brand_id + '" selected>' + response[i].brand_name + '(' + response[i].brand_code + ')</option>');
                } else {
                    $('#txt_brand_code').append('<option value="' + response[i].brand_id + '">' + response[i].brand_name + '(' + response[i].brand_code + ')</option>');
                }
            }
            $('#txt_brand_code').trigger("chosen:updated");
            $('#txt_brand_code').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function validationfun() {

    $(document).ready(function() {
        $.validator.setDefaults({ ignore: ":hidden:not(select)" });

        /* Numbers Only validation */
        $(".numbersOnly").on("keypress keyup blur", function(event) {
            $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        $("input").on("keypress", function(e) {
            if (e.which === 32 && !this.value.length)
                e.preventDefault();
        });

        $('.textOnly').keydown(function(e) {
            var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                e.preventDefault();
            }
        });

        $('.textandNumebrsOnly').on('keypress', function(event) {
            var regex = new RegExp("^[a-zA-Z0-9_ ]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
        $('.textandNumebrsOnly').bind('copy paste', function() {
            var txt = $(this);
            var func = function() {
                var regex = new RegExp("^[a-zA-Z0-9_ ]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            }
            txt.bind('copy paste').keyup(func).keypress(func).blur(func).change(func);
        });

        $("textarea").on("keypress", function(e) {
            if (e.which === 32 && !this.value.length)
                e.preventDefault();
        });
        $("#txt_costomer_group").on("change", function(e) {
            getAllSalesTaxGroups();
            getAllPaymentTermss();
            var cgid = $(this).val();
            if (cgid) {
                $.ajax({
                    url: "modules/customer/ajax_functions.php",
                    data: { 'cgid': cgid, 'mode': 'getCustomerGroupById' },
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        setTimeout(function() {
                            $('#txt_payment_term').find('option[value="' + response[0].ptm_id + '"]').attr("selected", true);
                            $('#txt_payment_term').chosen();
                            $('#txt_payment_term').trigger("chosen:updated");
                            $('#txt_sales_tax_group').find('option[value="' + response[0].taxgroup_id + '"]').attr("selected", true);
                            $('#txt_sales_tax_group').chosen();
                            $('#txt_sales_tax_group').trigger("chosen:updated");
                        }, 1000);
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            } else {
                setTimeout(function() {
                    $('#txt_payment_term').chosen();
                    $('#txt_sales_tax_group').chosen();
                }, 1000);
            }
        });
        /* chosen_required  */
        $('.chosen_required').change(function() {
            var cho_reg = $(this).val();
            if (cho_reg) {
                $(this).next('div.chosen-container').removeClass('validateerror');
            } else {
                $(this).next('div.chosen-container').addClass('validateerror');
            }
        });
    });
}

function getPaymentTermsListing() {

    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getPaymentTerms' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('.paymentterms').html('');
            $('.paymentterms').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('.paymentterms').append("<option value='" + response[i].ptm_id + "'>" + response[i].ptm_code + "</option>");
            }
            $(".paymentterms").trigger("chosen:updated");
            $(".paymentterms").chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getTaxGroupListing() {

    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllSalesTax' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('.taxgroup').html('');
            $('.taxgroup').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('.taxgroup').append("<option value='" + response[i].taxgroup_id + "'>" + response[i].taxgroup_code + "</option>");
            }
            $(".taxgroup").trigger("chosen:updated");
            $(".taxgroup").chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}


function getAllCountryListingCarrier() {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllCountry' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_carrier_country').html('');
            $('#txt_carrier_country').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_carrier_country').append('<option value="' + response[i].country_id + '">' + response[i].country_name + '(' + response[i].country_code + ')</option>');
            }
            $('#txt_carrier_country').trigger("chosen:updated");
            $('#txt_carrier_country').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllBrands() {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllBrands' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_brand_code').chosen('destroy');
            $('#txt_brand_code').html('');
            $('#txt_brand_code').append('<option value="">SELECT</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_brand_code').append('<option value="' + response[i].brand_id + '">' + response[i].brand_name + '(' + response[i].brand_code + ')</option>');
            }
            $('#txt_brand_code').chosen();
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getAllShipmentLocation() {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getAllShipmentLocation' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_shipment_from').html('');
            $('#txt_shipment_to').html('');
            $('#txt_shipment_from').append('<option value="">Shipment From</option>');
            $('#txt_shipment_to').append('<option value="">Shipment To</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_shipment_from').append('<option value="' + response[i].id + '">' + response[i].shp_from + '</option>');
                $('#txt_shipment_to').append('<option value="' + response[i].id + '">' + response[i].shp_from + '</option>');
            }
            $("#txt_shipment_from").trigger("chosen:updated");
            $("#txt_shipment_to").trigger("chosen:updated");
            $('#txt_shipment_from').chosen();
            $('#txt_shipment_to').chosen();
            $('#txt_port_of_discharge').html('');
            $('#txt_shipto').html('');
            $('#txt_port_of_discharge').append('<option value="">Port of Discharge</option>');
            $('#txt_shipto').append('<option value="">Place of Delivery</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_port_of_discharge').append('<option value="' + response[i].id + '">' + response[i].shp_from + '</option>');
                $('#txt_shipto').append('<option value="' + response[i].id + '">' + response[i].shp_from + '</option>');
            }
            $("#txt_port_of_discharge").trigger("chosen:updated");
            $("#txt_shipto").trigger("chosen:updated");
            $('#txt_port_of_discharge').chosen();
            $('#txt_shipto').chosen();
        }
    });
}

function getAllShipmentLocationByID(sfrom, sto) {
    $.ajax({
        url: "modules/sales_quotes/ajax_functions.php",
        data: { 'mode': 'getAllShipmentLocation' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_port_of_discharge').chosen('destroy');
            $('#txt_shipto').chosen('destroy');
            $('#txt_port_of_discharge').html('');
            $('#txt_shipto').html('');
            $('#txt_port_of_discharge').append('<option value="">Port of Discharge</option>');
            $('#txt_shipto').append('<option value="">Place of Delivery</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_port_of_discharge').append('<option value="' + response[i].id + '">' + response[i].shp_from + '</option>');
                $('#txt_shipto').append('<option value="' + response[i].id + '">' + response[i].shp_from + '</option>');
            }
            $("#txt_port_of_discharge").val(sfrom);
            $("#txt_shipto").val(sto);
            setTimeout(function() {
                $('#txt_port_of_discharge').chosen();
                $('#txt_shipto').chosen();
            }, 500);
        }
    });
}

function getAllShipmentFromToLocationByID(sfrom, sto) {
    $.ajax({
        url: "modules/sales_quotes/ajax_functions.php",
        data: { 'mode': 'getAllShipmentLocation' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_shipment_from').chosen('destroy');
            $('#txt_shipment_to').chosen('destroy');
            $('#txt_shipment_from').html('');
            $('#txt_shipment_to').html('');
            $('#txt_shipment_from').append('<option value="">Shipment From</option>');
            $('#txt_shipment_to').append('<option value="">Shipment To</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_shipment_from').append('<option value="' + response[i].id + '">' + response[i].shp_from + '</option>');
                $('#txt_shipment_to').append('<option value="' + response[i].id + '">' + response[i].shp_from + '</option>');
            }
            $("#txt_shipment_from").val(sfrom);
            $("#txt_shipment_to").val(sto);
            setTimeout(function() {
                $('#txt_shipment_from').chosen();
                $('#txt_shipment_to').chosen();
            }, 500);
        }
    });
}

function getModeofDelivery() {
    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'mode': 'getDeliveryMode' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_shipment_mode').html('');
            $('#txt_shipment_mode').append('<option value="">Select Mode</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_shipment_mode').append('<option value="' + response[i].mod_id + '">' + response[i].mod_name + '</option>');
            }
            $("#txt_shipment_mode").trigger("chosen:updated");
            $('#txt_shipment_mode').chosen();
        }
    });
}

function getModeofDeliveries(modeid) {
    $.ajax({
        url: "modules/sales_quotes/ajax_functions.php",
        data: { 'mode': 'getDeliveryMode' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_shipment_mode').html('');
            $('#txt_shipment_mode').append('<option value="">Select Mode</option>');
            for (var i = 0; i < response.length; i++) {
                $('#txt_shipment_mode').append('<option value="' + response[i].mod_id + '">' + response[i].mod_name + '</option>');
            }
            setTimeout(function() {
                $('#txt_shipment_mode').find('option[value="' + modeid + '"]').attr("selected", true);
                $("#txt_shipment_mode").chosen();
                $("#txt_shipment_mode").trigger('chosen:updated');
            }, 500);
        }
    });
}
/*Pricing tab function*/
function editClick(obj) {

    var rmID = $(obj).attr('id');
    var priceval = $(obj).closest('tr').find('input[name="imprice"]').val();
    var vendID = $("#form_customer_update #id").val();

    $.ajax({
        url: "modules/customer/ajax_functions.php",
        data: { 'rmID': rmID, 'priceval': priceval, 'vendID': vendID, 'mode': 'insertPriceCustomer' },
        type: 'post',
        dataType: 'json',
        success: function(response) {

            AlertFun('Success', 'Price Updated Successfully.', 'success');
            // setTimeout(function(){
            // //location.reload();
            // $('a[href="#pricing"]').click();
            // },1000);
            var edithnd = getQueryVariable('hnd');

            window.location.href = "?hnd=" + edithnd + "&mnu=" + menuID + "&id=" + vendID + "&tab=2";



        },
        error: function(response) {
            console.log(response);
        }
    });
}

function validateEmail(emailField) {
    if (emailField.value.length > 0) {
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (reg.test(emailField.value) == false) {
            $('.txt_email').addClass('error');
            return false;
        }
    } else {
        $('.txt_email').removeClass('error');
        $('.txt_email').addClass('valid');
    }

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

/// uom 

$('#form_uom_add').validate({
    rules: {
        txt_uom_name: { required: true },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_uom_add')[0]);
        $.ajax({
            url: "modules/uom/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "UOM has been added successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=8";
                    });
                } else if (response == 2) {
                    swal("Sorry!", "UOM Name already exists!", "error");
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

function deleteuom(id) {
    swal({
        title: "Are you sure you want to delete the UOM?",
        text: "",
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        showCancelButton: true,
        closeOnConfirm: false,
        closeOnCancel: false
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajax({
                type: 'post',
                url: "modules/uom/ajax_functions.php",
                data: {
                    "id": id,
                    "mode": 'Deleteuom'
                },
                beforeSend: function() {
                    $("#loaderscancel").show();
                },
                complete: function() {
                    $("#loaderscancel").hide();
                },
                success: function(response) {
                    if (response == 1) {
                        swal("Deleted!", "UOM has been deleted.", "success");
                        window.location = 'index.php?erp=7';
                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                    }
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                },
            });
        }
    });



}


/// Category 

$('#form_category_add').validate({
    rules: {
        txt_cat_name: { required: true },
    },
    message: {
        txt_cat_name: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_category_add')[0]);
        $.ajax({
            url: "modules/category/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Franchise has been added successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=10";
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Franchise Name already exists!", "error");
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


$('#form_category_Edit').validate({
    rules: {
        txt_cat_name: { required: true },
    },
    message: {
        txt_cat_name: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_category_Edit')[0]);
        $.ajax({
            url: "modules/category/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                var txt_category_id = $("#txt_category_id").val();
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Franchise has been updated successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=11&id=" + txt_category_id;
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Franchise Name already exists!", "error");
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

function deletecategory(id) {
    swal({
        title: "Are you sure you want to delete the Category?",
        text: "",
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        showCancelButton: true,
        closeOnConfirm: false,
        closeOnCancel: false
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajax({
                type: 'post',
                url: "modules/category/ajax_functions.php",
                data: {
                    "id": id,
                    "mode": 'Deletecategory'
                },
                beforeSend: function() {
                    $("#loaderscancel").show();
                },
                complete: function() {
                    $("#loaderscancel").hide();
                },
                success: function(response) {
                    if (response == 1) {
                        swal("Deleted!", "Category has been deleted.", "success");
                        window.location = 'index.php?erp=9';
                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                    }
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                },
            });
        }
    });
}



/// Inner Sheet 

$('#form_innersheet_add').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_innersheet_add')[0]);
        $.ajax({
            url: "modules/inner_sheet/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Inner sheet has been added successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=23";
                    });
                } else if (response == 2) {
                    swal("Sorry!", " Inner Sheet already exists!", "error");
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


$('#form_innersheet_Edit').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_innersheet_Edit')[0]);
        $.ajax({
            url: "modules/inner_sheet/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                var txt_id = $("#txt_is_id").val();
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Inner sheet has been updated successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=24&id=" + txt_id;
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Inner Sheet Name already exists!", "error");
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

function deleteInnersheet(id) {
    swal({
        title: "Are you sure you want to delete the Inner Sheet?",
        text: "",
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        showCancelButton: true,
        closeOnConfirm: false,
        closeOnCancel: false
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajax({
                type: 'post',
                url: "modules/inner_sheet/ajax_functions.php",
                data: {
                    "id": id,
                    "mode": 'Deleteinnersheet'
                },
                beforeSend: function() {
                    $("#loaderscancel").show();
                },
                complete: function() {
                    $("#loaderscancel").hide();
                },
                success: function(response) {
                    if (response == 1) {
                        swal("Deleted!", "Inner Sheet has been deleted.", "success");
                        window.location = 'index.php?erp=22';
                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                    }
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                },
            });
        }
    });
}



/// Special Effects 

$('#form_specialeffects_add').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_specialeffects_add')[0]);
        $.ajax({
            url: "modules/special_effects/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Special effects has been added successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=26";
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Special effects  already exists!", "error");
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


$('#form_specialeffects_Edit').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_specialeffects_Edit')[0]);
        $.ajax({
            url: "modules/special_effects/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                var txt_id = $("#txt_id").val();
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Special Effects has been updated successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=27&id=" + txt_id;
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Special Effects already exists!", "error");
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

function deleteSpecialeffects(id) {
    swal({
        title: "Are you sure you want to delete the Special Effects?",
        text: "",
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        showCancelButton: true,
        closeOnConfirm: false,
        closeOnCancel: false
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajax({
                type: 'post',
                url: "modules/special_effects/ajax_functions.php",
                data: {
                    "id": id,
                    "mode": 'DeleteSpecialeffects'
                },
                beforeSend: function() {
                    $("#loaderscancel").show();
                },
                complete: function() {
                    $("#loaderscancel").hide();
                },
                success: function(response) {
                    if (response == 1) {
                        swal("Deleted!", "Special Effects has been deleted.", "success");
                        window.location = 'index.php?erp=25';
                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                    }
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                },
            });
        }
    });
}




/// Size 

$('#form_size_add').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_size_add')[0]);
        $.ajax({
            url: "modules/size/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Size has been added successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=29";
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Size Name already exists!", "error");
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


$('#form_size_Edit').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_size_Edit')[0]);
        $.ajax({
            url: "modules/size/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                var txt_id = $("#txt_size_id").val();
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Size has been updated successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=30&id=" + txt_id;
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Size Name already exists!", "error");
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

function deleteSize(id) {
    swal({
        title: "Are you sure you want to delete the Size?",
        text: "",
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        showCancelButton: true,
        closeOnConfirm: false,
        closeOnCancel: false
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajax({
                type: 'post',
                url: "modules/size/ajax_functions.php",
                data: {
                    "id": id,
                    "mode": 'DeleteSize'
                },
                beforeSend: function() {
                    $("#loaderscancel").show();
                },
                complete: function() {
                    $("#loaderscancel").hide();
                },
                success: function(response) {
                    if (response == 1) {
                        swal("Deleted!", "Size has been deleted.", "success");
                        window.location = 'index.php?erp=28';
                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                    }
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                },
            });
        }
    });
}




/// Bag 

$('#form_bag_add').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_bag_add')[0]);
        $.ajax({
            url: "modules/bag/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Bag has been added successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=35";
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Bag Name already exists!", "error");
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


$('#form_bag_Edit').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_bag_Edit')[0]);
        $.ajax({
            url: "modules/bag/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                var txt_id = $("#txt_bag_id").val();
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Bag has been updated successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=35&id=" + txt_id;
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Bag Name already exists!", "error");
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

function deleteBag(id) {
    swal({
        title: "Are you sure you want to delete the Bag?",
        text: "",
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        showCancelButton: true,
        closeOnConfirm: false,
        closeOnCancel: false
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajax({
                type: 'post',
                url: "modules/bag/ajax_functions.php",
                data: {
                    "id": id,
                    "mode": 'DeleteBag'
                },
                beforeSend: function() {
                    $("#loaderscancel").show();
                },
                complete: function() {
                    $("#loaderscancel").hide();
                },
                success: function(response) {
                    if (response == 1) {
                        swal("Deleted!", "Bag has been deleted.", "success");
                        window.location = 'index.php?erp=35';
                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                    }
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                },
            });
        }
    });
}




/// Box 

$('#form_box_add').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },

    submitHandler: function(form) {
        var formData = new FormData($('#form_box_add')[0]);
        $.ajax({
            url: "modules/box/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Box has been added successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=38";
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Box Name already exists!", "error");
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


$('#form_box_Edit').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_box_Edit')[0]);
        $.ajax({
            url: "modules/box/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                var txt_id = $("#txt_box_id").val();
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Box has been updated successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=38&id=" + txt_id;
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Box Name already exists!", "error");
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

function deleteBox(id) {
    swal({
        title: "Are you sure you want to delete the Box?",
        text: "",
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        showCancelButton: true,
        closeOnConfirm: false,
        closeOnCancel: false
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajax({
                type: 'post',
                url: "modules/box/ajax_functions.php",
                data: {
                    "id": id,
                    "mode": 'DeleteBox'
                },
                beforeSend: function() {
                    $("#loaderscancel").show();
                },
                complete: function() {
                    $("#loaderscancel").hide();
                },
                success: function(response) {
                    if (response == 1) {
                        swal("Deleted!", "Box has been deleted.", "success");
                        window.location = 'index.php?erp=38';
                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                    }
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                },
            });
        }
    });
}


/// Pad 

$('#form_pad_add').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_pad_add')[0]);
        $.ajax({
            url: "modules/pad/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Pad has been added successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=41";
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Pad Name already exists!", "error");
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


$('#form_pad_Edit').validate({
    rules: {
        txt_name: { required: true },
        txt_cost: { required: true },
    },
    message: {

        txt_name: {
            required: "this field is required"
        },
        txt_cost: {
            required: "this field is required"
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_pad_Edit')[0]);
        $.ajax({
            url: "modules/pad/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                var txt_id = $("#txt_pad_id").val();
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Pad has been updated successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=41&id=" + txt_id;
                    });
                } else if (response == 2) {
                    swal("Sorry!", "Pad Name already exists!", "error");
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

function deletePad(id) {
    swal({
        title: "Are you sure you want to delete the Pad?",
        text: "",
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        showCancelButton: true,
        closeOnConfirm: false,
        closeOnCancel: false
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajax({
                type: 'post',
                url: "modules/pad/ajax_functions.php",
                data: {
                    "id": id,
                    "mode": 'DeletePad'
                },
                beforeSend: function() {
                    $("#loaderscancel").show();
                },
                complete: function() {
                    $("#loaderscancel").hide();
                },
                success: function(response) {
                    if (response == 1) {
                        swal("Deleted!", "Pad has been deleted.", "success");
                        window.location = 'index.php?erp=41';
                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                    }
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                },
            });
        }
    });
}