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
  <link rel="icon" type="image/x-icon" href="assets/favicon_v2.ico" />
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

<body class="hold-transition skin-green layout-top-nav">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="<?= BASE_URL; ?>" class="navbar-brand" style="display:flex">

              <img src="assets/img/brgy_logo.png" alt="logo" style="height: 46px; margin-left: 6vw; margin-top: -14px; margin-right: 7px;" id="logo">
              <b><?= SYSTEM_NAME_SHORT; ?></b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#" class="btn-view" name="resident/home"><i class="fa fa-home"></i> Home</a></li>
              <li><a href="#" class="btn-view" name="resident/requests/list"> My Requests</a></li>
              <li><a href="#" class="btn-view" name="resident/announcement"> Announcement</a></li>
              <li><a href="#" class="btn-view" name="resident/gallery"> Gallery</a></li>
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-handshake-o"></i> Online Services
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#" class="btn-view" name="resident/business">
                          <i class="fa fa-briefcase btn-view"></i> Business Clearance
                        </a>
                      </li>
                      <li>
                        <a href="#" class="btn-view" name="resident/barangay">
                          <i class="fa fa-files-o btn-view"></i> Barangay Clearance
                        </a>
                      </li>
                      <li>
                        <a href="#" class="btn-view" name="resident/id">
                          <i class="fa fa-id-card-o btn-view"></i> Barangay ID
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#" class="btn-view" name="resident/about_us"><i class="fa fa-info-circle"></i> About Us</a></li>

              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="files/profile/<?= $user->image; ?>" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?= ucfirst($user->first_name) . ' ' . ucfirst($user->last_name); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="files/profile/<?= $user->image; ?>" class="img-circle" alt="User Image">

                    <p>
                      <?= ucfirst($user->first_name) . ' - ' . ucfirst($user->access_name); ?>
                      <small>Member since <?= ucfirst(date_format(date_create($user->created_date), 'M. d, Y')); ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-sm btn-success btn-flat btn-edit" name="resident/profile" value="<?= $user->id ?>"> <i class="fa fa-user-circle"></i> Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-sm btn-success btn-flat" data-toggle="modalz" data-target="#modalz"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content container-fluid">