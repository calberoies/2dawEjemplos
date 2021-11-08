<?php 
require_once 'Productos.php';

class Carrito {
    // Array de id=>cantidad
    protected $productos=[];
    public $user;
    public $rol;

    public function addProducto($id,$cantidad=1){
        $prod=Productos::instance();
        if(!$p=$prod->getById($id))
            throw new Exception('No existe ese producto! '.$id);

        if(isset($this->productos[$id]))
            $this->productos[$id]+=$cantidad;
        else
            $this->productos[$id]=$cantidad;
    }

    public function delProducto($id){
        unset($this->productos[$id]);
    }

    public function getProductos(){
        $ret=[];
        $prod=Productos::instance();
        foreach($this->productos as $id=>$cantidad){
            $p=$prod->getById($id);
            $ret[]=[
                'id'=>$id,
                'cantidad'=>$cantidad,
                'nombre'=>$p['nombre'],
                'precio'=>$p['precio']
            ];
        }    
       return $ret;
    }
    public function getTotal(){
        //Precio 
        $prod=Productos::instance();
        
    }
}