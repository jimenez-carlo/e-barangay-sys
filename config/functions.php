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
        return ADMIN_ACCESS;
      case 3: //resident
        return ADMIN_ACCESS;
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

if (!function_exists('format_date_time')) {
  function format_date_time($date)
  {
    if (empty($date)) {
      return null;
    }
    try {
      return date_format(date_create($date), "Y-m-d h:i:s");
    } catch (\Throwable $th) {
      return $date;
    }
  }
}

if (!function_exists('format_date_time_am_pm')) {
  function format_date_time_am_pm($date)
  {
    if (empty($date)) {
      return null;
    }
    try {
      return date('Y-m-d h:i a', strtotime($date));
    } catch (\Throwable $th) {
      return $date;
    }
  }
}

if (!function_exists('format_date')) {
  function format_date($date)
  {
    if (empty($date)) {
      return null;
    }
    try {
      return date_format(date_create($date), "Y-m-d");
    } catch (\Throwable $th) {
      return $date;
    }
  }
}
