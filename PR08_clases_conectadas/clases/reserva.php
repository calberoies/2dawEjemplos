<?php

class reserva {
    public $cliente; //Conectaria con una clase cliente. Aqui es el nombre
    public $precio;
    public $asiento;
    public $localizador;
    
    public $owner; //Vuelo al que pertenece
    
    public $confirmada='N'; // N=No  S=Si

    public function __construct($vuelo){
        $this->owner=$vuelo;
        $this->localizador=substr(md5(date('H:i:s')),0,6);
    }
}
