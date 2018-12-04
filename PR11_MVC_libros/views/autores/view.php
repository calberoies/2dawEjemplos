<?php

echo '<h3>'.$autor->nombre.'</h3>';
echo '<ul>';
foreach($autor->titulos as $titulo){
	echo '<li>';
	echo Mhtml::actionlink('titulos/view',$titulo->titulo,array('id'=>$titulo->id));
	echo '</li>';
}
echo '</ul>';
