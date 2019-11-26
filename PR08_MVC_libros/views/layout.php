<html>
<heaer>
	<meta charset='utf-8'>
	<TITLE><?php echo app::instance()->title ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<link rel="stylesheet"   type="text/css" href="views/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
</header>
<body>
<span class="logo"><?php echo app::instance()->name ?></span>
<span class="menu"><a href='?r=categorias'>Categorías</a></span>
<span class="menu"><a href='?r=titulos'>Títulos</a></span>
<span class="menu"><a href='?r=autores'>Autores</a></span>
<span class="menu"><a href='?r=carrito'>Carrito</a></span>
<span class="menu"><a href='?r=site/ayuda'>Ayuda</a></span>
<span class="menu">
<?php
if(app::instance()->isLogued()){
	echo app::instance()->user->nombre;
	echo "<a href='?r=site/logout'>(Salir)</a>";
} else
	echo "<a href='?r=site/login'>(Login)</a>";
?>
</span>
<hr>
<div class="container">
<h2><?=$this->title?></h2>

<?php
echo $content;
?>

</div>
<hr style='clear:left'>
Copyright (2019) Desarrollado con microframework mfp:<a href="mfp/docum/">Documentación</a>
</body>
</html>


