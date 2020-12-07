<?php 
require 'init.php';

//$db

$sql = "SELECT p.*,c.nombre as nomcategoria FROM productos p
    inner join categorias c on c.id=categorias_id 
    ";

if($cat=$_GET['cat']??'')
  $sql.=' where categorias_id='.$cat;

$result = mysqli_query($db, $sql);
if(!$result) 
 die("Error en la sql: ".mysqli_error($db));

?>
<html>
<meta http-equiv="content-type" content="text/html; utf-8">
<h2>Articulos</h2>
<a href=alta.php>Alta de artículos</a>

<table border=1><tr><th>Nombre</th>
<th>Precio</th>
<th>Categoría</th>
</tr>

<?php
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    echo "<tr><td>$row[nombre]</td>
            <td>$row[precio]</td>
            <td>$row[nomcategoria]</td>
            <td>
            <a href='detalle.php?id=$row[id]'>Ver detalle</a>
            </td>
            </tr>";
     
  }
  echo "</table>";
} else {
  echo "0 results";
}
