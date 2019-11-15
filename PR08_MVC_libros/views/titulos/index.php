<form>
    <div class='field' style='float:left'>
        <?= Mhtml::dropdownlist($titfiltro, 'categoria_id', categorias::findList('id', 'nombre'));   ?>
    </div>        
    &nbsp;
    <div class='field' style='float:left'>
        <?= Mhtml::textfield($titfiltro,'titulo'); ?>
    </div>
    <div >
    <input type="submit" value="Buscar" class='button'>
    </div>
    <div style='clear:left'></div>
</form>

<?php
	Mhtml::navegador($limit,count($titulos));
    foreach ($titulos as $t) {
        echo '<div class=libro>';
		echo '<img src="'.$t->image.'" width="100%">';
        echo Mhtml::actionlink('titulos/view',$t->titulo,['id'=>$t->id]);
        echo ' <br> ';
        echo $t->autor;
        echo '</div>';
    }
?>
<div style='clear:left'></div>

