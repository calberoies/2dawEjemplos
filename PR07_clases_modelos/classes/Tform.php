<?php

class Tform {
    public $modelo;
    
    public function __construct($modelo){
        $this->modelo=$modelo;
    }
    
    /** Devuelve el name para un formulario de una propiedad
     * 
     * @param type $prop
     * @return string CLASE[prop]    Ej: de usuario->email    name="usuario[email]'
     */
    protected function getname($prop){
        return get_class($this->modelo).'['.$prop.']';
        
    }
    
    /** Muestra el error de una propiedad
     * 
     * @param string $propiedad
     */
    public function error($propiedad){
        if(isset($this->modelo->errores[$propiedad]))
            echo ' <span class=error>'.$this->modelo->errores[$propiedad].'</span>';

    }
    
    /** Muestra un campo tipo texto
     * 
     * @param string $propiedad
     * @param string $atributos  Atributos HTML
     */
    public function inputtext($propiedad,$atributos=''){
        $valor=$this->modelo->$propiedad;
    
        echo "<input name='".$this->getname($propiedad)."' value='$valor' $atributos>";
        $this->error($propiedad);
    }
    
    /** 
     * 
     * @param string $propiedad
     * @param string $atributos Atributos HTML
     * @param array $valores  Valores posibles, de la forma valor=>descripcion
     */
    public function dropdown($propiedad,$atributos='',$valores){
        $valor=$this->modelo->$propiedad;
    
        echo "<select name='".$this->getname($propiedad)."' $atributos>";
        echo '<option value="">Selecciona...</option>';
        foreach($valores as $clave=>$etiqueta) {
            $s=  ($clave===$valor) ? 'selected' :'';
            echo "<option value='$clave' $s>$etiqueta</option>";
        }
        echo '</select>';
        $this->error($propiedad);
    }
    
    
    
}
    
    

