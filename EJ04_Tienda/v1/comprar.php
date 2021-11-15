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
session_start();
require_once "_articulos.php";

$id=$_GET['id']??null;
if(!$id) die ("No has seleccionado artículo");
$art=$articulos[$id];


if(isset($_POST['comprar'])){ //2º paso. Vengo del formulario
	$cantidad=$_GET['cantidad']??1;
	if(isset($_SESSION['carrito'][$id]))
		$_SESSION['carrito'][$id]+=$cantidad;
	else
		$_SESSION['carrito'][$id]=$cantidad;
	header('Location:index.php');
	/* Alternativa:
	require "cabecera.php";
	echo '<div class="alert alert-success" role="alert">
	Artículo añadido al carrito<br><a href=carrito.php>Continuar</a></div>';
	die;*/
}
require 'cabecera.php';
?>

<h3>Comprar artículo</h3>
<div class="card" style="width: 12rem;float:left;margin:5px">
    <div class="card-body">
        <h5 class="card-title"><?=$art['titulo']?></h5>
        <p class="card-text">
            <a href='index.php?cat=<?=$art['cat']?>'> 
            </a></p>
    </div>
</div>
<form method=post>
    <div class=row>
    <div class=col-2>
    <br>Precio: <b><?=$art['precio']?> €</b><br><p>
    Cantidad: <input name="cantidad" size="2" value="1" class=form-control>
	<?php if(isset($error))
		echo "<div class=error>$error</div>";
	?>
    <br><input type=submit class="btn btn-primary" name=comprar value=Comprar>
    </div>
</form>
</body>
</html>
