<?php
class Asignatura
{
    const NOTA_MIN=1;
    const NOTA_MAX=10;
    public $nombre; //Nombre de la asignatura
    public $aprobados=0;
    public $suspensos=0;
    public $notas; //Num de alumnos por cada nota, del 1 al 10

    function __construct($nombre){
        $this->nombre=$nombre;
        $this->notas=array_fill(self::NOTA_MIN,self::NOTA_MAX,0);
    }

    function __toString()    {
        return $this->nombre;
    }
    function addnota($nota){
        if($nota>=self::NOTA_MIN && $nota<=self::NOTA_MAX) {
            if($nota>=self::NOTA_MAX/2)
                $this->aprobados++;
            else 
                $this->suspensos++;
            $this->notas[$nota]++;
        } else 
            throw new Exception ('Nota incorrecta '.$nota);

    }
}

