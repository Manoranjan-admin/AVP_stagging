$(document).ready(function () {
     var roleId = $("#getSessRollId").val();
    var hidecolprintadv = [];
     var hidecolumnadvance = [];
    if (roleId == 999 || roleId == 1) {
        hidecolprintadv = [0, 1, 2, 3, 4, 5, 6];
    } else {
        hidecolprintadv = [0, 1, 2, 3, 4];
        hidecolumnadvance = [7];
    }
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
            url: "modules/advance_split_pay/ajax_function.php",
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
            url: "modules/advance_split_pay/ajax_function.php",
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
  
    $("#report_reset").on("click", function () {
        dataRecordsadvnoncomm.draw();
    });
    $("#report_search").on("click", function () {
        dataRecordsadvnoncomm.draw();
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
