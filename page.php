<?php
require_once('config/functions.php');
require_once('db/conn.php');
require_once('class/base.php');
require_once('class/blotter.php');
require_once('class/resident.php');

if (!$_GET || !isset($_GET['page']) || !isset($_SESSION['is_logged_in'])) {
  echo get_contents('/layout/not_found.php');
  die;
}

$page = $_GET['page'];
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$access = 1;
$pages = get_access($access);

$request = new Base($conn);
$blotter = new Blotter($conn);
$resident = new Resident($conn);

if (in_array($page, $pages)) {
  $data = array();
  $data['base_url'] = BASE_URL;
  switch ($page) {
    case 'admin/blotter':
      $data['list'] = $request->get_list("SELECT b.id, concat(cp.last_name, ', ', cp.first_name,' ', LEFT(cp.middle_name, 1)) as complainant, concat(ce.last_name, ', ', ce.first_name,' ', LEFT(ce.middle_name, 1)) as complainee, b.incidence, b.incidence_date, tbs.status, a.type, concat(c.last_name, ', ', c.first_name,' ', LEFT(cp.middle_name, 1)) as encoder, b.created_date, b.updated_date FROM tbl_blotter b  inner join tbl_blotter_status tbs on tbs.id = b.blotter_status_id inner join tbl_users_info cp on cp.id = b.complainant_id inner join tbl_users_info ce on ce.id = b.complainee_id inner join tbl_users_info c on c.id = b.created_by inner join tbl_action a on a.id = b.action_id where b.deleted_flag = 0 order by updated_date desc");
      break;
    case 'admin/blotter/create':
      $data['default_data'] = $blotter->drop_down_data;
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
