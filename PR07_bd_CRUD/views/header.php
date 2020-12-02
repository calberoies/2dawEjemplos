<html>
<head><TITLE>Títulos</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<meta http-equiv="Cache-Control" content="no-store" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet"   type="text/css" href="views/estilo.css">
</head>
<body>
<div class='container'>

	<div class=row>
	<div class=col-md-6><h3>Libros </h3></div>
	<div class=col-md-6>
		<?php
		if(ensesion()){
			echo $_SESSION['usuario']['nombre'];
			echo ' <a href=user.php?a=logout>[Salir]</a>';
		} else {
			?><form method='post' action='user.php?a=login' autocomplete="off">
				Usuario:<input name='usuario' size='10' > 
				Password:<input type='password' name='password' size='10'>
				<input type='submit' value='Entrar'>	
			</form>
			<?php
		}
			
		?>
		</div>
	</div>
	<?=getflash();?>
	
