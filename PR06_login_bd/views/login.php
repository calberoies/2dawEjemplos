<fieldset style='margin:auto;width:300px'>
<legend>Login</legend>
<form method="post"><label>Usuario : </label>
    <input name="usuario" value="<?=$usuario?>" class="form-control"><br>
    <label>Contraseña:</label> 
    <input class="form-control" type="password" name="pass">
    <?php if($error) echo "<div style='color:red'>$error</div>"; ?>
    <br>
    <input type="submit" name="entrar" value="Entrar" class='btn btn-primary'>
</form>
</fieldset>

