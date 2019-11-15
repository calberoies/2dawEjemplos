<?php

foreach($autores as $t){
	echo "<a href='?r=autores/view&id={$t->id}'>{$t->nombre}</a><br> ";
}

