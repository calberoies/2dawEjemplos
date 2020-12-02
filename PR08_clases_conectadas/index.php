<?php
require 'clases/vuelo.php';

$v=new vuelo('28/11/2016','VLC','MAD');
$v->numvuelo='IB234';

//$v->save();

$reserva=$v->anadirreserva('PEPE GARCIA','25A',150);
$reserva2=$v->anadirreserva('JUANA MATA','25B',170);

if(!$reserva3=$v->anadirreserva('LUISA SANCHEZ','25A',170)){
    echo "Error al añadir reserva del asiento 25A";
}
echo "<p>Reserva creadas...";

echo '<pre>';
foreach($v->reservas as $reserva){
    echo "<li>".$reserva->cliente.' '.$reserva->asiento;
}

echo "<p>El total recuadado en el vuelo es ".$v->recaudacion;

