<?php 
require 'init.php';
require 'funciones.php';

$categorias=findall('categorias');
$vista='categorias/listado';
require 'views/layout.php';

?>

