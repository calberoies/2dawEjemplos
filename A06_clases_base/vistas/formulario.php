<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
            label{display:block;margin-top:4px}
            .error{color:red}
        </style>
    </head>
    <body><h2>Alta de Usuario</h2>
        <div class='well' style='margin:auto;width:300px'>
        <h3>Usuario</h3>
        <form method="post">
            <?php $form=new Tform($usuario); ?>
            <div><label>Nombre:</label> 
                <?php $form->inputtext('nombre'); ?>
            </div>
            <div><label>Apellidos:</label> 
                <?php $form->inputtext('apellidos'); ?>
            </div>
            <div><label>email:</label> 
                <?php $form->inputtext('email','type=email'); ?>
            </div>
            <div><label>Fecha Nacimiento:</label> 
                <?php $form->inputtext('fechanac','type=date'); ?>
            </div>
            <div><label>Sexo:</label> 
                <?php $form->dropdown('sexo','',usuario::$sexooptions); ?>
            </div>
            <br>
            <input type="submit" name="guardar" value="Guardar">
        </form>
        </div>
    </body>
</html>
