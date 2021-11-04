<?php 
require_once 'Modelo.php';

class Fruit extends Modelo {
    static $iva;
  
    // Properties
    
    protected $name;
    protected $preciobruto;
  
    function __construct($name='') {
      $this->name = $name;
    }
    /**
     * Asigna nombre
     *
     * @param string $xname Nombre de la fruta
     * @return void
     */
    function set_name($xname) {
      if(!$xname)
          throw new Exception('Nombre incorrecto');
  
      $this->name = mb_strtoupper($xname);
    }
    
    function set_preciobruto($preciobruto){
      $this->preciobruto=$preciobruto;
    }
  
    function get_name() {
      return $this->name;
    }
    function get_precio(){
        return $this->preciobruto*(1+self::$iva/100);
    }
  }
  