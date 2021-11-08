<?php
require 'funciones.php';

if(isset($_POST['enviar'])) {
    $doc=$_FILES['doc'];
    $info = pathinfo($doc['name']);
    if ($info["extension"] != "csv") {
        $error='Ha de ser un fichero csv';
    } else {
        if(!$notas=procesafichero($doc['tmp_name'])) 
            $error='Error al cargar notas';

    };
}
require 'views/form.php';
try{
    $notas=loadnotas();
    require 'views/listado.php';
}catch (Exception $e){

}

?>