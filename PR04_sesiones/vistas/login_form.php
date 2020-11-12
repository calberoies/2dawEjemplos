<center>
<form action=login.php method=post>
	<span><font color=red><?php echo $error?></font></span><p>
	Usuario:<input name=usuario size=8 value="<?php echo $user; ?>"> 
	<p>
	Contraseña:<input name=password size=8 type=password value="<?php echo $pass; ?>">
	<p>
	<input type=submit value=Entrar>
	<p>(admin y 1111 para entrar)
</form>
</span>
<p>
</center>

