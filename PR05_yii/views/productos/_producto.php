<?php 

use yii\helpers\Html;
?>

<div class="card col-md-4">
    <div class="card-body">

    <img src="<?=$model->imgpath?>" style="width:100px">

    <?= Html::a($model->descripcion, ['view', 'id' => $model->id]); ?>
    <br>
    <?=$model->precio?>€
    </div>
</div>