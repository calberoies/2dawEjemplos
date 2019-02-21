<?php 
require 'init.php';
if(!isset($_GET['id'])) die("Error de ejecución"); 

$id= $_GET['id']; 

$asiento=$db->query('select * from asientos where id='.$db->quote($id))->fetch();
if(!$asiento) die('No existe ese asiento');   

$query=$db->prepare("update asientos set ocupado=0,pasajero=null where id =:id");
$query->execute([':id'=>$id]);
header('Location:venta.php?id='.$asiento['viajes_id']);
    

