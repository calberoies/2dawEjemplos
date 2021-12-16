<?php 
$user=App::$app->user??null;
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Mi red social</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="blog.css">
    
    <style> 
    .login {background:#eee;height:200px;width:400px;padding:10px}
    .container {background:#eee;height:300px;margin-top:10px;padding:10px}
    .titulo {background:#dea;padding:5px}
    .error {color:red}
    </style>
</head>
<body>
    <nav class='navbar titulo' >
        <h3><a href=index.php>Mi Red Social</a></h3>
        <ul class='navbar-nav'>
            <?php if($user) { ?>
            <li class='nav-item ml-auto'>
                <?=$user->nombre?><br>
                <a href="?r=site/logout">Salir</a>
            </li>
            <?php } ?>
        </ul>
    </nav>
    <div class="container">
    <?php
    require $vista.".php";
    ?>
    </div>
</body>
</html>

