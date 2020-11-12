<?php
require_once("lib/helpers.inc.php");
?>

<form method=get>
Seleccione categoría
<?php
combo("idcat",$categorias,$idcat);
?>
 Buscar:<input type=text name=buscar value='<?php echo $filtro ?>' >
<input type=submit value=Seleccionar></form>

<div class=container>
	<div class='card-deck mb-12 text-center'>
<?php
if(count($articulos)) {
	foreach($articulos as $a){
		require 'vistas/articulo.php';
	}
}

?>
	</div>
</div>

