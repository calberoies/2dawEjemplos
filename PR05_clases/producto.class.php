<?php 
namespace tienda;
require_once 'base.class.php';


class producto extends \daw\base {
    private $_codigo;
    public $descripcion;
    private $_precio;
    private $_colores=[];

    
    public function __construct($codigo,$descri='') {
        $this->_codigo=$codigo;
        $this->descripcion=$descri;
    }
    public function __tostring(){
        return $this->descripcion;
    }

    public function getcodigo(){
        return $this->_codigo;
    }
    
    public function setprecio($precio){
        if(!is_numeric($precio))
            throw new \Exception('El Precio ha de ser númerico ');
        $this->precio=$precio;
    }

    public function getprecio(){
        return $this->precio;
    }

    public function addcolor($color){
        $this->_colores[]=$color;
    }
    public function getcolores(){
        return $this->_colores;
    }

}