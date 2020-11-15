<?php
/** Ejemplo de uso de clases con herencia, e implementacion de metodos getter y setter para las propiedades
 * La clase usuario , que podria ser un modelo de datos, deriva de la clase 'base', que define la funcionalidad basica
 * 
 */

require 'lib/autoload.php';

$usuario=new usuario;
if(isset($_POST['guardar'])) { //Venimos del formulario
   
    $usuario->setvalores($_POST['usuario']);
    
    if(!$usuario->errores){
        //Lo guardariamos en BD
        require 'vistas/verusuario.php';
        die;
    }
}


require 'vistas/formulario.php';



