<?php/** Muestra un desplegable**/function combo($name,$data,$selected=""){	echo "<select name=$name>\n		<option value=''>Seleccione...</option>";	foreach($data as $value=>$label)		if($value==$selected)			echo "<option selected value=$value>$label</option>";		else			echo "<option value=$value>$label</option>";	echo "</select>";}