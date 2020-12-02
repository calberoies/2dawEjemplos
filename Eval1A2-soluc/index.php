<?php
session_start();
$error='';
if(isset($_POST['enviar'])){
	$numcartones=$_POST['numcartones'];
	if($numcartones>0){
		//Es correcto. Inicializamos probadores;
		$_SESSION['numcartones']=$numcartones;
		$_SESSION['premio']=$numcartones*2*60/100;
		
		$_SESSION['bolas']=[]; //Bolas jugadas
		header('location:juego.php');

	} else
		$error='Num cartones incorrecto';
}

?>
<h2>BINGO</h2>
<form  method=post>
	<label>Num. Cartones: </label>
	<input type="number" name="numcartones" min="1" size="3"></label>
	<div style='color:red'><?=$error ?></div>
  <p><input type="submit" name="enviar" value="Enviar"></p>
</form>