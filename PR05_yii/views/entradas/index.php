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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?=Html::beginForm(['entradas/estado'],'post');?>
    <div class=row>
        <div class="col-md-3 offset-md-7">
            <label>Con las seleccionadas</label>
            <?=Html::dropDownList('aprobada','',
                Entradas::$aprobadaOptions,
                ['class'=>'form-control',
                'prompt'=>'Selecciona...'])?>
        </div>        
        <div class=col-md-2><br>
            <?=Html::submitButton('Cambiar', ['class' => 'btn btn-info',]);?>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'usuario.nombre',
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

            ['class' => CheckboxColumn::class,'name'=>'idselec',
			'checkboxOptions' => function ($model, $key, $index, $column) {
						return ['value' => $model->id];
					     }],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?= Html::endForm();?>


</div>
