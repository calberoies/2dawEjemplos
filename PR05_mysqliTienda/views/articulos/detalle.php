<?php 
$cat=findone('categorias',$articulo['categorias_id']);
?>

<h3>Artículo</h3>
<table border=1>
  <tr><th>Nombre</th><td><?=$articulo['nombre']?></td></tr>
  <tr><th>Precio</th><td><?=$articulo['precio']?></td></tr>
  <tr><th>Categoría</th><?=$cat['nombre']?></td></tr>
  <tr><th>Observaciones</th><td><?=$articulo['detalle']?></td></tr>
</tr>
</table>
<a href='modif.php?id=<?=$id?>'>Modificar</a>