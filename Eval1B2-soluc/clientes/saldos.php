<?php 
//Saldos por tipos
require 'clientes.php';

echo "<h2>Saldos por tipos</h2>";
foreach(getsaldos() as $tipo=>$saldo){
    echo "<li>".$tipos[$tipo].'= '.$saldo;
}