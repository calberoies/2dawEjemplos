<?php 
class model {

    public static $tablename='';
    public $db;

    public function __construct(){
        $this->db=conectadb();
    }
    public function db(){
        return conectadb
    }

    public static function findOne($id){
        $result=$this->db->query("select * from ".static::$tablename." where id=".$thisdb->quote($id));
        return $result->fetch(PDO::FETCH_CLASS,self);
    }

    public static function findAll($where='1=1') {
        $result=$this->db->query("select * from ".static::$tablename." where ".$where);
        return $result->fetchAll(PDO::FETCH_CLASS,static);
    }


    public function save(){

    }
} 
