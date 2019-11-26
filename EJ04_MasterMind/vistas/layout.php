<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MASTERMIND</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="style/main.css" />
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
MASTERMIND
    <?php if(isset($enjuego)) { ?>
        <div class='col-pullright '>
            <a href="juego.php?terminar=1" class='btn btn-primary'>Me rindo!!</a>
        </div>
    <?php } ?>
</nav>
    <div class="container">
        <?php 
            require $vista.'.php';
        ?>
    </div>
</body>
</html>