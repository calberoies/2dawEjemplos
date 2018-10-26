<?php
// Total de aprobados y suspensos, sin tener en cuenta asignatura

$f=fopen("notasalumnos.csv","r");

$aprobados=0;
$suspensos=0;
if(!isset($_GET['asig']))
    die("Pasa la asignatura como parámetro asig. Por ejemplo: <a href='?asig=VL2'>index1.php?asig=VL2</a>");
$asigbuscada=$_GET['asig'];

while($linea=fgets($f)) {
    list($alumno,$asig,$nota)=explode(",",trim($linea));
    if($asig==$asigbuscada)
        if($nota>=5) 
            $aprobados++;
        else
            $suspensos++;
    
}
$total=$aprobados+$suspensos;
echo "<h3>Asignatura: ".$asigbuscada.'</h3>';
echo "<li>Total aprobados ".$aprobados. "  ".round($aprobados/$total*100).' %';
echo "<li>Total suspensos ".$suspensos. " ". round($suspensos/$total*100).' %';
//printf ("<li>Total suspensos %d %d %% ",$suspensos,round($suspensos/$total*100));