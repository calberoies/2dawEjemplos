<html><body>
<h2>Comprobación de Lotería primitiva</h2>

<form method=post action='comprobar.php'>
    <label>Combinación ganadora:</label>
    <?php 
    
    for($i=0;$i<6;$i++) {
        printf("<input name='ganadora[]' type=numeric size=2> ");

    }
    ?>
    <input type=submit value=Comprobar>
</form>
</body>
</html>