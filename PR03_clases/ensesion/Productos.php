<?php 
class Productos{

    static $_prod=[
        'T01'=>['nombre'=>'Televisión 4K','precio'=>200],
        'M01'=>['nombre'=>'Móvil Samsung','precio'=>600]
    ];

    static function instance(){
        static $prod;
        if(!isset($prod)) {
            $prod=new self;
            echo "CREO instancia de prod!!";
        }
        return $prod;
    }

    public function getById($id){
        //Se cambiaría por un Acceso a BD
        return self::$_prod[$id]??null;

    }
}