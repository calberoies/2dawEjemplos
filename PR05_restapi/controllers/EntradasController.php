<?php 
namespace app\controllers;
use Yii;
use app\models\Entradas;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\auth\HttpBearerAuth;
 
class EntradasController extends ActiveController
{
    public $modelClass = 'app\models\Entradas';
    
    public function actions() {
        $actions = parent::actions();
        //Eliminamos acciones de crear y eliminar entradas. Eliminamos update para personalizarla
        unset($actions['delete'], $actions['create'],$actions['update']);
        // Redefinimos el método que prepara los datos en el index
        //$actions['index']['prepareDataProvider'] = [$this, 'indexProvider'];
        return $actions;
    }

    public function behaviors() {
       $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
          'class' => HttpBearerAuth::className(),
          //'except' => ['index'],
       ];
       return $behaviors;
    }
    public function indexProvider() {
        $uid=Yii::$app->user->identity->id;
        return new ActiveDataProvider([
            'query' => Entradas::find()->where('usuarios_id='.$uid )->orderBy('id')
        ]);
    }

    public function actionUpdate($id){
        $uid=Yii::$app->user->identity->id;
        $model=$this->findModel($id);

        if($uid!=$model->usuarios_id) //No es mía
            throw new NotFoundHttpException('Acceso no permitido');

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
        }
        return $model;
    }

    //Marca entradas como aprobadas. Se envía un array id[] en POST
    public function actionAprobar(){
        $ids=Yii::$app->getRequest()->getBodyParams();
        $n=0;
        foreach(Entradas::findAll($ids) as $model) {
            if($model->aprobada!='A') {
                $model->aprobada='A';
                $model->save();
                $n++;
            }
        }
        return ["total"=>$n];
    }

    public function findModel($id){
        $model=Entradas::findOne($id);
        if(!$model) //No existe
            throw new NotFoundHttpException('No existe la entrada');
        return $model;
    }

}