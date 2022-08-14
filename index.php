<?php
define('BASE_URL', "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
require('config/functions.php');
require('db/conn.php');
require('class/base.php');


if (isset($_SESSION['is_logged_in'])) {
  // Logged In
  switch ($_SESSION['user']->access_id) {
      // Admin
    case 1:
      include('layout/admin/header.php');
      include('layout/admin/body.php');
      include('layout/modal.php');
      include('layout/admin/footer.php');
      break;

      // Barangay Official
    case 2:
      include('layout/barangay_official/header.php');
      include('layout/barangay_official/body.php');
      include('layout/modal.php');
      include('layout/barangay_official/footer.php');
      break;

      // Resident
    default:
      include('layout/resident/header.php');
      include('layout/resident/body.php');
      include('layout/modal.php');
      include('layout/resident/footer.php');
      break;
  }
} else {
  // Landing page here
   include('layout/admin/header.php');
  include('layout/admin/body.php');
  include('layout/modal.php');
  include('layout/admin/footer.php');
}
