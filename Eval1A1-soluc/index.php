<?php
session_start();
$error='';
if(isset($_POST['enviar'])){
	$numprobadores=$_POST['numprobadores'];
	if($numprobadores>0){
		//Es correcto. Inicializamos probadores;
		for($i=1;$i<=$numprobadores;$i++)
			$_SESSION['probador'][$i]=['prendas'=>0,'hora'=>''];
		
		//$_SESSION['probador']=array_fill(1,$numprobadores,0);
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

	<input type=submit name=enviar value=Enviar>
</form>
</body>
</html>
