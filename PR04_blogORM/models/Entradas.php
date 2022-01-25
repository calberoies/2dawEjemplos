<?php 
class Entradas extends Model {
    static $tablename='entradas';
    public $id;
    public $texto;
    public $usuarios_id;
    public $fecha;
    public $categorias_id;
    public $aprobada;
    
    static $aprobadoOptions=['P'=>'Pendiente','A'=>'Aprobada'];

    public function __construct(){
        $this->aprobada='P';
        $this->fecha=date('Y-m-d H:i:s');
    }    
    
    public function validate(){
        $this->checkrequired(['texto','categorias_id']);
        return parent::validate();
    }


    public function getCategoria(){
        return Categorias::find(['id',$this->categorias_id]);
    }
    public function getUsuario(){
        return Usuarios::find(['id',$this->usuarios_id]);
    }
    public function getAprobadoText(){
        return self::$aprobadoOptions[$this->aprobado];
    }
}