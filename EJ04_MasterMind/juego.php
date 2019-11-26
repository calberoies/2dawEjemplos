<?php
require 'clases/mastermind.class.php';
session_start();

if(!isset($_SESSION['MasterMind']))
    header('Location:index.php');

$masterM = $_SESSION['MasterMind'];

if(isset($_POST['numjugado'])) 
    $codigo = $masterM->jugar($_POST['numjugado']);
elseif(isset($_GET['terminar'])) 
    $codigo=2;
else
    $codigo=0;

$errores = [
    0 => '', 
    1 => 'Acertado!',
    2 => 'No quedan intentos',
    3 => "Debe contener ".$masterM->nivel['longitud']." cifras", 
    4 => 'No se pueden repetir las cifras',
    5 => "Escribe cifras entre 1 y ".$masterM->nivel['max'],
    6 => 'No puedes repetir jugada',
];

switch ($codigo) {
    case 0:
    case 3:
    case 4:
    case 5:
    case 6:
        $erroresMsg = $errores[$codigo];
        $enjuego=1; //Para que aparezca el botón "Me rindo!"
        $vista='jugadas';
        break;
    case 1:
        $vista='ganar';
        break;
    case 2:
        $vista='perder';
        break;
    break;
}
require 'vistas/layout.php';
?>