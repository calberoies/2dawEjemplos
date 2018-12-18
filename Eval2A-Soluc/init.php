<?php
require "classes/viscalendario.class.php";
require "classes/calendario.class.php";
session_start();

if(isset($_GET['anyo']))
	$anyo=$_GET['anyo'];
else
	$anyo=date('Y');

if(!isset($_SESSION['calendario'])) // NO hay calendario
	$_SESSION['calendario']=new calendario($anyo);
else	
	$_SESSION['calendario']->setanyo($anyo);

$calendario=$_SESSION['calendario'];
