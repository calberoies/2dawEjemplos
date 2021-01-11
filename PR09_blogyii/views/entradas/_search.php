<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntradasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entradas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<div class=row>
    <div class='col-md-2'>
        <?= $form->field($model, 'fecha_hora') ?>
    </div>    
    <div class='col-md-5'>
        <?= $form->field($model, 'texto') ?>
    </div>    

    <div class=col-md-2>
        <?= $form->field($model, 'categorias_id') ?>
    </div>    

    <?php // echo $form->field($model, 'usuarios_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>
</div>    
    <?php ActiveForm::end(); ?>

</div>
