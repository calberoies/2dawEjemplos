<?php
	echo Mhtml::actionlink('categorias/create','Alta',[]);
?>
<table border="0" cellspacing="3">
	<tr><th>Categoría</th><th>Cat.Padre</th><th></th></tr>
<?php

foreach($categorias as $c){
	echo "<tr><td>$c->nombre</td><td>$c->catpadre</td><td>";
	echo Mhtml::actionlink('categorias/update','Modificar',['id'=>$c->id]);
	echo Mhtml::actionlink('categorias/delete','Borrar',['id'=>$c->id]);
	echo "</tr>";
}
echo "</table>";

