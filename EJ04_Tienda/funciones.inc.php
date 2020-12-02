<?php

// Funciones generales. Utilizables en cualquier aplicación

/**
* Devuelve un parámetro de entrada por GET o POST
*/
function param($p,$valdefecto=""){
	if(isset($_REQUEST[$p]))   // $_REQUEST[$p] ?? $valdefecto
		return $_REQUEST[$p];
	else
		return $valdefecto;
}

/** Crea un desplegable
 *
 * @param type $lista Array de valor=>descri
 * @param type $valorselecc Valor seleccionado
 */
function desplegable($name,$lista,$valorselecc){
	echo "<select name='$name'>";
	echo "<option value=''>Seleccione</option>";
	foreach($lista as $valor=>$descri){
		$selected=$valor==$valorselecc ? "selected" :"";
		echo "<option $selected value='$valor'>$descri</option>";
	}

	echo "</select>";

}

?>
