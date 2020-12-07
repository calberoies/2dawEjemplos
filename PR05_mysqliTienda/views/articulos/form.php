  <h4>Artículo</h4>
  
  <div style='color:red'><?php 
    if($errores)
      echo "<ul><li>".implode('<li>',$errores)."</ul>";
  ?></div>
  
  <form method=post>
    Nombre <br>
    <input name=nombre value='<?=$articulo['nombre'] ?>'>
    <br>
    Precio <br>
    <input name=precio value='<?=$articulo['precio'] ?>'>
    <br>
    Categoría<br>
    <select name=categorias_id>
      <option>Selecciona...</option>
      <?php 
        foreach(listdata('categorias','id','nombre') as $id=>$nombre){
         /* if($id==$articulo['categorias_id'])
            echo "<option value='$id' selected >$nombre</option>";
          else
            echo "<option value='$id' >$nombre</option>";*/
          
          $selected=$id==$articulo['categorias_id']?'selected':'';
          echo "<option value='$id' $selected >$nombre</option>";
        }

      ?>
    </select>

    <br>
    Estado<br>
    <select name=estado>
    <?php 

        foreach(getestados() as $id=>$nombre){
          $selected=$id==$articulo['estado']?'selected':'';
          echo "<option value='$id' $selected >$nombre</option>";
        }

      ?>
      </select>
    <br>
    Detalle <br>
    <textarea name=detalle><?=$articulo['detalle'] ?></textarea>
    <br>
    <input type=submit class='btn btn-primary' name=envio value=Guardar>
  </form>
