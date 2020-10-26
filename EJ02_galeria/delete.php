<?php
/** Borra imagenes. 
 *  Recibe images[] lista de imagenes por POST
 *  
 */
require_once "func.php";

$images = $_POST['images'] ?? [];

if (isset($_POST['confirma'])) {
    borraImagenes($images);
    header('Location: '.'index.php');
}


include "html/header.html";

if(count($images)){
?>
<div class="container h-75">
    <form method="post">
        <?php
        verImagenes($images, false);
      
        ?>
        <div class="row justify-content-center">
            <h4>Estás seguro?</h4>
        </div>
        <div class="row justify-content-center">
            <div class="btn-group">
                <input type="submit" class="btn btn-danger" value="Borrar" name="confirma">
                <button class="btn btn-default"><a href="index.php">Volver</a></button>
            </div>
        </div>
    </form>
</div>
<?php
} else { ?>
<div class="container h-75">
    <div class="row justify-content-center">
        <h3>NO has seleccionado nada!</h3>
        <div class="btn-group">
            <button class="btn btn-default"><a href="index.php">Volver</a></button>
        </div>
    </div>
</div>
<?php
}
include "html/footer.html";
?>