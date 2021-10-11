<?php
    require 'funciones.php';
    $pals=cuentapals('test.txt',1);
    echo "<pre>";
    print_r($pals);