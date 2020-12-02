<?php
require "config.inc.php";

if(!$enSesion) 
	renderError ("Acceso no permitido");

// Carga los articulos
require ("protegida/articulos.inc.php");

if(isset($_POST['id'])) { // Venimos del formulario de compra
	$id=$_POST['id'];
	$cantidad=$_POST['cantidad'];
	if($cantidad<10) {
		$_SESSION["carrito"][$id]=array("id"=>$id,"cantidad"=>$cantidad);
		render("texto",["contenido"=>"Artículo añadido a su carrito<p> <a href=index.php>Continuar comprando</a>"]);
		die;
	} else {
		$error="Cantidad excesiva";
		render ("carrito_form",array('id'=>$id,'articulo'=>$articulos[$id],'cantidad'=>$cantidad,'error'=>$error));
	}
	
} else {  // Mostramos el formulario de compra
	$id=getparam('id','',"Artículo no seleccionado");
		
	//comprobar que el articulo existe	
	if(!isset($articulos[$id]))
		renderError ("Artículo inexistente");

	// Muestra el formulario de compra
	render ("carrito_form",array('id'=>$id,'articulo'=>$articulos[$id],'cantidad'=>1,'error'=>''));
}
	

