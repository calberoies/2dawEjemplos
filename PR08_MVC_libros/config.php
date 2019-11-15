<?php
// Configuración de la aplicación. Se accede con app::instance()->xxx
$config=[
	'name'=>'Mis Libros',
	'defaultcontroller'=>'titulos',
	'dbparams'=>[
			'connection'=>'mysql:host=www.iesfsl.org;dbname=test_libros',
			'username'=>'2daw',
			'password'=>'iesfsl']
	];

?>
