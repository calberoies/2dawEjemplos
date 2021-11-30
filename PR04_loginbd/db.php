<?php 

function conectadb(){
    static $db;
    if(!$db) {
        require 'config.php';
        try {
            $db = new PDO("mysql:host=$servername;dbname=$bdatos", $username, $password);
            // set the PDO error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error al conectar: " . $e->getMessage();
            die;
        }
    }
    return $db;
}

//Comprueba usuario . Devuelve sus datos si es ok, o false si 
// no existe o la contraseña no es correcta
function login($usuario, $password){
    $db=conectadb();
    $result=$db->prepare('select id,nombre 
        from usuarios 
        where usuario=:u and password=:p');
    $result->execute([':u'=>$usuario,':p'=>md5($password)]);
    $usuario=$result->fetch(PDO::FETCH_ASSOC);
    //Si no lo encuentra, $usuario es false
    if($usuario)
        $_SESSION['user']=$usuario;
    return $usuario;
}
function logout(){
    session_destroy();
}

function myid(){
    return $_SESSION['user']['id']??0;
}

function getentradas($where=''){
    $db=conectadb();
    $result=$db->query('select * from entradasx where '.$where);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}