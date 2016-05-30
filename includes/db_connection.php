<?php

$DBServer = "localhost";  
$DBUser = "root";
$DBPass = "";
$DBName = "funda";

$conn=mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>