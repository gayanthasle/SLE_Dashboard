<?php
$server_name = "localhost";
$user_name = "gayantha";
$password = "password";
$database = "sle5";

$connection = new mysqli($server_name, $user_name, $password, $database);

if ($connection->connect_error) {
  die("connection error");
} else {
  // echo 'connection ok';
}
?>

