<?php 

class ahorcado {

	protected $peli; //Array de letras de la peli a adivinar
	
	protected $letras; //array de Letras ya jugadas

	
	function __construct(){
		$this->peli=$this->escogepeli();
		$this->letras=[];
	}

	//Escoge una peli de pelis.txt al azar
	function escogepeli(){
		$pelis=file('pelis.txt',FILE_IGNORE_NEW_LINES);
		shuffle($pelis);
		return str_split($pelis[0]);
	}
	/**
	 * devuelve el título a adivinar
	 *
	 * @return string  título a adivinar
	 */
	public function getpeli(){
		return implode('',$this->peli);
	}

	/**
	 * juega una letra. La guarda si es correcta, y devuelve un código de resultado  
	 * @param  string $letra
	 * @return int
	 * 	 -1 =Letra ya jugada
	 *   -2 =Letra no está en el título
	 *    0 = Letra está, pero no hemos terminado 
	 *    1 = Letra está y hemos acertado
	 */
	function juegaletra($letra){
		if(in_array($letra,$this->letras))
			return -1;
		elseif(!in_array($letra,$this->titulo))
			return -2;
		else {
			$this->letras[]=$letra;
			if(!in_array('_',$this->getletras()))
				return 1;
			else 
				return 0;
		}
		
	}
	
	/**
	 * getletras 
	 *
	 * @return array Título con Letras o "_", según se hayan adivinado o no :  C _ S _ B L _ _ C _
	 */
	public function getletras(){
			$ret=[];
			foreach($this->peli as $letra){
				if(in_array($letra,$this->letras))
					$ret[]=$letra==' ' ? '&nbsp&nbsp;' : $letra;
				else 
					$ret[]='_';
			}
			return $ret;
	}

}
