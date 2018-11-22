<html>
    <head>
        <style>
            body{font-face:Verdana}
            .probador {font-size:1.2em;padding:10px;margin:8px;background:#44f;float:left;width:120px;height:140px;color:white}
            .prendas {font-size:3em;padding:10px;}
            .boton{font-weight:bold; background-color:#bbb;border:1px solid;width:20px;height:20px;margin:4px;padding:3px;color:blue}
            .boton a{text-decoration:none}
        </style>
    </head>
    <body>
        <h2>PROBADORES</h2>

<?php 
foreach($_SESSION['probador'] as $probador=>$datos) {
    $prendas=$datos['prendas'];-+
?>
		<div class=probador>
            Probador <?= $probador ?>
            <div class=prendas> <?=$prendas ?> </div>
             <div><?=$datos['hora']?></div>

            <a href='?acc=sumar&id=<?=$probador?>'><span class=boton> + </span></a>
            <?php if($prendas>0) { ?>
                <a href='?acc=restar&id=<?=$probador?>'><span class=boton> - </span></a>
                <a href='?acc=vaciar&id=<?=$probador?>'><span class=boton> Vaciar </span></a>
            <?php } ?>

        </div>

<?php } ?>

        <div style='clear:left'></div>
        <hr>
        <a href='?acc=empezar'><span class=boton> Vaciar todo </span></a>
	</body>
</html>
