<?php 
class SiteController extends Controller {
    function actionLogin(){
        if(App::$app->user) //Estamos en sesión ya
            $this->redirect('/');   
        $user=$_POST['user']??'';
        $password=$_POST['password']??'';
        
        if($user){
            //Validamos
            if(App::$app->login($user,$password)){
                $this->redirect('/');
            } else 
                $error='Datos de acceso incorrectos';
        }
        
        $vista='login_form';
        require 'views/layout.php';
    
    }

    function actionLogout(){
        App::$app->logout();
        $this->redirect('site/login');
    }
}