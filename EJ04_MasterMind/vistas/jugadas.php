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
    include 'intentos.php';
?>

