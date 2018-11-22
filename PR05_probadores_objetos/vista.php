<html>
    <head>
        <style>
            body{font-face:Verdana}
            .probador {font-size:1.2em;padding:10px;margin:8px;background:#44f;float:left;width:160px;height:180px;color:white}
            .prendas {font-size:3em;padding:10px;}
            .boton{font-weight:bold; background-color:#bbb;border:1px solid;width:30px;height:30px;margin:4px;padding:6px;color:blue}
            .boton a{text-decoration:none !important}
        </style>
    </head>
    <body>
        <h2>PROBADORES</h2>

<?php 
foreach($ctl->probadores as $id=>$probador) {
?>
		<div class=probador>
            Probador <?= $id ?>
            <div class=prendas> <?=$probador->prendas ?> </div>
             <div><?=$probador->hora?></div>
            <br>
            <a href='?acc=sumar&id=<?=$id?>'><span class=boton> + </span></a>
            <?php if($probador->prendas>0) { ?>
                <a href='?acc=restar&id=<?=$id?>'><span class=boton> - </span></a>
                <a href='?acc=vaciar&id=<?=$id?>'><span class=boton> Vaciar </span></a>
            <?php } ?>

        </div>

<?php } ?>

        <div style='clear:left'></div>
        <hr>
        <a href='?acc=empezar'><span class=boton> Vaciar todo </span></a>
	</body>
</html>
