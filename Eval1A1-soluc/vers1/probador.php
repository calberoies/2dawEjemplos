<?php
session_start();

//Versión inicial, sin guardar la hora de último acceso
/**
 * Control de entrada de prendas en probadores
 * Párametros por GET
 * - probador: número de probador 
 * - acc : Acción:
 *    sumar   Añade una prenda al probador N
 *    restar  Disminuye una prenda en el probador N
 *    vaciar  Vacía el probador N
 *    empezar Vacia todos los probadores
 *
 */

if(isset($_GET['acc'])) {
    $numprobadores=count($_SESSION['probador']);

    $id=$_GET['probador'] ?? 0; //Id del probador

    $acc=$_GET['acc'];
    if($acc!='empezar'){
        if($id==0 or $id>$numprobadores)
						die("Ejecución incorrecta");
    }
    switch($acc){
        case 'sumar':
			$_SESSION['probador'][$id]++;
            break;
        case 'restar':
            if($_SESSION['probador'][$id]>0){
                $_SESSION['probador'][$id]--;
            }
            break;
        case 'vaciar':
            $_SESSION['probador'][$id]=0;
            break;
        case 'empezar':
            for($i=1;$i<=$numprobadores;$i++)
              $_SESSION['probador'][$i]=0;
           break;
    }
}

require 'vista.php';
