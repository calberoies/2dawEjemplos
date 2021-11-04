<?php 
require 'Fruit.php';

$f=new Fruit('Pera');
$f->preciobruto=20;
Fruit::$iva=21;
echo $f->precio;

$f->name='Manzana';

echo $f->get_name();



?>