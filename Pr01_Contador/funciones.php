<?php 

/* Cuenta las palabras de un fichero
*
* Devuelve un array [palabra=>veces...] 
*
*/
function cuentapals($fichero,$metodo=1){
    $contenido=file_get_contents($fichero);
    //Lo paso todo a minúsculas
    $contenido = strtolower($contenido);
    //Uno las palabras separadas por guión en una
    $contenido = preg_replace('/\-\s/', '', $contenido);
    //Separo por todo lo que no sea una palabra o los caracteres UTF-8 deseados en Español
    $contenido  = preg_split('/([^áéíóúñçüa-z])/', $contenido, -1, PREG_SPLIT_NO_EMPTY);

    //Cuento todas las palabras y las agrupo
    if($metodo==1) {
        $pals=[];
        foreach($contenido as $palabra){
            if(isset($pals[$palabra]))
                $pals[$palabra]++;
            else 
                $pals[$palabra]=1;
        }
        $contenido=$pals;
        unset($pals);
    } else {
        $contenido = array_count_values($contenido);
    }

    //se podría hacer todo en una sola instrucción:
    //$contenido=array_count_values(preg_split('...',preg_replace('..','..',(strtolower(file_get_contents($fichero))))));
    //Ordeno las palabras por valor descendente
    arsort($contenido);
    return $contenido;
}

/*
* Muestra una tabla a partir de un array de la forma key=>valor
*/
function grid(&$arr,$labelkey,$labelvalor){
    echo "<table border=1><tr><th>$labelkey</th><th>$labelvalor</th></tr>";
    foreach ($arr as $key => $value) {
        printf("<tr><td>%s</td><td>%s</td>",$key,$value);
    }
    echo "</table>";

}