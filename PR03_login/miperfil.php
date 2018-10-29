<?php
require 'init.php';

if (!usuario()) 
    header('Location:login.php');


//Aqui cargariamos los datos del usuario ,mostrariamos el formulario...
require 'cabecera.php';
$u=usuario();
?>

        <?php echo "Te llamas ".$u['nombre'];?>
    </body>
</html>