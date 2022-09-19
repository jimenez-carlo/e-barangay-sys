<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title><?= SYSTEM_NAME; ?></title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon_v2.ico" />
  <!-- daterange picker -->
  <link rel="stylesheet" href="css/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="css/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="css/select2/dist/css/select2.min.css">
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/landing_page.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">


</head>
<script>
  var base_url = "<?= BASE_URL; ?>";
</script>

<body>
  <!-- Responsive navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container px-5">
      <div class="logo">
        <a href="index.php"> <img src="assets/img/brgy_logo.png" alt="logo"> </a>
      </div>
      <a class="navbar-brand" href="index.php">E-Barangay</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link btn-view" href="#" name="landing_page/announcements">Announcement</a></li>
          <li class="nav-item"><a class="nav-link btn-view" href="#" name="landing_page/gallery">Gallery</a></li>
          <li class="nav-item"><a class="nav-link btn-view" href="#" name="landing_page/about_us">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modal">Login</a></li>
          <li class="nav-item"><a class="nav-link btn-view" href="#" name="landing_page/register">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>