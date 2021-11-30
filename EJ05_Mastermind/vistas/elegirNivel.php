<h3>Elige nivel:</h3>
<form>
<div class=row>
    <?php
        foreach(MasterMind::Nivel as $nivel => $datos) { ?>
            
            <div class='col col-md-4'>
                <button type=submit  name=nivel value='<?=$nivel?>' class='btn btn-primary'> <?=$datos['nombre']?> </button>
            </div>
        <?php } ?>
</div>
<div class=row>
<div class=col-12><br>
Modo: Texto <input type=radio name=modo value=T>
        Gráfico <input type=radio name=modo value=G checked>
</div>
</div>
</form>
