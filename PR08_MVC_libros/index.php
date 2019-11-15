<?php
/** Ejemplo de aplicación con MFP: Microframework PHP
 * Versión 1.1
 * (c)IES FSL 2019
 */
require "mfp/mfp.php";

$app=app::instance();

$app->debug=true;

$app->run();

?>