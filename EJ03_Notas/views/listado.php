<?php
echo "_____________________________________________________________________________________________________________________________________________";
echo "<br>".$clase." tiene ".$aprov." aprobados de ".$total." un ".$aprTOT."%";
echo "<br>".$clase." tiene ".$suspe." suspendidos de ".$total." un ".$susTOT."%";
echo "<br>";
echo "<table>";
echo "<tr>";
for($i=0;$i<=10;$i++)
    echo "<th>Nota ".$i."****<br></th> ";
echo "</tr>";
echo "<tr>";
for($i=0;$i<=10;$i++)
    echo "<td>".${"n".$i}." alumnos </td>"; 
echo "</tr>";
echo "<tr>";
for($i=0;$i<=10;$i++)
    echo "<td>".number_format(((${"n".$i}/$total)*100),3)." % </td>";  
echo "</tr>";
echo "</table>";
