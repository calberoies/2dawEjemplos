<?php 

class usuario {
    public $nombre;
    public $usuario;
    public $email;
    public $sexo;
    public $password;
    public $fecha_nac;
    public $estado='A'; //Por defecto, activo
    public $observaciones;
    const sexooptions=['H'=>'Hombre','M'=>'Mujer'];

    protected $errores=[];

    public function __set($prop,$value){
        //No hago nada. Únicamente evito que se creen propiedades no declaradas
    }

    /* Asigna propiedades del objeto a partir de un array de atributo=>valor
    */
    public function asignar($valores){
        //if(isset($valores['nombre']))
          //  $this->nombre=$valores['nombre'];

        foreach($valores as $atributo=>$valor){
            $this->$atributo=$valor;
        }
    }
    // Devuelve el error de un atributo
    public function geterror($atributo){
        /*if(isset($this->errores[$atributo]))
            return $this->errores[$atributo];
        else
            return '';*/

        return $this->errores[$atributo] ?? '';
    }
    
    //Asigna error a un atributo
    public function seterror($atributo,$error){
        $this->errores[$atributo]=$error;
    }

    /** Valida las propiedades del objeto 
     * 
    */
    public function validar(){
        //Nombre
        if(!$this->nombre)
            $this->errores['nombre']='Dato requerido';

        elseif (strlen($this->nombre) < 3) {
            $this->errores['nombre'] = 'Nombre incorrecto';
        }

        //email
        if(!$this->email)
            $this->errores['email']='Dato requerido';
        elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errores['email'] = 'email incorrecto';
        }
        if(!$this->sexo)
            $this->errores['sexo']='Dato requerido';
        if(!$this->fecha_nac)
            $this->errores['fecha_nac']='Dato requerido';

        //password
        $password2=$this->password; //TODO
        if(!$this->password)
            $this->errores['password']='Dato requerido';
        elseif (strlen($this->password) < 6) {
                $this->errores['password'] = "La contraseña debe tener al menos 6 caracteres.";
            } elseif ($this->password !== $password2) {
                $this->errores['password'] = "No coinciden las contraseñas";
            }
        
        return !$this->errores;

        /*if ($this->edad && ($this->edad < 1 or $this->edad>120)) {
            $this->errores['edad'] = 'Edad incorrecta';
        }*/

    }

}