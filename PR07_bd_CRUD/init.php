<?php
session_start();
require 'dbconfig.php';
require 'lib/funciones.php';
try{
	$db = new pdo("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$db -> exec("SET CHARACTER SET utf8");
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
} catch (Exception $e){
	$mensaje=$e->getMessage();
	require 'views/error.php';
	die;
}
