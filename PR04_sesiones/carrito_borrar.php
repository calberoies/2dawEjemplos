<?php
require "config.inc.php";

if(!$enSesion) 
	renderError ("Acceso no permitido");

$id=getparam('id','',"Art�culo no seleccionado");

if(!isset($_SESSION['carrito'][$id]))
		renderError ("Art�culo no est� en el carrito");
		
unset($_SESSION['carrito'][$id]);
if(!count($_SESSION['carrito'])) // carrito vac�o
	unset($_SESSION['carrito']);
	
header('location:carrito_ver.php');

