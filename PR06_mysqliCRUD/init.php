<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tienda";

// Create connection
$db = @mysqli_connect($servername, $username, $password,$dbname) or
    die("Error al conectar: " . mysqli_connect_error());

require_once 'util.php';
