<?php

// Citas de un mes-año determinado
class Agenda
{
	private static $horario;
	protected $anyo;
	protected $mes;

	public static function sethorario($horario)
	{
		self::$horario = $horario;
	}
	public function __construct($anyo, $mes)
	{
		if ($mes < 1 || $mes > 12)
			throw new Exception('Mes incorrecto');
		$this->mes = $mes;
		$this->anyo = $anyo;
	}

	//Citas del mes. 
	protected $citas = []; //Array: La clave es [dia][hora]=>paciente


	public function fechacompleta($dia)
	{
		return $dia . '/' . $this->mes . '/' . $this->anyo;
	}

	public function anadecita($dia, $hora, $paciente)
	{
		if (!in_array($hora, self::$horario)) {
			return -1;
		} elseif (isset($this->citas[$dia][$hora])) {
			return -2;
		} else {
			$this->citas[$dia][$hora] = $paciente;
			return 1;
		}
	}

	//Devuelve un array de citas de un paciente, de la forma dd/mm/YYYY => hora
	public function getcitaspaciente($paciente)
	{
		$citas = [];
		foreach ($this->citas as $dia => $citasdia) {
			foreach ($citasdia as $hora => $citapaciente)
				if ($paciente == $citapaciente)
					$citas[$dia] = $hora;
		}
		return $citas;
	}

	public function borracitaspaciente($paciente)
	{
		$n = 0;
		foreach ($this->citas as $dia => $citasdia) {

			if ($dia > date('d'))
				foreach ($citasdia as $hora => $citapaciente) {
					if ($paciente == $citapaciente) {
						unset($this->citas[$dia][$hora]);
						$n++;
					}
				}
		}
		return $n;
	}
}
