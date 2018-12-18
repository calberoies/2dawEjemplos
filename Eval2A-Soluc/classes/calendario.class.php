<?php
/** Calendario de citas anual
 *
 */

class calendario{
	public $anyo;
	
	/** Array de citas por meses-días:  
	 *
	 * @var array de la forma [mes][dia][hora]=>Paciente    
	 * Ejemplo:  $this->citas[5][31]['9:00']=>'Manolo Pérez'  
	 */
	public $citas; 

	public function __construct($anyo){
		$this->anyo=$anyo;
	}

	/** Asigna año del calendario, borrando las citas si es diferente al asignado
	 *
	 * @param type $anyo
	 */
	public function setanyo($anyo){
		if($this->anyo!=$anyo){ //SI el mes o año son distintos, se borran las citas
														//En un caso real, se guardarían en una BDatos
			unset($this->citas);
		}
		$this->anyo=$anyo;
	}
	
	// Devuelve una lista de horas con un intervalo de minutos entre ellas
	public function gethoras($hora1,$hora2,$intervalo=15){
		$ret=[];
		$hora=$hora1;
		do {
			$ret[]=$hora;
			$hora= date('H:i',strtotime("+$intervalo minutes",strtotime($hora)));
		} while($hora<=$hora2);
		return $ret;
	}
	/** Añade una cita a un mes-dia
	 *
	 * @param type $mes
	 * @param type $dia
	 * @param type $paciente
	 */
	public function anadircita($mes,$dia,$hora,$paciente){
		//Aquí podriamos validar dia, texto y hora y devolver un error si no son correctos
		$this->citas[$mes][$dia][$hora]=$paciente;
	}
	public function anulacita($mes,$dia,$hora){
		unset($this->citas[$mes][$dia][$hora]);
	}

	/** Devuelve las citas de un mes
	 * 
	 * @param type $mes
	 */
	public function getcitasdia($mes,$dia){
		if(isset($this->citas[$mes][$dia]))
			return $this->citas[$mes][$dia];
		else
			return [];
	}
	
	/** Devuelve el dia de la semana de  un dia/mes determinado del año del calendario
	 * @return int  Dia de la semana, de 1 a 7
	 */
	public function diasemana($mes,$dia){
		$ret=date('w',mktime(0,0,0,$mes,$dia,$this->anyo));
		if($ret==0) $ret=7; //Domingo
		return $ret;
	}
	

}

?>