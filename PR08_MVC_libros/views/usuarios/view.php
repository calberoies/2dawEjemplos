<?php

echo '<h3>'.$usuario->nombre.'</h3>';

echo "<br>email: ".$usuario->email;

echo "<br>Lector: ".$usuario->reader->descri;


//var_dump($titulos);
foreach($usuario->titulos as $titulo){
	echo "<li>".$titulo->titulo.' - '.$titulo->categoria;
}