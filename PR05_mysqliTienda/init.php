<?php
$servername = "localhost";
$username = "root";
$password = "root";
$bdatos="tienda";

// Create connection
$db = mysqli_connect($servername, $username, $password, $bdatos) ;

// Check connection
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($db,'utf8');

?>