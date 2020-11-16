<html>
<head>
	<style>
		body{font-family:Arial}
		.cabecera{font-size:2em;width:100%;background:#eed}
		input{font-size:1.5em}
		.bola{float:left;font-size:1.8em;text-align:center;margin:7px;padding:7px;border-radius:50%;
			width:30px;height:30px}
		.salida0{background-color:#ddd;}
		.salida1{font-weight:bold; background-color:yellow}
		.salida2{font-weight:bold; background-color:orange}	
		a:visited{text-decoration:none}
	</style>
</head>
<body>
	<div class=cabecera>
		Bolas Jugadas:  <b><?= $bingo->getnumbolas(); ?> </b> 
		Premio: <b><?= $bingo->premio; ?> €   </b>   
	</div>
<?php

//Pinta tablero
foreach($bingo->gettablero() as $bola=>$estado){
	echo "<a href='?bola=$bola'>";
	echo "<div class='bola salida$estado'>".$bola."</div>";
	if($bola%10==0){
		echo "<div style='clear:left'></div>";
	}
	echo "</a>";
}

//Pide bola

?>
<form method="post" action='juego.php'>
	<label>Bola</label>	:<input type="numeric" name="bola" size="2" >
	<input type="submit" name="acc" value="Marcar">
	<?php 
		if($bingo->getnumbolas()) 
			echo '<input type="submit" name="acc" value="Deshacer">'?>
	<a href=index.php> Empezar</a>
</form>

<form method="post">
	Línea Premiada: (separada por comas)
	<input type="text" name="linea" size="14" >
	<input type="submit" name="acc" value="Comprobar">
	<span style='color:red'><?=$mensaje ?></span>
</form>


