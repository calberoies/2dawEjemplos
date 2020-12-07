<?php 
require 'init.php';

$articulo=[
    'nombre'=>'',
    'precio'=>'',
    'categorias_id'=>'',
    'detalle'=>'',
    'estado'=>'A'
];
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
        $sql = sprintf("INSERT INTO productos 
            (nombre,precio,categorias_id,estado,detalle)
            VALUES ('%s', '%s', %d,'%s','%s')",
            $articulo['nombre'],
            $articulo['precio'],
            $articulo['categorias_id'],
            $articulo['estado'],
            $articulo['detalle']
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

