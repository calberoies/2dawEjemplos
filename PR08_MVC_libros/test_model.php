<h2>Pruebas con modelos</h2>

<?php
require "mfp/mfp.php";

$a=new autores;
$a->nombre="PRUEBA";
if(!$a->save()){
    var_dump($a->errors);
} else {
	echo '<li>Creado PRUEBA con id '.$a->id;
}
$id=$a->id;

$a2=autores::find('id='.$id);
if(!$a2)
	die("no encuento el autor PRUEBA");

echo "<li>Encontrado: ".$a2->nombre;
$a2->nombre="XXXX1";
if($a2->save())
	echo "<li>Cambiado a XXXX1";

$a2=autores::find('id='.$id);
if($a2) {
    $a2->delete();
}

$a2=autores::find('nombre="XXXX1"');
if(!$a2)
    echo "<li>BORRADO";


$a3=autores::find('nombre="Federico García Lorca"');
echo '<h3>Titulo de García Lorca</h3>';
foreach($a3->titulos as $t){
	echo '<li>'.$t->titulo. ' - Categoría '.$t->categoria->nombre;
	
}

