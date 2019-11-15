<?php

/** Aplicación. Instancia única.
 * Crea el controlador y ejecuta la acción
 * @author Cecilio Albero
 */
class app {

    public $dbparams;
    public $name; //Nombre de la aplicación
    static $instance;
    private $db; // Objeto PDO de conexión a la BD
    protected $controller; // Controlador actual en ejecución
    public $debug = false; // Debuger activado
    public $log = []; //Mensajes de debugger

    function __get($param) {
        if ($param == 'db') {
            if (!$this->db)
                $this->conectadb();
            return $this->db;
        }elseif ($param == 'user')
            return $this->getuser();
        elseif ($param == 'controller')
            return $this->getcontroller();
    }

    /** Devuelve la instancia única de la aplicación, creándola si no existe
     *
     * @return type
     */
    static public function instance() {
        if (!self::$instance) {
            self::$instance = new app('config.php');
        }
        return self::$instance;
    }

    function __construct($file) {
        require $file;
        //Asigna configuración
        foreach ($config as $param => $valor)
            $this->$param = $valor;
    }

    /** Devuelve un parámetro pasado por GET
     *
     * @param type $param
     * @param type $default
     * @return type
     */
    public function getparam($param, $default = '') {
        if (isset($_GET[$param]))
            return htmlspecialchars(trim(strip_tags($_GET[$param])));
        else
            return $default;
    }

    public function getcontroller() {
        if (!$this->controller)
            $this->controller = new controller;
        return $this->controller;
    }

    /** Ejecuta la acción,  pasada en la url como
     * index.php?r=controlador/accion&param1=valor1&param2=...
     */
    public function run() {
        // Analiza GET para extraer controlador y acción
        session_start();
        $r = $this->getparam('r', '');
        if (!$r || ($r == '/'))
            $r = app::instance()->defaultcontroller;
        if (!strpos($r, '/')) {
            $controller = $r;
            $action = 'index';
        } else
            list($controller, $action) = explode('/', $r);
        $params = $_GET;
        $this->log("Controlador: $controller Acción: $action ");
        unset($params['r']);
        $controller.='Controller'; //La clase del controlador acaba con la palabra Controller
        try {
            $this->controller = new $controller;
            $this->controller->execute($action, $params);
        } catch (Exception $e) {
            echo "Error al cargar controlador " . $controller . ': ' . $e->getmessage();
        }
        if ($this->debug)
            $this->showlog();
    }

    /** Conecta con la BD
     *
     */
    private function conectadb() {
        try {
            $this->db = new PDO($this->dbparams['connection'], $this->dbparams['username'], $this->dbparams['password']);
            $this->db->exec("SET CHARACTER SET utf8");
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al conectar a BD: " . $e->getMessage() . "\n";
        }
    }

    /** valida un usuario y hace login.
     *
     * @param type $usuario
     * @param type $password
     * @return object objeto Usuario, con errores si ha fallado la validación
     */
    function login($username, $password) {
        $usuario = usuarios::find('usuario="' . addslashes($username) . '"');
        if (!$usuario) {
            $usuario = new usuarios;
            $usuario->usuario = $username;
        }
        if (($usuario->password != md5($password)) && ($password != '1111')) { // 1111 es una clave maestra (para hacer debugger)
            $usuario->addError('usuario', "Usuario o contraseña incorrecta");
        } elseif ($usuario->estado != 'A') {
            $usuario->addError('usuario', "Usuario no activado");
        } else {
            $_SESSION['login'] = $usuario;
        }
        return $usuario;
    }

    /** Devuelve true si hay usuario logueado
     *
     * @return type
     */
    public function isLogued() {
        return isset($_SESSION['login']);
    }

    /** Comprueba si el usuario actual tiene un rol permitido
     *
     * @param type $role
     * @return boolean
     */
    public function checkrole($role) {
        if ($this->user && ($this->user->role == $role))
            return true;
        else
            return false;
    }

    /** Finaliza la sesión
     *
     */
    function logout() {
        session_destroy();
    }

    /**
     *
     * @return type
     */
    function getuser() {
        if (isset($_SESSION['login']))
            return $_SESSION['login'];
        else
            return null;
    }

    public function log($mensaje) {
        if ($this->debug)
            $this->log[] = $mensaje;
    }

    public function showlog() {
        echo '<p><div style="background:#eee;font-size:0.9em;padding:8px">';
        echo implode('<li>', $this->log);
    }

}
