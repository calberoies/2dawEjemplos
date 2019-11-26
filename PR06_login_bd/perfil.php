<?php
require 'init.php';

if (!$app->usuario) 
    header('Location:login.php');
$app->render('perfil');
