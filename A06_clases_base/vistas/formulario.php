<html>
    <head>
        <style>
            label{display:block;margin-top:4px}
            .error{color:red}
        </style>
    </head>
    <body><h2>Alta de Usuario</h2>
        <fieldset style='margin:auto;width:300px'>
        <legend>Usuario</legend>
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
        </fieldset>
    </body>
</html>
