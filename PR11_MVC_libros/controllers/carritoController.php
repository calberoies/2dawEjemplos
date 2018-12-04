<?php

class carritoController extends controller {

	public $title='Carrito';

	public function actionanadir($id){
		$titulo=titulos::findByPk($id);
		if(!$titulo)
			$this->end('Titulo inexistente');
		$_SESSION['carrito'][$id]=1;
		$this->redirect('carrito/index');
	}
	public function actionborrar($id){
		unset($_SESSION['carrito'][$id]);
		$this->redirect('carrito/index');
	}
	public function actionIndex(){
		if(!isset($_SESSION['carrito']))
			$this->end('Carrito vacio');
		$this->render('carrito/index',array('carrito'=>$_SESSION['carrito']));
	}

}
