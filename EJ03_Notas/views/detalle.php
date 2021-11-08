<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<h2>NOTAS DE <?=$id?></h2>
<table class='table table-striped col-7' >
<tr>
<th>Aprobados</th>
<th>Suspensos</th>
<th>
    <?= implode('<th>',array_keys(array_fill(1,10,0))) ?>
</th>    
<th>Nota Media</th>
</tr>
<?php
printf("<tr><td>$datos[aprobados]<td>$datos[suspensos]");
$suma=0;
$num=0;
foreach($datos['distrib'] as $nota=>$n) {
    $suma+=$nota*$n;
    $num+=$n;
    echo "<td>".$n."</td>";
}
$media=number_format($suma/$num,1);

echo "<td>$media</td></tr>";

$serie=[['Nota','Num Alumnos']];
foreach($datos['distrib'] as $nota=>$num)
    $serie[]=["$nota",$num];
$serie=json_encode($serie);

?>
<table>
<a href=index.php>VOLVER</a>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart(){
      var data = google.visualization.arrayToDataTable(<?=$serie?>);
      var options = {
        title: 'Notas'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
    </script>

    <div id="piechart" style="width: 900px; height: 500px;"></div>
</script>