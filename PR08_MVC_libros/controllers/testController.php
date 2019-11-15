<?php

class testController extends controller{
    public function actionIndex(){
        echo "HOLA MUNDO";
    }
    
    public function gettitulo($id){
        echo $id;
    }
    public function actionView($id){
        $titulo=titulos::findbyPk($id);
        echo $titulo;
        
        
    }
    
    public function actioncrear($nombre){
        //filtros de acceso
        $a=new autores;
        $a->nombre=$nombre;
        if($a->save())
            echo "AUTOR CREADO";
        else {
            echo "ERROR AL CREAR";
            var_dump($a->errors);
        }
        
    }
    
}
