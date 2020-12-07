
<h4>Articulos</h4>
<a href=alta.php>+ Alta</a>

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
            <a href='detalle.php?id=$row[id]'>Detalle</a>&nbsp;
            <a href='modif.php?id=$row[id]'>Modificar</a>
            <a href='borrar.php?id=$row[id]'>Eliminar</a>
            </td>
            </tr>";
     
  }
  echo "</table>";
} else {
  echo "0 results";
}
