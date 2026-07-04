<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("location: login/");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERP | <?php echo !empty($Title) ? $Title : "Home"; ?></title>

    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>assets/images/favicon.png" sizes="16x16">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo BASE_URL; ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/dist/css/custom/style.css">

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <link href="<?php echo BASE_URL; ?>assets/plugins/chosen/chosen.css" rel="stylesheet">

    <link href="<?php echo BASE_URL; ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet">

    <link href="<?php echo BASE_URL; ?>assets/plugins/datatablesnew/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo BASE_URL; ?>assets/plugins/datatablesnew/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo BASE_URL; ?>assets/plugins/datatablesnew/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/datatable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/datepicker/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/datepicker/css/bootstrap-datepicker.min.css" />

    <!-- jQuery -->
    <script src="<?php echo BASE_URL; ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo BASE_URL; ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/datatable/js/jquery.dataTables.min.js"></script>

    <script src="<?php echo BASE_URL; ?>assets/plugins/chosen/chosen.jquery.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/jquery_validation/jquery.validate.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/jquery_validation/additional-methods.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/select2/js/select2.min.js"></script>

    <script src="<?php echo BASE_URL; ?>assets/plugins/datatablesnew/dataTables.buttons.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatablesnew/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatablesnew/jszip.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatablesnew/pdfmake.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatablesnew/vfs_fonts.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatablesnew/buttons.html5.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatablesnew/buttons.print.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatablesnew/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <style>
        .searchBox {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, 50%);
            background: #FFCB05;
            height: 40px;
            border-radius: 40px;
            padding: 0 6px;
            width: 240px;
        }

        .searchButton {
            color: white;
            float: right;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #2f3640;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.4s;
        }

        .searchInput {
            border: none;
            background: none;
            outline: none;
            float: left;
            padding: 0 6px;
            color: white;
            font-size: 16px;
            transition: 0.4s;
            line-height: 40px;
            width: 150px;
        }

        .sidebar-cta {
            background: #1093da;
            color: #fecf2d;
            text-align: center;
            border-radius: 23px;
            font-size: 127%;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        .sidebar-cta-content {
            padding: 5px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li>
                    <div class="searchBox">
                        <form method="GET" action="">
                            <input class="searchInput" type="hidden" name="erp" value="104">
                            <input class="searchInput" type="text" name="ser" placeholder="Search Order"
                                value="<?php echo isset($_GET['ser']) ? htmlspecialchars($_GET['ser']) : ''; ?>">
                            <button class="searchButton" href="#">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                        <?php
                        $roleIdval = "";
                        if (isset($_SESSION['roleId'])) {
                            $roleIdval = $_SESSION['roleId'];
                        }
                        ?>
                        <input type="hidden" name="getSessRollId" id="getSessRollId" value="<?php echo $roleIdval; ?>">
                    </div>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <p style="padding:5px"><i class="far fa-list"></i></p>
                </li>
                <li class="nav-item dropdown">
                    <p style="padding:5px"><?php echo $_SESSION['user_name'] ?? ''; ?></p>
                </li>
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
                <img src="<?php echo BASE_URL; ?>assets/images/AVogo.png" alt="Admin" class="img-fluid">
            </a>
            <?php
            $currentERP = basename($_SERVER['REQUEST_URI']);
            ?>

            <?php
            // REMOVED: session_start();  <-- This was causing the error!
            // Session is already started at the top of this file.

            // Fetch parent menus assigned to the user
            $parentQuery = "
                SELECT em.*
                FROM erp_menu em
                JOIN user_menu_access uma 
                    ON FIND_IN_SET(em.pk_menu_id, uma.menu_id) > 0
                WHERE uma.fk_user_id = '" . mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['user_id'] ?? '') . "'
                AND em.fk_parent_id = 0
                AND em.menu_visibility = 1
                ORDER BY em.menu_order ASC";

            $parentResult = mysqli_query($GLOBALS["___mysqli_ston"], $parentQuery);
            ?>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2" id="sidebar-scrollcs">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Dashboard always visible -->
                        <li class="nav-item menu-open">
                            <a href="index.php" class="nav-link active">
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <!-- Dynamic parent menus -->
                        <?php
                        if ($parentResult && mysqli_num_rows($parentResult) > 0) {
                            while ($parentData = mysqli_fetch_array($parentResult)) {
                                $parentId = $parentData['pk_menu_id'];
                                $parentMenuParams = $parentData['menu_link'] != '#' ? "mnu={$parentData['pk_menu_id']}" : '';
                        ?>
                                <li class="nav-item">
                                    <a href="<?php echo $parentData['menu_link']; ?>&<?php echo $parentMenuParams; ?>"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-list"></i>
                                        <p>
                                            <?php echo $parentData['menu_name']; ?>
                                            <i class="fas fa-angle-right right"></i>
                                        </p>
                                    </a>
                                    <!-- Fetch all submenus from erp_menu directly -->
                                    <?php
                                    $subQuery = "SELECT *
                                                    FROM erp_menu
                                                    WHERE fk_parent_id = '" . mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $parentId) . "'
                                                    AND menu_visibility = 1
                                                    ORDER BY menu_order ASC";
                                    $subResult = mysqli_query($GLOBALS["___mysqli_ston"], $subQuery);
                                    if ($subResult && mysqli_num_rows($subResult) > 0) {
                                    ?>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <center><a href="#">Select Below</a></center>
                                            </li>
                                            <?php
                                            while ($subData = mysqli_fetch_array($subResult)) {
                                            ?>
                                                <li class="nav-item">
                                                    <a href="<?php echo $subData['menu_link']; ?>&mnu=<?php echo $subData['pk_menu_id']; ?>" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p><?php echo $subData['menu_name']; ?></p>
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
                        } else {
                            echo "<li class='nav-item'><p>No menus assigned to you.</p></li>";
                        }
                        ?>
                    </ul>

                    <div class="sidebar-cta">
                        <div class="sidebar-cta-content">
                            <strong class="d-inline-block">AV Digital Press</strong>
                            <div class="text-sm">
                                <?php echo $_SESSION['user_name'] ?? ''; ?>
                                <div class="d-grid">
                                    <a href="logout.php" class="btn btn-warning" target="_blank">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </aside>

        <script>
            $(document).ready(function() {
                const urlParams = new URLSearchParams(window.location.search);
                const menu_id = urlParams.get('mnu');

                if (!menu_id) return;

                $(document).on('click', 'a', function(e) {
                    let href = $(this).attr('href');

                    // Ignore empty, hash-only, javascript, logout
                    if (!href || href === '#' || href.startsWith('#') || href.startsWith('javascript') || href.includes('logout')) {
                        return;
                    }

                    // If already has mnu, do nothing
                    if (href.includes('mnu=')) {
                        return;
                    }

                    e.preventDefault();

                    // Remove hash part if exists
                    let cleanHref = href.split('#')[0];
                    let separator = cleanHref.includes('?') ? '&' : '?';
                    window.location.href = cleanHref + separator + 'mnu=' + menu_id;
                });
            });
        </script>