<div class=container>
<table border=1><tr><th>Artículo</th><th>Título</th><th>Cantidad</th><th>Precio</th></tr>
<?php
$total=0;
foreach($carrito as $c){
	$art=$articulos[$c['id']];
	printf("<tr><td>%s</td><td>%s</td><td align=right>%s</td><td align=right>%d €</td>
		<td><a href=carrito_borrar.php?id=%s class='badge badge-danger'> Borrar</a></td></tr>",
		$c['id'],$art['titulo'],$c['cantidad'],$art['precio'],$c['id']);
	$total+=$c['cantidad']*$art['precio'];		
}
?>
<tr><td colspan=3 align=right>Total Carrito: </td><td align=right><b> <?php echo $total ?> €</td></b></tr>
</table>
</div>

