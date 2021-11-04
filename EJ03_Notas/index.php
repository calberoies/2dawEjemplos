<?php
require 'funciones.php';
procesafichero('notasalumnos.csv');

if(isset($_POST['enviar'])) {
    $doc=$_FILES['doc'];
    $info = pathinfo($doc['name']);
    if ($info["extension"] != "csv") {
        $error='Ha de ser un fichero csv';
    } else {
        if($notas=procesafichero($doc['tmp_name']))
            require 'views/listado.php';
        else 
            $error='Error al cargar notas';

    };
}
require 'views/form.php';

?>