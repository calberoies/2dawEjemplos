<?php
session_start();
// Asigna el usuario de la sesi�n
if(isset($_SESSION['usuario'])){
	$usuario=$_SESSION['usuario'] ;
	$enSesion=true;
} else {
	$usuario=array() ;
	$enSesion=false;
}

require_once("lib/funciones.inc.php");

?>
