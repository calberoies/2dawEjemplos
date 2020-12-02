<?php
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
        <td><?=$numero?></td>
        
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