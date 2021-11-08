<?php 

require 'Carrito.php';
session_start();

if(!isset($_SESSION['carrito'])){
    $carrito=new Carrito;
    $_SESSION['carrito']=$carrito;
} else 
    $carrito=$_SESSION['carrito'];

$carrito->addProducto('T01',1);
$carrito->addProducto('M01',2);

echo "<pre>";
var_dump($carrito->getProductos());

$carrito->addProducto('M03',2);

