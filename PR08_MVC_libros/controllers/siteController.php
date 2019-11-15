<?php

    class siteController extends controller {

        public function actionLogin() {

            if (isset($_POST['usuarios'])) {
                $usuario = app::instance()->login($_POST['usuarios']['usuario'], $_POST['usuarios']['password']);
                if (!count($usuario->errors)) { // Login correcto
                    if ($usuario->usuario == 'admin') // Asigna permisos generales
                        $usuario->role = 'AD'; //Se podría asignar con algún atributo de la tabla usuarios
                    else
                        $usuario->role = 'US';
                    $this->redirect('/');
                }
            } else
                $usuario = new usuarios;

            $this->render('site/login', ['usuario' => $usuario]);
        }

        public function actionLogout() {
            app::instance()->logout();
            $this->redirect('/');
        }

        public function actionAyuda() {

            $this->render('site/ayuda');
        }

    }
    