<?php
require('config/functions.php');
require('db/conn.php');
require('class/base.php');
require('class/login.php');
require('class/blotter.php');
require('class/resident.php');


if (!$_POST || !isset($_POST['form']) || !isset($_SESSION['is_logged_in'])) {
  echo json_encode($result);
  die;
}

$form = $_POST['form'];

$base = new Base($conn);
$login = new Login($conn);
$blotter = new Blotter($conn);
$resident = new Resident($conn);
$result = $base->response_error();

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
}
echo json_encode($result);
die;
