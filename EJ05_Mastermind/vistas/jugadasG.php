<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<?php 
$longitud=$masterM->nivel['longitud'];
$max=$masterM->nivel['max'];

?>
<div class='well cabecera' >
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
<form method="POST">
<?php
    //Jugada, como campos ocultos
    for($i=1;$i<=$longitud;$i++) {
        echo "<input type=hidden id='num$i' class=num name='numjugado[]'>";
    }
?>

<div class=row>
    <div class=col-2>Turno</div> <div class=col-6>Jugada</div><div class=col-4'>Muertos y Heridos</div>
</div>

    <?php   
    //Jugadas ya realizadas  
    $n=0;
    foreach($masterM->rondas as $numero => $mh) {
    ?>
    <div class=row>
        <div class=col-2><?=++$n ?></div>
        <div class='col-5 jugadaant'><?php foreach(str_split($numero) as $b) {
                echo "<div class='bola bola$b'></div>";
            }
        ?></div>
        
        <div class='col-4 mhant'>
            <?= str_repeat("<div class='cubo muerto'></div>", $mh['M']); ?>
            <?= str_repeat("<div class='cubo herido'></div>", $mh['H']); ?>
        </div>
    </div>
<?php } 
    // Jugadas pendientes
    while($n<$masterM->intentos) {
        $n++;
        echo "<div class=row><div class='col-2'>$n</div>  
                <div class='col-5 jugadaant'>&nbsp;</div>        
                </div>";
    }

    //Jugada nueva:
    ?>
    <div class=row><div class=col-2></div>
        <div class='col-5 ' id=njugada></div>
        <div class="col-4 errores"><?=$erroresMsg?></div>
    </div>
    <div class='row listabolas'><div class=col-2>Elige:</div>
        <div class='col-5' >
            <?php 
            for($i=1;$i<=$max;$i++) {
                echo "<div class='bola_n bola$i' id=bola$i' onclick='add($i)' ></div>";
            }
        ?>&nbsp;</div>
        <div class=col-4>
            <button class="btn btn-primary">>></button>
            <button class='btn btn-secondary' onclick='clear();return false;'> X </button>
        </div>
    </div>
</form>

<script>
    function clear(){
        $('#jugada').empty();
        console.log($('#njugada'));
        $('.num').val('');
        pos=1;
    }
    function add(n){
        if(pos<=<?=$longitud?>) {
            $('#num'+pos).val(n);
            $('#njugada').append("<div class='bola bola"+n+"'></div>");
            pos++;
        }
    }
    clear();

</script>

