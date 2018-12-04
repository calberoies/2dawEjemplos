<?php
// Configuración de la aplicación. Se accede con app::instance()->xxx
$config=array(
	'name'=>'Mis Libros',
	'defaultcontroller'=>'titulos',
	'dbparams'=>array(
			'connection'=>'mysql:host=localhost;dbname=test_libros',
			'username'=>'root',
			'password'=>'root')
	);

?>
