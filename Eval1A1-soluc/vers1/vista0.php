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
        <h2>PROBADORES- Acciones con GET</h2>

<?php 
foreach($_SESSION['probador'] as $probador=>$prendas) {
?>

    <div class=probador>
        Probador <?= $probador ?>
        <div class=prendas> <?=$prendas ?> </div>

        <div class=boton>
					<?php if($prendas<4)
						echo "<a href='?acc=sumar&probador=$probador'  > + </a>";
					else 
						echo " + ";
					?>
				</div>
				<div class=boton>
					<?php if($prendas>0)
        		echo "<a href='?acc=restar&probador=$probador'  > - </a>";
					else 
						echo " - ";
					?>
				</div>
				<?php if($prendas>0) { ?>
						<div class=boton>
						<a href='?acc=vaciar&probador=<?=$probador?>'> X </a>
						</div>
        <?php } ?>

    </div>


<?php } ?>

        <div style='clear:left'></div>
        <hr>
        <a href='?acc=empezar'><div class=boton style='width:160px'> Vaciar todo </div></a>
	</body>
</html>
