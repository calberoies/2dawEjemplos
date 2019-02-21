<html> 
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<h2>Autobuses ALSA</h2>
<a class='btn btn-primary' href="alta.php">Alta de viaje</a>

<h3>Viajes Planificados</h3>

<table class=table><tr><th>Destino</th><th>Fecha</th><th>Plazas</th><th>Libres</th><th></tr>
<?php 

foreach($viajes as $v){
    if(!$v['libres'])
        $link='COMPLETO';
    else 
        $link="<a href='venta.php?id=$v[id]'>VENTA</a>";
    printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>%d</td><td>%s</td></tr>",
        $v['destino'],$v['fecha'],$v['plazas'],$v['libres'],$link);

}
