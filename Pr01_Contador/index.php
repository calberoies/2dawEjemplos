<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contador de palabras</title>

  </head>
  <body>
    <h2>Contador de palabras</h2>

<?php
    require 'funciones.php';

    if (isset($_FILES["texto"])) {
        $error=$_FILES["texto"]["error"];
        $tipo=$_FILES["texto"]["type"];
        //En caso de no haber error y ser un texto entro al if
        if (!$error && $tipo=="text/plain") {
            $rutaLocal=$_FILES["texto"]["tmp_name"];
            $palabras=cuentapals($rutaLocal,2);
            echo "<li>Fichero: ".$_FILES["texto"]['name'];
            echo "<li>Total palabras: ".array_sum($palabras);
            echo "<li>Total palabras distintas: ".count($palabras);
            grid($palabras,'Palabra','Veces');
        }
        else {
            $error= "Ha ocurrido un error";
        }
    }
?>
     <form  method="post" enctype="multipart/form-data">
       <input type="file" name="texto" /><br />
       <input type="submit" name="enviar" value="Comprobar" />
       <div><?= $error ?? ''?></div>
     </form>
  </body>
</html>
