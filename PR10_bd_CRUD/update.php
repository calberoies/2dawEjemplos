<?php
/** Modificación de títulos.
 * Parámetros: id=código a modificar
 */
require 'init.php';

if(!ensesion()) 
	termina('Identificación requerida');

$id=getparam('id');
$query = $db->prepare("SELECT * from titulos where id=:id");
$query->bindParam(':id',$id);
if(!$query->execute()) dbdie($query);

$titulo=$query->fetch();
if(!$titulo){
	termina('Título inexistente');
}

$errores=array();

//Si venimos del POST del formulario, recogemos datos y procesamos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$titulo['titulo']=$_POST['titulo'];
	if(strlen($titulo['titulo'])<2) {
		$errores['titulo']='Título incorrecto';
	}
	$titulo['autor_id']=$_POST['autor_id'];
	$anyo=$_POST['anyo'];
	if(!is_numeric($anyo) || ($anyo<1800) ||($anyo>date('Y')) ){
		$errores['anyo']='Año incorrecto';
	}
	$titulo['anyo']=$anyo;
	$titulo['categoria_id']=$_POST['categoria_id'];
	
	if(!$errores){  //Datos correctos. Actualizamos
		$query=$db->prepare('update titulos set titulo=:titulo,anyo=:anyo,'
				. 'autor_id=:autor_id,categoria_id=:categoria_id where id=:id');
		$query->bindparam(':id',$id);
		$query->bindparam(':titulo',$titulo['titulo']);
		$query->bindparam(':autor_id',$titulo['autor_id']);
		$query->bindparam(':categoria_id',$titulo['categoria_id']);
		$query->bindparam(':anyo',$anyo);
		if(!$query->execute()) 
			dbdie($query);
		header('Location:view.php?id='.$id);
	}

}
//var_dump($titulo);die;
require 'views/form.php';
