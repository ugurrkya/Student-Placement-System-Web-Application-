<?php

include_once "db_config.php";

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
$mysqli->set_charset("utf8");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>