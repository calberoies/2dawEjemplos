<?php 
require 'cabecera.php';
?>
<h3>Comprar artículo</h3>
<div class="card" style="width: 12rem;float:left;margin:5px">
    <img src="<?= getimg($id)?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?=$art['titulo']?></h5>
        <p class="card-text">
            <a href='index.php?cat=<?=$art['cat']?>'> 
            <?=getcategoria($art['cat'])?>
            </a></p>
    </div>
</div>
<form method=post>
    <div class=row>
    <div class=col-2>
    <br>Precio: <b><?=$art['precio']?> €</b><br><p>
    Cantidad: <input name="cantidad" size="2" value="1" class=form-control>
    <br><input type=submit class="btn btn-primary" name=comprar value=Comprar>
    </div>
</form>
</body>
</html>
