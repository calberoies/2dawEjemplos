<?php 

class bingo {
    
    protected $bolas=[];
    protected $numcartones;
    protected $preciocarton;

    public function __construct($numcartones,$preciocarton=2){
        $this->numcartones=$numcartones;
        $this->preciocarton=$preciocarton;
    }
    public function __get($v){
        if($v=='premio') return $this->getpremio();
        throw new Exception('Propiedad inexiste '.$v);
    }

    public function getpremio(){
        return $this->numcartones*$this->preciocarton*60/100;
    }

    protected function checkbola($bola){
        return is_numeric($bola) && $bola>0 && $bola<=90;
    }
    /**
     * Marca o desmarca una bola
     *
     * @param  mixed $bola
     * @return boolean
     */
    public function marcar($bola){
        if($this->checkbola($bola)){
            if(($p=array_search($bola,$this->bolas))!==false)
                unset($this->bolas[$p]);
            else 
                $this->bolas[]=$bola;
            return true;
        } else 
            return false;
    }    
    /**
     * Deshace la última jugada
     *
     * @return void
     */
    public function deshacer(){
        array_pop($this->bolas);
    }
    public function getnumbolas(){
        return count($this->bolas);
    }
    public function getbola($bola){
        if($this->checkbola($bola))
            return $this->bolas[$bola];
        else 
            return false;
    }    
    /**
     * comprueba si una línea está premiada
     *
     * @param  mixed $linea
     * @return void
     */
    function comprobar($linea) {
        if(is_string($linea))
            $linea=explode(',',$linea);
        return count(array_intersect($linea,$this->bolas))==5;
    }
    
    /**
     * Devuelve las 90 bolas con 0=no salida,1=salida,2=última salida
     *
     * @return void
     */
    function gettablero() {
        $ret=array_fill(1,90,0);
        foreach($this->bolas as $i=>$bola)
            $ret[$bola]=1;
        if($this->bolas)             
            $ret[end($this->bolas)]=2;
        return $ret;
    }
    public function restart(){
        $this->bolas=[];
    }
}