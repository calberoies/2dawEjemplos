<form method="POST">
    <div class="row">

        <div class="col col-md-2 col-xs-12">
            <label>Categoría:</label>
            <?= Util::desplegable('Entradas[categorias_id]',
                    $entrada->categorias_id,
                    Util::listdata(Categorias::findAll(),'id','nombre'));?>
            <?= Util::error($entrada,'categorias_id') ?>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-12 col-xs-12">
            <label for="nombre">Texto </label>
            <textarea class=form-control name="Entradas[texto]"><?=$entrada->texto?></textarea>
            <?= Util::error($entrada,'texto') ?>
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
