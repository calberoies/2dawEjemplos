<?php 
session_start();
require 'db.php';


if(!sesion()) //No estamos en sesión 
    header('Location:login.php');

if(!$id=$_GET['id']) die('Error');

$db=conectadb();

if(!$entrada=getentrada($id))
    die("No existe la entrada");


//Filtros
if($entrada['usuarios_id']!=myid())
    die('No puedes editar esta entrada');

//POST
if(isset($_POST['enviar'])){
    try {
        $datos=$_POST;
        //VALIDACIÓN
        if(!$datos['texto'] || !$datos['categorias_id']){
            throw new Exception('Completa los datos');
        }
        //Actualización en BD
        $sql="update entradas
            set texto=:texto,categorias_id=:cat
            where id=:id";

        $q=$db->prepare($sql);

        $q->execute([
            ':id'=>$id,
            ':texto'=>$datos['texto'],
            ':cat'=>$datos['categorias_id']
        ]);
        //Redirección
        header('Location:index.php');
    } catch (Exception $e){
        $error=$e->getMessage();
    }

}
$vista='entradas_form';
require 'views/layout.php';
?>
