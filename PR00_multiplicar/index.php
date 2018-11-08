<html>
<title>Tablas de multiplicar</title>
<style>
.numero {padding:10px;background:#ddd;margin:5px}
</style>
<body>
 <h1>Tablas de multiplicar </h1>
<?php
/*
Ejercicio de tablas
*/
$nombre='asdasdasd';
ob_implicit_flush();

for($i=1 ; $i<10; $i++) {
    echo "<a href='?tabla=$i'><span class=numero>$i</span></a>";
}

if(isset($_GET['tabla'])) {
    $tabla=$_GET['tabla'];
    ?>


    <h3>Tabla del <?= $tabla?></h3>

    <?php

    for($i=1 ; $i<=10; $i++){
        //echo "<br>".$tabla." x ".$i." = ".$tabla*$i;
        echo "<br>$tabla x $i = ".$tabla*$i;

        //printf("<br>%d x %d = %d", $tabla, $i, $tabla*$i);
    }

    echo "<a href='practicar.php?tabla=$tabla' class=numero>Practicar</a>";
} else
    echo "<h3>Pincha en la tabla que quieras visualizar</h3>";
?>

</body>
</html>
