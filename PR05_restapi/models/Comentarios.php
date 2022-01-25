<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property int $id
 * @property int $entradas_id
 * @property string $fecha
 * @property int $usuarios_id
 * @property string $texto
 * @property string|null $aprobado
 *
 * @property Entradas $entradas
 * @property Usuarios $usuarios
 */
class Comentarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entradas_id', 'fecha', 'usuarios_id', 'texto'], 'required'],
            [['entradas_id', 'usuarios_id'], 'integer'],
            [['fecha'], 'safe'],
            [['texto'], 'string'],
            [['aprobado'], 'string', 'max' => 1],
            [['entradas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entradas::className(), 'targetAttribute' => ['entradas_id' => 'id']],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entradas_id' => 'Entradas ID',
            'fecha' => 'Fecha',
            'usuarios_id' => 'Usuarios ID',
            'texto' => 'Texto',
            'aprobado' => 'Aprobado',
        ];
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntrada()
    {
        return $this->hasOne(Entradas::className(), ['id' => 'entradas_id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
    }
}
