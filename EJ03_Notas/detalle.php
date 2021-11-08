<?php
require 'funciones.php';

try {
    if(!$id=$_GET['id']??null) 
        throw new Exception('id de asignatura no definido');
    $notas=loadnotas();
    if(!isset($notas[$id]))
        throw new Exception('Asignatura inexistente');
    $datos=$notas[$id];
    require 'views/detalle.php';

} catch (Exception $e) {
    echo "ERROR: ".$e->getMessage();
}
?>