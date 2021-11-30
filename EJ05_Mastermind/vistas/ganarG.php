<h1>¡¡Has Ganado!!</h1>

<p>Has empleado <?=count($masterM->rondas) ?> rondas</p>
<p><?php 
foreach(str_split($masterM->numGanador) as $c)
    echo "<div class='bola bola$c'></div>";
?>
<a href="index.php?volver" class='btn btn-primary'>Juega de nuevo</a>
