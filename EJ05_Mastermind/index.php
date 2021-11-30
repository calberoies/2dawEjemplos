<?php
require 'clases/mastermind.class.php';

session_start();
if (isset($_GET['volver'])) {
    session_destroy();
    session_start();
}

if (isset($_GET['nivel'])) {
    $masterM = new MasterMind($_GET['nivel']);
    $_SESSION['MasterMind'] = $masterM;
    $_SESSION['modo'] = $_GET['modo']??'G';
    header("location: juego.php");
}

$vista='elegirNivel';
require 'vistas/layout.php';
?>
