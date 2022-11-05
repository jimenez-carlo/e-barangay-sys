<?php
require_once 'vendor/autoload.php';
require('config/functions.php');
require('db/conn.php');
require('class/base.php');
require('class/login.php');
require('class/blotter.php');
require('class/resident.php');
require('class/members.php');
require('class/request.php');
require('class/announcement.php');
require('class/profile.php');


$base = new Base($conn);
$result = $base->response_error();

if (!$_POST || !isset($_POST['form'])) {
  echo json_encode($result);
  die;
}

$form = $_POST['form'];

$login = new Login($conn);
$blotter = new Blotter($conn);
$resident = new Resident($conn);
$members = new Members($conn);
$request = new Request($conn);
$announcement = new Announcement($conn);
$profile = new Profile($conn);

switch ($form) {
  case 'login':
    $result = $login->index();
    break;
  case 'blotter_create':
    $result = $blotter->create_blotter();
    break;
  case 'blotter_update':
    $result = $blotter->update();
    break;
  case 'resident_request':
    $result = $resident->create_request();
    break;
  case 'verify_resident':
    $result = $resident->verify_resident();
    break;
  case 'resident_register':
    $result = $resident->register();
    break;
  case 'resident_update':
    $result = $resident->update();
    break;
    // change status
  case 'change_status_barangay_id':
  case 'change_status_barangay_clearance':
  case 'change_status_business_clearance':
    $result = $request->change_status_request();
    break;

  case 'member_register':
    $result = $members->create();
    break;
  case 'member_update':
    $result = $members->update();
    break;

    // case 'request_change_status':
    //   $result = $request->change_status();
    //   break;
  case 'request_generate':
    $result = $request->request_generate();
    break;
  case 'announcement_create':
    $result = $announcement->create_announcement();
    break;
  case 'announcement_edit':
    $result = $announcement->edit_announcement();
    break;

  case 'admin_profile_update':
    $result = $profile->admin_update();
    break;
  case 'resident_profile_update':
    $result = $profile->resident_update();
    break;
  case 'resident_create_request':
    $result = $profile->resident_update();
    break;
  case 'resident_request_barangay':
    $result = $request->request_barangay_clearance();
    break;
  case 'resident_request_id':
    $result = $request->request_barangay_id();
    break;
  case 'resident_request_business':
    $result = $request->request_business();
    break;

  case 'resident_register_landing':
    $result = $resident->resident_register_landing();
    break;

  case 'get_dropdown':
    $base->get_dropdown();
    break;
  case 'get_user':
    $result = $base->get_user();
    break;
}
echo json_encode($result);
die;
