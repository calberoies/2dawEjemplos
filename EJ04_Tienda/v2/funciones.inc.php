<?php

// Funciones generales. Utilizables en cualquier aplicación


/** Crea un desplegable
 *
 * @param type $lista Array de valor=>descri
 * @param type $valorselecc Valor seleccionado
 */
function desplegable($name,$lista,$valorselecc){
	echo "<select name='$name' class=form-control>";
	echo "<option value=''>Seleccione</option>";
	foreach($lista as $valor=>$descri){
		$selected=$valor==$valorselecc ? "selected" :"";
		echo "<option $selected value='$valor'>$descri</option>";
	}

	echo "</select>";

}

?>
