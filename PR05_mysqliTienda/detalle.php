<?php 
require 'init.php';
require 'funciones.php';

if(!$id=$_GET['id'] ?? '')
  die('Ejecución incorrecta');


$articulo=findOne('productos',$id);
if(!$articulo)
  die('Artículo inexistente');

$vista='articulos/detalle';
require 'views/layout.php';