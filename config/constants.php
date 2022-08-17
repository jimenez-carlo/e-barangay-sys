<?php

date_default_timezone_set('Asia/Manila');

define('DB_HOST', 'localhost'); //bom1plzcpnl493947.prod.bom1.secureserver.net
define('DB_USERNAME', 'root'); //km8bpv717cor
define('DB_PASSWORD', ''); //c;UD^5lhPXt[
define('DB_DATABASE', 'e_barangay_db');

define('SYSTEM_NAME', 'E-Barangay System');
define('SYSTEM_NAME_SHORT', 'E-Barangay');
define('MAIN_SKIN', 'skin-green');
define('SPINNER', '<i class="fa fa-spinner fa-pulse fa-fw"></i>');
define('COPYRIGHT_YEAR', 2022);
define('VERSION_NO', 0.1);

define('ROUTES', $routes);
define('BASE_URL', 'http://localhost/Sideline/e-barangay-sys/'); //http://e-barangay-system.com/
define('ADMIN_ACCESS', array_keys($routes));
define('BARANGAY_OFFICIAL_ACCESS', array(
  'barangay/blotter'
));

define('RESIDENT_ACCESS', array());
