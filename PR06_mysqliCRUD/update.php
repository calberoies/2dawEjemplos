<?php 
require_once 'init.php';
require_once 'funcproductos.php';

if(!$id=$_GET['id'] ?? false ) 
    die('Ejecución incorrecta');

$prod = getproducto($id); //Carga el producto. Si no existe termina ejecución
$error='';

if($form=getparams('prod')){
    if(updateproducto($id,$form))
        header('Location:index.php');
    else 
        $error='Error al actualizar';
} 

require 'vistas/update.php';
?> 
