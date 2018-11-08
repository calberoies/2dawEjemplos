<?php
// Total de aprobados y suspensos de cada asignatura. Utilizando 1 array
// asignatura=>[aprobados,suspensos]

$f=fopen("notasalumnos.csv","r");

//Cada elemento es de la forma asig=>[aprobados,suspensos];
$resultados=[];

while($linea=fgets($f)) {
    list($alumno,$asig,$nota)=explode(",",trim($linea));
    if(!isset($resultados[$asig]))
        $resultados[$asig]=[0,0];

    if($nota>=5)
        $resultados[$asig][0]++;
    else
        $resultados[$asig][1]++;

}
?>
<table border=1><tr><th>Asignatura</th><th>Aprobados</th><th>Suspendidos</th></tr>
<?php
ksort($resultados);

foreach($resultados as $asig=>$resultado) {
    echo "<tr><td>$asig</td>";
    echo "<td align=right>$resultado[0]</td>";
    echo "<td align=right>$resultado[1]</td>";
    echo "</tr>";
}

?>
</table>
