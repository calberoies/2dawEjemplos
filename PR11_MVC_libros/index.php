<?php
/** Ejemplo de aplicación con MFP: Microframework PHP
 * Versión 1.0
 * (c)IES FSL 2017
 */
require "mfp/mfp.php";

$app=app::instance();

$app->debug=true;

$app->run();

?>