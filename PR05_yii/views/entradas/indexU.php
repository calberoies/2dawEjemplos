<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Entradas;
use app\models\Categorias;
use yii\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntradasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entradas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entradas-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'fecha',
            'texto:ntext',
            
            [ 'attribute'=>'aprobada',
              'label'=>'Aprob.',
              'filter'=>Entradas::$aprobadaOptions,
              'value'=>function($data){
                return $data->aprobadaText;
              }

            ],
            ['attribute'=>'categorias_id',
                'filter'=>Categorias::lookup(),
                'value'=>function($data){
                    return $data->categoria->nombre;
                },
            ],
            ['attribute'=>'tags',
                'format'=>'raw',
                'header'=>'Etiquetas',
                'filter'=>Entradas::$tagsOptions,
                'value'=>function($data){
                    return $data->tagsText;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?= Html::endForm();?>


</div>
