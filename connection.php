<?php
$servername = "localhost";
$username = "rumm4447";
$password = "47svJtJYvDpt21";

// Create connection
$con = mysqli_connect($servername, $username, $password,"rumm4447_rumahbersinar");

$con2 = mysqli_connect($servername, $username, $password,"rumm4447_rumahbersinar");


// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

session_start();
?>