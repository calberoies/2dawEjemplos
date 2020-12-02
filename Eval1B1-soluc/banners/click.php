<?php
require 'banners.php';

if(!isset($_GET['id']))   //if(!$id=$_GET['id']??null) {
    die('Error, ejecución incorrecta');

$id=$_GET['id'];

$banner=$banners[$id];

$f=fopen('clicks.log','a');
$linea=sprintf('%s,%s,%s',$id,date('d/m/Y'),date('H:i:s'));
fputs($f,$linea);
fclose($f);


//Otra forma
$linea=implode(',',[$id,date('d/m/Y'),date('H:i:s')] );
file_put_contents('clicks.log',$linea,FILE_APPEND);

header('Location:'.$banner['url']);


?>
