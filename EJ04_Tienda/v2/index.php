<?php
/** Muestra los artículos de la tienda
 * Enlaza con comprar.php para un artículo seleccionado
 */

require "init.php";


//Analizo param. de entrada
$catid=$_GET['cat']??null;;
if($catid && !$categoria=getcategoria($catid)) 
	die("CATEGORIA INEXISTENTE!!");

$filtro=$_GET["filtro"]??'';
$precio=$_GET["precio"]??'';

$lisarticulos=getarticulos($catid,$filtro,$precio);

require 'vistas/index.php';