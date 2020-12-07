<?php 
require 'init.php';
require 'funciones.php';
?>

<html>
<meta http-equiv="content-type" content="text/html; utf-8">
<h2>Categorías</h2>

<table border=1><tr><th>Id</th><th>Nombre</th></tr>

<?php
  foreach(findall('categorias') as $row) {
    echo "<tr><td>$row[id]</td>
            <td>$row[nombre]</td>
            <td>
            <a href='detallecat.php?id=$row[id]'>Ver detalle</a>
            </td>
            </tr>";
     
  }
?>
</table>