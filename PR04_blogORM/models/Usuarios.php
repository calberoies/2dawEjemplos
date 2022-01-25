<?php 
class Usuarios extends Model {
    static $tablename='usuarios';
    public $id;
    public $usuario;
    public $nombre;
    public $estado;
    public $password;
    public $email;

    public function validate(){
        //$this->checkrequired(['nombre']);
        return !$this->errors;
    }

    public function getEntradas(){
        return Entradas::findAll('usuarios_id='.$this->id);
    }
}