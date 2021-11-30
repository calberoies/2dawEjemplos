<?php 
session_start();
require 'db.php';

if(!isset($_SESSION['user'])) //No estamos en sesión 
    header('Location:login.php');

require 'header.php';    
?>
<body>
    <div class='container mt-5'>
        <a href=alta.php class='btn btn-primary'>Crear entrada</a>
        <?php
        foreach(getentradas('usuarios_id='.myid()) as $entrada){
            echo "<li>".$entrada['texto'];
        }
        ?>
    </div>
</body>
</html>

