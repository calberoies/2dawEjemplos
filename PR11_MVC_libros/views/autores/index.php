<table><tr><th>Autor</th><th>Títulos</th></tr>
<?php
Mhtml::navegador($limit,count($autores));
foreach($autores as $t){
    echo "<tr><td><a href='?r=autores/view&id={$t->id}'>{$t->nombre}</a></td><td>{$t->numtitulos}</td></tr>";
}
?>
</table>

