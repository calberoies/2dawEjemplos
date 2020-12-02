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

require "articulos.php";
require "cabecera.php";

$id=param('id');
if(!$id) die ("No has seleccionado artículo");
$articulo=buscaarticulo($id);
if(!$articulo) die("ERROR: Articulo inexistente");


if(isset($_POST['comprar'])){ //2º paso. Vengo del formulario

	$cantidad=param('cantidad');
	anadircarrito($id,$cantidad);
	echo "<h3>Artículo añadido al carrito</h3><a href=carrito.php>Continuar</a>";
	die;
}
?>

<h3>Comprar artículo</h2>
<div style="background:#eeeedd;width:300;padding:10px">
<form method=post>
<b><?=$articulo['titulo']?></b>
<br>Categoría: <?=$categorias[$articulo['cat']]?>
<br>Precio: <?=$articulo['precio']?> €<br><p>
Cantidad: <input name="cantidad" size="2" value="1">
<br><input type=submit name=comprar value=Comprar>
</form>
</fieldset>
</body>
</html>
