<?php
session_start();
$host = DB_HOST;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$database = DB_DATABASE;

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo "Connected";
}
