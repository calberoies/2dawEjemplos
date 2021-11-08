<?php
/* Carga un fichero csv de la forma, alumno,asignatura,nota
* Devuelve un array de [asig=>['aprobados'=>n,'suspensos'=>n,'distrib=>[1=>X,2=>Y...10=>Z] ]]
*/
function procesafichero($fichero)
{
    $notas = [];
    foreach (array_map('str_getcsv', file($fichero)) as $linea) {
        list(, $asi, $nota) = $linea;
        if($nota<1 or $nota>10) continue; //Se ignoran
        //Crear indices ap/sus
        if (!isset($notas[$asi])) {
            $notas[$asi]=["aprobados" => 0,'suspensos'=>0,'distrib'=>array_fill(1,10,0)];
        }

        //Añadir ap/su y notas
        if ($nota >= 5) 
            $notas[$asi]["aprobados"]++;
        else
            $notas[$asi]["suspensos"]++;

        $notas[$asi]['distrib'][$nota]++;
    }
    ksort($notas);
    savenotas($notas);
    return $notas;
}

//Guarda las notas procesadas en un fichero
function savenotas($notas){
    file_put_contents('notas.dat',serialize($notas));
}

//Carga notas de un fichero creado con savenotas()
function loadnotas(){
    if(!file_exists('notas.dat')) 
        throw new Exception('No existe fichero de notas');
    if(!$notas=unserialize(file_get_contents('notas.dat')))
        throw new Exception('Error al cargar fichero');
    return $notas;    
}
