<?php
require 'bingo.class.php';
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
if(!isset($_SESSION['bingo']))
	header('Location:index.php');

$bingo=$_SESSION['bingo'];

$mensaje='';
if(isset($_GET['bola'])){
	$bingo->marcar($_GET['bola']);
} elseif(isset($_POST['acc'])) {
	switch($_POST['acc']){
		case 'Marcar':
			$bingo->marcar($_POST['bola']);
			break;
		case 'Deshacer': 
			$bingo->deshacer();
			break;
		case 'Empezar':
			$bingo->restart();
			break;
		case 'Comprobar':
			if($bingo->comprobar($_POST['linea']))
				$mensaje='Linea premiada!';
			else 
				$mensaje='Linea NO premiada';	
	}
}

require 'vista.php';
