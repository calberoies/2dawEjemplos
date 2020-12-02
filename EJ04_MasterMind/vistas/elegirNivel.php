<h3>Elige nivel:</h3>

<div class=row>
    <?php
        foreach(MasterMind::Nivel as $nivel => $datos) { ?>
            
            <div class='col col-md-4'>
                <a href='?nivel=<?=$nivel?>' class='btn btn-primary'> <?=$datos['nombre']?> </a>
            </div>
        <?php } ?>
</div>
