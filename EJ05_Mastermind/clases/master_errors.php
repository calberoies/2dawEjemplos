<?php 
return [
    Mastermind::JOK => '', 
    Mastermind::JACERTADO => 'Acertado!',
    Mastermind::JFINMAX => 'No quedan intentos',
    Mastermind::JERR_NUM => "Debe contener ".$this->nivel['longitud']." cifras", 
    Mastermind::JERR_CREPE => 'No se pueden repetir las cifras',
    Mastermind::JERR_CPERM => "Escribe cifras entre 1 y ".$this->nivel['max'],
    Mastermind::JERR_JREPE => 'No puedes repetir jugada',
];
