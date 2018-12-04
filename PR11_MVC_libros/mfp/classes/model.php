<?php
/** Clase base de modelos.
 * @author Cecilio Albero
 */
abstract class model {
	static $attributes;
	static $tablename; // Nombre de la tabla
	static $pkey='id'; // Primary key
	static $labels=array(); // Etiquetas de los atributos

	public $isNewRecord=true; // True si no existe en la BD
	public $errors; //Errores de validación

	protected $values; // Valores de los atributos

	public function __get($param){
		if($param=='db')
			return app::instance()->db;
		elseif(method_exists($this,'get'.$param))
			return call_user_func(array($this,'get'.$param));
		else {
			if($this->attr_exists($param)){
				if(isset($this->values[$param]))
					return $this->values[$param];
				else
					return null;
			}else
				app::instance()->controller->end('Propiedad no definida en  '.get_called_class().': '.$param);
		}
	}
	/** Devuelve true si existe el atributo que se le pasa
	 *
	 * @param type $attribute
	 */
	public function attr_exists($attribute){
		if(!isset(static::$attributes)) static::getmetadata();
		return isset(static::$attributes[$attribute]);
	}
	/** Devuelve el tipo del atributo que se le pasa
	 *
	 * @param type $attribute
	 */
	public function attr_type($attribute){
		if(!isset(static::$attributes)) static::getmetadata();
                //echo '<pre>';var_dump(static::$attributes);die;
		if(isset(static::$attributes[$attribute])){
                    return static::$attributes[$attribute]['Type'];
                }else
                    return null;
	}
        
	/** Añade un error a un atributo
	 *
	 * @param type $attribute
	 * @param type $error
	 */
	public function addError($attribute,$error){
		if(!isset($this->errors[$attribute]))
			$this->errors[$attribute]=array($error);
		else
			$this->errors[$attribute][]=array($error);
	}

	public function __set($param,$valor){
		$this->setvalue($param,$valor);
	}
        
        static function date_dbtostr($value){
            list($anyo,$mes,$dia)=explode('-',$value);
            return implode('/',array($dia,$mes,$anyo));
        }
        static function date_strtodb($value){
            list($dia,$mes,$anyo)=explode('/',$value);
            return implode('-',array($anyo,$mes,$dia));
        }
	/**
	 * Asigna valor a un atributo
	 * @param type $atributo
	 * @param type $valor
	 */
	public function setvalue($atributo,$valor,$fromdb=false){
		if(!$this->attr_exists($atributo))
			app::instance()->controller->end("No existe el atributo $atributo en ".get_called_class());
		elseif(!$fromdb || $this->attr_type($atributo)!='date')
                        $this->values[$atributo]=$valor;
                else // Es una fecha que viene de BD. La cambia de formato
                        $this->values[$atributo]=self::date_dbtostr($valor);
	}

	/** Asigna valores a los atributos del modelo
	 *
	 * @param type $values aray asociativo atributo=>valor
	 */
	public function setvalues($values,$fromdb=false){
		foreach($values as $param=>$value)
			$this->setvalue($param,$value,$fromdb);
	}
	/** Devuelve la etiqueta de un atributo
	 *
	 * @param type $atributo
	 * @return type string
	 */
	public function getlabel($atributo){
		if(isset(static::$labels[$atributo]))
			return static::$labels[$atributo];
		else
			return ucfirst($atributo);
	}


	/** Carga una fila de la tabla asociada accediendo por primary key
	 * y devuelve el objeto model asociado
	 *
	 * @param type $id
	 * @return boolean|\self
	 */
	static public function findByPk($id){
		return self::find(static::$pkey.'='.$id);
	}

	/** Carga una fila de la tabla asociada mediante un filtro sql y devuelve
	 * el objecto model asociado
	 *
	 * @param type $filter
	 */
	static public function find($filter){
		$sql='select * from '.static::$tablename.' where '.$filter;
		app::$instance->log($sql);
		$q=app::instance()->db->query($sql);
		if(!$q){
			$e=app::instance()->db->errorInfo();
			app::instance()->controller->end('Error en consulta '.$sql.' '.$e[2]);
		}
		$values=$q->fetch();
		if($values){
			$m=new static;
			$m->setvalues($values,true);
			$m->isNewRecord=false;
			return $m;
		} else
			return false;

	}

	/** Carga un conjunto de fila de la BD y devuelve una lista de objeto model asociado
	 * 
	 * @param type $filter
	 * @param type $order
	 * @param type $opts Opcional ('page'=>n,'pageSize'=>m)
	 * @return Array de instancias model
	 */

