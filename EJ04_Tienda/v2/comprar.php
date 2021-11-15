<?php
/**
* Muestra un formulario para comprar un artículo y lo procesa para añadirlo al carrito
* Pasos:
* 1)
*   Datos de entrada (GET):
*     id =Código de articulo a comprar
*
* 2) Añade un artículo al carrito
*   Datos de entrada (POST):
*     id =Código de articulo a comprar
*     cant= Cantidad  a comprar
*/

require "init.php";
require_once "funciones.inc.php";

$id=$_GET['id']??null;
if(!$id) die ("No has seleccionado artículo");
$art=getarticulo($id);
if(!$art) die("ERROR: Articulo inexistente");


if(isset($_POST['comprar'])){ //2º paso. Vengo del formulario
	$cantidad=$_GET['cantidad']??1;
	if(anadircarrito($id,$cantidad))
		header('Location:index.php');
	else 
		$error='Cantidad no permitida';
	/* Alternativa:
	require "cabecera.php";
	echo '<div class="alert alert-success" role="alert">
	Artículo añadido al carrito<br><a href=carrito.php>Continuar</a></div>';
	die;*/
}
require 'vistas/comprar.php';
?>
