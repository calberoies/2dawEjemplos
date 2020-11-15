<?php

require 'lib/autoload.php';

$u=new usuario('Pepa','Rodriguez');

echo "<li>Creado el usuario ".$u;  //Se llamará a __tostring()

$u->saldo=90;
echo "<li>El saldo es ".$u->saldo;
$u->saldo+=10;
echo "<li>El saldo ahora es ".$u->saldo;
$u->saldo=-10;
$u->email='pepe@';
try{
    $u->fecha_compra="ss";
} catch (Exception $e) {
    echo '<li>Ha habido una excepción: '.$e->getMessage();
}

if($u->errores) {
    foreach($u->errores as $prop=>$error)
        echo "<li>Error en ".$prop.": ".$error;
}
