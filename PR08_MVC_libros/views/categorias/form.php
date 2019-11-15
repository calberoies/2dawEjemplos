<div class="form>">
	<form method=post>
        <div class='field'>

	<?php echo Mhtml::textfield($categoria,'nombre') ?>
        </div>
        <div class='field'>
	<?php
		if(($this->action=='create') || app::instance()->checkrole('AD'))
			echo Mhtml::dropdownlist($categoria,'parent_id',Categorias::findList('id','nombre'));
		else
			echo $categoria->catpadre;
	?>
        </div>
        <div class='field'>
            <?php echo Mhtml::textfield($categoria,'orden','size=3') ?>
        </div>
	<input type="submit" value="Actualizar" class='button'>
</form>
</div>
