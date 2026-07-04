<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ( !isset($_SESSION['user_id'])) {
   header("location: login/");
   exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ERP | <?php if(empty($Title)){echo "Home";}else{echo $Title; }?></title>
  
  <link rel="icon" type="image/png" href="assets/images/favicon.png" sizes="16x16">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="assets/dist/css/custom/style.css">
  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <link href="assets/plugins/chosen/chosen.css" rel="stylesheet">

  <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/chosen/chosen.jquery.js"></script>
  <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">
  <script src="assets/plugins/select2/js/select2.min.js"></script>
   <!-- jQuery Validation -->
  <script src="assets/plugins/jquery_validation/jquery.validate.min.js"></script>
  <script src="assets/plugins/jquery_validation/additional-methods.min.js"></script>

  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
 <!--  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div> -->
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="logout.php">
          <i class="far fa-sign-out"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-white">
    <!-- Brand Logo -->
    <a href="index.php" class="text-center brand-link">
       <img src="assets/images/AVogo.png" alt="Admin" class=" img-fluid" style=" ">
      <!--<span class="brand-text font-weight-light">ERP INVOICE</span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item master">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Master
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview master_customer">
              <li class="nav-item">
                <a href="index.php?erp=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                </a>
              </li>
            </ul>
           <!-- <ul class="nav nav-treeview master_uom">
              <li class="nav-item">
                <a href="index.php?erp=7" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>UOM</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_product_category">
              <li class="nav-item">
                <a href="index.php?erp=9" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
            </ul>-->
           <!-- <ul class="nav nav-treeview master_innersheet">
              <li class="nav-item">
                <a href="index.php?erp=22" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inner Sheet</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_specialeffects">
              <li class="nav-item">
                <a href="index.php?erp=25" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Special Effects</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_size">
              <li class="nav-item">
                <a href="index.php?erp=28" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Size</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_bag">
              <li class="nav-item">
                <a href="index.php?erp=35" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bag</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_box">
              <li class="nav-item">
                <a href="index.php?erp=38" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Box</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_pad">
              <li class="nav-item">
                <a href="index.php?erp=41" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pad</p>
                </a>
              </li>
            </ul>-->
           <!-- <ul class="nav nav-treeview master_items">
              <li class="nav-item">
                <a href="index.php?erp=50" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Item</p>
                </a>
              </li>
            </ul>-->
          <!-- <ul class="nav nav-treeview master_product">
              <li class="nav-item">
                <a href="index.php?erp=4" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_commproduct">
              <li class="nav-item">
                <a href="index.php?erp=47" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
            </ul>-->
          </li>
          <li class="nav-item items">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Items
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview master_items">
              <li class="nav-item">
                <a href="index.php?erp=50&typ=1&its=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Commercial</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_items">
              <li class="nav-item">
                <a href="index.php?erp=50&typ=2&its=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_items">
              <li class="nav-item">
                <a href="index.php?erp=50&typ=2&its=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_items">
              <li class="nav-item">
                <a href="index.php?erp=50&typ=2&its=3" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Size</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_items">
              <li class="nav-item">
                <a href="index.php?erp=50&typ=2&its=4" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inner Sheet</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_items">
              <li class="nav-item">
                <a href="index.php?erp=50&typ=2&its=5" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Special Effects</p>
                </a>
              </li>
            </ul>
           
            <ul class="nav nav-treeview master_items">
              <li class="nav-item">
                <a href="index.php?erp=50&typ=2&its=6" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bag</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_items">
              <li class="nav-item">
                <a href="index.php?erp=50&typ=2&its=7" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Box</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview master_items">
              <li class="nav-item">
                <a href="index.php?erp=50&typ=2&its=8" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pad</p>
                </a>
              </li>
            </ul>
            </li>
          <li class="nav-item estimate">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Estimate
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview estimate_commercial">
              <li class="nav-item">
                <a href="index.php?erp=12&typ=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Commercial</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview estimate_noncommercial">
              <li class="nav-item">
                <a href="index.php?erp=71&typ=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Non Commercial</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item invoice">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Invoice
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview invoice_commercial">
              <li class="nav-item">
                <a href="index.php?erp=75" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Commercial</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview invoice_noncommercial">
              <li class="nav-item">
                <a href="index.php?erp=79" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Non Commercial</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item advance">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Advance
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview advance_commercial">
              <li class="nav-item">
                <a href="index.php?erp=83&type=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Commercial</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview advance_noncommercial">
              <li class="nav-item">
                <a href="index.php?erp=83&type=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Non Commercial</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item billrecipt">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Bill Receipts
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview billrecipt_commercial">
              <li class="nav-item">
                <a href="index.php?erp=88&type=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Commercial</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview billrecipt_noncommercial">
              <li class="nav-item">
                <a href="index.php?erp=88&type=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Non Commercial</p>
                </a>
              </li>
            </ul>
          </li>
          
           <li class="nav-item billrecipt">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Reports
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview billrecipt_commercial">
              <li class="nav-item">
                <a href="index.php?erp=91" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview billrecipt_commercial">
              <li class="nav-item">
                <a href="index.php?erp=93" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outstanding</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview billrecipt_noncommercial">
              <li class="nav-item">
                <a href="index.php?erp=92&typ=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today's Com Estimate</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?erp=92&typ=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today's Com Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?erp=92&typ=3" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today's Com Advances</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?erp=92&typ=4" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today's Com Receipts</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="index.php?erp=92&typ=5" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today's Non-Com Estimate</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?erp=92&typ=6" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today's Non-Com Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?erp=92&typ=7" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todays Non-Com Advances</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?erp=92&typ=8" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today's Non-Com Receipts</p>
                </a>
              </li>
            </ul>
          </li>
           <!-- <ul class="nav nav-treeview sales_customer">
              <li class="nav-item">
                <a href="index.php?erp=12" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job Order</p>
                </a>
              </li>
            </ul>-->
          <!-- <ul class="nav nav-treeview estimate">
              <li class="nav-item">
                <a href="index.php?erp=19" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estimate </p>
                </a>
              </li>
            </ul>-->
          <!--  <ul class="nav nav-treeview sales_invoice">
              <li class="nav-item">
                <a href="index.php?erp=17" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Invoice</p>
                </a>
              </li>
            </ul>
          <ul class="nav nav-treeview orderpayment">
              <li class="nav-item">
                <a href="index.php?erp=58" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Payment </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item report">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Report
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview orderreport">
              <li class="nav-item">
                <a href="index.php?erp=44" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Order Report</p>
                </a>
              </li>
            </ul>
           <ul class="nav nav-treeview customerreport">
              <li class="nav-item">
                <a href="index.php?erp=53" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Report </p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview outstandreport">
              <li class="nav-item">
                <a href="index.php?erp=56" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outstanding Report </p>
                </a>
              </li>
              </ul> </li>-->
            
         
      <!--    <li class="nav-item status">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
              Status
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview orderstatus">
              <li class="nav-item">
                <a href="index.php?erp=34" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Status</p>
                </a>
              </li>
            </ul>
          
            
          </li>-->
          
          <!-- Dynamic menu from DB--->
          <?php
		   $query = "SELECT * FROM `erp_menu` where fk_parent_id=0 ORDER BY menu_order ASC ";
           $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		   $estimatecomm=array();	
           if(mysqli_num_rows($result)  > 0)
		   {
			   $counter=1;
			   $openStatus='';
			   //menu-is-opening menu-open
			   while($data= mysqli_fetch_array($result)) 
			   {
								
			  ?>
              <li class="nav-item master">
                  <a href="<?php echo $data["menu_link"];?>" class="nav-link">
                      <i class="nav-icon fas fa-user"></i>
                      <p>
                        <?php echo $data["menu_name"];?>
                        <i class="fas fa-angle-right right"></i>
                      </p>
                 </a>
                 <!-- Sub Menu-->
                   <?php
                   $squery = "SELECT * FROM `erp_menu` where fk_parent_id='".$data['pk_menu_id']."' ORDER BY menu_order ASC ";
                   $sresult = mysqli_query($GLOBALS["___mysqli_ston"], $squery);
                   if(mysqli_num_rows($sresult)  > 0)
                   {
                    ?>
                  	<ul class="nav nav-treeview ">
                       <?php
                       $subopenStatus='';
                       //menu-is-opening menu-open
                       while($sdata= mysqli_fetch_array($sresult)) 
                       {
						?>
                          <li class="nav-item">
                            <a href="<?php echo $sdata["menu_link"];?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p><?php echo $sdata["menu_name"];?></p>
                            </a>
                          </li>
                         <?php
					   }
					   ?>
                    </ul>
                    <?php
				   }
				   ?>
             </li>
              
			  <?php
			   }
		   }
		  ?>
          <!-- END DYnamic menu-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>