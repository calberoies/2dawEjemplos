<?php

/** Micro framework PHP
 * @author Cecilio Albero
 * Versión 0.1
 */

/** Autocarga de clases .
 *
 * @param type $class
 * @return type
 */
function __autoload ($class){
	$rutas=array('mfp/classes','mfp/helpers','controllers','models');

	foreach($rutas as $ruta){
		$file=$ruta.'/'.$class.'.php';

		if(file_exists($file)){
			require $file;
			return;
		}
	}
	die ("Error al cargar la clase $class");
}


