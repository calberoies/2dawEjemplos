<?php
require 'header.php';
require 'lib/Mhtml.php';
?>

<h2>Edición de Título</h2>

	<form method=post class='form'>
		
		<div class=col-md-8>
			<label>Título:</label>
			<input class=form-control name='Titulos[titulo]' value='<?=$titulo['titulo']?>' size='60'>
			<?=geterror($errores,'titulo')?>
		</div>
		<div class=col-md-6>
			<label>Autor:</label>
			<?php
			$autores=listData('autores','id','nombre');
			desplegable('Titulos[autor_id]',$titulo['autor_id'],$autores);
			?>
			<?=geterror($errores,'autor_id')?>
		</div>
		<div class=col-md-6>
			<label>Género:</label>
			<?php
			$categorias=listData('categorias','id','nombre');
			desplegable('Titulos[categoria_id]',$titulo['categoria_id'],$categorias);
			?>
			<?=geterror($errores,'categoria_id')?>
		</div>
		<div class=col-md-3>

			<label>Año:</label> <input class=form-control name='Titulos[anyo]' value='<?=$titulo['anyo']?>' size='4'>
			<?=geterror($errores,'anyo')?>
			<p>
		</div>
		<div class=row>
			<div class=col-md-7>

			<input class='btn btn-primary' type="submit" value="Actualizar" >
			<?php
			if(isset($id)) // Estamos en modificación
				echo "<a href='view.php?id=$id' class='btn btn-secondary'>Cancelar</a>";
			else
				echo "<a href='index.php' class='btn btn-secondary'>Cancelar</a>";

				?>
			</div>
		</div>
</form>

<?php
require 'footer.php';
?>