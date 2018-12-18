<?php
require 'init.php';
?>
<html>
<head>
<title>Agenda anual</title>
<link rel="stylesheet" type="text/css" href="calendario.css" />
</head>
<body>
<h2>Agenda Anual <?=$anyo ?></h2>
<a href="index.php">Ver meses</a><br>
<?php

$v=new viscalendario($calendario);

$v->displayAnyo();

?>
</body>
</html>

