<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= SYSTEM_NAME; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="css/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="css/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="css/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="css/select2/dist/css/select2.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/skins/skin-green.min.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script>
  var base_url = "<?= BASE_URL; ?>";
</script>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="<?= BASE_URL; ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>EB</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?= SYSTEM_NAME_SHORT; ?></b></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="assets/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Alexander Pierce</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    Alexander Pierce - Web Developer
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-sm btn-success btn-flat btn-view" name="edit_account" value="1"> <i class="fa fa-user-circle"></i> Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="#" class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#modal"><i class="fa fa-sign-out"></i> Sign out</a>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Alexander Pierce</p>
            <!-- Status -->
            <a href="#" id="connection"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          MENU
          <!-- Optionally, you can add icons to the links -->
          <li class="active"><a href="#" class="btn-view" name="admin/home"><i class="fa fa-home"></i> <span>Home</span></a></li>
          <li><a href="#" class="btn-view" name="admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li><a href="#" class="btn-view" name="admin/resident"><i class="fa fa-address-card"></i> <span>Residents</span></a></li>
          <li><a href="#" class="btn-view" name="admin/request"><i class="fa fa-files-o"></i> <span>Requests</span></a></li>
          <li><a href="#" class="btn-view" name="admin/blotter"><i class="fa fa-address-book"></i> <span>Blotter</span></a></li>
          <li><a href="#" class="btn-view" name="admin/announcement"><i class="fa fa-bullhorn"></i> <span>Announcement</span></a></li>
          <li><a href="#" class="btn-view" name="admin/barangay_official"><i class="fa fa-users"></i> <span>Barangay Officials</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-cog"></i> <span>System</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-cogs"></i> Request Types</a></i></li>
              <li><a href="#"><i class="fa fa-cogs"></i> Barangay Positions</a></i></li>
              <li><a href="#"><i class="fa fa-cogs"></i> Zones </a></i></li>
              <li><a href="#"><i class="fa fa-cogs"></i> Access</a></i></li>
              <li><a href="#" class="btn-view" name="admin/barangay_offiscial"><i class="fa fa-cogs"></i> Logs</a></i></li>
            </ul>
          </li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content container-fluid">