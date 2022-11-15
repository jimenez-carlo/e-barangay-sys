<?php
require('config/functions.php');
require('db/conn.php');
require('class/base.php');
require('class/user.php');
require('class/dashboard.php');

// if ($_SERVER["HTTPS"] != "on") {
//   header("Location: http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
//   exit();
// }

if (isset($_SESSION['is_logged_in'])) {
  $userObj = new User($conn);
  $user = $userObj->get_user($_SESSION['user']->id);
  // Logged In
  switch ($_SESSION['user']->access_id) {
      // Admin
    case 1:
    case 2:
      include('layout/admin/header.php');
      $dashboard = new Dashboard($conn);
      $data = $dashboard->get_data();
      include('layout/admin/body.php');
      include('layout/modal.php');
      include('layout/admin/footer.php');
      break;

      // Resident
    default:
      include('layout/resident/header.php');
      $base = new Base($conn);
      $home_page_images = $base->get_list("select * from tbl_home_images where deleted_flag = 0");
      $home_content = $base->get_one("select * from tbl_settings where deleted_flag = 0 and id = 1");
      include('layout/resident/body.php');
      include('layout/modal.php');
      include('layout/resident/footer.php');
      break;
  }
} else {
  // Landing page here
  include('layout/landing_page/header.php');
  $base = new Base($conn);
  $home_page_images = $base->get_list("select * from tbl_home_images where deleted_flag = 0");
  $home_content = $base->get_one("select * from tbl_settings where deleted_flag = 0 and id = 1");
  include('layout/landing_page/body.php');
  include('layout/landing_modal.php');
  include('layout/landing_page/footer.php');
}
