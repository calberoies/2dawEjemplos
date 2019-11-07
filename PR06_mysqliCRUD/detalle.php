<?php 
require_once 'init.php';
require_once 'funcproductos.php';

if(!$id=$_GET['id'] ?? false ) 
    die('Ejecución incorrecta');

    $prod=getproducto($id);

require 'vistas/detalle.php';