<?php
//$ganadora=['2','4','6','23','40','32'];
if(!isset($_POST['ganadora']))
    die("Ejecución incorrecta");
$ganadora=$_POST['ganadora'];

$boletos=file('boletos.txt');


// $aciertos almacena la lista de los boletos premiados de  5 y 6.
// La inicializamos a arrays vacíos 
$aciertos=[5=>[], 6=>[] ];

foreach ($boletos as $boleto){

    //Separamos el número de serie de los números
    list($codigo,$strnumeros)=explode('=', trim ($boleto));
    //Convertimos el string de números a un array;
    $numeros=explode(',',$strnumeros);

    //Calculamos aciertos
    $numaciertos=count(array_intersect($numeros,$ganadora));
    if($numaciertos>=5) 
        $aciertos[$numaciertos][]=$codigo;
}
?>

<html><body>
<h2>Comprobación de Lotería primitiva</h2>

<?php
//Mostramos resultados
echo "<br>Total boletos: ".count($boletos);
echo "<br>Combinación ganadora: ".implode(',',$ganadora).'<br>';

echo "<h3>Boletos premiados</h3>";
foreach($aciertos as $numaciertos=>$codigos) {
    echo "<h4>Total acertados de $numaciertos: ".count($codigos)."</h4>";
    echo "<li>".implode(', ',$codigos);
}
?>
<hr>
</body>
</html>