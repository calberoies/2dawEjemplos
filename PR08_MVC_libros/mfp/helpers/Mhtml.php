<?php

/** Helpers de vistas
 * @author Cecilio Albero
 */
class Mhtml {


	/** Devuelve el atributo name de un campo de formulario
	 *
	 * @param type $model
	 * @param type $attribute
	 * @return type string   Nombredelaclase[atributo]
	 */
	public static function inputname($model,$attribute){
		return get_class($model).'['.$attribute.']';
	}
	/**
	 * Genera la etiqueta para un campo de formulario
	 * @param type $model
	 * @param type $attribute
	 * @param type $type  text,checkbox,radio
	 */
	public static function label($model,$attribute){
            printf('<label>%s</label>',$model->getlabel($attribute));
	}
        
	/**
	 * Genera un campo tipo text, checkbox o radio en un formulario
	 * @param type $model
	 * @param type $attribute
	 * @param type $type  text,checkbox,radio
	 */
	public static function textfield($model,$attribute,$type='text',$options=''){
		$tam=$options['cols'] ?? 4;
		echo "<div class=col-md-$tam>";
		printf('<label>%s</label> <input type=%s class=form-control name="%s" value="%s" $options>',
				$model->getlabel($attribute),$type,self::inputname($model,$attribute),$model->$attribute);
		if(isset($model->errors[$attribute]))
			printf('<div class=fielderror>%s</div>',implode('<br>',$model->errors[$attribute]));
		echo '</div>';
	}


	/** Crea un desplegable
	 *
	 * @param type $model
	 * @param type $attribute
	 * @param type $lista Lista de valores
	 */
	static function dropdownlist($model,$attribute,$lista,$options=''){
		$tam=$options['cols'] ?? 4;
		echo "<div class=col-md-$tam>";
		printf('<label>%s</label>',$model->getlabel($attribute));
		$name=self::inputname($model,$attribute);
		echo "<select class=form-control name='$name' >";
		echo "<option value=''>(Seleccione)</option>";
		foreach($lista as $valor=>$descri){
			//$selected=$valor==$valorselecc ? "selected" :"";
			if($valor==$model->$attribute)
				$selected="selected";
			else
				$selected="";

			echo "<option $selected value='$valor'>$descri</option>";
		}
		echo "</select>";
		if(isset($model->errors[$attribute]))
			printf('<div class=fielderror>%s</div>',implode('<br>',$model->errors[$attribute]));

		echo "</div>";

	}
        /**
         * Genera una tabla con una lista de datos de un modelo
         * @param type $model
         * @param type $attributes
         */
	static function verticalview($model,$attributes){
		echo "<table class=vview border=0>";
		foreach($attributes as $a){
			echo "<tr><th>".$model->getlabel($a)."</th><td>".$model->$a."</td></tr>";
		}
		echo "</table>";
	}
        /**
         * Devuelve un enlace a una acción
         * @param type $action Acción de la forma controlador/acción
         * @param type $label Etiqueta a mostrar
         * @param type $params parámetros a pasar a la acción
         * @param type $class Estilo css
         */
	static function actionlink($action,$label,$params=[],$class='btn btn-sm btn-primary'){
		if($class) echo "<button class='button $class'>";
                echo "<a style='color:white' href='?r=$action";
		if($params)
			foreach($params as $p=>$v) echo "&$p=$v";
		echo "'>$label</a>";
                if($class) echo '</button>';
	}
	
	/**
	 * Muestra un navegador de páginas
	 * @param type $limit array page=>n,pageSize=>m
	 */
	static function navegador($limit,$count){
		$url='?'.$_SERVER['QUERY_STRING']; //Parámetros de ejcución. 
		$url=preg_replace('/page=[\d]+/','',$url); //Le quita page=n
		
		$page=$limit['page'];
		$pageSize=$limit['pageSize'];
		echo '<div class=nav> Mostrando ';
		$ini= ($page-1)*$pageSize+1;
		printf( "%d/%d ",$ini,$ini+$count-1);
		if($page>1) 
			printf( "<a href='%s&page=%d'> &lt; </a> ",$url,$page-1);
		if($count==$pageSize) 
			printf( "<a href='%s&page=%d'> &gt; </a>",$url,$page+1);
		echo '</div>';
	}

}