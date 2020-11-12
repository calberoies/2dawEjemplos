<?php

/**
* Valida un usuario y devuelve sus datos si es correcto, o false si no lo es
*/
function validausuario($usuario,$password) {
	foreach(file("protegida/usuarios.txt") as $linea ) {
		if($linea[0]!="#") {  // comentario
			list($xusuario,$xnombre,$xpass)=explode("|",trim($linea));
			if(($usuario==$xusuario) && ($xpass==$password))
				return array("usuario"=>$usuario,"nombre"=>$xnombre);
		}
	}
	return false;
}


/** Muestra una vista
*
*/
function render($vista,$vars=array()){
	global $usuario,$enSesion; //Variables de sesión
	extract($vars); // asigna las variables de $vars que podrá utilizar la vista
	require "vistas/layout.php";
}

/** Muestra un mensaje de error y termina
*/
function renderError($mensaje) {
	render("texto",array("contenido"=>"<div class=error>$mensaje</div>"));
	die;
}

/** Devuelve un parámetro de $_GET, o un valor por defecto si no está definido
* Si se pasa $die, termina la ejecución si no se ha definido
*/
function getparam($param,$default="",$die=""){
	if(!isset($_GET[$param]))
		if($die) 
			renderError($die);
		else
			return $default;
	else
		return $_GET[$param];
}