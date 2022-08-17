<?php
require('config/functions.php');
require('db/conn.php');
require('class/base.php');
require('class/blotter.php');
require('class/login.php');


if (!$_POST || !isset($_POST['form'])) {
  echo json_encode($result);
  die;
}

$form = $_POST['form'];

$base = new Base($conn);
$blotter = new Blotter($conn);
$login = new Login($conn);
$result = $base->response_error();

switch ($form) {
    // Customer
  case 'blotter_create':
    $result = $blotter->create_blotter();
    break;
  default:
    $result = $login->index();
    break;
}
echo json_encode($result);
die;
