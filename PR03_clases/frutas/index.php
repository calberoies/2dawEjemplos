<?php 
require 'Fruit.php';

$f=new Fruit('Pera');
$f->preciobruto=20;

Fruit::$iva=21;
//LLamada a __toString
echo "<br>El precio de  ".$f." neto es ".$f->precio;

//Llamada a __set
$f->name='Manzana';

//Llama a __get
echo "<br>El nombre es ".$f->name;



?>