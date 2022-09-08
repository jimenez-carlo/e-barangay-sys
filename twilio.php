<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = "AC293a2bb5424a51a166eca17608daf465"; //getenv("AC293a2bb5424a51a166eca17608daf465");
$token = "af8d3a3c23774ec3b1829e1e4aa85439"; //getenv("e29a1a6dfa766e07ae74c19114c710b8");
$twilio = new Client($sid, $token);
$number = '09217635295';
$number = (substr($number, 0, 2) == '09') ? "+639" . ltrim($number, '09') : $number;
$message = $twilio->messages
  ->create(
    $number, // to
    [
      "body" => "This is the ship that made the Kessel Run in fourteen parsec123s?",
      "from" => "+19035009924"
    ]
  );

print($message->sid);
