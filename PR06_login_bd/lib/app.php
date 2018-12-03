<?php 
class app {
    private static $_app;
    private  $_db;   // Conexión a la BD
    private $config; //Configuración de la aplicación

    function setconfig($config){
        $this->config=$config;
    }

    static function instance(){
        if(!isset(self::$_app))
            self::$_app=new app();
        return self::$_app;
    }

    public function __get($dato){
        switch ($dato){
            case 'db';
                return $this->db();
            case 'usuario':
                if(isset($_SESSION['usuario']))
                    return $_SESSION['usuario'];
                else
                    return null;
        }
        
        throw new Exception ("Dato inexistente en app: $dato");
    }

    /** Devuelve el objeto PDO de conexión a la BD (singleton)
     * 
     */
    public function db(){
        if(!isset($this->_db)) {
            $c=$this->config;
            
            $this->_db=new PDO("mysql:host=$c[host];dbname=$c[dbname];charset=UTF8",$c['user'],$c['password']);
        }
        return $this->_db;
    }

    /** Login de un usuario
     * 
     * @param type $usuario
     * @param type $pass
     * @return boolean  Si es correcto hace login y devuelve true . false si no es correcto
     */
    function login($usuario,$pass){
       // Método 1:
       // $usuario = self::db()->quote($usuario);
       // $user=self::db()->query("select * from usuarios where usuario=$usuario")->fetch(PDO::FETCH_OBJ);

       // Método 2:      
       $stmt=self::db()->prepare("select * from usuarios where usuario=:usuario");
       $stmt->bindParam(':usuario',$usuario);
       $stmt->execute();
       $user=$stmt->fetch(PDO::FETCH_OBJ);

       if(!$user || $user->password!=md5($pass))
           return false;
       else {
           $_SESSION['usuario']=$user;
           return true;
       }
        
    }

    /** logout
     * 
     */
    function logout(){
        session_destroy();
    }

    /** 
     * Muestra una vista, pasándole datos
     */
    function render($vista,$datos=[]){
        extract($datos); //Crea variables con el array de datos que se le pasa
        ob_start(); //Capturamos buffer
        require "views/$vista.php";
        $content=ob_get_clean(); //Capturamos buffer
        require 'views/layout.php';

    }

}