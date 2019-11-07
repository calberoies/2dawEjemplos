<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h3>Detalle de Producto</h3>
<b>Descripción:</b> <?=$prod['descripcion'] ?><br>
<b>Precio:</b>      <?=$prod['precio'] ?><br>
<b>Estado:</b>      <?=$prod['estado'] ?>
<hr>

<form method=post action=delete.php>
    <input type=hidden name=id value=<?=$id?>>
    <input type=submit value=Eliminar class='btn btn-danger'>
</form>

<a href=index.php>Volver</a>
</body>
</html>