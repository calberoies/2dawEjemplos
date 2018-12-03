<html>
    <head>
        <link href='bootstrap/css/bootstrap.min.css' rel="stylesheet">
        <meta encoding='utf-8'>
    </head>
    <body>
        <div class='panel-body' style='width:900px;margin:auto;background:#dee'>
        <div class='col col-md-8'>
            <h3><a href=index.php>Mi Amazon</a></h3>
        </div>
        <div class='col col-md-3'>
            <?php
                if($this->usuario) { // Estamos logueados
                    echo "Usuario: <a href='perfil.php'>".$this->usuario->nombre."</a> ";
                    echo " <a href=logout.php class='btn btn-primary'>Salir</a>";
                } else
                    echo "<a href=login.php class='btn btn-primary'>Login</a>";
            ?>
        </div>
        </div>
        <div class='panel-body' style='width:900px;margin:auto'>
       <?= $content ?>
    </div>
</body>
</html>