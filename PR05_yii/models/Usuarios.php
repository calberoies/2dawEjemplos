<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $usuario
 * @property string $password
 * @property string $estado
 *
 * @property Entradas[] $entradas
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'usuario', 'password', 'estado'], 'required'],
            [['estado'], 'string'],
            [['nombre'], 'string', 'max' => 60],
            [['usuario'], 'string', 'max' => 16],
            [['password'], 'string', 'max' => 32],
            [['usuario'], 'unique'],
        ];
    }
    
    function hasRole($role){
        return $this->rol==$role;
        //return in_array($this->roles,$role);  Si es un array de roles
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'usuario' => 'Usuario',
            'password' => 'Password',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entradasclass, ['usuarios_id' => 'id']);
    }


  public static function findByUsername($username) {
	return static::findOne(['usuario' => $username]);
  }
 
  public static function findIdentity($id) {
     return static::findOne($id);
  }
 
  public function getId() {
      return $this->id;
  }
 
  public function getAuthKey() { }
 
  public function validateAuthKey($authKey) { }
  public static function findIdentityByAccessToken($token, $type = null) {}  
 
  // Comprueba que el password que se le pasa es correcto
  public function validatePassword($password) {
       return $this->password === md5($password); // Si se utiliza otra función de encriptación distinta a md5, habrá que cambiar esta línea
  }
}
