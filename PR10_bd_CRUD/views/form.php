<?php
require 'header.php';
require 'lib/Mhtml.php';
?>

<h2>Edición de Título</h2>

	<form method=post class='form'>
		<label>Título:</label>
		<input name='titulo' value='<?=$titulo['titulo']?>' size='60'>
		<?=geterror($errores,'titulo')?>
		<br>

		<label>Autor:</label>
		<?php
		$autores=listData('autores','id','nombre');
		desplegable('autor_id',$titulo['autor_id'],$autores);
		?>
		<?=geterror($errores,'autor_id')?>
		<br>

		<label>Género:</label>
		<?php
		$categorias=listData('categorias','id','nombre');
		desplegable('categoria_id',$titulo['categoria_id'],$categorias);
		?>
		<?=geterror($errores,'categoria_id')?>
		<br>


		<label>Año:</label> <input name='anyo' value='<?=$titulo['anyo']?>' size='4'>
		<?=geterror($errores,'anyo')?>
		<p>
			<input class=button type="submit" value="Actualizar" class='budtton'>
		<?php
		if(isset($id)) // Estamos en modificación
			echo "<a href='view.php?id=$id' class='button'>Cancelar</a>";
		else
			echo "<a href='index.php' class='button'>Cancelar</a>";

			?>
</form>

<?php
require 'footer.php';
?>