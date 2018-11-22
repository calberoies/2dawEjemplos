<?php
require 'probadores.class.php';
session_start();
if(!isset($_SESSION['ctl_probadores']))
    header('Location:index.php');

$ctl=$_SESSION['ctl_probadores'];    
/**
 * Control de entrada de prendas en probadores
 *
 * Acciones:
 * ...    Añade una prenda al probador N
 * ...    Disminuye una prenda en el probador N
 * ...    Vacía el probador N
 * ...    Vacia todos los probadores
 *
 */


if(isset($_GET['acc'])) {
    $id=$_GET['id'] ?? 0; //Id del probador

    $acc=$_GET['acc'];
    if($acc!='empezar'){
        if($id==0 or $id>$ctl->numprobadores)
            die("Ejecución incorrecta");
    }
    switch($acc){
        case 'sumar':
            $ctl->update($id,1);
            break;
        case 'restar':
            $ctl->update($id,-1);
            break;
        case 'vaciar':
            $ctl->clear($id);
            break;
        case 'empezar':
            $ctl->clearAll();
            break;
    }
}

require 'vista.php';
