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

  'admin/members' => $admin_route . '/members/index.php',
  'admin/members/create' => $admin_route . '/members/create.php',
  'admin/members/edit' => $admin_route . '/members/edit.php',

  # Resident
  'resident/profile' => $resident_route . '/profile.php',
  'resident/home' => $resident_route . '/home.php',
  'resident/about_us' => $resident_route . '/about_us.php',

  'resident/requests' => $resident_route . '/request/index.php',
  'resident/requests/view' => $resident_route . '/request/view.php',

  'resident/announcement' => $resident_route . '/announcement/index.php',
  'resident/announcement/view' => $resident_route . '/announcement/view.php',

  #Landing Page
  'landing_page/about_us' => $landing_route . '/about_us.php',
  'landing_page/announcements' => $landing_route . '/announcements.php',
  'landing_page/announcements/view' => $landing_route . '/view.php',
  'landing_page/register' => $landing_route . '/register.php',

  '/' => 'layout/not_found.php'
);
