<?php
/** Muestra el mensaje de error de un campo, si existe
 * $errores: array de errores
 * $dato. dato del que se quiere mostrar el error
 */
function verError($dato)
{
    global $errores;
    if (isset($errores[$dato])) {
        echo "<span class='form-text text-danger'>$errores[$dato]</span>";
    }
}

/**
 *  Comprueba si se ha pasado un dato, generando el error si no está.
 */
function requerido($dato){
    global $errores;
    if(!isset($_POST[$dato]) or !$_POST[$dato]){
        $errores[$dato]='Dato requerido';
        return '';
    } else
        return $_POST[$dato];
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
