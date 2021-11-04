<?php
/* Carga un fichero csv de la forma, alumno,asignatura,nota
* Devuelve un array de [asig=>['aprobados'=>n,'suspensos'=>n,'distrib=>[1=>X,2=>Y...10=>Z] ]]
*/
function procesafichero($fichero)
{
    $notas = [];
    foreach (array_map('str_getcsv', file($fichero)) as $linea) {
        list(, $asi, $nota) = $linea;
        //Crear indices ap/sus
        if (!isset($notas[$asi])) {
            $notas[$asi]=["aprobados" => 0,'suspensos'=>0,'distrib'=>[]];
        }

        //Añadir ap/su y notas
        if ($nota >= 5) 
            $notas[$asi]["aprobados"]++;
        else
            $notas[$asi]["suspensos"]++;
        if (isset($notas[$asi]['distrib'][$nota])) {
            $notas[$asi]['distrib'][$nota]++;
        } else {
            $notas[$asi]['distrib'][$nota] = 1;
        }
    }
    aksort($notas);
}
