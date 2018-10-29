<?php
/** Ejemplo de uso de Sesiones
 * 
 */
require "init.php";


require 'cabecera.php';
if(!usuario()) die();
?>
        <div>
            
            <h3>Productos de la tienda</h3>
            <li>Televisores
            <li>Libros
        </div>
<?php
require "pie.php";
?>