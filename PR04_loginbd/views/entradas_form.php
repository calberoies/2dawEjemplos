<?php 
require 'util.php';
?>
    
<form method="POST">
    <div class="row">

        <div class="col col-md-2 col-xs-12">
            <label>Categoría:</label>
            <?= desplegable('categorias_id',
                    $entrada['categorias_id'],
                    listdata(getcategorias(),'id','nombre'));?>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-12 col-xs-12">
            <label for="nombre">Texto </label>
            <textarea class=form-control name=texto><?=$entrada['texto']?></textarea>
        </div>
    </div>
    <div class=error><div class=col-12>
        <?=$error ??''?>
    </div></div>
    <div class="row">
        <div class="col col-md-2">
            <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
        </div>
    </div>
</form>
