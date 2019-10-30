<?php 
/** Clase base que implementa getters y setters
 * Si se define una propiedad como privada , de la forma $_prop, se accede como pública a $prop (solo lectura) 
 * Si existe un método getProp() se utiliza para devolver la propiedad $prop 
 * Si existen un método setProp() se utiliza para asignar el valor de $prop 
 * 
 */
namespace daw;

class base {

    function __get($prop){
        $method='get'.ucfirst($prop);
        if (method_exists($this,$method)){
            return call_user_func([$this,$method],$prop);
        } else{
            $privada='_'.$prop;
            if(isset($this->privada))
                return $this->privada;
            else 
                throw new \Exception('No existe la propiedad '.$prop);
        }
    }
    function __set($prop,$value){
        $method='set'.ucfirst($prop);
        if (method_exists($this,$method)){
            return call_user_func([$this,$method],$prop,$value);
        } else{
            throw new \Exception('No existe la propiedad '.$prop);
        }
    }


}