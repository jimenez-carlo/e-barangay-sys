<?php
require_once('config/functions.php');
require_once('db/conn.php');
session_destroy();
header('location:index.php');
