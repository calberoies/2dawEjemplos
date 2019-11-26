<div class="form well" style='width:600px'>
	<form method=post>
        <div class='field'>
			<?php echo Mhtml::textfield($categoria,'nombre','text',['cols'=>12]) ?>
        </div>
        <div class='field'>
			<?php
				if(($this->action=='create') || app::instance()->checkrole('AD'))
					echo Mhtml::dropdownlist($categoria,'parent_id',Categorias::findList('id','nombre'),['cols'=>8]);
				else
					echo $categoria->catpadre;
			?>
        </div>
        <div class='field'>
            <?php echo Mhtml::textfield($categoria,'orden','text',['cols'=>9]) ?>
        </div>
        <div class='field'>
			<input type="submit" value="Actualizar" class='btn btn-primary'>
		</div>
</form>
</div>
