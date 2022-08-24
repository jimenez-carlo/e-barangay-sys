<?php
require('config/functions.php');
require('db/conn.php');
require('class/base.php');
require('class/login.php');
require('class/blotter.php');
require('class/resident.php');
require('class/request.php');
require('class/announcement.php');


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
$request = new Request($conn);
$announcement = new Announcement($conn);

switch ($form) {
  case 'login':
    $result = $login->index();
    break;
  case 'blotter_create':
    $result = $blotter->create_blotter();
    break;
  case 'resident_request':
    $result = $resident->create_request();
    break;
  case 'verify_resident':
    $result = $resident->verify_resident();
    break;
  case 'resident_update':
    $result = $resident->update();
    break;
  case 'request_change_status':
    $result = $request->change_status();
    break;
  case 'announcement_create':
    $result = $announcement->create_announcement();
    break;
  case 'announcement_edit':
    $result = $announcement->edit_announcement();
    break;
  case 'get_dropdown':
    $base->get_dropdown();
    break;
}
echo json_encode($result);
die;
