<?php

// Citas de un mes-año determinado
class Agenda {
	private $anyo;
	private $mes;
	private $citas; //Array de [dia][hora]=>nombre

	// Horas posibles de las citas
	private static $horario;

	public static function sethorario($horario){
		self::$horario=$horario;

	}

	//...completar propiedades y constructor


	public function __construct($anyo,$mes){
		$this->anyo=$anyo;
		$this->setmes($mes);
	}
	public function setmes($mes){
		if($mes<1 or $mes>12)
			throw new Exception('Mes incorrecto');
		$this->mes=$mes;

	}

	/**
	 * Añade una cita
	 * @return codigo
	 * codigo es -1.---  -2-.... 1..
	 */
	public function anadecita($dia,$hora,$paciente){
		
		if(!in_array($hora,self::$horario))
			return -1; //No existe la hora
		
		if(isset($this->citas[$dia][$hora]))
			return -2; //dia-hora ocupado

		$this->citas[$dia][$hora]=$paciente;

		return 1;
	}

	public function getcitaspaciente($paciente){
		$ret=[];
		foreach($this->citas as $dia=>$citasdia)
			foreach($citasdia as $hora=>$cpaciente)
				if($cpaciente==$paciente){
					$ret[]=sprintf('%d/%d/%d %s',
						$dia,$this->mes,$this->anyo,$hora);
				}
		return $ret;
	}

	public function borracitaspaciente($paciente){
		$borradas=0;
		foreach($this->citas as $dia=>$citasdia)
			foreach($citasdia as $hora=>$cpaciente)
				if($cpaciente==$paciente){
					unset($this->citas[$dia][$hora]);
					$borradas++;
				}
		return $borradas;
	}
}

 ?>
