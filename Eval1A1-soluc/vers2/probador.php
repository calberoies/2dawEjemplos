<?php
session_start();

/**
 * Control de entrada de prendas en probadores
 * Párametros por POST
 * - probador: número de probador 
 * - acc : Acción:
 *    sumar   Añade una prenda al probador N
 *    restar  Disminuye una prenda en el probador N
 *    vaciar  Vacía el probador N
 *    empezar Vacia todos los probadores
 *
 */


if(isset($_POST['acc'])) {
    $numprobadores=count($_SESSION['probador']);

    $id=$_POST['probador'] ?? 0; //Id del probador

    $acc=$_POST['acc'];
    if($acc!='empezar'){
        if(!isset($_SESSION['probador'][$id]))
						die("Ejecución incorrecta");
				$p=&$_SESSION['probador'][$id];		//Enlace para no escribir cada vez $_SESSION['probador'][$id]
				$p['hora']=date('H:i:s');		
    }
    switch($acc){
        case 'sumar':
						$p['prendas']++;
            break;
        case 'restar':
            if($p['prendas']>0){
                $p['prendas']--;
            }
            break;
        case 'vaciar':
            $p['prendas']=0;
            break;
				case 'empezar':
						for($i=1;$i<=$numprobadores;$i++)
							$_SESSION['probador'][$i]=['prendas'=>0,'hora'=>''];
           break;
    }
}

require 'vista.php';
