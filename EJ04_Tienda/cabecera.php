<html>
<header>
		<title><a href="index.php">Tienda ONLINE</a></title>
<style>
body{font-family:Verdana}
.art{border:1px solid;float:left;width:200px;height:80px;padding:6px;margin:5px}
fieldset{background:#ddddee}
.boton  {background:#ddddee;padding:3px;margin:10px}
td {padding:3px;margin:3px;height:32px}
</style>

</header>

<body>
<h2 style='width:80%;float:left'><a href="index.php">Tienda ONLINE</a></h2>
<?php

if(isset($_SESSION['carrito']))
	echo "<a class=boton href='carrito.php'> Ver Carrito </a>";
?>

<hr style='clear:left'>
