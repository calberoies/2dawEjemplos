<?php 
require 'init.php';
if(!isset($_GET['id'])) die("Error de ejecución"); 

$id= $_GET['id']; 

$viaje=$db->query('select * from viajes where id='.$db->quote($id))->fetch();
if(!$viaje) die('No existe ese viaje');   

$mensaje='';
$asientos=$_POST['asientos'] ?? [];
$ids=implode(',',$asientos);

if(isset($_POST['bventa'])) {
    $pasajero=$_POST['pasajero'];
    if($asientos and $pasajero) {
        $query=$db->prepare("update asientos set ocupado=1,pasajero=:pasajero where ocupado=0 and viajes_id=:vid and id in ($ids)");
        $query->execute([':vid'=>$id,':pasajero'=>$pasajero]);
        $mensaje=count($asientos).' Asientos vendidos';
    }
} 

$asientos=$db->query('select * from asientos where viajes_id='.$db->quote($id).' order by asiento')->fetchAll();

require 'views/venta.php';