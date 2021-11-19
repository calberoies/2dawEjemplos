<html>
<head>
	<style>
		body{font-family:Arial}
		.cabecera{font-size:2em;width:100%;background:#eed}
		input{font-size:1.5em}
		.bola{float:left;font-size:1.8em;text-align:center;margin:7px;padding:7px;border-radius:50%;
			background-color:#ddd;width:30px;height:30px}
		.salida{font-weight:bold; background-color:yellow}

	</style>
</head>
<body>
	<div class=cabecera>
		Bolas Jugadas:  <b><?= count($_SESSION['bolas']); ?> </b> 
		Premio: <b><?= $_SESSION['premio'] ?> €   </b>   
	</div>
<?php

//Pinta tablero
for($i=1;$i<=90;$i++){
	
	$class= in_array($i,$_SESSION['bolas']) ? 'salida' :'';
	echo "<div class='bola $class'>".$i."</div>";

	/*if(in_array($i,$_SESSION['bolas']) )
		echo "<div class='bola salida'>".$i."</div>";
	else
		echo "<div class='bola'>".$i."</div>";*/
	

	if($i%10==0){
		echo "<div style='clear:left'></div>";
	}
}

//Pide bola

?>
<form method="post">
	<label>Bola</label>	:<input type="numeric" name="bola" size="2" >
	<input type="submit" name="acc" value="Marcar">
	<?php 
		if(count($_SESSION['bolas'])) 
			echo '<input type="submit" name="acc" value="Deshacer">'?>
	<a href=index.php> Empezar</a>
</form>

<form method="post">
	Línea Premiada: (separada por comas)
	<input type="text" name="linea" size="14" >
	<input type="submit" name="acc" value="Comprobar">
	<span style='color:red'><?=$mensaje ?></span>
</form>


