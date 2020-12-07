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

$vista='articulos/listado';
require 'views/layout.php';
?>

