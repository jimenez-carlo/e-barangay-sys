<?php
require_once('config/functions.php');
require_once('db/conn.php');
require_once('class/base.php');
require_once('class/blotter.php');
require_once('class/resident.php');
require_once('class/members.php');
require_once('class/request.php');
require_once('class/announcement.php');
require_once('class/dashboard.php');

if (!$_GET || !isset($_GET['page'])) {
  echo get_contents('../layout/not_found.php');
  die;
}

$page = $_GET['page'];
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$access = 1;
$pages = get_access($access);

$base = new Base($conn);
$blotter = new Blotter($conn);
$resident = new Resident($conn);
$members = new Members($conn);
$request = new Request($conn);
$announcement = new Announcement($conn);
$dashboard = new Dashboard($conn);

if (in_array($page, $pages)) {
  $data = array();
  $data['base_url'] = BASE_URL;
  switch ($page) {
    case 'admin/dashboard':
      $data['data'] = $dashboard->get_data();
      break;
    case 'admin/profile':
      $tmp = $members->get_resident($id);
      $data['default_data'] = $members->set_default_data();
      $data['data'] = $tmp;
      break;
      // Blotter
    case 'admin/blotter':
      $data['list'] = $blotter->get_blotters();
      break;
    case 'admin/blotter/create':
      $data['default_data'] = $blotter->drop_down_data;
      break;
    case 'admin/blotter/view':
      $data['default_data'] = $blotter->drop_down_data;
      $data['blotter'] = $blotter->get_case($id);
      break;
      // Resident
    case 'admin/resident':
      $data['list'] = $resident->get_resident_list();
      break;
    case 'admin/resident/create':
      $data['default_data'] = $resident->set_default_data();
      break;
    case 'admin/resident/edit':
      $tmp = $resident->get_resident($id);
      $data['default_data'] = $resident->set_default_data();
      $data['data'] = $tmp;
      break;
      // Request
    case 'admin/request':
      $data['list'] = $request->get_requests_list();
      break;
    case 'admin/request/create':
      $data['default_data'] = $request->set_default_data();
      break;
    case 'admin/request/edit':
      $tmp = $request->get_request($id);
      $data['default_data'] = $request->set_default_data();
      $data['data'] = $tmp;
      $data['default_data']['barangay'] = $base->get_list("select * from tbl_barangay where city_id = '" . $tmp->resident->city_id . "' and deleted_flag = 0");
      break;
      // Announcements
    case 'admin/announcement':
      $data['list'] = $announcement->get_announcements();
      break;
    case 'admin/announcement/edit':
      $data['default_data'] = $announcement->set_default_data();
      $data['data'] = $announcement->get_announcement($id);
      break;
      // Members
    case 'admin/members':
      $data['list'] = $members->get_member_list();
      break;
    case 'admin/members/create':
      $data['default_data'] = $members->set_default_data();
      break;
    case 'admin/members/edit':
      $tmp = $members->get_resident($id);
      $data['default_data'] = $members->set_default_data();
      $data['data'] = $tmp;
      break;

    case 'resident/profile':
      $tmp = $members->get_resident($id);
      $data['default_data'] = $members->set_default_data();
      $data['data'] = $tmp;
      break;

    case 'resident/requests':
      $data['requests'] = $members->get_requestor_list();
      break;
    case 'resident/requests/view':
      $tmp = $request->get_request($id);
      $data['default_data'] = $request->set_default_data();
      $data['data'] = $tmp;
      $data['default_data']['barangay'] = $base->get_list("select * from tbl_barangay where city_id = '" . $tmp->resident->city_id . "' and deleted_flag = 0");
      break;

    case 'resident/announcement':
      $data['list'] = $announcement->get_resident_announcements();
      break;
    case 'resident/announcement/view':
      $data['default_data'] = $announcement->set_default_data();
      $data['data'] = $announcement->get_announcement($id);
      break;

    case 'landing_page/announcements':
      $data['list'] = $announcement->get_resident_announcements_with_one_image();
      break;
    case 'landing_page/announcements/view':
      $data['default_data'] = $announcement->set_default_data();
      $data['data'] = $announcement->get_announcement($id);
      break;
    case 'landing_page/register':
      $data['default_data'] = $resident->set_default_data();
      break;
    case 'landing_page/about_us':
      break;
  }
  echo get_contents(page_url($page), $data);
  die;
} else {
  echo get_contents(page_url('denied'));
  die;
}
