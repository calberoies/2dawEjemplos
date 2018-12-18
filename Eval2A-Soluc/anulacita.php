<?php

require 'init.php';

if(!isset($_GET['dia']) || !isset($_GET['mes']) || !isset($_GET['hora']))
	die ("Error de ejecución");
$dia=$_GET['dia'];
$mes=$_GET['mes'];
$hora=$_GET['hora'];

$calendario->anulacita($mes,$dia,$hora);
header("Location:citasdia.php?mes=$mes&dia=$dia");
