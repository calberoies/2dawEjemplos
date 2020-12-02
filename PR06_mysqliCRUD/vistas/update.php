<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h3>Modificación de producto</h3>
<?= $error ?>

<form method=post>
    <div class=col-md-4>
    Descripción <input type=text class=form-control name='prod[descripcion]' value='<?=$prod['descripcion']?>'><br>
    </div>
    <div class=col-md-2>
    Precio: <input type=number class=form-control name='prod[precio]' value='<?=$prod['precio']?>'><br>
    </div>
    <div class=col-md-2>
    Estado: 
    <?= desplegable('prod[estado]',$prod['estado'],PRODESTADOS); ?>
    </div>
    <div class=col-md-4>

    <input type=submit class='btn btn-primary' name=actualizar value=Actualizar>
    </div>
</form>
<div class=col-md-4>

<form method=post action=delete.php>
    <input type=hidden name=id value=<?=$id?>>
    <input type=submit value=Eliminar class='btn btn-danger'>
    <a href=index.php class='btn btn-secondary'>Volver</a>
</form>
</div>
<hr>
