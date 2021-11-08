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
    //Conversión a texto
    function __toString() {
      return $this->name;
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
      if(!is_numeric($preciobruto))
        throw new Exception('Precio incorrecto');
      $this->preciobruto=$preciobruto;
    }
  
    function get_name() {
      return $this->name;
    }
    function get_precio(){
        return $this->preciobruto*(1+self::$iva/100);
    }
  }
  