	static public function findAll($filter='',$order='',$opts=array()){
		$sql='select * from '.static::$tablename;
		if($filter) $sql.=' where '.$filter;
		if($order) $sql.=' order by '.$order;
		if(isset($opts['page'])){
			$page=$opts['page'];
			if(isset($opts['pageSize']))
				$pageSize=$opts['pageSize'];
			$sql.=sprintf(' LIMIT %d,%d',($page-1)*$pageSize,$pageSize);
		}
		app::$instance->log($sql);
		$q=app::instance()->db->query($sql);
		if(!$q) {
			$e=app::instance()->db->errorInfo();
			app::instance()->controller->end('Error en consulta '.$sql.' '.$e[2]);
		}
		$ret=array();
		foreach($q->fetchAll() as $values){
			$m=new static;
			$m->setvalues($values,true);
			$m->isNewRecord=false;
			$ret[]=$m;
		}
		return $ret;

	}

	/** Devuelve una lista keyfield=>valuefield. Se puede utilizar en desplegables
	 *
	 * @param type $keyfield Campo para utilizar como clave
	 * @param type $valuefield Campo a devolver como valor
	 * @param type $order
	 * @return type
	 */
	public static function findList($keyfield,$valuefield,$order=''){
		$ret=array();
		$pkey=static::$pkey;
		$sql="select $keyfield,$valuefield from ".static::$tablename;
		if($order) $sql.=' order by '.$order;
		app::$instance->log($sql);
		$ret=array();
		foreach(app::instance()->db->query($sql) as $values){
			$ret[$values[$keyfield]]=$values[$valuefield];
		}
		return $ret;
	}

	/** Valida el modelo
	 * @return boolean false si hay errores
	 */
	public function validate(){
		// Valida requeridos y númericos
		foreach(static::$attributes as $atributo=>$info){
			if($info['Extra']!='auto_increment'){
				if(!$this->$atributo){ // No tiene valor
					if($info['Null']=='NO'){ //requerido
						$this->addError($atributo,'Campo requerido');
					}
				} else {
					if(substr($info['Type'],0,3)=='int'){ //numérico
						if(!is_numeric($this->$atributo))
							$this->addError($atributo,'Debe ser un número');
					}
				}
			}
		}

		return !count($this->errors);
	}

	/** Salva el modelo en BD.Insert si es nuevo,  update si no lo es
	 *
	 * @return boolean
	 */
	public function save(){
		if(!static::$attributes) static::getmetadata();
		if(!$this->validate())
			return false;
		else {

			if($this->isNewRecord)
				$ret= $this->insert();
			else
				$ret= $this->update();
                        if(!$ret){ //Ha habido error de BD
                            $this->errors[self::$pkey]='Error de Base de Datos';
                        }
                        return $ret;
		}
	}
	/**
	 *
	 */
	protected function insert(){

		$cols='';
		$values='';
		foreach(static::$attributes as $atributo=>$info){
			if($info['Extra']!='auto_increment'){
				if($this->$atributo){ // TIene valor
					if($cols) $cols.=',';
					$cols.= $atributo;
					$values.= ($values?',':'').':'.$atributo;
                                        if($this->attr_type($atributo)=='date')
                                            $params[':'.$atributo]=self::date_strtodb($this->values[$atributo]);
                                        else
                                            $params[':'.$atributo]=$this->values[$atributo];
				}
			}
		}

		$sql='insert into '.static::$tablename.' ('.$cols.') values ('.$values.')';
		app::$instance->log($sql,$params);
		$ret= $this->db->prepare($sql)->execute($params);
		$this->setvalue('id',$this->db->lastInsertId());
		return $ret;
	}
	/**
	 *
	 */
	protected function update(){
		$cols='';
		foreach(static::$attributes as $atributo=>$info){

			if($info['Extra']!='auto_increment'){
				if($this->$atributo){ // TIene valor
					if($cols) $cols.=',';
					$cols.=$atributo.'=:'.$atributo;
					$params[':'.$atributo]=$this->values[$atributo];
				}
			}
		}
		$pkey=static::$pkey;
		$sql='update '.static::$tablename.' set '.$cols. ' where '.$pkey.'=:id';
		$params[':id']=$this->$pkey;
		app::$instance->log($sql,$params);
		return $this->db->prepare($sql)->execute($params);
	}

	/** Borra el modelo
	 *
	 * @return boolean
	 */
	public function delete(){
		if($this->isNewRecord) return false;
		$pkey=static::$pkey;
		$sql='delete from '.static::$tablename.
				' where '.static::$pkey.'='.$this->$pkey;
		app::$instance->log($sql);
		$q=app::instance()->db->exec($sql);
		return $q;
	}
	/** Carga información de las columnas de la tabla
	 *
	 */
	static protected function getmetadata(){
		app::$instance->log("DESCRIBE ".static::$tablename);
		$attributes=app::instance()->db->query("DESCRIBE ".static::$tablename)->fetchAll(PDO::FETCH_ASSOC);
		foreach($attributes as $at)
			static::$attributes[$at['Field']]=$at;
                

	}

}