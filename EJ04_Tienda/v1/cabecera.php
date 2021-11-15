<html>
<header>
		<title>Tienda ONLINE</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/8fabacd3c0.js" crossorigin="anonymous"></script>
<style>
	.art{border:1px solid;float:left;width:200px;height:80px;padding:6px;margin:5px}
	fieldset{background:#ddddee}
	.boton  {background:#ddddee;padding:3px;margin:10px}
</style>

</header>

<body>
<div class=container>
<nav class=navbar>
<h2 style='width:80%;float:left'><a href="index.php">Tienda ONLINE</a></h2>
<?php
if(isset($_SESSION['carrito']) && $_SESSION['carrito'])
	echo "<a href='carrito.php' >
	<i class='fas fa-shopping-cart' style='font-size:2em'></i>
	</a>";
?>

</nav>
