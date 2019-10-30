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
