<center>
<form action=carrito_comprar.php method=post>
	<input type=hidden name=id value=<?php echo $id ?> >
	<span><font color=red><?php echo $error?></font></span><p>
	Artículo: <?php echo $id.' '.$articulo['titulo'];?><br>
		<p>
	Cantidad:<input name=cantidad size=2  value="<?php echo $cantidad; ?>">
	<p>
	<input type=submit value=Comprar>
</form>
</span>
<p>
</center>

