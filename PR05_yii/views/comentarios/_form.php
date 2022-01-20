<?php

use yii\helpers\Html;
use app\components\THtml;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comentarios-form">

    <?php $form = ActiveForm::begin([
        'action'=>['/comentarios/create']
    ]); ?>

    <?php // THtml::autocomplete($model,'usuarios_id',['/usuarios/lookup'],'usuario'); ?>
    <?= $form->field($model, 'entradas_id')->hiddenInput(); ?>
    
    <?= $form->field($model, 'texto')->label(false)->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'aprobado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Crear', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
