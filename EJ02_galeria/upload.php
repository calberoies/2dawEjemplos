<?php

/** Sube imágenes
 * 
 */
define('MAX_FILES', 5);
require 'func.php';

$error = '';
if (isset($_POST['enviar'])) {

    if (isset($_FILES['img'])) {
        $files = $_FILES['img'];
        for ($i = 0; $i < MAX_FILES; $i++) {
            if (!$files['name'][$i]) continue; //Fichero no enviado en esa posición
            if ($files['error'][$i] == 0) {
                if (strpos($files['type'][$i], 'image') !== false) { //Comprueba tipo de fichero
                    $tmp_name = $files['tmp_name'][$i];

                    $name = $files['name'][$i];
                    //Si hay una imagen con el mismo nombre, le añade "copia de"
                    while (file_exists(DIRIMAGES . '/' . $name)) {
                        $name = 'copia de ' . $name;
                    }
                    if (!move_uploaded_file($tmp_name, DIRIMAGES . '/' . $name))
                        $error = "Error al mover imágenes";
                } else
                    $error = 'Solamente se pueden subir imágenes';
            } else
                $error = "Error al subir imágenes";
        }
    }
    //Procesa image por URL
    if ($url = $_POST['url'] ?? '') {
        if (@$imagen = file_get_contents($url)) { //La @ evita que salga un warning
            file_put_contents(DIRIMAGES . '/' . uniqid() . '.jpg', $imagen);
        } else
            $error = ' Error al descarga imagen';
    }
    if (!$error)
        header('Location:index.php');
}

require "html/header.html";
?>
<div class="container d-flex h-75">
    <div class="row flex-grow-1 justify-content-center align-self-center">
        <form method="POST" class="upload-form " enctype="multipart/form-data">
            <?php
            for ($i = 0; $i < MAX_FILES; $i++) {
                echo "<div class='form-row'>
                        <div class='col-12 form-group'>
                            <input type='file' name='img[]'>
                        </div>
                        </div>";
            }

            ?>
            <label>o Pega aquí la URL</label>
            <input type=text name=url class=form-control><br>
            <?php
            if ($error)
                echo "<div class=error>$error</div>";
            ?>
            <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
        </form>
    </div>
</div>
<?php
include "html/footer.html";
?>