<?php
require_once('routes.php');
require_once('constants.php');
if (!function_exists('clean_data')) {
  function clean_data($value)
  {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
  }
}

if (!function_exists('get_contents')) {
  function get_contents($url, $data = array())
  {
    extract($data);
    ob_start();
    include($url);
    return ob_get_clean();
  }
}

if (!function_exists('get_access')) {
  function get_access($access)
  {
    switch ($access) {
      case 1: //admin
        return ADMIN_ACCESS;
      case 2: //barangay official
        return BARANGAY_OFFICIAL_ACCESS;
      case 3: //resident
        return RESIDENT_ACCESS;
      default:
        return array();
    }
  }
}

if (!function_exists('page_url')) {
  function page_url($page)
  {
    return array_key_exists($page, ROUTES) ? ROUTES[$page] : ROUTES['/'];
  }
}

if (!function_exists('error_msg')) {
  function error_msg($title = "Error!", $message = "Oops Something Went Wrong!")
  {
    return sprintf(
      '<div class="alert alert-sm alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> %s</h4> %s </div>',
      $title,
      $message
    );
  }
}

if (!function_exists('success_msg')) {
  function success_msg($title = "Successfull!", $message = "Action Successfull!")
  {
    return sprintf(
      '<div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> %s</h4> %s </div>',
      $title,
      $message
    );
  }
}


if (!function_exists('def_response')) {
  function def_response()
  {
    $result = new stdClass();
    $result->status = false;
    $result->result = error_msg();
    $result->items = '';
    return $result;
  }
}
