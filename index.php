<?php
require('config/functions.php');
require('db/conn.php');
require('class/base.php');
require('class/user.php');

if (isset($_SESSION['is_logged_in'])) {
  $userObj = new User($conn);
  $user = $userObj->get_user($_SESSION['user']->id);
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
  include('layout/landing_page/header.php');
  include('layout/landing_page/body.php');
  include('layout/landing_modal.php');
  include('layout/landing_page/footer.php');
}
