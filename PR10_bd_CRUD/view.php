<?php
/** Detalle  de un título
 * Parámetros: id=código a mostrar
 */
require 'init.php';

$id=getparam('id');

$sql = "SELECT t.*,a.nombre autor,c.nombre categoria
	from titulos t,autores a,categorias c
	where t.id=:id and a.id=autor_id and c.id=categoria_id";

$query = $db->prepare($sql);
$query->bindParam(':id',$id);
if(!$query->execute()) dbdie($query);


$titulo=$query->fetch();
//Cargamos formatos del título (tabla ebooks)
$formatos=$db->query("SELECT format from ebooks where titulos_id=$id")->fetchAll(PDO::FETCH_COLUMN);

require 'views/view.php';
