<?php 
require 'init.php';

if(!$id=$_GET['id'] ?? '')
  die('Ejecución incorrecta');


$sql = "SELECT p.*,c.nombre as nomcategoria FROM productos p
    inner join categorias c on c.id=categorias_id 
    where p.id=".$id;

$result = mysqli_query($db, $sql);
if(!$result) 
 die("Error en la sql: ".mysqli_error($db));

if(!$row = mysqli_fetch_assoc($result)) 
 die('Articulo inexistente');

?>
<html>
<meta http-equiv="content-type" content="text/html; utf-8">

<table border=1>
  <tr><th>Nombre</th><td><?=$row['nombre']?></td></tr>
  <tr><th>Precio</th><td><?=$row['precio']?></td></tr>
  <tr><th>Categoría</th><?=$row['nomcategoria']?></td></tr>
  <tr><th>Observaciones</th><td><?=$row['detalle']?></td></tr>
</tr>
</table>