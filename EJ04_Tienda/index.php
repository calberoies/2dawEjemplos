<?php
/** Muestra los artículos de la tienda
 * Enlaza con comprar.php para un artículo seleccionado
 */

require "articulos.php";


//Analizo param. de entrada
$cat=param("cat");
if($cat && !isset($categorias[$cat])) die("CATEGORIA INEXISTENTE!!");

$filtro=param("filtro");
$precio=param("precio");

require ("cabecera.php");
?>

<fieldset>
<form method=get >
Categoría:
<?php
desplegable('cat',$categorias,$cat);
?>

Nombre:<input type="text" name="filtro" value="<?php echo $filtro; ?>">
Precio menor que:<input type="text" size="4" name="precio" value="<?php echo $precio; ?>">
<input type="submit" value="Buscar">
</form>
</fieldset>

<?php
if($cat || $filtro || $precio) {
	if($cat)
		echo "<h3>Categoría: ".$categorias[$cat].'</h3>';
	foreach($articulos  as  $art){

		if($cat && ($art['cat']!=$cat)) continue; // nos lo saltamos porque no es de la categoria

		if(($filtro && stripos($art['titulo'],$filtro)===false)) continue; //no coincide el titulo
		if($precio && ($art['precio']>$precio)) continue; //es más caro

		printf('<div class="art"><b>%s</b><br>%d €<br>
			<a href="comprar.php?id=%s">Comprar</a></div>',
				$art['titulo'],$art['precio'],$art['id']);
	}
}
?>
