<?php
require 'init.php';

if(usuario())
    header('Location:index.php');

if(isset($_POST['entrar'])) {
    if(login($_POST['usuario'],$_POST['pass'])){
        header('Location:index.php');
        die();
    } else
        $error='Usuario o contraseña incorrectos';
} else
    $error='';


require 'cabecera.php';    
?>
        <fieldset style='margin:auto;width:300px'>
        <legend>Login</legend>
        <form method="post"><label>Usuario (admin/1234, por ejemplo): </label>
            <input name="usuario" class="form-control"><br>
            <label>Contraseña:</label> 
            <input class="form-control" type="password" name="pass">
            <?php if($error) echo "<div style='color:red'>$error</div>"; ?>
            <br>
            <input type="submit" name="entrar" value="Entrar" class='btn btn-primary'>
        </form>
        </fieldset>
<?php
require "pie.php";
?>

