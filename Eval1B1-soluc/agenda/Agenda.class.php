<?php

// Citas de un mes-año determinado
class Agenda {
	private static $horario;
	protected $anyo;
	protected $mes;

	public static function sethorario($horario){
		self::$horario=$horario;
	}

	//Citas del mes. 
	protected $citas=[]; //Array: La clave es [dia][hora]=>paciente


  public function fechacompleta($dia){
		return $dia.'/'.$this->mes.'/'.$this->anyo;
	}

	public function anadecita($dia,$hora,$paciente){
		if(!in_array($hora,self::$horario)){
			return -1; //Hora incorrecta
		} else {
			$this->citas[$dia][$hora]=$paciente;
			return 0;
		}
	}

	//Devuelve un array de citas de un paciente, de la forma dd/mm/YYYY => hora
	public function getcitaspaciente($paciente){
		$citas=[];
		foreach($this->citas as $dia=>$citasdia){
			foreach($citasdia as $hora=>$citapaciente)
				if($paciente==$citapaciente)
					$citas[$dia]=$hora;
		}
		return $citas;
	}
}

 ?>
