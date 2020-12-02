<?php 
//Muestra detalle de un cliente 
require 'clientes.php';

$id=$_GET['id'] ?? '';
if(!$id) die('ERROR');

$cli=getcliente($id);
if(!$cli) die('Error');

echo "<h2>Detalle de cliente</h2><ul>";
echo "<li>NOmbre:". $cli['Nombre'];
echo "<li>Tipo:". $tipos[$cli['tipo']];
echo "<li>Saldo:". $cli['saldo'];
echo "</ul>";

?>
