<?php
/** Clase base de controlador. Los controladores de la aplicacion derivan de esta
 * @author Cecilio Albero
 */
class controller {
	public $action; //Acción a ejecutar
	public $title=''; //Título a mostrar en la cabecera de la vista

	function __get($param){
		if($param=='db')
			return app::instance()->db;
		else
			$this->end("Dato inexistente en ".get_called_class().': '.$param);
	}

	/** Ejecuta una acción
	 *
	 * @param type $action
	 * @param type $params Array asociativo con los parómetros de la acción
	 */
	public function execute($action,$params){
		$this->action=$action;
		$method='action'.$action;
		if(method_exists($this,$method)) {
			//Examina los parámetros de la acción y los asigna de $params
			$rmethod=new ReflectionMethod($this, $method);
			if($rmethod->getNumberOfParameters()>0) {
				$ps=[];
				foreach($rmethod->getParameters() as $i=>$param) {
					$name=$param->getName();
					if(isset($params[$name]))
						$ps[]=$params[$name];
					elseif($param->isDefaultValueAvailable())
						$ps[]=$param->getDefaultValue();
					else
						$this->end('Ejecución de acción incorrecta : Falta parómetro '.$name);
				}
				return $rmethod->invokeArgs($this,$ps);
			} else
			   return $this->$method();

		} else
			$this->end("No existe la acción ".$action." del controlador ".get_called_class());
	}

	/**
	 *
	 * @param type $view
	 * @param type $params
	 */
	public function render($view,$params=[]) {
		ob_start();
		extract($params);
		app::$instance->log("render: $view . Params: ". implode(' ',array_keys($params)));
		require "views/$view.php";
		$content=  ob_get_clean();
		// La variable contenido tiene todo el html del cuerpo de la pógina
		require "views/layout.php";
	}

	function redirect($action,$params=[]){
		$url="?r=$action";
		foreach($params as $p=>$v){
			$xparams.='&'.$p.'='.$v;
		}
		header('Location:'.$url);

	}

	function end($mensaje){
		$this->render('site/error',['mensaje'=>$mensaje]);
		die();
	}

}
