<?php 

class Modelo {

  function __set($prop,$value){
      $func='set_'.$prop;
      if(method_exists($this,$func)) {
          $this->$func($value);
      } else
        throw new Exception("Error al asignar $prop");
  }

  function __get($prop){
      
    $func='get_'.$prop;
    if(method_exists($this,$func)) {
        return $this->$func();
    } else
      throw new Exception("Error al leer $prop");

  }
}
?>