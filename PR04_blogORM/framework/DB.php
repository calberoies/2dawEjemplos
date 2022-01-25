<?php 
class DB {
    public $db;

    function __construct(){
        require '../config.php';
        try {
            self::$db = new PDO("mysql:host=$servername;dbname=$bdatos", $username, $password);
            // set the PDO error mode to exception
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error al conectar: " . $e->getMessage();
            die;
        }
    }

    function select($table,$where='1=1',$params=[]) {
        $sql="select * from $table where $where";
        $result=$this->db->prepare($sql);
        $this->db->query($result,$params)->fetchAll();
    }
}