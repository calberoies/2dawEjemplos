<?php
/** galería de imágenes
 * 
 */

$image_dir = "images";
require_once "func.php";

if (scandir($image_dir)) {
    $images = array_diff(scandir($image_dir), array('..', '.'));
    sort($images);
}

require "html/header.html";
?>

<div class="container h-75">
    <form method="post" action="delete.php">
    
        <?php 
            verImagenes($images);
        ?>
        
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