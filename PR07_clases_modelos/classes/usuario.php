<?php

class usuario extends base {
    // Valores posibles de la propiedad sexo
    static $sexooptions=['H'=>'Hombre','M'=>'Mujer'];
    
    public $nombre;
    public $apellidos;
    private $fechanac;
    private $email;
    private $sexo;
    

    public function __construct($nombre='',$apellidos=''){
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
    }
    
    public function getemail(){
        return $this->email;
    }
    
    public function setemail($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            $this->adderror('email','Email incorrecto');
        else
            $this->email=$email;
    }

    public function getfechanac(){
        return $this->fechanac;
    }
    
    public function setfechanac($fechanac){
        if(!$fechanac)
            $this->adderror('fechanac','Fecha obligatoria');
        else {
            list($a,$m,$d) = explode('-',$fechanac);

            if (!checkdate($m,$d,$a)) 
                $this->adderror('fechanac','Fecha incorrecta');
            else {
                $this->fechanac=$fechanac;
                if($this->edad<18){
                    $this->adderror('fechanac', 'No se admite a menores de edad');
                }
            }
        }
    }
    
    public function getsexo(){
        return $this->sexo;
    }
    
    public function setsexo($sexo){
        if(!isset(self::$sexooptions[$sexo]))
            $this->adderror('sexo','Sexo incorrecto');
        else
            $this->sexo=$sexo;
    }
      
    public function getedad(){
        return  floor((time() - strtotime($this->fechanac)) / 31556926);
    }
    
    /** Devuelve el nombre y apellidos de la persona
     * 
     * @return string nombre+' '+apellidos
     */
    public function getnombrecompleto(){
        return $this->nombre.' '.$this->apellidos;
    }
    
}
