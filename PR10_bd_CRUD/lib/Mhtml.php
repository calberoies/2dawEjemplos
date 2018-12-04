<?php
// Funciones de ayuda en las vistas. Se cargan solamente cuando es necesario


/** Genera un desplegable (campo <select>)
 *
 * @param type $name
 * @param type $value
 * @param type $opciones Array de la forma valor=>etiqueta
 */
function desplegable($name,$value,$opciones){
	echo "<select name='$name'>";
	echo "<option value=''>Selecciona...</option>";
	foreach($opciones as $valor=>$texto){
		$selected=$valor==$value ? "selected" :"";
		echo "<option $selected value=$valor>$texto</option>";
	}
	echo '</select>';
}

//Podríamos añadir funciones para calendarios, autocomplete, grid, etc...

