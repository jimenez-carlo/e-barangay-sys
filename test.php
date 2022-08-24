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



// function dropdown_with_id(dropdown_to_populate, table, where, id, display, value, after_function) {
//   if (!after_function) after_function = false;
//   $.ajax({
//     url: base_url + 'Form_Dynamic_Main/get_dropdown',
//     type: 'POST',
//     data: {
//       table: table,
//       where: where,
//       id: id,
//       display: display,
//       value: value
//     },
//     success: function (response) {
//       $('#' + dropdown_to_populate + '').html(response);
//       if (after_function !== false) {
//         after_function();
//       }
//     }
//   });
// }
