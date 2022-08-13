<?php
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'e_barangay_db');

define('SYSTEM_NAME', 'E-Barangay System');
define('SYSTEM_NAME_SHORT', 'E-Barangay');
define('MAIN_SKIN', 'skin-green');
define('SPINNER', '<i class="fa fa-spinner fa-pulse fa-fw"></i>');

define('ROUTES', $routes);
define('COPYRIGHT_YEAR', 2022);
define('VERSION_NO', 0.1);

define('ADMIN_ACCESS', array_keys($routes));
define('BARANGAY_OFFICIAL_ACCESS', array(
  'barangay/blotter'
));
define('RESIDENT_ACCESS', array());
