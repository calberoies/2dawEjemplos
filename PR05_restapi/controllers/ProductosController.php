<?php 
namespace app\controllers;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
 
class ProductosController extends ActiveController
{
    public $modelClass = 'app\models\Productos';
 
    public function behaviors() {
       $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
          'class' => HttpBearerAuth::className(),
          //'except' => ['index'],
       ];
       return $behaviors;
    }
}