<?php

class comentarios extends model {
	static $tablename='comentarios';
	static $attributes;

	public function __tostring(){
		return $this->texto;
	}

}
