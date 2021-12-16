<?php 
class Util {
    //Crea un array [clave=>label,...] a partir de un array de modelos
    static function  listdata($datos,$clave,$label){
        $ret=[];
        foreach($datos as $item) {
            $ret[$item->$clave]=$item->$label;
        }
        return $ret;
    }


    /** Genera un desplegable
     * options es de la forma value=>label
     */
    static function desplegable($name,$value,$options){
        echo "<select name='$name' class='custom-select'>
            <option value=''>Selecciona.. </option>";
        foreach($options as $ovalue=>$label){
            $sel=$ovalue==$value ? 'selected ' : '';
            echo "<option value='$ovalue' $sel>$label</option>";
        }
        echo "</select>";
    }
    static function error($model,$field){
        if($error=$model->getErrors()[$field]??'')
            return "<span style='color:red'>$error</span>";
        else 
            return '';
    }
}