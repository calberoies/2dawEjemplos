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
	<form method=post>
			<input type=hidden name=probador value='<?=$probador?>'>
			<div class=probador>
					Probador <?= $probador ?>
					<div class=prendas> <?=$prendas ?> </div>
					<div><?=$datos['hora']?>&nbsp;</div><br>

					<button name=acc value='sumar' <?= $prendas==4 ? 'disabled' :'' ?> > 
							+ 
					</button>
					<button name=acc value='restar' <?= $prendas==0 ? 'disabled' :'' ?> > 
							- 
					</button>

					<?php if($prendas>0) { ?>
							<button name=acc value='vaciar' >
								Vaciar 
							</button> 
					<?php } ?>

			</div>
	</form>
<?php } ?>

			<div style='clear:left'></div>
			<hr>
			<form method=post>
				<button name=acc value='empezar' > 
						Vaciar todo 
				</button>
			</form>
	</body>
</body>
</html>