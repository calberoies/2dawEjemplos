<?php

    class titulosController extends controller {

        public $title = 'Títulos';

        public function actionIndex() {
            $titfiltro = new titulos;
			$page=isset($_GET['page']) ? $_GET['page'] :1;
			$limit=['page'=>$page,'pageSize'=>20];

			if (isset($_GET['titulos'])) { //Se han puesto filtros
                $where = '';
                $titfiltro->setvalues($_GET['titulos']);
                if ($titfiltro->categoria_id)
                    $where.='categoria_id=' . $titfiltro->categoria_id;
                if ($titfiltro->titulo) {
                    if ($where)
                        $where.=' and ';
                    $where.="titulo like '%{$titfiltro->titulo}%'";
                }
                $titulos = titulos::findAll($where,'titulo',$limit);
            } else // Si no hay filtros, muestra los de portada
                $titulos = titulos::findAll('portada="S"');
            $this->render('titulos/index', array('titulos' => $titulos, 'titfiltro' => $titfiltro,'limit'=>$limit));
        }

        public function actionView($id) {
            $titulo = titulos::findByPk($id);
            $this->render('titulos/view', array('titulo' => $titulo));
        }

        public function actionCreate() {
            $titulo = new titulos;
            if (isset($_POST['titulos'])) {
                $titulo->setvalues($_POST['titulos']);
                if ($titulo->save())
                    $this->redirect('titulos/index');
            }
            $this->render('titulos/form', array('titulo' => $titulo));
        }

        public function actionBloquear($id) {
            echo "Bloqueando la id " . $id;
        }

    }
    