<?php 
class Controller {
    public function beforeAction($action){
        return true;        
    }

    public function redirect($ctl,$params=[]){
        $ret='?r='.$ctl;
        foreach($params as $param=>$valor) {
            $ret.='&'.$param.'='.$valor;
        }
        header('Location:'.$ret);
    }
}