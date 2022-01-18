<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = 'Entrada';
$this->params['breadcrumbs'][] = ['label' => 'Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="entradas-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <?php if($model->canupdate) {
        echo Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']); 
        echo Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro?',
                'method' => 'post',
            ],
        ]);
        }    
    ?>
    </p>
    <div class=row>
        <?= DetailView::widget([
            'model' => $model,
            'template'=>'<div class="col-md-2"><b>{label}</b><br>{value}</div>',
            'attributes' => [
                'usuario',
                'fecha',
                'aprobadaText',
                'categoria',
            ],
        ]) ?>
    </div>
<?=$model->texto?>
</div>
