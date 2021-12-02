<?php 
function listdata($datos,$clave,$label){
    $ret=[];
    foreach($datos as $item) {
        $ret[$item[$clave]=$item[$label]];
    }
    return $ret;
}


/** Genera un desplegable
 * 
 */
function desplegable($name,$value,$options){
    echo "<select name='$name' class='custom-select'>
        <option value=''>Selecciona.. </option>";
    foreach($options as $ovalue=>$label){
        $sel=$ovalue==$value ? 'selected ' : '';
        echo "<option value='$ovalue' $sel>$label</option>";
    }
    echo "</select>";
}