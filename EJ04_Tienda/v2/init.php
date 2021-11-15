<?php
session_start();
require_once '_articulos.php';


/**
 * Devuelve una categoría
 */
function getcategoria($catid) {
	global $categorias;
	return $categorias[$catid]??null;
}

/**
* Devuelve un artículo. Si no existe, devuelve null
*/
function getarticulo($id){
	global $articulos;
	return $articulos[$id]??null;
}
/**
 * Devuelve una lista de artículo, pudiendo filtrar por categoría, título y/o precio
 */
function getarticulos($catid=null,$tit='',$precio=null){
	global $articulos;
	$listart=[];
	foreach($articulos  as  $id=>$art){
		if($catid && ($art['cat']!=$catid)) continue; // nos lo saltamos porque no es de la categoria
		if(($tit && stripos($art['titulo'],$tit)===false)) continue; //no coincide el titulo
		if($precio && ($art['precio']>$precio)) continue; //es más caro
		$listart[$id]=$art;
		
	}
	return $listart;
}
/**
 * Devuelve ruta de la imagen de un artículo
 */
function getimg($id){
	global $articulos;
	$cat=$articulos[$id]['cat']??null;
	return 'images/cat_'.$cat.'.png';
}

/** Añade un artículo al carrito
 * Se comprueba que no supere el máximo permitido
 * @param type $id
 * @param type $cantidad
 */
function anadircarrito($id,$cantidad=1){
	global $articulos;
	if(!$art=$articulos[$id]) return false;
	$max=$art['max']??null;
	
	if($max && $cantidad>$max)
		return false;
	if(isset($_SESSION['carrito'][$id]))
		$_SESSION['carrito'][$id]+=$cantidad;
	else
		$_SESSION['carrito'][$id]=$cantidad;
	return true;
}

function getcarrito(){
	return $_SESSION['carrito']??[];
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
