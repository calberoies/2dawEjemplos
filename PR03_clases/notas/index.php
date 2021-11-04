<?php 

spl_autoload_register(
    function ($class){ 
        require_once $class.'.php';
    });


$pnotas=new Procnotas();
$notas=[
    'MATE'=>1,
    'MATE'=>3,
    'MATE'=>8,
    'LENG'=>8,
    'MATE'=>8,
    'VALE'=>7,
    'LENG'=>2
    ];
foreach($notas as $asig=>$nota)
    $pnotas->addnota($asig,$nota);

foreach($pnotas->asigs  as $asig){    
    echo "<h2>".$asig.'</h2>';
    echo "<br>Aprobados: ".$asig->aprobados;
    echo "<br>Suspensos: ".$asig->suspensos;
    echo "<h4>NOTAS:</h4>";
    foreach($asig->notas as $nota=>$num)
        echo "<li>$nota: $num alumnos";
}


