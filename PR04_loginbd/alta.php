<?php 
require 'db.php';

if(!sesion()) //No estamos en sesión 
    header('Location:login.php');

//POST
if(isset($_POST['enviar'])){


}

require 'header.php';
?>
<body>
    
    <div class="container " >
        <h4>Crear entrada</h4>
        <form method="POST">
            <div class="row">
    
                <div class="col col-md-12 col-xs-12">
                    <label>Categoría:</label>
                    <input name=categorias_id>
               </div>
            </div>

            <div class="row">
                <div class="col col-md-12 col-xs-12">
                    <label for="nombre">Texto </label>
                    <textarea name=texto>
                    
                    </textarea>
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
</html>  
