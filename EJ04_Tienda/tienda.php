<?php
require "articulos.php";
session_start();

//Analizo param. de entrada
if(isset($_GET["cat"])) {
	$cat=$_GET["cat"];
	if(!isset($categorias[$cat])) die("CATEGORIA INEXISTENTE!!");
} else
	$cat="";

if(isset($_GET["filtro"])) {
	$filtro=$_GET["filtro"];
} else
	$filtro="";

?>

<form method=get >
Categoría: <select name=cat><option value=''>Selecciona categoría</option>
<?php
foreach($categorias as $id=>$descri)
	if($id==$cat)
		echo "<option selected value='$id'>$descri</option>";
	else
		echo "<option value='$id'>$descri</option>";

//	echo "<option ".($id==$cat?' selected ':'')." value=$id>$descri</option>";
// 	printf("<option %s value=%s>%s</option>",$id==$cat?'selected':'' , $id,$descri);

?>
</select>
Nombre:<input type="text" name="filtro" value="<?php echo $filtro; ?>">
<input type=submit value="Buscar">
</form>

<style>
.art{border:1px solid;float:left;padding:4px;margin:5px}
</style>
<?php
if($cat) {
	echo "<h3>Categoría: ".$categorias[$cat].'</h3>';
	foreach($articulos  as  $art){
		if(($art['cat']==$cat) && (!$filtro || strpos($art['titulo'],$filtro)!==false))
			printf('<div class="art"><b>%s</b><br>%d€<br>
			<a href="comprar.php?id=%s">Comprar</a></div>',
				$art['titulo'],$art['precio'],$art['id']);
	}
}
?>
