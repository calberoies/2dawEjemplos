<?php 
require 'util.php';
?>
<body>
    
    <div class="container " >
        <form method="POST">
            <div class="row">
    
                <div class="col col-md-2 col-xs-12">
                    <label>Categoría:</label>
                    <?= desplegable('categorias_id','',
                        listdata(getcategorias(),'id','nombre'));?>
               </div>
            </div>

            <div class="row">
                <div class="col col-md-12 col-xs-12">
                    <label for="nombre">Texto </label>
                    <textarea class=form-control name=texto></textarea>
                </div>
            </div>
            <div class=error><div class=col-12>
                <?=$error ??''?>
            </div></div>
            <div class="row">
                <div class="col col-md-2">
                    <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
                </div>
            </div>
        </form>
    </div>

</body>