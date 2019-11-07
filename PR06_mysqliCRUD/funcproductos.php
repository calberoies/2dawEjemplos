<?php 

define ("PRODESTADOS",['A'=>'Activo','I'=>'Inactivo']);

function getproducto($id){
    global $db;
    $sql = "SELECT * from productos where id=".$db->escape_string($id);
    $result = mysqli_query($db, $sql) or die("Error en la sql ");
        
    $prod = mysqli_fetch_assoc($result);
    if(!$prod)
        die("Producto inexistente");
    return $prod;
}
function insertproducto($prod){
    global $db;
    $sql = sprintf("insert into productos (descripcion,precio,estado)
        values ('%s',%d,'%s')",
        $prod['descripcion'], $prod['precio'], $prod['estado']);

    return mysqli_query($db, $sql);
}

function updateproducto($id,$prod){
    global $db;

    $sql = sprintf("update productos set descripcion='%s',precio=%d,estado='%s' where id=%d",
        $prod['descripcion'], $prod['precio'], $prod['estado'],$id
    );

    return mysqli_query($db, $sql) ;
}

function deleteproducto($id){
    global $db;
    $sql = "delete from productos where id=".$id;
    return mysqli_query($db, $sql) ;
}