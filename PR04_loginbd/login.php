<?php 
session_start();
require 'db.php';

if(sesion()) //Estamos en sesión ya
    header('Location:index.php');

$user=$_POST['user']??'';
$password=$_POST['password']??'';

if($user){
    //Validamos
    
    if(login($user,$password)){
        header('Location:index.php');
    } else 
        $error='Datos de acceso incorrectos';
}

$vista='login_form';
require 'views/layout.php';
