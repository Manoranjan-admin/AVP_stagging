$(document).ready(function () {
    var roleId = $("#getSessRollId").val();
    /* var restrColEstimate = [];
     var restrColadvance = [];
     var restrColbill = [];*/

    var hidecolumn = [];
    var hidecolumnadvance = [];
    var hidecolumnbill = [];
    var hidecolprintadv = [];
    // if (roleId == 999 || roleId == 1 || roleId > 1) {
    if (roleId == 999 || roleId == 1) {
        /*  restrColEstimate = [0, 6, 7, 8];
          restrColadvance = [0,  7];
          restrColbill = [0,  7];*/
        hidecolprintadv = [0, 1, 2, 3, 4, 5, 6];
    } else {
        //   hidecolumn = [ 6];
        hidecolumnadvance = [7];
        hidecolumnbill = [7];
        hidecolprintadv = [0, 1, 2, 3, 4];
    }
    var dataRecordsnonins = $("#inprogessestimatenoncomm").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var roleId = $("#getSessRollId").val();
            console.log(roleId);

            if (roleId == 999 || roleId == 1) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
                };

                // Total over all pages
                total = api
                    .column(5)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                console.log(total);

                // Total over this page
                pageTotal = api
                    .column(5, { page: "current" })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer

                $(api.column(5).footer()).html("₹" + pageTotal.toFixed(2));
            }
        },

        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/sales/ajax_functions_noncommercial.php",
            type: "POST",
            data: { mode: "listEstimateNonComm" },
            dataType: "json",
        },

        columnDefs: [
            {
                targets: [0, 8, 9, 10],
                orderable: false,
            },
            { targets: [5, 6, 7], className: "dt-body-right" },
        ],

        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });
    /*
        $('.search_keyestnonins').on('click', function(e) {
            if ($('.searchKeywordestnonins').val() != '') {
                dataRecordsnonins.search($('.searchKeywordestnonins').val()).draw();
            } else { dataRecordsnonins.search('').columns().search('').draw(); }
        });
    */

    var dataRecordsnoncomt = $("#completeestimatenoncomm").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var roleId = $("#getSessRollId").val();

            if (roleId == 999 || roleId == 1) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
                };

                // Total over all pages
                total = api
                    .column(5)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                console.log(total);

                // Total over this page
                pageTotal = api
                    .column(5, { page: "current" })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer

                $(api.column(5).footer()).html("₹" + pageTotal.toFixed(2));
            }
        },
        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/sales/ajax_functions_noncommercial.php",
            type: "POST",
            data: { mode: "listEstimateNonCommComplete" },
            dataType: "json",
        },
        columnDefs: [
            {
                //"targets": [0, 6, 7, 8],
                targets: [0, 8, 9, 10],

                orderable: false,
            },
            {
                targets: hidecolumn,
                visible: false,
            },
            { targets: [5, 6, 7], className: "dt-body-right" },
        ],
        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });

    var dataRecordsnoncancel = $("#cancelledestimatenoncomm").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var roleId = $("#getSessRollId").val();

            if (roleId == 999 || roleId == 1) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
                };

                // Total over all pages
                total = api
                    .column(5)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                console.log(total);

                // Total over this page
                pageTotal = api
                    .column(5, { page: "current" })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer

                $(api.column(5).footer()).html("₹" + pageTotal.toFixed(2));
            }
        },
        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/sales/ajax_functions_noncommercial.php",
            type: "POST",
            data: { mode: "listEstimateNonCommCancelled" },
            dataType: "json",
        },
        columnDefs: [
            {
                targets: [0, 8, 9],
                orderable: false,
            },
            {
                targets: hidecolumn,
                visible: false,
            },
            { targets: [5, 6, 7], className: "dt-body-right" },
        ],
        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });
    /*
        $('.search_keyestnoncomt').on('click', function(e) {
            if ($('.searchKeywordestnoncomt').val() != '') {
                dataRecordsnoncomt.search($('.searchKeywordestnoncomt').val()).draw();
            } else { dataRecordsnoncomt.search('').columns().search('').draw(); }
        });*/
    var dataRecordsT_O_P = $("#estimatenoncommT_O_P").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var roleId = $("#getSessRollId").val();

            if (roleId == 999 || roleId == 1) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
                };

                // Total over all pages
                total = api
                    .column(5)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                console.log(total);

                // Total over this page
                pageTotal = api
                    .column(5, { page: "current" })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer

                $(api.column(5).footer()).html("₹" + pageTotal.toFixed(2));
            }
        },
        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/sales/ajax_functions_noncommercial.php",
            type: "POST",
            data: function (d) {
                d.mode = "listEstimatenonNonCommT_O_P";
                d.types_of_payment = $("#txt_T_O_P ").val();
            },

            dataType: "json",
        },
        columnDefs: [
            {
                targets: [0, 6, 7, 8],
                orderable: false,
            },
            {
                targets: hidecolumn,
                visible: false,
            },
            { targets: 5, className: "dt-body-right" },
        ],
        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });

    $("#txt_T_O_P").select2();
    $("#report_reset").on("click", function () {
        $("#txt_T_O_P").find("option:selected").prop("selected", false);

        $("#txt_T_O_P").trigger("change");
    });
    $("#txt_T_O_P").on("change", function () {
        dataRecordsT_O_P.draw();
    });
    $("#inprogessestimatenoncomm").on("click", ".btnCancel", function () {
        var id = $(this).attr("data-id");
        var sono = $(this).attr("data-sono");

        var action = "cancelNonCommRecord";

        swal({
            title: "Are you sure?",
            text: "Cancel this order : " + sono,
            type: "warning",
            buttons: ["No, cancel it!", "Yes, I am sure!"],

            showDenyButton: true,
            showCancelButton: true,
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "modules/sales/ajax_functions_noncommercial.php",
                    method: "POST",
                    data: { id: id, mode: action },
                    success: function (data) {
                        swal("Success", "Record Cancelled successfully :)", "success");
                        //  dataRecords.ajax.reload();
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    },
                });
            } else {
                swal("Cancelled", "Your stay here :)", "error");
            }
        });
    });
    $("#inprogessestimatenoncomm").on("click", ".btnCancelval", function () {
        var id = $(this).attr("data-id");
        var sono = $(this).attr("data-sono");
        $("#txt_oid").val(id);
        $("#txt_ono").text(sono);
        $("#txt_sono").val(sono);
    });
    $("#completeestimatenoncomm").on("click", ".btnCancelval", function () {
        var id = $(this).attr("data-id");
        var sono = $(this).attr("data-sono");
        $("#txt_oid").val(id);
        $("#txt_ono").text(sono);
        $("#txt_sono").val(sono);
    });
    $("#btnCancelsub").on("click", function () {
        var id = $("#txt_oid").val();
        var sono = $("#txt_sono").val();
        var reason = $("#txt_reason").val();
        //var sonos.innerHTML = '<b>'+sono+'</b>';
        // content.innerHTML = 'Hello <strong>'+ name +'</strong>';
        $("#txt_reason_error").empty();

        if (reason != "") {
            var action = "cancelCommRecordtest";

            swal({
                title: "Are you sure?",

                text: "Cancel this order : " + sono,
                type: "warning",
                buttons: ["No, cancel it!", "Yes, I am sure!"],

                showDenyButton: true,
                showCancelButton: true,
            }).then(function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "modules/sales/ajax_functions_noncommercial.php",
                        method: "POST",
                        data: { id: id, reason: reason, mode: action },
                        success: function (data) {
                            swal("Success", "Record Cancelled successfully :)", "success");
                            setTimeout(function () {
                                location.reload();
                            }, 5500);
                            //  dataRecords.ajax.reload();
                        },
                    });
                } else {
                    swal("Cancelled", "Your stay here :)", "error");
                }
            });
        } else {
            $("#txt_reason_error").text("This field is required");
        }
    });
    var dataRecordsadvcomm = $("#com_advanceTable").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var roleId = $("#getSessRollId").val();

            if (roleId == 999 || roleId == 1) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
                };

                // Total over all pages
                total = api
                    .column(6)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                console.log(total);

                // Total over this page
                pageTotal = api
                    .column(6, { page: "current" })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer

                $(api.column(6).footer()).html("₹" + pageTotal.toFixed(2));
            }
        },
        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/advance/ajax_functions_commercial.php",
            type: "POST",
            data: function (d) {
                d.mode = "listAdvanceComm";
                d.fromDate = $("#from_date").val();
                d.toDate = $("#to_date").val();
            },
            dataType: "json",
        },
        dom: "Blfrtip",
        buttons: [
            {
                extend: "print",
                text: '<span class="mdi mdi-file-print"></span> Print',
                title: "Advance ",
                action: newexportaction1,

                exportOptions: {
                    modifier: {
                        search: "applied",
                        order: "applied",
                    },
                    columns: hidecolprintadv,
                },
                footer: true,
            },
        ],
        columnDefs: [
            {
                targets: [0, 5],
                orderable: false,
            },
            {
                targets: hidecolumnadvance,
                visible: false,
            },
        ],

        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });
    /*
    $('.search_keyadvcomm').on('click', function(e) {
        if ($('.searchKeywordadvcomm').val() != '') {
            dataRecordsadvcomm.search($('.searchKeywordadvcomm').val()).draw();
        } else { dataRecordsadvcomm.search('').columns().search('').draw(); }
    });*/
    /* $('#from_date').on('change', function() {
         dataRecordsadvcomm.draw();
     });

     $('#to_date').on('change', function() {
         dataRecordsadvcomm.draw();
     });*/
    $("#report_reset").on("click", function () {
        dataRecordsadvcomm.draw();
    });
    $("#report_search").on("click", function () {
        dataRecordsadvcomm.draw();
    });

    var dataRecordsadvnoncomm = $("#noncom_advanceTable").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var roleId = $("#getSessRollId").val();

            if (roleId == 999 || roleId == 1) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
                };

                // Total over all pages
                total = api
                    .column(6)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                console.log(total);

                // Total over this page
                pageTotal = api
                    .column(6, { page: "current" })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer

                $(api.column(6).footer()).html("₹" + pageTotal.toFixed(2));
            }
        },
        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/advance/ajax_functions_noncommercial.php",
            type: "POST",
            data: function (d) {
                d.mode = "listAdvanceNonComm";
                d.fromDate = $("#from_date").val();
                d.toDate = $("#to_date").val();
            },
            dataType: "json",
        },
        dom: "Blfrtip",
        buttons: [
            {
                extend: "print",
                text: '<span class="mdi mdi-file-print"></span> Print',
                title: "Advance",
                action: newexportaction1,

                exportOptions: {
                    modifier: {
                        search: "applied",
                        order: "applied",
                    },
                    columns: hidecolprintadv,
                },
                footer: true,
            },
        ],
        columnDefs: [
            {
                targets: [0, 5],
                orderable: false,
            },
            {
                targets: hidecolumnadvance,
                visible: false,
            },
        ],

        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });
    /*
    $('.search_keyadvnon').on('click', function(e) {
        if ($('.searchKeywordadvnon').val() != '') {
            dataRecordsadvnoncomm.search($('.searchKeywordadvnon').val()).draw();
        } else { dataRecordsadvnoncomm.search('').columns().search('').draw(); }
    });*/
    $("#report_reset").on("click", function () {
        dataRecordsadvnoncomm.draw();
    });
    $("#report_search").on("click", function () {
        dataRecordsadvnoncomm.draw();
    });
    /*
    $('#from_date').on('change', function() {
        dataRecordsadvnoncomm.draw();
    });

    $('#to_date').on('change', function() {
        dataRecordsadvnoncomm.draw();
    });*/

    var dataRecordsbillcomm = $("#com_billTable").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var roleId = $("#getSessRollId").val();

            if (roleId == 999 || roleId == 1) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
                };

                // Total over all pages
                total = api
                    .column(6)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                console.log(total);

                // Total over this page
                pageTotal = api
                    .column(6, { page: "current" })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer

                $(api.column(6).footer()).html("₹" + pageTotal.toFixed(2));
            }
        },
        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/bill_receipts/ajax_functions.php",
            type: "POST",
            data: function (d) {
                d.mode = "listBillComm";
                d.fromDate = $("#from_date").val();
                d.toDate = $("#to_date").val();
            },
            dataType: "json",
        },
        dom: "Blfrtip",
        buttons: [
            {
                extend: "print",
                text: '<span class="mdi mdi-file-print"></span> Print',
                title: "Bill Receipt",
                action: newexportaction1,

                exportOptions: {
                    modifier: {
                        search: "applied",
                        order: "applied",
                    },
                    columns: hidecolprintadv,
                },
                footer: true,
            },
        ],
        columnDefs: [
            {
                targets: [0, 5],
                orderable: false,
            },
            {
                targets: hidecolumnbill,
                visible: false,
            },
        ],

        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });
    /*
        $('.search_keybillcomm').on('click', function(e) {
            if ($('.searchKeywordbillcomm').val() != '') {
                dataRecordsbillcomm.search($('.searchKeywordbillcomm').val()).draw();
            } else { dataRecordsbillcomm.search('').columns().search('').draw(); }
        });*/

    $("#dataRecordsbillcomm").on("click", function () {
        dataRecordsbillcomm.draw();
    });
    $("#report_search").on("click", function () {
        dataRecordsbillcomm.draw();
    });

    /*
    $('#from_date').on('change', function() {
        dataRecordsbillcomm.draw();
    });

    $('#to_date').on('change', function() {
        dataRecordsbillcomm.draw();
    });*/

    var dataRecordsbillnoncomm = $("#noncom_billTable").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var roleId = $("#getSessRollId").val();

            if (roleId == 999 || roleId == 1) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
                };

                // Total over all pages
                total = api
                    .column(6)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                console.log(total);

                // Total over this page
                pageTotal = api
                    .column(6, { page: "current" })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer

                $(api.column(6).footer()).html("₹" + pageTotal.toFixed(2));
            }
        },
        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/bill_receipts/ajax_functions.php",
            type: "POST",
            data: function (d) {
                d.mode = "listBillNonComm";
                d.fromDate = $("#from_date").val();
                d.toDate = $("#to_date").val();
            },

            dataType: "json",
        },
        dom: "Blfrtip",
        buttons: [
            {
                extend: "print",
                text: '<span class="mdi mdi-file-print"></span> Print',
                title: "Bill Receipt",
                action: newexportaction1,

                exportOptions: {
                    modifier: {
                        search: "applied",
                        order: "applied",
                    },
                    columns: hidecolprintadv,
                },
                footer: true,
            },
        ],
        columnDefs: [
            {
                targets: [0, 5],
                orderable: false,
            },
            {
                targets: hidecolumnbill,
                visible: false,
            },
        ],

        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });

    /*
    $('.search_keybillnon').on('click', function(e) {
        if ($('.searchKeywordbillnon').val() != '') {
            dataRecordsbillnoncomm.search($('.searchKeywordbillnon').val()).draw();
        } else { dataRecordsbillnoncomm.search('').columns().search('').draw(); }
    });*/
    $("#dataRecordsbillcomm").on("click", function () {
        dataRecordsbillnoncomm.draw();
    });
    $("#report_search").on("click", function () {
        dataRecordsbillnoncomm.draw();
    });
    /*
    $('#from_date').on('change', function() {
        dataRecordsbillnoncomm.draw();
    });

    $('#to_date').on('change', function() {
        dataRecordsbillnoncomm.draw();
    });
*/

    //Multiple Advance

    var dataRecords = $("#com_advancemultiTable").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
            };

            // Total over all pages
            total = api
                .column(6)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);

            // Total over this page
            pageTotal = api
                .column(6, { page: "current" })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(6).footer()).html("₹" + pageTotal.toFixed(2));
        },
        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/advance/ajax_functions_commercial.php",
            type: "POST",
            data: { mode: "listAdvanceCommMulti" },

            dataType: "json",
        },
        columnDefs: [
            {
                targets: [0, 5],
                orderable: false,
            },
        ],

        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });
    var dataRecords = $("#noncom_advancemultiTable").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
            };

            // Total over all pages
            total = api
                .column(6)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);

            // Total over this page
            pageTotal = api
                .column(6, { page: "current" })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(6).footer()).html("₹" + pageTotal.toFixed(2));
        },
        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/advance/ajax_functions_noncommercial.php",
            type: "POST",
            data: { mode: "listAdvanceNonCommMulti" },
            dataType: "json",
        },
        columnDefs: [
            {
                targets: [0, 5],
                orderable: false,
            },
        ],

        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });
    //Multiple Bill
    var dataRecords = $("#com_billmultiTable").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
            };

            // Total over all pages
            total = api
                .column(6)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);

            // Total over this page
            pageTotal = api
                .column(6, { page: "current" })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(6).footer()).html("₹" + pageTotal.toFixed(2));
        },
        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/bill_receipts/ajax_functions.php",
            type: "POST",
            data: { mode: "listBillCommMulti" },
            dataType: "json",
        },
        columnDefs: [
            {
                targets: [0, 5],
                orderable: false,
            },
        ],

        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });
    var dataRecords = $("#noncom_billmultiTable").DataTable({
        footerCallback: function (row, data, start, end, display) {
            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i === "number" ? i : 0;
            };

            // Total over all pages
            total = api
                .column(6)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);

            // Total over this page
            pageTotal = api
                .column(6, { page: "current" })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(6).footer()).html("₹" + pageTotal.toFixed(2));
        },
        lengthChange: true,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        order: [],
        ajax: {
            url: "modules/bill_receipts/ajax_functions.php",
            type: "POST",
            data: { mode: "listBillNonCommMulti" },
            dataType: "json",
        },
        columnDefs: [
            {
                targets: [0, 5],
                orderable: false,
            },
        ],

        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        pageLength: 10,
    });

    function newexportaction1(e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
        dt.one("preXhr", function (e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
            dt.one("preDraw", function (e, settings) {
                // Call the original action function
                if (button[0].className.indexOf("buttons-copy") >= 0) {
                    $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf("buttons-excel") >= 0) {
                    $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)
                        ? $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config)
                        : $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf("buttons-csv") >= 0) {
                    $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config)
                        ? $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config)
                        : $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf("buttons-pdf") >= 0) {
                    $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config)
                        ? $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config)
                        : $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf("buttons-print") >= 0) {
                    $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                }
                dt.one("preXhr", function (e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    }
});
