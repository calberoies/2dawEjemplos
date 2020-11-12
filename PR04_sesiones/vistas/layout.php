<html>
<header>
<title>TIENDA FORMASPORT</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</header>
<body>
<h3>TIENDA FORMASPORT </h3>
<div id=menu style='padding:7px;background-color:#DDEEDD;font-style:bold;'>
<?php
if($enSesion){
	echo " <a href=index.php class='badge badge-primary'>Artículos</a> 
		<a href=carrito_ver.php class='badge badge-primary'>Ver Carrito</a> 
		<div style='float:right'>$usuario[nombre]
			   - <a href=logout.php class='badge badge-primary'>Cerrar Sesión</a>
		</div>";
}else 
	echo "<a href=login.php>Identificarse</a>";
?>
</div>
<p>
<hr>
<div id=content>
<?php
require "vistas/$vista.php";
?>
</div>
<p>&nbsp;
<p>&nbsp;
<hr>
<em>
(c) TiendaSport. Telef: 666777888

