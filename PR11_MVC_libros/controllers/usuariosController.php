<?php

class usuariosController extends controller {

	public $title='Usuarios';

	public function actionIndex(){
		$usuarios=usuarios::findAll('id<30');
		$this->render('usuarios/index',array('usuarios'=>$usuarios));
	}
	public function actionView($id){
		$usuario=usuarios::findByPk($id);

/*		$sql= "select * from reader where id= ".$usuario->readers_id;
		$x=mysql_($sql)
		$reader=fetch($x)
		echo $reader['descri'];^*/

		$this->render('usuarios/view',array('usuario'=>$usuario,'modo'=>'D'));
	}

	public function actionCreate(){
		$usuario=new usuarios;
		if(isset($_POST['usuarios'])) {
			$usuario->setvalues($_POST['usuarios']);
			if($usuario->save())
				$this->redirect('usuarios/index');
		}
		$this->render('usuarios/form',array('usuario'=>$usuario));
	}

	public function actionBloquear($id){
		echo "Bloqueando la id ".$id;
	}

}
