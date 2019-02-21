<html> 
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<h2>Autobuses ALSA</h2>
<a class='btn btn-primary' href="index.php">Volver</a>

<h3>Ventas del viaje <?=$viaje['destino'] ?> - <?=$viaje['fecha'] ?> </h3>

<?php 
    if($mensaje) echo "<div class='alert alert-info'>$mensaje</div>";
?>

<form method=post>
<div class=row>
<div class='col col-md-2'>
    Nombre del pasajero <input class=form-control name=pasajero>
</div>
<div class='col col-md-1'><br>
    <input class='btn btn-primary' type=submit name=bventa value=Vender>
    
</div>
</div>
<div class=row>
<div class='col col-md-4'>
<table class=table><tr><th>Asiento</th><th>Seleccionar</th></tr>
<?php 

foreach($asientos as $a){
    
    echo "<tr><td>$a[asiento]</td><td>";
    if($a['ocupado']){
        echo $a['pasajero'];
        echo " <a href='liberar.php?id=$a[id]'> (X) </a>";
    } else 
        echo "<input type=checkbox name='asientos[]' value='$a[id]'>";


}

?>
</div></div>
</form>

