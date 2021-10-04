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
    'fechanac' => '',
];

$condiciones = false;
$password2=$_POST['password2']??'';

if (isset($_POST['enviar'])) {
    //Asigna todos los campos
    foreach($_POST['user'] as $dato=>$valor)
        if(isset($user[$dato]))
            $user[$dato]=$valor;
            
    //$user=$_POST['user'];


    $errores=requeridos($user,['nombre','email','password','sexo','fechanac']);

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

    //fechanac. 
    if ($user['fechanac']) {
        $edad=calcula_edad($user['fechanac']);
        if($edad===false)
            $errores['fechanac']='Formato incorrecto. Ha de ser dd/mm/aaaa';
        elseif($edad<18)
            $errores['fechanac']='Tienes '.$edad.' años. Has de ser mayor de edad para registrarte';
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
