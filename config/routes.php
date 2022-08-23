<?php

$admin_route    = 'layout/admin/content';
$barangay_route = 'layout/barangay/content';
$resident_route = 'layout/resident/content';
$landing_route = 'layout/landing_page/content';

$routes = array(
  # Admin
  'admin/home' => 'layout/admin/home.php',
  'admin/dashboard' => $admin_route . '/dashboard.php',
  'admin/resident' => $admin_route . '/resident/index.php',
  'admin/resident/create' => $admin_route . '/residents/create.php',
  'admin/resident/edit' => $admin_route . '/residents/edit.php',
  'admin/resident/view' => $admin_route . '/residents/view.php',
  'admin/request' => $admin_route . '/request/index.php',
  'admin/request/edit' => $admin_route . '/request/edit.php',
  'admin/request/view' => $admin_route . '/request/view.php',
  'admin/blotter' => $admin_route . '/blotter/index.php',
  'admin/blotter/create' => $admin_route . '/blotter/create.php',
  'admin/blotter/edit' => $admin_route . '/blotter/edit.php',
  'admin/blotter/view' => $admin_route . '/blotter/view.php',
  'admin/announcement' => $admin_route . '/announcement/index.php',
  'admin/announcement/create' => $admin_route . '/announcement/create.php',
  'admin/announcement/edit' => $admin_route . '/announcement/edit.php',
  'admin/barangay_official' => $admin_route . '/barangay_official/index.php',
  'admin/barangay_official/create' => $admin_route . '/barangay_official/create.php',
  'admin/barangay_official/edit' => $admin_route . '/barangay_official/edit.php',

  # Barangay
  'barangay/home' => $barangay_route . 'layout/barangay/home.php',
  'barangay/requests' => $barangay_route . '/request/index.php',
  'barangay/requests/create' => $barangay_route . '/requests/create.php',
  'barangay/requests/edit' => $barangay_route . '/requests/edit.php',
  'barangay/requests/view' => $barangay_route . '/requests/view.php',
  'barangay/blotter' => $barangay_route . '/blotter/index.php',
  'barangay/blotter/create' => $barangay_route . '/blotter/create.php',
  'barangay/blotter/edit' => $barangay_route . '/blotter/edit.php',
  'barangay/announcement' => $barangay_route . '/announcement/index.php',
  'barangay/announcement/create' => $barangay_route . '/announcement/create.php',
  'barangay/announcement/edit' => $barangay_route . '/announcement/edit.php',
  'barangay/barangay_official' => $barangay_route . '/barangay_official/index.php',
  'barangay/barangay_official/create' => $barangay_route . '/barangay_official/create.php',
  'barangay/barangay_official/edit' => $barangay_route . '/barangay_official/edit.php',

  # Resident
  'resident/home' => $resident_route . '/request/body.php',
  'resident/requests' => $resident_route . '/request/index.php',

  #Landing Page
  'landing_page/about_us' => $landing_route . '/about_us.php',
  'landing_page/view' => $landing_route . '/view.php',

  '/' => 'layout/not_found.php'
);
