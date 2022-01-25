<a href=entradas_alta.php class='btn btn-primary'>Crear entrada</a>
<?php
foreach($entradas as $entrada){
?>
    <div class=card  style='margin-bottom:20px'><div class=card-body>
        <div class='card-title titulo'>
            <?=$entrada['fecha']?> - <?=$entrada['nombre_cat']?>
            <a class=card-link href="entradas_edit.php?id=<?=$entrada['id']?>">Editar</a>
        </div>
        <div class=card-text>
            <?=$entrada['texto']?>
        </div>
    </div></div>
<?php } ?>

