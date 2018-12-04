<?php

class autores extends model {
	static $tablename='autores';
	static $attributes;

	public function __tostring(){
		return $this->nombre;
	}

	public function gettitulos(){
		return titulos::findAll('autor_id='.$this->id);
	}
	public function getnumtitulos(){
		return count(titulos::findAll('autor_id='.$this->id));
	}

}
