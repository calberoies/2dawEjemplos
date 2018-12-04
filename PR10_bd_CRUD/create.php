<?php
/** Alta de títulos.
 * 
 */
require 'init.php';

if(!ensesion()) 
	termina('Identificación requerida');

//Asignamos los valores por defecto de los campos. (Para simplificar, estado, portada, fecha,coleccion, etc.. no se han incluido en los formularios
$titulo=array('titulo'=>'','autor_id'=>'','categoria_id'=>'','anyo'=>'');

$errores=array();

//Si venimos del POST del formulario, recogemos datos y procesamos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$xtitulo['titulo']=$_POST['titulo'];
	if(strlen($xtitulo['titulo'])<2) {
		$errores['titulo']='Título incorrecto';
	}
	$xtitulo['autor_id']=$_POST['autor_id'];
	$anyo=$_POST['anyo'];
	if(!is_numeric($anyo) || ($anyo<1800) ||($anyo>date('Y')) ){
		$errores['anyo']='Año incorrecto';
	}
	$xtitulo['anyo']=$anyo;
	$xtitulo['categoria_id']=$_POST['categoria_id'];
	
	if(!$errores){  //Datos correctos. Actualizamos
		$query=$db->prepare('insert into titulos (titulo,anyo,autor_id,categoria_id,usuarios_id'
				. 'estado,portada,descargas,calificacion) '
				. 'values(:titulo,:anyo,:autor_id,:categoria_id,:usuarios_id'
				. '"A","N",0,0)');
		$query->bindparam(':titulo',$xtitulo['titulo']);
		$query->bindparam(':autor_id',$xtitulo['autor_id']);
		$query->bindparam(':categoria_id',$xtitulo['categoria_id']);
		$query->bindparam(':usuarios_id',$_SESSION['usuario']['id']); //Usuario logueado
		$query->bindparam(':anyo',$anyo);
		if(!$query->execute()) 
			dbdie($query);
		$id=$db->lastInsertId(); //Recogemos la id del titulo creado
		header('Location:view.php?id='.$id);
	}

}

require 'views/form.php';
