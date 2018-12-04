<?php
	echo Mhtml::actionlink('categorias/create','Alta',[],'button');
?>
<table border="0" cellspacing="3">
	<tr><th>Categoría</th><th>Cat.Padre</th><th></th></tr>
<?php

foreach($categorias as $c){
	echo "<tr><td>$c->nombre</td><td>$c->catpadre</td><td>";
	echo Mhtml::actionlink('categorias/update','Modificar',array('id'=>$c->id),'button');
	echo Mhtml::actionlink('categorias/delete','Borrar',array('id'=>$c->id),'button');
	echo "</tr>";
}
echo "</table>";

