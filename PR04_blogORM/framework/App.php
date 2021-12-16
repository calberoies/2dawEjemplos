<?php 
class App {
    static $app; // Instancia de la App
    public $db;
    public $user;
    public $config;

    public static function start($config='config.php'){
        
        $app=new App;
        $app->config=require $config;
        $app->conectadb();
        $app->user=$_SESSION['user']??null;
        self::$app=$app;
        return $app;
    }

    public function run(){
        $ca=$_GET['r']??$this->config['default'];
        if($ca=='/') $ca=$this->config['default'];
        if(!strpos($ca,'/')) $ca.='/index';
        list($ctrl,$action)=explode('/',$ca);
        $ctlname=ucfirst($ctrl).'Controller';
        $ctl=new $ctlname;
        call_user_func_array([$ctl,'beforeAction'],[$action]);
        call_user_func([$ctl,'action'.$action]);
    }

    function conectadb(){
        if(!$this->db) {
            $db=$this->config['db'];
            try {
                $this->db = new PDO("mysql:host=$db[servername];dbname=$db[bdatos]", $db['username'], $db['password']);
                // set the PDO error mode to exception
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Error al conectar: " . $e->getMessage();
                die;
            }
        }
    }

    //Comprueba usuario y hace login si es ok
    function login($usuario, $password){
        $usuario=Usuarios::find(['usuario'=>$usuario,'password'=>md5($password)],'id,nombre');
        if($usuario) {
            $_SESSION['user']=$usuario;
            $this->user=$usuario;
        }
        return $usuario;
    }

    function logout(){
        session_destroy();
    }

}
