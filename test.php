<?php
require('config/functions.php');
require('db/conn.php');
include('class/base.php');
// include('class/login.php');
// $test = new Login($conn);

// print_r((array)$test->index('123', '123'));

function itexmo($number, $message, $apicode, $passwd)
{
  $url = 'https://www.itexmo.com/php_api/api.php';
  $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
  $param = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($itexmo),
    ),
  );
  $context  = stream_context_create($param);
  return file_get_contents($url, false, $context);
}

echo itexmo('09217635295', 'test', 'ST-LEONA235447_P4GAW', 't&z9q#dtyj');
