<?php
// Totales por cada nota de una asignatura
$f=fopen("notasalumnos.csv","r");

$asigbuscada=$_GET['asig'];

for($i=0;$i<=10;$i++)
    $notas[$i]=0;

while($linea=fgets($f)) {
    list($alumno,$asig,$nota)=explode(",",trim($linea));
    if($asig==$asigbuscada)
        $notas[$nota]++;
    
}
echo "<h3>Asignatura: ".$asigbuscada.'</h3>';
$total=array_sum($notas);
echo "<li> Total alumnos ".$total;
foreach($notas as $nota=>$cant)
    echo "<li>Nota: ".$nota."  Num alumnos: ".$cant;
