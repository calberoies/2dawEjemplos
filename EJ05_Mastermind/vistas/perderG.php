
<h1>¡¡Has Perdido!!</h1>
<p>El Número era el: <?php 
foreach(str_split($masterM->numGanador) as $c)
    echo "<div class='bola bola$c'></div>";
?>
<p>
<a href="index.php" class='btn btn-primary'>Juega de nuevo</a>
 