<?php

$admin_route    = 'layout/admin/content';
$barangay_route = 'layout/barangay/content';
$resident_route = 'layout/resident/content';
$landing_route = 'layout/landing_page/content';

$routes = array(
  # Admin
  'admin/home' => 'layout/admin/home.php',
  'admin/profile' => $admin_route . '/profile.php',
  'admin/dashboard' => $admin_route . '/dashboard.php',

  'admin/resident' => $admin_route . '/resident/index.php',
  'admin/resident/create' => $admin_route . '/resident/create.php',
  'admin/resident/edit' => $admin_route . '/resident/edit.php',

  'admin/request' => $admin_route . '/request/index.php',
  'admin/request/create' => $admin_route . '/request/create.php',
  'admin/request/edit' => $admin_route . '/request/edit.php',
  'admin/request/view' => $admin_route . '/request/view.php',

  'admin/blotter' => $admin_route . '/blotter/index.php',
  'admin/blotter/create' => $admin_route . '/blotter/create.php',
  'admin/blotter/edit' => $admin_route . '/blotter/edit.php',

  'admin/announcement' => $admin_route . '/announcement/index.php',
  'admin/announcement/create' => $admin_route . '/announcement/create.php',
  'admin/announcement/edit' => $admin_route . '/announcement/edit.php',

  'admin/barangay' => $admin_route . '/barangay/index.php',
  'admin/barangay/create' => $admin_route . '/barangay/create.php',
  'admin/barangay/edit' => $admin_route . '/barangay/edit.php',

  'admin/id' => $admin_route . '/id/index.php',
  'admin/id/create' => $admin_route . '/id/create.php',
  'admin/id/edit' => $admin_route . '/id/edit.php',

  'admin/business' => $admin_route . '/business/index.php',
  'admin/business/create' => $admin_route . '/business/create.php',
  'admin/business/edit' => $admin_route . '/business/edit.php',


  'admin/members' => $admin_route . '/members/index.php',
  'admin/members/create' => $admin_route . '/members/create.php',
  'admin/members/edit' => $admin_route . '/members/edit.php',

  # Resident
  'resident/profile' => $resident_route . '/profile.php',
  'resident/home' => $resident_route . '/home.php',
  'resident/about_us' => $resident_route . '/about_us.php',

  'resident/requests' => $resident_route . '/request/index.php',
  'resident/requests/list' => $resident_route . '/request/list.php',
  'resident/request/edit_business_clearance' => $resident_route . '/request/edit_business_clearance.php',
  'resident/request/edit_barangay_id' => $resident_route . '/request/edit_barangay_id.php',
  'resident/request/edit_barangay_clearance' => $resident_route . '/request/edit_barangay_clearance.php',
  'resident/requests/view' => $resident_route . '/request/view.php',
  'resident/business' => $resident_route . '/request/business.php',
  'resident/barangay' => $resident_route . '/request/barangay.php',
  'resident/id' => $resident_route . '/request/id.php',

  'resident/gallery' => $resident_route . '/gallery.php',
  'resident/announcement' => $resident_route . '/announcement/index.php',
  'resident/announcement/view' => $resident_route . '/announcement/view.php',

  #Landing Page
  'landing_page/about_us' => $landing_route . '/about_us.php',
  'landing_page/gallery' => $landing_route . '/gallery.php',
  'landing_page/announcements' => $landing_route . '/announcements.php',
  'landing_page/announcements/view' => $landing_route . '/view.php',
  'landing_page/register' => $landing_route . '/register.php',

  '/' => 'layout/not_found.php'
);
