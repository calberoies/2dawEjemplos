<?php
/** Muestra el carrito
 * Permite borrar articulos del carrito, recibiendo borrar=id por GET
 */

require "init.php";

//Analizo param. de entrada
$id=$_GET["borrar"]??null;
if($id) {
	borrarcarrito($id);
	if(getcarrito())
		header('Location:carrito.php');
	else 
		header('Location:index.php');
}

if(!$carrito=getcarrito()) {
	die ("El carrito está vacío");
}
require 'vistas/carrito.php';
?>