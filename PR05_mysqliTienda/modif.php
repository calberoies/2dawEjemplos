<?php 
require 'init.php';
require 'funciones.php';

if($id=$_GET['id'] ?? '');
if(!$id) die('Ejecución incorrecta');

$articulo=findOne('productos',$id);
if(!$articulo)
 die('Artículo inexistente');


$errores=[];
if(isset($_POST['envio'])){

    foreach($articulo as $campo=>$valor){
        if(isset($_POST[$campo]))
            $articulo[$campo]=$_POST[$campo];
        }

    // Validamos
    if(!is_numeric($articulo['precio'])) {
        $errores['precio']='Precio incorrecto';
    }   
    if(!$articulo['nombre']) {
        $errores['nombre']='Nombre es requerido';
    }   

    //Si no hay errores, guardamos en BD
    if(!$errores) {
        $sql = sprintf("update productos 
            set nombre='%s',precio=%s,categorias_id=%d,
                estado='%s',detalle='%s' where id=%d",
            $articulo['nombre'],
            $articulo['precio'],
            $articulo['categorias_id'],
            $articulo['estado'],
            $articulo['detalle'],
            $id
            );

        if (mysqli_query($db, $sql)) {
            header('Location:articulos.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
}
$vista='articulos/form';
require 'views/layout.php';

