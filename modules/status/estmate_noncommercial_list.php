<?php
error_reporting(0);
$typs = (isset($_GET['typ']) && $_GET['typ'] == 1) ? 'Commercial' : 'Non Commercial';
$typsid = (isset($_GET['typ']) && $_GET['typ'] == 1) ? 65 : 66;
$typscls = (isset($_GET['typ']) && $_GET['typ'] == 1) ? 'estimate_commercial' : 'estimate_noncommercial';


?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->



  <section class="content-header">
    <div class="container-fluid">

      <div class="mb-2 text-right">
      </div>
      <div class="row mb-2">

        <div class="col-sm-6">
          <h1>List <?php echo $typs; ?> Estimate</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">List <?php echo $typs; ?> Estimate</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid"><!-- ./row -->
      <div class="row">
        <div class="col-12">
        </div>
      </div>
      <!-- ./row -->
      <div class="row">
        <div class="col-12">
          <form id="bulkStatusForm">
            <div class="card card-lightblue color-palette card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-inprogress-tab" data-toggle="pill" href="#custom-tabs-one-inprogress" role="tab" aria-controls="custom-tabs-one-inprogress" aria-selected="false">Balance Receivable</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-complete-tab" data-toggle="pill" href="#custom-tabs-one-complete" role="tab" aria-controls="custom-tabs-one-complete" aria-selected="false">Completed</a>
                  </li>

                </ul>
              </div>
              <div class="card-body">
                <!-- <div class="row mb-3">
                  <div class="col-md-3">
                    <label>Select Date</label>
                    <input type="date" id="filter_date" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <label>Select Customer</label>
                    <select id="filter_customer" class="form-control">
                      <option value="">All Customers</option>
                      <?php
                      $custQuery = mysqli_query(
                        $GLOBALS["___mysqli_ston"],
                        "SELECT pk_cus_id, cus_name FROM " . CUSTOMER . " 
         WHERE visibility=1 ORDER BY cus_name ASC"
                      );
                      while ($cust = mysqli_fetch_assoc($custQuery)) {
                        echo '<option value="' . $cust['pk_cus_id'] . '">' . $cust['cus_name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-2 mt-4">
                    <button type="button" id="resetBtn" class="btn btn-secondary">
                      Reset
                    </button>
                  </div>
                </div> -->
                <div class="row mb-3">
  <div class="col-md-2">
    <label>From Date</label>
    <input type="text" id="from_date" class="form-control" placeholder="DD/MM/YYYY" autocomplete="off">
  </div>

  <div class="col-md-2">
    <label>To Date</label>
    <input type="text" id="to_date" class="form-control" placeholder="DD/MM/YYYY" autocomplete="off">
  </div>

  <div class="col-md-3">
    <label>Select Customer</label>
    <select id="filter_customer" class="form-control">
      <option value="">All Customers</option>
      <?php
      $custQuery = mysqli_query(
        $GLOBALS["___mysqli_ston"],
        "SELECT pk_cus_id, cus_name FROM " . CUSTOMER . " WHERE visibility=1 ORDER BY cus_name ASC"
      );
      while ($cust = mysqli_fetch_assoc($custQuery)) {
        echo '<option value="' . $cust['pk_cus_id'] . '">' . $cust['cus_name'] . '</option>';
      }
      ?>
    </select>
  </div>

  <div class="col-md-3">
    <label>Select Franchise</label>
    <select id="filter_franchise" class="form-control">
      <option value="">All Franchise</option>
      <?php
      $franchiseQuery = mysqli_query(
        $GLOBALS["___mysqli_ston"],
        "SELECT pk_cat_id, cat_name FROM " . CATEGORY . " WHERE visibility=1 ORDER BY cat_name ASC"
      );
      while ($franchise = mysqli_fetch_assoc($franchiseQuery)) {
        echo '<option value="' . $franchise['pk_cat_id'] . '">' . $franchise['cat_name'] . '</option>';
      }
      ?>
    </select>
  </div>

  <div class="col-md-2 mt-4">
    <button type="button" id="resetBtn" class="btn btn-secondary">Reset</button>
  </div>
</div>

                <button type="button" id="bulkUpdateBtn" class="btn btn-primary">Update Status of Selected</button>
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane active show" id="custom-tabs-one-inprogress" role="tabpanel" aria-labelledby="custom-tabs-one-inprogress-tab">
                    <table id="inprogessestimatenoncomm" class="table table-bordered dataTable  col-12">
                      <thead>
                        <tr>
                          <th>
                            <input type="checkbox" id="selectAll">
                          </th>
                          <th>S.No </th>
                          <th>Estimate No</th>
                          <th>Customer</th>
                          <th>Customer Code </th>
                          <th>Date</th>
                          <th>Total Amount(₹)</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane " id="custom-tabs-one-complete" role="tabpanel" aria-labelledby="custom-tabs-one-complete-tab">
                    <table id="completeestimatenoncomm" class="table table-bordered  dataTable  col-12" style="width:100%">
                      <thead>
                        <tr>
                          <th>S.No </th>
                          <th>Estimate No</th>
                          <th>Customer</th>
                          <th>Customer Code </th>
                          <th>Date</th>
                          <th>Total Amount(₹)</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
              <!-- /.card -->
            </div>
        </div>

        </form>
      </div>
      <!-- /.row --><!-- /.card --><!-- /.card -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<script src="assets/dist/js/status_table_ajax.js?version=<?php echo md5_file('assets/dist/js/status_table_ajax.js'); ?>"></script>



<script>
  /*
  $(".nav-link").removeClass("active");
  $(".nav-item").removeClass("menu-open");
    
  $(".estimate").addClass("menu-open");
  $(".estimate_noncommercial.nav-link").addClass("active");*/
</script>
<script>
  $(document).ready(function() {

    // Select All checkboxes
    $('#selectAll').on('click', function() {
      $('#inprogessestimatenoncomm .estimateChk').prop('checked', $(this).prop('checked'));
    });
    $('#selectAllComplete').on('click', function() {
      $('#salesOrdercompleteTable .estimateChk').prop('checked', $(this).prop('checked'));
    });

    // $('#filter_date').on('change', function() {
    //   $('#inprogessestimatenoncomm').DataTable().ajax.reload();
    // });
    // $('#filter_customer').select2({
    //   placeholder: "Search Customer",
    //   allowClear: true,
    //   width: '100%'
    // });
    // $('#filter_customer').on('change', function() {
    //   $('#inprogessestimatenoncomm').DataTable().ajax.reload();
    // });

    // $('#resetBtn').on('click', function(e) {
    //   e.preventDefault();

    //   $('#filter_date').val('');
    //   $('#filter_customer').val(null).trigger('change');


    //   $('#inprogessestimatenoncomm').DataTable().ajax.reload(null, true);
    // });
    $('#from_date, #to_date').on('change changeDate', function() {
  $('#inprogessestimatenoncomm').DataTable().ajax.reload();
});

$('#filter_customer').select2({
  placeholder: "Search Customer",
  allowClear: true,
  width: '100%'
});

$('#filter_franchise').select2({
  placeholder: "Search Franchise",
  allowClear: true,
  width: '100%'
});

$('#filter_customer, #filter_franchise').on('change', function() {
  $('#inprogessestimatenoncomm').DataTable().ajax.reload();
});

$('#resetBtn').on('click', function(e) {
  e.preventDefault();

  $('#from_date').val('');
  $('#to_date').val('');
  $('#filter_customer').val(null).trigger('change');
  $('#filter_franchise').val(null).trigger('change');

  $('#inprogessestimatenoncomm').DataTable().ajax.reload(null, true);
});


    // Bulk button click
    $('#bulkUpdateBtn').on('click', function() {
      var selected = [];
      $('.estimateChk:checked').each(function() {
        selected.push($(this).val());
      });

      if (selected.length === 0) {
        alert('Please select at least one estimate!');
        return;
      }

      // Example: pass to a custom AJAX or open bulk update modal
      // Here just showing an alert
      // alert('Selected IDs for bulk update: ' + selected.join(','));

      // If you want, you can do:
      // window.location.href = 'index.php?erp=34&typ=1&id=' + selected.join(',');
      var bulkLink = $('<a>', {
        href: 'index.php?erp=34&typ=2&id=' + selected.join(','),
        style: 'display:none'
      }).appendTo('body');

      bulkLink[0].click(); // Trigger the click
      bulkLink.remove();
    });

  });
</script>
<style type="text/css">
  .dataTables_wrapper {
    margin-top: 14px;
  }
</style>
