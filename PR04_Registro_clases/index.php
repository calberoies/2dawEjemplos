<?php
/** Formulario de registro de usuarios, con validación de datos en el servidor
 *
 */
require 'funciones.php';
require 'usuario.class.php';

//Inicializamos datos
$u=new usuario;

if (isset($_POST['enviar'])) {
    $u->asignar($_POST['usuario']);

    if($u->password!=$_POST['password2'])
        $u->seterror('password','No coinciden las contraseñas');
    
    if(!isset($_POST['condiciones']))
        $ercondiciones='Debes aceptar las condiciones';
    elseif($u->validar()) {
        //$u->save(); Se guardaría en Base de datos
        require 'vistas/correcto.php';
        die();
    }
}

require 'vistas/registro.php';