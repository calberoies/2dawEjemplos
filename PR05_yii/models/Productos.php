<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property string $descripcion
 * @property string $imagen
 * @property float $precio
 * @property string $activo
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'imagen', 'precio', 'activo'], 'required'],
            [['precio'], 'number'],
            [['descripcion'], 'string', 'max' => 40],
            [['imagen'], 'string', 'max' => 20],
            [['activo'], 'string', 'max' => 1],
        ];
    }

    function getimg64(){
        if(!file_exists('images/'.$this->imagen))
            return '';
        $imagen=file_get_contents('images/'.$this->imagen);
        return "data:image/jpeg;base64,".base64_encode($imagen);
    }
    function getimgpath(){
        return 'images/'.$this->imagen;

    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'precio' => 'Precio',
            'activo' => 'Activo',
        ];
    }
}
