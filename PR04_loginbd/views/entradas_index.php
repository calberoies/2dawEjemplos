<body>
    <div class='container mt-5'>
        <a href=alta.php class='btn btn-primary'>Crear entrada</a>
        <?php
        foreach($entradas as $entrada){
        ?>
            <div class=titulo>
                <?=$entrada['fecha']?> - <?=$entrada['nombre_cat']?>
                <div class='pull-right'><a href="edit.php?id=<?=$entrada['id']?>">Editar</a></div>
            </div>
            <div class=texto>
                <?=$entrada['texto']?>
            </div>
        <?php } ?>
    </div>
</body>
</html>
