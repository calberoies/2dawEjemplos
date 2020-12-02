<?php 


function getparams($name){
    if(!isset($_POST[$name]))return false;
    //global $db;
    return array_map('addslashes',$_POST[$name]);
    /*foreach($_POST[$name] as $campo=>$valor)
        $ret[$campo]=$db->escape_string($valor);
    return $ret;*/
}

/** Genera un desplegable
 * 
 */
function desplegable($name,$value,$options,$class='form-control'){
    echo "<select name='$name' class='$class'>
        <option value=''>Selecciona.. </option>";
    foreach($options as $ovalue=>$label){
        $sel=$ovalue==$value ? 'selected ' : '';
        echo "<option value='$ovalue' $sel>$label</option>";
    }
    echo "</select>";
}
