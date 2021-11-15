<?php
/** Muestra los artículos de la tienda
 * Enlaza con comprar.php para un artículo seleccionado
 */

session_start();
require_once '_articulos.php';

//Analizo param. de entrada
$catid=$_GET['cat']??null;
require ("cabecera.php");

?>
<form method=get >
<div class='form'>
<div class=row>
    <div class=col-3>
        Categoría:
        <?php 
		echo "<select name='cat' class=form-control>";
		echo "<option value=''>Seleccione</option>";
		foreach($categorias as $valor=>$descri){
			$selected=$valor==$catid ? "selected" :"";
			echo "<option $selected value='$valor'>$descri</option>";
		}
	
		echo "</select>";
		?>
    </div>
    <div class=col-1><br>
        <input type="submit" value="Buscar" class='btn btn-primary'>
    </div>
</div>
</div>
</form>
</fieldset>

<?php
if($catid)
    echo "<h3>Categoría: ".$categorias[$catid].'</h3>';
foreach($articulos  as  $id=>$art){
	if($catid && $art['cat']!=$catid) continue;
?>
    <div class="card" style="width: 12rem;float:left;margin:5px">
    <div class="card-body">
        <h5 class="card-title"><?=$art['titulo']?></h5>
        <p class="card-text">
       
        <?=$art['precio']?> €
        <a href="comprar.php?id=<?=$id?>" class=card-link>Comprar</a>
    </div>
  </div>
<?php
}
?>
