<?php 
use yii\helpers\Html;
?>

<div class=row style='background:#ddd;margin:5px;padding;5px;'>
  
  <b><?= $model->usuario->nombre ?> - <?= $model->fecha_hora ?><br><br></b>

  
  <?= $model->texto ?><br>
  <small><?= $model->categoria->descripcion ?> </small>
  <br>
  <div style='color:blue;font-size:0.8em'>
  
  <?= Html::a('Editar',['entradas/update','id'=>$model->id],
    ['class'=>'btn btn-primary']) ?>

  <?php 


  foreach($model->comentarios as $comentario){
    echo "<li>".$comentario->fecha_hora.' '.$comentario->texto;
  }
  ?>
  </div>
  
</div>
