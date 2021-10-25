<?php
/** galería de imágenes
 * 
 */

require_once "func.php";

$images = array_diff(scandir(DIRIMAGES), ['..', '.']);
sort($images);

require "html/header.html";
?>

<div class="container h-75">
    <form method="post" action="delete.php">
        <div class="row justify-content-center">
        <?php 
            $chkdelete=true; // Para que muestre los checkbox de selección
            foreach ($images as $image) {
                require 'html/imagen.php';
            }
           
        ?>
        </div>
        <div class="row justify-content-center">
            <?php
                if (count($images)>0) {
                    echo '<input type="submit" class="btn btn-primary" value="Borrar" name="enviar">';
                }
            ?> 
        </div>
    </form>
</div>
<?php
require "html/footer.html";
?>