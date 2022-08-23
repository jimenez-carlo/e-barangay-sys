<?php
require_once('config/functions.php');
require_once('db/conn.php');
require_once('class/base.php');
require_once('class/blotter.php');
require_once('class/resident.php');
require_once('class/request.php');
require_once('class/announcement.php');

if (!$_GET || !isset($_GET['page'])) {
  echo get_contents('../layout/not_found.php');
  die;
}

$page = $_GET['page'];
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$access = 1;
$pages = get_access($access);

$request = new Base($conn);
$blotter = new Blotter($conn);
$resident = new Resident($conn);
$request = new Request($conn);
$announcement = new Announcement($conn);

if (in_array($page, $pages)) {
  $data = array();
  $data['base_url'] = BASE_URL;
  switch ($page) {
    case 'admin/blotter':
      $data['list'] = $blotter->get_blotters();
      break;
    case 'admin/blotter/create':
      $data['default_data'] = $blotter->drop_down_data;
      break;
    case 'admin/request':
      $data['list'] = $request->get_requests_list();
      break;
    case 'admin/request/edit':
      $data['default_data'] = $request->set_default_data();
      $data['data'] = $request->get_request($id);
      break;
    case 'admin/announcement':
      $data['list'] = $announcement->get_announcements();
      break;
    case 'admin/announcement/edit':
      $data['default_data'] = $announcement->set_default_data();
      $data['data'] = $announcement->get_announcement($id);
      break;
    case 'admin/blotter/view':
      $data['default_data'] = $blotter->drop_down_data;
      $data['blotter'] = $blotter->get_case($id);
      break;
    case 'resident/requests':
      $data['requests'] = $resident->get_requestor_list();
      break;
    case 'landing_page/view':
    case 'landing_page/about_us':
      break;
  }
  echo get_contents(page_url($page), $data);
  die;
} else {
  echo get_contents(page_url('denied'));
  die;
}
