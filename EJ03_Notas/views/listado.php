<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
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

<h3>Resultados</h3>
<table class='table table-striped col-7' >
<tr>
<th>Asignatura</th>
<th>Aprobados</th>
<th>Suspensos</th>
<th>
    <?= implode('<th>',array_keys(array_fill(1,10,0))) ?>
</th>    
<th>Nota Media</th>
</tr>
<?php

foreach($notas as $asi=>$datos){
    printf("<tr><td><a href='detalle.php?id=$asi'>$asi</a></td>
      <td>$datos[aprobados]</td>
      <td>$datos[suspensos]</td>");
    $suma=0;
    $num=0;
    foreach($datos['distrib'] as $nota=>$n) {
        $suma+=$nota*$n;
        $num+=$n;
        echo "<td>".$n."</td>";
    }
    $media=number_format($suma/$num,1);
    
    echo "<td>$media</td></tr>";

}
?>
<table>
<a href=index.php>EMPEZAR DE NUEVO</a>
