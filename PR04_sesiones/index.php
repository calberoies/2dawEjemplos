<?php
require "config.inc.php";

if(!$enSesion) {
	render ("texto",array("contenido"=>"Bienvenido a la tienda FORMASPORT. Identificate para acceder a los productos"));
} else {
	// Carga los articulos
	require ("protegida/articulos.inc.php");
	
	// Se ha pasado la categoría?
	$idcat=getparam('idcat','');
	if($idcat && (!isset($categorias[$idcat])))
		renderError("ERROR: Categoria inexistente");
		
	$filtro=getparam('buscar');
	
		
	// Selecciona articulos a listar.
	// Con una base de datos, cargaríamos los artículos que cumplen las condiciones (categoría, filtro de nombre, etc...)
	$artsel=array();
	 
	if($filtro || $idcat) 
		foreach($articulos as $a) {
			if($idcat && ($a['idcat']!=$idcat)) continue; // no es de la categoría
			if($filtro && (stripos($a['titulo'],$filtro)===false)) continue; //No coincide con el filtro
			$artsel[]=$a;
		}
	
	// Muestra los productos
	render ("articulos_ver",array('articulos'=>$artsel,'categorias'=>$categorias,'idcat'=>$idcat,'filtro'=>$filtro));
}

