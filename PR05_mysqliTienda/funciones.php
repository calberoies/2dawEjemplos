<?php 

function getestados () {
    return ['A'=>'Activo','D'=>'Descatalogado'];
}

/**
 * Devuelve un array de $valor=>$label de una tabla
 *
 * @param  mixed $tabla
 * @param  mixed $valor
 * @param  mixed $label
 * @return void
 */
function listdata($tabla,$valor,$label){
    global $db;

    $sql="select $valor,$label from $tabla order by $label";

    $result = mysqli_query($db, $sql);
    if(!$result) 
     die("Error en la sql: ".mysqli_error($db));
    
    $ret=[];
    while($row = mysqli_fetch_assoc($result)) {
        $ret[$row[$valor]]=$row[$label];
    }
    return $ret;   
    
}

/**
 * findall Devuelve datos de una tabla
 *
 * @param  mixed $tabla
 * @param  mixed $where
 * @param  mixed $order
 * @return void
 */
function findall($tabla,$where='',$order=''){
    global $db;

    $sql="select * from $tabla ";
    if($where) $sql.=' where '.$where;
    if($order) $sql.=' order by '.$order;

    $result = mysqli_query($db, $sql);
    if(!$result) 
     die("Error en la sql: ".mysqli_error($db));
    
    $ret=[];
    while($row = mysqli_fetch_assoc($result)) {
        $ret[]=$row;
    }
    return $ret;   
    
}

/**
 * findone Devuelve una fila de una tabla, accediendo por primary key (id)
 *
 * @param  mixed $tabla
 * @param  mixed $id
 * @return void
 */
function findone($tabla,$id){
    global $db;
    $ret=findall($tabla,'id='.$id);
    if(!$ret) return false;
    return $ret[0];
}