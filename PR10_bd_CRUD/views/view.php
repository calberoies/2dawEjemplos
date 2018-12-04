<?php
require 'header.php';
?>
<h2>Detalle de título</h2>
<fieldset>
<table border="0" cellspacing="3">
<tr><th>Título</th><td><?=$titulo['titulo']?></th></tr>
<tr><th>Autor</th><td><?=$titulo['autor']?></th></tr>
<tr><th>Género</th><td><?=$titulo['categoria']?></th></tr>
<tr><th>Año</th><td><?=$titulo['anyo']?></th></tr>
<tr><th>Formatos</th><td><?= implode(' ',$formatos); ?></th></tr>

</table><p>
	
	
<a class=button href='update.php?id=<?=$id?>'>Modificar</a>
<a class=button href='delete.php?id=<?=$id?>' onclick='return confirm("Confirma el borrado?");'>Borrar</a>
<a class=button href='index.php?id=<?=$id?>'>Volver</a>

<?php
require 'footer.php';
?>