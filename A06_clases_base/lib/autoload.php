<?php
// Autocarga de clases
function __autoload($clase){
    $dirs=['lib','.']; //Directorios donde busca las clases
    foreach($dirs as $dir){
        $fichero=$dir.'/'.$clase.'.php';
        if(file_exists($fichero)) {
            require_once $fichero;
            return;
        } 
    }
    throw new Exception('No existe la clase '.$clase);
}

