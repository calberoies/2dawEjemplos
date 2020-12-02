<?php 
require 'clientes.php';

$tiposel=$_GET['tipo'] ?? '';

?>

<h3>Clientes</h3>

<a href='index.php'>TODOS</a>
<?php 
foreach($tipos as $tipo=>$etiq){
    echo "<a href='?tipo=$tipo'>$etiq</a> ";
}


?>
<table><tr><th>CLiente</th><th>Tipo</th><th>Saldo</th>
<?php 
foreach(getclientes($tiposel) as $cli){
?>
<tr>
  <td class=nombre><?= $cli['Nombre'] ?></td>
  <td><?= $cli['tipo'] ?></td>
  <td><?= $cli['saldo'] ?></td>
  <td><a href='detalle.php?id=<?=$cli['id'] ?>'>Detalle</a></td>
</tr>
<?php    
}
?>
</table>


