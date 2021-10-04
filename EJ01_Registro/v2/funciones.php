<?php
/** Muestra el mensaje de error de un campo, si existe
 * $errores: array de errores
 * $dato. dato del que se quiere mostrar el error
 */
function verError($errores,$dato)
{
    if (isset($errores[$dato])) {
        echo "<span class='form-text text-danger'>$errores[$dato]</span>";
    }
}

/**
 *  Comprueba si los campos de $campos definidos en datos no están vacios, devolviendo un array de errores
 */
function requeridos($datos,$campos){
    $errores=[];
    foreach($campos as $campo){
        if(!isset($datos[$campo]) or !$datos[$campo])
            $errores[$campo]='Dato requerido';
    }
    return $errores;
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
//Calcula edad a partir de fecha de nacimiento d/m/Y
function calcula_edad($fechanac){
    $parse=date_parse_from_format('d/m/Y',$fechanac);
    if($parse['error_count'] || $parse['warning_count']) 
        return false;
    else {
        if(!$nac=date_create_from_format('d/m/Y',$fechanac))
            return false;
        else
            return date_diff($nac, date_create())->format('%y');
    }
}
