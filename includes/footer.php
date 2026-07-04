<!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://capdigisoft.com">CDS</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.11.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Bootstrap 4 -->
<script src="<?php echo BASE_URL; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script>
 --><!-- Sparkline -->
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->
<!--<script src="<?php echo BASE_URL; ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>-->

<!-- JQVMap -->
<script src="<?php echo BASE_URL; ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<!-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<script src="<?php echo BASE_URL; ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo BASE_URL; ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo BASE_URL; ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo BASE_URL; ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL; ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo BASE_URL; ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo BASE_URL; ?>assets/dist/js/pages/dashboard.js"></script> -->

<script src="<?php echo BASE_URL; ?>assets/sweetalert/js/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/datepicker/css/jquery.datetimepicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/datepicker/css/jquery.datetimepicker.min.css">

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/datepicker/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/datepicker/js/jquery.datetimepicker.full.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/datepicker/js/jquery.datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/datepicker/js/jquery.datetimepicker.min.js"></script>





<script type="text/javascript">
var dateNow = new Date();
/*$('#txt_pi_date').datepicker({
  dateFormat: 'dd-mm-yy',
     defaultDate: new Date() 
});*/
var disableddate = new Date();

disableddate.setDate(disableddate.getDate());



//$('#txt_pi_date').datepicker({format: "dd/mm/yyyy","setDate": dateNow, startDate: disableddate,endDate: disableddate });
$("#txt_pi_date").datepicker({
  format: "dd/mm/yyyy"
    }).datepicker("setDate", dateNow);
/*$("#txt_pi_date").datepicker({
        dateFormat: 'd/m/Y'
    }).datepicker('setDate', dateNow)*/

    $('#txt_delivery_date').datepicker({format: "dd/mm/yyyy",startDate: disableddate }).datepicker('setDate', dateNow); 
/*
$('#txt_delivery_date').datetimepicker({
  format:'d/m/Y',
  timepicker:false,
   minDate:0
});*/
$('#fromDate').datetimepicker({
  format:'d/m/Y',
   timepicker:false,
  // minDate:0
});
$('#toDate').datetimepicker({
  format:'d/m/Y',
   timepicker:false,
  // minDate:0
});

$('#from_date').datepicker({
     format: 'dd/mm/yyyy',
    dateFormat: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true,
     onSelect: function(selectedDate) {
     $('#to_date').datepicker('option', 'minDate', selectedDate);
     if (typeof dataRecords !== 'undefined' && dataRecords && typeof dataRecords.draw === 'function') {
       dataRecords.draw();
     }
    //$('#to_date').datepicker('option', {minDate: minDate})
    }

});
$('#to_date').datepicker({
  format: 'dd/mm/yyyy',

    minDate: "<?php echo date('m/d/Y', strtotime('-1 months')); ?>",
    dateFormat: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true
});

$('#from_date_filter').datepicker({
     format: 'dd/mm/yyyy',
    dateFormat: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true,
	maxDate: '+0d',
    onSelect: function(selectedDate) {
     $('#to_date').datepicker('option', 'minDate', selectedDate);
    // dataRecords.draw();
    //$('#to_date').datepicker('option', {minDate: minDate})
    }

});
$('#to_date_filter').datepicker({
  format: 'dd/mm/yyyy',

    minDate: "<?php echo date('d/m/Y', strtotime('-1 months')); ?>",
    dateFormat: 'dd/mm/yyyy',
	maxDate: '+0d',
    autoclose: true,
    todayHighlight: true
});

$('#from_date_cus').datepicker({
  format: 'dd/mm/yyyy',
   /* onSelect: function(selectedDate) {
     $('#to_date').datepicker('option', 'minDate', selectedDate);
     dataRecords.draw();
    //$('#to_date').datepicker('option', {minDate: minDate})
    }*/
   
   
    
}).val('');
$('#to_date_cus').datepicker({
  format: 'dd/mm/yyyy',

 
}).val('');




</script>
</body>
</html>
