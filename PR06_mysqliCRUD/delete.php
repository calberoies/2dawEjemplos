<?php 
require_once 'init.php';
require_once 'funcproductos.php';

if($id=$_POST['id'] ?? false ) {
    if(!deleteproducto($id))
        echo "Error al borrar ";
    else
        header('Location: index.php');
}
