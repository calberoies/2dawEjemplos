<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entradas".
 *
 * @property int $id
 * @property int $usuarios_id
 * @property string $fecha
 * @property string $texto
 * @property string $aprobada
 * @property int $categorias_id
 *
 * @property Categorias $categorias
 * @property Usuarios $usuarios
 */
class Entradas extends \yii\db\ActiveRecord
{
    static $aprobadaOptions=['P'=>'Pendiente','A'=>'Aprobada'];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entradas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuarios_id', 'fecha', 'texto', 'categorias_id'], 'required'],
            [['usuarios_id', 'categorias_id'], 'integer'],
            [['fecha'], 'safe'],
            //[['fecha'], 'defaultvalue'=>date('Y-m-d H:i:s')],
            [['texto', 'aprobada'], 'string'],
            [['aprobada'],'checkaprobada'],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['usuarios_id' => 'id']],
            [['categorias_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['categorias_id' => 'id']],
        ];
    }
    
    function checkaprobada(){
        //var_dump($this->getOldAttribute('aprobada'));die;
        if($this->getOldAttribute('aprobada')=='A'  && $this->aprobada!='A'){
            $this->addError('aprobada','Una entrada aprobada no puede pasar a pendiente');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuarios_id' => 'Usuario',
            'fecha' => 'Fecha',
            'texto' => 'Texto',
            'aprobada' => 'Aprobada',
            'categorias_id' => 'Categoría',
        ];
    }

    public function beforeSave($ins){
        return parent::beforeSave($ins);
    }

    public function getAprobadaText(){
        return self::$aprobadaOptions[$this->aprobada]; //?? $this->aprobada;
    }

    /**
     * Gets query for [[Categorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::class, ['id' => 'categorias_id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::class, ['id' => 'usuarios_id']);
    }
}
