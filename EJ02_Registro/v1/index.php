<?php
/** Formulario de registro de usuarios, con validación de datos en el servidor. Versión 1
 *
 */

$errores =  [];
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
    $nombre = $_POST['nombre'] ?? '';
    if(!$nombre)
        $errores['nombre'] = 'Nombre requerido';
    elseif (strlen($nombre) < 3) 
        $errores['nombre'] = 'Nombre incorrecto';

    //email
    $email = $_POST['email'] ?? '';
    if(!$email)
        $errores['email'] = 'email requerido';
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'email incorrecto';
    }

    //Sexo
    $sexo = $_POST['sexo'] ?? '';
    if(!$sexo)
        $errores['sexo'] = 'Sexo requerido';

    //password
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';
    if(!$password) {
        $errores['password'] = 'Password requerido';
    } else {        
        if (strlen($password) < 6) {
            $errores['password'] = "La contraseña debe tener al menos 6 caracteres.";
        } elseif ($password !== $password2) {
            $errores['password'] = "No coinciden las contraseñas";
        }
    }

    //Edad
    $edad = $_POST['edad'] ?? '';
    if (!$edad) 
        $errores['edad'] = "Edad requerida";
    elseif (!is_numeric($edad) or $edad < 1 or $edad>120) {
        $errores['edad'] = 'Edad incorrecta';
    }
    //observaciones
    $observaciones = $_POST['observaciones'];

    //condiciones
    if (!($_POST['condiciones'] ?? false)) {
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container well" >
        <h2>Registro de Usuario</h2>
        <form method="POST">
            <div class="row">
                <div class="col col-md-4">
                    <label for="nombre">Nombre </label>
                    <input type="text" id="nombre" class="form-control" name="nombre" value=<?=$nombre?>>
                    <span class='form-text text-danger'><?= $errores['nombre'] ?? '' ?></span>
                </div>
                <div class="col col-md-4">
                    <label for="email">Email </label>
                    <input id="email" class="form-control" name="email"  value=<?=$email?>>
                    <span class='form-text text-danger'><?= $errores['email'] ?? '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-2 ">
                        <label for="sexo">Sexo </label><br>
                        Hombre: <input type=radio name=sexo value=H <?= $sexo=='H' ? 'checked' :''; ?>> 
                        Mujer: <input type=radio name=sexo value=M <?= $sexo=='M'? 'checked' :''; ?>>
                        <span class='form-text text-danger'><?= $errores['sexo'] ?? '' ?></span>
                </div>
                <div class="col col-md-2">
                    <label for="edad">Edad: </label>
                    <input type="number" id="edad" class="form-control" name="edad" value=<?=$edad?>>
                    <span class='form-text text-danger'><?= $errores['edad'] ?? '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-8">
                    <label for="observ">Observaciones: </label>
                    <textarea  id="observ" class="form-control" rows="5" name="observaciones"><?=$observaciones?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4 ">
                    <label for="password2">Contraseña: </label>
                    <input type="password" id="password" class="form-control" name="password" >
                    <span class='form-text text-danger'><?= $errores['password'] ?? '' ?></span>
                </div>
                <div class="col col-md-4">
                    <label for="password2">Repite la contraseña: </label>
                    <input type="password" id="password2" class="form-control" name="password2"  >
                    
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4">
                    <input type="checkbox" id="condiciones"  name="condiciones" >
                    <label for="condiciones">
                    Acepto las Condiciones
                    </label>
                    <span class='form-text text-danger'><?= $errores['condiciones'] ?? '' ?></span>
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
