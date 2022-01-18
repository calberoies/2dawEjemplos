<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = 'Entrada';
$this->params['breadcrumbs'][] = ['label' => 'Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="entradas-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
