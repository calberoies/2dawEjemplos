<?php 
session_start();
require 'db.php';

// Con sentencia preparada

if(!sesion()) //No estamos en sesión 
    header('Location:login.php');

//POST
if(isset($_POST['enviar'])){
    try {
        $db=conectadb();
        $datos=$_POST;
        if(!$datos['texto'] || !$datos['categorias_id']){
            throw new Exception('Completa los datos');
        }

        $sql="insert into entradas 
            (fecha,usuarios_id,texto,categorias_id,aprobada)
            values 
            (:fecha,:user,:texto,:cat,'P')";

        $q=$db->prepare($sql);

        $q->execute([
            ':fecha'=>date('Y-m-d H:i:s'),
            ':user'=>myid(),
            ':texto'=>$datos['texto'],
            ':cat'=>$datos['categorias_id']
        ]);
        header('Location:index.php');
    } catch (Exception $e){
        $error=$e->getMessage();
    }

}
$vista='entradas_form';
require 'views/layout.php';
?>
