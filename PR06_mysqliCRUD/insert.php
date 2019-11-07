<?php 
require_once 'init.php';
require_once 'funcproductos.php';

$prod=['descripcion'=>'','precio'=>'','estado'=>'A'];
$error='';

if(isset($_POST['actualizar'])) {
    $prod=array_merge($prod,getparams('prod'));
    
    if(insertproducto($prod))
        header('location:index.php');
    else 
        $error='Error al insertar';

}
require 'vistas/insert.php';
?>
