<?php 

class EntradasController  extends Controller{

    public function beforeAction($action){
        if(!App::$app->user)  {
            $this->redirect('site/login');
        }
    }
    
    public function actionIndex(){
        $entradas=Entradas::findAll('usuarios_id='.App::$app->user->id); 
        
        $vista='entradas_index';
        require 'views/layout.php'; 
    }

    public function actionCreate(){
        $entrada=new Entradas;    
        //POST
        if(isset($_POST['enviar'])){
            $entrada->setvalues($_POST['Entradas']);
            $entrada->usuarios_id=App::$app->user->id;
            if($entrada->save()) {
                $this->redirect('entradas/index');
            }

        }

        $vista='entradas_form';
        require 'views/layout.php';
    }

    public function actionUpdate(){
        if(!$id=$_GET['id']) die('Error');
        $entrada=Entradas::findOne($id);    
        if(!$entrada) die('Error');

        //POST
        if(isset($_POST['enviar'])){
            $entrada->setvalues($_POST['Entradas']);
            if($entrada->save()) {
                $this->redirect('entradas/index');
            }
        }

        $vista='entradas_form';
        require 'views/layout.php';
    }

    public function actionDelete(){
        if(!$id=$_GET['id']) die('Error de acceso');
        $entrada=Entradas::findOne($id,'id,texto');    
        if(!$entrada) die('Error');

        $entrada->delete();
        $this->redirect('entradas/index');
    }
}