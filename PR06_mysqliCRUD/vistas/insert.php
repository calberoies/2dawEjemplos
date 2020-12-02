<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h3>Alta de producto</h3>
<?= $error ?>

<form method=post>
    <div class=col-md-4>
    Descripción <input type=text class=form-control name='prod[descripcion]' value='<?=$prod['descripcion']?>'><br>
    </div>
    <div class=col-md-2>
    Precio: <input type=number class=form-control name='prod[precio]' value='<?=$prod['precio']?>'><br>
    </div>

    <input type=submit name=actualizar value=Actualizar>
</form>
<hr>
<a href=index.php>Cancelar</a>
</body>
</html>

    