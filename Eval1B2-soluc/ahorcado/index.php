<?php 
require 'ahorcado.php';
session_start();

if(!isset($_SESSION['peli'])) {
	$_SESSION['juego']=new ahorcado();
} 
$juego=$_SESSION['juego'];

if (isset($_POST['letra'])){
	$err=$juego->juegaletra($_POST['letra']);
	//Añade lo que creas conveniente... 

}


?>
<html>
<body style='font-size:3em'>
<h3>Ahorcado</h3>

<?php 
//Ayuda durante el desarrollo. (Eliminar cuando se termine el programa) 
 echo "La peli es ".$juego->getpeli() ;
?> 

<hr>
<?= implode(' &nbsp',$juego->getletras()); ?>
<hr>
<form method=post>
	<input name=letra size=1> 
	<input type=submit value=JUgar>
</form>
</body>
</html>
