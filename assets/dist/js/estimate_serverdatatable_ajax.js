$(document).ready(function() {

    var dataRecords = $('#estimateTable').DataTable({
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/estimate/ajax_functions.php",
            type: "POST",
            data: { mode: 'listEstimate' },
            dataType: "json"
        },
        "columnDefs": [{
            "targets": [0, 8],
            "orderable": false,
        }, ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });

    $('#addRecord').click(function() {

        $('#recordModal').modal('show');
        $('#database_AddForm')[0].reset();
        $('.modal-title').html(" Add - Manual Entry");
        $('#action').val('addRecord');
        $('#save').val('Add');
        getMonthListings();
    });
    $("#datatable_LeadTable").on('click', '.update', function() {

        var id = $(this).attr("id");

        var action = 'getRecord';
        $.ajax({
            url: 'modules/manual_entry/ajax_functions.php',
            method: "POST",
            data: { id: id, action: action },
            dataType: "json",
            success: function(data) {
                $('#AddLead-modal').modal('show');
                $('#idform').val(data.id);
                $('#txt_database_lead').val(data.database_lead);
                $('#txt_database_reference').val(data.database_reference);
                $('#txt_postive_replies').val(data.postive_replies);
                $('#txt_monthVal').val(data.mixmonthlevel);

                $('.modal-title').html(" Edit - Manual Entry");
                $('#action').val('updateRecord');
                $('#save').val('Update');
            }
        })
    });
    //  $("#AddLead-modal").on('submit', '#database_AddForm', function(event) {
    $("#database_AddForm").validate({
        rules: {
            txt_database_lead: {
                required: true,

            },
            txt_database_reference: {
                required: true,

            },
            txt_postive_replies: {
                required: true,

            },
            txt_monthVal: {
                required: true,

            }
        },
        /*  messages: {
            name: "Please specify your name",
            email: {
              required: "We need your email address to contact you",
              email: "Your email address must be in the format of name@domain.com"
            }
          },*/
        submitHandler: function(form) {
            $('#save').attr('disabled', 'disabled');
            //var formData = $("#database_AddForm").serialize();
            var level = $('#txt_monthVal').find(":selected").attr('data-level');
            var mixmonthlevel = $('#txt_monthVal').find(":selected").attr('data-mixmonthlevel');
            var formData = $('#database_AddForm').serializeArray();
            formData.push({ name: 'level', value: level })
            formData.push({ name: 'mixmonthlevel', value: mixmonthlevel })
            $.ajax({
                url: "modules/manual_entry/ajax_functions.php",
                method: "POST",
                data: formData,
                success: function(data) {
                    $('#database_AddForm')[0].reset();
                    $('#AddLead-modal').modal('hide');
                    $('#save').attr('disabled', false);
                    var datamsg = $('#save').val();
                    var msgtxt = '';
                    if (datamsg == 'Add') {
                        msgtxt = 'Added';
                    } else if (datamsg == 'Update') {
                        msgtxt = 'Updated';
                    }
                    $.toast({ title: 'Success', content: 'Record ' + msgtxt + ' Successfully !!', type: 'success', delay: 5000 });
                    dataRecords.ajax.reload();
                }
            })

        }
    });
    // event.preventDefault();

    // });
    $("#datatable_LeadTable").on('click', '.delete', function() {
        var id = $(this).attr("id");
        var action = "deleteRecord";

        swal({
                title: "Are you sure?",
                text: "",
                type: "warning",
                confirmButtonText: `Yes`,
                denyButtonText: `No`,
                showDenyButton: true,
                showCancelButton: true,
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "modules/manual_entry/ajax_functions.php",
                        method: "POST",
                        data: { id: id, action: action },
                        success: function(data) {
                            swal(
                                'Success',
                                'Record deleted successfully :)',
                                'success'
                            )
                            dataRecords.ajax.reload();
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your stay here :)',
                        'error'
                    )
                }
            })


    });


    $("#datatable_LeadTable").on('click', '.update', function() {

        var mixmonthlevel = $(this).attr('data-mixmonthlevelbtn');
        getMonthListings(mixmonthlevel);
    });


    function getMonthListings(mixmonthlevel) {

        var mixmonthlevel = mixmonthlevel;
        $.ajax({
            url: "modules/manual_entry/ajax_functions.php",
            data: { 'action': 'getMonthdata' },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                //$('#txt_monthVal').chosen('destroy');
                $('.txt_monthVal').select2({
                    placeholder: "Select a Month",
                    allowClear: true
                });
                $('.txt_monthVal').html('');
                $('.txt_monthVal').append('<option value="">Select Month</option>');
                var leveldata = '';

                for (var i = 0; i < response.length; i++) {


                    $('.txt_monthVal').append('<option value="' + response[i].year + '-' + response[i].month + '#' + response[i].campaign_level + '" data-mixmonthlevel="' + response[i].year + '-' + response[i].month + '"  data-level="' + response[i].campaign_level + '" >' + response[i].monthname + ' ' + response[i].year + ' #' + response[i].campaign_level + '</option>');
                }
                $('.txt_monthVal').val(mixmonthlevel).trigger("change");



            }
        });
    }

    /* ADDITIONAL PRICE HERE */
});