<?php
require "config.inc.php";

if(!$enSesion) 
	renderError ("Acceso no permitido");

// Carga los articulos
require ("protegida/articulos.inc.php");
if(!isset($_SESSION['carrito']))
	renderError("Su carrito está vacio");
else
	render ("carrito_ver",array('articulos'=>$articulos,'carrito'=>$_SESSION['carrito']));

	

