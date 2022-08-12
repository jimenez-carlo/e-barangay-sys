<?php
require_once($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '/db/conn.php');
require_once($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '/class/main.php');

function admin_header()
{
  include_once('layout/admin/header.php');
}

function admin_footer()
{
  include_once('layout/admin/footer.php');
}

function resident_header()
{
  include_once('layout/resident/header.php');
}

function resident_footer()
{
  include_once('layout/resident/footer.php');
}
