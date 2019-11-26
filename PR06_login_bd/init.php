<?php
require 'lib/app.php';
session_start(['cookie_lifetime' => 60*60*24*30]);

$app=app::instance();
$config=require 'config.php';
$app->setconfig($config);
