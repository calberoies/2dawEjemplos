<?php
/** Juego del MasterMind
 * 
 */
require 'base.class.php';

class MasterMind extends base {
    private $_nivel; //Nivel de juego
    private $_numGanador; // Número a adivinar (array de cifras)
    private $_rondas = []; // array de Números ya jugados, de la forma   numero =>['M'=>muertos,'H'=>heridos]

    const Nivel = [
        0 => [
            'nombre' => 'Fácil',
            'max' => 4,
            'longitud' => 3,
            'intentos' => 7
        ], 
        1 => [
            'nombre' => 'Normal',
            'max' => 6,
            'longitud' => 4,
            'intentos' => 10
        ], 
        2 => [
            'nombre' => 'Difícil',
            'max' => 9,
            'longitud' => 4,
            'intentos' => 13
        ],
    ];

    public function __construct($niv) {
        if(!isset(self::Nivel[$niv]))
            throw new Exception('Nivel incorrecto');

        $this->_nivel = self::Nivel[$niv]; 
        //Genera numero ganador (random)
        $this->_numGanador = range(1, $this->_nivel['max']);
        shuffle($this->_numGanador);
        $this->_numGanador = array_slice($this->_numGanador, 0, $this->_nivel['longitud'] );
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
        $numjugadostr=implode('',$numjugado);
        if (count($numjugado) !== $this->_nivel['longitud']) {
            $codigo = 3;
        } else if (count(array_unique($numjugado))<count($numjugado))  { //cifras repetidas
            $codigo = 4;
        } else if ($this->fueraRango($numjugado)) { //Cifras incorrectas
            $codigo = 5;
        } else if (isset($this->_rondas[$numjugadostr])) { //Número ya jugado
            $codigo = 6;
        } else {
            $codigo = $this->comprobar($numjugado);
        }
        return $codigo;
    }

    /**
     * Comprueba muertos y heridos de la jugada
     *
     * @param  mixed $numUsuario
     *
     * @return int 0=ok, seguir jugando, 1=acertado 2=limite de intentos
     */
    private function comprobar($numUsuario) {
        $codigo = 0;
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
            $codigo = 1;
        } else {

            $numero=implode('', $numUsuario);
            $this->_rondas[$numero] = ['M'=>$muertos,'H'=>$heridos];

            if (!$this->intentosRestan ) {
                $codigo = 2;
            }
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

    public function getIntentosRestan() {
        return $this->_nivel['intentos'] - count($this->_rondas);
    }
}
?>