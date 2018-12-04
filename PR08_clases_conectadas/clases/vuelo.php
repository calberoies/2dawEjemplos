<?php
require_once 'reserva.php';

class vuelo {
    public $fecha;
    public $origen;
    public $destino;
    public $numvuelo;
    private $reservas=array(); //Lista de instancias de la clase reserva
    
    public $estado='A'; //A=Activo C=cancelado, T=Aterrizado
    
    public function __construct($fecha,$origen,$destino){
        $this->fecha=$fecha;
        $this->origen=$origen;
        $this->destino=$destino;
        $this->estado='A';
        
    }
    public function __get($dato){

        if(method_exists($this,'get'.$dato)){
            return call_user_func([$this,'get'.$dato]);
        } else
            throw new Exception('Prop inexistente');
    }
    public function getreservas(){
        return $this->reservas;
    }
    /** Crea una reserva en el vuelo
     * 
     * @param type $cliente
     * @param type $asiento
     * @param type $precio
     */
    public function anadirreserva($cliente,$asiento,$precio){
        if(isset($this->reservas[$asiento]))
            return false;
        $r=new reserva($this);
        $this->reservas[$asiento]=$r;
        $r->cliente=$cliente;
        $r->asiento=$asiento;
        $r->precio=$precio;
        return $r;
    }
    
    
    public function anularreserva_asiento($asiento){
        if(isset($this->reservas[$asiento])){
          unset($this->reservas[$asiento]);      
        } else
            throw new Exception('Asiento inexistente');
    }
    public function anularreserva_localizador($localizador){
        if($reserva=$this->buscalocalizador($localizador)){
          unset($this->reservas[$reserva->asiento]);      
        } else
            throw new Exception('Localizador inexistente');
    }
    
    /** Busca una reserva por localizador
     * 
     * @param type $localizador numero de localizador
     * @return boolean Reserva o false si no la encuentra
     */
    private function buscalocalizador($localizador){
        foreach($this->reservas as $reserva)
            if($reserva->localizador==$localizador)
                return $reserva;
        return false;            
    }
    
    public function getrecaudacion(){
        $total=0;
        foreach($this->reservas as $reserva)
            $total+=$reserva->precio;
        return $total;
        
    }
    
}

