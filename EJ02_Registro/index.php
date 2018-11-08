<?php
/** Formulario de registro de usuarios, con validación de datos en el servidor
 *
 */
require 'funciones.php';

$errores = [];
//Inicializamos datos
$nombre = '';
$email = '';
$password = '';
$sexo = '';
$observaciones = '';
$edad = '';
$condiciones = false;

if (isset($_POST['enviar'])) {
    //Nombre
    $nombre = requerido('nombre');
    if ($nombre && strlen($nombre) < 3) {
        $errores['nombre'] = 'Nombre incorrecto';
    }

    //email
    $email = requerido('email');
    if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'email incorrecto';
    }

    //Sexo
    $sexo = requerido('sexo');

    //password
    $password=requerido('password');
    $password2=requerido('password2');
    if($password) {
        if (strlen($password) < 6) {
            $errores['password'] = "La contraseña debe tener al menos 6 caracteres.";
        } elseif ($password !== $password2) {
            $errores['password'] = "No coinciden las contraseñas";
        }
    }

    //Edad
    $edad = requerido('edad');
    if ($edad && ($edad < 1 or $edad>120)) {
        $errores['edad'] = 'Edad incorrecta';
    }
    //observaciones
    $observaciones = $_POST['observaciones'];

    //condiciones
    if (!requerido('condiciones')) {
        $errores['condiciones'] = "Debes aceptar las condiciones";
    }

    if (!count($errores)) { //Registro correcto ?>
        <html>
        <head>
            <meta charset="utf-8" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container" >
            <h2>Registro de Usuario</h2>
            <div class='alert alert-success'>Usuario dado de alta. Recibirás un correo de confirmación</div>
            </div>
        </body></html>
    <?php
        die;
    }
}

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container" >
        <h2>Registro de Usuario</h2>
        <form method="POST">
            <div class="row">
                <div class="col col-md-4">
                    <label for="nameInput">Nombre </label>
                    <input type="text" id="nameInput" class="form-control" name="nombre" value=<?=$nombre?>>
                    <?php verError('nombre')?>
                </div>
                <div class="col col-md-4">
                    <label for="email">Email </label>
                    <input id="email" class="form-control" name="email"  value=<?=$email?>>
                    <?php verError('email')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-2 ">
                        <label for="sexo">Sexo </label>
                        <?php desplegable('sexo',$sexo,['H'=>'Hombre','M'=>'Mujer']) ?>
                        <?php verError('sexo')?>
                </div>
                <div class="col col-md-1">
                    <label for="edad">Edad: </label>
                    <input type="number" id="edad" class="form-control" name="edad" value=<?=$edad?>>
                    <?php verError('edad')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-8">
                    <label for="observ">Observaciones: </label>
                    <textarea  id="observ" class="form-control" rows="5" name="observaciones"><?=$observaciones?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-4 form-group">
                    <label for="password2">Contraseña: </label>
                    <input type="password" id="password" class="form-control" name="password" >
                    <?php verError('password')?>
                </div>
                <div class="col-4 form-group">
                    <label for="password2">Repite la contraseña: </label>
                    <input type="password" id="password2" class="form-control" name="password2"  >
                    <?php verError('password2')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4">
                    <input type="checkbox" id="condiciones"  name="condiciones" >
                    <label for="condiciones">
                    Acepto las Condiciones
                    </label>
                    <?php verError('condiciones')?>
                </div>
            </div>

            <div class="row">
                <div class="col col-md-2">
                    <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
                </div>
            </div>
        </form>
    </div>

</body>
</html>
