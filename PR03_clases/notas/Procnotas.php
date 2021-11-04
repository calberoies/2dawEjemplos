<?php

class Procnotas
{
    /**
     * Array de instancias Asignatura
     *
     * @var Asignatura[]
     */
    public $asigs = [];


    public function addnota($asig, $nota)
    {
        if (!isset($this->asigs[$asig]))
            $this->asigs[$asig] = new Asignatura($asig);
        
        $this->asigs[$asig]->addnota($nota);
    }
}
