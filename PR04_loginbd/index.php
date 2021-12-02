<?php 
session_start();
require 'db.php';

if(!sesion()) //No estamos en sesión 
    header('Location:login.php');


$entradas=getentradas('usuarios_id='.myid()); 

$vista='entradas_index';
require 'views/layout.php';    

