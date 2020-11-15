<?php

class usuario extends base {

    // Valores posibles de la propiedad sexo
    static $sexooptions = ['H' => 'Hombre', 'M' => 'Mujer'];
    public $nombre;
    public $apellidos;
    private $fechanac;
    private $email;
    private $sexo;
    private $saldo;

    public function __construct($nombre = '', $apellidos = '') {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }
  // Conversión a string del objeto
    public function __tostring(){
        return $this->nombrecompleto;
    }
    
    public function getemail() {
        return $this->email;
    }

    public function setemail($email) {
        $this->email = $email;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $this->adderror('email', 'Email incorrecto');
    }

    public function getfechanac() {
        return $this->fechanac;
    }

    public function setfechanac($fechanac) {
        if (!$fechanac)
            $this->adderror('fechanac', 'Fecha obligatoria');
        else {
            $this->fechanac = $fechanac;
            @list($d, $m, $a) = explode('/', $fechanac);

            if (!checkdate($m, $d, $a))
                $this->adderror('fechanac', 'Fecha incorrecta');
            else {
                if ($this->edad < 18) {
                    $this->adderror('fechanac', 'No se admite a menores de edad');
                }
                $this->fechanac = date('d/m/Y', mktime(0, 0, 0, $m, $d, $a));
            }
        }
    }

    public function getsexo() {
        return $this->sexo;
    }

    public function setsexo($sexo) {
        $this->sexo = $sexo;
        if (!isset(self::$sexooptions[$sexo]))
            $this->adderror('sexo', 'Sexo incorrecto');
    }

    public function getedad() {
        return floor((time() - strtotime($this->fechanac)) / 31556926);
    }

    public function setsaldo($saldo) {
        if ($saldo < 0)
            $this->adderror('saldo', 'Saldo no puede ser negativo');
        else
            $this->saldo = $saldo;
    }

    public function getsaldo() {
        if (!$this->saldo)
            return 0;
        else
            return $this->saldo;
    }

    /** Devuelve el nombre y apellidos de la persona
     * 
     * @return string nombre+' '+apellidos
     */
    public function getnombrecompleto() {
        return $this->nombre . ' ' . $this->apellidos;
    }

}
