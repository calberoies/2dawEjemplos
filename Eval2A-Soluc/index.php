<?php
require 'init.php';

if(isset($_GET['mes']))
	$mes=$_GET['mes'];
else
	$mes=date('m'); // El actual

?>
<html>
<head>
<title>Agenda</title>
<link rel="stylesheet" type="text/css" href="calendario.css" />
</head>
<body>
<h2>Agenda</h2>

<?php
// Muestra botones atrás-adelante
function navegador($anyo,$mes){
	$anyoant=$mes==1 ? $anyo-1 : $anyo;
	$anyosig=$mes==12 ? $anyo+1 : $anyo;
	$mesant=$mes==1 ? 12 : $mes-1;
	$messig=$mes==12 ? 1 : $mes+1;

	echo "<a href=?anyo=$anyoant&mes=$mesant>&lt;Anterior</a> ";
	echo "<a href=?anyo=".date('Y')."&mes=".date('m').">Actual</a> ";
	echo "<a href=?anyo=$anyosig&mes=$messig>Siguiente&gt;</a> ";
}
echo "<a href=veranyo.php>Ver Año completo</a> ";

navegador($anyo,$mes);

$v=new viscalendario($calendario);
echo '<div class=mesgrande>';
$v->displaymes($mes);
echo '</div>';

?>
</body>
</html>

