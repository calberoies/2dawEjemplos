<html>
<?php	
require 'banners.php' 
?>
	<head>
		<style>
			.cabecera {vertical-align:top;width:800px;margin:auto;background-color: #dea;padding:15px;font-size:2em}
			.contenido {width:800px;height:700px;margin:auto;background-color: #eee;padding:15px}
			.banner {position:absolute;width:120px;height:300px}
		</style>
	</head>
	<body>
		<div class="cabecera">MI TIENDA</div>
		<div class="contenido">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
			labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
			aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
			eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt 
			mollit anim id est laborum<br>
		</div>
		<div class="banner" style="left:1100px;top:120px">Publicidad<br>
			<?= getbanner(); ?>
		</div>
		<div class="banner" style="left:100px;top:120px">Publicidad<br>
			<?php echo getbanner(); ?>
		</div>
	</body>
</html>