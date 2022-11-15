<?php
require_once('config/functions.php');
require_once('db/conn.php');
require_once('class/base.php');
require_once('class/blotter.php');
require_once('class/resident.php');
require_once('class/members.php');
require_once('class/request.php');
require_once('class/announcement.php');
require_once('class/settings.php');
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
$settings = new Settings($conn);

if (in_array($page, $pages)) {
  $data = array();
  $data['base_url'] = BASE_URL;
  switch ($page) {
    case 'admin/dashboard':
    case 'admin/home':
      $data['data'] = $dashboard->get_data();
      break;
    case 'admin/profile':
      $tmp = $members->get_resident($id);
      $data['default_data'] = $members->set_default_data();
      $data['data'] = $tmp;
      break;
    case 'admin/blotter':
      $data['list'] = $blotter->get_blotters();
      break;
    case 'admin/blotter/create':
      $data['default_data'] = $blotter->drop_down_data;
      break;
    case 'admin/blotter/edit':
      $data['default_data'] = $blotter->drop_down_data;
      $data['blotter'] = $blotter->get_case($id);
      break;
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

    case 'admin/barangay':
      $data['list'] = $request->get_barangay_clearance_list();
      break;
    case 'admin/business':
      $data['list'] = $request->get_business_clearance_list();
      break;
    case 'admin/id':
      $data['list'] = $request->get_barangay_id_list();
      break;


    case 'admin/id/edit':
      $tmp = $request->get_barangay_id($id);
      $data['resident_data'] = $members->get_resident($tmp->resident->id);
      $data['default_data'] = $request->set_default_data();
      $data['data'] = $tmp;
      break;
    case 'admin/barangay/edit':
      $tmp = $request->get_barangay_clearance($id);
      $data['resident_data'] = $members->get_resident($tmp->resident->id);
      $data['default_data'] = $request->set_default_data();
      $data['data'] = $tmp;
      break;
    case 'admin/business/edit':
      $tmp = $request->get_business_clearance($id);
      $data['resident_data'] = $members->get_resident($tmp->resident->id);
      $data['default_data'] = $request->set_default_data();
      $data['data'] = $tmp;
      break;

    case 'admin/barangay/create':
      $data['default_data'] = $request->set_default_data();
      break;

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

    case 'admin/settings/edit';
      $data['data'] = $settings->get_settings();
      break;
      // Resident
    case 'resident/profile':
      $tmp = $members->get_resident($id);
      $data['default_data'] = $members->set_default_data();
      $data['data'] = $tmp;
      break;

    case 'resident/requests/list':
      $data['list'] = $resident->get_requests_list($_SESSION['user']->id);
      break;
    case 'resident/request/edit_barangay_id':
      $tmp = $request->get_barangay_id($id);
      $data['resident_data'] = $members->get_resident($tmp->resident->id);
      $data['default_data'] = $request->set_default_data();
      $data['data'] = $tmp;
      break;
    case 'resident/request/edit_barangay_clearance':
      $tmp = $request->get_barangay_clearance($id);
      $data['resident_data'] = $members->get_resident($tmp->resident->id);
      $data['default_data'] = $request->set_default_data();
      $data['data'] = $tmp;
      break;
    case 'resident/request/edit_business_clearance':
      $tmp = $request->get_business_clearance($id);
      $data['resident_data'] = $members->get_resident($tmp->resident->id);
      $data['default_data'] = $request->set_default_data();
      $data['data'] = $tmp;
      break;

    case 'resident/requests':
      $data['requests'] = $resident->get_requestor_list();
      $tmp = $members->get_resident($_SESSION['user']->id);
      $data['default_data'] = $members->set_default_data();
      $data['data'] = $tmp;
      break;

    case 'resident/requests/view':
      $tmp = $request->get_request($id);
      $data['default_data'] = $request->set_default_data();
      $data['data'] = $tmp;
      $data['default_data']['barangay'] = $base->get_list("select * from tbl_barangay where city_id = '" . $tmp->resident->city_id . "' and deleted_flag = 0");
      break;


    case 'resident/barangay':
    case 'resident/business':
    case 'resident/id':
      $data['requests'] = $resident->get_requestor_list();
      $tmp = $members->get_resident($_SESSION['user']->id);
      $data['default_data'] = $members->set_default_data();
      $data['data'] = $tmp;
      break;
    case 'resident/announcement':
      $data['list'] = $announcement->get_resident_announcements_with_one_image();
      break;
    case 'resident/announcement/view':
      $data['default_data'] = $announcement->set_default_data();
      $data['data'] = $announcement->get_announcement($id);
      break;

      // Landing Page
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

    case 'landing_page/gallery':
    case 'resident/gallery':
      $data['gallery'] = $base->get_list("select * from tbl_gallery where deleted_flag = 0");
      break;

    case 'resident/home':
      $data['home_page_images'] = $base->get_list("select * from tbl_home_images where deleted_flag = 0");
      $data['home_content'] = $base->get_one("select * from tbl_settings where deleted_flag = 0 and id = 1");
      break;
    case 'resident/about_us':
    case 'landing_page/about_us':
      $data['default_data'] = $base->get_one("select * from tbl_settings where deleted_flag = 0");
      $data['officers'] = $base->get_list("select * from tbl_about_us_images where deleted_flag = 0");
      $data['layers'] = $base->get_list("select `column` as `id` from tbl_about_us_images where deleted_flag = 0 group by `column` order by `column` asc");
      break;
  }
  echo get_contents(page_url($page), $data);
  die;
} else {
  echo get_contents(page_url('denied'));
  die;
}
