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
    static $tagsOptions=['I'=>'Importante','E'=>'En inglés','C'=>'Compartida'];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entradas';
    }
    public function __toString() {
        return $this->texto;
    }

    function beforeSave($insert){
        $this->tags=json_encode($this->tags);
        return parent::beforeSave($insert);
    }
    function afterFind(){
        $this->tags=json_decode($this->tags,true);
        return parent::afterFind();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuarios_id', 'texto', 'categorias_id'], 'required'],
            [['usuarios_id', 'categorias_id'], 'integer'],
            [['fecha'], 'default','value'=>date('Y-m-d H:i:s')],
            [['tags'], 'safe'],
            [['texto', 'aprobada'], 'string'],
            [['aprobada'],'checkaprobada'],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['usuarios_id' => 'id']],
            [['categorias_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['categorias_id' => 'id']],
        ];
    }

    function getTagstext(){
        $ret='';
        if($this->tags) {
            foreach($this->tags as $tag)
                $ret.='<span class="badge badge-success">'.self::$tagsOptions[$tag].'</span>';
        }
        return $ret;

    }
    function getcanupdate(){
        return hasrole('A') || $this->usuarios_id==Yii::$app->user->id;
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
            'tags' => 'Etiquetas',
            'aprobada' => 'Aprobada',
            'aprobadaText' => 'Aprobada',
            'categorias_id' => 'Categoría',
        ];
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

