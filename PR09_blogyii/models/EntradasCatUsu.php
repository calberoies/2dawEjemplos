<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entradas_cat_usu".
 *
 * @property int $id
 * @property string $fecha_hora
 * @property string|null $texto
 * @property int|null $aceptado
 * @property int $categorias_id
 * @property int $usuarios_id
 * @property string $descripcion_categoria
 * @property string $nombre
 */
class EntradasCatUsu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entradas_cat_usu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'aceptado', 'categorias_id', 'usuarios_id'], 'integer'],
            [['fecha_hora', 'categorias_id', 'usuarios_id', 'descripcion_categoria', 'nombre'], 'required'],
            [['fecha_hora'], 'safe'],
            [['texto'], 'string'],
            [['descripcion_categoria'], 'string', 'max' => 20],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha_hora' => Yii::t('app', 'Fecha Hora'),
            'texto' => Yii::t('app', 'Texto'),
            'aceptado' => Yii::t('app', 'Aceptado'),
            'categorias_id' => Yii::t('app', 'Categorias ID'),
            'usuarios_id' => Yii::t('app', 'Usuarios ID'),
            'descripcion_categoria' => Yii::t('app', 'Descripcion Categoria'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }
}
