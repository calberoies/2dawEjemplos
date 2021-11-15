<?php
/** Muestra el carrito
 * Permite borrar articulos del carrito, recibiendo borrar=id por GET
 */
session_start();
require "_articulos.php";

//Analizo param. de entrada
$id=$_GET["borrar"]??null;
if($id) {
	if(isset($_SESSION['carrito'][$id]))
		unset($_SESSION['carrito'][$id]);
	if($_SESSION['carrito'])
		header('Location:carrito.php');
	else 
		header('Location:index.php');
}

if(!isset($_SESSION['carrito'])) {
	header('Location:index.php');
}

require 'cabecera.php';
?>

<h3>Carrito</h3>
<div class=row><div class=col-6>
<table class="table table-striped"><tr>
    <td></td><td><b>Artículo</b></th>
    <td align="right"><b>Cantidad</b></th>
    <td align="right"><b>Precio</b></th>
    <td align="right"><b>Importe</b></th>
    <th></th></tr>
<?php
	$importe=0;

	foreach($_SESSION['carrito']  as  $id=>$cantidad){

		$articulo=$articulos[$id];
		$importe=$cantidad*$articulo['precio'];
		printf('<tr>
                <td>%s</td>
                <td align="right">%d</td>
                <td align="right">%d €</td>
                <td align="right">%d €</td>
			    <td><a class="fas fa-trash" href="carrito.php?borrar=%s"></a>
                </tr>',
			$articulo['titulo'],$cantidad,$articulo['precio'],
                    $cantidad*$articulo['precio'],$id);

	}
	echo "<tr><td colspan=2></td><td>TOTAL</td><td align='right'>".$importe.'€ </td><td></td></tr>';
?>
</table>
<p>
</div></div>
<a class="btn btn-primary" href="index.php">Seguir comprando</a>

<a class="btn btn-success" href="#" onclick='alert("Función no implementada")'>Finaliza pedido</a>
