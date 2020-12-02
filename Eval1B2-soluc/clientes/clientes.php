<?php 

$tipos=['B'=>'Bares','R'=>'Restaurante'];

$clientes=[
    ['id'=>1,'Nombre'=>'Bar Paco','tipo'=>'B','tlf'=>'67897655','saldo'=>2000],
    ['id'=>3,'Nombre'=>'Rte Malvarrosa','tipo'=>'R','tlf'=>'65489099','saldo'=>400],
    ['id'=>4,'Nombre'=>'Rte Bulli','tipo'=>'R','tlf'=>'64357899','saldo'=>40],
    ['id'=>8,'Nombre'=>'Tasca Cabañal','tipo'=>'B','tlf'=>'69087655','saldo'=>250],
    ['id'=>11,'Nombre'=>'Rte Romeral','tipo'=>'R','tlf'=>'69976555','saldo'=>1000]
];


//Devuelve los clientes de un tipo , o todos, si no se pasa tipo
function getclientes($tipo=''){
    global $clientes;
    if($tipo=='')
        return $clientes;
    else {
        $ret=[];
        foreach($clientes as $cli)
            if($cli['tipo']==$tipo)
                $ret[]=$cli;
        return $ret;

        //Alternativa
        //return array_filter($clientes,function($clave,$valor){
        //    return $valor['tipo']==$tipo;
        //});
    }
}

// Devuelve un cliente buscando por id
function getcliente($id){
    global $clientes;
    
    foreach($clientes as $cli)
        if($cli['id']==$id)
            return $cli;
    return null;

    
}

// Devuelve el total de saldos por tipos
function getsaldos(){
    global $clientes;
    $saldos=[];
    foreach($clientes as $cli){
        if(!isset($saldos[$cli['tipo']]))
            $saldos[$cli['tipo']]=0;
        $saldos[$cli['tipo']]+=$cli['saldo'];
    }   
    return $saldos;
}
