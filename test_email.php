<?php
require_once 'vendor/autoload.php';
require('config/functions.php');
require('db/conn.php');
require('class/base.php');

$base = new Base($conn);
$base->send_email('jimenez.carlo.llabor@gmail.com', 'test');
