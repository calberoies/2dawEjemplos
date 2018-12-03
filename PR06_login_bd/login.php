<?php
require 'init.php';

if($app->usuario)
    header('Location:index.php');

if(isset($_POST['entrar'])) {
    $usuario=$_POST['usuario'];
    if($app->login($usuario,$_POST['pass'])){
        header('Location:index.php');
        die();
    } else
        $error='Usuario o contraseña incorrectos';
} else {
    $error='';
    $usuario='';
}
$app->render('login',['error'=>$error,'usuario'=>$usuario]);
