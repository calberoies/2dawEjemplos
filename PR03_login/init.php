<?php
session_start(['cookie_lifetime' => 60*60*24*30]);

/** Devuelve el nombre de usuario logueado
 * 
 * @return string/boolean  Nombre del usuario, o false si no esta logueado
 */
function usuario(){
    if(isset($_SESSION['usuario']))
            return $_SESSION['usuario'];
    else
        return false;
}

/** Login de un usuario
 * 
 * @param type $usuario
 * @param type $pass
 * @return boolean  Si es correcto hace login y devuelve true . false si no es correcto
 */
function login($usuario,$pass){
    $usuarios=require 'usuarios.php';

    if(!isset($usuarios[$usuario]) || $usuarios[$usuario]['password']!=$pass)
        return false;
    else {
        $_SESSION['usuario']=['usuario'=>$usuario,
                                'nombre'=>$usuarios[$usuario]['nombre']
                            ];
        return true;
    }
    
}

function logout(){
    session_destroy();
}
