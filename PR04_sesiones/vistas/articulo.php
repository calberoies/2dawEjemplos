<div class='card mb-3 box-shadow' >
    <div class='card-header' ><?=$a['titulo']?> </div>
    <div class='card-body' >
        <small>Código</small> <?=$a['codigo']?><br>
        <small>Categoría</small> <?=$categorias[$a['idcat']]?><br>
        <small>Precio</small> <?=$a['precio']?> €<br>
        <a href='carrito_comprar.php?id=<?=$a['codigo']?>' class="btn btn-primary">Añadir al carrito</a>
    </div>
</div>
