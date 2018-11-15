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
                    <label for="nombre">Nombre </label>
                    <input type="text" id="nombre" class="form-control" name="usuario[nombre]" value=<?=$u->nombre?>>
                    <?php vererror($u,'nombre')?>
                </div>
                <div class="col col-md-4">
                    <label for="email">Email </label>
                    <input id="email" class="form-control" name="usuario[email]"  value=<?=$u->email?>>
                    <?php vererror($u,'email')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-2 ">
                        <label for="sexo">Sexo </label>
                        <?php desplegable('usuario[sexo]',$u->sexo,usuario::sexooptions) ?>
                        <?php vererror($u,'sexo')?>
                </div>
                <div class="col col-md-2">
                    <label for="fecha_nac">Fecha Nac: </label>
                    <input type="date" id="fecha_nac" class="form-control" name="usuario[fecha_nac]" value=<?=$u->fecha_nac?>>
                    <?php vererror($u,'fecha_nac')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-8">
                    <label for="observ">Observaciones: </label>
                    <textarea  id="observ" class="form-control" rows="5" name="usuario[observaciones]"><?=$u->observaciones?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4 ">
                    <label for="password2">Contraseña: </label>
                    <input type="password" id="password" class="form-control" name="usuario[password]" >
                    <?php vererror($u,'password')?>
                </div>
                <div class="col col-md-4">
                    <label for="password2">Repite la contraseña: </label>
                    <input type="password" id="password2" class="form-control" name="password2"  >
                    <?php vererror($u,'password2')?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-4">
                    <input type="checkbox" id="condiciones"  name="condiciones" >
                    <label for="condiciones">
                    Acepto las Condiciones
                    </label>
                    <?php 
                        if(isset($ercondiciones)) 
                            echo "<div class='alert alert-danger'>$ercondiciones</div>";
                    ?>
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
