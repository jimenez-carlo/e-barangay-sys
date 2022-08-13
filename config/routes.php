<?php

$admin_route    = '../layout/admin/content';
$barangay_route = '../layout/barangay/content';
$resident_route = '../layout/resident/content';

$routes = array(
  # Admin
  'admin/' => $admin_route . '/body.php',
  'admin/dashboard' => $admin_route . '/dashboard.php',

  # Barangay
  'barangay/' => $barangay_route . '/body.php',

  # Resident
  'resident/' => $resident_route . '/body.php',
  '/' => '../layout/not_found.php'
);
