<?php
// Total de aprobados y suspensos de cada asignatura. Utilizando 2 arrays
// para aprobados y suspensos
$f=fopen("notasalumnos.csv","r");

$aprobados=[];
$suspensos=[];

while($linea=fgets($f)) {
    list($alumno,$asig,$nota)=explode(",",trim($linea));
    if($nota>=5)
        if(isset($aprobados[$asig]))
            $aprobados[$asig]++;
        else
            $aprobados[$asig]=1;
    else    
        if(isset($suspensos[$asig]))
            $suspensos[$asig]++;
        else 
            $suspensos[$asig]=1;
}
?>
<table border=1><tr><th>Asignatura</th><th>Aprobados</th><th>Suspendidos</th></tr>
<?php
ksort($aprobados);

foreach($aprobados as $asig=>$cant) {
    echo "<tr><td>$asig</td><td align=right>$cant</td>";
    if(isset($suspensos[$asig]))
        echo "<td>".$suspensos[$asig].'</td>';
    else
        echo "<td>0</td>";
    echo "</tr>";
}
//Sacamos las asignaturas con suspensos sin ningún aprobado
foreach($suspensos as $asig=>$cant) {
    if(!isset($aprobados[$asig]))
        echo "<tr><td>$asig</td><td align=right>0</td><td>$cant</td></tr>";
}

?>
</table>
