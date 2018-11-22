<?php 

class probador {
    private $prendas;
    private $hora;
    private $ctl; //Controlador

    function __construct($ctl){
        $this->ctl=$ctl;
        $this->init();
    }
    function __get($dato){
        if(isset($this->$dato))
            return $this->$dato;
        throw new Exception('Dato inexistente '.$dato);
    }

    //Inicializa probador
    function init(){
        $this->prendas=0;
        $this->hora=date('H:i:s');
    }

    //Modifica número de prendas (incrementa o decrementa)
    function update($prendas){
        $nprendas=$this->prendas+$prendas;
        if($nprendas>=0 and $nprendas<=$this->ctl->maxprendas) {
            $this->prendas=$nprendas;
            $this->hora=date('H:i:s');
        }
    }
}

// Controlador de probadores
class ctl_probadores {
    private $probadores=[]; //Array de objetos probador
    private $maxprendas; //Máximo de prendas en cada probador

    function __construct($numprobadores,$maxprendas){
        $this->maxprendas=$maxprendas;
        $this->init($numprobadores);
    }

    public function getprobadores(){
        return $this->probadores;
    }
    public function __get($propiedad){
        if($propiedad=='numprobadores')
            return count($this->probadores);
        elseif(isset($this->$propiedad))
            return $this->$propiedad;
        else 
            throw new Exception("Propiedad no definida: ".$propiedad);
    }

    // Inicializa probadores. Se puede llamar para cambiar la cantidad de probadores
    public function init($numprobadores){
        $this->probadores=[];
        for($i=1;$i<=$numprobadores;$i++){
            $this->probadores[$i]=new probador($this);
        }
    }

    //Vacía probadores
    function clearAll(){
        foreach($this->probadores as $probador)
            $probador->init();
    }
    //Vacía un probador
    function clear($idprob){
        if(!isset($this->probadores[$idprob]))
            return false;
        else 
            return $this->probadores[$idprob]->init();
    }

    //Modifica contenido de un probador
    function update($idprob, $cantidad){
        if(!isset($this->probadores[$idprob]))
            return false;
        else 
            return $this->probadores[$idprob]->update($cantidad);
    }
    
}