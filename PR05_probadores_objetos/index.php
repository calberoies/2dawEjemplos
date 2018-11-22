<?php
require 'probadores.class.php';
session_start();

$error='';
if(isset($_POST['enviar'])){
	$numprobadores=$_POST['numprobadores'];
	$maxprendas=$_POST['numprobadores'] ?? 4;
	if($numprobadores>0){
		$_SESSION['ctl_probadores']=new ctl_probadores($numprobadores,$maxprendas);
		header('location:probador.php');
	} else
		$error='Num probadores incorrecto';
}

?>
<html>
<body>
<h2>Control de Probadores</h2>
<form method=post> 
	Número de probadores: 
	<input name=numprobadores size=2>
	<div style='color:red'><?=$error ?></div>
	Máximo prendas por probador: 
	<input name=maxprendas size=2>

	<input type=submit name=enviar value=Enviar>
</form>
</body>
</html>
