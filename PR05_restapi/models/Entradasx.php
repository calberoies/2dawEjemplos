<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entradasx".
 *
 * @property int $id
 * @property int $usuarios_id
 * @property string $fecha
 * @property string $texto
 * @property string $aprobada
 * @property int $categorias_id
 * @property string $nombre_usuario
 * @property string $nombre_cat
 */
class Entradasx extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entradasx';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'usuarios_id', 'categorias_id'], 'integer'],
            [['usuarios_id', 'fecha', 'texto', 'categorias_id', 'nombre_usuario', 'nombre_cat'], 'required'],
            [['fecha'], 'safe'],
            [['texto', 'aprobada'], 'string'],
            [['nombre_usuario', 'nombre_cat'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuarios_id' => 'Usuarios ID',
            'fecha' => 'Fecha',
            'texto' => 'Texto',
            'aprobada' => 'Aprobada',
            'categorias_id' => 'Categorias ID',
            'nombre_usuario' => 'Nombre Usuario',
            'nombre_cat' => 'Nombre Cat',
        ];
    }
}
