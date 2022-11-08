<?php

session_start();

$servername = "";
$username = "";
$password = "";
$dbname = "auto_pardavimas_nuoma";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
