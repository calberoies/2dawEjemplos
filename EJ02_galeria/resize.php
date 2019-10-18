<?php
/** Redimensiona imágenes
 * 
 */
require 'func.php';

if (!$image=$_GET['f']) 
    die("Error de ejecución");

resize(DIRIMAGES.$image,200,200,'Mi Tienda');
header('Location:index.php');
