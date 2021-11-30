<div class='well' style='background:#dea'>
    <div class='row'>
    <div class='col-md-2'>
        <b>Nivel</b><br>
        <?=$masterM->nivel['nombre']?>
    </div>
    <div class='col-md-7 '>
        <b>Intentos restantes</b> <br>
        <?=$masterM->intentosRestan?>
    </div>
    </div>
</div>
<h4>Introduce tu jugada:</h4>
<p class="errores"><?=$erroresMsg?></p>
<form method="POST">
    <?php 
    $longitud=$masterM->nivel['longitud'];
    for($i=1;$i<=$longitud;$i++)
        echo "<input class='jugada' name='numjugado[]' required size=1 maxlength=1 >";
    ?>
    <button class="btn btn-primary">Comprobar</button>
</form>
<?php

// Muestra intentos
if (count($masterM->rondas)) {
?>
    <table cellpadding=8>
    <tr><th>Turno</th>
    <th>Número</th>
    </tr>
<?php     
    $n=0;
    foreach($masterM->rondas as $numero => $mh) {
?>
    <tr>
        <td><?=++$n ?></td>
        <td><?=$numero ?></td>
        
        <td>
            <?= str_repeat("<div class='cubo muerto'></div>", $mh['M']); ?>
            <?= str_repeat("<div class='cubo herido'></div>", $mh['H']); ?>
        </td>
    </tr>
<?php
    }
    echo '</div>';
}
?>
