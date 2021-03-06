<html>
<head>
    <meta charset="utf-8" />
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .titulo {width:70%;margin:auto;font-size:2em;color:blue; }
    .form {width:70%;margin:auto;background:#ddd;
            padding:12px;border-radius:5px}
    </style>
</head>
<body>
    <div class=titulo>Mi red Social</div>
    <div class="container well form" >
        <h2>Registro de Usuario</h2>
        <form method="POST">
            <div class="row">
                <div class="col col-md-6 col-xs-12">
                    <label for="nombre">Nombre </label>
                    <input type="text" id="nombre" class="form-control" name="user[nombre]" value=<?=$user['nombre']?>>
                    <?php verError($errores,'nombre')?>
                </div>
                <div class="col col-md-6 col-xs-12">
                    <label for="email">Email </label>
                    <input id="email" class="form-control" name="user[email]"  value=<?=$user['email']?>>
                    <?php verError($errores,'email')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4 col-xs-4">
                        <label for="sexo">Sexo </label>
                        <?php desplegable('user[sexo]',$user['sexo'],['H'=>'Hombre','M'=>'Mujer']) ?>
                        <?php verError($errores,'sexo')?>
                </div>
                <div class="col col-md-2 col-xs-4">
                    <label for="fechanac">Fecha Nacimiento: </label>
                    <input type="text" id="fechanac" class="form-control" name="user[fechanac]" value="<?=$user['fechanac']?>">
                    <?php verError($errores,'fechanac')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-12 col-xs-12">
                    <label for="observ">Observaciones: </label>
                    <textarea  id="observ" class="form-control" rows="5" name="user[observaciones]"><?=$user['observaciones']?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4 col-xs-6 ">
                    <label for="password">Contrase??a: </label>
                    <input type="password" id="password" class="form-control" name="user[password]" value="<?=$user['password']?>" >
                    <?php verError($errores,'password')?>
                </div>
                <div class="col col-md-4 col-xs-6">
                    <label for="password2">Repite la contrase??a: </label>
                    <input type="password" id="password2" class="form-control" name="password2" value="<?=$password2?>" >
                    <?php verError($errores,'password2')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4">
                    <input type="checkbox" id="condiciones"  name="condiciones" >
                    <label for="condiciones">
                    Acepto las Condiciones
                    </label>
                    <?php verError($errores,'condiciones')?>
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