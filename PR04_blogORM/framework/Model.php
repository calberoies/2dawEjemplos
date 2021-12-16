<?php 

class Model {

    public static $tablename='';
    private $_errors=[];

    public function __get($prop){
        if(method_exists($this,'get'.$prop))
            return call_user_func([$this,'get'.$prop]);
        else 
            throw new Exception('No existe '.$prop.' en la clase '.static::class);
    }

    function setvalues($values){
        foreach($values as $field=>$value)
            $this->$field=$value;
    }
    function checkrequired($fields){
        foreach($fields as $field){
            if(!$this->$field)
                $this->addError($field,'Campo requerido');
        }
    }
    public function addError($field,$error){
        $this->_errors[$field]=$error;
    }
    public function getErrors(){
        return $this->_errors;
    }


    //Devuelve un conjunto de registros
    public static function findAll($where='1=1',$cols='*') {
        if(is_array($where)) {
            $cond='';
            foreach($where as $dato=>$valor){
                $params[':'.$dato]=$valor;
                $cond.=($cond?' and ':'').$dato.'=:'.$dato;
            }
            $where=$cond;
        } else 
            $params=[];
        $sql="select $cols from ".static::$tablename." where ".$where;
        //var_dump($params);echo "select $cols from ".static::$tablename." where ".$where;
        $result=App::$app->db->prepare($sql);
        $result->execute($params);
        return $result->fetchAll(PDO::FETCH_CLASS,static::class);
    }

    //Acceso por primary key
    public static function findOne($id,$cols='*'){
        return self::find(["id"=>$id],$cols);
    }

    //Devuelve el primer registro de una select
    public static function find($where='',$cols='*') {
        if(!$ret=self::findAll($where,$cols))
            return false;
        else 
            return $ret[0];
    }


    // Valida y guarda el modelo
    public function save(){
        if(!$this->validate())
            return false;
        else
            if(!$this->id)
                return $this->insert();
            else 
                return $this->update();
    }
    //Valida el modelo
    public function validate(){
        return !$this->_errors;
    }

    private function getparams(&$fields,&$params){
        foreach($this as $campo=>$valor){
            if($campo!='id' && $campo[0]!='_') {
                $params[":".$campo]=$valor;
                $fields[]=$campo;
            }
        }
    }

    public function insert(){
        $fields=[];
        $params=[];
        $this->getparams($fields,$params);
        
        $sql='insert into '.static::$tablename.' ('.implode(',',$fields).')';
        $sql.=' values ('.implode(',',array_keys($params)).')';
        //echo $sql;die;
        $query=App::$app->db->prepare($sql);
        return $query->execute($params);
    }

    public function update(){
        $fields=[];
        $params=[];
        $this->getparams($fields,$params);
        
        $sql='update '.static::$tablename.' set ';
        foreach($fields as $i=>$field){
            if($i) $sql.=', ';
            $sql.="$field=:$field";
        } 
        $sql.=' where id=:id';
        $params[':id']=$this->id;
        //echo $sql;die;
        $query=App::$app->db->prepare($sql);
        var_dump($params);
        return $query->execute($params);
    }

    public function delete(){
        return App::$app->db->query("delete from ".static::$tablename.
            " where id=".$this->id)->execute();
    }
} 
