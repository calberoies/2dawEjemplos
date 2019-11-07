<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h3>Productos</h3>
<form>
    Filtra: <input type=text name=buscar value='<?=$buscar?>'> 
     Estado:
         <?= desplegable('estado',$estado,PRODESTADOS,''); ?> 
     <input type=submit value=Busca>
</form>

<?php 
if (mysqli_num_rows($result) > 0) { 
    echo "<table class='table-striped' style='font-size:1.3em' cellpadding=8><tr>
        <th><a href='?sort=descripcion'>Descripción</a></th>
        <th><a href='?sort=precio'>Precio</a></th>
        <th><a href='?sort=estado'>Estado</a></th>
        <th></th></tr>";
    while($row = mysqli_fetch_assoc($result)) { ?>
    <tr><td><a href='detalle.php?id=<?=$row["id"]?>'>
            <?=$row["descripcion"] ?>
            </a></td>
            <td>
                <?=$row["precio"]?>
            <td>
                <?=$row["estado"]=='A' ? 'Activo': 'Inactivo' ?>
            </td>
            <td>
                <a href='update.php?id=<?=$row["id"]?>'>Modificar</a>
            </td>
            </tr>
<?php 
    } 
    echo "</table>";
}
?>
<hr>
<a href=insert.php class='btn btn-primary'>ALTA</a>
</body>
</html>