<?php 

class Categorias extends model {
    static $tablename='categorias';
    public $id;
    public $nombre;

    public function validate(){
        $this->checkrequired(['nombre']);
        return parent::validate();
    }

    public function getEntradas(){
        return Entradas::findAll('categorias_id='.$this->categorias_id);
    }
}