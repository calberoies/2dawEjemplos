<?php
session_start();
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
    $numprobadores=count($_SESSION['probador']);

    $id=$_GET['id'] ?? 0; //Id del probador

    $acc=$_GET['acc'];
    if($acc!='empezar'){
        if($id==0 or $id>$numprobadores)
            die("Ejecución incorrecta");
    }
    switch($acc){
        case 'sumar':
            $_SESSION['probador'][$id]['prendas']++;
            $_SESSION['probador'][$id]['hora']=date('H:i:s');
            break;
        case 'restar':
            if($_SESSION['probador'][$id]['prendas']>0){
                $_SESSION['probador'][$id]['prendas']--;
                $_SESSION['probador'][$id]['hora']=date('H:i:s');
            }
            break;
        case 'vaciar':
            $_SESSION['probador'][$id]['prendas']=0;
            $_SESSION['probador'][$id]['hora']=date('H:i:s');
            break;
        case 'empezar':
           for($i=1;$i<=$numprobadores;$i++)
              $_SESSION['probador'][$i]=['prendas'=>0,'hora'=>''];

           break;
    }
}

require 'vista.php';
