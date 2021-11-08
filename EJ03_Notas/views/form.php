<!doctype html>
<html lang="en">
  <head>
  
  
    <title>Notas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class=container>
    <h3>Proceso de Notas</h3>
        <form method="post" enctype="multipart/form-data">
            Fichero: <input type="file" name="doc">
            <input type="submit" name="enviar" value="Enviar">
      </form>
      <?=$error ??'' ?>
