<?php
require 'clases/mastermind.class.php';
session_start();

if(!isset($_SESSION['MasterMind']))
    header('Location:index.php');

$masterM = $_SESSION['MasterMind'];

if(isset($_POST['numjugado'])) 
    $codigo = $masterM->jugar($_POST['numjugado']);
elseif(isset($_GET['terminar'])) 
    $codigo=Mastermind::JFINMAX;
else
    $codigo=Mastermind::JOK;

$modo=$_SESSION['modo'];  //Si se pone 'T', modo texto

switch ($codigo) {
    case Mastermind::JOK:
    case Mastermind::JERR_NUM:
    case Mastermind::JERR_CREPE:
    case Mastermind::JERR_CPERM:
    case Mastermind::JERR_JREPE:
        $erroresMsg = $masterM->getMensaje($codigo);
        $enjuego=1; //Para que aparezca el botón "Me rindo!"
        $vista='jugadas'.$modo;
        break;
    case 1:
        $vista='ganar'.$modo;
        break;
    case 2:
        $vista='perder'.$modo;
        break;
    break;
}
require 'vistas/layout.php';
?>