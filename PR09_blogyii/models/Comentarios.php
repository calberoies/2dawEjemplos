<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property int $id
 * @property string|null $fecha_hora
 * @property string|null $texto
 * @property int|null $usuarios_id
 * @property int|null $aceptado
 * @property int $entradas_id
 *
 * @property Usuarios $usuarios
 * @property Entradas $entradas
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
            [['fecha_hora'], 'safe'],
            [['texto'], 'string'],
            [['usuarios_id', 'aceptado', 'entradas_id'], 'integer'],
            [['entradas_id'], 'required'],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
            [['entradas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entradas::className(), 'targetAttribute' => ['entradas_id' => 'id']],
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
            'usuarios_id' => Yii::t('app', 'Usuarios ID'),
            'aceptado' => Yii::t('app', 'Aceptado'),
            'entradas_id' => Yii::t('app', 'Entradas ID'),
        ];
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

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntrada()
    {
        return $this->hasOne(Entradas::className(), ['id' => 'entradas_id']);
    }
}
