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
		$titulo['usuarios_id']=$_SESSION['usuario']['id']; //Usuario logueado
		$titulo['fecha']=date('Y-m-d');
		$query=$db->prepare('insert into titulos (titulo,anyo,autor_id,categoria_id,usuarios_id,fecha,'
				. 'estado,portada,descargas,calificacion) '	
				. 'values(:titulo,:anyo,:autor_id,:categoria_id,:usuarios_id,:fecha,'
				. '"A","N",0,0)');
		foreach($titulo as $columna=>$valor)		
			$query->bindparam(':'.$columna,$titulo[$columna]);

		if(!$query->execute()) 
			dbdie($query);
		$id=$db->lastInsertId(); //Recogemos la id del titulo creado
		header('Location:view.php?id='.$id);
	}

}

require 'views/form.php';
