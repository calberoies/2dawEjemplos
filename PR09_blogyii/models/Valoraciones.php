<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "valoraciones".
 *
 * @property int $id
 * @property int $entradas_id
 * @property int $autores_id
 * @property int|null $puntuacion
 *
 * @property Entradas $entradas
 * @property Usuarios $autores
 */
class Valoraciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'valoraciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entradas_id', 'autores_id'], 'required'],
            [['entradas_id', 'autores_id', 'puntuacion'], 'integer'],
            [['entradas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entradas::className(), 'targetAttribute' => ['entradas_id' => 'id']],
            [['autores_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['autores_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'entradas_id' => Yii::t('app', 'Entradas ID'),
            'autores_id' => Yii::t('app', 'Autores ID'),
            'puntuacion' => Yii::t('app', 'Puntuacion'),
        ];
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasOne(Entradas::className(), ['id' => 'entradas_id']);
    }

    /**
     * Gets query for [[Autores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutores()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'autores_id']);
    }
}
