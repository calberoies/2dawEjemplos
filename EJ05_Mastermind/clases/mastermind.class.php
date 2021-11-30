<?php
/** Juego del MasterMind
 * 
 */
require 'base.class.php';

class MasterMind extends base {
    private $_nivel; //Nivel de juego
    private $_numGanador; // Número a adivinar (array de cifras)
    private $_rondas = []; // array de Números ya jugados, de la forma   numero =>['M'=>muertos,'H'=>heridos]
    private $mensajes; //Mensajes de error

    const Nivel = [
        0 => [
            'nombre' => 'Fácil',
            'max' => 6,
            'longitud' => 3,
            'intentos' => 7
        ], 
        1 => [
            'nombre' => 'Normal',
            'max' => 6,
            'longitud' => 4,
            'intentos' => 9
        ], 
        2 => [
            'nombre' => 'Difícil',
            'max' => 9,
            'longitud' => 4,
            'intentos' => 13
        ],
    ];
    //Resultados de jugada:
    const JOK = 0;  //Jugada ok. Sigue el juego
    const JACERTADO = 1; //Acertado!
    const JFINMAX =2 ; //Fin de juego por límite jugadas
    const JERR_NUM =3; //Número de cifras incorrecto
    const JERR_CREPE =4; //Cifras repetidas
    const JERR_CPERM = 5; //Cifras no permitidas
    const JERR_JREPE =6; // Jugada repetida

    public function __construct($niv) {
        if(!isset(self::Nivel[$niv]))
            throw new Exception('Nivel incorrecto');

        $this->_nivel = self::Nivel[$niv]; 
        //Genera numero ganador (random)
        $this->_numGanador = range(1, $this->_nivel['max']);
        shuffle($this->_numGanador);
        $this->_numGanador = array_slice($this->_numGanador, 0, $this->_nivel['longitud'] );
        $this->mensajes=require 'master_errors.php';
    }
    
    // Comprueba que todas las cifras son correctas
    private function fueraRango($arrnum) {
        return count(array_diff($arrnum, range(1, $this->_nivel['max']) ))>0;
    }
    
    
    /**
     * juega un número
     *
     * @param  array $numjugado
     *
     * @return código de resultado de la jugada (ver const Resultados)
     */
    public function jugar($numjugado) {
        $numjugado=array_filter($numjugado); //Elimina vacíos
        $numjugadostr=implode('',$numjugado);
        if (count($numjugado) !== $this->_nivel['longitud']) {
            $codigo = self::JERR_NUM;
        } elseif (count(array_unique($numjugado))<count($numjugado))  { //cifras repetidas
            $codigo = self::JERR_CREPE;
        } elseif ($this->fueraRango($numjugado)) { //Cifras incorrectas
            $codigo = self::JERR_CPERM;
        } elseif (isset($this->_rondas[$numjugadostr])) { //Número ya jugado
            $codigo = self::JERR_JREPE;
        } else {
            $codigo = $this->comprobar($numjugado);
            if ($codigo!= self::JACERTADO && $this->intentosRestan==0 ) {
                $codigo = self::JFINMAX;
            } 
    
        }
        return $codigo;
    }

    function getMensaje($codigo){
        return $this->mensajes[$codigo] ?? 'Error '.$codigo;

    }
    /**
     * Comprueba muertos y heridos de la jugada
     *
     * @param  mixed $numUsuario
     *
     * @return int 0=ok, seguir jugando, 1=acertado 2=limite de intentos
     */
    private function comprobar($numUsuario) {
        $codigo = self::JOK;
        $muertos=0;
        $heridos=0;
        foreach($numUsuario as $posicion => $n) {
            if ($n == $this->_numGanador[$posicion]) {
                $muertos++;
            } else if (in_array($n, $this->_numGanador)) {
                $heridos++;
            }
        }
        
        if ($muertos == $this->_nivel['longitud']) {
            $codigo = self::JACERTADO;
        } else {

            $numero=implode('', $numUsuario);
            $this->_rondas[$numero] = ['M'=>$muertos,'H'=>$heridos];

        }
        return $codigo;
    }

    public function getnumGanador() {
        return implode('', $this->_numGanador);
    }

    public function getRondas() {
        return $this->_rondas;
    }

    public function getNivel() {
        return $this->_nivel;
    }
    public function getIntentos() {
        return $this->_nivel['intentos'];
    }

    public function getIntentosRestan() {
        return $this->_nivel['intentos'] - count($this->_rondas);
    }
}
?>