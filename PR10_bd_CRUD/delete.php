<?php
/** Borrado de título
 * Parámetros: id = código a borrar
 */
require 'init.php';
if(!ensesion()) 
	termina('Identificación requerida');

$id=getparam('id');

$query = $db->prepare("delete from titulos where id=:id");
$query->bindParam(':id',$id);

if(!$query->execute()) dbdie($query);

header('Location:index.php');
