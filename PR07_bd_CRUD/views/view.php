<?php
require 'header.php';
?>
<h2>Detalle de título</h2>
<fieldset>
<table class=table >
<tr><th>Título</th><td><?=$titulo['titulo']?></th></tr>
<tr><th>Autor</th><td><?=$titulo['autor']?></th></tr>
<tr><th>Género</th><td><?=$titulo['categoria']?></th></tr>
<tr><th>Año</th><td><?=$titulo['anyo']?></th></tr>
<tr><th>Descargas</th><td><?=$titulo['descargas']?></th></tr>


</table><p>
<br>
<h5>Formatos disponibles</h5>
<?php
foreach($formatos as $formato){
    echo "<li>".$formato['format'] ;
    echo " <a href='descarga.php?id=$formato[id]'>Descargar</a>";
}

?>
<p>	
<a class='btn btn-primary' href='update.php?id=<?=$id?>'>Modificar</a>
<a class='btn btn-danger' href='delete.php?id=<?=$id?>' onclick='return confirm("Confirma el borrado?");'>Borrar</a>
<a class='btn btn-secondary' href='index.php?id=<?=$id?>'>Volver</a>

<?php
require 'footer.php';
?>