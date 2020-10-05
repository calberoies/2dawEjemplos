<?php

if(!isset($_GET['tabla']))
    die("Ejecución incorrecta. Falta la tabla");

// Otra forma: isset($_GET['tabla']) or die("Ejecución incorrecta. Falta la tabla");

$tabla=$_GET['tabla'];


if(isset($_GET['numero']) && isset($_GET['resultado'])){ //Venimos del formulario
    $numero=$_GET['numero'];
    $resultado=$_GET['resultado'];
    if($numero*$tabla==$resultado) {
        echo "<h3>MUY BIEN!!!";
        echo "<a href='?tabla=$tabla'> Probar otro número</a> ";    
        echo "<a href='index.php?tabla=$tabla'> Volver a ver la tabla</a> ";
        die;
    } else
        echo "<h3>Vaya...te has equivocado. Prueba otra vez..</h3>";

}
if(!isset($numero))    
    $numero=rand(1,10);
?>

<h3>Practicando la tabla del <?=$tabla?></h3>
<form >
 <?=$tabla?> x <?=$numero ?> = <input type=number name=resultado size=2>
 <input type=submit value=Comprueba>
 <input type=hidden name=numero value=<?=$numero?> >
 <input type=hidden name=tabla value=<?=$tabla?> >
</form>