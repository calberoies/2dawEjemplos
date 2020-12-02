<?php
/** Muestra el carrito
 * Permite borrar articulos del carrito, recibiendo borrar=id por GET
 */

require "articulos.php";


//Analizo param. de entrada
$id=param("borrar");
if($id) borrarcarrito($id);

require ("cabecera.php");
if(!isset($_SESSION['carrito'])) {
	echo "El carrito está vacío";
	die;
}
?>
<h3>Carrito</h3>
<table border="1"><tr><th>Artículo</th><th>Descripción</th><th>Cantidad</th><th>Precio</th><th >Importe</th><th></th></tr>
<?php
	$importe=0;

	foreach($_SESSION['carrito']  as  $id=>$cantidad){

		$articulo=buscaarticulo($id);
		$importe=$cantidad*$articulo['precio'];
		printf('<tr><td>%s</td><td>%s</td><td align="right">%d</td><td align="right">%d</td><td align="right">%d</td>
			<td><a class=boton href="carrito.php?borrar=%s">Borrar</a></tr>',
			$id,$articulo['titulo'],$cantidad,$articulo['precio'],$cantidad*$articulo['precio'],$id);

	}
	echo "<tr><td colspan=3></td><td>TOTAL</td><td align='right'>".$importe.'</tr>';
?>
</table>
<p>
<a class="boton" href="index.php">Seguir comprando</a>

<a class="boton" href="#" onclick='alert("Función no implementada")'>Finaliza pedido</a>
