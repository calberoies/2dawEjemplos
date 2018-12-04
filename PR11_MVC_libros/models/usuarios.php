<?php

class usuarios extends model {
	static $tablename='usuarios';
	static $attributes;
	public $role; // permisos

	public function __tostring(){
		return $this->nombre;
	}

	/**
	 *
	 * @return boolean
	 */
	public function getisadmin(){
		if($this->role=='AD')
			return true;
		else
			return false;
	}

	public function getreader(){
		return readers::findByPk($this->readers_id);
	}
	
	public function gettitulos(){
		return titulos::findAll('usuarios_id='.$this->id);
	}

	/** Devuelve true si no está logueado
	 *
	 * @return boolean
	 */
	public function isGuest(){
		if(!$this->role)
			return true;
		else
			return false;
	}

}
