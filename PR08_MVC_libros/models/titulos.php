<?php

class titulos extends model {
	static $tablename='titulos';
	static $attributes;
	static $labels=['categoria_id'=>'Categoría','autor_id'=>'Autor'];

        public function __tostring(){
		return $this->titulo;
	}

    public function validate(){
		if(strlen($this->titulo)<3)
			$this->addError('titulo','El título es muy corto');

		return parent::validate();
	}


	public function getimage(){
		$file= 'thumbnails/'.$this->id.'.jpg';
		if(file_exists($file))
			return $file;
		else
			return 'thumbnails/portada.jpg';
	}

	public function getautor(){
		return autores::findByPk($this->autor_id);
	}

	public function getcategoria(){
		return categorias::findByPk($this->categoria_id);
	}
	public function getcomentarios(){
		return comentarios::findAll('titulo_id='.$this->id,'fecha');
	}
}
