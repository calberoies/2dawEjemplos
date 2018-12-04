<?php
/** Clase base. Implementa getters y setters de las propiedades 
 * 
 *  En una clase descendiente, los metodos getPROP y setPROP($valor) definen la propiedad PROP
 */
class base {

    public $errores=[]; //Errores de validacion. Array asociativo  propiedad=>error

    
    /** Acceso a una propiedad inexistente o protegida
     * 
     * @param type $prop
     */
    function __get($prop){
        $metodo='get'.$prop;
        if(method_exists($this,$metodo))
            return $this->$metodo();
        else
            throw new Exception('Propiedad inexistente '.$prop);
    }
    
    function __set($prop,$value){
        $metodo='set'.$prop;  //si es email, el metodo es setemail
        if(method_exists($this,$metodo))
            return $this->$metodo($value);
        else
            throw new Exception('Propiedad inexistente '.$prop);
    }
    
    /** asigna varias propiedades a partir de un array
     * 
     * @param type $valores  propiedad=>valor
     */
    public function setvalores($valores){
        foreach ($valores as $propiedad=>$valor){
            $metodo='set'.$propiedad;  //si es email, el metodo es setemail
            if(method_exists($this,$metodo))
                $this->$metodo($valor);
            else
                $this->$propiedad=$valor;
        }
    }
    
    /** Añade un error a una propiedad
     * 
     * @param type $propiedad
     * @param type $error
     */
    public function adderror($propiedad,$error){
        $this->errores[$propiedad]=$error;
    }
    
}