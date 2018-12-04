<table border="1">
	<tr><th>Título</th><th>Autor</th><th align="center">Cantidad</th></tr>
	<?php

foreach($carrito as $id=>$cantidad){
	$titulo=titulos::findByPk($id);
	echo '<tr><td>'.$titulo->titulo.'</td>';
	echo '<td>'.$titulo->autor.'</td>';
	echo '<td>'.$cantidad.'</td>';
	echo '<td><a href="?r=carrito/borrar&id='.$id.'">Borrar</a></tr>';
}
?>
</table>