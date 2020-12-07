<?php 
require 'init.php';
require 'funciones.php';

if($id=$_GET['id'] ?? '');
if(!$id) die('Ejecución incorrecta');

$articulo=findOne('productos',$id);
if(!$articulo)
 die('Artículo inexistente');

$sql = "delete from productos where id=".$id;
if (mysqli_query($db, $sql)) {
    header('Location:articulos.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

