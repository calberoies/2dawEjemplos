<?php 
// Con exec , sin prepare
session_start();

require 'db.php';

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

        $sql=sprintf("insert into entradas 
            (fecha,usuarios_id,texto,categorias_id,aprobada)
            values 
            ('%s',%d,'%s',%s,'P')",
                date('Y-m-d H:i:s'),
                myid(),
                $datos['texto'],
                $datos['categorias_id']
            );
        $db->exec($sql);
        header('Location:index.php');
    } catch (Exception $e){
        $error=$e->getMessage();
    }

}

$vista='entradas_form';
require 'views/layout.php';
