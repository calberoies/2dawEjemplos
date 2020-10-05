<?php
/** Formulario de registro de usuarios, con validación de datos en el servidor
 *
 */
require 'funciones.php';

$errores = [];
//Inicializamos datos
$user=[
    'nombre' => '',
    'email' => '',
    'password' => '',
    'sexo' => '',
    'observaciones' => '',
    'edad' => '',
];

$condiciones = false;
$password2=$_POST['password2']??'';

if (isset($_POST['enviar'])) {
    //Asigna todos los campos
    foreach($_POST['user'] as $dato=>$valor)
        if(isset($user[$dato]))
            $user[$dato]=$valor;
            
    //$user=$_POST['user'];


    $errores=requeridos($user,['nombre','email','password','sexo','edad']);

    //Nombre
    if (strlen($user['nombre']) < 3) {
        $errores['nombre'] = 'Nombre incorrecto';
    }

    //email
    if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'email incorrecto';
    }

    //password
    
    if($user['password']) {
        if (strlen($user['password']) < 6) {
            $errores['password'] = "La contraseña debe tener al menos 6 caracteres.";
        } elseif ($user['password'] !== $password2) {
            $errores['password'] = "No coinciden las contraseñas";
        }
    }

    //Edad
    if ($user['edad'] && ($user['edad'] < 1 or $user['edad']>120)) {
        $errores['edad'] = 'Edad incorrecta';
    }

    //condiciones
    if (!($_POST['condiciones'] ?? false)) {
        $errores['condiciones'] = "Debes aceptar las condiciones";
    }

    if (!count($errores)) { 
        require 'registroOK.php';
        die;
    }
}

require 'form.php';
?>
