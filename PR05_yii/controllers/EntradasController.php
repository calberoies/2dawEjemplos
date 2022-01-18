<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use app\models\Entradas;
use yii\filters\VerbFilter;
use app\models\EntradasSearch;
use yii\web\NotFoundHttpException;

/**
 * EntradasController implements the CRUD actions for Entradas model.
 */
class EntradasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    /**
     * Lists all Entradas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntradasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index'.Yii::$app->user->identity->rol, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Entradas model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id,false),
        ]);
    }

    /**
     * Creates a new Entradas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Entradas();
        
        if ($this->request->isPost) {
            $model->load($this->request->post());
            if(!hasrole('A')) {
                $model->usuarios_id=Yii::$app->user->id;
                $model->aprobada='P';
            }
            if ($model->save()) {
                return $this->redirect(['index']);
            } else {
                var_dump($model->getErrors());die;
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Entradas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Entradas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    /** Cambia de estado un conjunto de entradas
     * 
     * @param char $estado POST
     * @param array $idselec POST
     */
    public function actionEstado(){

        $aprobada=Yii::$app->request->post('aprobada');
        $idselec=(array)Yii::$app->request->post('idselec');
        $n=0;
        foreach(Entradas::findAll($idselec) as $entrada){
            $entrada->aprobada=$aprobada;
            
            if(!$entrada->save()) {
            
                $error=$entrada->getErrors()['aprobada']??'Error imprevisto';
                Yii::$app->session->setFlash('error',$error);
            } else 
                $n++;		
        }
        if($n)
            Yii::$app->session->setFlash('success',$n.' entradas modificadas');
        $this->redirect(['index']);
    }
    /**
     * Finds the Entradas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Entradas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id,$forupdate=true)
    {
        if (($model = Entradas::findOne($id)) !== null ) {
            if($forupdate && !$model->canupdate)
                throw new NotFoundHttpException('Acceso no permitido');
            return $model;
        }

        throw new NotFoundHttpException('No existe esa entrada');
    }
}
