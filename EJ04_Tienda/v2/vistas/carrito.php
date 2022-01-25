<?php 
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

	foreach($carrito  as  $id=>$cantidad){

		$articulo=getarticulo($id);
		$importe=$cantidad*$articulo['precio'];
		printf('<tr>
                <td><img width=40 src="%s"></td>
                <td>%s</td>
                <td align="right">%d</td>
                <td align="right">%d €</td>
                <td align="right">%d €</td>
			    <td><a class="fas fa-trash" href="carrito.php?borrar=%s"></a>
                </tr>',
            getimg($id),   
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
