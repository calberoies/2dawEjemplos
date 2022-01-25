<?php

use yii\helpers\Html;
use app\models\Entradas;
use app\components\THtml;
use app\models\Categorias;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entradas-form">

    <?php $form = ActiveForm::begin(['options'=>['autocomplete'=>'off']]); ?>
    <div class=row>
        <?php 
        if(hasrole('A')) {?>
            <div class='col-md-3'>
                <?= THtml::autocomplete($model,'usuarios_id',['/usuarios/lookup'],'usuario'); ?>
            </div>
            <div class='col-md-3'>
                <?= $form->field($model, 'aprobada')
                ->dropDownList(Entradas::$aprobadaOptions,
                ['prompt'=>'Selecciona...']) ?>
            </div>
        <?php } ?>
        <div class='col-md-3'>
            <?= $form->field($model, 'categorias_id')
                ->dropDownList(Categorias::lookup(),
                ['prompt'=>'Selecciona...']) ?>
        </div>
        <div class='col-md-3'>
            <?= $form->field($model, 'tags')
                ->dropDownList(Entradas::$tagsOptions,
                ['multiple'=>true,'prompt'=>'Selecciona...']) ?>
        </div>

    </div>

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
