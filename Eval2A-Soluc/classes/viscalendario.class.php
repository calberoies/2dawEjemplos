<?php
/** Visualiza el mes de una instancia calendario, con sus citas
 */

class viscalendario{
	public $calendario;

	public function __construct($calendario){
		setlocale(LC_ALL, 'spanish');
		$this->calendario=$calendario;
	}
	
	// Devuelve el nombre de un mes
	function nombremes($mes){
		return ucfirst(strftime('%B',mktime(0,0,0,$mes,1,$this->calendario->anyo)));
	}

	private function displaydia($mes,$dia){
		echo "<div class='dia'><a href=citasdia.php?dia=$dia&mes=$mes>$dia</a>\n";
		$citas=$this->calendario->getcitasdia($mes,$dia);
		if($citas) 
			foreach($citas as $hora=>$paciente)
				printf("<div class=cita style='font-size:10px'>%s %s</div>",
						$hora,$paciente);
		echo "</div>\n";
	}
	
	private function displaydiaresum($mes,$dia){
		$citas=$this->calendario->getcitasdia($mes,$dia);
		if($citas) 
			echo "<div class='dia ocupado'>$dia</div>\n";
		else
			echo "<div class='dia'>$dia</div>\n";
		
	}

	/**  Muestra el calendario
	 *
	 */
	public function displaymes($mes,$resum=false){

		echo "<div class=calmes><div class=titmes>";
		echo $this->nombremes($mes).' ';
		echo $this->calendario->anyo;
		echo "</div>";

		//cabecera de dias
		$cabecera=array('L','M','X','J','V','S','D');
		foreach($cabecera as $c)
			echo "<div class='dia titdia'>".$c.'</div>';
		echo "<div class=clear></div>";

		// Dias vacios hasta el anterior del día 1
		$diasem1=$this->calendario->diasemana($mes,1);
		for($i=1;$i<$diasem1;$i++)
				echo "<div class='dia vacio'></div>";


		$diasmes=cal_days_in_month ( 0 , $mes , $this->calendario->anyo);
		for($dia=1;$dia<=$diasmes;$dia++){
			if(!$resum)
				$this->displaydia($mes,$dia);
			else
				$this->displaydiaresum($mes,$dia);

		}

		echo "</div></div>";
	}
	
	public function displayAnyo(){
		for($mes=1;$mes<=12;$mes++) {
			echo "<div class='mespeq'>";
			$this->displaymes($mes,true);
			echo "</div>";
		}
	}

}

?>