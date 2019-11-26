<?php

class autoresController extends controller {

	public $title='Autores';

	public function actionIndex(){

		$page=isset($_GET['page']) ? $_GET['page'] :1;
		$limit=['page'=>$page,'pageSize'=>20];
		$autores=autores::findAll('','',$limit);
		$this->render('autores/index',['autores'=>$autores,'limit'=>$limit]);
	}


	public function actionView($id){
		$autor=autores::findByPk($id);
		if(!$autor) die("No existe ese autor");
		$this->render('autores/view',['autor'=>$autor,'vertitulos'=>false]);
	}

	public function actionCreate(){
		$autor=new autores;
		if(isset($_POST['autores'])) {
			$autor->setvalues($_POST['autores']);
			if($autor->save())
				$this->redirect('autores/index');
		}
		$this->render('autores/form',['autor'=>$autor]);
	}

	public function actionBloquear($id){
		echo "Bloqueando la id ".$id;
	}

}
