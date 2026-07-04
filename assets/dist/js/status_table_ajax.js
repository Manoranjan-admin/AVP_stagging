$(document).ready(function () {
  var dataRecords = $("#salesOrderTable").DataTable({
    lengthChange: true,
    processing: true,
    serverSide: true,
    processing: true,
    serverSide: true,
    serverMethod: "post",
    order: [],
    ajax: {
      url: "modules/status/ajax_functions.php",
      type: "POST",
      // data: { mode: 'listEstimateComm', filter_date:  },
      // data: function (d) {
      //     d.mode = 'listEstimateComm';

      //     var filterDate = $('#filter_date').val();

      //     if (filterDate) {
      //         d.filter_date = filterDate;
      //     }
      // },
      // data: function (d) {
      //     d.mode = 'listEstimateComm';

      //     var filterDate = $('#filter_date').val();
      //     var filterCustomer = $('#filter_customer').val();

      //     if (filterDate) {
      //         d.filter_date = filterDate;
      //     }

      //     if (filterCustomer) {
      //         d.filter_customer = filterCustomer;
      //     }
      // },
      data: function (d) {
        d.mode = "listEstimateComm";

        var fromDate = $("#from_date").val();
        var toDate = $("#to_date").val();
        var filterCustomer = $("#filter_customer").val();
        var filterFranchise = $("#filter_franchise").val();

        if (fromDate) d.from_date = fromDate;
        if (toDate) d.to_date = toDate;
        if (filterCustomer) d.filter_customer = filterCustomer;
        if (filterFranchise) d.filter_franchise = filterFranchise;
      },

      dataType: "json",
    },

    columnDefs: [
      {
        targets: [0, 7, 8],
        orderable: false,
      },
    ],

    lengthMenu: [
      [10, 50, 100, -1],
      [10, 50, 100, "All"],
    ],
    pageLength: 10,
  });
  // var dataRecords = $('#salesOrderTable').DataTable({
  //     lengthChange: true,
  //     processing: true,
  //     serverSide: true,
  //     serverMethod: 'post',
  //     order: [],

  //     ajax: {
  //         url: "modules/status/ajax_functions.php",
  //         type: "POST",
  //         data: { mode: 'listEstimateComm' },
  //         dataType: "json"
  //     },

  //     columns: [
  //         {
  //             data: null,
  //             orderable: false,
  //             render: function (data, type, row) {
  //                 return `<input type="checkbox" class="rowCheckbox" value="${row[1]}">`;
  //             }
  //         },
  //         { data: 0 },
  //         { data: 1 },
  //         { data: 2 },
  //         { data: 3 },
  //         { data: 4 },
  //         { data: 5 },
  //         { data: 6 },
  //         { data: 7 }
  //     ],

  //     columnDefs: [
  //         { targets: [0, 7, 8], orderable: false }
  //     ],

  //     lengthMenu: [
  //         [10, 50, 100, -1],
  //         [10, 50, 100, "All"]
  //     ],

  //     pageLength: 10,

  //     dom: '<"d-flex justify-content-between align-items-center mb-2"lBf>rtip',

  //     buttons: [
  //         {
  //             text: 'Update Status',
  //             className: 'btn btn-primary',
  //             action: function () {
  //                 updateSelectedStatus();
  //             }
  //         }
  //     ]
  // });

  var dataRecords = $("#salesOrdercompleteTable").DataTable({
    lengthChange: true,
    processing: true,
    serverSide: true,
    processing: true,
    serverSide: true,
    serverMethod: "post",
    order: [],
    ajax: {
      url: "modules/status/ajax_functions.php",
      type: "POST",
      data: { mode: "listEstimateCommcomplete" },
      dataType: "json",
    },
    columnDefs: [
      {
        targets: [0, 6, 7],
        orderable: false,
      },
    ],

    lengthMenu: [
      [10, 50, 100, -1],
      [10, 50, 100, "All"],
    ],
    pageLength: 10,
  });

  var dataRecords = $("#inprogessestimatenoncomm").DataTable({
    lengthChange: true,
    processing: true,
    serverSide: true,
    processing: true,
    serverSide: true,
    serverMethod: "post",
    order: [],
    ajax: {
      url: "modules/status/ajax_functions.php",
      type: "POST",
      // data: { mode: 'listEstimateNonComm' },
      // data: function (d) {
      //     d.mode = 'listEstimateNonComm';

      //     var filterDate = $('#filter_date').val();
      //     var filterCustomer = $('#filter_customer').val();

      //     if (filterDate) {
      //         d.filter_date = filterDate;
      //     }

      //     if (filterCustomer) {
      //         d.filter_customer = filterCustomer;
      //     }
      // },
      data: function (d) {
        d.mode = "listEstimateNonComm";

        var fromDate = $("#from_date").val();
        var toDate = $("#to_date").val();
        var filterCustomer = $("#filter_customer").val();
        var filterFranchise = $("#filter_franchise").val();

        if (fromDate) d.from_date = fromDate;
        if (toDate) d.to_date = toDate;
        if (filterCustomer) d.filter_customer = filterCustomer;
        if (filterFranchise) d.filter_franchise = filterFranchise;
      },

      dataType: "json",
    },
    columnDefs: [
      {
        targets: [0, 6, 7],
        orderable: false,
      },
    ],

    lengthMenu: [
      [10, 50, 100, -1],
      [10, 50, 100, "All"],
    ],
    pageLength: 10,
  });
  var dataRecords = $("#completeestimatenoncomm").DataTable({
    lengthChange: true,
    processing: true,
    serverSide: true,
    processing: true,
    serverSide: true,
    serverMethod: "post",
    order: [],
    ajax: {
      url: "modules/status/ajax_functions.php",
      type: "POST",
      data: { mode: "listEstimateNonCommComplete" },
      dataType: "json",
    },
    columnDefs: [
      {
        targets: [0, 6, 7],
        orderable: false,
      },
    ],

    lengthMenu: [
      [10, 50, 100, -1],
      [10, 50, 100, "All"],
    ],
    pageLength: 10,
  });
});
