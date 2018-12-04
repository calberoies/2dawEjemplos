<?php

class categoriasController extends controller {

	public $title='Categorías';

	public function actionIndex(){
		$categorias=categorias::findAll('','nombre');
		if(app::instance()->checkrole('AD'))
			$vista='categorias/indexAD';
		else
			$vista='categorias/index';
		$this->render($vista,array('categorias'=>$categorias));
	}


	public function actionView($id){
		$categoria=categorias::findByPk($id);
		echo $categoria->categoria;

	}

	public function actionUpdate($id){
		if(!app::instance()->checkrole('AD'))
			$this->end('acceso no permitido');

		$categoria=categorias::findByPk($id);
		if(!$categoria) $this->end('Categoría inexistente');
		if(isset($_POST['categorias'])) {
			$categoria->setvalues($_POST['categorias']);
			if($categoria->save())
				$this->redirect('categorias/index');
		}
		$this->render('categorias/form',array('categoria'=>$categoria));
	}

	public function actionCreate(){
		if(!app::instance()->checkrole('AD'))
			$this->end('acceso no permitido');
		$categoria=new categorias;
		if(isset($_POST['categorias'])) {
			$categoria->setvalues($_POST['categorias']);
			if($categoria->save())
				$this->redirect('categorias/index');
		}
		$this->render('categorias/form',array('categoria'=>$categoria));
	}

	public function actionDelete($id){
		if(!app::instance()->checkrole('AD'))
			$this->end('acceso no permitido');
		$categoria=categorias::findByPk($id);
		if(!$categoria) $this->end('Categoría inexistente');
		if($categoria->delete())
			$this->redirect('categorias/index');
		else
			$this->end('Error al borrar');
	}

}
