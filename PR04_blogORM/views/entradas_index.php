<a href="?r=entradas/create" class='btn btn-primary'>Crear entrada</a>
<?php
foreach($entradas as $entrada){
?>
    <div class=card  style='margin-bottom:20px'>
    <div class=card-body>
        <div class='card-title titulo'>
            <?=$entrada->fecha?> - <?=$entrada->usuario->nombre??'' ?> - <?=$entrada->categoria->nombre??'' ?>
            <a class=card-link href="?r=entradas/update&id=<?=$entrada->id?>">Editar</a>
            <a class=card-link href="?r=entradas/delete&id=<?=$entrada->id?>">Borrar</a>
        </div>
        <div class=card-text>
            <?=$entrada->texto;?>
        </div>
    </div>
    </div>
<?php } ?>

