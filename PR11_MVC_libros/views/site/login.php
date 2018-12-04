<div class="form" style="margin:auto;width:300px">
<h2>Login</h2>
	<form method=post>
	<?php echo Mhtml::textfield($usuario,'usuario') ?>
		<br>
	<?php echo Mhtml::textfield($usuario,'password','password') ?>
		<p>
	<input type="submit" value="Entrar">
</form>
</div>
