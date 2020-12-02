<?php
// Categorías y artículos


$categorias=array("M"=>"Música","P"=>"Películas","J"=>"Juegos");

$articulos=array(
	array('id'=>'M01','titulo'=>'Éxitos de U2','precio'=>20,'cat'=>'M'),
	array('id'=>'M02','titulo'=>'Coldplay in China','precio'=>22,'cat'=>'M'),
	array('id'=>'M03','titulo'=>'La copla','precio'=>10,'cat'=>'M'),
	array('id'=>'P01','titulo'=>'Harry potter 1','precio'=>20,'cat'=>'P'),
	array('id'=>'P02','titulo'=>'Casablanca','precio'=>12,'cat'=>'P'),
	array('id'=>'J01','titulo'=>'Sims','precio'=>20,'cat'=>'J'),
	array('id'=>'J02','titulo'=>'Angry birds','precio'=>22,'cat'=>'J'),
	array('id'=>'J03','titulo'=>'Assassins Creed','precio'=>21,'cat'=>'J')
);


require_once "funciones.inc.php";
session_start();


/**
* Busca un articulo por id y lo devuelve. Si no lo encuentra, devuelve false
*/
function buscaarticulo($id){
	global $articulos;
	foreach($articulos as $art){
		if($art['id']==$id)
			return $art;
	}
	return false;
}

/** Añade un artículo al carrito
 *
 * @param type $id
 * @param type $cantidad
 */
function anadircarrito($id,$cantidad=1){
	if(isset($_SESSION['carrito'][$id]))
		$_SESSION['carrito'][$id]+=$cantidad;
	else
		$_SESSION['carrito'][$id]=$cantidad;
}

/** Borra un artículo del carrito
 *
 * @param type $id
 * @param type $cantidad
 */
function borrarcarrito($id,$cantidad=1){
	if(isset($_SESSION['carrito'][$id]))
		unset($_SESSION['carrito'][$id]);
}


?>
