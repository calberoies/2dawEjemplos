<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property int $id
 * @property string|null $html
 * @property string|null $url
 * @property int|null $vistas
 * @property int|null $clics
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['html'], 'string'],
            [['vistas', 'clics'], 'integer'],
            [['url'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'html' => Yii::t('app', 'Html'),
            'url' => Yii::t('app', 'Url'),
            'vistas' => Yii::t('app', 'Vistas'),
            'clics' => Yii::t('app', 'Clics'),
        ];
    }
}
