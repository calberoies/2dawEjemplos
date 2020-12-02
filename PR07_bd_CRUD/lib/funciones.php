<?php
//Funciones genéricas. Se cargan siempre

/** Devuelve un parámetro de $_GET
 *
 * @param type $param
 * @param type $default Valor por defecto si no existe en $_GET. Si no se pasa, genera un error (es obligatorio para poder ejecutar)
 * @return type
 */
function getparam($param,$default=null){
	if(isset($_GET[$param]))
		return htmlspecialchars(trim(strip_tags($_GET[$param]))); //Evitamos inyección y caracteres especiales
	elseif($default!==null)
		return $default;
	else
		termina('Ejecución incorrecta');
}

/** Devuelve un parámetro de $_POST
 *
 * @param type $param
 * @param type $default Valor por defecto si no existe en $_POST. Si no se pasa, genera un error (es obligatorio para poder ejecutar)
 * @return type
 */
function postparam($param,$default=null){
	if(isset($_POST[$param]))
		return htmlspecialchars(trim(strip_tags($_POST[$param])));//Evitamos inyección y caracteres especiales
	elseif($default!==null)
		return $default;
	else
		termina('Ejecución incorrecta');
}

/** Devuelve true si hay usuario logueado
 *
 * @return type
 */
function ensesion(){
    return isset($_SESSION['usuario']);
}

/** Termina la ejecución, mostrando un mensaje de error
 *
 * @param type $mensaje
 */
function termina($mensaje){
    require 'views/error.php';
    die();
}
/** Termina la ejecución, guarda el mensaje de error en sesión y redirige a una URL
 * donde se puede mostrar el mensaje almacenado llamando a getflash()
 *
 * @param type $mensaje
 */
function setflash($mensaje,$url,$class="error"){
    $_SESSION['flash']=array('class'=>$class,'mensaje'=>$mensaje);
    header('Location:'.$url);
}
/** Devuelve el mensaje guardado en sesión y lo borra para que no vuelva a aparecer
 * 
 * @return string
 */
function getflash(){
    if(!isset($_SESSION['flash'])) return '';
    $flash=$_SESSION['flash'];
    unset($_SESSION['flash']);
    return '<div class='.$flash['class'].'>'.$flash['mensaje'].'</div>';
}


/** Termina la ejecución por un error de BD
 *
 * @param type $query
 */
function dbdie($query){
	$error=$query->errorInfo();
	termina('Error en acceso a Datos: '.$error[2]);
}



/** devuelve un mensaje de error formateado de un dato de un formulario
 *
 * @param type $errores
 * @param type $dato
 * @return string
 */
function geterror($errores,$dato){
	if(!isset($errores[$dato])) return '';
	return "<span class=fielderror>".$errores[$dato]."</span>";
}

/** Devuelve un array de la forma colvalue=>coltext a partir de dos columnas de una tabla
 *
 * @global type $db
 * @param type $tabla
 * @param type $colvalue columna clave
 * @param type $coltext columna texto
 */
function listData($tabla,$colvalue,$coltext){
	global $db;
	return $db->query("select $colvalue,$coltext from $tabla order by $coltext")->fetchAll(PDO::FETCH_KEY_PAIR);
}
