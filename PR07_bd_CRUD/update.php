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
	$titulo=$_POST['Titulos'];

	if(strlen($titulo['titulo'])<2) {
		$errores['titulo']='Título incorrecto';
	}
	if(!$titulo['autor_id'] ){
		$errores['anyo']='Año incorrecto';
	}
	if(!is_numeric($titulo['anyo']) || ($titulo['anyo']<1800) ||($titulo['anyo']>date('Y')) ){
		$errores['anyo']='Año incorrecto';
	}
	
	if(!$errores){  //Datos correctos. Actualizamos
		$query=$db->prepare('update titulos set titulo=:titulo,anyo=:anyo,'
				. 'autor_id=:autor_id,categoria_id=:categoria_id where id=:id');
		$query->bindparam(':id',$id);
		foreach($titulo as $columna=>$valor)		
			$query->bindparam(':'.$columna,$titulo[$columna]);
		if(!$query->execute()) 
			dbdie($query);
		header('Location:view.php?id='.$id);
	}

}
//var_dump($titulo);die;
require 'views/form.php';
