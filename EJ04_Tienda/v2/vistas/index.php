<?php
//Vista de artículos
require_once "funciones.inc.php";
require ("cabecera.php");
?>

<form method=get >
<div class='form'>
<div class=row>
    <div class=col-3>
        Categoría:
        <?php desplegable('cat',$categorias,$catid); ?>
    </div>
    <div class=col-2>
    Nombre:<input type="text" class=form-control name="filtro" value="<?php echo $filtro; ?>">
    </div>  
    <div class=col-2>
    Precio menor que:<input type="text" class=form-control size="4" name="precio" value="<?php echo $precio; ?>">
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
    echo "<h3>Categoría: ".$categoria.'</h3>';
foreach($lisarticulos  as  $id=>$art){
?>
    <div class="card" style="width: 12rem;float:left;margin:5px">
    <img src="<?= getimg($id)?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?=$art['titulo']?></h5>
        <p class="card-text">
            <a href='index.php?cat=<?=$art['cat']?>'> 
            <?=getcategoria($art['cat'])?>
            </a></p>
        
        <?=$art['precio']?> €
        <a href="comprar.php?id=<?=$id?>" class=card-link>Comprar</a>
    </div>
  </div>
<?php
}
?>
