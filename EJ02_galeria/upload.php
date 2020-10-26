<?php
/** Sube imágenes
 * 
 */
define('MAX_FILES', 5);
require 'func.php';

if (isset($_FILES['img'])) {
    for ($i = 0; $i<MAX_FILES;$i++) {
        if(!$_FILES['img']['name'][$i]) continue; //Fichero no enviado en esa posición
        if ($_FILES['img']['error'][$i] == 0) {
            $tmp_name = $_FILES['img']['tmp_name'][$i];

            $name = $_FILES['img']['name'][$i];
            //Si hay una imagen con el mismo nombre, le añade "copia de"
            while (file_exists(DIRIMAGES.'/'.$name)) {
                $name = 'copia de '.$name;
            }
            if(!move_uploaded_file($tmp_name, DIRIMAGES.'/'.$name))
                echo "Error al mover imágenes";
        } else 
            echo "Error al subir imágenes";
    }
    header('Location:index.php');
    die;
}


include "html/header.html";
?>
<div class="container d-flex h-75">
    <div class="row flex-grow-1 justify-content-center align-self-center">
        <form method="POST" class="upload-form " enctype="multipart/form-data">
            <?php
                for($i = 0;$i<MAX_FILES;$i++) {
                    echo "<div class='form-row'><div class='col-12 form-group'><input type='file' name='img[]'></div></div>";
                }

            ?>
            <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
        </form>
    </div>
</div>
<?php
include "html/footer.html";
?>