<?php 
$dbparams=require 'dbconfig.php';

require 'dbconfig.php';
try{
	$db = new pdo("mysql:host=$dbparams[host];dbname=$dbparams[dbname]", $dbparams['user'], $dbparams['pass']);
	$db -> exec("SET CHARACTER SET utf8");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
} catch (Exception $e){
	die($e->getMessage());
}


