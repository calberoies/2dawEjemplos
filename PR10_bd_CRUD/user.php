<?php
/** Login y logout de usuarios
 * Parámetro:
 * a: login o logout
 *		Si es login, usuario y password han de enviarse por POST
 */
require 'init.php';
$accion=getparam('a');
switch($accion){
	case 'logout':
		session_destroy();
		header('Location:index.php');
	case 'login':
		$usuario=postparam('usuario');
		$password=md5(postparam('password'));
		$query=$db->prepare('select id,usuario,nombre,estado from usuarios where usuario=:usuario and password=:password');
		$query->bindparam(':usuario',$usuario);
		$query->bindparam(':password',$password);
		$query->execute();
		$datosusuario=$query->fetch();
		if($datosusuario){
			if($datosusuario['estado']!='A'){
				termina('Usuario inactivo');
			} else {
				$_SESSION['usuario']=$datosusuario;
				header('Location:index.php');
			}
		} else{
			termina('Usuario o contraseña incorrectos');

		}
}
