<?php
session_start();
/**
 * Marcador de bingo
 * Parámetros por POST
 * bola: número de bola (de 1 a 90)
 * acc:
 *    marcar   Marca una bola como jugada
 *    deshacer Deshace la última jugada
 *    empezar  Reinicia partida
 *    linea    Comprueba los números de una linea premiada. 
 * linea: 5 números de la linea separados por comas, para la acc=linea
 */

$mensaje='';
if(isset($_POST['acc'])) {
	switch($_POST['acc']){
		case 'Marcar':
			$bola=$_POST['bola'];
			if(is_numeric($bola) && $bola>0 && $bola<=90){
				if(($p=array_search($bola,$_SESSION['bolas']))!==false)
					unset($_SESSION['bolas'][$p]);
				else 
					$_SESSION['bolas'][]=$bola;
			}
			break;
		case 'Deshacer': 
			array_pop($_SESSION['bolas']);
			break;
		case 'Empezar':
			$_SESSION['bolas']=[];
			break;
		case 'Comprobar':
			$numeros=explode(',',$_POST['linea']);
			if(count(array_intersect($numeros,$_SESSION['bolas']))==5)
				$mensaje='Linea premiada!';
			else 
				$mensaje='Linea NO premiada';	
	}
}

require 'vista.php';
