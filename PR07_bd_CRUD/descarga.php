<?php 
/**  Transacciones
 * 
* Anota una descarga
*
* Recibe : 
*   id  : id del ebook a descargar
* Crea un registro en descargas y suma uno al contador de descargas del titulo del ebook
*/

require 'init.php';

$id=$_GET['id']??null;

try {
    $db->beginTransaction();
    $qebook= $db->prepare("SELECT * FROM ebooks where id=:id");
    $qebook->execute([':id'=>$id]);
    $ebook=$qebook->fetch();
    $fecha=date('Y-m-d');
    $usuarioid=10; //TODO Asignar el usuario activo en sesión
    $db->exec('update titulos set descargas=descargas+1 where id='.$ebook['titulos_id']);
    $db->exec("insert into descargas (ebooks_id,usuarios_id,fecha) values ($id,$usuarioid,'$fecha')");
    $db->commit();
    setflash('Descarga correcta',"view.php?id=$ebook[titulos_id]",'success');
} catch (Exception $e){
    $db->rollback();
    die("Error al actualizar: <br>".$e->getMessage());
}

?>