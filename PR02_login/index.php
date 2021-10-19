<?php 
session_start();
if(!isset($_SESSION['user'])) //No estamos en sesión 
    header('Location:login.php');

require 'header.php';    
?>
<body>
    <div class='container mt-5'>
        AQUI EL CONTENIDO DE MI RED
    </div>
</body>
</html>

