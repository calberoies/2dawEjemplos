<?php
/** Modificación del género de títulos.
 * Parámetros: 
 *   ids=array de códigos a modificar
 *   categoria_id=género nuevo
 */
require 'init.php';

if(!ensesion()) 
	termina('Identificación requerida');

if(!isset($_POST['ids']) || !$_POST['ids']) 
    setflash('No ha seleccionado títulos','index.php');
$ids=$_POST['ids'];

$categoria_id=postparam('categoria_id');
if(!$categoria_id)
    setflash('Selecciona categoría','index.php');

$metodo=2; //Cambiar por 2 para hacerlo de la forma alternativa

if($metodo==1){
    $query=$db->prepare('update titulos set categoria_id=:cat where id=:id');
    $query->bindparam(':cat',$categoria_id);
    $query->bindparam(':id',$id);
    foreach($ids as $id){
        if(!$query->execute()) 
            dbdie($query);

    }
}else {
    $listaids=implode(',',$ids);
    $query=$db->prepare("update titulos set categoria_id=:cat where id in ($listaids)");
    $query->bindparam(':cat',$categoria_id);
    if(!$query->execute()) 
        dbdie($db);
    
}    
setflash('Cambio correcto','index.php','success');
