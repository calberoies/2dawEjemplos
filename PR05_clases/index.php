<?php 
/** Ejemplo de Espacios de nombres y excepciones
 * 
 */
require_once 'producto.class.php';
use \tienda\producto;

$p1=new producto('C01','Camiseta');
$p1->addcolor('red');
$p1->addcolor('blue');

echo "El producto ".$p1." tiene colores: ";
echo implode(',',$p1->colores);

echo "<p>Asignamos precio:<br> ";
try {
    $x=new pdo("asda");
    $p1->precio='asd';

} catch (\Exception $e){
    var_dump($e);
    echo "Error : ".$e->getMessage();
}

echo "<p>Asignamos propiedad inexistente:<br> ";
try {
    $p1->talla='XL';

} catch (\Exception $e){
    echo "Error : ".$e->getMessage();
}