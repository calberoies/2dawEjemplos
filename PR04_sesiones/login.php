<?php
require "config.inc.php";
	
if($enSesion ) {
	header("Location:index.php");
} elseif (isset($_POST['usuario'])) { // valida usuario
	$user=$_POST['usuario'];
	$pass=$_POST['password'];
	
	if($datos=validausuario($user,$pass)){
		$_SESSION['usuario']=$datos; //Registra datos de sesión
		header("Location:index.php");
	} else 
		render("login_form",array("user"=>$user,"pass"=>$pass,"error"=>"Usuario inexistente"));
} else 
	render("login_form",array("user"=>"","pass"=>"","error"=>""));

	
