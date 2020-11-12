<html>
    <head>
        <style>
            body{font-family:Arial}
            .probador {font-size:1.2em;padding:10px;margin:8px;background:#66f;float:left;width:120px;height:180px;color:white}
            .prendas {font-size:3em;padding:10px;}
            .boton{font-weight:bold; font-size:1.3em;
                background-color:#bbb;border:1px solid black;float:left;
                text-align:center;
                width:22px;height:22px;margin:4px;padding:3px;color:blue}
            .boton a{text-decoration:none}
        </style>
    </head>
    <body>
        <h2>PROBADORES</h2>

<?php 
foreach($_SESSION['probador'] as $probador=>$datos) {
    $prendas=$datos['prendas'];
?>

    <div class=probador>
        Probador <?= $probador ?>
        <div class=prendas> <?=$prendas ?> </div>
            <div><?=$datos['hora']?>&nbsp;</div><br>

        <div class=boton><a href='?acc=sumar&id=<?=$probador?>' > + </a></div>
        
        <a href='?acc=restar&id=<?=$probador?>' disabled><span class=boton> - </span></a>

        <?php if($prendas>0) { ?>
            <a href='?acc=vaciar&id=<?=$probador?>'><span class=boton> X </span></a>
        <?php } ?>

    </div>


<?php } ?>

        <div style='clear:left'></div>
        <hr>
        <a href='?acc=empezar'><span class=boton> Vaciar todo </span></a>
	</body>
</html>
